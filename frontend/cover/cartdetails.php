<?php 
include 'navbar.php';?>

<!DOCTYPE html>
<html>

<head>
    <title>Cart Details</title>
    <style>
        h1 {
            text-align: center;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .cart-table th,
        .cart-table td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ccc;
        }

        .cart-table th {
            background-color: lightgray;
            font-weight: bold;
        }

        .cart-table img {
            max-width: 50px;
            max-height: 50px;
        }
    </style>
</head>

<body>
    <h1>Cart Details</h1>
    <div id="cartItemsContainer"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Retrieve the cart items from cookies
            var cartItems = getCartItems();

            // Display the cart items
            displayCartItems(cartItems);

            // Get the cart items from cookies
            function getCartItems() {
                var cartItems = [];
                var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)cartItems\s*\=\s*([^;]*).*$)|^.*$/, "$1");
                if (cookieValue) {
                    cartItems = JSON.parse(decodeURIComponent(cookieValue));
                }
                return cartItems;
            }

            // Display the cart items on the page
            function displayCartItems(cartItems) {
                var container = $('#cartItemsContainer');

                if (cartItems.length > 0) {
                    // Create a table to display the cart items
                    var table = $('<table></table>').addClass('cart-table');
                    var tableHeader = $('<tr></tr>').append('<th>Name</th><th>Price</th><th>Image</th><th>Quantity</th><th>Total</th><th>Actions</th>');
                    table.append(tableHeader);

                    var total = 0;

                    // Loop through the cart items and add rows to the table
                    for (var i = 0; i < cartItems.length; i++) {
                        var item = cartItems[i];

                        // Create a row for each item
                        var row = $('<tr></tr>');
                        row.append('<td>' + item.name + '</td>');
                        row.append('<td>' + item.price + '</td>');
                        row.append('<td><img src="' + item.image + '" alt="Image" width="50px" height="50px"></td>');
                        row.append('<td><button onclick="updateQuantity(' + i + ', -1)">-</button> ' + item.quantity + ' <button onclick="updateQuantity(' + i + ', 1)">+</button></td>');
                        row.append('<td>' + (item.price * item.quantity) + '</td>');
                        row.append('<td><button onclick="removeItem(' + i + ')">Remove</button></td>');

                        table.append(row);

                        total += item.price * item.quantity;
                    }

                    container.append(table);
                    container.append('<p>Total: Rs. ' + total + '</p>');

                    // Add the checkout button
                    var checkoutButton = $('<button></button>').text('Checkout');
                    checkoutButton.click(function () {
                        location.href = 'checkout.php';
                    });
                    container.append(checkoutButton);
                } else {
                    container.text('No items in the cart');
                }
            }


            // Function to remove an item from the cart
            window.removeItem = function (index) {
                var cartItems = getCartItems();

                // Remove the item from the cart items array
                cartItems.splice(index, 1);

                // Update the cart items in cookies
                setCartItems(cartItems);

                // Refresh the page to reflect the updated cart items
                location.reload();
            };

            // Function to update the quantity of an item in the cart
            window.updateQuantity = function (index, quantityChange) {
                var cartItems = getCartItems();

                // Update the quantity of the item
                cartItems[index].quantity += quantityChange;

                // Ensure the quantity stays within the valid range (1 to 5)
                if (cartItems[index].quantity < 1) {
                    cartItems[index].quantity = 1;
                } else if (cartItems[index].quantity > 5) {
                    cartItems[index].quantity = 5;
                }

                // Update the cart items in cookies
                setCartItems(cartItems);

                // Refresh the page to reflect the updated cart items
                location.reload();
            };

            function setCartItems(cartItems) {
                var cookieValue = encodeURIComponent(JSON.stringify(cartItems));
                var expirationDate = new Date();
                expirationDate.setDate(expirationDate.getDate() + 30); // Set expiration to 30 days from now
                var expires = "expires=" + expirationDate.toUTCString();
                document.cookie = 'cartItems=' + cookieValue + '; path=/; ' + expires;
            }
        });
    </script>
</body>

</html>