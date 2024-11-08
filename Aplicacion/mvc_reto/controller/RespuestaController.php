<?php

require_once "model/Respuesta.php";

class RespuestaController {

    public $view;
    public $model;

    public function __construct() {
        $this->view = "crearRespuesta";
        $this->model = new Respuesta();
    }

    public function view($preguntaId){
        return $this->model->getRespuestaByPreguntaId($preguntaId);
    }

    // TODO
    public function crear(){
        $this->view = "crearRespuesta";
    }

    public function save(){
        $this->view = 'crearRespuesta';
        $param = $_POST;
    
        // Comprobar si se ha subido un archivo
        if (isset($_FILES['inputFile']) && $_FILES['inputFile']['error'] == 0) {
            $archivoTmp = $_FILES['inputFile']['tmp_name'];
            $archivoNombreOriginal = $_FILES['inputFile']['name'];
            $archivoTipo = $_FILES['inputFile']['type'];  // Para validar el tipo de archivo
            $archivoTamano = $_FILES['inputFile']['size']; // Para validar el tamaño del archivo
            $directorioDestino = './uploads/'; // Ruta donde guardar el archivo
    
            // Validar el tipo de archivo (solo imágenes, por ejemplo)
            $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($archivoTipo, $tiposPermitidos)) {
                $_GET["response"] = false;
                return "El archivo debe ser una imagen (JPEG, PNG, GIF).";
            }
    
            // Validar tamaño máximo del archivo (por ejemplo, 5 MB)
            if ($archivoTamano > 5 * 1024 * 1024) {  // 5 MB
                $_GET["response"] = false;
                return "El archivo es demasiado grande. El tamaño máximo es 5 MB.";
            }
    
            // Generar un nombre único para el archivo
            $archivoNombre = uniqid('img_', true) . '.' . pathinfo($archivoNombreOriginal, PATHINFO_EXTENSION);
    
            // Asegurarse de que el directorio de destino exista
            if (!is_dir($directorioDestino)) {
                mkdir($directorioDestino, 0777, true); // Crear directorio si no existe
            }
    
            // Ruta final para guardar el archivo
            $archivoDestino = $directorioDestino . $archivoNombre;
    
            // Mover el archivo al directorio de destino
            if (move_uploaded_file($archivoTmp, $archivoDestino)) {
                // Si el archivo se subió correctamente, agregar la ruta del archivo a los parámetros
                $param['archivo'] = $archivoNombre;  // Guardamos el nombre del archivo (o la ruta completa si prefieres)
            } else {
                $_GET["response"] = false;
                return "Error al subir el archivo.";
            }
        } else {
            $param['archivo'] = ''; // Si no se subió ningún archivo
        }
    
        // Guardar la respuesta en la base de datos
        $id = $this->model->save($param);
    
        // Obtener la respuesta por ID
        $result = $this->model->getRespuestaById($id);
    
        $_GET["response"] = true;
    
        return $result;
    }
    

    public function misPreguntas(){
        $this->view = "misPreguntas";
        return $this->model->sacarRespuestasPorUsuario();
    }

    //Eliminar respuesta
    public function borrar(){
        $this->view ='misPreguntas';
        header("Location: index.php?controller=pregunta&action=misPreguntas");
        return $this -> model -> deleteRespuesta($_GET["id"]);
    }
    
    public function editar(){
        $this->view ='modificarRespuesta';
        $param = $_POST;
    
        $id = $this->model->modificarRespuesta($param);
        $this->model->sacarRespuestasPorUsuario();

        $_GET["response"] = true;
    }
    
    //Funcion cuando des al boton like
    public function modificarLikes(){
        $this -> model -> modificarLikes($_GET["id_pregunta"]);
    }

    public function modificarDislikes(){
        $this -> model -> modificarDislikes($_GET["id_pregunta"]);
    }

}

?>