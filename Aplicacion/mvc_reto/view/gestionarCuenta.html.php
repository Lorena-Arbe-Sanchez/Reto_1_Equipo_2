<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar cuentas</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" type="image/png" href="../assets/imagenes/icono_avion.png">
</head>
<body class="pag_gestionarCuenta">
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
                    <li><a href="perfil.html">Ver perfil</a></li>
                    <li id="botonBloqueado"><a>Gestionar cuentas</a></li>
                    <li><a href="login.html">Cerrar sesión</a></li>
                </ul>
            </div>

        </div>

    </header>

    <div class="contenido">

        <div id="titulo">
            <h2>Gestión de cuentas de usuarios</h2>
        </div>

        <div class="d_bCrear"><button id="bCrear">+ Crear cuenta</button></div> <!-- TODO : Poner imagen suma... -->

        <div class="mitades">

            <div class="mitad contenido1">

                <!-- TODO : Comprobar que sea así como se pone una caja de búsqueda + implementar. -->
                <div class="busqueda">
                    <form method="GET" action="index.php">
                        <input type="text" name="search" placeholder="Buscar por DNI, Nombre, Email..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <input type="submit" value="Buscar">
                    </form>
                </div>

                <?php
                // Si el array '$dataToView' del 'index.php' tiene filas (la función "list()" del "UserController" obtiene resultados), entonces se creará la tabla.
                if(count($dataToView["data"])>0){
                ?>
                    <table>
                        <thead>
                        <tr>
                            <th>Administrador</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php
                        foreach($dataToView["data"] as $cuenta){
                            // Comprobar que '$cuenta' es un array antes de acceder a las claves.
                            if (is_array($cuenta)) {
                        ?>
                                <tr>
                                    <td><?php echo $cuenta['administrador']; ?></td>
                                    <td><?php echo $cuenta['dni']; ?></td>
                                    <td><?php echo $cuenta['nombre']; ?></td>
                                    <td><?php echo $cuenta['email']; ?></td>
                                    <td><?php echo $cuenta['usuario']; ?></td>
                                    <td><?php echo $cuenta['contrasena']; ?></td>
                                    <td>
                                        <!-- Con "Editar" mostrará los datos de esa cuenta.
                                            Con "Eliminar" se mostrará un mensaje de confirmación. -->
                                        <a href="index.php?controller=user&action=view&id=<?php echo $cuenta['id']; ?>"
                                           id="bEditar">Editar</a>
                                        <a href="index.php?controller=user&action=confirmDelete&id=
                                            <?php echo $cuenta['id']; ?>" id="bEliminar">Eliminar</a>
                                    </td>
                                </tr>

                        <?php
                            }
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
                        Actualmente no hay cuentas registradas.
                    </div>

                <?php
                }
                ?>

            </div>

            <div id="contenedor2" class="mitad contenido2">

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
                        <!-- A este botón se le irá cambiando el "value" dependiendo de la acción seleccionada ("Registrar" / "Modificar"). -->
                        <input type="submit" id="bAccion" class="bAccion" value="">
                    </div>
                </form>

            </div>

        </div>


    </div>

    <footer>

        <div class="d_telefonoEmpresa"><p>+34 945 01 01 10</p></div>

        <div class="d_direccionEmpresa">Dirección</div>

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
            <img class="logo_equipo" src="../assets/imagenes/logo_equipo2.png" alt="Logo Dev Dragons" width="110" height="110">
        </div>

    </footer>

</main>

<script src="../assets/javascript/menuPerfil.js"></script>
<script src="../assets/javascript/gestionarCuenta.js"></script>

</body>
</html>