<?php

require_once "model/Pregunta.php";
require_once "RespuestaController.php";

class PreguntaController {

    public $view;
    public $model;

    public function __construct() {
        $this->view = "foro";
        $this->model = new Pregunta();
    }

    // Obtener los datos de todas las preguntas y mostrarlas en el foro.
    public function foro(){
        $this->view= "foro";
        $preguntas = $this->model->getPreguntas();

        $respuestaController = new RespuestaController();

        $preguntasConRespuestas = [];

        foreach($preguntas as $pregunta){
            $pregunta['respuestas'] = $respuestaController->view($pregunta['id']);

            $preguntasConRespuestas[] = $pregunta;
        }

        return $preguntasConRespuestas ?: [];
    }

    public function misPregunta(){
        $this->view= "misPreguntas";
    }

    public function crear(){
        $this->view = "crearPregunta";
    }

    public function save(){
        $this->view ='crearPregunta';

        $param = $_POST;
        $id = $this->model->save($param);
        $result = $this->model->getPreguntaById($id);

        $_GET["response"] = true;

        return $result;
    }

    // Eliminar pregunta.
    public function borrar(){
        $this->view ="borrarPregunta";

        return $this -> model -> deletePregunta($_POST["id"]);


        return $this -> model -> deleteUsuario($_POST["id"]);
    }

    public function confirmarBorrar(){
        $this -> view ='confirmar';
        return $this -> model -> getPreguntaById($_POST["id"]);
    }

    public function getPreguntas(){
        $this->view="foro";
        return $this->model->getPreguntas();
    }

}

?>