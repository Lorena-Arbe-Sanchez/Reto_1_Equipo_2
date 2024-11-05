<?php

class Pregunta {

    private $tabla = "preguntas";
    private $connection;

    public function __construct() {
        $this->getConexion();
    }

    public function getConexion(){
        $dbObj = new Db();
        $this->connection = $dbObj ->connection;
    }

    // TODO : Borrar si no se utiliza.
    public function getPregunta(){
        $sql = "SELECT * FROM " . $this->tabla;

        $stml = $this -> connection -> prepare($sql);
        $stml -> execute();
        return $stml -> fetchAll();
    }

    // TODO : Borrar si no se utiliza.
    // Para obtener las preguntas frecuentes (filtradas por más likes).
    public function getPreguntaFrecuentes(){
        $sql = "SELECT * FROM " . $this->tabla . " ORDER BY votosLike DESC";
        $stml = $this -> connection -> prepare($sql);
        $stml -> execute();
        return $stml -> fetchAll();
    }

    public function create(){
        $this->page_title ='Crear Pregunta';
        $this->view ='create';
    }

    public function save($param) {
        $titulo = $descripcion = $tema = $archivo = "";
        $fecha = date('Y-m-d');
        $id_usuario = $_SESSION['id'];
        $votosLike = $votosDislike = 0;

        if (isset($param["titulo"])) $titulo = $param["titulo"];
        if (isset($param["descripcion"])) $descripcion = $param["descripcion"];
        if (isset($param["tema"])) $tema = $param["tema"];
        if (isset($param["fecha"]) && !empty($param["fecha"])){
            $fecha = $param["fecha"];  // Usar la fecha proporcionada si no está vacía.
        }
        if (isset($param["id_usuario"]) && !empty($param["id_usuario"])){
            $id_usuario = $_SESSION['usuario'];
        }
        if (isset($param["archivo"])) $archivo = $param["archivo"];
        if (isset($param["votosLike"])) $votosLike = $param["votosLike"];
        if (isset($param["votosDislike"])) $votosDislike = $param["votosDislike"];

        $sql = "INSERT INTO " . $this->tabla . " (titulo, descripcion, tema, fecha, id_usuario, archivo, votosLike, votosDislike) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stm = $this->connection->prepare($sql);
        $stm->execute([$titulo, $descripcion, $tema, $fecha, $id_usuario, $archivo, $votosLike, $votosDislike]);

        $id = $this->connection->lastInsertId();
        return $id;
    }

    public function getPreguntaById($id){
        $sql = "SELECT * FROM ". $this->tabla ." WHERE id = ?";
        $stml = $this->connection->prepare($sql);
        $stml -> execute([$id]);
        return $stml->fetch();
    }



    public function deletePregunta($id)
    {
        // Corrección de la consulta SQL
        $sql = "DELETE FROM " . $this->tabla . " WHERE id = ?";
        $stml = $this->connection->prepare($sql);
        // Ejecutar la consulta
        $stml->execute([$id]);
        // Retornar el número de filas afectadas (puedes cambiar esto según tus necesidades)
        return $stml->rowCount();
    }






    public function sacarPreguntasPorUsuario(){
        $id_usuario = $_SESSION["id"];
        $sql = "SELECT * FROM " . $this->tabla . " WHERE id_usuario = ?";
        $stm = $this->connection->prepare($sql);
        $stm->execute([$id_usuario]);
        return $stm->fetchAll();
    }

    // TODO : Borrar si no se utiliza.
    public function getPreguntas(){
        // De momento ordenar por fecha.
        $sql = "SELECT * FROM ". $this->tabla ." ORDER BY fecha DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getPreguntasPaginated($page=1){
        $limit = PAGINATION;
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM ". $this->tabla ." LIMIT :limit OFFSET :offset";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $totalPages = $this->getNumberPages(); //ceil($this->getNumberPages()/$limit);
        return [$stmt->fetchAll(), $page, $totalPages];
    }

    public function getPreguntasFrecuentesPaginated($page=1){
        $limit = PAGINATION;
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM ". $this->tabla ." ORDER BY votosLike DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $totalPages = $this->getNumberPages();
        return [$stmt->fetchAll(), $page, $totalPages];
    }

    public function getNumberPages(){
        $limit = PAGINATION;
        $total = $this->connection->query("SELECT COUNT(*) FROM ". $this->tabla)->fetchColumn();
        $total = ceil($total/$limit);

        return $total;
    }

}