<?php

require_once "model/Respuesta.php";

class RespuestaController {

    public $view;
    public $model;

    public function __construct() {
        $this->view = "foro";
        $this->model = new Respuesta();
    }



}



?>