<?php
$pageTitle = "Añadir favorito";
$bodyClass = "pag_anadirFavorito";
$botonBloqueado = "";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";
?>

<div class="contenido">
    <?php if (isset($_GET["response"]) && $_GET["response"] === "duplicado"): ?>
        <h1>¡Esta respuesta ya está en tus favoritos!</h1>
    <?php elseif (isset($_GET["response"]) && $_GET["response"] === "exito"): ?>
        <h1>La respuesta se ha añadido a tus favoritos.</h1>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

</body>
</html>