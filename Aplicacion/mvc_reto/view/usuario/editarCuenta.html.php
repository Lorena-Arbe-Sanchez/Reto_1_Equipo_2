<?php
$pageTitle = "Gestionar cuentas";
$bodyClass = "pag_gestionarCuenta";
$botonBloqueado = "l_botonCuentas";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";

$id =$dni = $nombre = $apellido1 = $apellido2 = $email = $telefono = $usuario = $contrasena = $administrador ="";

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



?>
<div class="contenido">

    <div id="titulo">
        <h2>Gestión de cuentas de usuarios</h2>
    </div>


    <div class="mitades">

        <div  class="mitad contenido3">

            <form id="formRegistro" action="index.php?controller=usuario&action=editar" method="post">
                <div id="datos">
                    <div>
                        <label for="dni">DNI</label>
                        <input type="text" id="dni" name="dni" value="<?php echo $dni; ?>" readonly>
                    </div>

                    <div>
                        <label>Administrador</label>
                        <input type="radio" id="si" name="administrador" value="1" <?php echo ($administrador == 1) ? 'checked' : '';?>>Sí
                        <input type="radio" id="no" name="administrador" value="0"  <?php echo ($administrador == 0) ? 'checked' : '';?>>No
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
                        <input type="text" id="apellido2" name="apellido2" value="<?php echo $apellido2; ?>" required>
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
                    </div>

                    <div>
                        <label for="telefono">Teléfono</label>
                        <input type="tel" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
                    </div>

                    <div>
                        <label for="usuario">Usuario</label>
                        <input type="text" id="usuario" name="usuario" value="<?php echo $usuario; ?>" required>
                    </div>

                    <div>
                        <label for="contrasena">Contraseña</label>
                        <input type="password" id="contrasena" name="contrasena" value="<?php echo $contrasena; ?>" required>
                    </div>

                    <div>
                        <label for="repetirContrasena">Repita la contraseña</label>
                        <input type="password" id="repetirContrasena" name="repetirContrasena" value="<?php echo $contrasena; ?>" required>
                    </div>

                </div>

                <div id="botones">
                    <input type="submit" id="bModificar" class="bModificar" value="Modificar">
                </div>

                <a href="index.php?controller=usuario&action=cuentas" >Volver</a>

            </form>

        </div>

    </div>

</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/gestionarCuenta.js"></script>

</body>
</html>