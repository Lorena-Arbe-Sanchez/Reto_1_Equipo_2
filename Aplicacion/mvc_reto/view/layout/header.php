        <header>

            <div class="d_logo_empresa">
                <img class="logo_empresa" src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa.png" alt="Logo Aergibide SL"
                    width="190" height="90">
            </div>

            <div class="d_botonesHeader">

                <div class="d_botonForo" <?php if ($botonBloqueado == "d_botonForo") echo 'id="botonBloqueado"'; ?>>
                    <a href="index.php?controller=pregunta&action=foro" class="botonForo">Foro</a>
                </div>

                <!-- TODO : Poner un enlace correcto en los botones. -->
                <div class="d_botonPreguntas" <?php if ($botonBloqueado == "d_botonPreguntas") echo 'id="botonBloqueado"'; ?>>
                    <a href="index.php?controller=pregunta&action=frecuentes" class="botonPreguntas">Preguntas frecuentes</a>
                </div>

                <div class="d_botonCrear" <?php if ($botonBloqueado == "d_botonCrear") echo 'id="botonBloqueado"'; ?>>
                    <a href="index.php?controller=pregunta&action=crear" class="botonCrear">Crear pregunta</a>
                </div>

            </div>

            <!-- Botón del perfil con menú desplegable ~~> Posibles opciones ("Ver perfil", "Crear cuenta" {solo si el
                    usuario actual es "administrador"; 'TINYINT' con valor 1 para verdadero y 0 para falso}, y "Cerrar sesión"). -->

            <div class="d_botonPerfil">

                <a href="#" id="botonPerfil">
                    <img src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/perfil.png" alt="Perfil" width="50" height="50">
                </a>

                <!-- Menú desplegable -->
                <div id="menuPerfil" class="menuDesplegable">
                    <ul>
                        <li class="l_botonPerfil" <?php if ($botonBloqueado == "l_botonPerfil") echo 'id="botonBloqueado"'; ?>>
                            <a href="index.php?controller=usuario&action=perfil">Ver perfil</a>
                        </li>
                        <!-- Solo para administradores la opción de gestionar cuentas. -->
                        <li id="opcionCrearCuenta" class="l_botonCuentas" <?php if ($botonBloqueado == "l_botonCuentas") echo 'id="botonBloqueado"'; ?>>
                            <a href="index.php?controller=usuario&action=cuentas">Gestionar cuentas</a>
                        </li>
                        <li><a href="index.php?controller=usuario&action=login">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>

        </header>