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

        $sql = "SELECT * FROM $this->tabla";

        $stml = $this -> connection -> prepare($sql);
        $stml -> execute();
        return $stml -> fetchAll();

    }

    public function save($param){


        $titulo = $descripcion = $tema = $fecha = $id_usuario = $archivo = $votosLike = $votosDislike = "";


        if (isset($param["titulo"])) $titulo = $param["titulo"];
        if (isset($param["descripcion"])) $descripcion = $param["descripcion"];
        if (isset($param["tema"])) $tema = $param["tema"];
        if (isset($param["fecha"])) $fecha = $param["fecha"];
        if (isset($param["id_usuario"])) $id_usuario = $param["id_usuario"];
        if (isset($param["archivo"])) $archivo = $param["archivo"];
        if (isset($param["votosLike"])) $votosLike = $param["votosLike"];
        if (isset($param["votosDislike"])) $votosDislike = $param["votosDislike"];

        $sql = "Insert into " . $this->tabla . "(titulo,descripcion,tema,fecha,id_usuario,archivo,votos_like,votos_dislike) 
                values(?,?,?,?,?,?,?,?)";

        $stm = $this -> connection -> prepare($sql);

        $stm -> execute([$titulo,$descripcion,$tema,$fecha,$id_usuario,$archivo,$votosLike,$votosDislike]);

        $id = $this -> connection -> lastInsertId();
        return $id;

    }


}
