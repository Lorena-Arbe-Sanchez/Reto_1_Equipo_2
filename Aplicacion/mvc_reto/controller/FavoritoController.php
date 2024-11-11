<?php

require_once "model/Favorito.php";

class FavoritoController {

    public $view;
    public $model;

    public function __construct() {
        $this->model = new Favorito();
    }

    public function anadir(){
        $this->view ='anadirFavorito';
    }

    public function save(){
        $this->view ='anadirFavorito';

        $param = $_POST;
        $id_respuesta = $_GET["id_respuesta"];
        $id_usuario = $_SESSION["id"];
        $id = $this->model->save($param);

        if ($id === false){
            $_GET["response"] = "duplicado";
        }
        else {
            $_GET["response"] = "exito";
        }
    }

    public function verFavoritas() {
        $this->view = "verFavoritas";
    
        // Obtener respuestas favoritas
        $respuestas = $this->model->getRespuestasFavoritas();
        return $respuestas ?: [];  // Retorna las respuestas favoritas o un array vacío si no hay
    }

    public function borrar() {
        // Asegúrate de que exista el parámetro `id` en la solicitud GET
        if (isset($_GET['id'])) {
            $id_favorito = $_GET['id'];
            // Llama al método deleteRespuesta en el modelo para eliminar el favorito
            $this->model->deleteFavorito($id_favorito);
        }
        // Redirige de vuelta a la lista de favoritos después de la eliminación
        header("Location: index.php?controller=favorito&action=verFavoritas");
        exit();
    }
    
    
}
    