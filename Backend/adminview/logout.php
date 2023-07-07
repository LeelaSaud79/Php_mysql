<?php
session_start();
session_destroy();
header('location: http://localhost/frontend/cover/Login.php');
exit;
?>
