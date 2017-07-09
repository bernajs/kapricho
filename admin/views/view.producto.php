<?php
    require_once('_class/class.producto.php');
    $Producto = new Producto();
    $productos = $Producto->get_data();
    $tbody='';
    if($productos){
      foreach ($productos as $producto) {
        $id = $producto['id'];
        $tbody .= '<tr class="'.$id.'">';
        $tbody .= '<td>'.$producto['nombre'].'</td>';
        $tbody .= '<td>'.$producto['categoria'].'</td>';
        $tbody .= '<td>'.$producto['precio'].'</td>';
        $tbody .= '<td>'.$producto['descripcion'].'</td><td><a href="javascript:void(0);" class="onDestacado '.$id.'" data-src="producto" data-id="'.$id.'" data-destacado="'.$producto['destacado'].'">';
        $producto['destacado'] == 1 ? $tbody .= '<i class="fa fa-star destacado '.$producto['id'].'"></i>' : $tbody .= '<i class="fa fa-star ndestacado '.$producto['id'].'">';
        $tbody .= '</a></td><td class="acciones">
        <a href="javascript:void(0)" class="onDelete" data-id="'.$id.'" data-src="producto"><i class="material-icons">delete</i></a>
        <a class="onEdit" href="index.php?call=producto_detalle&id='.$id.'"><i class="material-icons">edit</i></a></td>';
      }
    }
?>

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Productos</h4>
    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
    <a href="index.php?call=producto_detalle" class="btn btn-outline-primary block btn-lg">Agregar Producto</a>
  </div>
  <div class="card-body collapse in">
    <div class="card-block">
      <div class="row">
        <div class="col-12">
          <table class="table table-striped table-bordered zero-configuration">
            <thead>
              <tr>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Destacado</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                <?php echo $tbody; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Producto</th>
                  <th>Categoría</th>
                  <th>Precio</th>
                  <th>Destacado</th>
                  <th>Descripción</th>
                  <th>Acciones</th>
                </tr>
              </tfoot>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
