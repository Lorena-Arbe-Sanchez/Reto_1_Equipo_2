<?php

class Pregunta{


    private $tabla = "preguntas";
    private $connection;

    public function __construct(){
        $this->getConnection();
    }

    public function getConnection(){
        $dbObj = new Db();
        $this->connection = $dbObj ->connection;
    }

    public function getPregunta(){

        $sql = "SELECT * FROM " . $this->tabla;

        $stml = $this -> connection -> prepare($sql);
        $stml -> execute();
        return $stml -> fetchAll();

    }



    //Para sacar las preguntas fecuentes (Con los likes)
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
        // Initialize variables with default values
        $titulo = $descripcion = $tema = $archivo = "";
        $fecha = date('Y-m-d');
        $id_usuario = $votosLike = $votosDislike = 0;

        if (isset($param["titulo"])) $titulo = $param["titulo"];
        if (isset($param["descripcion"])) $descripcion = $param["descripcion"];
        if (isset($param["tema"])) $tema = $param["tema"];
        if (isset($param["fecha"]) && !empty($param["fecha"])) {
            $fecha = $param["fecha"];  // Use the provided date if it's not empty
        }
        if (isset($param["id_usuario"]) && !empty($param["id_usuario"])) {
            $id_usuario = $param["id_usuario"];
        }
        if (isset($param["archivo"])) $archivo = $param["archivo"];
        if (isset($param["votosLike"])) $votosLike = $param["votosLike"];
        if (isset($param["votosDislike"])) $votosDislike = $param["votosDislike"];

        $sql = "INSERT INTO " . $this->tabla . " (titulo, descripcion, tema, fecha, id_usuario, archivo, votosLike, votosDislike) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stm = $this->connection->prepare($sql);
        $stm->execute([$titulo, $descripcion, $tema, $fecha, $id_usuario, $archivo, $votosLike, $votosDislike]);

        // Return the last inserted ID
        $id = $this->connection->lastInsertId();
        return $id;
    }



    public function getPreguntaById($id){

        $sql = "SELECT * FROM $this->tabla WHERE id=$id";
        $stml = $this -> connection -> prepare($sql);
        $stml -> execute([$id]);
        return $stml -> fetch();

    }


    public function deleteUsuario($id){

        $sql = "Detele from " . $this -> tabla . "WHERE id=$id";
        $stmt = $this -> connection -> prepare($sql);
        $stmt -> execute([$id]);
        return $stmt -> fetch();

    }


}
