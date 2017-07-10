<?php
    require_once('_class/class.promocion.php');
    $Promocion = new Promocion();
    $promociones = $Promocion->get_data();
    $tbody='';
    if($promociones){
      foreach ($promociones as $promocion) {
        $id = $promocion['id'];
        $tbody .= '<tr class="'.$id.'">';
        $tbody .= '<td>'.$promocion['nombre'].'</td>';
        $tbody .= '<td><img class="img-promo img-thumbnail" src="uploads/promocion/'.$promocion['imagen'].'"></td>';
        $tbody .= '<td>'.$promocion['url'].'</td>';
        // $tbody .= '<td>'.$promocion['target'].'</td>';
        $tbody .= '<td class="acciones">
        <a href="javascript:void(0)" class="onDelete" data-id="'.$id.'" data-src="promocion"><i class="ft-trash-2"></i></a>
        <a class="onEdit onModal" href="views/form.promocion.php?id='.$id.'"><i class="ft-edit"></i></a></td>';
      }
    }
?>

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Promociones</h4>
    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
    <a href="views/form.promocion.php" class="btn btn-outline-primary block btn-add onModal">Agregar promoción</a>
  </div>
  <div class="card-body collapse in">
    <div class="card-block">
      <div class="row">
        <div class="col-12">
          <table class="table table-striped table-bordered zero-configuration">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Url</th>
                <!-- <th>Target</th> -->
                <th>Acciones</th>
              </thead>
              <tbody>
                <?php echo $tbody; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Imagen</th>
                  <th>Url</th>
                  <!-- <th>Target</th> -->
                  <th>Acciones</th>
                </tr>
              </tfoot>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>

<style media="screen">
  .img-promo{width:50px; height: 50px;}
</style>
