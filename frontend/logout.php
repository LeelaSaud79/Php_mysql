<?php


session_start();

if($_SESSION['username']){
    echo "welcome user " . $_SESSION['username'];
}
else{
header('location:login.php');
}
?>
<a href="logout.php">Log Out</a>


// session_start();
// session_destroy();
// header('location: login.php');
// exit;

