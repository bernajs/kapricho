<?php
session_start();
if(!isset($_SESSION["onSessionAdmin"]) || is_null($_SESSION["onSessionAdmin"])){ header("Location: login.php"); }
$uid = $_SESSION['uid'];

if($uid){
    require_once('_class/class.staff.php');
    $Staff = new Staff();
    $staff = $Staff->getData($uid);
    $nombre = $staff[0]['nombre'];
    $tipo = $staff[0]['tipo'];
}