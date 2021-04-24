-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 06:27 PM
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
-- Database: `informacioni_sistem`
--

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `id` int(11) NOT NULL,
  `naziv_grada` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`id`, `naziv_grada`) VALUES
(2, 'Andrijevica'),
(3, 'Berane'),
(4, 'Ulcinj'),
(5, 'Tivat'),
(6, 'Niksic'),
(7, 'Pluzine'),
(8, 'Plav'),
(9, 'Bijelo Polje'),
(10, 'Cetinje'),
(11, 'Bar'),
(30, 'Podgorica');

-- --------------------------------------------------------

--
-- Table structure for table `nekretnine`
--

CREATE TABLE `nekretnine` (
  `id` int(11) NOT NULL,
  `grad_id` int(11) DEFAULT NULL,
  `oglas_id` int(11) DEFAULT NULL,
  `nekretnina_id` int(11) DEFAULT NULL,
  `povrsina` varchar(255) COLLATE utf8_bin NOT NULL,
  `cijena` varchar(255) COLLATE utf8_bin NOT NULL,
  `godina_izgradnje` varchar(255) COLLATE utf8_bin NOT NULL,
  `opis` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `datum_prodaje` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `nekretnine`
--

INSERT INTO `nekretnine` (`id`, `grad_id`, `oglas_id`, `nekretnina_id`, `povrsina`, `cijena`, `godina_izgradnje`, `opis`, `status`, `datum_prodaje`) VALUES
(75, 5, 1, 1, '230', '76000', '2014', 'Blizu mora', 'Dostupno', '0000-00-00'),
(79, 30, 2, 3, '100', '200', '2018', 'Na odlicno lokaciji, blizu centra. ', 'Dostupno', '0000-00-00'),
(80, 2, 1, 8, '30', '800', '2010', '', 'Dostupno', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE `slike` (
  `id` int(11) NOT NULL,
  `slika` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT './uploads/no_photo.jpg',
  `nekretnine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`id`, `slika`, `nekretnine_id`) VALUES
(68, './uploads/603b7a07b7083.jpg', 75),
(69, './uploads/603b7a07b9402.jpg', 75),
(73, './uploads/603b8c69eba76.jpg', 79),
(74, './uploads/603b8c69ecc12.jpg', 79),
(75, './uploads/603b99ab79411.jpg', 80),
(76, './uploads/603b99ab7b7e6.jpg', 80);

-- --------------------------------------------------------

--
-- Table structure for table `tip_nekretnine`
--

CREATE TABLE `tip_nekretnine` (
  `id` int(11) NOT NULL,
  `naziv_nekretnine` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tip_nekretnine`
--

INSERT INTO `tip_nekretnine` (`id`, `naziv_nekretnine`) VALUES
(1, 'Kuca'),
(2, 'Stan'),
(3, 'Poslovni prostor'),
(8, 'Garaza');

-- --------------------------------------------------------

--
-- Table structure for table `tip_oglasa`
--

CREATE TABLE `tip_oglasa` (
  `id` int(11) NOT NULL,
  `naziv_oglasa` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tip_oglasa`
--

INSERT INTO `tip_oglasa` (`id`, `naziv_oglasa`) VALUES
(1, 'Prodaja'),
(2, 'Iznajmljivanje'),
(3, 'Kompenzacija');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nekretnine`
--
ALTER TABLE `nekretnine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nekretnine_grad` (`grad_id`),
  ADD KEY `fk_nekretnine_oglas` (`oglas_id`),
  ADD KEY `fk_nekretnine_nekretnine` (`nekretnina_id`);

--
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nekretnine_slike` (`nekretnine_id`);

--
-- Indexes for table `tip_nekretnine`
--
ALTER TABLE `tip_nekretnine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tip_oglasa`
--
ALTER TABLE `tip_oglasa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `nekretnine`
--
ALTER TABLE `nekretnine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `slike`
--
ALTER TABLE `slike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tip_nekretnine`
--
ALTER TABLE `tip_nekretnine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tip_oglasa`
--
ALTER TABLE `tip_oglasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nekretnine`
--
ALTER TABLE `nekretnine`
  ADD CONSTRAINT `fk_nekretnine_grad` FOREIGN KEY (`grad_id`) REFERENCES `grad` (`id`),
  ADD CONSTRAINT `fk_nekretnine_nekretnine` FOREIGN KEY (`nekretnina_id`) REFERENCES `tip_nekretnine` (`id`),
  ADD CONSTRAINT `fk_nekretnine_oglas` FOREIGN KEY (`oglas_id`) REFERENCES `tip_oglasa` (`id`);

--
-- Constraints for table `slike`
--
ALTER TABLE `slike`
  ADD CONSTRAINT `fk_nekretnine_slike` FOREIGN KEY (`nekretnine_id`) REFERENCES `nekretnine` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
