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

    // Obtener los datos de todas las preguntas de manera paginada y mostrarlas en el foro + controlar los filtros.
    public function list_paginated(){

        $this->view = 'foro';
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $tema = null;
        $palabraClave = null;
        $fechaOrden = null;

        // Comprobar si se ha seleccionado un tema en el filtro.
        if (!empty($_GET['filtroTema'])){
            $tema = $_GET['filtroTema'];
        }
        // Si no hay filtrado por tema, el tema permanecerá vacío.

        // Comprobar si hay un filtro de búsqueda por palabras clave.
        if (!empty($_GET['filtroBusqueda'])) {
            $palabraClave = $_GET['filtroBusqueda'];
        }

        // Obtener todas las preguntas, paginadas y con filtros.
        // Se podrán combinar filtro_tema y filtro_busqueda a la vez.
        list($preguntas, $currentPage, $totalPages) = $this->model->getPreguntasPaginated($tema, $palabraClave, $page);

        $respuestaController = new RespuestaController();
        $preguntasConRespuestas = [];

        // Obtener respuestas para cada pregunta.
        foreach ($preguntas as $pregunta){
            $pregunta['respuestas'] = $respuestaController -> view($pregunta['id']);
            $preguntasConRespuestas[] = $pregunta;
        }

        // Devolver las preguntas con sus respuestas y la información de paginación.
        return [$preguntasConRespuestas, $currentPage, $totalPages];
    }

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

    // Obtener los datos de las preguntas y respuestas del usuario logeado y mostrarlos en su ventana.
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

    // Mostrar la ventana para crear una pregunta.
    public function crear(){
        $this->view = "crearPregunta";
    }

    // Función para validar la creación de una pregunta.
    public function save(){
        $this->view ='crearPregunta';

        $param = $_POST;
        $id = $this->model->save($param);
        $result = $this->model->getPreguntaById($id);

        $_GET["response"] = true;

        return $result;
    }

    // Función para eliminar una pregunta.
    public function borrar(){
        $this->view ="misPreguntas";
        header("Location: index.php?controller=pregunta&action=misPreguntas");
        return $this -> model -> deletePregunta($_GET["id"]);
    }

    // Función para verificar la eliminación de una pregunta.
    // TODO : Poner un 'confirm()', no una ventana nueva.
    public function confirmarBorrar(){
        $this -> view ='confirmar';
        return $this -> model -> getPreguntaById($_POST["id"]);
    }

}

?>