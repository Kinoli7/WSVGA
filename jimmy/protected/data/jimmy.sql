-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2012 at 10:48 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jimmy`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `releasedate` date DEFAULT NULL,
  `summary` text,
  `story` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_movies_user1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `title`, `releasedate`, `summary`, `story`, `created`, `updated`, `active`, `user_id`) VALUES
(1, 'test movie', '0000-00-00', 'summary', 'story', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(2, 'test movie 2', '0000-00-00', 's', 's', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `movieimage`
--

CREATE TABLE IF NOT EXISTS `movieimage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(256) DEFAULT NULL,
  `movie_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_movieimage_movies1` (`movie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `movieimage`
--

INSERT INTO `movieimage` (`id`, `path`, `movie_id`) VALUES
(1, '02112011.jpg', 1),
(2, '03112011.jpg', 2),
(3, '2012-03-08 17.47.36.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created` datetime DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `created`, `lastlogin`, `active`, `role`) VALUES
(1, 'jimmy', 'jimmy@gmail.com', 'jimmy', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(2, 'jimmy1', 'jimmy@gmail.com', 'jimmy', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `fk_movies_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `movieimage`
--
ALTER TABLE `movieimage`
  ADD CONSTRAINT `fk_movieimage_movies1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
