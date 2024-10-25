<?php

require_once "model/Usuario.php";


class UsuarioController {

    public $page_title;
    public $view;
    public $model;



    public function __construct() {

        $this->page_title = "";
        $this->view = "login";
        $this->model = new Usuario();

    }


    //Funcion para al hacer login mirar si existe el usuario
    public function getUsuario($usuario, $contrasenya) {

        $this->page_title = "Usuario";
        $param = $_POST;
        $result =$this->model->getBodegaByUsuarioContrasenya($usuario, $contrasenya);
        $_GET["responde"] = true;
        return $result;

    }

    public function login(){
        $this->view= "login";
        $this->page_title = "Inicia sesión";
    }


    public function create(){
        $this->view="crear";
        $this->page_title ="Crear Usuario";
    }
}


?>
