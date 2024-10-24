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


    public function getValidateByUsuarioContrasenya($usuario, $contrasenya){

        if(is_null($usuario, $contrasenya)) return false;

        $sql = "SELECT * FROM " . $this->tabla . " WHERE usuario = ?" . "AND contrasena = ?";

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

        $id = $admin = $dni = $nombre = $apellido1 = $apellido2 = $email = $telefono = $usuario = $contrasena = "";
        $administrador = false;


        if(isset($param["id"]) && $param["id"] != ''){

            $usuarioActual = $this->getUsuarioById($id); ;

            if(isset($usuarioActual["id"])){

                $exists = true;
                $id = $usuarioActual["id"];
                $admin = $usuarioActual["administrador"];
                $dni = $usuarioActual["dni"];
                $nombre = $usuarioActual["nombre"];
                $apellido1 = $usuarioActual["apellido1"];
                $apellido2 = $usuarioActual["apellido2"];
                $email = $usuarioActual["email"];
                $telefono = $usuarioActual["telefono"];
                $usuario = $usuarioActual["usuario"];
                $contrasena = $usuarioActual["contrasena"];
            }
        }

        //Sobreescribir los datos

        if(isset($param["nombre"])) $nombre = $param["nombre"];
        if (isset($param["dni"])) $dni = $param["dni"];
        if(isset($param["apellido1"])) $apellido1 = $param["apellido1"];
        if(isset($param["apellido2"])) $apellido2 = $param["apellido2"];
        if(isset($param["email"])) $email = $param["email"];
        if(isset($param["telefono"])) $telefono = $param["telefono"];
        if(isset($param["usuario"])) $usuario = $param["usuario"];
        if(isset($param["contrasena"])) $contrasena = $param["contrasena"];

        if(isset($param["administrador"])){

            $administrador = ($param["administrador"] == "si") ? true : false;

        }

        if ($exists == true){

            $sql = "UPDATE " . $this->tabla . " SET  adminstrador = ? ,nombre = ? , dni = ?, apellido1 = ?, apellido2 = ?,email = ?, telefono = ?, usuario = ?, contrasena = ? WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $resultado = $stmt->execute([$administrador,$nombre,$dni,$apellido1,$apellido2,$email,$telefono,$usuario,$contrasena,$id]);

        }

        return $id;



    }
}
