-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2024 a las 01:30:35
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id` int(11) NOT NULL,
  `nombreAsignatura` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `horas` varchar(250) NOT NULL,
  `profesor` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id`, `nombreAsignatura`, `descripcion`, `horas`, `profesor`) VALUES
(8, 'PHP', 'Aprende sobre PHP y bases de datos.', '4', 'Max'),
(9, 'Matematicas', 'Calculo', '5', 'Sarao'),
(10, 'Fisica', 'Hola', '20', 'MAteo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_maestro` int(11) NOT NULL,
  `anotacion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `id_alumno`, `id_maestro`, `anotacion`, `fecha`) VALUES
(1, 7, 8, 'No hizo tarea', '2024-10-11 12:03:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases_asignadas`
--

CREATE TABLE `clases_asignadas` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `id_maestro` int(11) NOT NULL,
  `calificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clases_asignadas`
--

INSERT INTO `clases_asignadas` (`id`, `id_alumno`, `id_asignatura`, `id_maestro`, `calificacion`) VALUES
(1, 2, 8, 4, NULL),
(2, 2, 8, 5, NULL),
(3, 2, 8, 5, NULL),
(4, 4, 9, 6, NULL),
(5, 4, 8, 6, NULL),
(6, 5, 8, 6, NULL),
(7, 7, 9, 8, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `email`, `mensaje`, `fecha`) VALUES
(1, 'pablo', 'salomonpablo@gmail.com', 'no responde el sitio', '2024-10-11 19:51:40'),
(2, 'pablo', 'salomonpablo087@gmail.com', 'sadasdsafd', '2024-10-11 20:01:03'),
(3, 'pablo', 'salomonpablo087@gmail.com', 'AAAAAAAAAAA', '2024-10-11 20:05:06'),
(4, 'pablo', 'salomonpablo087@gmail.com', 'asd', '2024-10-11 20:11:14'),
(5, 'asasdasd sssA', 'salomonpablo0870@gmail.com', 'aaaaaaaaaaaaaaaaa', '2024-10-11 20:11:33'),
(6, 'Rueda chan', 'zlkoz@gmail.com', 'no jala la apgina', '2024-10-11 20:13:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `cedula` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`id`, `nombre`, `apellido`, `email`, `cedula`, `password`) VALUES
(4, 'Maximiliano', 'Perez', 'admin@dominio.com', '1234', '$2y$10$HZRM194qZNJNJ.IVKwnda.TpaFAJDShtrvCbakSyrJRnDQ1NqXYGq'),
(5, 'pablo', 'salomon', 'salomonpablo649@gmail.com', '123456', '$2y$10$eAlGQRIUNG6AOvwcfaOIauIDSPlCVKUpsLkChuO4szKYL8SG9nGZ.'),
(6, 'Danna', 'salomon', 'salomonpablo@gmail.com', '123456', '$2y$10$u07W0sN9pPANE9FP8o4p6uZOUSq.LCwFl3PGyO2E5n9oWmOgRCqli'),
(7, 'PEDRO', 'PERZ', 'salomonpablo087@gmail.com', '19281338', '$2y$10$9nxo6O0JwgtriJinE3aYle0.2I9MVrMRyoIG37OIrwzSvMKukrMoO'),
(8, 'HOLA 1232', 'MENDEZ OCHOA', 'salomon@gmail.com', '19281338', '$2y$10$M9byprZmefhmuW42MMSDNOtearCuxs5MXjUqgb2kvuurlvh8PdRs2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_alumnos`
--

CREATE TABLE `registro_alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `matricula` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_alumnos`
--

INSERT INTO `registro_alumnos` (`id`, `nombre`, `apellido`, `email`, `matricula`, `password`) VALUES
(2, 'Gustavo', 'Inurreta', 'alu.11@dominio.com', '5678', '$2y$10$8mGbChMxVKpFaDqZcRscnuKmwcGKULP/N8ojfUPPvHZqNWOebxcni'),
(3, 'leonel', 'salomon', 'salomonpablo648@gmail.com', '1234', '$2y$10$TIx2QWtrOV7qFjjj5SrLcOoh9y7Z2t/UkU326D38wcHykbzmzkemy'),
(4, 'Danny', 'salomon', 'salomonpablo54@gmail.com', '2411328', '$2y$10$1t3nU.BMRAUG8x149oV7P.Y5wZEgf3pJjgLP1GRLnXBa1ZTW417ju'),
(5, 'pablo', 'salomon', 'salomonpablo087@gmail.com', '2411328', '$2y$10$F6mJ1xSxBsTD1wP0ItpWAOthZzHd2hNsh9TGhXtrKa2ORsUaejOiu'),
(6, 'pablo', 'salomon', 'salomonpablo087@gmail.com', '2411328', '$2y$10$b.GSva4m9XVSAZUG0hZWoeQe/ManzkVVeoYuilWCOXvJBLPJQCXd.'),
(7, 'Maximos', 'tostado', 'zlkoz@gmail.com', '12345', '$2y$10$l2VM3rjyF5wj5U8dMsnRx.O24JWqXhijyCnsshhN9jAcBBKtdoxiu');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_maestro` (`id_maestro`);

--
-- Indices de la tabla `clases_asignadas`
--
ALTER TABLE `clases_asignadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_maestro` (`id_maestro`),
  ADD KEY `id_asignatura` (`id_asignatura`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_alumnos`
--
ALTER TABLE `registro_alumnos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clases_asignadas`
--
ALTER TABLE `clases_asignadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `registro_alumnos`
--
ALTER TABLE `registro_alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `registro_alumnos` (`id`),
  ADD CONSTRAINT `bitacora_ibfk_2` FOREIGN KEY (`id_maestro`) REFERENCES `maestros` (`id`);

--
-- Filtros para la tabla `clases_asignadas`
--
ALTER TABLE `clases_asignadas`
  ADD CONSTRAINT `clases_asignadas_ibfk_1` FOREIGN KEY (`id_maestro`) REFERENCES `maestros` (`id`),
  ADD CONSTRAINT `clases_asignadas_ibfk_2` FOREIGN KEY (`id_asignatura`) REFERENCES `asignaturas` (`id`),
  ADD CONSTRAINT `clases_asignadas_ibfk_3` FOREIGN KEY (`id_alumno`) REFERENCES `registro_alumnos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
