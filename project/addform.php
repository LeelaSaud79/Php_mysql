<?php
// Start a session and connect to the database
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'dbconnect.php';

// Check if the form was submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $specialization = $_POST['specialization'];
    $yearOfExperience = $_POST['yearofexp'];
    $description = $_POST['description'];
    $query = "INSERT INTO `counsellor`(`name`, `email`, `gender`, `specialization`, `yearofexp`, `description`)
              VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare the query
    $stmt = mysqli_prepare($conn, $query);

    // Check if the query preparation was successful
    if (!$stmt) {
        echo " Something went wrong. Please try again later.";
    } else {
        // Bind the data to the query
        mysqli_stmt_bind_param($stmt, "ssssis", $name, $email, $gender, $specialization, $yearOfExperience, $description);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            echo "Your information has been added.";
        } else {
            echo "There was an issue adding your information.";
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    }
}

// Close the database connection
mysqli_close($conn);
?>
