<?php

session_start();
//Create a php array
$OrderProduct = [
    [
        "prod_id" => 3,
        "quantity" => 5
    ],
    [
        "prod_id" => 4,
        "quantity" => 2
    ],
    [
        "prod_id" => 7,
        "quantity" => 1
    ],
    [
        "prod_id" => 5,
        "quantity" => 2
    ]

];
// Step 2: Convert the PHP array to a JSON string
$jsonArray = json_encode($OrderProduct);

// Step 3: Optionally, you can write the JSON string to a file or send it as a response
$decodedData = json_decode($jsonArray, true);

// Accessing the decoded data
foreach ($decodedData as $product) {
    echo "Product ID: " . $product["prod_id"] . "<br>";
    echo "Quantity: " . $product["quantity"] . "<br><br>";
    echo "\n";
}
?>

