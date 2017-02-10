-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2017 at 03:38 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `groupproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `fld_Key` int(10) NOT NULL,
  `fld_QuizID` varchar(50) NOT NULL,
  `fld_Test_Taken` int(10) NOT NULL,
  `fld_UserID` varchar(15) NOT NULL,
  `fld_ResultOne` int(15) DEFAULT NULL,
  `fld_ResultTwo` int(15) DEFAULT NULL,
  `fld_ResultThree` int(15) DEFAULT NULL,
  `fld_ResultFour` int(15) DEFAULT NULL,
  `fld_ResultFive` int(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`fld_Key`, `fld_QuizID`, `fld_Test_Taken`, `fld_UserID`, `fld_ResultOne`, `fld_ResultTwo`, `fld_ResultThree`, `fld_ResultFour`, `fld_ResultFive`) VALUES
(14, 'mathQuiz1', 5, '37007181', 3, 5, 0, 0, 3),
(16, 'mathQuiz1', 5, '37007203', 4, 4, 4, 4, 2),
(36, 'mathQuiz1', 1, '37007181', 5, NULL, NULL, NULL, NULL),
(32, 'mathQuiz1', 5, '12345678', 5, 5, 0, 3, 4),
(35, 'mathQuiz1', 1, '37007181', 5, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `fld_CourseID` int(15) NOT NULL,
  `fld_Course` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`fld_CourseID`, `fld_Course`) VALUES
(1, 'Maths'),
(2, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `fld_QuestionID` int(15) NOT NULL,
  `fld_CourseID` varchar(500) NOT NULL,
  `fld_Subject` varchar(50) NOT NULL,
  `fld_Topic` varchar(50) NOT NULL,
  `fld_UserID` int(15) NOT NULL,
  `fld_Question` varchar(1500) NOT NULL,
  `fld_OptionOne` varchar(500) NOT NULL,
  `Fld_OptionTwo` varchar(500) NOT NULL,
  `fld_OptionThree` varchar(500) NOT NULL,
  `fld_optionFour` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`fld_QuestionID`, `fld_CourseID`, `fld_Subject`, `fld_Topic`, `fld_UserID`, `fld_Question`, `fld_OptionOne`, `Fld_OptionTwo`, `fld_OptionThree`, `fld_optionFour`) VALUES
(1, '1234', 'Maths', 'Fractions', 123456, 'A fraction which bears the same ratio to 1/27 as 3/11 bear to 5/9 is equal to _____', ' 1/55', '55', '3/11', '1/11'),
(2, '1234', 'Maths', 'Persentages', 123456, '125 gallons of a mixture contains 20% water. What amount of additional water should be added such that water content be raised to 25%?', 'You must add 81/3 gallons', 'You must add 19/2 gallons.', 'You must add  A. 15/2 gallons.', 'You must add 17/2 gallons.'),
(3, '1234', 'Maths', 'Multiplication', 123456, 'A clock strikes once at 1 o\'clock, twice at 2 o\'clock, thrice at 3 o\'clock and so on. How many times will it strike in 24 hours?', '156', '78', '136', '196'),
(4, '1234', 'Maths', 'Square routes', 123456, 'Which of the following numbers gives 240 when added to its own square?', '15', '16', '18', '20'),
(5, '1234', 'Maths', 'Arithmetic ', 123456, '106 Ã— 106 â€“ 94 Ã— 94 = ?', '2400', '2004', '1904', '1906'),
(6, '1234', 'Maths', 'Multiplication', 700460, 'What is 20 x 5 ? ', '100', '80', '120', '70'),
(7, '1234', 'Maths', 'Subtraction', 700460, 'What is 100 - 99?', '1', '2', '5', '3'),
(10, '1235', 'English', 'Language', 123456, 'Don\'t really care', 'no', 'yes', 'no', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fld_UserID` int(10) NOT NULL,
  `fld_Forename` varchar(128) NOT NULL,
  `fld_Surname` varchar(128) NOT NULL,
  `fld_Email` varchar(128) NOT NULL,
  `fld_Password` varchar(1000) NOT NULL,
  `fld_Sec_Level` varchar(1) NOT NULL,
  `fld_Subject` varchar(50) NOT NULL,
  `fld_2ndSubject` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fld_UserID`, `fld_Forename`, `fld_Surname`, `fld_Email`, `fld_Password`, `fld_Sec_Level`, `fld_Subject`, `fld_2ndSubject`) VALUES
(37007181, 'Donald', 'Page', 'donald.page@sky.com', '$2y$10$uOf9mWV1oBaPGv4Ur4n8XOctOQ4pzWpA/9Q4KJVcierR0UDVi.mo2', '3', 'Maths', 'English'),
(37007203, 'Ian', 'Boxell', '37007203@petroc.ac.uk', '$2y$10$id8XWISObZFxxgXhpNl5v.QJ3eyogtY6oYBOpIcmuOXCcXjjCfna.', '3', 'English', 'Maths'),
(123456, 'David', 'Clansy', 'david@petroc.ac.uk', '$2y$10$TvRxdIhGplFsBkAtHM12DOWhkkTuAtwItx2vq58DpUZwFZyQBKDam', '2', 'English', 'Maths'),
(37007007, 'Caleb', 'Page', 'caleb.page@sky.com', '$2y$10$h9oE1tH5ib7hII7YV3AN/.0L1LbHNtl1q1efm3nVaYRKYTDvsy79C', '3', 'English', ''),
(12345678, 'Daniel', 'Neilson', 'daniel.neilson@yahoo.co.uk', '$2y$10$FMlkcuYN2uuAyN7kR0WX/uAO3yakVsqoS.9q.SnbAZykkQE3BmOGm', '3', 'Maths', ''),
(700460, 'David', 'Stedman', 'edward.stedman@petroc.ac.uk', '$2y$10$92mEYDGRwLHh5sw2FFr74.HcC4Ou6UE1JK/iZAETkgax/eV/u5Lv6', '2', 'Networking', 'Buisiness'),
(654321, 'Donald', 'Page', 'donald.page@sky.com', 'admin', '2', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`fld_Key`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`fld_CourseID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`fld_QuestionID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`fld_UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `fld_Key` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `fld_CourseID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `fld_QuestionID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
