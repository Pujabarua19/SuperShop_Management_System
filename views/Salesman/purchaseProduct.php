<?php

session_start();

//var_dump($_POST);die();
if (empty($_SESSION['admin_email']) || is_null($_SESSION['admin_email']) || !isset($_SESSION['admin_email'])) {
    header('location:login.php');
}
use App\Auth\Auth;
use App\Message\Message;
use App\User\User;
use App\Supershop\Supershop;

include_once ('../../src/Auth/Auth.php');
include_once ('../../src/User/User.php');
include_once ('../../src/Message/Message.php');
include_once ('../../src/Supershop/Supershop.php');


if(isset($_GET['p_code'])){

    $_SESSION['products'][$_GET['p_code']]['p_code'] = $_GET['p_code'];
    $_SESSION['products'][$_GET['p_code']]['p_name'] = $_GET['p_name'];
    $_SESSION['products'][$_GET['p_code']]['p_category'] = $_GET['p_category'];
    $_SESSION['products'][$_GET['p_code']]['brand'] = $_GET['brand'];
    $_SESSION['products'][$_GET['p_code']]['selling_price'] = $_GET['selling_price'];
    $_SESSION['products'][$_GET['p_code']]['quantity'] = $_GET['quantity'];
}
//
//echo '<pre>';
//    print_r($_SESSION);
//echo '</pre>';

//
$salesman = new Supershop();
$_POST['email']=$_SESSION['admin_email'];
$salesman->prepare($_POST);
$man = $salesman->getSalesmanName();
//var_dump($man);die();
//

foreach ( $_SESSION['products'] as $key => $selected){
    $_POST['p_code']=$selected['p_code'];
    $_POST['quantity']=$selected['quantity'];
    $_POST['unit_price']=$selected['selling_price'];
    $_POST['total_taka']=$selected['selling_price']*$selected['quantity'];

    if($selected['p_code']!=null){
        $store = new Supershop();
        $store->prepare($_POST);
        $store->storeSellsInfo();
    }
    else{
        echo "Data stored Failed";
    }
}





$net_amount= new Supershop();
$_POST['net_amount']=$_POST['total'];
$net_amount->prepare($_POST);
$net_amount->storeAllSellsAmounts();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>supershop!  </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <!-- <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../../resources/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md" >

<div class="container body"  >
    <div class="main_container"  >
        <div class="col-md-3 left_col menu_fixed" >
            <div class="left_col scroll-view"  >
                <div class="navbar nav_title" style="border: 0">
                    <a  class="site_title"><i class="fa fa-paw"></i> <span> Supershop </span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix" ">
                <div class="profile_pic">
                    <img src="../../resources/images/user.png" alt="not image" class="img-circle profile_img">
                </div>
                <div class="profile_info">
                    <h2>Welcome</h2>
                    <h1 style="color: rgb(244,245,255);"></h1>
                </div>
            </div>
            <!-- /menu profile quick info -->


            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu"  >
                <div class="menu_section">
                    <h3></h3>
                    <ul class="nav side-menu " >
                        <li><a href="index.php" style="text-align: center">Sells</a></li>
                    </ul>
                </div>

            </div>

        </div>
    </div>

    <?php include('top_navigation.php'); ?>

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">

                    <!-- MODAL ADD CATEGORY -->

                </div>
                <div class="col-md-4">
                    <h3 style="text-align: center" > <small>  <strong class="red">Product Purchase Details</strong></small></h3>
                    <h3 style="text-align: center" > <small>  <strong class="green">Sales Man: <span><?php foreach ($man as $sm) echo $sm['name']; ?></span></strong></small></h3>
                </div>
                <div >

                </div>

            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <table class="table table-bordered" style="alignment: center">
                        <tr class="bg-primary">
                            <th>p_code</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Unit_price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <!--                            <th>Action</th>-->
                        </tr>
                        <tbody>
                        <?php
                        $total=0;
                        foreach ($_SESSION['products'] as $key => $selected) {
                             $total= $total+ ($selected['selling_price']*$selected['quantity']);
                            ?>
                            <tr>
                                <td><?php echo $selected['p_code']?></td>
                                <td><?php echo $selected['p_name']?></td>
                                <td><?php echo $selected['p_category']?></td>
                                <td><?php echo $selected['brand']?></td>
                                <td><?php echo $selected['selling_price']?></td>
                                <td><?php echo $selected['quantity']?></td>
                                <td><?php echo $selected['quantity']*$selected['selling_price']?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="pdf.php" method="post" class="form-group">
                    <div class="row">
                        <div class="col-md-5">
                            <h4>Invoice No</h4>
                        </div>
                        <div class="col-md-7">
                            <input class="form-control text-center" value="<?php echo $_POST['invoice_no']?>"  readonly>
                        </div>
                    </div>     <div class="row">
                        <div class="col-md-5">
                            <h4>Total</h4>
                        </div>
                        <div class="col-md-7">
                            <input class="form-control text-center" value="<?php echo $_POST['total']?>"  readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <h4>Paid</h4>
                        </div>
                        <div class="col-md-7">
                            <input class="form-control text-center" value="<?php echo $_POST['paid']?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <h4>Due</h4>
                        </div>
                        <div class="col-md-7">
                            <input  class="form-control text-center"
                                    value="<?php if ($_POST['total']>$_POST['paid']) echo ($_POST['total'] - $_POST['paid']); else echo "0.00"?>"
                                    readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <h4 >Return</h4>
                        </div>
                        <div class="col-md-7">
                            <input class="form-control text-center"
                                   value="<?php if ($_POST['total']<$_POST['paid']) echo $_POST['paid']-$_POST['total']; else echo "0.00"?>"
                                   readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0" >
                            <a href="pdf.php?invoice_no=<?php echo $_POST['invoice_no'] ?>"  class="btn btn-danger form-control">Print</a>
                        </div>
                    </div>
                </form>
                </div>
            </div>



        </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer>



        <div class="clearfix"></div>
    </footer>
    <?php unset($_SESSION['products']); ?>
    <!-- /footer content -->
</div>


<script>

    $(document).ready(function() {
        //this calculates values automatically
        sum();
        $("#total, #paid").on("keydown keyup", function() {
            sum();
        });
    });

    function sum() {
        var total = document.getElementById('total').value;
        var paid = document.getElementById('paid').value;


        var result = parseInt(total) - parseInt(paid);

        var result1 = parseInt(paid) - parseInt(total);

        if (!isNaN(result)) {
            document.getElementById('due').value = result;
            document.getElementById('back').value = result1;
        }
    }


</script>




<script type="text/javascript" src="../../resources/MDB/js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../../resources/MDB/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../../resources/MDB/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../../resources/MDB/js/mdb.min.js"></script>

<!-- jQuery -->
<script src="../../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../../vendors/nprogress/nprogress.js"></script>
<!-- jQuery custom content scroller -->
<script src="../../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="../../resources/build/js/custom.min.js"></script>
</body>
</html>