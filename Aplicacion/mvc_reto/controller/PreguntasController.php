<?php

require_once "model/Pregunta.php";

class PreguntasController {

    public $page_title;
    public $view;
    public $model;


    public function __construct() {
        $this->view= "list";
        $this->page_title= "";
        $this->model= new Pregunta();

    }

    public function list(){

        $this -> view = "";
        $this -> page_title = "Lista Preguntas";
        $this -> model -> getPregunta();

    }

    public function listFrecuentes(){

        $this -> view = "foro";
        $this -> page_title = "Lista Preguntas Frecuentes";
        $this -> model -> getPreguntaFrecuentes();

    }

    public function create(){
        $this->page_title ='Crear Pregunta';
        $this->view ='crearPregunta';
    }

    public function save(){

        $this -> page_title ='Crear Pregunta';
        $this->view ='crearPregunta';

        $param = $_POST;
        $id = $this-> model -> save($param);
        $result = $this -> model -> getPreguntaById($id);

        $_GET["response"] = true;

        return $result;

    }


    //Borrar Pregunta
    public function delete(){

        $this->view ="borrarPregunta";
        return $this -> model -> deleteUsuario($_POST["id"]);

    }

    public function confirmarBorrar(){

        $this -> view ='confirmar';
        return $this -> model -> getPreguntaById($_POST["id"]);

    }






}
?>
