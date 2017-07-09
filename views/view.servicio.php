<?php

$categorias = $Service->get_categorias(true);
$categorias_options = '';
if($categorias){
  foreach ($categorias as $categoria) {
    $categorias_options .= '<option value="'.$categoria['id'].'">'.$categoria['nombre'].'</option>';
  }
}
?>

<div class="row">
  <div class="col-12 filtro-servicio">
    <div class="row">
      <div class="form-group col-12">
        <label for="servicio">Tipo de servicio</label>
        <select class="form-control" name="categoria" id="categoria">
          <?php echo $categorias_options; ?>
        </select>
      </div>
      <div class="button-group col-6 offset-3">
        <button type="button" name="button" class="btn btn-primary fwidth br-50 onBuscarServicio">Buscar servicio</button>
      </div>
    </div>
  </div>
  <div class="col-12 my-4 lista_servicios">
  </div>
</div>


<style media="screen">
  .filtro-servicio{
    background-color: lightgray;
    padding: 50px;
  }
  .servicio{
    background-color: #f7f7f7;
    padding: 20px;
  }
  .detalles-servicio{
    font-size: 12px !important;
    color: gray;
  }
</style>

<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script type="text/javascript">

$('.slider').slick({
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  adaptiveHeight: true
});

$('.onBuscarServicio').click(function(){
  var id = $('#categoria').val();
  $.ajax({
    url: '_ctrl/ctrl.service.php',
    type: 'POST',
    data: {'exec': 'get_servicios_by_categoria', 'data': id},
    success(r){
      var r = JSON.parse(r);
      if(r.status == 202){
        var buffer = '';
        var lista_categorias = '';
        var img_categoria = '';
        if(!r.servicios) return;
        r.servicios.forEach(function(element){
          lista_categorias = '';img_categoria='';
          if(element.categorias){element.categorias.forEach(function(categoria){
            lista_categorias += categoria.nombre +', ';
            img_categoria += '<img src="admin/uploads/categoria/'+categoria.imagen+'" alt="'+categoria.nombre+'" style="height:20px;width:20px;border-radius:50px; background-color:lightgray; margin-right: 20px;">';
          });lista_categorias = lista_categorias.substring(0, lista_categorias.length - 2);}

          var info = JSON.parse(element.servicio.info);
          buffer += '\
          <div class="row servicio animated pulse">\
              <div class="col-12 col-md-5">\
                <div class="slider text-center">\
                    <img class="img-fluid" src="admin/uploads/servicio/'+element.servicio.imagen+'">\
                </div>\
              </div>\
              <div class="col-12 col-md-7 mt-4 mt-md-0">\
                <div class="row">\
                  <div class="col-12">\
                    <h4 class="mb-0">'+element.servicio.nombre+'</h4>\
                    <p>Categorias: '+lista_categorias+'</p>\
                    <p></p>\
                  </div>\
                  <div class="col-md-5 col-12">\
                  '+img_categoria+'\
                  </div>\
                  <div class="col-md-7 col-12">\
                  <span class="float-right detalles-servicio">Teléfono: '+info.telefono+'| Email: '+info.correo+' | '+info.pagina+'</span>\
                </div>\
              </div>\
              </div>\
          </div>\
          ';
        });
        $('.lista_servicios').html(buffer).hide().show();
      }else{alert('Esta categoría aún no tiene ningún servicio');$('.lista_servicios').html('');}
    }
  })
})
</script>
