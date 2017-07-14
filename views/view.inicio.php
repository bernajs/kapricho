<?php
  $categorias = $Service->get_categorias(1);
  $promociones = $Service->get_promociones_activas();
  $productos = $Service->get_productos_destacados();


  $buffer_promocion = '';
  if($promociones){ foreach ($promociones as $promocion) {
    // $buffer_promocion .= '<img class="img-fluid" src="admin/uploads/promocion/'.$promocion['imagen'].'">';
    $buffer_promocion .= '<div class="ms-slide slide-1" data-delay="8">
                  <!-- slide background -->
                  <img src="admin/uploads/promocion/'.$promocion['imagen'].'" data-src="admin/uploads/promocion/'.$promocion['imagen'].'" alt="Slide1 background"/>
                  <h3 class="ms-layer full-width title1 white-color text-center"
                      style="left:0px;top: 180px;"
                      data-type="text"
                      data-effect="fade"
                      data-duration="1800"
                      data-delay="0" >'.$promocion['nombre'].'</h3>
                  <h5 class="ms-layer sub-title2 white-color full-width text-center"
                      style="left:0px; top: 260px;"
                      data-type="text"
                      data-effect="fade"
                      data-duration="1800"
                      data-delay="0"
                      >'.$promocion['descripcion'].'</h5>
                  <div class="ms-layer price-link text-center full-width"
                       style="left: 0px; top:300px;"
                       data-type="text"
                       data-effect="fade"
                       data-duration="1800"
                       data-delay="0"> <a href="#" class="btn btn-primary">Shop Now</a>
                     </div>
                </div>';
  }}
  $buffer_categoria = '';
  if($categorias){ foreach ($categorias as $categoria) {
    $buffer_categoria.= '<div class="col-sm-4 margin-b-30">
          <a class="image-box" href="index.php?call=categoria&id='.$categoria['id'].'">
              <img src="admin/uploads/categoria/'.$categoria['imagen'].'" alt="" class="img-responsive">
              <div class="img-overlay">
                  <h1>'.$categoria['nombre'].'</h1>
              </div>
          </a>
      </div>';
  }}

  $buffer_productos = '';
  if($productos){foreach ($productos as $producto) {
    $imagenes = json_decode($producto['imagenes']);
    if($imagenes[0]) $imagen = $imagenes[0]; else $imagen = $imagenes[1];
    $buffer_productos .= '<div class="col-sm-6 col-md-3">
                <div class="product-box">
                    <div class="product-thumb">
                        <img src="admin/uploads/imagenes_producto/'.$imagen.'" alt="" class="img-responsive">
                        <div class="product-overlay">
                            <span>
                                <a class="btn btn-default" href="index.php?call=producto&id='.$producto['id'].'">Ver más</a>
                                <a class="btn btn-primary addCarrito" data-id="'.$producto['id'].'">Agregar al carrito</a>
                            </span>
                        </div>
                    </div>
                    <div class="product-desc">
                        <span class="product-price pull-right">$'.number_format($producto['precio']).'</span>
                        <h5 class="product-name"><a href="#">'.$producto['nombre'].'</a></h5>
                    </div>
                </div>
            </div>';
  }}
 ?>


<div class="">
  <div class="clearfix"></div>
  <div class="slider-main" style="overflow: hidden;">
      <!-- Master Slider -->
      <div class="master-slider ms-skin-default" id="masterslider">
        <?php echo $buffer_promocion; ?>
      </div>
  </div>

  <div class="space-80"></div>
<div class="container">
    <div class="row">
      <?php echo $buffer_categoria; ?>
    </div>
</div>

<div class="space-80"></div>
<div class="container">
    <h3 class="text-uppercase font-400 title-font text-center margin-b-30">Productos destacados</h3>
    <div class="row">

    </div><!--/row-->
    <div class="row margin-b-20">
      <?php echo $buffer_productos; ?>
    </div><!--/row-->
    <div class="text-center margin-b-50">
        <a href="index.php?call=categoria" class="btn btn-link btn-lg">Ver todos</a>
    </div>
</div>
</div>
  <style media="screen">

  </style>
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('.promociones').slick({autoplay:true, speed:1000, autoplaySpeed:5000, pauseOnFocus:true,adaptiveHeight: true});
    $('.slider2').slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true,
      autoplay: true,
      pauseOnFocus:true
    });

    $('.animated').hover(function(){$(this).addClass('pulse');}, function(){$(this).removeClass('pulse');})
  })
  </script>
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
