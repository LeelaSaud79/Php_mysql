<?php
session_start();

$OrderProduct = '[
    {
        "prod_id": 41,
        "quantity": 5
    },
    {
        "prod_id": 42,
        "quantity": 5
    },
    {
        "prod_id": 43,
        "quantity": 5
    },
    {
        "prod_id": 44,
        "quantity": 4
    }
]';

$decodedData = json_decode($OrderProduct, true);

// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comm";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the form data
$billingName = $_POST['billing_name'];
$billingAddress = $_POST['billing_address'];
$shippingName = $_POST['shipping_name'];
$shippingAddress = $_POST['shipping_address'];

// Form Data Validation
if (empty($billingName) || empty($billingAddress) || empty($shippingName) || empty($shippingAddress)) {
    // Handle required fields not filled error
    echo "All fields are required.";
    exit;
}

// Retrieve the maximum order_id
$query = "SELECT MAX(final_id) AS max_order_id FROM finalorder";
$result = $conn->query($query);

// Check if the query was successful
if ($result) {
    $row = $result->fetch_assoc();
    $maxOrderId = $row['max_order_id'];
} else {
    // Handle the query error
    echo "Error: " . $conn->error;
    exit;
}
$newOrderId = $maxOrderId + 1;
// echo $newOrderId;

// Insert into billing_details table
$billingQuery = "INSERT INTO billing_details (billing_name, billing_address, order_id)
                VALUES ('$billingName', '$billingAddress', '$newOrderId')";

if ($conn->query($billingQuery) !== TRUE) {
    // Handle the query error
    echo "Error: " . $billingQuery . "<br>" . $conn->error;
    exit;
}

//Retrieve the last inserted bill_id
$newBillId = $conn->insert_id;


// Insert into shipment_details table
$shippingQuery = "INSERT INTO shipment_details (shiping_name, shipping_address, order_id)
                VALUES ('$shippingName', '$shippingAddress', '$newOrderId')";

if ($conn->query($shippingQuery) !== TRUE) {
    // Handle the query error
    echo "Error: " . $shippingQuery . "<br>" . $conn->error;
    exit;
}

// Retrieve the last inserted ship_id
$newShipId = $conn->insert_id;

$totalPrice = 0;

// Insert order items into the order_items table
for ($i = 0; $i < count($decodedData); $i++) {
    $productId = $decodedData[$i]['prod_id'];
    $quantity = $decodedData[$i]['quantity'];

    // Retrieve the price of the product from the database
    $priceQuery = "SELECT price FROM products WHERE prod_id = '$productId'";
    $priceResult = $conn->query($priceQuery);

    if ($priceResult && $priceResult->num_rows > 0) {
        $row = $priceResult->fetch_assoc();
        $price = $row['price'];

        // Calculate the subtotal for the product
        $subtotal = $price * $quantity;

        // Add the subtotal to the total price
        $totalPrice += $subtotal;

        // Update the price of the product in the "products" table
        $updateQuery = "UPDATE products SET price = '$price' WHERE prod_id = '$productId'";
        if ($conn->query($updateQuery) !== TRUE) {
            // Handle the query error
            echo "Error: " . $updateQuery . "<br>" . $conn->error;
            exit;
        }

        $insertQuery = "INSERT INTO order_items (date, quantity, prod_id, order_id)
                        VALUES (NOW(), '$quantity', '$productId','$newOrderId')";

        if ($conn->query($insertQuery) !== TRUE) {
            // Handle the query error
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
            exit;
        }
    } else {
        // Handle product not found in the database
        echo "Error: Product not found.";
        exit;
    }
}

// Insert into finalorder table
$finalOrderQuery = "INSERT INTO finalorder (order_id, bill_id, ship_id)
                   VALUES ('$newOrderId', '$newBillId', '$newShipId')";

if ($conn->query($finalOrderQuery) !== TRUE) {
    // Handle the query error
    echo "Error: " . $finalOrderQuery . "<br>" . $conn->error;
    exit;
}

$conn->close();
header('Location: billing.php');

// Calculate the total price of the final order
echo "Total Price: " . $totalPrice;

exit;
?>
