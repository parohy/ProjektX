-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2016 at 01:53 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `akademiasovy`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brandid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  PRIMARY KEY (`brandid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=30 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brandid`, `name`) VALUES
(1, 'Sony'),
(2, 'Panasonic'),
(3, 'Bose'),
(4, 'Sennheiser'),
(5, 'Beats'),
(6, 'Skullcandy'),
(7, 'Acoustic Audio'),
(8, 'Orb Audio'),
(9, 'Dell'),
(10, 'Asus'),
(11, 'Apple'),
(12, 'Lenovo'),
(13, 'CyberpowerPC'),
(14, 'HP'),
(15, 'Samsung'),
(16, 'LG'),
(17, 'Benq'),
(18, 'Google'),
(19, 'Microsoft'),
(20, 'Motorola'),
(21, 'Oneplus'),
(22, 'Xiaomi'),
(23, 'Sony Ericsson'),
(24, 'Nokia'),
(25, 'Aaratek'),
(26, 'Tune Belt'),
(27, 'Aceabove'),
(28, 'Caseology'),
(29, 'Philips');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
