-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Po 23.Nov 2015, 11:26
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
-- Štruktúra tabuľky pre tabuľku `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `defaultpic` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=24 ;

--
-- Sťahujem dáta pre tabuľku `categories`
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
-- Štruktúra tabuľky pre tabuľku `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `imageid` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `pic1path` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `pic2path` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `pic3path` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  PRIMARY KEY (`imageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=51 ;

--
-- Sťahujem dáta pre tabuľku `images`
--

INSERT INTO `images` (`imageid`, `productid`, `pic1path`, `pic2path`, `pic3path`) VALUES
(1, 1, '\\img\\products\\1\\1a.jpg', '\\img\\products\\1\\1b.jpg', '\\img\\products\\1\\1c.jpg'),
(2, 2, '\\img\\products\\2\\2a.jpg', '\\img\\products\\2\\2b.jpg', '\\img\\products\\2\\2c.jpg'),
(3, 3, '\\img\\products\\3\\3a.jpg', '\\img\\products\\3\\3b.jpg', '\\img\\products\\3\\3c.jpg'),
(4, 4, '\\img\\products\\4\\4a.jpg', '\\img\\products\\4\\4b.jpg', '\\img\\products\\4\\4c.jpg'),
(5, 5, '\\img\\products\\5\\5a.jpg', '\\img\\products\\5\\5b.jpg', '\\img\\products\\5\\5c.jpg'),
(6, 6, '\\img\\products\\6\\6a.jpg', '\\img\\products\\6\\6b.jpg', '\\img\\products\\6\\6c.jpg'),
(7, 7, '\\img\\products\\7\\7a.jpg', '\\img\\products\\7\\7b.jpg', '\\img\\products\\7\\7c.jpg'),
(8, 8, '\\img\\products\\8\\8a.jpg', '\\img\\products\\8\\8b.jpg', '\\img\\products\\8\\8c.jpg'),
(9, 9, '\\img\\products\\9\\9a.jpg', '\\img\\products\\9\\9b.jpg', '\\img\\products\\9\\9c.jpg'),
(10, 10, '\\img\\products\\10\\10a.jpg', '\\img\\products\\10\\10b.jpg', '\\img\\products\\10\\10c.jpg'),
(11, 11, '\\img\\products\\11\\11a.jpg', '\\img\\products\\11\\11b.jpg', '\\img\\products\\11\\11c.jpg'),
(12, 12, '\\img\\products\\12\\12a.jpg', '\\img\\products\\12\\12b.jpg', '\\img\\products\\12\\12c.jpg'),
(13, 13, '\\img\\products\\13\\13a.jpg', '\\img\\products\\13\\13b.jpg', '\\img\\products\\13\\13c.jpg'),
(14, 14, '\\img\\products\\14\\14a.jpg', '\\img\\products\\14\\14b.jpg', '\\img\\products\\14\\14c.jpg'),
(15, 15, '\\img\\products\\15\\15a.jpg', '\\img\\products\\15\\15b.jpg', '\\img\\products\\15\\15c.jpg'),
(16, 16, '\\img\\products\\16\\16a.jpg', '\\img\\products\\16\\16b.jpg', '\\img\\products\\16\\16c.jpg'),
(17, 17, '\\img\\products\\17\\17a.jpg', '\\img\\products\\17\\17b.jpg', '\\img\\products\\17\\17c.jpg'),
(18, 18, '\\img\\products\\18\\18a.jpg', '\\img\\products\\18\\18b.jpg', '\\img\\products\\18\\18c.jpg'),
(19, 19, '\\img\\products\\19\\19a.jpg', '\\img\\products\\19\\19b.jpg', '\\img\\products\\19\\19c.jpg'),
(20, 20, '\\img\\products\\20\\20a.jpg', '\\img\\products\\20\\20b.jpg', '\\img\\products\\20\\20c.jpg'),
(21, 21, '\\img\\products\\21\\21a.jpg', '\\img\\products\\21\\21b.jpg', '\\img\\products\\21\\21c.jpg'),
(22, 22, '\\img\\products\\22\\22a.jpg', '\\img\\products\\22\\22b.jpg', '\\img\\products\\22\\22c.jpg'),
(23, 23, '\\img\\products\\23\\23a.jpg', '\\img\\products\\23\\23b.jpg', '\\img\\products\\23\\23c.jpg'),
(24, 24, '\\img\\products\\24\\24a.jpg', '\\img\\products\\24\\24b.jpg', '\\img\\products\\24\\24c.jpg'),
(25, 25, '\\img\\products\\25\\25a.jpg', '\\img\\products\\25\\25b.jpg', '\\img\\products\\25\\25c.jpg'),
(26, 26, '\\img\\products\\26\\26a.jpg', '\\img\\products\\26\\26b.jpg', '\\img\\products\\26\\26c.jpg'),
(27, 27, '\\img\\products\\27\\27a.jpg', '\\img\\products\\27\\27b.jpg', '\\img\\products\\27\\27c.jpg'),
(28, 28, '\\img\\products\\28\\28a.jpg', '\\img\\products\\28\\28b.jpg', '\\img\\products\\28\\28c.jpg'),
(29, 29, '\\img\\products\\29\\29a.jpg', '\\img\\products\\29\\29b.jpg', '\\img\\products\\29\\29c.jpg'),
(30, 30, '\\img\\products\\30\\30a.jpg', '\\img\\products\\30\\30b.jpg', '\\img\\products\\30\\30c.jpg'),
(31, 31, '\\img\\products\\31\\31a.jpg', '\\img\\products\\31\\31b.jpg', '\\img\\products\\31\\31c.jpg'),
(32, 32, '\\img\\products\\32\\32a.jpg', '\\img\\products\\32\\32b.jpg', '\\img\\products\\32\\32c.jpg'),
(33, 33, '\\img\\products\\33\\33a.jpg', '\\img\\products\\33\\33b.jpg', '\\img\\products\\33\\33c.jpg'),
(34, 34, '\\img\\products\\34\\34a.jpg', '\\img\\products\\34\\34b.jpg', '\\img\\products\\34\\34c.jpg'),
(35, 35, '\\img\\products\\35\\35a.jpg', '\\img\\products\\35\\35b.jpg', '\\img\\products\\35\\35c.jpg'),
(36, 36, '\\img\\products\\36\\36a.jpg', '\\img\\products\\36\\36b.jpg', '\\img\\products\\36\\36c.jpg'),
(37, 37, '\\img\\products\\37\\37a.jpg', '\\img\\products\\37\\37b.jpg', '\\img\\products\\37\\37c.jpg'),
(38, 38, '\\img\\products\\38\\38a.jpg', '\\img\\products\\38\\38b.jpg', '\\img\\products\\38\\38c.jpg'),
(39, 39, '\\img\\products\\39\\39a.jpg', '\\img\\products\\39\\39b.jpg', '\\img\\products\\39\\39c.jpg'),
(40, 40, '\\img\\products\\40\\40a.jpg', '\\img\\products\\40\\40b.jpg', '\\img\\products\\40\\40c.jpg'),
(41, 41, '\\img\\products\\41\\41a.jpg', '\\img\\products\\41\\41b.jpg', '\\img\\products\\41\\41c.jpg'),
(42, 42, '\\img\\products\\42\\42a.jpg', '\\img\\products\\42\\42b.jpg', '\\img\\products\\42\\42c.jpg'),
(43, 43, '\\img\\products\\43\\43a.jpg', '\\img\\products\\43\\43b.jpg', '\\img\\products\\43\\43c.jpg'),
(44, 44, '\\img\\products\\44\\44a.jpg', '\\img\\products\\44\\44b.jpg', '\\img\\products\\44\\44c.jpg'),
(45, 45, '\\img\\products\\45\\45a.jpg', '\\img\\products\\45\\45b.jpg', '\\img\\products\\45\\45c.jpg'),
(46, 46, '\\img\\products\\46\\46a.jpg', '\\img\\products\\46\\46b.jpg', '\\img\\products\\46\\46c.jpg'),
(47, 47, '\\img\\products\\47\\47a.jpg', '\\img\\products\\47\\47b.jpg', '\\img\\products\\47\\47c.jpg'),
(48, 48, '\\img\\products\\48\\48a.jpg', '\\img\\products\\48\\48b.jpg', '\\img\\products\\48\\48c.jpg'),
(49, 49, '\\img\\products\\49\\49a.jpg', '\\img\\products\\49\\49b.jpg', '\\img\\products\\49\\49c.jpg'),
(50, 50, '\\img\\products\\50\\50a.jpg', '\\img\\products\\50\\50b.jpg', '\\img\\products\\50\\50c.jpg');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `orderdetails`
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
-- Štruktúra tabuľky pre tabuľku `orders`
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
-- Štruktúra tabuľky pre tabuľku `products`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=51 ;

--
-- Sťahujem dáta pre tabuľku `products`
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
(15, 9, 8, 'Lenovo Flex 3 14-Inch Touchscreen Laptop (Core i7, 8 GB RAM, 1 TB HDD, Windows 10) 80R3000UUS', 729.99, 'LENOVO', 'Intel Core i7-6500U 2.5 GHz Processor\r\n8 GB DDR3L SDRAM\r\n1 TB 5400 rpm Hard Drive\r\n14.0-Inch Screen, Integrated Graphics\r\nWindows 10, 5-hour battery life', 1, '2015-11-20 23:54:22', 1, 1),
(16, 10, 15, 'CyberpowerPC Gamer Ultra GUA3100A Gaming Desktop', 499.99, 'CYBERPOWERPC', 'System: AMD FX-4300 3.80GHZ Quad-Core | AMD 760G Chipset | 8GB DDR3 | 1TB HDD | Genuine Windows 10 Home 64-bit\r\nGraphics: AMD Radeon R7 240 2GB Video Card | 24X DVD±RW Dual-Layer Drive | Audio: 7.1 Channel | Gigabit LAN | Keyboard and Mouse\r\nConnectivity: 8x USB 2.0 | 1x RJ-45 Network Ethernet 10/100/1000 | Audio | 1x HDMI | 1x DVI | 1x VGA\r\nWarranty: 1 Year Parts & Labor Warranty | Free Lifetime Tech Support', 1, '2015-11-21 13:57:53', 1, 1),
(17, 10, 5, 'HP Pavilion Slimline Desktop PC', 249.99, 'HP', 'AMD E1-2500 Accelerated Processor with AMD Radeon HD 8240 graphics\r\n4GB PC3-10600 DDR3 SDRAM\r\n500GB Serial ATA hard drive (7200 rpm)\r\nMultiformat DVD±RW/CD-RW drive with double-layer support\r\nWindows 8.1 64-bit / 6 high-speed USB 2.0 ports / 802.11b/g/n WLAN', 1, '2015-11-21 14:00:17', 1, 1),
(18, 10, 6, 'CybertronPC Borg-Q (Green) TGM4213B Gaming PC', 549.99, 'CYBERTRONPC', 'System: AMD FX-4130 3.80GHz Quad-Core | 760G | 8GB DDR3 | 1TB HDD | Genuine Windows 8.1 64-Bit - Eligible for Windows 10 Free Upgrade After Purchase*\r\nGraphics: NVIDIA GeForce GT610 1GB Video Card | 24X DVD±RW Dual-Layer Drive | Audio: 7.1 Channel | Gigabit LAN | Keyboard and Mouse\r\nExpansion Bays/Slots Total(Free): 3(2) Ext. 5.25" | 4(3) Int. 3.5/2.5" | 1(1) PCI | 1(1) PCI-E x1 | 1(0) PCI-E x16 | 2(1) DIMM 240P\r\nConnectivity: 4x USB 3.0 | 2x USB 2.0 | 1x RJ-45 Network Ethernet 10/100/1000 | Audio | 1x HDMI | 1x DVI | 1x VGA\r\nChassis: Gaming Mid-Tower w/450 Watt Power Supply | 1 Year Parts & Labor Warranty | Free Lifetime Tech Support | *Upgrade Must be Completed by 7/26/16', 1, '2015-11-21 14:03:14', 1, 1),
(19, 10, 50, 'Lenovo ThinkServer TS140 i7-4770 16GB 3TB HDD Tower Server Desktop Computer', 699.99, 'LENOVO', 'Processor: Intel Core i7-4770 Quad Core Processor (8MB Cache, 3.4GHz - 3.9GHz) 84W\r\nHard Drive: 3TB 7200rpm Hard Disk Drive | PLEASE NOTE: Hard Drive Caddies are only included with Upgraded Hard Drives. Additional Caddies are only placeholders.\r\nRAM: 16GB DDR3 1600MHz | Optical Drive: DVD-ROM\r\n', 1, '2015-11-21 14:11:12', 1, 1),
(20, 12, 15, 'Samsung 32GB Galaxy Note 10.1" Android 4G LTE Wi-Fi Dual Camera Unlocked Tablet', 359.99, 'SAMSUNG', 'Operating System Android 4.4, kitkat\r\n32GB internal memory\r\nWi-Fi 802.11 a/b/g/n/ac, (2.4GHz + 5.0 GHz), USB 2.0, Bluetooth 4.0\r\n10.1" WQXGA TFT 2560 x 1600 pixel display\r\n4G LTE - T-Mobile Unlocked', 1, '2015-11-21 14:13:16', 1, 1),
(21, 12, 23, 'ASUS Transformer Pad TF103CX-A1-BK 10.1-Inch 16 GB Tablet (Black)', 269.99, 'ASUS', '1.33 GHz quad-core Intel Atom processor, Android 4.4 KitKat\r\n16 GB Storage expandable by 64 GB with micro SD, 1 GB RAM\r\n10-inch HD IPS Display. Keyboard dock NOT included\r\nDual band 802.11 a/b/g/n Wi-Fi for faster web browsing\r\nOver $270 worth of content and services included', 1, '2015-11-21 14:15:35', 1, 1),
(22, 12, 15, 'Samsung Galaxy Note Pro 12.2 (32GB, Black)', 524.99, 'SAMSUNG', 'Android 4.4 Kit Kat OS, 1.9GHz Samsung Exynos 5 Octa processor\r\n32 GB Flash Memory, 3 GB RAM\r\n12.2-inch 2560x1600 WQXGA Display\r\nFeatures Hancom Office, Multi Window (up to 4), Magazine UX, Remote PC, Sidesync', 1, '2015-11-21 14:17:18', 1, 1),
(23, 12, 32, 'Dell Venue 8 7000 Android Tablet (16GB)', 309.99, 'DELL', '8.4" OLED infinity display with 2560 x 1600 resolution\r\nAndroid 4.4 KitKat operating system\r\nIntel Atom processor Z3580 with up to 2.3GHz speed for optimal browsing.', 1, '2015-11-21 14:18:46', 1, 1),
(24, 13, 86, 'Apple iPad Pro (32GB, Wi-Fi, Space Gray) - 12.9" Display', 889.99, 'APPLE', '12.9" Retina Display, 2732 x 2048 Resolution\r\nApple iOS 9, Dual-Core A9X Chip with Quad-Core Graphics\r\n8 MP iSight Camera, Four-Speaker Audio\r\n32GB Capacity, Wi-Fi (802.11a/b/g/n/ac) + MIMO + Bluetooth 4.2\r\nUp to 10 Hours of Battery Life, 1.57 lbs\r\niPad Pro supports new Apple Smart Keyboard and Apple Pencil', 1, '2015-11-21 14:21:07', 1, 1),
(25, 13, 56, 'Apple MGNV2LL/A iPad mini 3, 7.9-Inch Retina Display 16GB, Wi-Fi, Silver', 329.99, 'APPLE', 'Apple iOS 8, 7.9-Inch Retina Display; 2048x1536 Resolution\r\nA7 Chip with 64-bit Architecture; M7 Motion Coprocessor\r\nWi-Fi (802.11a/b/g/n); 16 GB Capacity\r\n5MP iSight Camera; FaceTime HD Camera\r\nUp to 10 Hours of Battery Life', 1, '2015-11-21 14:22:12', 1, 1),
(26, 14, 53, 'LG Electronics UM57 25UM57 25-Inch Screen LED-lit Monitor', 179.99, 'LG', 'Resolution: 2560 x 1080 Resolution (WFHD)\r\nBrightness: 250 cd/m2 Brightness\r\nIncludes IPS Panel, Dual Controller, and Screen Split', 1, '2015-11-21 14:24:10', 1, 1),
(27, 14, 64, 'HP Pavilion 21.5-Inch IPS LED HDMI VGA Monitor', 119.99, 'HP', 'Amazing angles: Share consistent high-color fidelity with In-Plane Switching (IPS) technology across a 21.5-inch diagonal screen. A stunning vantage point for everyone, from almost any angle.\r\nDistinctively modern and accessible: The contemporary thin profile is enhanced by black and silver colors. The open WEDGE stand design provides convenient access to VGA and HDMI port connections.\r\nCaptivating imagery: Color and clarity radiate from the screen with Full HD 1920 x 1080 resolution, incredible 8,000,000:1 dynamic contrast ratio, 16:9 aspect ratio, and quick 7 mms response time.', 1, '2015-11-21 14:25:54', 1, 1),
(28, 14, 48, 'BenQ GL2760H 27-inch HDMI LED-lit Monitor', 189.99, 'BENQ', 'The GL2760H has passed Windows 8 certification and are fully compatible with both color systems. Plug in the GL2760H to your computer, and Windows 8 will recognize it instantly, making setup and connection effortless\r\nLED backlighting offers significant advantages for not only performance metrics such as higher dynamic contrast, no light leakage and flicker-free, but also environmental factors, like a manufacturing process and disposal that produces fewer pollutants\r\nD-sub / DVI/ HDMI/ headphone jack', 1, '2015-11-21 14:29:47', 1, 1),
(29, 17, 55, 'Samsung Galaxy S5', 449.99, 'SAMSUNG', 'With a 5.1" 1080p screen, 16 MP camera and 2 GB of RAM, the Galaxy S5 might not be the utmost specs beast that the Android world has to offer, but it comes with plenty of new features, both in comparison with its predecessor, the S4, and when measured up to the other flagships. The heart beat sensor, for instance, is unique for the Galaxy S5, while something like the Finger Scanner can also be observed on the iPhone 5s, but in a rather different implementation. Samsung also introduced two new launch colors, including Copper Gold, and a brand new perforated design for the rear cover. The addition of Snapdragon 801 chipset brings on LTE-A download speeds, and 4K video recording, to an already superb handset.', 1, '2015-11-21 14:34:02', 1, 1),
(30, 17, 59, 'LG G3', 419.99, 'LG', 'The new LG G3 flagship sports 5.5-inch, 1440 x 2560 (QHD) pixel resolution screen, which provides the super-crisp, 538 pixels per inch. Dimensions are pretty compact for the screen size, resulting in excellent 76.4% screen to body size ratio. The Android 4.4 KitKat-based handset is powered by a quad-core Snapdragon 801 and 3GB of LPDDR3 RAM. It features 32GB of internal storage and a microSD slot. The main 13-megapixel rear shooter comes with the company''s improved Optical Image Stabilization+ and has a laser auto focus assist beam, which delivers fast focus even in low light scenarios.', 1, '2015-11-21 14:37:10', 1, 1),
(31, 17, 65, 'Apple iPhone 6s 32GB', 799.99, 'APPLE', 'Not much has changed on the surface since the iPhone 6 introduced an updated look with a laminated screen and comfortably round corners. This time around, though, Apple is beating its chest for incorporating Series 7000 aluminum instead of the anodized aluminum it''s been traditionally using. The screen on the iPhone 6s is virtually unchanged from what the iPhone 6 brought to the table, but the smartphone has gained 3D Touch control that lets users deliberately choose between a light tap, a press, and a "deeper" press, triggering a range of specific controls. Other notable additions include the Apple A9 chipset, and a 12MP rear camera with 4K resolution video recording.', 1, '2015-11-21 14:49:14', 1, 1),
(32, 17, 98, 'Google Nexus 5X', 599.99, 'GOOGLE', 'Also made by LG, the Nexus 5X is an evolution on the original design with an upgraded hardware, and a launch pad for Google''s Android 6.0 Marshmallow. Coming with a 5.2" display, finger scanner and it also puts a unique focus on the camera, with a 12.3 MP shooter that offers huge 1.55 micron pixels to excel in low-light photography.\r\n', 1, '2015-11-21 14:52:47', 1, 1),
(33, 17, 75, 'Microsoft Lumia 950 XL', 549.99, 'MICROSOFT', 'The Microsoft Lumia 950 XL is a large and powerful smartphone powered by the Windows 10 Phone OS. It stands out with its 5.7-inch, OLED display packing 1440 by 2560 pixels. Inside it ticks Qualcomm''s octa-core Snapdragon 810 SoC which has been liquid-cooled to facilitate heat dissipation. And the camera is one worth being excited about – a 20MP sensor with OIS and a tripple LED flash is found at the back. The latter uses three LEDs to produce more natural colors. Further specs include 32GB of on-board storage, a microSD card slot, a 3440mAh battery that can last through 19h of talk time. The USB Type-C port at the bottom is a welcome bonus.\r\n', 1, '2015-11-21 14:54:30', 1, 1),
(34, 17, 68, 'Samsung Galaxy Note 5 32GB', 749.99, 'SAMSUNG', 'The Samsung Galaxy Note 5 brings a huge redesign to the Note series: it adopts the glass and metal styling of the Galaxy S6, but in a larger, 5.7" form factor, and it features the signature S Pen stylus. The Note 5 sports the 14nm Exynos 7420 octa-core system chip with a whopping 4GB of LPDDR4 RAM. In terms of photography, it sports a 16-megapixel rear cam with OIS, while up front there is a 5-megapixel selfie shooter, and both cameras sport wide, f/1.9 lenses. The battery on the Note 5 is smaller than on the Note 4: it''s a 3000mAh juicer that is not user removable.', 1, '2015-11-21 14:57:08', 1, 1),
(35, 17, 102, 'Motorola Moto X Style', 519.99, 'MOTOROLA', 'The Motorola Moto X Style isn''t exactly small, but it isn''t humongous either. As a matter of fact, it boasts one of the highest screen-to-size ratios in the industry – 76% of its front is occupied by the 5.7-inch screen packing a 1440 by 2560 pixels of resolution. Inside ticks a Qualcomm Snapdragon 808 SoC with a 1.8GHz maximum clock speed. Yup, turns out that the rumors of the phone packing an SD 810 were incorrect. But while not the fastest SoC in Qualcomm''s stable, the Snapdragon 808 is still powerful enough to deliver a smooth experience, especially when it is accompanied by 3GB of RAM.Turn the Moto X Style around and you''ll find a 21MP camera with F2.0, phase-detection autofocus, and dual-tone LED flash.On the front of the Moto X Style we see a 5MP front-facing camera backed up by... an LED flash.', 1, '2015-11-21 14:58:35', 1, 1),
(36, 17, 120, 'Google Nexus 6P', 689.99, 'GOOGLE', 'For the first time in Google''s Nexus line history, Huawei managed to join the exclusive club of poster child Android makers. Being the more premium (and more expensive) of the two 2015 Nexus phones, the 6P comes clad in a metal chassis, with 5.7" WQHD display, stereo speakers at the front, and a round finger scanner on the back. The Nexus phones usually don''t come with a premium build, great camera and large battery, but the new Nexus 6P shatters all stereotypes here.', 1, '2015-11-21 15:01:22', 1, 1),
(37, 17, 23, 'OnePlus X', 559.99, 'ONEPLUS', 'The external appearance is undoubtedly one of the main selling points for the new OnePlus X. The phone will be offered in two versions - Onyx and a limited Ceramic edition. The phone has a 5-inch display with 1080p resolution and 441ppi. The real eyebrow-raiser with the OnePlus X is its quad-core Snapdragon 801 chipset. Not that this silicon is not powerful enough to run the new Oxygen interface on top of Android 5.1.1 Lollipop, but it is somewhat aging in the sense that it is not a 64-bit endeavor. Other than that, OnePlus equipped the X with a generous 3 GB RAM amount, and 16 GB of storage, expandable via a microSD card, the slot for which is housed in the dual SIM card tray, so it''s either two nano SIMs, or one SIM and one memory card, bummer. The OnePlus X comes with a 13 MP rear camera, and a hearty 8 MP selfie-taker.', 1, '2015-11-21 15:03:14', 1, 1),
(38, 17, 22, 'Xiaomi Mi 4c\r\n', 559.99, 'XIAOMI', 'The Xiaomi Mi 4c features a 5-inch, 1080 x 1920 resolution screen. That works out to a pixel density of 441ppi. Under the hood is the Snapdragon 808 SoC carrying a hexa-core 1.8GHz CPU, and the Adreno 418 GPU. A 13MP camera is on back along with a 5MP front-facing shooter. Keeping the lights on is a 3080mAh juicer, and Android 5.1 is pre-installed with MIUI 7 running on top. The Mi 4c not only comes with a Type-C USB port, it also comes with an infrared port to be used for security, not for connectivity.', 1, '2015-11-21 15:05:12', 1, 1),
(39, 18, 12, 'LG KF750', 79.99, 'LG', 'GSM 900 / 1800 / 1900\r\nSlimmest five mega pixel camera on 11.8 mm profile\r\nMusic, photos, M-Toy, document, FM radio - all five functions are at your fingertips with the Touch Media.\r\nAuto Luminance Control automatically adjusts screen brightness according to ambient brightness.\r\nSecret''s display technology offers easy screen size adjustment and horizontal or vertical rotation of the screen depending on hand movement.\r\nThis cell phone may not include a US warranty as some manufacturers do not honor warranties for international version phones. Please contact the seller for specific warranty information.', 1, '2015-11-21 15:09:44', 1, 1),
(40, 18, 29, 'Sony Ericsson C905a', 129.99, 'SONY ERICSSON', '3G-enabled Cybershot camera phone with 8.1-megapixel lens, flash, 16x digital zoom, image stabilizer, sharing with blogs and Facebook\r\nBluetooth stereo music; digital audio player; M2 memory expansion; access to personal email and instant messaging\r\nUp to 3.5 hours of talk time, up to 350 hours (14.6 days) of standby time\r\nUnlocked cell phones are compatible with GSM carriers such as AT&T and T-Mobile, but are not compatible with CDMA carriers such as Verizon and Sprint.\r\nQuad-band GSM cell phone compatible with 850/900/1800/1900 frequencies and International 3G compatibility via 2100 UMTS/HSDPA plus GPRS/EDGE capabilities\r\nSlider phone with 2.4-inch screen and accelerometer for auto-rotate; 8-megapixel autofocus camera with xenon flash; GPS for navigation and image geotagging\r\nWi-Fi networking; Bluetooth stereo music streaming; Memory Stick Micro (M2) expansion; access to personal email and instant messaging', 1, '2015-11-21 15:11:25', 1, 1),
(41, 18, 30, 'Nokia N82 Unlocked Phone', 109.99, 'NOKIA', 'Unlocked cell phones are compatible with GSM carriers such as AT&T and T-Mobile, but are not compatible with CDMA carriers such as Verizon and Sprint.\r\nQuad-band GSM cell phone compatible with 850/900/1800/1900 frequencies and International 3G compatibility via 2100 UMTS plus GPRS/EDGE capabilities\r\n5-megapixel digital camera with Carl Zeiss Optics, autofocus, digital zoom; DVD-quality video capture (640 x 480 pixels at 30 fps)\r\nWi-Fi connectivity (802.11b/g); Bluetooth stereo music; MicroSD expansion; digital audio player; FM radio; access to email\r\nUp to 4.3 hours of talk time, up to 9.5 days) of standby time', 1, '2015-11-21 15:16:47', 1, 1),
(42, 20, 26, 'Pro Sport Armband', 24.99, 'AARATEK', 'END YOUR EXERCISE BOREDOM NOW!!! Listen to your favorite music, audio book or use a fitness app as you workout wearing your cool, stylish AARATEK SPORT ARMBAND. Can be used for many different sports, gym and general activities - not just for running!\r\nMade from ADVANCED FORMULA PREMIUM NEOPRENE rather than Lycra, it is sweat resistant and strong yet incredibly flexible and expandable - an iPhone will fit in it with a slim case still on! No need for additional bulky pockets either as you can even keep cash, a credit card, ID card or swipe card behind your device too!\r\nFULLY ADJUSTABLE for a custom fit with two fastenings for small and large upper arms measuring approx. 9-1/4 ~ 16-1/2 inches (23.5cm ~ 42cm) in circumference [measurements taken with a device in the armband - other brands simply list the armband''s strap size rather than fitting size]. SECURELY FASTENED using reinforced stitched velcro and the AARATEK SUPERIOR GRIP SYSTEM.', 1, '2015-11-21 15:24:52', 1, 1),
(43, 20, 15, 'Armband for iPhone 6 and iPhone 6S', 12.99, 'TUNE BELT', 'Fits iPhone 6 / iPhone 6S with an OtterBox Commuter, LifeProof fre or LifeProof nuud case.\r\nFits Samsung Galaxy S6/S5 with a slim case such as Spigen Tough Armor.\r\nFits Samsung Galaxy S4/S3 and S4 Active with an OtterBox Defender/Commuter Case, Note 3 / 2 without a case, and more (see Product Description below.)\r\nSuper comfortable neoprene armband protects and stabilizes device without slipping or constricting. Controls / stores earphone cord; Full touch screen control; Excellent quality; Washable.', 1, '2015-11-21 15:26:29', 1, 1),
(44, 21, 19, 'Samsung Original Standard Battery 2100mA ', 7.99, 'SAMSUNG', 'OEM Part Numbers - EB-L1G6LLA, EB-L1G6LLU, EB-L1G6LLZ\r\nSamsung original battery for Galaxy S3 in Bulk Packaging\r\nThis battery is equipped with an NFC antenna, allowing your handset to communicate with other devices and accessories equipped with NFC technology.\r\n2100mAh battery allows you to store power necessary to keep your device charged throughout the day', 1, '2015-11-21 15:32:52', 1, 1),
(45, 21, 19, 'LG LGIP-520B', 2.99, 'LG', 'LG SBPL0086903 Standard Li Ion Battery For 8350 1000mAh', 1, '2015-11-21 15:33:51', 1, 1),
(46, 22, 36, 'Nexus 5X Case, AceAbove Google Nexus 5X slim case', 14.99, 'ACEABOVE', 'Nexus 5X Case Compatible with Google Nexus 5X (2015)\r\nFull degree of protection: Covers all 4 corners and includes raised edges to keep the screen from scratching or touching the ground-even when the PU Leather cover isn''t in place\r\niPhone 6S Plus case for you: Turn as many heads with the Layered Dandy case as you will with your device. Refined, functional, and practical, this folio cover fully complements the iPhone 6S Plus and lets the phone''s natural beauty shine unhindered\r\nFlexible wrap-around design for an easy, user-friendly installation\r\nProvides excellent shock absorption without stretching, tearing, or fading over time', 1, '2015-11-21 15:35:16', 1, 1),
(47, 22, 20, 'Galaxy S5 case, Caseology® [Wavelength Series] [Navy Blue]', 16.99, 'CASEOLOGY', 'Compatible with Samsung Galaxy S5 - Verizon, AT&T, T-Mobile, Sprint, International models.\r\nPrecise cutouts for improved access to all ports, buttons, cameras, speakers, and mics.\r\nMaterial: TPU (Thermoplastic Polyurethane) - Highly resistant to oil, dirt, and scratches with finished look of a hard case but shock absorption of a soft case\r\nDesigned and produced by one of the leading manufacturers in South Korea', 1, '2015-11-21 15:38:32', 1, 1),
(48, 23, 30, 'Sony SWR50 SmartWatch 3 Transflective Display Black Watch', 159.99, 'SONY', 'Black Classic Band, Water Protected, IP68 rated : "up to 2 days normal use"\r\nSensors: Ambient light sensors, Accelerometer, Compass, Gyro, GPS\r\nNotifications, Voice Commands, Lifelong, Impressive stand-alone functions\r\nPowered By Android Wear - Useful information when you need it, Apps for everything\r\nTell the Smartwatch 3 SWR50 what you want and it will do it, Search, Command, Find\r\nWaterproof. IP58 Rated.', 1, '2015-11-21 15:40:19', 1, 1),
(49, 23, 30, 'LG Electronics G Watch', 135.99, 'LG', 'Compatible with most devices with an Android 4.3 or later operating system\r\nVoice activated\r\nPowered by Android Wear\r\nMobile notifications\r\n1.2GHz Qualcomm processor', 1, '2015-11-21 15:41:20', 1, 1),
(50, 23, 25, 'Samsung Gear 2 Neo Smartwatch', 199.99, 'SAMSUNG', 'Smart Notification: Samsung Gear 2 Neo allows you to make and receive calls and read more on a large sAMOLED display making communication smooth and seamless.\r\nInstant Notification: Samsung Gear 2 enables you to receive instant notifications from your phone and apps plus a variety of 3rd party apps which you can view clearly on a sAMOLED screen.\r\nPersonalized Fitness Motivator: Samsung Gear 2, with its built-in Heart Rate Sensor, S Health features, and pedometer, track your daily pattern of exercise to give you customized real time coaching to help you achieve your goals.', 1, '2015-11-21 15:42:17', 1, 1);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
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
-- Sťahujem dáta pre tabuľku `users`
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
