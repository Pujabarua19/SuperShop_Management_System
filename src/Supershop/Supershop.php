<?php
namespace App\Supershop;
//var_dump($_POST);die();

class Supershop
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $mobile;
    public $p_name;
    public $p_code;
    public $cat_name;
    public $p_category;
    public $sub_cat_name;
    public $brand;
    public $quantity;
    public $stocks;
    public $buying_price;
    public $selling_price;
    public $salesman_id;
    public $salary;
    public $address;
    public $gender;
    public $username;
    public $conn;
    public $invoice_no;
    public $unit_price;
    public $total_taka;
    public $net_amount;
    public $size;
    public $user_id;


    public function prepare($data)
    {
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }
        if (array_key_exists('salesman_id', $data)) {
            $this->salesman_id = $data['salesman_id'];
        }
        if (array_key_exists('name', $data)) {
            $this->name = $data['name'];
        }
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = $data['password'];
        }
        if (array_key_exists('mobile', $data)) {
            $this->mobile = $data['mobile'];
        }
        if (array_key_exists('cat_name', $data)) {
            $this->cat_name = $data['cat_name'];
        }
        if (array_key_exists('p_category', $data)) {
            $this->p_category = $data['p_category'];
        }
        if (array_key_exists('sub_cat_name', $data)) {
            $this->sub_cat_name = $data['sub_cat_name'];
        }
        if (array_key_exists('brand', $data)) {
            $this->brand = $data['brand'];
        }
        if (array_key_exists('p_name', $data)) {
            $this->p_name = $data['p_name'];
        }
        if (array_key_exists('p_code', $data)) {
            $this->p_code = $data['p_code'];
        }
        if (array_key_exists('quantity', $data)) {
            $this->quantity = $data['quantity'];
        }
        if (array_key_exists('stocks', $data)) {
            $this->stocks = $data['stocks'];
        }
        if (array_key_exists('buying_price', $data)) {
            $this->buying_price = $data['buying_price'];
        }
        if (array_key_exists('selling_price', $data)) {
            $this->selling_price= $data['selling_price'];
        }
        if (array_key_exists('user_id', $data)) {
            $this->user_id = $data['user_id'];
        }
        if (array_key_exists('username', $data)) {
            $this->username = $data['username'];
        }
        if (array_key_exists('salary', $data)) {
            $this->salary = $data['salary'];
        }
        if (array_key_exists('address', $data)) {
            $this->address = $data['address'];
        }
        if (array_key_exists('gender', $data)) {
            $this->gender = $data['gender'];
        }
        if (array_key_exists('invoice_no', $data)) {
            $this->invoice_no = $data['invoice_no'];
        }
        if (array_key_exists('size', $data)) {
            $this->size = $data['size'];
        }
        if (array_key_exists('total_taka', $data)) {
            $this->total_taka = $data['total_taka'];
        }
        if (array_key_exists('unit_price', $data)) {
            $this->unit_price = $data['unit_price'];
        } if (array_key_exists('net_amount', $data)) {
            $this->net_amount = $data['net_amount'];
        }
        return $this;
    }


        public function __construct()
        {
            $this->conn = mysqli_connect("localhost", "root", "", "supershop");
        }


        public function storeCategory()
        {
            $query = "INSERT INTO `categories` (`cat_name`, `brand`, `sub_cat_name`) VALUES ('" . $this->cat_name . "', '" . $this->brand . "', '" . $this->sub_cat_name . "')";
            if (mysqli_query($this->conn, $query)) {
                return true;
            } else return false;
        }

        public function getAllCategory(){
        $category =array();

        $query="SELECT `cat_name` FROM categories";
            if($result=mysqli_query($this->conn,$query)){
                while ($row=mysqli_fetch_assoc($result)){
                    $category[]=$row;
                }
                return $category;
            }
        }
        public function getAllBrand(){
        $brand =array();

        $query="SELECT `brand` FROM categories";
            if($result=mysqli_query($this->conn,$query)){
                while ($row=mysqli_fetch_assoc($result)){
                    $brand[]=$row;
                }
                return $brand;
            }
        }

        public function storeProduct(){

            date_default_timezone_set('Asia/Dhaka');

            $date=date('Y-m-d');

            $time=date('H:i:s');

            $query="INSERT INTO `products` ( `p_code`, `p_name`, `p_category`, `brand`, `quantity`, `stocks`, `buying_price`, `selling_price`, `details`, `date`, `time`) 
VALUES ('".$this->p_code."', '".$this->p_name."', '".$this->p_category."', '".$this->brand."', '".$this->quantity."', '".$this->stocks."', '".$this->buying_price."', '".$this->selling_price."', '".$this->address."', '".$date."', '".$time."')";

            //var_dump($query);die();
            if (mysqli_query($this->conn, $query)) {
                return true;
            } else return false;

        }

        public function getAllProducts(){
            $products = array();
            $query="SELECT * From products";
            if($result=mysqli_query($this->conn,$query)){
                while ($row=mysqli_fetch_assoc($result)){
                    $products[]=$row;
                }
                return $products;
            }
        }


    public function deleteProduct(){
        $query="DELETE FROM `products` WHERE `products`.`id` = $this->id";
        if (mysqli_query($this->conn, $query)) {
            return true;
        } else return false;

    }

    public function addSalesman(){
        $query="INSERT INTO `salesman` (`salesman_id`, `name`, `mobile`, `gender`, `username`, `email`, `salary`, `address`, `password`) 
        VALUES ('".$this->salesman_id."', '".$this->name."', '".$this->mobile."', '".$this->gender."', '".$this->username."', '".$this->email."', '".$this->salary."', '".$this->address."', '".$this->password."');";
        if (mysqli_query($this->conn, $query)) {
            return true;
        } else return false;
    }

    public function getAllSalesman(){
        $salesman = array();
        $query="SELECT * From salesman";
        if($result=mysqli_query($this->conn,$query)){
            while ($row=mysqli_fetch_assoc($result)){
                $salesman[]=$row;
            }
            return $salesman;
        }
    }

    public function deleteSalesman(){
        $query="DELETE FROM `salesman` WHERE `salesman`.`id` = $this->id";
        if (mysqli_query($this->conn, $query)) {
            return true;
        } else return false;

    }

    public function getProduct(){
        $product= array();
        $query="SELECT * FROM `products` where p_code='".$this->p_code."'";
        if($result=mysqli_query($this->conn,$query)){
            while ($row=mysqli_fetch_assoc($result)){
                $product[]=$row;
            }
            return $product;
        }
    }

    public function getSalesmanName(){
        $name= array();
        $query = "SELECT name FROM `salesman` WHERE email='".$this->email."'";
        if($result=mysqli_query($this->conn,$query)){
            while ($row=mysqli_fetch_assoc($result)){
                $name[]=$row;
            }
            return $name;
        }
    }

    public function storeSellsInfo(){

        date_default_timezone_set('Asia/Dhaka');

        $date=date('Y-m-d');

        $time=date('H:i:s');

        $query= "INSERT INTO `purchases` (`invoice_no`, `p_code`, `quantity` , `unit_price`, `total_taka`, `date`, `time`) 
VALUES ('".$this->invoice_no."', '".$this->p_code."', '".$this->quantity."', '".$this->unit_price."', '".$this->total_taka."', '".$date."', '".$time."')";
        if (mysqli_query($this->conn, $query)) {
            return true;
        } else return false;
    }

    public function storeAllSellsAmounts(){

        date_default_timezone_set('Asia/Dhaka');

        $date=date('Y-m-d');

        $time=date('H:i:s');

        $query="INSERT INTO `accounts` (`invoice_no`, `net_amount`, `date`, `time`) 
                VALUES ('".$this->invoice_no."', '".$this->net_amount."', '".$date."', '".$time."')";
        if (mysqli_query($this->conn, $query)) {
            return true;
        } else return false;
    }

    public function getAllforInvoice(){

        $all=array();
        $query="SELECT purchases.p_code, purchases.invoice_no, purchases.quantity, purchases.unit_price, purchases.total_taka, products.p_name FROM purchases
                INNER JOIN products
                ON purchases.p_code=products.p_code
                WHERE purchases.invoice_no='".$this->invoice_no."'";
        //var_dump($query);die();
        if($result=mysqli_query($this->conn,$query)){
            while ($row=mysqli_fetch_object($result)){
                $all[]=$row;
            }
            return $all;
        }
    }
    public function getAllforAmounts(){

        $all=array();
        $query="SELECT * FROM accounts where invoice_no='".$this->invoice_no."'";
        //var_dump($query);die();
        if($result=mysqli_query($this->conn,$query)){
            while ($row=mysqli_fetch_object($result)){
                $all[]=$row;
            }
            return $all;
        }
    }

}