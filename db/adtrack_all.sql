-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2019 at 12:09 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adtrack_all`
--

-- --------------------------------------------------------

--
-- Table structure for table `adcategory`
--

CREATE TABLE `adcategory` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adcategory`
--

INSERT INTO `adcategory` (`Id`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(1, 'Private', 'Private', 1, '2019-01-03 10:02:35', NULL, NULL, NULL, NULL, 1),
(2, 'Government', 'Government', 1, '2019-01-03 10:02:52', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `adentry`
--

CREATE TABLE `adentry` (
  `Id` int(11) NOT NULL,
  `BatchId` decimal(30,0) DEFAULT NULL,
  `MediaId` int(11) DEFAULT NULL,
  `PublicationId` int(3) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `EntryBy` int(3) DEFAULT NULL,
  `EntrydateTime` datetime DEFAULT NULL,
  `UpdateBy` int(3) DEFAULT NULL,
  `UpdateDateTime` datetime DEFAULT NULL,
  `DeleteBy` int(3) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adentry`
--

INSERT INTO `adentry` (`Id`, `BatchId`, `MediaId`, `PublicationId`, `Date`, `EntryBy`, `EntrydateTime`, `UpdateBy`, `UpdateDateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(1, '1', 1, 9, '2017-10-31', 1, '2017-10-31 05:50:33', NULL, NULL, NULL, NULL, 1),
(2, '2', 1, 9, '2017-10-31', 1, '2017-10-31 05:51:40', NULL, NULL, NULL, NULL, 1),
(3, '3', 2, 2, '2017-10-31', 1, '2017-10-31 05:56:22', NULL, NULL, NULL, NULL, 1),
(4, '4', 1, 9, '2017-10-31', 1, '2017-10-31 05:59:52', NULL, NULL, NULL, NULL, 1),
(5, '5', 5, 59, '2017-11-01', 1, '2017-11-01 12:08:53', NULL, NULL, NULL, NULL, 1),
(6, '6', 8, 23, '2017-11-02', 1, '2017-11-02 06:05:35', NULL, NULL, NULL, NULL, 1),
(7, '7', 1, 9, '2017-11-04', 1, '2017-11-04 09:38:49', NULL, NULL, NULL, NULL, 1),
(8, '8', 6, 33, '2017-11-04', 1, '2017-11-04 09:40:39', NULL, NULL, NULL, NULL, 1),
(9, '9', 1, 9, '2017-11-07', 1, '2017-11-07 09:28:08', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `adentrydetails`
--

CREATE TABLE `adentrydetails` (
  `Id` int(11) NOT NULL,
  `AdentryId` int(11) DEFAULT NULL,
  `ProductId` int(4) DEFAULT NULL,
  `ProductCatId` int(4) DEFAULT NULL,
  `CompanyId` int(4) DEFAULT NULL,
  `AdinfoId` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Caption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AdType` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HueId` int(3) DEFAULT NULL,
  `PlaceingId` int(3) DEFAULT NULL,
  `PositionId` int(4) DEFAULT NULL,
  `PageId` int(3) DEFAULT NULL,
  `Cols` int(3) DEFAULT NULL,
  `Inchs` int(3) DEFAULT NULL,
  `PageNo` int(3) DEFAULT NULL,
  `NewstypeId` int(11) DEFAULT NULL,
  `Image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Keyword` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Remarks` text COLLATE utf8_unicode_ci,
  `EntryBy` int(3) DEFAULT NULL,
  `EntrydateTime` datetime DEFAULT NULL,
  `UpdateBy` int(3) DEFAULT NULL,
  `UpdateDateTime` datetime DEFAULT NULL,
  `DeleteBy` int(3) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adentrydetails`
--

INSERT INTO `adentrydetails` (`Id`, `AdentryId`, `ProductId`, `ProductCatId`, `CompanyId`, `AdinfoId`, `Caption`, `AdType`, `HueId`, `PlaceingId`, `PositionId`, `PageId`, `Cols`, `Inchs`, `PageNo`, `NewstypeId`, `Image`, `Keyword`, `Remarks`, `EntryBy`, `EntrydateTime`, `UpdateBy`, `UpdateDateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(1, 1, 338, NULL, 214, '1-2', 'Caption 2', '6', 1, 5, 12, 25, 1, 2, 1, NULL, 'adinfo_76152017-01-23_1485152617.png', '0', '0', 1, '2017-10-31 05:50:33', NULL, NULL, NULL, NULL, 1),
(2, 2, 337, NULL, 213, '1-1', 'Caption 1', '5', 1, 5, 12, 27, 1, 1, 17, NULL, 'adinfo_26932017-01-23_1485152024.png', '0', '0', 1, '2017-10-31 05:51:40', NULL, NULL, NULL, NULL, 1),
(3, 3, 339, NULL, 217, '2-1', 'Caption 3', '5', 1, 5, 12, 28, 1, 2, 15, NULL, 'adinfo_25902017-01-23_1485161406.jpg', '0', '0', 1, '2017-10-31 05:56:22', NULL, NULL, NULL, NULL, 1),
(4, 4, 338, NULL, 214, '1-2', 'Caption 2', '6', 2, 5, 13, 27, 1, 3, 3, NULL, 'adinfo_76152017-01-23_1485152617.png', '0', '0', 1, '2017-10-31 05:59:52', NULL, NULL, NULL, NULL, 1),
(5, 5, 339, NULL, 217, '2-1', 'Caption 3', '5', 2, 5, 15, 16, 0, 0, 74, NULL, 'adinfo_25902017-01-23_1485161406.jpg', '0', '0', 1, '2017-11-01 12:08:53', NULL, NULL, NULL, NULL, 1),
(6, 6, 338, NULL, 214, '1-2', 'Caption 2', '6', 2, 0, 13, 30, 0, 0, 1, NULL, 'adinfo_76152017-01-23_1485152617.png', '0', '0', 1, '2017-11-02 06:05:35', NULL, NULL, NULL, NULL, 1),
(7, 7, 338, NULL, 214, '1-2', 'Caption 2', '6', 1, 5, 14, 30, 1, 2, 1, NULL, 'adinfo_76152017-01-23_1485152617.png', '0', '0', 1, '2017-11-04 09:38:49', NULL, NULL, NULL, NULL, 1),
(8, 8, 338, NULL, 214, '1-2', 'Caption 2', '6', 1, 6, 13, 28, 1, 1, 1, NULL, 'adinfo_76152017-01-23_1485152617.png', '0', '0', 1, '2017-11-04 09:40:39', NULL, NULL, NULL, NULL, 1),
(9, 9, 338, NULL, 214, '1-2', 'Caption 2', '6', 2, 0, 15, 30, 1, 1, 17, NULL, 'adinfo_76152017-01-23_1485152617.png', '0', '0', 1, '2017-11-07 09:28:09', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `adentryreport`
--

CREATE TABLE `adentryreport` (
  `Id` int(11) NOT NULL,
  `AdentryId` int(11) DEFAULT NULL,
  `BatchId` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MediaId` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PublicationName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `ProductName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductCatName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BrandName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Caption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AdType` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HueName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PlaceingName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PositionName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PageName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Cols` int(3) DEFAULT NULL,
  `Inchs` int(3) DEFAULT NULL,
  `Price` decimal(15,2) DEFAULT NULL,
  `PageNo` int(3) DEFAULT NULL,
  `NewstypeName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Keyword` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Brand` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Subbrand` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Company` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Remarks` text COLLATE utf8_unicode_ci,
  `EntryBy` int(3) DEFAULT NULL,
  `EntrydateTime` datetime DEFAULT NULL,
  `UpdateBy` int(3) DEFAULT NULL,
  `UpdateDateTime` datetime DEFAULT NULL,
  `DeleteBy` int(3) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1',
  `PublicationType` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `PublicationPlace` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PublicationFreq` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PublicationLan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Adtheme` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ColsInchs` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Cost` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adentryreport`
--

INSERT INTO `adentryreport` (`Id`, `AdentryId`, `BatchId`, `MediaId`, `PublicationName`, `Date`, `ProductName`, `ProductCatName`, `BrandName`, `Caption`, `AdType`, `HueName`, `PlaceingName`, `PositionName`, `PageName`, `Cols`, `Inchs`, `Price`, `PageNo`, `NewstypeName`, `Image`, `Keyword`, `Brand`, `Subbrand`, `Company`, `Remarks`, `EntryBy`, `EntrydateTime`, `UpdateBy`, `UpdateDateTime`, `DeleteBy`, `DeleteDateTime`, `State`, `PublicationType`, `PublicationPlace`, `PublicationFreq`, `PublicationLan`, `Adtheme`, `ColsInchs`, `Cost`) VALUES
(1, 1, '1', 'Prothom Aloo', 'Rosh Alo', '2017-10-31', 'Product category 2', 'Product 2', NULL, 'Caption 2', 'Government', 'red', 'Horizontal', 'Upper Full', 'Trade & Market', 1, 2, '0.00', 1, NULL, NULL, NULL, 'Brand  2', 'Sub-Brand 2', 'Company 2', NULL, 1, '2017-10-31 05:50:33', NULL, NULL, NULL, NULL, 1, 'Supplementary', 'Dhaka', 'Weekly', 'Bangla', 'Theme', '', ''),
(2, 2, '2', 'Prothom Aloo', 'Rosh Alo', '2017-10-31', 'Product category 1', 'Product 1', NULL, 'Caption 1', 'Private', 'red', 'Horizontal', 'Upper Full', 'Back Inside Cover', 1, 1, '0.00', 17, NULL, NULL, NULL, 'Brand 1', 'Sub-Brand 1 ', 'Company 1', NULL, 1, '2017-10-31 05:51:40', NULL, NULL, NULL, NULL, 1, 'Supplementary', 'Dhaka', 'Weekly', 'Bangla', 'Theme', '', ''),
(3, 3, '3', 'Bangladesh Pratidin', 'General', '2017-10-31', 'Product category 3', 'Product 3', NULL, 'Caption 3', 'Private', 'red', 'Horizontal', 'Upper Full', 'Front Inside Cover', 1, 2, '0.00', 15, NULL, NULL, NULL, 'Brand 5', 'Sub-Brand 5', 'Company 5', NULL, 1, '2017-10-31 05:56:22', NULL, NULL, NULL, NULL, 1, 'Newspaper ', 'Dhaka', 'Daily', 'Bangla', 'theme', '', ''),
(4, 4, '4', 'Prothom Aloo', 'Rosh Alo', '2017-10-31', 'Product category 2', 'Product 2', NULL, 'Caption 2', 'Government', 'black', 'Horizontal', 'Upper Right ', 'Back Inside Cover', 1, 3, '0.00', 3, NULL, NULL, NULL, 'Brand  2', 'Sub-Brand 2', 'Company 2', NULL, 1, '2017-10-31 05:59:52', NULL, NULL, NULL, NULL, 1, 'Supplementary', 'Dhaka', 'Weekly', 'Bangla', 'Theme', '', ''),
(5, 5, '5', 'Jugantor', 'General', '2017-11-01', 'Product  3', 'Product category 3', NULL, 'Caption 3', 'Private', 'black', 'Horizontal', 'Middle Full', 'Back Page', 0, 0, '0.00', 74, NULL, NULL, NULL, 'Brand 5', 'Sub-Brand 5', 'Company 5', NULL, 1, '2017-11-01 12:08:53', NULL, NULL, NULL, NULL, 1, 'Newspaper ', 'Dhaka', 'Daily', 'Bangla', 'theme', '', ''),
(6, 6, '6', 'Samakal', 'Kaler Kheya', '2017-11-02', 'Product  2', 'Product category 2', NULL, 'Caption 2', 'Government', 'black', '1', 'Upper Right ', 'Folding Page', 0, 0, '0.00', 1, NULL, NULL, NULL, 'Brand  2', 'Sub-Brand 2', 'Company 2', NULL, 1, '2017-11-02 06:05:35', NULL, NULL, NULL, NULL, 1, 'Supplementary', 'Dhaka', 'Weekly', 'Bangla', 'Theme', '', ''),
(7, 7, '7', 'Prothom Aloo', 'Rosh Alo', '2017-11-04', 'Product  2', 'Product category 2', NULL, 'Caption 2', 'Government', 'red', 'Horizontal', 'Upper Left ', 'Folding Page', 1, 2, '0.00', 1, NULL, NULL, NULL, 'Brand  2', 'Sub-Brand 2', 'Company 2', NULL, 1, '2017-11-04 09:38:49', NULL, NULL, NULL, NULL, 1, 'Supplementary', 'Dhaka', 'Weekly', 'Bangla', 'Theme', '', ''),
(8, 8, '8', 'Ittefaq', 'Korcha', '2017-11-04', 'Product  2', 'Product category 2', NULL, 'Caption 2', 'Government', 'red', 'Vertica', 'Upper Right ', 'Front Inside Cover', 1, 1, '0.00', 1, NULL, NULL, NULL, 'Brand  2', 'Sub-Brand 2', 'Company 2', NULL, 1, '2017-11-04 09:40:39', NULL, NULL, NULL, NULL, 1, 'Supplementary', 'Dhaka', 'Weekly', 'Bangla', 'Theme', '', ''),
(9, 9, '9', 'Prothom Aloo', 'Rosh Alo', '2017-11-07', 'Product category 2', NULL, NULL, 'Caption 2', 'Government', 'black', '1', 'Middle Full', 'Folding Page', 1, 1, '0.00', 17, NULL, NULL, NULL, 'Brand  2', 'Sub-Brand 2', 'Company 2', NULL, 1, '2017-11-07 09:28:09', NULL, NULL, NULL, NULL, 1, 'Supplementary', 'Dhaka', 'Weekly', 'Bangla', 'Theme', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `adinfo`
--

CREATE TABLE `adinfo` (
  `Id` int(11) NOT NULL,
  `AD_ID` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BrandId` int(11) DEFAULT NULL,
  `SubBrandId` int(11) DEFAULT NULL,
  `CompanyId` int(11) DEFAULT NULL,
  `Notes` text COLLATE utf8_unicode_ci,
  `Image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `AtypeId` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AdTheme` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CompanyId` int(11) DEFAULT NULL,
  `SubBrandId` int(11) DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`Id`, `Name`, `CompanyId`, `SubBrandId`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(1, 'Savlon', 1, NULL, 'Savlon', 1, '2019-01-05 06:40:58', NULL, NULL, NULL, NULL, 1),
(2, 'Freedom', 1, NULL, 'Freedom', 1, '2019-01-05 06:43:00', NULL, NULL, NULL, NULL, 1),
(3, 'Neem', 1, NULL, 'Neem', 1, '2019-01-05 06:43:13', NULL, NULL, NULL, NULL, 1),
(4, 'Black Fighter', 1, NULL, 'Black Fighter', 1, '2019-01-05 06:43:31', NULL, NULL, NULL, NULL, 1),
(5, 'Twinkle', 1, NULL, 'Twinkle', 1, '2019-01-05 06:43:47', NULL, NULL, NULL, NULL, 1),
(6, 'Yamaha', 2, NULL, 'Yamaha', 1, '2019-01-05 06:44:15', NULL, NULL, NULL, NULL, 1),
(7, 'Ispahani Tea ', 3, NULL, 'Ispahani Tea ', 1, '2019-01-05 06:46:07', 1, '2019-01-05 10:13:43', NULL, NULL, 1),
(8, 'Jui', 5, NULL, 'Jui', 1, '2019-01-05 06:47:06', NULL, NULL, NULL, NULL, 1),
(9, 'Meril', 5, NULL, 'Meril', 1, '2019-01-05 06:47:15', NULL, NULL, NULL, NULL, 1),
(11, 'Super Mom', 5, NULL, 'Super Mom', 1, '2019-01-05 06:47:34', NULL, NULL, NULL, NULL, 1),
(12, 'Senora', 5, NULL, 'Senora', 1, '2019-01-05 06:47:51', NULL, NULL, NULL, NULL, 1),
(16, 'White Plus', 5, NULL, 'White Plus', 1, '2019-01-05 06:51:43', NULL, NULL, NULL, NULL, 1),
(17, 'Select Plus', 5, NULL, 'Select Plus', 1, '2019-01-05 06:52:04', NULL, NULL, NULL, NULL, 1),
(18, 'Xpel', 5, NULL, 'Xpel', 1, '2019-01-05 06:52:16', NULL, NULL, NULL, NULL, 1),
(22, 'Chaka', 5, NULL, 'Chaka', 1, '2019-01-05 06:52:59', NULL, NULL, NULL, NULL, 1),
(24, 'Revive', 5, NULL, 'Revive', 1, '2019-01-05 06:53:25', NULL, NULL, NULL, NULL, 1),
(25, 'ACI Foods', 1, NULL, 'ACI Foods', 1, '2019-01-05 09:41:38', 1, '2019-01-05 09:54:22', NULL, NULL, 1),
(26, 'Sandal', 1, NULL, 'Sandal', 1, '2019-01-06 10:45:37', NULL, NULL, NULL, NULL, 1),
(27, 'Fun Cake', 1, NULL, 'Fun Cake', 1, '2019-01-06 11:05:02', NULL, NULL, NULL, NULL, 1),
(28, 'ACI', 1, NULL, 'ACI', 1, '2019-01-06 11:13:58', 1, '2019-01-06 11:14:22', NULL, NULL, 1),
(29, 'Ispahani', 3, NULL, 'Ispahani', 1, '2019-01-06 11:20:35', NULL, NULL, NULL, NULL, 1),
(30, 'Square', 5, NULL, 'Square', 1, '2019-01-07 05:31:16', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Id`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(1, 'ACI Ltd.', 'ACI Ltd.', 1, '2019-01-05 06:29:37', NULL, NULL, NULL, NULL, 1),
(2, 'ACI Motors Ltd.', 'ACI Motors Ltd.', 1, '2019-01-05 06:32:53', NULL, NULL, NULL, NULL, 1),
(3, 'Ispahani Group', 'Ispahani Group', 1, '2019-01-05 06:33:06', NULL, NULL, NULL, NULL, 1),
(5, 'Square Toiletries Ltd.', 'Square Toiletries Ltd.', 1, '2019-01-05 06:33:49', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dataentry`
--

CREATE TABLE `dataentry` (
  `Id` int(11) NOT NULL,
  `BatchId` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MediaId` int(11) DEFAULT NULL,
  `PublicationId` int(3) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `EntryBy` int(3) DEFAULT NULL,
  `EntrydateTime` datetime DEFAULT NULL,
  `UpdateBy` int(3) DEFAULT NULL,
  `UpdateDateTime` datetime DEFAULT NULL,
  `DeleteBy` int(3) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dataentry`
--

INSERT INTO `dataentry` (`Id`, `BatchId`, `MediaId`, `PublicationId`, `Date`, `EntryBy`, `EntrydateTime`, `UpdateBy`, `UpdateDateTime`, `DeleteBy`, `DeleteDateTime`, `Name`, `State`) VALUES
(26, '2', 48, 40, '2019-01-06', 1, '2019-01-08 11:13:11', NULL, NULL, NULL, NULL, '', 1),
(27, '3', 48, 40, '2019-01-06', 1, '2019-01-08 11:13:35', NULL, NULL, NULL, NULL, '', 1),
(28, '10', 48, 40, '2018-12-01', 1, '2019-01-08 11:14:27', NULL, NULL, NULL, NULL, '', 1),
(29, '10', 48, 40, '2018-12-03', 1, '2019-01-08 11:15:03', NULL, NULL, NULL, NULL, '', 1),
(30, '10', 48, 40, '2018-12-19', 1, '2019-01-08 11:15:29', NULL, NULL, NULL, NULL, '', 1),
(31, '10', 48, 40, '2019-01-12', 1, '2019-01-08 11:16:03', NULL, NULL, NULL, NULL, '', 1),
(32, '10', 48, 40, '2018-12-12', 1, '2019-01-08 11:16:31', NULL, NULL, NULL, NULL, '', 1),
(33, '10', 48, 40, '2019-01-05', 1, '2019-01-08 11:16:55', NULL, NULL, NULL, NULL, '', 1),
(34, '10', 48, 40, '2018-12-21', 1, '2019-01-08 11:17:21', NULL, NULL, NULL, NULL, '', 1),
(35, '10', 51, 56, '2019-01-05', 1, '2019-01-08 11:22:32', NULL, NULL, NULL, NULL, '', 1),
(36, '1', 51, 56, '2019-01-06', 1, '2019-01-08 11:22:59', NULL, NULL, NULL, NULL, '', 1),
(37, '4', 50, 54, '2018-12-07', 1, '2019-01-08 11:24:38', NULL, NULL, NULL, NULL, '', 1),
(38, '5', 50, 54, '2018-12-01', 1, '2019-01-08 11:24:58', NULL, NULL, NULL, NULL, '', 1),
(41, '8', 50, 54, '2018-12-15', 1, '2019-01-08 11:26:31', NULL, NULL, NULL, NULL, '', 1),
(42, '9', 50, 54, '2018-12-11', 1, '2019-01-08 11:26:55', NULL, NULL, NULL, NULL, '', 1),
(43, '10', 50, 54, '2018-12-21', 1, '2019-01-08 11:27:29', NULL, NULL, NULL, NULL, '', 1),
(44, '10', 49, 47, '2018-12-09', 1, '2019-01-08 11:27:54', NULL, NULL, NULL, NULL, '', 1),
(45, '10', 49, 47, '2018-12-19', 1, '2019-01-08 11:28:08', NULL, NULL, NULL, NULL, '', 1),
(46, '10', 49, 47, '2018-12-21', 1, '2019-01-08 11:28:22', NULL, NULL, NULL, NULL, '', 1),
(49, '6', 50, 54, '2019-01-02', 1, '2019-01-08 11:53:25', NULL, NULL, NULL, NULL, '', 1),
(50, '7', 49, 47, '2019-01-04', 1, '2019-01-08 11:54:58', NULL, NULL, NULL, NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dataentrydetails`
--

CREATE TABLE `dataentrydetails` (
  `Id` int(11) NOT NULL,
  `DataentryId` int(11) DEFAULT NULL,
  `ProductId` int(4) DEFAULT NULL,
  `ProductCatId` int(4) DEFAULT NULL,
  `CompanyId` int(4) DEFAULT NULL,
  `Caption` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `AdType` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HueId` int(3) DEFAULT NULL,
  `KeywordId` int(3) NOT NULL,
  `PlaceingId` int(3) DEFAULT NULL,
  `subBrandId` int(11) NOT NULL,
  `PositionId` int(4) DEFAULT NULL,
  `PositionName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `PageId` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Cols` int(3) DEFAULT NULL,
  `Inchs` int(3) DEFAULT NULL,
  `PageNo` int(3) DEFAULT NULL,
  `NewstypeId` int(11) DEFAULT NULL,
  `Image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Keyword` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Remarks` text COLLATE utf8_unicode_ci,
  `EntryBy` int(3) DEFAULT NULL,
  `EntrydateTime` datetime DEFAULT NULL,
  `PublicationLan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PublicationFreq` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PublicationPlace` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PublicationType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `UpdateBy` int(3) DEFAULT NULL,
  `UpdateDateTime` datetime DEFAULT NULL,
  `DeleteBy` int(3) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1',
  `outlook` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dataentrydetails`
--

INSERT INTO `dataentrydetails` (`Id`, `DataentryId`, `ProductId`, `ProductCatId`, `CompanyId`, `Caption`, `AdType`, `HueId`, `KeywordId`, `PlaceingId`, `subBrandId`, `PositionId`, `PositionName`, `PageId`, `Cols`, `Inchs`, `PageNo`, `NewstypeId`, `Image`, `Keyword`, `Remarks`, `EntryBy`, `EntrydateTime`, `PublicationLan`, `PublicationFreq`, `PublicationPlace`, `PublicationType`, `UpdateBy`, `UpdateDateTime`, `DeleteBy`, `DeleteDateTime`, `State`, `outlook`) VALUES
(26, 26, 2, 0, 0, 'দুই মাস মশার ঔষুধ ছিটা্নোই হয়নি', '0', 1, 0, NULL, 27, NULL, '1-1', '24', 1, 9, 9, 1, '', '0', '0', 1, '2019-01-08 11:13:11', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(27, 27, 3, 0, 0, 'চট্টগ্রাম থেকে মোড়কজাত লবণ', '0', 1, 0, NULL, 2, NULL, '1-2', '24', 2, 5, 15, 1, '', '0', '0', 1, '2019-01-08 11:13:35', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(28, 28, 2, 0, 0, 'ছবি এঁকে পুরষ্কার পলে খুদে আঁকিয়েরা', '0', 1, 0, NULL, 34, NULL, '4-5', '24', 2, 8, 5, 1, '', '0', '0', 1, '2019-01-08 11:14:27', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(29, 29, 2, 0, 0, 'দলমত-নির্বিশেষে ব্যবসায়ীদের জন্য দরজা খোলাঃ প্রধানমন্ত্রী', '0', 1, 0, NULL, 34, NULL, '2-4', '24', 3, 14, 14, 1, '', '0', '0', 1, '2019-01-08 11:15:03', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(30, 30, 2, 0, 0, 'সিআইপি কার্ড পেলেন ১৩৭ রপ্তানিকারক', '0', 1, 0, NULL, 34, NULL, '2-6', '24', 5, 7, 14, 1, '', '0', '0', 1, '2019-01-08 11:15:29', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(31, 31, 2, 0, 0, 'সেরার স্বীকৃতি ১০০ ব্রান্ডকে', '0', 1, 0, NULL, 34, NULL, '3-3', '24', 1, 9, 15, 1, '', '0', '0', 1, '2019-01-08 11:16:03', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(32, 32, 2, 0, 0, 'উৎপাদনশীল পদক পেল ১৬ প্রতিষ্ঠান', '0', 1, 0, NULL, 34, NULL, '1-4', '24', 4, 4, 15, 1, '', '0', '0', 1, '2019-01-08 11:16:31', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(33, 33, 2, 0, 0, 'সততার সঙ্গে ব্যবসা', '0', 1, 0, NULL, 34, NULL, '4-4', '24', 1, 9, 15, 1, '', '0', '0', 1, '2019-01-08 11:16:55', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(34, 34, 2, 0, 0, 'মেট্রো চেম্বারের নতুন কমিটি', '0', 1, 0, NULL, 34, NULL, '3-6', '24', 4, 8, 15, 1, '', '0', '0', 1, '2019-01-08 11:17:21', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(35, 35, 2, 0, 0, 'স্কয়ার গ্রুপের প্রতিষ্ঠাতা', '0', 1, 0, NULL, 34, NULL, '1-1', '24', 1, 8, 3, 1, '', '0', '0', 1, '2019-01-08 11:22:32', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(36, 36, 1, 0, 0, 'এসি আই স্যান্ডাল সোপ', '0', 1, 0, NULL, 30, NULL, '1-3', '24', 3, 2, 1, 3, '', '0', '0', 1, '2019-01-08 11:22:59', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(37, 37, 2, 0, 0, 'Gaaner Raja', '0', 1, 0, NULL, 31, NULL, '5-6', '24', 2, 8, 10, 1, '', '0', '0', 1, '2019-01-08 11:24:38', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(38, 38, 2, 0, 0, 'Hybrid Paddy Attracts', '0', 1, 0, NULL, 5, NULL, '1-8`', '24', 8, 8, 13, 1, '', '0', '0', 1, '2019-01-08 11:24:58', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(41, 41, 2, 0, 0, 'WITH LOVE', '0', 1, 0, NULL, 33, NULL, '1-4', '24', 4, 15, 7, 1, '', '0', '0', 1, '2019-01-08 11:26:31', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(42, 42, 2, 0, 0, 'Ardashir Kabir', '0', 0, 0, NULL, 33, NULL, '5-8', '24', 4, 4, 19, 1, '', '0', '0', 1, '2019-01-08 11:26:56', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(43, 43, 2, 0, 0, 'MCCI re-elects president', '0', 1, 0, NULL, 34, NULL, '1-4', '24', 4, 7, 23, 1, '', '0', '0', 1, '2019-01-08 11:27:29', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(44, 44, 2, 0, 0, '32 cos get ICMAB', '0', 1, 0, NULL, 34, NULL, '1-4', '24', 4, 8, 8, 1, '', '0', '0', 1, '2019-01-08 11:27:55', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(45, 45, 2, 0, 0, 'Full List of CIP', '0', 1, 0, NULL, 34, NULL, '1-5', '24', 5, 12, 17, 1, '', '0', '0', 1, '2019-01-08 11:28:09', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(46, 46, 2, 0, 0, 'Square Group Chairman', '0', 1, 0, NULL, 34, NULL, '5-8', '24', 4, 4, 17, 1, '', '0', '0', 1, '2019-01-08 11:28:23', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(49, 49, 2, 0, 0, 'Pradip Kar CHowdhury', '0', 1, 0, NULL, 32, NULL, '6-8', '24', 3, 3, 18, 1, '', '14', '0', 1, '2019-01-08 11:53:25', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2'),
(50, 50, 2, 0, 0, 'An Agreement Signing', '0', 1, 0, NULL, 32, NULL, '5-8', '24', 4, 5, 16, 1, '', '14', '0', 1, '2019-01-08 11:54:58', '', '', '', '', NULL, NULL, NULL, NULL, 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `dataentryreport`
--

CREATE TABLE `dataentryreport` (
  `Id` int(11) NOT NULL,
  `DataEntryId` int(11) DEFAULT NULL,
  `BatchId` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MediaId` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PublicationName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PublicationLan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PublicationType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PublicationFreq` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PublicationPlace` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ProductName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductCatName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BrandName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subBrand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Company` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Caption` text CHARACTER SET utf8,
  `Date` date DEFAULT NULL,
  `AdType` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HueName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PlaceingName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PositionName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PageId` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Cols` int(3) DEFAULT NULL,
  `Inchs` int(3) DEFAULT NULL,
  `Price` decimal(15,2) DEFAULT NULL,
  `PageNo` int(3) DEFAULT NULL,
  `NewstypeName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Keyword` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Remarks` text COLLATE utf8_unicode_ci,
  `EntryBy` int(3) DEFAULT NULL,
  `EntrydateTime` datetime DEFAULT NULL,
  `UpdateBy` int(3) DEFAULT NULL,
  `UpdateDateTime` datetime DEFAULT NULL,
  `DeleteBy` int(3) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1',
  `outlook` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dataentryreport`
--

INSERT INTO `dataentryreport` (`Id`, `DataEntryId`, `BatchId`, `MediaId`, `PublicationName`, `PublicationLan`, `PublicationType`, `PublicationFreq`, `PublicationPlace`, `ProductName`, `ProductCatName`, `BrandName`, `subBrand`, `Company`, `Caption`, `Date`, `AdType`, `HueName`, `PlaceingName`, `PositionName`, `PageId`, `Cols`, `Inchs`, `Price`, `PageNo`, `NewstypeName`, `Image`, `Keyword`, `Remarks`, `EntryBy`, `EntrydateTime`, `UpdateBy`, `UpdateDateTime`, `DeleteBy`, `DeleteDateTime`, `State`, `outlook`) VALUES
(26, 26, '2', 'Prothom Alo', 'General', 'Bangla', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'Xpel', 'Xpel Aerosol', 'Square Toiletries Lt', 'দুই মাস মশার ঔষুধ ছিটা্নোই হয়নি', '2019-01-06', '1', 'Color', NULL, '1-1', 'Inner', 1, 9, '7000.00', 9, 'News', '', '1', '0', 1, '2019-01-08 11:13:12', NULL, NULL, NULL, NULL, 1, 'Positive'),
(27, 27, '3', 'Prothom Alo', 'General', 'Bangla', 'Newspaper ', 'Daily', 'Dhaka', 'Foods', 'Salt', 'ACI Foods', 'ACI Pure Salt', 'ACI Ltd.', 'চট্টগ্রাম থেকে মোড়কজাত লবণ', '2019-01-06', '1', 'Color', NULL, '1-2', 'Inner', 2, 5, '7000.00', 15, 'News', '', '1', '0', 1, '2019-01-08 11:13:35', NULL, NULL, NULL, NULL, 1, 'Positive'),
(28, 28, '10', 'Prothom Alo', 'General', 'Bangla', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'Square', 'Square', 'Square Toiletries Lt', 'ছবি এঁকে পুরষ্কার পলে খুদে আঁকিয়েরা', '2018-12-01', '1', 'Color', NULL, '4-5', 'Inner', 2, 8, '7000.00', 5, 'News', '', '1', '0', 1, '2019-01-08 11:14:27', NULL, NULL, NULL, NULL, 1, 'Positive'),
(29, 29, '10', 'Prothom Alo', 'General', 'Bangla', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'Square', 'Square', 'Square Toiletries Lt', 'দলমত-নির্বিশেষে ব্যবসায়ীদের জন্য দরজা খোলাঃ প্রধানমন্ত্রী', '2018-12-03', '1', 'Color', NULL, '2-4', 'Inner', 3, 14, '7000.00', 14, 'News', '', '1', '0', 1, '2019-01-08 11:15:03', NULL, NULL, NULL, NULL, 1, 'Positive'),
(30, 30, '10', 'Prothom Alo', 'General', 'Bangla', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'Square', 'Square', 'Square Toiletries Lt', 'সিআইপি কার্ড পেলেন ১৩৭ রপ্তানিকারক', '2018-12-19', '1', 'Color', NULL, '2-6', 'Inner', 5, 7, '7000.00', 14, 'News', '', '1', '0', 1, '2019-01-08 11:15:29', NULL, NULL, NULL, NULL, 1, 'Positive'),
(31, 31, '10', 'Prothom Alo', 'General', 'Bangla', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'Square', 'Square', 'Square Toiletries Lt', 'সেরার স্বীকৃতি ১০০ ব্রান্ডকে', '2019-01-12', '1', 'Color', NULL, '3-3', 'Inner', 1, 9, '7000.00', 15, 'News', '', '1', '0', 1, '2019-01-08 11:16:03', NULL, NULL, NULL, NULL, 1, 'Positive'),
(32, 32, '10', 'Prothom Alo', 'General', 'Bangla', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'Square', 'Square', 'Square Toiletries Lt', 'উৎপাদনশীল পদক পেল ১৬ প্রতিষ্ঠান', '2018-12-12', '1', 'Color', NULL, '1-4', 'Inner', 4, 4, '7000.00', 15, 'News', '', '1', '0', 1, '2019-01-08 11:16:31', NULL, NULL, NULL, NULL, 1, 'Positive'),
(33, 33, '10', 'Prothom Alo', 'General', 'Bangla', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'Square', 'Square', 'Square Toiletries Lt', 'সততার সঙ্গে ব্যবসা', '2019-01-05', '1', 'Color', NULL, '4-4', 'Inner', 1, 9, '7000.00', 15, 'News', '', '1', '0', 1, '2019-01-08 11:16:55', NULL, NULL, NULL, NULL, 1, 'Positive'),
(34, 34, '10', 'Prothom Alo', 'General', 'Bangla', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'Square', 'Square', 'Square Toiletries Lt', 'মেট্রো চেম্বারের নতুন কমিটি', '2018-12-21', '1', 'Color', NULL, '3-6', 'Inner', 4, 8, '7000.00', 15, 'News', '', '1', '0', 1, '2019-01-08 11:17:21', NULL, NULL, NULL, NULL, 1, 'Positive'),
(35, 35, '10', 'Bangladesh Pratidin', 'General', 'Bangla', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'Square', 'Square', 'Square Toiletries Lt', 'স্কয়ার গ্রুপের প্রতিষ্ঠাতা', '2019-01-05', '1', 'Color', NULL, '1-1', 'Inner', 1, 8, '7000.00', 3, 'News', '', '1', '0', 1, '2019-01-08 11:22:32', NULL, NULL, NULL, NULL, 1, 'Positive'),
(36, 36, '1', 'Bangladesh Pratidin', 'General', 'Bangla', 'Newspaper ', 'Daily', 'Dhaka', 'Cosmetics & Toiletries', 'Soap', 'Sandal', 'Sandal Soap', 'ACI Ltd.', 'এসি আই স্যান্ডাল সোপ', '2019-01-06', '1', 'Color', NULL, '1-3', 'Inner', 3, 2, '7000.00', 1, 'Editorial', '', '1', '0', 1, '2019-01-08 11:22:59', NULL, NULL, NULL, NULL, 1, 'Positive'),
(37, 37, '4', 'Daily Star', 'General', 'English', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'Fun Cake', 'ACI Fun Cake', 'ACI Ltd.', 'Gaaner Raja', '2018-12-07', '1', 'Color', NULL, '5-6', 'Inner', 2, 8, '4000.00', 10, 'News', '', '1', '0', 1, '2019-01-08 11:24:38', NULL, NULL, NULL, NULL, 1, 'Positive'),
(38, 38, '5', 'Daily Star', 'General', 'English', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'ACI Foods', 'ACI Chinigura Chal', 'ACI Ltd.', 'Hybrid Paddy Attracts', '2018-12-01', '1', 'Color', NULL, '1-8`', 'Inner', 8, 8, '4000.00', 13, 'News', '', '1', '0', 1, '2019-01-08 11:24:58', NULL, NULL, NULL, NULL, 1, 'Positive'),
(41, 41, '8', 'Daily Star', 'General', 'English', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'Ispahani', 'Ispahani', 'Ispahani Group', 'WITH LOVE', '2018-12-15', '1', 'Color', NULL, '1-4', 'Inner', 4, 15, '4000.00', 7, 'News', '', '1', '0', 1, '2019-01-08 11:26:31', NULL, NULL, NULL, NULL, 1, 'Positive'),
(42, 42, '9', 'Daily Star', 'General', 'English', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'Ispahani', 'Ispahani', 'Ispahani Group', 'Ardashir Kabir', '2018-12-11', '1', '1', NULL, '5-8', 'Inner', 4, 4, '0.00', 19, 'News', '', '1', '0', 1, '2019-01-08 11:26:56', NULL, NULL, NULL, NULL, 1, 'Positive'),
(43, 43, '10', 'Daily Star', 'General', 'English', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'Square', 'Square', 'Square Toiletries Lt', 'MCCI re-elects president', '2018-12-21', '1', 'Color', NULL, '1-4', 'Inner', 4, 7, '4000.00', 23, 'News', '', '1', '0', 1, '2019-01-08 11:27:29', NULL, NULL, NULL, NULL, 1, 'Positive'),
(44, 44, '10', 'Financial Express', 'General', 'English', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'Square', 'Square', 'Square Toiletries Lt', '32 cos get ICMAB', '2018-12-09', '1', 'Color', NULL, '1-4', 'Inner', 4, 8, '3500.00', 8, 'News', '', '1', '0', 1, '2019-01-08 11:27:55', NULL, NULL, NULL, NULL, 1, 'Positive'),
(45, 45, '10', 'Financial Express', 'General', 'English', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'Square', 'Square', 'Square Toiletries Lt', 'Full List of CIP', '2018-12-19', '1', 'Color', NULL, '1-5', 'Inner', 5, 12, '3500.00', 17, 'News', '', '1', '0', 1, '2019-01-08 11:28:09', NULL, NULL, NULL, NULL, 1, 'Positive'),
(46, 46, '10', 'Financial Express', 'General', 'English', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'Square', 'Square', 'Square Toiletries Lt', 'Square Group Chairman', '2018-12-21', '1', 'Color', NULL, '5-8', 'Inner', 4, 4, '3500.00', 17, 'News', '', '1', '0', 1, '2019-01-08 11:28:23', NULL, NULL, NULL, NULL, 1, 'Positive'),
(49, 49, '6', 'Daily Star', 'General', 'English', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'ACI', 'ACI', 'ACI Ltd.', 'Pradip Kar CHowdhury', '2019-01-02', '1', 'Color', NULL, '6-8', 'Inner', 3, 3, '4000.00', 18, 'News', '', 'ACI', '0', 1, '2019-01-08 11:53:25', NULL, NULL, NULL, NULL, 1, 'Positive'),
(50, 50, '7', 'Financial Express', 'General', 'English', 'Newspaper ', 'Daily', 'Dhaka', 'Business & Economy', 'Corporate', 'ACI', 'ACI', 'ACI Ltd.', 'An Agreement Signing', '2019-01-04', '1', 'Color', NULL, '5-8', 'Inner', 4, 5, '3500.00', 16, 'News', '', 'ACI', '0', 1, '2019-01-08 11:54:58', NULL, NULL, NULL, NULL, 1, 'Positive');

-- --------------------------------------------------------

--
-- Table structure for table `hue`
--

CREATE TABLE `hue` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hue`
--

INSERT INTO `hue` (`Id`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(1, 'Color', '', 1, '2015-02-20 16:38:14', NULL, NULL, NULL, NULL, 1),
(2, 'Black & White', '', 1, '2015-02-20 16:38:28', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE `keyword` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `EntryBy` int(11) NOT NULL,
  `EntryDateTime` datetime NOT NULL,
  `UpdateBy` int(11) NOT NULL,
  `UpdateTime` datetime NOT NULL,
  `DeleteBy` int(11) NOT NULL,
  `DeleteDateTime` datetime NOT NULL,
  `State` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keyword`
--

INSERT INTO `keyword` (`Id`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(3, 'JICA', '', 1, '2017-12-03 06:25:52', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(4, 'BTRC', '', 1, '2017-12-03 06:26:01', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(5, 'CPD', '', 1, '2017-12-03 06:26:10', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(6, 'TIB', '', 1, '2017-12-03 06:26:55', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(7, 'Anwar Group', '', 1, '2017-12-03 06:27:05', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(8, 'Berger', '', 1, '2017-12-03 06:27:48', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(9, 'Pran', '', 1, '2017-12-03 06:28:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(10, 'Square', '', 1, '2017-12-03 06:32:06', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(11, 'Bikroy.com', '', 1, '2017-12-03 06:32:46', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(12, 'Ispahani', '', 1, '2017-12-03 06:32:55', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(13, 'Bata', '', 1, '2017-12-03 06:39:25', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(14, 'ACI', '', 1, '2017-12-03 06:39:33', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(15, '??? ', '??? ', 1, '2018-07-15 09:24:13', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Owner` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` text COLLATE utf8_unicode_ci,
  `Image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`Id`, `Name`, `Owner`, `Phone`, `Email`, `Address`, `Image`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(48, 'Prothom Alo', 'Transcom Group', '01733991755', 'adprothomalo@gmail.com', '100 Kazi Nazrul Islam Avenue, CA Bhobon Kawran Bazar', 'med_4442019-01-03_1546492710.png', 1, '2019-01-03 06:18:35', NULL, NULL, NULL, NULL, 1),
(49, 'Financial Express', 'International Publications LImited', '9553550', 'editor@thefinancialexpress-bd.com', 'Tropicana Tower (4th Floor),45,Topkhana Road, Dhaka-1000 . GPO BOX : 2526 Edit', 'med_97842019-01-03_1546492912.png', 1, '2019-01-03 06:21:57', NULL, NULL, NULL, NULL, 1),
(50, 'Daily Star', 'Transcom Group', '9144330', 'editor@thedailystar.net', '229,Tejgaon Industrial Area, Dhaka-1208 GPO BOX: 3257', 'med_71802019-01-03_1546493160.png', 1, '2019-01-03 06:26:05', NULL, NULL, NULL, NULL, 1),
(51, 'Bangladesh Pratidin', 'East West Media Group Limited', '09612120000', 'bdpratidin@gmail.com', '371/A,Block D, Bashundhara', 'med_74452019-01-03_1546493251.png', 1, '2019-01-03 06:27:36', NULL, NULL, NULL, NULL, 1),
(52, 'Asian Age', 'Express Media Ltd.', '9121130', 'editor@daiyasianage.com', 'S R Tower (2nd & 6th Floor), 49 Old Airport Road, Tejgaon, Dhaka-1215 . Print from B.S Printing Press 5212, Toyenb. Circular Road, Sutrapur, Dhaka-1000', 'med_57952019-01-03_1546493643.png', 1, '2019-01-03 06:34:08', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `newscategory`
--

CREATE TABLE `newscategory` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `newscategory`
--

INSERT INTO `newscategory` (`Id`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(1, 'News Category 1', 'News Category 1', 1, '2019-01-03 10:01:20', NULL, NULL, NULL, NULL, 1),
(2, 'News Category 2', 'News Category 2', 1, '2019-01-03 10:01:31', NULL, NULL, NULL, NULL, 1),
(3, 'News Category 3', 'News Category 3', 1, '2019-01-03 10:01:43', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `newstype`
--

CREATE TABLE `newstype` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `newstype`
--

INSERT INTO `newstype` (`Id`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(1, 'News', 'News', 1, '2019-01-03 09:59:26', NULL, NULL, NULL, NULL, 1),
(2, 'Features', 'Features', 1, '2019-01-03 09:59:53', NULL, NULL, NULL, NULL, 1),
(3, 'Editorial', 'Editorial', 1, '2019-01-03 10:00:11', NULL, NULL, NULL, NULL, 1),
(4, 'Post Editorial', 'Post Editorial', 1, '2019-01-03 10:00:34', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE `operation` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `LastModifiedBy` int(11) DEFAULT NULL,
  `LastModifiedDateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `Remarks` text,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` (`Id`, `Name`, `EntryBy`, `EntryDateTime`, `LastModifiedBy`, `LastModifiedDateTime`, `DeleteBy`, `DeleteDateTime`, `Remarks`, `State`) VALUES
(1, 'Entry', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 1),
(2, 'Update', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 1),
(3, 'Delete', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 1),
(4, 'Block', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 1),
(5, 'UnBlock', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 1),
(6, 'Set Privillege', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 1),
(7, 'View', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 1),
(8, 'Archive', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 1),
(9, 'Set Group Right', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 1),
(10, 'Change Password', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 1),
(11, 'Change New Password', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 1),
(15, 'Sorting', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 1),
(16, 'Publish', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 1),
(20, 'Report', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 1),
(22, 'Unpublish', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 1),
(32, 'Verify', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `outlook`
--

CREATE TABLE `outlook` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `EntryBy` int(11) NOT NULL,
  `EntryDateTime` datetime NOT NULL,
  `UpdateBy` int(11) NOT NULL,
  `UpdateTime` datetime NOT NULL,
  `DeleteBy` int(11) NOT NULL,
  `DeleteDateTime` datetime NOT NULL,
  `State` tinyint(4) NOT NULL DEFAULT '1',
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outlook`
--

INSERT INTO `outlook` (`Id`, `Name`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`, `Description`) VALUES
(1, 'Normal', 1, '2018-04-24 10:13:24', 1, '2018-04-24 10:15:23', 0, '0000-00-00 00:00:00', 1, ''),
(2, 'Positive', 1, '2018-04-24 10:14:45', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, ''),
(3, 'Negative', 1, '2018-04-24 10:15:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1',
  `MediaId` int(11) DEFAULT NULL,
  `PublicationId` int(11) DEFAULT NULL,
  `Day` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`Id`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`, `MediaId`, `PublicationId`, `Day`) VALUES
(15, 'First Page ', 'First Page ', 1, '2016-11-06 07:39:32', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(16, 'Back Page', 'Back Page', 1, '2016-11-06 07:39:46', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(17, 'Back Before ', 'Back Before ', 1, '2016-11-06 07:40:22', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(18, 'Front Cover', 'Front Cover', 1, '2016-11-06 07:40:42', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(19, 'Business Front ', 'Business Front', 1, '2016-11-06 07:40:57', 1, '2016-11-10 06:45:45', NULL, NULL, 1, NULL, NULL, NULL),
(20, 'Business Back ', 'Business Back ', 1, '2016-11-06 07:41:12', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(21, 'Entertainment', 'Entertainment', 1, '2016-11-06 07:41:25', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(23, 'Sports', 'Sports', 1, '2016-11-06 07:41:54', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(24, 'Inner', 'Inner', 1, '2016-11-06 07:42:22', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(25, 'Trade & Market', 'Trade & Market', 1, '2016-11-06 07:43:48', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(26, 'Stock & Corporate', 'Stock & Corporate', 1, '2016-11-06 07:44:12', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(27, 'Back Inside Cover', 'Back Inside Cover', 1, '2016-11-06 07:44:35', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(28, 'Front Inside Cover', 'Front Inside Cover', 1, '2016-11-06 07:44:56', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(30, 'Folding Page', 'Folding Page', 1, '2016-11-06 07:45:36', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(31, 'Back Folding Page', 'Back Folding Page', 1, '2016-11-06 07:45:54', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(32, 'Middle Page', 'Middle Page', 1, '2016-11-06 07:46:16', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(33, 'Front Inside', 'Front Inside', 1, '2016-11-06 07:46:40', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(34, '5th Page', '5th Page', 1, '2016-11-06 07:46:59', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(35, '7th Page', '7th Page', 1, '2016-11-06 07:47:16', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(36, '9th Page', '9th Page', 1, '2016-11-06 07:47:38', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(37, 'Front Page (Color)', 'Front Page (Color)', 1, '2016-11-08 06:43:35', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(38, 'Back Page (Color)', 'Back Page (Color)', 1, '2016-11-08 06:43:59', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(39, 'News Second Page(Color)', 'News 2nd Page', 1, '2016-11-08 06:44:55', 1, '2017-04-05 04:35:05', NULL, NULL, 1, NULL, NULL, NULL),
(40, 'News Third Page(Color)', 'News 3rd page', 1, '2016-11-08 06:45:17', 1, '2017-04-05 04:33:39', NULL, NULL, 1, NULL, NULL, NULL),
(41, 'News Third Page (B/W)', 'News 3rd page', 1, '2016-11-08 06:45:42', 1, '2017-04-05 04:34:10', NULL, NULL, 1, NULL, NULL, NULL),
(42, 'News Second Page (B/W)', 'News 2nd Page', 1, '2016-11-08 06:46:25', 1, '2017-04-05 04:34:34', NULL, NULL, 1, NULL, NULL, NULL),
(43, 'Front Folding Cover', 'Front Folding Cover', 1, '2016-11-10 06:47:15', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(45, 'Cover Page', 'Cover Page', 1, '2016-11-10 06:48:16', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(46, 'Back Cover', 'Back Cover', 1, '2016-11-10 08:21:29', 1, '2016-11-10 08:21:46', NULL, NULL, 1, NULL, NULL, NULL),
(47, '2nd Cover Page', '2nd Cover Page', 1, '2016-11-13 07:40:20', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(48, '3rd Cover Page', '3rd Cover Page', 1, '2016-11-13 07:41:46', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(49, 'Business', 'Business', 1, '2016-11-21 07:48:15', 1, '2017-04-11 09:04:41', NULL, NULL, 1, NULL, NULL, NULL),
(50, 'TOP LEADER BOARD', 'TOP LEADER BOARD (ONLINE)', 1, '2017-04-11 06:49:32', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(51, 'LEADER BOARD', 'LEADER BOARD (ONLINE)', 1, '2017-04-11 06:50:06', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(52, 'BANNER', 'BANNER (ONLINE)', 1, '2017-04-11 06:50:40', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(53, 'RECTANGLE BANNER', 'RECTANGLE BANNER (ONLINE)', 1, '2017-04-11 06:51:05', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(54, 'Inner Supplementary', 'Supplementary', 1, '2017-04-11 09:04:24', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(55, 'Third', '', 1, '2017-04-18 05:12:26', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(56, 'Jacket 1st Page', '', 1, '2017-05-15 06:54:49', 1, '2017-05-15 06:57:21', NULL, NULL, 1, NULL, NULL, NULL),
(57, 'Jacket 2nd Page', '', 1, '2017-05-15 06:57:39', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(58, 'Jacket 3rd Page', '', 1, '2017-05-15 07:03:59', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(59, 'Jacket 4th Page', '', 1, '2017-05-15 07:04:11', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(60, 'Youth Express', '', 1, '2017-05-17 08:18:16', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(61, 'Back Inside', '', 1, '2017-07-05 06:46:33', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(62, 'Education And Carrer', '', 1, '2017-07-27 11:10:28', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pageposition`
--

CREATE TABLE `pageposition` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pageposition`
--

INSERT INTO `pageposition` (`Id`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(1, 'Front', 'Front Position', 1, '2015-02-09 15:15:58', NULL, NULL, NULL, NULL, 1),
(2, 'Back', 'Back Position', 1, '2015-02-09 15:16:17', NULL, NULL, NULL, NULL, 1),
(3, 'Sp', 'Special position', 1, '2015-02-09 15:16:31', NULL, NULL, NULL, NULL, 1),
(4, 'Sp(Front)', 'Sp(Front)', 1, '2015-02-09 15:19:26', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `placing`
--

CREATE TABLE `placing` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `placing`
--

INSERT INTO `placing` (`Id`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(1, 'Horizontal', 'Horizontal', 1, '2019-01-03 10:25:58', NULL, NULL, NULL, NULL, 1),
(2, 'Vertical', 'Vertical', 1, '2019-01-03 10:26:11', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `placingtype`
--

CREATE TABLE `placingtype` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `placingtype`
--

INSERT INTO `placingtype` (`Id`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(1, 'Upper Full', 'Upper Full', 1, '2019-01-03 10:27:22', NULL, NULL, NULL, NULL, 1),
(2, 'Upper Right', 'Upper Right', 1, '2019-01-03 10:27:34', NULL, NULL, NULL, NULL, 1),
(3, 'Upper Left', 'Upper Left', 1, '2019-01-03 10:28:00', NULL, NULL, NULL, NULL, 1),
(4, 'Middle Full', 'Middle Full', 1, '2019-01-03 10:28:39', NULL, NULL, NULL, NULL, 1),
(5, 'Middle Right', 'Middle Right', 1, '2019-01-03 10:29:09', NULL, NULL, NULL, NULL, 1),
(6, 'Middle Left', 'Middle Left', 1, '2019-01-03 10:29:26', NULL, NULL, NULL, NULL, 1),
(7, 'Lower Full', 'Lower Full', 1, '2019-01-03 10:29:47', NULL, NULL, NULL, NULL, 1),
(8, 'Lower Right', 'Lower Right', 1, '2019-01-03 10:30:00', NULL, NULL, NULL, NULL, 1),
(9, 'Lower Left', 'Lower Left', 1, '2019-01-03 10:30:39', NULL, NULL, NULL, NULL, 1),
(10, 'Full Page', 'Full Page', 1, '2019-01-03 10:30:49', NULL, NULL, NULL, NULL, 1),
(11, 'Half Page', 'Half page', 1, '2019-01-03 10:31:52', NULL, NULL, NULL, NULL, 1),
(12, 'Business Inner', '', 1, '2019-01-03 10:32:06', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`Id`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(1, 'Top Left ', 'Top Left ', 1, '2016-01-24 02:26:25', NULL, NULL, NULL, NULL, 1),
(2, '555', '555', 1, '2016-10-17 07:44:04', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MediaId` int(11) DEFAULT NULL,
  `PublicationId` int(11) DEFAULT NULL,
  `Day` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`Id`, `Name`, `MediaId`, `PublicationId`, `Day`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(26, 'Prothom Alo Pricing (General)', 48, 40, 'AllDays', 1, '2016-11-10 07:59:21', 1, '2017-05-15 07:06:20', NULL, NULL, 1),
(29, 'Prothom Alo Pricing (Rosh Alo)', 48, 52, 'Weekly', 1, '2016-11-10 08:24:01', 1, '2017-06-12 08:01:06', NULL, NULL, 1),
(30, 'Prothom Alo Pricing (Chutir Dine)', 48, 32, 'Weekly', 1, '2016-11-10 08:26:07', 1, '2017-06-12 08:02:06', NULL, NULL, 1),
(31, 'Prothom Alo Pricing (Naksha)', 48, 33, 'Weekly', 1, '2016-11-10 08:39:00', 1, '2017-06-12 08:07:48', NULL, NULL, 1),
(33, 'Prothom Alo Pricing (Adhuna)', 48, 35, 'Weekly', 1, '2016-11-10 08:53:41', 1, '2017-06-12 08:11:04', NULL, NULL, 1),
(34, 'Prothom Alo Pricing (Bondhu Shova)', 48, 36, 'Sunday', 1, '2016-11-10 09:02:18', 1, '2017-04-05 04:37:25', NULL, NULL, 1),
(35, 'Prothom Alo Pricing (Shopno Niye)', 48, 37, 'Sunday', 1, '2016-11-10 09:04:43', 1, '2017-04-05 04:37:31', NULL, NULL, 1),
(36, 'Prothom Alo Pricing (Anando)', 48, 38, 'Thursday', 1, '2016-11-10 09:09:00', 1, '2017-04-05 04:37:39', NULL, NULL, 1),
(37, 'Prothom Alo Pricing (Projonmo.Com)', 48, 34, 'Friday', 1, '2016-11-10 09:12:45', 1, '2017-04-05 04:37:49', NULL, NULL, 1),
(38, 'Bangladesh Pratidin Pricing(General)', 51, 56, 'AllDays', 1, '2016-11-10 09:36:07', 1, '2017-10-23 11:56:26', NULL, NULL, 1),
(40, 'Bangladesh Pratidin Pricing(Friday)', 51, 193, 'Friday', 1, '2016-11-10 10:00:51', 1, '2017-07-24 08:11:25', NULL, NULL, 1),
(69, 'Financial Express Pricing(General)', 49, 47, 'AllDays', 1, '2016-11-13 10:41:26', 1, '2017-07-27 11:13:07', NULL, NULL, 1),
(92, 'Daily Star Pricing(General)', 50, 54, 'AllDays', 1, '2016-11-14 09:09:21', 1, '2017-10-17 11:38:52', NULL, NULL, 1),
(93, 'Daily Star Pricing(Lifestyle)', 50, 49, 'Sunday', 1, '2016-11-14 09:20:38', 1, '2017-05-17 04:59:38', NULL, NULL, 1),
(94, 'Daily Star Pricing(Showbiz)', 50, 50, 'AllDays', 1, '2016-11-14 09:26:52', 1, '2017-06-04 07:46:40', NULL, NULL, 1),
(95, 'Daily Star Pricing(Shout)', 50, 51, '0', 1, '2016-11-14 09:30:23', NULL, NULL, NULL, NULL, 1),
(96, 'Daily Star Pricing(Star Weekend)', 50, 52, 'Friday', 1, '2016-11-14 09:39:53', 1, '2017-09-09 06:59:02', NULL, NULL, 1),
(128, 'Prothom-Alo.com', 48, 122, 'AllDays', 1, '2017-03-22 04:12:57', NULL, NULL, NULL, NULL, 1),
(130, 'Sonibarer Shokal (B.Pratidin)', 51, 58, 'Saturday', 1, '2017-04-18 05:15:08', 1, '2017-09-17 10:35:15', NULL, NULL, 1),
(135, 'Prothom Alo Pricing (Ma ke nia)', 48, 211, 'Yearly', 1, '2017-05-18 11:48:54', NULL, NULL, NULL, NULL, 1),
(148, 'Eid Upohar', 48, 216, 'Yearly', 1, '2017-07-04 11:16:00', NULL, NULL, NULL, NULL, 1),
(149, 'Eid Binodon (Prothom Alo)', 48, 217, 'Yearly', 1, '2017-07-05 08:09:48', NULL, NULL, NULL, NULL, 1),
(152, 'Asian Age General Price', 52, 60, 'AllDays', 1, '2017-08-09 07:42:29', 1, '2017-09-12 08:04:23', NULL, NULL, 1),
(153, 'Naksha Eid Festival 1', 48, 220, 'Yearly', 1, '2017-08-29 10:43:19', NULL, NULL, NULL, NULL, 1),
(154, 'Naksha Eid Festival 2', 48, 221, 'Yearly', 1, '2017-08-29 10:45:53', NULL, NULL, NULL, NULL, 1),
(157, 'Special Supplementary', 48, 222, 'Yearly', 1, '2017-09-25 07:58:01', 1, '2017-11-05 06:52:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pricedetails`
--

CREATE TABLE `pricedetails` (
  `Id` int(11) NOT NULL,
  `PriceId` int(11) DEFAULT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Hue` int(11) DEFAULT NULL,
  `PageNoId` int(11) DEFAULT NULL,
  `Price` decimal(20,2) DEFAULT NULL,
  `Col` int(2) DEFAULT NULL,
  `Inch` int(2) DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pricedetails`
--

INSERT INTO `pricedetails` (`Id`, `PriceId`, `Name`, `Hue`, `PageNoId`, `Price`, `Col`, `Inch`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(582, 95, 'DS-ST Front', 1, 18, '4000.00', 1, 1, '', 1, '2016-11-14 09:30:24', NULL, NULL, NULL, NULL, 1),
(583, 95, 'DS-ST Front Inner', 1, 33, '2500.00', 1, 1, '', 1, '2016-11-14 09:30:24', NULL, NULL, NULL, NULL, 1),
(584, 95, 'DS-ST Back', 1, 46, '3000.00', 1, 1, '', 1, '2016-11-14 09:30:24', NULL, NULL, NULL, NULL, 1),
(585, 95, 'DS-ST Back Inner', 1, 27, '2500.00', 1, 1, '', 1, '2016-11-14 09:30:24', NULL, NULL, NULL, NULL, 1),
(586, 95, 'DS-ST Inner', 1, 24, '2000.00', 1, 1, '', 1, '2016-11-14 09:30:24', NULL, NULL, NULL, NULL, 1),
(1506, 128, 'PA-online-1st page color', 1, 15, '1050.00', 1, 1, '', 1, '2017-03-22 04:12:57', NULL, NULL, NULL, NULL, 1),
(1507, 128, 'PA-online-2nd page color', 1, 39, '750.00', 1, 1, '', 1, '2017-03-22 04:12:57', NULL, NULL, NULL, NULL, 1),
(1537, 34, 'PA-BS Inner', 1, 24, '3500.00', 1, 1, '', 1, '2017-04-05 04:37:25', NULL, NULL, NULL, NULL, 1),
(1538, 35, 'PA-SN Front', 1, 18, '6500.00', 1, 1, '', 1, '2017-04-05 04:37:31', NULL, NULL, NULL, NULL, 1),
(1539, 35, 'PA-SN Back', 1, 46, '5000.00', 1, 1, '', 1, '2017-04-05 04:37:31', NULL, NULL, NULL, NULL, 1),
(1540, 35, 'PA-SN Inner', 1, 24, '3500.00', 1, 1, '', 1, '2017-04-05 04:37:31', NULL, NULL, NULL, NULL, 1),
(1541, 36, 'PA-AN Front', 1, 18, '6500.00', 1, 1, '', 1, '2017-04-05 04:37:39', NULL, NULL, NULL, NULL, 1),
(1542, 36, 'PA-AN Back', 1, 46, '5000.00', 1, 1, '', 1, '2017-04-05 04:37:39', NULL, NULL, NULL, NULL, 1),
(1543, 36, 'PA-AN Inner', 1, 24, '3500.00', 1, 1, '', 1, '2017-04-05 04:37:39', NULL, NULL, NULL, NULL, 1),
(1544, 37, 'PA-PR Inner', 1, 24, '5500.00', 1, 1, '', 1, '2017-04-05 04:37:49', NULL, NULL, NULL, NULL, 1),
(2329, 26, 'PA -1st Page', 1, 15, '20500.00', 1, 1, '', 1, '2017-05-15 07:06:20', NULL, NULL, NULL, NULL, 1),
(2330, 26, 'Pa- 2nd Page', 1, 39, '12500.00', 1, 1, '', 1, '2017-05-15 07:06:20', NULL, NULL, NULL, NULL, 1),
(2331, 26, 'PA- 3rd Page', 1, 40, '16000.00', 1, 1, '', 1, '2017-05-15 07:06:20', NULL, NULL, NULL, NULL, 1),
(2332, 26, 'PA- 4,6,8,9,10,11,12,14,15,17th Page', 1, 24, '7000.00', 1, 1, '', 1, '2017-05-15 07:06:20', NULL, NULL, NULL, NULL, 1),
(2333, 26, 'PA- 4,6,8,9,10,11,12,14,15,17 Page b/w', 2, 24, '4800.00', 1, 1, '', 1, '2017-05-15 07:06:20', NULL, NULL, NULL, NULL, 1),
(2334, 26, 'PA- 20/24th Back Page', 1, 16, '17500.00', 1, 1, '', 1, '2017-05-15 07:06:21', NULL, NULL, NULL, NULL, 1),
(2335, 26, 'PA- Jacket 1st Page Color', 1, 56, '20500.00', 1, 1, '', 1, '2017-05-15 07:06:21', NULL, NULL, NULL, NULL, 1),
(2336, 26, 'PA- 5th Page b/w', 2, 34, '12500.00', 1, 1, '', 1, '2017-05-15 07:06:21', NULL, NULL, NULL, NULL, 1),
(2337, 26, 'PA- 7/9 th Page', 1, 35, '10000.00', 1, 1, '', 1, '2017-05-15 07:06:21', NULL, NULL, NULL, NULL, 1),
(2338, 26, 'PA- 7/9 th Page b/w', 2, 35, '8000.00', 1, 1, '', 1, '2017-05-15 07:06:21', NULL, NULL, NULL, NULL, 1),
(2339, 26, 'PA- 15th Page', 1, 21, '8000.00', 1, 1, '', 1, '2017-05-15 07:06:21', NULL, NULL, NULL, NULL, 1),
(2340, 26, 'PA- 15th Page b/w', 2, 21, '6000.00', 1, 1, '', 1, '2017-05-15 07:06:21', NULL, NULL, NULL, NULL, 1),
(2341, 26, 'PA- 18/19 th Page', 1, 23, '10000.00', 1, 1, '', 1, '2017-05-15 07:06:21', NULL, NULL, NULL, NULL, 1),
(2342, 26, 'PA- 19th Back Before Page', 1, 17, '11500.00', 1, 1, '', 1, '2017-05-15 07:06:21', NULL, NULL, NULL, NULL, 1),
(2343, 26, 'PA- 13th Page', 1, 49, '8000.00', 1, 1, '', 1, '2017-05-15 07:06:21', NULL, NULL, NULL, NULL, 1),
(2344, 26, 'PA- 13th Page b/w', 2, 49, '6000.00', 1, 1, '', 1, '2017-05-15 07:06:21', NULL, NULL, NULL, NULL, 1),
(2345, 26, 'PA- business front color', 1, 19, '8000.00', 1, 1, '', 1, '2017-05-15 07:06:21', NULL, NULL, NULL, NULL, 1),
(2346, 26, 'PA- business front b/w', 2, 19, '6000.00', 1, 1, '', 1, '2017-05-15 07:06:21', NULL, NULL, NULL, NULL, 1),
(2347, 26, 'PA- business backc olor', 1, 20, '8000.00', 1, 1, '', 1, '2017-05-15 07:06:21', NULL, NULL, NULL, NULL, 1),
(2348, 26, 'PA- business backc b/w', 2, 20, '6000.00', 1, 1, '', 1, '2017-05-15 07:06:21', NULL, NULL, NULL, NULL, 1),
(2349, 26, 'PA- Jacket 2nd Page Color', 1, 57, '12500.00', 1, 1, '', 1, '2017-05-15 07:06:21', NULL, NULL, NULL, NULL, 1),
(2350, 26, 'PA- Jacket 3rd Page Color', 1, 58, '11500.00', 1, 1, '', 1, '2017-05-15 07:06:21', NULL, NULL, NULL, NULL, 1),
(2351, 26, 'PA- Jacket 4th Page Color', 1, 59, '17500.00', 1, 1, '', 1, '2017-05-15 07:06:21', NULL, NULL, NULL, NULL, 1),
(2394, 93, 'DS-LS Front', 1, 18, '6500.00', 1, 1, '', 1, '2017-05-17 04:59:38', NULL, NULL, NULL, NULL, 1),
(2395, 93, 'DS-LS Front Inner', 1, 33, '4500.00', 1, 1, '', 1, '2017-05-17 04:59:38', NULL, NULL, NULL, NULL, 1),
(2396, 93, 'DS-LS Back', 1, 46, '5500.00', 1, 1, '', 1, '2017-05-17 04:59:38', NULL, NULL, NULL, NULL, 1),
(2397, 93, 'DS-LS Back Inner', 1, 27, '4500.00', 1, 1, '', 1, '2017-05-17 04:59:38', NULL, NULL, NULL, NULL, 1),
(2398, 93, 'DS-LS 3rd page', 1, 40, '3500.00', 1, 1, '', 1, '2017-05-17 04:59:38', NULL, NULL, NULL, NULL, 1),
(2399, 93, 'DS-LS Inner', 1, 24, '2500.00', 1, 1, '', 1, '2017-05-17 04:59:38', NULL, NULL, NULL, NULL, 1),
(2400, 93, 'DS-LS Front inside cover', 1, 28, '4500.00', 1, 1, '', 1, '2017-05-17 04:59:38', NULL, NULL, NULL, NULL, 1),
(2455, 135, 'PA-Ma Front cover', 1, 18, '6500.00', 1, 1, '', 1, '2017-05-18 11:48:54', NULL, NULL, NULL, NULL, 1),
(2456, 135, 'PA-Ma Back cover', 1, 46, '5000.00', 1, 1, '', 1, '2017-05-18 11:48:54', NULL, NULL, NULL, NULL, 1),
(2457, 135, 'PA-Ma Inner', 1, 24, '3500.00', 1, 1, '', 1, '2017-05-18 11:48:54', NULL, NULL, NULL, NULL, 1),
(2458, 135, 'PA-Ma Back insider cover', 1, 27, '3500.00', 1, 1, '', 1, '2017-05-18 11:48:54', NULL, NULL, NULL, NULL, 1),
(2459, 135, 'PA-Ma Front inside cover', 1, 28, '3500.00', 1, 1, '', 1, '2017-05-18 11:48:54', NULL, NULL, NULL, NULL, 1),
(2817, 94, 'DS-SB Front', 1, 18, '5000.00', 1, 1, '', 1, '2017-06-04 07:46:40', NULL, NULL, NULL, NULL, 1),
(2818, 94, 'DS-SB Front Inner', 1, 33, '3000.00', 1, 1, '', 1, '2017-06-04 07:46:40', NULL, NULL, NULL, NULL, 1),
(2819, 94, 'DS-SB Back', 1, 46, '4000.00', 1, 1, '', 1, '2017-06-04 07:46:40', NULL, NULL, NULL, NULL, 1),
(2820, 94, 'DS-SB Back Inner', 1, 27, '3000.00', 1, 1, '', 1, '2017-06-04 07:46:40', NULL, NULL, NULL, NULL, 1),
(2821, 94, 'DS-SB Inner', 1, 24, '2000.00', 1, 1, '', 1, '2017-06-04 07:46:40', NULL, NULL, NULL, NULL, 1),
(2822, 94, 'DS-SB Front Inside cover', 1, 28, '3000.00', 1, 1, '', 1, '2017-06-04 07:46:40', NULL, NULL, NULL, NULL, 1),
(3098, 29, 'PA-RA Front', 1, 18, '6500.00', 1, 1, '', 1, '2017-06-12 08:01:06', NULL, NULL, NULL, NULL, 1),
(3099, 29, 'PA-RA Back', 1, 46, '5000.00', 1, 1, '', 1, '2017-06-12 08:01:06', NULL, NULL, NULL, NULL, 1),
(3100, 29, 'PA-RA Inner', 2, 24, '3500.00', 1, 1, '', 1, '2017-06-12 08:01:06', NULL, NULL, NULL, NULL, 1),
(3101, 30, 'PA-CD Front', 1, 18, '6500.00', 1, 1, '', 1, '2017-06-12 08:02:06', NULL, NULL, NULL, NULL, 1),
(3102, 30, 'PA-CD Back', 1, 46, '5000.00', 1, 1, '', 1, '2017-06-12 08:02:07', NULL, NULL, NULL, NULL, 1),
(3103, 30, 'PA-CD Inner', 1, 24, '3500.00', 1, 1, '', 1, '2017-06-12 08:02:07', NULL, NULL, NULL, NULL, 1),
(3104, 31, 'PA-NS Front', 1, 18, '12000.00', 1, 1, '', 1, '2017-06-12 08:07:49', NULL, NULL, NULL, NULL, 1),
(3105, 31, 'PA-NS Back', 1, 46, '11000.00', 1, 1, '', 1, '2017-06-12 08:07:49', NULL, NULL, NULL, NULL, 1),
(3106, 31, 'PA-NS Inner', 1, 24, '8000.00', 1, 1, '', 1, '2017-06-12 08:07:49', NULL, NULL, NULL, NULL, 1),
(3107, 31, 'PA-NS Front inside cover', 1, 28, '8000.00', 1, 1, '', 1, '2017-06-12 08:07:49', NULL, NULL, NULL, NULL, 1),
(3108, 31, 'PA-NS Back inside cover', 1, 27, '11000.00', 1, 1, '', 1, '2017-06-12 08:07:49', NULL, NULL, NULL, NULL, 1),
(3109, 33, 'PA-AD Front', 1, 18, '6500.00', 1, 1, '', 1, '2017-06-12 08:11:04', NULL, NULL, NULL, NULL, 1),
(3110, 33, 'PA-AD Back', 1, 46, '5000.00', 1, 1, '', 1, '2017-06-12 08:11:04', NULL, NULL, NULL, NULL, 1),
(3111, 33, 'PA-AD Inner', 1, 24, '3500.00', 1, 1, '', 1, '2017-06-12 08:11:04', NULL, NULL, NULL, NULL, 1),
(3210, 148, 'PA-EU Front Cover', 1, 18, '6500.00', 1, 1, '', 1, '2017-07-04 11:16:00', NULL, NULL, NULL, NULL, 1),
(3211, 148, 'PA-EU Back Cover', 1, 46, '5000.00', 1, 1, '', 1, '2017-07-04 11:16:00', NULL, NULL, NULL, NULL, 1),
(3212, 148, 'PA-EU Front Inside Cover', 1, 28, '3500.00', 1, 1, '', 1, '2017-07-04 11:16:00', NULL, NULL, NULL, NULL, 1),
(3213, 148, 'PA-EU Back inside Cover', 1, 27, '3500.00', 1, 1, '', 1, '2017-07-04 11:16:00', NULL, NULL, NULL, NULL, 1),
(3214, 148, 'PA-EU Inner', 1, 24, '3500.00', 1, 1, '', 1, '2017-07-04 11:16:00', NULL, NULL, NULL, NULL, 1),
(3249, 149, 'PA-EB Front cover', 1, 18, '6500.00', 1, 1, '', 1, '2017-07-05 08:09:48', NULL, NULL, NULL, NULL, 1),
(3250, 149, 'PA-EB Back cover', 1, 46, '5000.00', 1, 1, '', 1, '2017-07-05 08:09:48', NULL, NULL, NULL, NULL, 1),
(3251, 149, 'PA-EB Inner', 1, 24, '3500.00', 1, 1, '', 1, '2017-07-05 08:09:48', NULL, NULL, NULL, NULL, 1),
(3252, 149, 'PA-EB Front Inside cover', 0, 28, '3500.00', 1, 1, '', 1, '2017-07-05 08:09:48', NULL, NULL, NULL, NULL, 1),
(3253, 149, 'PA-EB Back Inside cover', 0, 27, '3500.00', 1, 1, '', 1, '2017-07-05 08:09:48', NULL, NULL, NULL, NULL, 1),
(3475, 40, 'BP-FD Front', 1, 18, '8500.00', 1, 1, '', 1, '2017-07-24 08:11:25', NULL, NULL, NULL, NULL, 1),
(3476, 40, 'BP-FD Back', 1, 46, '6500.00', 1, 1, '', 1, '2017-07-24 08:11:25', NULL, NULL, NULL, NULL, 1),
(3477, 40, 'BP-FD 3rd', 1, 40, '4500.00', 1, 1, '', 1, '2017-07-24 08:11:25', NULL, NULL, NULL, NULL, 1),
(3478, 40, 'BP-FD Inner', 1, 24, '4500.00', 1, 1, '', 1, '2017-07-24 08:11:25', NULL, NULL, NULL, NULL, 1),
(3479, 40, 'BP-FD Front Inside Cover', 1, 28, '4500.00', 1, 1, '', 1, '2017-07-24 08:11:25', NULL, NULL, NULL, NULL, 1),
(3480, 40, 'BP-FD Back Inside Cover', 1, 27, '4500.00', 1, 1, '', 1, '2017-07-24 08:11:25', NULL, NULL, NULL, NULL, 1),
(3603, 69, 'FE- 1st Page', 1, 15, '10000.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3604, 69, 'FE- 1st Page b/w', 2, 15, '7000.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3605, 69, 'FE- Back Page', 1, 16, '8000.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3606, 69, 'FE- Back Page b/w', 2, 16, '5000.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3607, 69, 'FE- 3rd Page', 1, 40, '5000.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3608, 69, 'FE- 3rd Page b/w', 2, 41, '3000.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3609, 69, 'FE- Inner', 1, 24, '3500.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3610, 69, 'FE- Inner b/w', 2, 24, '2500.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3611, 69, 'FE- Business F', 1, 19, '5000.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3612, 69, 'FE- Business B', 1, 20, '3000.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3613, 69, 'FE- Business trade C', 1, 25, '3500.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3614, 69, 'FE- Business  trade B/w', 2, 25, '2500.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3615, 69, 'FE- 2nd Page color', 1, 39, '8500.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3616, 69, 'FE- 2nd Page b/w', 2, 42, '8000.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3617, 69, 'FE-Stock & Corporate color', 1, 26, '3500.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3618, 69, 'FE-Stock & Corporate b/w', 2, 26, '2500.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3619, 69, 'FE-Youth Express color', 1, 60, '3500.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3620, 69, 'FE-Youth Express b/w', 2, 60, '2500.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3621, 69, 'FE-EDU-Carrer', 1, 62, '3500.00', 1, 1, '', 1, '2017-07-27 11:13:07', NULL, NULL, NULL, NULL, 1),
(3845, 153, 'Naksha Eid Festival 1 FIn', 1, 18, '12000.00', 1, 1, '', 1, '2017-08-29 10:43:19', NULL, NULL, NULL, NULL, 1),
(3846, 153, 'Naksha Eid Festival 1 FInC', 1, 28, '8000.00', 1, 1, '', 1, '2017-08-29 10:43:19', NULL, NULL, NULL, NULL, 1),
(3847, 153, 'Naksha Eid Festival 1 BC', 1, 46, '11000.00', 1, 1, '', 1, '2017-08-29 10:43:19', NULL, NULL, NULL, NULL, 1),
(3848, 153, 'Naksha Eid Festival 1 BInC', 1, 27, '8000.00', 1, 1, '', 1, '2017-08-29 10:43:19', NULL, NULL, NULL, NULL, 1),
(3849, 153, 'Naksha Eid Festival 1 In', 1, 24, '8000.00', 1, 1, '', 1, '2017-08-29 10:43:19', NULL, NULL, NULL, NULL, 1),
(3850, 154, 'Naksha Eid Festival 2 FC', 1, 18, '12000.00', 1, 1, '', 1, '2017-08-29 10:45:53', NULL, NULL, NULL, NULL, 1),
(3851, 154, 'Naksha Eid Festival 2 FInC', 1, 28, '8000.00', 1, 1, '', 1, '2017-08-29 10:45:53', NULL, NULL, NULL, NULL, 1),
(3852, 154, 'Naksha Eid Festival 2 BC', 1, 46, '11000.00', 1, 1, '', 1, '2017-08-29 10:45:53', NULL, NULL, NULL, NULL, 1),
(3853, 154, 'Naksha Eid Festival 2 BInC', 1, 27, '8000.00', 1, 1, '', 1, '2017-08-29 10:45:53', NULL, NULL, NULL, NULL, 1),
(3854, 154, 'Naksha Eid Festival 2 Inn', 1, 24, '8000.00', 1, 1, '', 1, '2017-08-29 10:45:53', NULL, NULL, NULL, NULL, 1),
(4042, 96, 'DS-SW Front', 1, 18, '4500.00', 1, 1, '', 1, '2017-09-09 06:59:02', NULL, NULL, NULL, NULL, 1),
(4043, 96, 'DS-SW Front Inner', 1, 33, '2500.00', 1, 1, '', 1, '2017-09-09 06:59:02', NULL, NULL, NULL, NULL, 1),
(4044, 96, 'DS-SW Back', 1, 46, '3000.00', 1, 1, '', 1, '2017-09-09 06:59:02', NULL, NULL, NULL, NULL, 1),
(4045, 96, 'DS-SW Back Inner', 1, 27, '2500.00', 1, 1, '', 1, '2017-09-09 06:59:02', NULL, NULL, NULL, NULL, 1),
(4046, 96, 'DS-SW Inner', 1, 24, '2000.00', 1, 1, '', 1, '2017-09-09 06:59:02', NULL, NULL, NULL, NULL, 1),
(4047, 96, 'DS-SW Front Inside Cover', 1, 28, '2500.00', 1, 1, '', 1, '2017-09-09 06:59:02', NULL, NULL, NULL, NULL, 1),
(4233, 152, 'A Age First Page', 1, 15, '16000.00', 1, 1, '', 1, '2017-09-12 08:04:23', NULL, NULL, NULL, NULL, 1),
(4234, 152, 'A Age Back Page', 1, 16, '14000.00', 1, 1, '', 1, '2017-09-12 08:04:23', NULL, NULL, NULL, NULL, 1),
(4235, 152, 'A Age Back Before', 1, 17, '9000.00', 1, 1, '', 1, '2017-09-12 08:04:23', NULL, NULL, NULL, NULL, 1),
(4236, 152, 'A Age Business Page', 1, 19, '5000.00', 1, 1, '', 1, '2017-09-12 08:04:23', NULL, NULL, NULL, NULL, 1),
(4237, 152, 'A Age Entertainment Page', 1, 21, '6500.00', 1, 1, '', 1, '2017-09-12 08:04:23', NULL, NULL, NULL, NULL, 1),
(4238, 152, 'A Age Sports Page', 1, 23, '6000.00', 1, 1, '', 1, '2017-09-12 08:04:23', NULL, NULL, NULL, NULL, 1),
(4239, 152, 'A Age Inner Page', 1, 24, '3500.00', 1, 1, '', 1, '2017-09-12 08:04:23', NULL, NULL, NULL, NULL, 1),
(4240, 152, 'A Age Back Cover Page', 1, 46, '3500.00', 1, 1, '', 1, '2017-09-12 08:04:23', NULL, NULL, NULL, NULL, 1),
(4257, 130, 'saturday-morning Front', 1, 18, '17000.00', 1, 1, '', 1, '2017-09-17 10:35:15', NULL, NULL, NULL, NULL, 1),
(4258, 130, 'saturday-morning inner', 1, 24, '4500.00', 1, 1, '', 1, '2017-09-17 10:35:15', NULL, NULL, NULL, NULL, 1),
(4259, 130, 'saturday-morning Back', 1, 16, '6500.00', 1, 1, '', 1, '2017-09-17 10:35:15', NULL, NULL, NULL, NULL, 1),
(4260, 130, 'saturday-morning Third', 1, 40, '4500.00', 1, 1, '', 1, '2017-09-17 10:35:15', NULL, NULL, NULL, NULL, 1),
(4261, 130, 'saturday-morning Back cover', 1, 46, '6500.00', 1, 1, '', 1, '2017-09-17 10:35:15', NULL, NULL, NULL, NULL, 1),
(4262, 130, 'saturday-morning Back inside cover', 1, 27, '6500.00', 1, 1, '', 1, '2017-09-17 10:35:15', NULL, NULL, NULL, NULL, 1),
(4263, 130, 'saturday-morning Back folding Page', 1, 31, '8500.00', 1, 1, '', 1, '2017-09-17 10:35:15', NULL, NULL, NULL, NULL, 1),
(4379, 92, 'DS- 1ST ', 1, 15, '13500.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4380, 92, 'DS- Back Page', 1, 16, '10500.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4381, 92, 'DS-3rd Page', 1, 40, '7500.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4382, 92, 'DS- Inner', 1, 24, '4200.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4383, 92, 'DS- Inner b/w', 2, 24, '3200.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4384, 92, 'DS- 5th Page', 1, 34, '6000.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4385, 92, 'DS- 5th Page b/w', 2, 34, '4500.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4386, 92, 'DS- 7th Page', 1, 35, '4800.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4387, 92, 'DS- 7th Page b/w', 2, 35, '3600.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4388, 92, 'DS-Sports Page', 1, 23, '4200.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4389, 92, 'DS-Sports Page b/w', 2, 23, '3200.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4390, 92, 'DS- Business', 1, 19, '6000.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4391, 92, 'DS- Business back', 1, 20, '4500.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4392, 92, 'DS- Business inner', 1, 24, '4000.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4393, 92, 'DS- Business inner b/w', 2, 24, '3000.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4394, 92, 'DS- Entertain inner', 1, 21, '4200.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4395, 92, 'DS- Entertain inner b/w', 2, 21, '3200.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4396, 92, 'DS-3rd Page b/w', 2, 42, '7500.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4397, 92, 'DS-2nd Page', 1, 39, '7500.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4398, 92, 'DS-3rd Page b/w', 2, 41, '7500.00', 1, 1, '', 1, '2017-10-17 11:38:52', NULL, NULL, NULL, NULL, 1),
(4399, 92, 'DS- Business color', 1, 49, '6000.00', 1, 1, '', 1, '2017-10-17 11:38:53', NULL, NULL, NULL, NULL, 1),
(4400, 92, 'DS- Business b/w', 2, 49, '4500.00', 1, 1, '', 1, '2017-10-17 11:38:53', NULL, NULL, NULL, NULL, 1),
(4401, 92, 'DS- Jacket 1s color', 1, 56, '13500.00', 1, 1, '', 1, '2017-10-17 11:38:53', NULL, NULL, NULL, NULL, 1),
(4402, 92, 'DS- Jacket 2nd color', 1, 57, '7500.00', 1, 1, '', 1, '2017-10-17 11:38:53', NULL, NULL, NULL, NULL, 1),
(4403, 92, 'DS- Front Inside Cover', 1, 28, '7500.00', 1, 1, '', 1, '2017-10-17 11:38:53', NULL, NULL, NULL, NULL, 1),
(4404, 92, 'DS- Back Inside Cover', 1, 27, '7500.00', 1, 1, '', 1, '2017-10-17 11:38:53', NULL, NULL, NULL, NULL, 1),
(4405, 92, 'DS- Back Cover', 1, 46, '7500.00', 1, 1, '', 1, '2017-10-17 11:38:53', NULL, NULL, NULL, NULL, 1),
(4406, 92, 'DS- Jacket 1st Page', 1, 56, '13500.00', 1, 1, '', 1, '2017-10-17 11:38:53', NULL, NULL, NULL, NULL, 1),
(4407, 92, 'DS- Jacket 2nd Page', 1, 57, '7500.00', 1, 1, '', 1, '2017-10-17 11:38:53', NULL, NULL, NULL, NULL, 1),
(4408, 92, 'DS- Jacket 3rd Page', 1, 58, '7500.00', 1, 1, '', 1, '2017-10-17 11:38:53', NULL, NULL, NULL, NULL, 1),
(4409, 92, 'DS- Jacket 4th Page', 1, 59, '10500.00', 1, 1, '', 1, '2017-10-17 11:38:53', NULL, NULL, NULL, NULL, 1),
(4418, 38, 'BP- 1st Page', 1, 15, '17000.00', 1, 1, '', 1, '2017-10-23 11:56:26', NULL, NULL, NULL, NULL, 1),
(4419, 38, 'BP- Back Page', 1, 16, '15000.00', 1, 1, '', 1, '2017-10-23 11:56:26', NULL, NULL, NULL, NULL, 1),
(4420, 38, 'BP- 3rd Page', 1, 40, '10000.00', 1, 1, '', 1, '2017-10-23 11:56:26', NULL, NULL, NULL, NULL, 1),
(4421, 38, 'BP- 2nd Page', 2, 42, '9500.00', 1, 1, '', 1, '2017-10-23 11:56:26', NULL, NULL, NULL, NULL, 1),
(4422, 38, 'BP- 5th Page', 1, 34, '7500.00', 1, 1, '', 1, '2017-10-23 11:56:26', NULL, NULL, NULL, NULL, 1),
(4423, 38, 'BP- Sports', 1, 23, '7500.00', 1, 1, '', 1, '2017-10-23 11:56:26', NULL, NULL, NULL, NULL, 1),
(4424, 38, 'BP- Inner color', 1, 24, '7000.00', 1, 1, '', 1, '2017-10-23 11:56:26', NULL, NULL, NULL, NULL, 1),
(4425, 38, 'BP- Inner b/w', 2, 24, '4500.00', 1, 1, '', 1, '2017-10-23 11:56:26', NULL, NULL, NULL, NULL, 1),
(4426, 38, 'BP- Entertainment', 1, 21, '7000.00', 1, 1, '', 1, '2017-10-23 11:56:26', NULL, NULL, NULL, NULL, 1),
(4427, 38, 'BP- Back Before', 2, 17, '5000.00', 1, 1, '', 1, '2017-10-23 11:56:26', NULL, NULL, NULL, NULL, 1),
(4428, 38, 'BP- 2nd Page color', 1, 39, '11000.00', 1, 1, '', 1, '2017-10-23 11:56:26', NULL, NULL, NULL, NULL, 1),
(4429, 38, 'BP- 3rd Page b/w', 2, 41, '8500.00', 1, 1, '', 1, '2017-10-23 11:56:26', NULL, NULL, NULL, NULL, 1),
(4430, 38, 'BP- Back Inside', 2, 61, '5000.00', 1, 1, '', 1, '2017-10-23 11:56:26', NULL, NULL, NULL, NULL, 1),
(4431, 38, 'BP-Jacket 1st Page', 1, 56, '17000.00', 1, 1, '', 1, '2017-10-23 11:56:26', NULL, NULL, NULL, NULL, 1),
(4432, 38, 'BP-Jacket 2nd Page', 1, 57, '15000.00', 1, 1, '', 1, '2017-10-23 11:56:26', NULL, NULL, NULL, NULL, 1),
(4433, 38, 'BP-Jacket 3rdd Page', 1, 58, '9500.00', 1, 1, '', 1, '2017-10-23 11:56:26', NULL, NULL, NULL, NULL, 1),
(4434, 38, 'BP-Jacket 4th Page', 1, 59, '10000.00', 1, 1, '', 1, '2017-10-23 11:56:26', NULL, NULL, NULL, NULL, 1),
(4435, 38, 'BP- Sports b/w', 2, 23, '4500.00', 1, 1, '', 1, '2017-10-23 11:56:27', NULL, NULL, NULL, NULL, 1),
(4631, 157, 'SS-FC', 1, 18, '6500.00', 1, 1, '', 1, '2017-11-05 06:52:00', NULL, NULL, NULL, NULL, 1),
(4632, 157, 'SS-BC', 1, 46, '6000.00', 1, 1, '', 1, '2017-11-05 06:52:00', NULL, NULL, NULL, NULL, 1),
(4633, 157, 'SS-FIC', 1, 28, '5500.00', 1, 1, '', 1, '2017-11-05 06:52:00', NULL, NULL, NULL, NULL, 1),
(4634, 157, 'SS-BIC', 1, 27, '5000.00', 1, 1, '', 1, '2017-11-05 06:52:00', NULL, NULL, NULL, NULL, 1),
(4635, 157, 'SS-I', 1, 24, '4000.00', 1, 1, '', 1, '2017-11-05 06:52:00', NULL, NULL, NULL, NULL, 1),
(4636, 157, 'SS-Back Page', 1, 16, '6000.00', 1, 1, '', 1, '2017-11-05 06:52:00', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(79, 'Telecommunication', 'Telecommunication', 1, '2016-11-09 07:18:11', 1, '2017-08-09 11:20:01', NULL, NULL, 1),
(80, 'Mobile Phone & Accessories', 'Mobile Phone & Accessories', 1, '2016-11-09 07:19:45', NULL, NULL, NULL, NULL, 1),
(81, 'Foods', 'Foods', 1, '2016-11-09 07:21:09', 1, '2017-04-04 08:32:57', NULL, NULL, 1),
(83, 'Frozen Food', 'Frozen Food', 1, '2016-11-09 07:22:17', NULL, NULL, NULL, NULL, 1),
(84, 'Beverage', 'Beverage', 1, '2016-11-09 07:22:39', NULL, NULL, NULL, NULL, 1),
(85, 'Cosmetics & Toiletries', 'Cosmetics & Toiletries', 1, '2016-11-09 07:23:19', NULL, NULL, NULL, NULL, 1),
(86, 'Consumer Product', 'Consumer Product', 1, '2016-11-09 07:23:42', NULL, NULL, NULL, NULL, 1),
(87, 'Insect Killer', 'Insect Killer', 1, '2016-11-09 07:24:05', NULL, NULL, NULL, NULL, 1),
(88, 'Education', 'Education', 1, '2016-11-09 07:24:23', NULL, NULL, NULL, NULL, 1),
(89, 'Fashion & Lifestyle', 'Fashion & Lifestyle', 1, '2016-11-09 07:24:54', NULL, NULL, NULL, NULL, 1),
(90, 'Home Appliance', 'Home Appliance', 1, '2016-11-09 07:25:48', NULL, NULL, NULL, NULL, 1),
(91, 'Housing & Real estate', 'Housing & Real estate', 1, '2016-11-09 07:26:25', NULL, NULL, NULL, NULL, 1),
(92, 'Media & Publication', 'Media & Publication', 1, '2016-11-09 07:27:13', NULL, NULL, NULL, NULL, 1),
(93, 'Construction Materials', 'Construction Materials', 1, '2016-11-09 07:27:44', NULL, NULL, NULL, NULL, 1),
(94, 'Shopping Mall', 'Shopping Mall', 1, '2016-11-09 07:28:04', NULL, NULL, NULL, NULL, 1),
(95, 'Electric & Electronics', 'Electric & Electronics', 1, '2016-11-09 07:28:38', NULL, NULL, NULL, NULL, 1),
(96, 'Hotel & Tourism', 'Hotel & Tourism', 1, '2016-11-09 07:29:41', NULL, NULL, NULL, NULL, 1),
(97, 'Transport & Communication', 'Transport & Communication', 1, '2016-11-09 07:30:03', NULL, NULL, NULL, NULL, 1),
(98, 'Vehicle Accessories', 'Vehicle Accessories', 1, '2016-11-09 07:31:28', NULL, NULL, NULL, NULL, 1),
(99, 'Banking Services', 'Banking Services', 1, '2016-11-09 07:31:55', NULL, NULL, NULL, NULL, 1),
(100, 'Leisure & Entertainment', 'Leisure & Entertainment', 1, '2016-11-09 07:32:29', NULL, NULL, NULL, NULL, 1),
(101, 'Health & Hospital', 'Health & Hospital', 1, '2016-11-09 07:32:57', NULL, NULL, NULL, NULL, 1),
(102, 'Medicine & Pharmaceuticals', 'Medicine & Pharmaceuticals', 1, '2016-11-09 07:33:30', NULL, NULL, NULL, NULL, 1),
(103, 'Events', 'Events', 1, '2016-11-09 07:34:09', NULL, NULL, NULL, NULL, 1),
(104, 'Miscellaneous', 'Miscellaneous', 1, '2016-11-09 07:34:45', NULL, NULL, NULL, NULL, 1),
(105, 'Antiseptic', 'Antiseptic', 1, '2016-11-09 09:01:14', NULL, NULL, NULL, NULL, 1),
(106, 'Fabric Care', 'Fabric Care', 1, '2016-11-09 09:01:29', 1, '2016-11-09 10:38:52', NULL, NULL, 1),
(107, 'Kitchen Care', 'Kitchen Care', 1, '2016-11-09 09:01:51', NULL, NULL, NULL, NULL, 1),
(108, 'Plastic Products', 'Plastic Products', 1, '2016-11-09 10:37:57', 1, '2016-11-09 10:38:31', NULL, NULL, 1),
(109, 'Surface Cleaner', 'Surface Cleaner', 1, '2016-11-09 10:41:23', NULL, NULL, NULL, NULL, 1),
(110, 'Agro Product', '', 1, '2016-11-22 06:51:43', NULL, NULL, NULL, NULL, 1),
(111, 'Business & Economy', '', 1, '2017-04-12 10:15:51', NULL, NULL, NULL, NULL, 1),
(112, 'IT', '', 1, '2017-05-23 08:16:09', NULL, NULL, NULL, NULL, 1),
(113, 'Equipment & Solution', '', 1, '2017-07-17 08:08:48', NULL, NULL, NULL, NULL, 1),
(114, 'Decorative Paints', '', 1, '2017-11-05 08:14:10', 1, '2017-11-05 08:20:32', NULL, NULL, 1),
(116, 'General', '', 1, '2017-12-13 10:45:47', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

CREATE TABLE `product_cat` (
  `Id` int(11) NOT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_cat`
--

INSERT INTO `product_cat` (`Id`, `ProductId`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(1, 85, 'Soap', 'Soap', 1, '2019-01-06 10:43:23', NULL, NULL, NULL, NULL, 1),
(2, 111, 'Corporate', 'Corporate', 1, '2019-01-06 10:51:18', NULL, NULL, NULL, NULL, 1),
(3, 81, 'Salt', 'Salt', 1, '2019-01-06 10:57:25', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pubfrequency`
--

CREATE TABLE `pubfrequency` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pubfrequency`
--

INSERT INTO `pubfrequency` (`Id`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(1, 'Daily', 'Daily', 1, '2016-11-08 07:00:17', NULL, NULL, NULL, NULL, 1),
(2, 'Weekly', 'Weekly', 1, '2016-11-08 07:00:29', NULL, NULL, NULL, NULL, 1),
(3, 'Fortnightly', 'Fortnightly', 1, '2016-11-08 07:00:42', NULL, NULL, NULL, NULL, 1),
(4, 'Monthly', 'Monthly', 1, '2016-11-08 07:00:55', NULL, NULL, NULL, NULL, 1),
(5, 'Yearly', 'Yearly', 1, '2016-11-08 07:01:13', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MediaId` int(11) DEFAULT NULL,
  `PublicationType` int(11) DEFAULT NULL,
  `PubPlaceId` int(3) DEFAULT NULL,
  `PubFreQuencyId` int(3) DEFAULT NULL,
  `PublicationLan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `Logo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`Id`, `Name`, `MediaId`, `PublicationType`, `PubPlaceId`, `PubFreQuencyId`, `PublicationLan`, `Description`, `Logo`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(31, 'Rosh Alo', 48, 2, 1, 2, 'Bangla', 'Tabulate Paper size [Monday]', '', 0, '2019-01-03 07:06:29', NULL, NULL, NULL, NULL, 1),
(32, 'Chutir Dine', 48, 2, 1, 2, 'Bangla', 'Tabulate Paper size [Saturday]', '', 0, '2019-01-03 07:08:12', 0, '2019-01-03 07:15:50', NULL, NULL, 1),
(33, 'Naksha', 48, 2, 1, 2, 'Bangla', 'Tabulate Paper size [Tuesday]', '', 0, '2019-01-03 07:17:04', NULL, NULL, NULL, NULL, 1),
(34, 'Projonmo', 48, 2, 1, 2, 'Bangla', 'Paper size supp [Friday]', '', 0, '2019-01-03 07:17:59', NULL, NULL, NULL, NULL, 1),
(35, 'Adhuna', 48, 2, 1, 2, 'Bangla', 'Paper size supp [Wednesday]', '', 0, '2019-01-03 07:18:42', NULL, NULL, NULL, NULL, 1),
(36, 'Bondhu Shova', 48, 2, 1, 2, 'Bangla', 'Paper size supp [Sunday]', '', 0, '2019-01-03 07:19:27', NULL, NULL, NULL, NULL, 1),
(37, 'Shopno Niye', 48, 2, 1, 2, 'Bangla', 'Paper size supp [Sunday]', '', 0, '2019-01-03 07:20:11', NULL, NULL, NULL, NULL, 1),
(38, 'Anondo', 48, 2, 1, 2, 'Bangla', 'Paper size supp [Thursday]', '', 0, '2019-01-03 07:20:55', NULL, NULL, NULL, NULL, 1),
(39, 'Gollachut', 48, 2, 1, 2, 'Bangla', '[Friday]', '', 0, '2019-01-03 08:01:27', NULL, NULL, NULL, NULL, 1),
(40, 'General', 48, 1, 1, 1, 'Bangla', 'Daily Newspaper', '', 0, '2019-01-03 08:03:13', NULL, NULL, NULL, NULL, 1),
(47, 'General', 49, 1, 1, 1, 'English', 'Daily Newspaper', '', 0, '2019-01-03 08:28:26', NULL, NULL, NULL, NULL, 1),
(48, 'Special Supplimentary', 49, 2, 1, 5, 'English', 'Yearly Supplementary', '', 0, '2019-01-03 08:32:29', 0, '2019-01-03 08:55:44', NULL, NULL, 1),
(49, 'Life Style', 50, 2, 1, 2, 'English', 'Tabulate Paper size [Tuesday]', '', 0, '2019-01-03 08:36:33', NULL, NULL, NULL, NULL, 1),
(50, 'Showbiz', 50, 2, 1, 2, 'English', 'Tabulate Paper size [Saturday]', '', 0, '2019-01-03 08:37:46', NULL, NULL, NULL, NULL, 1),
(51, 'Shout', 50, 2, 1, 2, 'English', 'Tabulate Paper size [Thursday]', '', 0, '2019-01-03 08:39:50', NULL, NULL, NULL, NULL, 1),
(52, 'Star Weekend', 50, 2, 1, 2, 'English', 'Tabulate Paper size [Friday]', '', 0, '2019-01-03 08:51:54', NULL, NULL, NULL, NULL, 1),
(53, 'Friday', 50, 2, 1, 2, 'English', 'Tabulate Paper size [Friday]', '', 0, '2019-01-03 08:53:20', NULL, NULL, NULL, NULL, 1),
(54, 'General', 50, 1, 1, 1, 'English', 'Daily Newspaper', '', 0, '2019-01-03 08:54:31', NULL, NULL, NULL, NULL, 1),
(55, 'Special Supplementary', 50, 2, 1, 5, 'English', 'Yearly Supplementary', '', 0, '2019-01-03 08:57:52', NULL, NULL, NULL, NULL, 1),
(56, 'General', 51, 1, 1, 1, 'Bangla', 'Daily Newspaper', '', 0, '2019-01-03 08:59:33', NULL, NULL, NULL, NULL, 1),
(57, 'Friday', 51, 2, 1, 2, 'Bangla', 'Tabulate Paper size [Friday]', '', 0, '2019-01-03 09:00:51', NULL, NULL, NULL, NULL, 1),
(58, 'Sonibarer Shokal', 51, 2, 1, 2, 'Bangla', 'Tabulate Paper size [Saturday]', '', 0, '2019-01-03 09:02:43', NULL, NULL, NULL, NULL, 1),
(59, 'Special Supplementary', 51, 2, 1, 5, 'Bangla', 'Yearly Supplementary', '', 0, '2019-01-03 09:03:39', NULL, NULL, NULL, NULL, 1),
(60, 'General', 52, 1, 1, 1, 'English', 'Daily Newspaper', '', 0, '2019-01-03 09:04:47', NULL, NULL, NULL, NULL, 1),
(61, 'Special Supplementary', 52, 2, 1, 5, 'English', 'Yearly Supplementary', '', 0, '2019-01-03 09:05:51', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pubplace`
--

CREATE TABLE `pubplace` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pubplace`
--

INSERT INTO `pubplace` (`Id`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(1, 'Dhaka', 'Dhaka', 1, '2016-11-08 06:59:04', NULL, NULL, NULL, NULL, 1),
(2, 'Chittagong', 'Chittagong', 1, '2016-11-08 06:59:39', NULL, NULL, NULL, NULL, 1),
(3, 'Sylhet', 'Sylhet', 1, '2016-11-08 07:09:49', NULL, NULL, NULL, NULL, 1),
(4, 'Barisal', 'Barisal', 1, '2016-11-08 07:10:09', NULL, NULL, NULL, NULL, 1),
(5, 'Khulna', 'Khulna', 1, '2016-11-08 07:10:24', NULL, NULL, NULL, NULL, 1),
(6, 'Rajshahi', 'Rajshahi', 1, '2016-11-08 07:10:36', NULL, NULL, NULL, NULL, 1),
(7, 'Rangpur', 'Rangpur', 1, '2016-11-08 07:10:48', NULL, NULL, NULL, NULL, 1),
(8, 'Comilla', 'Comilla', 1, '2016-11-08 07:11:02', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pubtype`
--

CREATE TABLE `pubtype` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pubtype`
--

INSERT INTO `pubtype` (`Id`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(1, 'Newspaper ', 'Newspaper ', 1, '2016-11-08 06:58:08', NULL, NULL, NULL, NULL, 1),
(2, 'Supplementary', 'Supplementary', 1, '2016-11-08 06:58:21', NULL, NULL, NULL, NULL, 1),
(3, 'Magazine', 'Magazine', 1, '2016-11-08 06:58:37', NULL, NULL, NULL, NULL, 1),
(4, 'Online News', '', 1, '2017-04-11 06:02:29', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `spot`
--

CREATE TABLE `spot` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `spot`
--

INSERT INTO `spot` (`Id`, `Name`, `Description`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(1, 'Fp', 'Front Page', 1, '2015-02-09 15:13:01', NULL, NULL, NULL, NULL, 1),
(2, 'Front', 'Front Page', 1, '2015-02-09 15:14:23', NULL, NULL, 1, '2015-02-09 15:16:38', 0),
(3, 'BP', 'BP', 1, '2015-02-09 15:16:51', NULL, NULL, NULL, NULL, 1),
(4, '3', 'third Page', 1, '2015-02-09 15:17:11', NULL, NULL, NULL, NULL, 1),
(5, 'Inner', 'Inner Page', 1, '2015-02-09 15:17:24', NULL, NULL, NULL, NULL, 1),
(6, '5th', '5th', 1, '2015-02-09 15:17:39', NULL, NULL, NULL, NULL, 1),
(7, '7th', '7th', 1, '2015-02-09 15:17:44', NULL, NULL, NULL, NULL, 1),
(8, '9th', '9th', 1, '2015-02-09 15:17:50', NULL, NULL, NULL, NULL, 1),
(9, 'SP', 'Special', 1, '2015-02-09 15:18:13', NULL, NULL, NULL, NULL, 1),
(10, '2', 'Second page', 1, '2015-02-09 15:18:26', NULL, NULL, NULL, NULL, 1),
(11, 'Binodon', 'Binodon', 1, '2015-02-09 15:18:36', NULL, NULL, NULL, NULL, 1),
(12, 'Back Before', 'Back Before', 1, '2015-02-09 15:18:46', NULL, NULL, NULL, NULL, 1),
(13, 'Business', 'Business', 1, '2015-02-09 15:18:55', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subbrand`
--

CREATE TABLE `subbrand` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CompanyId` int(11) DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `BrandId` int(11) DEFAULT NULL,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subbrand`
--

INSERT INTO `subbrand` (`Id`, `Name`, `CompanyId`, `Description`, `BrandId`, `EntryBy`, `EntryDateTime`, `UpdateBy`, `UpdateTime`, `DeleteBy`, `DeleteDateTime`, `State`) VALUES
(1, 'ACI Pure Mixed Dal', 1, 'ACI Pure Mixed Dal', 25, 1, '2019-01-05 09:44:15', 1, '2019-01-05 09:46:49', NULL, NULL, 1),
(2, 'ACI Pure Salt', 1, 'ACI Pure Salt', 25, 1, '2019-01-05 09:45:24', NULL, NULL, NULL, NULL, 1),
(3, 'ACI Pure Spices', 1, 'ACI Pure Spices', 25, 1, '2019-01-05 09:50:26', NULL, NULL, NULL, NULL, 1),
(4, 'ACI Nutrilife Rice Bran Oil', 1, 'ACI Nutrilife Rice Bran Oil', 25, 1, '2019-01-05 09:51:37', NULL, NULL, NULL, NULL, 1),
(5, 'ACI Chinigura Chal', 1, 'ACI Chinigura Chal', 25, 1, '2019-01-05 09:55:10', NULL, NULL, NULL, NULL, 1),
(6, 'ACI Gura Morich', 1, 'ACI Gura Morich', 25, 1, '2019-01-05 09:55:37', NULL, NULL, NULL, NULL, 1),
(7, 'AC I Stick Noodles', 1, 'AC I Stick Noodles', 25, 1, '2019-01-05 09:56:10', NULL, NULL, NULL, NULL, 1),
(8, 'ACI Mixed Masala', 1, 'ACI Mixed Masala', 25, 1, '2019-01-05 09:56:34', NULL, NULL, NULL, NULL, 1),
(9, 'ACI Pure Ata', 1, 'ACI Pure Ata', 25, 1, '2019-01-05 09:57:18', NULL, NULL, NULL, NULL, 1),
(10, 'ACI Fortified Soyabean', 1, 'ACI Fortified Soyabean', 25, 1, '2019-01-05 09:58:00', NULL, NULL, NULL, NULL, 1),
(11, 'ACI Pure Thai Noodles', 1, 'ACI Pure Thai Noodles', 25, 1, '2019-01-05 09:58:35', NULL, NULL, NULL, NULL, 1),
(12, 'Savlon Handwash', 1, 'Savlon Handwash', 1, 1, '2019-01-05 09:59:34', NULL, NULL, NULL, NULL, 1),
(13, 'Savlon Antiseptic', 1, 'Savlon Antiseptic', 25, 1, '2019-01-05 10:00:15', NULL, NULL, NULL, NULL, 1),
(14, 'Salvon Diaper', 1, 'Salvon Diaper', 1, 1, '2019-01-05 10:03:56', NULL, NULL, NULL, NULL, 1),
(15, 'Savlon Soap', 1, 'Savlon Soap', 1, 1, '2019-01-05 10:04:46', NULL, NULL, NULL, NULL, 1),
(16, 'Yamaha Saluto 125CC', 2, 'Yamaha Saluto 125CC', 6, 1, '2019-01-05 10:08:25', NULL, NULL, NULL, NULL, 1),
(17, 'Yamaha Motorcycle', 2, 'Yamaha Motorcycle', 6, 1, '2019-01-05 10:09:01', NULL, NULL, NULL, NULL, 1),
(18, 'Ispahani Green Tea', 3, 'Ispahani Green Tea', 7, 1, '2019-01-05 10:12:56', NULL, NULL, NULL, NULL, 1),
(19, 'Ispahani Blenders Choice', 3, 'Ispahani Blenders Choice', 7, 1, '2019-01-05 10:14:22', NULL, NULL, NULL, NULL, 1),
(20, 'Ispahani Mirzapore Tea', 3, 'Ispahani Mirzapore Tea', 7, 1, '2019-01-05 10:17:20', NULL, NULL, NULL, NULL, 1),
(21, 'Meril Revive Perfect Fairness', 5, 'Meril Revive Perfect Fairness', 9, 1, '2019-01-05 10:35:47', NULL, NULL, NULL, NULL, 1),
(22, 'Jui Hair Oil', 5, 'Jui Hair Oil', 8, 1, '2019-01-05 10:36:33', NULL, NULL, NULL, NULL, 1),
(23, 'Super Mom Diapers', 5, 'Super Mom Diapers', 11, 1, '2019-01-05 10:42:07', NULL, NULL, NULL, NULL, 1),
(24, 'Senora Sanitary Napkin', 5, 'Senora Sanitary Napkin', 12, 1, '2019-01-05 10:42:44', NULL, NULL, NULL, NULL, 1),
(25, 'White Plus Toothpast', 5, 'White Plus Toothpaste', 16, 1, '2019-01-05 10:44:52', NULL, NULL, NULL, NULL, 1),
(26, 'Select Plus Shampoo', 5, 'Select Plus Shampoo', 17, 1, '2019-01-05 10:45:54', NULL, NULL, NULL, NULL, 1),
(27, 'Xpel Aerosol', 5, 'Xpel Aerosol', 18, 1, '2019-01-05 10:51:46', NULL, NULL, NULL, NULL, 1),
(28, 'Chaka Super White Powder', 5, 'Chaka Super White Powder', 22, 1, '2019-01-05 10:58:50', NULL, NULL, NULL, NULL, 1),
(29, 'Revive Talcum Powder', 5, 'Revive Talcum Powder', 24, 1, '2019-01-05 11:02:06', NULL, NULL, NULL, NULL, 1),
(30, 'Sandal Soap', 1, 'Sandal Soap', 26, 1, '2019-01-06 10:46:20', NULL, NULL, NULL, NULL, 1),
(31, 'ACI Fun Cake', 1, 'ACI Fun Cake', 27, 1, '2019-01-06 11:05:20', NULL, NULL, NULL, NULL, 1),
(32, 'ACI', 1, '', 28, 1, '2019-01-06 11:15:49', NULL, NULL, NULL, NULL, 1),
(33, 'Ispahani', 3, 'Ispahani', 29, 1, '2019-01-06 11:21:24', NULL, NULL, NULL, NULL, 1),
(34, 'Square', 5, 'Square', 30, 1, '2019-01-07 05:31:46', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `synopsis`
--

CREATE TABLE `synopsis` (
  `Id` int(11) NOT NULL,
  `DataEntryReportId` int(11) DEFAULT NULL,
  `SummaryId` int(20) DEFAULT NULL,
  `Title` text,
  `Summary` text,
  `EntryBy` int(11) DEFAULT NULL,
  `EntryDateTime` datetime DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `DeleteBy` int(11) DEFAULT NULL,
  `DeleteDateTime` datetime DEFAULT NULL,
  `State` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sysuserright`
--

CREATE TABLE `sysuserright` (
  `Id` int(11) NOT NULL,
  `SysUserCatId` int(11) DEFAULT NULL,
  `OperationId` int(11) DEFAULT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Url` varchar(200) DEFAULT NULL,
  `Title` varchar(200) DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1',
  `Order` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sysuserright`
--

INSERT INTO `sysuserright` (`Id`, `SysUserCatId`, `OperationId`, `Name`, `Url`, `Title`, `State`, `Order`) VALUES
(1, 0, 3, '31we', 'werqwe', 'wetqwet', 0, NULL),
(2, 2, 1, 'News Entry', 'dataentry/index', 'News Entry', 1, NULL),
(3, 2, 1, 'Ad Entry', 'adentry/index', 'Ad Entry', 1, NULL),
(4, 3, 1, 'Media Name', 'medianame/index', 'Media Name', 1, NULL),
(5, 3, 1, 'Publication', 'publication/index', 'Publication', 1, NULL),
(6, 3, 1, 'Page Setup', 'pagename/index', 'Page Name & Number', 1, NULL),
(7, 3, 1, 'Page Setup', 'price/index', 'Price Setup', 0, NULL),
(8, 4, 1, 'News Type', 'newstype/index  ', 'News Type', 1, NULL),
(9, 4, 1, 'News Category', 'newscategory/index', 'News Category', 1, NULL),
(10, 5, 1, 'Ad Category', 'adcategory/index', 'Ad Category', 1, NULL),
(11, 5, 1, 'Brand', 'brand/index', 'Brand', 1, NULL),
(12, 5, 1, 'Sub-Brand', 'subbrand/index', 'Sub-Brand', 1, NULL),
(13, 7, 1, 'Placing', 'spot/index', 'Placing', 1, NULL),
(14, 7, 1, 'Page Type', 'pageposition/index', 'Page Type', 1, NULL),
(15, 3, 1, 'parameter', 'parameter/index', 'parameter', 1, NULL),
(16, 3, 1, 'Publication Place', 'publicationplace/index', 'Publication Place', 0, NULL),
(17, 3, 1, 'Publication Frequency', 'publicationfrequency/index', 'Publication Frequency', 0, NULL),
(18, 3, 1, 'Company', 'company/index', 'Company', 0, NULL),
(19, 3, 1, 'Product ', 'productcat/index', 'Product', 1, NULL),
(20, 3, 1, 'company', 'company/index', 'Company', 1, NULL),
(21, 8, 1, 'Ad-Report Download', 'report/index', 'Report', 1, NULL),
(22, 5, 1, 'Ad Info', 'adinfo/index', 'Ad Info', 1, NULL),
(23, 9, 20, 'Sub news repoart', 'newsrepoart/index', '', 0, NULL),
(24, 11, 0, 'Sub news report', 'newsrepoart/', '', 0, NULL),
(25, 12, 20, 'News Report Download', 'newsrepoart', '', 0, NULL),
(26, 14, 20, 'Download News Report', 'newsreport', '', 1, NULL),
(27, 15, 0, 'Create News Alert', 'createnewsalert/index', 'Create News Alert', 1, NULL),
(28, 15, 0, 'Show News Alert', 'shownewsalert/index', 'Show News Alert', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sysuserrightcat`
--

CREATE TABLE `sysuserrightcat` (
  `Id` int(11) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Url` varchar(200) DEFAULT NULL,
  `Order` int(11) DEFAULT NULL,
  `State` tinyint(4) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sysuserrightcat`
--

INSERT INTO `sysuserrightcat` (`Id`, `Name`, `Url`, `Order`, `State`) VALUES
(1, 'Dash Board', 'index', 1, 0),
(2, 'Data Entry', 'dataentry/index', 2, 1),
(3, 'Media Setup', 'mediasutup/index', 3, 1),
(4, 'News Setup', 'newssetup/index', 4, 1),
(5, 'Ad Setup', 'adsetup/index', 5, 1),
(6, 'Log Out', 'user/logout', 6, 0),
(7, 'Tarrif Setup', 'tarrif/index', 7, 1),
(8, 'Ad-Report', 'report/index', 8, 1),
(9, 'News Report', 'newsrepoart/index', 8, 0),
(12, 'News Report', 'newsrepoart', 10, 0),
(13, 'News Report', 'newsrepoart', 10, 0),
(14, 'News report', 'newsrepoart', 10, 1),
(15, 'News Alert', 'newsalert/index', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userright`
--

CREATE TABLE `userright` (
  `Id` int(11) NOT NULL,
  `UserTableId` int(11) DEFAULT NULL,
  `SysuserRightId` int(11) DEFAULT NULL,
  `State` tinyint(3) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `UserId` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `DesignationId` int(11) DEFAULT NULL,
  `UserGroupId` int(11) DEFAULT '1',
  `Location` text,
  `Phone` varchar(200) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Picture` text,
  `Signature` text,
  `PasswordChangeStatus` tinyint(1) DEFAULT '0',
  `AdminStatus` tinyint(1) DEFAULT '0',
  `CreateBy` int(11) DEFAULT NULL,
  `State` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `UserId`, `Password`, `Name`, `DesignationId`, `UserGroupId`, `Location`, `Phone`, `Email`, `Picture`, `Signature`, `PasswordChangeStatus`, `AdminStatus`, `CreateBy`, `State`) VALUES
(1, 'a', 'a', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adcategory`
--
ALTER TABLE `adcategory`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NewIndex1` (`Name`);

--
-- Indexes for table `adentry`
--
ALTER TABLE `adentry`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `adentrydetails`
--
ALTER TABLE `adentrydetails`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `adentryreport`
--
ALTER TABLE `adentryreport`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `adinfo`
--
ALTER TABLE `adinfo`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NewIndex1` (`Name`);

--
-- Indexes for table `dataentry`
--
ALTER TABLE `dataentry`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `dataentrydetails`
--
ALTER TABLE `dataentrydetails`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `dataentryreport`
--
ALTER TABLE `dataentryreport`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `hue`
--
ALTER TABLE `hue`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NewIndex1` (`Name`);

--
-- Indexes for table `keyword`
--
ALTER TABLE `keyword`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NewIndex1` (`Name`);

--
-- Indexes for table `newscategory`
--
ALTER TABLE `newscategory`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NewIndex1` (`Name`);

--
-- Indexes for table `newstype`
--
ALTER TABLE `newstype`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NewIndex1` (`Name`);

--
-- Indexes for table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `outlook`
--
ALTER TABLE `outlook`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NewIndex1` (`Name`);

--
-- Indexes for table `pageposition`
--
ALTER TABLE `pageposition`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NewIndex1` (`Name`);

--
-- Indexes for table `placing`
--
ALTER TABLE `placing`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NewIndex1` (`Name`);

--
-- Indexes for table `placingtype`
--
ALTER TABLE `placingtype`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NewIndex1` (`Name`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NewIndex1` (`Name`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Name` (`Name`,`MediaId`,`PublicationId`);

--
-- Indexes for table `pricedetails`
--
ALTER TABLE `pricedetails`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Name` (`Name`,`PageNoId`,`Col`,`Inch`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NewIndex1` (`Name`);

--
-- Indexes for table `product_cat`
--
ALTER TABLE `product_cat`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NewIndex1` (`Name`);

--
-- Indexes for table `pubfrequency`
--
ALTER TABLE `pubfrequency`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NewIndex1` (`Name`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NewIndex1` (`Name`,`MediaId`);

--
-- Indexes for table `pubplace`
--
ALTER TABLE `pubplace`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NewIndex1` (`Name`);

--
-- Indexes for table `pubtype`
--
ALTER TABLE `pubtype`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NewIndex1` (`Name`);

--
-- Indexes for table `spot`
--
ALTER TABLE `spot`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NewIndex1` (`Name`);

--
-- Indexes for table `subbrand`
--
ALTER TABLE `subbrand`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `synopsis`
--
ALTER TABLE `synopsis`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sysuserright`
--
ALTER TABLE `sysuserright`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sysuserrightcat`
--
ALTER TABLE `sysuserrightcat`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `userright`
--
ALTER TABLE `userright`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adcategory`
--
ALTER TABLE `adcategory`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `adentry`
--
ALTER TABLE `adentry`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `adentrydetails`
--
ALTER TABLE `adentrydetails`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `adentryreport`
--
ALTER TABLE `adentryreport`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `adinfo`
--
ALTER TABLE `adinfo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dataentry`
--
ALTER TABLE `dataentry`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `dataentrydetails`
--
ALTER TABLE `dataentrydetails`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `dataentryreport`
--
ALTER TABLE `dataentryreport`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `hue`
--
ALTER TABLE `hue`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keyword`
--
ALTER TABLE `keyword`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `newscategory`
--
ALTER TABLE `newscategory`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newstype`
--
ALTER TABLE `newstype`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `outlook`
--
ALTER TABLE `outlook`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `pageposition`
--
ALTER TABLE `pageposition`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `placing`
--
ALTER TABLE `placing`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `placingtype`
--
ALTER TABLE `placingtype`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `pricedetails`
--
ALTER TABLE `pricedetails`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4637;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `product_cat`
--
ALTER TABLE `product_cat`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pubfrequency`
--
ALTER TABLE `pubfrequency`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `pubplace`
--
ALTER TABLE `pubplace`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pubtype`
--
ALTER TABLE `pubtype`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `spot`
--
ALTER TABLE `spot`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subbrand`
--
ALTER TABLE `subbrand`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `synopsis`
--
ALTER TABLE `synopsis`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sysuserright`
--
ALTER TABLE `sysuserright`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sysuserrightcat`
--
ALTER TABLE `sysuserrightcat`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userright`
--
ALTER TABLE `userright`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
