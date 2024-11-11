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
}