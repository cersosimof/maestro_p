-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-10-2018 a las 03:33:39
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

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
  `cuit` int(13) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveeores`
--

INSERT INTO `proveeores` (`idEmpresa`, `nombre`, `correo`, `telefono`, `contacto`, `ramo`, `cuit`, `pass`) VALUES
(83, 'PHP', 'cersosimo.facundo@gmail.com', '4444444', 'PHP', 'PHP', 444444, 'php'),
(84, 'PHP', 'PHP@PHP.COM', '4444', 'PHP', 'PHP', 4444, '2fec392304a5c23ac138da22847f9b7c'),
(85, 'PHP', 'PHP@PHP.COM', '4444', 'PHP PHP', 'PHP', 444, 'aa62487937b5dd83cd483471493eac3c');

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
  MODIFY `idEmpresa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
