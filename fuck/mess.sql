-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2017 at 10:37 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mess`
--

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `dayid` int(1) NOT NULL,
  `day` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`dayid`, `day`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodid` int(11) NOT NULL,
  `foodname` varchar(25) NOT NULL,
  `foodtype` int(1) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodid`, `foodname`, `foodtype`, `deleted`) VALUES
(8, 'Poha', 1, 0),
(9, 'Mix Pulses', 2, 0),
(10, 'Pav Bhaji', 3, 0),
(11, 'Maggi', 1, 0),
(12, 'Chana Dal', 2, 0),
(13, 'Masala Pakoda', 3, 0),
(14, 'Chole', 3, 0),
(15, 'Aloo Paratha', 3, 0),
(16, 'Bhindi Aloo', 2, 0),
(17, 'Mix Veg', 2, 0),
(18, 'Ragda Samosa', 1, 0),
(19, 'Khaman', 1, 0),
(20, 'Veg Roll', 1, 0),
(21, 'Dabeli', 1, 0),
(22, 'Bharta', 2, 0),
(23, 'Kadi Pakoda', 3, 0),
(24, 'Cabbage Mutter', 2, 0),
(25, 'Aloo gobhi', 3, 0),
(26, 'Paneer Bhurji', 2, 0),
(27, 'Mutter Paneer', 3, 0),
(28, 'Uthapam', 1, 0),
(29, 'Idli', 1, 0),
(30, 'Vada', 1, 0),
(31, 'Rajma', 2, 0),
(32, 'Paneer Roll', 1, 0),
(33, 'Methi Thepla', 3, 0),
(34, 'Dosa', 1, 0),
(35, 'Paneer', 3, 0),
(36, 'chicken', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `colid` varchar(8) NOT NULL,
  `pass` text NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `state` varchar(25) NOT NULL,
  `messman` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`colid`, `pass`, `fname`, `lname`, `state`, `messman`) VALUES
('p17co009', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Mamtesh', 'Kumar', 'Bihar', 0),
('u15co000', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Pyare', 'Lal', 'Maharashtra', 1),
('u15co001', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Aksh', 'Patel', 'Gujarat', 0),
('u15co039', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Alkesh', 'Vaghela', 'Gujarat', 0),
('u15co050', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Priyansh', 'Zalavadiya', 'Gujarat', 0),
('u15co093', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Sairam', 'Naragoni', 'Andhra Pradesh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menuid` int(11) NOT NULL,
  `week` int(2) NOT NULL,
  `day` int(1) NOT NULL,
  `foodid` int(11) NOT NULL,
  `count` int(11) DEFAULT '1',
  `approve` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menuid`, `week`, `day`, `foodid`, `count`, `approve`) VALUES
(1, 45, 1, 8, 1, 0),
(2, 45, 1, 16, 2, 0),
(3, 45, 1, 14, 1, 0),
(4, 45, 2, 11, 2, 0),
(5, 45, 2, 16, 2, 1),
(6, 45, 2, 25, 1, 0),
(7, 45, 3, 18, 1, 0),
(8, 45, 3, 17, 1, 1),
(9, 45, 3, 14, 1, 0),
(10, 45, 4, 19, 3, 1),
(11, 45, 4, 22, 1, 1),
(12, 45, 4, 23, 1, 0),
(13, 45, 5, 20, 1, 0),
(14, 45, 5, 22, 2, 0),
(15, 45, 5, 33, 1, 1),
(16, 45, 6, 30, 1, 1),
(17, 45, 6, 31, 2, 0),
(18, 45, 6, 25, 1, 0),
(19, 45, 7, 30, 1, 0),
(20, 45, 7, 26, 2, 0),
(21, 45, 7, 23, 1, 1),
(22, 45, 1, 20, 1, 0),
(23, 45, 1, 17, 1, 0),
(24, 45, 1, 10, 1, 0),
(25, 45, 2, 18, 1, 0),
(26, 45, 2, 23, 2, 1),
(27, 45, 3, 34, 1, 1),
(28, 45, 3, 22, 1, 0),
(29, 45, 3, 13, 2, 1),
(30, 45, 4, 29, 1, 0),
(31, 45, 4, 9, 1, 0),
(32, 45, 4, 14, 1, 1),
(33, 45, 5, 30, 1, 0),
(34, 45, 5, 24, 1, 1),
(35, 45, 5, 27, 1, 0),
(36, 45, 6, 28, 1, 0),
(37, 45, 6, 33, 1, 0),
(38, 45, 7, 34, 1, 1),
(39, 45, 7, 10, 3, 0),
(40, 45, 1, 29, 2, 1),
(41, 45, 1, 9, 1, 1),
(42, 45, 1, 33, 1, 0),
(43, 45, 2, 21, 1, 1),
(44, 45, 2, 12, 1, 0),
(45, 45, 3, 20, 1, 0),
(46, 45, 3, 16, 1, 0),
(47, 45, 3, 25, 1, 0),
(48, 45, 4, 17, 1, 0),
(49, 45, 4, 15, 1, 0),
(50, 45, 5, 18, 1, 1),
(51, 45, 5, 13, 2, 0),
(52, 45, 6, 11, 1, 0),
(53, 45, 6, 26, 1, 1),
(54, 45, 6, 14, 1, 0),
(55, 45, 7, 8, 1, 0),
(56, 45, 7, 31, 1, 1),
(57, 45, 1, 15, 1, 1),
(58, 45, 2, 9, 1, 0),
(59, 45, 2, 13, 1, 0),
(60, 45, 3, 8, 1, 0),
(61, 45, 3, 12, 1, 0),
(62, 45, 4, 16, 1, 0),
(63, 45, 4, 25, 1, 0),
(64, 45, 5, 11, 1, 0),
(65, 45, 5, 9, 1, 0),
(66, 45, 6, 34, 1, 0),
(67, 45, 6, 12, 1, 0),
(68, 45, 6, 10, 1, 1),
(69, 45, 7, 11, 1, 0),
(70, 45, 7, 9, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `voteid` int(11) NOT NULL,
  `week` int(2) NOT NULL,
  `colid` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`voteid`, `week`, `colid`) VALUES
(1, 45, 'u15co039'),
(2, 45, 'u15co050'),
(3, 45, 'u15co093'),
(4, 45, 'p17co009'),
(5, 46, 'u15co039');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`dayid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`colid`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menuid`),
  ADD KEY `foodid` (`foodid`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`voteid`),
  ADD KEY `colid` (`colid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `foodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `voteid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`foodid`) REFERENCES `food` (`foodid`);

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`colid`) REFERENCES `login` (`colid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
