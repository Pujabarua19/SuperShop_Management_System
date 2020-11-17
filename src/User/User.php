<?php
/**
 * Created by PhpStorm.
 * User: Ismail Hossain
 * Date: 6/25/2018
 * Time: 1:20 PM
 */

namespace App\User;


class User
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $mobile;
    public $ref_id;
    public $status;
    public $date;
    public $conn;
    public $user_id;


    public function prepare($data){
        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }
        if(array_key_exists('name',$data)){
            $this->name=$data['name'];
        }
        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }
        if(array_key_exists('ref_id',$data)){
            $this->ref_id=$data['ref_id'];
        }
        if(array_key_exists('password',$data)){
            $this->password=$data['password'];
        }
        if(array_key_exists('mobile',$data)){
            $this->mobile=$data['mobile'];
        }
        if(array_key_exists('status',$data)){
            $this->status=$data['status'];
        }
        if(array_key_exists('user_id',$data)){
            $this->user_id=$data['user_id'];
        }
    }

    public function __construct()
    {
        $this->conn=mysqli_connect("localhost","root","","supershop");
    }



    public function register(){
        $passHash=md5($this->password);
        $query="INSERT INTO `users` (`name`, `email`, `mobile`, `reference_id`, `password`, `status`, `join_date`) 
                VALUES ('".$this->name."', '".$this->email."', '".$this->mobile."', '".$this->ref_id."', '".$passHash."', '".$this->status."', '".$this->date."');";
        // var_dump($query);die();
        if(mysqli_query($this->conn,$query))return true;
        else return false;
    }

    public function updateUserStatus(){
        $query="UPDATE `users` SET `status` = '1' WHERE `users`.`id` = $this->user_id";
        if(mysqli_query($this->conn,$query))return true;
        else return false;
    }

    public function getUserCurrentStatus()
    {
        $query="SELECT status FROM payments WHERE user_id='".$this->user_id."'";
        if($result=mysqli_query($this->conn,$query)){
            $row=mysqli_fetch_assoc($result);
            //var_dump($row);die();
            return $row;
        }
    }


}