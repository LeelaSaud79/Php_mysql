<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comm";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// empty ensures that empty cart array is initalized if the cookie is not set or empty
// checking if the cart cookie is set or not

if(!isset($_COOKIE['cart'])|| empty($_COOKIE['cart'])){
    // Now initializing the array
    $cart = array();
}
else{
    $cart = json_decode($_COOKIE['cart'], true);
}

function addToCart($product, $quantity){
    global $cart;
    if(!isset($cart[$product])){
        $cart[$product] = 0;
    }
    $cart[$product] +=$quantity;
    // Updating
    setcookie('cart', json_encode($cart), time()+ (86400*30), '/'); 

}
function removefromCart($product){
    global $cart;
    if(!isset($cart[$product])){
        unset($cart[$product]);

        setcookie('cart', json_encode($cart),time()+(86400*30), '/'); //cookie expires in 30 days
    }
}
function updateQuantity($product, $quantity){
    global $cart;
    if(!isset($cart[$product])){
        $cart[$product] = $quantity;

        // Updating
        setcookie('cart', json_encode($cart), time() + (86400 * 30), '/'); // Cookie expires in 30 days
    }
}

//for cart modifications

// Output the cart contents
echo "Cart Contents:<br>";
if (empty($cart)) {
    echo "Your cart is empty.";
  } else {
    foreach ($cart as $product => $quantity) {
      echo "$product: $quantity<br>";
    }
  }
  ?>