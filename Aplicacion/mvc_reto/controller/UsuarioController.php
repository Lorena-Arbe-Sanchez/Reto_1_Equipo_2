<?php

require_once "model/Usuario.php";

class UsuarioController {

    public $view;
    public $model;

    public function __construct() {
        $this->view = "login";
        $this->model = new Usuario();
    }

    public function login(){
        $this->view= "login";
    }

    // Función para comprobar la existencia del usuario en el login.
    public function validarLogin(){

        // Pasarle los valores de las casillas necesarias como parámetros.
        $result = $this->model->getUsuarioByUsuarioContrasena($_POST['usuario'], $_POST['contrasena']);

        if ($result){
            // Usuario y contraseña correctos. Inicio sesión exitoso y redirigir al foro.
            header("Location: index.php?controller=pregunta&action=foro");
            exit(); // Asegurar que no se ejecute más código después de la redirección.
        }
        else{
            // Usuario no encontrado. Redirigir al login con un mensaje de error.
            header("Location: index.php?controller=usuario&action=login&error=1");
            exit();
        }
    }

    public function cuentas(){
        $this->view="gestionarCuenta";
    }

    // Función para el botón "Buscar" (filtrar) de la ventana de 'gestionarCuenta'.
    public function buscarFiltro(){
        $this->view="gestionarCuenta";
    }

    public function perfil(){
        $this->view="perfil";
    }

    public function recuperar(){
        $this->view="recuperarContrasena";
    }

    // Función para la ventana de 'recuperarContrasena'.
    public function validarRecuperar(){

    }


    public function gestionarCuenta(){
        $this->view="gestionarCuenta";
        $this->page_title ="Gestionar Usuario";
    }

    public function perfil(){
        $this->view="perfil";
        $this->page_title ="Perfil";
    }

    public function recuperarContrasena(){
        $this->view="recuperarContrasena";
        $this->page_title="Recuperar contraseña";
    }
}

?>