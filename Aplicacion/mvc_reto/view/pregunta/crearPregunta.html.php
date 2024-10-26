<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear pregunta</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="icon" type="image/png" href="../../assets/imagenes/icono_avion.png">

</head>
<body class="pag_crearPregunta">

        <header>

            <div class="d_logo_empresa">
                <img class="logo_empresa" src="../../assets/imagenes/logo_empresa.png" alt="Logo Aergibide SL"
                     width="190" height="90">
            </div>

            <div class="d_botonesHeader">

                <div class="d_botonForo"><a href="foro.html" class="botonForo">Foro</a></div>

                <!-- TODO : Enlace. -->
                <div class="d_botonPreguntas"><a href="#" class="botonPreguntas">Preguntas frecuentes</a></div>

                <div class="d_botonCrear" id="botonBloqueado"><a class="botonCrear">Crear pregunta</a></div>

            </div>

            <div class="d_botonPerfil">

                <a href="#" id="botonPerfil">
                    <img src="../../assets/imagenes/perfil.png" alt="Perfil" width="50" height="50">
                </a>

                <div id="menuPerfil" class="menuDesplegable">
                    <ul>
                        <li><a href="perfil.html">Ver perfil</a></li>
                        <li id="opcionCrearCuenta"><a href="crearCuenta.html">Gestionar cuentas</a></li> <!-- Solo para administradores. -->
                        <li><a href="login.html">Cerrar sesión</a></li>
                    </ul>
                </div>

            </div>

        </header>

        <div class="contenido">

            <div id="titulo">
                <h2>Creación de pregunta</h2>
            </div>
            <!-- TODO : <form action="index.php?controller=pregunta&action=create" method="post"> -->
            <form id="formCrearPregunta" action="foro.html" method="post">

                <div>
                    <label for="enunciado">Enunciado</label>
                    <input type="text" id="enunciado" name="enunciado" required>
                </div>
                <div>
                    <label for="tema">Tema</label>
                    <select name="tema" id="tema" required>
                        <option>Seleccionar opción</option>
                        <option value="diseno_aeronaves">Diseño y Desarrollo de Aeronaves</option>
                        <option value="fabricacion_produccion">Fabricación y Producción</option>
                        <option value="mantenimiento_operaciones">Mantenimiento y Operaciones</option>
                        <option value="innovacion_sostenibilidad">Innovación y Sostenibilidad</option>
                        <option value="certificaciones_reglamentacion">Certificaciones y Reglamentación</option>
                        <option value="problemas_tecnicos">Problemas Técnicos y Soluciones</option>
                        <option value="colaboracion_interdepartamental">Colaboración Interdepartamental</option>
                        <option value="software_herramientas">Software y Herramientas de Ingeniería</option>
                        <option value="gestion_conocimiento">Gestión del Conocimiento</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
                <div>
                    <label for="descripcion">Descripción</label>
                    <input type="text" id="descripcion" name="descripcion" required>
                </div>

                <input type="submit" id="bCrearPregunta" class="bCrearPregunta" value="Crear pregunta">
                <a href="foro.html" class="bVolver">Cancelar</a>

            </form>

        </div>

        <?php require_once "../layout/footer.php"; ?>

    <script src="../../assets/javascript/crearPregunta.js"></script>

</body>
</html>