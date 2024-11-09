<?php
$pageTitle = "Preguntas frecuentes";
$bodyClass = "pag_frecuentes";
// Variable "botonBloqueado" para controlar la página actual el en menú del header. El botón correspondiente se bloqueará.
$botonBloqueado = "d_botonPreguntas";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";

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

<div class="contenido">

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
            No hay preguntas registradas.
        </div>
        <?php
    }
    ?>

</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/frecuentesTamano.js"></script>

</body>
</html>