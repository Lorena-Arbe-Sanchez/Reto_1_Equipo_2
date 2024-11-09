<?php
$pageTitle = "Recuperar contraseña";
$bodyClass = "pag_recuperar";
$conMenu = false;
require_once __DIR__ . "/../layout/header.php";
?>

<div class="contenedor">

    <h2>Recuperar contraseña</h2>

    <form id="formRecuperarContra" action="index.php?controller=usuario&action=validarRecuperar" method="post">
        <div class="fila_datos">
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario" required>
        </div>
        <div class="fila_datos">
            <label for="contrasena1">Contraseña nueva</label>
            <div class="input-wrapper">
                <input type="password" id="contrasena1" name="contrasena1" required>
                <a id="toggle-password1">
                    <img id="icono_ojo1"
                         src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/icono_ver.png"
                         alt="Icono ojo" width="30" height="30">
                </a>
            </div>
        </div>
        <div class="fila_datos">
            <label for="contrasena2">Repita la contraseña</label>
            <div class="input-wrapper">
                <input type="password" id="contrasena2" name="contrasena2" required>
                <a id="toggle-password2">
                    <img id="icono_ojo2"
                         src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/icono_ver.png"
                         alt="Icono ojo" width="30" height="30">
                </a>
            </div>
        </div>
        <div class="d_botones">
            <input type="submit" id="bCambiar" class="bPrincipal" value="Cambiar contraseña">
            <a href="index.php?controller=usuario&action=login" class="bSecundario">Volver</a>
        </div>
    </form>

</div>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/recuperarContrasena.js"></script>
<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/modoClaroOscuro.js"></script>

</body>
</html>