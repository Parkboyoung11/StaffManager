-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 06, 2017 at 04:45 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `StaffManager`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `adminID` int(4) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isFirstLogin` tinyint(4) NOT NULL,
  `adMail` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`adminID`, `username`, `password`, `isFirstLogin`, `adMail`) VALUES
(1, 'son', '356a192b7913b04c54574d18c28d46e6395428ab', 0, 'vuhongsonjv11@gmail.com'),
(2, 'hieu', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', 0, 'vuhongsonjv11@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Connector`
--

CREATE TABLE `Connector` (
  `ID` int(4) NOT NULL,
  `uID` int(4) NOT NULL,
  `deID` int(4) NOT NULL,
  `isManager` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Connector`
--

INSERT INTO `Connector` (`ID`, `uID`, `deID`, `isManager`) VALUES
(1, 1002, 1199, 0),
(2, 1112, 1201, 0),
(3, 1113, 1199, 0),
(4, 1114, 1201, 0),
(5, 1115, 1201, 0),
(6, 1116, 1199, 0),
(7, 1117, 1201, 0),
(8, 1118, 1201, 0),
(10, 1120, 1199, 0),
(11, 1234, 1199, 1),
(12, 1130, 1199, 0),
(16, 1121, 1199, 0),
(17, 1131, 1199, 0),
(23, 1123, 1199, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

CREATE TABLE `Department` (
  `departID` int(4) NOT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isDelete` tinyint(4) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Department`
--

INSERT INTO `Department` (`departID`, `name`, `description`, `isDelete`, `created`, `updated`) VALUES
(1199, 'D1 | Moblie', '<p>We are family. love</p>', 0, '2017-11-02', '2017-11-05'),
(1201, 'D2 | hehe', '<p>no infor</p>', 0, '2017-10-30', '2017-10-30'),
(1302, 'D3 | Web PHP', '<p>i don know</p>', 0, '2017-10-30', '2017-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userID` int(4) NOT NULL,
  `username` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  `email` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `isFirstLogin` tinyint(4) NOT NULL,
  `isResetFlag` tinyint(4) NOT NULL,
  `isDeteleFlag` tinyint(4) NOT NULL,
  `errorLogin` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `username`, `password`, `created`, `updated`, `email`, `isFirstLogin`, `isResetFlag`, `isDeteleFlag`, `errorLogin`, `token`) VALUES
(1002, 'Parkboyoung', 'ac51c2b397c1152a7b1047df180f5548', '2017-10-30', '2017-11-05', 'thearsenalfans@gmail.com', 0, 1, 0, 0, NULL),
(1112, 'jvevermind', 'ac51c2b397c1152a7b1047df180f5548', '2017-10-30', '2017-10-30', 'jvevermind@gmail.com', 1, 1, 0, 0, NULL),
(1113, 'faze niko', 'ac51c2b397c1152a7b1047df180f5548', '2017-10-30', '2017-10-30', 'niko@gmail.com', 1, 1, 0, 0, NULL),
(1114, 'guadian', 'ac51c2b397c1152a7b1047df180f5548', '2017-10-30', '2017-10-30', 'guadian@gmail.com', 1, 1, 0, 0, NULL),
(1115, 'olofmaeiter', 'ac51c2b397c1152a7b1047df180f5548', '2017-10-30', '2017-10-30', 'olof@gmail.com', 1, 1, 0, 0, NULL),
(1116, 'karigan', 'ac51c2b397c1152a7b1047df180f5548', '2017-10-30', '2017-10-30', 'kari@gmail.com', 1, 1, 0, 0, NULL),
(1117, 'rain', 'ac51c2b397c1152a7b1047df180f5548', '2017-10-30', '2017-10-30', 'rain@gmail.com', 1, 1, 0, 0, NULL),
(1118, 'simple', 'ac51c2b397c1152a7b1047df180f5548', '2017-10-30', '2017-10-30', 'sim@gmail.com', 1, 1, 0, 0, NULL),
(1120, 'chimsedinang', 'ac51c2b397c1152a7b1047df180f5548', '2017-10-30', '2017-10-30', 'csdn@gmail.com', 1, 1, 0, 0, NULL),
(1121, 'YuHa', '7c3e84d4442330b2845abc2302d80371', '2017-11-04', '2017-11-06', 'yuha@gmail.com', 0, 0, 0, 0, NULL),
(1123, 'northernStar', 'ac51c2b397c1152a7b1047df180f5548', '2017-11-05', '2017-11-05', 'vuminhhieujv11@gmail.com', 1, 1, 0, 0, NULL),
(1130, 'fakerSKT', 'ac51c2b397c1152a7b1047df180f5548', '2017-10-30', '2017-11-04', 'faker@gmail.com', 1, 1, 0, 0, NULL),
(1131, 'TakizawaLaura', 'ac51c2b397c1152a7b1047df180f5548', '2017-11-05', '2017-11-05', 'TakizawaLaura@gmail.com', 1, 1, 0, 0, NULL),
(1234, 'sonvuhong', 'ac51c2b397c1152a7b1047df180f5548', '2017-10-30', '2017-10-30', '20153247@student.hust.edu.vn', 0, 1, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `UsersDetail`
--

CREATE TABLE `UsersDetail` (
  `udID` int(4) NOT NULL,
  `FullName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Birthday` date DEFAULT NULL,
  `Address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Avatar` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Gender` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `UsersDetail`
--

INSERT INTO `UsersDetail` (`udID`, `FullName`, `Birthday`, `Address`, `Avatar`, `Gender`) VALUES
(1002, 'Park Bo Young', '1990-02-12', 'Seoul', 'https://i.imgur.com/FuymaS3.png', 0),
(1112, NULL, NULL, NULL, NULL, NULL),
(1113, NULL, NULL, NULL, NULL, NULL),
(1114, NULL, NULL, NULL, NULL, NULL),
(1115, NULL, NULL, NULL, NULL, NULL),
(1116, NULL, NULL, NULL, NULL, NULL),
(1117, NULL, NULL, NULL, NULL, NULL),
(1118, NULL, NULL, NULL, NULL, NULL),
(1120, NULL, NULL, NULL, NULL, NULL),
(1121, 'Yuha Nguyen', '1997-12-31', 'Tokyo', 'imgs/Avatar/1121.png', 0),
(1123, NULL, NULL, NULL, NULL, NULL),
(1130, NULL, NULL, NULL, NULL, NULL),
(1131, NULL, NULL, NULL, NULL, NULL),
(1234, 'Vu Hong Son', '1997-12-09', 'Hanoi, Viet Nam', 'https://i.imgur.com/WrwRXrX.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `Connector`
--
ALTER TABLE `Connector`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fkUsers` (`uID`),
  ADD KEY `fkDepart` (`deID`);

--
-- Indexes for table `Department`
--
ALTER TABLE `Department`
  ADD PRIMARY KEY (`departID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `UsersDetail`
--
ALTER TABLE `UsersDetail`
  ADD PRIMARY KEY (`udID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `adminID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Connector`
--
ALTER TABLE `Connector`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Connector`
--
ALTER TABLE `Connector`
  ADD CONSTRAINT `fkDepart` FOREIGN KEY (`deID`) REFERENCES `Department` (`departID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkUsers` FOREIGN KEY (`uID`) REFERENCES `Users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `UsersDetail`
--
ALTER TABLE `UsersDetail`
  ADD CONSTRAINT `fkUserDetail` FOREIGN KEY (`udID`) REFERENCES `Users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
