<?php
session_start();
require_once('../_class/class.servicio.php');
require_once('../../_composer/class.notify.php');
$objNotify = new Notify();
$obj = new Servicio();
$data = $_POST['data'];
switch($_POST['exec']) {
case "save":
    $data = $_POST['data'];
    if(!$obj->isDuplicate($data['correo'])){
        $info = info_to_json($data);
        $obj->set_nombre($data['nombre'])->
        set_info($info)->
        set_imagen($data['imagen'])->
        set_destacado($data['destacado'])->
        set_status($data['status'])->
        set_created_at(date("Y-m-d H:i:s"))->
        set_id($data['id'])->
        db('insert');
        if(isset($data['categoria['])) $categorias = $data['categoria[']; else $categorias = '';
        insert_categorias($obj->getLastInserted(), $categorias, $obj);
        $result['status'] = 202;
        echo json_encode($result);
}else{
    $result['status'] = 409;
    echo json_encode($result);
}
break;
case "update":
    $data = $_POST['data'];
    $info = info_to_json($data);
    $obj->set_nombre($data['nombre'])->
    set_info($info)->
    set_imagen($data['imagen'])->
    set_destacado($data['destacado'])->
    set_status($data['status'])->
    set_modified_at(date("Y-m-d H:i:s"))->
    set_id($data['id'])->
    db('update');
    if(isset($data['categoria['])) $categorias = $data['categoria[']; else $categorias = '';
    insert_categorias($data['id'], $categorias, $obj);
    $result['status'] = 202;
    echo json_encode($result);
    break;
case "delete":
    $data = $_POST['data'];
    $obj->set_id($data['id'])->db('delete');
    $result['status'] = 202;
    echo json_encode($result);
    break;
case "destacado":
    $data = $_POST['data'];
    $destacado = $data['destacado'];
    $destacado == 1 ? $destacado = 0 : $destacado = 1;
    $obj->set_id($data['id'])->set_destacado($destacado)->set_modified_at(date("Y-m-d H:i:s"))->db('destacado');
    $result['status'] = 202;
    echo json_encode($result);
    break;
}

function info_to_json($data){
  return json_encode(array('telefono' => $data['telefono'],
      'telefono' => $data['telefono'],
      'correo' => $data['correo'],
      'pagina' => $data['pagina'],
      'fb' => $data['fb'],
      'tw' => $data['tw'],
      'ig' => $data['ig'],
      'descripcion' => $data['descripcion']));
}

function insert_categorias($id, $categorias, $obj){
  $categorias = explode('|', $categorias);

  if($id){$obj->set_id($id)->db('delete_categoria');}
  foreach ($categorias as $categoria) {
    if($categoria) $obj->set_id($id)->set_id_categoria($categoria)->set_created_at(date("Y-m-d H:i:s"))->db('insert_categoria');
  }
}
?>
