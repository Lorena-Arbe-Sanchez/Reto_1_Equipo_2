<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../assets/imagenes/icono_avion.png">
</head>
<body class="pag_perfil">

    <main>

        <header>

            <div class="d_logo_empresa">
                <img class="logo_empresa" src="../assets/imagenes/logo_empresa.png" alt="Logo Aergibide SL"
                     width="190" height="90">
            </div>

            <div class="d_botonesHeader">

                <div class="d_botonForo"><a href="foro.html" class="botonForo">Foro</a></div>

                <!-- TODO : Enlace. -->
                <div class="d_botonPreguntas"><a href="#" class="botonPreguntas">Preguntas frecuentes</a></div>

                <div class="d_botonCrear"><a href="crearPregunta.html" class="botonCrear">Crear pregunta</a></div>

            </div>

            <div class="d_botonPerfil">

                <a href="#" id="botonPerfil">
                    <img src="../assets/imagenes/perfil.png" alt="Perfil" width="50" height="50">
                </a>

                <div id="menuPerfil" class="menuDesplegable">
                    <ul>
                        <li id="botonBloqueado"><a href="#">Ver perfil</a></li>
                        <li id="opcionCrearCuenta"><a href="crearCuenta.html">Crear cuenta</a></li> <!-- Solo para administradores. -->
                        <li><a href="login.html">Cerrar sesión</a></li>
                    </ul>
                </div>

            </div>

        </header>


        <div class="contenido">

            <div class="foto">
                <img src="../assets/imagenes/perfil.png" alt="Imagen perfil">

                <form>
                    <button id="anadirImg">+ Añadir imagen</button>
                </form>
            </div>

            <div class="info">

                <div class="usuarioDiv">
                    <label for="usuario">Usuario</label>
                    <input type="text" id="usuario" name="usuario" readonly>
                </div>
                <div class="nombreDiv">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" readonly>
                </div>
                <div class="primerApeDiv">
                    <label for="primerApellido">Primer apellido</label>
                    <input type="text" id="primerApellido" name="primerApellido" readonly>
                </div>
                <div class="segundoApeDiv">
                    <label for="segundoApellido">Segundo apellido</label>
                    <input type="text" id="segundoApellido" name="segundoApellido" readonly>
                </div>
                <div class="dniDiv">
                    <label for="DNI">DNI</label>
                    <input type="text" id="DNI" name="DNI" readonly>
                </div>
                <div class="telefonoDiv">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" readonly>
                </div>
                <div class="emailDiv">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" readonly>
                </div>

            </div>

        </div>


        <footer>

            <div class="d_telefonoEmpresa"><p>+34 945 01 01 10</p></div>

            <div class="d_direccionEmpresa">Dirección: C/ Pozoa s/n (01013)</div>

            <div class="d_botonesRS">
                <a href="https://www.facebook.com/Egibide/" class="botonRS">
                    <img src="../assets/imagenes/logo_facebook.png" alt="Facebook" width="40" height="40">
                </a>
                <a href="https://twitter.com/egibide?lang=es" class="botonRS">
                    <img src="../assets/imagenes/logo_x.png" alt="X (Twitter)" width="40" height="40">
                </a>
                <a href="https://www.youtube.com/user/Egibide" class="botonRS">
                    <img src="../assets/imagenes/logo_youtube.png" alt="YouTube" width="40" height="40">
                </a>
                <a href="https://www.instagram.com/egibide_vg/?hl=es" class="botonRS">
                    <img src="../assets/imagenes/logo_instagram.png" alt="Instagram" width="40" height="40">
                </a>
                <a href="https://es.linkedin.com/school/egibide/" class="botonRS">
                    <img src="../assets/imagenes/logo_linkedin.png" alt="LinkedIn" width="40" height="40">
                </a>
            </div>

            <div class="d_equipo">
                <p>Principal equipo desarrollador:</p>
                <img class="logo_equipo" src="../assets/imagenes/logo_equipo2.png" alt="Logo Dev Dragons"
                     width="110" height="110">
            </div>

        </footer>

    </main>

    <script src="../assets/javascript/menuPerfil.js"></script>

</body>
</html>