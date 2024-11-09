<?php

ini_set('session.gc_maxlifetime', 604800); // 1 semana en segundos
ini_set('session.cookie_lifetime', 604800); // 1 semana en segundos

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

/* Siempre va a haber que llamar solo a la vista, ya que hay múltiples variables que pasar como parámetro al header,
    y además después del footer hay que llamar a diferentes archivos de JavaScript dependiendo de la ventana.
    (No es factible implementarlo).
    Por lo tanto, en cada página se decidirá si llamará al header y al footer o no, y qué variables pasarles. */
require_once "view/".$_GET["controller"]."/".$controller->view.".html.php";

/*
// Solo si el controlador es usuario y tiene la acción de login o recuperarContraseña:
if ($_GET["controller"] == "Usuario" && ($_GET["action"] == "login" || $_GET["action"] == "recuperar")){
    require_once "view/".$_GET["controller"]."/".$controller->view.".html.php";
}
else{
    // En los demás casos:
    require_once "view/layout/header.php";
    require_once "view/".$_GET["controller"]."/".$controller->view.".html.php";
    require_once "view/layout/footer.php";
}
*/

?>