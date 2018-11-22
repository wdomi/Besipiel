-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 27, 2016 at 07:25 PM
-- Server version: 5.5.49-log
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mykurserw`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `dname` varchar(20) NOT NULL,
  `street` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dname` (`dname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dname`, `street`) VALUES
(1, 'Betriebsdienst', 'Winterthurerstrasse 190'),
(2, 'Heraldik', 'Poststrasse 100');

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE IF NOT EXISTS `personnel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(10) DEFAULT NULL,
  `firstname` varchar(25) COLLATE latin1_german1_ci DEFAULT NULL,
  `lastname` varchar(20) COLLATE latin1_german1_ci DEFAULT NULL,
  `nick` varchar(12) COLLATE latin1_german1_ci DEFAULT NULL,
  `email` varchar(35) COLLATE latin1_german1_ci DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`id`, `department_id`, `firstname`, `lastname`, `nick`, `email`, `salary`) VALUES
(3, 1, 'Robert', 'Schuhmann', 'schu', 'schu@uzh.ch', 2345),
(5, 1, 'Robert', 'Schuhmann', 'mu', 'mur@uzh.ch', 0),
(6, 1, 'Hans', 'Fritschi', 'frit', 'frit@uzh.ch', 5994),
(8, 1, 'Robert', 'Schuhmann', 'schu2', 'mur2@uzh.ch', 0),
(9, NULL, 'Hubert', 'Reich', 'rei', 'rei@uzh.ch', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `personnel_vw`
--
CREATE TABLE IF NOT EXISTS `personnel_vw` (
`id` int(11)
,`firstname` varchar(25)
,`lastname` varchar(20)
,`nick` varchar(12)
,`email` varchar(35)
,`salary` int(11)
,`department` varchar(20)
,`department_id` int(10)
);
-- --------------------------------------------------------

--
-- Structure for view `personnel_vw`
--
DROP TABLE IF EXISTS `personnel_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `personnel_vw` AS select `p`.`id` AS `id`,`p`.`firstname` AS `firstname`,`p`.`lastname` AS `lastname`,`p`.`nick` AS `nick`,`p`.`email` AS `email`,`p`.`salary` AS `salary`,`d`.`dname` AS `department`,`p`.`department_id` AS `department_id` from (`personnel` `p` left join `department` `d` on((`p`.`department_id` = `d`.`id`)));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `personnel_department_id` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
