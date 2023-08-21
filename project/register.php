<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a database connection established
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the values submitted in the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];
    $number = $_POST['number'];



    // Example validation: Check if passwords match
    if ($password !== $confirmPassword) {
        $error_message = "Passwords do not match.";
    } else {
        // Insert the user data into the database
        $sql = "INSERT INTO registration (name, email, gender, password, confirmpassword, phone_number) VALUES
         ('$name', '$email', '$gender', '$password',' $confirmPassword', '$number')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful, set session variables or perform any necessary tasks
            $_SESSION['id'] = $conn->insert_id;

            // Redirect to the home page or any other desired page
            header("Location: register.php");
            exit();
        } else {
            // Error occurred while inserting the data
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
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
    <title>Register Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">

    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var gender = document.querySelector('input[name="gender"]:checked');
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmpassword").value;
            var number = document.getElementById("number").value;

            // Check if name is empty
            if (name === "") {
                alert("Please enter your name.");
                return false;
            }

            // Check if email is empty
            if (email === "") {
                alert("Please enter your email.");
                return false;
            }

            // Check if gender is selected
            if (!gender) {
                alert("Please select your gender.");
                return false;
            }

            // Check if password is empty
            if (password === "") {
                alert("Please enter a password.");
                return false;
            }

            // Check if confirm password is empty
            if (confirmPassword === "") {
                alert("Please confirm your password.");
                return false;
            }

            // Check if password and confirm password match
            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }

            // Check if phone number contains only numbers
            if (!/^\d+$/.test(number)) {
                alert("Phone number should contain only numbers.");
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    <div class="form-container">
        <h2>Register Form</h2>
        <form action="" method="POST" onsubmit="return validateForm()">

            <div class="form-outline mb-4">
                <input type="text" name="name" id="name" class="form-control" required />
                <label for="name" class="form-label">Full Name<span class="mandatory">*</span></label>
            </div>

            <div class="form-outline mb-4">
                <input type="email" name="email" id="email" class="form-control" required />
                <label for="email" class="form-label">Email<span class="mandatory">*</span></label>
            </div>

            <div class="form-group">
                <label for="gender">Gender<span class="mandatory">*</span></label>
                <div>
                    <label for="male" class="form-check-inline">
                        <input type="radio" name="gender" id="male" value="male" required> Male
                    </label>
                    <label for="female" class="form-check-inline">
                        <input type="radio" name="gender" id="female" value="female" required> Female
                    </label>
                    <label for="other" class="form-check-inline">
                        <input type="radio" name="gender" id="other" value="other" required> Others
                    </label>
                </div>
            </div>

            <div class="form-outline mb-4">
                <input type="password" name="password" id="password" class="form-control" required />
                <label for="password" class="form-label">Password<span class="mandatory">*</span></label>
            </div>

            <div class="form-outline mb-4">
                <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" required />
                <label for="confirmpassword" class="form-label">Confirm Password<span class="mandatory">*</span></label>
            </div>

            <div class="form-outline mb-4">
                <input type="tel" name="number" id="number" class="form-control" required />
                <label for="number" class="form-label">Phone Number<span class="mandatory">*</span></label>
            </div>

            <button type="submit" class="btn btn-primary btn-floating mb-4">Submit</button>

            <!-- Display error message if any -->
            <?php
            if (isset($error_message)) {
                echo '<div class="alert alert-danger">' . $error_message . '</div>';
            }
            ?>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>

</html>