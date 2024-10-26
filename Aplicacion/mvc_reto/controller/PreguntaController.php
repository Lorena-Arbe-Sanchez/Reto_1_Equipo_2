<?php

require_once "model/Pregunta.php";

class PreguntaController {

    public $view;
    public $model;

    public function __construct() {
        $this->view = "login";
        $this->model = new Pregunta();
    }

    public function foro(){
        $this->view= "foro";
    }

}

?>