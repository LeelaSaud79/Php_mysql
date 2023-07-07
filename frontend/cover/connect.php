<?php
session_start();
// Retrieve the form data
$name = $_POST["name"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmpassword"];
$number = $_POST["number"];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'comm');
var_dump($_POST);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    

    $stmt = $conn->prepare("INSERT INTO registration (Name, Email, Gender, password, confirmpassword, phone_number) 
    VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssss", $name, $email, $gender, $password, $confirmPassword, $number);
    $stmt->execute();
    if ($stmt->error) {
        die("Error: " . $stmt->error);
    }
    echo "successful";
    $stmt->close();
    $conn->close();
    header('location:form.php');

    
}
?>
