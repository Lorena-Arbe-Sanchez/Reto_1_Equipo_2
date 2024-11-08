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
    <link rel="icon" type="image/png"
          href="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/icono_empresa.png">
</head>

<body class="<?php echo isset($bodyClass) ? $bodyClass : 'defaultBodyClass'; ?>">

<?php if ($conMenu): ?>

<header>

    <div class="d_logo_empresa">
        <!-- La imagen del logo de la empresa será un enlace que redirigirá al foro. -->
        <a href="index.php?controller=pregunta&action=list_paginated">
            <img class="logo_empresa"
                 src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/logo_empresa_conFondo.png"
                 alt="Logo Aergibide SL" width="260" height="114">
        </a>
    </div>

    <!-- Opción oculta que se mostrará cuando la pantalla empequeñezca para almacenar los 3 enlaces del header. -->
    <div><button class="menu-toggle" aria-label="Abrir menú">☰</button></div>

    <div class="d_botonesHeader">

        <div class="d_botonForo" <?php if ($botonBloqueado == "d_botonForo") echo 'id="botonBloqueado"'; ?>>
            <a href="index.php?controller=pregunta&action=list_paginated" class="botonForo">Foro</a>
        </div>

        <!-- TODO : Poner un enlace correcto en los botones. -->
        <div class="d_botonPreguntas" <?php if ($botonBloqueado == "d_botonPreguntas") echo 'id="botonBloqueado"'; ?>>
            <a href="index.php?controller=pregunta&action=frecuentes" class="botonPreguntas">Preguntas frecuentes</a>
        </div>

        <div class="d_botonMisPreguntas" <?php if ($botonBloqueado == "d_botonMisPreguntas") echo 'id="botonBloqueado"'; ?>>
            <a href="index.php?controller=pregunta&action=misPreguntas" class="botonCrear">Mis publicaciones</a>
        </div>

    </div>

    <!-- Opción de modo claro-oscuro.
    Botón del perfil con menú desplegable ~~> Posibles opciones ("Ver perfil", "Gestionar cuentas" {solo si el
    usuario actual es "administrador"; 'TINYINT' con valor 1 para verdadero y 0 para falso}, y "Cerrar sesión"). -->

    <div class="d_botonPerfil">

        <button class="theme-toggle" aria-label="Cambiar tema">☀️</button>

        <a href="#" id="botonPerfil">
            <img src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/imagenes/perfil.png"
                 class="icono_perfil" alt="Perfil"
                 width="50" height="50">
        </a>

        <!-- Menú desplegable -->
        <div id="menuPerfil" class="menuDesplegable">
            <ul>
                <li class="l_botonPerfil" <?php if ($botonBloqueado == "l_botonPerfil") echo 'id="botonBloqueado"'; ?>>
                    <a href="index.php?controller=usuario&action=perfil">Ver perfil</a>
                </li>
                <!-- Solo para administradores la opción de gestionar cuentas. -->
                <li id="opcionGestionarCuenta" class="l_botonCuentas"
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

<?php else: ?>

<header>
    <div class="container">
        <button class="theme-toggle" aria-label="Cambiar tema">☀️</button>
    </div>
</header>

<?php endif; ?>