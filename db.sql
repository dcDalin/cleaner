-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2017 at 07:31 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cleaners`
--

-- --------------------------------------------------------

--
-- Table structure for table `clean_modules_info`
--

CREATE TABLE IF NOT EXISTS `clean_modules_info` (
  `moduleID` int(11) NOT NULL AUTO_INCREMENT,
  `moduleTitle` varchar(200) NOT NULL,
  `modulePrice` int(10) NOT NULL,
  `moduleDescription` varchar(250) NOT NULL,
  PRIMARY KEY (`moduleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `clean_modules_info`
--

INSERT INTO `clean_modules_info` (`moduleID`, `moduleTitle`, `modulePrice`, `moduleDescription`) VALUES
(1, 'Clean Module One', 1000, 'Basic Cleaning of few Cloth items'),
(2, 'Clean Module Two', 2000, 'Involves Clothes and Dishes');

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE IF NOT EXISTS `recovery` (
  `userID` int(10) NOT NULL,
  `securityQuestion` varchar(100) NOT NULL,
  `securityAnswer` varchar(100) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `recoveryID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`recoveryID`) COMMENT 'recovery PK',
  KEY `userID` (`userID`) COMMENT 'References userID in tbl_users'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `request_cleaner`
--

CREATE TABLE IF NOT EXISTS `request_cleaner` (
  `requestID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `moduleID` int(200) NOT NULL,
  `dateToClean` date NOT NULL,
  `dateRequested` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `cleanerID` int(11) NOT NULL,
  `customerDescription` text NOT NULL,
  `completed` enum('N','M','Y') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`requestID`) COMMENT 'pk',
  KEY `userID` (`userID`),
  KEY `moduleID` (`moduleID`),
  KEY `userID_2` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `request_cleaner`
--

INSERT INTO `request_cleaner` (`requestID`, `userID`, `moduleID`, `dateToClean`, `dateRequested`, `status`, `cleanerID`, `customerDescription`, `completed`) VALUES
(1, 11, 2, '2017-03-30', '2017-03-29 09:33:01', '1', 20, 'Thorough cleaning boy', 'Y'),
(3, 11, 2, '2017-03-30', '2017-03-29 12:35:39', '1', 21, 'Focus on dishes please.', 'M'),
(4, 11, 1, '2017-03-30', '2017-03-29 19:24:37', '1', 20, 'Spread the bed with the blue bed covers', 'N'),
(5, 11, 1, '2017-04-01', '2017-03-29 19:25:48', '1', 21, 'Clean some more', 'Y'),
(6, 11, 2, '2017-03-30', '2017-03-29 19:26:48', '1', 21, 'Yea man', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE IF NOT EXISTS `tbl_comments` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `requestID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `cleanerID` int(10) NOT NULL,
  `cleanerComments` text NOT NULL,
  `customerComments` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`commentID`),
  KEY `requestID` (`requestID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`commentID`, `requestID`, `userID`, `cleanerID`, `cleanerComments`, `customerComments`, `status`) VALUES
(9, 1, 11, 20, '', 'PATHETIC', '0'),
(10, 5, 11, 21, '', 'BS', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userFname` varchar(100) NOT NULL,
  `userLname` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPhone` int(10) NOT NULL,
  `userGender` varchar(10) NOT NULL,
  `userEstate` varchar(100) NOT NULL,
  `userHouseNo` varchar(100) NOT NULL,
  `userEstateDescription` text NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'Y',
  `userLevel` int(5) NOT NULL DEFAULT '1',
  `changePass` enum('Y','N') NOT NULL,
  `cleanerStatus` enum('active','inactive','flagged') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `userFname`, `userLname`, `userEmail`, `userPhone`, `userGender`, `userEstate`, `userHouseNo`, `userEstateDescription`, `userPass`, `userStatus`, `userLevel`, `changePass`, `cleanerStatus`) VALUES
(11, 'Customer', 'Chapel', 'chapel@email.com', 72388923, 'Female', 'Ngara', 'n64', 'Behind Something Round about', '5f4dcc3b5aa765d61d8327deb882cf99', 'Y', 3, 'Y', 'active'),
(12, 'Admin', 'Admin', 'admin@admin.com', 12, 'Female', '_', '_', '_', '5f4dcc3b5aa765d61d8327deb882cf99', 'Y', 1, 'Y', 'active'),
(13, 'This', 'is another', 'example@anotherone.com', 3489348, 'Male', 'Esas', 'ds', 'Make your way', 'd41d8cd98f00b204e9800998ecf8427e', 'Y', 3, 'Y', 'active'),
(14, 'Biro', 'Pen', 'biro@pen.com', 8389209, 'Male', 'biro', 'sd', 'descibe', '5f4dcc3b5aa765d61d8327deb882cf99', 'Y', 3, 'Y', 'active'),
(15, 'George', 'Eazey', 'george@eazey.com', 829383990, 'Male', 'Westlands', 'aa', 'Behind Naivas', '5f4dcc3b5aa765d61d8327deb882cf99', 'Y', 3, 'Y', 'active'),
(16, 'i mean', 'it', 'imean@it.com', 34834, 'Male', 'wundany', 'a', 'des', '5f4dcc3b5aa765d61d8327deb882cf99', 'Y', 3, 'Y', 'active'),
(17, 'Maggie', 'Mwai', 'mwai@mwai.com', 232323, 'Female', '', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'Y', 2, 'Y', 'flagged'),
(19, 'Dalin', 'Oluoch', 'mcdalinoluoch@gmail.com', 715973838, 'Male', 'Nairobi', 'e', 'Behind Primary School', '5f4dcc3b5aa765d61d8327deb882cf99', 'Y', 3, 'Y', 'active'),
(20, 'Coca', 'Cola', 'coca@cola.com', 83942890, 'Male', '', '', '', 'md5(password)', 'Y', 2, 'Y', 'active'),
(21, 'Hellen', 'Swoto', 'hellen@swoto.com', 920230, 'Female', '', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'Y', 2, '', 'active');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recovery`
--
ALTER TABLE `recovery`
  ADD CONSTRAINT `recovery_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `tbl_users` (`userID`);

--
-- Constraints for table `request_cleaner`
--
ALTER TABLE `request_cleaner`
  ADD CONSTRAINT `request_cleaner_ibfk_1` FOREIGN KEY (`moduleID`) REFERENCES `clean_modules_info` (`moduleID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `request_cleaner_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `tbl_users` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD CONSTRAINT `tbl_comments_ibfk_1` FOREIGN KEY (`requestID`) REFERENCES `request_cleaner` (`requestID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
