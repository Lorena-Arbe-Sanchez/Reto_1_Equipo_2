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

<div class="container">

    <img src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa_conFondo.png" class="superpuesta" alt="Logo Aergibide SL">

    <!-- TODO : <form action="index.php?controller=pregunta&action=foro" method="post"> -->
    <form id="formLogin" action="index.php?controller=pregunta&action=foro" method="post">
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
            <div id="mensajeErrorContrasena" class="mensajeError"></div>
        </div>

        <input type="submit" id="bIniciar" class="bIniciar" value="Iniciar sesión">
    </form>

    <a href="index.php?controller=usuario&action=recuperarContrasena">¿Se te ha olvidado tu contraseña?</a>

</div>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/login.js"></script>

</body>
</html>