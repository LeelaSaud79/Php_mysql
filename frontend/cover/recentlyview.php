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
    <title>Recently Viewed Products</title>
</head>

<body>
    <h2>Recently Viewed Products</h2>
    <div class="product-container">
        <?php
        // Retrieve the recently viewed products from the cookie or initialize it as an empty array
        $recentlyViewed = isset($_COOKIE['recentlyViewed']) ? json_decode($_COOKIE['recentlyViewed'], true) : [];

        // Update the recently viewed items
        if (isset($_GET['prod_id'])) {
            $productId = $_GET['prod_id'];

            // Check if the product ID already exists in the recently viewed array
            $index = array_search($productId, $recentlyViewed);
            if ($index !== false) {
                // Remove the product ID from its current position
                array_splice($recentlyViewed, $index, 1);
            }

            // Add the product ID at the beginning of the array
            array_unshift($recentlyViewed, $productId);

            // Limit the recently viewed items to a certain number (e.g., 5)
            $recentlyViewed = array_slice($recentlyViewed, 0, 5);

            // Update the "recentlyViewed" cookie with the updated array
            setcookie('recentlyViewed', json_encode($recentlyViewed), time() + (86400 * 30), "/");
        }

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
        } else {
            echo '<p class="no-items">No recently viewed items.</p>';
        }
        ?>
    </div>
</body>

</html>