<?php
    require_once('_class/class.caracteristica.php');
    $Caracteristica  = new Caracteristica();
    $caracteristicas = $Caracteristica->get_data();
    $tbody='';
    if($caracteristicas){
      foreach ($caracteristicas as $caracteristica) {
        $id = $caracteristica['id'];
        $tbody .= '<tr class="'.$id.'">';
        $tbody .= '<td>'.$caracteristica['nombre'].'</td>';
        $tbody .= '<td class="acciones">
        <a href="javascript:void(0)" class="onDelete" data-id="'.$id.'" data-src="caracteristica"><i class="material-icons">delete</i></a>
        <a class="onEdit onModal" href="views/form.caracteristica.php?id='.$id.'"><i class="material-icons">edit</i></a></td>';
      }
    }
?>

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Característica</h4>
    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
    <a href="views/form.caracteristica.php" class="btn btn-outline-primary block btn-lg onModal">Agregar característica</a>
  </div>
  <div class="card-body collapse in">
    <div class="card-block">
      <div class="row">
        <div class="col-12">
          <table class="table table-striped table-bordered zero-configuration">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                <?php echo $tbody; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Acciones</th>
                </tr>
              </tfoot>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
