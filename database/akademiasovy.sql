-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2015 at 01:40 PM
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
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `defaultpic` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryid`, `name`, `parent`, `defaultpic`) VALUES
(1, 'ELECTRONICS', NULL, '*\\img\\categories\\1.jpg'),
(2, 'TV,AUDIO', 1, '*\\img\\categories\\2.jpg'),
(3, 'BLURAY PLAYERS', 2, '*\\img\\categories\\3.jpg'),
(4, 'HEADPHONES', 2, '*\\img\\categories\\4.jpg'),
(5, 'IN-EAR', 4, '*\\img\\categories\\5.jpg'),
(6, 'ON EAR', 4, '*\\img\\categories\\6.jpg'),
(7, 'HOME AUDIO', 2, '*\\img\\categories\\7.jpg'),
(8, 'PC,TABLETS', 1, '*\\img\\categories\\8.jpg'),
(9, 'NOTEBOOKS', 8, '*\\img\\categories\\9.jpg'),
(10, 'PC', 8, '*\\img\\categories\\10.jpg'),
(11, 'TABLETS', 8, '*\\img\\categories\\11.jpg'),
(12, 'ANDROID', 11, '*\\img\\categories\\12.jpg'),
(13, 'IOS', 11, '*\\img\\categories\\13.jpg'),
(14, 'MONITORS', 8, '*\\img\\categories\\14.jpg'),
(15, 'MOBILE PHONES', 1, '*\\img\\categories\\15.jpg'),
(16, 'CELL PHONES', 15, '*\\img\\categories\\16.jpg'),
(17, 'TOUCH DISPLAY', 16, '*\\img\\categories\\17.jpg'),
(18, 'CLASSIC PHONES', 16, '*\\img\\categories\\18.jpg'),
(19, 'ACCESSORIES', 15, '*\\img\\categories\\19.jpg'),
(20, 'ARMBANDS', 19, '*\\img\\categories\\20.jpg'),
(21, 'BATTERIES', 19, '*\\img\\categories\\21.jpg'),
(22, 'CASES', 19, '*\\img\\categories\\22.jpg'),
(23, 'SMART WATCHES', 15, '*\\img\\categories\\23.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `imageid` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `pic1path` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `pic2path` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `pic3path` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  PRIMARY KEY (`imageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imageid`, `productid`, `pic1path`, `pic2path`, `pic3path`) VALUES
(1, 1, '*\\img\\products\\1\\1a.jpg', '*\\img\\products\\1\\1b.jpg', '*\\img\\products\\1\\1c.jpg'),
(2, 2, '*\\img\\products\\2\\2a.jpg', '*\\img\\products\\2\\2b.jpg', '*\\img\\products\\2\\2c.jpg'),
(3, 3, '*\\img\\products\\3\\3a.jpg', '*\\img\\products\\3\\3b.jpg', '*\\img\\products\\3\\3c.jpg'),
(4, 4, '*\\img\\products\\4\\4a.jpg', '*\\img\\products\\4\\4b.jpg', '*\\img\\products\\4\\4c.jpg'),
(5, 5, '*\\img\\products\\5\\5a.jpg', '*\\img\\products\\5\\5b.jpg', '*\\img\\products\\5\\5c.jpg'),
(6, 6, '*\\img\\products\\6\\6a.jpg', '*\\img\\products\\6\\6b.jpg', '*\\img\\products\\6\\6c.jpg'),
(7, 7, '*\\img\\products\\7\\7a.jpg', '*\\img\\products\\7\\7b.jpg', '*\\img\\products\\7\\7c.jpg'),
(8, 8, '*\\img\\products\\8\\8a.jpg', '*\\img\\products\\8\\8b.jpg', '*\\img\\products\\8\\8c.jpg'),
(9, 9, '*\\img\\products\\9\\9a.jpg', '*\\img\\products\\9\\9b.jpg', '*\\img\\products\\9\\9c.jpg'),
(10, 10, '*\\img\\products\\10\\10a.jpg', '*\\img\\products\\10\\10b.jpg', '*\\img\\products\\10\\10c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
  `detailid` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `detailprice` float NOT NULL,
  PRIMARY KEY (`detailid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shipped` tinyint(4) NOT NULL,
  `orderprice` float NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `price` float NOT NULL,
  `brand` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `description` mediumtext COLLATE utf8_slovak_ci NOT NULL,
  `viewamount` int(11) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `numofratings` int(11) NOT NULL,
  `sumofratings` int(11) NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `categoryid`, `amount`, `name`, `price`, `brand`, `description`, `viewamount`, `datecreated`, `numofratings`, `sumofratings`) VALUES
(1, 3, 25, 'Sony BDP-S3200', 149.99, 'SONY', 'The new Sony BDP-S3200 Blu-ray Disc Player come up with Super Wi-Fi features with completely incased optical drive for enhanced dust resistance. It supports Full HD 1080p resolution and DVD upscaling to near HD quality. You can also use your mobile device as a second display or as a remote control for the player. All you need is the Sony TV SideView app. You can even search for movie info using Gracenote. Our Sony BDP-S3200 hardware modified region A, B & C Blu-ray player is also guaranteed work with any future firmware updates from Sony. It also features a perfect real time PAL to NTSC conversion which enables you to watch PAL DVDs on US TVs without any external video converter.', 1, '2015-11-20 23:13:39', 1, 1),
(2, 3, 45, 'Panasonic DMP-BDT270', 329.99, 'PANASONIC', 'The DMP-BDT270 Smart Network 4K Upscaling Wi-Fi and 3D Blu-ray Disc Player from Panasonic allows you to watch movies at near 4K resolution and can stream multimedia content. This Blu-ray player supports full HD 1080p 2D and 3D Blu-ray disc playback from its HDMI output, and can also upconvert standard definition DVDs and Blu-ray movies to near 4K quality when used with a 4K television. Additionally, you can convert 2D content into 3D when used with optional 3D glasses and a 3D TV. Wi-Fi and Ethernet are built-in for browsing the Internet, and accessing premium streaming content such as Netflix, Hulu Plus and YouTube.', 1, '2015-11-20 23:25:04', 1, 1),
(3, 5, 35, 'Sony MDREX10LP/BLK In-Ear Headphones', 14.99, 'SONY', '9mm driver unit, neodymium magnet, hybrid silicone earbuds (S/M/L), 1.2m Y-Type cord\r\nWide range of colours to choose from\r\nPowerful bass and high resolution treble\r\nSecure fit hybrid silicone earbuds', 1, '2015-11-20 23:29:44', 1, 1),
(4, 5, 10, 'Bose SoundTrue In-Ear Headphones, Cranberry', 79.99, 'BOSE', 'Bose SoundTrue In-Ear Headphones have the audio quality and sophisticated style your busy life demands. They deliver deep, clear sound for the music you love. The StayHear tips keep the headphones comfortably in place for hours of listening. They are engineered and tested for lasting quality and durability, and include a matching carrying case. And you''ll look good wearing them. SoundTrue In-Ear Headphones come in three colors to fit your style: Black, White and Cranberry. What''s in the box: SoundTrue In-Ear Headphones, 3-pairs StayHear tips (S, M, L), Carry case and Clothing clip.', 1, '2015-11-20 23:31:21', 1, 1),
(5, 5, 32, 'Sennheiser CX 300 II Precision Enhanced Bass Earbuds (Black)', 32.99, 'SENNHEISER', 'Offering a powerful, bass-driven stereo sound with greater clarity and improved dynamics over standard earbuds are the Sennheiser CX 300-II in-ear headphones. The various sizes of ear adapters (S/M/L sizes) provided in the package allow for a customized fit as well as exceptional noise blocking capability. A convenient carrying pouch is also included for easy storage.', 1, '2015-11-20 23:33:00', 1, 1),
(6, 6, 0, 'Beats Solo2 Wireless On-Ear Headphones - Black', 199.99, 'BEATS', 'Beats Solo2 Wireless. Designed for sound, tuned for emotion, now wireless.', 1, '2015-11-20 23:34:36', 1, 1),
(7, 6, 75, 'Skullcandy Uprock Headphones with Mic', 29.99, 'SKULLCANDY', 'The people at Skullcandy firmly believe that everyone has the right to have access to face-melting sound, which is why they made the Uprock Headphones with Mic with the quality everyone deserves, at a price anyone can afford. Supreme Sound drivers pump attacking bass and precision highs straight to your dome, while the cushy ear pillows keep you comfortable for hours of listening pleasure.', 1, '2015-11-20 23:39:22', 1, 1),
(8, 6, 51, 'Sony MDR-ZX330BT/B Bluetooth Wireless On-Ear Headphones', 59.99, 'SONY', 'So easy-lightweight, compact listening with added wireless freedom. Enjoy your favorite beats with cord-free convenience via Bluetooth with Near Field Communications (NFC) technology. Envelope yourself in full, balanced sound and tight beats with 30mm drivers and easily swivel and stow away when done.', 1, '2015-11-20 23:41:09', 1, 1),
(9, 7, 12, 'Acoustic Audio AA5170 Home Theater 5.1', 89.99, 'ACOUSTIC AUDIO', 'This 6 piece, 700 watt system includes one powered subwoofer and five satellite speakers as well as all the necessary cables and instructions needed for simple integration into any multimedia configuration. This compact, yet powerful speaker package makes for an excellent addition to any home theater system, personal computer or laptop, gaming system, digital media player, "i" device or any other audio/video device that that can be connected via Bluetooth, RCA or 3.5mm auxiliary interface. The included powered subwoofer is housed in a digitally tuned, bass enhancing enclosure made of durable MDF for increased bass response while the full range satellite speakers feature magnetic shielding for worry-free use near televisions and computer monitors.', 1, '2015-11-20 23:42:47', 1, 1),
(10, 7, 3, 'Orb Audio Mini 5.1 Home Theater Speaker System', 599.99, 'ORB AUDIO', 'Exclusive to Amazon - a custom 5.1 home theater surround sound system that will blow your mind without blowing your budget. Great for both movies and music, this system includes five state of the art Mod1X satellite speakers and the ultra compact subMINI powered subwoofer. You also get 100 feet of USA made speaker wire and a subwoofer cable - everything you need to connect the speakers to a receiver quickly and easily. Orb Audio is known for systems designed to produce big sound from small, attractive speakers and this system is sure to please. Don''t miss out on this exceptional limited time offer! It''s a great chance to bring high quality sound to your room without filling it up with speakers made from plastic or fake wood. Audiophile sound, outstanding looks and a fantastic sale price. This system has it all, so try it today!', 1, '2015-11-20 23:44:17', 1, 1),
(11, 9, 15, 'Dell Inspiron i7559-763BLK 15.6" ', 729.99, 'DELL', 'Intel i5-6300HQ 2.3 GHz Quad-Core (6M Cache, Turbo up to 3.2 GHz)\r\nNVIDIA GeForce GTX 960M 4GB GDDR5\r\n8 GB DDR3L / 256 GB Solid-State Drive\r\n15.6-Inch FHD IPS, Wide-Angle, Anti Glare Screen', 1, '2015-11-20 23:48:11', 1, 1),
(12, 9, 22, 'ASUS Zenbook UX305LA 13.3-Inch Laptop (Intel Core i5, 8GB, 256 GB SSD, Titanium Gold) with Windows 10', 709.99, 'ASUS', '13.3-Inch Full-HD IPS Anti-Glare Matte Display with an Ultra-wide 170° Viewing Angle.\r\nPowerful 5th-generation Intel Core i5-5200U 2.2GHz (Turbo up to 2.7GHz) Broadwell.\r\n8 GB RAM/ 256 GB Solid State Drive; 10-Hours Battery Life. 1.2 MP High Definition Webcam.\r\nDesigned to be ultra-slim with an all-aluminum body. The unit weighs only 2.86 lbs, is less than .6-inch thin.', 1, '2015-11-20 23:49:49', 1, 1),
(13, 9, 42, 'ASUS Chromebook Flip 10.1-Inch Convertible 2 in 1 Touchscreen (Rockchip, 4 GB, 16GB SSD, Silver)', 249.99, 'ASUS', 'Rockchip 1.8 GHz Processor\r\n4 GB DDR3 RAM\r\nCan open/edit MS Office files using free embedded QuickOffice editor or Google Docs, and can download Microsoft Office Online (an online version of Microsoft Office) for free. Cannot install standard MS Office software.\r\nStorage : 16GB Solid State Storage; No CD or DVD drive\r\n10.1 inches 1280*800 pixels LED-lit Screen\r\nChrome Operating System; Silver Chassis', 1, '2015-11-20 23:51:35', 1, 1),
(14, 9, 12, 'Apple MacBook Air MJVE2LL/A 13-inch Laptop (1.6 GHz Intel Core i5,4GB RAM,128 GB SSD Hard Drive, Mac OS X)', 929.99, 'APPLE', '1.6 GHz Intel Core i5 (Broadwell) 4GB of 1600 MHz LPDDR3 RAM\r\n128GB PCIe-Based Flash Storage Integrated Intel HD Graphics 6000\r\n13.3" LED-Backlit Glossy Display 1440 x 900 Native Resolution\r\n802.11ac Wi-Fi, Bluetooth 4.0 USB 3.0, Thunderbolt 2\r\n720p FaceTime HD Camera, SDXC Card Slot Mac OS X 10.10 Yosemite', 1, '2015-11-20 23:52:30', 1, 1),
(15, 9, 8, 'Lenovo Flex 3 14-Inch Touchscreen Laptop (Core i7, 8 GB RAM, 1 TB HDD, Windows 10) 80R3000UUS', 729.99, 'LENOVO', 'Intel Core i7-6500U 2.5 GHz Processor\r\n8 GB DDR3L SDRAM\r\n1 TB 5400 rpm Hard Drive\r\n14.0-Inch Screen, Integrated Graphics\r\nWindows 10, 5-hour battery life', 1, '2015-11-20 23:54:22', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `shipaddress` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `postcode` varchar(5) COLLATE utf8_slovak_ci NOT NULL,
  `datejoined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `email`, `name`, `surname`, `password`, `address`, `shipaddress`, `city`, `postcode`, `datejoined`) VALUES
(1, 'admin@admin.com', 'admin', '', 'admin2015', '', '', '', '', '0000-00-00 00:00:00'),
(2, 'david99@gmail.com', 'David', 'Kostra', 'transformers55', 'Trieda SNP 50', '', 'Košice', '04001', '0000-00-00 00:00:00'),
(3, 'jozo19898@gmail.com', 'Jozef', 'Samuraj', 'jablko', 'Šafárikova 11', '', 'Košice', '04011', '0000-00-00 00:00:00'),
(4, 'marek.sss@gmail.com', 'Marek', 'Velký', 'iamlegend', 'Bernolákova 1', '', 'Košice', '04001', '0000-00-00 00:00:00'),
(5, 'ottoman787@azet.sk', 'Otto', 'Markus', '55ottis', 'Kuzmányho', '', 'Košice', '04001', '0000-00-00 00:00:00'),
(6, 'serusky44@azet.sk', 'Martha', 'Big', 'yesyes22', 'Hlavná 55', '', 'Košice', '04001', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
