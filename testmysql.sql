-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 14, 2019 at 09:48 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testmysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startDate` date DEFAULT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `eventDescription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `users` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `startDate`, `startTime`, `endTime`, `eventDescription`, `users`) VALUES
(0, '2019-07-17', '09:00:00', '11:00:00', 'Test Event', 'jeff'),
(1, '2019-07-23', '11:00:00', '11:30:00', 'Test Event 2', 'jeff'),
(2, '2019-07-12', '13:00:00', '15:00:00', 'Test Event 3', 'jeff'),
(3, '2019-07-02', '08:00:00', '09:00:00', 'This is a test with a long discription with lots of characters', 'Michael'),
(4, '2019-07-26', '06:30:00', '08:45:00', 'eventDescription', 'Michael'),
(5, '2019-07-15', '10:00:00', '15:00:00', 'Test Event', 'jeff');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` text COLLATE utf8_unicode_ci NOT NULL,
  `Password` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `userClass` text COLLATE utf8_unicode_ci NOT NULL,
  `validMember` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Password`, `Email`, `userClass`, `validMember`) VALUES
(1, 'Dope', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Random@Gmail.com', 'Admin', 1),
(2, 'jeff', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin@gmail.com', 'Admin', 1),
(3, 'Michael', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'michael@hatz.me', 'Member', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
