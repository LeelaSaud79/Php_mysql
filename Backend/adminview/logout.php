<?php

session_start();

unset($_SESSION['username']);
unset($_SESSION['password']);
header('location:http://localhost/frontend/cover/login.php');
 ?>

 
