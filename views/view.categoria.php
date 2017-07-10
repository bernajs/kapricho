<?php
  $categorias = $Service->get_categorias();
  $categoria_hombre = '';
  $categoria_mujer = '';
  $categoria_ambos = '';
  if(isset($_GET['id'])){$id = $_GET['id'];}

  if($categorias){foreach ($categorias as $categoria) {
    $count = $Service->get_count_categoria($categoria['id']);
    if(count($count) == 0) continue;
    if($categoria['sexo'] == 1)
      $categoria_hombre .= '<li class="list-group-item list-group-item-action justify-content-between onCategoria btn-ver categoria'.$categoria['id'].'" data-id="'.$categoria['id'].'">
      '.$categoria['nombre'].'
      <span class="badge badge-default badge-pill">'.count($count).'</span>
    </li>';
    else if($categoria['sexo'] == 2)
      $categoria_mujer .= '<li class="list-group-item list-group-item-action justify-content-between onCategoria btn-ver categoria'.$categoria['id'].'" data-id="'.$categoria['id'].'">
      '.$categoria['nombre'].'
      <span class="badge badge-default badge-pill">'.count($count).'</span>
    </li>';
    else
      $categoria_ambos .= '<li class="list-group-item list-group-item-action justify-content-between onCategoria btn-ver categoria'.$categoria['id'].'" data-id="'.$categoria['id'].'">
      '.$categoria['nombre'].'
      <span class="badge badge-default badge-pill">'.count($count).'</span>
    </li>';
  }}



 ?>
<div class="row justify-content-between">
  <div class="col-12 col-md-3">
    <div class="row">
      <div class="col-11 categorias py-4">

    <span>Hombres</span>
    <ul class="list-group">
      <?php echo $categoria_hombre; echo $categoria_ambos; ?>
      <li class="categoria0 onCategoria" data-id="0" style="display:none"></li>
    </ul>
    <span>Mujeres</span>
    <ul class="list-group">
      <?php echo $categoria_mujer; echo $categoria_ambos; ?>
    </ul>
    </div>
  </div>
  </div>
  <div class="col-12 col-md-9 mt-4 mt-md-0 productos p-4">
  </div>
</div>
<!--DEMO01-->
<div id="animatedModal">
    <!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID -->
    <div  id="btn-close-modal" class="close-animatedModal">
        CLOSE MODAL
    </div>

    <div class="modal-content">
        <!--Your modal content goes here-->
        <div class="row justify-content-center">
          <div class="col-6 producto-info">
            <div class="producto_img">

            </div>
            <div class="producto_nav">

            </div>
            <h3 class="producto_nombre"></h3>
            <h5 class="producto_precio"></h5>
            <p class="producto_descripcion"></p>
          </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="css/producto.css">
<style media="screen">
  .categorias, .productos{background-color: white;border-radius: 5px;}
  .producto_img{height: 300px !important;}
  .slick-list img{height: 300px !important;}
</style>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script src="js/animatedModal.js" charset="utf-8"></script>
<script type="text/javascript">
var id = <?php if($id) echo $id; else echo 0; ?>;
$(document).ready(function(){
  $('.categoria'+id).click();
  // $('.producto_img').slick('unslick');
  $('.close-animateModal').click(function(){$('.producto_img').slick('unslick')})
  //demo 01
})
$('.onCarrito').on('click', function(e){
  console.log(123);
})
</script>
