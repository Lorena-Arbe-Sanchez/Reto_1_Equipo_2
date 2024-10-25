<?php

require_once "model/Pregunta.php";

class preguntaController {

    public $page_title;
    public $view;
    public $model;



    public function __construct() {

        $this->page_title = "";
        $this->view = "foro";
        $this->model = new Pregunta();

    }


    //Funcion para al hacer login mirar si existe el usuario
    /*
    public function getPregunta($usuario, $contrasenya) {

        $this->page_title = "Usuario";
        $param = $_POST;
        $result =$this->model->getBodegaByUsuarioContrasenya($usuario, $contrasenya);
        $_GET["responde"] = true;
        return $result;

    }
        */

    public function foro(){
        $this->view= "foro";
        $this->page_title = "Foro";
    }

    public function crearPregunta(){
        $this->view = "crear";
        $this->page_title = "Crear pregunta";
    }

}




?>
