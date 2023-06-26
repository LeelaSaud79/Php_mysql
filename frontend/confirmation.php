<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <?php
    include 'database.php';

    // Retrieve the order_id from the URL parameter
    $orderId = $_GET['order_id'];

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

    // Fetch bill_id from billing_details
    $billingQuery = "SELECT bill_id FROM billing_details WHERE order_id = '$orderId'";
    $billingResult = $conn->query($billingQuery);
    if ($billingResult->num_rows > 0) {
        $billingRow = $billingResult->fetch_assoc();
        $billId = $billingRow['bill_id'];
    } else {
        $billId = "N/A";
    }

    // Fetch ship_id from shipment_details
    $shippingQuery = "SELECT ship_id FROM shipment_details WHERE order_id = '$orderId'";
    $shippingResult = $conn->query($shippingQuery);
    if ($shippingResult->num_rows > 0) {
        $shippingRow = $shippingResult->fetch_assoc();
        $shipId = $shippingRow['ship_id'];
    } else {
        $shipId = "N/A";
    }

    // Fetch order_id from order_items
    $orderQuery = "SELECT order_id FROM order_itmes WHERE order_id = '$orderId'";
    $orderResult = $conn->query($orderQuery);
    if ($orderResult->num_rows > 0) {
        $orderRow = $orderResult->fetch_assoc();
        $orderId = $orderRow['order_id'];
    } else {
        $orderId = "N/A";
    }

    // Display the order_id, ship_id, and bill_id
    echo "Order ID: $orderId<br>";
    echo "Ship ID: $shipId<br>";
    echo "Bill ID: $billId<br>";

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
