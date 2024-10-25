<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar cuentas</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="icon" type="image/png" href="../../assets/imagenes/icono_avion.png">
    <style>
        #botonBloqueado{ text-align: center; }
    </style>
</head>
<body class="pag_crearCuenta">
<main>
    <header>

        <div class="d_logo_empresa">
            <img class="logo_empresa" src="../../assets/imagenes/logo_empresa.png" alt="Logo Aergibide SL"
                 width="190" height="90">
        </div>

        <div class="d_botonesHeader">

            <div class="d_botonForo"><a href="index.php?controller=pregunta&action=list" class="botonForo">Foro</a></div>

            <!-- TODO : Enlace. -->
            <div class="d_botonPreguntas"><a href="" class="botonPreguntas">Preguntas frecuentes</a></div>

            <div class="d_botonCrear"><a href="index.php?controller=pregunta&action=save" class="botonCrear">Crear pregunta</a></div>

        </div>

        <div class="d_botonPerfil">

            <a href="#" id="botonPerfil">
                <img src="../../assets/imagenes/perfil.png" alt="Perfil" width="50" height="50">
            </a>

            <div id="menuPerfil" class="menuDesplegable">
                <ul>
                    <li><a href="perfil.html">Ver perfil</a></li>
                    <li id="botonBloqueado"><a>Gestionar cuenta</a></li> <!-- Solo para administradores. -->
                    <li><a href="login.html">Cerrar sesión</a></li>
                </ul>
            </div>

        </div>

    </header>

    <div class="contenido">
        <div>
            <a href="index.php?controller=bodega&action=create" id="bCrear" class="botonGuardar">+ Crear cuenta</a> <!-- TODO : Poner imagen suma... -->
        </div>

        <div id="titulo">
            <h2>Registro / Edición</h2>
        </div>

        <!-- TODO : <form action="index.php?controller=user&action=registro" method="post"> -->
        <form id="formRegistro" action="#" method="post">
            <div id="datos">
                <div>
                    <label for="dni">DNI</label>
                    <input type="text" id="dni" name="dni" required>
                </div>

                <div>
                    <label>Administrador</label>
                    <input type="radio" id="adminSi" name="admin" value="1" required>Sí
                    <input type="radio" id="adminNo" name="admin" value="0" required>No
                </div>

                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div>
                    <label for="primerApellido">Primer apellido</label>
                    <input type="text" id="primerApellido" name="primerApellido" required>
                </div>

                <div>
                    <label for="segundoApellido">Segundo apellido</label>
                    <input type="text" id="segundoApellido" name="segundoApellido" required>
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div>
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" required>
                </div>

                <div>
                    <label for="usuario">Usuario</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>

                <div>
                    <label for="contrasena">Contraseña</label>
                    <input type="password" id="contrasena" name="contrasena" required>
                </div>

                <div>
                    <label for="repetirContrasena">Repita la contraseña</label>
                    <input type="password" id="repetirContrasena" name="repetirContrasena" required>
                </div>

            </div>

            <div id="botones">
                <!-- TODO : A este botón se le irá cambiando el "value" dependiendo de la acción seleccionada (crear / modificar). -->
                <input type="submit" id="bAccion" class="bAccion" value="">
            </div>
        </form>
    </div>

    <footer>

        <div class="d_telefonoEmpresa"><p>+34 945 01 01 10</p></div>

        <div class="d_direccionEmpresa">Dirección</div>

        <div class="d_botonesRS">
            <a href="https://www.facebook.com/Egibide/" class="botonRS">
                <img src="../../assets/imagenes/logo_facebook.png" alt="Facebook" width="40" height="40">
            </a>
            <a href="https://twitter.com/egibide?lang=es" class="botonRS">
                <img src="../../assets/imagenes/logo_x.png" alt="X (Twitter)" width="40" height="40">
            </a>
            <a href="https://www.youtube.com/user/Egibide" class="botonRS">
                <img src="../../assets/imagenes/logo_youtube.png" alt="YouTube" width="40" height="40">
            </a>
            <a href="https://www.instagram.com/egibide_vg/?hl=es" class="botonRS">
                <img src="../../assets/imagenes/logo_instagram.png" alt="Instagram" width="40" height="40">
            </a>
            <a href="https://es.linkedin.com/school/egibide/" class="botonRS">
                <img src="../../assets/imagenes/logo_linkedin.png" alt="LinkedIn" width="40" height="40">
            </a>
        </div>

        <div class="d_equipo">
            <p>Principal equipo desarrollador:</p>
            <img class="logo_equipo" src="../../assets/imagenes/logo_equipo2.png" alt="Logo Dev Dragons" width="110" height="110">
        </div>

    </footer>

</main>

<script src="../../assets/javascript/menuPerfil.js"></script>
<script src="../../assets/javascript/crearCuenta.js"></script>

</body>
</html>