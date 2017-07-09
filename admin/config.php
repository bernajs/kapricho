<?php
switch($_SERVER['SERVER_NAME']){
  case "localhost":
  case "mbk":
   define("SERVER_HOST","localhost");   
   define('SERVER_USER',"root");
   define('SERVER_PASS',"qwerty123");
   define('SERVER_DB',"sousa");
  break;
  case "orders.oasisgrowersolutions.com":
   define("SERVER_HOST","mobkii.net");   
   define('SERVER_USER',"mobkiiah_dev");
   define('SERVER_PASS',"qwerty123");
   define('SERVER_DB',"mobkiiah_taxiapp");
  break;  
}
?>