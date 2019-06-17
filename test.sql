-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2019 at 01:29 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `Device`
--

CREATE TABLE `Device` (
  `DeviceNo` int(11) NOT NULL,
  `Company` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Available` varchar(3) NOT NULL DEFAULT 'Yes',
  `Returnable` varchar(3) NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Device`
--

INSERT INTO `Device` (`DeviceNo`, `Company`, `Type`, `Available`, `Returnable`) VALUES
(1, 'Dell', 'Laptop', 'No', 'Yes'),
(2, 'Lenovo', 'Laptop', 'No', 'Yes'),
(3, 'Apple', 'Laptop', 'Yes', 'Yes'),
(4, 'Dell', 'Keyboard', 'Yes', 'Yes'),
(5, 'Lenovo', 'Keyboard', 'Yes', 'Yes'),
(6, 'Apple', 'Keyboard', 'Yes', 'Yes'),
(7, 'Dell', 'Printer', 'Yes', 'Yes'),
(8, 'Lenovo', 'Printer', 'Yes', 'Yes'),
(9, 'Apple', 'Printer', 'Yes', 'Yes'),
(10, 'Dell', 'Mouse', 'Yes', 'Yes'),
(11, 'Lenovo', 'Mouse', 'Yes', 'Yes'),
(12, 'Apple', 'Mouse', 'Yes', 'Yes'),
(13, 'Dell', 'Projector', 'Yes', 'Yes'),
(14, 'Lenovo', 'Projector', 'Yes', 'Yes'),
(15, 'Apple', 'Projector', 'Yes', 'Yes'),
(16, 'Dell', 'Hard Disk', 'No', 'No'),
(17, 'Lenovo', 'Hard Disk', 'No', 'No'),
(18, 'Apple', 'Hard Disk', 'Yes', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `EmployeeNo` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Designation` varchar(255) NOT NULL,
  `RAXNo` int(11) NOT NULL,
  `Department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`EmployeeNo`, `Name`, `Designation`, `RAXNo`, `Department`) VALUES
(1, 'Saloni Kalra', 'Chairperson', 123, 'Data Center'),
(2, 'Rekha Kalra', 'Managing Director', 234, 'Data Center'),
(3, 'Suresh Kumar Kalra', 'Chief Executive Officer', 345, 'Data Center'),
(4, 'Himanshu Saraswat', 'Product Manager', 456, 'Data Center'),
(5, 'Saloni Gupta', 'Senior Consultant', 567, 'Data Center'),
(6, 'Khushi Kalra', 'Junior Consultant', 678, 'Data Center'),
(8, 'Pranika Massey', 'Senior Consultant', 789, 'Data Center'),
(9, 'Sneha Raina', 'HR Intern', 891, 'Human Resources');

-- --------------------------------------------------------

--
-- Table structure for table `Issue`
--

CREATE TABLE `Issue` (
  `IssueNo` int(11) NOT NULL,
  `Date` date NOT NULL,
  `EmployeeNo` int(11) NOT NULL,
  `DeviceNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Issue`
--

INSERT INTO `Issue` (`IssueNo`, `Date`, `EmployeeNo`, `DeviceNo`) VALUES
(34, '2019-06-17', 1, 1),
(36, '2019-06-17', 1, 16),
(37, '2019-06-17', 1, 2),
(38, '2019-06-17', 1, 17),
(39, '2019-06-18', 3, 1),
(40, '2019-06-18', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Return1`
--

CREATE TABLE `Return1` (
  `ReturnNo` int(11) NOT NULL,
  `Date` date NOT NULL,
  `EmployeeNo` int(11) NOT NULL,
  `DeviceNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Return1`
--

INSERT INTO `Return1` (`ReturnNo`, `Date`, `EmployeeNo`, `DeviceNo`) VALUES
(36, '2019-06-18', 1, 1),
(37, '2019-06-18', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`username`, `password`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Device`
--
ALTER TABLE `Device`
  ADD PRIMARY KEY (`DeviceNo`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`EmployeeNo`);

--
-- Indexes for table `Issue`
--
ALTER TABLE `Issue`
  ADD PRIMARY KEY (`IssueNo`),
  ADD KEY `EmployeeNo` (`EmployeeNo`),
  ADD KEY `DeviceNo` (`DeviceNo`);

--
-- Indexes for table `Return1`
--
ALTER TABLE `Return1`
  ADD PRIMARY KEY (`ReturnNo`),
  ADD KEY `DeviceNo` (`DeviceNo`),
  ADD KEY `EmployeeNo` (`EmployeeNo`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Device`
--
ALTER TABLE `Device`
  MODIFY `DeviceNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `EmployeeNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Issue`
--
ALTER TABLE `Issue`
  MODIFY `IssueNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `Return1`
--
ALTER TABLE `Return1`
  MODIFY `ReturnNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Issue`
--
ALTER TABLE `Issue`
  ADD CONSTRAINT `Issue_ibfk_2` FOREIGN KEY (`EmployeeNo`) REFERENCES `Employee` (`EmployeeNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Issue_ibfk_3` FOREIGN KEY (`DeviceNo`) REFERENCES `Device` (`DeviceNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Return1`
--
ALTER TABLE `Return1`
  ADD CONSTRAINT `Return1_ibfk_1` FOREIGN KEY (`DeviceNo`) REFERENCES `Device` (`DeviceNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Return1_ibfk_2` FOREIGN KEY (`EmployeeNo`) REFERENCES `Employee` (`EmployeeNo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
