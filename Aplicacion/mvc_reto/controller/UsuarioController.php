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

    // TODO : Verificar que es así como se hace, y optimizar.
    public function subirImgPerfil() {

        // Verificar si el archivo ha sido enviado.

        if (isset($_FILES['inputFile']) && $_FILES['inputFile']['error'] === UPLOAD_ERR_OK){

            // Si el archivo es válido, hay que procesarlo.

            $fileTmpPath = $_FILES['inputFile']['tmp_name']; // Ruta a la carpeta temporal donde se guarda.
            $fileName = $_FILES['inputFile']['name'];
            $fileName = uniqid() ."_". $fileName;
            $uploadFileDir = './uploads/'; // De la raiz crear una carpeta "uploads".
            $destPath = $uploadFileDir . $fileName; // Ruta completa donde se guardará el archivo.

            // Verificar que el directorio de subida existe (si no hay que crear uno).
            if (!is_dir($uploadFileDir)){
                mkdir($uploadFileDir, 0777, true);
            }

            // Mover el archivo desde su ubicación temporal al directorio final.
            if (move_uploaded_file($fileTmpPath, $destPath)){

                // Si el archivo se ha movido correctamente, hay que guardar la ruta del archivo.
                $filePath = $destPath;

                // Actualizar la base de datos con la nueva ruta.
                $this->model->actualizarImgUsuario($filePath);

                // Actualizar la variable de sesión para mostrar la imagen nueva.
                $_SESSION['usuarioDB']['imagen'] = $filePath;

                // Redirigir al perfil del usuario para ver la imagen actualizada.
                header("Location: index.php?controller=usuario&action=perfil");
                exit();

            }
            else{
                echo "Error al mover el archivo.";
            }
        }
        else{
            echo "No se recibió ningún archivo o hubo un error al subir.";
        }

    }

    public function recuperar(){
        $this->view="recuperarContrasena";
    }

    /*
     * Función para la ventana de 'recuperarContrasena'.
     * El usuario recibe un código de verificación por correo electrónico y luego
     * debe ingresarlo en la página para confirmar el cambio de contraseña.
     */
    public function validarRecuperar(){

        // Obtener nombre del usuario pasado por POST en el formulario.
        $usuario = $_POST['usuario'];

        // Generar un código de 4 dígitos aleatorio (para verificación).
        $codigoVerificacion = rand(1000, 9999);

        error_log($codigoVerificacion); // TODO : Luego quitarlo.

        // Guardar el código en la sesión.
        $_SESSION['codigo_verificacion'] = $codigoVerificacion;

        // Obtener el correo electrónico del usuario de la base de datos.
        $emailUsuario = $this->obtenerCorreoUsuario($usuario);

        // Enviar el correo.
        $subject = "Código de verificación para cambio de contraseña";
        $message = "Tu código de verificación para poder cambiar la contraseña es: $codigoVerificacion";
        $headers = "From: no-reply@aergibide.com\r\n";

        if (mail($emailUsuario, $subject, $message, $headers)){
            // Redirigir a la página para ingresar el código.
            header("Location: index.php?controller=usuario&action=recuperar");
        }
        else{
            error_log("Hubo un problema al enviar el correo.");
        }


        /*
        $contrasenaNueva = $_POST['contrasena1'];

        // Pasarle los valores de las casillas necesarias como parámetros.
        $result = $this->model->getUsuarioByUsuario($usuario);

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
            header("Location: index.php?controller=usuario&action=recuperar&error=1");
            exit();
        }
        */
    }

    // TODO : Implementar
    public function obtenerCorreoUsuario($usuario){
        return $this->model->obtenerCorreoUsuario($usuario);
    }

    // Función para crear un usuario nuevo.
    public function save(){
        $this->view = "gestionarCuenta";
        $param = $_POST;
        $dni = $_POST['dni'];
        $usuario = $_POST['usuario'];

        $dniExistente = $this->model->getUsuarioByDNI($dni);
        $usuarioExistente = $this->model->getUsuarioByUsuario($usuario);

        if ($dniExistente || $usuarioExistente){
            error_log("El dni o usuario  ya existe en la base de datos");
            // Pasa el error a la vista en lugar de redireccionar.
            header("Location: index.php?controller=usuario&action=cuentas&error=2");
            exit();
        }
        else{
            $this->model->insertUsuario($param);
        }

        return $this->model->getUsuarios();
    }

    // Función para buscar si existe el usuario a través del dni
    public function buscar(){
        $this->view="editarCuenta";

        $dni = "";
        if(isset($_GET["dniBuscar"])) $dni = $_GET["dniBuscar"];
        error_log("buscar:" . $dni);

        return $this->model->getUsuarioByDNI($dni);
    }

    public function editar(){
        $this->view = "gestionarCuenta";
        $param = $_POST;

        $usuario = $_POST['usuario'];
        $idUsuario = $_POST['id'];

        $admin = $_POST['administrador'];
        error_log("Controller Admin -> " . $admin);
        // Buscar si existe otro usuario con el mismo nombre
        $usuarioExistente = $this->model->getUsuarioByUsuario($usuario);

        // Verificar que no existe otro usuario con el mismo nombre
        if ($usuarioExistente && $usuarioExistente['usuario'] != $usuario){
            error_log("COMPARACION -> " . $usuario . $usuarioExistente['usuario']);
            header("Location: index.php?controller=usuario&action=cuentas&error=2");
            exit();
        }
        else{
            // Actualizar el usuario si no existe conflicto de nombre
            $dni = $this->model->modificarUsuario($param);

            // Opcional: redirigir con mensaje de éxito en lugar de usar $_GET directamente
            header("Location: index.php?controller=usuario&action=cuentas&response=success");
            exit();
        }
    }

    //Funcion para eliminar usuario  CREAR VENTANITA PARA CONFIRMACION
    public function eliminar(){
        $this->view="gestionarCuenta";

        $dniEliminar = $_GET["dniEliminar"];


        $this -> model -> getUsuarioByDNI($dniEliminar);

        $dniActual = $_SESSION['usuarioDB']["dni"];

        if ($dniActual != $dniEliminar){
            $this->model->borrarUsuario($dniEliminar);
        }
        else{
            header("Location: index.php?controller=usuario&action=cuentas&error=3");
            exit();
        }

        return $this->model->getUsuarios();
    }

}

?>