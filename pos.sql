-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2021 a las 15:47:37
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `id` int(11) NOT NULL,
  `numero_caja` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `folio` int(11) NOT NULL,
  `activo` tinyint(4) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`id`, `numero_caja`, `nombre`, `folio`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
(1, '1', 'caja general', 1, 1, '2021-09-10 00:55:24', NULL),
(2, '2', 'caja secudaria', 1, 1, '2021-09-10 00:55:24', NULL),
(3, '1', 'caja general', 1, 1, '2021-09-10 00:55:33', NULL),
(4, '2', 'caja secudaria', 1, 1, '2021-09-10 00:55:33', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` smallint(6) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint(3) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
(1, 'bebidas2', 1, '2021-09-15 19:40:45', '2021-09-15 19:40:45'),
(2, 'espesies', 1, '2021-09-04 01:44:13', '2021-09-04 01:44:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` int(20) DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `direccion`, `telefono`, `correo`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
(1, 'maria', 'losceresos', 2147483647, 'maria@gmail.com', 1, '2021-10-12 18:50:32', '2021-10-12 18:50:32'),
(2, 'lus dary', 'los ceresos', 2147483647, 'lusdary@gmail.com', 1, '2021-09-05 00:00:07', '2021-09-05 00:00:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `folio` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `activo` tinyint(4) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE `configuraciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `valor` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `configuraciones`
--

INSERT INTO `configuraciones` (`id`, `nombre`, `valor`) VALUES
(1, 'tienda_rfc', '0000 0000 0000'),
(2, 'tienda_nombre', 'tienda Dugwuai'),
(3, 'ticket_leyenda', 'eskol\r\n'),
(4, 'tienda_direccion', 'LOS guayavos '),
(5, 'tienda_telefono', '322 3223 23 32'),
(6, 'tienda_email', 'tienda@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL DEFAULT 0.00,
  `precio_venta` decimal(10,2) NOT NULL,
  `existencias` int(11) NOT NULL DEFAULT 0,
  `stock_minimo` int(11) NOT NULL DEFAULT 0,
  `inventariable` tinyint(4) NOT NULL,
  `id_unidad` smallint(6) NOT NULL,
  `id_categoria` smallint(6) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `precio_compra`, `precio_venta`, `existencias`, `stock_minimo`, `inventariable`, `id_unidad`, `id_categoria`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
(1, '12222222122', 'jugo22', '15020.00', '12020.00', 0, 222, 0, 7, 1, 0, '2021-10-17 02:43:54', '2021-10-17 02:43:54'),
(2, '33333', 'lulo3', '2200.00', '2500.00', 0, 203, 0, 6, 1, 1, '2021-09-15 19:46:58', '2021-09-15 19:46:58'),
(5, '2222222', 'nada', '333.00', '344.00', 0, 2, 0, 4, 1, 1, '2021-09-04 01:47:52', '2021-09-04 01:47:52'),
(6, '6666666', 'nada2', '666.00', '777.00', 0, 12, 1, 5, 1, 1, '2021-09-04 01:51:39', '2021-09-04 01:51:39'),
(7, '5555', 'hjhjhjk', '2222.00', '3333.00', 0, 23, 1, 4, 1, 1, '2021-09-04 18:55:30', '2021-09-04 18:55:30'),
(10, '222222', 'pan dulce', '200.00', '300.00', 0, 20, 1, 5, 2, 1, '2021-09-15 19:40:17', '2021-09-15 19:40:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint(4) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
(1, 'administrador', 1, '2021-09-10 00:57:52', NULL),
(2, 'cajero', 1, '2021-09-10 00:57:52', NULL),
(3, 'administrador', 1, '2021-09-10 00:57:55', NULL),
(4, 'cajero', 1, '2021-09-10 00:57:55', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporal_compra`
--

CREATE TABLE `temporal_compra` (
  `id` int(11) NOT NULL,
  `folio` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `temporal_compra`
--

INSERT INTO `temporal_compra` (`id`, `folio`, `id_producto`, `codigo`, `nombre`, `cantidad`, `precio`, `subtotal`) VALUES
(9, '', 7, '5555', 'hjhjhjk', 1, '2222.00', '2222.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `id` smallint(6) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_corto` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint(3) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`id`, `nombre`, `nombre_corto`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
(1, 'DUVAN', 'DG', 0, '2021-09-03 16:17:34', '2021-09-03 16:17:34'),
(3, 'GGG', 'G', 1, '2021-09-03 20:34:41', '2021-09-03 20:34:41'),
(4, 'mmmm', 'gg', 1, '2021-09-03 16:12:20', '2021-09-03 16:12:20'),
(5, 'kilogramo', 'kl', 1, '2021-09-03 20:34:28', '2021-09-03 20:34:28'),
(6, 'LITRO', 'LT', 1, '2021-09-03 20:34:22', '2021-09-03 20:34:22'),
(7, 'DUVAN', 'GF', 1, '2021-09-03 20:34:37', '2021-09-03 20:34:37'),
(8, '', '', 0, '2021-09-01 01:09:51', '2021-09-01 01:09:51'),
(9, 'caja', 'cj', 0, '2021-09-01 01:10:07', '2021-09-01 01:10:07'),
(10, 'cora', 'CR', 1, '2021-09-04 18:50:00', '2021-09-04 18:50:00'),
(11, 'miligramos', 'mlg', 1, '2021-09-15 19:41:49', '2021-09-15 19:41:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_caja` int(11) NOT NULL,
  `id_roles` int(11) NOT NULL,
  `activo` tinyint(4) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `id_caja`, `id_roles`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
(1, 'Duvan1', '$2y$10$9TQEhvO.TQoTXYeaxQWn3OlXMFZHOmo3UJh932WozbilMkk7UWFCm', 'Duvan1', 2, 2, 1, '2021-10-12 20:47:04', '2021-10-12 20:47:04'),
(2, 'adriana', '$2y$10$d2Ip5j/MtJoWP8RWa6fqe.WLPFu3Pk5rZsy5sbAI.yuwK7srhiavi', 'adriana', 2, 2, 1, '2021-09-10 02:10:48', '2021-09-10 02:10:48'),
(3, 'camilo', '$2y$10$GOSEilPlj.IxgZNeaxLTRu8KVRSzumTymvje9KI61f2l2A.znGPla', 'camilo', 4, 4, 1, '2021-10-12 19:15:19', '2021-10-12 19:15:19'),
(4, 'admin', '$2y$10$5GiCoYml4usG.nWlqYJ6levzbDf5fNB.xZxwFjrEX8rYOptj7xQyi', 'admin', 1, 3, 1, '2021-09-15 19:43:24', '2021-09-15 19:43:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compras_usuario` (`id_usuario`);

--
-- Indices de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_compra` (`id_compra`),
  ADD KEY `fk_detalle_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `fk_producto_unidad` (`id_unidad`),
  ADD KEY `fk_producto_categoria` (`id_categoria`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temporal_compra`
--
ALTER TABLE `temporal_compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_caja` (`id_caja`),
  ADD KEY `id_roles` (`id_roles`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `temporal_compra`
--
ALTER TABLE `temporal_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compras_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `fk_detalle_compra` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id`),
  ADD CONSTRAINT `fk_detalle_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `fk_producto_unidad` FOREIGN KEY (`id_unidad`) REFERENCES `unidades` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuario_caja` FOREIGN KEY (`id_caja`) REFERENCES `cajas` (`id`),
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
