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

    public function misPreguntas(){
        $this->view = "misPreguntas";
        return $this->model->sacarRespuestasPorUsuario();
    }


    public function borrar(){
        $this->view ='foro';
        return $this -> model -> deleteRespuesta($_GET["id"]);
    
    }
    
    public function editar(){
    
        $this->view ='editarRespuesta';
        $param = $_POST;
    
        $id = $this->model->modificarRespuesta($param);
    
        $_GET["response"] = true;
    
    
    }
    
    //Funcion cuando des al boton like
    public function modificarLikes(){
    
        $this->view ='foro';
        $this -> model -> modificarLikes($_GET["id"]);
    
    }

    public function modificarDislikes(){

        $this->view ='foro';
        $this -> model -> modificarDislikes($_GET["id"]);
    
    }

}

?>