<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comm";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the cart items from cookies
function getCartItems()
{
    $cartItems = [];
    $cookieValue = isset($_COOKIE['cartItems']) ? $_COOKIE['cartItems'] : '';
    if ($cookieValue) {
        $cartItems = json_decode(urldecode($cookieValue), true);
    }
    return $cartItems;
}

$cartItems = getCartItems();

// Process the order
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $billing_name = $_POST['billing_name'];
    $billing_address = $_POST['billing_address'];
    $shipping_name = $_POST['shipping_name'];
    $shipping_address = $_POST['shipping_address'];
    // $product_ids = $_POST['product_ids'];
    // $quantities = $_POST['quantities'];
    $payment = $_POST['payment'];
    $path = "http://localhost/Backend/";

    // Process the order (e.g., save to a database)

    // Insert the order details into the database
    $sql = "INSERT INTO orders (billing_name, billing_address, shipping_name, shipping_address,
    payment) VALUES ('$billing_name', 
    '$billing_address', '$shipping_name', '$shipping_address', '$payment')";
    if ($conn->query($sql) === TRUE) {
        // Clear the cart items
        setcookie('cartItems', '', time() - 3600, '/');

        // Redirect to a thank you page or display a success message
        header('Location: thankyou.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PSW1MY7HB4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-PSW1MY7HB4');
    </script>
    <title>Confirm Products</title>
    <link rel="stylesheet" href="checkout.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightgray;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        h2 {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Confirm products</h1>
        <div id="cartItemsContainer">
            <?php if (!empty($cartItems)): ?>
                <table class="cart-table">
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                    <?php foreach ($cartItems as $item): ?>
                        <tr>
                            <td>
                                <?php echo $item['name']; ?>
                            </td>
                            <td>
                                <?php echo $item['price']; ?>
                            </td>
                            <td><img src="<?php echo $item['image']; ?>" alt="Image"></td>
                            <td>
                                <?php echo $item['quantity']; ?>
                            </td>
                            <td>
                                <?php echo $item['price'] * $item['quantity']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr class="total-row">
                        <td colspan="4">Total:</td>
                        <td>
                            <?php
                            $total = 0;
                            foreach ($cartItems as $item) {
                                $total += $item['price'] * $item['quantity'];
                            }
                            echo $total;
                            ?>
                        </td>
                    </tr>
                </table>
            <?php else: ?>
                <p class="empty-cart-msg">No items in the cart</p>
            <?php endif; ?>
        </div>

        <h2>Checkout</h2>
        <form method="POST" action="">
            <!-- Billing Details -->
            <h2>Billing details</h2>
            <label for="billing_name">Billing Name:</label>
            <input type="text" name="billing_name" id="billing_name" required>
            <br><br>
            <label for="billing_address">Billing Address:</label>
            <textarea name="billing_address" id="billing_address" required></textarea>
            <br><br>

            <!-- Shipment Details -->
            <h2>Shipment details</h2>
            <label for="shipping_name">Shipping Name:</label>
            <input type="text" name="shipping_name" id="shipping_name" required>
            <br><br>
            <label for="shipping_address">Shipping Address:</label>
            <textarea name="shipping_address" id="shipping_address" required></textarea>
            <br><br>

            <!-- Order Items -->
            <!-- <h2>Order items</h2>
            <label for="product_ids">Product IDs:</label>
            <input type="text" name="product_ids" id="product_ids" required>
            <br><br>
            <label for="quantities">Quantities:</label>
            <input type="text" name="quantities" id="quantities" required>
            <br><br> -->

            <!-- Payment Method -->
            <label for="payment">Payment Method:</label>
            <select name="payment" id="payment" required>
                <option value="credit_card">Credit Card</option>
                <option value="esewa">Esewa</option>
                <option value="Khalti">Khalti</option>
                <option value="cash">Cash on Delivery</option>
            </select>

            <input type="submit" value="Place Order">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>