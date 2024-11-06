<?php
$pageTitle = "Recuperar contraseña";
$bodyClass = "pag_recuperar";
$conMenu = false;
require_once __DIR__ . "/../layout/header.php";
?>

<div class="container">

    <h1>Recuperar contraseña</h1>

    <form id="formRecuperarContra" action="index.php?controller=usuario&action=validarRecuperar" method="post">
        <div>
            <div class="fila_datos">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div id="mensajeErrorUsuario" class="mensajeError">
                <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
                    <div class="mensajeError">El usuario no existe. Por favor, revisa el nombre de usuario.</div>
                <?php endif; ?>
            </div>
        </div>
        <div>
            <div class="fila_datos">
                <label for="contrasena1">Contraseña nueva</label>
                <input type="password" id="contrasena1" name="contrasena1" required>
            </div>
        </div>
        <div>
            <div class="fila_datos">
                <label for="contrasena2">Repita la contraseña</label>
                <input type="password" id="contrasena2" name="contrasena2" required>
            </div>
        </div>
        <div class="d_botones">
            <div class="fila_datos">
                <input type="submit" id="bCambiar" class="bCambiar" value="Cambiar contraseña">
                <a href="index.php?controller=usuario&action=login" class="bVolver">Volver</a>
            </div>
        </div>
    </form>

</div>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/recuperarContrasena.js"></script>

</body>
</html>