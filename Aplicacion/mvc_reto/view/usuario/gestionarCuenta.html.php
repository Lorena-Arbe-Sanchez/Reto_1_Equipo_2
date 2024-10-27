<?php
$pageTitle = "Gestionar cuentas";
$bodyClass = "pag_gestionarCuenta";
$botonBloqueado = "l_botonCuentas";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";
?>

    <div class="contenido">

        <div id="titulo">
            <h2>Gestión de cuentas de usuarios</h2>
        </div>

        <div class="d_bCrear"><button id="bCrear">+ Crear cuenta</button></div> <!-- TODO : Poner imagen suma... -->

        <div class="mitades">

            <div class="mitad contenido1">

                <!-- TODO : Comprobar que sea así como se pone una caja de búsqueda + implementar. -->
                <div class="busqueda">
                    <form method="GET" action="index.php?controller=usuario&action=recuperarContra">
                        <input type="text" name="search" placeholder="Buscar por DNI, Nombre, Email..."
                               value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <input type="submit" value="Buscar">
                    </form>
                </div>

                <?php
                // Si el array '$dataToView' del 'index.php' tiene filas (la función "list()" del "UserController" obtiene resultados), entonces se creará la tabla.
                // TODO : Poner bien el '$dataToView'.
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
                                        <a href="index.php?controller=usuario&action=view&id=<?php echo $cuenta['id']; ?>"
                                           id="bEditar">Editar</a>
                                        <a href="index.php?controller=usuario&action=confirmDelete&id=
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

                <!-- TODO : <form action="index.php?controller=usuario&action=registro" method="post"> -->
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

    <?php require_once __DIR__ . "/../layout/footer.php"; ?>

    <script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/gestionarCuenta.js"></script>

</body>
</html>