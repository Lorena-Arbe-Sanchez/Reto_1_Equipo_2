<!--
Cargar de la base de datos los datos de las preguntas, respuestas y usuarios.
Título de la pregunta, tema, nombre de usuario, fecha (se guardara la del mismo día de la creación de la pregunta),
descripción de la pregunta, botón de añadir respuesta, respuestas existentes con nombre de usuario, fecha y botón
para añadir a 'favoritos'.
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
/*
$filtroTema = $_GET['filtroTema'] ?? '';
Es lo mismo que:
$filtroTema = isset($_GET['filtroTema']) ? $_GET['filtroTema'] : '';
*/
$filtroTema = $_GET['filtroTema'] ?? '';

// Obtener el filtro de búsqueda por palabras clave.
$filtroBusqueda = $_GET['filtroBusqueda'] ?? '';

// Obtener el filtro de búsqueda por fecha.
$filtroFecha = $_GET['filtroFecha'] ?? '';

?>

<div class="contenido">

    <!--
    Contenedor que dispone de un filtro de búsqueda por tema, otro por palabras clave y otro por fecha.
    Para poder combinar varios filtros a la vez, habrá que especificar primero uno (clicando en el botón
    correspondiente) y luego especificar los otros. Es decir, por cada filtro que se debe aplicar hay
    que clicar en su correspondiente botón.
    Se pueden elegir/especificar los filtros en cualquier orden deseado.
     -->

    <!-- TODO
        Los formularios para filtrar por tema, texto y fecha están casi duplicados.
        Crear una función o incluso un archivo PHP que genere dinámicamente estos
        formularios, pasando solo los parámetros relevantes.
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

                <!--
                Campos ocultos para mantener los valores de los filtros (input de texto y comboBox de fecha) cuando se combinan entre ellos.
                El propósito de 'htmlspecialchars' es convertir ciertos caracteres especiales a entidades HTML, protegiendo así la salida del navegador.
                -->
                <input type="hidden" name="filtroBusqueda" value="<?= htmlspecialchars($filtroBusqueda) ?>">
                <input type="hidden" name="filtroFecha" value="<?= htmlspecialchars($filtroFecha) ?>">

                <select name="filtroTema" id="filtroTema" required>
                    <option value="todas" <?= htmlspecialchars($filtroTema) === 'todas' ? 'selected' : '' ?> style="font-style: oblique">Todas las opciones</option>
                    <?php
                    // Generar las opciones del select dinámicamente.
                    foreach ($temas as $valor => $nombre){
                        // Si el valor coincide con el filtro seleccionado, marcarlo como seleccionado.
                        $selected = $filtroTema === $valor ? 'selected' : '';
                        echo "<option value=\"$valor\" $selected>$nombre</option>";
                    }
                    ?>
                </select>

                <input type="submit" class="bFiltrar" value="Filtrar">

            </form>

        </div>

        <!-- Filtrar preguntas (buscar en títulos y descripciones) por palabras clave. -->

        <div class="filtrarPorTexto">

            <label for="filtroBusqueda">Buscar texto:</label>

            <form action="index.php" method="get">

                <input type="hidden" name="controller" value="pregunta">
                <input type="hidden" name="action" value="list_paginated">

                <!-- Campos ocultos para mantener los valores de los filtros (comboBox de tema y comboBox de fecha) cuando se combinan entre ellos. -->
                <input type="hidden" name="filtroTema" value="<?= htmlspecialchars($filtroTema) ?>">
                <input type="hidden" name="filtroFecha" value="<?= htmlspecialchars($filtroFecha) ?>">

                <input type="text" id="filtroBusqueda" name="filtroBusqueda" placeholder="Escriba aquí su texto" value="<?= $filtroBusqueda ?? '' ?>">

                <input type="submit" class="bFiltrar" value="Buscar">

            </form>

        </div>

        <!-- Filtrar preguntas por fecha (en orden descendente o ascendente). -->

        <div class="filtrarPorFecha">

            <label for="filtroFecha">Ordenar por fecha:</label>

            <form action="index.php" method="get">

                <input type="hidden" name="controller" value="pregunta">
                <input type="hidden" name="action" value="list_paginated">

                <!-- Campos ocultos para mantener los valores de los filtros (comboBox de tema e input de texto) cuando se combinan entre ellos. -->
                <input type="hidden" name="filtroTema" value="<?= htmlspecialchars($filtroTema) ?>">
                <input type="hidden" name="filtroBusqueda" value="<?= htmlspecialchars($filtroBusqueda) ?>">

                <select name="filtroFecha" id="filtroFecha" required>
                    <option value="desc" <?= htmlspecialchars($filtroFecha) === 'desc' ? 'selected' : '' ?> style="font-style: oblique">Más recientes primero</option>
                    <option value="asc" <?= htmlspecialchars($filtroFecha) === 'asc' ? 'selected' : '' ?>>Más antiguos primero</option>
                </select>

                <input type="submit" class="bFiltrar" value="Ordenar">

            </form>

        </div>

        <!-- Botón que limpia todos los filtros aplicados. Redireccionará al usuario a la página inicial del foro sin filtros. -->

        <div class="resetearFiltros">
            <form action="index.php" method="get">
                <input type="hidden" name="controller" value="pregunta">
                <input type="hidden" name="action" value="list_paginated">
                <input type="submit" class="bResetearFiltros" value="Resetear Filtros">
            </form>
        </div>

    </div>

    <!-- TODO : Ya que esto está duplicado (frecuentes) hay q reutilizarlo. -->
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
                                // TODO : Poner que muestre el nombe del usuario y no el id (select BD). También si no obtiene el id (porque el usuario se ha podido borrar), sacará "Usuario anónimo".
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
                            <div class="d_bFavorito">
                                <!-- Imagen de una estrella que será un enlace para guardar la respuesta en "Mis favoritos". -->
                                <form action="index.php?controller=favorito&action=save&id_respuesta=<?php echo $respuesta["id"]; ?>" method="POST" class="form_estrella">
                                    <button type="submit" class="bFavorito" style="border: none; background: none;">
                                        <img class="icono_estrella"
                                             src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/icono_estrella.png"
                                             alt="Símbolo de estrella" width="40" height="auto">
                                    </button>
                                </form>
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