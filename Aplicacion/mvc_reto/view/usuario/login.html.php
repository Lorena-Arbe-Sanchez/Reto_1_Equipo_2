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

    <!-- TODO : <form action="index.php?controller=user&action=login" method="post"> -->
    <form id="formLogin" action="index.php?controller=usuario&action=login" method="post">
        <div>
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario" required>
        </div>
        <div>
            <label for="contrasena">Contraseña</label>
            <input type="password" id="contrasena" name="contrasena" required>
        </div>

        <input type="submit" id="bIniciar" class="bIniciar" value="Iniciar sesión">
    </form>

    <a href="recuperarContrasena.html">¿Se te ha olvidado tu contraseña?</a>

</div>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/login.js"></script>

</body>
</html>