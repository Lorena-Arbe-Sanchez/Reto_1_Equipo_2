-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- phpMyAdmin Adaptado
-- --------------------------------------------------------

-- Desactivar temporalmente las comprobaciones de claves foráneas y otros ajustes.
SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
SET NAMES utf8mb4;

-- Crear la base de datos y seleccionarla.
CREATE DATABASE IF NOT EXISTS `grupo2_2425` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `grupo2_2425`;

-- Crear la tabla `preguntas`
CREATE TABLE IF NOT EXISTS `preguntas` (
                                           `id` int NOT NULL AUTO_INCREMENT,
                                           `titulo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `tema` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `fecha` date NOT NULL,
    `id_usuario` int NOT NULL,
    `archivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `votosLike` int DEFAULT NULL,
    `votosDislike` int DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `PREG_ID_USU_FK` (`id_usuario`),
    CONSTRAINT `PREG_ID_USU_FK` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla `respuestas`
CREATE TABLE IF NOT EXISTS `respuestas` (
                                            `id` int NOT NULL AUTO_INCREMENT,
                                            `solucion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
    `archivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `votosLike` int DEFAULT NULL,
    `votosDislike` int DEFAULT NULL,
    `id_pregunta` int NOT NULL,
    `id_usuario` int NOT NULL,
    `fecha` date NOT NULL,
    PRIMARY KEY (`id`),
    KEY `RESP_ID_PREG_FK` (`id_pregunta`),
    KEY `RESP_ID_USU_FK` (`id_usuario`),
    CONSTRAINT `RESP_ID_PREG_FK` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE,
    CONSTRAINT `RESP_ID_USU_FK` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla `usuarios`
CREATE TABLE IF NOT EXISTS `usuarios` (
                                          `id` int NOT NULL AUTO_INCREMENT,
                                          `administrador` tinyint(1) NOT NULL,
    `dni` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
    `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `apellido1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `apellido2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `telefono` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `contrasena` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `dni` (`dni`),
    UNIQUE KEY `usuario` (`usuario`)
    ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Restaurar las comprobaciones de claves foráneas y otros ajustes.
SET FOREIGN_KEY_CHECKS=1;