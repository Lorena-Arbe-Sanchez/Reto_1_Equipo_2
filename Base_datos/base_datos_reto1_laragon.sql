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

-- Volcando estructura para tabla grupo2_2425.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
    `id` int NOT NULL AUTO_INCREMENT,
    `administrador` tinyint(1) NOT NULL,
    `dni` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `apellido1` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `apellido2` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `telefono` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `contrasena` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `dni` (`dni`),
    UNIQUE KEY `usuario` (`usuario`)
    ) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo2_2425.usuarios: ~30 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `administrador`, `dni`, `nombre`, `apellido1`, `apellido2`, `email`, `telefono`,
                        `usuario`, `contrasena`, `imagen`)
VALUES
    (1, 1, '12345678Z', 'Ana', 'Pérez', 'García', 'ana.perez@aergibide.com', '600123456', 'aperez', 'Admin123', './uploads/672c7a2cc8383_6729f9de2cca2_OIP.jpg'),
    (2, 1, '12345679N', 'Carlos', 'Lopez', 'Martínez', 'carlos.lopez@aergibide.com', NULL, 'clopez', 'Pass1234', NULL),
    (3, 1, '12345680M', 'Beatriz', 'Ruiz', 'Fernández', 'beatriz.ruiz@aergibide.com', '600345678', 'bruiz', 'Secure45', NULL),
    (4, 1, '12345681L', 'David', 'Sánchez', 'Hernández', 'david.sanchez@aergibide.com', NULL, 'dsanchez', 'Key12345', NULL),
    (5, 1, '12345682K', 'Elena', 'Gómez', 'Jiménez', 'elena.gomez@aergibide.com', '600567890', 'egomez', 'PassW0rd', NULL),
    (6, 0, '98765432T', 'Juan', 'Alvarez', 'Domínguez', 'juan.alvarez@aergibide.com', '700123456', 'jalvarez', 'Admin007', NULL),
    (7, 0, '98765433R', 'Lucía', 'Castro', 'Soto', 'lucia.castro@aergibide.com', NULL, 'lcastro', 'User5678', NULL),
    (8, 0, '98765434W', 'Mario', 'Hernández', 'Ortiz', 'mario.hernandez@aergibide.com', '700345678', 'mhernandez', 'Secret99', NULL),
    (9, 0, '98765435A', 'Sara', 'Morales', 'Pérez', 'sara.morales@aergibide.com', NULL, 'smorales', 'Login432', NULL),
    (10, 0, '98765436G', 'Pedro', 'Vega', 'Rojas', 'pedro.vega@aergibide.com', '700567890', 'pvega', 'Token678', NULL),
    (11, 0, '98765437F', 'Raúl', 'Martínez', 'Cruz', 'raul.martinez@aergibide.com', '701123456', 'rmartinez', 'Nexus456', NULL),
    (12, 0, '98765438D', 'Sonia', 'Ramos', 'López', 'sonia.ramos@aergibide.com', NULL, 'sramos', 'Base7890', NULL),
    (13, 0, '98765439B', 'Manuel', 'Gutiérrez', 'Pascual', 'manuel.gutierrez@aergibide.com', '701345678', 'mgutierrez', 'Node1234', NULL),
    (14, 0, '98765440P', 'Isabel', 'Torres', 'Cabrera', 'isabel.torres@aergibide.com', NULL, 'itorres', 'AdminX123', NULL),
    (15, 0, '98765441Q', 'Rafael', 'Flores', 'Ramírez', 'rafael.flores@aergibide.com', '701567890', 'rflores', 'CodeX900', NULL),
    (16, 0, '98765442L', 'Pilar', 'Muñoz', 'Gómez', 'pilar.munoz@aergibide.com', '702123456', 'pmunoz', 'Value123', NULL),
    (17, 0, '98765443Z', 'Adrián', 'Cano', 'Ruiz', 'adrian.cano@aergibide.com', '702234567', 'acano', 'FlexPass1', NULL),
    (18, 0, '98765444X', 'Marta', 'Serrano', 'Núñez', 'marta.serrano@aergibide.com', NULL, 'mserrano', 'Key4321P', NULL),
    (19, 0, '98765445S', 'Luis', 'Navarro', 'Molina', 'luis.navarro@aergibide.com', '702456789', 'lnavarro', 'Sky45678', NULL),
    (20, 0, '98765446J', 'Teresa', 'Romero', 'Domínguez', 'teresa.romero@aergibide.com', '702567890', 'tromero', 'Gate9876', NULL),
    (21, 0, '98765447H', 'Álvaro', 'Rojas', 'López', 'alvaro.rojas@aergibide.com', NULL, 'arojas', 'Port1234', NULL),
    (22, 0, '98765448V', 'Carolina', 'Martín', 'Vega', 'carolina.martin@aergibide.com', '703234567', 'cmartin', 'Key9876', NULL),
    (23, 0, '98765449N', 'Francisco', 'Vázquez', 'Ortega', 'francisco.vazquez@aergibide.com', '703345678', 'fvazquez', 'Safe1234', NULL),
    (24, 0, '98765450T', 'Carmen', 'Benítez', 'Mendoza', 'carmen.benitez@aergibide.com', NULL, 'cbenitez', 'Start890', NULL),
    (25, 0, '98765451C', 'Antonio', 'Díaz', 'López', 'antonio.diaz@aergibide.com', '703567890', 'adiaz', 'Top56789', NULL),
    (26, 0, '98765452M', 'Paula', 'Santos', 'Fernández', 'paula.santos@aergibide.com', '704123456', 'psantos', 'Pilot123', NULL),
    (27, 0, '98765453K', 'Sergio', 'Pérez', 'Muñoz', 'sergio.perez@aergibide.com', NULL, 'sperez', 'Line3456', NULL),
    (28, 0, '98765454L', 'Lorena', 'Luna', 'Rojas', 'lorena.luna@aergibide.com', '704345678', 'lluna', 'DataPass1', NULL),
    (29, 0, '98765455Y', 'Víctor', 'Méndez', 'Cabrera', 'victor.mendez@aergibide.com', NULL, 'vmendez', 'EasyPass8', NULL),
    (30, 0, '98765456R', 'Eva', 'Naranjo', 'García', 'eva.naranjo@aergibide.com', '704567890', 'enaranjo', 'Prime567', NULL);

