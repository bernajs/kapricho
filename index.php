<?php
include_once('admin/_class/class.service.php');
include_once('_inc/inc.head.php');
$Service = new Service();
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
                    <div class="col-sm-6">
                        <ul class="list-inline pull-right">
                            <li><a href="#"><i class="material-icons">perm_identity</i>Iniciar sesión</a></li>
                            <li><a href="#"><i class="material-icons">favorite_border</i> Mi lista de desesos (0)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--end top bar-->
        <!-- Static navbar -->
        <nav class="navbar navbar-default navbar-static-top yamm sticky-header">
            <div class="container">
                <div class="pull-right">
                    <ul class="right-icon-nav nav navbar-nav list-inline">
                        <li class="cart-nav"><a href="javascript:void(0)" data-toggle="offcanvas" data-target="#cartNavmenu" data-canvas="body"><i class="material-icons">shopping_cart</i> <span class="label label-primary">3</span></a></li>
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
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt=""></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Inicio</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages  <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="page-empty.html">Empty page</a></li><li><a href="about.html">About us</a></li>
                                <li><a href="contact.html">Contact </a></li><li><a href="contact-v2.html">Contact v2</a></li>
                                <li><a href="error-404.html">Error 404</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="register.html">Register</a></li>

                                <li><a href="help-center.html">Help center</a></li>
                            </ul>
                        </li>
                        <!--mega menu-->
                        <li class="dropdown yamm-fw">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop  <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="yamm-content">

                                        <div class="row">

                                            <div class="col-sm-4">
                                                <h3 class="heading">Category View</h3>
                                                <ul class="mega-menu-list list-unstyled nav">
                                                    <li><a href="cat-grid-2col.html">Grid 2 columns</a></li>
                                                    <li><a href="cat-grid-3col.html">Grid 3 columns</a></li>
                                                    <li><a href="cat-grid-4col.html">Grid 4 columns</a></li>
                                                    <li><a href="cat-grid-masonry.html">Grid Masonry</a></li>
                                                    <li><a href="cat-list-left-sidebar.html">Left sidebar (List)</a></li>
                                                    <li><a href="cat-list-right-sidebar.html">Right Sidebar (List)</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 class="heading">Shop Pages </h3>
                                                <ul class="mega-menu-list list-unstyled nav">
                                                    <li><a href="product-detail-1.html">Product Detail 1</a></li>

                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>

                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                    <li><a href="order-track.html">Order Tracking</a></li>
                                                </ul>

                                            </div>
                                            <div class="col-sm-4">
                                                <h3 class="heading">Elements</h3>
                                                <ul class="mega-menu-list list-unstyled nav">
                                                    <li><a href="typography.html">Typography</a></li>
                                                    <li><a href="buttons.html">Buttons</a></li>
                                                    <li><a href="testimonials.html">Testimonials</a></li>
                                                    <li><a href="modals.html">Modals</a></li>
                                                    <li><a href="tab-accordion.html">Tabs & accordions</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li> <!--menu Features li end here-->
                        <li><a href="blog.html">Blog</a></li>

                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
        <!--cart menu side panel-->
        <aside id="cartNavmenu" class="navmenu navmenu-default navmenu-fixed-right offcanvas">
            <div class="cart-inner">
                <h4>Your cart (3)</h4>
                <hr>
                <ul class="list-unstyled cart-list margin-b-30">
                    <li class="clearfix">
                        <div class="cart-thumb">
                            <a href="#">
                                <img src="images/products/thumb3.jpg" alt="" class="img-responsive" width="60">
                            </a>
                        </div>
                        <div class="cart-content">
                            <span class="close"><i class="fa fa-times"></i></span>
                            <h5><a href="#">Dip-Dye Tote Bag</a></h5>
                            <p><span class="price">$48.00</span>  x 2</p>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="cart-thumb">
                            <a href="#">
                                <img src="images/products/thumb1.jpg" alt="" class="img-responsive" width="60">
                            </a>
                        </div>
                        <div class="cart-content">
                            <span class="close"><i class="fa fa-times"></i></span>
                            <h5><a href="#">Nackless Jewelery</a></h5>
                            <p><span class="price">$48.00</span>  x 2</p>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="cart-thumb">
                            <a href="#">
                                <img src="images/products/thumb2.jpg" alt="" class="img-responsive" width="60">
                            </a>
                        </div>
                        <div class="cart-content">
                            <span class="close"><i class="fa fa-times"></i></span>
                            <h5><a href="#">10-Unit System Chair</a></h5>
                            <p><span class="price">$48.00</span>  x 2</p>
                        </div>
                    </li>
                    <li>
                        <div class="text-center">
                            <a href="checkout.html" class="btn btn-default">Checkout</a>
                            <a href="cart.html" class="btn btn-primary">View Cart</a>
                        </div>
                    </li>
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
        <!--page template scripts-->
        <script src="plugins/masterslider/masterslider.min.js"></script>
        <script>
            (function ($) {
                "use strict";
                var slider = new MasterSlider();
                // adds Arrows navigation control to the slider.

                slider.control('timebar', {insertTo: '#masterslider'});
                slider.control('bullets');

                slider.setup('masterslider', {
                    width: 1170, // slider standard width
                    height: 510, // slider standard height
                    space: 0,
                    layout: 'fullwidth',
                    loop: true,
                    preload: 0,
                    instantStartLayers: true,
                    autoplay: true
                });
            })(jQuery);
        </script>
    </body>
</html>
