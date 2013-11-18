-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-11-2013 a las 21:08:27
-- Versión del servidor: 5.5.11
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `samvidb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `cedula_usuario` int(11) DEFAULT NULL,
  `nit_taller` int(11) DEFAULT NULL,
  `tipo_vehiculo` varchar(50) DEFAULT NULL,
  `problema_vehiculo` varchar(50) DEFAULT NULL,
  `descripcion_problema` varchar(200) DEFAULT NULL,
  `fecha_solicitud` date DEFAULT NULL,
  `estado_solicitud` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_solicitud`),
  KEY `nit_taller` (`nit_taller`),
  KEY `cedula_usuario` (`cedula_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
