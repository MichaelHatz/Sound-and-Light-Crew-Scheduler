-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 29, 2019 at 08:26 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `startDate`, `startTime`, `endTime`, `eventDescription`, `users`) VALUES
(1, '2019-07-17', '09:00:00', '11:00:00', 'Test Event', 'Michael'),
(2, '2019-07-23', '11:00:00', '11:30:00', 'Test Event 2', 'Michael'),
(3, '2019-07-12', '13:00:00', '15:00:00', 'Test Event 3', 'Josh'),
(4, '2019-07-02', '08:00:00', '09:00:00', 'This is a test with a long discription with lots of characters', 'Michael');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Password`, `Email`, `userClass`) VALUES
(1, 'Michael', '8369C832B9EACAAFA0EEA4FBD5AE5ECCE14AFA17', 'HAT0056@Balwynhs.vic.edu.au', 'Member'),
(2, 'Celia', '9ED5CB6EF1988D2BB9785B02862C1AF5A2CFEA22', '123@gmail.com', 'Member'),
(3, 'Fred', '9EEDFE9FF22F977EB98CD13086B983A6A312DFF2', 'ld', 'Member'),
(4, 'Michael', '9EEE2D3BF230C4E6B98CF80186BA9AC4A313647C', 'Michael@gmail.com', 'Member'),
(5, 'jeff', '9ED5CB6EF1988D2BB9785B02862C1AF5A2CFEA22', 'michael@gmail.com', 'Admin'),
(6, 'Joseph', '9ED5CB6EF1988D2BB9785B02862C1AF5A2CFEA22', 'Joseph@gmail.com', 'Member');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
