<?php

session_start();
// product_details.php

require_once('../config/dbconnect.php');

$finalId = $_GET['final_id'];

// Retrieve the records from the database based on the final_id
$query = "SELECT * FROM finalorder WHERE final_id = $finalId";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);

    // Retrieve the order details
    $order = "SELECT * FROM order_items WHERE order_id = " . $row['order_id'];
    $orderResult = mysqli_query($conn, $order);
    if ($orderResult) {
        $orderDetails = mysqli_fetch_assoc($orderResult);
    } else {
        echo "Error retrieving order details: " . mysqli_error($conn);
        exit;
    }

    // Retrieve the shipment details
    $shipmentQuery = "SELECT * FROM shipment_details WHERE ship_id = " . $row['ship_id'];
    $shipmentResult = mysqli_query($conn, $shipmentQuery);
    if ($shipmentResult) {
        $shipmentDetails = mysqli_fetch_assoc($shipmentResult);
    } else {
        echo "Error retrieving shipment details: " . mysqli_error($conn);
        exit;
    }

    // Retrieve the billing details
    $billingQuery = "SELECT * FROM billing_details WHERE bill_id = " . $row['bill_id'];
    $billingResult = mysqli_query($conn, $billingQuery);
    if ($billingResult) {
        if (mysqli_num_rows($billingResult) > 0) {
            $billingDetails = mysqli_fetch_assoc($billingResult);
        } else {
            echo "Billing details not found.";
            exit;
        }
    } else {
        echo "Error retrieving billing details: " . mysqli_error($conn);
        exit;
    }

    // Retrieve the product details
    $productQuery = "SELECT p.name, p.price FROM order_items oi JOIN products p ON oi.prod_id = p.prod_id
     WHERE oi.order_id = " . $row['order_id'];
    $productResult = mysqli_query($conn, $productQuery);
    if ($productResult && mysqli_num_rows($productResult) > 0) {
        $totalPrice = 0; // Variable to store the total price of all products

        ?>

        <!DOCTYPE html>
        <html>

        <head>
            <title>Product Details</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        </head>

        <body>
            <div class="container">
                <h1>Details of Order Product</h1>
                <br><br>

                <h3>Shipment Details</h3>
                <div class="card-body">
                    <table class="table table-bordered text-center my-table">
                        <tr class="bg-dark text-white">
                            <td>Shipment ID</td>
                            <td>Shipment Name</td>
                            <td>Shipping Address</td>
                        </tr>
                        <tr>
                            <td><?php echo $shipmentDetails['ship_id']; ?></td>
                            <td><?php echo $shipmentDetails['shiping_name']; ?></td>
                            <td><?php echo $shipmentDetails['shipping_address']; ?></td>
                        </tr>
                    </table>
                </div>

                <h3>Order Details</h3>
                <div class="card-body">
                    <?php if ($orderDetails) { ?>
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td>ID</td>
                                <td>Date</td>
                                <td>Quantity</td>
                                <td>ProductID</td>
                                <td>Order ID</td>
                            </tr>
                            <tr>
                                <td><?php echo $orderDetails['id']; ?></td>
                                <td><?php echo $orderDetails['date']; ?></td>
                                <td><?php echo $orderDetails['quantity']; ?></td>
                                <td><?php echo $orderDetails['prod_id']; ?></td>
                                <td><?php echo $orderDetails['order_id']; ?></td>
                            </tr>
                        </table>
                    <?php } else {
                        echo "Order details not found.";
                    } ?>

                    <?php
                    // Retrieve all products associated with the order_id
                    $allProductsQuery = "SELECT p.name, p.price FROM order_items oi JOIN products p ON oi.prod_id = p.prod_id WHERE oi.order_id = " . $orderDetails['order_id'];
                    $allProductsResult = mysqli_query($conn, $allProductsQuery);

                    if ($allProductsResult && mysqli_num_rows($allProductsResult) > 0) {
                        ?>

                        <h3>All Products</h3>
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td>OrderID</td>
                                <td>Product Name</td>
                                <td>Price</td>
                            </tr>

                            <?php
                            while ($productRow = mysqli_fetch_assoc($allProductsResult)) {
                                $totalPrice += $productRow['price']; // Add the price of each product to the total price
                                ?>
                                <tr>
                                    <td><?php echo $orderDetails['order_id']; ?></td>
                                    <td><?php echo $productRow['name']; ?></td>
                                    <td><?php echo $productRow['price']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td colspan="2">Total Price:</td>
                                <td><?php echo $totalPrice; ?></td>
                            </tr>
                        </table>
                    <?php } else {
                        echo "No products found for this order.";
                    } ?>
                </div>

                <h3>Billing Details</h3>
                <div class="card-body">
                    <?php if ($billingDetails) { ?>
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td>Billing ID</td>
                                <td>Billing Name</td>
                                <td>Billing Address</td>
                            </tr>
                            <tr>
                                <td><?php echo $billingDetails['bill_id']; ?></td>
                                <td><?php echo $billingDetails['billing_name']; ?></td>
                                <td><?php echo $billingDetails['billing_address']; ?></td>
                            </tr>
                        </table>
                    <?php } else {
                        echo "Billing details not found.";
                    } ?>
                </div>

            </div>
        </body>

        </html>

<?php
    } else {
        echo "Error retrieving product details: " . mysqli_error($conn);
        exit;
    }
} else {
    echo "Error fetching product details: " . mysqli_error($conn);
    exit;
}

mysqli_close($conn);
?>
