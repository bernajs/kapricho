<?php
session_start();
require_once('../admin/_class/class.service.php');
require_once('../_composer/class.notify.php');
$objNotify = new Notify();
$obj = new Service();
$data = $_POST['data'];
switch($_POST['exec']) {
    case "ver_credito":
        $_SESSION['ver_credito'] = $data;
        $result['redirect'] = 'perfil.php?call=credito_detalle';
        echo json_encode($result);
        break;
    case "editar_credito":
        $_SESSION['editar_credito'] = $data;
        if(isset($_SESSION['nuevo_credito'])){session_unset($_SESSION['nuevo_credito']);}
        $result['redirect'] = 'home.php';
        echo json_encode($result);
        break;
    case "nuevo_credito":
        $_SESSION['nuevo_credito'] = $data;
        if(isset($_SESSION['editar_credito'])){session_unset($_SESSION['editar_credito']);}
        $result['redirect'] = 'home.php';
        echo json_encode($result);
        break;
    case "personal":
        // Crea un array con los datos de cada tabla que cuando
        // se setean se convierten en json
        $apellido=$data['apaterno'].' '.$data['amaterno'];
        $informacion_personal=array("genero"=>$data['genero'],
        "fecha_nacimiento"=>$data['fecha_nacimiento'],
        "estado_civil"=>$data['estado_civil'],
        "fecha_casamiento"=>$data['fecha_casamiento'],
        "nivel_estudios"=>$data['nivel_estudios'],
        "rfc"=>$data['rfc']);
        
        $domicilio=array("calle"=>$data['calle'],
        "numero"=>$data['numero'],
        "colonia"=>$data['calle'],
        "entre_calles"=>$data['entre_calles'],
        "ciudad"=>$data['ciudad'],
        "estado"=>$data['estado'],
        "cp"=>$data['cp']);
        
        $informacion_vivienda =array("anos_residencia"=>$data['anos_residencia'],
        "tipo_vivienda"=>$data['tipo_vivienda'],
        "gasto_mensual_promedio"=>$data['gasto_mensual_promedio'],
        "dependientes_economicos"=>$data['dependientes_economicos']);
        
        $redes_sociales = array("facebook"=>$data['fb'],
        "twitter"=>$data['tw'],
        "instagram"=>$data['ig']);
        
        $cliente = array("nombre"=>$data['nombre'],
        "apellido"=>$apellido,
        "correo"=>$data['correo'],
        "telefono"=>$data['telefono'],
        "celular"=>$data['celular'],
        "informacion_personal"=>json_encode($informacion_personal),
        "domicilio"=>json_encode($domicilio),
        "informacion_vivienda"=>json_encode($informacion_vivienda),
        "redes_sociales"=>json_encode($redes_sociales));
        
        // Si el correo ya esta registrado devueve un status 409
        // if(!$obj->isDuplicate($data['correo'])){
        $obj->set_correo($data['correo'])->
        set_id($data['uid'])->
        set_nombre($data['nombre'])->
        set_apellido($apellido)->
        set_informacion_personal(json_encode($informacion_personal))->
        set_domicilio(json_encode($domicilio))->
        set_informacion_vivienda(json_encode($informacion_vivienda))->
        set_redes_sociales(json_encode($redes_sociales))->
        set_telefono($data['telefono'])->
        set_celular($data['celular'])->
        set_destino_prestamo($data['destino_prestamo'])->
        set_monto($data['monto'])->
        set_plazo($data['plazo'])->
        set_frecuencia($data['frecuencia'])->
        set_created_at(date("Y-m-d H:i:s"))->
        set_status(1)->
        db('personal');
        $result['status'] = 202;
        // $lid = $obj->getLastInserted();
        $result['credito'] = $obj->getLid();
        $result['redirect'] ="home.php?call=empleo";
        // }else{
        // $result['status'] = 409;
        // }
        echo json_encode($result);
        break;
}
?>