<?php
include_once('../_class/class.files.php');
$Files = new Files();
switch($_POST['exec']) {
  case "delete_imagen":
    $data = $_POST['data'];
    $imagenes = $Files->get_imagenes_quinta($data['id']);
    if (!$imagenes) return;
    $imagenes = json_decode($imagenes[0]['fotos']);
    // $imagenes_array = array();
    // foreach ($imagenes as $img) {
    //   echo 'hola';
    //   $img == $data['imagem'] ? array_push($imagenes_array, $img) : false;
    // }
    if(($key = array_search($data['imagen'], $imagenes)) !== false) {unset($imagenes[$key]);}
    $test = implode('","', $imagenes);
    $test = '["'.$test.'"]';
    // $test = str_repla
    // $test = explode(' ', $test);
    // print_r($test);
    if(unlink("../uploads/".$data['path'].'/'.$data['imagen'])){
      $result['status'] = 202;
      $Files->set_id($data['id'])->set_data(($test))->set_modified_at(date("Y-m-d H:i:s"))->db('update_img_quinta');
    }else{$result['status'] = 404;};
	echo json_encode($result);
  break;
}
?>
