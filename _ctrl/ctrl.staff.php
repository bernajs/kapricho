<?php
session_start();
require_once('../admin/_class/class.staff.php');
require_once('../_composer/class.notify.php');
$objNotify = new Notify();
$obj = new Staff();
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
    $user = $obj->recover($data['e']);
    if($user){
        $notify_data = ['password' => $user[0]['password'], "first_name"=> $user[0]['first_name'], "last_name"=>$user[0]['last_name']];
        $objNotify->send("sousa-recover-password-admin",$notify_data,$user[0]['email']);
        $result['status'] = 202;
        // $result['redirect'] = "login.php";
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
        set_tipo($data['tipo'])->
        set_status($data['status'])->
        set_created_at(date("Y-m-d H:i:s"))->
        set_id($data['id'])->
        db('insert');
        $result['status'] = 202;
        echo json_encode($result);
}else{
    $result['status'] = 404;
    echo json_encode($result);
}

break;
case "update":
    $data = $_POST['data'];
    $obj->set_correo($data['correo'])->
    set_nombre($data['nombre'])->
    set_contrasena($data['contrasena'])->
    set_tipo($data['tipo'])->
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
