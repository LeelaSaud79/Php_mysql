<?php
session_start();
include '../config/dbconnect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $addInfo = $_POST['add'];

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

    // Validate description
    if (empty($description)) {
        $errors[] = "Description is required";
    }

    // Validate rating
    if (empty($rating)) {
        $errors[] = "Rating is required";
    } elseif (!is_numeric($rating) || $rating < 1 || $rating > 5) {
        $errors[] = "Rating must be a numeric value between 1 and 5";
    }

    // Validate additional information
    if (empty($addInfo)) {
        $errors[] = "Additional Information is required";
    }

    // If there are no errors, store the form data in session
    if (empty($errors)) {
        $_SESSION['name'] = $name;
        $_SESSION['price'] = $price;
        $_SESSION['image'] = $image;
        $_SESSION['description'] = $description;
        $_SESSION['rating'] = $rating;
        $_SESSION['addInfo'] = $addInfo;
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: form.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PSW1MY7HB4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-PSW1MY7HB4');
</script>
    <title>Product Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: lightblue;
            padding: 10px;
            margin: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 30%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <?php if (isset($_SESSION['errors'])): ?>
    <ul>
        <?php foreach ($_SESSION['errors'] as $error): ?>
        <li>
            <?php echo $error; ?>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php unset($_SESSION['errors']); ?>
    <?php endif; ?>

    <form method="POST" action="addItem.php" enctype="multipart/form-data">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" required><br>
        </div>

        <div class="form-group">
            <label>Price:</label>
            <input type="number" name="price" required><br>
        </div>

        <div class="form-group">
            <label>Image:</label>
            <input type="file" name="image" accept="image/*" required><br>
        </div>

        <div class="form-group">
            <label>Description:</label>
            <input type="text" name="description" required><br>
        </div>

        <div class="form-group">
            <label>Rating:</label>
            <input type="number" name="rating" required><br>
        </div>

        <div class="form-group">
            <label>Additional Information:</label>
            <input type="text" name="add" required><br>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit" name="upload">
        </div>
    </form>
</body>

</html>
