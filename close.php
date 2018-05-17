<?php 
session_start();
$_SESSION['key']='value';
// setcookie('key','value',time()+24*3600);
header('Location:cookiecase.php');
?>