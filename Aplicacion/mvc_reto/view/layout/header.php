<!DOCTYPE html>
<html lang="es">
<head>
    <!-- TODO : Poner bien los "meta" de todas las páginas (propiedades funcionales). -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Variable "$pageTitle" para los títulos de las páginas que van cambiando. -->
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Aergibide SL'; ?></title>
    <link rel="stylesheet" href="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/css/style.css">
    <!-- Poner un favicon (icono en la pestaña de una página web). -->
    <!-- TODO : PONER EL DEL MONIGOTE CREADO -->
    <link rel="icon" type="image/png"
          href="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/icono_empresa.png">

    <!-- TODO : Mirar por qué en el 'style.css' no funciona y moverlo.  -->
    <style>
        /* Estilos de la página del perfil. */

        .tabla_cuentas{
            width: 100%;
            overflow-x: auto; /* Añadirá scroll horizontal si el contenido de la tabla se desborda. */
            border-collapse: collapse;
            margin: 2em;
        }

        .tabla_cuentas th, .tabla_cuentas td{
            border: 1px solid black;
            padding: .8em;
            white-space: nowrap; /* Evita que el contenido se divida en varias líneas. */
        }

        .tabla_cuentas th{
            background-color: gainsboro;
        }

        .tabla_cuentas td{
            background-color: white;
        }

        /*
        .pag_gestionarCuenta .mitad{
            width: auto;
        }
        */

        #bEditar{
            color: deepskyblue;
            background-color: white;
            border: 1px solid deepskyblue;
            padding: .5em;
            margin: .2em 0;
            border-radius: 10px;
        }
        #bEditar::before {
            content: '';
            display: inline-block;
            width: 16px;
            height: 16px;
            background-image: url(/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/editar.png);
            background-size: contain;
            background-repeat: no-repeat;
            margin-right: .5em;
            vertical-align: middle;
        }

        #bEliminar{
            color: lightcoral;
            background-color: white;
            border: 1px solid lightcoral;
            padding: .5em;
            margin: .2em  0;
            border-radius: 10px;
        }
        #bEliminar::before {
            content: '';
            display: inline-block;
            width: 16px;
            height: 16px;
            background-image: url(/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/eliminar.png);
            background-size: contain;
            background-repeat: no-repeat;
            margin-right: .5em;
            vertical-align: middle;
        }

        .tabla_cuentas a{
            text-decoration: none;
        }

        .tabla_cuentas #bEliminar{
            margin-left: .5em;
        }
    </style>

</head>
<body class="<?php echo isset($bodyClass) ? $bodyClass : 'defaultBodyClass'; ?>">

<?php if ($conMenu): ?>

<header>

    <div class="d_logo_empresa">
        <img class="logo_empresa"
             src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa.png"
             alt="Logo Aergibide SL" width="190" height="90">
    </div>

    <div class="d_botonesHeader">

        <div class="d_botonForo" <?php if ($botonBloqueado == "d_botonForo") echo 'id="botonBloqueado"'; ?>>
            <a href="index.php?controller=pregunta&action=foro" class="botonForo">Foro</a>
        </div>

        <!-- TODO : Poner un enlace correcto en los botones. -->
        <div class="d_botonPreguntasFrecuentes" <?php if ($botonBloqueado == "d_botonPreguntasFrecuentes") echo 'id="botonBloqueado"'; ?>>
            <a href="index.php?controller=pregunta&action=frecuentes" class="botonPreguntas">Preguntas frecuentes</a>
        </div>

        <div class="d_misPreguntas" <?php if ($botonBloqueado == "d_botonMisPreguntas") echo 'id="botonBloqueado"'; ?>>
            <a href="index.php?controller=pregunta&action=misPregunta" class="botonCrear">Mis preguntas</a>
        </div>

    </div>

    <!-- Botón del perfil con menú desplegable ~~> Posibles opciones ("Ver perfil", "Crear cuenta" {solo si el
            usuario actual es "administrador"; 'TINYINT' con valor 1 para verdadero y 0 para falso}, y "Cerrar sesión"). -->

    <div class="d_botonPerfil">

        <a href="#" id="botonPerfil">
            <img src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/perfil.png" alt="Perfil"
                 width="50" height="50">
        </a>

        <!-- Menú desplegable -->
        <div id="menuPerfil" class="menuDesplegable">
            <ul>
                <li class="l_botonPerfil" <?php if ($botonBloqueado == "l_botonPerfil") echo 'id="botonBloqueado"'; ?>>
                    <a href="index.php?controller=usuario&action=perfil">Ver perfil</a>
                </li>
                <!-- Solo para administradores la opción de gestionar cuentas. -->
                <li id="opcionCrearCuenta" class="l_botonCuentas"
                    <?php if ($botonBloqueado == "l_botonCuentas") echo 'id="botonBloqueado"'; ?>>
                    <a href="index.php?controller=usuario&action=cuentas">Gestionar cuentas</a>
                </li>
                <li>
                    <a href="index.php?controller=usuario&action=login">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>

</header>

<?php endif; ?>