<!DOCTYPE html>
<html>
<head>
    <title>Recently Viewed Products</title>
    
</head>
<body>
    <h2>Recently Viewed Products</h2>
    <div class="product-container">
        <?php
        // Retrieve the recently viewed products from the cookie or initialize it as an empty array
        $recentlyViewed = isset($_COOKIE['recentlyViewed']) ? json_decode($_COOKIE['recentlyViewed'], true) : [];

        // Display the recently viewed products
        if (!empty($recentlyViewed)) {
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

            // Retrieve the recently viewed products from the database
            $recentlyViewedIds = implode(',', $recentlyViewed);
            $sql = "SELECT * FROM products WHERE prod_id IN ($recentlyViewedIds)";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
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
                echo '<p class="no-items">No recently viewed items.</p>';
            }

            // Close database connection
            mysqli_close($conn);

            // Update the "recentlyViewed" cookie with the updated array
            setcookie('recentlyViewed', json_encode($recentlyViewed), time() + (86400 * 30), "/");
        } else {
            echo '<p class="no-items">No recently viewed items.</p>';
        }
        ?>
    </div>
</body>
</html>
