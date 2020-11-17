<?php

//var_dump($_GET);die();
session_start();
use App\Auth\Auth;
use App\Message\Message;
use App\User\User;
use App\Supershop\Supershop;

include_once ('../../src/Auth/Auth.php');
include_once ('../../src/User/User.php');
include_once ('../../src/Message/Message.php');
include_once ('../../src/Supershop/Supershop.php');

$delete=new Supershop();
$delete->prepare($_GET);
$check=$delete->deleteProduct();
//var_dump($check);die();
if ($check) {
    $_SESSION['message']= "Your Data has been Deleted";

    //var_dump($_SESSION['admin_email']);die();
    header('location:index.php');
}else {
    $_SESSION['message']= "Failed! Data deletion failed";
    header('location:index.php');
}