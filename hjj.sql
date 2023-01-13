-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2023 a las 05:58:08
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
-- Base de datos: `hjj`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id` int(10) NOT NULL,
  `concepto` varchar(65) NOT NULL,
  `importe` double NOT NULL,
  `fecha_gasto` date NOT NULL,
  `idusuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id` int(10) NOT NULL,
  `tipo_id` int(10) NOT NULL,
  `nom_habitacion` varchar(20) NOT NULL,
  `planta` tinyint(1) NOT NULL,
  `disponible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id` int(10) NOT NULL,
  `reservacion_id` int(10) NOT NULL,
  `monto` double NOT NULL,
  `idusuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preciohabitacion`
--

CREATE TABLE `preciohabitacion` (
  `id` int(11) NOT NULL,
  `tipo_id` int(10) NOT NULL,
  `habitacion_id` int(10) NOT NULL,
  `tem_alta` double NOT NULL,
  `tem_baja` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcion`
--

CREATE TABLE `recepcion` (
  `id_cortecaja` int(10) NOT NULL,
  `folio_cortecaja` int(6) NOT NULL,
  `total_recibir` double NOT NULL,
  `total_entregar` double NOT NULL,
  `id_ingresos` int(10) NOT NULL,
  `id_gastos` int(10) NOT NULL,
  `fecha_caja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `idReservaciones` int(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `fecha_deps` date NOT NULL,
  `num_telefono` int(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `lugar_residencia` varchar(45) NOT NULL,
  `fecha_llegada` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `habitacion_id` int(2) NOT NULL,
  `no_personas` int(2) NOT NULL,
  `deposito` int(6) NOT NULL,
  `fecha_reservacion` date NOT NULL,
  `tipo_pago` text NOT NULL,
  `no_folio` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipohabitaciones`
--

CREATE TABLE `tipohabitaciones` (
  `id` int(10) NOT NULL,
  `tipo_habitacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido_pat` varchar(45) NOT NULL,
  `apellido_mat` varchar(45) NOT NULL,
  `telefono` int(10) NOT NULL,
  `email` varchar(35) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `turno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_id` (`tipo_id`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservacion_id` (`reservacion_id`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `preciohabitacion`
--
ALTER TABLE `preciohabitacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_id` (`tipo_id`),
  ADD KEY `habitacion_id` (`habitacion_id`);

--
-- Indices de la tabla `recepcion`
--
ALTER TABLE `recepcion`
  ADD PRIMARY KEY (`id_cortecaja`),
  ADD KEY `id_gastos` (`id_gastos`),
  ADD KEY `id_ingresos` (`id_ingresos`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`idReservaciones`),
  ADD KEY `habitacion_id` (`habitacion_id`);

--
-- Indices de la tabla `tipohabitaciones`
--
ALTER TABLE `tipohabitaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preciohabitacion`
--
ALTER TABLE `preciohabitacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recepcion`
--
ALTER TABLE `recepcion`
  MODIFY `id_cortecaja` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `idReservaciones` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipohabitaciones`
--
ALTER TABLE `tipohabitaciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `gastos_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gastos_ibfk_2` FOREIGN KEY (`id`) REFERENCES `recepcion` (`id_gastos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD CONSTRAINT `habitaciones_ibfk_1` FOREIGN KEY (`id`) REFERENCES `preciohabitacion` (`habitacion_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD CONSTRAINT `ingresos_ibfk_1` FOREIGN KEY (`id`) REFERENCES `recepcion` (`id_ingresos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preciohabitacion`
--
ALTER TABLE `preciohabitacion`
  ADD CONSTRAINT `preciohabitacion_ibfk_1` FOREIGN KEY (`tipo_id`) REFERENCES `tipohabitaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `reservaciones_ibfk_1` FOREIGN KEY (`habitacion_id`) REFERENCES `habitaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservaciones_ibfk_2` FOREIGN KEY (`idReservaciones`) REFERENCES `ingresos` (`reservacion_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipohabitaciones`
--
ALTER TABLE `tipohabitaciones`
  ADD CONSTRAINT `tipohabitaciones_ibfk_1` FOREIGN KEY (`id`) REFERENCES `habitaciones` (`tipo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `ingresos` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
