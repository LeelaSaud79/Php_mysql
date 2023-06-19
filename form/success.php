<?php
session_start();

// Check if the session variables exist
if (!isset($_SESSION['name']) || !isset($_SESSION['price']) || !isset($_SESSION['image'])) {
    header("Location: index.php");
    exit();
}

$name = $_SESSION['name'];
$price = $_SESSION['price'];
$image = $_SESSION['image'];

// Clear the session variables
unset($_SESSION['name']);
unset($_SESSION['price']);
unset($_SESSION['image']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
</head>
<body>
    <h2>Success!</h2>
    <p>Name: <?php echo $name; ?></p>
    <p>Price: <?php echo $price; ?></p>
    <p>Image: <img src="<?php echo $image; ?>" alt="Product Image"></p>
</body>
</html>
