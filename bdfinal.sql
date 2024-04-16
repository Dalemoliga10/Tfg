-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-04-2024 a las 16:42:30
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
-- Estructura de tabla para la tabla `enlaces_consola`
--
CREATE DATABASE IF NOT EXISTS `bdfinal`;

SELECT DATABASE ("bdfinal");

DROP TABLE IF EXISTS `enlaces_consola`;
CREATE TABLE IF NOT EXISTS `enlaces_consola` (
  `id_enlace` int NOT NULL AUTO_INCREMENT,
  `enlace` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `id_juego` int NOT NULL,
  PRIMARY KEY (`id_enlace`),
  KEY `id_juego` (`id_juego`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

DROP TABLE IF EXISTS `etiquetas`;
CREATE TABLE IF NOT EXISTS `etiquetas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id`, `nombre`) VALUES
(1, 'Combate por turnos'),
(2, 'Anime'),
(3, 'Un jugador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

DROP TABLE IF EXISTS `juegos`;
CREATE TABLE IF NOT EXISTS `juegos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `valoracion` float DEFAULT NULL,
  `foto1` blob,
  `foto2` blob,
  `foto3` blob,
  `paginaOficial` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `etiqueta1` int DEFAULT NULL,
  `etiqueta2` int DEFAULT NULL,
  `etiqueta3` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `juegos`
--

-- INSERT INTO `juegos` (`id`, `nombre`, `descripcion`, `valoracion`, `foto1`, `foto2`, `foto3`, `paginaOficial`, `etiqueta1`, `etiqueta2`, `etiqueta3`) VALUES
-- (3, 'Persona 5', 'Ponte la máscara, acompaña a los Ladrones Fantasma de Corazones en sus asaltos ¡e infíltrate en la mente de los corruptos para hacerles cambiar de opinión!', NULL, 0x506572736f6e61352e6a7067, NULL, NULL, NULL, 1, NULL, NULL),
-- (10, 'Subnautica', 'Desciende a las profundidades de un mundo submarino alienígena lleno de belleza y peligros. Crea equipamiento, pilota submarinos, terraforma el terreno, y burla los peligros para explorar exhuberantes', NULL, 0x7375626e617574696361312e6a7067, 0x7375626e617574696361322e77656270, 0x7375626e617574696361332e6a7067, NULL, NULL, NULL, NULL),
-- (12, 'hola', 'sasasasasa', NULL, 0x7375626e617574696361312e6a7067, 0x687372332e77656270, 0x6873722e6a706567, NULL, NULL, NULL, NULL),
-- (13, 'hola2', 'sasasasasa', NULL, 0x7375626e617574696361312e6a7067, 0x687372332e77656270, 0x6873722e6a706567, NULL, NULL, NULL, NULL),
-- (14, 'hola3', 'sasasasasa', NULL, 0x7375626e617574696361312e6a7067, 0x687372332e77656270, 0x6873722e6a706567, NULL, NULL, NULL, NULL),
-- (15, 'hola4', 'sasasasasa', NULL, 0x7375626e617574696361312e6a7067, 0x687372332e77656270, 0x6873722e6a706567, NULL, NULL, NULL, NULL),
-- (16, 'hola4sasa', 'sasasasasa', NULL, 0x7375626e617574696361312e6a7067, 0x687372332e77656270, 0x6873722e6a706567, NULL, NULL, NULL, NULL),
-- (11, 'Honkai: Star Rail', 'sasasasasasasasasasassasasasasasasasasasassasasasasasasasasasassasasasasasasasasasas', NULL, 0x6873722e6a706567, 0x687372322e706e67, 0x687372332e77656270, NULL, NULL, NULL, NULL);

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
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
