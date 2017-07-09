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
    case "quintear.mobkii.net":
        define("SERVER_HOST", "quintear.mobkii.net");
        define('SERVER_USER', "mobkiiah_quintas");
        define('SERVER_PASS', "mobkii1M");
        define('SERVER_DB', "mobkiiah_quintear");
        break;
}
