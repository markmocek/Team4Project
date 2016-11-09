-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2016 at 10:08 PM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `TeamDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Biography`
--

CREATE TABLE IF NOT EXISTS `Biography` (
  `bioId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `dateofbirth` varchar(11) NOT NULL,
  PRIMARY KEY (`bioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `Biography`
--

INSERT INTO `Biography` (`bioId`, `name`, `dateofbirth`) VALUES
(1, 'John Carpenter', 'May-14-1948'),
(2, 'Kurt Russel', 'Mar-17-1951'),
(3, 'Bill Lancaster', 'Nov-17-1947'),
(4, 'Keith David', 'Jun-4-1946'),
(5, 'Jamie Lee Curtis', 'Nov-22-2015'),
(6, 'Quentin Tarantino', 'Mar-27-1963'),
(7, 'Samuel L Jackson', 'Dec-21-1948'),
(8, 'Jamie Fox', 'Dec-13-67'),
(9, 'Cristoph Waltz', 'Oct-4-1967'),
(10, 'Kevin Bacon', 'Jul-8-1958'),
(11, 'Ron Underwood', 'Nov-6-1953'),
(12, 'S.S. Wilson', '');

-- --------------------------------------------------------

--
-- Table structure for table `Directs`
--

CREATE TABLE IF NOT EXISTS `Directs` (
  `MovieID` int(11) NOT NULL,
  `bioId` int(11) NOT NULL,
  KEY `MovieID` (`MovieID`),
  KEY `DirectorID` (`bioId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Directs`
--

INSERT INTO `Directs` (`MovieID`, `bioId`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 6),
(6, 6),
(7, 11);

-- --------------------------------------------------------

--
-- Table structure for table `Movie`
--

CREATE TABLE IF NOT EXISTS `Movie` (
  `MovieID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Rating` decimal(6,2) NOT NULL,
  `Gross` decimal(12,2) NOT NULL,
  `Genre` varchar(20) NOT NULL,
  `Year` int(4) NOT NULL,
  PRIMARY KEY (`MovieID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Movie`
--

INSERT INTO `Movie` (`MovieID`, `Name`, `Rating`, `Gross`, `Genre`, `Year`) VALUES
(1, 'The Thing', 8.20, 19629760.00, 'Horror', 1982),
(2, 'Escape from New York', 7.20, 25244700.00, 'Sci-Fi', 1979),
(3, 'Halloween', 7.90, 58272029.00, 'Horror', 1978),
(4, 'The Hateful Eight', 7.90, 54117416.00, 'Western', 2015),
(5, 'Django Unchained', 8.50, 162805434.00, 'Western', 2012),
(6, 'Inglourious Basterds', 8.20, 321455689.00, 'War', 2009),
(7, 'Tremors', 7.20, 16667084.00, 'Horror', 1990);

-- --------------------------------------------------------

--
-- Table structure for table `Stars`
--

CREATE TABLE IF NOT EXISTS `Stars` (
  `MovieID` int(11) NOT NULL,
  `bioId` int(11) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Billing` int(6) NOT NULL,
  KEY `MovieID` (`MovieID`),
  KEY `ActorID` (`bioId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Stars`
--

INSERT INTO `Stars` (`MovieID`, `bioId`, `Role`, `Billing`) VALUES
(1, 2, 'R.J. MacReady', 1),
(1, 4, 'Childs', 2),
(3, 5, 'Laurie Strode', 2),
(4, 2, 'John Ruth', 2),
(4, 7, 'Major Marquis Warren', 1),
(5, 8, 'Django', 1),
(5, 9, 'Dr. King Schultz', 2),
(5, 7, 'Stephen', 5),
(6, 9, 'Col. Hans Landa', 3),
(6, 7, 'Narrator', 20),
(7, 10, 'Valentine McKee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` int(11) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserID`, `Name`) VALUES
(1, 0),
(2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `UserLibrary`
--

CREATE TABLE IF NOT EXISTS `UserLibrary` (
  `UserID` int(11) NOT NULL,
  `MovieID` int(11) NOT NULL,
  `DateAdded` varchar(10) NOT NULL,
  `Rating` decimal(6,2) NOT NULL,
  KEY `MovieID` (`MovieID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserLibrary`
--

INSERT INTO `UserLibrary` (`UserID`, `MovieID`, `DateAdded`, `Rating`) VALUES
(1, 1, '11/2/2016', 9.00),
(1, 2, '11/2/2016', 7.00),
(1, 3, '11/3/2016', 8.00),
(2, 5, '4/1/2015', 3.10),
(2, 1, '11/3/2016', 3.50),
(2, 2, '11/3/2016', 2.20),
(2, 5, '5/3/2016', 4.10),
(2, 7, '1/23/92', 1.10);

-- --------------------------------------------------------

--
-- Table structure for table `Writes`
--

CREATE TABLE IF NOT EXISTS `Writes` (
  `MovieID` int(11) NOT NULL,
  `bioId` int(11) NOT NULL,
  KEY `MovieID` (`MovieID`),
  KEY `bioId` (`bioId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Writes`
--

INSERT INTO `Writes` (`MovieID`, `bioId`) VALUES
(1, 3),
(3, 1),
(4, 6),
(6, 6),
(7, 12);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Directs`
--
ALTER TABLE `Directs`
  ADD CONSTRAINT `Directs_ibfk_1` FOREIGN KEY (`MovieID`) REFERENCES `Movie` (`MovieID`),
  ADD CONSTRAINT `Directs_ibfk_2` FOREIGN KEY (`bioId`) REFERENCES `Biography` (`bioId`);

--
-- Constraints for table `Stars`
--
ALTER TABLE `Stars`
  ADD CONSTRAINT `Stars_ibfk_1` FOREIGN KEY (`MovieID`) REFERENCES `Movie` (`MovieID`),
  ADD CONSTRAINT `Stars_ibfk_2` FOREIGN KEY (`bioId`) REFERENCES `Biography` (`bioId`);

--
-- Constraints for table `UserLibrary`
--
ALTER TABLE `UserLibrary`
  ADD CONSTRAINT `UserLibrary_ibfk_1` FOREIGN KEY (`MovieID`) REFERENCES `Movie` (`MovieID`),
  ADD CONSTRAINT `UserLibrary_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`);

--
-- Constraints for table `Writes`
--
ALTER TABLE `Writes`
  ADD CONSTRAINT `Writes_ibfk_1` FOREIGN KEY (`MovieID`) REFERENCES `Movie` (`MovieID`),
  ADD CONSTRAINT `Writes_ibfk_2` FOREIGN KEY (`bioId`) REFERENCES `Biography` (`bioId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
