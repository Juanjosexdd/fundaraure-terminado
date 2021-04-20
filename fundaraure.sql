-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2020 at 03:12 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fundaraure`
--

-- --------------------------------------------------------

--
-- Table structure for table `cargos`
--

CREATE TABLE `cargos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cargos`
--

INSERT INTO `cargos` (`id`, `nombre`, `descripcion`, `estatus`, `created_at`, `updated_at`) VALUES
(1, 'ANALISTA 1', 'ANALISTA ADMINISTRATIVO', 1, '2020-06-26 04:33:01', '2020-06-26 04:33:01'),
(2, 'ANALISTA 2', 'ANALISTA FACTURACIÓN', 1, '2020-06-26 04:37:44', '2020-06-26 04:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codtipocliente` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codnacionalidad` bigint(20) UNSIGNED NOT NULL,
  `cedula` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `codtipocliente`, `nombres`, `apellidos`, `codnacionalidad`, `cedula`, `direccion`, `telefono`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'CLIENTE INICIAL', 'CLIENTE INICIAL', 1, '0000000', 'VENEZUELA', '0400-0000000', 'CLIENTEINICIAL@MAIL.COM', '2020-06-26 03:57:33', '2020-06-26 03:57:33'),
(2, 1, 'RAUL JOSE', 'RAUL JOSE', 1, '20391877', 'URBANIZACIÓN DURIGUA 3 DERECHA AVENIDA 7. IZQUIERDA AVENIDA 5. FRENTE CALLE 6 DURIGUA III ACARIGUA EDIFICIO', '04125963214', 'RAUL@GMAIL.COM', '2020-06-26 04:52:38', '2020-06-26 04:52:38'),
(3, 1, 'ISALEIMAR EDELMIRA', 'HIGUERA', 1, '20391879', 'AVENIDA 34. IZQUIERDA CALLE LOS SABANALES AVENIDA 34 CON AVENIDA CIRCUNVALACION LA GOAJIRA ACARIGUA CASA', '04146938547', 'ISA@GMAIL.COM', '2020-06-26 04:57:33', '2020-06-26 04:57:33'),
(4, 1, 'ORLANDO JOSE', 'SAAVEDRA PEÑA', 1, '20391876', 'URBANIZACIÓN DURIGUA DERECHA AVENIDA 7. IZQUIERDA AVENIDA 5. FRENTE CALLE 6 URBANIZACION DURIGUA III CALLE 6 VEREDA 31 DETRAS DE LA ESCUELA BASICA ROMULO GALLEGOS CASA', '04245698741', 'jOSE@GMAIL.COM', '2020-06-26 05:00:18', '2020-06-26 05:00:18'),
(5, 1, 'RAFAEL EDUARDO', 'GARCIA RODRIGUEZ', 1, '20391875', 'URBANIZACIÓN DURIGUA 2 DERECHA AVENIDA 3. IZQUIERDA AVENIDA 2. FRENTE VEREDA 34 A UNA CUADRA MODULO POLICIAL CASA', '04265896321', 'RAFAEL@GMAIL.COM', '2020-06-26 05:03:54', '2020-06-26 05:03:54'),
(6, 1, 'DARWIN JOPHSER', 'CORDERO RODRIGUEZ', 1, '20391874', 'URBANIZACIÓN DURIGUA 3 DERECHA AVENIDA 7. IZQUIERDA AVENIDA 5. FRENTE CALLE 6 DURIGUA III ACARIGUA EDIFICIO', '04148569874', 'DARWIN@GMAIL.COM', '2020-06-26 05:05:37', '2020-06-26 05:05:37'),
(7, 1, 'HECMARGT YASMARY', 'MONTESINOS TORRES', 1, '20391873', 'URBANIZACIÓN VILLAS DEL PILAR IZQUIERDA AVENIDA MUNICIPAL. DERECHA CALLE 1. FRENTE CALLE 10 FRENTE SECTOR LOS TETRAS CASA', '04245697412', 'HECMARY@GMAIL.COM', '2020-06-26 05:06:45', '2020-06-26 05:06:45'),
(8, 1, 'CLEIDERMAN JOSE', 'VALERA AGUERO', 1, '20391872', 'BARRIO BELLAS ARTES IZQUIERDA AVENIDA CIRCUNVALACION SUR. FRENTE AVENIDA 3 AVENIDA CIRCUNVALACION, FRENTE AL BARRIO BELLAS ARTES CASA', '04163698745', 'CLEIDERMAN@GMAIL.COM', '2020-06-26 05:08:42', '2020-06-26 05:22:16'),
(9, 1, 'HONORIO PASTOR', 'MORAN VASQUEZ', 1, '20391870', 'URBANIZACIÓN CAMPO LINDO DERECHA AVENIDA 24. IZQUIERDA AVENIDA 26. FRENTE AVENIDA 5 DE DICIEMBRE DETRÁS DE LOS TRIBUNALES PENALES DE ACARIGUA - ARAURE EDIFICIO', '04125695236', 'HONORIO@GMAIL.COM', '2020-06-26 05:09:46', '2020-06-26 05:09:46'),
(10, 1, 'NEILA ADRIANA', 'MEDINA TOVAR', 1, '20391880', 'URBANIZACIÓN DURIGUA DERECHA AVENIDA 7. IZQUIERDA AVENIDA 5. FRENTE CALLE 6 URBANIZACION DURIGUA III CALLE 6 VEREDA 31 DETRAS DE LA ESCUELA BASICA ROMULO GALLEGOS CASA', '04163567532', 'NEILA@GMAIL.COM', '2020-06-26 05:11:50', '2020-06-26 05:11:50'),
(11, 1, 'MARIA EUGENIA', 'MELENDEZ JURADO', 1, '20391881', 'URBANIZACIÓN DURIGUA DERECHA AVENIDA 7. IZQUIERDA AVENIDA 5. FRENTE CALLE 6 URBANIZACION DURIGUA III CALLE 6 VEREDA 31 DETRAS DE LA ESCUELA BASICA ROMULO GALLEGOS CASA', '04245769436', 'MARIA@GMAIL.COM', '2020-06-26 05:13:57', '2020-06-26 05:13:57'),
(12, 1, 'ROVERSI DAYANA', 'SILVA MENDOZA', 1, '20391882', 'SECTOR CENTRO DERECHA AVENIDA 29. IZQUIERDA AVENIDA 30. FRENTE CALLE 6 CALLE 6 NUMERO 29-56 ENTRE 29 Y 30 ARAURE CASA', '04245691235', 'ROVERSI@GMAIL.COM', '2020-06-26 05:15:15', '2020-06-26 05:15:15'),
(13, 1, 'RAFAEL DARIO', 'TOLEDO SAAVEDRA', 1, '20391883', 'URBANIZACIÓN LA CORTEZA DERECHA AVENIDA 2. IZQUIERDA AVENIDA 1. FRENTE CALLE 2 FINAL CALLE 2 URBANIZACION LA CORTEZA EDIFICIO', '04126975236', 'RAFAEL@GMAIL.COM', '2020-06-26 05:17:05', '2020-06-26 05:17:05'),
(14, 1, 'YOXEGLYS ARIANNYS', 'ARIAS MARTINEZ', 1, '20391884', 'URBANIZACIÓN VILLAS DEL PILAR IZQUIERDA AVENIDA MUNICIPAL. DERECHA CALLE 1. FRENTE CALLE 10 FRENTE SECTOR LOS TETRAS CASA', '04265897412', 'YOXEGLYS@GMAIL.COM', '2020-06-26 05:18:38', '2020-06-26 05:18:38'),
(15, 1, 'CARLOS LUIS', 'BLANCO RAMIREZ', 1, '20391886', 'URBANIZACIÓN DURIGUA 2 DERECHA AVENIDA 3. IZQUIERDA AVENIDA 2. FRENTE VEREDA 34 A UNA CUADRA MODULO POLICIAL CASA', '04265874236', 'CARLOS@GMAIL.COM', '2020-06-26 05:19:43', '2020-06-26 05:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `conceptoingresos`
--

CREATE TABLE `conceptoingresos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conceptos`
--

CREATE TABLE `conceptos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codnaturaleza` bigint(20) UNSIGNED DEFAULT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conceptos`
--

