<?php
$pageTitle = "Crear pregunta";
$bodyClass = "pag_crearPregunta";
$botonBloqueado = "d_botonCrear";
$conMenu = true;
require_once __DIR__ . "/../layout/header.php";
?>

<div class="contenido">

    <div id="divTitulo">
        <h2>Creación de pregunta</h2>
    </div>
    <form id="formCrearPregunta" action="index.php?controller=pregunta&action=save" method="post">

        <div>
            <label for="titulo">Titulo</label>
            <textarea id="titulo" name="titulo" maxlength="100" required></textarea>
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
                <option value="otro">Otro tema</option>
            </select>
        </div>
        <div>
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" maxlength="100" required></textarea>
        </div>
        <!-- TODO : AÑADIR OPCIÓN DE "ARCHIVO" -->
        <div class="d_botones">
            <input type="submit" id="bCrearPregunta" class="bCrearPregunta" value="Crear pregunta">
            <a href="index.php?controller=pregunta&action=misPregunta" class="bVolver">Cancelar</a>
        </div>

    </form>

</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

<script src="/Proyecto1/Reto_1_Equipo_2/Aplicacion/mvc_reto/assets/javascript/crearPregunta.js"></script>

</body>
</html>



<!-- TODO : Aplicar.

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación de pregunta - Aergibide SL</title>
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-dark: #4f46e5;
            --secondary-color: #f3f4f6;
            --text-color: #374151;
            --border-color: #d1d5db;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--secondary-color);
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 1rem 0;
            position: relative;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            height: 40px;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav ul li {
            margin-left: 1.5rem;
        }

        nav ul li a {
            text-decoration: none;
            color: var(--text-color);
            font-weight: 500;
        }

        .user-icon {
            background-color: var(--primary-color);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        main {
            padding: 2rem 0;
        }

        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 2rem;
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 1rem;
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23374151'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 1.5em;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        button {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"] {
            background-color: var(--primary-color);
            color: white;
        }

        button[type="submit"]:hover {
            background-color: var(--primary-dark);
        }

        button[type="button"] {
            background-color: #fff;
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }

        button[type="button"]:hover {
            background-color: var(--secondary-color);
        }

        footer {
            background-color: #1f2937;
            color: #fff;
            padding: 2rem 0;
            margin-top: 2rem;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .footer-info,
        .footer-social,
        .footer-dev {
            margin: 1rem 0;
        }

        .footer-social a {
            color: #fff;
            margin-right: 1rem;
            font-size: 1.5rem;
            text-decoration: none;
        }

        .footer-dev img {
            height: 30px;
            margin-left: 0.5rem;
            vertical-align: middle;
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }

            nav {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background-color: #fff;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                display: none;
            }

            nav.active {
                display: block;
            }

            nav ul {
                flex-direction: column;
                padding: 1rem 0;
            }

            nav ul li {
                margin: 0;
                text-align: center;
            }

            nav ul li a {
                display: block;
                padding: 0.5rem 0;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
            }

            .footer-social,
            .footer-dev {
                margin-top: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container header-content">
            <img src="https://via.placeholder.com/120x40" alt="Aergibide SL Logo" class="logo">
            <button class="menu-toggle" aria-label="Abrir menú">☰</button>
            <nav>
                <ul>
                    <li><a href="#">Foro</a></li>
                    <li><a href="#">Preguntas frecuentes</a></li>
                    <li><a href="#" style="color: var(--primary-color);">Crear pregunta</a></li>
                </ul>
            </nav>
            <div class="user-icon">U</div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="form-container">
                <h1>Creación de pregunta</h1>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="topic">Tema</label>
                        <select id="topic" name="topic" required>
                            <option value="">Seleccionar opción</option>
                            <option value="general">General</option>
                            <option value="technical">Técnico</option>
                            <option value="support">Soporte</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea id="description" name="description" required></textarea>
                    </div>
                    <div class="button-group">
                        <button type="button">Cancelar</button>
                        <button type="submit">Crear pregunta</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <div class="container footer-content">
            <div class="footer-info">
                <p>+34 945 01 01 10</p>
                <p>C/ Pozoa s/n (01013)</p>
            </div>
            <div class="footer-social">
                <a href="#" aria-label="Facebook">&#xf09a;</a>
                <a href="#" aria-label="Twitter">&#xf099;</a>
                <a href="#" aria-label="YouTube">&#xf16a;</a>
                <a href="#" aria-label="Instagram">&#xf16d;</a>
                <a href="#" aria-label="LinkedIn">&#xf0e1;</a>
            </div>
            <div class="footer-dev">
                <span>Principal equipo desarrollador:</span>
                <img src="https://via.placeholder.com/40x30" alt="Dev Dragons Logo">
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const nav = document.querySelector('nav');

            menuToggle.addEventListener('click', function() {
                nav.classList.toggle('active');
            });
        });
    </script>
</body>
</html>

-->