
<?php
session_start();

$_SESSION['message']="You have been successfully logged out";
$_SESSION['admin_email']=null;
$_SESSION['password']=null;
session_destroy();
header('location:login.php');
