<?php
error_reporting(1);
switch ($_SERVER['SERVER_NAME']) {
    case "mbk":
        define("SERVER_HOST", "localhost");
        define('SERVER_USER', "root");
        define('SERVER_PASS', "qwerty123");
        define('SERVER_DB', "sousa");
        break;
    case "localhost":
        define("SERVER_HOST", "localhost");
        define('SERVER_USER', "root");
        define('SERVER_PASS', "");
        define('SERVER_DB', "kapricho");
        break;
    case "kaprichos.mx":
        define("SERVER_HOST", "kaprichos.mx");
        define('SERVER_USER', "kapricho");
        define('SERVER_PASS', "YOf0t39w4a");
        define('SERVER_DB', "kapricho_db");
        break;
}
