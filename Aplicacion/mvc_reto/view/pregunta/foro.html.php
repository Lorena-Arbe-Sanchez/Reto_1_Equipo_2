<?php
$pageTitle = "Foro";
$bodyClass = "pag_foro";
// Variable "botonBloqueado" para controlar la página actual el en menú del header. El botón correspondiente se bloqueará.
$botonBloqueado = "d_botonForo";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";
?>

    <div class="contenido">

        <!-- TODO : Cargar de la base de datos los datos de las preguntas, respuestas y usuarios. -->
        <!-- Título de la pregunta, tema, nombre de usuario, fecha (se guardara la del mismo día de la creación de la pregunta),
                descripción de la pregunta, botón de añadir respuesta, respuestas existentes con nombre de usuario, fecha,
                botón de 'like' y botón de 'dislike'. -->

        <!-- TODO : Luego borrar; es para probar. -->
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.
            Eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
            Nisi ut aliquip ex ea commodo consequat duis aute.
            Irure dolor in reprehenderit in voluptate velit esse cillum.
            Dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat.
            Non proident sunt in culpa qui officia deserunt mollit.
            Anim id est laborum curabitur gravida arcu ac tortor.
            Aenean et tortor at risus viverra adipiscing at in.
            Non tellus orci ac auctor augue mauris augue neque.
        </p>

    </div>

    <?php require_once __DIR__ . "/../layout/footer.php"; ?>

</body>
</html>