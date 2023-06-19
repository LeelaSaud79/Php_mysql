<?php 

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>practical_of ecommerce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
  <div style = "text-align: center; margin top :3px;">
    <h1>Products Items</h1>
    </div>
    <!-- fetch data -->

    <div class = "container">

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    include 'config.php';
    $pic = mysqli_query($con,"SELECT * FROM `tblcard`");
    

    // Use while loop for all record to display
    // If we have to use html inside php then we have to use it inside the echo statement
     while($row = mysqli_fetch_array($pic)){
        echo "

        <tr>
        <td> $row[Id] </td>
        <td> $row[Name] </td>
        <td> $row[Price] </td>
        <td><img src= '$row[Image]' width = '200px' height = '200px'></td>
        <td><a href ='delete.php?Id= $row[Id]' class = 'btn btn-danger'>Delete</a></td>
        <td><a href ='update.php?Id= $row[Id]'class = 'btn btn-primary'>Update</a></td>
       
        </tr>
    
        ";

     }

    ?>
  </tbody>
</table>

</div>

<a href="form.php" class="products-button">Add Products</a>
</body>

</html>