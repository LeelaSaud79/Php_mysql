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
    $name = $_POST['name'];
    $address = $_POST['address'];
    $payment = $_POST['payment'];
    $path = "http://localhost/Backend/";

    // Process the order (e.g., save to a database)

    // Clear the cart items
    setcookie('cartItems', '', time() - 3600, '/');

    // Redirect to a thank you page or display a success message
    header('Location: thank_you.php');
    exit();
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
            <?php endif;
            // header('location: checkout.php');
            ?>
        </div>

        <h2>Checkout</h2>
        <form method="POST" action="process_order.php">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="address">Address:</label>
            <textarea name="address" id="address" required></textarea>
            <p> <a href="billing.php">Billing & shipping address in details</a></p>

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