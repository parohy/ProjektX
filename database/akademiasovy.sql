-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: So 07.Nov 2015, 13:12
-- Verzia serveru: 5.6.17
-- Verzia PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáza: `akademiasovy`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `Order ID` int(11) NOT NULL AUTO_INCREMENT,
  `Products ID` int(11) NOT NULL,
  `Total Cost` int(11) NOT NULL,
  `E-mail` varchar(40) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Postcode` varchar(5) NOT NULL,
  `Telephone number` varchar(13) NOT NULL,
  PRIMARY KEY (`Order ID`),
  UNIQUE KEY `E-mail_5` (`E-mail`),
  KEY `E-mail` (`E-mail`),
  KEY `E-mail_2` (`E-mail`),
  KEY `E-mail_3` (`E-mail`),
  KEY `E-mail_4` (`E-mail`),
  KEY `Name` (`Name`),
  KEY `Products ID` (`Products ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `Product ID` int(11) NOT NULL AUTO_INCREMENT,
  `Subcategory` varchar(30) NOT NULL,
  `Items Left` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Price` float NOT NULL,
  `Brand` varchar(20) NOT NULL,
  `Description` varchar(800) NOT NULL,
  PRIMARY KEY (`Product ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Sťahujem dáta pre tabuľku `products`
--

INSERT INTO `products` (`Product ID`, `Subcategory`, `Items Left`, `Name`, `Price`, `Brand`, `Description`) VALUES
(1, 'Mobilné telefóny', 5, 'iPhone 5S', 499.99, 'Apple', 'Šupa mobil.'),
(2, 'Televízory', 3, 'UE32J5100', 429.99, 'Samsung', 'Je to šupa TV.'),
(3, 'Slúchadla', 50, 'Porta Pro', 29.99, 'Koss', 'Superis.'),
(4, 'Notebooky', 50, '250 K3W99EA', 399.99, 'HP', 'hahaha.'),
(5, 'Herné konzoly', 44, 'Playstation 4 500GB', 399.99, 'Sony', 'No, to hej.');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `User ID` int(11) NOT NULL AUTO_INCREMENT,
  `E-mail` varchar(40) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Postcode` varchar(5) NOT NULL,
  PRIMARY KEY (`User ID`),
  UNIQUE KEY `E-mail_3` (`E-mail`),
  KEY `E-mail` (`E-mail`),
  KEY `E-mail_2` (`E-mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`User ID`, `E-mail`, `Name`, `Surname`, `Password`, `Address`, `City`, `Postcode`) VALUES
(1, 'jozo19898@gmail.com', 'Jozef', 'Samuraj', '7f51fa935071c1f7bc4dd1bf28ba13f3 ', 'Šafárikova 11', 'Košice', '04011'),
(2, 'serusky44@azet.sk', 'Martha', 'Big', '10bab60f32043f5c6d9c61d5efcfac5a ', 'Hlavná 55', 'Košice', '04001'),
(3, 'marek.sss@gmail.com', 'Marek', 'Velký', '53d9e33e7724c067f73577c6c6e19c4e ', 'Bernolákova 1', 'Košice', '04001'),
(4, 'david99@gmail.com', 'David', 'Kostra', '9e68830935aa1a47de049e8ad69c50b7 ', 'Trieda SNP 50', 'Košice', '04001'),
(5, 'ottoman787@azet.sk', 'Otto', 'Markus', '91e50355df2f3d7dea23fb30e80b3bfd ', 'Kuzmányho', 'Košice', '04001');

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `productID_fk` FOREIGN KEY (`Products ID`) REFERENCES `products` (`Product ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `orderuser_email_fk` FOREIGN KEY (`E-mail`) REFERENCES `users` (`E-mail`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
