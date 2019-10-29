-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 29-10-2019 a las 16:44:08
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
(2, 'San Valentín', 0),
(3, 'Halloween', 0),
(4, 'Navidad', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriapostal`
--

CREATE TABLE `categoriapostal` (
  `idCategoria` int(11) NOT NULL,
  `idPostal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postal`
--

CREATE TABLE `postal` (
  `idPostal` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(16) NOT NULL,
  `rating` int(11) NOT NULL,
  `fechaEnvio` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `privilegio` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `contrasena`, `email`, `celular`, `genero`, `fechaNac`, `privilegio`) VALUES
(1, 'admin', 'admin', 'RRekon@hotmail.com', '5579101570', 'M', '1998-04-24', 1);

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
-- Indices de la tabla `categoriapostal`
--
ALTER TABLE `categoriapostal`
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idPostal` (`idPostal`);

--
-- Indices de la tabla `postal`
--
ALTER TABLE `postal`
  ADD PRIMARY KEY (`idPostal`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`idReporte`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

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
  MODIFY `idPostal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Filtros para la tabla `categoriapostal`
--
ALTER TABLE `categoriapostal`
  ADD CONSTRAINT `categoriapostal_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `categoriapostal_ibfk_2` FOREIGN KEY (`idPostal`) REFERENCES `postal` (`idPostal`);

--
-- Filtros para la tabla `postal`
--
ALTER TABLE `postal`
  ADD CONSTRAINT `postal_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);
