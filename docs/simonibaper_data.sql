-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2017 at 06:56 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simba`
--

-- --------------------------------------------------------

--
-- Table structure for table `facilitator`
--

DROP TABLE IF EXISTS `facilitator`;
CREATE TABLE IF NOT EXISTS `facilitator` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `facilitator`
--

TRUNCATE TABLE `facilitator`;
--
-- Dumping data for table `facilitator`
--

INSERT INTO `facilitator` (`id`, `full_name`) VALUES
(1, 'Unggul Sagena'),
(12, 'Miftah Hadi'),
(14, 'Yeyen Yanuarizk');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Provinsi';

--
-- Truncate table before insert `provinces`
--

TRUNCATE TABLE `provinces`;
-- --------------------------------------------------------

--
-- Table structure for table `regencies`
--

DROP TABLE IF EXISTS `regencies`;
CREATE TABLE IF NOT EXISTS `regencies` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `province_id` int(15) NOT NULL,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `province_id` (`province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Kota / Kabupaten';

--
-- Truncate table before insert `regencies`
--

TRUNCATE TABLE `regencies`;
-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `id` int(15) NOT NULL,
  `requestor_id` int(15) NOT NULL,
  `facilitator_id` int(15) NOT NULL,
  `province_id` int(15) NOT NULL,
  `regency_id` int(15) NOT NULL,
  PRIMARY KEY (`id`,`requestor_id`,`facilitator_id`,`province_id`,`regency_id`),
  KEY `requestor_id` (`requestor_id`),
  KEY `facilitator_id` (`facilitator_id`),
  KEY `province_id` (`province_id`),
  KEY `regency_id` (`regency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `request`
--

TRUNCATE TABLE `request`;
-- --------------------------------------------------------

--
-- Table structure for table `requestor`
--

DROP TABLE IF EXISTS `requestor`;
CREATE TABLE IF NOT EXISTS `requestor` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `ktp_number` varchar(16) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `company` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='Requestor Perorangan / UMKM';

--
-- Truncate table before insert `requestor`
--

TRUNCATE TABLE `requestor`;
--
-- Dumping data for table `requestor`
--

INSERT INTO `requestor` (`id`, `ktp_number`, `full_name`, `company`) VALUES
(1, '327', 'Unit', 'Murah Mareh'),
(5, '322', 'Puttie M', 'Bogoriginal');

-- --------------------------------------------------------

--
-- Table structure for table `request_statuses`
--

DROP TABLE IF EXISTS `request_statuses`;
CREATE TABLE IF NOT EXISTS `request_statuses` (
  `request_id` int(15) NOT NULL,
  `set_id` int(15) NOT NULL,
  `status_id` int(15) NOT NULL,
  `flag` char(1) NOT NULL,
  PRIMARY KEY (`request_id`,`set_id`,`status_id`),
  KEY `set_id` (`set_id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `request_statuses`
--

TRUNCATE TABLE `request_statuses`;
-- --------------------------------------------------------

--
-- Table structure for table `sets`
--

DROP TABLE IF EXISTS `sets`;
CREATE TABLE IF NOT EXISTS `sets` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `set_name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `sets`
--

TRUNCATE TABLE `sets`;
-- --------------------------------------------------------

--
-- Table structure for table `set_status_groups`
--

DROP TABLE IF EXISTS `set_status_groups`;
CREATE TABLE IF NOT EXISTS `set_status_groups` (
  `set_id` int(15) NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`set_id`,`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `set_status_groups`
--

TRUNCATE TABLE `set_status_groups`;
-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `sequence` int(3) NOT NULL,
  `status_code` varchar(15) NOT NULL,
  `description` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Status atau Stage atau Tahapan ex: Verifikasi Data';

--
-- Truncate table before insert `status`
--

TRUNCATE TABLE `status`;
-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `user`
--

TRUNCATE TABLE `user`;
--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `status`) VALUES
(1, 'admin@1jutadomain.com', '5858ea228cc2edf88721699b2c8638e5', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `regencies`
--
ALTER TABLE `regencies`
  ADD CONSTRAINT `regencies_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`requestor_id`) REFERENCES `requestor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`facilitator_id`) REFERENCES `facilitator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_3` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_4` FOREIGN KEY (`regency_id`) REFERENCES `regencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_statuses`
--
ALTER TABLE `request_statuses`
  ADD CONSTRAINT `request_statuses_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `request` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_statuses_ibfk_2` FOREIGN KEY (`set_id`) REFERENCES `sets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_statuses_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sets`
--
ALTER TABLE `sets`
  ADD CONSTRAINT `sets_ibfk_1` FOREIGN KEY (`id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `set_status_groups`
--
ALTER TABLE `set_status_groups`
  ADD CONSTRAINT `set_status_groups_ibfk_1` FOREIGN KEY (`set_id`) REFERENCES `sets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
