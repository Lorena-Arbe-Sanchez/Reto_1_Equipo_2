<?php

require_once "model/usuario.php";


class UsuarioController {

    public $page_title;
    public $view;
    public $model;



    public function __construct() {

        $this->page_title = "";
        $this->view = "usuario";
        $this->model = new Usuario();

    }



    //Funcion para al hacer login mirar si existe el usuario
    public function login() {

        $this->page_title = "login";
        $this->view = "login";

        // Llama al modelo para validar usuario y contraseña
       // $result = $this->model->getValidateByUsuarioContrasenya($usuario, $contrasenya);

       /*
        *  // Si la autenticación es correcta
        if ($result) {

            // Verifica si es administrador
            $admin = $this->isAdmin();

            if ($admin) {
                // Si es administrador, redirige a la vista de administrador
                $_GET["responde"] = true;
                header("Location: foroAdmin.php");
            } else {
                // Si no es administrador, redirige a la vista de usuario estándar
                $_GET["responde"] = true;
                header("Location: foro.php");
            }

        } else {
            // Si la autenticación falla, retorna false y muestra un mensaje de error
            $_GET["responde"] = false;
            echo "Usuario o contraseña incorrectos";
        }

        return $result;
        *
        * */
    }


    // Comprueba si es admin o no para sacar una ventana o otra
    public function isAdmin(){

        $this->page_title = "usuario";
        $this->view = "login";
        return $this->model-> getAdminByUsuario($_GET["usuario"]);

    }

    //Crear usuario Nuevo
    public function create(){

        $this->page_title = "Create usuario";
        $this->view = "crearUsuario";
        $param = $_POST;
        //Mandar los datos atraves del param
    }


    public function save(){

        $this->page_title = "Create usuario";
        $this->view = "crearUsuario";

        $param = $_POST;
        $id = $this-> model -> saveUsuario($param);
        $result = $this->model->getUsuarioById($id);

        $_GET["responde"] =  true;
        return $result;

    }

    //Eliminar usuario
    public function delete(){

        $this->page_title = "Borrar usuario";
        $this->view = "borrarUsuario";
        return $this->model->deleteUsuarioById($_GET["id"]);

    }

    public function confirmarBorrarUsuario(){

        $this -> view = "borrarUsuario";
        return $this->model->getUsuarioById($_GET["id"]);

    }



    //Modificar usuario
    public function update(){

        $this->page_title = "Editar usuario";
        $this->view = "modificarUsuario";
        $id = $this->model->updateUsuario($_GET["id"]);
        $result = $this->model->getUsuarioById($id);
        $_GET["responde"] =  true;
        return $result;

    }


}


?>
