<?php
require_once "config/config.php";

class DB{

    private $host;
    private $db;
    private $user;
    private $password;
    public $connection;


    public function __construct(){

        $this->host = constant("DB_HOST");
        $this->db = constant("DB");
        $this->user = constant("DB_USER");
        $this->password = constant("DB_PASSWORD");

class Db {
    private $host;
    private $db;
    private $user;
    private $pass;
    public $conection;

    public function __construct(){
        $this -> host = constant("DB_HOST");
        $this -> db = constant("DB");
        $this -> user = constant("DB_USER");
        $this -> pass = constant("DB_PASS");
        try {
            $this->conection = new PDO("mysql:host=" .$this->host.';
            dbname='.$this->db, $this->user, $this->pass);

        }catch (PDOException $e){
            echo $e->getMessage();
            exit();
        }

    }




}
=======
    }
}

?>
>>>>>>> 77397cf19899da89f5c66207380cb48a748371fa:Aplicacion/mvc_reto/model/db.php
