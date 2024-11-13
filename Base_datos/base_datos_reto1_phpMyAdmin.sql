-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql:3306
-- Tiempo de generación: 13-11-2024 a las 16:43:42
-- Versión del servidor: 11.5.2-MariaDB-ubu2404
-- Versión de PHP: 8.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupo2_2425`
--
CREATE DATABASE IF NOT EXISTS `grupo2_2425` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci;
USE `grupo2_2425`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--
-- Creación: 13-11-2024 a las 15:48:11
--

DROP TABLE IF EXISTS `favoritos`;
CREATE TABLE `favoritos` (
                             `id` int(11) NOT NULL,
                             `id_usuario` int(11) NOT NULL,
                             `id_respuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--
-- Creación: 13-11-2024 a las 15:47:26
-- Última actualización: 13-11-2024 a las 16:34:16
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE `preguntas` (
                             `id` int(11) NOT NULL,
                             `titulo` varchar(100) NOT NULL,
                             `descripcion` varchar(300) NOT NULL,
                             `tema` varchar(100) NOT NULL,
                             `fecha` date NOT NULL,
                             `id_usuario` int(11) NOT NULL,
                             `archivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `titulo`, `descripcion`, `tema`, `fecha`, `id_usuario`, `archivo`) VALUES
                                                                                                      (1, 'Optimización del diseño de alas', 'Buscamos mejorar la eficiencia aerodinámica de las alas, especialmente en condiciones de turbulencia severa. ¿Algún consejo basado en CFD o pruebas de túneles de viento?', 'diseno_aeronaves', '2024-03-15', 6, NULL),
                                                                                                      (2, 'Procesos de fabricación automatizados', '¿Qué tecnologías están utilizando en su planta para automatizar la producción de componentes de aeronaves? Estamos considerando la implementación de robots colaborativos.', 'fabricacion_produccion', '2024-03-20', 7, NULL),
                                                                                                      (3, 'Mantenimiento predictivo en motores', '¿Alguien ha implementado sistemas de mantenimiento predictivo en motores de turbina? Necesito información sobre los mejores sensores o software para detectar fallos.', 'mantenimiento_operaciones', '2024-03-18', 8, NULL),
                                                                                                      (4, 'Innovación en materiales para fuselajes', '¿Cuáles son los últimos avances en la reducción de peso en fuselajes sin comprometer la seguridad ni la eficiencia?', 'innovacion_sostenibilidad', '2024-03-25', 9, NULL),
                                                                                                      (5, 'Normativas de certificación europeas', '¿Alguien conoce los cambios más recientes en las normativas de la EASA para la certificación de aeronaves? Estoy trabajando en un proceso de homologación de nuevos sistemas de control de vuelo.', 'certificaciones_reglamentacion', '2024-03-22', 10, NULL),
                                                                                                      (6, 'Problemas técnicos con sistemas avionicos', 'Estamos experimentando fluctuaciones de datos en los sensores de vuelo, especialmente en altitud y velocidad. ¿Alguien ha tenido un problema similar?', 'problemas_tecnicos', '2024-04-01', 11, NULL),
                                                                                                      (7, 'Colaboración entre equipos de diseño y producción', '¿Cómo gestionan la colaboración entre los equipos de diseño y producción en su empresa? En nuestro caso, hay algunos desacuerdos sobre los tiempos de entrega.', 'colaboracion_interdepartamental', '2024-04-03', 12, NULL),
                                                                                                      (8, 'Software para simulación de vuelo', '¿Qué software de simulación de vuelo consideran que tiene la mejor precisión para pruebas virtuales de aeronaves? Estamos considerando opciones para simular condiciones extremas de vuelo.', 'software_herramientas', '2024-04-10', 13, NULL),
                                                                                                      (9, 'Gestión de conocimiento técnico en ingeniería aeronáutica', '¿Qué herramientas y métodos utilizan para documentar y compartir conocimiento entre los ingenieros en aeronáutica? Buscamos optimizar este proceso.', 'gestion_conocimiento', '2024-04-12', 14, NULL),
                                                                                                      (10, 'Reducción de ruido en cabina', 'Estamos buscando soluciones tecnológicas para reducir el ruido en cabina sin afectar el peso ni la aerodinámica de la aeronave. ¿Alguien tiene experiencia con materiales absorbentes de sonido?', 'innovacion_sostenibilidad', '2024-04-15', 15, NULL),
                                                                                                      (11, 'Monitoreo remoto de flotas de aeronaves', '¿Alguien está utilizando sistemas de monitoreo remoto de flotas para obtener datos en tiempo real de las aeronaves durante el vuelo?', 'mantenimiento_operaciones', '2024-04-17', 16, NULL),
                                                                                                      (12, 'Fabricación de componentes de alta precisión', '¿Qué técnicas están implementando en sus fábricas para mejorar la precisión en la fabricación de piezas críticas, como las de motor y aviónica?', 'fabricacion_produccion', '2024-04-19', 17, NULL),
                                                                                                      (13, 'Avances en baterías para aviones híbridos', '¿Alguien ha trabajado con sistemas híbridos eléctricos en aeronaves? Necesitamos más información sobre las baterías de alto rendimiento para reemplazar generadores auxiliares.', 'innovacion_sostenibilidad', '2024-04-22', 18, NULL),
                                                                                                      (14, 'Actualización de software de aviónica', '¿Qué problemas han encontrado al actualizar el software de aviónica en aviones comerciales? Necesito saber qué desafíos o problemas se pueden prever en estas actualizaciones.', 'software_herramientas', '2024-04-24', 19, NULL),
                                                                                                      (15, 'Colaboración en proyectos de investigación aeronáutica', '¿Cómo gestionan la colaboración en proyectos de investigación entre distintas divisiones de una empresa aeronáutica? ¿Han enfrentado problemas de comunicación?', 'colaboracion_interdepartamental', '2024-04-27', 20, NULL),
                                                                                                      (16, 'Revisión de manuales de mantenimiento', '¿Quién se encarga de la actualización continua de los manuales de mantenimiento de aeronaves en su empresa? ¿Cómo gestionan estos cambios?', 'gestion_conocimiento', '2024-04-29', 21, NULL),
                                                                                                      (17, 'Nuevas tecnologías para la seguridad en vuelo', '¿Qué tecnologías emergentes están mejorando la seguridad en vuelo? Buscamos mejorar los sistemas de alerta temprana para nuestros aviones.', 'problemas_tecnicos', '2024-05-02', 22, NULL),
                                                                                                      (18, 'Energía alternativa en la aviación', '¿Cuáles son las opciones más viables para usar energía solar o eólica como complemento en aviones comerciales?', 'innovacion_sostenibilidad', '2024-05-05', 23, NULL),
                                                                                                      (19, 'Integración de software CAD/CAM en diseño aeronáutico', '¿Qué software CAD/CAM utilizan para el diseño aeronáutico y la fabricación de prototipos? Buscamos una opción que optimice la transición entre diseño y producción.', 'software_herramientas', '2024-05-07', 24, NULL),
                                                                                                      (20, 'Normas de reciclaje de materiales compuestos', '¿Cómo manejan el reciclaje de materiales compuestos en sus operaciones? Necesitamos cumplir con las nuevas normativas de la UE sobre reciclaje de estos materiales.', 'certificaciones_reglamentacion', '2024-05-10', 25, NULL),
                                                                                                      (21, 'Avances en sistemas de control de vuelo autónomos', '¿Qué avances están realizando en la implementación de sistemas autónomos en el control de vuelo? Nos interesa especialmente la integración de inteligencia artificial.', 'diseno_aeronaves', '2024-05-12', 6, NULL),
                                                                                                      (22, 'Nuevas técnicas de soldadura en aeronáutica', '¿Qué nuevas técnicas de soldadura están utilizando en la fabricación de estructuras aeronáuticas? Buscamos mejorar la resistencia y reducir el peso de las piezas.', 'fabricacion_produccion', '2024-05-14', 7, NULL),
                                                                                                      (23, 'Optimización del consumo de combustible en aviones comerciales', '¿Qué estrategias se están utilizando para mejorar la eficiencia del consumo de combustible en aviones comerciales? Estamos buscando soluciones innovadoras.', 'innovacion_sostenibilidad', '2024-05-16', 9, NULL),
                                                                                                      (24, 'Desarrollo de sistemas de navegación más precisos', '¿Alguien ha implementado tecnologías emergentes en la mejora de la precisión de los sistemas de navegación aérea? Buscamos actualizar nuestro sistema de navegación.', 'problemas_tecnicos', '2024-05-18', 10, NULL),
                                                                                                      (25, 'Revisión de normas de seguridad en mantenimiento de aeronaves', '¿Cómo se gestionan las normativas de seguridad en el mantenimiento de aeronaves? Necesitamos asegurarnos de que todas las actualizaciones estén alineadas con las normativas internacionales.', 'certificaciones_reglamentacion', '2024-05-20', 11, NULL),
                                                                                                      (26, 'Desafíos en la fabricación de componentes para aviones eléctricos', '¿Cuáles son los principales desafíos en la fabricación de componentes específicos para aviones eléctricos? Estamos trabajando en la producción de baterías y sistemas eléctricos.', 'fabricacion_produccion', '2024-05-22', 12, NULL),
                                                                                                      (27, 'Integración de sistemas de comunicación satelital en aeronaves', '¿Qué sistemas de comunicación satelital están utilizando en sus aeronaves? Nos interesa mejorar la conectividad durante vuelos largos y de alta altitud.', 'mantenimiento_operaciones', '2024-05-25', 13, NULL),
                                                                                                      (28, 'Sistemas de propulsión híbridos en la aviación', '¿Alguien está explorando sistemas de propulsión híbridos para aeronaves? Queremos implementar una tecnología más eficiente y ecológica en nuestros aviones comerciales.', 'innovacion_sostenibilidad', '2024-05-27', 15, NULL),
                                                                                                      (29, 'Estrategias para mejorar la fiabilidad de los sistemas avionicos', '¿Qué estrategias están implementando para mejorar la fiabilidad de los sistemas avionicos? Queremos reducir los fallos durante el vuelo y aumentar la seguridad.', 'problemas_tecnicos', '2024-05-29', 16, NULL),
                                                                                                      (30, 'Implementación de realidad aumentada en el mantenimiento de aeronaves', '¿Alguien ha implementado realidad aumentada para el mantenimiento de aeronaves? Queremos usar esta tecnología para mejorar la eficiencia de los técnicos durante las reparaciones.', 'software_herramientas', '2024-06-01', 18, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--
-- Creación: 13-11-2024 a las 16:41:50
-- Última actualización: 13-11-2024 a las 16:42:01
--

DROP TABLE IF EXISTS `respuestas`;
CREATE TABLE `respuestas` (
                              `id` int(11) NOT NULL,
                              `solucion` varchar(300) NOT NULL,
                              `archivo` varchar(255) DEFAULT NULL,
                              `id_pregunta` int(11) NOT NULL,
                              `id_usuario` int(11) NOT NULL,
                              `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `solucion`, `archivo`, `id_pregunta`, `id_usuario`, `fecha`) VALUES
                                                                                                 (1, 'Para la optimización de alas, recomendamos realizar un análisis de la aerodinámica utilizando CFD, simulando varias condiciones de turbulencia. Esto puede ayudarte a predecir el rendimiento bajo diversas situaciones de vuelo.', NULL, 1, 6, '2024-03-16'),
                                                                                                 (2, 'Una excelente alternativa es realizar pruebas en túneles de viento, especialmente con alas a escala reducida para obtener resultados más controlados. Usamos túneles transónicos para obtener datos más precisos.', NULL, 1, 7, '2024-03-17'),
                                                                                                 (3, 'Además, podrías considerar el uso de materiales compuestos avanzados, como el carbono, para reducir el peso de las alas sin comprometer la resistencia estructural. Esto mejora la eficiencia de combustible.', NULL, 1, 8, '2024-03-18'),
                                                                                                 (4, 'Hemos automatizado muchos procesos usando robots colaborativos. Esto no solo ha mejorado la precisión, sino también ha reducido el tiempo de ensamblaje. Te recomendaría investigar opciones de robots Delta para tareas de alta velocidad.', NULL, 2, 9, '2024-03-21'),
                                                                                                 (5, 'Implementamos sistemas de mantenimiento predictivo con sensores IoT en los motores. Esto nos permitió reducir los costos operativos y evitar fallos imprevistos. Recomendamos sensores de vibración y temperatura integrados con software de diagnóstico.', NULL, 3, 10, '2024-03-19'),
                                                                                                 (6, 'El uso de IA para predecir fallos también es clave. Algoritmos de aprendizaje automático pueden procesar grandes cantidades de datos y ofrecer pronósticos precisos sobre el estado de los motores.', NULL, 3, 11, '2024-03-20'),
                                                                                                 (7, 'Para reducir el peso del fuselaje, recomendamos el uso de aleaciones de titanio y aluminio-lítio, que ofrecen una combinación única de ligereza y resistencia. Esto se está usando cada vez más en la industria.', NULL, 4, 12, '2024-03-26'),
                                                                                                 (8, 'Además de las aleaciones, los materiales compuestos como el CFRP (plástico reforzado con fibra de carbono) son muy útiles. Se pueden moldear con precisión y su relación resistencia-peso es increíblemente eficiente.', NULL, 4, 13, '2024-03-27'),
                                                                                                 (9, 'Considera el uso de estructuras híbridas que combinan materiales metálicos y compuestos para obtener lo mejor de ambos mundos: resistencia y reducción de peso.', NULL, 4, 14, '2024-03-28'),
                                                                                                 (10, 'La EASA ha actualizado varias directrices sobre los requisitos de las pruebas de vuelo para las nuevas aeronaves. Es importante estar al tanto de los requisitos de las pruebas de fatiga estructural y los sistemas de control de vuelo.', NULL, 5, 15, '2024-03-23'),
                                                                                                 (11, 'El problema con las fluctuaciones de datos puede ser causado por interferencias de otros sistemas electrónicos a bordo. Te sugeriría hacer una revisión de las conexiones a tierra y de los filtros EMI.', NULL, 6, 16, '2024-04-02'),
                                                                                                 (12, 'Nosotros solucionamos un problema similar con el recalibrado de los sensores y la actualización de los firmware. Esto eliminó varias anomalías en el sistema.', NULL, 6, 17, '2024-04-03'),
                                                                                                 (13, 'Nosotros organizamos reuniones quincenales entre diseño y producción para asegurar que ambos equipos estén alineados. Es importante tener reuniones regulares para evitar malentendidos sobre plazos y expectativas.', NULL, 7, 18, '2024-04-05'),
                                                                                                 (14, 'Además, usamos herramientas de gestión de proyectos que permiten a ambos equipos ver los avances y modificar tiempos cuando es necesario. Esto ha facilitado mucho la colaboración.', NULL, 7, 19, '2024-04-06'),
                                                                                                 (15, 'Para simulación de vuelo, hemos utilizado X-Plane y FlightGear debido a su precisión en la simulación de diferentes condiciones de vuelo y por ser altamente personalizables.', NULL, 8, 20, '2024-04-11'),
                                                                                                 (16, 'Te recomendaría también considerar simuladores como Simulink, que permiten la integración con modelos de control de vuelo en tiempo real, lo cual es esencial para pruebas precisas.', NULL, 8, 21, '2024-04-12'),
                                                                                                 (17, 'Para la integración de sistemas híbridos, recomiendo investigar el uso de baterías de estado sólido, ya que ofrecen una mayor densidad de energía y una vida útil más larga que las tradicionales de iones de litio.', NULL, 13, 22, '2024-05-08'),
                                                                                                 (18, 'En cuanto al mantenimiento predictivo, también hemos logrado buenos resultados con sistemas de análisis de aceite que monitorean el desgaste y la contaminación, lo que permite prever la necesidad de mantenimiento antes de que se presenten fallos.', NULL, 5, 23, '2024-05-09'),
                                                                                                 (19, 'Para los procesos de fabricación, una excelente alternativa a la fabricación aditiva es la estampación de metales de alta precisión, que puede ser más rentable y producir piezas con tolerancias más estrictas.', NULL, 12, 24, '2024-05-10'),
                                                                                                 (20, 'Para mejorar la seguridad en vuelo, recomendamos el uso de sistemas de alerta temprana basados en inteligencia artificial que analicen los datos de los sensores en tiempo real y prevean posibles fallos en los sistemas de vuelo.', NULL, 17, 25, '2024-05-12'),
                                                                                                 (21, 'En el ámbito de la simulación de vuelo, he tenido buenas experiencias con simuladores que integran sistemas de modelado de aviónica, ya que permiten realizar pruebas realistas de fallos y emergencias durante el vuelo.', NULL, 8, 26, '2024-05-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--
-- Creación: 13-11-2024 a las 16:19:13
-- Última actualización: 13-11-2024 a las 16:19:38
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
                            `id` int(11) NOT NULL,
                            `administrador` tinyint(1) NOT NULL,
                            `dni` varchar(9) NOT NULL,
                            `nombre` varchar(50) NOT NULL,
                            `apellido1` varchar(50) NOT NULL,
                            `apellido2` varchar(50) NOT NULL,
                            `email` varchar(50) NOT NULL,
                            `telefono` varchar(9) DEFAULT NULL,
                            `usuario` varchar(50) NOT NULL,
                            `contrasena` varchar(50) NOT NULL,
                            `imagen` varchar(255) DEFAULT NULL
) ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `administrador`, `dni`, `nombre`, `apellido1`, `apellido2`, `email`, `telefono`, `usuario`, `contrasena`, `imagen`) VALUES
                                                                                                                                                      (1, 1, '12345678Z', 'Ana', 'Pérez', 'García', 'ana.perez@aergibide.com', '600123456', 'aperez', 'Aperez001', './uploads/672c7a2cc8383_6729f9de2cca2_OIP.jpg'),
                                                                                                                                                      (2, 1, '12345679N', 'Carlos', 'Lopez', 'Martínez', 'carlos.lopez@aergibide.com', NULL, 'clopez', 'Clopez002', NULL),
                                                                                                                                                      (3, 1, '12345680M', 'Beatriz', 'Ruiz', 'Fernández', 'beatriz.ruiz@aergibide.com', '600345678', 'bruiz', 'Bruiz003', NULL),
                                                                                                                                                      (4, 1, '12345681L', 'David', 'Sánchez', 'Hernández', 'david.sanchez@aergibide.com', NULL, 'dsanchez', 'Dsanchez004', NULL),
                                                                                                                                                      (5, 1, '12345682K', 'Elena', 'Gómez', 'Jiménez', 'elena.gomez@aergibide.com', '600567890', 'egomez', 'Egomez005', NULL),
                                                                                                                                                      (6, 0, '98765432T', 'Juan', 'Alvarez', 'Domínguez', 'juan.alvarez@aergibide.com', '700123456', 'jalvarez', 'Jalvarez006', NULL),
                                                                                                                                                      (7, 0, '98765433R', 'Lucía', 'Castro', 'Soto', 'lucia.castro@aergibide.com', NULL, 'lcastro', 'Lcastro007', NULL),
                                                                                                                                                      (8, 0, '98765434W', 'Mario', 'Hernández', 'Ortiz', 'mario.hernandez@aergibide.com', '700345678', 'mhernandez', 'Mhernandez008', NULL),
                                                                                                                                                      (9, 0, '98765435A', 'Sara', 'Morales', 'Pérez', 'sara.morales@aergibide.com', NULL, 'smorales', 'Smorales009', NULL),
                                                                                                                                                      (10, 0, '98765436G', 'Pedro', 'Vega', 'Rojas', 'pedro.vega@aergibide.com', '700567890', 'pvega', 'Pvega010', NULL),
                                                                                                                                                      (11, 0, '98765437F', 'Raúl', 'Martínez', 'Cruz', 'raul.martinez@aergibide.com', '701123456', 'rmartinez', 'Rmartinez011', NULL),
                                                                                                                                                      (12, 0, '98765438D', 'Sonia', 'Ramos', 'López', 'sonia.ramos@aergibide.com', NULL, 'sramos', 'Sramos012', NULL),
                                                                                                                                                      (13, 0, '98765439B', 'Manuel', 'Gutiérrez', 'Pascual', 'manuel.gutierrez@aergibide.com', '701345678', 'mgutierrez', 'Mgutierrez013', NULL),
                                                                                                                                                      (14, 0, '98765440P', 'Isabel', 'Torres', 'Cabrera', 'isabel.torres@aergibide.com', NULL, 'itorres', 'Itorres014', NULL),
                                                                                                                                                      (15, 0, '98765441Q', 'Rafael', 'Flores', 'Ramírez', 'rafael.flores@aergibide.com', '701567890', 'rflores', 'Rflores015', NULL),
                                                                                                                                                      (16, 0, '98765442L', 'Pilar', 'Muñoz', 'Gómez', 'pilar.munoz@aergibide.com', '702123456', 'pmunoz', 'Pmunoz016', NULL),
                                                                                                                                                      (17, 0, '98765443Z', 'Adrián', 'Cano', 'Ruiz', 'adrian.cano@aergibide.com', '702234567', 'acano', 'Acano017', NULL),
                                                                                                                                                      (18, 0, '98765444X', 'Marta', 'Serrano', 'Núñez', 'marta.serrano@aergibide.com', NULL, 'mserrano', 'Mserrano018', NULL),
                                                                                                                                                      (19, 0, '98765445S', 'Luis', 'Navarro', 'Molina', 'luis.navarro@aergibide.com', '702456789', 'lnavarro', 'Lnavarro019', NULL),
                                                                                                                                                      (20, 0, '98765446J', 'Teresa', 'Romero', 'Domínguez', 'teresa.romero@aergibide.com', '702567890', 'tromero', 'Tromero020', NULL),
                                                                                                                                                      (21, 0, '98765447H', 'Álvaro', 'Rojas', 'López', 'alvaro.rojas@aergibide.com', NULL, 'arojas', 'Arojas021', NULL),
                                                                                                                                                      (22, 0, '98765448V', 'Carolina', 'Martín', 'Vega', 'carolina.martin@aergibide.com', '703234567', 'cmartin', 'Cmartin022', NULL),
                                                                                                                                                      (23, 0, '98765449N', 'Francisco', 'Vázquez', 'Ortega', 'francisco.vazquez@aergibide.com', '703345678', 'fvazquez', 'Fvazquez023', NULL),
                                                                                                                                                      (24, 0, '98765450T', 'Carmen', 'Benítez', 'Mendoza', 'carmen.benitez@aergibide.com', NULL, 'cbenitez', 'Cbenitez024', NULL),
                                                                                                                                                      (25, 0, '98765451C', 'Antonio', 'Díaz', 'López', 'antonio.diaz@aergibide.com', '703567890', 'adiaz', 'Adiaz025', NULL),
                                                                                                                                                      (26, 0, '98765452M', 'Paula', 'Santos', 'Fernández', 'paula.santos@aergibide.com', '704123456', 'psantos', 'Psantos026', NULL),
                                                                                                                                                      (27, 0, '98765453K', 'Sergio', 'Pérez', 'Muñoz', 'sergio.perez@aergibide.com', NULL, 'sperez', 'Sperez027', NULL),
                                                                                                                                                      (28, 0, '98765454L', 'Laura', 'Luna', 'Rojas', 'laura.luna@aergibide.com', '704345678', 'lluna', 'Lluna028', NULL),
                                                                                                                                                      (29, 0, '98765455Y', 'Víctor', 'Méndez', 'Cabrera', 'victor.mendez@aergibide.com', NULL, 'vmendez', 'Vmendez029', NULL),
                                                                                                                                                      (30, 0, '98765456R', 'Eva', 'Naranjo', 'García', 'eva.naranjo@aergibide.com', '704567890', 'enaranjo', 'Enaranjo030', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
    ADD PRIMARY KEY (`id`),
  ADD KEY `FAV_ID_USU_FK` (`id_usuario`) USING BTREE,
  ADD KEY `FAV_ID_RES_FK` (`id_respuesta`) USING BTREE;

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
    ADD PRIMARY KEY (`id`),
  ADD KEY `PREG_ID_USU_FK` (`id_usuario`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
    ADD PRIMARY KEY (`id`),
  ADD KEY `RESP_ID_PREG_FK` (`id_pregunta`),
  ADD KEY `RESP_ID_USU_FK` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
    ADD CONSTRAINT `FAV_ID_RES_FK` FOREIGN KEY (`id_respuesta`) REFERENCES `respuestas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `FAV_ID_USU_FK` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
    ADD CONSTRAINT `PREG_ID_USU_FK` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
    ADD CONSTRAINT `RESP_ID_PREG_FK` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `RESP_ID_USU_FK` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
    ADD CONSTRAINT `USU_ADMIN_CK` CHECK (`administrador` IN (0, 1));

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;