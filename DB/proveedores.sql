-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2017 a las 18:38:54
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proveedores`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveeores`
--

CREATE TABLE `proveeores` (
  `idEmpresa` int(4) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `ramo` text NOT NULL,
  `cuit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveeores`
--

INSERT INTO `proveeores` (`idEmpresa`, `nombre`, `correo`, `telefono`, `contacto`, `ramo`, `cuit`) VALUES
(13, 'Garbarino', '111', '111', '111', 'uno, dos, tres', 2147483647),
(14, 'Fravega', '22', '22', '22', 'dos, tres, cuatro', 2147483647),
(15, 'Musimundo', '33', '33', '33', 'tres, cuatro, cinco', 2147483647),
(16, 'Ribeiro', '44', '44', '44', 'cuatro, cinco, seis', 2147483647),
(17, 'Hiper', '55', '55', '55', 'seis, siete, ocho', 2147483647),
(19, 'Patri', 'patri@lamastrola.com', '0810-patri', 'LAPATRI', 'puta, trola, re gato', 2147483647);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proveeores`
--
ALTER TABLE `proveeores`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proveeores`
--
ALTER TABLE `proveeores`
  MODIFY `idEmpresa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
