<?php 
error_reporting(0);
session_start();
session_unset($_SESSION['onSession']); 
session_unset($_SESSION['uid']); 
session_unset($_SESSION['editar_credito']); 
session_unset($_SESSION['nuevo_credito']); 
session_destroy();
sleep(1);
header('Location: http://eleve.mx');
?> 