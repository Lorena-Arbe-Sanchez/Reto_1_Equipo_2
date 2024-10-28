<?php
$pageTitle = "Perfil de usuario";
$bodyClass = "pag_perfil";
$botonBloqueado = "l_botonPerfil";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";
?>

<div class="contenido">

    <div class="foto">
        <!-- TODO : Cargar la imagen del usuario de la BBDD. -->
        <img src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/perfil.png" alt="Imagen perfil">

        <form>
            <button id="anadirImg">+ Añadir imagen</button> <!-- TODO : Poner imagen suma... -->
        </form>
    </div>

    <!-- Se supone que ya ha obtenido los datos de la cuenta en la función "getUsuarioByUsuarioContrasena" de 'Usuario.php'. -->
    <div class="info">

        <div class="usuarioDiv">
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario" value="<?php echo htmlspecialchars($usuarioDB['usuario']); ?>" readonly>
        </div>
        <div class="nombreDiv">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $usuarioDB['nombre']; ?>" readonly>
        </div>
        <div class="primerApeDiv">
            <label for="primerApellido">Primer apellido</label>
            <input type="text" id="primerApellido" name="primerApellido" value="<?php echo $usuarioDB['apellido1']; ?>" readonly>
        </div>
        <div class="segundoApeDiv">
            <label for="segundoApellido">Segundo apellido</label>
            <input type="text" id="segundoApellido" name="segundoApellido" value="<?php echo $usuarioDB['apellido2']; ?>" readonly>
        </div>
        <div class="dniDiv">
            <label for="DNI">DNI</label>
            <input type="text" id="DNI" name="DNI" value="<?php echo $usuarioDB['dni']; ?>" readonly>
        </div>
        <div class="telefonoDiv">
            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" name="telefono" value="<?php echo $usuarioDB['telefono']; ?>" readonly>
        </div>
        <div class="emailDiv">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" value="<?php echo $usuarioDB['email']; ?>" readonly>
        </div>

    </div>

</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

</body>
</html>