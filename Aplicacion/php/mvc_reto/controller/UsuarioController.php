<?php

require_once "model/Usuario.php";


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
    public function getUsuario($usuario, $contrasenya) {

        $this->page_title = "Usuario";
        $result =$this->model->getValidateByUsuarioContrasenya($usuario, $contrasenya);
        $_GET["responde"] =  true;

        if ($result){

            $admin = $this ->isAdmin();

            if ($admin){

                //Si es administrados
                // $this->view -> "foroAdmin"

            }else{

                //Si no es administrador
                // $this->view -> "foro"

            }
        }

        return $result;

    }

    // Comprueba si es admin o no para sacar una ventana o otra
    public function isAdmin(){

        $this->page_title = "Usuario";
        $this->view = "login";
        return $this->model-> getAdminByUsuario($_GET["usuario"]);

    }

    //Crear Usuario Nuevo
    public function create(){

        $this->page_title = "Create Usuario";
        $this->view = "crearUsuario";

    }


    public function save(){

        $this->page_title = "Create Usuario";
        $this->view = "crearUsuario";

        $param = $_POST;
        $id = $this-> model -> saveUsuario($param);
        $result = $this->model->getUsuarioById($id);

        $_GET["responde"] =  true;
        return $result;

    }

    //Eliminar usuario
    public function delete(){

        $this->page_title = "Borrar Usuario";
        $this->view = "borrarUsuario";
        return $this->model->deleteUsuarioById($_GET["id"]);

    }

    public function confirmarBorrarUsuario(){

        $this -> view = "borrarUsuario";
        return $this->model->getUsuarioById($_GET["id"]);

    }



    //Modificar usuario
    public function update(){

        $this->page_title = "Editar Usuario";
        $this->view = "modificarUsuario";
        $id = $this->model->updateUsuario($_GET["id"]);
        $result = $this->model->getUsuarioById($id);
        $_GET["responde"] =  true;
        return $result;

    }


}


?>
