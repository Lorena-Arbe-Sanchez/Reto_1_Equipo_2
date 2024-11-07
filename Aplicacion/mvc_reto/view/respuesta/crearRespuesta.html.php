<?php
$pageTitle = "Crear respuesta";
$bodyClass = "pag_crearRespuesta";
$botonBloqueado = "";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";
?>

<div class="contenido">

    <div id="divTitulo">
        <h2>Creación de respuesta</h2>
    </div>
    <form id="formCrearRespuesta" action="index.php?controller=respuesta&action=save&id_pregunta=<?php echo $_GET['id_pregunta']?>" method="post" enctype="multipart/form-data">

        <div>
            <label for="solucion">Solucion</label>
            <textarea id="solucion" name="solucion" maxlength="100" required></textarea>
        </div>

        <button type="button" id="anadirImg">Añadir archivo</button>
        <!-- accept="image/*"  =>  Solo se pueden seleccionar imágenes. -->
        <input type="file" id="inputFile" name="inputFile" accept="image/*"/>
        
        <!-- Para mostrar el nombre del archivo seleccionado -->
        <div id="fileNameDisplay" style="margin-top: 10px;"></div>
        
        <?php if (isset($_GET['archivo'])): ?>
            <img src="uploads/<?php echo $_GET['archivo']; ?>" alt="Imagen subida" width="200">
        <?php endif; ?>
        
        <?php
        /*
        <div>
            <input type="button" id="bAnadirArchivo" class="bAnadirArchivo" value="+ Añadir archivo">
        </div>
        */
        ?>

        <div class="d_botones">
            <input type="submit" id="bCrearRespuesta" class="bCrearRespuesta" value="Crear respuesta">
            <a href="index.php?controller=pregunta&action=list_paginated" class="bVolver">Cancelar</a>
        </div>

    </form>

</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/crearRespuesta.js"></script>

</body>
</html>