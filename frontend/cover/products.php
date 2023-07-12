<?php
// include 'navbar.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="item.css"> -->
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
            font: initial;
            color: darkorchid;
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

        <?php
        // Database connection
        include 'navbar.php';
        echo '<h1>Latest Collection</h1>';
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

                echo '<div class="product">';
                echo '<h2>' . $productName . '</h2>';
                echo '<img src="' . $path . '/adminview/' . $productImage . '" alt="image">';
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