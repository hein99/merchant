-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2020 at 02:02 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `merchant`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_record`
--

CREATE TABLE `login_record` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `active_activity` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_type` enum('no','yes') COLLATE utf8_unicode_ci NOT NULL,
  `to_whom_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login_record`
--

INSERT INTO `login_record` (`id`, `user_id`, `active_activity`, `is_type`, `to_whom_id`) VALUES
(1, 3, '2020-06-04 15:06:43', 'no', 0),
(2, 4, '2020-06-05 04:30:52', 'no', 0),
(3, 5, '2020-06-05 04:36:07', 'no', 0),
(4, 6, '2020-06-05 13:40:06', 'yes', 0),
(5, 7, '2020-06-05 13:57:52', 'no', 0),
(6, 8, '2020-06-05 13:35:10', 'no', 0),
(7, 1, '2020-06-20 12:01:26', 'no', 10),
(8, 9, '2020-06-13 10:40:58', 'no', 0),
(9, 10, '2020-06-20 12:02:06', 'no', 1),
(10, 11, '2020-06-13 10:43:10', 'no', 0),
(11, 12, '2020-06-13 10:43:57', 'no', 0),
(12, 13, '2020-06-15 12:20:38', 'no', 0),
(13, 14, '2020-06-15 12:25:45', 'no', 0),
(14, 15, '2020-06-15 12:28:31', 'no', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_record`
--
ALTER TABLE `login_record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_record`
--
ALTER TABLE `login_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
