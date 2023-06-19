<?php
include 'config.php';
if (isset($_POST['upload'])) {

    $ID = $_POST['Id'];
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    print_r($_FILES['image']);
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = 'uploadimage/'.$img_name;
    move_uploaded_file($img_loc, 'uploadimage/'. $img_name);

    header('location:index.php');
    mysqli_query($con, "UPDATE `tblcard` 
    SET `Name`='$NAME', `Price`='$PRICE',
     `Image`='$img_des' WHERE Id = $ID");

}

?>