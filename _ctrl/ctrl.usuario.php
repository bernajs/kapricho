<?php
session_start();
require_once('../admin/_class/class.usuario.php');
require_once('../_composer/class.notify.php');
$objNotify = new Notify();
$obj = new Usuario();
switch($_POST['exec']) {
    case "login":
        $data = $_POST['data'];
        $user = $obj->isRegistered($data['u'],$data['p']);
        if($user){
            $result['redirect'] = 'index.php?call=carrito';
            $result['status'] = 202;
            $_SESSION["onSession"] = true;
            $_SESSION["uid"] = $user[0]['id'];
    }else{
        $result['status'] = 0;
    }
    echo json_encode($result);
    break;
case "fb_login":
    $data = $_POST['data'];
    $user = $obj->ifFbRegistered($data);
    if($user){
        $result['redirect'] = 'home.php';
        $result['status'] = 202;
        $_SESSION["onSession"] = true;
        $_SESSION["uid"] = $user[0]['id'];
}else{
    $result['status'] = 0;
}
echo json_encode($result);
break;
case "recover":
    $correo = $_POST['data'];
    $user = $obj->recover($correo);
    if($user){
        $notify_data = ['contrasena' => $user[0]['contrasena'], "usuario"=> $user[0]['nombre']];
        $objNotify->send("eleve-recover",$notify_data,$user[0]['correo']);
        $result['status'] = 202;
        // $result['redirect'] = "login.php";
}else{
    $result['status'] = 404;
}
echo json_encode($result);
break;
case "update":
    $data = $_POST['data'];
    $obj->set_id($data['id'])->
    set_correo($data['correo'])->
    set_nombre($data['nombre'])->
    set_apellido($data['apellidos'])->
    set_contrasena($data['contrasena'])->
    set_telefono($data['telefono'])->
    set_modified_at(date("Y-m-d H:i:s"))->
    set_status(1)->
    db('update');
    $result['status'] = 202;
echo json_encode($result);
break;
}
?>
