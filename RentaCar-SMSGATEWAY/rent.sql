-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2015 at 04:34 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `automobil`
--

CREATE TABLE IF NOT EXISTS `automobil` (
  `id_automobila` int(50) NOT NULL,
  `boja` varchar(50) COLLATE utf8_bin NOT NULL,
  `broj_sedista` int(10) NOT NULL,
  `dostupnost` int(5) NOT NULL,
  `klasa` varchar(50) COLLATE utf8_bin NOT NULL,
  `kubikaza` varchar(20) COLLATE utf8_bin NOT NULL,
  `marka` varchar(50) COLLATE utf8_bin NOT NULL,
  `naziv` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `automobil`
--

INSERT INTO `automobil` (`id_automobila`, `boja`, `broj_sedista`, `dostupnost`, `klasa`, `kubikaza`, `marka`, `naziv`) VALUES
(1, 'Crna', 5, 1, 'C', '1999', 'Mercedes', 'C220 '),
(2, 'Bela', 4, 1, 'A', '1385', 'Mercedes', 'A140');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE IF NOT EXISTS `rezervacija` (
  `id_automobila` int(50) NOT NULL,
  `id_rezervacije` int(50) NOT NULL,
  `kod_rezervacije` varchar(50) COLLATE utf8_bin NOT NULL,
  `broj_telefona` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `stanje`
--

CREATE TABLE IF NOT EXISTS `stanje` (
  `dostupnost` int(5) NOT NULL,
  `opis` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `stanje`
--

INSERT INTO `stanje` (`dostupnost`, `opis`) VALUES
(0, 'Nedostupno'),
(1, 'Dostupno');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `automobil`
--
ALTER TABLE `automobil`
  ADD PRIMARY KEY (`id_automobila`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`id_rezervacije`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `automobil`
--
ALTER TABLE `automobil`
  MODIFY `id_automobila` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `id_rezervacije` int(50) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
