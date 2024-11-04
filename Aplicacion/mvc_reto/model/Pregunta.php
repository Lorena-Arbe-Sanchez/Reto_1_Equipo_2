<?php

class Pregunta {

    private $tabla = "preguntas";
    private $connection;

    public function __construct() {
        $this->getConexion();
    }

    public function getConexion(){
        $dbObj = new Db();
        $this->connection = $dbObj ->connection;
    }

    public function getPregunta(){
        $sql = "SELECT * FROM " . $this->tabla;

        $stml = $this -> connection -> prepare($sql);
        $stml -> execute();
        return $stml -> fetchAll();
    }

    // Para obtener las preguntas frecuentes (filtradas por más likes).
    public function getPreguntaFrecuentes(){
        $sql = "SELECT * FROM " . $this->tabla . "ORDER BY votosLike DESC";
        $stml = $this -> connection -> prepare($sql);
        $stml -> execute();
        return $stml -> fetchAll();
    }

    public function create(){
        $this->page_title ='Crear Pregunta';
        $this->view ='create';
    }

    public function save($param) {
        $titulo = $descripcion = $tema = $archivo = "";
        $fecha = date('Y-m-d');
        $id_usuario = $_SESSION["id"];
        $votosLike = $votosDislike = 0;

        if (isset($param["titulo"])) $titulo = $param["titulo"];
        if (isset($param["descripcion"])) $descripcion = $param["descripcion"];
        if (isset($param["tema"])) $tema = $param["tema"];
        if (isset($param["fecha"]) && !empty($param["fecha"])){
            $fecha = $param["fecha"];  // Usar la fecha proporcionada si no está vacía.
        }
        if (isset($param["id_usuario"]) && !empty($param["id_usuario"])){
            $id_usuario = $_SESSION['usuario'];
        }
        if (isset($param["archivo"])) $archivo = $param["archivo"];
        if (isset($param["votosLike"])) $votosLike = $param["votosLike"];
        if (isset($param["votosDislike"])) $votosDislike = $param["votosDislike"];

        $sql = "INSERT INTO " . $this->tabla . " (titulo, descripcion, tema, fecha, id_usuario, archivo, votosLike, votosDislike) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stm = $this->connection->prepare($sql);
        $stm->execute([$titulo, $descripcion, $tema, $fecha, $id_usuario, $archivo, $votosLike, $votosDislike]);

        $id = $this->connection->lastInsertId();
        return $id;
    }

    public function getPreguntaById($id){
        $sql = "SELECT * FROM ". $this->tabla ." WHERE id = ?";
        $stml = $this->connection->prepare($sql);
        $stml -> execute([$id]);
        return $stml->fetch();
    }



    public function deletePregunta($id)
    {

        $sql = "Detele from " . $this->tabla . "WHERE id=$id";


    }


    public function deleteUsuario($id)
    {
        $sql = "Detele from " . $this->tabla . " WHERE id=$id";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getPreguntas(){
        $sql = "SELECT * FROM " . $this->tabla;
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}