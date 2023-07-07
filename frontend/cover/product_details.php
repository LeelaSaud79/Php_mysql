<!DOCTYPE html>
<html>

<head>
    <title>Product Details</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        
    </style>
    <link rel="stylesheet" href="product.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <?php
    $prod_id = $_GET['prod_id'];
    $conn = mysqli_connect("localhost", "root", "", "comm");
    $query = "SELECT * FROM products WHERE prod_id = $prod_id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
    $path = "http://localhost/Backend/";
    mysqli_close($conn);
    ?>

    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'des')">Description</button>
        <button class="tablinks" onclick="openCity(event, 'review')">Review</button>
        <button class="tablinks" onclick="openCity(event, 'Add')">Other Information</button>
    </div>

    <div class="tabcontainer">
        <div id="des" class="tabcontent">
            <h3>Description</h3>
            <p><?php echo $product['description']; ?></p>
        </div>

        <div id="review" class="tabcontent">
            <h3>Review</h3>
            <p><?php echo $product['rating']; ?></p>
        </div>

        <div id="Add" class="tabcontent">
            <h3>Additional Information</h3>
            <p><?php echo $product['add_info']; ?></p>
        </div>
    </div>

    <div class="container">
        <h1><?php echo $product['name']; ?></h1>
        <img src="<?php echo $path . '/adminview/' . $product['image']; ?>" alt="Image" width="300px" height="300px">
        <p>Rs. <?php echo number_format($product['price'], 0, '', ','); ?></p>
        <p>Quantity: <input type="number" name="quantity" value="1" min="1" max="5"></p>
        <button class="buy-now" style="cursor: pointer;"><a href="form.php">Buy Now</a></button>
        <button class="add-to-cart-btn" style="cursor: pointer;">Add to Cart</button>
        <a href="products.php" class="continue-shopping">Continue Shopping</a>
    </div>

    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        $(document).ready(function () {
            function updateCartCount() {
                var cartItems = getCartItems();
                $('#cartCount').text(cartItems.length);
            }

            function getCartItems() {
                var cartItems = [];
                var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)cartItems\s*\=\s*([^;]*).*$)|^.*$/, "$1");
                if (cookieValue) {
                    cartItems = JSON.parse(decodeURIComponent(cookieValue));
                }
                return cartItems;
            }

            function setCartItems(cartItems) {
                var cookieValue = encodeURIComponent(JSON.stringify(cartItems));
                document.cookie = "cartItems=" + cookieValue + "; path=/";
            }

            updateCartCount();

            $('.add-to-cart-btn').click(function (e) {
                e.preventDefault();

                var quantity = $('input[name="quantity"]').val();

                var product = {
                    prod_id: <?php echo $prod_id; ?>,
                    name: "<?php echo $product['name']; ?>",
                    price: <?php echo $product['price']; ?>,
                    quantity: parseInt(quantity),
                    image: "<?php echo $path . '/adminview/' . $product['image']; ?>"
                };

                var cartItems = getCartItems();
                cartItems.push(product);
                setCartItems(cartItems);

                updateCartCount();
            });
        });
    </script>

    <?php
    $recentlyViewed = isset($_COOKIE['recentlyViewed']) ? json_decode($_COOKIE['recentlyViewed'], true) : [];
    $currentProductId = $prod_id;
    if (!in_array($currentProductId, $recentlyViewed)) {
        $recentlyViewed[] = $currentProductId;
    }
    $maxRecentlyViewedItems = 5;
    $recentlyViewed = array_slice($recentlyViewed, -$maxRecentlyViewedItems);
    setcookie('recentlyViewed', json_encode($recentlyViewed), time() + (86400 * 30), "/");
    ?>
</body>

</html>
