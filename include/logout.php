<?php
session_start();
$_SESSION['email']=' ';
//$_SESSION['password']=' ';
unset($_SESSION['email']);
//unset($_SESSION['password']);
session_unset();
session_destroy();
header("Location:login.php")






?>