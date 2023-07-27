<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-PSW1MY7HB4"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-PSW1MY7HB4');
  </script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ecommerce project</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <!-- <link rel="stylesheet" type="text/css" href="prod_det.css"> -->
  <style>
    header {
      position: sticky;
      top: 0;
      left: 0;
      width: 100%;
      /* z-index: 100; */
    }

    li {
      display: inline-block;
      margin-right: 30px;
    }

    .product img {
      width: 200px;
      height: 200px;
      transition: transform 0.3s ease;
    }

    a {
      text-decoration: none;
      color: black;
      font-weight: bold;
    }

    .navbar {
      display: flex;
    }

    .product {
      display: inline-block;
      width: 30%;
      height: 400px;
      /* Set a fixed height for consistency */
      margin: 10px;
      padding: 10px;
      border: 0px solid #ccc;
      text-align: center;
    }

    .product img {
      width: 100%;
      height: 70%;
      /* Adjust the height as needed */
      object-fit: contain;
      /* Maintain the aspect ratio of the image */
    }

    .products-heading {
      text-align: left;
      margin-top: 30px;
    }

    .products-heading h2 {
      color: #FF0000;
      /* Set your desired color */
      font-size: 24px;
      /* Adjust the font size as needed */
      font-weight: bold;
    }
  </style>

  <script>
    window.onload = function () {
      setTimeout(function () {
        var slogan = document.createElement('p');
        slogan.innerHTML = "Find it, Love it, Buy it";
        slogan.style.fontSize = "24px";
        slogan.style.fontWeight = "bold";
        slogan.style.color = "grey";
        var shopNowLink = document.querySelector('.shop-now-link');
        shopNowLink.parentNode.insertBefore(slogan, shopNowLink.nextSibling);
      }, 3000);
    }
  </script>



</head>

<body>
  <header>
    <!-- For Navbar -->
    <div class="container-fluid p-0"></div>
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light text-dark">
      <div class="container-fluid">
        <img src="./image/logo.png" alt="" class="logo" height="30px" width="30px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link mr-6" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-6" href="products.php">Shop Now</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-6" href="#">Contacts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-6" href="form.php">Log In/Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-6" href="Login.php">Admin Login</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-success" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
            </li>

          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </header>
  <div style="display: flex; align-items: flex-start;">
    <img src="./image/cover.png" height="400px" width="400px" alt="image">
    <div style="position: absolute; top: 108px; left: 500px; font-size: 65px; font-weight: bold; 
    background-color: white; padding: 20px; color: darkslategray;">
      Pamper yourself and feel amazing today!!
    </div>
  </div>

  <!-- <div class="shop-now-section">
    <div style="position: relative; right: 0; top: 20px; font-size: 80px; font-weight: bold; color: grey;">
      So, let's shop now <a href="products.php"><button style="background-color: lightgrey;
      color: azure; padding: 10px 20px; cursor: pointer;">Shop Now</button></a>
    </div>
  </div> -->

  <div style="display: flex; align-items: flex-start;">
    <div class="shop-now-section">
      <div style="position: relative; right: 0; top: 20px; font-size: 80px; font-weight: bold; color: grey;">
        So, let's shop now <a href="products.php" class="shop-now-link"><button
            style="background-color: lightgrey; color: azure; padding: 10px 20px; cursor: pointer;">Shop
            Now</button></a>
      </div>
    </div>
    <img src="./image/girl.png" style="height: 400px; width: 675px;">
  </div>


  <div>
    <?php include 'recentlyview.php'; ?>
  </div>

  <div class="products-heading">
    <h2>Latest Trending Items</h2>
  </div>


  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "comm";
  $path = "http://localhost/Backend/";


  // Create a connection
  $conn = new mysqli($servername, $username, $password, $dbname);


  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Fetch products from the database
  $sql = "SELECT * FROM products LIMIT 6";
  $result = $conn->query($sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $productName = $row["name"];
      $productPrice = number_format($row["price"], 0, '', ',');
      $productImage = $row["image"];

      echo '<div class="product">';
      echo '<h2>' . $productName . '</h2>';
      echo '<img src="' . $path . '/adminview/' . $productImage . '" alt="image">';
      echo '<p>Rs. ' . $productPrice . '</p>';
      echo '<a href="product_details.php?prod_id=' . $row["prod_id"] . '">Order Now</a>';
      echo '</div>';
    }
  } else {
    echo "No products found.";
  }

  // Close database connection
  mysqli_close($conn);
  ?>

  <!-- bootstrap js link -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  <a href="products.php" style="display: inline-block; 
  padding: 10px 20px; background-color: lightcoral; color: #ffffff; border-radius: 21px; 
  text-align: center; cursor: pointer; float: right;">See More</a>

</body>

</html>