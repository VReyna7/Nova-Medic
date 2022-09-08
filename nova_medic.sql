-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2022 a las 05:34:30
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

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
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `pass` varchar(55) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `fecha_nac` date NOT NULL,
  `fotoPerfil` varchar(250) NOT NULL DEFAULT '../uploads/imgDefault.webp',
  `changePass` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `nombre`, `apellido`, `pass`, `correo`, `sexo`, `fecha_nac`, `fotoPerfil`, `changePass`) VALUES
(5, 'Víctor Eduardo', 'Montecino', '827ccb0eea8a706c4c34a16891f84e7b', 'admin1@gmail.com', 'Hombre', '2004-02-05', '../uploads/imgDefault.webp', 0);

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
  `espec` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `nameDR`, `nameC`, `idC`, `idDC`, `espec`) VALUES
(22, 'Fernando Josue', 'Víctor  Reyna', 11, 2, 'Psicologia'),
(23, 'jojo', 'Víctor  Reyna', 11, 3, 'Nutricionista'),
(27, 'Juan Perez', 'Víctor  Reyna', 11, 4, 'Doctor General'),
(30, 'loalso', 'Víctor  Reyna', 11, 1, 'Doctor General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `fecha_nac` date NOT NULL,
  `fotoPerfil` varchar(250) NOT NULL DEFAULT '../uploads/imgDefault.webp',
  `id_historial` int(11) DEFAULT NULL,
  `baneo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `pass`, `correo`, `sexo`, `fecha_nac`, `fotoPerfil`, `id_historial`, `baneo`) VALUES
(10, 'Cristian ', 'Pineda', 'c4ca4238a0b923820dcc509a6f75849b', 'cristian.pineda2308@gmail.com', 'Hombre', '2022-08-14', '../uploads/imgDefault.webp', NULL, 0),
(11, 'Víctor ', 'Reyna', '827ccb0eea8a706c4c34a16891f84e7b', 'victor@gmail.com', 'Hombre', '2004-01-01', '../uploads/cliente/11/unknown.png', 2, 0),
(15, 'Lourdes', 'Portales', '827ccb0eea8a706c4c34a16891f84e7b', 'lourdes@gmail.com', 'Mujer', '2004-08-05', '../uploads/imgDefault.webp', 9, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id` int(11) NOT NULL,
  `cliente` varchar(500) NOT NULL,
  `doctor` varchar(500) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `categoria` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `fotoPerfil` varchar(250) NOT NULL DEFAULT '../uploads/imgDefault.webp',
  `espec` varchar(200) NOT NULL,
  `changePass` int(10) NOT NULL,
  `baneo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`id`, `nombre`, `apellido`, `pass`, `correo`, `sexo`, `fecha_nac`, `estado`, `titulos`, `fotoPerfil`, `espec`, `changePass`, `baneo`) VALUES
(1, 'loalso', 'Montecino', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor@gmail.com', 'Hombre', '2004-05-05', 2, 'Fanatico del pene', '../uploads/doctor/1/doctorchapatin.jpg', 'Doctor General', 1, 0),
(2, 'Fernando Josue', 'Lara', 'e10adc3949ba59abbe56e057f20f883e', 'doctor2@gmail.com', 'Hombre', '2004-05-10', 0, NULL, '../uploads/imgDefault.webp', 'Psicologia', 1, 0),
(3, 'jojo', 'rere', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor3@gmail.com', 'Hombre', '2004-09-20', NULL, NULL, '../uploads/imgDefault.webp', 'Nutricionista', 0, 0),
(4, 'Juan Perez', 'Pollo', '827ccb0eea8a706c4c34a16891f84e7b', 'doctor4@gmail.com', 'Hombre', '2004-05-12', NULL, NULL, '../uploads/imgDefault.webp', 'Doctor General', 0, 0),
(5, 'Víctor Eduardo', 'Reyna Montecino', '7f148970645c7a2d510cc8da348bd3a6', 'veduardo239@gmail.com', 'Hombre', '2000-12-12', NULL, NULL, '../uploads/imgDefault.webp', 'Doctor General', 0, 0),
(7, 'Víctor Eduardo', 'Reyna Montecino', 'cfe1fbc279b25c8a545a8a5dfb9bcaa5', 'victorgamer1030@gmail.com', 'Hombre', '2000-11-27', NULL, NULL, '../uploads/imgDefault.webp', 'Doctor General', 0, 0),
(12, 'chepe', 'toño', '25f9e794323b453885f5181f1b624d0b', 'pimentel202012@gmail.com', 'Hombre', '2000-12-21', NULL, NULL, '../uploads/imgDefault.webp', 'Psicologia', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `id` int(11) NOT NULL,
  `peso` float NOT NULL,
  `estatura` float NOT NULL,
  `sangre` varchar(50) NOT NULL,
  `alergia` varchar(150) NOT NULL,
  `psico` varchar(150) NOT NULL,
  `alerMedi` varchar(150) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `text_anima` varchar(100) DEFAULT NULL,
  `text_medicina` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`id`, `peso`, `estatura`, `sangre`, `alergia`, `psico`, `alerMedi`, `id_cliente`, `text_anima`, `text_medicina`) VALUES
(1, 170, 170, 'B+', 'Si', 'Si', 'Si', 1, NULL, NULL),
(2, 70, 176, 'AB+', 'No', 'No', 'No', 11, NULL, NULL),
(3, 70, 176, 'O+', 'No', 'Si', 'No', 12, NULL, NULL),
(4, 80, 176, 'B-', 'No', 'Si', 'Si', 13, NULL, NULL),
(9, 80, 1.69, 'O+', 'No', 'No', 'Si', 15, '', 'Trimetropin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `medico` varchar(255) DEFAULT NULL,
  `paciente` varchar(255) DEFAULT NULL,
  `razon` varchar(255) DEFAULT NULL,
  `descrip` varchar(255) DEFAULT NULL,
  `receta` varchar(255) DEFAULT NULL,
  `fecha` varchar(255) DEFAULT NULL,
  `idC` int(11) DEFAULT NULL,
  `idDoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `medico`, `paciente`, `razon`, `descrip`, `receta`, `fecha`, `idC`, `idDoc`) VALUES
