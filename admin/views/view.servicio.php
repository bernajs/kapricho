<?php
    require_once('_class/class.servicio.php');
    $Servicio = new Servicio();
    $servicios = $Servicio->get_data();
    $tbody='';
    if($servicios){
      foreach ($servicios as $servicio) {
        $id = $servicio['id'];
        $tbody .= '<tr class="'.$id.'">';
        $tbody .= '<td>'.$servicio['nombre'].'</td><td style="text-align:center;"><a href="javascript:void(0);" class="onDestacado '.$id.'" data-src="servicio" data-id="'.$id.'" data-destacado="'.$servicio['destacado'].'">';
        $servicio['destacado'] == 1 ? $tbody .= '<i class="fa fa-star destacado '.$servicio['id'].'"></i>' : $tbody .= '<i class="fa fa-star ndestacado '.$servicio['id'].'">';
        $tbody .= '</a></td><td class="acciones">
        <a href="javascript:void(0)" class="onDelete" data-id="'.$id.'" data-src="servicio"><i class="material-icons">delete</i></a>
        <a class="onEdit onModal" href="views/form.servicio.php?id='.$id.'"><i class="material-icons">edit</i></a></td>';
      }
    }
?>

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Servicios</h4>
    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
    <a href="views/form.servicio.php" class="btn btn-outline-primary block btn-lg onModal">Agregar servicio</a>
  </div>
  <div class="card-body collapse in">
    <div class="card-block">
      <div class="row">
        <div class="col-12">
          <table class="table table-striped table-bordered zero-configuration">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Destacado</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                <?php echo $tbody; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Destacado</th>
                  <th>Acciones</th>
                </tr>
              </tfoot>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
