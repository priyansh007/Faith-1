-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 11:00 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

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
(44, 'samosa', 1, 0),
(45, 'ragada-petis', 1, 0),
(46, 'uthapam', 1, 0),
(47, 'khaman', 1, 0),
(48, 'idada', 1, 0),
(49, 'pauha', 1, 0),
(50, 'idli', 1, 0),
(51, 'mendu-vada', 1, 0),
(52, 'vada pav', 1, 0),
(53, 'aloo-tikki', 1, 0),
(54, 'thepala', 1, 0),
(55, 'upama', 1, 0),
(56, 'alo-sabji', 2, 0),
(57, 'mix-veg', 2, 0),
(58, 'paneer-tikka', 2, 0),
(59, 'shole-masala', 2, 0),
(60, 'aloo-mutter', 2, 0),
(61, 'kadi-pakoda', 2, 0),
(62, 'brinjal', 2, 0),
(63, 'palak', 2, 0),
(64, 'sevtamatar', 2, 0),
(65, 'kajukari', 2, 0),
(66, 'veg-kadai', 3, 0),
(67, 'aloo-paratha', 3, 0),
(68, 'anda-kari', 3, 0),
(69, 'chicken', 3, 0),
(70, 'sev-tamatar', 3, 0),
(71, 'khichadi', 3, 0),
(72, 'damaloo', 3, 0),
(73, 'kaju-kari', 3, 0),
(75, 'banana sabji', 3, 0),
(76, 'coffee', 1, 0);

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
  `deleted` int(1) NOT NULL DEFAULT '0',
  `colid` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menuid`, `week`, `day`, `foodid`, `approve`, `deleted`, `colid`) VALUES
(221, 15, 1, 44, 1, 0, 'u15co050'),
(222, 15, 1, 58, 1, 0, 'u15co050'),
(223, 15, 1, 69, 0, 0, 'u15co050'),
(224, 15, 2, 47, 0, 0, 'u15co050'),
(225, 15, 2, 58, 0, 0, 'u15co050'),
(226, 15, 2, 70, 0, 0, 'u15co050'),
(227, 15, 3, 47, 0, 0, 'u15co050'),
(228, 15, 3, 62, 0, 0, 'u15co050'),
(229, 15, 3, 73, 0, 0, 'u15co050'),
(230, 15, 4, 52, 0, 0, 'u15co050'),
(231, 15, 4, 63, 0, 0, 'u15co050'),
(232, 15, 4, 75, 0, 0, 'u15co050'),
(233, 15, 5, 54, 0, 0, 'u15co050'),
(234, 15, 5, 64, 0, 0, 'u15co050'),
(235, 15, 5, 72, 0, 0, 'u15co050'),
(236, 15, 6, 53, 0, 0, 'u15co050'),
(237, 15, 6, 60, 0, 0, 'u15co050'),
(238, 15, 6, 73, 0, 0, 'u15co050'),
(239, 15, 7, 55, 0, 0, 'u15co050'),
(240, 15, 7, 57, 0, 0, 'u15co050'),
(241, 15, 7, 75, 0, 0, 'u15co050'),
(242, 15, 1, 63, 0, 0, 'u15co039'),
(243, 15, 1, 66, 1, 0, 'u15co039'),
(244, 15, 2, 45, 1, 0, 'u15co039'),
(245, 15, 2, 56, 1, 0, 'u15co039'),
(246, 15, 2, 67, 0, 0, 'u15co039'),
(247, 15, 3, 46, 1, 0, 'u15co039'),
(248, 15, 3, 57, 1, 0, 'u15co039'),
(249, 15, 3, 68, 1, 0, 'u15co039'),
(250, 15, 4, 49, 0, 0, 'u15co039'),
(251, 15, 4, 59, 1, 0, 'u15co039'),
(252, 15, 4, 69, 1, 0, 'u15co039'),
(253, 15, 5, 50, 0, 0, 'u15co039'),
(254, 15, 5, 60, 0, 0, 'u15co039'),
(255, 15, 5, 73, 0, 0, 'u15co039'),
(256, 15, 6, 61, 0, 0, 'u15co039'),
(257, 15, 7, 54, 0, 0, 'u15co039'),
(258, 15, 7, 61, 0, 0, 'u15co039'),
(259, 15, 1, 45, 0, 0, 'u15co001'),
(260, 15, 1, 62, 0, 0, 'u15co001'),
(261, 15, 1, 67, 0, 0, 'u15co001'),
(262, 15, 2, 46, 0, 0, 'u15co001'),
(263, 15, 2, 63, 0, 0, 'u15co001'),
(264, 15, 2, 66, 1, 0, 'u15co001'),
(265, 15, 3, 46, 1, 0, 'u15co001'),
(266, 15, 3, 59, 0, 0, 'u15co001'),
(267, 15, 3, 68, 1, 0, 'u15co001'),
(268, 15, 4, 48, 1, 0, 'u15co001'),
(269, 15, 4, 60, 0, 0, 'u15co001'),
(270, 15, 4, 70, 0, 0, 'u15co001'),
(271, 15, 5, 48, 1, 0, 'u15co001'),
(272, 15, 5, 58, 1, 0, 'u15co001'),
(273, 15, 5, 71, 1, 0, 'u15co001'),
(274, 15, 6, 51, 1, 0, 'u15co001'),
(275, 15, 6, 57, 1, 0, 'u15co001'),
(276, 15, 6, 68, 1, 0, 'u15co001'),
(277, 15, 7, 49, 1, 0, 'u15co001'),
(278, 15, 7, 56, 1, 0, 'u15co001'),
(279, 15, 7, 71, 1, 0, 'u15co001');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `usid` varchar(8) NOT NULL,
  `star` double NOT NULL,
  `week` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`usid`, `star`, `week`) VALUES
('u15co039', 3.6666666666667, 15),
('u15co050', 4.3333333333333, 15);

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `suggid` int(11) NOT NULL,
  `suggfoodtype` int(1) NOT NULL,
  `suggfoodname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`suggid`, `suggfoodtype`, `suggfoodname`) VALUES
