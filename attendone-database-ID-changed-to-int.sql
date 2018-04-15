-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2018 at 09:43 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atten-done`
--

-- --------------------------------------------------------

--
-- Table structure for table `Attn_Record`
--

CREATE TABLE `Attn_Record` (
  `Status` varchar(10) DEFAULT NULL,
  `Length` varchar(3) NOT NULL DEFAULT '0',
  `St_ID` int(8) NOT NULL,
  `C_name` varchar(20) NOT NULL,
  `S_ID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

CREATE TABLE `Class` (
  `C_name` varchar(20) NOT NULL,
  `Capacity` varchar(3) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `S_ID` int(8) NOT NULL,
  `T_ID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Leaderboard`
--

CREATE TABLE `Leaderboard` (
  `C_name` varchar(20) NOT NULL,
  `S_ID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Parent`
--

CREATE TABLE `Parent` (
  `Name` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `P_ID` int(8) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `School`
--

CREATE TABLE `School` (
  `S_ID` int(8) NOT NULL,
  `S_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `Name` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `St_ID` int(8) NOT NULL,
  `Age` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Teacher`
--

CREATE TABLE `Teacher` (
  `Name` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `T_ID` int(8) NOT NULL,
  `S_ID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Attn_Record`
--
ALTER TABLE `Attn_Record`
  ADD PRIMARY KEY (`C_name`),
  ADD KEY `FOREIGNKEY2` (`S_ID`),
  ADD KEY `FOREIGNKEY3` (`St_ID`);

--
-- Indexes for table `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`C_name`),
  ADD KEY `FOREIGNKEY` (`S_ID`),
  ADD KEY `FOREIGNKEY1` (`T_ID`);

--
-- Indexes for table `Leaderboard`
--
ALTER TABLE `Leaderboard`
  ADD KEY `FOREIGNKEY5` (`S_ID`),
  ADD KEY `FOREIGNKEY6` (`C_name`);

--
-- Indexes for table `Parent`
--
ALTER TABLE `Parent`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `School`
--
ALTER TABLE `School`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`St_ID`);

--
-- Indexes for table `Teacher`
--
ALTER TABLE `Teacher`
  ADD PRIMARY KEY (`T_ID`),
  ADD KEY `FOREIGNKEY7` (`S_ID`);

ALTER TABLE `student` CHANGE `St_ID` `St_ID` INT(8) NOT NULL AUTO_INCREMENT;
ALTER TABLE `teacher` CHANGE `T_ID` `T_ID` INT(8) NOT NULL AUTO_INCREMENT;
ALTER TABLE `parent` CHANGE `P_ID` `P_ID` INT(8) NOT NULL AUTO_INCREMENT;
ALTER TABLE `school` CHANGE `S_ID` `S_ID` INT(8) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Attn_Record`
--
ALTER TABLE `Attn_Record`
  ADD CONSTRAINT `FOREIGNKEY2` FOREIGN KEY (`S_ID`) REFERENCES `School` (`S_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FOREIGNKEY3` FOREIGN KEY (`St_ID`) REFERENCES `Student` (`St_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FOREIGNKEY4` FOREIGN KEY (`C_name`) REFERENCES `Class` (`C_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Class`
--
ALTER TABLE `Class`
  ADD CONSTRAINT `FOREIGNKEY` FOREIGN KEY (`S_ID`) REFERENCES `School` (`S_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FOREIGNKEY1` FOREIGN KEY (`T_ID`) REFERENCES `Teacher` (`T_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Leaderboard`
--
ALTER TABLE `Leaderboard`
  ADD CONSTRAINT `FOREIGNKEY5` FOREIGN KEY (`S_ID`) REFERENCES `School` (`S_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FOREIGNKEY6` FOREIGN KEY (`C_name`) REFERENCES `Class` (`C_name`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `teacher`
  ADD CONSTRAINT `FOREIGNKEY7` FOREIGN KEY (`S_ID`) REFERENCES `School` (`S_ID`) ON DELETE CASCADE ON UPDATE CASCADE;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
