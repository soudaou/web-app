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
-- Table structure for table `mep_exerciselist`
--

CREATE TABLE IF NOT EXISTS `mep_exerciselist` (
  `user_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `exercise_id` (`exercise_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mep_exerciselist`
--

INSERT INTO `mep_exerciselist` (`user_id`, `exercise_id`) VALUES
(33, 2),
(33, 3),
(33, 5),
(33, 13),
(33, 14),
(33, 21),
(33, 22),
(1, 1),
(1, 2),
(1, 3),
(1, 19),
(1, 20),
(1, 21),
(1, 22);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mep_exerciselist`
--
ALTER TABLE `mep_exerciselist`
  ADD CONSTRAINT `mep_exerciselist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `mep_users` (`id`),
  ADD CONSTRAINT `mep_exerciselist_ibfk_2` FOREIGN KEY (`exercise_id`) REFERENCES `mep_exercises` (`id`);
