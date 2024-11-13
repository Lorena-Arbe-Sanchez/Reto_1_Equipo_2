<!--
Archivo de configuración para la conexión a la base de datos de la aplicación.

Dependiendo del entorno utilizado (servidor local con Laragon o acceso remoto mediante
phpMyAdmin), será necesario ajustar algunas líneas de código para establecer la conexión
correcta con la base de datos.
-->

<?php

// Para la BD de Laragon:
define("DB_HOST", "localhost");

// Para la BD de phpMyAdmin en el aula:
//define("DB_HOST", "172.20.227.241");

// Para la BD de phpMyAdmin fuera del aula:
// TODO
//define("DB_HOST", "");

// Nombre de la base de datos: "grupo2_2425".
define("DB", "grupo2_2425");

// Para Laragon:
define("DB_USER", "root");

// Para phpMyAdmin:
//define("DB_USER", "grupo2_2425");

// Para Laragon:
define("DB_PASS", "");

// Para phpMyAdmin:
//define("DB_PASS", "Rn/AjQi[jgh5pxxz");

// Controlador que entra por defecto.
define("DEFAULT_CONTROLLER", "Usuario");

// Acción de inicio.
define("DEFAULT_ACTION", "login");

// Número por defecto de elementos que van a ir por página (como máximo).
define("PAGINATION", 3);

?>