-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2017 at 06:04 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cleaner`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `administrators`
-- (See below for the actual view)
--
CREATE TABLE `administrators` (
`userID` int(11)
,`userFname` varchar(100)
,`userLname` varchar(100)
,`userEmail` varchar(100)
,`userPhone` int(10)
,`userGender` varchar(10)
,`userEstate` varchar(100)
,`userHouseNo` varchar(100)
,`userEstateDescription` text
,`userPass` varchar(100)
,`userStatus` enum('Y','N')
,`userLevel` int(5)
,`changePass` enum('Y','N')
,`cleanerStatus` enum('active','inactive','flagged')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cleaners`
-- (See below for the actual view)
--
CREATE TABLE `cleaners` (
`userID` int(11)
,`userFname` varchar(100)
,`userLname` varchar(100)
,`userEmail` varchar(100)
,`userPhone` int(10)
,`userGender` varchar(10)
,`userEstate` varchar(100)
,`userHouseNo` varchar(100)
,`userEstateDescription` text
,`userPass` varchar(100)
,`userStatus` enum('Y','N')
,`userLevel` int(5)
,`changePass` enum('Y','N')
,`cleanerStatus` enum('active','inactive','flagged')
);

-- --------------------------------------------------------

--
-- Table structure for table `clean_modules_info`
--

