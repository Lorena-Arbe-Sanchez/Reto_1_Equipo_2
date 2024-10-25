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
