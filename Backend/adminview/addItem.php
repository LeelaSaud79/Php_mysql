<?php
session_start();
include '../config/dbconnect.php';
if (isset($_POST['upload'])) {
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    print_r($_FILES['image']);
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = "uploadimage/".$img_name;
    move_uploaded_file($img_loc, 'uploadimage/'. $img_name);
    $DESCRIPTION = $_POST['description'];
    $RATING = $_POST['rating'];
    $ADDINFO = $_POST['add'];


    mysqli_query($conn, "INSERT INTO `products`(`name`, `price`, `image`, `description`, 
    `rating`, `add_info`)
     VALUES ('$NAME',' $PRICE','$img_des','$DESCRIPTION',' $RATING',' $ADDINFO')");
    header("Location: http://localhost/Backend/#products");






}
?>