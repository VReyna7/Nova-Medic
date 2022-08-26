-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2022 a las 10:01:27
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
-- Base de datos: `nova_medic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `pass` varchar(55) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `fecha_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `nombre`, `apellido`, `pass`, `correo`, `sexo`, `fecha_nac`) VALUES
(3, 'Admin', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'admin1@gmail.com', 'Hombre', '2022-08-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `nameDR` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameC` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idC` int(6) NOT NULL,
  `idDC` int(6) NOT NULL,
  `apeC` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apeDR` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `pass` varchar(55) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `fecha_nac` date NOT NULL,
  `id_historial` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `pass`, `correo`, `sexo`, `fecha_nac`, `id_historial`) VALUES
(34, 'hgfoskgdas', 'fef<fdw', 'c4ca4238a0b923820dcc509a6f75849b', 'dWRFWAD@JFLKDSHX', 'Hombre', '2022-08-27', 12),
(35, 'PU', 'PU', 'ec94f05fa41c14680ec73c34a8e44285', 'PUPU@PUPU.PUPU', 'Hombre', '2222-05-05', 13),
(36, 'sdadsada', 'asadsadsad', 'e10adc3949ba59abbe56e057f20f883e', 'willcastell05@gmail.com', 'Hombre', '2022-08-27', 14),
(37, 'Cristian', 'oMAR', '827ccb0eea8a706c4c34a16891f84e7b', 'cristianpineda@gmail.com', 'Hombre', '2004-08-10', 15),
(38, 'Fernando', 'Torres', 'e10adc3949ba59abbe56e057f20f883e', 'fernando.josue.torres@gmail.com', 'Hombre', '2004-01-29', 16),
(39, 'fiumba', 'xd', '020be165a3e587d7c83cb489c3ec9923', 'pimenteo202012@gmail.com', 'Hombre', '2022-08-26', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `pass` varchar(55) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `fecha_nac` date NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `titulos` varchar(150) DEFAULT NULL,
  `espec` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`id`, `nombre`, `apellido`, `pass`, `correo`, `sexo`, `fecha_nac`, `estado`, `titulos`, `espec`) VALUES
(4, 'Víctor Eduardo', 'Montecino', '827ccb0eea8a706c4c34a16891f84e7b', 'victor@gmail.com', 'Hombre', '1991-01-10', 0, NULL, 'Psicologia'),
(2, 'rodrigo', 'asdasad', '827ccb0eea8a706c4c34a16891f84e7b', 'rorrisad@gmail.com', 'Mujer', '2022-08-21', 0, NULL, 'general'),
(3, 'juasnd', 'sadasd', '827ccb0eea8a706c4c34a16891f84e7b', 'casdasdad@gmail.com', 'Hombre', '2022-08-11', 0, NULL, 'Doctor General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `id` int(11) NOT NULL,
  `peso` varchar(50) NOT NULL,
  `estatura` varchar(50) NOT NULL,
  `sangre` varchar(50) NOT NULL,
  `alergia` varchar(150) NOT NULL,
  `psico` varchar(150) NOT NULL,
  `alerMedi` varchar(150) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`id`, `peso`, `estatura`, `sangre`, `alergia`, `psico`, `alerMedi`, `id_cliente`) VALUES
(12, '1', '1', 'B+', 'Si', 'Si', 'Si', 34),
(13, '150kg', '0.5m', 'AB+', 'No', 'No', 'No', 35),
(14, '11', '11', 'O+', 'No', 'No', 'No', 36),
(15, '100kg', '1.70', 'AB+', 'Si', 'Si', 'No', 37),
(16, '140', '1.78', 'O+', 'Si', 'No', 'No', 38),
(17, '22222', '5.60', 'AB+', 'No', 'No', 'No', 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idDoctor` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `estado` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_historial` (`id_historial`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_historial`) REFERENCES `expediente` (`id`);

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD CONSTRAINT `expediente_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
