-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-06-2024 a las 19:33:03
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdfinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_comentario` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_juego` int NOT NULL,
  `valoracion` float NOT NULL,
  `Comentario` varchar(100) NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `FK_idJuego` (`id_juego`),
  KEY `FK_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_usuario`, `id_juego`, `valoracion`, `Comentario`) VALUES
(45, 19, 74, 5, 'dasdad'),
(41, 19, 0, 5, 'sasas'),
(40, 19, 0, 5, 'sasas'),
(39, 19, 0, 5, 'sasasa'),
(38, 19, 0, 5, 'sasasa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlaces_consola`
--

DROP TABLE IF EXISTS `enlaces_consola`;
CREATE TABLE IF NOT EXISTS `enlaces_consola` (
  `id_enlace` int NOT NULL AUTO_INCREMENT,
  `enlace` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `id_juego` int NOT NULL,
  PRIMARY KEY (`id_enlace`),
  KEY `id_juego` (`id_juego`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `enlaces_consola`
--

INSERT INTO `enlaces_consola` (`id_enlace`, `enlace`, `id_juego`) VALUES
(15, 'sasasa', 74),
(13, 'https://persona.atlus.com/p5r/?lang=en#', 75),
(14, 'https://play.google.com/store/apps/details?id=com.farlightgames.igame.gp&hl=en_US&pli=1', 75),
(12, 'https://persona.atlus.com/p5r/?lang=en#', 74);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlaces_movil`
--

DROP TABLE IF EXISTS `enlaces_movil`;
CREATE TABLE IF NOT EXISTS `enlaces_movil` (
  `id_enlace` int NOT NULL AUTO_INCREMENT,
  `enlace` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `id_juego` int NOT NULL,
  PRIMARY KEY (`id_enlace`),
  KEY `id_juego` (`id_juego`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `enlaces_movil`
--

INSERT INTO `enlaces_movil` (`id_enlace`, `enlace`, `id_juego`) VALUES
(12, 'https://persona.atlus.com/p5r/?lang=en#', 75),
(11, 'https://persona.atlus.com/p5r/?lang=en#', 74);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlaces_pc`
--

DROP TABLE IF EXISTS `enlaces_pc`;
CREATE TABLE IF NOT EXISTS `enlaces_pc` (
  `id_enlace` int NOT NULL AUTO_INCREMENT,
  `enlace` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `id_juego` int NOT NULL,
  PRIMARY KEY (`id_enlace`),
  KEY `id_juego` (`id_juego`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `enlaces_pc`
--

INSERT INTO `enlaces_pc` (`id_enlace`, `enlace`, `id_juego`) VALUES
(10, 'https://persona.atlus.com/p5r/?lang=en#', 75),
(9, 'https://persona.atlus.com/p5r/?lang=en#', 74);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

DROP TABLE IF EXISTS `etiquetas`;
CREATE TABLE IF NOT EXISTS `etiquetas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id`, `nombre`) VALUES
(1, 'Combate por turnos'),
(2, 'Anime'),
(3, 'Un jugador'),
(4, 'Shooter'),
(5, 'roguelike'),
(6, 'Rol'),
(7, 'Mundo abierto'),
(8, 'VR'),
(9, 'MOBA'),
(10, 'Estrategia'),
(11, 'Novela visual'),
(12, 'Ritmo'),
(13, 'Accion'),
(14, 'Terror Psicologico'),
(15, 'Simulacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

DROP TABLE IF EXISTS `favoritos`;
CREATE TABLE IF NOT EXISTS `favoritos` (
  `id_usuario` int NOT NULL,
  `id_juego` int NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_juego`),
  KEY `id_juego` (`id_juego`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`id_usuario`, `id_juego`) VALUES
(21, 47),
(21, 74),
(22, 47),
(22, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

DROP TABLE IF EXISTS `juegos`;
CREATE TABLE IF NOT EXISTS `juegos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `descripcion` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `descripcion_corta` varchar(450) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `valoracion` float DEFAULT NULL,
  `foto1` blob,
  `foto2` blob,
  `foto3` blob,
  `paginaOficial` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `etiqueta1` int DEFAULT NULL,
  `etiqueta2` int DEFAULT NULL,
  `etiqueta3` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `nombre`, `descripcion`, `descripcion_corta`, `valoracion`, `foto1`, `foto2`, `foto3`, `paginaOficial`, `etiqueta1`, `etiqueta2`, `etiqueta3`) VALUES
(75, 'HOLAMODI', 'sasas', 'dadadadadada', NULL, 0x41464b4a312e77656270, 0x41464b4a312e77656270, 0x41464b4a322e6a706567, 'https://afkjourney.farlightgames.com/', 1, 2, 3),
(74, 'MODIFICADO', 'sasa', 'sasasas', 5, 0x41464b4a332e77656270, 0x41464b4a322e6a706567, 0x41464b4a312e77656270, 'https://afkjourney.farlightgames.com/', 1, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugerencias_juegos`
--

DROP TABLE IF EXISTS `sugerencias_juegos`;
CREATE TABLE IF NOT EXISTS `sugerencias_juegos` (
  `id_sugerencia` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `Descripcion` varchar(1000) DEFAULT NULL,
  `enlace_pc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `enlace_movil` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `enlace_consola` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pagOficial` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_sugerencia`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `sugerencias_juegos`
--

INSERT INTO `sugerencias_juegos` (`id_sugerencia`, `nombre`, `Descripcion`, `enlace_pc`, `enlace_movil`, `enlace_consola`, `pagOficial`) VALUES
(12, 'HOLAMODI', 'sasas', 'https://persona.atlus.com/p5r/?lang=en#', 'https://persona.atlus.com/p5r/?lang=en#', 'https://persona.atlus.com/p5r/?lang=en#', 'https://afkjourney.farlightgames.com/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `rol` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `contrasena` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `rol`, `correo`, `contrasena`) VALUES
(19, 'Daniel Alejandro', 'MODIFICAsasasDOaaaaa', 'admin', 'admin10@example.com', '$2y$10$Xfrne76QlEFf5/xmvBXtW.nyuGqyY47XVic1so7.yNpdu3oQjDfZS'),
(13, 'Daniel Alejandro', 'MODIFICAsasasDOaaaaa', 'admin', 'admin1@example.com', '$2y$10$OrnHaMJNU6YZXiwwg07LSeCiZbh7YY27hkWbC8G6V1k34v3t.L7vi'),
(15, 'Daniel Alejandro', 'MODIFICAsasasDOaaaaa', 'admin', '', '$2y$10$z4gJ82Qacw3HRrkRV8uUoumagqOn5VK/3OLLtw7QqS3GAG7.4Kdsq'),
(16, 'Daniel Alejandro', 'MODIFICAsasasDOaaaaaaaasasas', 'admin', 'admin2@example.com', '$2y$10$jnwaVk12YEYKNSW7F22EW.6I4.9NYWzGfdFpp8wVXnhSpo79jPCkC'),
(17, 'Daniel Alejandro', 'MODIFICAsasasDOaaaaa', 'admin', 'admin3@example.com', '$2y$10$6vJQ38zfqvD/EBffNlXqy.DKPmcblp4YRtaJ5mhGa.3CZmjJmk/8K'),
(18, 'Daniel Alejandro', 'MODIFICAsasasDOaaaaa', 'user', 'hola@gmail.com', '$2y$10$6iTj3eWbdD.ZTzXg4AgSR.XkzUYOxWFC9sHuD2wiEJtRpGr8DRKn2'),
(20, 'Daniel Alejandro', 'MODIFICAsasasDOaaaaa', 'admin', 'admin11@example.com', '$2y$10$gqtAI3Puktpc98bQArpbbu1RvS.6bnwfFhmxg/3c/r8Pck4y88amW'),
(21, 'Daniel Alejandro', 'Molina Galvez', 'user', 'user10@example.com', '$2y$10$0RFlXnM7.OZ.6ZfdtIU5juJY8vbE32IMqidUEA4sonErrXPvM//SO'),
(22, 'Daniel Alejandro', 'MODIFICA sasasDOaaaaa', 'user', 'userG@hotmail.com', '$2y$10$.pUIw9uGFtGz1Q3vVjxh/eSLpUYJ90z9KaXCxgPOiObsDhMWD2RaC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