(12, 0, 'asd'),
(15, 1, 'jambu');

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
(101, 'u15co050', 221, 15),
(102, 'u15co050', 222, 15),
(103, 'u15co050', 223, 15),
(104, 'u15co050', 224, 15),
(105, 'u15co050', 225, 15),
(106, 'u15co050', 226, 15),
(107, 'u15co050', 227, 15),
(108, 'u15co050', 228, 15),
(109, 'u15co050', 229, 15),
(110, 'u15co050', 230, 15),
(111, 'u15co050', 231, 15),
(112, 'u15co050', 232, 15),
(113, 'u15co050', 233, 15),
(114, 'u15co050', 234, 15),
(115, 'u15co050', 235, 15),
(116, 'u15co050', 236, 15),
(117, 'u15co050', 237, 15),
(118, 'u15co050', 238, 15),
(119, 'u15co050', 239, 15),
(120, 'u15co050', 240, 15),
(121, 'u15co050', 241, 15),
(122, 'u15co039', 221, 15),
(123, 'u15co039', 242, 15),
(124, 'u15co039', 243, 15),
(125, 'u15co039', 244, 15),
(126, 'u15co039', 245, 15),
(127, 'u15co039', 246, 15),
(128, 'u15co039', 247, 15),
(129, 'u15co039', 248, 15),
(130, 'u15co039', 249, 15),
(131, 'u15co039', 250, 15),
(132, 'u15co039', 251, 15),
(133, 'u15co039', 252, 15),
(134, 'u15co039', 253, 15),
(135, 'u15co039', 254, 15),
(136, 'u15co039', 255, 15),
(137, 'u15co039', 236, 15),
(138, 'u15co039', 256, 15),
(139, 'u15co039', 238, 15),
(140, 'u15co039', 257, 15),
(141, 'u15co039', 258, 15),
(142, 'u15co039', 241, 15);

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
  ADD KEY `foodid` (`foodid`),
  ADD KEY `colid` (`colid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`usid`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`suggid`);

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
  MODIFY `foodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;
--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `suggid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `voted`
--
ALTER TABLE `voted`
  MODIFY `voteid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`foodid`) REFERENCES `food` (`foodid`),
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`colid`) REFERENCES `login` (`colid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
