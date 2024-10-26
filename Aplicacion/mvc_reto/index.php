<?php

session_start();

require_once "config/config.php";
require_once "model/Db.php";

if(!isset($_GET["controller"])) $_GET["controller"] = constant("DEFAULT_CONTROLLER");
if(!isset($_GET["action"])) $_GET["action"] = constant("DEFAULT_ACTION");

$controller_path = "controller/" .$_GET["controller"]."Controller.php";

if(!file_exists($controller_path))
    $controller_path = "controller/".constant("DEFAULT_CONTROLLER").".php";

require_once $controller_path;
$controllerName = $_GET["controller"]."Controller";
$controller = new $controllerName();

$dataToView["data"] = array();
if(method_exists($controller, $_GET["action"]))
    $dataToView["data"] = $controller -> {$_GET["action"]}();

// Solo si el controlador es usuario y tiene la acción de login o recuperarContraseña:
if ($_GET["controller"] == "Usuario" && ($_GET["action"] == "login" || $_GET["action"] == "recuperar")){
    require_once "view/".$_GET["controller"]."/".$controller->view.".html.php";
}
else{
    // En los demás casos:
    //require_once "view/layout/header.php";
    require_once "view/".$_GET["controller"]."/".$controller->view.".html.php";
}

?>