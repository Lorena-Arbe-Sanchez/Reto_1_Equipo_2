<?php
$pageTitle = "Mis respuestas favoritas";
$bodyClass = "pag_misFavoritas";
$botonBloqueado = "d_botonMisFavoritas";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";
?>

<div class="contenido">

    <div id="titulo">
        <h2>Mis respuestas favoritas</h2>
    </div>

    <?php
    if (isset($dataToView["data"]) && is_array($dataToView["data"]) && count($dataToView["data"])>0) {
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
            foreach ($dataToView["data"] as $respuesta) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($respuesta['solucion']); ?></td>
                    <td>
                        <?php
                        if (empty($respuesta['archivo'])) {
                            echo "<p>No hay ningún archivo adjunto</p>";
                        } else {
                            echo "<img src='./uploads/" . htmlspecialchars($respuesta['archivo']) . "' alt='Imagen'>";
                        }
                        ?>
                    </td>
                    <td><?php echo htmlspecialchars($respuesta['pregunta_titulo']); ?></td>
                    <td>
                        <a href="index.php?controller=favorito&action=borrar&id=<?php echo urlencode($respuesta['id_favorito']); ?>" id="bEliminar">Eliminar</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "<p>No tienes respuestas favoritas registradas.</p>";
    }
    ?>


</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/misFavoritasTamano.js"></script>

</body>
</html>
