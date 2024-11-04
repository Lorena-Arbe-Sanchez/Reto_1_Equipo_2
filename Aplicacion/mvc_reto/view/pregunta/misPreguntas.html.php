<?php
$pageTitle = "Mis preguntas";
$bodyClass = "pag_misPreguntas";
$botonBloqueado = "d_botonMisPreguntas";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";
?>

<!-- TODO : Poner con el fondo, en columna y demás. -->

<div class="contenido">

    <div id="titulo">
        <h2>Gestión de preguntas</h2>
    </div>

    <div class="d_bCrear"><a href="index.php?controller=pregunta&action=crear" class="bCrear">+ Crear Pregunta</a></div>

    <?php
    // Verificamos si $dataToView["data"] está definido y es un array
    if (isset($dataToView["data"]) && is_array($dataToView["data"]) && count($dataToView["data"]) > 0) {
        ?>
            <!-- TODO : Cambiar nombre tabla y poner bien en style. -->
        <table class="tabla_cuentas">
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
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($pregunta['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($pregunta['descripcion']); ?></td>
                    <td><?php echo htmlspecialchars($pregunta['tema']); ?></td>
                    <td>
                        <a href="index.php?controller=pregunta&action=borrar&id=<?php echo urlencode($pregunta['id']); ?>" id="bEliminar">Eliminar</a>
                    </td>
                </tr>
                <?php
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
</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/crearPregunta.js"></script>

</body>
</html>
