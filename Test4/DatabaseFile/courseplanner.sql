-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 10:58 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courseplanner`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_table`
--

CREATE TABLE `course_table` (
  `ID` int(11) NOT NULL,
  `CourseName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_table`
--

INSERT INTO `course_table` (`ID`, `CourseName`) VALUES
(17, 'C++'),
(18, 'Java'),
(19, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `lession_table`
--

CREATE TABLE `lession_table` (
  `ID` int(11) NOT NULL,
  `Lession_title` varchar(50) NOT NULL,
  `CourseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lession_table`
--

INSERT INTO `lession_table` (`ID`, `Lession_title`, `CourseID`) VALUES
(11, 'Operator,Function,Array,', 17),
(12, 'Operator,Array,function,', 18),
(13, 'Operator,Function,Conditional,', 19);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_table`
--

CREATE TABLE `quiz_table` (
  `ID` int(11) NOT NULL,
  `Quiz_title` varchar(50) NOT NULL,
  `LessionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_table`
--

INSERT INTO `quiz_table` (`ID`, `Quiz_title`, `LessionID`) VALUES
(6, '++,function(),[],', 11),
(7, '++,--,[],{},(),function(),', 12),
(8, '++,--,(),function(),if,if else,', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_table`
--
ALTER TABLE `course_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lession_table`
--
ALTER TABLE `lession_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `quiz_table`
--
ALTER TABLE `quiz_table`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_table`
--
ALTER TABLE `course_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lession_table`
--
ALTER TABLE `lession_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `quiz_table`
--
ALTER TABLE `quiz_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
