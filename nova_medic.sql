-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-08-2022 a las 15:02:11
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

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

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `nombre` int(255) NOT NULL,
  `apellido` int(255) NOT NULL,
  `pass` int(55) NOT NULL,
  `correo` int(255) NOT NULL,
  `sexo` int(20) NOT NULL,
  `fecha_nac` date NOT NULL,
  `fotoPerfil` varchar(250) NOT NULL DEFAULT '../uploads/imgDefault.webp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `fecha_nac` date NOT NULL,
  `fotoPerfil` varchar(250) NOT NULL DEFAULT '../uploads/imgDefault.webp',
  `id_historial` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_historial` (`id_historial`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `pass`, `correo`, `sexo`, `fecha_nac`, `fotoPerfil`, `id_historial`) VALUES
(10, 'Cristian ', 'Pineda', 'c4ca4238a0b923820dcc509a6f75849b', 'cristian.pineda2308@gmail.com', 'Hombre', '2022-08-14', '../uploads/imgDefault.webp', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `pass` varchar(55) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `fecha_nac` date NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `titulos` varchar(150) DEFAULT NULL,
  `fotoPerfil` varchar(250) NOT NULL DEFAULT '../uploads/imgDefault.webp',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

DROP TABLE IF EXISTS `expediente`;
CREATE TABLE IF NOT EXISTS `expediente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `peso` float NOT NULL,
  `estatura` float NOT NULL,
  `sangre` varchar(50) NOT NULL,
  `alergia` varchar(150) NOT NULL,
  `psico` varchar(150) NOT NULL,
  `alerMedi` varchar(150) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`id`, `peso`, `estatura`, `sangre`, `alergia`, `psico`, `alerMedi`, `id_cliente`) VALUES
(1, 170, 170, 'B+', 'Si', 'Si', 'Si', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
