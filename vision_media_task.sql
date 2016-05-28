-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2016 at 05:58 AM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.6.21-1+donate.sury.org~trusty+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vision_media_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fb_users`
--

CREATE TABLE IF NOT EXISTS `fb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(250) NOT NULL,
  `name` varchar(50) NOT NULL,
  `access_token` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `fb_users`
--

INSERT INTO `fb_users` (`id`, `user_id`, `name`, `access_token`, `date`) VALUES
(15, 10207936801928688, 'Mohamed Khaled Hasan', 'EAAGu0o5wFdwBADbCGJqy6Er06eiaYlspdyi69fTm5ZBcJDHDCrkHK2ZBtjbO3EOS8rLspN6OsPyRhuh7ZAWAPLXI5UMt0gjV6MdbnHsyPpZA0wGJWotDunZCGZCLPo7KZB68j9fCxqO5A6YNqIzvHtgN7iLo0rNPawZD', '2016-05-27 21:27:02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
