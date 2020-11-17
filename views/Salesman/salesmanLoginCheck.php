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

$Auth=new Auth();
$Auth->prepare($_POST);
$check=$Auth->checkSalesmanLogin();
//var_dump($check);die();
if ($check==2) {
    $_SESSION['admin_email'] = $_POST['email'];
    $_SESSION['products'][$_GET['p_code']]=null;
    $_SESSION['message']= "Welcome to Admin Panel";

    //var_dump($_SESSION['admin_email']);die();
    header('location:index.php');
}elseif($check==3) {
    $_SESSION['message']= "Email or password incorrect";
    header('location:login.php');
}