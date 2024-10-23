<?php

class Usuario {

    private $tabla = "usuarios";
    private $connection;


    public function __construct() {
        $this->getConexion();
    }

    public function getConexion(){
        $dbObj = new Db();
        $this->connection = $dbObj ->connection;
    }


    public function getBodegaByUsuarioContrasenya($usuario, $contrasenya){

        if(is_null($usuario, $contrasenya)) return false;

        $sql = "SELECT * FROM " . $this->tabla . " WHERE usuario = ?" . "AND contrasña = ?";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$usuario, $contrasenya]);

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }


    public function getAdminByUsuario($usuario){

        $sql = "SELECT ADMINIATRADOR FROM " . $this->tabla . " WHERE USUARIO = ?";

        $stmt = $this->connection->prepare($sql);
        $stmt -> execute([$usuario]);

        //Devuelve verdadero o falso
        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;

    }



    public function saveUsuario(){

        $dni = $nombre = $apellido1 = $apellido2 = $email = $telefono = $usuario = $contrasena = "";

        $administrador = false;

        if (isset($param["dni"])) $dni = $param["nombre"];
        if (isset($param["nombre"])) $nombre = $param["nombre"];
        if (isset($param["apellido1"])) $apellido1 = $param["nombre"];
        if (isset($param["apellido2"])) $apellido2 = $param["nombre"];
        if (isset($param["email"])) $email = $param["nombre"];
        if (isset($param["telefono"])) $telefono = $param["nombre"];
        if (isset($param["usuario"])) $usuario = $param["nombre"];
        if (isset($param["contrasena"])) $contrasena = $param["nombre"];

        if(isset($param["administrador"])){

            $administrador = ($param["administrador"] == "si") ? true : false;

        }

        $sql = "INSERT INTO " . $this->tabla . "(administrador,dni,nombre,apellido1,apellido2,email,telefono,usuario,contrasena) VALUES (?,?,?,?,?,?,?,?,?)";

        $stmt = $this ->connection -> prepare($sql);
        $stmt -> execute([$administrador,$dni,$nombre,$apellido1,$apellido2,$email,$telefono,$usuario,$contrasena]);

        $id = $this ->connection -> lastInsertId();
        return $id;
    }

    public function getUsuarioById($id){

        if(is_null($id)) return false;

        $sql = "SELECT * FROM " . $this->tabla . " WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt -> execute([$id]);
        return $stmt->fetch();

    }


    public function deleteUsuarioById($id){

        $sql = "DELETE FROM " . $this->tabla . " WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt -> execute([$id]);
        return $stmt->fetch();

    }


    public function updateUsuario($id){

        $id = $dni = $nombre = $apellido1 = $apellido2 = $email = $telefono = $usuario = $contrasena = "";
        $administrador = false;



    }
}
