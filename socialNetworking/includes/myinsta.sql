-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2019 at 06:53 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myinsta`
--

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `uname` varchar(255) NOT NULL,
  `followers` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`uname`, `followers`) VALUES
('myname', 1),
('rohit', 1),
('hello', 1),
('malik', 2);

-- --------------------------------------------------------

--
-- Table structure for table `followers_name`
--

CREATE TABLE `followers_name` (
  `uname` varchar(255) NOT NULL,
  `followers` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followers_name`
--

INSERT INTO `followers_name` (`uname`, `followers`) VALUES
('malik', 'myname'),
('rohit', 'myname'),
('malik', 'rohit'),
('myname', 'rohit'),
('hello', 'rohit');

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `uname` varchar(255) NOT NULL,
  `following` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`uname`, `following`) VALUES
('myname', 6),
('rohit', 6),
('hello', 0),
('malik', 0);

-- --------------------------------------------------------

--
-- Table structure for table `following_name`
--

CREATE TABLE `following_name` (
  `uname` varchar(255) NOT NULL,
  `following` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `following_name`
--

INSERT INTO `following_name` (`uname`, `following`) VALUES
('myname', 'malik'),
('myname', 'rohit'),
('rohit', 'malik'),
('rohit', 'myname'),
('rohit', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `upassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `upassword`) VALUES
(1, 'rohit', 'malik'),
(3, 'hello', 'me'),
(6, 'malik', 'rohit'),
(9, 'myname', 'myname');

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

CREATE TABLE `user_images` (
  `image_name` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_images`
--

INSERT INTO `user_images` (`image_name`, `uname`) VALUES
('2018-05-07-18-26-11-053.jpg', 'myname'),
('Allu arjun.jpg', 'rohit'),
('Chris-Hemsworth-by-Michael-Muller.jpg', 'rohit'),
('IMG20190525174941.jpg', 'myname'),
('_large_image_2.jpg', 'rohit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_images`
--
ALTER TABLE `user_images`
  ADD PRIMARY KEY (`image_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
