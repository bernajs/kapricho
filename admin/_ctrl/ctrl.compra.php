<?php
session_start();
require_once('../_class/class.compra.php');
$obj = new Compra();
switch($_POST['exec']) {
case "aprobar":
    $data = $_POST['data'];
    $productos = $obj->get_productos_compra($data);
    if($productos){
      foreach ($productos as $producto) {
        $obj->set_stock($producto['cantidad'])->set_modified_at(date("Y-m-d H:i:s"))->set_id($producto['id_producto'])->db('restar_stock');
      }
    }

    $obj->set_id($data)->set_status(1)->set_modified_at(date("Y-m-d H:i:s"))->db('aprobar');
    $result['status'] = 409;
    echo json_encode($result);
break;
case "delete":
    $data = $_POST['data'];
    $obj->set_id($data['id'])->db('delete');
    $result['status'] = 202;
    echo json_encode($result);
    break;
}
?>
