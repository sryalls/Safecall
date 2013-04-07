-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2013 at 03:02 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `safecall_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `calls`
--

CREATE TABLE IF NOT EXISTS `calls` (
  `date` datetime NOT NULL,
  `client_id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `companions` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `notes` varchar(500) NOT NULL,
  `call_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `assigned_volunteer` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  UNIQUE KEY `call_id` (`call_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `calls`
--

INSERT INTO `calls` (`date`, `client_id`, `location`, `companions`, `contact`, `notes`, `call_id`, `assigned_volunteer`, `status`) VALUES
('2012-05-17 00:00:00', 3, 'Edinburgh', 'Some folk', '7783344', 'Some noes', 2, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `email_addr` varchar(30) NOT NULL,
  `shareable` tinyint(1) DEFAULT NULL,
  UNIQUE KEY `client_id` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `first_name`, `last_name`, `email_addr`, `shareable`) VALUES
(3, 'Erik ', 'Ostroff', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE IF NOT EXISTS `volunteers` (
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) NOT NULL,
  `email_addr` varchar(20) NOT NULL,
  `password_hash` varchar(20) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(10) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`first_name`, `last_name`, `email_addr`, `password_hash`, `user_id`, `status`, `phone_number`, `notes`, `is_admin`) VALUES
('James', 'Duncanson', 'This.I.@test.com', 'xyz', 1, 'Active', '1354345', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
