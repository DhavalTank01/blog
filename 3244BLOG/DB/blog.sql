-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2021 at 06:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorytbl`
--

CREATE TABLE `categorytbl` (
  `id` int(6) UNSIGNED NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorytbl`
--

INSERT INTO `categorytbl` (`id`, `category`) VALUES
(8, 'C'),
(5, 'CSS'),
(6, 'HTML'),
(9, 'JAVA'),
(7, 'JavaScript');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(6) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL,
  `author` varchar(30) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `img` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `category`, `author`, `description`, `date`, `img`) VALUES
(4, 'About CSS Language ', 'CSS', 'Pradip Chavda ', 'Cascading Style Sheets is a style sheet language used for describing the presentation of a document written in a markup language such as HTML. CSS is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript.', '2021-04-28 17:29:47', 0x6373732e6a7067),
(5, 'About HTML Language ', 'HTML', 'Parth Chauhan ', 'The HyperText Markup Language, or HTML is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.', '2021-04-28 17:29:04', 0x68746d6c2e706e67),
(8, 'About JAVA Language ', 'JAVA', 'Dhaval Tank', 'Java is a class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.', '2021-04-28 17:31:18', 0x6a61766120322e6a7067),
(9, 'About JavaScript Language ', 'JavaScript', 'Dhaval Tank', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-orientation, and first-class functions.', '2021-04-28 17:32:13', 0x6a732e6a7067),
(10, 'About C programming ', 'C', 'Dhaval Tank', 'C programming is a general-purpose, procedural, imperative computer programming language developed in 1972 by Dennis M. Ritchie at the Bell Telephone Laboratories to develop the UNIX operating system. C is the most widely used computer language. It keeps fluctuating at the number one scale of popularity along with Java programming language, which is also equally popular and most widely used among modern software programmers.', '2021-04-28 17:43:31', 0x432e706e67),
(11, 'HTML Paragraphs', 'HTML', 'DRT', 'The HTML <p> element defines a paragraph.\r\n\r\nA paragraph always starts on a new line, and browsers automatically add some white space (a margin) before and after a paragraph.', '2021-04-29 05:29:20', 0x68746d6c20322e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `userid` int(6) UNSIGNED NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`userid`, `fullname`, `email`, `password`, `role`) VALUES
(10, 'Dhaval Tank', 'dhaval@2gmail.com', 'Dhaval@123', 'User'),
(11, 'Dhaval R Tank', 'dhaval@3gmail.com', 'Dhaval@123', 'Admin'),
(13, 'Dhaval R Tank', 'dhaval@04gmail.com', 'Dhaval@123', 'Admin'),
(14, 'Parth Chauhan', 'parth@123gmail.com', 'Parth@123', 'User'),
(21, 'Jaydip tank', 'jaydip@1gmail.com', 'Jaydip@123', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorytbl`
--
ALTER TABLE `categorytbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `fullname` (`fullname`),
  ADD KEY `email` (`email`),
  ADD KEY `password` (`password`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorytbl`
--
ALTER TABLE `categorytbl`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `userid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
