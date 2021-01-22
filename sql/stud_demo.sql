-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 08:37 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stud_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `stud_info`
--

CREATE TABLE `stud_info` (
  `stud_id` int(11) UNSIGNED NOT NULL,
  `FirstName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `DateOfBirth` varchar(20) DEFAULT NULL,
  `Mobile` varchar(11) DEFAULT NULL,
  `Designation` varchar(20) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Swimming` int(1) DEFAULT NULL,
  `Jogging` int(1) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_info`
--

INSERT INTO `stud_info` (`stud_id`, `FirstName`, `LastName`, `Email`, `DateOfBirth`, `Mobile`, `Designation`, `Gender`, `Swimming`, `Jogging`, `PostingDate`) VALUES
(1, 'Hemant', 'Ovhal', 'hemantovhal@gmail.com', '1993-10-03', '1236546465', 'andriod_developer', 'male', 1, 1, '2020-12-12 06:39:21'),
(2, 'Bhairav', 'Akhade', 'akhade@gmail.com', '2020-11-13', '9879798797', 'andriod_developer', 'male', 1, 1, '2020-12-12 06:57:45'),
(3, 'Lohith', 'Dadam', 'dadam@gmail.com', '2020-09-05', '6464654566', 'php_developer', 'female', NULL, NULL, '2020-12-12 07:01:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stud_info`
--
ALTER TABLE `stud_info`
  ADD PRIMARY KEY (`stud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stud_info`
--
ALTER TABLE `stud_info`
  MODIFY `stud_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
