<!-- TODO
Va a haber que poner una variable de "$title" en "<title>" para los títulos de las páginas que van cambiando.
También se le pasará una variable llamada "botonBloqueado" para que controle la página actual el en menú del header.
-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,
        minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aergibide</title>
    <!-- TODO : ¿ "../../assets/css/style.css" ? -->
    <link rel="stylesheet" href="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/css/style.css">
    <link rel="icon" type="image/png" href="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/icono_avion.png">
</head>
<body>
    <main>
        <header>

            <div class="d_logo_empresa">
                <img class="logo_empresa" src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa.png" alt="Logo Aergibide SL"
                    width="190" height="90">
            </div>

            <div class="d_botonesHeader">

                <div class="d_botonForo" id="botonBloqueado"><a class="botonForo">Foro</a></div>

                <!-- TODO : Poner un enlace correcto en los botones. -->
                <div class="d_botonPreguntas"><a href="#" class="botonPreguntas">Preguntas frecuentes</a></div>

                <div class="d_botonCrear"><a href="crearPregunta.html" class="botonCrear">Crear pregunta</a></div>

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
                        <li><a href="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/view/perfil.html">Ver perfil</a></li>
                        <li id="opcionCrearCuenta"><a href="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/view/crearCuenta.html">Gestionar cuentas</a></li> <!-- Solo para administradores. -->
                        <li><a href="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/view/login.html">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>

        </header>

    <!-- TODO : Cambiar. -->