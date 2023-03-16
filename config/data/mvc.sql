-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2023 a las 00:44:38
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`) VALUES
(1, 'Jhon Sandoval 2', 'jhon_sandoval@gmail.com', '946489542'),
(2, 'Nicol Alejandro', 'nicol@hotmail.com', '965223978'),
(3, 'Rosmery Chávez', 'romy@gmail.com', '964189562'),
(4, 'Jeremy Sandoval', 'jeremy@gmail.com', '964517823'),
(5, 'Luis Viera', 'lviera@gmail.com', '946412123'),
(6, 'Luis Viera', 'lviera@gmail.com', '946412123'),
(7, 'Luis Viera', 'lviera@gmail.com', '946412123'),
(8, 'Luis Viera', 'lviera@gmail.com', '946412123'),
(9, 'Luis Viera', 'lviera@gmail.com', '946412123'),
(10, 'Luis Viera', 'lviera@gmail.com', '946412123'),
(11, 'Luis Viera', 'lviera@gmail.com', '946412123'),
(12, 'Luis Viera', 'lviera@gmail.com', '946412123'),
(13, 'Luis Viera', 'lviera@gmail.com', '946412123'),
(14, 'Luis Viera', 'lviera@gmail.com', '946412123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
