-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2024 at 01:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `Password` varchar(50) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `Password`, `email`, `phone`, `address`) VALUES
(9, 'admin', '33aab3c7f01620cade108f488cfd285c0e62c1ec', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `ID` int(11) NOT NULL,
  `bus_name` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL,
  `plates` varchar(10) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`ID`, `bus_name`, `capacity`, `plates`, `driver_id`, `type_id`, `info`) VALUES
(3, 'Zayed', 10, 'sdb6485', 0, 0, ''),
(5, 'Mohamed', 1018874908, '', NULL, NULL, NULL),
(6, 'Mohamed', 1018874908, '', NULL, NULL, NULL),
(7, 'Mohamed', 1018874908, '', NULL, NULL, NULL),
(8, 'Mohamed', 1018874908, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bus_points`
--

CREATE TABLE `bus_points` (
  `ID` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `point_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bus_points`
--

INSERT INTO `bus_points` (`ID`, `bus_id`, `point_id`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 2, 2),
(4, 2, 4),
(5, 3, 3),
(6, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `bus_ride`
--

CREATE TABLE `bus_ride` (
  `ID` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `ride_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`ID`, `name`, `phone number`) VALUES
(8, 'Mohamed', '0112341'),
(9, 'Ahmed', '0112341'),
(10, '7masa', '01018874908');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `ID` int(11) NOT NULL,
  `point_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`ID`, `point_name`) VALUES
(1, 'Maadi'),
(2, 'Zayed'),
(3, 'Fatma Roshdy'),
(4, 'Faisal'),
(5, 'rehab'),
(6, 'Dokki'),
(7, 'Mokatam'),
(9, 'Tahrir SQ'),
(10, 'Hyper One');

-- --------------------------------------------------------

--
-- Table structure for table `rides`
--

CREATE TABLE `rides` (
  `ID` int(11) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rides`
--

INSERT INTO `rides` (`ID`, `time`) VALUES
(1, '9:00 AM'),
(2, '5:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `bus_points`
--
ALTER TABLE `bus_points`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `bus_ride`
--
ALTER TABLE `bus_ride`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rides`
--
ALTER TABLE `rides`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bus_points`
--
ALTER TABLE `bus_points`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bus_ride`
--
ALTER TABLE `bus_ride`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rides`
--
ALTER TABLE `rides`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
