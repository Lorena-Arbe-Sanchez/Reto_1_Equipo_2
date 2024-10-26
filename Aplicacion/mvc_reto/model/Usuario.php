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

        //if(is_null($usuario)|| is_null($contrasena)) return false;

        // TODO
        error_log("llegar a getUsuarioByUsuarioContrasena");

        //$sql = "SELECT * FROM " .$this->tabla. " WHERE usuario = ?";
        $sql = "SELECT * FROM " .$this->tabla. " WHERE usuario = ? AND contrasena = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt -> execute([$usuario, $contrasena]); // Pasarle el array con los datos.

        $usuarioDB = $stmt->fetch();

        // TODO
        error_log("Usuario: $usuario, Contrasena: $contrasena");
        error_log("Usuario encontrado: " . var_export($usuarioDB, true));

        /*
         * Las contraseñas están encriptadas [password_hash() en PHP para su
         * almacenamiento y password_verify() para su verificación].
         */

        // Si se encuentra el usuario, hay que verificar la contraseña.
        //if (!empty($usuarioDB) && password_verify($contrasena, $usuarioDB['contrasena'])){
        if ($usuarioDB){
            // TODO
            error_log("true existe");
            return true;
        }
        // TODO
        error_log("false existe");
        return false; // Si no se encontró el usuario.
     }

}