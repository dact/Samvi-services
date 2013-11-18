-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-11-2013 a las 21:08:40
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
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE IF NOT EXISTS `taller` (
  `nit_taller` int(11) NOT NULL,
  `nombre_taller` varchar(50) DEFAULT NULL,
  `nick_taller` varchar(20) DEFAULT NULL,
  `clave_taller` varchar(75) DEFAULT NULL,
  `telefono_taller` int(11) DEFAULT NULL,
  `direccion_taller` varchar(50) DEFAULT NULL,
  `email_taller` varchar(30) DEFAULT NULL,
  `descripcion_taller` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nit_taller`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
