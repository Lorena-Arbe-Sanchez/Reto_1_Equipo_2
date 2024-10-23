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

    public function create(){
        $this->page_title ='Crear Pregunta';
        $this->view ='create';
    }

    public function save(){

        $this -> page_title ='Crear Pregunta';
        $this->view ='create';

        $param = $_POST;
        $id = $this-> model -> save($param);
        $result = $this -> model -> getPreguntaById($id);

        $_GET["response"] = true;

        return $result;

    }



}
?>
