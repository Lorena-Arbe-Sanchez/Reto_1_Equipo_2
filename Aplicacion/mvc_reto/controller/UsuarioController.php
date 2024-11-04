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

        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        // Pasarle los valores de las casillas necesarias como parámetros.
        $usuarioDB = $this->model->getUsuarioByUsuarioContrasena($usuario, $contrasena);

        //var_dump($result);

        if ($usuarioDB){

            // Usuario y contraseña correctos. Inicio sesión exitoso y redirigir al foro.

            $_SESSION["id"] = $usuarioDB["id"];
            $_SESSION["administrador"] = $usuarioDB["administrador"];

            // Guardar '$usuarioDB' en una variable de sesión.
            $_SESSION['usuarioDB'] = $usuarioDB;

            header("Location: index.php?controller=pregunta&action=list_paginated");
            exit(); // Asegurar que no se ejecute más código después de la redirección.
        }
        else{
            // Usuario no encontrado. Redirigir al login con un mensaje de error.
            header("Location: index.php?controller=usuario&action=login&error=1");
            exit();
        }
    }


    // Función para crear la vista.
    public function cuentas(){
        $this->view="gestionarCuenta";
    }

    // Función para el botón "Buscar" (filtrar) de la ventana de 'gestionarCuenta'.
    public function buscarFiltro(){
        $this->view="gestionarCuenta";
    }

    // Función para obtener el listado de cuentas existentes y para ponerlo en la ventana de la gestión de cuentas.
    public function list(){
        return $this->model->getUsuarios();
    }

    // Función para pasarle a la vista los datos del usuario logeado y mostrar la ventana.
    public function perfil(){
        // Si la sesión contiene los datos de $usuarioDB, hay que pasarlos a la vista.
        if (isset($_SESSION['usuarioDB'])){
            $usuarioSesion = $_SESSION['usuarioDB'];
            require_once __DIR__ . '/../view/usuario/perfil.html.php';
            exit();
        }
        else{
            error_log("Ha ocurrido un problema con los datos del usuario logeado.");
            exit();
        }
    }

    public function recuperar(){
        $this->view="recuperarContrasena";
    }

    // Función para la ventana de 'recuperarContrasena'.
    public function validarRecuperar(){

        $usuario = $_POST['usuario'];
        $contrasenaNueva = $_POST['contrasena1'];

        // Pasarle los valores de las casillas necesarias como parámetros.
        $result = $this->model->getUsuarioByUsuario($_POST['usuario']);

        if ($result){

            // Usuario y contraseña correctos. Cambio de contraseña exitoso y redirigir al foro.
            $cambioExitoso = $this->model->actualizarContrasena($usuario, $contrasenaNueva);

            if ($cambioExitoso){
                header("Location: index.php?controller=usuario&action=login");
                exit(); // Asegurar que no se ejecute más código después de la redirección.
            }
            else{
                echo("Error a la hora de recuperar contraseña");
            }
        }
        else{
            // Usuario no encontrado. Enviar un mensaje de error.
            echo("Usuario no encontrado");
            header("Location: index.php?controller=usuario&action=recuperar&error=1");
            exit();
        }
    }


    // Función para crear un usuario nuevo.
    public function save(){

        $this->view="gestionarCuenta";

        $param = $_POST;

        $id = $this->model->insertUsuario($param);
        // $result = $this->model->getUsuarioByUsuarioContrasena($usuario, $contrasena);

        //$_GET["response"] = true;
        // return $result;
        return true;


    }

}

?>