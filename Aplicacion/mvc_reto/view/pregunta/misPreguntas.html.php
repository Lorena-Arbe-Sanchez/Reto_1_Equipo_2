<?php
$pageTitle = "Mis preguntas";
$bodyClass = "pag_misPreguntas";
$botonBloqueado = "d_botonMisPreguntas";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";
?>

<div class="contenido">

    <div id="titulo">
        <h2>Mis preguntas</h2>
    </div>

    <a href="index.php?controller=usuario&action=crear" class="bCrear">Crear Pregunta</a>


</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/crearPregunta.js"></script>

</body>
</html>