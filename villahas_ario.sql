-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-12-2022 a las 21:29:19
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `villahas_ario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonos_gastos`
--

CREATE TABLE `abonos_gastos` (
  `id_abono` int(11) NOT NULL,
  `id_gasto` int(11) NOT NULL,
  `monto` double NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `abonos_gastos`
--

INSERT INTO `abonos_gastos` (`id_abono`, `id_gasto`, `monto`, `fecha`) VALUES
(2, 13, 900, '2022-04-13 15:52:51'),
(3, 14, 1800, '2022-04-13 15:52:51'),
(4, 16, 200, '2022-06-27 14:02:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activos`
--

CREATE TABLE `activos` (
  `id_activo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `valor_unitario` double NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_total` double NOT NULL,
  `fecha_adqui` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `activos`
--

INSERT INTO `activos` (`id_activo`, `nombre`, `valor_unitario`, `cantidad`, `valor_total`, `fecha_adqui`) VALUES
(3, 'Tarimas', 200, 5, 1000, '2022-01-19'),
(4, 'Computadoras', 3000, 3, 9000, '2022-01-19'),
(5, 'Sillas', 30, 20, 600, '2022-06-20'),
(7, 'Camioneta', 30000, 2, 60000, '2022-06-27'),
(8, 'Cajas', 20, 20, 400, '2022-06-27'),
(9, 'Ford', 250000, 1, 250000, '2022-07-02'),
(10, 'Cajas Azules', 50, 2000, 100000, '2022-07-02'),
(11, 'Chevrolet blanca', 100000, 1, 100000, '2022-07-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id_caja` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `dinero` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`id_caja`, `nombre`, `dinero`) VALUES
(3, 'Caja Bodega Ario', 36284),
(4, 'Cuenta OMVIZA', 104409),
(5, 'Cuenta PAULINA', 28810),
(6, 'Cuenta HSBC', 40321),
(7, 'Cochinito', 333000345);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL,
  `ApetPa` varchar(25) DEFAULT NULL,
  `ApetMa` varchar(25) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `razon_social` varchar(50) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `Nombre`, `ApetPa`, `ApetMa`, `telefono`, `razon_social`, `direccion`) VALUES
(1, 'Mario', 'Mendez', 'Marquez', '4251006712', 'Aguacates Ario', 'Calle victor Rosales, colonia los fresnos numero 25'),
(2, 'Oscar', 'Munguia', 'Alanis', '4251354323', 'Avocados Reyes', 'Calle victor Rosales, colonia los fresnos numero 26'),
(4, 'Juan', 'Ayala', 'Ledesma', '4251006813', 'Centro de Acopio', ''),
(6, 'Arturo', 'Romero', 'Lopez', '4251358914', 'El Rey del Aguacate', 'Lomas del Rio #65'),
(7, 'Antonio', 'Torres', 'Torres', '4251643132', 'Aguacates', 'La huarachita #34'),
(8, 'Antonio', 'Martinez', 'Torres', '4251181588', 'Los Hermanos Inc', 'Col Centro #25'),
(9, 'Juan', 'Ramirez', 'Marquez', '4251006711', 'El pricipe del aguacate', 'Calle Francisco Villa #27'),
(10, 'Juan', 'Marquez', 'Oropeza', '4521171912', 'Aguacates de Ario', 'Calle Mil cumbres #34'),
(11, 'Roberto', 'Martinez', 'Jimnez', '4251181587', 'Los tres tristes tigres', 'Madero #24'),
(12, 'Juan', 'Martinez', 'Marquez', '4251181588', 'El Valle Avocados', 'Col Centro #25'),
(13, 'Heriberto', 'Jimenez', 'Gonzales', '4251111227', 'Murrietass', 'Degollado #76'),
(14, 'Ernesto', 'Castro', 'Gonzales', '7521158970', 'Rentable', 'Calle Mina #34'),
(15, 'Juan Manuel', 'Garcia', 'Mendez', '4251006713', 'Juan Manuel Aguacates', 'Calle Arriaga #3 Col Morelos'),
(16, 'Manuel', 'Hernandez', 'Lopez', '4251181587', 'Avocados chidos', 'Col Centro'),
(17, 'Francisco', 'Cortes', 'Rodriguez', '4433781412', 'Pacos aguacates', '#Calle corregidsora'),
(18, 'Adolfo', 'Reina', 'Mayor', '4251006812', 'Reina Agucates', 'Colo Centro #94'),
(19, 'Hector', '', 'Sanchez', '4251007682', 'Aguacates Pueblito', 'Col Centro Inteligente'),
(20, 'Britanni', 'Castillo', 'C', '4433723492', 'Aguacates Morelia', 'Col Centro #45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `factura` varchar(40) DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_pago` int(11) DEFAULT NULL,
  `id_credito` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `total`, `factura`, `id_cliente`, `id_pago`, `id_credito`, `fecha`) VALUES
(6, 2000, 'Factura', 9, NULL, NULL, '2021-12-30 23:59:59'),
(7, 0, 'sdfdgh', 1, NULL, NULL, '2021-12-19 11:00:33'),
(8, 0, 'Factura10', 2, NULL, NULL, '2021-12-19 13:24:01'),
(9, 0, 'sdfdgh', 1, NULL, NULL, '2021-12-19 13:29:06'),
(10, 0, '24D78', 1, NULL, NULL, '2021-12-19 13:35:00'),
(11, 0, 'Factura97', 1, NULL, NULL, '2021-12-19 13:37:59'),
(12, 0, 'Factura10', 1, NULL, NULL, '2021-12-19 13:38:37'),
(13, 0, 'tuuk', 7, NULL, NULL, '2021-12-19 13:44:40'),
(14, 0, 'tuuk', 7, NULL, NULL, '2021-12-19 13:45:07'),
(15, 0, 'Factura97', 8, NULL, 6, '2021-12-19 13:49:49'),
(16, 6000, 'Factura97', 8, NULL, 7, '2021-12-19 13:52:18'),
(17, 18800, 'Factura102', 4, NULL, 8, '2021-12-19 14:44:58'),
(18, 8000, 'Factura10', 1, NULL, 9, '2021-12-19 14:46:12'),
(19, 7500, 'Factura12', 10, NULL, NULL, '2021-12-19 14:52:27'),
(20, 8000, 'Factura', 1, 5, NULL, '2021-12-19 15:01:02'),
(21, 15200, 'F98', 1, 6, NULL, '2021-12-19 15:05:08'),
(22, 3600, 'Facturopta', 1, 7, NULL, '2021-12-19 15:11:56'),
(23, 10000, 'fojnhdfgbij', 1, 8, NULL, '2021-12-19 15:16:28'),
(24, 40000, 'Fcatura1233', 14, 9, NULL, '2021-12-20 22:23:09'),
(25, 10000, 'Factura', 6, 10, NULL, '2021-12-20 22:37:18'),
(26, 34000, 'Factura', 9, NULL, 10, '2021-12-22 16:24:07'),
(27, 8100, 'hyjfgk', 1, 32, NULL, '2022-02-02 17:38:37'),
(28, 4000, '', 1, NULL, 11, '2022-02-02 17:43:24'),
(29, 0, '', 1, 34, NULL, '2022-03-24 18:39:01'),
(30, 0, '', 1, 35, NULL, '2022-03-24 18:46:51'),
(31, 14220, 'fdhjf', 1, 36, NULL, '2022-03-24 18:53:09'),
(32, 18450, 'Factura', 14, 37, NULL, '2022-03-27 08:56:20'),
(33, 11100, 'Fcatura', 7, 38, NULL, '2022-03-27 08:57:08'),
(34, 9000, 'ddfd', 6, NULL, 12, '2022-03-27 08:58:36'),
(35, 10050, 'hg', 10, 39, NULL, '2022-03-27 09:00:00'),
(36, 3450, 'sdsfg', 14, 40, NULL, '2022-03-27 09:16:33'),
(37, 11300, '67', 1, 41, NULL, '2022-03-27 09:18:39'),
(38, 22800, 'No necesaria', 1, NULL, 13, '2022-06-20 18:13:42'),
(39, 600, '', 1, NULL, NULL, '2022-06-20 19:31:54'),
(40, 6000, '', 13, NULL, 14, '2022-06-20 19:42:12'),
(41, 9600, '', 11, NULL, 15, '2022-06-20 19:43:04'),
(42, 103500, 'Sin factura', 1, NULL, 16, '2022-06-20 19:45:22'),
(43, 14700, 'Amonos', 1, NULL, 17, '2022-06-20 20:04:26'),
(44, 16400, 'Sin factura', 1, 43, NULL, '2022-06-20 20:24:50'),
(45, 24300, 'Varias', 1, NULL, 18, '2022-06-20 20:25:35'),
(46, 13800, 'Sin factura', 1, NULL, 19, '2022-06-20 20:26:08'),
(47, 3600, 'Monto', 10, NULL, 20, '2022-06-20 20:26:59'),
(48, 3900, 'Sin factura', 16, 44, NULL, '2022-06-20 20:27:24'),
(49, 6900, 'sd', 1, 45, NULL, '2022-06-20 20:27:41'),
(50, 10200, 'w', 4, 46, NULL, '2022-06-20 20:28:13'),
(51, 600, 'Sin factura', 1, NULL, NULL, '2022-06-20 22:02:29'),
(52, 6900, 'Sin factura', 1, NULL, NULL, '2022-06-20 22:02:41'),
(53, 0, 'Sin factura', 1, NULL, NULL, '2022-06-20 22:03:41'),
(54, 4950, '789293', 1, 47, NULL, '2022-06-23 21:11:10'),
(55, 8160, 'Factura234', 12, NULL, 21, '2022-06-23 21:16:19'),
(56, 5000, 'Sin factura', 14, 48, NULL, '2022-06-23 21:18:33'),
(57, 6000, 'Sin factura', 9, 49, NULL, '2022-06-26 15:38:24'),
(58, 3000, 'Sin factura', 1, 50, NULL, '2022-06-26 15:39:26'),
(59, 3550, 'Sin factura', 4, 51, NULL, '2022-06-26 18:06:08'),
(60, 3000, 'Sin factura', 10, NULL, 22, '2022-06-26 18:08:18'),
(61, 1100, 'Sin factura', 1, NULL, 23, '2022-07-02 20:37:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditos`
--

CREATE TABLE `creditos` (
  `id_credito` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL DEFAULT current_timestamp(),
  `monto_debe` double NOT NULL,
  `id_pago` int(11) DEFAULT NULL,
  `folio_venta` int(11) DEFAULT NULL,
  `Estado` tinytext NOT NULL DEFAULT 'Pendiente',
  `notas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `creditos`
--

INSERT INTO `creditos` (`id_credito`, `fecha_inicio`, `monto_debe`, `id_pago`, `folio_venta`, `Estado`, `notas`) VALUES
(8, '2021-11-14 18:19:25', -9005, 1, 25, 'Pendiente', ''),
(9, '2021-11-14 18:26:56', -4005, 1, 10, 'Pagado', ''),
(12, '2021-11-14 18:29:09', 9899, NULL, NULL, 'Pendiente', ''),
(27, '2021-11-15 21:39:55', -100, NULL, 59, 'Pendiente', ''),
(28, '2021-11-15 21:40:17', 0, NULL, 60, 'Pagado', ''),
(29, '2021-11-15 21:43:51', 1080, NULL, 61, 'Pendiente', ''),
(30, '2021-11-15 22:38:38', 200, NULL, 62, 'Pendiente', ''),
(31, '2021-11-16 20:37:33', 4590, NULL, 64, 'Pendiente', ''),
(32, '2021-11-17 17:06:45', 1137, NULL, 65, 'Pendiente', ''),
(33, '2021-11-17 17:11:07', 0, NULL, 66, 'Pagado', ''),
(34, '2021-11-17 17:39:37', 3400, NULL, 67, 'Pendiente', ''),
(35, '2021-11-19 18:57:45', 0, NULL, 71, 'Pagado', ''),
(36, '2021-11-25 11:58:17', 0, NULL, 76, 'Pagado', ''),
(37, '2021-11-29 22:03:22', 0, NULL, 77, 'Pagado', ''),
(38, '2021-12-01 10:40:37', 0, NULL, 78, 'Pagado', ''),
(39, '2021-12-01 14:13:40', 0, NULL, 79, 'Pagado', ''),
(40, '2021-12-01 14:46:56', 30000, NULL, 80, 'Pendiente', ''),
(41, '2021-12-06 07:39:42', -1, NULL, 82, 'Pagado', ''),
(42, '2021-12-06 07:56:47', 0, NULL, 83, 'Pendiente', ''),
(43, '2021-12-06 08:05:33', 0, NULL, 84, 'Pendiente', ''),
(44, '2021-12-06 08:19:15', 0, NULL, 85, 'Pendiente', ''),
(45, '2021-12-06 09:31:23', 0, NULL, 86, 'Pendiente', ''),
(46, '2021-12-06 09:32:15', 0, NULL, 87, 'Pendiente', ''),
(47, '2021-12-06 09:34:17', 0, NULL, 88, 'Pendiente', ''),
(48, '2021-12-06 09:38:01', 0, NULL, 89, 'Pendiente', ''),
(49, '2021-12-06 09:38:56', 0, NULL, 90, 'Pendiente', ''),
(50, '2021-12-06 09:40:04', 0, NULL, 91, 'Pendiente', ''),
(51, '2021-12-06 09:42:47', 0, NULL, 92, 'Pendiente', ''),
(52, '2021-12-06 10:29:07', 0, NULL, 93, 'Pendiente', ''),
(53, '2021-12-09 18:01:34', 2.33, NULL, 97, 'Pendiente', ''),
(54, '2021-12-09 22:54:15', 0, 0, 117, 'Pagado', ''),
(55, '2021-12-15 16:49:25', 11800, 0, 121, 'Pendiente', ''),
(56, '2021-12-17 16:31:42', 0, 0, 122, 'Pendiente', ''),
(57, '2021-12-17 16:32:33', 0, 0, 123, 'Pendiente', ''),
(58, '2021-12-17 20:03:05', 2400, 0, 125, 'Pendiente', ''),
(59, '2021-12-19 14:51:16', 4500, 0, 127, 'Pendiente', ''),
(60, '2021-12-19 18:25:33', 1000, 0, 131, 'Pendiente', ''),
(61, '2021-12-23 18:27:23', 9000, 0, 132, 'Pendiente', ''),
(62, '2021-12-28 20:09:48', 0, 0, 133, 'Pagado', ''),
(63, '2022-06-08 19:44:39', 0, 0, 135, 'Pagado', ''),
(64, '2022-06-20 22:07:19', 0, 0, 138, 'Pagado', ''),
(65, '2022-06-26 18:16:59', 0, 0, 141, 'Pagado', ''),
(66, '2022-06-30 10:16:57', 0, 0, 143, 'Pagado', ''),
(67, '2022-07-02 23:36:44', 25, 0, 153, 'Pendiente', 'Existen ciertas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credito_compra`
--

CREATE TABLE `credito_compra` (
  `id_creditoCom` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL DEFAULT current_timestamp(),
  `forma_pago` varchar(40) NOT NULL,
  `fecha_limite` datetime NOT NULL,
  `monto_deuda` double NOT NULL,
  `id_compra` int(11) NOT NULL,
  `estado` tinytext NOT NULL DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `credito_compra`
--

INSERT INTO `credito_compra` (`id_creditoCom`, `fecha_inicio`, `forma_pago`, `fecha_limite`, `monto_deuda`, `id_compra`, `estado`) VALUES
(1, '2021-12-19 13:33:15', 'Cheque', '2021-12-31 13:32:41', 0, 6, 'Pagado'),
(2, '2021-12-19 13:35:00', 'Efectivo', '0000-00-00 00:00:00', 6400, 10, 'Pendiente'),
(3, '2021-12-19 13:37:59', 'Efectivo', '0000-00-00 00:00:00', 1000, 11, 'Pendiente'),
(4, '2021-12-19 13:44:40', 'Efectivo', '0000-00-00 00:00:00', 6000, 13, 'Pendiente'),
(5, '2021-12-19 13:45:07', 'Efectivo', '0000-00-00 00:00:00', 6000, 14, 'Pendiente'),
(6, '2021-12-19 13:49:49', 'Efectivo', '0000-00-00 00:00:00', 0, 15, 'Pendiente'),
(7, '2021-12-19 13:52:18', 'Efectivo', '0000-00-00 00:00:00', 6000, 16, 'Pendiente'),
(8, '2021-12-19 14:44:58', 'Cheque', '0000-00-00 00:00:00', 6800, 17, 'Pendiente'),
(9, '2021-12-19 14:46:12', 'Efectivo', '0000-00-00 00:00:00', 0, 18, 'Pagado'),
(10, '2021-12-22 16:24:07', 'Efectivo', '0000-00-00 00:00:00', 0, 26, 'Pagado'),
(11, '2022-02-02 17:43:24', 'Efectivo', '0000-00-00 00:00:00', 1000, 28, 'Pendiente'),
(12, '2022-03-27 08:58:36', 'Cheque', '0000-00-00 00:00:00', 9000, 34, 'Pendiente'),
(13, '2022-06-20 18:13:42', 'Efectivo', '0000-00-00 00:00:00', 22800, 38, 'Pendiente'),
(14, '2022-06-20 19:42:12', 'Efectivo', '0000-00-00 00:00:00', 6000, 40, 'Pendiente'),
(15, '2022-06-20 19:43:04', 'Efectivo', '0000-00-00 00:00:00', 9600, 41, 'Pendiente'),
(16, '2022-06-20 19:45:22', 'Efectivo', '0000-00-00 00:00:00', 103500, 42, 'Pendiente'),
(17, '2022-06-20 20:04:26', 'Efectivo', '0000-00-00 00:00:00', 4700, 43, 'Pendiente'),
(18, '2022-06-20 20:25:35', 'Efectivo', '0000-00-00 00:00:00', 24300, 45, 'Pendiente'),
(19, '2022-06-20 20:26:08', 'Efectivo', '0000-00-00 00:00:00', 13800, 46, 'Pendiente'),
(20, '2022-06-20 20:26:59', 'Efectivo', '0000-00-00 00:00:00', 3600, 47, 'Pendiente'),
(21, '2022-06-23 21:16:19', 'Efectivo', '0000-00-00 00:00:00', 8160, 55, 'Pendiente'),
(22, '2022-06-26 18:08:18', 'Efectivo', '0000-00-00 00:00:00', 700, 60, 'Pendiente'),
(23, '2022-07-02 20:37:18', 'Transferencia', '0000-00-00 00:00:00', 200, 61, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion_compra`
--

CREATE TABLE `descripcion_compra` (
  `id_compra` int(11) NOT NULL,
  `calibre` varchar(50) NOT NULL,
  `cajas` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `descripcion_compra`
--

INSERT INTO `descripcion_compra` (`id_compra`, `calibre`, `cajas`, `subtotal`, `precio`) VALUES
(7, '0', 32, 6400, 0),
(7, '0', 32, 5760, 0),
(8, '0', 30, 4500, 0),
(8, '0', 20, 6000, 0),
(9, '0', 32, 6400, 0),
(9, '0', 32, 5760, 0),
(10, '0', 32, 6400, 0),
(10, '0', 32, 5760, 0),
(11, '0', 30, 9000, 0),
(11, '0', 300, 60000, 0),
(12, '0', 40, 6000, 0),
(12, '0', 50, 15000, 0),
(13, '0', 20, 6000, 0),
(13, '0', 20, 3600, 0),
(14, '0', 20, 6000, 0),
(14, '0', 20, 3600, 0),
(15, '0', 30, 6000, 0),
(16, '0', 30, 6000, 0),
(16, '0', 30, 9000, 0),
(17, '0', 30, 5100, 0),
(17, '0', 23, 6900, 0),
(17, '0', 34, 6800, 0),
(18, '0', 40, 8000, 0),
(19, '0', 30, 7500, 0),
(20, '0', 40, 8000, 0),
(21, 'Extra', 20, 3000, 0),
(21, 'Primera B', 30, 5400, 0),
(21, 'Tercera', 40, 6800, 0),
(22, 'Primera B', 20, 3600, 0),
(23, 'Super', 50, 10000, 0),
(24, 'Super', 200, 40000, 0),
(25, 'Super Roña', 20, 6000, 0),
(25, 'Extra B', 40, 4000, 0),
(26, 'Super', 100, 20000, 0),
(26, 'Super B', 90, 9000, 0),
(26, 'Extra B', 50, 5000, 0),
(27, 'Super Roña', 23, 6900, 0),
(27, 'Primera', 24, 1200, 0),
(28, 'Extra B', 30, 3000, 0),
(28, 'Primera', 20, 1000, 0),
(29, 'Super', 20, 0, 0),
(29, 'Super', 30, 0, 0),
(30, 'Extra B', 12, 0, 0),
(30, 'Super B', 23, 0, 0),
(31, 'Parejo', 12, 1320, 0),
(31, 'Proceso', 43, 12900, 0),
(32, 'Limpio', 23, 3450, 0),
(32, 'Canica', 80, 12000, 0),
(32, 'Proceso', 10, 3000, 0),
(33, 'Proceso', 20, 6000, 0),
(33, 'Limpio', 34, 5100, 0),
(34, 'Limpio', 20, 3000, 0),
(34, 'Limpio', 40, 6000, 0),
(35, 'Limpio', 67, 10050, 0),
(36, 'Limpio', 23, 3450, 0),
(37, 'Limpio', 56, 8400, 0),
(37, 'Maquila', 58, 2900, 0),
(38, 'Limpio', 30, 9000, 0),
(38, 'Parejo', 20, 2200, 0),
(38, 'Proceso', 20, 6000, 0),
(38, 'Canica', 10, 1500, 0),
(38, 'Desecho', 20, 2000, 0),
(38, 'Maquila', 30, 1500, 0),
(38, 'Caja de 10 kg', 12, 600, 0),
(39, 'Limpio', 2, 600, 0),
(40, 'Limpio', 20, 6000, 0),
(41, 'Limpio', 32, 9600, 0),
(42, 'Limpio', 345, 103500, 0),
(43, 'Limpio', 49, 14700, 0),
(44, 'Limpio', 40, 12000, 0),
(44, 'Parejo', 40, 4400, 0),
(45, 'Limpio', 40, 12000, 0),
(45, 'Limpio', 41, 12300, 0),
(46, 'Limpio', 23, 6900, 0),
(46, 'Limpio', 23, 6900, 0),
(47, 'Limpio', 12, 3600, 0),
(48, 'Limpio', 13, 3900, 0),
(49, 'Limpio', 23, 6900, 0),
(50, 'Limpio', 34, 10200, 0),
(51, 'Limpio', 2, 600, 0),
(52, 'Limpio', 23, 6900, 0),
(54, 'Parejo', 45, 4950, 0),
(55, 'Proceso', 23, 6900, 0),
(55, 'Parejo', 6, 660, 0),
(55, 'Limpio', 2, 600, 0),
(56, 'Limpio', 13, 3900, 0),
(56, 'Parejo', 10, 1100, 0),
(57, 'Limpio', 20, 6000, 0),
(58, 'Limpio', 10, 3000, 0),
(59, 'Limpio', 10, 3000, 0),
(59, 'Parejo', 5, 550, 0),
(60, 'Canica', 20, 3000, 0),
(61, 'Limpio', 30, 600, 0),
(61, 'Parejo', 10, 500, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion_ventas`
--

CREATE TABLE `descripcion_ventas` (
  `folio_ventas` int(11) NOT NULL,
  `calibre` varchar(50) NOT NULL,
  `cajas` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `descripcion_ventas`
--

INSERT INTO `descripcion_ventas` (`folio_ventas`, `calibre`, `cajas`, `subtotal`, `precio`) VALUES
(82, 'Extra B', 50, 5000, 0),
(82, 'Super Roña', 40, 12000, 0),
(82, 'Primera', 90, 27000, 0),
(82, 'Tercera', 88, 14960, 0),
(83, 'Extra B', 45, 4500, 0),
(83, 'Extra', 67, 10050, 0),
(84, 'Mediano B', 45, 9900, 0),
(84, 'Extra Roña', 45, 2250, 0),
(84, 'Tercera', 0, 0, 0),
(85, 'Extra', 30, 4500, 0),
(85, 'Primera', 34, 10200, 0),
(85, 'Super B', 56, 5600, 0),
(85, 'Super Roña', 45, 13500, 0),
(85, 'Extra Roña', 0, 0, 0),
(86, 'Primera', 30, 9000, 0),
(87, 'Mediano', 30, 7500, 0),
(87, 'Primera', 30, 9000, 0),
(87, 'Extra B', 30, 3000, 0),
(87, 'Primera B', 30, 5400, 0),
(87, 'Super B', 0, 0, 0),
(88, 'Super', 45, 9000, 0),
(88, 'Primera', 45, 13500, 0),
(88, 'Super', 45, 9000, 0),
(88, 'Mediano', 0, 0, 0),
(89, 'Super', 45, 9000, 0),
(89, 'Primera', 45, 13500, 0),
(89, 'Extra Roña', 45, 2250, 0),
(89, 'Mediano Roña', 0, 0, 0),
(90, 'Super', 45, 9000, 0),
(90, 'Mediano B', 45, 9900, 0),
(90, 'Mediano Roña', 45, 7650, 0),
(90, 'Primera Roña', 0, 0, 0),
(91, 'Primera', 45, 13500, 0),
(91, 'Mediano B', 45, 9900, 0),
(91, 'Primera B', 45, 8100, 0),
(91, 'Tercera', 0, 0, 0),
(92, 'Mediano B', 30, 6600, 0),
(92, 'Extra', 34, 5100, 0),
(92, 'Extra Roña', 56, 2800, 0),
(92, 'Tercera', 0, 0, 0),
(93, 'Extra Roña', 32, 1600, 0),
(93, 'Primera', 40, 12000, 0),
(93, 'Mediano Roña', 34, 5780, 0),
(93, 'Super', 67, 13400, 0),
(93, 'Super', 32, 6400, 0),
(93, 'Cuarta Roña', 100, 20000, 0),
(93, 'Tercera B', 50, 7500, 0),
(93, 'Extra', 70, 10500, 0),
(93, 'Primera B', 20, 3600, 0),
(93, 'Super Roña', 23, 6900, 0),
(93, 'Extra Roña', 23, 1150, 0),
(93, 'Primera', 12, 3600, 0),
(94, 'Super', 30, 6000, 0),
(94, 'Extra B', 30, 3000, 0),
(95, 'Cuarta', 30, 0, 0),
(95, 'Extra Roña', 30, 1500, 0),
(96, 'Extra', 30, 4500, 0),
(96, 'Revuelto', 30, 0, 0),
(97, 'Extra B', 23, 2300, 0),
(97, 'Primera', 12, 3600, 0),
(97, 'Super', 34, 6800, 0),
(104, 'Extra B', 32, 3200, 0),
(104, 'Super', 12, 2400, 0),
(106, 'Super', 45, 9000, 0),
(106, 'Tercera Roña', 4, 0, 0),
(107, 'Tercera', 12, 2040, 0),
(107, 'Cuarta Roña', 12, 0, 0),
(107, 'Primera', 32, 9600, 0),
(108, 'Super', 30, 6000, 0),
(108, 'Primera', 23, 6900, 0),
(108, 'Cuarta Roña', 76, 0, 0),
(108, 'Super B', 32, 3200, 0),
(108, 'Extra B', 45, 4500, 0),
(108, 'Mediano B', 45, 9900, 0),
(109, 'Primera Roña', 30, 7500, 0),
(109, 'Mediano Roña', 30, 5100, 0),
(109, 'Tercera Roña', 76, 0, 0),
(109, 'Cuarta Roña', 32, 0, 0),
(109, 'Super', 30, 6000, 0),
(110, 'Extra', 34, 5100, 0),
(110, 'Super', 121, 24200, 0),
(111, 'Extra', 34, 5100, 0),
(111, 'Extra B', 33, 3300, 0),
(112, 'Super B', 34, 3400, 0),
(112, 'Super', 34, 6800, 0),
(113, 'Extra B', 22, 2200, 0),
(113, 'Mediano Roña', 64, 10880, 0),
(114, 'Extra', 23, 3450, 0),
(114, 'Cuarta', 30, 0, 0),
(115, 'Super', 34, 6800, 0),
(115, 'Primera', 65, 19500, 0),
(116, 'Extra', 34, 5100, 0),
(116, 'Super B', 44, 4400, 0),
(117, 'Primera', 34, 10200, 0),
(117, 'Super', 34, 6800, 0),
(118, 'Extra', 23, 3450, 0),
(118, 'Tercera B', 45, 6750, 0),
(119, 'Super Roña', 20, 6000, 0),
(119, 'Primera B', 23, 4140, 0),
(119, 'Extra Roña', 24, 1200, 0),
(119, 'Primera', 12, 3600, 0),
(120, 'Extra Roña', 123, 6150, 0),
(120, 'Extra', 123, 18450, 0),
(120, 'Extra B', 123, 12300, 0),
(121, 'Super Roña', 14, 4200, 0),
(121, 'Mediano Roña', 20, 3400, 0),
(121, 'Mediano', 78, 19500, 0),
(122, 'Super', 3, 600, 0),
(123, 'Super B', 20, 2000, 0),
(124, 'Super', 23, 4600, 0),
(125, 'Super', 12, 2400, 0),
(125, 'Extra', 34, 5100, 0),
(126, 'Extra', 20, 3000, 0),
(126, 'Extra Roña', 30, 1500, 0),
(127, 'Extra', 30, 4500, 0),
(128, 'Super', 20, 4000, 0),
(129, 'Super B', 30, 3000, 0),
(130, 'Super', 30, 6000, 0),
(130, 'Extra B', 30, 3000, 0),
(130, 'Super Roña', 30, 9000, 0),
(130, 'Extra', 30, 4500, 0),
(130, 'Extra Roña', 30, 1500, 0),
(130, 'Primera', 30, 9000, 0),
(130, 'Primera B', 30, 5400, 0),
(130, 'Primera Roña', 30, 7500, 0),
(131, 'Extra', 10, 1500, 0),
(132, 'Super', 34, 6800, 0),
(132, 'Extra', 23, 3450, 0),
(133, 'Primera B', 50, 9000, 0),
(134, 'Proceso', 12, 3600, 0),
(134, 'Proceso', 15, 4500, 0),
(135, 'Proceso', 23, 6900, 0),
(136, 'Limpio', 23, 6900, 0),
(137, 'Limpio', 23, 6900, 0),
(138, 'Limpio', 23, 6900, 0),
(139, 'Limpio', 23, 6900, 0),
(140, 'Parejo', 11, 1210, 0),
(141, 'Limpio', 7, 2100, 0),
(142, 'Maquila', 20, 1000, 0),
(143, 'Parejo', 20, 2200, 0),
(143, 'Proceso', 11, 2750, 0),
(143, 'Limpio', 7, 217, 0),
(144, 'Limpio', 20, 240, 12),
(145, 'Limpio', 10, 150, 15),
(145, 'Parejo', 20, 300, 15),
(146, 'Limpio', 10, 120, 12),
(146, 'Desecho', 5, 60, 12),
(146, 'Limpio', 2, 24, 12),
(147, 'Limpio', 12, 36, 3),
(147, 'Desecho', 12, 36, 3),
(147, 'Proceso', 12, 36, 3),
(148, 'Limpio', 10, 0, 0),
(148, 'Parejo', 10, 0, 0),
(149, 'Limpio', 2, 0, 0),
(149, 'Limpio', 2, 0, 0),
(150, 'Limpio', 10, 40, 4),
(150, 'Canica', 10, 40, 4),
(151, 'Limpio', 11, 55, 5),
(151, 'Limpio', 12, 96, 8),
(151, 'Limpio', 4, 16, 4),
(152, 'Limpio', 20, 40, 2),
(152, 'Parejo', 15, 120, 8),
(153, 'Limpio', 12, 60, 5),
(154, 'Limpio', 10, 200, 20),
(154, 'Proceso', 5, 90, 18),
(155, 'Limpio', 100, 2000, 20),
(155, 'Limpio', 20, 1000, 50),
(156, 'Proceso', 20, 1000, 50),
(157, 'Limpio', 20, 1000, 50),
(157, 'Limpio', 13, 780, 60),
(158, 'Limpio', 15, 375, 25),
(158, 'Limpio', 19, 1520, 80),
(159, 'Limpio', 200, 4400, 22),
(160, 'Limpio', 12, 276, 23),
(161, 'Limpio', 123, 27429, 223),
(162, 'Limpio', 12, 276, 23),
(163, 'Limpio', 123, 4182, 34),
(164, 'Limpio', 12, 276, 23),
(165, 'Limpio', 123, 1476, 12),
(166, 'Limpio', 10, 200, 20),
(166, 'Canica', 12, 216, 18),
(167, 'Limpio', 12, 384, 32),
(167, 'Proceso', 29, 522, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `folio_gastos` int(11) NOT NULL,
  `concepto` varchar(20) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `descripcion` text DEFAULT NULL,
  `deuda_por_pagar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`folio_gastos`, `concepto`, `monto`, `fecha`, `descripcion`, `deuda_por_pagar`) VALUES
(1, 'Palas', 350, '2022-01-14 12:42:54', 'Compra de palas para la huerta', 0),
(2, 'Cena', 300, '2022-01-14 12:49:01', 'Comida para los tabajadores', 300),
(3, 'Limpieza de almacen', 200, '2022-01-14 12:58:20', 'Se contrato una señora para barrer', 0),
(4, 'Pago trabajadores', 3000, '2022-01-14 13:00:42', 'Pago semanal', 0),
(5, 'Refresco', 30, '2022-01-14 14:12:22', 'Nos dio sed', 0),
(6, 'Tortas', 500, '2022-01-14 14:19:35', 'Cesar se picho unas tortas muy buenas a cuenta de la caja.', 0),
(7, 'Gasolina', 1000, '2022-01-14 14:20:49', 'Gasolina para la camioneta', 0),
(9, 'Comida', 15000, '2022-02-02 17:54:02', 'fjhghghg', 0),
(12, 'Comida', 2000, '2022-04-13 13:50:48', 'Menudo', 200),
(13, 'Viaje', 1000, '2022-04-13 14:00:34', 'Convivencia', 100),
(14, 'Comida', 2000, '2022-04-13 15:45:22', 'Menudo', 200),
(16, 'Gasolina', 200, '2022-06-27 14:02:00', 'Se puso gas', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inversion`
--

CREATE TABLE `inversion` (
  `id_inversion` int(11) NOT NULL,
  `monto` double NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inversion`
--

INSERT INTO `inversion` (`id_inversion`, `monto`, `fecha`) VALUES
(1, 1000, '2022-03-24 20:24:00'),
(2, 2000, '2022-03-24 21:22:35'),
(3, 40000, '2022-03-24 21:24:43'),
(4, 200, '2022-03-27 09:30:35'),
(5, 40000, '2022-06-08 19:41:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `monto` double NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `metodo` varchar(30) NOT NULL,
  `id_caja` int(11) NOT NULL,
  `id_credito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `monto`, `fecha`, `metodo`, `id_caja`, `id_credito`) VALUES
(3, 36000, '0000-00-00 00:00:00', 'Efectivo', 3, 0),
(4, 9000, '0000-00-00 00:00:00', 'Efectivo', 3, 0),
(5, 12500, '0000-00-00 00:00:00', 'Efectivo', 3, 0),
(6, 10800, '0000-00-00 00:00:00', 'Efectivo', 3, 0),
(7, 10500, '0000-00-00 00:00:00', 'Transferencia', 3, 0),
(8, 4000, '0000-00-00 00:00:00', 'Efectivo', 3, 0),
(9, 15000, '0000-00-00 00:00:00', 'Efectivo', 3, 0),
(20, 0, '2021-11-25 17:58:25', 'Transferencia', 4, 0),
(21, 3000, '2021-11-28 12:42:46', 'Cheque', 4, 9),
(22, 12000, '2021-11-28 13:12:22', 'Cheque', 6, 5),
(23, 12000, '2021-11-28 13:22:35', 'Efectivo', 3, 8),
(24, 4000, '2021-11-28 13:25:03', 'Cheque', 3, 9),
(25, 3000, '2021-11-28 13:30:58', 'Cheque', 4, 9),
(26, 9000, '2021-11-28 13:31:42', 'Transferencia', 3, 12),
(27, 12000, '2021-11-28 13:37:21', 'Cheque', 6, 9),
(28, 20000, '2021-11-28 13:42:10', 'Cheque', 5, 36),
(29, 15000, '2021-11-28 13:43:35', 'Efectivo', 6, 8),
(30, 100, '2021-11-28 14:28:30', 'Transferencia', 5, 27),
(31, 100, '2021-11-28 14:28:59', 'Transferencia', 5, 27),
(32, 100, '2021-11-28 14:30:17', 'Transferencia', 5, 27),
(33, 5, '2021-11-28 14:31:14', 'Efectivo', 3, 29),
(34, 5, '2021-11-28 14:42:03', 'Efectivo', 3, 29),
(35, 5, '2021-11-28 14:42:40', 'Efectivo', 3, 29),
(36, 5, '2021-11-28 14:42:52', 'Efectivo', 3, 29),
(37, 5, '2021-11-28 14:45:13', 'Efectivo', 3, 8),
(38, 12000, '2021-11-28 14:46:13', 'Efectivo', 5, 8),
(39, 12000, '2021-11-28 14:47:14', 'Efectivo', 5, 8),
(40, 100, '2021-11-28 14:47:44', 'Efectivo', 5, 12),
(41, 100, '2021-11-28 15:07:07', 'Efectivo', 5, 27),
(42, 100, '2021-11-28 15:07:11', 'Efectivo', 5, 27),
(43, 400, '2021-11-28 15:08:46', 'Transferencia', 3, 28),
(44, 5, '2021-11-28 17:15:43', 'Efectivo', 4, 9),
(45, 1940, '2021-11-28 17:21:57', 'Efectivo', 5, 36),
(46, 6120, '2021-11-29 13:21:11', 'Transferencia', 6, 35),
(47, 29400, '2021-11-29 22:25:34', 'Cheque', 5, 77),
(48, 29400, '2021-11-29 22:26:55', 'Efectivo', 3, 37),
(49, 12200, '2021-12-01 10:43:42', 'Cheque', 6, 38),
(50, 59330, '0000-00-00 00:00:00', 'Transferencia', 3, 0),
(51, 700, '2021-12-01 17:30:37', 'Transferencia', 5, 29),
(52, 1750, '2021-12-06 17:05:16', 'Transferencia', 4, 39),
(53, 4000, '2021-12-06 21:59:09', 'Cheque', 3, 33),
(54, 0, '0000-00-00 00:00:00', 'Transferencia', 3, 0),
(55, 0, '0000-00-00 00:00:00', 'Efectivo', 3, 0),
(56, 9000, '0000-00-00 00:00:00', 'Efectivo', 3, 0),
(57, 1500, '0000-00-00 00:00:00', 'Cheque', 3, 0),
(58, 4500, '0000-00-00 00:00:00', 'Cheque', 3, 0),
(59, 12000, '2021-12-09 22:26:42', 'Efectivo', 7, 0),
(60, 12000, '2021-12-09 22:26:57', 'Efectivo', 7, 0),
(61, 12000, '2021-12-09 22:27:18', 'Efectivo', 7, 0),
(62, 10200, '2021-12-09 22:29:28', 'Efectivo', 3, 0),
(63, 3450, '2021-12-09 22:35:01', 'Efectivo', 3, 0),
(64, 27480, '2021-12-09 22:38:17', 'Transferencia', 3, 0),
(65, 30750, '2021-12-13 18:52:58', 'Efectivo', 3, 0),
(66, 0, '2021-12-17 16:35:07', 'Efectivo', 3, 0),
(67, 3000, '2021-12-17 20:09:59', 'Efectivo', 3, 0),
(68, 4000, '2021-12-19 17:49:25', 'Efectivo', 3, 0),
(69, 3000, '2021-12-19 18:17:05', 'Efectivo', 3, 0),
(70, 45900, '2021-12-19 18:21:10', 'Efectivo', 3, 0),
(71, 2000, '2022-01-11 12:41:52', 'Efectivo', 3, 61),
(72, 12000, '2022-01-11 12:49:22', 'Cheque', 4, 9000),
(73, 400, '2022-01-11 13:08:29', 'Cheque', 3, 62),
(74, 8600, '2022-01-11 13:08:45', 'Cheque', 3, 62),
(75, 1250, '2022-01-11 13:11:42', 'Cheque', 3, 61),
(76, 8100, '2022-03-24 19:12:13', 'Efectivo', 3, 0),
(77, 16000, '2022-04-14 13:50:50', 'Efectivo', 3, 30),
(78, 6900, '2022-06-20 21:27:07', 'Efectivo', 3, 0),
(79, 6900, '2022-06-23 21:40:00', 'Efectivo', 3, 0),
(80, 1210, '2022-06-26 18:14:49', 'Efectivo', 3, 0),
(81, 1000, '2022-06-26 18:17:53', 'Efectivo', 3, 0),
(82, 1, '2022-06-29 16:59:58', 'Efectivo', 3, 65),
(83, 199, '2022-06-29 22:42:54', 'Efectivo', 3, 65),
(84, 100, '2022-06-29 23:07:23', 'Efectivo', 3, 0),
(85, 100, '2022-06-29 23:08:29', 'Efectivo', 3, 141),
(86, 100, '2022-06-29 23:10:08', 'Efectivo', 3, 141),
(87, 100, '2022-06-29 23:10:55', 'Efectivo', 3, 141),
(88, 23, '2022-06-29 23:12:27', 'Efectivo', 3, 141),
(89, 23, '2022-06-29 23:12:33', 'Efectivo', 3, 141),
(90, 2, '2022-06-29 23:12:58', 'Efectivo', 3, 141),
(91, 23, '2022-06-29 23:14:11', 'Efectivo', 3, 141),
(92, 34, '2022-06-29 23:14:23', 'Efectivo', 3, 141),
(93, 2, '2022-06-29 23:16:04', 'Efectivo', 3, 141),
(94, 2, '2022-06-29 23:16:21', 'Efectivo', 3, 141),
(95, 199, '2022-06-30 10:08:28', 'Efectivo', 3, 65),
(96, 1, '2022-06-30 10:08:34', 'Efectivo', 3, 32),
(97, 12, '2022-06-30 10:09:04', 'Efectivo', 3, 65),
(98, 12, '2022-06-30 10:09:07', 'Efectivo', 3, 32),
(99, 12, '2022-06-30 10:11:28', 'Efectivo', 3, 65),
(100, 12, '2022-06-30 10:11:32', 'Efectivo', 3, 65),
(101, 400, '2022-06-30 10:11:37', 'Efectivo', 3, 65),
(102, 167, '2022-06-30 10:24:56', 'Efectivo', 3, 66),
(103, -3, '2022-06-30 10:38:09', 'Efectivo', 3, 66),
(104, 6900, '2022-06-30 10:52:44', 'Transferencia', 4, 64),
(105, 5003, '2022-06-30 10:56:44', 'Efectivo', 3, 66),
(106, 1265, '2022-06-30 11:09:03', 'Efectivo', 3, 65),
(107, 6900, '2022-06-30 11:12:04', 'Efectivo', 3, 63),
(108, 30000, '2022-06-30 11:12:24', 'Efectivo', 3, 54),
(109, 1, '2022-06-30 11:14:11', 'Efectivo', 3, 41),
(110, 1, '2022-06-30 11:56:36', 'Efectivo', 3, 12),
(111, 450, '2022-07-02 21:47:06', 'Efectivo', 3, 0),
(112, 204, '2022-07-02 21:48:26', 'Efectivo', 3, 0),
(113, 108, '2022-07-02 21:53:47', 'Efectivo', 3, 0),
(114, 0, '2022-07-02 22:30:55', 'Efectivo', 3, 0),
(115, 0, '2022-07-02 22:32:31', 'Efectivo', 3, 0),
(116, 80, '2022-07-02 22:34:39', 'Efectivo', 3, 0),
(117, 167, '2022-07-02 22:36:26', 'Efectivo', 3, 0),
(118, 160, '2022-07-02 22:43:57', 'Cheque', 3, 0),
(119, 290, '2022-07-03 09:15:29', 'Cheque', 4, 0),
(120, 3000, '2022-07-03 09:16:28', 'Cheque', 4, 0),
(121, 1000, '2022-07-03 09:17:17', 'Efectivo', 4, 0),
(122, 1780, '2022-07-03 09:18:22', 'Efectivo', 4, 0),
(123, 1895, '2022-07-03 09:19:38', 'Efectivo', 4, 0),
(124, 4400, '2022-07-03 09:21:41', 'Efectivo', 4, 0),
(125, 276, '2022-07-03 09:23:11', 'Efectivo', 4, 0),
(126, 27429, '2022-07-03 09:23:27', 'Efectivo', 4, 0),
(127, 276, '2022-07-03 09:24:14', 'Efectivo', 4, 0),
(128, 4182, '2022-07-03 09:31:46', 'Efectivo', 4, 0),
(129, 276, '2022-07-03 09:33:06', 'Efectivo', 3, 0),
(130, 1476, '2022-07-03 09:33:44', 'Efectivo', 4, 0),
(131, 30, '2022-07-03 18:25:21', 'Efectivo', 3, 67),
(132, 5, '2022-07-03 18:25:49', 'Efectivo', 3, 67),
(133, 416, '2022-07-03 19:41:25', 'Efectivo', 3, 0),
(134, 906, '2022-07-03 19:42:16', 'Efectivo', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_compras`
--

CREATE TABLE `pagos_compras` (
  `id_pagoCom` int(11) NOT NULL,
  `monto` double NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `metodo` varchar(30) NOT NULL,
  `id_caja` int(11) NOT NULL,
  `id_credito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos_compras`
--

INSERT INTO `pagos_compras` (`id_pagoCom`, `monto`, `fecha`, `metodo`, `id_caja`, `id_credito`) VALUES
(4, 20000, '2021-12-19 14:58:52', 'Efectivo', 3, NULL),
(5, 8000, '2021-12-19 15:01:02', 'Efectivo', 3, NULL),
(6, 15200, '2021-12-19 15:05:08', 'Efectivo', 3, NULL),
(7, 3600, '2021-12-19 15:11:56', 'Efectivo', 3, NULL),
(8, 10000, '2021-12-19 15:16:28', 'Transferencia', 3, NULL),
(9, 40000, '2021-12-20 22:23:09', 'Efectivo', 3, NULL),
(10, 10000, '2021-12-20 22:37:18', 'Transferencia', 3, NULL),
(11, 2000, '2021-12-21 13:57:32', 'Efectivo', 3, 8),
(12, 1000, '2021-12-21 14:04:05', 'Transferencia', 4, 1),
(13, 8000, '2021-12-21 14:04:56', 'Efectivo', 3, 9),
(14, 12000, '2021-12-21 16:25:42', 'Efectivo', 3, 8),
(21, 200, '2022-01-11 10:31:59', 'Efectivo', 3, 6),
(26, 9000, '2022-01-11 10:50:33', 'Efectivo', 3, NULL),
(28, 2000, '2022-01-11 11:00:37', 'Efectivo', 5, 61),
(29, 500, '2022-01-11 12:54:50', 'Efectivo', 3, 60),
(30, 8000, '2022-01-11 13:18:11', 'Efectivo', 3, 3),
(31, 1000, '2022-01-11 13:18:27', 'Efectivo', 3, 1),
(32, 8100, '2022-02-02 17:38:37', 'Efectivo', 3, NULL),
(33, 3000, '2022-02-02 17:44:10', 'Efectivo', 3, 11),
(34, 0, '2022-03-24 18:39:01', 'Efectivo', 3, NULL),
(35, 0, '2022-03-24 18:46:51', 'Cheque', 3, NULL),
(36, 14220, '2022-03-24 18:53:09', 'Efectivo', 3, NULL),
(37, 18450, '2022-03-27 08:56:20', 'Efectivo', 3, NULL),
(38, 11100, '2022-03-27 08:57:08', 'Transferencia', 3, NULL),
(39, 10050, '2022-03-27 09:00:00', 'Efectivo', 3, NULL),
(40, 3450, '2022-03-27 09:16:33', 'Efectivo', 3, NULL),
(41, 11300, '2022-03-27 09:18:39', 'Efectivo', 3, NULL),
(42, 34000, '2022-06-08 19:49:44', 'Efectivo', 5, 10),
(43, 16400, '2022-06-20 20:24:50', 'Cheque', 3, NULL),
(44, 3900, '2022-06-20 20:27:24', 'Efectivo', 3, NULL),
(45, 6900, '2022-06-20 20:27:41', 'Efectivo', 3, NULL),
(46, 10200, '2022-06-20 20:28:13', 'Efectivo', 3, NULL),
(47, 4950, '2022-06-23 21:11:10', 'Efectivo', 3, NULL),
(48, 5000, '2022-06-23 21:18:33', 'Efectivo', 3, NULL),
(49, 6000, '2022-06-26 15:38:24', 'Efectivo', 3, NULL),
(50, 3000, '2022-06-26 15:39:26', 'Efectivo', 3, NULL),
(51, 3550, '2022-06-26 18:06:08', 'Efectivo', 3, NULL),
(52, 23, '2022-06-29 14:20:39', 'Efectivo', 3, 0),
(53, 1000, '2022-06-30 11:51:43', 'Efectivo', 3, 22),
(54, 100, '2022-06-30 11:52:30', 'Efectivo', 3, 22),
(55, 1200, '2022-06-30 11:55:55', 'Efectivo', 3, 22),
(56, 10000, '2022-06-30 13:49:53', 'Efectivo', 3, 17),
(57, 200, '2022-07-02 20:42:57', 'Transferencia', 5, 23),
(58, 600, '2022-07-03 19:16:28', 'Efectivo', 3, 23),
(59, 100, '2022-07-03 19:16:50', 'Efectivo', 3, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE `precio` (
  `id_precio` int(11) NOT NULL,
  `nombre` varchar(13) NOT NULL,
  `precio` double NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `precio`
--

INSERT INTO `precio` (`id_precio`, `nombre`, `precio`, `cantidad`) VALUES
(1, 'Limpio', 20, 329),
(2, 'Parejo', 50, 192),
(3, 'Proceso', 250, 62),
(4, 'Canica', 150, 85),
(5, 'Desecho', 100, 153),
(6, 'Maquila', 50, 98),
(7, 'Caja de 10 kg', 50, 86),
(8, 'Primera B', 190, -20),
(9, 'Primera Roña', 250, 30),
(10, 'Mediano', 250, 0),
(11, 'Mediano B', 220, 0),
(12, 'Mediano Roña', 170, 0),
(13, 'Tercera', 170, 0),
(14, 'Tercera B', 150, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `passwords` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `nombre`, `passwords`) VALUES
(9, 'admin@gmail.com', 'admin', 'b3d4d1538c4dc424d6427c1dd2a5a721a81371eb8feb74789aa0db64951982be581c76e2f370cb8de5a9469d20f477ed0998a9159ea846fc61a4b4179253c2b6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `folio` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `total` double NOT NULL,
  `num_factura` varchar(30) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_credito` int(11) DEFAULT NULL,
  `id_pago` int(11) DEFAULT NULL,
  `id_precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`folio`, `fecha`, `total`, `num_factura`, `id_cliente`, `id_credito`, `id_pago`, `id_precio`) VALUES
(4, '2021-11-04 22:31:03', 20, 'factura', 0, 0, 0, 0),
(5, '2021-11-04 22:33:46', 200, 'Folio', 0, 0, 0, 0),
(6, '2021-11-04 23:13:12', 200, 'FA10', 1, 0, 0, 0),
(8, '2021-11-04 23:13:21', 200, 'FA10', 1, 0, 0, 0),
(10, '2021-11-05 08:30:35', 20, 'Facut12', 0, NULL, NULL, 0),
(15, '2021-11-08 22:14:20', 2000, 'Factura2', 0, NULL, NULL, 0),
(16, '2021-11-08 23:07:23', 500, 'Factura3', 0, NULL, NULL, 0),
(17, '2021-11-09 19:09:42', 200, 'Factura 24', 0, NULL, NULL, 0),
(18, '2021-11-09 19:10:36', 200, '12', 0, NULL, NULL, 0),
(19, '2021-11-09 19:12:57', 200, '300', 0, NULL, NULL, 0),
(20, '2021-11-09 19:13:41', 4532, 'FACTUIRA', 0, NULL, NULL, 0),
(21, '2021-11-09 20:30:20', 4532, 'FACTUIRA', 0, NULL, NULL, 0),
(22, '2021-11-11 14:06:42', 200, 'Factura12', 0, NULL, NULL, NULL),
(23, '2021-11-11 14:07:05', 3000, 'Factura13', 0, NULL, NULL, NULL),
(24, '2021-11-11 14:11:08', 2000, 'Factura', 0, NULL, NULL, NULL),
(25, '2021-11-11 14:13:35', 3009, 'Factura24', 0, NULL, NULL, NULL),
(26, '2021-11-11 14:14:08', 23, 'Factura24', 0, NULL, NULL, NULL),
(27, '2021-11-11 14:21:42', 3000, 'Factura20', 0, NULL, NULL, NULL),
(28, '2021-11-11 14:27:48', 200, 'Factura20', 0, NULL, NULL, NULL),
(29, '2021-11-11 15:03:19', 45, 'Factura10', 0, NULL, NULL, NULL),
(30, '2021-11-11 15:04:19', 1234, 'sdfdgh', 6, NULL, NULL, NULL),
(31, '2021-11-11 15:11:24', 234, 'Factura10', 8, NULL, NULL, NULL),
(32, '2021-11-11 15:58:59', 800, 'Factura20', 4, NULL, NULL, NULL),
(33, '2021-11-11 16:06:33', 1500, 'sdfdgh', 7, NULL, NULL, NULL),
(34, '2021-11-11 16:47:11', 800, 'Factura', 1, NULL, NULL, NULL),
(42, '2021-11-14 19:22:08', 0, '', 0, 0, NULL, NULL),
(59, '2021-11-15 21:39:55', 400, 'Facturopta', 4, 1, NULL, NULL),
(60, '2021-11-15 21:40:17', 400, 'Facturopta', 4, 1, NULL, NULL),
(61, '2021-11-15 21:43:51', 1800, 'Factura102', 7, 29, NULL, NULL),
(62, '2021-11-15 22:38:38', 16200, 'Facturopta', 7, 30, 62, NULL),
(64, '2021-11-16 20:37:33', 4590, 'FNM123', 4, 31, NULL, NULL),
(65, '2021-11-17 17:06:45', 1150, 'Factura97', 10, 32, NULL, NULL),
(66, '2021-11-17 17:11:07', 4000, 'Factura10', 4, 33, NULL, NULL),
(67, '2021-11-17 17:39:37', 3400, 'Factura10', 10, 34, NULL, NULL),
(68, '2021-11-19 18:21:14', 36000, 'Factura95', 8, 35, NULL, NULL),
(69, '2021-11-19 18:22:26', 9000, 'Facturota', 8, 35, NULL, NULL),
(70, '2021-11-19 18:56:31', 12500, '9125', 8, NULL, 5, NULL),
(71, '2021-11-19 18:57:45', 6120, '9125', 8, 35, NULL, NULL),
(72, '2021-11-19 20:33:16', 10800, 'sdfdgh', 1, NULL, 6, NULL),
(73, '2021-11-19 21:39:57', 10500, 'Factura20', 9, NULL, 7, NULL),
(74, '2021-11-19 23:10:40', 4000, 'FEact', 9, NULL, 8, NULL),
(75, '2021-11-20 10:38:38', 15000, 'fad', 1, NULL, 9, NULL),
(76, '2021-11-25 11:58:17', 41940, 'Factura12', 13, 36, NULL, NULL),
(77, '2021-11-29 22:03:22', 29400, 'D500 PLUS', 1, 37, NULL, NULL),
(78, '2021-12-01 10:40:37', 12200, 'AguacatesFa', 15, 38, NULL, NULL),
(79, '2021-12-01 14:13:40', 1750, 'facturadf', 14, 39, NULL, NULL),
(80, '2021-12-01 14:46:56', 30000, 'Facturadf', 10, 40, NULL, NULL),
(81, '2021-12-01 14:47:38', 59330, 'zhfge', 14, NULL, 50, NULL),
(82, '2021-12-06 07:39:42', 0, 'Fcatura', 8, 41, NULL, NULL),
(83, '2021-12-06 07:56:47', 0, 'Fcatura', 9, 42, NULL, NULL),
(84, '2021-12-06 08:05:33', 12150, 'Fcatura', 12, 43, NULL, NULL),
(85, '2021-12-06 08:19:15', 33800, 'gdfv', 15, 44, NULL, NULL),
(86, '2021-12-06 09:31:23', 0, 'gdfvasd', 4, 45, NULL, NULL),
(87, '2021-12-06 09:32:15', 24900, 'gdfvasd', 4, 46, NULL, NULL),
(88, '2021-12-06 09:34:17', 31500, 'fhj', 12, 47, NULL, NULL),
(89, '2021-12-06 09:38:01', 24750, 'fhj', 13, 48, NULL, NULL),
(90, '2021-12-06 09:38:56', 26550, 'fhj', 13, 49, NULL, NULL),
(91, '2021-12-06 09:40:04', 31500, 'fhj', 12, 50, NULL, NULL),
(92, '2021-12-06 09:42:47', 14500, 'fhj', 9, 51, NULL, NULL),
(93, '2021-12-06 10:29:07', 92430, 'fhj', 9, 52, NULL, NULL),
(94, '2021-12-09 17:51:27', 9000, 'Fcatura', 1, NULL, 56, NULL),
(95, '2021-12-09 17:54:32', 1500, 'xdfvdf', 4, NULL, 57, NULL),
(96, '2021-12-09 17:59:20', 4500, 'xdfvdf', 10, NULL, 58, NULL),
(97, '2021-12-09 18:01:34', 12700, 'zxv', 10, 53, NULL, NULL),
(98, '2021-12-09 19:22:51', 200, 'Hola', 1, 0, 0, NULL),
(99, '2021-12-09 19:25:48', 0, 'sdf', 6, 0, 0, NULL),
(100, '2021-12-09 19:28:47', 0, 'Factura12', 1, 0, 0, NULL),
(101, '2021-12-09 19:31:35', 0, 'fdhgjk', 1, 0, 0, NULL),
(102, '2021-12-09 19:39:17', 0, 'mfgh', 7, 0, 0, NULL),
(103, '2021-12-09 19:46:09', 0, 'yuitil', 1, 0, 0, NULL),
(104, '2021-12-09 19:50:55', 0, 'gfvbcn', 10, 0, 0, NULL),
(105, '2021-12-09 20:00:48', 1, 'hgdhfj', 1, 0, 0, NULL),
(106, '2021-12-09 20:03:52', 9000, 'hgdhfj', 8, 0, 0, NULL),
(107, '2021-12-09 20:07:02', 4080, 'gfhjtjkuy', 1, 0, 0, NULL),
(108, '2021-12-09 20:13:58', 68500, 'Factura102', 9, 0, 0, NULL),
(109, '2021-12-09 20:16:11', 45300, 'Factura102', 1, 0, 0, NULL),
(110, '2021-12-09 22:08:45', 5100, '34', 15, 0, 0, NULL),
(111, '2021-12-09 22:09:25', 5100, '342', 15, 0, 0, NULL),
(112, '2021-12-09 22:10:06', 3400, '342sw', 15, 0, 0, NULL),
(113, '2021-12-09 22:12:40', 2200, 'AS', 6, 0, 0, NULL),
(114, '2021-12-09 22:15:47', 3450, 'axddd', 1, 0, 0, NULL),
(115, '2021-12-09 22:18:31', 6800, 'ghghd', 1, 0, 0, NULL),
(116, '2021-12-09 22:25:24', 5100, 'dhdshg', 10, 0, 0, NULL),
(117, '2021-12-09 22:29:28', 10200, 'dhdshg', 11, 0, 0, NULL),
(118, '2021-12-09 22:35:01', 3450, 'Factura12', 2, 0, 63, NULL),
(119, '2021-12-09 22:38:17', 27480, 'fdhgfdhg', 15, 0, 64, NULL),
(120, '2021-12-13 18:52:58', 30750, 'Factura', 9, 0, 65, NULL),
(121, '2021-12-15 16:49:25', 11800, 'Facturas', 7, 55, 0, NULL),
(122, '2021-12-17 16:31:42', 0, '', 1, 56, 0, NULL),
(123, '2021-12-17 16:32:33', 0, 'Vrias', 1, 57, 0, NULL),
(124, '2021-12-17 16:35:07', 0, 'ghfgd', 11, 0, 66, NULL),
(125, '2021-12-17 20:03:05', 2400, 's', 4, 58, 0, NULL),
(126, '2021-12-17 20:09:59', 3000, 'sfc', 1, 0, 67, NULL),
(127, '2021-12-19 14:51:16', 4500, 'Factura96', 10, 59, 0, NULL),
(128, '2021-12-19 17:49:25', 4000, 'Factura', 7, 0, 68, NULL),
(129, '2021-12-19 18:17:05', 3000, 'Factura97', 1, 0, 69, NULL),
(130, '2021-12-19 18:21:10', 45900, 'Factura97', 8, 0, 70, NULL),
(131, '2021-12-19 18:25:33', 1500, 'Factura102', 4, 60, 0, NULL),
(132, '2021-12-23 18:27:23', 10250, 'Factura', 15, 61, 0, NULL),
(133, '2021-12-28 20:09:48', 9000, 'Factura102', 16, 62, 0, NULL),
(134, '2022-03-24 19:12:13', 8100, 'ada', 1, 0, 76, NULL),
(135, '2022-06-08 19:44:39', 6900, 'Factura', 6, 63, 0, NULL),
(136, '2022-06-20 21:27:07', 6900, 'Sin factura', 4, 0, 78, NULL),
(137, '2022-06-20 22:00:08', 6900, 'Sin factura', 1, 0, 0, NULL),
(138, '2022-06-20 22:07:19', 6900, 'Sin factura', 1, 64, 0, NULL),
(139, '2022-06-23 21:40:00', 6900, 'Sin factura', 1, 0, 79, NULL),
(140, '2022-06-26 18:14:49', 1210, 'Sin factura', 1, 0, 80, NULL),
(141, '2022-06-26 18:16:59', 2100, 'Facturacion', 2, 65, 0, NULL),
(142, '2022-06-26 18:17:53', 1000, 'Sin factura', 12, 0, 81, NULL),
(143, '2022-06-30 10:16:57', 5167, 'Sin factura', 12, 66, 0, NULL),
(144, '2022-07-02 21:38:30', 1, 'Sin factura', 12, 0, 0, NULL),
(145, '2022-07-02 21:47:06', 450, 'Sin factura', 1, 0, 111, NULL),
(146, '2022-07-02 21:48:26', 204, 'Sin factura', 1, 0, 112, NULL),
(147, '2022-07-02 21:53:47', 108, 'Sin factura', 1, 0, 113, NULL),
(148, '2022-07-02 22:30:55', 0, 'Sin factura', 1, 0, 114, NULL),
(149, '2022-07-02 22:32:31', 0, 'Sin factura', 1, 0, 115, NULL),
(150, '2022-07-02 22:34:39', 80, 'Sin factura', 1, 0, 116, NULL),
(151, '2022-07-02 22:36:26', 167, 'Sin factura', 4, 0, 117, NULL),
(152, '2022-07-02 22:43:57', 160, 'Sin factura', 1, 0, 118, NULL),
(153, '2022-07-02 23:36:44', 60, 'Sin factura', 12, 67, 0, NULL),
(154, '2022-07-03 09:15:29', 290, 'Sin factura', 1, 0, 119, NULL),
(155, '2022-07-03 09:16:28', 3000, 'Faciiu', 1, 0, 120, NULL),
(156, '2022-07-03 09:17:17', 1000, 'Sin factura', 1, 0, 121, NULL),
(157, '2022-07-03 09:18:22', 1780, 'Facturacions', 9, 0, 122, NULL),
(158, '2022-07-03 09:19:38', 1895, 'Sin factura', 6, 0, 123, NULL),
(159, '2022-07-03 09:21:41', 4400, 'Sin factura', 14, 0, 124, NULL),
(160, '2022-07-03 09:23:11', 276, 'Sin factura', 1, 0, 125, NULL),
(161, '2022-07-03 09:23:27', 27429, 'Sin factura', 1, 0, 126, NULL),
(162, '2022-07-03 09:24:14', 276, 'Sin factura', 1, 0, 127, NULL),
(163, '2022-07-03 09:31:46', 4182, 'Sin factura', 1, 0, 128, NULL),
(164, '2022-07-03 09:33:06', 276, 'Sin factura', 1, 0, 129, NULL),
(165, '2022-07-03 09:33:44', 1476, 'Sin factura', 1, 0, 130, NULL),
(166, '2022-07-03 19:41:25', 416, 'Sin factura', 1, 0, 133, NULL),
(167, '2022-07-03 19:42:16', 906, 'Sin factura', 10, 0, 134, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abonos_gastos`
--
ALTER TABLE `abonos_gastos`
  ADD PRIMARY KEY (`id_abono`),
  ADD KEY `fk_abono_gastos` (`id_gasto`);

--
-- Indices de la tabla `activos`
--
ALTER TABLE `activos`
  ADD PRIMARY KEY (`id_activo`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id_caja`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `fk_compras_cliente` (`id_cliente`),
  ADD KEY `fk_compras_creditos` (`id_credito`),
  ADD KEY `fk_compras_pago` (`id_pago`);

--
-- Indices de la tabla `creditos`
--
ALTER TABLE `creditos`
  ADD PRIMARY KEY (`id_credito`),
  ADD KEY `fk_creditos_ventas` (`folio_venta`),
  ADD KEY `fk_creditos_pagos` (`id_pago`) USING BTREE;

--
-- Indices de la tabla `credito_compra`
--
ALTER TABLE `credito_compra`
  ADD PRIMARY KEY (`id_creditoCom`),
  ADD KEY `fk_credito_compra` (`id_compra`);

--
-- Indices de la tabla `descripcion_compra`
--
ALTER TABLE `descripcion_compra`
  ADD KEY `fk_descripcion_compras` (`id_compra`);

--
-- Indices de la tabla `descripcion_ventas`
--
ALTER TABLE `descripcion_ventas`
  ADD KEY `fk_descripcion_ventas` (`folio_ventas`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`folio_gastos`);

--
-- Indices de la tabla `inversion`
--
ALTER TABLE `inversion`
  ADD PRIMARY KEY (`id_inversion`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `fk_pagos_caja` (`id_caja`);

--
-- Indices de la tabla `pagos_compras`
--
ALTER TABLE `pagos_compras`
  ADD PRIMARY KEY (`id_pagoCom`),
  ADD KEY `id_pagoCom_caja` (`id_caja`),
  ADD KEY `id_pagoCom_credito` (`id_credito`);

--
-- Indices de la tabla `precio`
--
ALTER TABLE `precio`
  ADD PRIMARY KEY (`id_precio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `fk_ventas_cliente` (`id_cliente`),
  ADD KEY `fk_ventas_creditos` (`id_credito`),
  ADD KEY `fk_ventas_pago` (`id_pago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abonos_gastos`
--
ALTER TABLE `abonos_gastos`
  MODIFY `id_abono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `activos`
--
ALTER TABLE `activos`
  MODIFY `id_activo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id_caja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `creditos`
--
ALTER TABLE `creditos`
  MODIFY `id_credito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `credito_compra`
--
ALTER TABLE `credito_compra`
  MODIFY `id_creditoCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `folio_gastos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `inversion`
--
ALTER TABLE `inversion`
  MODIFY `id_inversion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT de la tabla `pagos_compras`
--
ALTER TABLE `pagos_compras`
  MODIFY `id_pagoCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `precio`
--
ALTER TABLE `precio`
  MODIFY `id_precio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abonos_gastos`
--
ALTER TABLE `abonos_gastos`
  ADD CONSTRAINT `fk_abono_gastos` FOREIGN KEY (`id_gasto`) REFERENCES `gastos` (`folio_gastos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compras_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_compras_creditos` FOREIGN KEY (`id_credito`) REFERENCES `credito_compra` (`id_creditoCom`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_compras_pago` FOREIGN KEY (`id_pago`) REFERENCES `pagos_compras` (`id_pagoCom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `creditos`
--
ALTER TABLE `creditos`
  ADD CONSTRAINT `fk_creditos_ventas` FOREIGN KEY (`folio_venta`) REFERENCES `ventas` (`folio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `credito_compra`
--
ALTER TABLE `credito_compra`
  ADD CONSTRAINT `fk_credito_compra` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `descripcion_compra`
--
ALTER TABLE `descripcion_compra`
  ADD CONSTRAINT `fk_descripcion_compras` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `descripcion_ventas`
--
ALTER TABLE `descripcion_ventas`
  ADD CONSTRAINT `fk_descripcion_ventas` FOREIGN KEY (`folio_ventas`) REFERENCES `ventas` (`folio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_pagos_caja` FOREIGN KEY (`id_caja`) REFERENCES `caja` (`id_caja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos_compras`
--
ALTER TABLE `pagos_compras`
  ADD CONSTRAINT `id_pagoCom_caja` FOREIGN KEY (`id_caja`) REFERENCES `caja` (`id_caja`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
