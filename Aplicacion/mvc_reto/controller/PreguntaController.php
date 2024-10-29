<?php

require_once "model/Pregunta.php";

class PreguntaController {

    public $view;
    public $model;

    public function __construct() {
        $this->view = "foro";
        $this->model = new Pregunta();
    }

    public function foro(){
        $this->view= "foro";
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
        return $this -> model -> deleteUsuario($_POST["id"]);

    }

    public function confirmarBorrar(){

        $this -> view ='confirmar';
        return $this -> model -> getPreguntaById($_POST["id"]);

    }

}

?>