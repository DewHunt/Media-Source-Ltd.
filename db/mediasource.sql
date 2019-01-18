-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2019 at 09:17 PM
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
(23, 'Dew Hunt', 'dew_hunt_19011634.jpg', 1, '2019-01-16 10:56:34', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(24, 'Janakantha', 'janakantha_19011642.jpg', 1, '2019-01-16 13:06:42', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(27, 'Daily Star', 'daily_star_19011750.jpg', 1, '2019-01-17 19:24:50', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(28, 'Salman Sabbir', 'salman_sabbir_19011834.jpg', 1, '2019-01-18 18:54:34', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
