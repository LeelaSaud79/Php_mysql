<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    
</head>
<body>

<?php

include 'config.php';
session_start();
// error_reporting(0);
$ID = $_GET['Id'];
 var_dump($ID );
$Record = mysqli_query($con,"SELECT * FROM `tblcard` WHERE Id = $ID");
// echo $Record;
$data = mysqli_fetch_array($Record);

?>
<div class="container d-flex justify-content-center">
        <form action="update1.php" method ="post" class="w-50" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" value="<?php echo $data['Name']?>" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" value="<?php echo $data['Price']?>" name="price" class="form-control">
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <td><input type="file" value="<?php echo $data['Image']?>" name="image" class="form-control">
                <img src="<?php echo $data['Image']?>" width ="200px" height="70px"></td>
                <input type="hidden" name = "Id" value="<?php echo $data['Id'];?>">
            </div>
            <button type="submit" name ="upload" class = "btn btn-danger m-2">Update</button>
        </form>
    </div>
</body>
</html> 