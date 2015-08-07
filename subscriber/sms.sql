-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2014 at 01:10 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(150) NOT NULL,
  `Last_Name` varchar(150) NOT NULL,
  `Cellphone_Number` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `First_Name`, `Last_Name`, `Cellphone_Number`) VALUES
(22, 'jnhgfd', 'wesdghyj', '12345678'),
(23, 'jhgfds', 'rfdtyuijhgf', '45457687989'),
(24, 'hhdgff', 'trrtgfbvgn', '24546576878'),
(25, 'fdedyh', 'tyutyr', '75645265'),
(26, 'vhgfg', 'hghhgy', '895371'),
(27, '', '', ''),
(28, 'nong ge', 'vilareal', '934235672'),
(29, 'df', 'dgh', '234567'),
(30, 'hfh', 'kyut', '3464645'),
(31, 'Dennis', 'Trillo HOT', '956854986');

-- --------------------------------------------------------

--
-- Table structure for table `itech_officer`
--

CREATE TABLE IF NOT EXISTS `itech_officer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(150) NOT NULL,
  `Last_Name` varchar(150) NOT NULL,
  `Year_and_Section` varchar(150) NOT NULL,
  `Cellphone_Number` varchar(15) DEFAULT NULL,
  `Position` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `itech_officer`
--

INSERT INTO `itech_officer` (`id`, `First_Name`, `Last_Name`, `Year_and_Section`, `Cellphone_Number`, `Position`) VALUES
(1, '', '', '', '', ''),
(2, '', '', '', '', ''),
(3, 'gdgdr', 'yurtu', 'rtetrete', '8547634623523', 'dgdgdfd'),
(4, 'rttityi', 'fhjfjfut', '', '23647585686', 'cgfhfhgj'),
(5, 'rttityi', 'fhjfjfut', 'rturturtu', '23647585686', 'cgfhfhgj'),
(6, 'rrrtyryhr', 'ghrtrty', 'ryryt', '1323546768', 'asfdfhgjh'),
(7, 'gedrfgh', 'fbfhrf', 'rytryrty', '12345768', 'hrthhrt'),
(8, 'nong ge again', 'dksdnbfhje', 'dkjwdwd', '1213265757908', 'nblksfhjkwojd');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(150) NOT NULL,
  `Last_Name` varchar(150) NOT NULL,
  `Year_and_Section` varchar(150) NOT NULL,
  `Cellphone_Number` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `First_Name`, `Last_Name`, `Year_and_Section`, `Cellphone_Number`) VALUES
(1, 'nfjnfg', 'hfhrtr', 'erter', '35667'),
(2, 'egergege', 'ertgryrtyhu', 'tgegrg', '253647'),
(3, 'nong gerard', 'mdksndjwohde', 'dnjsdnsjd', '13-08829375');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
