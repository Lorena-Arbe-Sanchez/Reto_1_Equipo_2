<?php
$pageTitle = "Gestionar cuentas";
$bodyClass = "pag_gestionarCuenta";
$botonBloqueado = "l_botonCuentas";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";

$id = $dni = $nombre = $apellido1 = $apellido2 = $email = $telefono = $usuario = $contrasena = $administrador = "";

if(isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if(isset($dataToView["data"]["dni"])) $dni = $dataToView["data"]["dni"];
if(isset($dataToView["data"]["nombre"])) $nombre = $dataToView["data"]["nombre"];
if(isset($dataToView["data"]["apellido1"])) $apellido1 = $dataToView["data"]["apellido1"];
if(isset($dataToView["data"]["apellido2"])) $apellido2 = $dataToView["data"]["apellido2"];
if(isset($dataToView["data"]["email"])) $email = $dataToView["data"]["email"];
if(isset($dataToView["data"]["telefono"])) $telefono = $dataToView["data"]["telefono"];
if(isset($dataToView["data"]["usuario"])) $usuario = $dataToView["data"]["usuario"];
if(isset($dataToView["data"]["contrasena"])) $contrasena = $dataToView["data"]["contrasena"];
if(isset($dataToView["data"]["administrador"])) $administrador = $dataToView["data"]["administrador"];

$dniBuscar = "";

if(isset($dataToView["data"]["dniBuscar"])) $dniBuscar = $dataToView["data"]["dni"];
?>

<div class="contenido">

    <div id="titulo">
        <h2>Gestión de cuentas de usuarios</h2>
    </div>

    <div class="d_bCrear"><button id="bCrear">+ Crear cuenta</button></div>

    <?php if (isset($_GET['error']) && $_GET['error'] == 2): ?>
        <div id="mensajeErrorDNI" class="mensajeError">DNI o usuario ya creado</div>
    <?php elseif (isset($_GET['error']) && $_GET['error'] == 3):?>
        <div id="mensajeErrorEliminar" class="mensajeError">No puedes borrar la cuenta en la que has iniciado sesion</div>
    <?php elseif (isset($_GET['error']) && $_GET['error'] == 4):?>
        <div id="mensajeErrorEliminar" class="mensajeError">No hay nadie con ese DNI</div>
    <?php endif; ?>

    <!-- TODO : Repasar esto. -->
    <div class="mitades">
        <div class="mitad contenido1">

            <div class="busqueda">
                <form action="index.php?controller=usuario&action=buscar&dniBuscar=<?php echo $dniBuscar; ?>" method="get">
                    <input type="hidden" name="controller" value="usuario">
                    <input type="hidden" name="action" value="buscar">
                    <input type="text" name="dniBuscar" placeholder="Buscar por DNI." value="<?php echo $dniBuscar; ?>">
                    <input type="submit" id="bBuscar" value="Buscar">
                </form>
            </div>

            <?php

            // Si el array '$dataToView' del 'index.php' tiene filas (la función "cuentas()" del "UsuarioController" obtiene resultados), entonces se creará la tabla.
            if(count($dataToView["data"])>0){
                ?>

                <table class="tabla_cuentas">
                    <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Administrador</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach($dataToView["data"] as $cuenta){
                        // Comprobar que '$cuenta' es un array antes de acceder a las claves.
                        if (is_array($cuenta)) {

                            ?>
                            <tr>
                                <td><?php echo $cuenta['dni']; ?></td>
                                <td><?php echo $cuenta['nombre']; ?></td>
                                <td><?php echo $cuenta['email']; ?></td>
                                <td><?php echo ($cuenta['administrador'] == 1) ? 'SI' : 'NO'; ?></td> <!-- TODO : Poner que salga un tick o no. -->
                                <td>
                                    <!-- Con "Editar" mostrará los datos de esa cuenta.
                                        Con "Eliminar" se mostrará un mensaje de confirmación. -->
                                    <a href="index.php?controller=usuario&action=buscar&dniBuscar=<?php echo $cuenta['dni']; ?>"
                                       id="bEditar">Editar</a>
                                    <a href="index.php?controller=usuario&action=eliminar&dniEliminar=<?php echo $cuenta['dni']; ?>"
                                       id="bEliminar">Eliminar</a>
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

            <form id="formRegistro" action="index.php?controller=usuario&action=save" method="post">
                <div id="datos">
                    <div>
                        <label for="dni">DNI</label>
                        <input type="text" id="dni" name="dni" value="<?php echo $dni; ?>"  required>
                    </div>

                    <div>
                        <label>Administrador</label>
                        <input type="radio" id="si" name="administrador" value="si" >Sí
                        <input type="radio" id="no" name="administrador" value="no" checked>No
                    </div>

                    <div>
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
                    </div>

                    <div>
                        <label for="apellido1">Primer apellido</label>
                        <input type="text" id="apellido1" name="apellido1" value="<?php echo $apellido1; ?>" required>
                    </div>

                    <div>
                        <label for="apellido2">Segundo apellido</label>
                        <input type="text" id="apellido2" name="apellido2" value="<?php echo $apellido2; ?>"  required>
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email"  value="<?php echo $email; ?>" required>
                    </div>

                    <div>
                        <label for="telefono">Teléfono</label>
                        <input type="tel" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
                    </div>

                    <div>
                        <label for="usuario">Usuario</label>
                        <input type="text" id="usuario" name="usuario" value="<?php echo $usuario; ?>"  required>
                    </div>

                    <div>
                        <label for="contrasena">Contraseña</label>
                        <input type="password" id="contrasena" name="contrasena" value="<?php echo $contrasena; ?>"  required>
                    </div>

                    <div>
                        <label for="repetirContrasena">Repita la contraseña</label>
                        <input type="password" id="repetirContrasena" name="repetirContrasena" required>
                    </div>

                </div>

                <div class="d_botones">
                    <!-- TODO : A este botón se le irá cambiando el "value" dependiendo de la acción seleccionada ("Registrar" / "Modificar"). -->
                    <input type="submit" id="bCrear" class="bCrearRespuesta" value="Crear">
                    <a class="bVolver" href="">Cerrar</a>
                </div>

            </form>

        </div>

    </div>

</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/gestionarCuenta.js"></script>

</body>
</html>