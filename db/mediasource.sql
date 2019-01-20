-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2019 at 08:11 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediasource`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Id`, `Name`, `UserName`, `Email`, `Mobile`, `Password`) VALUES
(1, 'Dew Hunt', 'dew', 'dew@gmail.com', '017 66 328 322', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `EntryBy` int(11) NOT NULL,
  `EntryDateTime` datetime NOT NULL,
  `UpdateBy` int(11) NOT NULL,
  `UpdateDateTime` datetime NOT NULL,
  `DeleteBy` int(11) NOT NULL,
  `DeleteDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`Id`, `Name`, `Image`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateDateTime`, `DeleteBy`, `DeleteDateTime`) VALUES
(18, 'Amader Somoy', 'amader_somoy_19011427.jpg', 1, '2019-01-14 10:24:27', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(19, 'Bangladesh Pratidin', 'bangladesh_pratidin_19011430.jpg', 1, '2019-01-14 10:37:30', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(20, 'Jugantor', 'jugantor_19011401.jpg', 1, '2019-01-14 10:38:01', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(21, 'Kaler Kantho', 'kaler_kantho_19011420.png', 1, '2019-01-14 10:38:20', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(22, 'Prothom Alo', 'prothom_alo_19011435.jpg', 1, '2019-01-14 10:38:35', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(23, 'The Financial Express', 'the_financial_express_19011923.png', 1, '2019-01-16 10:56:34', 1, '2019-01-19 08:27:23', 0, '0000-00-00 00:00:00'),
(24, 'Janakantha', 'janakantha_19011906.png', 1, '2019-01-16 13:06:42', 1, '2019-01-19 08:25:06', 0, '0000-00-00 00:00:00'),
(27, 'Daily Star', 'daily_star_19011905.png', 1, '2019-01-17 19:24:50', 1, '2019-01-19 08:24:05', 0, '0000-00-00 00:00:00'),
(28, 'The Asian Age', 'the_asian_age_19011907.png', 1, '2019-01-18 18:54:34', 1, '2019-01-19 08:28:07', 0, '0000-00-00 00:00:00'),
(29, 'Inqilab', 'inqilab_19011903.png', 1, '2019-01-19 09:33:37', 1, '2019-01-19 09:40:03', 0, '0000-00-00 00:00:00'),
(30, 'Naya Diganto', 'naya_diganto_19011918.png', 1, '2019-01-19 09:41:18', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(31, 'Amar Desh', 'amar_desh_19012046.png', 1, '2019-01-19 09:43:02', 1, '2019-01-20 09:36:46', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `publication_place`
--

CREATE TABLE `publication_place` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `EntryBy` int(11) NOT NULL,
  `EntryDateTime` datetime NOT NULL,
  `UpdateBy` int(11) NOT NULL,
  `UpdateDateTime` datetime NOT NULL,
  `DeleteBy` int(11) NOT NULL,
  `DeleteDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publication_place`
--

INSERT INTO `publication_place` (`Id`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateDateTime`, `DeleteBy`, `DeleteDateTime`) VALUES
(1, 'Dhaka', 'Dhaka', 1, '2019-01-20 18:37:24', 1, '2019-01-20 20:02:54', 0, '0000-00-00 00:00:00'),
(2, 'Chittagong', 'Chittagong', 1, '2019-01-20 19:36:58', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'Sylhet', 'Sylhet', 1, '2019-01-20 19:37:42', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 'Barisal', 'Barisal', 1, '2019-01-20 19:38:06', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(5, 'Khulna', 'Khulna', 1, '2019-01-20 19:38:23', 1, '2019-01-20 20:03:17', 0, '0000-00-00 00:00:00'),
(6, 'Rajshahi', 'Rajshahi', 1, '2019-01-20 19:38:41', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(7, 'Rangpur', 'Rangpur', 1, '2019-01-20 19:38:55', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(8, 'Comilla', 'Comilla', 1, '2019-01-20 19:39:10', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `publication_type`
--

CREATE TABLE `publication_type` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `EntryBy` int(11) NOT NULL,
  `EntryDateTime` datetime NOT NULL,
  `UpdateBy` int(11) NOT NULL,
  `UpdateDateTime` datetime NOT NULL,
  `DeleteBy` int(11) NOT NULL,
  `DeleteDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publication_type`
--

INSERT INTO `publication_type` (`Id`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateDateTime`, `DeleteBy`, `DeleteDateTime`) VALUES
(1, 'Newspaper', 'Newspaper', 1, '2019-01-20 07:27:34', 1, '2019-01-20 11:15:31', 0, '0000-00-00 00:00:00'),
(2, 'Supplementary', 'Supplementary', 1, '2019-01-20 08:58:55', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'Magazine', 'Magazine', 1, '2019-01-20 09:00:01', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 'Online News', 'Online News', 1, '2019-01-20 09:00:44', 1, '2019-01-20 19:58:28', 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `publication_place`
--
ALTER TABLE `publication_place`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `publication_type`
--
ALTER TABLE `publication_type`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `publication_place`
--
ALTER TABLE `publication_place`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `publication_type`
--
ALTER TABLE `publication_type`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
