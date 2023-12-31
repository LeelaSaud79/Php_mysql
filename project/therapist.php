<?php

session_start();

if (!isset($_SESSION['username'])) {
  // header('location: login.php');
  header('location: http://localhost/frontend/cover/Login.php');
  exit;
}

?>

<!DOCTYPE html>
<html>

<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-PSW1MY7HB4"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-PSW1MY7HB4');
  </script>
  <title>Task Today</title>
</head>

<body>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <div>
        <form method="POST" action="./adminview/addItem.php" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Price:</label>
        <input type="number" name="price" required><br>

        <label>Image:</label>
        <input type="file" name="image" accept="image/*" required><br>

        <button name = "upload">Upload</button>
    </form> -->
  <!-- </div> -->
  <!-- Fetch the data -->

  <!-- <h1 class="text-center my-3">Products Items</h1> -->
  <h1>All Products</h1>
  <!-- fetch data -->

  <div class="container">

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Image</th>
          <th scope="col">Description</th>
          <th scope="col">Rating</th>
          <th scope="col">Additonal Information</th>
          <th scope="col">Delete</th>
          <th scope="col">Edit</th>

        </tr>
      </thead>
      <tbody>
        <?php
        include '../config/dbconnect.php';
        $pic = mysqli_query($conn, "SELECT * FROM `products`");
        while ($row = mysqli_fetch_array($pic)) {
          echo "
    <tr>
      <td>$row[prod_id]</td>
      <td>$row[name]</td>
      <td>$row[price]</td>
      <td><img src='./adminview/$row[image]' width='200px' height='200px'></td>

      <td>$row[description]</td>
      <td>$row[rating]</td>
      <td>$row[add_info]</td>

      <td><a href='./adminview/deleteItem.php?Id=$row[prod_id]' class='btn btn-danger'>Delete</a></td>
      <td><a href='./adminview/updateItem.php?Id=$row[prod_id]' class='btn btn-primary'>Update</a></td>
    </tr>
    ";


        }
        ?>
      </tbody>
      <!-- <div style="position: fixed; top: 50%; left: 20px; transform: translateY(-50%);"> -->
      <div style="position:fixed; bottom: 20px; left: 20px;">
        <a href="./adminview/additemform.php" class="btn btn-outline-secondary">Add Products</a>
      </div>

      <div style="position:fixed; bottom: 20px; right: 20px;">
        <a href="./adminview/logout.php" class="btn btn-outline-success">Logout</a>
      </div>


</body>

</html>