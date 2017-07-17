<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $producto = $Service->get_producto($id);
  $producto = $producto[0];
  $imagenes = json_decode($producto['imagenes']);
  if($imagenes){foreach ($imagenes as $imagen) {
    if($imagen != ''){
      $buffer_imagenes .= '<div class="ms-slide">
      <img src="plugins/masterslider/style/blank.gif" data-src="admin/uploads/imagenes_producto/'.$imagen.'" alt=""/>
      <img class="img-responsive ms-thumb" src="admin/uploads/imagenes_producto/'.$imagen.'" alt="thumb" />
      </div>';}
    }}
  $buffer = '<div class="row">
        <div class="col-sm-7 margin-b-40">
            <!-- master slider template -->
            <div class="ms-showcase2-template ms-showcase2-vertical">
                <!-- master slider -->
                <div class="master-slider ms-skin-default" id="masterslider">
                '.$buffer_imagenes.'
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="item-description">
                <h3>'.$producto['nombre'].'</h3>
                <span class="price text-primary">$'.number_format($producto['precio'], 2).'</span>
                <p>
                '.$producto['descripcion'].'
                </p>
                <span>Disponibilidad: <em class="text-muted">'.$producto['stock'].'</em></span>
                <span>Tallas: <em class="text-muted">'.$producto['tallas'].'</em></span>
                <span>Colores: <em class="text-muted">'.$producto['colores'].'</em></span>
                <a class="btn btn-dark btn-xl btn-block addCarrito" data-id="'.$producto['id'].'">Añadir al carrito</a>
                <a class="btn btn-default btn-xl btn-block onFavorito" data-id="'.$producto['id'].'">Añadir a favoritos</a>
            </div>
        </div>
    </div>';

    // <div class="count-input">
    //     <a class="incr-btn" data-action="decrease" href="#">–</a>
    //     <input class="quantity" type="text" value="1">
    //     <a class="incr-btn" data-action="increase" href="#">+</a>
    // </div>
}
?>

<link href="css/ms-showcase2.css" rel="stylesheet">
<div class="">
  <div class="space-60"></div>
  <div class="container">
      <div class="row">
        <?php echo $buffer; ?>
      </div>
      <hr>
      <div class="space-20"></div>
  </div>

  <input type="hidden" id="uid" name="uid" value="<?php echo $uid; ?>">
</div>


<script type="text/javascript">
    $(document).ready(function () {
        var slider = new MasterSlider();
        slider.control('scrollbar', {dir: 'h'});
        slider.control('thumblist', {autohide: false, dir: 'v', arrows: false, align: 'left', width: 127, height: 84, margin: 5, space: 5, hideUnder: 300});
        slider.setup('masterslider', {
            width: 540,
            height: 586,
            space: 5
        });
    });

</script>
