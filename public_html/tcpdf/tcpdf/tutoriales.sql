-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-08-2016 a las 00:16:05
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tutoriales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cosas`
--

CREATE TABLE `cosas` (
  `cosa_id` int(11) NOT NULL,
  `cosa_codigo_barra` varchar(100) NOT NULL,
  `cosa_nombre` varchar(50) NOT NULL,
  `cosa_manufacturero` varchar(100) NOT NULL,
  `cosa_imagen` varchar(100) NOT NULL,
  `cosa_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cosas`
--

INSERT INTO `cosas` (`cosa_id`, `cosa_codigo_barra`, `cosa_nombre`, `cosa_manufacturero`, `cosa_imagen`, `cosa_registro`) VALUES
(1, '71949416151351565', 'Mesa', 'Corporacion Madera S.A.', 'mesa.jpg', '2016-08-05 01:00:00'),
(2, '71949416662141565', 'Puerta', 'Corporacion Madera S.A.', 'puerta.jpg', '2016-08-05 00:00:00'),
(3, '71415596522622001', 'Cama', 'Distribuiciones DeTodo E.I.R.L.', 'cama.jpg', '2016-08-05 00:00:00'),
(4, '71000511104998874', 'Televisor', 'Distribuiciones DeTodo E.I.R.L.', 'televisor.jpg', '2016-08-04 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_codigo` varchar(8) NOT NULL,
  `usu_nombres` varchar(50) NOT NULL,
  `usu_apellidos` varchar(50) NOT NULL,
  `usu_nacimiento` date NOT NULL,
  `usu_sexo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_codigo`, `usu_nombres`, `usu_apellidos`, `usu_nacimiento`, `usu_sexo`) VALUES
(1, '11111111', 'Kevin Rodrigo', 'Avalos Cama', '1992-09-23', 'M'),
(2, '22222222', 'Gerardo Manuel', 'Martinez Perez', '1990-01-11', 'M'),
(3, '33333333', 'Fernanda Brigida', 'Borda Beltran', '1993-08-22', 'F'),
(4, '44444444', 'Maria Luisa', 'Estrada Soto', '1990-12-10', 'F'),
(5, '55555555', 'Pedro Pablo', 'Rodriguez Boado', '1989-06-19', 'M'),
(6, '66666666', 'Mario Pilatos', 'Forlan Ganster', '1988-01-10', 'M');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cosas`
--
ALTER TABLE `cosas`
  ADD PRIMARY KEY (`cosa_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`),
  ADD UNIQUE KEY `usu_codigo` (`usu_codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cosas`
--
ALTER TABLE `cosas`
  MODIFY `cosa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
