<<<<<<< HEAD
<?php require_once "layout/header.php"; ?>


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

        <footer>

            <div class="d_telefonoEmpresa"><p>+34 945 01 01 10</p></div>

            <!-- TODO : Si da tiempo y apetece se puede poner un mapa interactivo con la dirección de Egibide Arriaga en vez de texto. -->
            <div class="d_direccionEmpresa">C/ Pozoa s/n (01013)</div>

            <!-- Poner 3 botones con el logo de cada RS, uno detrás de otro en fila. -->
            <div class="d_botonesRS">
                <a href="https://www.facebook.com/Egibide/" class="botonRS">
                    <img src="../../assets/imagenes/logo_facebook.png" alt="Facebook" width="40" height="40">
                </a>
                <a href="https://twitter.com/egibide?lang=es" class="botonRS">
                    <img src="../../assets/imagenes/logo_x.png" alt="X (Twitter)" width="40" height="40">
                </a>
                <a href="https://www.youtube.com/user/Egibide" class="botonRS">
                    <img src="../../assets/imagenes/logo_youtube.png" alt="YouTube" width="40" height="40">
                </a>
                <a href="https://www.instagram.com/egibide_vg/?hl=es" class="botonRS">
                    <img src="../../assets/imagenes/logo_instagram.png" alt="Instagram" width="40" height="40">
                </a>
                <a href="https://es.linkedin.com/school/egibide/" class="botonRS">
                    <img src="../../assets/imagenes/logo_linkedin.png" alt="LinkedIn" width="40" height="40">
                </a>
            </div>

            <div class="d_equipo">
                <p>Principal equipo desarrollador:</p>
                <img class="logo_equipo" src="../../assets/imagenes/logo_equipo2.png" alt="Logo Dev Dragons"
                     width="110" height="110">
            </div>

        </footer>

    </main>

    <script src="../../assets/javascript/menuPerfil.js"></script>
=======
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
>>>>>>> e4c633ab2d8f78668352d866e4e031c3822d8a19

</body>
</html>