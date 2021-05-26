-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 11:31 AM
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
-- Database: `assignment_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `ID` int(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `duedate` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `courseID` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`ID`, `Description`, `duedate`, `filename`, `courseID`) VALUES
(15, 'What is the role of protected access specifier?', '2021-04-03', 'C++.jpg', 9),
(16, 'Java Program to check if a vowel is present in the string?', '2021-04-08', 'java.jpg', 10),
(17, 'What is PHP $ and $$ Variables ?', '2021-04-10', 'php.jpg', 11),
(18, 'What is  Keyword in Python? ', '2021-04-02', 'python.png', 12),
(19, 'What Is Machine Learning, and How Does It Relate to AI?', '2021-04-03', 'AI.jpg', 14),
(20, 'Write a structure of C program', '2021-04-10', 'C++.jpg', 15);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` int(255) NOT NULL,
  `courseName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `courseName`) VALUES
(9, 'C++'),
(10, 'Java'),
(11, 'PHP'),
(12, 'Python'),
(14, 'AI'),
(15, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `doubts`
--

CREATE TABLE `doubts` (
  `ID` int(255) NOT NULL,
  `enrollment` varchar(255) NOT NULL,
  `courseID` int(255) NOT NULL,
  `Questions` varchar(255) NOT NULL,
  `Answers` varchar(255) NOT NULL,
  `likes` int(255) NOT NULL DEFAULT 0,
  `dislikes` int(255) NOT NULL DEFAULT 0,
  `is_seen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doubts`
--

INSERT INTO `doubts` (`ID`, `enrollment`, `courseID`, `Questions`, `Answers`, `likes`, `dislikes`, `is_seen`) VALUES
(1, '112233', 10, 'what is oop in java ?', '', 1, 0, 0),
(2, '223344', 12, 'what is NumPy?', '', 0, 1, 0),
(3, '334455', 11, 'how can print array?', 'print_r() function is used to print array ..', 2, 2, 1),
(4, '556677', 9, 'what is cout and cin?', 'cin is an object of the input stream and is used to take input from input streams like files, console, etc. cout is an object of the output stream that is used to show output. Basically, cin is an input statement while cout is an output statement. They al', 2, 3, 1),
(5, '334455', 14, 'What are intelligent agents? ', '', 0, 1, 0),
(6, '223344', 11, 'What is difference between echo and print?', '', 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `ID` int(255) NOT NULL,
  `Assignment_id` int(255) NOT NULL,
  `courseID` int(255) NOT NULL,
  `EnrollmentNo` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `assignmentFile` varchar(255) NOT NULL,
  `is_checked` int(11) NOT NULL DEFAULT 0,
  `marks` int(255) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`ID`, `Assignment_id`, `courseID`, `EnrollmentNo`, `date`, `assignmentFile`, `is_checked`, `marks`, `comments`) VALUES
(1, 16, 10, 112233, '2021-03-31 05:46:06', 'java.txt.txt', 1, 8, 'good'),
(2, 18, 11, 223344, '2021-03-31 05:59:32', 'python.txt', 1, 8, 'Excellent'),
(3, 18, 11, 112233, '2021-03-30 11:43:43', 'python.txt', 0, 0, ''),
(4, 16, 10, 112233, '2021-03-31 08:50:59', 'java.txt.txt', 1, 9, 'Very Good');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `doubts`
--
ALTER TABLE `doubts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `doubts`
--
ALTER TABLE `doubts`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `courseID` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
