<?php
session_start();
include '../config/dbconnect.php';
if(isset($_POST['upload'])){

    $ID = $_POST['Id'];
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    print_r($_FILES['image']);
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = 'uploadimage/'.$img_name;
    move_uploaded_file($img_loc, 'uploadimage/'.$img_name);
    
    mysqli_query($conn, "UPDATE `products` SET 
    `name`= '$NAME',`price`= '$PRICE',`image`='$img_des' WHERE prod_id = $ID");
    
     header("Location: http://localhost/Backend/#products");
}

?>