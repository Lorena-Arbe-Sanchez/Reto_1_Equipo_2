-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para grupo2_2425
CREATE DATABASE IF NOT EXISTS `grupo2_2425` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `grupo2_2425`;

-- Volcando estructura para tabla grupo2_2425.preguntas
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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla grupo2_2425.respuestas
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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla grupo2_2425.usuarios
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

-- La exportación de datos fue deseleccionada.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;