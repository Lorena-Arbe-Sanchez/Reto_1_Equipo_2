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

    <?php
    if(!empty($dataToView["data"]) && count($dataToView["data"])>0){

        foreach($dataToView["data"] as $pregunta){
            ?>
            <div class="pregunta">
                <div class="tituloPregunta">
                    <h2><?php echo $pregunta["titulo"];?></h2>
                </div>

                <div class="temaPregunta">
                    <?php echo $pregunta["tema"] ?>
                </div>

                <div class="descPregunta">
                    <?php echo $pregunta["descripcion"] ?>
                </div>

                <div class="divBResponder">
                    <div class="bResponder">
                        <a href="index.php?controller=respuesta&action=crear&id=<?php echo $_SESSION["id"]?>"
                        >Responder</a>
                    </div>
                </div>

                <div class="respuestas">
                    <h3>Respuestas:</h3>
                    <br>
                    <?php
                    if(isset($pregunta['respuestas']) && !empty($pregunta['respuestas'])){
                        foreach($pregunta['respuestas'] as $respuesta){
                            ?>
                            <div class="respuesta">
                                <p><?php echo $respuesta['solucion']; ?></p>
                            </div>
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

</body>
</html>