<?php

include_once "./config/dbconnect.php";

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
</head>

<!-- nav -->
<nav class="navbar navbar-expand-lg navbar-dark px-5" style="background-color: #3B3131;">

    <a class="navbar-brand ml-5" href="./index.php">
        <img src="logo.png" width="80" height="80" alt="Collection">
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>

    <div class="user-cart">
        <?php
        if (isset($_SESSION['user_id'])) {
            ?>
            <a href="" style="text-decoration:none;">
                <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>
            <?php
        } else {
            ?>
            <a href="" style="text-decoration:none;">
                <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>

            <?php
        } ?>
    </div>
</nav>

</html>