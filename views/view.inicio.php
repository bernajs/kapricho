<?php
  $categorias = $Service->get_categorias(1);
  $promociones = $Service->get_promociones_activas();


  $buffer_promocion = '';
  if($promociones){ foreach ($promociones as $promocion) {
    $buffer_promocion .= '<img class="img-fluid" src="admin/uploads/promocion/'.$promocion['imagen'].'">';
  }}
  $buffer_categoria = '';
  if($categorias){ foreach ($categorias as $categoria) {
    $buffer_categoria.= '<div class="col-4 hvr-grow animate pulse">
            <div class="card text-center">
              <img class="card-img-top img-fluid" src="admin/uploads/categoria/'.$categoria['imagen'].'">
              <div class="card-block">
                <h4 class="card-title">'.$categoria['nombre'].'</h4>
                <a href="index.php?call=categoria&id='.$categoria['id'].'" class="btn btn-secondary btn-sm btn-ver">Ver</a>
              </div>
            </div>
          </div>';
  }}
 ?>


<div class="row">
  <div class="col-12 mb-4">
    <div class="promociones">
      <?php echo $buffer_promocion; ?>
    </div>
  </div>
  <div class="col-12">
    <div class="row">
      <?php echo $buffer_categoria; ?>
    </div>
  </div>
</div>
  <style media="screen">
  .sliders{
    padding:20px!important;
    background-color: white;
    margin-top: 20px;
  }
  .slider2 .row{
    border-top: 1px solid lightgray;
  }

  .slider2 img{
    width: 100%;
    height: 100%;
  }

      /*Div servicios*/
      .servicios-destacados-title{
        margin:40px 0px;
      }


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