<?php

// Drop table comentarios if it exists
$query = "DROP TABLE IF EXISTS comentarios;";
// Execute the query

// Create table comentarios
$query = "CREATE TABLE IF NOT EXISTS comentarios (
  id_comentario int NOT NULL AUTO_INCREMENT,
  id_usuario int NOT NULL,
  id_juego int NOT NULL,
  valoracion float NOT NULL,
  Comentario varchar(100) NOT NULL,
  PRIMARY KEY (id_comentario),
  KEY FK_idJuego (id_juego),
  KEY FK_usuario (id_usuario)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;";
// Execute the query


// Drop table enlaces_consola if it exists
$query = "DROP TABLE IF EXISTS enlaces_consola;";
// Execute the query

// Create table enlaces_consola
$query = "CREATE TABLE IF NOT EXISTS enlaces_consola (
  id_enlace int NOT NULL AUTO_INCREMENT,
  enlace varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  id_juego int NOT NULL,
  PRIMARY KEY (id_enlace),
  KEY id_juego (id_juego)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;";
// Execute the query

// SQL to create enlaces_movil table
$sql_enlaces_movil = "CREATE TABLE IF NOT EXISTS enlaces_movil (
    id_enlace INT NOT NULL AUTO_INCREMENT,
    enlace VARCHAR(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
    id_juego INT NOT NULL,
    PRIMARY KEY (id_enlace),
    KEY id_juego (id_juego)
  ) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci";

//Crear aqui

// SQL to create enlaces_pc table
$sql_enlaces_pc = "CREATE TABLE IF NOT EXISTS enlaces_pc (
    id_enlace INT NOT NULL AUTO_INCREMENT,
    enlace VARCHAR(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
    id_juego INT NOT NULL,
    PRIMARY KEY (id_enlace),
    KEY id_juego (id_juego)
  ) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci";

// Insert data into 'etiquetas' table
$sql = "INSERT INTO `etiquetas` (`id`, `nombre`) VALUES
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
(15, 'Simulacion')";

//Crear la llamada


// Create 'favoritos' table
$sql = "CREATE TABLE IF NOT EXISTS `favoritos` (
  `id_usuario` int NOT NULL,
  `id_juego` int NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_juego`),
  KEY `id_juego` (`id_juego`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";

//Crear la llamada



// Create 'juegos' table
$sql = "CREATE TABLE IF NOT EXISTS `juegos` (
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
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci";

//Crear la llamada


// Create 'sugerencias_juegos' table
$sql = "CREATE TABLE IF NOT EXISTS `sugerencias_juegos` (
  `id_sugerencia` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `Descripcion` varchar(1000) DEFAULT NULL,
  `enlace_pc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `enlace_movil` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `enlace_consola` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pagOficial` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_sugerencia`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";

//Crear la llamada


// Insert data into 'sugerencias_juegos' table
$sql = "INSERT INTO `sugerencias_juegos` (`id_sugerencia`, `nombre`, `Descripcion`, `enlace_pc`, `enlace_movil`, `enlace_consola`, `pagOficial`) VALUES
(12, 'HOLAMODI', 'sasas', 'https://persona.atlus.com/p5r/?lang=en#', 'https://persona.atlus.com/p5r/?lang=en#', 'https://persona.atlus.com/p5r/?lang=en#', 'https://afkjourney.farlightgames.com/')";

//Crear la llamada



// Create 'usuarios' table
$sql = "CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `rol` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `contrasena` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci";

//Crear la llamada

// Insert data into 'usuarios' table
$sql = "INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `rol`, `correo`, `contrasena`) VALUES
(19, 'Daniel Alejandro', 'MODIFICAsasasDOaaaaa', 'admin', 'admin10@example.com', '$2y$10$Xfrne76QlEFf5/xmvBXtW.nyuGqyY47XVic1so7.yNpdu3oQjDfZS'),
(13, 'Daniel Alejandro', 'MODIFICAsasasDOaaaaa', 'admin', 'admin1@example.com', '$2y$10$OrnHaMJNU6YZXiwwg07LSeCiZbh7YY27hkWbC8G6V1k34v3t.L7vi'),
(15, 'Daniel Alejandro', 'MODIFICAsasasDOaaaaa', 'admin', '', '$2y$10$z4gJ82Qacw3HRrkRV8uUoumagqOn5VK/3OLLtw7QqS3GAG7.4Kdsq'),
(16, 'Daniel Alejandro', 'MODIFICAsasasDOaaaaaaaasasas', 'admin', 'admin2@example.com', '$2y$10$jnwaVk12YEYKNSW7F22EW.6I4.9NYWzGfdFpp8wVXnhSpo79jPCkC'),
(17, 'Daniel Alejandro', 'MODIFICAsasasDOaaaaa', 'admin', 'admin3@example.com', '$2y$10$6vJQ38zfqvD/EBffNlXqy.DKPmcblp4YRtaJ5mhGa.3CZmjJmk/8K'),
(18, 'Daniel Alejandro', 'MODIFICAsasasDOaaaaa', 'user', 'hola@gmail.com', '$2y$10$6iTj3eWbdD.ZTzXg4AgSR.XkzUYOxWFC9sHuD2wiEJtRpGr8DRKn2'),
(20, 'Daniel Alejandro', 'MODIFICAsasasDOaaaaa', 'admin', 'admin11@example.com', '$2y$10$gqtAI3Puktpc98bQArpbbu1RvS.6bnwfFhmxg/3c/r8Pck4y88amW'),
(21, 'Daniel Alejandro', 'Molina Galvez', 'user', 'user10@example.com', '$2y$10$0RFlXnM7.OZ.6ZfdtIU5juJY8vbE32IMqidUEA4sonErrXPvM//SO'),
(22, 'Daniel Alejandro', 'MODIFICA sasasDOaaaaa', 'user', 'userG@hotmail.com', '$2y$10$.pUIw9uGFtGz1Q3vVjxh/eSLpUYJ90z9KaXCxgPOiObsDhMWD2RaC')";



?>