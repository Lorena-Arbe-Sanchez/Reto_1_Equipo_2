<?php
$pageTitle = "Mis publicaciones";
$bodyClass = "pag_misPreguntas";
$botonBloqueado = "d_botonMisPreguntas";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";
?>

<div class="contenido">

    <div id="titulo">
        <h2>Gestión de preguntas</h2>
    </div>

    <div class="d_bCrear"><a href="index.php?controller=pregunta&action=crear" class="bCrear">+ Crear Pregunta</a></div>

    <!-- TODO : Poner que si no hay datos que no muestre ni los 'thead'; que muestre mensaje de q no hay registros. -->

    <?php
    //MIS PREGUNTAS
    // Verificamos si $dataToView["data"] está definido y es un array
    if (isset($dataToView["data"]) && is_array($dataToView["data"]) && count($dataToView["data"]) > 0) {
        ?>
        <table class="tabla_preguntas">
            <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Tema</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($dataToView["data"] as $pregunta) {
                if ($pregunta['id_usuario'] == $_SESSION["id"]) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($pregunta['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($pregunta['descripcion']); ?></td>
                        <td>
                            <?php
                            $temas = [
                                "diseno_aeronaves" => "Diseño y Desarrollo de Aeronaves",
                                "fabricacion_produccion" => "Fabricación y Producción",
                                "mantenimiento_operaciones" => "Mantenimiento y Operaciones",
                                "innovacion_sostenibilidad" => "Innovación y Sostenibilidad",
                                "certificaciones_reglamentacion" => "Certificaciones y Reglamentación",
                                "problemas_tecnicos" => "Problemas Técnicos y Soluciones",
                                "colaboracion_interdepartamental" => "Colaboración Interdepartamental",
                                "software_herramientas" => "Software y Herramientas de Ingeniería",
                                "gestion_conocimiento" => "Gestión del Conocimiento",
                                "otro" => "Otro tema"
                            ];
        
                            echo $temas[$pregunta["tema"]] ?? "Tema no especificado";

                            ?></td>
                        <td>
                            <a href="index.php?controller=pregunta&action=borrar&id=<?php echo urlencode($pregunta['id']); ?>" id="bEliminar">Eliminar</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
        <?php
    } else {
        ?>
        <div class="mensajeInexistir">
            Actualmente no hay preguntas registradas.
        </div>
        <?php
    }
    ?>

    <div id="tituloRespuesta">
        <h2>Gestión de respuestas</h2>
    </div>

    <?php
    //MIS RESPUESTAS
    if (isset($dataToView["data"]) && is_array($dataToView["data"])){
        ?>
        <table class="tabla_respuestas">
            <thead>
            <tr>
                <th>Solución</th>
                <th>Archivo</th>
                <th>Pregunta</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($dataToView["data"] as $pregunta){

                foreach ($pregunta["respuestas"] as $respuesta){

                    if ($respuesta["id_usuario"] == $_SESSION["id"]){
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($respuesta['solucion']); ?></td>
                            <td>
                                <?php
                                if($respuesta['archivo'] == "" || $respuesta['archivo'] == NULL){
                                ?>
                                    <p>No hay ningún archivo adjunto</p>
                                    <?php
                                }
                                else{
                                    ?>
                                    <img src="./uploads/<?php echo $respuesta['archivo'] ?>" alt="Imagen">
                                    <?php
                                }
                                ?>
                                    
                            </td>
                            <td><?php echo htmlspecialchars($pregunta['titulo']); ?></td>
                            <td class="d_botones_public">
                                <a href="index.php?controller=respuesta&action=editar&id=<?php echo urlencode($respuesta['id']); ?>" id="bEditar">Editar</a>
                                <a href="index.php?controller=respuesta&action=borrar&id=<?php echo urlencode($respuesta['id']); ?>" id="bEliminar">Eliminar</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
            }
            ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "<p>No tienes respuestas registradas.</p>";
    }
    ?>
</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/crearPregunta.js"></script>
<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/mispreguntasTamano.js"></script>

</body>
</html>
