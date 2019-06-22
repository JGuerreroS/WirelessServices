-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2019 a las 02:06:38
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tecnoacosta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causas`
--

CREATE TABLE `causas` (
  `id_causa` int(11) NOT NULL,
  `causa` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `causas`
--

INSERT INTO `causas` (`id_causa`, `causa`) VALUES
(1, 'SUSPENCIÓN POR FALTA DE PAGO'),
(2, 'SUSPENCIÓN POR CAMBIO DE PROVEEDOR'),
(3, 'SUSPENCIÓN POR TERMINO DE CONTRATO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `apellidos` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `rut` varchar(11) COLLATE latin1_general_ci NOT NULL,
  `telefono` varchar(11) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(70) COLLATE latin1_general_ci NOT NULL,
  `clave` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `id_plan` int(11) NOT NULL,
  `id_dispositivo` int(11) NOT NULL,
  `direccion` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `fecha_instalacion` date NOT NULL,
  `fecha_pago` int(2) NOT NULL,
  `id_estatus` int(11) NOT NULL DEFAULT '1',
  `id_usuario` int(11) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `rut`, `telefono`, `email`, `clave`, `id_plan`, `id_dispositivo`, `direccion`, `fecha_instalacion`, `fecha_pago`, `id_estatus`, `id_usuario`, `fecha_registro`) VALUES
(3, 'JOHN ALEXANDER', 'GUERRERO SOLON', '18762905-1', '0414-232573', 'guerrerojohnalexander@gmail.com', '$2y$10$Z8JWmnWVebpiMenUoUtveu27PRqXhA5HIduu.qpEHtibcB83dDt9O', 5, 13, 'SAN AGUSTÍN', '2019-05-13', 13, 1, 1, '2019-05-13'),
(5, 'ZULAY', 'TRINIDAD', '18959181-8', '04168195691', 'BOHORQUEZZULAY95@GMAIL.COM', '$2y$10$WY2BLJET8wwlsO.sOGJgkOiVwFWMQdbGtHylEkBDCvtrivC15bjEi', 6, 16, 'SAN AGUSTÍN', '2019-06-12', 12, 2, 1, '2019-06-12'),
(6, 'ZULAY', 'TRINIDAD', '18959181-7', '04168195691', 'BOHORQUEZZULAY95@GMAIL.COM', '$2y$10$.M6V4i5Vtw2Sx3sZCd.Wj.jzjlMnt3wCUqjQeCmoE8rVWPAhiw8n2', 2, 13, 'SAN AGUSTÍN', '2019-06-12', 13, 2, 1, '2019-06-13'),
(7, 'JOHN', 'GUERRERO', '10176295-5', '5455121555', 'sdvsd@dfg.com', '$2y$10$vV8EpV5d3OJWDdUThxl6xeXqu.bN28IyU7q4VG/o74FPf8VNranDC', 1, 13, 'FWEFGER', '2019-06-12', 20, 1, 1, '2019-06-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenios`
--

CREATE TABLE `convenios` (
  `id_convenio` int(11) NOT NULL,
  `nombre_cliente` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `direccion` text COLLATE latin1_general_ci NOT NULL,
  `id_dispositivo` int(11) NOT NULL,
  `materiales` text COLLATE latin1_general_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `id_estatus` int(11) NOT NULL,
  `id_causa` int(11) NOT NULL,
  `fecha_egreso` date NOT NULL,
  `egresado_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE `facturacion` (
  `id_factura` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_plan` int(11) NOT NULL,
  `costo` double NOT NULL,
  `fecha_pago` date NOT NULL COMMENT 'día en el cual el cliente cancelo la factura',
  `referencia` text COLLATE latin1_general_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `marca` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `marca`) VALUES
(1, 'SONY'),
(2, 'TP LINK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `id_modelo` int(11) NOT NULL,
  `modelo` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`id_modelo`, `modelo`) VALUES
(13, 'ROUTER (TP LINK)'),
(14, 'ANTENA 2.4 GHZ (UBIQUITI NANOLOCO M5)'),
(15, 'UBIQUITI POWERBEAM M5 + ROUTER TP LINK'),
(16, 'ANTENA UBIQUITI NANOLOCO M5 5GHZ + ROUTER TP LINK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id_plan` int(11) NOT NULL,
  `plan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `costo` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id_plan`, `plan`, `costo`) VALUES
(1, 'PLAN MICRO', '11000'),
(2, 'PLAN BÁSICO', '15000'),
(5, 'PLAN HOGAR', '20000'),
(6, 'PLAN PREMIUM', '25000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `Id` mediumint(8) NOT NULL,
  `Name` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `Usuario` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `Password` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `nivel` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL COMMENT 'usuario que esta registrando',
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`Id`, `Name`, `Usuario`, `Password`, `nivel`, `id_usuario`, `fecha_registro`) VALUES
(1, 'NELSON ACOSTA', 'nelsonacostavargas@yahoo.com', '$2y$10$ldWWDyFFM1.wNq5Gy0KVjuQant0q7OTQ6vkfxN7Fi9eWjajIDz1.a', 1, 1, '2019-02-03'),
(2, 'JOHN', 'guerrerojohnalexander@gmail.com', '$2y$10$58gPaupTYwweb21WXl7yfO.NzO9INBFBHIBR40yZcb3EQzMkMTZ1G', 1, 1, '2019-06-13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `causas`
--
ALTER TABLE `causas`
  ADD PRIMARY KEY (`id_causa`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`id_convenio`);

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id_modelo`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `causas`
--
ALTER TABLE `causas`
  MODIFY `id_causa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `convenios`
--
ALTER TABLE `convenios`
  MODIFY `id_convenio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `Id` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
