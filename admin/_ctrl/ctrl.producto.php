<?php
session_start();
require_once('../_class/class.producto.php');
$obj = new Producto();
switch($_POST['exec']) {
case "save":
    $data = $_POST['data'];
    if(!$obj->isDuplicate($data['nombre'])){
      $imagenes = imagenes_to_array($data['imagenes[']);
      $obj->set_id_categoria($data['categoria'])->
        set_nombre($data['nombre'])->
        set_imagenes($imagenes)->
        set_descripcion($data['descripcion'])->
        set_colores($data['colores'])->
        set_tallas($data['tallas'])->
        set_descuento($data['descuento'])->
        set_precio($data['precio'])->
        set_destacado($data['destacado'])->
        set_stock($data['stock'])->
        set_status($data['status'])->
        set_created_at(date("Y-m-d H:i:s"))->
        set_id($data['id'])->
        db('insert');
        $result['status'] = 202;
        $id = $obj->getLastInserted();
        // if(isset($data['caracteristica['])) $caracteristicas = $data['caracteristica[']; else $caracteristicas = '';
        // insert_caracteristicas($id, $caracteristicas, $obj);
        $result['redirect'] = 'index.php?call=producto_detalle&id='.$id;
        echo json_encode($result);
}else{
    $result['status'] = 409;
    echo json_encode($result);
}
break;
case "update":
    $data = $_POST['data'];
    $imagenes = imagenes_to_array($data['imagenes[']);
    // $direccion = direccion_to_json($data);
    // $coordenadas = coords_to_json($data);
    $obj->set_nombre($data['nombre'])->
    set_imagenes($imagenes)->
    set_id_categoria($data['categoria'])->
    set_precio($data['precio'])->
    set_colores($data['colores'])->
    set_tallas($data['tallas'])->
    set_descuento($data['descuento'])->
    set_stock($data['stock'])->
    set_descripcion($data['descripcion'])->
    set_destacado($data['destacado'])->
    set_status($data['status'])->
    set_modified_at(date("Y-m-d H:i:s"))->
    set_id($data['id'])->
    db('update');
    // if(isset($data['caracteristica['])) $caracteristicas = $data['caracteristica[']; else $caracteristicas = '';
    // insert_caracteristicas($data['id'], $caracteristicas, $obj);
    $result['status'] = 202;
    echo json_encode($result);
    break;
case "delete":
    $data = $_POST['data'];
    $obj->set_id($data['id'])->db('delete');
    $result['status'] = 202;
    echo json_encode($result);
    break;
case "get_dueno":
    $data = $_POST['data'];
    $dueno = $obj->get_dueno($data['id']);
    $nombre = $dueno[0]['nombre'] . ' '. $dueno[0]['apellido'];
    if ($dueno) {$result['status'] = 202; $result['dueno'] = $nombre; $result['id'] = $dueno[0]['id'];} else {$result['status'] = 404;}
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
function direccion_to_json($data){
  return array('calle'=>$data['calle'],
  'numero'=>$data['numero'],
  'colonia'=>$data['colonia'],
  'cp'=>$data['cp'],);
}
function coords_to_json($data){return array('lat'=>floatval($data['lat']), "lng"=>floatval($data['lng']));}
function imagenes_to_array($imagenes){
  $imagenes = str_replace('|', '', $imagenes);
  $imagenes = explode(',', $imagenes);
  return json_encode($imagenes);
}
function insert_caracteristicas($id, $caracteristicas, $obj){
  $caracteristicas = explode('|', $caracteristicas);

  if($id){$obj->set_id($id)->db('delete_caracteristica');}
  foreach ($caracteristicas as $caracteristica) {
    if($caracteristica) $obj->set_id($id)->set_id_caracteristica($caracteristica)->set_created_at(date("Y-m-d H:i:s"))->db('insert_caracteristica');
  }
}
?>
