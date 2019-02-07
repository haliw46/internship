-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2019 at 09:28 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `no_c` varchar(10) NOT NULL,
  `name_c` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`no_c`, `name_c`) VALUES
('101', 'php'),
('102', 'html'),
('103', 'json'),
('104', 'python'),
('105', 'css'),
('111', 'ทดสอบ1'),
('112', 'ทดสอบ2'),
('113', 'ทดสอบ3'),
('114', 'ทดสอบ4'),
('115', 'ทดสอบ5'),
('131', 'test'),
('132', 'test'),
('133', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `ucid` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `no_c` varchar(100) NOT NULL,
  `startcourse` date NOT NULL,
  `endcourse` date NOT NULL,
  `total` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`ucid`, `Username`, `no_c`, `startcourse`, `endcourse`, `total`) VALUES
(23, 'admin', '101', '2019-02-07', '2019-02-08', '0');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `UserID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Status` enum('ADMIN','USER') NOT NULL DEFAULT 'USER',
  `position` varchar(50) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`UserID`, `Username`, `Password`, `Name`, `Status`, `position`, `pic`) VALUES
(001, 'admin', '12345678', 'test1', 'ADMIN', 'developer', 'user.jpg'),
(002, 'test1', '1234', 'testuser', 'ADMIN', 'HR', 'HR.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `ucid` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `no_c` varchar(10) NOT NULL,
  `startcourse` date NOT NULL,
  `endcourse` date NOT NULL,
  `total` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`ucid`, `Username`, `no_c`, `startcourse`, `endcourse`, `total`) VALUES
(1, 'admin', '111', '0000-00-00', '0000-00-00', '0000-00-00'),
(2, 'admin', '112', '0000-00-00', '0000-00-00', '0000-00-00'),
(3, 'admin', '113', '0000-00-00', '0000-00-00', '0000-00-00'),
(4, 'admin', '114', '0000-00-00', '0000-00-00', '0000-00-00'),
(5, 'admin', '115', '0000-00-00', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `recommend`
--

CREATE TABLE `recommend` (
  `ucid` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `no_c` varchar(10) NOT NULL,
  `startcourse` date NOT NULL,
  `endcourse` date NOT NULL,
  `total` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recommend`
--

INSERT INTO `recommend` (`ucid`, `Username`, `no_c`, `startcourse`, `endcourse`, `total`) VALUES
(1, 'admin', '131', '0000-00-00', '0000-00-00', '0000-00-00'),
(2, 'admin', '132', '0000-00-00', '0000-00-00', '0000-00-00'),
(3, 'admin', '133', '0000-00-00', '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`no_c`);

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`ucid`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`ucid`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `recommend`
--
ALTER TABLE `recommend`
  ADD PRIMARY KEY (`ucid`),
  ADD KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `ucid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `other`
--
ALTER TABLE `other`
  MODIFY `ucid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `recommend`
--
ALTER TABLE `recommend`
  MODIFY `ucid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `main`
--
ALTER TABLE `main`
  ADD CONSTRAINT `main_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `member` (`Username`);

--
-- Constraints for table `other`
--
ALTER TABLE `other`
  ADD CONSTRAINT `other_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `member` (`Username`);

--
-- Constraints for table `recommend`
--
ALTER TABLE `recommend`
  ADD CONSTRAINT `recommend_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `member` (`Username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
