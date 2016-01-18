-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2016 at 11:44 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryid`, `name`, `parent`) VALUES
(1, 'ELECTRONICS', NULL),
(2, 'TV', 1),
(3, 'AUDIO', 1),
(4, 'PC', 1),
(5, 'TABLETS', 1),
(6, 'MOBILE PHONES', 1),
(7, 'ACCESSORIES', 1),
(8, 'HOME AUDIO', 3),
(9, 'BLU-RAY PLAYERS', 3),
(10, 'HEADPHONES', 3),
(11, 'IN-EAR', 10),
(12, 'ON-EAR', 10),
(13, 'NOTEBOOK', 4),
(14, 'DESKTOP', 4),
(15, 'MONITORS', 4),
(16, 'ANDROID', 5),
(17, 'IOS', 5),
(18, 'CELL PHONES', 6),
(19, 'SMARTPHONES', 6),
(20, 'BATTERIES', 6),
(21, 'ARMBAND', 7),
(22, 'CASES', 7),
(23, 'SMART WATCHES', 7);

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
  `name` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `postcode` varchar(5) COLLATE utf8_slovak_ci NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shipped` tinyint(4) NOT NULL,
  `orderprice` float NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `userid`, `name`, `surname`, `email`, `phone`, `address`, `city`, `postcode`, `datecreated`, `shipped`, `orderprice`) VALUES
(1, 0, 'Peter', 'Varholak', 'mymail@gmail.com', '0948120326', 'Alejova 5', 'Kosice', '04020', '2016-01-06 17:57:47', 0, 0),
(2, 0, 'Peter', 'Varholak', 'mymail@gmail.com', '0948120326', 'Alejova 5', 'Kosice', '04020', '2016-01-06 17:59:45', 0, 0),
(3, 0, 'Peter', 'Varholak', 'mymail@gmail.com', '0948120326', 'Alejova 5', 'Kosice', '04020', '2016-01-06 18:02:42', 0, 0),
(4, 0, 'Peter', 'Varholak', 'mymail@gmail.com', '0948120326', 'Alejova 5', 'Kosice', '04020', '2016-01-06 18:04:07', 0, 0),
(5, 7, 'Peter', 'Varholak', 'mymail@gmail.com', '0948120326', 'Alejova 5', 'Kosice', '04020', '2016-01-06 18:05:40', 0, 0),
(6, 0, 'Peter', 'Varholak', 'mymail@gmail.com', '0948120326', 'Alejova 5', 'Kosice', '04020', '2016-01-06 18:06:12', 0, 0),
(7, 7, 'Peter', 'Varholak', 'mymail@gmail.com', '0948120326', 'Alejova 5', 'Kosice', '04020', '2016-01-06 18:07:00', 0, 0),
(8, 7, 'Peter', 'Varholak', 'mymail@gmail.com', '0948120326', 'Alejova 5', 'Kosice', '04020', '2016-01-06 18:07:34', 0, 0),
(9, 0, 'Peter', 'Varholak', 'mymail@gmail.com', '0948120326', 'Alejova 5', 'Kosice', '04023', '2016-01-06 18:34:14', 0, 0),
(10, 1, 'admin', 'kjdfbn', 'admin@admin.com', '09499999', 'jdhv 5', 'city', '04022', '2016-01-15 00:40:30', 0, 0),
(11, 0, 'Name', 'nana', 'mail@mail.com', '0955555', 'adres 9', 'kosice', '04055', '2016-01-15 00:42:53', 0, 0);

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
  `brandid` int(11) NOT NULL,
  `description` mediumtext COLLATE utf8_slovak_ci NOT NULL,
  `viewamount` int(11) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `numofratings` int(11) NOT NULL,
  `sumofratings` int(11) NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=56 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `categoryid`, `amount`, `name`, `price`, `brandid`, `description`, `viewamount`, `datecreated`, `numofratings`, `sumofratings`) VALUES
