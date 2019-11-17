-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2019 a las 02:09:03
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_postal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adminreporte`
--

CREATE TABLE `adminreporte` (
  `idReporte` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombre` varchar(16) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombre`, `rating`) VALUES
(1, 'Cumpleaños', 0),
(2, 'Amistad', 0),
(3, 'Amor', 0),
(4, 'Saludos', 0),
(5, 'Invitación', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postal`
--

CREATE TABLE `postal` (
  `idPostal` int(11) NOT NULL,
  `nombre` varchar(16) NOT NULL,
  `rating` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `ruta` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `postal`
--

INSERT INTO `postal` (`idPostal`, `nombre`, `rating`, `idCategoria`, `ruta`) VALUES
(1, 'image1.png', 0, 1, 'cumpleanos/image1.png\r'),
(2, 'image2.png', 0, 1, 'cumpleanos/image2.png\r'),
(3, 'image3.png', 0, 1, 'cumpleanos/image3.png\r'),
(4, 'image4.png', 0, 1, 'cumpleanos/image4.png\r'),
(5, 'image5.png', 0, 1, 'cumpleanos/image5.png\r'),
(6, 'image6.png', 0, 1, 'cumpleanos/image6.png\r'),
(7, 'image1.png', 0, 2, 'amistad/image1.png\r'),
(8, 'image2.png', 0, 2, 'amistad/image2.png\r'),
(9, 'image3.png', 0, 2, 'amistad/image3.png\r'),
(10, 'image4.png', 0, 2, 'amistad/image4.png\r'),
(11, 'image5.png', 0, 2, 'amistad/image5.png\r'),
(12, 'image6.png', 0, 2, 'amistad/image6.png\r'),
(13, 'image1.png', 0, 3, 'amor/image1.png\r'),
(14, 'image2.png', 0, 3, 'amor/image2.png\r'),
(15, 'image3.png', 0, 3, 'amor/image3.png\r'),
(16, 'image4.png', 0, 3, 'amor/image4.png\r'),
(17, 'image5.png', 0, 3, 'amor/image5.png\r'),
(18, 'image6.png', 0, 3, 'amor/image6.png\r'),
(19, 'image1.png', 0, 4, 'saludos/image1.png\r'),
(20, 'image2.png', 0, 4, 'saludos/image2.png\r'),
(21, 'image3.png', 0, 4, 'saludos/image3.png\r'),
(22, 'image4.png', 0, 4, 'saludos/image4.png\r'),
(23, 'image5.png', 0, 4, 'saludos/image5.png\r'),
(24, 'image6.png', 0, 4, 'saludos/image6.png\r'),
(25, 'image1.png', 0, 5, 'invitacion/image1.png\r'),
(26, 'image2.png', 0, 5, 'invitacion/image2.png\r'),
(27, 'image3.png', 0, 5, 'invitacion/image3.png\r'),
(28, 'image4.png', 0, 5, 'invitacion/image4.png\r'),
(29, 'image5.png', 0, 5, 'invitacion/image5.png\r'),
(30, 'image6.png', 0, 5, 'invitacion/image6.png\r');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `idReporte` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `genero` char(1) NOT NULL,
  `fechaNac` date NOT NULL,
  `privilegio` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `contrasena`, `email`, `celular`, `genero`, `fechaNac`, `privilegio`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'RRekon@hotmail.com', '5579101570', 'M', '1998-04-24', 1),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'rodrigoreal9@gmail.com', '5529857787', 'm', '1998-08-22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariopostal`
--

CREATE TABLE `usuariopostal` (
  `email` varchar(32) NOT NULL,
  `idPostal` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `emailDestinatario` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adminreporte`
--
ALTER TABLE `adminreporte`
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idReporte` (`idReporte`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `postal`
--
ALTER TABLE `postal`
  ADD PRIMARY KEY (`idPostal`),
  ADD KEY `postal_ibfk_1` (`idCategoria`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`idReporte`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `usuariopostal`
--
ALTER TABLE `usuariopostal`
  ADD KEY `email` (`email`),
  ADD KEY `idPostal` (`idPostal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `postal`
--
ALTER TABLE `postal`
  MODIFY `idPostal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adminreporte`
--
ALTER TABLE `adminreporte`
  ADD CONSTRAINT `adminreporte_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `adminreporte_ibfk_2` FOREIGN KEY (`idReporte`) REFERENCES `reporte` (`idReporte`) ON DELETE CASCADE;

--
-- Filtros para la tabla `postal`
--
ALTER TABLE `postal`
  ADD CONSTRAINT `postal_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariopostal`
--
ALTER TABLE `usuariopostal`
  ADD CONSTRAINT `usuariopostal_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuariopostal_ibfk_2` FOREIGN KEY (`idPostal`) REFERENCES `postal` (`idPostal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
