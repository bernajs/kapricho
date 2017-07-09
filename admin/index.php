<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>Kaprichos - Admin</title>
  <link rel="apple-touch-icon" href="assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/fonts/feather/style.min.css">
  <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/fonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" type="text/css" href="assets/vendors/css/extensions/pace.css">
  <link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-extended.css">
  <link rel="stylesheet" type="text/css" href="assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="assets/css/colors.css">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/core/menu/menu-types/horizontal-menu.css">
  <link rel="stylesheet" type="text/css" href="assets/css/core/menu/menu-types/vertical-overlay-menu.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
  <!-- END Custom CSS-->
  <!-- BEGIN VENDOR JS-->
  <script src="assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
</head>
  <body data-open="click" data-menu="horizontal-menu" data-col="2-columns" class="horizontal-layout horizontal-menu 2-columns ">

    <!-- navbar-fixed-top-->


    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- Horizontal navigation-->
    <div role="navigation" data-menu="menu-wrapper" class="header-navbar navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-bordered navbar-shadow menu-border">
      <!-- Horizontal menu content-->
      <div data-menu="menu-container" class="navbar-container main-menu-content container center-layout">
        <!-- include ../../../includes/mixins-->
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="nav navbar-nav">
          <li class="dropdown nav-item"><a href="index.php" class="dropdown-toggle nav-link"><i class="ft-home"></i><span>Dashboard</span></a></li>
          <li class="dropdown nav-item"><a href="index.php?call=categoria" class="dropdown-toggle nav-link"><i class="ft-home"></i><span>Categoria</span></a></li>
          <li class="dropdown nav-item"><a href="index.php?call=compra" class="dropdown-toggle nav-link"><i class="ft-home"></i><span>Compras</span></a></li>
          <li class="dropdown nav-item"><a href="index.php?call=compra&pending=true" class="dropdown-toggle nav-link"><i class="ft-home"></i><span>Compras pendientes</span></a></li>
          <li class="dropdown nav-item"><a href="index.php?call=producto" class="dropdown-toggle nav-link"><i class="ft-home"></i><span>Productos</span></a></li>
          <li class="dropdown nav-item"><a href="index.php?call=promocion" class="dropdown-toggle nav-link"><i class="ft-home"></i><span>Promociones</span></a></li>
          <li class="dropdown nav-item"><a href="index.php?call=quinta" class="dropdown-toggle nav-link"><i class="ft-home"></i><span>Usuarios</span></a></li>
          <li class="dropdown nav-item"><a href="index.php" class="dropdown-toggle nav-link"><i class="ft-home"></i><span>Staff</span></a></li>

          <!-- <li data-menu="dropdown" class="dropdown nav-item"><a href="index.html" data-toggle="dropdown" class="dropdown-toggle nav-link"><i class="ft-home"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
              <li data-menu=""><a href="dashboard-ecommerce.html" data-toggle="dropdown" class="dropdown-item">eCommerce</a>
              </li>
              <li data-menu=""><a href="dashboard-analytics.html" data-toggle="dropdown" class="dropdown-item">Analytics</a>
              </li>
              <li data-menu=""><a href="dashboard-fitness.html" data-toggle="dropdown" class="dropdown-item">Fitness</a>
              </li>
            </ul>
          </li> -->
        </ul>
      </div>
      <!-- /horizontal menu content-->
    </div>
    <!-- Horizontal navigation-->
    <div class="app-content container center-layout mt-2">
      <div class="content-wrapper">
        <div class="content-header row">
          <!-- <div class="content-header-left col-md-12 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Card Actions</h3>
          </div> -->
        </div>
        <div class="content-body"><!-- card actions section start -->
    <section id="card-actions">
    	<div class="row">
    		<div class="col-xs-12">
          <?php
            if(isset($_GET['call'])){
            if(file_exists('views/view.'.$_GET['call'].'.php')){ include('views/view.'.$_GET['call'].'.php'); }else{ include('views/view.dashboard.php'); }
            }else{
            include('views/view.dashboard.php');
            }
            ?>
    		</div>
    	</div>
    </section>
        </div>
      </div>

      <div class="modal fade text-xs-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-container container">

          </div>
          <!-- <div class="modal-content">
          </div> -->
        </div>
    </div>
    </div>

    <footer class="footer footer-static footer-light navbar-shadow">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="http://www.mobkii.com" target="_blank" class="text-bold-800 grey darken-2">MOBKII </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script type="text/javascript" src="assets/vendors/js/ui/jquery.sticky.js"></script>
    <script type="text/javascript" src="assets/vendors/js/charts/jquery.sparkline.min.js"></script>
    <script src="assets/vendors/js/tables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN STACK JS-->
    <script src="assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="assets/js/core/app.js" type="text/javascript"></script>
    <!-- END STACK JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script type="text/javascript" src="assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
    <script src="assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>
    <script src="assets/js/scripts/modal/components-modal.js" type="text/javascript"></script>
    <script src="js/app.js" type="text/javascript"></script>

    <!-- END PAGE LEVEL JS-->

    <script type="text/javascript">
      $(document).ready(function(){
        $('.onModal').click(function(e){
          e.preventDefault();
          $(".modal-container").load($(this).attr("href"), function() {
            $('#default').modal();
          });
        })
    })
    </script>

  </body>
</html>