(1, 9, 25, 'Sony BDP-S3200', 149.99, 1, 'The new Sony BDP-S3200 Blu-ray Disc Player come up with Super Wi-Fi features with completely incased optical drive for enhanced dust resistance. It supports Full HD 1080p resolution and DVD upscaling to near HD quality. You can also use your mobile device as a second display or as a remote control for the player. All you need is the Sony TV SideView app. You can even search for movie info using Gracenote. Our Sony BDP-S3200 hardware modified region A, B & C Blu-ray player is also guaranteed work with any future firmware updates from Sony. It also features a perfect real time PAL to NTSC conversion which enables you to watch PAL DVDs on US TVs without any external video converter.', 1, '2015-11-20 23:13:39', 1, 1),
(2, 9, 45, 'Panasonic DMP-BDT270', 329.99, 2, 'The DMP-BDT270 Smart Network 4K Upscaling Wi-Fi and 3D Blu-ray Disc Player from Panasonic allows you to watch movies at near 4K resolution and can stream multimedia content. This Blu-ray player supports full HD 1080p 2D and 3D Blu-ray disc playback from its HDMI output, and can also upconvert standard definition DVDs and Blu-ray movies to near 4K quality when used with a 4K television. Additionally, you can convert 2D content into 3D when used with optional 3D glasses and a 3D TV. Wi-Fi and Ethernet are built-in for browsing the Internet, and accessing premium streaming content such as Netflix, Hulu Plus and YouTube.', 1, '2015-11-20 23:25:04', 2, 5),
(3, 11, 35, 'Sony MDREX10LP/BLK In-Ear Headphones', 14.99, 1, '9mm driver unit, neodymium magnet, hybrid silicone earbuds (S/M/L), 1.2m Y-Type cord\r\nWide range of colours to choose from\r\nPowerful bass and high resolution treble\r\nSecure fit hybrid silicone earbuds', 1, '2015-11-20 23:29:44', 1, 1),
(4, 11, 10, 'Bose SoundTrue In-Ear Headphones, Cranberry', 79.99, 3, 'Bose SoundTrue In-Ear Headphones have the audio quality and sophisticated style your busy life demands. They deliver deep, clear sound for the music you love. The StayHear tips keep the headphones comfortably in place for hours of listening. They are engineered and tested for lasting quality and durability, and include a matching carrying case. And you''ll look good wearing them. SoundTrue In-Ear Headphones come in three colors to fit your style: Black, White and Cranberry. What''s in the box: SoundTrue In-Ear Headphones, 3-pairs StayHear tips (S, M, L), Carry case and Clothing clip.', 1, '2015-11-20 23:31:21', 2, 5),
(5, 11, 32, 'Sennheiser CX 300 II Precision Enhanced Bass Earbuds (Black)', 32.99, 4, 'Offering a powerful, bass-driven stereo sound with greater clarity and improved dynamics over standard earbuds are the Sennheiser CX 300-II in-ear headphones. The various sizes of ear adapters (S/M/L sizes) provided in the package allow for a customized fit as well as exceptional noise blocking capability. A convenient carrying pouch is also included for easy storage.', 1, '2015-11-20 23:33:00', 1, 1),
(6, 12, 0, 'Beats Solo2 Wireless On-Ear Headphones - Black', 199.99, 5, 'Beats Solo2 Wireless. Designed for sound, tuned for emotion, now wireless.', 1, '2015-11-20 23:34:36', 1, 1),
(7, 12, 75, 'Skullcandy Uprock Headphones with Mic', 29.99, 6, 'The people at Skullcandy firmly believe that everyone has the right to have access to face-melting sound, which is why they made the Uprock Headphones with Mic with the quality everyone deserves, at a price anyone can afford. Supreme Sound drivers pump attacking bass and precision highs straight to your dome, while the cushy ear pillows keep you comfortable for hours of listening pleasure.', 1, '2015-11-20 23:39:22', 1, 1),
(8, 12, 51, 'Sony MDR-ZX330BT/B Bluetooth Wireless On-Ear Headphones', 59.99, 1, 'So easy-lightweight, compact listening with added wireless freedom. Enjoy your favorite beats with cord-free convenience via Bluetooth with Near Field Communications (NFC) technology. Envelope yourself in full, balanced sound and tight beats with 30mm drivers and easily swivel and stow away when done.', 1, '2015-11-20 23:41:09', 1, 1),
(9, 8, 12, 'Acoustic Audio AA5170 Home Theater 5.1', 89.99, 7, 'This 6 piece, 700 watt system includes one powered subwoofer and five satellite speakers as well as all the necessary cables and instructions needed for simple integration into any multimedia configuration. This compact, yet powerful speaker package makes for an excellent addition to any home theater system, personal computer or laptop, gaming system, digital media player, "i" device or any other audio/video device that that can be connected via Bluetooth, RCA or 3.5mm auxiliary interface. The included powered subwoofer is housed in a digitally tuned, bass enhancing enclosure made of durable MDF for increased bass response while the full range satellite speakers feature magnetic shielding for worry-free use near televisions and computer monitors.', 1, '2015-11-20 23:42:47', 1, 1),
(10, 8, 3, 'Orb Audio Mini 5.1 Home Theater Speaker System', 599.99, 8, 'Exclusive to Amazon - a custom 5.1 home theater surround sound system that will blow your mind without blowing your budget. Great for both movies and music, this system includes five state of the art Mod1X satellite speakers and the ultra compact subMINI powered subwoofer. You also get 100 feet of USA made speaker wire and a subwoofer cable - everything you need to connect the speakers to a receiver quickly and easily. Orb Audio is known for systems designed to produce big sound from small, attractive speakers and this system is sure to please. Don''t miss out on this exceptional limited time offer! It''s a great chance to bring high quality sound to your room without filling it up with speakers made from plastic or fake wood. Audiophile sound, outstanding looks and a fantastic sale price. This system has it all, so try it today!', 1, '2015-11-20 23:44:17', 2, 5),
(11, 13, 15, 'Dell Inspiron i7559-763BLK 15.6" ', 729.99, 9, 'Intel i5-6300HQ 2.3 GHz Quad-Core (6M Cache, Turbo up to 3.2 GHz)\r\nNVIDIA GeForce GTX 960M 4GB GDDR5\r\n8 GB DDR3L / 256 GB Solid-State Drive\r\n15.6-Inch FHD IPS, Wide-Angle, Anti Glare Screen', 1, '2015-11-20 23:48:11', 1, 1),
(12, 13, 22, 'ASUS Zenbook UX305LA 13.3-Inch Laptop (Intel Core i5, 8GB, 256 GB SSD, Titanium Gold) with Windows 10', 709.99, 10, '13.3-Inch Full-HD IPS Anti-Glare Matte Display with an Ultra-wide 170° Viewing Angle.\r\nPowerful 5th-generation Intel Core i5-5200U 2.2GHz (Turbo up to 2.7GHz) Broadwell.\r\n8 GB RAM/ 256 GB Solid State Drive; 10-Hours Battery Life. 1.2 MP High Definition Webcam.\r\nDesigned to be ultra-slim with an all-aluminum body. The unit weighs only 2.86 lbs, is less than .6-inch thin.', 1, '2015-11-20 23:49:49', 2, 2),
(13, 13, 42, 'ASUS Chromebook Flip 10.1-Inch Convertible 2 in 1 Touchscreen (Rockchip, 4 GB, 16GB SSD, Silver)', 249.99, 10, 'Rockchip 1.8 GHz Processor\r\n4 GB DDR3 RAM\r\nCan open/edit MS Office files using free embedded QuickOffice editor or Google Docs, and can download Microsoft Office Online (an online version of Microsoft Office) for free. Cannot install standard MS Office software.\r\nStorage : 16GB Solid State Storage; No CD or DVD drive\r\n10.1 inches 1280*800 pixels LED-lit Screen\r\nChrome Operating System; Silver Chassis', 1, '2015-11-20 23:51:35', 1, 1),
(14, 13, 12, 'Apple MacBook Air MJVE2LL/A 13-inch Laptop (1.6 GHz Intel Core i5,4GB RAM,128 GB SSD Hard Drive, Mac OS X)', 929.99, 11, '1.6 GHz Intel Core i5 (Broadwell) 4GB of 1600 MHz LPDDR3 RAM\r\n128GB PCIe-Based Flash Storage Integrated Intel HD Graphics 6000\r\n13.3" LED-Backlit Glossy Display 1440 x 900 Native Resolution\r\n802.11ac Wi-Fi, Bluetooth 4.0 USB 3.0, Thunderbolt 2\r\n720p FaceTime HD Camera, SDXC Card Slot Mac OS X 10.10 Yosemite', 1, '2015-11-20 23:52:30', 1, 1),
(15, 13, 8, 'Lenovo Flex 3 14-Inch Touchscreen Laptop (Core i7, 8 GB RAM, 1 TB HDD, Windows 10) 80R3000UUS', 729.99, 12, 'Intel Core i7-6500U 2.5 GHz Processor\r\n8 GB DDR3L SDRAM\r\n1 TB 5400 rpm Hard Drive\r\n14.0-Inch Screen, Integrated Graphics\r\nWindows 10, 5-hour battery life', 1, '2015-11-20 23:54:22', 1, 1),
(16, 14, 15, 'CyberpowerPC Gamer Ultra GUA3100A Gaming Desktop', 499.99, 13, 'System: AMD FX-4300 3.80GHZ Quad-Core | AMD 760G Chipset | 8GB DDR3 | 1TB HDD | Genuine Windows 10 Home 64-bit\r\nGraphics: AMD Radeon R7 240 2GB Video Card | 24X DVD±RW Dual-Layer Drive | Audio: 7.1 Channel | Gigabit LAN | Keyboard and Mouse\r\nConnectivity: 8x USB 2.0 | 1x RJ-45 Network Ethernet 10/100/1000 | Audio | 1x HDMI | 1x DVI | 1x VGA\r\nWarranty: 1 Year Parts & Labor Warranty | Free Lifetime Tech Support', 1, '2015-11-21 13:57:53', 1, 1),
(17, 14, 5, 'HP Pavilion Slimline Desktop PC', 249.99, 14, 'AMD E1-2500 Accelerated Processor with AMD Radeon HD 8240 graphics\r\n4GB PC3-10600 DDR3 SDRAM\r\n500GB Serial ATA hard drive (7200 rpm)\r\nMultiformat DVD±RW/CD-RW drive with double-layer support\r\nWindows 8.1 64-bit / 6 high-speed USB 2.0 ports / 802.11b/g/n WLAN', 1, '2015-11-21 14:00:17', 1, 1),
(18, 14, 6, 'CyberpowerPC Borg-Q (Green) TGM4213B Gaming PC', 549.99, 13, 'System: AMD FX-4130 3.80GHz Quad-Core | 760G | 8GB DDR3 | 1TB HDD | Genuine Windows 8.1 64-Bit - Eligible for Windows 10 Free Upgrade After Purchase*\r\nGraphics: NVIDIA GeForce GT610 1GB Video Card | 24X DVD±RW Dual-Layer Drive | Audio: 7.1 Channel | Gigabit LAN | Keyboard and Mouse\r\nExpansion Bays/Slots Total(Free): 3(2) Ext. 5.25" | 4(3) Int. 3.5/2.5" | 1(1) PCI | 1(1) PCI-E x1 | 1(0) PCI-E x16 | 2(1) DIMM 240P\r\nConnectivity: 4x USB 3.0 | 2x USB 2.0 | 1x RJ-45 Network Ethernet 10/100/1000 | Audio | 1x HDMI | 1x DVI | 1x VGA\r\nChassis: Gaming Mid-Tower w/450 Watt Power Supply | 1 Year Parts & Labor Warranty | Free Lifetime Tech Support | *Upgrade Must be Completed by 7/26/16', 1, '2015-11-21 14:03:14', 1, 1),
(19, 14, 50, 'Lenovo ThinkServer TS140 i7-4770 16GB 3TB HDD Tower Server Desktop Computer', 699.99, 12, 'Processor: Intel Core i7-4770 Quad Core Processor (8MB Cache, 3.4GHz - 3.9GHz) 84W\r\nHard Drive: 3TB 7200rpm Hard Disk Drive | PLEASE NOTE: Hard Drive Caddies are only included with Upgraded Hard Drives. Additional Caddies are only placeholders.\r\nRAM: 16GB DDR3 1600MHz | Optical Drive: DVD-ROM\r\n', 1, '2015-11-21 14:11:12', 1, 1),
(20, 16, 15, 'Samsung 32GB Galaxy Note 10.1" Android 4G LTE Wi-Fi Dual Camera Unlocked Tablet', 359.99, 15, 'Operating System Android 4.4, kitkat\r\n32GB internal memory\r\nWi-Fi 802.11 a/b/g/n/ac, (2.4GHz + 5.0 GHz), USB 2.0, Bluetooth 4.0\r\n10.1" WQXGA TFT 2560 x 1600 pixel display\r\n4G LTE - T-Mobile Unlocked', 1, '2015-11-21 14:13:16', 1, 1),
(21, 16, 23, 'ASUS Transformer Pad TF103CX-A1-BK 10.1-Inch 16 GB Tablet (Black)', 269.99, 10, '1.33 GHz quad-core Intel Atom processor, Android 4.4 KitKat\r\n16 GB Storage expandable by 64 GB with micro SD, 1 GB RAM\r\n10-inch HD IPS Display. Keyboard dock NOT included\r\nDual band 802.11 a/b/g/n Wi-Fi for faster web browsing\r\nOver $270 worth of content and services included', 1, '2015-11-21 14:15:35', 1, 1),
(22, 16, 15, 'Samsung Galaxy Note Pro 12.2 (32GB, Black)', 524.99, 15, 'Android 4.4 Kit Kat OS, 1.9GHz Samsung Exynos 5 Octa processor\r\n32 GB Flash Memory, 3 GB RAM\r\n12.2-inch 2560x1600 WQXGA Display\r\nFeatures Hancom Office, Multi Window (up to 4), Magazine UX, Remote PC, Sidesync', 1, '2015-11-21 14:17:18', 1, 1),
(23, 16, 32, 'Dell Venue 8 7000 Android Tablet (16GB)', 309.99, 9, '8.4" OLED infinity display with 2560 x 1600 resolution\r\nAndroid 4.4 KitKat operating system\r\nIntel Atom processor Z3580 with up to 2.3GHz speed for optimal browsing.', 1, '2015-11-21 14:18:46', 1, 1),
(24, 17, 86, 'Apple iPad Pro (32GB, Wi-Fi, Space Gray) - 12.9" Display', 889.99, 11, '12.9" Retina Display, 2732 x 2048 Resolution\r\nApple iOS 9, Dual-Core A9X Chip with Quad-Core Graphics\r\n8 MP iSight Camera, Four-Speaker Audio\r\n32GB Capacity, Wi-Fi (802.11a/b/g/n/ac) + MIMO + Bluetooth 4.2\r\nUp to 10 Hours of Battery Life, 1.57 lbs\r\niPad Pro supports new Apple Smart Keyboard and Apple Pencil', 1, '2015-11-21 14:21:07', 1, 1),
(25, 17, 56, 'Apple MGNV2LL/A iPad mini 3, 7.9-Inch Retina Display 16GB, Wi-Fi, Silver', 329.99, 11, 'Apple iOS 8, 7.9-Inch Retina Display; 2048x1536 Resolution\r\nA7 Chip with 64-bit Architecture; M7 Motion Coprocessor\r\nWi-Fi (802.11a/b/g/n); 16 GB Capacity\r\n5MP iSight Camera; FaceTime HD Camera\r\nUp to 10 Hours of Battery Life', 1, '2015-11-21 14:22:12', 1, 1),
(26, 15, 53, 'LG Electronics UM57 25UM57 25-Inch Screen LED-lit Monitor', 179.99, 16, 'Resolution: 2560 x 1080 Resolution (WFHD)\r\nBrightness: 250 cd/m2 Brightness\r\nIncludes IPS Panel, Dual Controller, and Screen Split', 1, '2015-11-21 14:24:10', 1, 1),
(27, 15, 64, 'HP Pavilion 21.5-Inch IPS LED HDMI VGA Monitor', 119.99, 14, 'Amazing angles: Share consistent high-color fidelity with In-Plane Switching (IPS) technology across a 21.5-inch diagonal screen. A stunning vantage point for everyone, from almost any angle.\r\nDistinctively modern and accessible: The contemporary thin profile is enhanced by black and silver colors. The open WEDGE stand design provides convenient access to VGA and HDMI port connections.\r\nCaptivating imagery: Color and clarity radiate from the screen with Full HD 1920 x 1080 resolution, incredible 8,000,000:1 dynamic contrast ratio, 16:9 aspect ratio, and quick 7 mms response time.', 1, '2015-11-21 14:25:54', 1, 1),
(28, 15, 48, 'BenQ GL2760H 27-inch HDMI LED-lit Monitor', 189.99, 17, 'The GL2760H has passed Windows 8 certification and are fully compatible with both color systems. Plug in the GL2760H to your computer, and Windows 8 will recognize it instantly, making setup and connection effortless\r\nLED backlighting offers significant advantages for not only performance metrics such as higher dynamic contrast, no light leakage and flicker-free, but also environmental factors, like a manufacturing process and disposal that produces fewer pollutants\r\nD-sub / DVI/ HDMI/ headphone jack', 1, '2015-11-21 14:29:47', 1, 1),
(29, 19, 55, 'Samsung Galaxy S5', 449.99, 15, 'With a 5.1" 1080p screen, 16 MP camera and 2 GB of RAM, the Galaxy S5 might not be the utmost specs beast that the Android world has to offer, but it comes with plenty of new features, both in comparison with its predecessor, the S4, and when measured up to the other flagships. The heart beat sensor, for instance, is unique for the Galaxy S5, while something like the Finger Scanner can also be observed on the iPhone 5s, but in a rather different implementation. Samsung also introduced two new launch colors, including Copper Gold, and a brand new perforated design for the rear cover. The addition of Snapdragon 801 chipset brings on LTE-A download speeds, and 4K video recording, to an already superb handset.', 1, '2015-11-21 14:34:02', 1, 1),
(30, 19, 59, 'LG G3', 419.99, 16, 'The new LG G3 flagship sports 5.5-inch, 1440 x 2560 (QHD) pixel resolution screen, which provides the super-crisp, 538 pixels per inch. Dimensions are pretty compact for the screen size, resulting in excellent 76.4% screen to body size ratio. The Android 4.4 KitKat-based handset is powered by a quad-core Snapdragon 801 and 3GB of LPDDR3 RAM. It features 32GB of internal storage and a microSD slot. The main 13-megapixel rear shooter comes with the company''s improved Optical Image Stabilization+ and has a laser auto focus assist beam, which delivers fast focus even in low light scenarios.', 1, '2015-11-21 14:37:10', 1, 1),
(31, 19, 65, 'Apple iPhone 6s 32GB', 799.99, 11, 'Not much has changed on the surface since the iPhone 6 introduced an updated look with a laminated screen and comfortably round corners. This time around, though, Apple is beating its chest for incorporating Series 7000 aluminum instead of the anodized aluminum it''s been traditionally using. The screen on the iPhone 6s is virtually unchanged from what the iPhone 6 brought to the table, but the smartphone has gained 3D Touch control that lets users deliberately choose between a light tap, a press, and a "deeper" press, triggering a range of specific controls. Other notable additions include the Apple A9 chipset, and a 12MP rear camera with 4K resolution video recording.', 1, '2015-11-21 14:49:14', 1, 1),
(32, 19, 98, 'Google Nexus 5X', 599.99, 18, 'Also made by LG, the Nexus 5X is an evolution on the original design with an upgraded hardware, and a launch pad for Google''s Android 6.0 Marshmallow. Coming with a 5.2" display, finger scanner and it also puts a unique focus on the camera, with a 12.3 MP shooter that offers huge 1.55 micron pixels to excel in low-light photography.\r\n', 1, '2015-11-21 14:52:47', 1, 1),
(33, 19, 75, 'Microsoft Lumia 950 XL', 549.99, 19, 'The Microsoft Lumia 950 XL is a large and powerful smartphone powered by the Windows 10 Phone OS. It stands out with its 5.7-inch, OLED display packing 1440 by 2560 pixels. Inside it ticks Qualcomm''s octa-core Snapdragon 810 SoC which has been liquid-cooled to facilitate heat dissipation. And the camera is one worth being excited about – a 20MP sensor with OIS and a tripple LED flash is found at the back. The latter uses three LEDs to produce more natural colors. Further specs include 32GB of on-board storage, a microSD card slot, a 3440mAh battery that can last through 19h of talk time. The USB Type-C port at the bottom is a welcome bonus.\r\n', 1, '2015-11-21 14:54:30', 1, 1),
(34, 19, 68, 'Samsung Galaxy Note 5 32GB', 749.99, 15, 'The Samsung Galaxy Note 5 brings a huge redesign to the Note series: it adopts the glass and metal styling of the Galaxy S6, but in a larger, 5.7" form factor, and it features the signature S Pen stylus. The Note 5 sports the 14nm Exynos 7420 octa-core system chip with a whopping 4GB of LPDDR4 RAM. In terms of photography, it sports a 16-megapixel rear cam with OIS, while up front there is a 5-megapixel selfie shooter, and both cameras sport wide, f/1.9 lenses. The battery on the Note 5 is smaller than on the Note 4: it''s a 3000mAh juicer that is not user removable.', 1, '2015-11-21 14:57:08', 1, 1),
(35, 19, 102, 'Motorola Moto X Style', 519.99, 20, 'The Motorola Moto X Style isn''t exactly small, but it isn''t humongous either. As a matter of fact, it boasts one of the highest screen-to-size ratios in the industry – 76% of its front is occupied by the 5.7-inch screen packing a 1440 by 2560 pixels of resolution. Inside ticks a Qualcomm Snapdragon 808 SoC with a 1.8GHz maximum clock speed. Yup, turns out that the rumors of the phone packing an SD 810 were incorrect. But while not the fastest SoC in Qualcomm''s stable, the Snapdragon 808 is still powerful enough to deliver a smooth experience, especially when it is accompanied by 3GB of RAM.Turn the Moto X Style around and you''ll find a 21MP camera with F2.0, phase-detection autofocus, and dual-tone LED flash.On the front of the Moto X Style we see a 5MP front-facing camera backed up by... an LED flash.', 1, '2015-11-21 14:58:35', 1, 1),
(36, 19, 120, 'Google Nexus 6P', 689.99, 18, 'For the first time in Google''s Nexus line history, Huawei managed to join the exclusive club of poster child Android makers. Being the more premium (and more expensive) of the two 2015 Nexus phones, the 6P comes clad in a metal chassis, with 5.7" WQHD display, stereo speakers at the front, and a round finger scanner on the back. The Nexus phones usually don''t come with a premium build, great camera and large battery, but the new Nexus 6P shatters all stereotypes here.', 1, '2015-11-21 15:01:22', 1, 1),
(37, 19, 23, 'OnePlus X', 559.99, 21, 'The external appearance is undoubtedly one of the main selling points for the new OnePlus X. The phone will be offered in two versions - Onyx and a limited Ceramic edition. The phone has a 5-inch display with 1080p resolution and 441ppi. The real eyebrow-raiser with the OnePlus X is its quad-core Snapdragon 801 chipset. Not that this silicon is not powerful enough to run the new Oxygen interface on top of Android 5.1.1 Lollipop, but it is somewhat aging in the sense that it is not a 64-bit endeavor. Other than that, OnePlus equipped the X with a generous 3 GB RAM amount, and 16 GB of storage, expandable via a microSD card, the slot for which is housed in the dual SIM card tray, so it''s either two nano SIMs, or one SIM and one memory card, bummer. The OnePlus X comes with a 13 MP rear camera, and a hearty 8 MP selfie-taker.', 1, '2015-11-21 15:03:14', 1, 1),
(38, 19, 22, 'Xiaomi Mi 4c\r\n', 559.99, 22, 'The Xiaomi Mi 4c features a 5-inch, 1080 x 1920 resolution screen. That works out to a pixel density of 441ppi. Under the hood is the Snapdragon 808 SoC carrying a hexa-core 1.8GHz CPU, and the Adreno 418 GPU. A 13MP camera is on back along with a 5MP front-facing shooter. Keeping the lights on is a 3080mAh juicer, and Android 5.1 is pre-installed with MIUI 7 running on top. The Mi 4c not only comes with a Type-C USB port, it also comes with an infrared port to be used for security, not for connectivity.', 1, '2015-11-21 15:05:12', 1, 1),
(39, 18, 12, 'LG KF750', 79.99, 16, 'GSM 900 / 1800 / 1900\r\nSlimmest five mega pixel camera on 11.8 mm profile\r\nMusic, photos, M-Toy, document, FM radio - all five functions are at your fingertips with the Touch Media.\r\nAuto Luminance Control automatically adjusts screen brightness according to ambient brightness.\r\nSecret''s display technology offers easy screen size adjustment and horizontal or vertical rotation of the screen depending on hand movement.\r\nThis cell phone may not include a US warranty as some manufacturers do not honor warranties for international version phones. Please contact the seller for specific warranty information.', 1, '2015-11-21 15:09:44', 1, 1),
(40, 18, 29, 'Sony Ericsson C905a', 129.99, 23, '3G-enabled Cybershot camera phone with 8.1-megapixel lens, flash, 16x digital zoom, image stabilizer, sharing with blogs and Facebook\r\nBluetooth stereo music; digital audio player; M2 memory expansion; access to personal email and instant messaging\r\nUp to 3.5 hours of talk time, up to 350 hours (14.6 days) of standby time\r\nUnlocked cell phones are compatible with GSM carriers such as AT&T and T-Mobile, but are not compatible with CDMA carriers such as Verizon and Sprint.\r\nQuad-band GSM cell phone compatible with 850/900/1800/1900 frequencies and International 3G compatibility via 2100 UMTS/HSDPA plus GPRS/EDGE capabilities\r\nSlider phone with 2.4-inch screen and accelerometer for auto-rotate; 8-megapixel autofocus camera with xenon flash; GPS for navigation and image geotagging\r\nWi-Fi networking; Bluetooth stereo music streaming; Memory Stick Micro (M2) expansion; access to personal email and instant messaging', 1, '2015-11-21 15:11:25', 1, 1),
(41, 18, 30, 'Nokia N82 Unlocked Phone', 109.99, 24, 'Unlocked cell phones are compatible with GSM carriers such as AT&T and T-Mobile, but are not compatible with CDMA carriers such as Verizon and Sprint.\r\nQuad-band GSM cell phone compatible with 850/900/1800/1900 frequencies and International 3G compatibility via 2100 UMTS plus GPRS/EDGE capabilities\r\n5-megapixel digital camera with Carl Zeiss Optics, autofocus, digital zoom; DVD-quality video capture (640 x 480 pixels at 30 fps)\r\nWi-Fi connectivity (802.11b/g); Bluetooth stereo music; MicroSD expansion; digital audio player; FM radio; access to email\r\nUp to 4.3 hours of talk time, up to 9.5 days) of standby time', 1, '2015-11-21 15:16:47', 1, 1),
(42, 21, 26, 'Pro Sport Armband', 24.99, 25, 'END YOUR EXERCISE BOREDOM NOW!!! Listen to your favorite music, audio book or use a fitness app as you workout wearing your cool, stylish AARATEK SPORT ARMBAND. Can be used for many different sports, gym and general activities - not just for running!\r\nMade from ADVANCED FORMULA PREMIUM NEOPRENE rather than Lycra, it is sweat resistant and strong yet incredibly flexible and expandable - an iPhone will fit in it with a slim case still on! No need for additional bulky pockets either as you can even keep cash, a credit card, ID card or swipe card behind your device too!\r\nFULLY ADJUSTABLE for a custom fit with two fastenings for small and large upper arms measuring approx. 9-1/4 ~ 16-1/2 inches (23.5cm ~ 42cm) in circumference [measurements taken with a device in the armband - other brands simply list the armband''s strap size rather than fitting size]. SECURELY FASTENED using reinforced stitched velcro and the AARATEK SUPERIOR GRIP SYSTEM.', 1, '2015-11-21 15:24:52', 1, 1),
(43, 21, 15, 'Armband for iPhone 6 and iPhone 6S', 12.99, 26, 'Fits iPhone 6 / iPhone 6S with an OtterBox Commuter, LifeProof fre or LifeProof nuud case.\r\nFits Samsung Galaxy S6/S5 with a slim case such as Spigen Tough Armor.\r\nFits Samsung Galaxy S4/S3 and S4 Active with an OtterBox Defender/Commuter Case, Note 3 / 2 without a case, and more (see Product Description below.)\r\nSuper comfortable neoprene armband protects and stabilizes device without slipping or constricting. Controls / stores earphone cord; Full touch screen control; Excellent quality; Washable.', 1, '2015-11-21 15:26:29', 1, 1),
(44, 20, 19, 'Samsung Original Standard Battery 2100mA ', 7.99, 15, 'OEM Part Numbers - EB-L1G6LLA, EB-L1G6LLU, EB-L1G6LLZ\r\nSamsung original battery for Galaxy S3 in Bulk Packaging\r\nThis battery is equipped with an NFC antenna, allowing your handset to communicate with other devices and accessories equipped with NFC technology.\r\n2100mAh battery allows you to store power necessary to keep your device charged throughout the day', 1, '2015-11-21 15:32:52', 1, 1),
(45, 20, 19, 'LG LGIP-520B', 2.99, 16, 'LG SBPL0086903 Standard Li Ion Battery For 8350 1000mAh', 1, '2015-11-21 15:33:51', 1, 1),
(46, 22, 36, 'Nexus 5X Case, AceAbove Google Nexus 5X slim case', 14.99, 27, 'Nexus 5X Case Compatible with Google Nexus 5X (2015)\r\nFull degree of protection: Covers all 4 corners and includes raised edges to keep the screen from scratching or touching the ground-even when the PU Leather cover isn''t in place\r\niPhone 6S Plus case for you: Turn as many heads with the Layered Dandy case as you will with your device. Refined, functional, and practical, this folio cover fully complements the iPhone 6S Plus and lets the phone''s natural beauty shine unhindered\r\nFlexible wrap-around design for an easy, user-friendly installation\r\nProvides excellent shock absorption without stretching, tearing, or fading over time', 1, '2015-11-21 15:35:16', 1, 1),
(47, 22, 20, 'Galaxy S5 case, Caseology® [Wavelength Series] [Navy Blue]', 16.99, 28, 'Compatible with Samsung Galaxy S5 - Verizon, AT&T, T-Mobile, Sprint, International models.\r\nPrecise cutouts for improved access to all ports, buttons, cameras, speakers, and mics.\r\nMaterial: TPU (Thermoplastic Polyurethane) - Highly resistant to oil, dirt, and scratches with finished look of a hard case but shock absorption of a soft case\r\nDesigned and produced by one of the leading manufacturers in South Korea', 1, '2015-11-21 15:38:32', 1, 1),
(48, 23, 30, 'Sony SWR50 SmartWatch 3 Transflective Display Black Watch', 159.99, 1, 'Black Classic Band, Water Protected, IP68 rated : "up to 2 days normal use"\r\nSensors: Ambient light sensors, Accelerometer, Compass, Gyro, GPS\r\nNotifications, Voice Commands, Lifelong, Impressive stand-alone functions\r\nPowered By Android Wear - Useful information when you need it, Apps for everything\r\nTell the Smartwatch 3 SWR50 what you want and it will do it, Search, Command, Find\r\nWaterproof. IP58 Rated.', 1, '2015-11-21 15:40:19', 1, 1),
(49, 23, 30, 'LG Electronics G Watch', 135.99, 16, 'Compatible with most devices with an Android 4.3 or later operating system\r\nVoice activated\r\nPowered by Android Wear\r\nMobile notifications\r\n1.2GHz Qualcomm processor', 1, '2015-11-21 15:41:20', 1, 1),
(50, 23, 25, 'Samsung Gear 2 Neo Smartwatch', 199.99, 15, 'Smart Notification: Samsung Gear 2 Neo allows you to make and receive calls and read more on a large sAMOLED display making communication smooth and seamless.\r\nInstant Notification: Samsung Gear 2 enables you to receive instant notifications from your phone and apps plus a variety of 3rd party apps which you can view clearly on a sAMOLED screen.\r\nPersonalized Fitness Motivator: Samsung Gear 2, with its built-in Heart Rate Sensor, S Health features, and pedometer, track your daily pattern of exercise to give you customized real time coaching to help you achieve your goals.', 1, '2015-11-21 15:42:17', 1, 1),
(51, 2, 12, 'Sony Bravia KDL-48W705C ', 555, 1, 'Televízor SMART LED, uhlopriečka 121cm, Motionflow XR 200Hz, FullHD 1920x1080, DVB-S2 / S / T2 / T / C, 4x HDMI, 2x USB, Scart, LAN, CI +, MHL, DLNA, WiFi, HbbTV, webový prehliadač, energ. trieda A++', 1, '2015-11-30 21:55:59', 0, 0),
(52, 2, 22, 'LG 58UF8307 ', 999, 16, 'Televízor SMART LED TV, uhlopriečka 147cm , 4K Ultra HD 3840x2160 , 4K Upscaler , DVB -S2/T2/C ,H.265 , 3x HDMI , 3x USB , Scart , CI+ , LAN, WiFi, Miracast , DLNA , MHL , HbbTV , webový prehliadač, webOS 2.0 , repro 2x10W , magický ovládač MR15 , energ . trieda A+', 0, '2015-11-30 21:55:59', 0, 0),
(53, 24, 4, 'Panasonic TX-65CX700E ', 2499, 2, 'Televízor 3D SMART LED, uhlopriečka 165cm, 4K Ultra HD 3840x2160, 800Hz BMR, DVB-T2 / C, H.265 (HEVC Decoder), lokálne stmievanie, Studio Master Colour, Firefox OS, 3x HDMI 2.0, 3x USB, CI +, SCART, WiFi, USB / HDD nahrávanie, my Home Screen 2.0, webový prehliadač, Netflix, Miracast, HbbTV, Quad-Core PRO, aktívne 3D, vyrobené v ČR, energ. trieda A', 0, '2015-11-30 21:58:28', 0, 0),
(54, 24, 70, 'Samsung UE55J6302 ', 1149, 15, 'Televízor prehnutá, SMART LED, uhlopriečka 138cm, PQI 800, Full HD (1920 x 1080), DVB-T2 / C, 4x HDMI, 3x USB, CI +, DLNA, LAN, Micro Dimming Pro, WiFi, Webový prehliadač, Wireless, Mirroring, Quad Core, filmový mód, repro 2x 10W, energ. trieda A +', 0, '2015-11-30 21:58:28', 0, 0),
(55, 24, 2, 'Philips 55PFK7509 ', 899, 29, 'Televízor 3D SMART LED, Ambilight 3, 800Hz PMR, Pixel Precise HD, uhlopriečka 140cm, 400cd / m2, FullHD 1920x1080p, DVB-T / C / S / S2, 4x HDMI, CI +, Scart, 2x USB, LAN, HbbTV, WiFi, Miracast, Micro Dimming Pro, Dual Core, Multiroom, 4x 3D okuliare pasívny, VESA 400x400, energ. trieda A++', 0, '2015-11-30 21:59:32', 0, 0);

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
  `city` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `postcode` varchar(5) COLLATE utf8_slovak_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `datejoined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `email`, `name`, `surname`, `password`, `address`, `city`, `postcode`, `phone`, `datejoined`, `role`) VALUES
(1, 'admin@admin.com', 'admin', '', 'admin2015', '', '', '', '', '0000-00-00 00:00:00', 2),
(2, 'david99@gmail.com', 'David', 'Kostra', 'transformers55', 'Trieda SNP 50', 'Košice', '04001', '0902645125', '0000-00-00 00:00:00', 1),
(3, 'jozo19898@gmail.com', 'Jozef', 'Samuraj', 'jablko', 'Šafárikova 11', 'Košice', '04011', '0911584778', '0000-00-00 00:00:00', 1),
(4, 'marek.sss@gmail.com', 'Marek', 'Velký', 'iamlegend', 'Bernolákova 1', 'Košice', '04001', '0941598623', '0000-00-00 00:00:00', 1),
(5, 'ottoman787@azet.sk', 'Otto', 'Markus', '55ottis', 'Kuzmányho', 'Košice', '04001', '0948555877', '0000-00-00 00:00:00', 1),
(6, 'serusky44@azet.sk', 'Martha', 'Big', 'yesyes22', 'Hlavná 55', 'Košice', '04001', '0910632200', '0000-00-00 00:00:00', 1),
(7, 'mymail@gmail.com', 'Ice', 'Blaze', '12345', '', '', '', '', '2016-01-05 13:42:24', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
