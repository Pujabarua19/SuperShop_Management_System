
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
        <div class="col-md-3 left_col menu_fixed">
            <div class="left_col scroll-view"  >
                <div class="navbar nav_title" style="border: 0">
                <a  class="site_title"><i class="fa fa-paw"></i> <span> Supershop </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
                <div class="profile_pic">
                    <img src="../../resources/images/user.png" alt="not image" class="img-circle profile_img">
                </div>
                <div class="profile_info">
                    <h2>Welcome</h2>
                    <h1 style="color: rgb(244,245,255);">Shajid</h1>
                </div>
            </div>
            <!-- /menu profile quick info -->


            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu"  >
                <div class="menu_section">
                    <h3>.....................................................</h3>


                    <ul class="nav side-menu " >
                        <li><a href="../User/productList.php" style="text-align: center">Product List </a></li>
                        <li><a href="../User/productSell.php" style=";text-align: center">Product sell </a></li>
                        <li><a href="customers.php" style="text-align: center">Customers </a></li>


                    </ul>
                </div>

            </div>

        </div>
    </div>

    <?php include('../User/top_navigation.php'); ?>

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="row" style="margin: 5%">

                    <h3 style="text-align: center"> <small>  <strong>Customers List</strong></small></h3>
                    <table class="table table-bordered">
                        <tr >
                            <th style="text-align: center">Customer Name</th>
                            <th style="text-align: center">Product Name</th>
                            <th style="text-align: center">Date</th>

                        </tr>
                        <tr style="text-align: center">
                            <td>s</td>
                            <td>ss</td>
                            <td>ss</td>

                        </tr>
                    </table>
                </div>
            </div>

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