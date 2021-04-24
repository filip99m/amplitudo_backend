-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 07:54 PM
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
-- Database: `phonebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Podgorica'),
(2, 'Budva'),
(3, 'Bar');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone1` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone2` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8_bin DEFAULT './uploads/nophoto.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `phone1`, `phone2`, `email`, `address`, `zip_code`, `city_id`, `profile_image`) VALUES
(2, 'Janko', 'Jankovic', '067/888-555', '067/363-573', 'janko@mail.com', 'Blok VI', NULL, NULL, NULL),
(3, 'Filip', 'Filipovic', '068/777-999', '085/5524132', 'filip@mail.com', 'Budva', NULL, NULL, NULL),
(4, 'Leo', 'Gaines', '+1 (964) 639-7017', '+1 (128) 748-1432', 'qosuw@mailinator.com', 'Rem illum magna sap', NULL, 1, NULL),
(5, 'Joelle', 'Simon', '+1 (526) 439-9269', '+1 (346) 708-6008', 'raramat@mailinator.com', 'Eos sed maiores volu', NULL, NULL, NULL),
(6, 'Bo', 'Wolfe', '+1 (907) 115-4366', '+1 (111) 491-5588', 'muzataz@mailinator.com', 'Dolorem saepe culpa ', NULL, 3, './uploads/601d87ff5291c.jpeg'),
(7, 'Jonas', 'Serrano', '+1 (403) 736-6068', '+1 (758) 696-7019', 'fofecyvem@mailinator.com', 'Odit sed obcaecati p', NULL, NULL, NULL),
(8, 'Daquan', 'Banks', '+1 (721) 926-4951', '+1 (109) 318-7387', 'cysy@mailinator.com', 'Non commodi tempore', NULL, NULL, NULL),
(9, 'Honorato', 'Talley', '+1 (794) 291-5586', '+1 (242) 613-9884', 'wahuqof@mailinator.com', 'Eligendi ad quibusda', NULL, 2, NULL),
(10, 'Fay', 'Mejia', '+1 (413) 268-9889', '+1 (313) 511-3098', 'bybutixyq@mailinator.com', 'Nobis id aliquam por', NULL, 1, './uploads/601d86a79ba22.jpg'),
(11, 'Heidi', 'Lynch', '+1 (593) 658-3953', '+1 (528) 518-7875', 'gibysilyj@mailinator.com', 'Qui est molestiae q', NULL, 3, NULL),
(12, 'Latifah', 'Cash', '+1 (211) 376-4395', '+1 (268) 802-9255', 'hyzyryfuc@mailinator.com', 'Exercitation rerum n', NULL, 1, './uploads/601d85a9e6300.jpg'),
(13, 'Abraham', 'Shepherd', '+1 (785) 265-4472', '+1 (427) 953-3276', 'dojax@mailinator.com', 'Harum soluta consequ', NULL, 1, './uploads/601d805029062.jpg'),
(14, 'Jamal', 'Mason', '+1 (842) 206-3592', '+1 (892) 216-8092', 'naqositewo@mailinator.com', 'Incididunt do accusa', NULL, 1, ''),
(15, 'Troy', 'Solomon', '+1 (415) 725-3332', '+1 (636) 126-1565', 'rexedota@mailinator.com', 'Cum sapiente cum nos', NULL, 2, NULL),
(16, 'Darryl', 'Hunt', '+1 (715) 368-8993', '+1 (399) 486-8347', 'lecyhiq@mailinator.com', 'Est suscipit nemo qu', NULL, 3, './uploads/nophoto.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contacts_cities` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `fk_contacts_cities` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
