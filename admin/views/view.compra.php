<?php
    require_once('_class/class.compra.php');
    $Compra = new Compra();
    $estado[0] = "Pendiente"; $estado[1] = "Aprobada";
    $pendiente = false;
    if(isset($_GET['pending'])){$pendiente = true;}
    $compras = $Compra->get_data($pendiente);
    if($compras){
      foreach ($compras as $compra) {
        $productos = $Compra->get_productos($compra['id']);
        foreach ($productos as $producto) {$total += $producto['precio'] * $producto['cantidad']; }
        $id = $compra['id'];
        $tbody .= '<tr class="'.$id.'">';
        $tbody .= '<td>'.$compra['nombre']. ' '.$compra['apellido'].'</td>';
        $tbody .= '<td>'.count($productos).'</td>';
        $tbody .= '<td>$'.number_format($total,2).'</td>';
        $tbody .= '<td>'.date('d-m-Y',strtotime($compra['created_at'])).'</td>';
        $tbody .= '<td>'.$estado[$compra['status']].'</td>';
        $tbody .= '</a></td><td class="acciones">
        <a href="javascript:void(0)" class="onDelete" data-id="'.$id.'" data-src="compra"><i class="ft-trash-2"></i></a>
        <a class="onEdit" href="index.php?call=compra_detalle&id='.$id.'"><i class="ft-eye"></i></a></td>';
      }
    }
?>

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Compras</h4>
    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
    <a href="index.php?call=compra_detalle" class="btn btn-outline-primary block btn-add">Agregar Producto</a>
  </div>
  <div class="card-body collapse in">
    <div class="card-block">
      <div class="row">
        <div class="col-12">
          <table class="table table-striped table-bordered zero-configuration">
            <thead>
              <tr>
                <th>Cliente</th>
                <th>Productos</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acción</th>
              </thead>
              <tbody>
                <?php echo $tbody; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Cliente</th>
                  <th>Productos</th>
                  <th>Total</th>
                  <th>Fecha</th>
                  <th>Estado</th>
                  <th>Acción</th>
                </tr>
              </tfoot>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
