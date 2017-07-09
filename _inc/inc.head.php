<?php
// session_start();
// $uid = false;
// if(isset($_SESSION["uid"])){
//     $uid = $_SESSION['uid'];
//     include('admin/_class/class.credito.php');
//     $Credito = new Credito();
//     $creditos_pendientes = $Credito->get_pendientes_home($uid);
//     if($creditos_pendientes){
//         $_SESSION['editar_credito'] = $creditos_pendientes[0]['id'];
//     }
// }else{
// }
// function redirect($url){
//   header("Location: http://localhost/mobkii/vsv/index.php");
// }
include_once('admin/class.service.php');
include_once('methods.php');
$Service = new Service();
// function get_calificacion($calificacion){
//   $calificacion_pr .=  str_repeat('<i class="fa fa-star positivo" aria-hidden="true"></i>', $calificacion);
//   if($calificacion < 5){$calificacion_pr .= str_repeat('<i class="fa fa-star negavito" aria-hidden="true"></i>', (5 - $calificacion));}
//   return $calificacion_pr;
// }

// $uid = 1;
