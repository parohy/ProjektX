-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2015 at 12:20 PM
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
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `productsid` int(11) NOT NULL,
  `totalcost` int(11) NOT NULL,
  `email` varchar(40) COLLATE utf8_slovak_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_slovak_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8_slovak_ci NOT NULL,
  `address` varchar(30) COLLATE utf8_slovak_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_slovak_ci NOT NULL,
  `postcode` varchar(5) COLLATE utf8_slovak_ci NOT NULL,
  `telephonenumber` varchar(13) COLLATE utf8_slovak_ci NOT NULL,
  PRIMARY KEY (`orderid`),
  UNIQUE KEY `E-mail_5` (`email`),
  KEY `E-mail` (`email`),
  KEY `E-mail_2` (`email`),
  KEY `E-mail_3` (`email`),
  KEY `E-mail_4` (`email`),
  KEY `Name` (`name`),
  KEY `Products ID` (`productsid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory` varchar(30) COLLATE utf8_slovak_ci NOT NULL,
  `itemsleft` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_slovak_ci NOT NULL,
  `price` float NOT NULL,
  `brand` varchar(20) COLLATE utf8_slovak_ci NOT NULL,
  `description` varchar(800) COLLATE utf8_slovak_ci NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `subcategory`, `itemsleft`, `name`, `price`, `brand`, `description`) VALUES
(1, 'Mobilné telefóny', 5, 'iPhone 5S', 499.99, 'Apple', 'Šupa mobil.'),
(2, 'Televízory', 3, 'UE32J5100', 429.99, 'Samsung', 'Je to šupa TV.'),
(3, 'Slúchadla', 50, 'Porta Pro', 29.99, 'Koss', 'Superis.'),
(4, 'Notebooky', 50, '250 K3W99EA', 399.99, 'HP', 'hahaha.'),
(5, 'Herné konzoly', 44, 'Playstation 4 500GB', 399.99, 'Sony', 'No, to hej.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) COLLATE utf8_slovak_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_slovak_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8_slovak_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_slovak_ci NOT NULL,
  `address` varchar(30) COLLATE utf8_slovak_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_slovak_ci NOT NULL,
  `postcode` varchar(5) COLLATE utf8_slovak_ci NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `E-mail_3` (`email`),
  KEY `E-mail` (`email`),
  KEY `E-mail_2` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `email`, `name`, `surname`, `password`, `address`, `city`, `postcode`) VALUES
(1, 'jozo19898@gmail.com', 'Jozef', 'Samuraj', 'jablko', 'Šafárikova 11', 'Košice', '04011'),
(2, 'serusky44@azet.sk', 'Martha', 'Big', 'yesyes22', 'Hlavná 55', 'Košice', '04001'),
(3, 'marek.sss@gmail.com', 'Marek', 'Velký', 'iamlegend', 'Bernolákova 1', 'Košice', '04001'),
(4, 'david99@gmail.com', 'David', 'Kostra', 'transformers55', 'Trieda SNP 50', 'Košice', '04001'),
(5, 'ottoman787@azet.sk', 'Otto', 'Markus', '55ottis', 'Kuzmányho', 'Košice', '04001');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `useremail_fk` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `productid_fk` FOREIGN KEY (`productsid`) REFERENCES `products` (`productid`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
