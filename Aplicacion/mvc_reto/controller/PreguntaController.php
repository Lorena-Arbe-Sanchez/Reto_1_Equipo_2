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

    // TODO : Borrar si no se utiliza.
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

    public function misPreguntas(){
        $this->view = "misPreguntas";
    
        // Obtener preguntas del usuario
        $preguntas = $this->model->getPregunta();
        
        // Instanciar el RespuestaController
        $respuestaController = new RespuestaController();
        
        $preguntasConRespuestas = [];
        
        // Obtener respuestas para cada pregunta
        foreach ($preguntas as $pregunta) {
            $pregunta['respuestas'] = $respuestaController->view($pregunta['id']);
            $preguntasConRespuestas[] = $pregunta;
        }

        return $preguntasConRespuestas ?: [];
    }

    public function list_paginated(){
        $this->view = 'foro';
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        // Obtener preguntas paginadas
        list($preguntas, $currentPage, $totalPages) = $this->model->getPreguntasPaginated($page);

        $respuestaController = new RespuestaController();
        $preguntasConRespuestas = [];

        // Obtener respuestas para cada pregunta
        foreach ($preguntas as $pregunta) {
            $pregunta['respuestas'] = $respuestaController->view($pregunta['id']);
            $preguntasConRespuestas[] = $pregunta;
        }

        // Devolver las preguntas con sus respuestas y la información de paginación
        return [$preguntasConRespuestas, $currentPage, $totalPages];
    }

    /*
    public function list_paginated(){
        $this->view = 'foro';
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        return $this->model->getPreguntasPaginated($page);
    }
    */

    // Obtener los datos de las preguntas frecuentes (con más likes; más recurridas) y mostrarlas en su ventana.
    public function frecuentes(){
       $this->view = 'frecuentes';
       $page = isset($_GET['page']) ? $_GET['page'] : 1;

       list($preguntas, $currentPage, $totalPages) = $this->model->getPreguntasFrecuentesPaginated($page);

       $respuestaController = new RespuestaController();
       $preguntasConRespuestas = [];

       foreach ($preguntas as $pregunta) {
           $pregunta['respuestas'] = $respuestaController->view($pregunta['id']);
           $preguntasConRespuestas[] = $pregunta;
       }

       return [$preguntasConRespuestas, $currentPage, $totalPages];
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
        $this->view ="misPreguntas";
        header("Location: index.php?controller=pregunta&action=misPreguntas");
        return $this -> model -> deletePregunta($_GET["id"]);
    }

    public function confirmarBorrar(){
        $this -> view ='confirmar';
        return $this -> model -> getPreguntaById($_POST["id"]);
    }

    public function getPreguntas(){
        $this->view="foro";
        return $this->model->getPreguntas();
    }


    public function filtrarPorTema(){

        $this->view="foro";
        error_log($_GET['tema']);
        return $this -> model -> filtrarTema($_GET['tema']);

    }

}

?>