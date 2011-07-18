-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 18, 2011 at 05:57 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stuzo_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` VALUES(1, 0, 'Electronics');
INSERT INTO `items` VALUES(2, 0, 'Video');
INSERT INTO `items` VALUES(3, 0, 'Photo');
INSERT INTO `items` VALUES(4, 1, 'MP3 player');
INSERT INTO `items` VALUES(5, 1, 'TV');
INSERT INTO `items` VALUES(6, 4, 'iPod');
INSERT INTO `items` VALUES(7, 6, 'Shuffle');
INSERT INTO `items` VALUES(8, 3, 'SLR');
INSERT INTO `items` VALUES(9, 8, 'DSLR');
INSERT INTO `items` VALUES(10, 9, 'Nikon');
INSERT INTO `items` VALUES(11, 9, 'Canon');
INSERT INTO `items` VALUES(12, 11, '20D');
INSERT INTO `items` VALUES(13, 12, 'Price');
INSERT INTO `items` VALUES(14, 13, '1500$');
INSERT INTO `items` VALUES(15, 6, 'Touch 4G');
