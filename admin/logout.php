<?php 
error_reporting(0);
session_start();
session_unset($_SESSION['onSessionAdmin']); 
session_destroy();
sleep(1);
header('Location: index.php');
?> 