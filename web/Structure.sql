-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Temps de generació: 20-08-2017 a les 21:30:07
-- Versió del servidor: 5.5.55-38.8
-- Versió de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `s173f1b2_alarma`
--
DROP DATABASE IF EXISTS `s173f1b2_alarma`;
CREATE DATABASE IF NOT EXISTS `s173f1b2_alarma` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `s173f1b2_alarma`;

-- --------------------------------------------------------

--
-- Estructura de la taula `alarmes`
--

CREATE TABLE `alarmes` (
  `id` bigint(11) NOT NULL COMMENT 'identificador',
  `actiu` tinyint(1) DEFAULT '0',
  `disparat` tinyint(1) DEFAULT '0',
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `dl` tinyint(1) DEFAULT '0',
  `dm` tinyint(1) DEFAULT '0',
  `dc` tinyint(1) DEFAULT '0',
  `dj` tinyint(1) DEFAULT '0',
  `dv` tinyint(1) DEFAULT '0',
  `ds` tinyint(1) DEFAULT '0',
  `dg` tinyint(1) DEFAULT '0',
  `accio` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 Pujar / 0 Baixar',
  `temps` int(11) NOT NULL DEFAULT '22',
  `menjador` tinyint(1) NOT NULL DEFAULT '1',
  `escriptori` tinyint(1) NOT NULL DEFAULT '1',
  `dormitori` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `alarmes`
--

INSERT INTO `alarmes` (`id`, `actiu`, `disparat`, `data`, `hora`, `dl`, `dm`, `dc`, `dj`, `dv`, `ds`, `dg`, `accio`, `temps`, `menjador`, `escriptori`, `dormitori`) VALUES
(51, 1, 0, '0000-00-00', '08:00:00', 0, 0, 0, 0, 0, 1, 1, 1, 15, 1, 1, 1),
(61, 0, 0, '0000-00-00', '22:00:00', 0, 0, 0, 0, 0, 1, 1, 0, 0, 1, 0, 1),
(53, 1, 0, '0000-00-00', '07:00:00', 1, 1, 1, 1, 1, 0, 0, 1, 5, 1, 1, 1),
(56, 1, 0, '0000-00-00', '07:40:00', 1, 1, 1, 1, 1, 0, 0, 0, 10, 1, 1, 1),
(48, 1, 0, '0000-00-00', '07:05:00', 1, 1, 1, 1, 1, 0, 0, 1, 25, 1, 1, 1),
(60, 0, 0, '0000-00-00', '18:00:00', 1, 1, 1, 1, 1, 1, 1, 1, 25, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `sol`
--

CREATE TABLE `sol` (
  `id` int(11) NOT NULL,
  `offset_sortida` int(11) NOT NULL,
  `offset_posta` int(11) NOT NULL,
  `activar_sortida` int(11) NOT NULL DEFAULT '0',
  `activar_posta` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `sol`
--

INSERT INTO `sol` (`id`, `offset_sortida`, `offset_posta`, `activar_sortida`, `activar_posta`) VALUES
(1, 0, 50, 0, 0);

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `alarmes`
--
ALTER TABLE `alarmes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index de la taula `sol`
--
ALTER TABLE `sol`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `alarmes`
--
ALTER TABLE `alarmes`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador', AUTO_INCREMENT=63;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
