-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2014 at 07:37 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `certify`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `branch` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`name`, `type`, `branch`) VALUES
('Bachelor Of Engineering', 'DEGREE', 'Chemical Engineering,Electrical Engineering,Mechanical\nEngineering,Computer Science,Polymer Engineering,Computer Science Engineering,Civil Engineering,,Electronics and communication Engineering'),
('Bachelor Of Architecture', 'DEGREE', 'B. Arch.,B. Archi,,Computer Science Engineering'),
('master of computer application', 'DIPLOMA', 'MCA,BCA,BBA,MBA'),
('Master of Urban Planning', 'DIPLOMA', ''),
('Bachelor Of Architecture', 'DIPLOMA', 'B. Arch.'),
('Bachelor Of Engineering', 'DIPLOMA', 'Chemical,dhajsd,adhajshd,asdjasdjh');

-- --------------------------------------------------------

--
-- Table structure for table `extension`
--

CREATE TABLE IF NOT EXISTS `extension` (
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extension`
--

INSERT INTO `extension` (`name`) VALUES
(''),
('Allahabad'),
('Lalpur'),
('Mesra (Main Campus)'),
('Muscat'),
('Noida'),
('Patna');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `roll` varchar(40) NOT NULL,
  `type` varchar(40) NOT NULL,
  `issue` varchar(40) NOT NULL,
  `doi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`roll`, `type`, `issue`, `doi`) VALUES
('BE/1377/2011', 'MIGRATION', 'ISSUE', '2013-12-15'),
('BE/1480/2011', 'PROVISIONAL', 'REISSUE', '2013-12-15'),
('BE/233/2011', 'MIGRATION', 'ISSUE', '2013-11-07'),
('BE/!228/2011', 'PROVISIONAL', 'REISSUE', '2013-11-29'),
('hksjhjfvk', 'MIGRATION', 'ISSUE', '2013-12-03'),
(',era', 'PROVISIONAL', 'ISSUE', '2013-12-01'),
('cat', 'MIGRATION', 'REISSUE', '2013-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `name` varchar(100) NOT NULL,
  `roll` varchar(50) NOT NULL,
  `cour` varchar(60) NOT NULL,
  `cgpa` float NOT NULL,
  `yojc` int(4) NOT NULL,
  `yopc` int(4) NOT NULL,
  `conduct` varchar(100) NOT NULL DEFAULT 'Good/Satisfactory',
  `rol` varchar(100) NOT NULL DEFAULT 'Completion of course/Withdrawal',
  `nstyle` varchar(40) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sno` int(11) NOT NULL,
  `ext` varchar(40) NOT NULL DEFAULT 'Mesra',
  PRIMARY KEY (`roll`),
  KEY `sno` (`sno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `roll`, `cour`, `cgpa`, `yojc`, `yopc`, `conduct`, `rol`, `nstyle`, `time`, `sno`, `ext`) VALUES
('Sameer barha', '21', '21', 9, 2013, 2013, 'Good/Satisfactory', 'Completion of course/Withdrawal', '0/0/0/0/0/0/0/0/0/0/0/0/0/0', '0000-00-00 00:00:00', 0, 'Mesra'),
('Suman Anand', 'BE/1362/2011', 'Bachelor of Engineering (Computer Science) ', 8, 2012, 2016, 'Good/Satisfactory', 'Completion of course/Withdrawal', '1/0/0/1/0/1/1/1/0/1/1/0/1/0', '0000-00-00 00:00:00', 0, 'Mesra'),
('Udit Kishore', 'BE/1377/2011', 'Bachelor of Engineering (Computer Science)', 10, 2012, 2016, 'Good/Satisfactory', 'Completion of course/Withdrawal', '1/1/1/1/1/1/1/1/1/1/1/1/1/1', '0000-00-00 00:00:00', 0, 'Mesra'),
('Abhishek Anand', 'BE/1480/2011', 'Bachelor of Engineering (Computer Science) ', 7, 2013, 2013, 'Good/Satisfactory', 'Completion of course/Withdrawal', '0/1/0/1/0/0/1/1/0/1/0/1/0/1', '0000-00-00 00:00:00', 0, 'Mesra'),
('Suman Joy', 'BE/1481/2011', 'Bachelor of Engineering (Computer Science)', 7, 2010, 2014, 'Good/Satisfactory', 'Completion of course/Withdrawal', '1/0/0/1/0/1/1/1/0/1/1/0/1/0', '0000-00-00 00:00:00', 0, 'Mesra');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `auth` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `pass`, `auth`) VALUES
('abhishek', '1109', 2),
('udit', '1111', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
