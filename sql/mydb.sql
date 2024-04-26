-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-04-2024 a las 21:27:33
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `idclientes` int NOT NULL AUTO_INCREMENT,
  `identificacion` varchar(15) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  PRIMARY KEY (`idclientes`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idclientes`, `identificacion`, `nombres`, `telefono`, `direccion`, `ciudad`, `correo`, `fecha_nacimiento`) VALUES
(4, '29676714', 'Amy KeiKei', '3214546789', 'Calle 3 1 23', 'Cali', 'amy@gmail.com', '2000-06-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

DROP TABLE IF EXISTS `detalle_factura`;
CREATE TABLE IF NOT EXISTS `detalle_factura` (
  `iddetalle_factura` int NOT NULL AUTO_INCREMENT,
  `factura_venta_idfactura_venta` int NOT NULL,
  `factura_venta_clientes_idclientes` int NOT NULL,
  `productos_idproductos` int NOT NULL,
  `cantidad` int NOT NULL,
  `usuarios_idusuarios` int NOT NULL,
  PRIMARY KEY (`iddetalle_factura`,`factura_venta_idfactura_venta`,`factura_venta_clientes_idclientes`,`productos_idproductos`,`usuarios_idusuarios`),
  KEY `fk_detalle_factura_factura_venta1_idx` (`factura_venta_idfactura_venta`,`factura_venta_clientes_idclientes`),
  KEY `fk_detalle_factura_productos1_idx` (`productos_idproductos`),
  KEY `fk_detalle_factura_usuarios1_idx` (`usuarios_idusuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_compras`
--

DROP TABLE IF EXISTS `facturas_compras`;
CREATE TABLE IF NOT EXISTS `facturas_compras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `n_fc` varchar(255) COLLATE utf8mb4_es_trad_0900_ai_ci NOT NULL,
  `fecha_factura` date NOT NULL,
  `fecha_actual` date NOT NULL,
  `vTotal` int NOT NULL,
  `proveedores_idproveedores` int NOT NULL,
  `usuarios_idusuarios` int NOT NULL,
  `detalle` json NOT NULL,
  PRIMARY KEY (`id`),
  KEY `proveedores_idproveedores` (`proveedores_idproveedores`),
  KEY `usuarios_idusuarios` (`usuarios_idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_es_trad_0900_ai_ci;

--
-- Volcado de datos para la tabla `facturas_compras`
--

INSERT INTO `facturas_compras` (`id`, `n_fc`, `fecha_factura`, `fecha_actual`, `vTotal`, `proveedores_idproveedores`, `usuarios_idusuarios`, `detalle`) VALUES
(1, '1', '2024-04-12', '2024-04-12', 50000, 2, 1, '[{\"id\": \"8\", \"valor\": \"30000\", \"vTotal\": 30000, \"cantidad\": \"1\", \"descripcion\": \"Benzoato\"}, {\"id\": \"9\", \"valor\": \"20000\", \"vTotal\": 20000, \"cantidad\": \"1\", \"descripcion\": \"Escorpico\"}]'),
(2, '2', '2024-04-12', '2024-04-12', 32500, 7, 1, '[{\"id\": \"6\", \"valor\": \"22500\", \"vTotal\": 22500, \"cantidad\": \"1\", \"descripcion\": \"Paquete Bolsas x 100u\"}, {\"id\": \"7\", \"valor\": \"10000\", \"vTotal\": 10000, \"cantidad\": \"1\", \"descripcion\": \"Fibra 1500m\"}]'),
(3, '3', '2024-04-12', '2024-04-12', 322000, 6, 1, '[{\"id\": \"10\", \"valor\": \"1000\", \"vTotal\": 10000, \"cantidad\": \"10\", \"descripcion\": \"Tijeras\"}, {\"id\": \"11\", \"valor\": \"5000\", \"vTotal\": 50000, \"cantidad\": \"10\", \"descripcion\": \"Bandejas\"}, {\"id\": \"12\", \"valor\": \"1200\", \"vTotal\": 12000, \"cantidad\": \"10\", \"descripcion\": \"Tarro 1Kg\"}, {\"id\": \"13\", \"valor\": \"2000\", \"vTotal\": 20000, \"cantidad\": \"10\", \"descripcion\": \"Tarro 20kg\"}, {\"id\": \"14\", \"valor\": \"20000\", \"vTotal\": 100000, \"cantidad\": \"5\", \"descripcion\": \"Tarro 40kg\"}, {\"id\": \"15\", \"valor\": \"26000\", \"vTotal\": 130000, \"cantidad\": \"5\", \"descripcion\": \"Jabon\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_venta`
--

DROP TABLE IF EXISTS `factura_venta`;
CREATE TABLE IF NOT EXISTS `factura_venta` (
  `idfactura_venta` int NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `clientes_idclientes` int NOT NULL,
  PRIMARY KEY (`idfactura_venta`,`clientes_idclientes`),
  KEY `fk_factura_venta_clientes1_idx` (`clientes_idclientes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarios`
--

DROP TABLE IF EXISTS `inventarios`;
CREATE TABLE IF NOT EXISTS `inventarios` (
  `idinventarios` int NOT NULL AUTO_INCREMENT,
  `n_inventario` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` enum('Revision','Cerrado') NOT NULL,
  `tipo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `detalle` json NOT NULL,
  `usuarios_idusuarios` int NOT NULL,
  PRIMARY KEY (`idinventarios`,`usuarios_idusuarios`),
  KEY `fk_inventarios_usuarios1_idx` (`usuarios_idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `inventarios`
--

INSERT INTO `inventarios` (`idinventarios`, `n_inventario`, `fecha`, `estado`, `tipo`, `detalle`, `usuarios_idusuarios`) VALUES
(2, '1Diario2024-03-25', '2024-03-25 00:00:00', 'Revision', 'Diario', '{\"1\": \"750\", \"2\": \"65\", \"3\": \"35\", \"4\": \"10\", \"5\": \"10\"}', 1),
(3, '1Diario2024-03-24', '2024-03-24 00:00:00', 'Revision', 'Diario', '{\"1\": \"740\", \"2\": \"65\", \"3\": \"35\", \"4\": \"10\", \"5\": \"10\"}', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_insumos`
--

DROP TABLE IF EXISTS `inventario_insumos`;
CREATE TABLE IF NOT EXISTS `inventario_insumos` (
  `id_insumo` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8mb4_es_trad_0900_ai_ci NOT NULL,
  `valor` float NOT NULL,
  `cantidad` float NOT NULL,
  PRIMARY KEY (`id_insumo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_es_trad_0900_ai_ci;

--
-- Volcado de datos para la tabla `inventario_insumos`
--

INSERT INTO `inventario_insumos` (`id_insumo`, `descripcion`, `valor`, `cantidad`) VALUES
(1, 'Pq de Bolsas', 22500, 100),
(2, 'Fibra', 10000, 1500),
(3, 'Benzoato', 30000, 1.5),
(4, 'Escorpico', 20000, 0.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivos`
--

DROP TABLE IF EXISTS `motivos`;
CREATE TABLE IF NOT EXISTS `motivos` (
  `idmotivos` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`idmotivos`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `motivos`
--

INSERT INTO `motivos` (`idmotivos`, `descripcion`) VALUES
(1, 'EAC'),
(2, 'DB'),
(3, 'FC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

DROP TABLE IF EXISTS `movimientos`;
CREATE TABLE IF NOT EXISTS `movimientos` (
  `idmovimientos` int NOT NULL AUTO_INCREMENT,
  `n_movimiento` int NOT NULL,
  `n_factura` varchar(20) NOT NULL,
  `fecha_factura` date NOT NULL,
  `fecha_actual` datetime NOT NULL,
  `cantidad` int NOT NULL,
  `valor_kg` int NOT NULL,
  `valor_total` int NOT NULL,
  `proveedores_idproveedores` int NOT NULL,
  `motivos_idmotivos` int NOT NULL,
  `productos_idproductos` int NOT NULL,
  `usuarios_idusuarios` int NOT NULL,
  PRIMARY KEY (`idmovimientos`,`proveedores_idproveedores`,`motivos_idmotivos`,`productos_idproductos`,`usuarios_idusuarios`),
  KEY `fk_movimientos_proveedores1_idx` (`proveedores_idproveedores`),
  KEY `fk_movimientos_motivos1_idx` (`motivos_idmotivos`),
  KEY `fk_movimientos_productos1_idx` (`productos_idproductos`),
  KEY `fk_movimientos_usuarios1_idx` (`usuarios_idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`idmovimientos`, `n_movimiento`, `n_factura`, `fecha_factura`, `fecha_actual`, `cantidad`, `valor_kg`, `valor_total`, `proveedores_idproveedores`, `motivos_idmotivos`, `productos_idproductos`, `usuarios_idusuarios`) VALUES
(1, 11, '1', '2024-04-16', '2024-04-16 09:58:09', 500, 2600, 1300000, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operarios`
--

DROP TABLE IF EXISTS `operarios`;
CREATE TABLE IF NOT EXISTS `operarios` (
  `idoperarios` int NOT NULL AUTO_INCREMENT,
  `cedula` varchar(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) NOT NULL,
  `correo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idoperarios`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `operarios`
--

INSERT INTO `operarios` (`idoperarios`, `cedula`, `nombres`, `apellidos`, `telefono`, `direccion`, `correo`) VALUES
(1, '1006536918', 'Jhon Crsitiam', 'Alzate Velasquez', '3185096317', 'calle 13 1 57', 'jhonalzate2017@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

DROP TABLE IF EXISTS `procesos`;
CREATE TABLE IF NOT EXISTS `procesos` (
  `id_proceso` int NOT NULL AUTO_INCREMENT,
  `fecha_proceso` date NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `operarios_idoperarios` int NOT NULL,
  `stock_id` int NOT NULL,
  `next_item` int NOT NULL,
  `cantidad_procesada` float NOT NULL,
  `cantidad_stock` float NOT NULL,
  `costo` int NOT NULL,
  `costo_total` int NOT NULL,
  `cantidad_resultado` float NOT NULL,
  `horas` int NOT NULL,
  `usuarios_idusuarios` int NOT NULL,
  `procesos_id` int NOT NULL,
  PRIMARY KEY (`id_proceso`),
  KEY `procesos_ibfk_1` (`operarios_idoperarios`),
  KEY `usuarios_idusuarios` (`usuarios_idusuarios`),
  KEY `stock_id` (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_es_trad_0900_ai_ci;

--
-- Volcado de datos para la tabla `procesos`
--

INSERT INTO `procesos` (`id_proceso`, `fecha_proceso`, `fecha_registro`, `operarios_idoperarios`, `stock_id`, `next_item`, `cantidad_procesada`, `cantidad_stock`, `costo`, `costo_total`, `cantidad_resultado`, `horas`, `usuarios_idusuarios`, `procesos_id`) VALUES
(1, '2024-04-25', '2024-04-25 17:48:40', 1006536918, 1, 2, 100, 500, 3000, 6000, 85, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `idproductos` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `valor_venta` int DEFAULT NULL,
  PRIMARY KEY (`idproductos`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproductos`, `descripcion`, `valor_venta`) VALUES
(1, 'Fruta Gauanaba', 0),
(2, 'Guanabana sin cascara', 0),
(3, 'Fruta sin semilla', 0),
(4, 'Fruta limpia', 0),
(5, 'Fruta en bolsas x 10kg', 4800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `idproveedores` int NOT NULL AUTO_INCREMENT,
  `nit` varchar(15) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `dirección` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `productos` json NOT NULL,
  `categoria` varchar(20) NOT NULL,
  PRIMARY KEY (`idproveedores`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idproveedores`, `nit`, `nombre`, `telefono`, `dirección`, `ciudad`, `correo`, `productos`, `categoria`) VALUES
(1, '29849148', 'FRUIT SAS', '3163733219', 'Carrera 29c 32 23', 'Palmira', 'mvsh@gmail.com', '{\"valor\": \"2500\", \"id_secos\": \"1\", \"descripcion\": \"Guanabana Fruta\"}', 'EAC'),
(2, '31233322', 'QUIMICOS JYC', '311234321', 'Carrera 4', 'Toro', 'jyc@gmial.com', '[{\"valor\": \"30000\", \"unidad\": \"Kg\", \"cantidad\": \"1.5\", \"id_secos\": \"8\", \"descripcion\": \"Benzoato\"}, {\"valor\": \"20000\", \"unidad\": \"Kg\", \"cantidad\": \"0.5\", \"id_secos\": \"9\", \"descripcion\": \"Escorpico\"}]', 'FC'),
(5, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'null', ''),
(6, '100746987', 'SECOS LTDA', '3163733219', 'Calle 7 30 2', 'Toro', 'keike@gmail.com', '[{\"valor\": \"1000\", \"unidad\": \"Unidad\", \"id_secos\": \"10\", \"descripcion\": \"Tijeras\"}, {\"valor\": \"5000\", \"unidad\": \"Unidad\", \"id_secos\": \"11\", \"descripcion\": \"Bandejas\"}, {\"valor\": \"1200\", \"unidad\": \"Unidad\", \"id_secos\": \"12\", \"descripcion\": \"Tarro 1Kg\"}, {\"valor\": \"2000\", \"unidad\": \"Unidad\", \"id_secos\": \"13\", \"descripcion\": \"Tarro 20kg\"}, {\"valor\": \"20000\", \"unidad\": \"Unidad\", \"id_secos\": \"14\", \"descripcion\": \"Tarro 40kg\"}, {\"valor\": \"26000\", \"unidad\": \"4L\", \"id_secos\": \"15\", \"descripcion\": \"Jabon\"}]', 'FC'),
(7, '12345', 'DE TODO LTDA', '3163733219', 'CARRERA 3 3 23', 'TORO', 'adsks@gmail.com', '[{\"valor\": \"22500\", \"unidad\": \"Un\", \"cantidad\": \"100\", \"id_secos\": \"6\", \"descripcion\": \"Paquete Bolsas x 100u\"}, {\"valor\": \"10000\", \"unidad\": \"M\", \"cantidad\": \"1500\", \"id_secos\": \"7\", \"descripcion\": \"Fibra 1500m\"}]', 'FC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `idrol` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Operario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8mb4_es_trad_0900_ai_ci NOT NULL,
  `valor_unitario` int NOT NULL,
  `cantidad` float NOT NULL,
  `fecha_update` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_es_trad_0900_ai_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`id`, `descripcion`, `valor_unitario`, `cantidad`, `fecha_update`) VALUES
(1, 'Fruta Guanábana', 0, 415, '2024-04-05'),
(2, 'Guanabana sin cascara', 0, 85, '2024-04-05'),
(3, 'Guanabana sin semilla', 0, 0, '2024-04-05'),
(4, 'Guanabana limpia', 0, 0, '2024-04-05'),
(5, 'Guanabana Bolsa 10kg', 0, 0, '2024-04-05'),
(6, 'Paquete Bolsas x 100u', 22500, 1, '2024-04-05'),
(7, 'Fibra 1500m', 10000, 1, '2024-04-05'),
(8, 'Benzoato 1,5kg', 30000, 1, '2024-04-05'),
(9, 'Escorpico 0,5kg', 20000, 1, '2024-04-05'),
(10, 'Tijeras', 1000, 10, '0000-00-00'),
(11, 'Bandeja', 5000, 10, '0000-00-00'),
(12, 'Tarro 1kg', 1200, 10, '0000-00-00'),
(13, 'Tarro 20kg', 2000, 10, '0000-00-00'),
(14, 'Tarro 40kg', 20000, 5, '0000-00-00'),
(15, 'Jabon 4L', 26000, 5, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuarios` int NOT NULL AUTO_INCREMENT,
  `pass` varchar(45) NOT NULL,
  `last_signin` datetime NOT NULL,
  `operarios_idoperarios` int NOT NULL,
  `rol_idrol` int NOT NULL,
  PRIMARY KEY (`idusuarios`),
  KEY `fk_usuarios_operarios_idx` (`operarios_idoperarios`),
  KEY `fk_usuarios_rol1_idx` (`rol_idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `pass`, `last_signin`, `operarios_idoperarios`, `rol_idrol`) VALUES
(1, 'JZC', '2024-02-21 22:18:39', 1, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `fk_detalle_factura_factura_venta1` FOREIGN KEY (`factura_venta_idfactura_venta`,`factura_venta_clientes_idclientes`) REFERENCES `factura_venta` (`idfactura_venta`, `clientes_idclientes`),
  ADD CONSTRAINT `fk_detalle_factura_productos1` FOREIGN KEY (`productos_idproductos`) REFERENCES `productos` (`idproductos`),
  ADD CONSTRAINT `fk_detalle_factura_usuarios1` FOREIGN KEY (`usuarios_idusuarios`) REFERENCES `usuarios` (`idusuarios`);

--
-- Filtros para la tabla `facturas_compras`
--
ALTER TABLE `facturas_compras`
  ADD CONSTRAINT `facturas_compras_ibfk_1` FOREIGN KEY (`proveedores_idproveedores`) REFERENCES `proveedores` (`idproveedores`),
  ADD CONSTRAINT `facturas_compras_ibfk_2` FOREIGN KEY (`usuarios_idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `factura_venta`
--
ALTER TABLE `factura_venta`
  ADD CONSTRAINT `fk_factura_venta_clientes1` FOREIGN KEY (`clientes_idclientes`) REFERENCES `clientes` (`idclientes`);

--
-- Filtros para la tabla `inventarios`
--
ALTER TABLE `inventarios`
  ADD CONSTRAINT `fk_inventarios_usuarios1` FOREIGN KEY (`usuarios_idusuarios`) REFERENCES `usuarios` (`idusuarios`);

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `fk_movimientos_motivos1` FOREIGN KEY (`motivos_idmotivos`) REFERENCES `motivos` (`idmotivos`),
  ADD CONSTRAINT `fk_movimientos_productos1` FOREIGN KEY (`productos_idproductos`) REFERENCES `stock` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_movimientos_proveedores1` FOREIGN KEY (`proveedores_idproveedores`) REFERENCES `proveedores` (`idproveedores`),
  ADD CONSTRAINT `fk_movimientos_usuarios1` FOREIGN KEY (`usuarios_idusuarios`) REFERENCES `usuarios` (`idusuarios`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_operarios` FOREIGN KEY (`operarios_idoperarios`) REFERENCES `operarios` (`idoperarios`),
  ADD CONSTRAINT `fk_usuarios_rol1` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`idrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
