-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 02:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudoperation`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `name`, `email`, `mobile`, `password`) VALUES
(2, 'Rashan dula', 'Rashan@gmail.com', '0711798134', 'Rashan12345'),
(5, 'lal', 'lal@gmail.com', '0711798124', 'lal123'),
(6, 'kusal', 'kusal@gmail.com', '0711798124', 'kusal123'),
(8, 'Rasuni', 'Rasuni@gmail.com', '0711798124', 'Rasuni12345'),
(9, 'Andria', 'Andria@gmail.com', '0711798124', 'Andrea1234');

-- --------------------------------------------------------

--
-- Table structure for table `sheet1`
--

CREATE TABLE `sheet1` (
  `empid` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sheet1`
--

INSERT INTO `sheet1` (`empid`, `name`, `role`) VALUES
('1', 'cody', 'coder'),
('2', 'miller', 'developer'),
('3', 'chris', 'manager'),
('4', 'malki', 'mmmm'),
('1', 'cody', 'coder'),
('2', 'miller', 'developer'),
('3', 'chris', 'manager'),
('4', 'malki', 'mmmm'),
('4', 'malki', 'mmmm'),
('4', 'malki', 'mmmm'),
('1', 'cody', 'coder'),
('2', 'miller', 'developer'),
('3', 'chris', 'manager'),
('4', 'malki', 'mmmm'),
('1', 'cody', 'coder'),
('2', 'miller', 'developer'),
('3', 'chris', 'manager'),
('4', 'malki', 'mmmm'),
('4', 'malki', 'mmmm'),
('1', 'cody', 'coder'),
('2', 'miller', 'developer'),
('3', 'chris', 'manager'),
('4', 'malki', 'mmmm'),
('1', 'cody', 'coder'),
('2', 'miller', 'developer'),
('3', 'chris', 'manager'),
('4', 'malki', 'mmmm'),
('1', 'cody', 'coder'),
('2', 'miller', 'developer'),
('3', 'chris', 'manager'),
('4', 'malki', 'mmmm'),
('1', 'cody', 'coder'),
('2', 'miller', 'developer'),
('3', 'chris', 'manager'),
('4', 'malki', 'mmmm'),
('1', 'cody', 'coder'),
('2', 'miller', 'developer'),
('3', 'chris', 'manager'),
('4', 'malki', 'mmmm'),
('1', 'cody', 'coder'),
('2', 'miller', 'developer'),
('3', 'chris', 'manager'),
('4', 'malki', 'mmmm'),
('1', 'cody', 'coder'),
('2', 'miller', 'developer'),
('3', 'chris', 'manager'),
('4', 'malki', 'mmmm'),
('1', 'cody', 'coder'),
('2', 'miller', 'developer'),
('3', 'chris', 'manager'),
('4', 'malki', 'mmmm'),
('1', 'cody', 'coder'),
('2', 'miller', 'developer'),
('3', 'chris', 'manager'),
('4', 'malki', 'mmmm'),
('1', 'cody', 'coder'),
('2', 'miller', 'developer'),
('3', 'chris', 'manager'),
('4', 'malki', 'mmmm'),
('1', 'cody', 'coder'),
('2', 'miller', 'developer'),
('3', 'chris', 'manager'),
('4', 'malki', 'mmmm'),
('1', 'cody', 'coder'),
('2', 'miller', 'developer'),
('3', 'chris', 'manager'),
('4', 'malki', 'mmmm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
