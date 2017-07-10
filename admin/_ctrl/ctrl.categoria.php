<?php
session_start();
require_once('../_class/class.categoria.php');
$obj = new Categoria();
switch($_POST['exec']) {
case "save":
    $data = $_POST['data'];
    if(!$obj->isDuplicate($data['nombre'])){
        $obj->set_nombre($data['nombre'])->
        set_descripcion($data['descripcion'])->
        set_sexo($data['sexo'])->
        set_destacado($data['destacado'])->
        set_imagen($data['imagen'])->
        set_status($data['status'])->
        set_created_at(date("Y-m-d H:i:s"))->
        db('insert');
        $result['status'] = 202;
        echo json_encode($result);
}else{
    $result['status'] = 409;
    echo json_encode($result);
}
break;
case "update":
    $data = $_POST['data'];
    $obj->set_nombre($data['nombre'])->
    set_descripcion($data['descripcion'])->
    set_sexo($data['sexo'])->
    set_destacado($data['destacado'])->
    set_imagen($data['imagen'])->
    set_status($data['status'])->
    set_modified_at(date("Y-m-d H:i:s"))->
    set_id($data['id'])->
    db('update');
    $result['status'] = 202;
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
