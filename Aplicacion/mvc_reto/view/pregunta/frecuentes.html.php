<!--
Cargar de la base de datos los datos de las preguntas, respuestas y usuarios.
Título de la pregunta, tema, nombre de usuario, fecha (se guardara la del mismo día de la creación de la pregunta),
descripción de la pregunta, botón de añadir respuesta, respuestas existentes con nombre de usuario, fecha,
botón de 'like' y botón de 'dislike'.
-->

<?php
$pageTitle = "Preguntas frecuentes";
$bodyClass = "pag_frecuentes";
// Variable "botonBloqueado" para controlar la página actual el en menú del header. El botón correspondiente se bloqueará.
$botonBloqueado = "d_botonPreguntas";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";
?>

<div class="contenido">

    <?php
    if(!empty($dataToView["data"][0]) && count($dataToView["data"])>0){

        foreach($dataToView["data"][0] as $pregunta){
            ?>
            <div class="pregunta">
                <div class="tituloPregunta">
                    <h2><?php echo $pregunta["titulo"]; ?></h2>
                </div>

                <div class="temaPregunta">
                    <!-- Obtener el tema de la BD y mostrarlo correctamente. -->
                    <?php
                    // TODO : Mover lo de temas como en el foro.
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

                    // Verifica si el tema existe en el array; si no, muestra "Tema no especificado"
                    echo $temas[$pregunta["tema"]] ?? "Tema no especificado";

                    // TODO : Añadir más columnas de la tabla (usuario, fecha...)

                    ?>
                </div>

                <div class="descPregunta">
                    <?php echo $pregunta["descripcion"]; ?>
                </div>

                <div class="divBResponder">
                    <div class="bResponder">
                        <a href="index.php?controller=respuesta&action=crear&id_pregunta=<?php echo $pregunta["id"]; ?>">
                            Responder</a>
                    </div>
                </div>

                <h3>Respuestas:</h3>
                <br>
                <div class="respuestas">
                    <?php
                    if(isset($pregunta['respuestas']) && !empty($pregunta['respuestas'])){
                        foreach($pregunta['respuestas'] as $respuesta){
                            ?>
                            <div class="respuesta">
                                <p><?php echo $respuesta['solucion']; ?></p>
                            </div>
                            <div class="imagen">
                                <?php
                                if($respuesta['archivo'] != "" || $respuesta['archivo'] != NULL){
                                    ?>
                                    <a href="./uploads/<?php echo $respuesta['archivo'] ?>">Ver imagen</a>
                                    <?php
                                }
                                ?>
                            </div>
                            <!-- TODO : Poner lo de 'Favorito' como el foro. -->
                            <div class="botonesGusta">
                                <div class="bMeGusta">
                                    <a href="#">Me gusta</a>
                                </div>

                                <div class="bNoMeGusta">
                                    <a href="#">No me gusta</a>
                                </div>
                            </div>
                            <?php

                        }
                    }
                    else{
                        ?>
                        <p>No hay ninguna respuesta.</p>
                        <?php
                    }
                    ?>
                </div>

            </div>
            <br>
            <?php
        }
        ?>

        <nav aria-label="Paginación de preguntas">
            <ul>
                <!-- Números de página -->
                <?php for ($i = 1; $i <= $dataToView["data"][2]; $i++): ?>
                    <li class="page-item <?= ($i == $dataToView["data"][1]) ? 'active' : ''; ?>">
                        <a class="page-link" href="index.php?controller=pregunta&action=frecuentes&page=<?= $i; ?>"><?= $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>

        <?php
    }
    else{
        ?>
        <div>
            No existen preguntas.
        </div>
        <?php
    }
    ?>

</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/frecuentesTamano.js"></script>

</body>
</html>