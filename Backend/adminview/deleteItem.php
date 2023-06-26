<?php
session_start();
include '../config/dbconnect.php';
$ID = $_GET['Id'];
mysqli_query($conn,"DELETE FROM `products` where prod_id = $ID");

header("Location: http://localhost/Backend/#products");

?>
