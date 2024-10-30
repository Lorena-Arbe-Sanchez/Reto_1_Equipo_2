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

            // TODO : Hacer lo de verificar si es administrador y guardar la variable (mirar en "feature/Aritz").

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


    //Funcion para crear la vista
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

        $usuario = $_POST['usuario'];
        $contrasenaNueva = $_POST['contrasena1'];

        // Pasarle los valores de las casillas necesarias como parámetros.
        $result = $this->model->getUsuarioByUsuario($_POST['usuario']);

        if ($result){

            // TODO : Hacer lo de verificar si es administrador y guardar la variable (mirar en "feature/Aritz").

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


    //Funcion para crear un usuario nuevo
    public function save(){

        $this->view="gestionarCuenta";

        $param = $_POST;

        $id = $this->model->insertUsuario($param);
       // $result = $this->model->getUsuarioByUsuarioContrasena($usuario, $contrasena);

        //$_GET["response"] = true;
       // return $result;
        return true;


    }


    //Funcion para buscar si existe el usuario atraves del dni
    public function buscar(){

        $this->view="editarCuenta";

        $dni = "";
        if(isset($_GET["dniBuscar"])) $dni = $_GET["dniBuscar"];
        error_log("buscar:" . $dni);

        return $this->model->getUsuarioByDNI($dni);
    }


    public function editar(){
        $this->view="gestionarCuenta";
        $dni = $this->model->modificarUsuario($_POST);
        $result = $this->model->getUsuarioByDNI($dni);
        $_GET["response"] = true;
        return $result ;
    }

    //Funcion para eliminar usuario  CREAR VENTANITA PARA CONFIRMACION
    public function eliminar(){

        $this->view="gestionarCuenta";
        return $this->model->borrarUsuario($_POST["id"]);

    }

}

?>