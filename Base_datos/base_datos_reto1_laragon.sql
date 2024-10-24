SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Base de datos: `grupo2_2425`
CREATE DATABASE IF NOT EXISTS `grupo2_2425` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `grupo2_2425`;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `preguntas`
DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE `preguntas` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(100) NOT NULL,
  `descripcion` VARCHAR(100) NOT NULL,
  `tema` VARCHAR(100) NOT NULL,
  `fecha` DATE NOT NULL,
  `id_usuario` INT(4) NOT NULL,
  `archivo` VARCHAR(255) DEFAULT NULL,
  `votosLike` INT(3) DEFAULT NULL,
  `votosDislike` INT(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `PREG_ID_USU_FK` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `respuestas`
DROP TABLE IF EXISTS `respuestas`;
CREATE TABLE `respuestas` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `solucion` VARCHAR(200) NOT NULL,
  `archivo` VARCHAR(255) DEFAULT NULL,
  `votosLike` INT(3) DEFAULT NULL,
  `votosDislike` INT(3) DEFAULT NULL,
  `id_pregunta` INT(10) NOT NULL,
  `id_usuario` INT(4) NOT NULL,
  `fecha` DATE NOT NULL,
  PRIMARY KEY (`id`),
  KEY `RESP_ID_PREG_FK` (`id_pregunta`),
  KEY `RESP_ID_USU_FK` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `usuarios`
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` INT(4) NOT NULL AUTO_INCREMENT,
  `administrador` TINYINT(1) NOT NULL,
  `dni` VARCHAR(9) NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  `apellido1` VARCHAR(50) NOT NULL,
  `apellido2` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `telefono` VARCHAR(9) DEFAULT NULL,
  `usuario` VARCHAR(50) NOT NULL,
  `contrasena` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dni` (`dni`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

-- Restricciones para tablas volcadas
ALTER TABLE `preguntas`
  ADD CONSTRAINT `PREG_ID_USU_FK` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

ALTER TABLE `respuestas`
  ADD CONSTRAINT `RESP_ID_PREG_FK` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `RESP_ID_USU_FK` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
