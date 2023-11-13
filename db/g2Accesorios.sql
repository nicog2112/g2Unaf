-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-11-2023 a las 21:35:25
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `g2Accesorios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Barrios`
--

CREATE TABLE `Barrios` (
  `id_barrios` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `id_localidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cliente`
--

CREATE TABLE `Cliente` (
  `id_cliente` int(11) NOT NULL,
  `fecha_alta` date DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Compra`
--

CREATE TABLE `Compra` (
  `id_compra` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Contactos`
--

CREATE TABLE `Contactos` (
  `id_contactos` int(11) NOT NULL,
  `valor` varchar(100) DEFAULT NULL,
  `id_tipo_contacto` int(11) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Detalle_compra`
--

CREATE TABLE `Detalle_compra` (
  `id_detalle_compra` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_compra` float(8,0) DEFAULT NULL,
  `id_compra` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Detalle_Reparacion`
--

CREATE TABLE `Detalle_Reparacion` (
  `id_detalle_reparacion` int(11) NOT NULL,
  `id_factura` int(11) DEFAULT NULL,
  `id_reparacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Detalle_ventas`
--

CREATE TABLE `Detalle_ventas` (
  `id_detalle_venta` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_venta` float(8,0) DEFAULT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Direccion`
--

CREATE TABLE `Direccion` (
  `id_direccion` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Dispositivo_imagen`
--

CREATE TABLE `Dispositivo_imagen` (
  `id_dispositivo_imagen` int(11) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `id_reparacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Domicilios`
--

CREATE TABLE `Domicilios` (
  `id_domicilio` int(11) NOT NULL,
  `mz` varchar(10) DEFAULT NULL,
  `casa` varchar(10) DEFAULT NULL,
  `calle` varchar(100) DEFAULT NULL,
  `altura` varchar(10) DEFAULT NULL,
  `departamento` varchar(5) DEFAULT NULL,
  `piso` varchar(5) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `id_barrios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empleado`
--

CREATE TABLE `Empleado` (
  `id_empleado` int(11) NOT NULL,
  `legajo` varchar(20) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estado`
--

CREATE TABLE `Estado` (
  `id_estado` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_pagos`
--

CREATE TABLE `estados_pagos` (
  `id_estados_pagos` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estado_reparacion`
--

CREATE TABLE `Estado_reparacion` (
  `id_estado_reparacion` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Factura`
--

CREATE TABLE `Factura` (
  `id_factura` int(11) NOT NULL,
  `numeracion` int(11) DEFAULT NULL,
  `fecha_emicion` date DEFAULT NULL,
  `id_tipos_facturas` int(11) DEFAULT NULL,
  `id_estados_pagos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Facturas_pagos`
--

CREATE TABLE `Facturas_pagos` (
  `id_facturas_pagos` int(11) NOT NULL,
  `valor_porcentaje` int(11) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `id_factura` int(11) DEFAULT NULL,
  `id_tipos_pagos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Factura_Detalle`
--

CREATE TABLE `Factura_Detalle` (
  `id_factura_detalle` int(11) NOT NULL,
  `id_factura` int(11) DEFAULT NULL,
  `id_detalle_venta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Factura_impuestos`
--

CREATE TABLE `Factura_impuestos` (
  `id_factura_impuesto` int(11) NOT NULL,
  `valor_porcentaje` int(11) DEFAULT NULL,
  `id_factura` int(11) DEFAULT NULL,
  `id_tipos_impositivos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Local`
--

CREATE TABLE `Local` (
  `id_local` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Localidad`
--

CREATE TABLE `Localidad` (
  `id_localidad` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `id_provincia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Marca`
--

CREATE TABLE `Marca` (
  `id_marca` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Marca`
--

INSERT INTO `Marca` (`id_marca`, `descripcion`) VALUES
(1, 'Nuevo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Marca_dispositivos`
--

CREATE TABLE `Marca_dispositivos` (
  `id_marca_dispositivos` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Modelo_dispositivos`
--

CREATE TABLE `Modelo_dispositivos` (
  `id_modelo_dispositivos` int(11) NOT NULL,
  `descripcion` varchar(10) DEFAULT NULL,
  `id_marca_dispositivos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Modulos`
--

CREATE TABLE `Modulos` (
  `id_modulo` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `directorio` varchar(45) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `icono` varchar(200) DEFAULT NULL,
  `hijoDe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pais`
--

CREATE TABLE `Pais` (
  `id_pais` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Perfiles`
--

CREATE TABLE `Perfiles` (
  `id_perfil` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Perfiles`
--

INSERT INTO `Perfiles` (`id_perfil`, `descripcion`, `estado`) VALUES
(1, 'Administrador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Perfil_modulo`
--

CREATE TABLE `Perfil_modulo` (
  `id_perfil_modulo` int(11) NOT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `id_modulo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Personas`
--

CREATE TABLE `Personas` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `dni` bigint(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `cuil` bigint(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `id_tipo_documento` int(11) DEFAULT NULL,
  `id_sexo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Personas`
--

INSERT INTO `Personas` (`id_persona`, `nombre`, `apellido`, `dni`, `fecha_nacimiento`, `cuil`, `estado`, `id_tipo_documento`, `id_sexo`) VALUES
(1, 'Usuario', 'Administrador', 1, '2013-07-02', 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Personas_Domicilios`
--

CREATE TABLE `Personas_Domicilios` (
  `id_persona_domicilio` int(11) NOT NULL,
  `id_persona` int(11) DEFAULT NULL,
  `id_domicilio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Productos`
--

CREATE TABLE `Productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio_venta` float(8,0) DEFAULT NULL,
  `precio_compra` float(8,0) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `stock_minimo` int(11) DEFAULT NULL,
  `codigo_barras` varchar(20) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_rubro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Producto_imagen`
--

CREATE TABLE `Producto_imagen` (
  `id_producto_imagen` int(11) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Proveedor`
--

CREATE TABLE `Proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Nombre` char(50) DEFAULT NULL,
  `Cuit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Proveedor_Contacto`
--

CREATE TABLE `Proveedor_Contacto` (
  `id_proveedor_contacto` int(11) NOT NULL,
  `valor` varchar(70) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `id_tipo_contacto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Provincia`
--

CREATE TABLE `Provincia` (
  `id_provincia` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Reparaciones`
--

CREATE TABLE `Reparaciones` (
  `id_reparacion` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `costo` float(8,0) DEFAULT NULL,
  `memoria_sd` int(11) DEFAULT NULL,
  `funda` int(11) DEFAULT NULL,
  `chip` int(11) DEFAULT NULL,
  `falla_del_equipo` varchar(500) DEFAULT NULL,
  `diagnostico` varchar(500) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_estado_reparacion` int(11) DEFAULT NULL,
  `id_local` int(11) DEFAULT NULL,
  `id_modelo_dispositivos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro`
--

CREATE TABLE `rubro` (
  `id_rubro` int(11) NOT NULL,
  `descripcion` char(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rubro`
--

INSERT INTO `rubro` (`id_rubro`, `descripcion`) VALUES
(1, 'Nuevos'),
(2, 'Prueba\r\n'),
(3, 'Pruebas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sexo`
--

CREATE TABLE `Sexo` (
  `id_sexo` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Sexo`
--

INSERT INTO `Sexo` (`id_sexo`, `descripcion`) VALUES
(1, 'MASCULINO'),
(2, 'FEMENINO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_facturas`
--

CREATE TABLE `tipos_facturas` (
  `id_tipos_facturas` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_impositivos`
--

CREATE TABLE `tipos_impositivos` (
  `id_tipos_impositivos` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `valor_porcentaje` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_pagos`
--

CREATE TABLE `tipos_pagos` (
  `id_tipos_pagos` int(11) NOT NULL,
  `descripcion` char(50) DEFAULT NULL,
  `valor_porcentaje` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo_Contacto`
--

CREATE TABLE `Tipo_Contacto` (
  `id_tipo_contacto` int(11) NOT NULL,
  `descripcion` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo_documento`
--

CREATE TABLE `Tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Tipo_documento`
--

INSERT INTO `Tipo_documento` (`id_tipo_documento`, `descripcion`) VALUES
(1, 'DNI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(8) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`id_usuario`, `username`, `password`, `imagen`, `id_persona`, `id_perfil`) VALUES
(1, 'uadmin', '12345', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Barrios`
--
ALTER TABLE `Barrios`
  ADD PRIMARY KEY (`id_barrios`),
  ADD KEY `Ref117` (`id_localidad`);

--
-- Indices de la tabla `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `Ref112` (`id_persona`);

--
-- Indices de la tabla `Compra`
--
ALTER TABLE `Compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `Ref1824` (`id_empleado`),
  ADD KEY `Ref2036` (`id_proveedor`),
  ADD KEY `Ref4949` (`id_estado`);

--
-- Indices de la tabla `Contactos`
--
ALTER TABLE `Contactos`
  ADD PRIMARY KEY (`id_contactos`),
  ADD KEY `Ref135` (`id_persona`),
  ADD KEY `Ref52` (`id_tipo_contacto`);

--
-- Indices de la tabla `Detalle_compra`
--
ALTER TABLE `Detalle_compra`
  ADD PRIMARY KEY (`id_detalle_compra`),
  ADD KEY `Ref1917` (`id_compra`),
  ADD KEY `Ref2418` (`id_producto`);

--
-- Indices de la tabla `Detalle_Reparacion`
--
ALTER TABLE `Detalle_Reparacion`
  ADD PRIMARY KEY (`id_detalle_reparacion`),
  ADD KEY `Ref5058` (`id_factura`),
  ADD KEY `Ref3059` (`id_reparacion`);

--
-- Indices de la tabla `Detalle_ventas`
--
ALTER TABLE `Detalle_ventas`
  ADD PRIMARY KEY (`id_detalle_venta`),
  ADD KEY `Ref2625` (`id_venta`),
  ADD KEY `Ref2426` (`id_producto`);

--
-- Indices de la tabla `Direccion`
--
ALTER TABLE `Direccion`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `Ref2060` (`id_proveedor`);

--
-- Indices de la tabla `Dispositivo_imagen`
--
ALTER TABLE `Dispositivo_imagen`
  ADD PRIMARY KEY (`id_dispositivo_imagen`),
  ADD KEY `Ref3043` (`id_reparacion`);

--
-- Indices de la tabla `Domicilios`
--
ALTER TABLE `Domicilios`
  ADD PRIMARY KEY (`id_domicilio`),
  ADD KEY `Ref128` (`id_barrios`);

--
-- Indices de la tabla `Empleado`
--
ALTER TABLE `Empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `Ref113` (`id_persona`);

--
-- Indices de la tabla `Estado`
--
ALTER TABLE `Estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estados_pagos`
--
ALTER TABLE `estados_pagos`
  ADD PRIMARY KEY (`id_estados_pagos`);

--
-- Indices de la tabla `Estado_reparacion`
--
ALTER TABLE `Estado_reparacion`
  ADD PRIMARY KEY (`id_estado_reparacion`);

--
-- Indices de la tabla `Factura`
--
ALTER TABLE `Factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `Ref5550` (`id_tipos_facturas`),
  ADD KEY `Ref5651` (`id_estados_pagos`);

--
-- Indices de la tabla `Facturas_pagos`
--
ALTER TABLE `Facturas_pagos`
  ADD PRIMARY KEY (`id_facturas_pagos`),
  ADD KEY `Ref5054` (`id_factura`),
  ADD KEY `Ref5455` (`id_tipos_pagos`);

--
-- Indices de la tabla `Factura_Detalle`
--
ALTER TABLE `Factura_Detalle`
  ADD PRIMARY KEY (`id_factura_detalle`),
  ADD KEY `Ref5056` (`id_factura`),
  ADD KEY `Ref2757` (`id_detalle_venta`);

--
-- Indices de la tabla `Factura_impuestos`
--
ALTER TABLE `Factura_impuestos`
  ADD PRIMARY KEY (`id_factura_impuesto`),
  ADD KEY `Ref5052` (`id_factura`),
  ADD KEY `Ref5753` (`id_tipos_impositivos`);

--
-- Indices de la tabla `Local`
--
ALTER TABLE `Local`
  ADD PRIMARY KEY (`id_local`);

--
-- Indices de la tabla `Localidad`
--
ALTER TABLE `Localidad`
  ADD PRIMARY KEY (`id_localidad`),
  ADD KEY `Ref106` (`id_provincia`);

--
-- Indices de la tabla `Marca`
--
ALTER TABLE `Marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `Marca_dispositivos`
--
ALTER TABLE `Marca_dispositivos`
  ADD PRIMARY KEY (`id_marca_dispositivos`);

--
-- Indices de la tabla `Modelo_dispositivos`
--
ALTER TABLE `Modelo_dispositivos`
  ADD PRIMARY KEY (`id_modelo_dispositivos`),
  ADD KEY `Ref4140` (`id_marca_dispositivos`);

--
-- Indices de la tabla `Modulos`
--
ALTER TABLE `Modulos`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `Pais`
--
ALTER TABLE `Pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `Perfiles`
--
ALTER TABLE `Perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `Perfil_modulo`
--
ALTER TABLE `Perfil_modulo`
  ADD PRIMARY KEY (`id_perfil_modulo`),
  ADD KEY `Ref4544` (`id_perfil`),
  ADD KEY `Ref4645` (`id_modulo`);

--
-- Indices de la tabla `Personas`
--
ALTER TABLE `Personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `Ref4847` (`id_sexo`),
  ADD KEY `Ref21` (`id_tipo_documento`);

--
-- Indices de la tabla `Personas_Domicilios`
--
ALTER TABLE `Personas_Domicilios`
  ADD PRIMARY KEY (`id_persona_domicilio`),
  ADD KEY `Ref19` (`id_persona`),
  ADD KEY `Ref1310` (`id_domicilio`);

--
-- Indices de la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `Ref3938` (`id_marca`),
  ADD KEY `Ref4039` (`id_rubro`);

--
-- Indices de la tabla `Producto_imagen`
--
ALTER TABLE `Producto_imagen`
  ADD PRIMARY KEY (`id_producto_imagen`),
  ADD KEY `Ref2442` (`id_producto`);

--
-- Indices de la tabla `Proveedor`
--
ALTER TABLE `Proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `Proveedor_Contacto`
--
ALTER TABLE `Proveedor_Contacto`
  ADD PRIMARY KEY (`id_proveedor_contacto`),
  ADD KEY `Ref2061` (`id_proveedor`),
  ADD KEY `Ref562` (`id_tipo_contacto`);

--
-- Indices de la tabla `Provincia`
--
ALTER TABLE `Provincia`
  ADD PRIMARY KEY (`id_provincia`),
  ADD KEY `Ref95` (`id_pais`);

--
-- Indices de la tabla `Reparaciones`
--
ALTER TABLE `Reparaciones`
  ADD PRIMARY KEY (`id_reparacion`),
  ADD KEY `Ref1828` (`id_empleado`),
  ADD KEY `Ref330` (`id_cliente`),
  ADD KEY `Ref3131` (`id_estado_reparacion`),
  ADD KEY `Ref3232` (`id_local`),
  ADD KEY `Ref4241` (`id_modelo_dispositivos`);

--
-- Indices de la tabla `rubro`
--
ALTER TABLE `rubro`
  ADD PRIMARY KEY (`id_rubro`);

--
-- Indices de la tabla `Sexo`
--
ALTER TABLE `Sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Indices de la tabla `tipos_facturas`
--
ALTER TABLE `tipos_facturas`
  ADD PRIMARY KEY (`id_tipos_facturas`);

--
-- Indices de la tabla `tipos_impositivos`
--
ALTER TABLE `tipos_impositivos`
  ADD PRIMARY KEY (`id_tipos_impositivos`);

--
-- Indices de la tabla `tipos_pagos`
--
ALTER TABLE `tipos_pagos`
  ADD PRIMARY KEY (`id_tipos_pagos`);

--
-- Indices de la tabla `Tipo_Contacto`
--
ALTER TABLE `Tipo_Contacto`
  ADD PRIMARY KEY (`id_tipo_contacto`);

--
-- Indices de la tabla `Tipo_documento`
--
ALTER TABLE `Tipo_documento`
  ADD PRIMARY KEY (`id_tipo_documento`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `Ref127` (`id_persona`),
  ADD KEY `Ref4546` (`id_perfil`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `Ref321` (`id_cliente`),
  ADD KEY `Ref1823` (`id_empleado`),
  ADD KEY `Ref4948` (`id_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Barrios`
--
ALTER TABLE `Barrios`
  MODIFY `id_barrios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Cliente`
--
ALTER TABLE `Cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Compra`
--
ALTER TABLE `Compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Contactos`
--
ALTER TABLE `Contactos`
  MODIFY `id_contactos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Detalle_compra`
--
ALTER TABLE `Detalle_compra`
  MODIFY `id_detalle_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Detalle_Reparacion`
--
ALTER TABLE `Detalle_Reparacion`
  MODIFY `id_detalle_reparacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Detalle_ventas`
--
ALTER TABLE `Detalle_ventas`
  MODIFY `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Direccion`
--
ALTER TABLE `Direccion`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Dispositivo_imagen`
--
ALTER TABLE `Dispositivo_imagen`
  MODIFY `id_dispositivo_imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Domicilios`
--
ALTER TABLE `Domicilios`
  MODIFY `id_domicilio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Empleado`
--
ALTER TABLE `Empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Estado`
--
ALTER TABLE `Estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados_pagos`
--
ALTER TABLE `estados_pagos`
  MODIFY `id_estados_pagos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Estado_reparacion`
--
ALTER TABLE `Estado_reparacion`
  MODIFY `id_estado_reparacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Factura`
--
ALTER TABLE `Factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Facturas_pagos`
--
ALTER TABLE `Facturas_pagos`
  MODIFY `id_facturas_pagos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Factura_Detalle`
--
ALTER TABLE `Factura_Detalle`
  MODIFY `id_factura_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Factura_impuestos`
--
ALTER TABLE `Factura_impuestos`
  MODIFY `id_factura_impuesto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Local`
--
ALTER TABLE `Local`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Localidad`
--
ALTER TABLE `Localidad`
  MODIFY `id_localidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Marca`
--
ALTER TABLE `Marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Marca_dispositivos`
--
ALTER TABLE `Marca_dispositivos`
  MODIFY `id_marca_dispositivos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Modelo_dispositivos`
--
ALTER TABLE `Modelo_dispositivos`
  MODIFY `id_modelo_dispositivos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Modulos`
--
ALTER TABLE `Modulos`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Pais`
--
ALTER TABLE `Pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Perfiles`
--
ALTER TABLE `Perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `Perfil_modulo`
--
ALTER TABLE `Perfil_modulo`
  MODIFY `id_perfil_modulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Personas`
--
ALTER TABLE `Personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Personas_Domicilios`
--
ALTER TABLE `Personas_Domicilios`
  MODIFY `id_persona_domicilio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Productos`
--
ALTER TABLE `Productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Producto_imagen`
--
ALTER TABLE `Producto_imagen`
  MODIFY `id_producto_imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Proveedor`
--
ALTER TABLE `Proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Proveedor_Contacto`
--
ALTER TABLE `Proveedor_Contacto`
  MODIFY `id_proveedor_contacto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Reparaciones`
--
ALTER TABLE `Reparaciones`
  MODIFY `id_reparacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rubro`
--
ALTER TABLE `rubro`
  MODIFY `id_rubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipos_facturas`
--
ALTER TABLE `tipos_facturas`
  MODIFY `id_tipos_facturas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_impositivos`
--
ALTER TABLE `tipos_impositivos`
  MODIFY `id_tipos_impositivos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_pagos`
--
ALTER TABLE `tipos_pagos`
  MODIFY `id_tipos_pagos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Tipo_Contacto`
--
ALTER TABLE `Tipo_Contacto`
  MODIFY `id_tipo_contacto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Tipo_documento`
--
ALTER TABLE `Tipo_documento`
  MODIFY `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Barrios`
--
ALTER TABLE `Barrios`
  ADD CONSTRAINT `RefLocalidad7` FOREIGN KEY (`id_localidad`) REFERENCES `Localidad` (`id_localidad`);

--
-- Filtros para la tabla `Cliente`
--
ALTER TABLE `Cliente`
  ADD CONSTRAINT `RefPersonas12` FOREIGN KEY (`id_persona`) REFERENCES `Personas` (`id_persona`);

--
-- Filtros para la tabla `Compra`
--
ALTER TABLE `Compra`
  ADD CONSTRAINT `RefEmpleado24` FOREIGN KEY (`id_empleado`) REFERENCES `Empleado` (`id_empleado`),
  ADD CONSTRAINT `RefEstado49` FOREIGN KEY (`id_estado`) REFERENCES `Estado` (`id_estado`),
  ADD CONSTRAINT `RefProveedor36` FOREIGN KEY (`id_proveedor`) REFERENCES `Proveedor` (`id_proveedor`);

--
-- Filtros para la tabla `Contactos`
--
ALTER TABLE `Contactos`
  ADD CONSTRAINT `RefPersonas35` FOREIGN KEY (`id_persona`) REFERENCES `Personas` (`id_persona`),
  ADD CONSTRAINT `RefTipo_Contacto2` FOREIGN KEY (`id_tipo_contacto`) REFERENCES `Tipo_Contacto` (`id_tipo_contacto`);

--
-- Filtros para la tabla `Detalle_compra`
--
ALTER TABLE `Detalle_compra`
  ADD CONSTRAINT `RefCompra17` FOREIGN KEY (`id_compra`) REFERENCES `Compra` (`id_compra`),
  ADD CONSTRAINT `RefProductos18` FOREIGN KEY (`id_producto`) REFERENCES `Productos` (`id_producto`);

--
-- Filtros para la tabla `Detalle_Reparacion`
--
ALTER TABLE `Detalle_Reparacion`
  ADD CONSTRAINT `RefFactura58` FOREIGN KEY (`id_factura`) REFERENCES `Factura` (`id_factura`),
  ADD CONSTRAINT `RefReparaciones59` FOREIGN KEY (`id_reparacion`) REFERENCES `Reparaciones` (`id_reparacion`);

--
-- Filtros para la tabla `Detalle_ventas`
--
ALTER TABLE `Detalle_ventas`
  ADD CONSTRAINT `RefProductos26` FOREIGN KEY (`id_producto`) REFERENCES `Productos` (`id_producto`),
  ADD CONSTRAINT `Refventa25` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`);

--
-- Filtros para la tabla `Direccion`
--
ALTER TABLE `Direccion`
  ADD CONSTRAINT `RefProveedor60` FOREIGN KEY (`id_proveedor`) REFERENCES `Proveedor` (`id_proveedor`);

--
-- Filtros para la tabla `Dispositivo_imagen`
--
ALTER TABLE `Dispositivo_imagen`
  ADD CONSTRAINT `RefReparaciones43` FOREIGN KEY (`id_reparacion`) REFERENCES `Reparaciones` (`id_reparacion`);

--
-- Filtros para la tabla `Domicilios`
--
ALTER TABLE `Domicilios`
  ADD CONSTRAINT `RefBarrios8` FOREIGN KEY (`id_barrios`) REFERENCES `Barrios` (`id_barrios`);

--
-- Filtros para la tabla `Empleado`
--
ALTER TABLE `Empleado`
  ADD CONSTRAINT `RefPersonas13` FOREIGN KEY (`id_persona`) REFERENCES `Personas` (`id_persona`);

--
-- Filtros para la tabla `Factura`
--
ALTER TABLE `Factura`
  ADD CONSTRAINT `Refestados_pagos51` FOREIGN KEY (`id_estados_pagos`) REFERENCES `estados_pagos` (`id_estados_pagos`),
  ADD CONSTRAINT `Reftipos_facturas50` FOREIGN KEY (`id_tipos_facturas`) REFERENCES `tipos_facturas` (`id_tipos_facturas`);

--
-- Filtros para la tabla `Facturas_pagos`
--
ALTER TABLE `Facturas_pagos`
  ADD CONSTRAINT `RefFactura54` FOREIGN KEY (`id_factura`) REFERENCES `Factura` (`id_factura`),
  ADD CONSTRAINT `Reftipos_pagos55` FOREIGN KEY (`id_tipos_pagos`) REFERENCES `tipos_pagos` (`id_tipos_pagos`);

--
-- Filtros para la tabla `Factura_Detalle`
--
ALTER TABLE `Factura_Detalle`
  ADD CONSTRAINT `RefDetalle_ventas57` FOREIGN KEY (`id_detalle_venta`) REFERENCES `Detalle_ventas` (`id_detalle_venta`),
  ADD CONSTRAINT `RefFactura56` FOREIGN KEY (`id_factura`) REFERENCES `Factura` (`id_factura`);

--
-- Filtros para la tabla `Factura_impuestos`
--
ALTER TABLE `Factura_impuestos`
  ADD CONSTRAINT `RefFactura52` FOREIGN KEY (`id_factura`) REFERENCES `Factura` (`id_factura`),
  ADD CONSTRAINT `Reftipos_impositivos53` FOREIGN KEY (`id_tipos_impositivos`) REFERENCES `tipos_impositivos` (`id_tipos_impositivos`);

--
-- Filtros para la tabla `Localidad`
--
ALTER TABLE `Localidad`
  ADD CONSTRAINT `RefProvincia6` FOREIGN KEY (`id_provincia`) REFERENCES `Provincia` (`id_provincia`);

--
-- Filtros para la tabla `Modelo_dispositivos`
--
ALTER TABLE `Modelo_dispositivos`
  ADD CONSTRAINT `RefMarca_dispositivos40` FOREIGN KEY (`id_marca_dispositivos`) REFERENCES `Marca_dispositivos` (`id_marca_dispositivos`);

--
-- Filtros para la tabla `Perfil_modulo`
--
ALTER TABLE `Perfil_modulo`
  ADD CONSTRAINT `RefModulos45` FOREIGN KEY (`id_modulo`) REFERENCES `Modulos` (`id_modulo`),
  ADD CONSTRAINT `RefPerfiles44` FOREIGN KEY (`id_perfil`) REFERENCES `Perfiles` (`id_perfil`);

--
-- Filtros para la tabla `Personas`
--
ALTER TABLE `Personas`
  ADD CONSTRAINT `RefSexo47` FOREIGN KEY (`id_sexo`) REFERENCES `Sexo` (`id_sexo`),
  ADD CONSTRAINT `RefTipo_documento1` FOREIGN KEY (`id_tipo_documento`) REFERENCES `Tipo_documento` (`id_tipo_documento`);

--
-- Filtros para la tabla `Personas_Domicilios`
--
ALTER TABLE `Personas_Domicilios`
  ADD CONSTRAINT `RefDomicilios10` FOREIGN KEY (`id_domicilio`) REFERENCES `Domicilios` (`id_domicilio`),
  ADD CONSTRAINT `RefPersonas9` FOREIGN KEY (`id_persona`) REFERENCES `Personas` (`id_persona`);

--
-- Filtros para la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD CONSTRAINT `RefMarca38` FOREIGN KEY (`id_marca`) REFERENCES `Marca` (`id_marca`),
  ADD CONSTRAINT `Refrubro39` FOREIGN KEY (`id_rubro`) REFERENCES `rubro` (`id_rubro`);

--
-- Filtros para la tabla `Producto_imagen`
--
ALTER TABLE `Producto_imagen`
  ADD CONSTRAINT `RefProductos42` FOREIGN KEY (`id_producto`) REFERENCES `Productos` (`id_producto`);

--
-- Filtros para la tabla `Proveedor_Contacto`
--
ALTER TABLE `Proveedor_Contacto`
  ADD CONSTRAINT `RefProveedor61` FOREIGN KEY (`id_proveedor`) REFERENCES `Proveedor` (`id_proveedor`),
  ADD CONSTRAINT `RefTipo_Contacto62` FOREIGN KEY (`id_tipo_contacto`) REFERENCES `Tipo_Contacto` (`id_tipo_contacto`);

--
-- Filtros para la tabla `Provincia`
--
ALTER TABLE `Provincia`
  ADD CONSTRAINT `RefPais5` FOREIGN KEY (`id_pais`) REFERENCES `Pais` (`id_pais`);

--
-- Filtros para la tabla `Reparaciones`
--
ALTER TABLE `Reparaciones`
  ADD CONSTRAINT `RefCliente30` FOREIGN KEY (`id_cliente`) REFERENCES `Cliente` (`id_cliente`),
  ADD CONSTRAINT `RefEmpleado28` FOREIGN KEY (`id_empleado`) REFERENCES `Empleado` (`id_empleado`),
  ADD CONSTRAINT `RefEstado_reparacion31` FOREIGN KEY (`id_estado_reparacion`) REFERENCES `Estado_reparacion` (`id_estado_reparacion`),
  ADD CONSTRAINT `RefLocal32` FOREIGN KEY (`id_local`) REFERENCES `Local` (`id_local`),
  ADD CONSTRAINT `RefModelo_dispositivos41` FOREIGN KEY (`id_modelo_dispositivos`) REFERENCES `Modelo_dispositivos` (`id_modelo_dispositivos`);

--
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `RefPerfiles46` FOREIGN KEY (`id_perfil`) REFERENCES `Perfiles` (`id_perfil`),
  ADD CONSTRAINT `RefPersonas27` FOREIGN KEY (`id_persona`) REFERENCES `Personas` (`id_persona`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `RefCliente21` FOREIGN KEY (`id_cliente`) REFERENCES `Cliente` (`id_cliente`),
  ADD CONSTRAINT `RefEmpleado23` FOREIGN KEY (`id_empleado`) REFERENCES `Empleado` (`id_empleado`),
  ADD CONSTRAINT `RefEstado48` FOREIGN KEY (`id_estado`) REFERENCES `Estado` (`id_estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
