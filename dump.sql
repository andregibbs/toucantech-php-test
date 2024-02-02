-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 02, 2024 at 03:07 AM
-- Server version: 5.6.34
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `toucantechdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `emailID` int(11) NOT NULL,
  `UserRefID` int(11) DEFAULT NULL,
  `emailaddress` varchar(255) DEFAULT NULL,
  `Default` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`emailID`, `UserRefID`, `emailaddress`, `Default`) VALUES
(1, 100567, 'j.smith@test.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `schoolID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberID`, `name`, `email`, `schoolID`) VALUES
(1, 'John Doe', 'john.doe@email.com', 1),
(2, 'Jane Smith', 'jane.smith@email.com', 2),
(3, 'Alice Johnson', 'alice.johnson@email.com', 1),
(4, 'Bob Williams', 'bob.williams@email.com', 3),
(5, 'Andre Gibbs', 'andre_d_gibbs@hotmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `UserRefID` int(11) NOT NULL,
  `Firstname` varchar(255) DEFAULT NULL,
  `Surname` varchar(255) DEFAULT NULL,
  `Deceased` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`UserRefID`, `Firstname`, `Surname`, `Deceased`) VALUES
(100567, 'John', 'Smith', 0);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `schoolID` int(11) NOT NULL,
  `schoolName` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`schoolID`, `schoolName`, `country`) VALUES
(1, 'ABC School', 'USA'),
(2, 'XYZ Academy', 'UK'),
(3, '123 High School', 'Canada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`emailID`),
  ADD KEY `UserRefID` (`UserRefID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`),
  ADD KEY `schoolID` (`schoolID`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`UserRefID`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`schoolID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `schoolID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_ibfk_1` FOREIGN KEY (`UserRefID`) REFERENCES `profiles` (`UserRefID`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`schoolID`) REFERENCES `schools` (`schoolID`);
