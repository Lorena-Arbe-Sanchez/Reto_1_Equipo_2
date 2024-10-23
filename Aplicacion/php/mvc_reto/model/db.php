<?php
require_once "config/config.php";

class DB{

    private $host;
    private $db;
    private $user;
    private $password;
    private $conection;


    public function __construct(){

        $this->host = constant("DB_HOST");
        $this->db = constant("DB");
        $this->user = constant("DB_USER");
        $this->password = constant("DB_PASSWORD");

        try {
            $this->conection = new PDO("mysql:host=" .$this->host.';
            dbname='.$this->db, $this->user, $this->pass);

        }catch (PDOException $e){
            echo $e->getMessage();
            exit();
        }

    }




}