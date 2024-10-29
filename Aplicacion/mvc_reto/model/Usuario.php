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

    public function getUsuarioByUsuarioContrasena($usuario, $contrasena){

        //$sql = "SELECT * FROM " .$this->tabla. " WHERE usuario = ?";
        $sql = "SELECT * FROM " .$this->tabla. " WHERE usuario = ? AND contrasena = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt -> execute([$usuario, $contrasena]); // Pasarle el array con los datos.

        $usuarioDB = $stmt->fetch(PDO::FETCH_ASSOC);

        /* TODO
         * Las contraseñas están encriptadas [password_hash() en PHP para su
         * almacenamiento y password_verify() para su verificación].
         */

        // Si se encuentra el usuario, hay que verificar la contraseña.
        //TODO : if (!empty($usuarioDB) && password_verify($contrasena, $usuarioDB['contrasena'])){
        if ($usuarioDB){
            return $usuarioDB;
        }
        return false; // Si no se encontró el usuario.
    }

    public function getUsuarioByUsuario($usuario){
        $sql = "SELECT * FROM ". $this->tabla ." WHERE usuario = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt -> execute([$usuario]);

        $usuarioDB = $stmt->fetch();

        if ($usuarioDB){
            return $usuarioDB;
        }
        return false;
    }

    public function actualizarContrasena($usuario, $contrasenaNueva){
        $sql = "UPDATE ". $this->tabla ." SET contrasena = ? WHERE usuario = ?";
        $stmt = $this->connection->prepare($sql);
        $res = $stmt -> execute([$contrasenaNueva, $usuario]);

        return $res;
    }


    public function insertUsuario($param){

        $dni = $nombre = $apellido1 = $apellido2 = $email = $telefono = $usuario = $contrasena = "";
        $administrador = 0;

        if(isset($param["dni"])) $dni = $param["dni"];
        if(isset($param["nombre"])) $nombre = $param["nombre"];
        if(isset($param["apellido1"])) $apellido1 = $param["apellido1"];
        if(isset($param["apellido2"])) $apellido2 = $param["apellido2"];
        if(isset($param["email"])) $email = $param["email"];
        if(isset($param["telefono"])) $telefono = $param["telefono"];
        if(isset($param["usuario"])) $usuario = $param["usuario"];
        if(isset($param["contrasena"])) $contrasena = $param["contrasena"];

        if (isset($param["administrador"])) {
            $administrador = ($param["administrador"] === 'si') ? 1 : 0;
        }

        /*
         * // Verificar si el DNI ya existe
        $checkSql = "SELECT COUNT(*) FROM " . $this->tabla . " WHERE dni = ?";
        $checkStmt = $this->connection->prepare($checkSql);
        $checkStmt->execute([$dni]);
        $exists = $checkStmt->fetchColumn();

        if ($exists > 0) {
            // Manejar el error: el DNI ya existe en la base de datos
            throw new Exception("El DNI ya está registrado. Intente con uno diferente.");
        }

         *
         * */
        // Si no hay duplicados, proceder con la inserción
        $sql = "INSERT INTO " . $this->tabla . " (administrador, dni, nombre, apellido1, apellido2, email, telefono, usuario, contrasena) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$administrador, $dni, $nombre, $apellido1, $apellido2, $email, $telefono, $usuario, $contrasena]);

        $id = $this->connection->lastInsertId();
        return $id;
    }




}