-- Volcando estructura para tabla grupo2_2425.preguntas
CREATE TABLE IF NOT EXISTS `preguntas` (
    `id` int NOT NULL AUTO_INCREMENT,
    `titulo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `descripcion` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `tema` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `fecha` date NOT NULL,
    `id_usuario` int NOT NULL,
    `archivo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `votosLike` int DEFAULT NULL,
    `votosDislike` int DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `PREG_ID_USU_FK` (`id_usuario`),
    CONSTRAINT `PREG_ID_USU_FK` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo2_2425.preguntas: ~20 rows (aproximadamente)
INSERT INTO `preguntas` (`id`, `titulo`, `descripcion`, `tema`, `fecha`, `id_usuario`, `archivo`, `votosLike`,
                         `votosDislike`)
VALUES
    (1, 'Optimización del diseño de alas', 'Buscamos mejorar la eficiencia aerodinámica de las alas, especialmente en condiciones de turbulencia severa. ¿Algún consejo basado en CFD o pruebas de túneles de viento?', 'diseno_aeronaves', '2024-03-15', 6, NULL, 15, 2),
    (2, 'Procesos de fabricación automatizados', '¿Qué tecnologías están utilizando en su planta para automatizar la producción de componentes de aeronaves? Estamos considerando la implementación de robots colaborativos.', 'fabricacion_produccion', '2024-03-20', 7, NULL, 12, 0),
    (3, 'Mantenimiento predictivo en motores', '¿Alguien ha implementado sistemas de mantenimiento predictivo en motores de turbina? Necesito información sobre los mejores sensores o software para detectar fallos.', 'mantenimiento_operaciones', '2024-03-18', 8, NULL, 18, 1),
    (4, 'Innovación en materiales para fuselajes', '¿Cuáles son los últimos avances en la reducción de peso en fuselajes sin comprometer la seguridad ni la eficiencia?', 'innovacion_sostenibilidad', '2024-03-25', 9, NULL, 20, 3),
    (5, 'Normativas de certificación europeas', '¿Alguien conoce los cambios más recientes en las normativas de la EASA para la certificación de aeronaves? Estoy trabajando en un proceso de homologación de nuevos sistemas de control de vuelo.', 'certificaciones_reglamentacion', '2024-03-22', 10, NULL, 10, 1),
    (6, 'Problemas técnicos con sistemas avionicos', 'Estamos experimentando fluctuaciones de datos en los sensores de vuelo, especialmente en altitud y velocidad. ¿Alguien ha tenido un problema similar?', 'problemas_tecnicos', '2024-04-01', 11, NULL, 8, 0),
    (7, 'Colaboración entre equipos de diseño y producción', '¿Cómo gestionan la colaboración entre los equipos de diseño y producción en su empresa? En nuestro caso, hay algunos desacuerdos sobre los tiempos de entrega.', 'colaboracion_interdepartamental', '2024-04-03', 12, NULL, 5, 2),
    (8, 'Software para simulación de vuelo', '¿Qué software de simulación de vuelo consideran que tiene la mejor precisión para pruebas virtuales de aeronaves? Estamos considerando opciones para simular condiciones extremas de vuelo.', 'software_herramientas', '2024-04-10', 13, NULL, 9, 0),
    (9, 'Gestión de conocimiento técnico en ingeniería aeronáutica', '¿Qué herramientas y métodos utilizan para documentar y compartir conocimiento entre los ingenieros en aeronáutica? Buscamos optimizar este proceso.', 'gestion_conocimiento', '2024-04-12', 14, NULL, 14, 1),
    (10, 'Reducción de ruido en cabina', 'Estamos buscando soluciones tecnológicas para reducir el ruido en cabina sin afectar el peso ni la aerodinámica de la aeronave. ¿Alguien tiene experiencia con materiales absorbentes de sonido?', 'innovacion_sostenibilidad', '2024-04-15', 15, NULL, 17, 2),
    (11, 'Monitoreo remoto de flotas de aeronaves', '¿Alguien está utilizando sistemas de monitoreo remoto de flotas para obtener datos en tiempo real de las aeronaves durante el vuelo?', 'mantenimiento_operaciones', '2024-04-17', 16, NULL, 11, 1),
    (12, 'Fabricación de componentes de alta precisión', '¿Qué técnicas están implementando en sus fábricas para mejorar la precisión en la fabricación de piezas críticas, como las de motor y aviónica?', 'fabricacion_produccion', '2024-04-19', 17, NULL, 16, 0),
    (13, 'Avances en baterías para aviones híbridos', '¿Alguien ha trabajado con sistemas híbridos eléctricos en aeronaves? Necesitamos más información sobre las baterías de alto rendimiento para reemplazar generadores auxiliares.', 'innovacion_sostenibilidad', '2024-04-22', 18, NULL, 10, 0),
    (14, 'Actualización de software de aviónica', '¿Qué problemas han encontrado al actualizar el software de aviónica en aviones comerciales? Necesito saber qué desafíos o problemas se pueden prever en estas actualizaciones.', 'software_herramientas', '2024-04-24', 19, NULL, 13, 2),
    (15, 'Colaboración en proyectos de investigación aeronáutica', '¿Cómo gestionan la colaboración en proyectos de investigación entre distintas divisiones de una empresa aeronáutica? ¿Han enfrentado problemas de comunicación?', 'colaboracion_interdepartamental', '2024-04-27', 20, NULL, 7, 1),
    (16, 'Revisión de manuales de mantenimiento', '¿Quién se encarga de la actualización continua de los manuales de mantenimiento de aeronaves en su empresa? ¿Cómo gestionan estos cambios?', 'gestion_conocimiento', '2024-04-29', 21, NULL, 12, 3),
    (17, 'Nuevas tecnologías para la seguridad en vuelo', '¿Qué tecnologías emergentes están mejorando la seguridad en vuelo? Buscamos mejorar los sistemas de alerta temprana para nuestros aviones.', 'problemas_tecnicos', '2024-05-02', 22, NULL, 14, 0),
    (18, 'Energía alternativa en la aviación', '¿Cuáles son las opciones más viables para usar energía solar o eólica como complemento en aviones comerciales?', 'innovacion_sostenibilidad', '2024-05-05', 23, NULL, 15, 2),
    (19, 'Integración de software CAD/CAM en diseño aeronáutico', '¿Qué software CAD/CAM utilizan para el diseño aeronáutico y la fabricación de prototipos? Buscamos una opción que optimice la transición entre diseño y producción.', 'software_herramientas', '2024-05-07', 24, NULL, 6, 1),
    (20, 'Normas de reciclaje de materiales compuestos', '¿Cómo manejan el reciclaje de materiales compuestos en sus operaciones? Necesitamos cumplir con las nuevas normativas de la UE sobre reciclaje de estos materiales.', 'certificaciones_reglamentacion', '2024-05-10', 25, NULL, 9, 0);

-- Volcando estructura para tabla grupo2_2425.respuestas
CREATE TABLE IF NOT EXISTS `respuestas` (
    `id` int NOT NULL AUTO_INCREMENT,
    `solucion` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `archivo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
    ) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo2_2425.respuestas: ~16 rows (aproximadamente)
INSERT INTO `respuestas` (`id`, `solucion`, `archivo`, `votosLike`, `votosDislike`, `id_pregunta`, `id_usuario`,
                          `fecha`)
VALUES
    (1, 'Para la optimización de alas, recomendamos realizar un análisis de la aerodinámica utilizando CFD, simulando varias condiciones de turbulencia. Esto puede ayudarte a predecir el rendimiento bajo diversas situaciones de vuelo.', NULL, 13, 1, 1, 6, '2024-03-16'),
    (2, 'Una excelente alternativa es realizar pruebas en túneles de viento, especialmente con alas a escala reducida para obtener resultados más controlados. Usamos túneles transónicos para obtener datos más precisos.', NULL, 9, 0, 1, 7, '2024-03-17'),
    (3, 'Además, podrías considerar el uso de materiales compuestos avanzados, como el carbono, para reducir el peso de las alas sin comprometer la resistencia estructural. Esto mejora la eficiencia de combustible.', NULL, 11, 1, 1, 8, '2024-03-18'),
    (4, 'Hemos automatizado muchos procesos usando robots colaborativos. Esto no solo ha mejorado la precisión, sino también ha reducido el tiempo de ensamblaje. Te recomendaría investigar opciones de robots Delta para tareas de alta velocidad.', NULL, 15, 2, 2, 9, '2024-03-21'),
    (5, 'Implementamos sistemas de mantenimiento predictivo con sensores IoT en los motores. Esto nos permitió reducir los costos operativos y evitar fallos imprevistos. Recomendamos sensores de vibración y temperatura integrados con software de diagnóstico.', NULL, 16, 1, 3, 10, '2024-03-19'),
    (6, 'El uso de IA para predecir fallos también es clave. Algoritmos de aprendizaje automático pueden procesar grandes cantidades de datos y ofrecer pronósticos precisos sobre el estado de los motores.', NULL, 10, 0, 3, 11, '2024-03-20'),
    (7, 'Para reducir el peso del fuselaje, recomendamos el uso de aleaciones de titanio y aluminio-lítio, que ofrecen una combinación única de ligereza y resistencia. Esto se está usando cada vez más en la industria.', NULL, 20, 1, 4, 12, '2024-03-26'),
    (8, 'Además de las aleaciones, los materiales compuestos como el CFRP (plástico reforzado con fibra de carbono) son muy útiles. Se pueden moldear con precisión y su relación resistencia-peso es increíblemente eficiente.', NULL, 18, 0, 4, 13, '2024-03-27'),
    (9, 'Considera el uso de estructuras híbridas que combinan materiales metálicos y compuestos para obtener lo mejor de ambos mundos: resistencia y reducción de peso.', NULL, 15, 1, 4, 14, '2024-03-28'),
    (10, 'La EASA ha actualizado varias directrices sobre los requisitos de las pruebas de vuelo para las nuevas aeronaves. Es importante estar al tanto de los requisitos de las pruebas de fatiga estructural y los sistemas de control de vuelo.', NULL, 12, 1, 5, 15, '2024-03-23'),
    (11, 'El problema con las fluctuaciones de datos puede ser causado por interferencias de otros sistemas electrónicos a bordo. Te sugeriría hacer una revisión de las conexiones a tierra y de los filtros EMI.', NULL, 5, 0, 6, 16, '2024-04-02'),
    (12, 'Nosotros solucionamos un problema similar con el recalibrado de los sensores y la actualización de los firmware. Esto eliminó varias anomalías en el sistema.', NULL, 8, 1, 6, 17, '2024-04-03'),
    (13, 'Nosotros organizamos reuniones quincenales entre diseño y producción para asegurar que ambos equipos estén alineados. Es importante tener reuniones regulares para evitar malentendidos sobre plazos y expectativas.', NULL, 6, 0, 7, 18, '2024-04-05'),
    (14, 'Además, usamos herramientas de gestión de proyectos que permiten a ambos equipos ver los avances y modificar tiempos cuando es necesario. Esto ha facilitado mucho la colaboración.', NULL, 8, 1, 7, 19, '2024-04-06'),
    (15, 'Para simulación de vuelo, hemos utilizado X-Plane y FlightGear debido a su precisión en la simulación de diferentes condiciones de vuelo y por ser altamente personalizables.', NULL, 12, 2, 8, 20, '2024-04-11'),
    (16, 'Te recomendaría también considerar simuladores como Simulink, que permiten la integración con modelos de control de vuelo en tiempo real, lo cual es esencial para pruebas precisas.', NULL, 9, 0, 8, 21, '2024-04-12');

-- Volcando estructura para tabla grupo2_2425.favoritos
CREATE TABLE IF NOT EXISTS `favoritos` (
    `id_favorito` int NOT NULL AUTO_INCREMENT,
    `id_usuario` int NOT NULL,
    `id_respuesta` int NOT NULL,
    PRIMARY KEY (`id_favorito`),
    KEY `FAV_ID_USU_FK` (`id_usuario`),
    KEY `FAV_ID_RES_FK` (`id_respuesta`),
    CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
    CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`id_respuesta`) REFERENCES `respuestas` (`id`) ON UPDATE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo2_2425.favoritos: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;