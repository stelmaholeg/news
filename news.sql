-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 22, 2013 at 05:54 PM
-- Server version: 5.5.31-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `text` text,
  `author` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `text`, `author`, `date`) VALUES
(7, 'asfasdf', 'sdfasdfasdf', '', '0000-00-00'),
(8, 'asfasdf', 'sdfasdfasdf', '', '0000-00-00'),
(9, 'asfasdf', 'sdfasdfasdf', '', '0000-00-00'),
(10, 'asfasdf', 'sdfasdfasdf', '', '0000-00-00'),
(11, '34234', '234234234234', '', '0000-00-00'),
(12, 'asdfasdf', 'asdfasdfasdf', '', '0000-00-00'),
(13, 'afsdfas', 'dfasdfasdf', '', '0000-00-00'),
(14, 'asdfasdf', 'asdfasdfasdf', '', '0000-00-00'),
(15, 'asdfasdfasdf', 'fasdfasdfasdfasdf', '', '0000-00-00'),
(16, '1xcvasdfasdfasdf', '11sadfasdfasdfasdf', '', '0000-00-00'),
(17, 'Ñ„Ñ‹Ð²Ñ„', 'Ð²Ñ„Ñ‹Ð²Ñ„Ñ‹Ð²Ñ„Ñ‹Ð²Ñ„Ñ‹Ð²', '', '0000-00-00'),
(18, 'Ñ„Ñ‹Ð°Ð²Ð¿Ñ„Ñ‹Ð²Ð°', 'Ñ„Ñ‹Ð²Ð°Ñ„Ñ‹Ð²Ð°Ñ„Ñ‹Ð²Ð°Ñ„Ñ‹Ð²Ð°', '', '0000-00-00'),
(19, 'Ð¼Ñ‹Ð¸Ñ€Ñ‹Ð²Ð°Ð¿', 'Ñ‹Ð²Ð°Ð¿Ñ‹Ð²Ð°Ð¿Ñ‹Ð²Ð°Ð¿Ñ€Ñ‹Ð°Ð¿\r\nÑ„Ñ‹Ð²Ð°Ñ„Ñ‹Ð²Ð°Ð¿Ñ‹Ñ„Ð²Ð°Ð¿Ñ‹Ð²Ð°Ð¿\r\nÑ‹\r\nÐ²Ð°Ð¿\r\nÑ‹Ñ„\r\nÐ²Ð°Ð¿Ð²Ñ‹Ñ€Ñ‹Ð²Ð°Ð¿Ñ„Ð²Ð°Ñ‹Ð¿Ñ‹Ð²Ð°Ð¿Ñ‹Ð²Ð°Ð¿Ñ‹Ð²Ð°Ð¿', '', '0000-00-00'),
(20, 'sfgsdf', 'sdfsafgasdf\r\nasdfasdfasdfasd\r\nf\r\nasd\r\nf\r\nas\r\ndf\r\na\r\nsd\r\nfasfgsadfgadsfgsadfg', '', '0000-00-00'),
(21, 'Ð—Ð°Ð³Ð¾Ð»Ð¾Ð²Ð¾Ðº', 'Ð¡ÑƒÐ¿ÐµÑ€ Ð²Ð°Ð¶Ð½Ð°Ñ ÑÑ‚Ð°Ñ‚ÑŒÑ', 'Ð¯', '2022-06-20'),
(22, '213123', '213123123', '12312312', '0000-00-00'),
(23, 'фывфывфыв', 'фывфывфывфыв', 'фывфывфыв', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE IF NOT EXISTS `testing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `privilege` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `pass`, `privilege`) VALUES
(1, 'admin', '12345', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
