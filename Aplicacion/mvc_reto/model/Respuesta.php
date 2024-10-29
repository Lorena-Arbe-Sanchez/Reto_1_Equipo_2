<?php

class Respuesta {

    private $tabla = "respuestas";
    private $connection;

    public function __construct() {
        $this->getConexion();
    }

    public function getConexion(){
        $dbObj = new Db();
        $this->connection = $dbObj ->connection;
    }

    public function getRespuestaByPreguntaId($preguntaId){
        $sql = "SELECT * FROM ". $this->tabla ." WHERE id_pregunta = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt -> execute([$preguntaId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



}