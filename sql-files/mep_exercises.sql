-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 08, 2012 at 04:50 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `daou0092`
--

-- --------------------------------------------------------

--
-- Table structure for table `mep_exercises`
--

CREATE TABLE IF NOT EXISTS `mep_exercises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_exercise` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `mep_exercises`
--

INSERT INTO `mep_exercises` (`id`, `name_exercise`) VALUES
(1, 'Swimming'),
(2, 'Kickboxing'),
(3, 'Baseball'),
(4, 'Basketball'),
(5, 'Weights'),
(6, 'Biking'),
(7, 'Hiking'),
(8, 'Running'),
(9, 'Jogging'),
(10, 'Volleyball'),
(11, 'Football'),
(12, 'Interval Training'),
(13, 'Ballet'),
(14, 'Resistance Training'),
(15, 'Yoga'),
(16, 'Step Aerobics'),
(17, 'Cross-Country Skiing'),
(18, 'Hatha Yoga'),
(19, 'Power Yoga '),
(20, 'Ashtanga Yoga'),
(21, 'Soccer'),
(22, 'Tennis');
