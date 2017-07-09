<?php
    require_once('_class/class.categoria.php');
    $Categoria = new Categoria();
    $categorias = $Categoria->get_data();
    $tbody='';
    if($categorias){
      foreach ($categorias as $categoria) {
        $id = $categoria['id'];
        $tbody .= '<tr class="'.$id.'">';
        $tbody .= '<td>'.$categoria['nombre'].'</td>';
        $tbody .= '<td class="acciones">
        <a href="javascript:void(0)" class="onDelete" data-id="'.$id.'" data-src="categoria"><i class="material-icons">delete</i></a>
        <a class="onEdit onModal" href="views/form.categoria.php?id='.$id.'"><i class="material-icons">edit</i></a></td>';
      }
    }
?>

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Categorías</h4>
    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
    <a href="views/form.categoria.php" class="btn btn-outline-primary block btn-lg onModal">Agregar categoría</a>
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
