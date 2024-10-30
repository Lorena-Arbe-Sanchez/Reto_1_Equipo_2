<!--
Cargar de la base de datos los datos de las preguntas, respuestas y usuarios.
Título de la pregunta, tema, nombre de usuario, fecha (se guardara la del mismo día de la creación de la pregunta),
descripción de la pregunta, botón de añadir respuesta, respuestas existentes con nombre de usuario, fecha,
botón de 'like' y botón de 'dislike'.
-->

<?php
$pageTitle = "PreguntasFrecuentes";
$bodyClass = "pag_preguntasFrecuentes";
// Variable "botonBloqueado" para controlar la página actual el en menú del header. El botón correspondiente se bloqueará.
$botonBloqueado = "d_botonPreguntasFrecuentes";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";
?>

<div class="contenido">

  <h1>Preguntas Frecuentes</h1>
</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

</body>
</html>