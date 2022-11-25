-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-11-2022 a las 21:15:47
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
-- Base de datos: `pethero`
--
CREATE DATABASE IF NOT EXISTS `pethero` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `pethero`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idOwner` int(11) NOT NULL,
  `idKeeper` int(11) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `idPet` int(11) NOT NULL,
  `confirmed` tinyint(4) NOT NULL,
  `idReview` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `booking`
--

INSERT INTO `booking` (`id`, `idOwner`, `idKeeper`, `amount`, `startDate`, `endDate`, `idPet`, `confirmed`, `idReview`) VALUES
(1, 11, 24, 60000, '2022-11-21', '2022-11-22', 26, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `keeper`
--

DROP TABLE IF EXISTS `keeper`;
CREATE TABLE IF NOT EXISTS `keeper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPetType` int(11) DEFAULT NULL,
  `petSize` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `dateFrom` date DEFAULT NULL,
  `dateTo` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `keeper`
--

INSERT INTO `keeper` (`id`, `idPetType`, `petSize`, `price`, `dateFrom`, `dateTo`) VALUES
(24, 2, 'Chico', 6000, '2022-11-14', '2022-11-23'),
(25, 3, 'Mediano', 5000, '2022-11-19', '2022-11-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `owner`
--

DROP TABLE IF EXISTS `owner`;
CREATE TABLE IF NOT EXISTS `owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPet` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `owner`
--

INSERT INTO `owner` (`id`, `idPet`) VALUES
(9, NULL),
(10, NULL),
(8, 0),
(11, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pet`
--

DROP TABLE IF EXISTS `pet`;
CREATE TABLE IF NOT EXISTS `pet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idOwner` int(11) NOT NULL,
  `img` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `idType` int(11) NOT NULL,
  `race` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `size` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `vacPlan` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `observation` text COLLATE latin1_spanish_ci,
  `birthDate` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `pet`
--

INSERT INTO `pet` (`id`, `idOwner`, `img`, `idType`, `race`, `size`, `vacPlan`, `observation`, `birthDate`, `active`) VALUES
(2, 8, 'Img/8petImg2022-11-12.png', 2, 'doberman', 'grande', NULL, 'es bueno', '10/10/2020', 1),
(3, 8, 'Img/8petImg2022-11-12.png', 2, 'doberman', 'grande', NULL, 'es bueno', '10/10/2020', 1),
(25, 11, 'Img/11petImg2022-11-15.jpg', 2, 'doberman', 'Mediano', NULL, 'fsdf', '10/10/2020', 1),
(26, 11, 'Img/11petImg2022-11-15.jpg', 2, 'Ovejero', 'Chico', NULL, 'gasdf', '10/10/2020', 1),
(24, 8, 'Img/8petImg2022-11-13.jpg', 2, 'Ovejero', 'grande', NULL, 'es bueno', '10/10/2020', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pettype`
--

DROP TABLE IF EXISTS `pettype`;
CREATE TABLE IF NOT EXISTS `pettype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `pettype`
--

INSERT INTO `pettype` (`id`, `type`) VALUES
(2, 'Perro'),
(3, 'Gato'),
(4, 'Tortuga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idOwner` int(11) NOT NULL,
  `idKeeper` int(11) NOT NULL,
  `description` text COLLATE latin1_spanish_ci NOT NULL,
  `reputation` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `review`
--

INSERT INTO `review` (`id`, `idOwner`, `idKeeper`, `description`, `reputation`) VALUES
(1, 11, 24, 'vasdfsdfa', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `lastName` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `address` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `city` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `genre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `dni` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `phone` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `userName` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `idOwner` int(11) DEFAULT NULL,
  `idKeeper` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `lastName`, `address`, `city`, `genre`, `dni`, `email`, `phone`, `userName`, `password`, `active`, `idOwner`, `idKeeper`) VALUES
(1, 'Rafael', 'Moragues', 'independencia', 'Mar del Plata', 'm', '4234', 'rafa.tc@hotmail.com', '02235895328', 'test', '1234', 1, 8, 24),
(2, 'jorge', 'burruchaga', 'dagsg', 'bs as', 'm', '5342', 'jorge@burru', '532', 'Burru', '1234', 1, NULL, 1),
(7, 'marcos', 'acuÃ±a', 'gasdfa', 'fasdfa', 'Chico', '3214123', 'marcos@acuÃ±a', '552345', 'HuevoAcuÃ±a', '1234', 1, NULL, 25),
(6, 'jorge', 'guzman', 'fasdf', 'fasdf', 'm', '5345', 'rafa@test', '545', 'Test5', '1234', 1, 11, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
