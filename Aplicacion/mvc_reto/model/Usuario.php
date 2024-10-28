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

        $usuarioDB = $stmt->fetch();

        /* TODO
         * Las contraseñas están encriptadas [password_hash() en PHP para su
         * almacenamiento y password_verify() para su verificación].
         */

        // Si se encuentra el usuario, hay que verificar la contraseña.
        //TODO : if (!empty($usuarioDB) && password_verify($contrasena, $usuarioDB['contrasena'])){
        if ($usuarioDB){
            return true;
        }
        return false; // Si no se encontró el usuario.
    }

    public function getUsuarioByUsuario($usuario){
        $sql = "SELECT * FROM ". $this->tabla ." WHERE usuario = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt -> execute([$usuario]);

        $usuarioDB = $stmt->fetch();

        if ($usuarioDB){
            return true;
        }
        return false;
    }

    public function actualizarContrasena($usuario, $contrasenaNueva){
        $sql = "UPDATE ". $this->tabla ." SET contrasena = ? WHERE usuario = ?";
        $stmt = $this->connection->prepare($sql);
        $res = $stmt -> execute([$contrasenaNueva, $usuario]);

        return $res;
    }

}