-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2018 at 01:28 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `country` text NOT NULL,
  `phone` int(100) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `gender` text NOT NULL,
  `b_day` date NOT NULL,
  `imag` text NOT NULL,
  `admin_pass` varchar(100) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `country`, `phone`, `addr`, `gender`, `b_day`, `imag`, `admin_pass`, `update_date`) VALUES
(1, 'TRMS', 'trms@gmail.com', 'Korea', 123, 'Seul', 'Female', '1996-04-03', 'grp.jpg', '12345678', '2018-04-06 21:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `user_id` varchar(100) NOT NULL,
  `a` int(11) NOT NULL,
  `b` int(11) NOT NULL,
  `c` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`user_id`, `a`, `b`, `c`) VALUES
('$uid', 0, 0, 0),
('2', 0, 0, 1),
('22', 0, 1, 0),
('23', 1, 0, 0),
('3', 0, 1, 0),
('4', 0, 0, 1),
('5', 1, 0, 0),
('7', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cand_info`
--

CREATE TABLE `cand_info` (
  `cand_id` int(11) NOT NULL,
  `cand_name` varchar(100) NOT NULL,
  `cand_image` text NOT NULL,
  `cand_gender` text NOT NULL,
  `cand_country` text NOT NULL,
  `cand_bday` date NOT NULL,
  `cand_email` varchar(100) NOT NULL,
  `cand_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cand_info`
--

INSERT INTO `cand_info` (`cand_id`, `cand_name`, `cand_image`, `cand_gender`, `cand_country`, `cand_bday`, `cand_email`, `cand_update`) VALUES
(1, 'a', 'aR.jpg', 'Male', 'Japan', '2000-01-01', 'cA@email.com', '2018-04-06 16:45:30'),
(2, 'b', 'bR.jpg', 'Male', 'Bangladesh', '1999-01-01', 'cB@email.com', '2018-04-06 16:45:42'),
(3, 'c', 'cR.jpg', 'Male', 'Bangladesh', '2018-04-04', 'cC@gmail.com', '2018-04-06 16:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `log_id` int(11) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`log_id`, `uemail`, `password`) VALUES
(1, '$email', '$pass'),
(2, 'toma@gmail.com', 'toma'),
(3, 'x@gmail.com', '1234'),
(4, 'x@gmail.com', '1234'),
(5, 'toma@gmail.com', 'toma'),
(6, 'toma@gmail.com', 'toma'),
(7, 'toma@gmail.com', 'toma'),
(8, 'rk@gmail.com', 'rk'),
(9, 'trms@yahoo.com', '12345678'),
(10, 'aune@gmail.com', 'aune'),
(11, 'toma@gmail.com', 'toma'),
(12, 'trms@gmail.com', 'trms'),
(13, 'trms@gmail.com', 'trms'),
(14, 'tz@email.com', '12345678'),
(15, 'trms@gmail.com', '12345678'),
(16, 'ami@gmail.com', '12345678'),
(17, 'toma@gmail.com', 'toma'),
(18, 'az@email.com', '12345678'),
(19, 'toma@gmail.com', 'toma'),
(20, 'toma@gmail.com', '1234'),
(21, 'toma@gmail.com', '1234'),
(22, 'aune@gmail.com', 'aune'),
(23, 'toma@gmail.com', '1234'),
(24, 'rk@gmail.com', 'rk'),
(25, 'shawon@gmail.com', 'shawon'),
(26, 'toma@gmail.com', '1234'),
(27, 'rk@gmail.com', 'rk'),
(28, 'aune@gmail.com', 'aune'),
(29, 'z@gmail.com', 'z'),
(30, 'z@gmail.com', 'z'),
(31, 'ck@email.com', 'ck'),
(32, 'ck1@email.com', 'ck1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `email`) VALUES
(2, 'Toma', '1234', 'toma@gmail.com'),
(3, 'rk', 'rk', 'rk@gmail.com'),
(4, 'aune', 'aune', 'aune@gmail.com'),
(5, 'shawon', 'shawon', 'shawon@gmail.com'),
(7, 'Z', 'z', 'z@gmail.com'),
(10, 'web', 'web', 'web@diu.com'),
(13, 'marium', '12345678', 'marium@email.com'),
(20, 'w', '12345678', 'w@email.com'),
(21, 'mr.x', '12345678', 'x@gmail.com'),
(22, 'ck', 'ck', 'ck@email.com'),
(23, 'ck1', 'ck1', 'ck1@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `cand_info`
--
ALTER TABLE `cand_info`
  ADD PRIMARY KEY (`cand_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `log_id` (`log_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cand_info`
--
ALTER TABLE `cand_info`
  MODIFY `cand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
