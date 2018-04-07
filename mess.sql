-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2018 at 09:13 PM
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
(38, 'Tinde', 2, 0),
(40, 'Chicken', 3, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `hola`
-- (See below for the actual view)
--
CREATE TABLE `hola` (
`foodid` int(11)
,`foodname` varchar(25)
,`menuid` int(11)
);

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
  `approve` int(1) NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menuid`, `week`, `day`, `foodid`, `approve`, `deleted`) VALUES
(1, 45, 1, 8, 0, 0),
(2, 45, 1, 16, 0, 0),
(3, 45, 1, 14, 0, 0),
(4, 45, 2, 11, 0, 0),
(5, 45, 2, 16, 1, 0),
(6, 45, 2, 25, 0, 0),
(7, 45, 3, 18, 0, 0),
(8, 45, 3, 17, 1, 0),
(9, 45, 3, 14, 0, 0),
(10, 45, 4, 19, 1, 0),
(11, 45, 4, 22, 1, 0),
(12, 45, 4, 23, 0, 0),
(13, 45, 5, 20, 0, 0),
(14, 45, 5, 22, 0, 0),
(15, 45, 5, 33, 1, 0),
(16, 45, 6, 30, 1, 0),
(17, 45, 6, 31, 0, 0),
(18, 45, 6, 25, 0, 0),
(19, 45, 7, 30, 0, 0),
(20, 45, 7, 26, 0, 0),
(21, 45, 7, 23, 1, 0),
(22, 45, 1, 20, 0, 0),
(23, 45, 1, 17, 0, 0),
(24, 45, 1, 10, 0, 0),
(25, 45, 2, 18, 0, 0),
(26, 45, 2, 23, 1, 0),
(27, 45, 3, 34, 1, 0),
(28, 45, 3, 22, 0, 0),
(29, 45, 3, 13, 1, 0),
(30, 45, 4, 29, 0, 0),
(31, 45, 4, 9, 0, 0),
(32, 45, 4, 14, 1, 0),
(33, 45, 5, 30, 0, 0),
(34, 45, 5, 24, 1, 0),
(35, 45, 5, 27, 0, 0),
(36, 45, 6, 28, 0, 0),
(37, 45, 6, 33, 0, 0),
(38, 45, 7, 34, 1, 0),
(39, 45, 7, 10, 0, 0),
(40, 45, 1, 29, 1, 0),
(41, 45, 1, 9, 1, 0),
(42, 45, 1, 33, 0, 0),
(43, 45, 2, 21, 1, 0),
(44, 45, 2, 12, 0, 0),
(45, 45, 3, 20, 0, 0),
(46, 45, 3, 16, 0, 0),
(47, 45, 3, 25, 0, 0),
(48, 45, 4, 17, 0, 0),
(49, 45, 4, 15, 0, 0),
(50, 45, 5, 18, 1, 0),
(51, 45, 5, 13, 0, 0),
(52, 45, 6, 11, 0, 0),
(53, 45, 6, 26, 1, 0),
(54, 45, 6, 14, 0, 0),
(55, 45, 7, 8, 0, 0),
(56, 45, 7, 31, 1, 0),
(57, 45, 1, 15, 1, 0),
(58, 45, 2, 9, 0, 0),
(59, 45, 2, 13, 0, 0),
(60, 45, 3, 8, 0, 0),
(61, 45, 3, 12, 0, 0),
(62, 45, 4, 16, 0, 0),
(63, 45, 4, 25, 0, 0),
(64, 45, 5, 11, 0, 0),
(65, 45, 5, 9, 0, 0),
(66, 45, 6, 34, 0, 0),
(67, 45, 6, 12, 0, 0),
(68, 45, 6, 10, 1, 0),
(69, 45, 7, 11, 0, 0),
(70, 45, 7, 9, 0, 0),
(71, 48, 1, 28, 0, 0),
(72, 48, 1, 17, 0, 0),
(73, 48, 1, 23, 0, 0),
(74, 48, 2, 20, 0, 0),
(75, 48, 2, 17, 0, 0),
(76, 48, 2, 23, 0, 0),
(77, 48, 3, 18, 0, 0),
(78, 48, 3, 12, 0, 0),
(79, 48, 3, 14, 0, 0),
(80, 48, 4, 19, 0, 0),
(81, 48, 4, 17, 0, 0),
(82, 48, 4, 10, 0, 0),
(83, 48, 5, 8, 0, 0),
(84, 48, 5, 17, 0, 0),
(85, 48, 5, 13, 0, 0),
(86, 48, 6, 30, 0, 0),
(87, 48, 6, 17, 0, 0),
(88, 48, 6, 15, 0, 0),
(89, 48, 7, 32, 0, 0),
(90, 48, 7, 16, 0, 0),
(91, 48, 7, 33, 0, 0),
(92, 13, 1, 8, 0, 0),
(93, 13, 1, 16, 0, 0),
(94, 13, 1, 33, 0, 0),
(95, 13, 2, 18, 0, 0),
(96, 13, 2, 17, 0, 0),
(97, 13, 2, 40, 0, 0),
(98, 13, 3, 11, 0, 0),
(99, 13, 3, 24, 0, 0),
(100, 13, 3, 35, 0, 0),
(101, 13, 4, 28, 0, 0),
(102, 13, 4, 38, 0, 0),
(103, 13, 4, 14, 0, 0),
(104, 13, 5, 21, 0, 0),
(105, 13, 5, 31, 0, 0),
(106, 13, 5, 15, 0, 0),
(107, 13, 6, 30, 0, 0),
(108, 13, 6, 12, 0, 0),
(109, 13, 6, 13, 0, 0),
(110, 13, 7, 18, 0, 0),
(111, 13, 7, 22, 0, 0),
(112, 13, 7, 10, 0, 0),
(113, 15, 1, 8, 0, 0),
(114, 15, 1, 22, 0, 0),
(115, 15, 1, 10, 0, 0),
(116, 15, 2, 11, 0, 0),
(117, 15, 2, 31, 0, 0),
(118, 15, 2, 13, 0, 0),
(119, 15, 3, 19, 0, 0),
(120, 15, 3, 38, 0, 0),
(121, 15, 3, 14, 0, 0),
(122, 15, 4, 11, 0, 0),
(123, 15, 4, 24, 0, 0),
(124, 15, 4, 25, 0, 0),
(125, 15, 5, 30, 0, 0),
(126, 15, 5, 9, 0, 0),
(127, 15, 5, 15, 0, 0),
(128, 15, 6, 32, 0, 0),
(129, 15, 6, 12, 0, 0),
(130, 15, 6, 35, 0, 0),
(131, 15, 7, 34, 0, 0),
(132, 15, 7, 26, 0, 0),
(133, 15, 7, 40, 0, 0),
(134, 15, 1, 34, 0, 0),
(135, 15, 1, 9, 0, 0),
(136, 15, 2, 8, 0, 0),
(137, 15, 2, 22, 0, 0),
(138, 15, 2, 40, 0, 0),
(139, 15, 3, 18, 0, 0),
(140, 15, 3, 35, 0, 0),
(141, 15, 4, 19, 0, 0),
(142, 15, 4, 31, 0, 0),
(143, 15, 4, 13, 0, 0),
(144, 15, 5, 20, 0, 0),
(145, 15, 5, 12, 0, 0),
(146, 15, 5, 33, 0, 0),
(147, 15, 6, 30, 0, 0),
(148, 15, 6, 9, 0, 0),
(149, 15, 6, 14, 0, 0),
(150, 15, 7, 16, 0, 0),
(151, 15, 7, 27, 0, 0),
(152, 15, 1, 26, 0, 0),
(153, 15, 1, 14, 0, 0),
(154, 15, 2, 19, 0, 0),
(155, 15, 2, 9, 0, 0),
(156, 15, 3, 11, 0, 0),
(157, 15, 3, 24, 0, 0),
(158, 15, 3, 10, 0, 0),
(159, 15, 4, 18, 0, 0),
(160, 15, 4, 22, 0, 0),
(161, 15, 4, 15, 0, 0),
(162, 15, 5, 27, 0, 0),
(163, 15, 6, 16, 0, 0),
(164, 15, 6, 33, 0, 0),
(165, 15, 7, 31, 0, 0);

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
(5, 46, 'u15co039'),
(6, 48, 'u15co039'),
(7, 13, 'u15co039');

-- --------------------------------------------------------

--
-- Table structure for table `voted`
--

CREATE TABLE `voted` (
  `voteid` int(11) NOT NULL,
  `colid` varchar(8) NOT NULL,
  `menuid` int(11) NOT NULL,
  `week` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voted`
--

INSERT INTO `voted` (`voteid`, `colid`, `menuid`, `week`) VALUES
(17, 'u15co039', 113, 15),
(18, 'u15co039', 114, 15),
(19, 'u15co039', 115, 15),
(20, 'u15co039', 116, 15),
(21, 'u15co039', 117, 15),
(22, 'u15co039', 118, 15),
(23, 'u15co039', 119, 15),
(24, 'u15co039', 120, 15),
(25, 'u15co039', 121, 15),
(26, 'u15co039', 122, 15),
(27, 'u15co039', 123, 15),
(28, 'u15co039', 124, 15),
(29, 'u15co039', 125, 15),
(30, 'u15co039', 126, 15),
(31, 'u15co039', 127, 15),
(32, 'u15co039', 128, 15),
(33, 'u15co039', 129, 15),
(34, 'u15co039', 130, 15),
(35, 'u15co039', 131, 15),
(36, 'u15co039', 132, 15),
(37, 'u15co039', 133, 15),
(38, 'u15co050', 134, 15),
(39, 'u15co050', 135, 15),
(40, 'u15co050', 115, 15),
(41, 'u15co050', 136, 15),
(42, 'u15co050', 137, 15),
(43, 'u15co050', 138, 15),
(44, 'u15co050', 139, 15),
(45, 'u15co050', 120, 15),
(46, 'u15co050', 140, 15),
(47, 'u15co050', 141, 15),
(48, 'u15co050', 142, 15),
(49, 'u15co050', 143, 15),
(50, 'u15co050', 144, 15),
(51, 'u15co050', 145, 15),
(52, 'u15co050', 146, 15),
(53, 'u15co050', 147, 15),
(54, 'u15co050', 148, 15),
(55, 'u15co050', 149, 15),
(56, 'u15co050', 131, 15),
(57, 'u15co050', 150, 15),
(58, 'u15co050', 151, 15),
(59, 'u15co001', 113, 15),
(60, 'u15co001', 152, 15),
(61, 'u15co001', 153, 15),
(62, 'u15co001', 154, 15),
(63, 'u15co001', 155, 15),
(64, 'u15co001', 118, 15),
(65, 'u15co001', 156, 15),
(66, 'u15co001', 157, 15),
(67, 'u15co001', 158, 15),
(68, 'u15co001', 159, 15),
(69, 'u15co001', 160, 15),
(70, 'u15co001', 161, 15),
(71, 'u15co001', 144, 15),
(72, 'u15co001', 145, 15),
(73, 'u15co001', 162, 15),
(74, 'u15co001', 128, 15),
(75, 'u15co001', 163, 15),
(76, 'u15co001', 164, 15),
(77, 'u15co001', 131, 15),
(78, 'u15co001', 165, 15),
(79, 'u15co001', 133, 15);

-- --------------------------------------------------------

--
-- Structure for view `hola`
--
DROP TABLE IF EXISTS `hola`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hola`  AS  select `menu`.`foodid` AS `foodid`,`food`.`foodname` AS `foodname`,`menu`.`menuid` AS `menuid` from (`menu` join `food`) where (`menu`.`menuid` in (select `voted`.`menuid` from `voted` where (`voted`.`week` = '15') group by `voted`.`menuid`) and (`menu`.`foodid` = `food`.`foodid`) and (`food`.`foodtype` = 3)) group by `menu`.`foodid` ;

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
-- Indexes for table `voted`
--
ALTER TABLE `voted`
  ADD PRIMARY KEY (`voteid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `foodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `voteid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `voted`
--
ALTER TABLE `voted`
  MODIFY `voteid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

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
