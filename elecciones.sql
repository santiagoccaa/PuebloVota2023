-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-05-2023 a las 13:46:22
-- Versión del servidor: 8.0.27
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `elecciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscritos`
--

DROP TABLE IF EXISTS `inscritos`;
CREATE TABLE IF NOT EXISTS `inscritos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `cedula` int NOT NULL,
  `barrio` varchar(100) NOT NULL,
  `id_postulado` varchar(50) DEFAULT NULL,
  `id_consejal` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `inscritos`
--

INSERT INTO `inscritos` (`id`, `nombre`, `apellidos`, `cedula`, `barrio`, `id_postulado`, `id_consejal`) VALUES
(1, 'persona', 'apellido', 1000, 'Loma del Viento', '22santi', 'alcalde'),
(2, 'persona', 'apellido', 1002, 'Villa Alegría', '22santi', 'alcalde'),
(3, 'persona', 'apellido', 1001, 'Centro', '20sildra', 'alcalde'),
(4, 'persona', 'apellido', 1003, 'La Bajera', '21kira', 'alcalde'),
(5, 'persona', 'apellido', 1006, 'Plaza de la Paz', '22santi', 'alcalde'),
(6, 'persona', 'apellido', 1004, 'San Rafael', '23koko', 'alcalde'),
(7, 'persona', 'apellido', 1005, 'El Guanabano', '21kira', 'alcalde'),
(8, 'persona', 'apellido', 1007, 'Buenos Aires', '20sildra', 'alcalde'),
(9, 'persona', 'apellido', 1010, 'Campo Alegre', '22santi', 'alcalde'),
(10, 'persona', 'apellido', 1011, 'Villa Alegría', '22santi', 'alcalde'),
(11, 'persona', 'apellido', 1008, 'Los Portales', '23koko', 'alcalde'),
(12, 'persona', 'apellido', 1009, 'El Anzuello', '21kira', 'alcalde'),
(13, 'persona', 'apellido', 1012, 'Nuevo Santander', '20sildra', 'alcalde'),
(14, 'persona', 'apellido', 1013, 'La Campesina 1', '23koko', 'alcalde'),
(15, 'persona', 'apellido', 2000, 'Loma del Viento', 'consejal2', '22santi'),
(16, 'persona', 'apellido', 2002, 'Villa Alegría', 'consejal', '22santi'),
(17, 'persona', 'apellido', 2001, 'Centro', 'consejal', '22santi'),
(18, 'persona', 'apellido', 2003, 'La Bajera', 'consejal', '22santi'),
(19, 'persona', 'apellido', 2006, 'Plaza de la Paz', 'consejal', '22santi'),
(20, 'persona', 'apellido', 2004, 'San Rafael', 'consejal', '22santi'),
(21, 'persona', 'apellido', 2005, 'El Guanabano', 'consejal1', '22santi'),
(22, 'persona', 'apellido', 2007, 'Buenos Aires', 'consejal1', '22santi'),
(23, 'persona', 'apellido', 2010, 'Campo Alegre', 'consejal1', '22santi'),
(24, 'persona', 'apellido', 2011, 'Villa Alegría', 'consejal1', '22santi'),
(25, 'persona', 'apellido', 2008, 'Los Portales', 'consejal2', '22santi'),
(26, 'persona', 'apellido', 2009, 'El Anzuello', 'consejal2', '22santi'),
(27, 'persona', 'apellido', 2012, 'Nuevo Santander', 'consejal2', '22santi'),
(28, 'persona', 'apellido', 2013, 'La Campesina 1', 'consejal2', '22santi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulados`
--

DROP TABLE IF EXISTS `postulados`;
CREATE TABLE IF NOT EXISTS `postulados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `id_postulado` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_postulado` (`id_postulado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `postulados`
--

INSERT INTO `postulados` (`id`, `username`, `password`, `role`, `id_postulado`) VALUES
(2, 'admin', '$2y$10$6q3ljwaYS2Zo5/1kFPzEseuIBQXhv/X8fFnU0lJlShwXrKTEGJEMa', 'admin', 1),
(3, 'user', '$2y$10$6q3ljwaYS2Zo5/1kFPzEseuIBQXhv/X8f', 'user', 3),
(4, 'santi', 'santi', 'admin', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_postulado` varchar(20) DEFAULT NULL,
  `aliado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `tipo`, `username`, `password`, `id_postulado`, `aliado`) VALUES
(4, 'alcalde', 'santiago', 'd033e22ae348aeb5660fc2140aec35850c4da997', '22santi', '22santi'),
(2, 'alcalde', 'sildra', 'd033e22ae348aeb5660fc2140aec35850c4da997', '20sildra', 'aliadosildra'),
(5, 'consejal', 'consejal', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'id_consejal', '22santi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
