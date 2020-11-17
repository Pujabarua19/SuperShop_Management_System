
<?php
session_start();

$_SESSION['message']="You have been successfully logged out";
$_SESSION['email']=null;
$_SESSION['password']=null;
$_SESSION['products']=null;
session_destroy();
header('location:login.php');