INSERT INTO `conceptos` (`id`, `codnaturaleza`, `nombre`, `descripcion`, `estatus`, `created_at`, `updated_at`) VALUES
(1, 1, 'INGRESO POR DONACION', 'INGRESO POR DONACION', 1, '2020-06-26 03:57:33', '2020-06-26 03:57:33'),
(2, 2, 'EGRESO POR GASTOS ADMINISTRATIVOS', 'EGRESO POR GASTOS ADMINISTRATIVOS', 1, '2020-06-26 03:57:33', '2020-06-26 03:57:33'),
(3, 1, 'INGRESO POR FACTURA REGISTRADA', 'CORRESPONDE AL REGISTRO DE FACTURAS', 1, '2020-06-26 03:57:33', '2020-06-26 03:57:33'),
(4, 1, 'DONACION DE LA ALCALDIA DE ARAURE', 'DONACIÓN DE LA ALCALDÍA DE ARAURE', 1, '2020-06-26 06:27:51', '2020-06-26 06:27:51'),
(5, 1, 'DONACIÓN DE COPOSA', 'DONACIÓN DE COPOSA', 1, '2020-06-26 06:28:21', '2020-06-26 06:28:21'),
(6, 2, 'COMPRA DE ARTÍCULOS DE OFICINA', 'COMPRA DE ARTÍCULOS DE PAPELERÍA', 1, '2020-06-26 06:28:35', '2020-06-26 06:28:35'),
(7, 2, 'REPARACIÓN DE AIRES ACONDICIONADOS', 'REPARACIÓN DE AIRES ACONDICIONADOS', 1, '2020-06-26 06:29:15', '2020-06-26 06:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `correlativos`
--

CREATE TABLE `correlativos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `correlativo` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cuentapotes`
--

CREATE TABLE `cuentapotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codcuenta` bigint(20) NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cuentapotes`
--

INSERT INTO `cuentapotes` (`id`, `nombre`, `codcuenta`, `estatus`, `created_at`, `updated_at`) VALUES
(1, 'INGRESOS', 5000, 1, '2020-06-26 03:57:31', '2020-06-26 03:57:31'),
(2, 'EGRESOS', 6000, 1, '2020-06-26 03:57:31', '2020-06-26 03:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE `departamentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`, `descripcion`, `estatus`, `created_at`, `updated_at`) VALUES
(1, 'ADMINISTRACIÓN', 'DEPARTAMENTO ADMINISTRATIVO', 1, '2020-06-26 04:38:28', '2020-06-26 04:38:28'),
(2, 'VENTAS', 'DEPARTAMENTO VENTAS', 1, '2020-06-26 04:38:49', '2020-06-26 04:38:49');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idproducto` bigint(20) UNSIGNED NOT NULL,
  `idventa` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `descuento` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`id`, `idproducto`, `idventa`, `cantidad`, `precio`, `descuento`) VALUES
