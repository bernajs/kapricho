<?php
  require_once('../_class/class.promocion.php');
  $Promocion = new Promocion();
  // Variables
  $data['nombre'] = '';
  $data['status'] = '';
  $titulo = 'Agregar promocion';
  $action = 'save';
  $id = '';
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $promocion = $Promocion->get_data($id);
    $data['nombre'] = $promocion[0]['nombre'];
    $data['imagen'] = $promocion[0]['imagen'];
    $data['url'] = $promocion[0]['url'];
    $data['status'] = $promocion[0]['status'];
    $titulo = 'Editar promocion';
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
        <form name="frmPromocion" id="frmPromocion" class="row">
          <div class="form-group col-12">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $data['nombre'];?>">
          </div>
          <div class="form-group col-12">
            <label for="url">Url</label>
            <input type="text" id="url" name="url" class="form-control" value="<?php echo $data['url'];?>">
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
          <input type="hidden" name="imagen" id="imagen" value="<?php echo $data['imagen']; ?>">
          <!-- <input type="hidden" name="destacado" value="1"> -->
          <input type="hidden" name="id" value="<?php echo $id; ?>">
        </form>
      </div>
    </div>
  </div>
  <div class="modal-footer">
  <button type="a" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
  <button type="a" id="preSave" class="btn btn-outline-primary onSave" data-form="#frmPromocion" data-src="promocion" data-action="<?php echo $action; ?>">Guardar</button>
  <button type="a" id="save" class="btn btn-outline-primary onSave" data-form="#frmPromocion" data-src="promocion" data-action="<?php echo $action; ?>">Guardar</button>
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
set_data("promoción", "promocion");
<?php if($data['imagen']): ?>
$('.dz-default span').empty().html('<img src="uploads/promocion/<?php echo $data['imagen']; ?>" alt="" style="width: 20%; height:auto;"/>');
<?php endif ?>
</script>
