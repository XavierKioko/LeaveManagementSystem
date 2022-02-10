-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2020 at 11:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Dept` varchar(50) NOT NULL,
  `SetSickLeave` int(11) NOT NULL DEFAULT 15,
  `SetCasualLeave` int(11) NOT NULL DEFAULT 10,
  `SetEarnLeave` int(11) NOT NULL DEFAULT 30,
  `SetMaternityLeave` int(11) NOT NULL DEFAULT 40,
  `SetPaternityLeave` int(11) NOT NULL DEFAULT 7,
  `SetAnnualLeave` int(11) NOT NULL DEFAULT 20
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `Dept`, `SetSickLeave`, `SetCasualLeave`, `SetEarnLeave`, `SetMaternityLeave`, `SetPaternityLeave`, `SetAnnualLeave`) VALUES
(10, 'jacob', 'jacob', 'MIT', 2, 4, 9, 40, 7, 20);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `EmpPass` varchar(200) NOT NULL,
  `EmpName` varchar(50) NOT NULL,
  `EmpEmail` varchar(40) NOT NULL,
  `Dept` varchar(30) NOT NULL,
  `EarnLeave` int(5) UNSIGNED NOT NULL,
  `SickLeave` int(5) UNSIGNED NOT NULL,
  `CasualLeave` int(5) UNSIGNED NOT NULL,
  `DateOfJoin` date NOT NULL,
  `Random` int(15) NOT NULL,
  `Designation` varchar(40) NOT NULL,
  `Supervisor` varchar(40) NOT NULL,
  `EmpType` varchar(40) NOT NULL,
  `UpdateStatus` date NOT NULL,
  `DateOfBirth` date NOT NULL,
  `MaternityLeave` int(5) UNSIGNED NOT NULL,
  `PaternityLeave` int(5) UNSIGNED NOT NULL,
  `AnnualLeave` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `UserName`, `EmpPass`, `EmpName`, `EmpEmail`, `Dept`, `EarnLeave`, `SickLeave`, `CasualLeave`, `DateOfJoin`, `Random`, `Designation`, `Supervisor`, `EmpType`, `UpdateStatus`, `DateOfBirth`, `MaternityLeave`, `PaternityLeave`, `AnnualLeave`) VALUES
(24, 'pat', 'pat', 'Pat Utomi', 'pat@fcmb.com', 'MIT', 9, 2, 4, '2020-01-01', 0, 'Developer', 'blessing', 'Permanent', '0000-00-00', '1989-01-01', 40, 7, 19);

-- --------------------------------------------------------

--
-- Table structure for table `emp_leaves`
--

CREATE TABLE `emp_leaves` (
  `id` int(11) NOT NULL,
  `EmpName` varchar(50) NOT NULL,
  `LeaveType` varchar(60) NOT NULL,
  `RequestDate` datetime NOT NULL DEFAULT current_timestamp(),
  `LeaveDays` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'Pending',
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Dept` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_leaves`
--

INSERT INTO `emp_leaves` (`id`, `EmpName`, `LeaveType`, `RequestDate`, `LeaveDays`, `Status`, `StartDate`, `EndDate`, `Dept`) VALUES
(26, 'Pat Utomi', 'Annual Leave', '2020-10-18 21:01:52', 1, 'Granted', '2020-11-01', '2020-11-02', 'MIT');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Dept` varchar(50) NOT NULL,
  `SetSickLeave` int(11) NOT NULL DEFAULT 15,
  `SetCasualLeave` int(11) NOT NULL DEFAULT 10,
  `SetEarnLeave` int(11) NOT NULL DEFAULT 30,
  `SetMaternityLeave` int(11) NOT NULL DEFAULT 40,
  `SetPaternityLeave` int(11) NOT NULL DEFAULT 7,
  `SetAnnualLeave` int(11) NOT NULL DEFAULT 20,
  `EmpEmail` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `username`, `password`, `Dept`, `SetSickLeave`, `SetCasualLeave`, `SetEarnLeave`, `SetMaternityLeave`, `SetPaternityLeave`, `SetAnnualLeave`, `EmpEmail`) VALUES
(4, 'blessing', 'blessing', 'Contact Center', 5, 2, 30, 40, 7, 20, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_leaves`
--
ALTER TABLE `emp_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `emp_leaves`
--
ALTER TABLE `emp_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
