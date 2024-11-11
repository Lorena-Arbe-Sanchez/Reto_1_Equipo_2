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

// Array con los posibles temas de la BD para que tras obtener el tema lo muestre correctamente en la pregunta.
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

// Obtener el filtro de tema si está presente en la URL.
$filtroTema = isset($_GET['filtroTema']) ? $_GET['filtroTema'] : '';

// Obtener el filtro de búsqueda por palabras clave si está presente en la URL.
$filtroBusqueda = isset($_GET['filtroBusqueda']) ? $_GET['filtroBusqueda'] : '';

?>

<div class="contenido">

    <!--
    Contenedor que dispone de un filtro de búsqueda por tema y otro por palabras clave.
    Para poder combinar los 2 filtros a la vez, habrá que especificar primero uno (clicando
    el botón correspondiente) y luego especificar el otro.
    Se puede elegir primero el tema y luego especificar el texto, o al revés.
     -->
    <div class="apartadoFiltrar">

        <!-- Filtrar preguntas por tema. -->

        <div class="filtrarPorTema">

            <label for="filtroTema">Filtrar por tema:</label>

            <!-- El formulario usa el method GET para pasar el filtro como parámetro en la URL. -->
            <form action="index.php" method="get">

                <!-- Asegurar que el controlador y acción sean enviados correctamente. -->
                <input type="hidden" name="controller" value="pregunta">
                <input type="hidden" name="action" value="list_paginated">

                <!-- Campo oculto para mantener el valor del input (texto especificado) cuando se combina con el tema seleccionado. -->
                <input type="hidden" name="filtroBusqueda" value="<?= $filtroBusqueda ?>">

                <select name="filtroTema" id="filtroTema" required>
                    <option value="todas" <?= $filtroTema === 'todas' ? 'selected' : '' ?> style="font-style: oblique">Todas las opciones</option>
                    <?php
                    // Generar las opciones del select dinámicamente.
                    foreach ($temas as $valor => $nombre){
                        // Si el valor coincide con el filtro seleccionado, marcarlo como seleccionado.
                        $selected = $filtroTema === $valor ? 'selected' : '';
                        echo "<option value=\"$valor\" $selected>$nombre</option>";
                    }
                    ?>
                </select>

                <input type="submit" id="bFiltrar" class="bFiltrar" value="Filtrar">

            </form>

        </div>

        <!-- Filtrar preguntas (buscar en títulos y descripciones) por palabras clave. -->

        <div class="filtrarPorTexto">

            <label for="filtroBusqueda">Buscar texto:</label>

            <form action="index.php" method="get">

                <input type="hidden" name="controller" value="pregunta">
                <input type="hidden" name="action" value="list_paginated">

                <!-- Campo oculto para mantener el valor del combobox (tema seleccionado) cuando se combina con la búsqueda de texto. -->
                <input type="hidden" name="filtroTema" value="<?= $filtroTema ?>">

                <!--
                $filtroBusqueda ?? ''
                Es lo mismo que:
                isset($filtroBusqueda) ? $filtroBusqueda : ''
                -->
                <input type="text" id="filtroBusqueda" name="filtroBusqueda" placeholder="Escriba aquí su texto" value="<?= $filtroBusqueda ?? '' ?>">

                <input type="submit" id="bFiltrar" class="bFiltrar" value="Buscar">

            </form>

        </div>

    </div>

    <!-- TODO : Ya que esto está duplicado (frecuentes) hayq eu reutilizarlo. -->
    <?php
    if(!empty($dataToView["data"][0]) && count($dataToView["data"])>0){

        foreach($dataToView["data"][0] as $pregunta){
            ?>
            <div class="pregunta">

                <div class="tituloPregunta">
                    <h2><?php echo $pregunta["titulo"]; ?></h2>
                </div>

                <div class="datosPreguntaUsuario">
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
                                    <form action="index.php?controller=favorito&action=save&id_respuesta=<?php echo $respuesta["id"]; ?>" method="POST">
                                        <button type="submit">Añadir a favoritos</button>
                                    </form>
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
                        <a class="page-link" href="index.php?controller=pregunta&action=list_paginated&page=<?= $i; ?>&filtroTema=<?= urlencode($filtroTema); ?>"><?= $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>

        <?php
    }
    else{
        ?>
        <div>
            No hay preguntas registradas.
        </div>
        <?php
    }
    ?>

</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/foroTamano.js"></script>

</body>
</html>