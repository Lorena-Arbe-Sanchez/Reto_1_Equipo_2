<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" type="image/png" href="../assets/imagenes/icono_avion.png">
</head>
<body>

    <div class="container">

        <h1>Recuperar contraseña</h1>

        <!-- TODO : <form action="index.php?controller=user&action=recuperarContra" method="post"> -->
        <form id="formRecuperarContra" action="login.html" method="post">
            <div>
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div>
                <label for="contrasena1">Contraseña nueva</label>
                <input type="password" id="contrasena1" name="contrasena1" required>
            </div>
            <div>
                <label for="contrasena2">Repita la contraseña</label>
                <input type="password" id="contrasena2" name="contrasena2" required>
            </div>

            <input type="submit" id="bCambiar" class="bCambiar" value="Cambiar contraseña">
            <a href="login.html" class="bVolver">Volver</a>
        </form>

    </div>

    <script src="../assets/javascript/recuperarContrasena.js"></script>

</body>
</html>