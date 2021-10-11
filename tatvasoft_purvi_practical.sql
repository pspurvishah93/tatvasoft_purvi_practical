-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 11, 2021 at 03:21 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tatvasoft_purvi_practical`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_mst`
--

DROP TABLE IF EXISTS `event_mst`;
CREATE TABLE IF NOT EXISTS `event_mst` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `repeat_type` tinyint(2) NOT NULL COMMENT '1 = repeat, 2 = repeat on',
  `repeat_at` int(11) NOT NULL COMMENT '1 = every, 2 = every other, 3 = every third, 4 = every fourth',
  `repeat_day` int(11) NOT NULL COMMENT '1 = day, 2 = week, 3 = month, 4 = year',
  `repeat_on_at` int(11) NOT NULL,
  `repeat_on_day` int(11) NOT NULL COMMENT '1 = Sun, 2 = Mon, 3 = Tues, 4 = Wed, 5 = Thurs, 6 = Fri 7 = Sat',
  `repeat_on_type` int(11) NOT NULL COMMENT '1 = months, 2 = 3 months, 3 = 4 months, 4 = 6 months, 5 = year',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = active, 0 = inactive',
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_mst`
--

INSERT INTO `event_mst` (`event_id`, `event_title`, `start_date`, `end_date`, `repeat_type`, `repeat_at`, `repeat_day`, `repeat_on_at`, `repeat_on_day`, `repeat_on_type`, `created_at`, `updated_at`, `status`) VALUES
(1, 'test1', '2021-10-11', '2021-10-13', 1, 1, 1, 0, 0, 0, '2021-10-11 12:58:41', '2021-10-11 13:49:22', 1),
(2, 'test222', '2021-10-11', '2021-10-16', 2, 0, 0, 1, 3, 5, '2021-10-11 13:42:59', '2021-10-11 15:21:14', 0),
(3, 'test 3', '2021-10-11', '2021-10-16', 1, 3, 4, 0, 0, 0, '2021-10-11 13:49:58', '2021-10-11 13:49:58', 1),
(4, 'test1', '2021-10-11', '2021-10-13', 1, 1, 1, 0, 0, 0, '2021-10-11 12:58:41', '2021-10-11 13:49:22', 1),
(5, 'test222', '2021-10-11', '2021-10-16', 2, 0, 0, 1, 3, 5, '2021-10-11 13:42:59', '2021-10-11 14:47:00', 1),
(6, 'test 3', '2021-10-11', '2021-10-16', 1, 3, 4, 0, 0, 0, '2021-10-11 13:49:58', '2021-10-11 13:49:58', 1),
(7, 'test1', '2021-10-11', '2021-10-13', 1, 1, 1, 0, 0, 0, '2021-10-11 12:58:41', '2021-10-11 13:49:22', 1),
(8, 'test222', '2021-10-11', '2021-10-16', 2, 0, 0, 1, 3, 5, '2021-10-11 13:42:59', '2021-10-11 14:47:00', 1),
(9, 'test 3', '2021-10-11', '2021-10-16', 1, 3, 4, 0, 0, 0, '2021-10-11 13:49:58', '2021-10-11 13:49:58', 1),
(10, 'test1', '2021-10-11', '2021-10-13', 1, 1, 1, 0, 0, 0, '2021-10-11 12:58:41', '2021-10-11 13:49:22', 1),
(11, 'test222', '2021-10-11', '2021-10-16', 2, 0, 0, 1, 3, 5, '2021-10-11 13:42:59', '2021-10-11 14:47:00', 1),
(12, 'test 3', '2021-10-11', '2021-10-16', 1, 3, 4, 0, 0, 0, '2021-10-11 13:49:58', '2021-10-11 13:49:58', 1),
(13, 'test1', '2021-10-11', '2021-10-13', 1, 1, 1, 0, 0, 0, '2021-10-11 12:58:41', '2021-10-11 13:49:22', 1),
(14, 'test222', '2021-10-11', '2021-10-16', 2, 0, 0, 1, 3, 5, '2021-10-11 13:42:59', '2021-10-11 14:47:00', 1),
(15, 'test 3', '2021-10-11', '2021-10-16', 1, 3, 4, 0, 0, 0, '2021-10-11 13:49:58', '2021-10-11 13:49:58', 1),
(16, 'test1', '2021-10-11', '2021-10-13', 1, 1, 1, 0, 0, 0, '2021-10-11 12:58:41', '2021-10-11 13:49:22', 1),
(17, 'test222', '2021-10-11', '2021-10-16', 2, 0, 0, 1, 3, 5, '2021-10-11 13:42:59', '2021-10-11 14:47:00', 1),
(18, 'test 3', '2021-10-11', '2021-10-16', 1, 3, 4, 0, 0, 0, '2021-10-11 13:49:58', '2021-10-11 13:49:58', 1),
(19, 'test1', '2021-10-11', '2021-10-13', 1, 1, 1, 0, 0, 0, '2021-10-11 12:58:41', '2021-10-11 13:49:22', 1),
(20, 'test222', '2021-10-11', '2021-10-16', 2, 0, 0, 1, 3, 5, '2021-10-11 13:42:59', '2021-10-11 14:47:00', 1),
(21, 'test 3', '2021-10-11', '2021-10-16', 1, 3, 4, 0, 0, 0, '2021-10-11 13:49:58', '2021-10-11 13:49:58', 1),
(22, 'test1', '2021-10-11', '2021-10-13', 1, 1, 1, 0, 0, 0, '2021-10-11 12:58:41', '2021-10-11 13:49:22', 1),
(23, 'test222', '2021-10-11', '2021-10-16', 2, 0, 0, 1, 3, 5, '2021-10-11 13:42:59', '2021-10-11 14:47:00', 1),
(24, 'test 3', '2021-10-11', '2021-10-16', 1, 3, 4, 0, 0, 0, '2021-10-11 13:49:58', '2021-10-11 13:49:58', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
