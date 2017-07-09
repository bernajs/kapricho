<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $quinta = $Service->get_quinta($id);
  if($quinta){
    $quinta = $quinta[0];
    $calificacion = get_calificacion($quinta['calificacion']);
    $fotos = json_decode($quinta['fotos']);
    if($fotos){foreach ($fotos as $foto) {$quinta_fotos .= '<img src="admin/uploads/imagenes_quinta/'.$foto.'">';}}
    $caracteristicas = $Service->get_caracteristicas_quinta($id);
    if($caracteristicas) foreach ($caracteristicas as $caracteristica) {
      $quinta_caracteristicas .= '<div class="col-2 text-center center-text servicio animated pulse">
              <img src="admin/uploads/caracteristica/'.$caracteristica['imagen'].'" style="height:20px;width:20px;border-radius:50px; background-color:lightgray">
              <br><span>'.$caracteristica['nombre'].'</span>
            </div>';
    }
  }else{redirect('index.php');}
}else{redirect('index.php');}

?>

<div class="row align-items-center">
  <div class="col-12 my-4">
    <h2><?php echo $quinta['nombre'] ?></h2>
    <?php echo $calificacion; ?>
      <button type="button" name="reservar" class="btn btn-primary br-50 onReservar float-right"><a href="index.php?call=reservar&id<?php echo $id; ?>">Reservar</a></button>
  </div>
  <div class="col-12 servicios margint-40">
    <div class="row justify-content-between">
      <?php echo $quinta_caracteristicas; ?>
    </div>
  </div>
  </div>
  <div class="row slider-mapa">
    <div class="col-12 col-md-6 mt-4 mt-md-4 px-0 pr-md-2 pl-md-0 slider-quinta">
      <div class="slider">
        <?php echo $quinta_fotos; ?>
      </div>
    </div>
    <div id="map" class="col-12 col-md-6 mapa-quinta mt-0 mt-md-4" style="height:auto;">
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-md-8 pt-4">
      <h2>Descripción</h2>
      <span><b>Descripción</b></span>
      <p><?php echo $quinta['descripcion'];?></p>
      <div class="row">
        <div class="col-12">
          <p><b>Servcios</b></p>
          <div class="row justify-content-between">
          <div class="col-2 text-center center-text">
            <img src="http://www.dickson-constant.com/medias/images/catalogue/api/6088-gris-680.jpg" style="height:20px;width:20px;border-radius:50px; background-color:lightgray">
          </div>
          <div class="col-2 text-center center-text">
            <img src="http://www.dickson-constant.com/medias/images/catalogue/api/6088-gris-680.jpg" style="height:20px;width:20px;border-radius:50px; background-color:lightgray">
          </div>
          <div class="col-2 text-center center-text">
            <img src="http://www.dickson-constant.com/medias/images/catalogue/api/6088-gris-680.jpg" style="height:20px;width:20px;border-radius:50px; background-color:lightgray">
          </div>
          <div class="col-2 text-center center-text">
            <img src="http://www.dickson-constant.com/medias/images/catalogue/api/6088-gris-680.jpg" style="height:20px;width:20px;border-radius:50px; background-color:lightgray">
          </div>
          <div class="col-2 text-center center-text">
            <img src="http://www.dickson-constant.com/medias/images/catalogue/api/6088-gris-680.jpg" style="height:20px;width:20px;border-radius:50px; background-color:lightgray">
          </div>
        </div>
        </div>
        <div class="col-12 pt-4">
          <span><b>Especificaciones</b></span>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="municipio">Términos</label>
                <select class="form-control" id="terminos" name="terminos">
                  <option value="">1</option>
                  <option value="">2</option>
                  <option value="">3</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label for="municipio">Cancelaciones</label>
                <select class="form-control" id="cancelaciones" name="cancelaciones">
                  <option value="">1</option>
                  <option value="">2</option>
                  <option value="">3</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4 pt-4">
      <h4>Reseñas</h4>
      <div class="row">
        <div class="col-12 resena mb-4">
          <p>
            <b>Alberto Martínez</b> <span class="float-right">24/feb/2017</span>
          </p>
          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.</p>
          <i class="fa fa-star-o" aria-hidden="true"></i>
          <i class="fa fa-star-o" aria-hidden="true"></i>
          <i class="fa fa-star-o" aria-hidden="true"></i>
          <i class="fa fa-star-o" aria-hidden="true"></i>
          <hr>
        </div>
        <div class="col-12 resena mb-4">
          <p>
            <b>Alberto Martínez</b> <span class="float-right">24/feb/2017</span>
          </p>
          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.</p>
          <i class="fa fa-star-o" aria-hidden="true"></i>
          <i class="fa fa-star-o" aria-hidden="true"></i>
          <i class="fa fa-star-o" aria-hidden="true"></i>
          <i class="fa fa-star-o" aria-hidden="true"></i>
          <hr>
        </div>
      </div>
    </div>
  </div>

<style media="screen">
  h2{display: inline;}
  .servicio{
    border: 1px solid lightgray;
    padding: 10px 0px;
  }
  .mapa-quinta{background-color: lightgray;}

  .slider-mapa{padding-bottom: 40px; border-bottom: 1px solid lightgray;}
  .resena{
    border-bottom: 1px solid #f7f7f7;
  }
</style>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAT7FCS3i7CvHh15kc4bLkqrDMa3G5SaiA&callback=initMap"></script>
<script type="text/javascript">

$('.slider').slick({
  dots: true,
  infinite: true,
  speed: 500,
  slidesToShow: 1,
  adaptiveHeight: true
});
</script>

<!--Maps -->
  <script>
  function initMap() {
    var quinta = <?php echo ($quinta['coordenadas']); ?>;
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: quinta
    });
    var marker = new google.maps.Marker({
      position: quinta,
      map: map
    });
  }
</script>
