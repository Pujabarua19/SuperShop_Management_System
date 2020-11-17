<?php

namespace App\Auth;

//var_dump($_POST);die();

class Auth
{
    public $id;
    public $email;
    public $password;
    public $conn;
    public $user_id;


    public function prepare($data){
        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }
        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }
        if(array_key_exists('password',$data)){
            $this->password=$data['password'];
        }
        if(array_key_exists('user_id',$data)){
            $this->user_id=$data['user_id'];
        }
    }



    public function __construct()
    {
        $this->conn=mysqli_connect("localhost","root","","supershop");
    }




    function checkAdminLogin()
    {
        $sql = "SELECT * FROM `admins` WHERE `username` = '".$this->email."' 
        and `password` = '".$this->password."'";

        //var_dump($sql);die();
        $result = mysqli_query($this->conn, $sql);
       //var_dump($result);die();
        if(mysqli_num_rows($result)>=1){
            return 2;
        }else {
            return 3;
        }
    }

    function checkSalesmanLogin()
    {
        $sql = "SELECT * FROM `salesman` WHERE `email` = '".$this->email."' 
        and `password` = '".$this->password."'";

        //var_dump($sql);die();
        $result = mysqli_query($this->conn, $sql);
       //var_dump($result);die();
        if(mysqli_num_rows($result)>=1){
            return 2;
        }else {
            return 3;
        }
    }

}