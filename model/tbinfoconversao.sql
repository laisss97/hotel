-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 17, 2018 at 12:36 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conversor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbinfoconversao`
--

DROP TABLE IF EXISTS `tbinfoconversao`;
CREATE TABLE IF NOT EXISTS `tbinfoconversao` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `de` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `para` varchar(100) COLLATE utf8_bin NOT NULL,
  `deValor` varchar(100) COLLATE utf8_bin NOT NULL,
  `conversao` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbinfoconversao`
--

INSERT INTO `tbinfoconversao` (`id`, `de`, `para`, `deValor`, `conversao`) VALUES
(33, 'pés', 'metros', '56.85', '17.327034440719'),
(32, 'centímetros', 'pés', '5000', '164.04199475066'),
(31, 'centímetros', 'polegadas', '5.6', '2.2047244094488'),
(30, 'milhas', 'centímetros', '89.9', '14468002.56'),
(29, 'quilômetros', 'milhas', '1288.28', '800.67122436296'),
(28, 'milhas', 'quilômetros', '800.50', '1288.279872'),
(27, 'pés', 'polegadas', '4.5', '54');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
