<?php
  require_once('../_class/class.servicio.php');
  $Servicio = new Servicio();
  // Variables
  $data['nombre'] = '';
  $data['destacado'] = '';
  $data['telefono'] = '';
  $data['correo'] = '';
  $data['pagina'] = '';
  $data['fb'] = '';
  $data['tw'] = '';
  $data['ig'] = '';
  $data['imagen'] = '';
  $data['descripcion'] = '';
  $data['status'] = '';
  $titulo = 'Agregar servicio';
  $action = 'save';
  $id = '';
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $servicio = $Servicio->get_data($id);
    $data['nombre'] = $servicio[0]['nombre'];
    $data['destacado'] = $servicio[0]['destacado'];
    $data['imagen'] = $servicio[0]['imagen'];
    $info = json_decode($servicio[0]['info']);
    $data['telefono'] = $info->telefono;
    $data['correo'] = $info->correo;
    $data['pagina'] = $info->pagina;
    $data['fb'] = $info->fb;
    $data['ig'] = $info->ig;
    $data['tw'] = $info->tw;
    $data['descripcion'] = $info->descripcion;
    $data['status'] = $servicio[0]['status'];
    $titulo = 'Editar servicio';
    $action = 'update';

    $categorias = $Servicio->get_categorias();
    $scategorias = $Servicio->get_servicio_categorias($id);

    $lista_categorias = '';
    foreach ($categorias as $categoria) {
      $checked = '';
      foreach ($scategorias as $scategoria) {
        if($scategoria['id'] == $categoria['id']){
          $checked = 'checked';
        }
      }
      $lista_categorias .= '<div class="form-check col-6">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input" '.$checked.' name="categoria[]" value="'.$categoria['id'].'">
        '.$categoria['nombre'].'
        </label>
      </div>';
    }
}else{
  $categorias = $Servicio->get_categorias();
  $lista_categorias = '';
  foreach ($categorias as $categoria) {
    $checked = '';
    $lista_categorias .= '<div class="form-check col-6">
      <label class="form-check-label">
        <input type="checkbox" class="form-check-input" '.$checked.' name="categoria[]" value="'.$categoria['id'].'">
      '.$categoria['nombre'].'
      </label>
    </div>';
  }
}
 ?>
<div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <h4 class="modal-title" id="myModalLabel1"><?php echo $titulo; ?></h4>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-12">
        <form name="frmServicio" id="frmServicio" class="row">
          <div class="form-group col-12">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $data['nombre'];?>">
          </div>
          <div class="form-group col-6">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $data['telefono'];?>">
          </div>
          <div class="form-group col-6">
            <label for="correo">Correo</label>
            <input type="email" name="correo" id="correo" class="form-control" value="<?php echo $data['correo'];?>">
          </div>
          <div class="form-group col-6">
            <label for="pagina">Página</label>
            <input type="url" name="pagina" id="pagina" class="form-control" value="<?php echo $data['pagina'];?>">
          </div>
          <div class="form-group col-6">
            <label for="fb">Facebok</label>
            <input type="text" name="fb" id="fb" class="form-control" value="<?php echo $data['fb'];?>">
          </div>
          <div class="form-group col-6">
            <label for="tw">Twitter</label>
            <input type="text" name="tw" id="tw" class="form-control" value="<?php echo $data['tw'];?>">
          </div>
          <div class="form-group col-6">
            <label for="ig">Instagram</label>
            <input type="text" name="ig" id="ig" class="form-control" value="<?php echo $data['ig'];?>">
          </div>
          <div class="form-group col-6">
            <label for="destacado">Destacado</label>
            <select class="form-control" name="destacado" id="destacado">
              <option value="0" <?php if($data['destacado'] == 0) echo 'selected'; ?>>No destacado</option>
              <option value="1" <?php if($data['destacado'] == 1) echo 'selected'; ?>>Destacado</option>
            </select>
          </div>
          <div class="form-group col-6">
            <label for="status">Estado</label>
            <select class="form-control" name="status" id="status">
              <option value="0" <?php if($data['status'] == 0) echo 'selected'; ?>>Inactivo</option>
              <option value="1" <?php if($data['status'] == 1) echo 'selected'; ?>>Activo</option>
            </select>
          </div>
          <div class="form-group col-12 icheck_minimal skin">
          <div class="row">
            <div class="col-12">
              <h4>Categorías</h4>
            </div>
            <div class="col-12">
              <div class="row p-10 categorias">
                <?php echo $lista_categorias; ?>
              </div>
              <?php echo $lista_categorias; ?>
            </div>
            </div>
          </div>
          </div>
          <div class="form-group col-12">
            <label for="nombre">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="8" cols="80" class="form-control"><?php echo $data['descripcion'];?></textarea>
          </div>
          <div class="col-12">
            <h5>Imágen</h5>
          </div>
          <div class="form-group col-12 imagen">
            <!-- <form action="/upload-target" class="img_promocion"></form> -->
            <div class="dropzone" id="dz_imagen"></div>
          </div>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" name="imagen" id="imagen" value="<?php echo $data['imagen']; ?>">
        </form>
      </div>
    </div>
  </div>
  <div class="modal-footer">
  <button type="a" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
  <!-- <button type="a" class="btn btn-outline-primary onSave" data-form="#frmServicio" data-src="servicio" data-action="<?php echo $action; ?>">Guardar</button> -->
  <button type="button" id="preSave" class="btn btn-outline-primary onSave" data-form="#frmServicio" data-src="servicio" data-action="<?php echo $action; ?>">Guardar</button>
  <button type="button" id="save" class="btn btn-outline-primary onSave" data-form="#frmServicio" data-src="servicio" data-action="<?php echo $action; ?>">Guardar</button>
  </div>
</div>

<style media="screen">
  .categorias{
    border: 1px solid #ccd6e6;
    border-radius: 5px;
    margin-right: 2.5px;
    margin-left: 2.5px;
  }
</style>

<script src="assets/js/dropzone.js"></script>
<link rel="stylesheet" href="assets/css/dropzone.css">
<style media="screen">
  .imagen{text-align: center;}
  .dz-message img{width: 50% !important;}
  #save{display: none;}
</style>
<script src="js/dropzone.js" charset="utf-8"></script>

<script type="text/javascript">
set_data("servicio", "servicio");
<?php if($data['imagen']): ?>
$('.dz-default span').empty().html('<img src="uploads/servicio/<?php echo $data['imagen']; ?>" alt="" style="width: 20%; height:auto;"/>');
<?php endif ?>
</script>
