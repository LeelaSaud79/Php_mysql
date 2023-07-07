<?php
// Establish a database connection
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

// Retrieve the form data
$name = $_POST['name'];
$address = $_POST['address'];
$payment = $_POST['payment'];

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO record (Name, Address, Payment) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $address, $payment);

// Execute the statement
if ($stmt->execute()) {

    setcookie('cartItems', '', time() - 3600, '/');
    header('Location: thankyou.php');
    exit();
} else {
    // Error occurred while saving the order
    die("Error: " . $stmt->error);
}
;
?>
