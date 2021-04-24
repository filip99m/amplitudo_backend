-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 07:36 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `banka`
--

CREATE TABLE `banka` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `banka`
--

INSERT INTO `banka` (`id`, `naziv`) VALUES
(1, 'NLB banka'),
(2, 'CKB banka'),
(3, 'Erste banka'),
(4, 'Lovcen banka');

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`id`, `naziv`) VALUES
(1, 'Podgorica'),
(2, 'Budva'),
(3, 'Bar'),
(4, 'Berane');

-- --------------------------------------------------------

--
-- Table structure for table `radnik`
--

CREATE TABLE `radnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8_bin NOT NULL,
  `prezime` varchar(255) COLLATE utf8_bin NOT NULL,
  `datum_rodjenja` date NOT NULL,
  `jmbg` varchar(13) COLLATE utf8_bin NOT NULL,
  `napomena` text COLLATE utf8_bin DEFAULT NULL,
  `grad_id` int(11) DEFAULT NULL,
  `adresa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `broj` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `radnik`
--

INSERT INTO `radnik` (`id`, `ime`, `prezime`, `datum_rodjenja`, `jmbg`, `napomena`, `grad_id`, `adresa`, `broj`) VALUES
(1, 'Marko', 'Markovic', '1995-01-20', '2001995020016', NULL, 1, NULL, NULL),
(2, 'Janko', 'Jankovic', '1999-03-05', '2503994020016', NULL, 1, NULL, NULL),
(3, 'Nikola', 'Nikolic', '1985-11-10', '2503994020016', NULL, 2, NULL, NULL),
(4, 'Nikola', 'Markovic', '1990-11-26', '2503999020016', NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `radnik_pozicija`
--

CREATE TABLE `radnik_pozicija` (
  `id` int(11) NOT NULL,
  `sektor_id` int(11) NOT NULL,
  `naziv_pozicije` varchar(255) COLLATE utf8_bin NOT NULL,
  `opis_posla` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `napomena` text COLLATE utf8_bin DEFAULT NULL,
  `radnik_id` int(11) NOT NULL,
  `plata` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `radnik_pozicija`
--

INSERT INTO `radnik_pozicija` (`id`, `sektor_id`, `naziv_pozicije`, `opis_posla`, `napomena`, `radnik_id`, `plata`) VALUES
(1, 4, 'Full Stack developer', 'Da radi...', 'test', 1, '1500'),
(2, 4, 'iOS developer', 'Da radi iOS...', 'test 2', 2, '900'),
(3, 4, 'Android developer', 'Da radi app...', 'test 3', 3, '900');

-- --------------------------------------------------------

--
-- Table structure for table `radnik_zaposlenje`
--

CREATE TABLE `radnik_zaposlenje` (
  `id` int(11) NOT NULL,
  `datum_pocetka` date NOT NULL DEFAULT current_timestamp(),
  `vrsta_zaposlenja_id` int(11) NOT NULL,
  `banka_id` int(11) NOT NULL,
  `broj_zr` varchar(255) COLLATE utf8_bin NOT NULL,
  `napomena` text COLLATE utf8_bin DEFAULT NULL,
  `radnik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `radnik_zaposlenje`
--

INSERT INTO `radnik_zaposlenje` (`id`, `datum_pocetka`, `vrsta_zaposlenja_id`, `banka_id`, `broj_zr`, `napomena`, `radnik_id`) VALUES
(2, '2021-01-25', 5, 1, '550-885596-13', NULL, 1),
(3, '2021-01-25', 5, 1, '550-885596-20', NULL, 2),
(4, '2015-05-01', 5, 1, '120-885596-55', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sektor`
--

CREATE TABLE `sektor` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sektor`
--

INSERT INTO `sektor` (`id`, `naziv`) VALUES
(1, 'Uprava'),
(2, 'Marketing'),
(3, 'Kadrovsko'),
(4, 'Development');

-- --------------------------------------------------------

--
-- Table structure for table `vrsta_zaposlenja`
--

CREATE TABLE `vrsta_zaposlenja` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vrsta_zaposlenja`
--

INSERT INTO `vrsta_zaposlenja` (`id`, `naziv`) VALUES
(4, 'Na odredjeno'),
(5, 'Na neodredjeno'),
(6, 'Pripravnicki');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banka`
--
ALTER TABLE `banka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radnik`
--
ALTER TABLE `radnik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_radnik_grad` (`grad_id`);

--
-- Indexes for table `radnik_pozicija`
--
ALTER TABLE `radnik_pozicija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radnik_zaposlenje`
--
ALTER TABLE `radnik_zaposlenje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_radnik_zaposlenje_radnik` (`radnik_id`),
  ADD KEY `fk_radnik_zaposlenje_banka` (`banka_id`),
  ADD KEY `fk_radnik_zaposlenje_vrsta_zaposlenja` (`vrsta_zaposlenja_id`);

--
-- Indexes for table `sektor`
--
ALTER TABLE `sektor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vrsta_zaposlenja`
--
ALTER TABLE `vrsta_zaposlenja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banka`
--
ALTER TABLE `banka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `radnik`
--
ALTER TABLE `radnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `radnik_pozicija`
--
ALTER TABLE `radnik_pozicija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `radnik_zaposlenje`
--
ALTER TABLE `radnik_zaposlenje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sektor`
--
ALTER TABLE `sektor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vrsta_zaposlenja`
--
ALTER TABLE `vrsta_zaposlenja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `radnik`
--
ALTER TABLE `radnik`
  ADD CONSTRAINT `fk_radnik_grad` FOREIGN KEY (`grad_id`) REFERENCES `grad` (`id`);

--
-- Constraints for table `radnik_zaposlenje`
--
ALTER TABLE `radnik_zaposlenje`
  ADD CONSTRAINT `fk_radnik_zaposlenje_vrsta_zaposlenja` FOREIGN KEY (`vrsta_zaposlenja_id`) REFERENCES `vrsta_zaposlenja` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
