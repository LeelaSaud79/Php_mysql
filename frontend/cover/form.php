<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a database connection established
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "comm";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the values submitted in the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare a SQL query to fetch user data based on the submitted email
    $sql = "SELECT * FROM registration WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result) {
        // Query executed successfully, check if user exists
        if ($result->num_rows > 0) {
            // User found, check the password
            $user = $result->fetch_assoc();
            if ($user['password'] == $password) {
                // Password matches, set session variables or perform any necessary tasks
                $_SESSION['user_id'] = $user['id'];

                // Redirect to the home page
                header("Location: http://localhost/frontend/cover/");
                exit();
            }
        }
    } else {
        // Query execution failed
        echo "Error: " . $conn->error;
    }

    // Incorrect username or password
    $error_message = "Incorrect username or password.";

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
    <title>form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="stylee.css">
</head>

<body>
    <div class="form-container">
        <h2>Sign In</h2>
        <form action="" method="POST">
            <div class="form-outline mb-4">
                <input type="email" name="email" id="email" class="form-control" />
                <label for="email" class="form-label">Email</label>
            </div>

            <div class="form-outline mb-4">
                <input type="password" name="password" id="password" class="form-control" autocomplete="new-email" />
                <label for="password" class="form-label">Password</label>
            </div>

            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checked" checked />
                        <label for="checked" class="form-check-label">Remember me</label>
                    </div>
                </div>

                <div class="col">
                    <a href="#">Forget Password</a>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-floating mb-4">Sign in</button>

            <!-- Register button -->
            <div class="text-center">
                <p>Not a member? <a href="registerform.php">Register</a></p>
                <p>or sign up with:</p>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                </button>
            </div>
        </form>
        <?php
        if (isset($error_message)) {
            echo '<div class="alert alert-danger">' . $error_message . '</div>';
        }
        ?>
    </div>
</body>

</html>