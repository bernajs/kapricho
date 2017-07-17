<?php
require_once('_class/class.compra.php');
$Compra = new Compra();
if(isset($_GET['id'])) $id = $_GET['id'];
$compra = $Compra->get_compra($id);
if($compra){$compra=$compra[0];
  $total = 0;
    $productos = $Compra->get_productos($id);
    foreach ($productos as $producto) {
      $tbody .= '<tr class="'.$id.'">';
      $tbody .= '<td>'.$producto['nombre'].'</td>';
      $tbody .= '<td>$'.number_format($producto['precio'],2).'</td>';
      $tbody .= '<td>'.$producto['cantidad'].'</td>';
      $tbody .= '<td>$'.number_format(($producto['precio']*$producto['cantidad']),2).'</td>';
      $tbody .= '</tr>';
      $total += $producto['precio']*$producto['cantidad'];
     }
  }
 ?>

<div class="card">
  <div class="card-header">
    <div class="col-12">
      <?php if ($compra['status'] == 0): ?>
        <button type="button" id="aprobar" class="btn btn-outline-primary onAprobar" data-id="<?php echo $id; ?>" data-form="#frmCompra" data-src="compra">Aprobar</button>
      <?php endif; ?>
  </div>
  <div class="card-body collapse in">
    <div class="card-block">
      <div class="tab-content px-1 pt-1">
        <div class="row">
              <div class="col-12">
                <table class="table table-striped table-bordered zero-configuration">
                  <thead>
                    <tr>
                      <th>Producto</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      <?php echo $tbody; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                      </tr>
                    </tfoot>
                  </table>
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
