<?php

require_once "model/Respuesta.php";

class RespuestaController{


    private $table = "respuestas";
    private $connection;

    public function __construct(){
        $this->getConection();
    }
    public function getConection(){
        $dbObj = new Db();
        $this->connection = $dbObj ->conection;
    }


    public function create($respuesta){
        $this -> model = "CrearRespuesta";
        $this -> page_title = "Crear Respuesta";

        $param = $_POST;
        $id = $this->model->create($respuesta);

    }

}
?>
