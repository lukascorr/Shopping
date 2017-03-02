-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-02-2017 a las 20:53:06
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_shopping`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `idarticulo` smallint(6) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre_art` varchar(50) NOT NULL,
  `stock` int(4) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `precio_art` float NOT NULL,
  `condicion` tinyint(1) NOT NULL,
  `idcategoria_a` smallint(6) NOT NULL,
  `idproveedor_a` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`idarticulo`, `codigo`, `nombre_art`, `stock`, `descripcion`, `imagen`, `precio_art`, `condicion`, `idcategoria_a`, `idproveedor_a`) VALUES
(25, 'Art-1', 'Mac', 15, 'OS X Mountain Lion', 'warehouse/articles/img/mac.jpg', 15000, 1, 15, 9),
(26, 'Art-2', 'Tv', 20, 'Led 43 Samsung', 'warehouse/articles/img/tv-front.png', 10000, 1, 15, 9),
(27, 'Art-3', 'Macbook', 10, 'Air 11 4gb Ram', 'warehouse/articles/img/macbook.jpg', 20400, 1, 15, 9),
(28, 'Art-4', 'Iphone 6', 15, 'Plus 16gb', 'warehouse/articles/img/iphone.jpg', 60000, 1, 15, 9),
(29, 'Art-1', 'Jabon', 20, 'Ace Baja Espuma', 'warehouse/articles/img/jabon baja espuma.jpg', 50, 1, 17, 10),
(30, 'Art-2', 'Escoba', 15, 'Con Palita', 'warehouse/articles/img/escoba con palita.jpg', 45, 1, 17, 10),
(31, 'Art-3', 'Fuenton', 15, 'Fluxi', 'warehouse/articles/img/fuenton.jpg', 24, 1, 17, 10),
(32, 'Art-4', 'Jabon', 15, 'Liquido', 'warehouse/articles/img/jabon-liquido.jpg', 30, 1, 17, 10),
(33, 'Art-1', 'Mesa', 14, 'Retro Vintage', 'warehouse/articles/img/mesa.jpeg', 4200, 1, 11, 11),
(34, 'Art-2', 'Mueble', 16, 'Madera Paraiso', 'warehouse/articles/img/mueble.png', 4000, 1, 11, 11),
(35, 'Art-3', 'Silla', 15, 'Taiwan', 'warehouse/articles/img/silla.jpg', 600, 1, 11, 11),
(36, 'Art-4', 'Ropero', 8, 'Platinum', 'warehouse/articles/img/ropero.jpg', 2600, 1, 11, 11),
(37, 'Art-1', 'Remera', 13, 'Nike', 'warehouse/articles/img/remera-nike-rayado-jr-azul.jpg', 400, 1, 16, 12),
(38, 'Art-2', 'Pantalon', 17, 'Yoggins', 'warehouse/articles/img/pantalon.jpg', 280, 1, 16, 12),
(39, 'Art-3', 'Zapato', 14, 'Tacos Mujer', 'warehouse/articles/img/zapatos.jpg', 900, 1, 16, 12),
(40, 'Art-4', 'Botines', 18, 'Botita Nike Mercurial', 'warehouse/articles/img/botines.jpg', 1300, 1, 16, 12),
(41, 'Art-1', 'Heladera', 8, 'Patrick', 'warehouse/articles/img/heladera2p.jpg', 12500, 1, 13, 13),
(42, 'Art-2', 'Cocina', 12, 'New Lujo', 'warehouse/articles/img/cocina.jpg', 8500, 1, 13, 13),
(43, 'Art-3', 'Microonda', 7, 'Upper Line', 'warehouse/articles/img/microondas.jpg', 2600, 1, 13, 13),
(44, 'Art-4', 'Batidora', 13, 'Atma', 'warehouse/articles/img/batidora.jpg', 1000, 1, 13, 13),
(45, 'Art-1', 'Cuchillos', 14, 'Marines', 'warehouse/articles/img/cuchillos-cocina-4_0_o.jpg', 140, 1, 12, 14),
(46, 'Art-2', 'Tenedor', 23, 'Gulp', 'warehouse/articles/img/Tenedor.jpg', 17, 1, 12, 14),
(47, 'Art-3', 'Plato', 18, 'Cuadrado', 'warehouse/articles/img/plato_cuadrado_27cm.jpg', 150, 1, 12, 14),
(48, 'Art-4', 'Cazerola', 8, 'Tapa Vidrio', 'warehouse/articles/img/olla-con-tapa.jpg', 500, 1, 12, 14),
(49, 'C1', 'Lampazo', 5, 'Grande', 'warehouse/articles/img/wallpapers-hd-37.jpg', 50, 1, 17, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` smallint(6) NOT NULL,
  `tipo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `descripcion_cat` varchar(200) CHARACTER SET latin1 NOT NULL,
  `imagen` varchar(100) CHARACTER SET latin1 NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `tipo`, `descripcion_cat`, `imagen`, `condicion`) VALUES
