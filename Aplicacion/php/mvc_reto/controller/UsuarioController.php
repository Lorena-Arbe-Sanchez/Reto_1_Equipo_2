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

    //Crear Usuario

    public function create() {

        $this->page_title = "Crear Usuario";
        $this->view = "crearCuenta";

    }

    public function save(){

        $this->page_title = "Crear Usuario";
        $this->view = "crearCuenta";

        $param = $_POST;
        $id = $this->model->save($param);
        $result = $this->model->getBodegaById($id);

        $_GET["responde"] = true;



    }











    //Funcion para al hacer login mirar si existe el usuario
    public function getUsuario($usuario, $contrasenya) {

        $this->page_title = "Usuario";
        $this->view = "usuario";
        $param = $_POST;
        $result =$this->model->getBodegaByUsuarioContrasenya($usuario, $contrasenya);
        $_GET["responde"] = true;
        return $result;

    }

    public function UsuarioAdmin(){
        $this->page_title = "Usuario";
        $this->view = "usuario";

    }



}


?>
