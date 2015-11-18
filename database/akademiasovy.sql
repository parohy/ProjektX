-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Po 16.Nov 2015, 08:16
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
  `name` text COLLATE utf8_slovak_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=11 ;

--
-- Sťahujem dáta pre tabuľku `categories`
--

INSERT INTO `categories` (`categoryid`, `name`, `link`, `lft`, `rgt`) VALUES
(1, 'Všetok tovar', '', 1, 20),
(2, 'Mobilné telefóny', '', 2, 7),
(3, 'Smartfóny', '', 3, 4),
(4, 'Púzdra a obaly', '', 5, 6),
(5, 'Notebooky a PC', '', 8, 13),
(6, 'Notebooky', '', 9, 10),
(7, 'Monitory', '', 11, 12),
(8, 'Tablety', '', 14, 19),
(9, 'Android ', '', 15, 16),
(10, 'iPady', '', 17, 18);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `productsid` int(11) NOT NULL,
  `totalcost` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_slovak_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_slovak_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_slovak_ci NOT NULL,
  `address` varchar(30) COLLATE utf8_slovak_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_slovak_ci NOT NULL,
  `postcode` varchar(30) COLLATE utf8_slovak_ci NOT NULL,
  `telephone` varchar(30) COLLATE utf8_slovak_ci NOT NULL,
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
  `imagepath` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `numofratings` int(11) NOT NULL,
  `sumofratings` int(11) NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=9 ;

--
-- Sťahujem dáta pre tabuľku `products`
--

