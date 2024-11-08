<!--
Cargar de la base de datos los datos de las preguntas, respuestas y usuarios.
Título de la pregunta, tema, nombre de usuario, fecha (se guardara la del mismo día de la creación de la pregunta),
descripción de la pregunta, botón de añadir respuesta, respuestas existentes con nombre de usuario, fecha,
botón de 'like' y botón de 'dislike'.
-->

<?php
$pageTitle = "Foro";
$bodyClass = "pag_foro";
// Variable "botonBloqueado" para controlar la página actual el en menú del header. El botón correspondiente se bloqueará.
$botonBloqueado = "d_botonForo";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";
?>

<div class="contenido">

    <div>
        <label for="tema">Filtrar por Tema:</label>
        <form method="GET" action="index.php?controller=pregunta&action=filtrarPorTema">
            <select name="tema" id="tema" required>
                <option value="Todas las opción">Todas las opción</option>
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
            <button id="filtrarLink">Filtrar</button>
        </form>
    </div>


    <?php
    if(!empty($dataToView["data"][0]) && count($dataToView["data"])>0){

        foreach($dataToView["data"][0] as $pregunta){
            ?>
            <div class="pregunta">
                <div class="tituloPregunta">
                    <h2><?php echo $pregunta["titulo"]; ?></h2>
                </div>

                <div class="datosPreguntaUsuario">

                    <!-- Array con los posibles temas de la BBDD para que tras obtener el tema lo muestre correctamente. -->
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
                    ?>

                    <!-- TODO : Estilizar la tabla. Ponerla también en las frecuentes. -->
                    <table>
                        <tr>
                            <td>
                                <?php
                                // Verifica si el tema existe en el array; si no, muestra "Tema no especificado".
                                echo $temas[$pregunta["tema"]] ?? "Tema no especificado";
                                ?>
                            </td>
                            <td>
                                <?php
                                // TODO : Poner que muestre el nombe del usuario y no el id (select BD).
                                echo $pregunta["id_usuario"] ?? "Usuario inexistente";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $pregunta["fecha"] ?? "Fecha inespecífica";
                                ?>
                            </td>
                        </tr>
                    </table>

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
                            <div class="botonesGusta">
                                <div class="bFavorito">
                                    <a href="index.php?controller=respuesta&action=modificarLikes&id_pregunta=<?php echo $pregunta["id"]; ?>">Añadir a favoritos</a>
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
                        <a class="page-link" href="index.php?controller=pregunta&action=list_paginated&page=<?= $i; ?>"><?= $i; ?></a>
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

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/foroTamano.js"></script>
<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/filtrarPorTema.js"></script>
<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/modoClaroOscuro.js"></script>

</body>
</html>