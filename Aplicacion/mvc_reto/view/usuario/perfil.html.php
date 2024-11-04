<?php
$pageTitle = "Perfil de usuario";
$bodyClass = "pag_perfil";
$botonBloqueado = "l_botonPerfil";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";
?>

<div class="contenido">

    <div class="foto">
        <!-- Cargar la imagen del usuario de la BBDD, y si no tiene, cargar la de default. -->
        <img src="<?php echo isset($usuarioSesion['imagen']) ? htmlspecialchars($usuarioSesion['imagen']) :
            '/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/perfil.png'; ?>" alt="Imagen perfil">

        <!-- enctype="multipart/form-data"  =>  Permitir la subida de ficheros. -->
        <form id="formCambiarImg" action="index.php?controller=usuario&action=subirImgPerfil" method="post" enctype="multipart/form-data">
            <button type="button" id="anadirImg">Añadir imagen</button>
            <!-- accept="image/*"  =>  Solo se pueden seleccionar imágenes. -->
            <input type="file" id="inputFile" accept="image/*">
        </form>
    </div>

    <!-- Se supone que ya ha obtenido los datos de la cuenta en la función "getUsuarioByUsuarioContrasena" de 'Usuario.php'. -->
    <div class="info">

        <div class="usuarioDiv">
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario_perfil" name="usuario_perfil" value="<?php echo htmlspecialchars($usuarioSesion['usuario']); ?>" readonly>
        </div>
        <div class="nombreDiv">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($usuarioSesion['nombre']); ?>" readonly>
        </div>
        <div class="primerApeDiv">
            <label for="primerApellido">Primer apellido</label>
            <input type="text" id="primerApellido" name="primerApellido" value="<?php echo htmlspecialchars($usuarioSesion['apellido1']); ?>" readonly>
        </div>
        <div class="segundoApeDiv">
            <label for="segundoApellido">Segundo apellido</label>
            <input type="text" id="segundoApellido" name="segundoApellido" value="<?php echo htmlspecialchars($usuarioSesion['apellido2']); ?>" readonly>
        </div>
        <div class="dniDiv">
            <label for="DNI">DNI</label>
            <input type="text" id="DNI" name="DNI" value="<?php echo htmlspecialchars($usuarioSesion['dni']); ?>" readonly>
        </div>
        <div class="telefonoDiv">
            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" name="telefono" value="<?php echo isset($usuarioSesion['telefono']) ? htmlspecialchars($usuarioSesion['telefono']) : ''; ?>" readonly>
        </div>
        <div class="emailDiv">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($usuarioSesion['email']); ?>" readonly>
        </div>

    </div>

</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/perfil.js"></script>

</body>
</html>