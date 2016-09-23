-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 23, 2016 at 07:28 AM
-- Server version: 5.6.31-0ubuntu0.15.10.1
-- PHP Version: 7.0.9-1+deb.sury.org~wily+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `felipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `namoradas`
--

CREATE TABLE IF NOT EXISTS `namoradas` (
  `id` int(11) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `cor` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `namoradas`
--

INSERT INTO `namoradas` (`id`, `nome`, `cor`) VALUES
(55, 'dasddasd', 'rola'),
(56, 'dasddasd', 'rola'),
(57, 'dasddasd', 'rola');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `namoradas`
--
ALTER TABLE `namoradas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `namoradas`
--
ALTER TABLE `namoradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
