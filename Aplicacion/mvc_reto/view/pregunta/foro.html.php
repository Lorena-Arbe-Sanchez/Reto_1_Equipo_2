<!DOCTYPE html>
<html lang="es">
<head>
    <!-- TODO : Poner bien los "meta" de todas las páginas (lo mismo + propiedades funcionales). -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- TODO : Variable de "$title" en "<title>" para los títulos de las páginas que van cambiando.
                También se le pasará una variable llamada "botonBloqueado" para que controle la página actual el en menú del header. -->
    <title>Foro</title>
    <link rel="stylesheet" href="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/css/style.css">
    <!-- Poner un favicon (icono en la pestaña de una página web). -->
    <link rel="icon" type="image/png" href="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/icono_avion.png">
</head>
<body class="pag_foro">

        <?php require_once __DIR__ . "/../layout/header.php"; ?>

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

        <script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/menuPerfil.js"></script>

</body>
</html>