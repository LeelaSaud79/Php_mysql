<?php
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];

    // Validate the form fields
    $errors = array();

    // Validate name
    if (empty($name)) {
        $errors[] = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "Only letters and white space are allowed in name";
    }


    // Validate price
    if (empty($price)) {
        $errors[] = "Price is required";
    } elseif (!is_numeric($price)) {
        $errors[] = "Price must be a numeric value";
    }

    // Validate image
    if (empty($image)) {
        $errors[] = "Image is required";
    } else {
        $allowedExtensions = array("jpg", "jpeg", "png");
        $fileExtension = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedExtensions)) {
            $errors[] = "Invalid image format. Only JPG, JPEG, and PNG are allowed";
        }
    }

    // If there are no errors, store the form data in session
    if (empty($errors)) {
        $_SESSION['name'] = $name;
        $_SESSION['price'] = $price;
        $_SESSION['image'] = $image;
        header("Location: success.php");
        exit();
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Form</title>
</head>
<body>
    <?php if (isset($_SESSION['errors'])): ?>
        <ul>
            <?php foreach ($_SESSION['errors'] as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php unset($_SESSION['errors']); ?>
    <?php endif; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Price:</label>
        <input type="text" name="price" required><br>

        <label>Image:</label>
        <input type="file" name="image" accept="image/*" required><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
