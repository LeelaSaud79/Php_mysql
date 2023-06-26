<?php


session_start();
// Initialize the cart array
$cart = array();

function addToCart($product, $quantity) {
    global $cart;
    $cart[$product] = $quantity;
}
function removeFromCart($product) {
    global $cart;
    unset($cart[$product]);
}

function updateQuantity($product, $quantity) {
    global $cart;
    if (isset($cart[$product])) {
        $cart[$product] = $quantity;
    }
}

echo "Cart Contents:<br>";
foreach ($cart as $product => $quantity) {
    echo "$product: $quantity<br>";
}
?>