(1, 1, 1, 1, '0.00', '0.00'),
(2, 11, 2, 1, '900000.00', '0.00'),
(3, 10, 3, 1, '1300000.00', '0.00'),
(4, 10, 4, 1, '1300000.00', '0.00'),
(5, 14, 4, 1, '650000.00', '0.00'),
(6, 15, 5, 1, '750000.00', '1.00'),
(7, 8, 6, 1, '800000.00', '1.00'),
(8, 6, 7, 1, '700000.00', '1.00'),
(9, 2, 7, 1, '550000.00', '0.00'),
(10, 4, 8, 1, '450000.00', '1.00'),
(11, 3, 8, 1, '500000.00', '0.00'),
(12, 6, 9, 1, '700000.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rif` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `rif`, `descripcion`, `direccion`, `file`, `created_at`, `updated_at`) VALUES
(1, 'FUNDARAURE', '4545645', 'FUNDACION PARA EL MEJORAMIENTO Y DESARROLLO DEL MUNICIPIO ARAURE', 'Entre Av. 23 y 24 frente a la plaza bolivar Araure, Municipio Araure, Estado Portuguesa', 'http://fundaraure.test/image/MfkbHokDFum9G9HUdOEG7km8WxQnZdTS2mSlD4T9.png', '2020-06-26 06:57:21', '2020-06-26 06:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE `estados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codpais` bigint(20) UNSIGNED NOT NULL,
  `estatus` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `formapagos`
--

CREATE TABLE `formapagos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formapagos`
--

INSERT INTO `formapagos` (`id`, `nombre`, `descripcion`, `estatus`, `created_at`, `updated_at`) VALUES
(1, 'DEBITO', 'DEBITO', 1, '2020-06-26 03:57:32', '2020-06-26 03:57:32'),
(2, 'CREDITO', 'CREDITO', 1, '2020-06-26 03:57:32', '2020-06-26 03:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_01_20_084450_create_roles_table', 1),
(4, '2015_01_20_084525_create_role_user_table', 1),
(5, '2015_01_24_080208_create_permissions_table', 1),
(6, '2015_01_24_080433_create_permission_role_table', 1),
(7, '2015_12_04_003040_add_special_role_column', 1),
(8, '2017_10_17_170735_create_permission_user_table', 1),
(9, '2019_04_25_203705_create_productos_table', 1),
(10, '2019_04_29_172610_create_tipoclientes_table', 1),
(11, '2019_04_29_172612_create_nacionalidads_table', 1),
(12, '2019_04_29_172615_add_foreign_key_nacionalidad_at_user_table', 1),
(13, '2019_04_29_172617_create_clientes_table', 1),
(14, '2019_05_04_193820_create_formapagos_table', 1),
(15, '2019_05_04_193824_create_ventas_table', 1),
(16, '2019_05_04_193920_create_detalle_ventas_table', 1),
(17, '2020_03_26_192700_create_departamentos_table', 1),
(18, '2020_03_26_192710_add_foreign_key_departamento_at_user_table', 1),
(19, '2020_03_26_192724_create_cargos_table', 1),
(20, '2020_03_26_205748_add_foreign_key_cargo_at_users_table', 1),
(21, '2020_03_26_210947_create_pais_table', 1),
(22, '2020_03_26_211418_create_estados_table', 1),
(23, '2020_03_26_211643_create_municipios_table', 1),
(24, '2020_03_26_211847_create_parroquias_table', 1),
(25, '2020_03_26_212241_create_sectors_table', 1),
(26, '2020_03_26_214207_create_correlativos_table', 1),
(27, '2020_03_26_214246_create_conceptos_table', 1),
(28, '2020_03_26_214311_create_cuentapotes_table', 1),
(29, '2020_03_26_214336_create_movimientoegresos_table', 1),
(30, '2020_04_15_230703_create_conceptoingresos_table', 1),
(31, '2020_05_02_152846_create_empresas_table', 1),
(32, '2020_05_06_042258_create_naturalezas_table', 1),
(33, '2020_05_06_042640_add_foreign_key_naturaleza_at_conceptos_table', 1),
(34, '2020_06_14_173359_add_foreign_key_user_at_movimientoegresos_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movingresoegresos`
--

CREATE TABLE `movingresoegresos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idusuario` bigint(20) UNSIGNED DEFAULT NULL,
  `codconcepto` bigint(20) UNSIGNED NOT NULL,
  `codctapote` bigint(20) UNSIGNED NOT NULL,
  `monto` decimal(16,2) NOT NULL,
  `observacion` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movingresoegresos`
--

INSERT INTO `movingresoegresos` (`id`, `idusuario`, `codconcepto`, `codctapote`, `monto`, `observacion`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, '0.00', 'SALDO INICIAL', '2020-06-26 03:57:33', '2020-06-26 03:57:33'),
(2, NULL, 2, 2, '0.00', 'SALDO INICIAL', '2020-06-26 03:57:33', '2020-06-26 03:57:33'),
(3, 1, 3, 1, '1044000.00', 'INGRESO CORRESPONDIENTE A LA FACTURA NRO. 37896 ', '2020-06-26 05:43:50', '2020-06-26 05:43:50'),
(4, 1, 3, 1, '1508000.00', 'INGRESO CORRESPONDIENTE A LA FACTURA NRO. 37897 ', '2020-06-26 05:44:38', '2020-06-26 05:44:38'),
(5, 1, 3, 1, '2262000.00', 'INGRESO CORRESPONDIENTE A LA FACTURA NRO. 37898 ', '2020-06-26 05:45:20', '2020-06-26 05:45:20'),
(6, 1, 3, 1, '861300.00', 'INGRESO CORRESPONDIENTE A LA FACTURA NRO. 37899 ', '2020-06-26 05:45:43', '2020-06-26 05:45:43'),
(7, 1, 3, 1, '918720.00', 'INGRESO CORRESPONDIENTE A LA FACTURA NRO. 37900 ', '2020-06-26 05:45:59', '2020-06-26 05:45:59'),
(8, 1, 3, 1, '1441880.00', 'INGRESO CORRESPONDIENTE A LA FACTURA NRO. 37901 ', '2020-06-26 05:46:32', '2020-06-26 05:46:32'),
(9, 1, 3, 1, '1096780.00', 'INGRESO CORRESPONDIENTE A LA FACTURA NRO. 37902 ', '2020-06-26 05:49:52', '2020-06-26 05:49:52'),
(10, 1, 1, 1, '15000000.00', 'DONACIÓN DE ORGANIZACIÓN SIN FINES DE LUCRO', '2020-06-26 06:30:33', '2020-06-26 06:30:33'),
(11, 1, 2, 2, '2750000.00', 'GASTOS DE TRASLADOS', '2020-06-26 06:31:18', '2020-06-26 06:31:18'),
(12, 1, 7, 2, '6500000.00', 'REPARACIÓN DE AIRES ACONDICIONADOS', '2020-06-26 06:31:53', '2020-06-26 06:31:53'),
(13, 1, 4, 1, '25000000.00', 'DONACIÓN DE LA ALCALDÍA DE ARAURE MES DE JUNIO', '2020-06-26 06:33:09', '2020-06-26 06:33:09'),
(14, 1, 5, 1, '12000000.00', 'DONACIÓN DE COPOSA', '2020-06-26 06:34:59', '2020-06-26 06:34:59'),
(15, 1, 6, 2, '2400000.00', 'COMPRA DE REMA DE HOJAS TAMAÑO CARTA 26-06-2020', '2020-06-26 06:36:01', '2020-06-26 06:36:01'),
(16, 2, 3, 1, '812000.00', 'INGRESO CORRESPONDIENTE A LA FACTURA NRO. 37903 ', '2020-06-26 07:03:52', '2020-06-26 07:03:52'),
(17, 3, 4, 1, '17500000.00', 'DONACIÓN DE LA ALCALDÍA DE ARAURE', '2020-06-26 07:10:37', '2020-06-26 07:10:37'),
(18, 3, 6, 2, '3600000.00', 'COMPRA DE TONNER PARA IMPRESORA 26-06-2020', '2020-06-26 07:11:28', '2020-06-26 07:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `municipios`
--

CREATE TABLE `municipios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codestado` bigint(20) UNSIGNED NOT NULL,
  `estatus` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nacionalidads`
--

CREATE TABLE `nacionalidads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nacionalidads`
--

INSERT INTO `nacionalidads` (`id`, `nombre`, `abreviado`, `estatus`, `created_at`, `updated_at`) VALUES
(1, 'VENEZOLANO', 'V', 1, '2020-06-26 03:57:32', '2020-06-26 03:57:32'),
(2, 'EXTRANJERO', 'E', 1, '2020-06-26 03:57:32', '2020-06-26 03:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `naturalezas`
--

CREATE TABLE `naturalezas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `naturalezas`
--

INSERT INTO `naturalezas` (`id`, `nombre`, `estatus`, `created_at`, `updated_at`) VALUES
(1, 'INGRESOS', 1, '2020-06-26 03:57:32', '2020-06-26 03:57:32'),
(2, 'EGRESOS', 1, '2020-06-26 03:57:32', '2020-06-26 03:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `pais`
--

CREATE TABLE `pais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parroquias`
--

CREATE TABLE `parroquias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codmunicipio` bigint(20) UNSIGNED NOT NULL,
  `estatus` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Modulo facturación', 'facturacion', 'Permitir acceso al modulo de facturación', '2020-06-26 03:57:24', '2020-06-26 03:57:24'),
(2, 'Modulo organización', 'organizacion', 'Permitir acceso al modulo de organización', '2020-06-26 03:57:24', '2020-06-26 03:57:24'),
(3, 'Modulo configuración', 'configuracion', 'Permitir acceso al modulo de configuración', '2020-06-26 03:57:24', '2020-06-26 03:57:24'),
(4, 'Visualizar saldos', 'saldo.index', 'Visualizar saldos', '2020-06-26 03:57:24', '2020-06-26 03:57:24'),
(5, 'Modulo seguridad', 'seguridad', 'Permitir acceso al modulo de seguridad', '2020-06-26 03:57:24', '2020-06-26 03:57:24'),
(6, 'Navegar clientes', 'cliente.index', 'Ve listado de todos los clientes', '2020-06-26 03:57:25', '2020-06-26 03:57:25'),
(7, 'Creación de clientes', 'cliente.create', 'Creación de clientes', '2020-06-26 03:57:25', '2020-06-26 03:57:25'),
(8, 'Edición de clientes', 'cliente.edit', 'Editar datos de clientes', '2020-06-26 03:57:25', '2020-06-26 03:57:25'),
(9, 'Generar PDF de cliente', 'cliente.pdf', 'Generar PDF de cliente', '2020-06-26 03:57:25', '2020-06-26 03:57:25'),
(10, 'Navegar movimientos', 'megresos.index', 'Ve el listado de los movimientos', '2020-06-26 03:57:25', '2020-06-26 03:57:25'),
(11, 'Ver detalle de clientes', 'megresos.show', 'Ve el detalle del movimiento', '2020-06-26 03:57:25', '2020-06-26 03:57:25'),
(12, 'Crear movimiento', 'megresos.create', 'Crear movimiento', '2020-06-26 03:57:25', '2020-06-26 03:57:25'),
(13, 'Ver listado de facturas', 'venta.index', 'Ver listado de facturas', '2020-06-26 03:57:25', '2020-06-26 03:57:25'),
(14, 'Ver el detalle de facturas', 'venta.show', 'Ver el detalle de facturas', '2020-06-26 03:57:25', '2020-06-26 03:57:25'),
(15, 'Creación de ventas', 'venta.create', 'Creación de ventas', '2020-06-26 03:57:25', '2020-06-26 03:57:25'),
(16, 'Anular Factura', 'venta.destroy', 'Anular Factura', '2020-06-26 03:57:25', '2020-06-26 03:57:25'),
(17, 'Generar PDF de venta', 'venta.pdf', 'Generar PDF de venta', '2020-06-26 03:57:25', '2020-06-26 03:57:25'),
(18, 'Ver listado de servicio', 'producto.index', 'Ver listado de servicio', '2020-06-26 03:57:26', '2020-06-26 03:57:26'),
(19, 'Creación de servicio', 'producto.create', 'Creación de servicio', '2020-06-26 03:57:26', '2020-06-26 03:57:26'),
(20, 'Editar servicio', 'producto.edit', 'Editar servicio', '2020-06-26 03:57:26', '2020-06-26 03:57:26'),
(21, 'Desactivar servicio', 'producto.destroy', 'Desactivar servicio', '2020-06-26 03:57:26', '2020-06-26 03:57:26'),
(22, 'Generar PDF de servicio', 'producto.pdf', 'Generar PDF de servicio', '2020-06-26 03:57:26', '2020-06-26 03:57:26'),
(23, 'Ver listado de cargo', 'cargo.index', 'Ver listado de cargo', '2020-06-26 03:57:26', '2020-06-26 03:57:26'),
(24, 'Creación de cargo', 'cargo.create', 'Creación de cargo', '2020-06-26 03:57:26', '2020-06-26 03:57:26'),
(25, 'Editar cargo', 'cargo.edit', 'Editar cargo', '2020-06-26 03:57:26', '2020-06-26 03:57:26'),
(26, 'Desactivar cargo', 'cargo.destroy', 'Desactivar cargo', '2020-06-26 03:57:26', '2020-06-26 03:57:26'),
(27, 'Generar PDF de cargo', 'cargo.pdf', 'Generar PDF de cargo', '2020-06-26 03:57:26', '2020-06-26 03:57:26'),
(28, 'Ver listado de departamento', 'dpto.index', 'Ver listado de departamento', '2020-06-26 03:57:26', '2020-06-26 03:57:26'),
(29, 'Creación de departamento', 'dpto.create', 'Creación de departamento', '2020-06-26 03:57:26', '2020-06-26 03:57:26'),
(30, 'Editar departamento', 'dpto.edit', 'Editar departamento', '2020-06-26 03:57:26', '2020-06-26 03:57:26'),
(31, 'Desactivar departamento', 'dpto.destroy', 'Desactivar departamento', '2020-06-26 03:57:26', '2020-06-26 03:57:26'),
(32, 'Generar PDF de departamento', 'dpto.pdf', 'Generar PDF de departamento', '2020-06-26 03:57:27', '2020-06-26 03:57:27'),
(33, 'Ver listado de concepto', 'conceptos.index', 'Ver listado de concepto', '2020-06-26 03:57:27', '2020-06-26 03:57:27'),
(34, 'Creación de concepto', 'conceptos.create', 'Creación de concepto', '2020-06-26 03:57:27', '2020-06-26 03:57:27'),
(35, 'Editar concepto', 'conceptos.edit', 'Editar concepto', '2020-06-26 03:57:27', '2020-06-26 03:57:27'),
(36, 'Desactivar concepto', 'conceptos.destroy', 'Desactivar concepto', '2020-06-26 03:57:27', '2020-06-26 03:57:27'),
(37, 'Generar PDF de concepto', 'conceptos.pdf', 'Generar PDF de concepto', '2020-06-26 03:57:27', '2020-06-26 03:57:27'),
(38, 'Ver listado de forma pago', 'fpago.index', 'Ver listado de forma pago', '2020-06-26 03:57:27', '2020-06-26 03:57:27'),
(39, 'Creación de forma pago', 'fpago.create', 'Creación de forma pago', '2020-06-26 03:57:27', '2020-06-26 03:57:27'),
(40, 'Editar forma pago', 'fpago.edit', 'Editar forma pago', '2020-06-26 03:57:27', '2020-06-26 03:57:27'),
(41, 'Desactivar forma pago', 'fpago.destroy', 'Desactivar forma pago', '2020-06-26 03:57:27', '2020-06-26 03:57:27'),
(42, 'Generar PDF de forma pago', 'fpago.pdf', 'Generar PDF de forma pago', '2020-06-26 03:57:27', '2020-06-26 03:57:27'),
(43, 'Ver listado de cuentas', 'cpotes.index', 'Ver listado de cuentas', '2020-06-26 03:57:28', '2020-06-26 03:57:28'),
(44, 'Ver listado de nacionalidades', 'nacionalidad.index', 'Ver listado de nacionalidades', '2020-06-26 03:57:28', '2020-06-26 03:57:28'),
(45, 'Creación de nacionalidades', 'nacionalidad.create', 'Creación de nacionalidades', '2020-06-26 03:57:28', '2020-06-26 03:57:28'),
(46, 'Editar nacionalidades', 'nacionalidad.edit', 'Editar nacionalidades', '2020-06-26 03:57:28', '2020-06-26 03:57:28'),
(47, 'Desactivar nacionalidades', 'nacionalidad.destroy', 'Desactivar nacionalidades', '2020-06-26 03:57:28', '2020-06-26 03:57:28'),
(48, 'Generar PDF de nacionalidades', 'nacionalidad.pdf', 'Generar PDF de nacionalidades', '2020-06-26 03:57:28', '2020-06-26 03:57:28'),
(49, 'Ver listado de tipo cliente', 'tcliente.index', 'Ver listado de tipo cliente', '2020-06-26 03:57:28', '2020-06-26 03:57:28'),
(50, 'Creación de tipo cliente', 'tcliente.create', 'Creación de tipo cliente', '2020-06-26 03:57:28', '2020-06-26 03:57:28'),
(51, 'Editar tipo cliente', 'tcliente.edit', 'Editar tipo cliente', '2020-06-26 03:57:28', '2020-06-26 03:57:28'),
(52, 'Desactivar tipo cliente', 'tcliente.destroy', 'Desactivar tipo cliente', '2020-06-26 03:57:28', '2020-06-26 03:57:28'),
(53, 'Generar PDF de tipo cliente', 'tcliente.pdf', 'Generar PDF de tipo cliente', '2020-06-26 03:57:28', '2020-06-26 03:57:28'),
(54, 'Ver listado de empresa', 'empresa.index', 'Ver listado de empresa', '2020-06-26 03:57:28', '2020-06-26 03:57:28'),
(55, 'Creación de empresa', 'empresa.create', 'Creación de empresa', '2020-06-26 03:57:29', '2020-06-26 03:57:29'),
(56, 'Editar empresa', 'empresa.edit', 'Editar empresa', '2020-06-26 03:57:29', '2020-06-26 03:57:29'),
(57, 'Ver listado de usuarios', 'user.index', 'Ver listado de usuarios', '2020-06-26 03:57:29', '2020-06-26 03:57:29'),
(58, 'Creación de usuarios', 'user.create', 'Creación de usuarios', '2020-06-26 03:57:29', '2020-06-26 03:57:29'),
(59, 'Creación de usuarios', 'user.show', 'Creación de usuarios', '2020-06-26 03:57:29', '2020-06-26 03:57:29'),
(60, 'Editar usuarios', 'user.edit', 'Editar usuarios', '2020-06-26 03:57:29', '2020-06-26 03:57:29'),
(61, 'Desactivar usuarios', 'user.destroy', 'Desactivar usuarios', '2020-06-26 03:57:29', '2020-06-26 03:57:29'),
(62, 'Generar PDF de usuarios', 'user.pdf', 'Generar PDF de usuarios', '2020-06-26 03:57:29', '2020-06-26 03:57:29'),
(63, 'Ver listado de roles', 'roles.index', 'Ver listado de roles', '2020-06-26 03:57:29', '2020-06-26 03:57:29'),
(64, 'Creación de roles', 'roles.create', 'Creación de roles', '2020-06-26 03:57:29', '2020-06-26 03:57:29'),
(65, 'Editar roles', 'roles.edit', 'Editar roles', '2020-06-26 03:57:29', '2020-06-26 03:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2020-06-26 06:59:12', '2020-06-26 06:59:12'),
(2, 2, 2, '2020-06-26 06:59:12', '2020-06-26 06:59:12'),
(3, 3, 2, '2020-06-26 06:59:12', '2020-06-26 06:59:12'),
(4, 4, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(5, 5, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(6, 6, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(7, 7, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(8, 8, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(9, 9, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(10, 10, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(11, 11, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(12, 12, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(13, 13, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(14, 14, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(15, 15, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(16, 16, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(17, 17, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(18, 18, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(19, 19, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(20, 20, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(21, 21, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(22, 22, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(23, 23, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(24, 24, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(25, 25, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(26, 26, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(27, 27, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(28, 28, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(29, 29, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(30, 30, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(31, 31, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(32, 32, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(33, 33, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(34, 34, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(35, 35, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(36, 36, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(37, 37, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(38, 38, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(39, 39, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(40, 40, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(41, 41, 2, '2020-06-26 06:59:13', '2020-06-26 06:59:13'),
(42, 42, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(43, 43, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(44, 44, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(45, 45, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(46, 46, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(47, 47, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(48, 48, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(49, 49, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(50, 50, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(51, 51, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(52, 52, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(53, 53, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(54, 54, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(55, 55, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(56, 56, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(57, 57, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(58, 58, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(59, 59, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(60, 60, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(61, 61, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(62, 62, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(63, 63, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(64, 64, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(65, 65, 2, '2020-06-26 06:59:14', '2020-06-26 06:59:14'),
(66, 1, 3, '2020-06-26 07:01:26', '2020-06-26 07:01:26'),
(67, 4, 3, '2020-06-26 07:01:26', '2020-06-26 07:01:26'),
(68, 6, 3, '2020-06-26 07:01:26', '2020-06-26 07:01:26'),
(69, 7, 3, '2020-06-26 07:01:26', '2020-06-26 07:01:26'),
(70, 8, 3, '2020-06-26 07:01:26', '2020-06-26 07:01:26'),
(71, 9, 3, '2020-06-26 07:01:26', '2020-06-26 07:01:26'),
(72, 13, 3, '2020-06-26 07:01:26', '2020-06-26 07:01:26'),
(73, 14, 3, '2020-06-26 07:01:26', '2020-06-26 07:01:26'),
(74, 15, 3, '2020-06-26 07:01:26', '2020-06-26 07:01:26'),
(75, 17, 3, '2020-06-26 07:01:27', '2020-06-26 07:01:27'),
(76, 18, 3, '2020-06-26 07:01:27', '2020-06-26 07:01:27'),
(77, 22, 3, '2020-06-26 07:01:27', '2020-06-26 07:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio_venta`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'PRODUCTO INICIAL', '0.00', 1, '2020-06-26 03:57:34', '2020-06-26 03:57:34'),
(2, 'HEMATOLOGIA COMPLETA', '550000.00', 1, '2020-06-26 05:24:45', '2020-06-26 05:28:22'),
(3, 'EXAMEN DE HECES', '500000.00', 1, '2020-06-26 05:29:18', '2020-06-26 05:29:18'),
(4, 'EXAMEN DE ORINA', '450000.00', 1, '2020-06-26 05:29:33', '2020-06-26 05:29:33'),
(5, 'EXAMEN DE GLICEMIA', '580000.00', 1, '2020-06-26 05:29:52', '2020-06-26 05:29:52'),
(6, 'EXAMEN DE UREA', '700000.00', 1, '2020-06-26 05:30:14', '2020-06-26 05:30:14'),
(7, 'EXAMEN DE CREATININA', '680000.00', 1, '2020-06-26 05:30:35', '2020-06-26 05:30:35'),
(8, 'EXAMEN PERFIL 20', '800000.00', 1, '2020-06-26 05:31:09', '2020-06-26 05:31:09'),
(9, 'CONSULTA PEDIATRICA', '1200000.00', 1, '2020-06-26 05:33:04', '2020-06-26 05:33:04'),
(10, 'CONSULTA GINECOLOGIA', '1300000.00', 1, '2020-06-26 05:33:23', '2020-06-26 05:33:23'),
(11, 'CONSULTA OFTALMOLOGIA', '900000.00', 1, '2020-06-26 05:34:27', '2020-06-26 05:34:27'),
(12, 'EXAMEN DE PLAQUETAS', '550000.00', 1, '2020-06-26 05:40:47', '2020-06-26 05:40:47'),
(13, 'VDRL', '480000.00', 1, '2020-06-26 05:41:05', '2020-06-26 05:41:05'),
(14, 'VIH', '650000.00', 1, '2020-06-26 05:41:45', '2020-06-26 05:41:45'),
(15, 'EXAMEN URICULTIVO', '750000.00', 1, '2020-06-26 05:43:17', '2020-06-26 05:43:17'),
(16, 'GRUPO SANGUINEO Y FACTOR RH', '350000.00', 1, '2020-06-26 05:52:44', '2020-06-26 05:52:44'),
(17, 'EXAMEN DE CALCIO', '650000.00', 1, '2020-06-26 05:54:59', '2020-06-26 05:54:59'),
(18, 'INSULINA BASAL', '900000.00', 1, '2020-06-26 05:56:45', '2020-06-26 05:56:45'),
(19, 'LINFOCITOS', '550000.00', 1, '2020-06-26 05:57:51', '2020-06-26 05:57:51'),
(20, 'EXAMEN COLESTEROL HDL', '680000.00', 1, '2020-06-26 05:58:28', '2020-06-26 05:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `special` enum('all-access','no-access') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`, `special`) VALUES
(1, 'Admin', 'Admin', NULL, '2020-06-26 03:57:31', '2020-06-26 03:57:31', 'all-access'),
(2, 'ANALISTA 1', 'ANALISTA-1', 'ANALISTA ADMINISTRATIVO', '2020-06-26 06:59:12', '2020-06-26 06:59:12', NULL),
(3, 'ANALISTA 2', 'ANALISTA-2', 'ANALISTA FACTURACION', '2020-06-26 07:01:26', '2020-06-26 07:01:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-06-26 03:57:31', '2020-06-26 03:57:31'),
(2, 3, 2, '2020-06-26 07:02:36', '2020-06-26 07:02:36'),
(3, 2, 3, '2020-06-26 07:05:19', '2020-06-26 07:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codparroquia` bigint(20) UNSIGNED NOT NULL,
  `estatus` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipoclientes`
--

CREATE TABLE `tipoclientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipoclientes`
--

INSERT INTO `tipoclientes` (`id`, `nombre`, `descripcion`, `estatus`, `created_at`, `updated_at`) VALUES
(1, 'PERSONAL', 'PERSONAL', 1, '2020-06-26 03:57:32', '2020-06-26 03:57:32'),
(2, 'JURIDICO', 'JURIDICO', 1, '2020-06-26 03:57:33', '2020-06-26 03:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codcargo` bigint(20) UNSIGNED DEFAULT NULL,
  `coddpto` bigint(20) UNSIGNED DEFAULT NULL,
  `codnacionalidad` bigint(20) UNSIGNED DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `codcargo`, `coddpto`, `codnacionalidad`, `nombre`, `apellido`, `cedula`, `direccion`, `telefono`, `email`, `usuario`, `password`, `condicion`, `remember_token`, `created_at`, `updated_at`, `email_verified_at`) VALUES
(1, NULL, NULL, NULL, 'ADMINISTRADOR', 'ADMINISTRADOR', NULL, NULL, NULL, 'admin@admin.com', 'administrador', '$2y$10$UeycpxGi7gATBZKIa5apcuWzr.PXfagQBZBnnb7q.KPEdEuB5hmrC', 1, NULL, '2020-06-26 03:57:30', '2020-06-26 03:57:30', NULL),
(2, 2, 2, 1, 'JUAN JOSE', 'SOTO PEÑA', '20391877', 'ANDRÉS BELLO ACARIGUA PORTUGUESA AV 29 CASA 37-31', '02556649394', 'JUANJOSEXDD7@GMAIL.COM', 'JUANJOSE88', '$2y$10$/0GlnSkyX0CylgCSP93ICe9cROfL3xJPh8DbWREuvqFys8GMNigCK', 1, NULL, '2020-06-26 07:02:36', '2020-06-26 07:05:39', NULL),
(3, 1, 1, 1, 'ARNOLD JOSE', 'FERNANDEZ MARIN', '2658986', 'BELLAS ARTES AV PRINCIPAL CALLE 4 #2', '04121589663', 'arnoldjfer@gmail.com', 'ARNOLDFER', '$2y$10$9dD5MgYwt5VjkBApuK2LL.ys/IU2p/2cl6vHUqqYOvkmWsnXWt6.6', 1, NULL, '2020-06-26 07:05:19', '2020-06-26 07:05:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idcliente` bigint(20) UNSIGNED NOT NULL,
  `idusuario` bigint(20) UNSIGNED NOT NULL,
  `codformapago` bigint(20) UNSIGNED NOT NULL,
  `num_venta` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_venta` datetime NOT NULL,
  `impuesto` decimal(4,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`id`, `idcliente`, `idusuario`, `codformapago`, `num_venta`, `fecha_venta`, `impuesto`, `total`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '37895', '2020-05-19 00:00:00', '0.00', '0.00', 'Procesado', '2020-05-19 04:00:00', '2020-06-26 03:57:34'),
(2, 2, 1, 1, '37896', '2020-06-25 00:00:00', '0.16', '1044000.00', 'Procesado', '2020-06-26 05:43:50', '2020-06-26 05:43:50'),
(3, 3, 1, 1, '37897', '2020-06-25 00:00:00', '0.16', '1508000.00', 'Procesado', '2020-06-26 05:44:38', '2020-06-26 05:44:38'),
(4, 7, 1, 1, '37898', '2020-06-25 00:00:00', '0.16', '2262000.00', 'Procesado', '2020-06-26 05:45:20', '2020-06-26 05:45:20'),
(5, 9, 1, 1, '37899', '2020-06-25 00:00:00', '0.16', '861300.00', 'Procesado', '2020-06-26 05:45:43', '2020-06-26 05:45:43'),
(6, 11, 1, 1, '37900', '2020-06-25 00:00:00', '0.16', '918720.00', 'Procesado', '2020-06-26 05:45:59', '2020-06-26 05:45:59'),
(7, 6, 1, 1, '37901', '2020-06-25 00:00:00', '0.16', '1441880.00', 'Procesado', '2020-06-26 05:46:32', '2020-06-26 05:46:32'),
(8, 11, 1, 1, '37902', '2020-06-25 00:00:00', '0.16', '1096780.00', 'Procesado', '2020-06-26 05:49:52', '2020-06-26 05:49:52'),
(9, 15, 2, 1, '37903', '2020-06-25 00:00:00', '0.16', '812000.00', 'Procesado', '2020-06-26 07:03:52', '2020-06-26 07:03:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientes_codtipocliente_foreign` (`codtipocliente`),
  ADD KEY `clientes_codnacionalidad_foreign` (`codnacionalidad`);

--
-- Indexes for table `conceptoingresos`
--
ALTER TABLE `conceptoingresos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conceptos_codnaturaleza_foreign` (`codnaturaleza`);

--
-- Indexes for table `correlativos`
--
ALTER TABLE `correlativos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuentapotes`
--
ALTER TABLE `cuentapotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_ventas_idproducto_foreign` (`idproducto`),
  ADD KEY `detalle_ventas_idventa_foreign` (`idventa`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estados_codpais_foreign` (`codpais`);

--
-- Indexes for table `formapagos`
--
ALTER TABLE `formapagos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movingresoegresos`
--
ALTER TABLE `movingresoegresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movingresoegresos_codconcepto_foreign` (`codconcepto`),
  ADD KEY `movingresoegresos_codctapote_foreign` (`codctapote`),
  ADD KEY `movingresoegresos_idusuario_foreign` (`idusuario`);

--
-- Indexes for table `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipios_codestado_foreign` (`codestado`);

--
-- Indexes for table `nacionalidads`
--
ALTER TABLE `nacionalidads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `naturalezas`
--
ALTER TABLE `naturalezas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parroquias`
--
ALTER TABLE `parroquias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parroquias_codmunicipio_foreign` (`codmunicipio`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_index` (`permission_id`),
  ADD KEY `permission_user_user_id_index` (`user_id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productos_nombre_unique` (`nombre`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sectors_codparroquia_foreign` (`codparroquia`);

--
-- Indexes for table `tipoclientes`
--
ALTER TABLE `tipoclientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_usuario_unique` (`usuario`),
  ADD KEY `users_codnacionalidad_foreign` (`codnacionalidad`),
  ADD KEY `users_coddpto_foreign` (`coddpto`),
  ADD KEY `users_codcargo_foreign` (`codcargo`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ventas_idcliente_foreign` (`idcliente`),
  ADD KEY `ventas_idusuario_foreign` (`idusuario`),
  ADD KEY `ventas_codformapago_foreign` (`codformapago`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `conceptoingresos`
--
ALTER TABLE `conceptoingresos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `correlativos`
--
ALTER TABLE `correlativos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cuentapotes`
--
ALTER TABLE `cuentapotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formapagos`
--
ALTER TABLE `formapagos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `movingresoegresos`
--
ALTER TABLE `movingresoegresos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nacionalidads`
--
ALTER TABLE `nacionalidads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `naturalezas`
--
ALTER TABLE `naturalezas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pais`
--
ALTER TABLE `pais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parroquias`
--
ALTER TABLE `parroquias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipoclientes`
--
ALTER TABLE `tipoclientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_codnacionalidad_foreign` FOREIGN KEY (`codnacionalidad`) REFERENCES `nacionalidads` (`id`),
  ADD CONSTRAINT `clientes_codtipocliente_foreign` FOREIGN KEY (`codtipocliente`) REFERENCES `tipoclientes` (`id`);

--
-- Constraints for table `conceptos`
--
ALTER TABLE `conceptos`
  ADD CONSTRAINT `conceptos_codnaturaleza_foreign` FOREIGN KEY (`codnaturaleza`) REFERENCES `naturalezas` (`id`);

--
-- Constraints for table `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD CONSTRAINT `detalle_ventas_idproducto_foreign` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `detalle_ventas_idventa_foreign` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `estados_codpais_foreign` FOREIGN KEY (`codpais`) REFERENCES `pais` (`id`);

--
-- Constraints for table `movingresoegresos`
--
ALTER TABLE `movingresoegresos`
  ADD CONSTRAINT `movingresoegresos_codconcepto_foreign` FOREIGN KEY (`codconcepto`) REFERENCES `conceptos` (`id`),
  ADD CONSTRAINT `movingresoegresos_codctapote_foreign` FOREIGN KEY (`codctapote`) REFERENCES `cuentapotes` (`id`),
  ADD CONSTRAINT `movingresoegresos_idusuario_foreign` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`);

--
-- Constraints for table `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_codestado_foreign` FOREIGN KEY (`codestado`) REFERENCES `estados` (`id`);

--
-- Constraints for table `parroquias`
--
ALTER TABLE `parroquias`
  ADD CONSTRAINT `parroquias_codmunicipio_foreign` FOREIGN KEY (`codmunicipio`) REFERENCES `municipios` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sectors`
--
ALTER TABLE `sectors`
  ADD CONSTRAINT `sectors_codparroquia_foreign` FOREIGN KEY (`codparroquia`) REFERENCES `parroquias` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_codcargo_foreign` FOREIGN KEY (`codcargo`) REFERENCES `cargos` (`id`),
  ADD CONSTRAINT `users_coddpto_foreign` FOREIGN KEY (`coddpto`) REFERENCES `departamentos` (`id`),
  ADD CONSTRAINT `users_codnacionalidad_foreign` FOREIGN KEY (`codnacionalidad`) REFERENCES `nacionalidads` (`id`);

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_codformapago_foreign` FOREIGN KEY (`codformapago`) REFERENCES `formapagos` (`id`),
  ADD CONSTRAINT `ventas_idcliente_foreign` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `ventas_idusuario_foreign` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
