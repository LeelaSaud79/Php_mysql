<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comm";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
      color: #000;
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
      object-fit: contain;
      /* Maintain the aspect ratio of the image */
    }

    .products-heading {
      text-align: left;
      margin-top: 30px;
    }

    .products-heading h2 {
      color: #FF0000;
      font-size: 24px;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <header>
    <!-- For Navbar -->
    <div class="container-fluid p-0">
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
                <a class="nav-link mr-6" href="http://localhost/frontend/cover/">Home</a>
              </li>
              <li class="nav-item">
                <!-- <a class="nav-link mr-6" href="products.php">Shop Now</a> -->
              </li>
              <li class="nav-item">
                <!-- <a class="nav-link mr-6" href="#">Contacts</a> -->
              </li>
              <li class="nav-item">
                <!-- <a class="nav-link mr-6" href="form.php">Log In/Register</a> -->
              </li>
              <li class="nav-item">
                <!-- <a class="nav-link mr-6" href="Login.php">Admin Login</a> -->
              </li>
              <li class="nav-item">
                <!-- <a class="nav-link mr-6" href="billing.php">Billing/Shipping Details</a> -->
              </li>
              <li class="nav-item">
                <a class="btn btn-outline-success" href="cartdetails.php"><i class="fa-solid fa-cart-shopping"></i>
                  <sup id="cartCount">0</sup></a>

              </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <div class="container">
    <!-- Rest of your HTML code goes here -->
  </div>
  <!-- bootstrap js link -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>