(11, 'Hogar', 'Muebles,sillones,etc.', 'warehouse/categories/img/muebles 1.jpg', 1),
(12, 'Cocina', 'Articulos, Ollas, Etc.', 'warehouse/categories/img/cocina.jpg', 1),
(13, 'ElectrodomÃ©sticos', 'Heladeras, Lavarropas,etc.', 'warehouse/categories/img/electrodomesticos.jpg', 1),
(15, 'TecnologÃ­as', 'Computacion, Videojuegos, Etc.', 'warehouse/categories/img/tecnologias.jpg', 1),
(16, 'Indumentaria', 'Ropa, Calzados, Etc.', 'warehouse/categories/img/ropa.jpg', 1),
(17, 'Higiene', 'Articulos De Limpieza', 'warehouse/categories/img/higiene.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idcompra` smallint(6) NOT NULL,
  `precio_c` smallint(6) NOT NULL,
  `cantidad_c` smallint(6) NOT NULL,
  `fecha` date NOT NULL,
  `total` int(11) NOT NULL,
  `codigo_c` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`idcompra`, `precio_c`, `cantidad_c`, `fecha`, `total`, `codigo_c`) VALUES
(1, 40, 5, '2016-11-07', 200, 1),
(2, 9, 5, '2016-11-07', 45, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deposito`
--

CREATE TABLE `deposito` (
  `codigo_p` smallint(6) NOT NULL,
  `producto` varchar(20) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  `precio` smallint(6) NOT NULL,
  `idproveedor_dep` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `deposito`
--

INSERT INTO `deposito` (`codigo_p`, `producto`, `descripcion`, `cantidad`, `precio`, `idproveedor_dep`) VALUES
(1, 'Lampazo', 'Grande', 0, 40, 10),
(2, 'Hk', 'Iooihoh', 5, 9, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `dni` int(8) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `mensaje` varchar(400) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notifications`
--

INSERT INTO `notifications` (`dni`, `nombre`, `apellido`, `usuario`, `email`, `fecha`, `mensaje`, `tipo`, `condicion`) VALUES
(0, 'Sistema', '', '', '', '2016-11-21', 'Sr. Administrador: se le comunica que el producto Lampazo Grande se encuentra en estado de reposicion, con 5 cantidades.', 'sistema', 0),
(0, 'Sistema', '', '', '', '2016-11-21', 'Sr. Administrador: se le comunica que el producto Lampazo Grande se encuentra en estado de reposicion, con 5 cantidades.', 'ReposiciÃ³n', 0),
(0, 'Sistema', '', '', '', '2016-11-21', 'Sr. Administrador: se le comunica que el producto Lampazo Grande se encuentra en estado de reposicion, con 5 cantidades.', 'ReposiciÃ³n', 0),
(0, 'Sistema', '', '', '', '2016-11-23', 'Sr. Administrador: se le comunica que el producto Lampazo Grande se encuentra en estado de reposicion, con 5 cantidades.', 'ReposiciÃ³n', 0),
(0, 'Sistema', '', '', '', '2016-11-24', 'Sr. Administrador: se le comunica que el producto Lampazo Grande se encuentra en estado de reposicion, con 5 cantidades.', 'ReposiciÃ³n', 0),
(0, 'Sistema', '', '', '', '2016-11-26', 'Sr. Administrador: se le comunica que el producto Lampazo Grande se encuentra en estado de reposicion, con 5 cantidades.', 'ReposiciÃ³n', 0),
(0, 'Sistema', '', '', '', '2016-11-26', 'Sr. Administrador: se le comunica que el producto Lampazo Grande se encuentra en estado de reposicion, con 5 cantidades.', 'ReposiciÃ³n', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idproveedor` smallint(6) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` int(40) NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idproveedor`, `codigo`, `nombre`, `email`, `direccion`, `telefono`, `condicion`) VALUES
(9, 'Edem375', 'Edemsa', 'edemsaSR@hotmail.com.ar', 'Av. Mitre 343', 800, 0),
(10, 'kat', 'Kingston', 'kignston@hotmail.com', 'Bartolome Mitre', 2147483647, 0),
(11, 'Hog12', 'HogareÃ±o', 'hogar@gmail.com', 'Sarmiento 233', 2147483647, 1),
(12, 'Valk1', 'Valkimia', 'valkimia@hotmail.com', 'Cordoba 112', 800, 1),
(13, 'GAR21', 'Garbarino', 'garbarino@gmail.com', 'Av. Irigoyen', 800, 1),
(14, 'Baz8', 'Bazarlu', 'bazarlu@hotmail.com', 'Corrientes 11', 333, 1),
(15, '4235', 'Aasgjka', 'sdkgjjskd@gmail.com', 'Dkgjs', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `dni` int(8) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `nombre`, `apellido`, `usuario`, `email`, `password`, `telefono`, `localidad`, `imagen`, `estado`, `fecha`, `condicion`) VALUES
(38808587, 'Mario', 'Gomez', 'mariogomez', 'mariogomez@hotmail.com', 'mario', '', '', 'user/img/ethical.jpg', 'Inactivo', '2016-10-25', 1),
(38808595, 'Administrador', '', 'admin', 'correa97lukas@hotmail.com', 'lcdiesiseis', '', '', '', 'Activo', '0000-00-00', 0),
(45109631, 'Enzo', 'Santamarina', 'julian9321', 'santamarina97enzo@hotmail.com', 'chupala', '2954627171', 'Algarrobo del Aguila', 'user/img/hacker.jpg', 'Activo', '2017-01-03', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idventa` smallint(6) NOT NULL,
  `fecha_ven` date NOT NULL,
  `hora` time NOT NULL,
  `total` smallint(6) NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  `precio` smallint(6) NOT NULL,
  `dni_v` int(11) NOT NULL,
  `idarticulo_ven` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idventa`, `fecha_ven`, `hora`, `total`, `cantidad`, `precio`, `dni_v`, `idarticulo_ven`) VALUES
(19, '2016-11-07', '03:04:20', 4200, 1, 4200, 38808587, 33),
(20, '2016-11-07', '03:04:20', 1200, 2, 600, 38808587, 35),
(21, '2016-11-07', '03:04:20', 2600, 2, 1300, 38808587, 40),
(23, '2016-11-07', '03:41:35', 32767, 1, 32767, 38808587, 28),
(26, '2016-11-07', '15:45:22', 32767, 5, 8500, 38808587, 42),
(27, '2016-11-07', '16:20:19', 8400, 2, 4200, 38808587, 33),
(28, '2016-11-07', '19:13:18', 2600, 1, 2600, 38808587, 36),
(29, '2016-11-07', '19:13:18', 15000, 1, 15000, 38808587, 25),
(30, '2016-11-07', '19:13:18', 30000, 3, 10000, 38808587, 26),
(31, '2016-11-07', '19:36:30', 4200, 1, 4200, 38808587, 33),
(32, '2016-11-24', '20:35:06', 15000, 1, 15000, 38808587, 25);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`idarticulo`),
  ADD KEY `fk_art` (`idcategoria_a`,`idproveedor_a`),
  ADD KEY `idproveedor1` (`idproveedor_a`),
  ADD KEY `stock` (`stock`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idcompra`),
  ADD KEY `idarticulo2` (`codigo_c`),
  ADD KEY `fecha` (`fecha`);

--
-- Indices de la tabla `deposito`
--
ALTER TABLE `deposito`
  ADD PRIMARY KEY (`codigo_p`),
  ADD KEY `idproveedor_dep` (`idproveedor_dep`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idproveedor`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `idarticulo_ven` (`idarticulo_ven`),
  ADD KEY `dni_v` (`dni_v`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `idarticulo` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idcompra` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `deposito`
--
ALTER TABLE `deposito`
  MODIFY `codigo_p` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idproveedor` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idventa` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`idcategoria_a`) REFERENCES `categorias` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `articulos_ibfk_2` FOREIGN KEY (`idproveedor_a`) REFERENCES `proveedores` (`idproveedor`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`codigo_c`) REFERENCES `deposito` (`codigo_p`);

--
-- Filtros para la tabla `deposito`
--
ALTER TABLE `deposito`
  ADD CONSTRAINT `deposito_ibfk_1` FOREIGN KEY (`idproveedor_dep`) REFERENCES `proveedores` (`idproveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`dni_v`) REFERENCES `usuarios` (`dni`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`idarticulo_ven`) REFERENCES `articulos` (`idarticulo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
