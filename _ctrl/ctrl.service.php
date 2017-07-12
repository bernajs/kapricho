<?php
session_start();
require_once('../admin/_class/class.service.php');
require_once('../_composer/class.notify.php');
$objNotify = new Notify();
$obj = new Service();
$data = $_POST['data'];
switch($_POST['exec']) {
    case "get_productos_by_categoria":
        $data == 0 ? $productos = $obj->get_productos_destacados($data) : $productos = $obj->get_productos_by_categoria($data);
        $productos_result = array();
        if($productos){$result['data'] = $productos; $result['status'] = 202;}
        else {$result['status'] = 0;}
    echo json_encode($result);
    break;
    case "get_producto":
    $producto = $obj->get_producto($data);
        if($producto){$result['data'] = $producto[0]; $result['status'] = 202;}
        else {$result['status'] = 0;}
    echo json_encode($result);
    break;
    case "get_productos":
    $productos = array();
    foreach ($data as $producto) {
      if($producto['c'] <= 0) continue;
      $p = $obj->get_producto($producto['id']);
      array_push($productos, $p[0]);
    }
    if($productos){$result['data'] = $productos; $result['status'] = 202;}
    else {$result['status'] = 0;}
    echo json_encode($result);
    break;
}
?>
