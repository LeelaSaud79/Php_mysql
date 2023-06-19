<?php
session_start();
include'config.php';
if (isset($_POST['submit'])){
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    print_r($_FILES['image']);
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = "uploadimage/".$img_name;
    move_uploaded_file($img_loc,'uploadimage/'.$img_name);

    // Query to insert data
    mysqli_query($con,"INSERT INTO `tblcard`( `Name`, `Price`, `Image`) 
    VALUES ('$NAME', '$PRICE', '$img_des')");
    header('location:index.php');
    

}
?>