INSERT INTO `products` (`productid`, `categoryid`, `amount`, `name`, `price`, `brand`, `description`, `viewamount`, `imagepath`, `numofratings`, `sumofratings`) VALUES
(1, 6, 500, 'ACER ASPIRE E15 E5-511-C4AG N2940 15.6" W8.1 (ČERVENÝ)', 319.99, 'ACER', 'Červená farba notebooku Acer Aspire E15 zaujme na prvý pohľad v každom prostredí, a tak si doprajete užívania v príjemnom dizajne. Doprajete si na ňom dostatok zábavy, napríklad pri sledovaní filmov, pričom dostanete lepší zážitok s jeho 15,6 palcovým displejom s HD rozlíšením. Pripojíte sa vďaka nemu vždy na web hladko a bez problémov, za čo môže vďačiť WiFi s rozhraním 802.11 b / g / n. O rýchlosť pri väčšine činností sa postará procesor Intel Celeron so štyrmi jadrami s možnosťou pretaktovania a multitasking, ten má pod palcom 4 GB pamäte RAM. K tomu dostávate ešte 500 GB disk pre ukladanie súborov.', 1, 'img\\products\\1\\250660.png', 13, 51),
(2, 6, 250, 'LENOVO IDEAPAD G50-30 N3540 15.6" W8.1 STRIEBORNÝ (80G001U7CK)', 399.99, 'LENOVO', 'Ak si chcete prácu či zábavu naozaj vychutnať, neváhajte siahnuť po praktickom notebooku LENOVO IdeaPad G50-30 N3540 15.6" W8.1 s množstvom praktických konektorov. Integrovaný operačný systém Windows 8.1 je len základom úspechu a výborného výkonu celého zariadenia. Samozrejmosťou je kapacita 1 TB pre rozličný multimediálny obsah, integrovaná HD web kamera a prácu vám uľahčí aj vhodne ergonomicky tvarovaná klávesnica a viacdotykový touchpad optimalizovaný pre prácu s operačným systémom. Každodenná práca i zábava na tomto notebooku sa pre vás stane príťažlivým okamihom!', 1, 'img\\products\\2\\236806.jpg', 8, 31),
(3, 7, 660, 'PHILIPS 223V5LSB2/10, 21,5"', 149.9, 'PHILIPS', 'Úsporný LED monitor Philips 223V5LSB2 s uhlopriečkou 21,5" vám poskytne funkcie ako SmartContrast alebo SmartControl Lite za výhodnú cenu s Full HD zobrazením. Je vhodný ako do domácnosti na hranie hier alebo sledovanie filmov, tak aj do kancelárií. Veľkou výhodou je jeho nízka spotreba 15,61W. Na pripojenie k počítaču je možné použiť analógové rozhranie VGA. Moderná technológia LED podsvietenia sľubuje verné podanie farieb či ostrosť aj pri vysokých detailoch. Váš obľúbený film či seriál si tak vychutnáte vo vysokej kvalite.', 1, 'img\\products\\3\\253830.jpg', 1, 4),
(4, 7, 25, 'SAMSUNG LS24D391HL/EN', 179.9, 'SAMSUNG', 'Štýlový monitor SAMSUNG LS24D391HL/EN je vynikajúcou ukážkou novej technológie Touch of Color spoločnosti Samsung. Je významná odrážaním svetla, ktoré spríjemní a uľahčí sledovanie kdekoľvek práve sedíte aj vďaka jeho funkcii naklonenia. Podľa normy Energy Star sa tento monitor zaraďuje medzi ekologicky úsporné monitory triedy A. Je kompatibilný s operačným systémom od značky Apple a Microsoft. Adaptér do tohto monitoru je externý. Priesvitný podstavec guľatého tvaru, štíhle a elegantné telo, či vysoko lesknúca sa biela farba vytvárajú dokonalý dizajn. Vaše doterajšie nároky budú bezpochybne splnené.', 1, 'img\\products\\4\\253850.jpg', 1, 4),
(5, 3, 112, 'HUAWEI HONOR 4C (ZLATÝ)', 199, 'HUAWEI', 'Výkonný smartfón Honor 4C v zlatej farbe vás nadchne hneď na prvý pohľad svojim jedinečným designom. Má veľmi jemný povch, ktorý pôsobí luxusne, navyše s 5 palcovým dispelom si užijete každý detail. Smartfón HONOR 4C disponuje s výkonnou 13MP hlavnou kamerou a vďaka 5MP prednej kamere sa nemusíte obávať rozmazaných selfie fotiek, alebo videohovorov. Vďaka výkonnému osemjadrovému procesoru HiSilicon Kirin 620 môžete mať naraz otvorené veľké množstvo aplikácií alebo hrať aj tie najnáročnejšie hry. Smartfón má navyše výkonnú 2550mAh batériu a priestorový 5.1 zvuk.', 1, 'img\\products\\5\\299254.jpg', 1, 4),
(6, 4, 45, 'MOBILNET PÚZDRO BOČNÁ KNIŽKA PRE SAMSUNG GALAXY J1 (MODRÉ)', 10.99, 'MOBILNET', 'Bočné knižkové puzdro MOBILNET v modrej farbe, vhodné pre mobilný telefón Samsung J1. Je to praktický pomocník chrániaci telefón pred mechanickým poškodením, prachom a ďalšími nečistotami. Vnútorný korpus pevne obopne uložené zariadenie. Zásluhou presných výrezov pre tlačidlá, porty a kameru neobmedzuje využívanie všetkých funkcií telefónu.', 1, 'img\\products\\6\\322854.jpg', 0, 0),
(7, 10, 230, 'APPLE IPAD AIR WI-FI 16GB, SILVER MD788FD/B', 349.9, 'APPLE', 'Dokonale tenký a ľahký iPad Air je veľmi výkonné zariadenie osadené čipom A7, vyspelým bezdrôtovým rozhraní a množstvom aplikácií: iOS 7, pohybový koprocesor M7, Bluetooth 4.0, pamäť 16 GB. Jeho veľkou prednosťou je Retina displej s uhlopriečkou 9,7 palcov. Dvojnásobne vyšší grafický a výpočtový výkon je zabezpečený čipom A7. S ním je všetko čo robíte oveľa rýchlejšie. Ultrarýchle bezdrôtové pripojenie vás dostane rýchlo k veciam, ktoré hľadáte. iPad Air pomocou dvoch antén a technológii MIMO dosiahne dvojnásobný výkon Wi-Fi a všetko čo budete chcieť stiahnuť alebo pozrieť bude za okamžik dostupné.', 1, 'img\\products\\7\\155164.jpg', 0, 0),
(8, 9, 111, 'SAMSUNG GALAXY TAB A 9.7 SM-T550NZKAXSK WI-FI, 16 GB, ČIERNA', 259.9, 'SAMSUNG', 'Tablet SAMSUNG Galaxy Tab A 9.7 v čiernej farbe ponúka výborný pomer strán na čítanie 4:3, na jeho dostatočne veľkej 9,7 palcovej dotykovej obrazovke s rozlíšením 1024 x 768 pixelov. Príjemné užívateľské prostredie vytvára operačný systém Android. K dispozícii je aj balíček produktov MS Office a Galaxy Gifts. Plynulý chod všetkých aplikácií zabezpečuje štvorjadrový procesor s frekvenciou 1,2 GHz. Tablet má 1,5 GB RAM pamäť a internú pamäť s kapacitou 16 GB, ktorú je možné rozšíriť pomocou microSD karty až do 128 GB. Tablet je vybavený aj dvoma kamerami, predná s rozlíšením 2 MP a zadná s rozlíšením 5 MP, automatickým zaostrovaním a špeciálnymi režimami fotenia.', 1, 'img\\products\\8\\271968.jpg', 0, 0);

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
  `city` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `postcode` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci AUTO_INCREMENT=6 ;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`userid`, `email`, `name`, `surname`, `password`, `address`, `city`, `postcode`) VALUES
(1, 'jozo19898@gmail.com', 'Jozef', 'Samuraj', 'jablko', 'Šafárikova 11', 'Košice', '04011'),
(2, 'serusky44@azet.sk', 'Martha', 'Big', 'yesyes22', 'Hlavná 55', 'Košice', '04001'),
(3, 'marek.sss@gmail.com', 'Marek', 'Velký', 'iamlegend', 'Bernolákova 1', 'Košice', '04001'),
(4, 'david99@gmail.com', 'David', 'Kostra', 'transformers55', 'Trieda SNP 50', 'Košice', '04001'),
(5, 'ottoman787@azet.sk', 'Otto', 'Markus', '55ottis', 'Kuzmányho', 'Košice', '04001');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
