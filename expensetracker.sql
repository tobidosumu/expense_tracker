-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 09:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expensetracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `catName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catName`, `dateCreated`, `active`) VALUES
(1, 'Utilities', '2022-04-29 13:04:37', 1),
(2, 'Feeding', '2022-04-29 13:15:50', 1),
(3, 'Transport', '2022-04-29 13:17:03', 1),
(4, 'Flight', '2022-04-29 13:17:26', 1),
(5, 'Recreation', '2022-04-29 13:18:38', 1),
(6, 'Fun', '2022-04-29 13:19:02', 1),
(7, 'Dinner', '2022-04-29 13:26:38', 1),
(8, 'Library Fee', '2022-04-29 13:29:00', 1),
(9, 'Medical bills', '2022-04-29 13:56:57', 1),
(10, 'Taxes', '2022-04-29 14:10:04', 1),
(11, 'FIRS Tax', '2022-04-29 14:57:12', 1),
(12, 'Educational', '2022-04-29 15:47:25', 1),
(13, 'Presents', '2022-04-29 15:51:11', 1),
(14, '', '2022-04-29 20:56:53', 1),
(15, 'Shopping', '2022-04-30 07:27:42', 1),
(16, 'Winning', '2022-04-30 09:09:24', 1),
(17, 'Telephone', '2022-05-01 10:13:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `expNarrate` varchar(255) NOT NULL,
  `expCategory` varchar(255) NOT NULL,
  `expAmount` varchar(255) NOT NULL,
  `expDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expNarrate`, `expCategory`, `expAmount`, `expDate`) VALUES
(1, 'Payment for electricity and water bills ', 'Utilities', '3000', '2022-04-28 22:01:10'),
(2, 'Vacation trip to Paris, France ', 'Transport', '3000', '2022-04-28 22:03:30'),
(3, 'Shopping expenses at Ikeja Shopping Mall', 'Feeding', '3550', '2022-04-28 22:06:05'),
(4, 'Self-growth program at Udemy', 'Educational', '12000', '2022-04-28 22:07:20'),
(5, 'Payment for Federal Inland Revenue tax', 'FIRS Tax', '500', '2022-04-29 15:00:48'),
(6, 'hello', 'Transport', '2000', '2022-04-29 16:04:36'),
(7, 'Gifts for my loved ones', 'Select Category', '', '2022-04-29 16:07:07'),
(8, 'Payment for electricity and water bills', 'Utilities', '3550', '2022-04-29 16:07:49'),
(9, 'Hi', 'Feeding', '2000', '2022-04-29 18:45:26'),
(10, 'Vacation trip to Paris, France', 'Select Category', '2000', '2022-04-29 18:50:55'),
(11, 'Vacation trip to Paris, France', 'Select Category', '2000', '2022-04-29 18:50:55'),
(12, 'Shopping expenses at Ikeja Shopping Mall', 'Feeding', '', '2022-04-29 18:59:12'),
(13, 'Self-growth program at Udemy', 'Select Category', '2000', '2022-04-29 19:12:44'),
(14, 'Payment for electricity and water bills', 'Select Category', '3000', '2022-04-29 19:40:19'),
(15, 'Payment for Federal Inland Revenue tax', 'Select Category', '2000', '2022-04-29 19:46:29'),
(16, 'hello', 'Select Category', '3000', '2022-04-29 19:47:24'),
(17, 'Car maintenance', 'Select Category', '3000', '2022-04-29 19:52:46'),
(18, 'Flight ticket to Dubai', 'Select Category', '2000', '2022-04-29 20:01:40'),
(19, 'Flight ticket to Dubai', 'Flight', '2000', '2022-04-29 20:02:39'),
(20, 'Self-growth program at Udemy', 'Select Category', '2000', '2022-04-29 20:09:23'),
(21, 'Shopping expenses at Ikeja Shopping Mall', 'Select Category', '2000', '2022-04-29 20:14:04'),
(22, 'hello', 'Utilities', '2000', '2022-04-29 20:34:22'),
(23, 'Visit to Disney', 'Fun', '2000', '2022-04-29 20:37:35'),
(24, 'Visit to Disney', 'Feeding', '2000', '2022-04-29 20:38:31'),
(25, 'Visit to Disney', 'Feeding', '2000', '2022-04-29 20:39:25'),
(26, 'Hello', 'Feeding', '3000', '2022-04-29 20:43:13'),
(27, 'Vacation trip to Paris, France', 'Transport', '3000', '2022-04-29 20:43:55'),
(28, 'Vacation trip to Paris, France', 'Select Category', '2000', '2022-04-29 20:49:13'),
(29, 'Hello', 'Select Category', '2000', '2022-04-29 21:31:10'),
(30, 'catName', 'Select Category', '2000', '2022-04-29 21:38:29'),
(31, 'category', 'Select Category', '2000', '2022-04-29 21:58:04'),
(32, '$category', 'Feeding', '2000', '2022-04-29 21:59:53'),
(33, 'hello', 'Feeding', '2000', '2022-04-30 07:58:42'),
(34, 'hello', 'Select Category', '2000', '2022-04-30 07:58:57'),
(35, 'Hi', 'Select Category', '2000', '2022-04-30 08:14:32'),
(36, 'hello', 'Utilities', '3000', '2022-04-30 08:58:30'),
(37, 'Shopping expenses at Ikeja Shopping Mall', 'Shopping', '2000', '2022-04-30 09:07:36'),
(38, 'Shopping expenses at Ikeja Shopping Mall', 'Shopping', '3550', '2022-04-30 09:10:09'),
(39, 'Vacation trip to Paris, France', 'Transport', '2000', '2022-04-30 09:30:35'),
(40, 'Airtime subscription', 'Telephone', '5000', '2022-05-01 10:14:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
