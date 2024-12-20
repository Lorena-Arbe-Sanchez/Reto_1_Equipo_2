<?php

class Favorito {

    private $tabla = "favoritos";
    private $connection;

    public function __construct() {
        $this->getConexion();
    }

    public function getConexion(){
        $dbObj = new Db();
        $this->connection = $dbObj ->connection;
    }

    public function getRespuestasFavoritas() {
        // Suponiendo que quieres obtener las respuestas favoritas para el usuario logueado
        $id_usuario = $_SESSION["id"];  // Obtener el ID del usuario logueado
        $sql = "SELECT f.id, r.solucion, r.archivo, p.titulo AS pregunta_titulo
                FROM " . $this->tabla . " f
                JOIN respuestas r ON f.id_respuesta = r.id
                JOIN preguntas p ON r.id_pregunta = p.id
                WHERE f.id_usuario = ?";

        $stm = $this->connection->prepare($sql);
        $stm->execute([$id_usuario]);
        return $stm->fetchAll();  // Devuelve todas las respuestas favoritas del usuario
    }

    public function anadir(){
        $this->page_title ='Añadir a favoritos';
        $this->view ='anadir';
    }

    public function save($param) {
        $id_usuario = $_SESSION['id'];
        $id_respuesta = $_GET["id_respuesta"];

        if ($this->existeFavorito($id_usuario,$id_respuesta)){
            return false;
        }

        else {
            $sql = "INSERT INTO " . $this->tabla . " (id_usuario, id_respuesta) VALUES (?, ?)";

            $stm = $this->connection->prepare($sql);
            $stm->execute([$id_usuario, $id_respuesta]);

            $id = $this->connection->lastInsertId();
            return $id;
        }
    }


    public function getFavoritoById($id){
        $sql = "SELECT * FROM ". $this->tabla ." WHERE id = ?";
        $stml = $this->connection->prepare($sql);
        $stml -> execute([$id]);
        return $stml->fetch();
    }

    public function existeFavorito($id_usuario, $id_respuesta){
        $sql = "SELECT COUNT(*) FROM " . $this->tabla . " WHERE id_usuario = ? AND id_respuesta = ?";
        $stm = $this->connection->prepare($sql);
        $stm->execute([$id_usuario, $id_respuesta]);
        return $stm->fetchColumn() > 0;
    }

    public function deleteFavorito($id){
        $sql = "DELETE FROM " . $this->tabla . " WHERE id = ?";
        $stml = $this->connection->prepare($sql);
        return $stml ->execute([$id]);
    }
}