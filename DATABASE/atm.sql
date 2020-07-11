-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 07:58 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atm`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `username` varchar(30) NOT NULL,
  `acc_num` int(20) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`username`, `acc_num`, `comment`) VALUES
('Manish', 2147483647, 'Write here....sfs'),
('Manish', 2147483647, 'Write here....kuhyiukh\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `username` varchar(20) NOT NULL,
  `acc_num` int(20) NOT NULL,
  `mobile` int(12) NOT NULL,
  `adhaar` int(12) NOT NULL,
  `pan` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `kyc`
--

INSERT INTO `kyc` (`username`, `acc_num`, `mobile`, `adhaar`, `pan`) VALUES
('Manish', 2147483647, 2147483647, 456987, 123456789),
('mukul', 98765443, 9876543, 345678, 76545678);

-- --------------------------------------------------------

--
-- Table structure for table `passbook`
--

CREATE TABLE `passbook` (
  `acc_num` int(16) NOT NULL,
  `details` text NOT NULL,
  `amount` bigint(255) NOT NULL,
  `username` varchar(30) CHARACTER SET armscii8 NOT NULL,
  `date_transaction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passbook`
--

INSERT INTO `passbook` (`acc_num`, `details`, `amount`, `username`, `date_transaction`) VALUES
(2147483647, 'Gift', 1000, 'Manish', '2019-04-17 09:13:39'),
(2147483647, 'SUM', 1000, 'Manish', '2019-04-17 09:14:39'),
(2147483647, 'PAY', -100, 'Manish', '2019-04-17 09:35:48'),
(2147483647, 'A', 2000, 'Manish', '2019-04-17 10:12:27'),
(2147483647, 'PAY', -900, 'Manish', '2019-04-17 10:12:52'),
(2147483647, 'PAY', -500, 'Manish', '2019-04-17 11:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `branch` varchar(30) DEFAULT 'NEW DELHI',
  `acc_num` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `date`, `branch`, `acc_num`) VALUES
('mukul', '123', '2019-04-18 11:14:29', 'new delhi', 98765443),
('Manish', '12345678', '2019-04-17 14:43:09', 'Mirzapur', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `acc_num` (`acc_num`),
  ADD UNIQUE KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
