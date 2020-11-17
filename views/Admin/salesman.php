<?php

// session_start();

// if (empty($_SESSION['admin_email']) || is_null($_SESSION['admin_email'])) {
//     header('location:login.php');
// }
use App\Auth\Auth;
use App\Message\Message;
use App\User\User;
use App\Supershop\Supershop;

include_once ('../../src/Auth/Auth.php');
include_once ('../../src/User/User.php');
include_once ('../../src/Message/Message.php');
include_once ('../../src/Supershop/Supershop.php');


$salesman = new Supershop();

$allSalesman = $salesman->getAllSalesman();



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
                    <h1 style="color: rgb(244,245,255);"> </h1>
                </div>
            </div>
            <!-- /menu profile quick info -->


            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu"  >
                <div class="menu_section">
                    <h3></h3>


                    <ul class="nav side-menu " >
                        <li><a href="index.php" style="text-align: center">Products</a></li>
                        <li><a href="stocks.php" style="text-align: center">Stocks</a></li>
                        <li><a href="salesman.php" style="text-align: center">Salesman</a></li>
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

                        <!-- MODAL ADD PRODUCT -->

                        <div class="modal fade" data-toggle="modal" id="modalAddProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center" style="background-color: #0ac198;color: white">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title w-50 font-bold" >ADD Salesman</h4>

                                    </div>
                                    <form action="addSalesman.php" method="post">
                                        <div class="modal-body mx-3">
                                            <div class="md-form">
                                                <label data-error="wrong" data-success="right" for="defaultForm-email">Salesman Id</label>
                                                <input name="salesman_id" type="text" id="defaultId" class="form-control validate" >
                                            </div>
                                            <div class="md-form">
                                                <label data-error="wrong" data-success="right" for="defaultForm-email">Name</label>
                                                <input name="name" type="text" id="defaultId" class="form-control validate" >
                                            </div>
                                            <div class="md-form">
                                                <label data-error="wrong" data-success="right" for="defaultForm-email">Mobile</label>
                                                <input name="mobile" type="text" id="defaultId" class="form-control validate" >
                                            </div>
                                            <div class="md-form">
                                                <label data-error="wrong" data-success="right" for="defaultForm-email">Gender</label>
                                                <select name="gender" class="form-control" >
                                                        <option  value="male">Male</option>
                                                        <option value="female">Female</option>
                                                </select>
                                            </div>
                                            <div class="md-form">
                                                <label data-error="wrong" data-success="right" for="defaultForm-email">Username</label>
                                                <input name="username" type="text" id="defaultId" class="form-control validate">
                                            </div>
                                            <div class="md-form">
                                                <label data-error="wrong" data-success="right" for="defaultForm-email">Email</label>
                                                <input name="email" type="email" id="defaultId" class="form-control validate">
                                            </div>
                                            <div class="md-form">
                                                <label data-error="wrong" data-success="right" for="defaultForm-email">Salary</label>
                                                <input name="salary" type="number" id="defaultId" class="form-control validate">
                                            </div>
                                            <div class="md-form">
                                                <label data-error="wrong" data-success="right" for="defaultForm-email">Address</label>
                                                <input name="address" type="text" id="defaultId" class="form-control validate">
                                            </div>
                                            <div class="md-form">
                                                <label data-error="wrong" data-success="right" for="defaultForm-email">Password</label>
                                                <input name="password" type="password" id="defaultId" class="form-control validate">
                                            </div>
                                        </div>
                                        <div class="" style="text-align: center">
                                            <button type="submit" class="btn btn-success btn-round" style="alignment: center">Add Salesman</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <a data-toggle="modal" href="" type="button" data-target="#modalAddProduct" class="btn btn-primary btn-round btn-sm" style="margin-top: 3%;alignment: center"> Add Salesman</a>



                    </div>
                    <div class="col-md-4">
                        <h3 style="text-align: center"> <small>  <strong>Product List</strong></small></h3>
                    </div>

                </div>
                <table class="table table-bordered" style="alignment: center">
                    <tr>
                        <th>Salesman Id</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Salary</th>
                        <th>Address</th>
                        <th style="text-align: center">Button</th>

                    </tr>
                    <?php foreach ($allSalesman as $man){ ?>
                        <tr >
                            <td><?php echo $man['salesman_id']?></td>
                            <td><?php echo $man['name']?></td>
                            <td><?php echo $man['gender']?></td>
                            <td><?php echo $man['mobile']?></td>
                            <td><?php echo $man['email']?></td>
                            <td><?php echo $man['username']?></td>
                            <td><?php echo $man['salary']?></td>
                            <td><?php echo $man['address']?></td>
                            <td class="center">
                                <a href="deleteSalesman.php?id=<?php echo $man['id']?>" class="btn btn-danger btn-round" >DELETE</a>
                            </td>
                        </tr>
                    <?php } ?>


                </table>


            </div>
        </div>


    <!-- /page content -->

    <!-- footer content -->
    <footer>

        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
</div>


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