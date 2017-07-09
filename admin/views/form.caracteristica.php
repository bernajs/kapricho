<?php
  require_once('../_class/class.caracteristica.php');
  $Caracteristica = new Caracteristica();
  // Variables
  $data['nombre'] = '';
  $data['status'] = '';
  $data['imagen'] = '';
  $titulo = 'Agregar caracteristica';
  $action = 'save';
  $id = '';
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $caracteristica = $Caracteristica->get_data($id);
    $data['nombre'] = $caracteristica[0]['nombre'];
    $data['imagen'] = $caracteristica[0]['imagen'];
    $data['status'] = $caracteristica[0]['status'];
    $titulo = 'Editar caracteristica';
    $action = 'update';
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
        <form name="frmCaracteristica" id="frmCaracteristica" class="row">
          <div class="form-group col-12">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $data['nombre'];?>">
          </div>
          <div class="form-group col-6">
            <label for="status">Estado</label>
            <select class="form-control" name="status" id="status">
              <option value="0" <?php if($data['status'] == 0) echo 'selected'; ?>>Inactivo</option>
              <option value="1" <?php if($data['status'] == 1) echo 'selected'; ?>>Activo</option>
            </select>
          </div>
          <div class="col-12">
            <h5>Imágen</h5>
          </div>
          <div class="form-group col-12 imagen">
            <!-- <form action="/upload-target" class="img_promocion"></form> -->
            <div class="dropzone" id="dz_imagen"></div>
          </div>
          <input type="hidden" name="destacado" value="1">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" name="imagen" id="imagen" value="<?php echo $data['imagen']; ?>">
        </form>
      </div>
    </div>
  </div>
  <div class="modal-footer">
  <button type="a" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
  <button type="button" id="preSave" class="btn btn-outline-primary onSave" data-form="#frmCaracteristica" data-src="caracteristica" data-action="<?php echo $action; ?>">Guardar</button>
  <button type="button" id="save" class="btn btn-outline-primary onSave" data-form="#frmCaracteristica" data-src="caracteristica" data-action="<?php echo $action; ?>">Guardar</button>
  </div>
</div>

<script src="assets/js/dropzone.js"></script>
<link rel="stylesheet" href="assets/css/dropzone.css">
<style media="screen">
  .imagen{text-align: center;}
  .dz-message img{width: 50% !important;}
  #save{display: none;}
</style>
<script src="js/dropzone.js" charset="utf-8"></script>

<script type="text/javascript">
set_data("característica", "caracteristica");
<?php if($data['imagen']): ?>
$('.dz-default span').empty().html('<img src="uploads/caracteristica/<?php echo $data['imagen']; ?>" alt="" style="width: 20%; height:auto;"/>');
<?php endif ?>
</script>
