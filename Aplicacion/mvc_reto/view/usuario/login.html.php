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

<div class="contenedor">

    <img src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa_conFondo.png" class="superpuesta" alt="Logo Aergibide SL">

    <form id="formLogin" action="index.php?controller=usuario&action=validarLogin" method="post">
        <div class="form-group">
            <div class="fila_datos">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" required autocomplete="username" aria-required="true">
            </div>
            <!-- Etiqueta en la que se escribirá el error si ocurre. -->
            <div id="mensajeErrorUsuario" class="mensajeError"></div>
        </div>
        <div class="form-group">
            <div class="fila_datos">
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required autocomplete="current-password" aria-required="true"> <!-- TODO : 'autocomplete' se puede poner en las demás. -->
                <div class="input-group-append">
                      <div class="input-group-append">

                        <a class="btn btn-outline-secondary" type="button" id="toggle-password">
                            <img class="logo_empresa"
                                 src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdp
                                 ZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMTYgMTYiPjxwYXRoIGZpbGw9ImN1cnJlbnRDb2xvciIgZD0ib
                                 TE0LjI5My4yOTNsMS40MTQgMS40MTRsLTIuNjU3IDIuNjU3cS4yMzYuMjM2LjQ0My40NjdhMTQgMTQgMCAwIDEgMS44NjMgMi4
                                 2NDdsLjAyNy4wNTFsLjAwNy4wMTZsLjAwMy4wMDVsLjAwMS4wMDJsLjIyNC40NDhsLS4yMjQuNDQ5bC0uMDAxLjAwMWwtLjAwMy
                                 4wMDVsLS4wMDcuMDE2YTYgNiAwIDAgMS0uMTI1LjIzYTE0IDE0IDAgMCAxLTEuNzY1IDIuNDY3QzEyLjMwMyAxMi40OTIgMTAuN
                                 DI3IDE0IDggMTRjLTEuMzQgMC0yLjUxMS0uNDYtMy40OTItMS4wOTRsLTIuOCAyLjgwMWwtMS40MTUtMS40MTR6bS00LjM2IDcu
                                 MTlsLTIuNDUxIDIuNDVhMi4wMDMgMi4wMDMgMCAwIDAgMi40NS0yLjQ1Wm0tLjEzMS01LjJBNS45IDUuOSAwIDAgMCA4IDJDNS41N
                                 zMgMiAzLjY5OCAzLjUwOCAyLjUwNyA0LjgzMUExNCAxNCAwIDAgMCAuNjQ0IDcuNDc4bC0uMDI2LjA1MWwtLjAwOC4wMTZsLS4wM
                                 DMuMDA1di4wMDFjLS4yMzIuNDYzLS4wOTEuMTgyLS4wNjkuMTM3TC4zODIgOGwuMjI0LjQ0N2wuMDAxLjAwM2wuMDAzLjAwNWwuMD
                                 A4LjAxNmE2IDYgMCAwIDAgLjEyNC4yM2ExNCAxNCAwIDAgMCAxLjA0NyAxLjU5NnoiLz48L3N2Zz4="
                                 alt="logo ver" width="260" height="116">
                        </a>

                      </div>
            </div>

            <!-- Lo relacionado con 'header("Location: index.php?controller=usuario&action=login&error=1");' del 'UsuarioController.php'. -->
            <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
                <div id="mensajeErrorContrasena" class="mensajeError">No existe un usuario con esos datos.</div>
            <?php else: ?>
                <div id="mensajeErrorContrasena" class="mensajeError"></div>
            <?php endif; ?>
        </div>

        <input type="submit" id="bIniciar" class="bPrincipal" value="Iniciar sesión">
        <a href="index.php?controller=usuario&action=recuperar" class="bSecundario">¿Se te ha olvidado tu contraseña?</a>
    </form>

</div>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/login.js"></script>
<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/modoClaroOscuro.js"></script>
<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/controlLikes.js"></script>

</body>
</html>