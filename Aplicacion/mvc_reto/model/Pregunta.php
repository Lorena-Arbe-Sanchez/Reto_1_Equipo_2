<?php

class Pregunta {

    private $tabla = "preguntas";
    private $conection;


    public function __construct() {
        $this->getConexion();
    }

    public function getConexion(){
        $dbObj = new Db();
        $this->conection = $dbObj ->conection;
    }


    public function getBodegaByUsuarioContrasenya($usuario, $contrasenya){

        if(is_null($usuario, $contrasenya)) return false;

        $sql = "SELECT * FROM " . $this->tabla . " WHERE usuario = ?" . "AND contrasña = ?";

        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$usuario, $contrasenya]);

     }




}

?>