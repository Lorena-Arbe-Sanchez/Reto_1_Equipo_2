<?php
$pageTitle = "Gestionar cuentas";
$bodyClass = "pag_gestionarCuenta";
$botonBloqueado = "l_botonCuentas";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";

$id = $solucion = $archivo = "";

if(isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if(isset($dataToView["data"]["solucion"])) $solucion = $dataToView["data"]["solucion"];
if(isset($dataToView["data"]["archivo"])) $archivo = $dataToView["data"]["archivo"];

?>

<div class="contenido">

    <div id="titulo">
        <h2>Modificar Respuesta</h2>
    </div>

    <form action="index.php?controller=respuesta&action=editar" method="post">
        <div id="datos">

            <div>
                <label for="solucion">Solucion</label>
                <textarea id="solucion" name="solucion" maxlength="300"><?php echo $solucion; ?></textarea>
            </div>

            <!-- Para mostrar el nombre del archivo seleccionado -->
            <div id="fileNameDisplay" style="margin-top: 10px;"></div>

            <?php if (isset($_GET['archivo'])): ?>
                <img src="uploads/<?php echo $_GET['archivo']; ?>" alt="Imagen subida" width="200">
            <?php endif; ?>

        </div>

        <div id="botones">
            <input type="submit" id="bModificar" class="bModificar" value="Modificar">
        </div>

        <a href="index.php?controller=pregunta&action=list_paginated" class="bVolver">Volver</a>

    </form>

</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

<!-- TODO : ¿Tiene q tener este script? -->
<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/gestionarCuenta.js"></script>

</body>
</html>