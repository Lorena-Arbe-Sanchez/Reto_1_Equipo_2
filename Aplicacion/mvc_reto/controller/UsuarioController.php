<?php

require_once "model/Usuario.php";

class UsuarioController {

    public $view;
    public $model;

    public function __construct() {
        $this->view = "login";
        $this->model = new Usuario();
    }

    public function login(){
        $this->view= "login";
    }

    // Función para comprobar la existencia del usuario en el login.
    public function validarLogin(){

        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        // Pasarle los valores de las casillas necesarias como parámetros.
        $usuarioDB = $this->model->getUsuarioByUsuarioContrasena($usuario, $contrasena);

        //var_dump($result);

        if ($usuarioDB){

            // Usuario y contraseña correctos. Inicio sesión exitoso y redirigir al foro.

            $_SESSION["id"] = $usuarioDB["id"];
            $_SESSION["administrador"] = $usuarioDB["administrador"];

            // Guardar '$usuarioDB' en una variable de sesión.
            $_SESSION['usuarioDB'] = $usuarioDB;

            header("Location: index.php?controller=pregunta&action=list_paginated");
            exit(); // Asegurar que no se ejecute más código después de la redirección.
        }
        else{
            // Usuario no encontrado. Redirigir al login con un mensaje de error.
            header("Location: index.php?controller=usuario&action=login&error=1");
            exit();
        }
    }


    // Función para crear la vista.
    public function cuentas(){
        $this->view="gestionarCuenta";
        return $this->model->getUsuarios();
    }

    // Función para el botón "Buscar" (filtrar) de la ventana de 'gestionarCuenta'.
    public function buscarFiltro(){
        $this->view="gestionarCuenta";
    }

    // Función para obtener el listado de cuentas existentes y para ponerlo en la ventana de la gestión de cuentas.
    public function list(){
        return $this->model->getUsuarios();
    }

    // Función para pasarle a la vista los datos del usuario logeado y mostrar la ventana.
    public function perfil(){
        // Si la sesión contiene los datos de $usuarioDB, hay que pasarlos a la vista.
        if (isset($_SESSION['usuarioDB'])){
            $usuarioSesion = $_SESSION['usuarioDB'];
            require_once __DIR__ . '/../view/usuario/perfil.html.php';
            exit();
        }
        else{
            error_log("Ha ocurrido un problema con los datos del usuario logeado.");
            exit();
        }
    }

    public function subirImgPerfil(){

        // Primero, verificar si se ha subido el archivo.

        // TODO : Poner bien.

        $filePath = null;

        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            // Si el archivo es válido, procesarlo
            $fileTmpPath = $_FILES['file']['tmp_name']; // Ruta a carpeta temporal donde se guarda.
            $fileName = $_FILES['file']['name'];
            $fileName = uniqid() ."_". $fileName;
            $uploadFileDir = './uploads/'; // De la raiz se crea una carpeta "uploads".
            $destPath = $uploadFileDir . $fileName;

            // Verificar que el directorio de subida exista, sino crear uno
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0777, true);
            }

            // Mover el archivo desde su ubicación temporal al directorio final
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                // Si el archivo se movió correctamente, guardar la ruta del archivo
                $filePath = $destPath;
            }
            else {
                // Si hubo un error al mover el archivo
                $_GET["response"] = false;
                return;
            }
        }


        // Ahora pasamos todos los datos (incluido el archivo, si existe) al modelo
        $param = $_POST;
        $param['file_path'] = $filePath; // Agregamos la ruta del archivo al array de parámetros

        // Llamamos al modelo para guardar los datos
        $id = $this -> model -> save($param);
        $result = $this -> model -> getNoteById($id);

        // Respuesta exitosa
        $_GET["response"] = true;
        return $result;

    }

    public function recuperar(){
        $this->view="recuperarContrasena";
    }

    // Función para la ventana de 'recuperarContrasena'.
    public function validarRecuperar(){

        $usuario = $_POST['usuario'];
        $contrasenaNueva = $_POST['contrasena1'];

        // Pasarle los valores de las casillas necesarias como parámetros.
        $result = $this->model->getUsuarioByUsuario($_POST['usuario']);

        if ($result){

            // Usuario y contraseña correctos. Cambio de contraseña exitoso y redirigir al foro.
            $cambioExitoso = $this->model->actualizarContrasena($usuario, $contrasenaNueva);

            if ($cambioExitoso){
                header("Location: index.php?controller=usuario&action=login");
                exit(); // Asegurar que no se ejecute más código después de la redirección.
            }
            else{
                echo("Error a la hora de recuperar contraseña");
            }
        }
        else{
            // Usuario no encontrado. Enviar un mensaje de error.
            echo("Usuario no encontrado");
            header("Location: index.php?controller=usuario&action=recuperar&error=1");
            exit();
        }
    }


    // Función para crear un usuario nuevo.
    public function save(){

        $this->view="gestionarCuenta";

        $param = $_POST;

        $id = $this->model->insertUsuario($param);
        // $result = $this->model->getUsuarioByUsuarioContrasena($usuario, $contrasena);

        //$_GET["response"] = true;
        // return $result;
        return true;


    }


    //Funcion para buscar si existe el usuario atraves del dni
    public function buscar(){

        $this->view="editarCuenta";

        $dni = "";
        if(isset($_GET["dniBuscar"])) $dni = $_GET["dniBuscar"];
        error_log("buscar:" . $dni);

        return $this->model->getUsuarioByDNI($dni);
    }


    public function editar(){
        $this->view="gestionarCuenta";
        $dni = $this->model->modificarUsuario($_POST);
        $result = $this->model->getUsuarioByDNI($dni);
        $_GET["response"] = true;
        return $result ;
    }

    //Funcion para eliminar usuario  CREAR VENTANITA PARA CONFIRMACION
    public function eliminar(){

        $this->view="gestionarCuenta";
        return $this->model->borrarUsuario($_GET["dniEliminar"]);

    }


}

?>