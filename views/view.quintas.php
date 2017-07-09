<div class="row">
  <div class="col-12 col-md-4 filtro-quinta">
    <form>
      <h3 class="text-center">Encuentra tu Quinta</h3>
      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label for="evento">Evento</label>
            <select class="form-control" id="evento" name="evento">
              <option value="1">1</option>
              <option value="1">1</option>
              <option value="1">1</option>
              <option value="1">1</option>
              <option value="1">1</option>
              <option value="1">1</option>
            </select>
          </div>
        </div>
        <div class="col-12">
          <div class="form-group">
            <label for="municipio">Municipio</label>
            <select class="form-control" id="municipio" name="municipio">
              <option value="1">1</option>
              <option value="1">1</option>
              <option value="1">1</option>
              <option value="1">1</option>
            </select>
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label for="fecha">Fecha</label>
          <input type="datetime" id="fecha" name="fecha" value="" class="form-control">
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="horario">Horario</label>
          <select class="form-control" id="horario" name="horario">
            <option value="1">1</option>
            <option value="1">1</option>
            <option value="1">1</option>
            <option value="1">1</option>
          </select>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="personas">Personas</label>
          <select class="form-control" id="personas" name="personas">
            <option value="1">1</option>
            <option value="1">1</option>
            <option value="1">1</option>
          </select>
        </div>
      </div>
      <div class="col-8 offset-2">
        <button type="button" name="button" class="btn btn-primary fwidth">Buscar salones</button>
      </div>
    </div>
    </form>
    <div class="row">
      <div class="col-12 marginy-40">
        <h4 class="marginb-10">Filtrar por precio</h4>
        <b>$ 0</b>
        <input id="ex2" type="text" class="span2" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]"/>
        <b>$ 1, 000</b>
      </div>
      <div class="col-12 filtro-calificacion">
        <h4 class="">Filtrar por calificación</h4>
            <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" name="calificacion" group="calificacion" value="5">
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" name="calificacion" group="calificacion" value="5">
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" name="calificacion" group="calificacion" value="5">
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" name="calificacion" group="calificacion" value="5">
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" name="calificacion" group="calificacion" value="5">
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                </label>
            </div>
      </div>
      <div class="col-12 margint-20">
        <h4>Filtrar por servicios</h4>
        <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" name="calificacion" group="calificacion" value="5">
              Servicio 1
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" name="calificacion" group="calificacion" value="5">
              Servicio 2
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" name="calificacion" group="calificacion" value="5">
              Servicio 3
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" name="calificacion" group="calificacion" value="5">
              Servicio 4
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" name="calificacion" group="calificacion" value="5">
              Servicio 5
            </label>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-8 div-listado-quintas px-0 px-md-2">
    <div class="col-12">
    <a class="btn-cuadrado show-quintas mr-2">Vista en listado</a>
    <a class="btn-cuadrado show-mapas">Vista en mapa</a>
  </div>
  <div class="col-12 quintas-mapa" style="display:none;margin: 10px;height:400px; background-color:lightgray;">
  </div>
  <div class="col-12 quintas">
    <div class="row quinta py-2 py-md-0">
    <div class="col-12 col-md-5 pl-md-0">
      <div class="card text-center mb-2 mb-md-0">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title">Card title</h4>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-7 py-4">
      <div class="col-12">
          <span class="float-right">Comentarios: 8</span>
          <h4>$650</h4>
          <span>Precio por persona</span>
          <p class="margint-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
          <div class="row align-items-center">
            <div class="col-4">
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
              <div class="col-6">
              <a href="index.php?call=quinta" class="btn btn-primary fwidth">Ver más</a>
            </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css" />
<style media="screen">
  .filtro-quinta{
    background-color: lightgray;
    padding:20px;
  }
  .div-listado-quintas{
    padding: 20px;
  }
  .btn-cuadrado{
    position:relative;
    padding:10px 15px;
    border: 1px solid black;
    width: 100%;
    cursor: pointer;
  }

  .quintas{
    margin-top: 20px;
  }
  .quinta{
    margin-top: 10px;
    background-color: lightgray;
    padding:0px 5px 0px 0px;
  }
  .quinta h4{
    margin: 0px !important;
  }
  .card-block{
    padding: 5px !important;
  }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>
<script type="text/javascript">
$("#ex2").slider({});
</script>
<script>
$(document).ready(function(e){
  $('.show-mapas').click(function(){$('.quintas').hide('slow'); $('.quintas-mapa').show('slow');})
  $('.show-quintas').click(function(){$('.quintas-mapa').hide('slow'); $('.quintas').show('slow');})
})
</script>
