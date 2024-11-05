<?php

require_once "model/Respuesta.php";

class RespuestaController {

    public $view;
    public $model;

    public function __construct() {
        $this->view = "crearRespuesta";
        $this->model = new Respuesta();
    }

    public function view($preguntaId){
        return $this->model->getRespuestaByPreguntaId($preguntaId);
    }

    // TODO
    public function crear(){
        $this->view = "crearRespuesta";
    }

    public function save(){
        $this->view ='crearRespuesta';

        $param = $_POST;
        $id = $this->model->save($param);
        $result = $this->model->getRespuestaById($id); //TODO

        $_GET["response"] = true;

        return $result;
    }

}

?>