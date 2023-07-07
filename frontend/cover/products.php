<?php 
include 'navbar.php'; 
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Collection</title>
    <style>
        body {
            background-color: ghostwhite;
        }
        
        a {
      text-decoration: none;
      color: #000;
      font-weight: bold;
    }


        h1 {
            font-family: inherit;
            font-size: 45px;
            color: #333333;
            text-align: left;
    
        }


        .product {
            display: inline-block;
            width: 28.33%;
            margin: 10px;
            padding: 10px;
            border: 0px solid #ccc;
            text-align: center;
            cursor: pointer;
        }

        .product img {
            width: 200px;
            height: 200px;
            transition: transform 0.3s ease;
        }

        .product img:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Let's start?</h1>

        <?php


        // Database connection
        // include 'navbar.php';
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "comm";
        $path = "http://localhost/Backend/";
        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch products from the database
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $productName = $row["name"];
                $productPrice = number_format($row["price"], 0, '', ',');
                $productImage = $row["image"];
                // echo $productImage;
        
                echo '<div class="product">';
                echo '<h2>' . $productName . '</h2>';
                // echo dirname( __FILE__ );
                echo '<img src="' . $path . '/adminview/' . $productImage . '" alt="image">';


                // echo '<img src="../adminview/uploadimage/laptop.jpg" alt="Image">';
        
                echo '<p>Rs. ' . $productPrice . '</p>';
                echo '<a href="product_details.php?prod_id=' . $row["prod_id"] . '">Shop Now</a>';
                echo '</div>';
            }
        } else {
            echo "No products found.";
        }

        // Close database connection
        mysqli_close($conn);
        ?>


    </div>
</body>

</html>