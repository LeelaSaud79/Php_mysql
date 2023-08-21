<?php
session_start();

if (isset($_POST['login'])) {
    $conn = mysqli_connect("localhost", "root", "", "project");

    $username = mysqli_real_escape_string($conn, $_POST['username']); // Sanitize user input
    $password = mysqli_real_escape_string($conn, $_POST['password']); // Sanitize user input

    $sql = "SELECT * FROM `login` WHERE Username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $resultpassword = $row['password'];

        if ($password == $resultpassword) {
            $_SESSION['username'] = $username;
            header('Location: http://localhost/Backend/#products');
            exit;
        } else {
            echo "<script>
                alert('Login unsuccessful');
            </script>";
        }
    } else {
        echo "<script>
            alert('Username not found');
        </script>";
    }

    mysqli_close($conn); // Close the database connection
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
    <title>login</title>
    <style type="text/css">
        table {
            margin-top: 150px;
            border: 1px solid;
            background-color: #eee;

        }

        td {
            border: 0px;
            padding: 10px;
        }

        th {
            border-bottom: 1px solid;
            background-color: #ddd;
        }

        body {
            background-color: lightgray;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <form action="login.php" method="post">
        <table class="center">
            <tr>
                <th colspan="2">
                    <h2 class="center">Login</h2>
                </th>
            </tr>
            <tr>
                <td> Username:</td>
                <td><input type="text" name="username" required></td>
            </tr>

            <tr>
                <td> Password:</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td class="right" colspan="2"><input type="submit" name="login" value="login"></td>
            </tr>

        </table>
    </form>
</body>

</html>