(2, 'loalso', 'Víctor', 'le dio sida', 'fewsfsad', 'xd', '08/09/2022', 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idDoctor` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `estado` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id`, `usuario`, `msg`, `idDoctor`, `idCliente`, `tipo`, `estado`) VALUES
(48, 'Víctor Eduardo', 'dasdasda', 1, 0, 1, 'Doctor'),
(49, 'Víctor Eduardo', 'dasdasd', 1, 0, 1, 'Doctor'),
(53, 'Víctor ', 'El paciente solicita una video llamada', 2, 11, 0, 'Cliente'),
(54, 'Víctor ', 'pene', 2, 11, 0, 'Cliente'),
(55, 'jojo', 'sadadasdad', 3, 0, 1, 'Doctor'),
(56, 'jojo', 'asdasdasd', 3, 11, 1, 'Doctor'),
(124, 'Víctor ', 'hola mami', 1, 11, 0, 'Cliente'),
(125, 'loalso', 'hola bebe', 1, 11, 1, 'Doctor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `reportante` varchar(100) NOT NULL,
  `reportado` varchar(100) NOT NULL,
  `rolReportado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id`, `descripcion`, `reportante`, `reportado`, `rolReportado`) VALUES
(6, 'asdasdsadad', 'Víctor  Reyna', 'Víctor Eduardo Montecino', 'Doctor'),
(7, 'Me hablo feo el maricon\r\n', 'Víctor Eduardo Montecino', 'Víctor  Reyna', 'Paciente');

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
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idC` (`idC`),
  ADD KEY `idDoc` (`idDoc`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
