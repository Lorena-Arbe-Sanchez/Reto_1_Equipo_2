<?php
$pageTitle = "Crear pregunta";
$bodyClass = "pag_crearPregunta";
$botonBloqueado = "d_botonCrear";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";
?>

<div class="contenido">

    <form id="formCrearPregunta" action="index.php?controller=pregunta&action=save" method="post">

        <div id="divTitulo">
            <h2>Creación de pregunta</h2>
        </div>

        <div>
            <label for="titulo">Titulo</label>
            <textarea id="titulo" name="titulo" maxlength="100" required></textarea>
        </div>

        <div>
            <label for="tema">Tema</label>
            <select name="tema" id="tema" required>
                <option style="font-style: oblique">Seleccionar opción</option>
                <option value="diseno_aeronaves">Diseño y Desarrollo de Aeronaves</option>
                <option value="fabricacion_produccion">Fabricación y Producción</option>
                <option value="mantenimiento_operaciones">Mantenimiento y Operaciones</option>
                <option value="innovacion_sostenibilidad">Innovación y Sostenibilidad</option>
                <option value="certificaciones_reglamentacion">Certificaciones y Reglamentación</option>
                <option value="problemas_tecnicos">Problemas Técnicos y Soluciones</option>
                <option value="colaboracion_interdepartamental">Colaboración Interdepartamental</option>
                <option value="software_herramientas">Software y Herramientas de Ingeniería</option>
                <option value="gestion_conocimiento">Gestión del Conocimiento</option>
                <option value="otro">Otro tema</option>
            </select>
        </div>
        <div>
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" maxlength="300" required></textarea>
        </div>
        <!-- TODO : AÑADIR OPCIÓN DE "ARCHIVO" -->
        <div class="d_botones">
            <input type="submit" id="bCrearPregunta" class="bCrearPregunta" value="Crear pregunta">
            <a href="index.php?controller=pregunta&action=misPreguntas" class="bVolver">Cancelar</a>
        </div>

    </form>

</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/crearPregunta.js"></script>

</body>
</html>