CREATE TABLE `clean_modules_info` (
  `moduleID` int(11) NOT NULL,
  `moduleTitle` varchar(200) NOT NULL,
  `modulePrice` int(10) NOT NULL,
  `moduleDescription` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clean_modules_info`
--

INSERT INTO `clean_modules_info` (`moduleID`, `moduleTitle`, `modulePrice`, `moduleDescription`) VALUES
(1, 'Clean Module One', 1000, 'Basic Cleaning of few Cloth items'),
(2, 'Clean Module Two', 2000, 'Involves Clothes and Dishes');

-- --------------------------------------------------------

--
-- Stand-in structure for view `customers`
-- (See below for the actual view)
--
CREATE TABLE `customers` (
`userID` int(11)
,`userFname` varchar(100)
,`userLname` varchar(100)
,`userEmail` varchar(100)
,`userPhone` int(10)
,`userGender` varchar(10)
,`userEstate` varchar(100)
,`userHouseNo` varchar(100)
,`userEstateDescription` text
,`userPass` varchar(100)
,`userStatus` enum('Y','N')
,`userLevel` int(5)
,`changePass` enum('Y','N')
,`cleanerStatus` enum('active','inactive','flagged')
);

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE `recovery` (
  `userID` int(10) NOT NULL,
  `securityQuestion` varchar(100) NOT NULL,
  `securityAnswer` varchar(100) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `recoveryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request_cleaner`
--

CREATE TABLE `request_cleaner` (
  `requestID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `moduleID` int(200) NOT NULL,
  `dateToClean` date NOT NULL,
  `dateRequested` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `cleanerID` int(11) NOT NULL,
  `customerDescription` text NOT NULL,
  `completed` enum('N','M','Y') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_cleaner`
--

INSERT INTO `request_cleaner` (`requestID`, `userID`, `moduleID`, `dateToClean`, `dateRequested`, `status`, `cleanerID`, `customerDescription`, `completed`) VALUES
(1, 11, 2, '2017-03-30', '2017-03-29 09:33:01', '1', 20, 'Thorough cleaning boy', 'Y'),
(3, 11, 2, '2017-03-30', '2017-03-29 12:35:39', '1', 21, 'Focus on dishes please.', 'M'),
(4, 11, 1, '2017-03-30', '2017-03-29 19:24:37', '1', 20, 'Spread the bed with the blue bed covers', 'N'),
(5, 11, 1, '2017-04-01', '2017-03-29 19:25:48', '1', 21, 'Clean some more', 'Y'),
(6, 11, 2, '2017-03-30', '2017-03-29 19:26:48', '1', 21, 'Yea man', 'M'),
(7, 11, 2, '2017-07-10', '2017-07-09 14:39:28', '0', 0, 'nothing really', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `commentID` int(11) NOT NULL,
  `requestID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `cleanerID` int(10) NOT NULL,
  `cleanerComments` text NOT NULL,
  `customerComments` text NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_users` (
  `userID` int(11) NOT NULL,
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
  `cleanerStatus` enum('active','inactive','flagged') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(21, 'Hellen', 'Swoto', 'hellen@swoto.com', 920230, 'Female', '', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'Y', 2, '', 'active'),
(22, 'Tecno', 'Own', 'tecno@own.com', 9802389, 'Female', 'Kariobangi', '2de', 'Kwa chief', '5f4dcc3b5aa765d61d8327deb882cf99', 'Y', 3, 'Y', 'active');

-- --------------------------------------------------------

--
-- Structure for view `administrators`
--
DROP TABLE IF EXISTS `administrators`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `administrators`  AS  select `tbl_users`.`userID` AS `userID`,`tbl_users`.`userFname` AS `userFname`,`tbl_users`.`userLname` AS `userLname`,`tbl_users`.`userEmail` AS `userEmail`,`tbl_users`.`userPhone` AS `userPhone`,`tbl_users`.`userGender` AS `userGender`,`tbl_users`.`userEstate` AS `userEstate`,`tbl_users`.`userHouseNo` AS `userHouseNo`,`tbl_users`.`userEstateDescription` AS `userEstateDescription`,`tbl_users`.`userPass` AS `userPass`,`tbl_users`.`userStatus` AS `userStatus`,`tbl_users`.`userLevel` AS `userLevel`,`tbl_users`.`changePass` AS `changePass`,`tbl_users`.`cleanerStatus` AS `cleanerStatus` from `tbl_users` where (`tbl_users`.`userLevel` = '1') ;

-- --------------------------------------------------------

--
-- Structure for view `cleaners`
--
DROP TABLE IF EXISTS `cleaners`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cleaners`  AS  select `tbl_users`.`userID` AS `userID`,`tbl_users`.`userFname` AS `userFname`,`tbl_users`.`userLname` AS `userLname`,`tbl_users`.`userEmail` AS `userEmail`,`tbl_users`.`userPhone` AS `userPhone`,`tbl_users`.`userGender` AS `userGender`,`tbl_users`.`userEstate` AS `userEstate`,`tbl_users`.`userHouseNo` AS `userHouseNo`,`tbl_users`.`userEstateDescription` AS `userEstateDescription`,`tbl_users`.`userPass` AS `userPass`,`tbl_users`.`userStatus` AS `userStatus`,`tbl_users`.`userLevel` AS `userLevel`,`tbl_users`.`changePass` AS `changePass`,`tbl_users`.`cleanerStatus` AS `cleanerStatus` from `tbl_users` where (`tbl_users`.`userLevel` = '2') ;

-- --------------------------------------------------------

--
-- Structure for view `customers`
--
DROP TABLE IF EXISTS `customers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customers`  AS  select `tbl_users`.`userID` AS `userID`,`tbl_users`.`userFname` AS `userFname`,`tbl_users`.`userLname` AS `userLname`,`tbl_users`.`userEmail` AS `userEmail`,`tbl_users`.`userPhone` AS `userPhone`,`tbl_users`.`userGender` AS `userGender`,`tbl_users`.`userEstate` AS `userEstate`,`tbl_users`.`userHouseNo` AS `userHouseNo`,`tbl_users`.`userEstateDescription` AS `userEstateDescription`,`tbl_users`.`userPass` AS `userPass`,`tbl_users`.`userStatus` AS `userStatus`,`tbl_users`.`userLevel` AS `userLevel`,`tbl_users`.`changePass` AS `changePass`,`tbl_users`.`cleanerStatus` AS `cleanerStatus` from `tbl_users` where (`tbl_users`.`userLevel` = '3') ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clean_modules_info`
--
ALTER TABLE `clean_modules_info`
  ADD PRIMARY KEY (`moduleID`);

--
-- Indexes for table `recovery`
--
ALTER TABLE `recovery`
  ADD PRIMARY KEY (`recoveryID`) COMMENT 'recovery PK',
  ADD KEY `userID` (`userID`) COMMENT 'References userID in tbl_users';

--
-- Indexes for table `request_cleaner`
--
ALTER TABLE `request_cleaner`
  ADD PRIMARY KEY (`requestID`) COMMENT 'pk',
  ADD KEY `userID` (`userID`),
  ADD KEY `moduleID` (`moduleID`),
  ADD KEY `userID_2` (`userID`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `requestID` (`requestID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clean_modules_info`
--
ALTER TABLE `clean_modules_info`
  MODIFY `moduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `recovery`
--
ALTER TABLE `recovery`
  MODIFY `recoveryID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `request_cleaner`
--
ALTER TABLE `request_cleaner`
  MODIFY `requestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
