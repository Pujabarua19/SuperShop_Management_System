<?php

//var_dump($_POST);die();
session_start();
use App\Auth\Auth;
use App\Message\Message;
use App\User\User;
use App\Supershop\Supershop;

include_once ('../../src/Auth/Auth.php');
include_once ('../../src/User/User.php');
include_once ('../../src/Message/Message.php');
include_once ('../../src/Supershop/Supershop.php');

$category=new Supershop();
$category->prepare($_POST);
$check=$category->storeProduct();
//var_dump($check);die();
if ($check) {
    $_SESSION['message']= "Your Data has been Inserted";

    //var_dump($_SESSION['admin_email']);die();
    header('location:index.php');
}else {
    $_SESSION['message']= "Failed! Data stored failed";
    header('location:index.php');
}