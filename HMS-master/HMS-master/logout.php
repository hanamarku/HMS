<?php
session_start();
session_destroy();
unset($_SESSION['username']);
unset($_SESSION['rol']);
unset($_SESSION['emri_rol']);
unset($_SESSION['status']);

if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
$username=$_COOKIE['username'];
$password=$_COOKIE['password'];
setcookie('username', '', time()-60*60*24*365);
setcookie ('password', '', time()-3600);}
header("location:index.php");
?>