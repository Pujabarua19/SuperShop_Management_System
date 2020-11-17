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


$product = new Supershop();
$allCategory = $product->getAllCategory();

$allBrand = $product->getAllBrand();

$allProducts = $product->getAllProducts();



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

                    <!-- MODAL ADD CATEGORY -->
                    <div class="modal fade" data-toggle="modal" id="modalAddCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center" style="background-color: #0ac198;color: white">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title w-100 font-bold">ADD CATEGORY</h4>

                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <form action="addCategories.php" method="post">
                                            <div class="modal-body ">

                                                <div class="md-form col-8 offset-2">
                                                    <input name="cat_name" type="text" id="defaultId" class="form-control validate">
                                                    <label data-error="wrong" data-success="right" for="defaultForm-email">Category name</label>
                                                </div>

                                                <div class="md-form">

                                                    <input name="sub_cat_name" type="text" id="defaultId" class="form-control validate">
                                                    <label data-error="wrong" data-success="right" for="defaultForm-email">Sub Category name</label>
                                                </div>

                                                <div class="md-form">

                                                    <input name="brand" type="text" id="defaultId" class="form-control validate">
                                                    <label data-error="wrong" data-success="right" for="defaultForm-email">Brand name</label>
                                                </div>


                                            </div>
                                            <div class="" style="text-align: center">
                                                <button href="" class="btn btn-success btn-round" style="alignment: center">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <a data-toggle="modal" href="" type="button" data-target="#modalAddCategory" class="btn btn-warning btn-round btn-sm" style="margin-top: 3%;alignment: center"> Add Category</a>


                    <!-- MODAL ADD PRODUCT -->

                    <div class="modal fade" data-toggle="modal" id="modalAddProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center" style="background-color: #0ac198;color: white">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title w-50 font-bold" >ADD PRODUCT</h4>

                                </div>
                                <form action="addProduct.php" method="post">
                                <div class="modal-body mx-3">
                                    <div class="md-form">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">Product Code</label>
                                        <input name="p_code" type="text" id="defaultId" class="form-control validate" >
                                    </div>
                                    <div class="md-form">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">Product Name</label>
                                        <input name="p_name" type="text" id="defaultId" class="form-control validate" >
                                    </div>
                                    <div class="md-form">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">Category</label>
                                        <select name="p_category" class="form-control" >
                                            <?php foreach ($allCategory as $cat){ ?>
                                            <option value="<?php echo $cat['cat_name']?>"><?php echo $cat['cat_name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="md-form">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">Brand</label>
                                        <select name="brand" class="form-control" >
                                            <?php foreach ($allBrand as $brand){ ?>
                                                <option value="<?php echo $brand['brand']?>"><?php echo $brand['brand']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="md-form">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">Buying Price</label>
                                        <input name="buying_price" type="text" id="defaultId" class="form-control validate">
                                    </div>
                                    <div class="md-form">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">Selling Price</label>
                                        <input name="selling_price" type="text" id="defaultId" class="form-control validate">
                                    </div>
                                    <div class="md-form">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">Quantity</label>
                                        <input name="quantity" min="1" max="1" type="number" id="defaultId" class="form-control validate">
                                    </div>
                                    <div class="md-form">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">Stocks</label>
                                        <input name="stocks" type="number" id="defaultId" class="form-control validate">
                                    </div>
                                    <div class="md-form">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">Product Description</label>
                                        <input name="details" type="text" id="defaultId" class="form-control validate">
                                    </div>
                                </div>
                                <div class="" style="text-align: center">
                                    <button type="submit" class="btn btn-success btn-round" style="alignment: center">Add Product</button>
                                </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <a data-toggle="modal" href="" type="button" data-target="#modalAddProduct" class="btn btn-primary btn-round btn-sm" style="margin-top: 3%;alignment: center"> Add Product</a>



                </div>
                <div class="col-md-4">
                    <h3 style="text-align: center"> <small>  <strong>Product List</strong></small></h3>
                </div>

            </div>
            <table class="table table-bordered" style="alignment: center">
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>P Code</th>
                    <th>Product Name</th>
                    <th>Brand Name</th>
                    <th>Quantity</th>
                    <th>stocks</th>
                    <th>Buying Price</th>
                    <th>Selling Price</th>
                    <th>Details</th>
                    <th style="text-align: center">Button</th>

                </tr>
                <?php foreach ($allProducts as $product){ ?>
                <tr >
                    <td><?php echo $product['id']?></td>
                    <td><?php echo $product['p_category']?></td>
                    <td><?php echo $product['p_code']?></td>
                    <td><?php echo $product['p_name']?></td>
                    <td><?php echo $product['brand']?></td>
                    <td><?php echo $product['quantity']?></td>
                    <td><?php echo $product['stocks']?></td>
                    <td><?php echo $product['buying_price']?></td>
                    <td><?php echo $product['selling_price']?></td>
                    <td><?php echo $product['details']?></td>
                    <td class="center">
                        <a href="deleteProduct.php?id=<?php echo $product['id']?>" class="btn btn-danger btn-round" >DELETE</a>
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