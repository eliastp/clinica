-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2014 a las 19:20:07
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE IF NOT EXISTS `cita` (
  `fechaingreso` date NOT NULL,
  `NOMBRE` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE IF NOT EXISTS `doctores` (
  `id_doctor` int(30) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `especialidad` varchar(30) DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `contraseña` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_doctor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2147483647 ;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id_doctor`, `nombre`, `especialidad`, `usuario`, `contraseña`) VALUES
(1048213676, 'olmer', 'urologo', 'olmer', '123456'),
(1048213685, 'olmer', 'urologo', 'olmer', '123456'),
(1048213686, 'olmer', 'urologo', 'olmer', '123456'),
(1048213687, 'CLAUDIA', 'ODONTOLOGA', 'claudia', '123'),
(1048213688, 'CLAUDIA', 'ODONTOLOGA', 'claudia', '123'),
(2147483647, 'CLAUDIA', 'ODONTOLOGA', 'claudia', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intervencion`
--

CREATE TABLE IF NOT EXISTS `intervencion` (
  `patologia` varchar(100) NOT NULL,
  `sintoma` varchar(200) NOT NULL,
  `tratamiento` varchar(200) NOT NULL,
  PRIMARY KEY (`patologia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `usuario` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`usuario`, `contraseña`) VALUES
('olmer', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE IF NOT EXISTS `unidad` (
  `id_unidad` int(11) NOT NULL,
  `nombreunidad` varchar(50) NOT NULL,
  `planta` varchar(50) NOT NULL,
  PRIMARY KEY (`id_unidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(20) NOT NULL,
  `Nombres` varchar(20) NOT NULL,
  `Edad` int(20) NOT NULL,
  `Peso` int(20) NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `Doctor` varchar(30) NOT NULL,
  `Unidad` varchar(30) NOT NULL,
  `Fecha_consulta` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Nombres`, `Edad`, `Peso`, `Sexo`, `Doctor`, `Unidad`, `Fecha_consulta`) VALUES
(12354, '0', 12, 24, 'F', 'OLMER', 'UROLOGO', '2014-10-25'),
(123456, '0', 25, 78, 'MASCULINO', 'OLMER', 'UROLOGO', '2014-11-05'),
(41238539, '0', 15, 27, 'F', 'OLMER', 'UROLOGIA', '2014-11-03');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
