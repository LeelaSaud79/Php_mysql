<?php
session_start();
// Retrieve the prod_id parameter from the URL
// include 'navbar.php';
$prod_id = $_GET['prod_id'];

// Connecting to the database
$conn = mysqli_connect("localhost", "root", "", "comm");

// Query the database to retrieve the product details
$query = "SELECT * FROM products WHERE prod_id = $prod_id";
$result = mysqli_query($conn, $query);

// Fetch the product details from the result
$product = mysqli_fetch_assoc($result);
$path = "http://localhost/Backend/";

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Product Details</title>
</head>
<style>
    body {
        display: flow-root;
        flex-direction: column;
        align-items: center;
        text-align: center;
        font-family: cursive;
        background-color: lightgray;
    }

    .container {
        margin-top: 50px;
    }

    .product img {
        width: 200px;
        height: 200px;
        transition: transform 0.3s ease;
    }

    img {
        margin-top: -8px;
        filter: grayscale(20%);
        padding: 5px;
    }

    a {
        text-decoration: none;
        color: #000;
        font-weight: bold;
    }


    p {
        margin-top: 20px;
    }

    .buy-now,
    .add-to-cart-btn {
        margin-top: 2px;
        padding: 10px 20px;
        background-color: gainsboro;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .buy-now:hover,
    .add-to-cart-btn:hover {
        background-color: lightgray;
    }
</style>

<body>
    <h1 class="container">
        <?php echo $product['name']; ?>
    </h1>
    <!-- var_dump($product['image']); -->
    <img src="<?php echo $path . '/adminview/' . $product['image']; ?>" alt="Image" width="300px" height="300px">
    <p>Rs.
        <?php echo number_Format($product['price'], 0, '', ','); ?>
    </p>

    <p>Quantity: <input type="number" name="quantity" value="1" min="1" max="5"></p>
    <button class="buy-now" style="cursor: pointer;"><a href="form.php">Buy Now</a></button>
    <button class="add-to-cart-btn " style="cursor: pointer" ;><a href="#">Add to Cart</a></button>
</body>

</html>