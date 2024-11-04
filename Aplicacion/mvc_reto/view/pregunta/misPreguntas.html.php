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

    <a href="index.php?controller=pregunta&action=crear" class="bCrear">Crear Pregunta</a>

    <?php

    if(isset($dataToView["data"]) && is_array($dataToView["data"]) && count($dataToView["data"]) > 0){
        ?>
        <table class="tabla_cuentas">
            <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Tema</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach($dataToView["data"] as $pregunta){
                ?>
                <tr>
                    <td><?php echo $pregunta['titulo']; ?></td>
                    <td><?php echo $pregunta['descripcion']; ?></td>
                    <td><?php echo $pregunta['tema']; ?></td>
                    <td>

                        <a href="index.php?controller=pregunta&action=borrar&id=<?php echo $pregunta['id']; ?>"
                           id="bEliminar">Eliminar</a>
                    </td>
                </tr>

                <?php

            }
            ?>
            </tbody>
        </table>

        <?php
    }
    // Si no tiene filas, significa que no hay datos de cuentas registradas.
    else{
        ?>
        <div class="mensajeInexistir">
            Actualmente no hay preguntas registradas.
        </div>

        <?php
    }

    ?>

</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/crearPregunta.js"></script>

</body>
</html>