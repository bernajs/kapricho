<?php
// include_once('admin/_class/class.service.php');
include_once('_inc/inc.head.php');
if(isset($_GET['call'])) $active = $_GET['call'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Kaprichos</title>
        <!-- Common plugins -->
        <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="plugins/owl-carousel/assets/owl.carousel.css" rel="stylesheet">
        <link href="plugins/owl-carousel/assets/owl.theme.default.css" rel="stylesheet">
        <link href="plugins/icheck/skins/minimal/blue.css" rel="stylesheet">
        <!--master slider-->
        <link href="plugins/masterslider/style/masterslider.css" rel="stylesheet">
        <link href="plugins/masterslider/skins/default/style.css" rel='stylesheet'>
        <!--template css-->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script src="plugins/jquery/dist/jquery.min.js"></script>
        <script src="plugins/masterslider/masterslider.min.js"></script>
        <!-- <script src="js/app.js"></script> -->
    </head>
    <body>
        <!--pre-loader-->
        <div id="preloader"></div>
        <!--pre-loader-->
        <!--back to top-->
        <a href="#" class="scrollToTop"><i class="material-icons 48dp">keyboard_arrow_up</i></a>
        <!--back to top end-->
        <!--===========================start Header===========================-->
        <!--top bar-->
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 hidden-xs">
                        <span>En la compra de 6+ productos obten 20% de descuento en el total de tu compra</span>
                    </div>
                    <?php if(!$uid): ?>
                    <div class="col-sm-6">
                        <ul class="list-inline pull-right">
                            <li><a href="login.php"><i class="material-icons">perm_identity</i>Iniciar sesión</a></li>
                            <!-- <li><a href="#"><i class="material-icons">favorite_border</i> Mi lista de desesos (0)</a></li> -->
                        </ul>
                    </div>
                  <?php else:?>
                    <div class="col-sm-6">
                        <ul class="list-inline pull-right">
                          <li><a href="index.php?call=perfil"><i class="material-icons">perm_identity</i>Mi cuenta</a></li>
                          <li><a href="logout.php"><i class="material-icons">input</i>Cerrar sesión</a></li>
                        </ul>
                    </div>
                  <?php endif; ?>
                </div>
            </div>
        </div>
        <!--end top bar-->
        <!-- Static navbar -->
        <nav class="navbar navbar-default navbar-static-top yamm sticky-header">
            <div class="container">
                <div class="pull-right">
                    <ul class="right-icon-nav nav navbar-nav list-inline">
                        <li class="cart-nav"><a class="getCarrito" data-toggle="offcanvas" data-target="#cartNavmenu" data-canvas="body"><i class="material-icons">shopping_cart</i> <span class="label label-primary count_carrito">3</span></a></li>
                        <li class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">search</i></a>
                            <ul class="dropdown-menu search-dropdown">
                                <li>
                                    <div class="search-form">
                                        <form class="frmBuscar" role="form">
                                            <input id="buscar" name="buscar" type="text" class="form-control" placeholder="Buscar productos..">
                                            <button class="onBuscar" type="submit"><i class="material-icons">search</i></button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="images/logoka.png" alt=""></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Inicio</a>
                        </li>
                        <li class="dropdown">
                            <a href="index.php?call=categoria" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Tienda</a>
                        </li>
                        <!--mega menu-->
                        <li class="yamm-fw">
                            <a href="index.php?call=carrito" class="dropdown-toggle">Carrito</a>
                        </li>
                         <!--menu Features li end here-->
                        <!-- <li><a href="blog.html">Blog</a></li> -->

                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
        <!--cart menu side panel-->
        <aside id="cartNavmenu" class="navmenu navmenu-default navmenu-fixed-right offcanvas">
            <div class="cart-inner">
                <h4>Tu carrito <span class="cantidad_carrito"></span></h4>
                <hr>
                <ul class="list-unstyled cart-list margin-b-30">
                </ul>
            </div>
        </aside>

        <div class="">
          <?php
            if (isset($_GET['call'])) {
            if (file_exists('views/view.'.$_GET['call'].'.php')) {
              include('views/view.'.$_GET['call'].'.php');
            } else {
              include('views/view.inicio.php');
            }
            } else {
            include('views/view.inicio.php');
          }
          ?>
        </div>
        <!--footer-->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 margin-b-30">
                        <h4>Acerca de la tienda</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                        <ul class="list-inline socials">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div><!--/col-->
                    <div class="col-md-4 margin-b-30">
                        <h4>Accesos rápidos</h4>
                        <ul class="list-unstyled link-list">
                            <li><a href="index.php?call=perfil">Mi cuenta</a></li>
                            <li><a href="index.php?call=carrito">Carrito</a></li>
                            <li><a href="index.php?call=promociones">Promociones</a></li>
                            <li><a href="#">Terminos y condiciones</a></li>
                        </ul>
                    </div><!--/col-->
                    <div class="col-md-4 margin-b-30">
                        <h4>Soporte al cliente</h4>
                        <p class="lead"><small>Teléfono: </small> <br>1800 443-5493</p>
                        <p class="lead"><small>Correo: </small><br>support@boland.com</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container text-center">
                <span>&copy; Copyright <?php echo date('Y'); ?>. Todos los derechos reservados.</span>
            </div>
        </footer>
        <!--/footer-->
        <!--Common plugins-->
        <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="plugins/pace/pace.min.js"></script>
        <script src="plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
        <script src="plugins/owl-carousel/owl.carousel.min.js"></script>
        <script src="plugins/sticky/jquery.sticky.js"></script>
        <script src="plugins/icheck/icheck.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/boland.custom.js"></script>
        <script src="js/app.js"></script>
        <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>

        <!--page template scripts-->

    </body>
</html>
