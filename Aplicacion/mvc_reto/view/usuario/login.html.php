<!DOCTYPE html>
<html lang="es">
<head>
    <!-- TODO : Poner bien los "meta" de todas las páginas (lo mismo + propiedades funcionales). -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- TODO : Variable de "$title" en "<title>" para los títulos de las páginas que van cambiando.
                También se le pasará una variable llamada "botonBloqueado" para que controle la página actual el en menú del header. -->
    <title>Login</title>
    <link rel="stylesheet" href="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/css/style.css">
    <!-- Poner un favicon (icono en la pestaña de una página web). -->
    <link rel="icon" type="image/png" href="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/icono_avion.png">
</head>
<body class="pag_login">

<div class="container">

    <img src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa_conFondo.png" class="superpuesta" alt="Logo Aergibide SL">

    <form id="formLogin" action="index.php?controller=usuario&action=validar" method="post">
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

</div>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/login.js"></script>

</body>
</html>