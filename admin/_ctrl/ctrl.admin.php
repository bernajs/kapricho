<?php
session_start();
require_once('../_class/class.admin.php');
require_once('../../_composer/class.notify.php');
$objNotify = new Notify();
$obj = new Admin();
switch($_POST['exec']) {
    case "login":
        $data = $_POST['data'];
        $user = $obj->isRegistered($data['u'],$data['p']);
        if($user){
            $result['redirect'] = 'index.php';
            $result['status'] = 202;
            $_SESSION["onSessionAdmin"] = true;
            $_SESSION["uid"] = $user[0]['id'];
    }else{
        $result['status'] = 0;
    }
    echo json_encode($result);
    break;
case "recover":
    $data = $_POST['data'];
    $admin = $obj->recover($data['e']);
    if($admin){
        $notify_data = ['contrasena' => $admin[0]['contrasena'], "nombre"=> $admin[0]['nombre'], "apellido"=>$admin[0]['apellido']];
        $objNotify->send("sousa-recover-password-admin",$notify_data,$admin[0]['correo']);
        $result['status'] = 202;
}else{
    $result['status'] = 404;
}
echo json_encode($result);
break;
case "save":
    $data = $_POST['data'];
    if(!$obj->isDuplicate($data['correo'])){
        $obj->set_correo($data['correo'])->
        set_nombre($data['nombre'])->
        set_contrasena($data['contrasena'])->
        set_apellido($data['apellido'])->
        set_status($data['status'])->
        set_created_at(date("Y-m-d H:i:s"))->
        set_id($data['id'])->
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
    $obj->set_correo($data['correo'])->
    set_nombre($data['nombre'])->
    set_contrasena($data['contrasena'])->
    set_apellido($data['apellido'])->
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
