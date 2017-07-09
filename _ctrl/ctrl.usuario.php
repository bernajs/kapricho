<?php
session_start();
require_once('../admin/_class/class.cliente.php');
require_once('../_composer/class.notify.php');
$objNotify = new Notify();
$obj = new Cliente();
switch($_POST['exec']) {
    case "login":
        $data = $_POST['data'];
        $user = $obj->isRegistered($data['email'],$data['password']);
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
case "register":
    $data = $_POST['data'];
    if(!$obj->isDuplicate($data['email'])){
    if($data['fb_id']){$password = $data['fb_id'];}else{$password = $data['password'];}
    $obj->set_correo($data['email'])->
    set_nombre($data['name'])->
    set_apellido($data['last_name'])->
    set_contrasena($password)->
    set_fb_id($data['fb_id'])->
    set_telefono($data['telefono'])->
    set_created_at(date("Y-m-d H:i:s"))->
    set_status(1)->
    db('insert');
    // $result['redirect'] = 'home.php';
    // $result['status'] = 202;
    $_SESSION["onSession"] = true;
    $_SESSION["uid"] = $obj->getLastInserted();
    $result['status'] = 202;
}else{
    $result['status'] = 404;
}
echo json_encode($result);
break;
}
?>