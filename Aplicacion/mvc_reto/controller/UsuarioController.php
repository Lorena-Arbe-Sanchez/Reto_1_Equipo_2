<?php

require_once "model/Usuario.php";

class UsuarioController {

    //public $page_title;
    public $view;
    public $model;

    public function __construct() {
        //$this->page_title = "";
        $this->view = "login";
        $this->model = new Usuario();
    }

    public function login(){
        $this->view= "login";
        //$this->page_title = "Inicia sesión";
    }

    // Función para comprobar la existencia del usuario en el login.
    public function validar(){
        //$this->page_title = "Usuario";

        // TODO
        error_log("llegar a validar");

        // Pasarle los valores de las casillas necesarias como parámetros.
        $result = $this->model->getUsuarioByUsuarioContrasena($_POST['usuario'], $_POST['contrasena']);

        // TODO
        error_log("salir de getUsuarioByUsuarioContrasena");

        if ($result){
            // TODO
            error_log("true resultado");

            // Usuario y contraseña correctos. Inicio sesión exitoso y redirigir al foro.
            header("Location: index.php?controller=pregunta&action=foro");
            exit(); // Asegurar que no se ejecute más código después de la redirección.
        }
        else{
            // TODO
            error_log("false resultado");

            // Usuario no encontrado. Redirigir al login con un mensaje de error.
            header("Location: index.php?controller=usuario&action=login&error=1");
            exit();
        }
    }

}

?>