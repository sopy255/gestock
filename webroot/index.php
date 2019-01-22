<?php
/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/05/2018
 * Time: 15:49
 */
define("WEBROOT", dirname(__FILE__));
define("ROOT", dirname(WEBROOT));
define("DS", DIRECTORY_SEPARATOR);
define("CORE", ROOT . DS . "core");
define("BASE_URL", dirname(dirname($_SERVER["SCRIPT_NAME"])));

ob_start();
require CORE . DS . "include.php";
$dispacther = new Dispatcher();
$cont = ob_get_clean();
require "home.php";
?>
