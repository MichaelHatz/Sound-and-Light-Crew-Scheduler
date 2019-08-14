-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2019 at 04:13 AM
-- Server version: 5.6.20-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testmysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`id` int(11) NOT NULL,
  `startDate` date DEFAULT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `eventDescription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `users` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `startDate`, `startTime`, `endTime`, `eventDescription`, `users`) VALUES
(1, '2019-07-17', '09:00:00', '11:00:00', 'Test Event', 'Michael'),
(2, '2019-07-23', '11:00:00', '11:30:00', 'Test Event 2', 'Michael'),
(3, '2019-07-12', '13:00:00', '15:00:00', 'Test Event 3', 'Josh'),
(4, '2019-07-02', '08:00:00', '09:00:00', 'This is a test with a long discription with lots of characters', 'Michael'),
(6, '2019-07-11', '00:00:00', '00:00:00', 'Test Event', 'Spencer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `Username` text COLLATE utf8_unicode_ci NOT NULL,
  `Password` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `userClass` text COLLATE utf8_unicode_ci NOT NULL,
  `validMember` tinyint(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Password`, `Email`, `userClass`, `validMember`) VALUES
(1, 'Michael', '8369C832B9EACAAFA0EEA4FBD5AE5ECCE14AFA17', 'HAT0056@Balwynhs.vic.edu.au', 'Member', 1),
(2, 'Celia', '9ED5CB6EF1988D2BB9785B02862C1AF5A2CFEA22', '123@gmail.com', 'Member', 0),
(3, 'Fred', '9EEDFE9FF22F977EB98CD13086B983A6A312DFF2', 'ld', 'Member', 1),
(4, 'Michael', '9EEE2D3BF230C4E6B98CF80186BA9AC4A313647C', 'Michael@gmail.com', 'Member', 1),
(5, 'jeff', '9ED5CB6EF1988D2BB9785B02862C1AF5A2CFEA22', 'michael@gmail.com', 'Admin', 1),
(6, 'Joseph', '9ED5CB6EF1988D2BB9785B02862C1AF5A2CFEA22', 'Joseph@gmail.com', 'Member', 1),
(8, 'Michhaeeel ', '83AB5435C37CEB37A1B65E3BEDB0C010B022F530', 'hatz0014@balwynhs.vic.edu.qu', 'Member', 1),
(9, 'Spencer', '8369C832B9EACAAFA0EEA4FBD5AE5ECCE14AFA17', 'Spencergerontzos@icloud.com', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
