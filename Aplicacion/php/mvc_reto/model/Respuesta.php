<?php

class Respuesta{


    private $page_title;

    private $connection;

    public $model;


    public function __construct(){
        $this -> getConnection();
    }

    public function getConnection(){
        $dbObj = new Db();
        $this->connection = $dbObj ->connection;
    }

    public function getRespuestasByPregunta(){



    }

    public function saveRespuesta(){

        $id = $solucion = $archivo = $votosLike = $votosDislike = $id_pregunta = $id_usuario = $fecha = "";



    }


}