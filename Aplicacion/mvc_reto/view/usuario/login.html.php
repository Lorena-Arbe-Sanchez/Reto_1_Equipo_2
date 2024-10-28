<<<<<<< HEAD
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- TODO : Poner bien los "meta" de todas las páginas (lo mismo + propiedades funcionales). -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Poner un favicon (icono en la pestaña de una página web). -->
    <link rel="icon" type="image/png" href="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/icono_avion.png">
</head>
<body class="pag_login">
=======
<?php
// Variable "pageTitle" para controlar el título que aparece para la página en el navegador.
$pageTitle = "Login";
// Variable "bodyClass" para controlar el nombre de la clase que tendrá el body en "header.php".
$bodyClass = "pag_login";
// Variable "conMenu" para especificar si la ventana deberá tener menú de navegación o no.
$conMenu = false;
// Llamar al header.
require_once __DIR__ . "/../layout/header.php";
?>
>>>>>>> e4c633ab2d8f78668352d866e4e031c3822d8a19

<div class="container">

    <img src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa_conFondo.png" class="superpuesta" alt="Logo Aergibide SL">

<<<<<<< HEAD
    <form id="formLogin" action="index.php?controller=pregunta&action=list" method="post">
        <div>
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario" required>
        </div>
        <div>
            <label for="contrasena">Contraseña</label>
            <input type="password" id="contrasena" name="contrasena" required>
        </div>

        <input type="submit" id="bIniciar" class="bIniciar"  value="Iniciar sesión">
    </form>

    <a href="recuperarContrasena.html">¿Se te ha olvidado tu contraseña?</a>
=======
    <form id="formLogin" action="index.php?controller=usuario&action=validarLogin" method="post">
        <div>
            <div class="fila_datos">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <!-- Etiqueta en la que se escribirá el error si ocurre. -->
            <div id="mensajeErrorUsuario" class="mensajeError"></div>
        </div>
        <div>
            <div class="fila_datos">
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>

            <!-- Lo relacionado con 'header("Location: index.php?controller=usuario&action=login&error=1");' del 'UsuarioController.php'. -->
            <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
                <div id="mensajeErrorContrasena" class="mensajeError">No existe un usuario con esos datos.</div>
            <?php else: ?>
                <div id="mensajeErrorContrasena" class="mensajeError"></div>
            <?php endif; ?>
        </div>

        <input type="submit" id="bIniciar" class="bIniciar" value="Iniciar sesión">
    </form>

    <a href="index.php?controller=usuario&action=recuperar">¿Se te ha olvidado tu contraseña?</a>
>>>>>>> e4c633ab2d8f78668352d866e4e031c3822d8a19

</div>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/login.js"></script>

</body>
</html>