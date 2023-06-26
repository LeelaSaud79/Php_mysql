<!DOCTYPE html>
<html>
    <?php
    session_start();
    ?>

<head>
    <title>Frontend</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightgray;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        h2 {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <form action="retrivedata.php" method="POST">
        <!-- Billing Details -->
        <h2>Billing details</h2>
        <label for="billing_name">Billing Name:</label>
        <input type="text" name="billing_name" id="billing_name" required>
        <br><br>
        <label for="billing_address">Billing Address:</label>
        <textarea name="billing_address" id="billing_address" required></textarea>
        <br><br>

        <!-- Shipment Details -->
        <h2>Shipment details</h2>
        <label for="shipping_name">Shipping Name:</label>
        <input type="text" name="shipping_name" id="shipping_name" required>
        <br><br>
        <label for="shipping_address">Shipping Address:</label>
        <textarea name="shipping_address" id="shipping_address" required></textarea>
        <br><br>


         <!-- Order Items -->
    <!-- <h2>Order items</h2> -->
        <!-- <label for="product_ids">Product IDs:</label>
        <input type="text" name="product_ids" id="product_ids" required>
        <br><br>
        <label for="quantities">Quantities:</label>
        <input type="text" name="quantities" id="quantities" required>
        <br><br> -->
    


        <!-- Submit Button -->
        <input type="submit" value="Submit Details">
    </form>
</body>

</html>
