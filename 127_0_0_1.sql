-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 06:07 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hochilltrip`
--
CREATE DATABASE IF NOT EXISTS `hochilltrip` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hochilltrip`;

-- --------------------------------------------------------

--
-- Table structure for table `attraction`
--

CREATE TABLE `attraction` (
  `attractionID` int(11) NOT NULL,
  `googleId` varchar(128) NOT NULL,
  `name` varchar(256) NOT NULL,
  `lat` float NOT NULL,
  `lon` float NOT NULL,
  `img` mediumtext NOT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `address` varchar(512) NOT NULL,
  `businessHour` varchar(16) NOT NULL,
  `rating` float NOT NULL,
  `countryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attraction_comment`
--

CREATE TABLE `attraction_comment` (
  `commentID` int(11) NOT NULL,
  `attractionID` int(11) NOT NULL,
  `userID` varchar(32) NOT NULL,
  `comment` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attraction_type`
--

CREATE TABLE `attraction_type` (
  `id` int(11) NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blogID` int(11) NOT NULL,
  `planID` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `commentID` int(11) NOT NULL,
  `blogID` int(11) NOT NULL,
  `userID` varchar(32) NOT NULL,
  `comment` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countryID` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryID`, `name`) VALUES
(1, 'Japan'),
(2, 'Taiwan'),
(3, 'Switzerland'),
(4, 'United Kingdom'),
(5, 'Hong Kong');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `planID` int(11) NOT NULL,
  `useTransport` tinyint(1) NOT NULL,
  `noOfParty` int(11) DEFAULT NULL,
  `countryID` int(11) NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `start_location` varchar(128) DEFAULT NULL,
  `end_location` varchar(128) DEFAULT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plan_content`
--

CREATE TABLE `plan_content` (
  `planID` int(11) NOT NULL,
  `day` int(11) DEFAULT NULL,
  `attractionID` int(11) DEFAULT NULL,
  `placeOrder` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `start_time` char(5) DEFAULT NULL,
  `type` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userrate_attraction`
--

CREATE TABLE `userrate_attraction` (
  `attractionID` int(11) NOT NULL,
  `userID` varchar(32) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userrate_blog`
--

CREATE TABLE `userrate_blog` (
  `blogID` int(11) NOT NULL,
  `userID` varchar(32) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_plan`
--

CREATE TABLE `user_plan` (
  `userID` varchar(32) NOT NULL,
  `planID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attraction`
--
ALTER TABLE `attraction`
  ADD PRIMARY KEY (`attractionID`),
  ADD UNIQUE KEY `googleId` (`googleId`),
  ADD KEY `attraction_countryID_fk` (`countryID`);

--
-- Indexes for table `attraction_comment`
--
ALTER TABLE `attraction_comment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `attraction_comment_attractionID_fk` (`attractionID`),
  ADD KEY `attraction_comment_userID_fk` (`userID`);

--
-- Indexes for table `attraction_type`
--
ALTER TABLE `attraction_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogID`),
  ADD KEY `blog_planId_fk` (`planID`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `blog_comment_blogID_fk` (`blogID`),
  ADD KEY `blog_comment_userID_fk` (`userID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryID`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`planID`);

--
-- Indexes for table `plan_content`
--
ALTER TABLE `plan_content`
  ADD KEY `plan_content_planID` (`planID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `userrate_attraction`
--
ALTER TABLE `userrate_attraction`
  ADD PRIMARY KEY (`attractionID`,`userID`),
  ADD KEY `userrate_attraction_userID_fk` (`userID`);

--
-- Indexes for table `userrate_blog`
--
ALTER TABLE `userrate_blog`
  ADD PRIMARY KEY (`blogID`,`userID`),
  ADD KEY `userrate_blog_userID_fk` (`userID`);

--
-- Indexes for table `user_plan`
--
ALTER TABLE `user_plan`
  ADD PRIMARY KEY (`userID`,`planID`),
  ADD KEY `user_plan_planID_fk` (`planID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attraction`
--
ALTER TABLE `attraction`
  MODIFY `attractionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attraction_comment`
--
ALTER TABLE `attraction_comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blogID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `countryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `planID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attraction`
--
ALTER TABLE `attraction`
  ADD CONSTRAINT `attraction_countryID_fk` FOREIGN KEY (`countryID`) REFERENCES `country` (`countryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attraction_comment`
--
ALTER TABLE `attraction_comment`
  ADD CONSTRAINT `attraction_comment_attractionID_fk` FOREIGN KEY (`attractionID`) REFERENCES `attraction` (`attractionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attraction_comment_userID_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attraction_type`
--
ALTER TABLE `attraction_type`
  ADD CONSTRAINT `attaction_type_attactionID_fk` FOREIGN KEY (`id`) REFERENCES `attraction` (`attractionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_planId_fk` FOREIGN KEY (`planID`) REFERENCES `plan` (`planID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD CONSTRAINT `blog_comment_blogID_fk` FOREIGN KEY (`blogID`) REFERENCES `blog` (`blogID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_comment_userID_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plan_content`
--
ALTER TABLE `plan_content`
  ADD CONSTRAINT `plan_content_planID` FOREIGN KEY (`planID`) REFERENCES `plan` (`planID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userrate_attraction`
--
ALTER TABLE `userrate_attraction`
  ADD CONSTRAINT `userrate_attraction_attractionID_fk` FOREIGN KEY (`attractionID`) REFERENCES `attraction` (`attractionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userrate_attraction_userID_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userrate_blog`
--
ALTER TABLE `userrate_blog`
  ADD CONSTRAINT `userrate_blog_blogID_fk` FOREIGN KEY (`blogID`) REFERENCES `blog` (`blogID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userrate_blog_userID_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_plan`
--
ALTER TABLE `user_plan`
  ADD CONSTRAINT `user_plan_planID_fk` FOREIGN KEY (`planID`) REFERENCES `plan` (`planID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_plan_userID_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
