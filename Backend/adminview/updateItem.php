<!DOCTYPE html>
<html lang="en">
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

</head>

<body>

    <?php

    include '../config/dbconnect.php';
    session_start();
    // error_reporting(0);
    $ID = $_GET['Id'];
    //  var_dump($ID );
    $Record = mysqli_query($conn, "SELECT * FROM `products` WHERE prod_id = $ID");
    // echo $Record;
    $data = mysqli_fetch_array($Record);

    ?>
    <div class="container d-flex justify-content-center">
        <form action="update1.php" method="post" class="w-50" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" value="<?php echo $data['name'] ?>" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" value="<?php echo $data['price'] ?>" name="price" class="form-control">
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <td><input type="file" value="<?php echo $data['image'] ?>" name="image" class="form-control">
                    <img src="<?php echo $data['image'] ?>" width="200px" height="70px">
                </td>
                <!-- <input type="hidden" name = "Id" value="<?php echo $data['prod_id']; ?>"> -->
            </div>


            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" value="<?php echo $data['description'] ?>" name="description" class="form-control">
            </div>

            <div class="form-group">
                <label for="rating">Rating:</label>
                <input type="number" value="<?php echo $data['rating'] ?>" name="rating" class="form-control">
            </div>

            <div class="form-group">
                <label for="Additional Information">Additional Information</label>
                <?php if (isset($data['add'])) { ?>
                    <input type="text" value="<?php echo $data['add']; ?>" name="add" class="form-control">
                <?php } else { ?>
                    <input type="text" name="add" class="form-control">
                <?php } ?>
                <input type="hidden" name="Id" value="<?php echo $data['prod_id']; ?>">
            </div>


            <button type="submit" name="upload" class="btn btn-danger m-2">Update</button>
        </form>
    </div>
</body>
</html>