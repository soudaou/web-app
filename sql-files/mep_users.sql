-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 08, 2012 at 04:51 PM
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
-- Table structure for table `mep_users`
--

CREATE TABLE IF NOT EXISTS `mep_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `mep_users`
--

INSERT INTO `mep_users` (`id`, `email`) VALUES
(1, 'souaddaou@gmail.com'),
(2, 'thomasjbradley@gmail.com'),
(3, 'erika@gmail.com'),
(4, 'sara@gmail.com'),
(5, 'dima@gmail.com'),
(6, 'erika_balarezo@gmail.com'),
(7, 'souadd@gmail.com'),
(8, 's@gmail.com'),
(9, 'bash_4_ever@hotmail.com'),
(10, 'broken@test.com'),
(11, 'bash@test.com'),
(12, 'testing@test.com'),
(13, 'testing@test.com'),
(14, 'testing@test.com'),
(15, 'testing@test.com'),
(16, 'testing@test.com'),
(17, 'testing@test.com'),
(18, 'testing@test.com'),
(19, 'testing@test.com'),
(20, 'test@test.com'),
(21, 'me@you.com'),
(22, 'me@you.com'),
(23, 'you@you.com'),
(24, 'erika@test.com'),
(25, 'erika@test1.com'),
(26, 'erika@test1.com'),
(27, 'erika@test1.com'),
(28, 'erika@test1.com'),
(29, 'sam@test.com'),
(30, 'souadd@gmail.com'),
(31, 'sd@gmail.com'),
(32, 'lulu@gmail.com'),
(33, 'lulwa@gmail.com'),
(34, 'souaddaou@gmail.com'),
(35, 'd@gmail.com');
