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

    public function getRespuestaById($id){
        $sql = "SELECT * FROM ". $this->tabla ." WHERE id = ?";
        $stml = $this->connection->prepare($sql);
        $stml -> execute([$id]);
        return $stml->fetch();
    }

    public function getRespuestaByPreguntaId($preguntaId){
        $sql = "SELECT * FROM ". $this->tabla ." WHERE id_pregunta = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt -> execute([$preguntaId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(){
        $this->page_title ='Crear Respuesta';
        $this->view ='create';
    }

    public function save($param) {
        $solucion = $archivo = "";
        $votosLike = $votosDislike = 0;
        $id_pregunta = $_GET['id_pregunta'];
        $id_usuario = $_SESSION['id'];
        $fecha = date('Y-m-d');

        if (isset($param["solucion"])) $solucion = $param["solucion"];
        if (isset($param["archivo"])) $archivo = $param["archivo"];

        if (isset($param["votosLike"])) $votosLike = $param["votosLike"];
        if (isset($param["votosDislike"])) $votosDislike = $param["votosDislike"];

        if (isset($param["id_pregunta"]) && !empty($param["id_pregunta"])){
            $id_pregunta = $_GET['id_pregunta'];
        }
        if (isset($param["id_usuario"]) && !empty($param["id_usuario"])){
            $id_usuario = $_SESSION['usuario'];
        }
        if (isset($param["fecha"])) $fecha = $param["fecha"];
    

        $sql = "INSERT INTO " . $this->tabla . " (solucion, archivo, votosLike, votosDislike, id_pregunta, id_usuario, fecha) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stm = $this->connection->prepare($sql);
        $stm->execute([$solucion, $archivo, $votosLike, $votosDislike, $id_pregunta, $id_usuario, $fecha]);

        $id = $this->connection->lastInsertId();
        return $id;
    }

}