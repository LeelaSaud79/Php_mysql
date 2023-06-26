<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "comm");
$response = array();
if ($conn) {
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Content-Type: application/json");

        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $response[$i]['prod_id'] = $row['prod_id'];
            $response[$i]['name'] = $row['name'];
            $response[$i]['price'] = $row['price'];

            // Example of image path
            $imagePath = '../adminview/uploadimage/./adminview/uploadimage/' . $row['image'];
            // echo $imagePath;

            // Check if the image file exists
            if (file_exists($imagePath)) {
                // Read the image file
                $imageData = base64_encode(file_get_contents($imagePath));

                // Include the Base64-encoded image data in the JSON
                $response[$i]['image'] = $imageData;
            } else {
                $response[$i]['image'] = 'Image not found';
            }

            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
} else {
    echo 'Database connection failed';
}
?>
