-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2022 at 09:48 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addemployeeinbulk_date`
--

-- --------------------------------------------------------

--
-- Table structure for table `allemployeerecordmaster`
--

CREATE TABLE `allemployeerecordmaster` (
  `Id` int(30) NOT NULL,
  `EmployeeId` int(30) NOT NULL,
  `ShiftId` int(30) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employeemaster`
--

CREATE TABLE `employeemaster` (
  `Id` int(30) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeemaster`
--

INSERT INTO `employeemaster` (`Id`, `Name`) VALUES
(1, 'Emp1'),
(2, 'Emp2'),
(3, 'Emp3'),
(4, 'Emp3');

-- --------------------------------------------------------

--
-- Table structure for table `shiftmaster`
--

CREATE TABLE `shiftmaster` (
  `Id` int(30) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shiftmaster`
--

INSERT INTO `shiftmaster` (`Id`, `Name`) VALUES
(1, 'Shift1'),
(2, 'Shift2'),
(3, 'Shift3'),
(4, 'Shift4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allemployeerecordmaster`
--
ALTER TABLE `allemployeerecordmaster`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `employeemaster`
--
ALTER TABLE `employeemaster`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `shiftmaster`
--
ALTER TABLE `shiftmaster`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allemployeerecordmaster`
--
ALTER TABLE `allemployeerecordmaster`
  MODIFY `Id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employeemaster`
--
ALTER TABLE `employeemaster`
  MODIFY `Id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shiftmaster`
--
ALTER TABLE `shiftmaster`
  MODIFY `Id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
