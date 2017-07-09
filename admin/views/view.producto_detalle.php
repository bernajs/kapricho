<?php
require_once('_class/class.producto.php');
$Producto = new Producto();
// Variables
$data['nombre'] = '';
$data['imagenes'] = '';
$data['destacado'] = '';
$data['descripcion'] = '';
$data['status'] = '';
$data['estado'] = '';
$data['stock'] = '';
$data['precio'] = '';
$data['sexo'] = '';
$action = 'save';
$id = '';
$lista_imagenes= '';
$title = 'Agregar producto';



if(isset($_GET['id'])){
  $id = $_GET['id'];
  $producto = $Producto->get_data($id);
  $data['usuario'] = $producto[0]['usuario'];
  $data['nombre'] = $producto[0]['nombre'];
  $data['destacado'] = $producto[0]['destacado'];
  $imagenes = ($producto[0]['imagenes']);
  $data['descripcion'] = $producto[0]['descripcion'];
  $data['destacado'] = $producto[0]['destacado'];
  $data['stock'] = $producto[0]['stock'];
  $data['sexo'] = $producto[0]['sexo'];
  $data['precio'] = $producto[0]['precio'];
  $data['status'] = $producto[0]['status'];
  $action = 'update';
  $title = 'Editando producto';
}

$lista_categorias = '';
  $selected = '';
  $categorias = $Producto->get_categorias();
  foreach ($categorias as $categoria) {
    if($id == $categoria['id']) $selected = 'selected';
    $lista_categorias .= '<option '.$selected.' value="'.$categoria['id'].'">'.$categoria['nombre'].'</option>';
    $selected = '';
  }

 ?>

<div class="card">
  <div class="card-header">
    <h4 class="card-title"><?php echo $title; ?></h4>
  </div>
  <div class="card-body collapse in">
    <div class="card-block">
      <div class="tab-content px-1 pt-1">
        <div role="tabpanel" class="tab-pane active" id="datos-content" aria-expanded="true" aria-labelledby="datos">
          <div class="row">
            <div class="col-12">
                <div class="row">
                  <form id="frmProducto" name="frmProducto">
                  <div class="form-group col-12">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $data['nombre']; ?>">
                  </div>
                  <div class="form-group col-6">
                    <label for="stock">Stock</label>
                    <input type="number" id="stock" name="stock" class="form-control" value="<?php echo $data['stock']; ?>">
                  </div>
                  <div class="form-group col-6">
                    <label for="precio">Precio</label>
                    <input type="number" id="precio" name="precio" class="form-control" value="<?php echo $data['precio']; ?>">
                  </div>
                  <div class="form-group col-4">
                    <label for="categoria">Categoría</label>
                    <select class="form-control" name="categoria" id="categoria">
                      <?php echo $lista_categorias; ?>
                    </select>
                  </div>
                  <div class="form-group col-4">
                    <label for="status">Destacado</label>
                    <select class="form-control" name="destacado" id="destacado">
                      <option value="0" <?php if($data['destacado'] == 0) echo 'selected'; ?>>No destacado</option>
                      <option value="1" <?php if($data['destacado'] == 1) echo 'selected'; ?>>Destacado</option>
                    </select>
                  </div>
                  <div class="form-group col-4">
                    <label for="status">Estado</label>
                    <select class="form-control" name="status" id="status">
                      <option value="0" <?php if($data['status'] == 0) echo 'selected'; ?>>Inactivo</option>
                      <option value="1" <?php if($data['status'] == 1) echo 'selected'; ?>>Activo</option>
                    </select>
                  </div>
                  <div class="form-group col-6">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="8" cols="50" class="form-control"><?php echo $data['descripcion'];?></textarea>
                  </div>
                  <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                  <input type="hidden" name="imagenes[]" id="imagenes">
                  <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $data['id_usuario']; ?>">
                </div>
              </form>
            </div>
              <div class="col-12 mb-20 pt-10">
                <hr>
                <h4>Fotos</h4>
              </div>
              <div class="col-12">
                <div class="dropzone" id="dz_imagenes"></div>
              </div>
              <?php if($imagenes != '[]' || $imagenes != '[""]'): ?>
              <div class="col-12 mt-20">
                <h4>Lista de imagenes</h4>
                  <div class="col-12">
                    <div class="row lista-imagenes p-10" style="border: 1px solid lightgray; border-radius: 5px;">

                    </div>
                  </div>
              </div>
            <?php endif ?>
              <div class="col-7 offset-md-3">
                <button style="width:100%;" type="button" id="onSubirFotos" class="btn btn-outline-primary preSave mt-20" data-form="#frmProducto" data-src="producto" data-action="<?php echo $action; ?>">Guardar</button>
                <button style="width:100%;display:none;" type="button" id="onSave" class="btn btn-outline-primary onSave mt-20" data-form="#frmProducto" data-src="producto" data-action="<?php echo $action; ?>">Guardar</button>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="assets/css/dropzone.css">

<style media="screen">
  .card{border: 1px solid #ccd6e6;}
  .card-img-top{height: 150px; width:150px;}
  .caracteristicas{
    border: 1px solid #ccd6e6;
    border-radius: 5px;
    margin-right: 2.5px;
    margin-left: 2.5px;
  }
</style>

<script src="assets/js/dropzone.js"></script>
<script type="text/javascript">

var imagenes = <?php if($imagenes) print_r($imagenes); else echo "[]";?>;
if (imagenes.length) $('#imagenes').val(imagenes);
var id = <?php if($id) echo($id); else echo "null";?>;
var isFotos = false;

Dropzone.autoDiscover = false;
var id_caracteristica;
var myFotos = new Dropzone("#dz_imagenes", {
  url: "uploads/upload.php",
  addRemoveLinks: true,
  dictRemoveFile: 'Eliminar',
  autoProcessQueue: false,
  maxFilesize: 10,
  dictDefaultMessage: "Arrastre las imagenes que desea subir (límite 10)",
  parallelUploads: 10
});

myFotos.on('sending', function(file, xhr, formData) {
  var name = Math.floor(Math.random() * 100) + '' + Date.now() + '.' +file.name.split('.')[1];
  imagenes.push(name);
  // var folder = 'imagenes_producto'+id+'/imagenes';
  formData.append('folder', 'imagenes_producto');
  formData.append('name', name);
});

$('.preSave').click(function(){
  isFotos ? myFotos.processQueue() : $('.onSave').click();
})

    myFotos.on('addedfile', function(file) {
      isFotos = true;
    });

myFotos.on("queuecomplete", function (file) {
  $('#imagenes').val(imagenes);
  $('.onSave').click();
});



// Fotos
imagenes.forEach(function(element){
  if(element == '') return;
  var imagen = '<div class="col-3">\
                      <div class="card mb-0 p-5 mb-1">\
                      <a href="uploads/imagenes_producto/'+element+'" target="_blank">\
                        <div class="card-body center">\
                          <img class="card-img-top img-fluid" src="uploads/imagenes_producto/'+element+'" alt="Card image cap">\
                        <div class="card-block p-0 center">\
                        </a>\
                          <a href="javascript:void(0);" class="btn btn-sm btn-danger onDeleteImagen" data-id="'+id+'" data-path="imagenes_producto" data-imagen="'+element+'" style="margin-top:2px;">Eliminar</a>\
                        </div>\
                      </div>\
                    </div>\
                    </div>';
  $('.lista-imagenes').append(imagen)
})
</script>
