-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2014 at 03:45 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE IF NOT EXISTS `anketa` (
  `Odgovor` text COLLATE utf8_bin NOT NULL,
  `Br` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`Odgovor`, `Br`) VALUES
('Odličan', 21),
('Prosečan', 8);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `ID_uloga` int(50) NOT NULL,
  `Ime` text COLLATE utf8_bin NOT NULL,
  `Mail` varchar(500) COLLATE utf8_bin NOT NULL,
  `Lozinka` varchar(5000) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`ID`, `ID_uloga`, `Ime`, `Mail`, `Lozinka`) VALUES
(3, 2, 'Milos Maricic', 'focoshomi@gmail.com', '9665e539a4333739a4d871a5258be1b6'),
(4, 1, 'Mitar Mrkela', 'mrkela@gmail.com', 'd0fa9cf18aa4cd3cde41e0913fa651fa'),
(5, 1, 'Admin Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `pogled`
--

CREATE TABLE IF NOT EXISTS `pogled` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `Naziv` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pogled`
--

INSERT INTO `pogled` (`ID`, `Naziv`) VALUES
(1, 'Parking'),
(2, 'Šuma');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE IF NOT EXISTS `rezervacija` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `ID_soba` int(50) NOT NULL,
  `Datum` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=45 ;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`ID`, `ID_soba`, `Datum`) VALUES
(41, 1, '19/06/2014,29/06/2014'),
(42, 1, '18/06/2014,26/06/2014'),
(43, 4, '19/06/2014,20/06/2014,26/06/2014'),
(44, 4, '18/06/2014,25/06/2014');

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE IF NOT EXISTS `slike` (
  `ID` int(15) NOT NULL AUTO_INCREMENT,
  `ID_sprat` int(15) NOT NULL,
  `Galerija` int(1) NOT NULL,
  `Putanja` varchar(500) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=41 ;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`ID`, `ID_sprat`, `Galerija`, `Putanja`) VALUES
(15, 0, 1, 'images/2.jpg'),
(16, 0, 1, 'images/1.jpg'),
(17, 2, 1, 'images/11.jpg'),
(18, 1, 1, 'images/12.jpg'),
(19, 2, 1, 'images/13.jpg'),
(29, 0, 1, 'images/15.jpg'),
(30, 0, 1, 'images/14.jpg'),
(32, 0, 1, 'images/15.jpg'),
(33, 0, 1, 'images/16.jpg'),
(34, 4, 1, 'images/17.jpg'),
(35, 0, 1, 'images/penzosi.jpg'),
(36, 4, 1, 'images/18.jpg'),
(37, 2, 1, 'images/19.jpg'),
(38, 1, 1, 'images/20.jpg'),
(39, 1, 0, 'images/21.jpg'),
(40, 0, 1, 'images/pc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `soba`
--

CREATE TABLE IF NOT EXISTS `soba` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `ID_tip` int(50) NOT NULL,
  `Opis` text COLLATE utf8_bin NOT NULL,
  `ID_sprat` int(50) NOT NULL,
  `ID_pogled` int(50) NOT NULL,
  `Broj` int(5) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `soba`
--

INSERT INTO `soba` (`ID`, `ID_tip`, `Opis`, `ID_sprat`, `ID_pogled`, `Broj`) VALUES
(1, 2, 'ddghgfgdfsdfgsd', 2, 2, 110),
(3, 4, 'LUX', 1, 2, 113),
(4, 1, 'Jednokrevetna', 1, 2, 112),
(5, 2, 'sgfgdfgdfgd', 2, 2, 115),
(6, 2, 'uthggggggggg', 2, 2, 116);

-- --------------------------------------------------------

--
-- Table structure for table `sprat`
--

CREATE TABLE IF NOT EXISTS `sprat` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `Naziv` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sprat`
--

INSERT INTO `sprat` (`ID`, `Naziv`) VALUES
(1, 'Prvi'),
(2, 'Drugi');

-- --------------------------------------------------------

--
-- Table structure for table `tip`
--

CREATE TABLE IF NOT EXISTS `tip` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(50) COLLATE utf8_bin NOT NULL,
  `Opis` varchar(5000) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tip`
--

INSERT INTO `tip` (`ID`, `Naziv`, `Opis`) VALUES
(1, 'Jednokrevetna', 'Soba je opremljena nameštajem modernog dizajna i gostima nudi francuski ležaj (200x180 cm), sopstveno kupatilo (tuš kabina), fen za kosu, kozmetički set, Wi-Fi internet konekciju, LCD televizor, direktnu telefonsku liniju, klima uređaj sa individualnim podešavanjem, mini bar, room service 07.00-23.00, uslužno pranje i peglanje.'),
(2, 'Dvokrevetna', 'Za one koji vole komfor i prostranstvo, sa više prostora i sa francuskim ili dva odvojena ležaja, ova soba komotno može da primi dva zahtevnija gosta. Opremljena je sa telefonom sa direktnom linijom, bežičnim internetom, minibarom, sefom, TV aparatom, kupatilom sa tuš kabinom, SOS alarmom i klima uređajem.'),
(4, 'LUX', 'Lux apartman opremljen je luksuznim stilskim nameštajem, a podrazumeva dnevni boravak sa radnim delom, jednu spavaću sobu sa prostranim francuskim ležajem ili jednu spavaću sobu sa prostranim francuskim ležajem i jednu dvokrevetnu sobu sa dva odvojena ležaja, jedno kupatilo sa hidromasažnom kadom, kao i jedan toalet. Sadrži i minibar, TV aparate, telefone sa direktnom linijom, bežični internet, sef, SOS alarm i klima uređaje.');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE IF NOT EXISTS `uloga` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(5000) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`ID`, `Naziv`) VALUES
(1, 'Administrator'),
(2, 'Korisnik');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
