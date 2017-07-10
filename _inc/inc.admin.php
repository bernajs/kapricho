<?php
session_start();
if(!isset($_SESSION["onSessionAdmin"]) || is_null($_SESSION["onSessionAdmin"])){ header("Location: login.php"); }
// $uid = $_SESSION['aid'];
//
// if($uid){
//     require_once('_class/class.admin.php');
//     $Staff = new Admin();
//     $staff = $Staff->get_data($uid);
//     $nombre = $staff[0]['nombre'];
// }
