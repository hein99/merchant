-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 19, 2020 at 05:43 PM
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
-- Table structure for table `message_record`
--

CREATE TABLE `message_record` (
  `id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `messages` text NOT NULL,
  `is_image` enum('yes','no') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `arrived_time` datetime NOT NULL,
  `admin_has_viewed` tinyint(1) NOT NULL,
  `customer_has_viewed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_record`
--

INSERT INTO `message_record` (`id`, `to_user_id`, `from_user_id`, `messages`, `is_image`, `arrived_time`, `admin_has_viewed`, `customer_has_viewed`) VALUES
(1, 2, 1, 'Hello David', 'no', '2020-06-19 15:35:59', 1, 0),
(2, 10, 1, 'Hello Taylor', 'no', '2020-06-19 15:38:27', 1, 1),
(3, 10, 1, 'Welcome to my page!', 'no', '2020-06-19 15:38:38', 1, 1),
(4, 10, 1, 'How can I help you', 'no', '2020-06-19 15:38:46', 1, 1),
(5, 1, 10, 'Hello The Best Shop!', 'no', '2020-06-19 20:30:29', 1, 1),
(6, 1, 10, 'Hello Admin', 'no', '2020-06-19 20:47:59', 1, 1),
(7, 1, 10, 'Hello Admin 2', 'no', '2020-06-19 20:52:15', 1, 1),
(8, 1, 10, '🙃🙃🙃', 'no', '2020-06-19 20:52:21', 1, 1),
(9, 1, 10, 'user_1_img_mss_9.png', 'yes', '2020-06-19 20:57:17', 1, 1),
(10, 1, 10, 'Hi Admin', 'no', '2020-06-19 21:43:38', 1, 1),
(11, 10, 1, 'Hi Taylor', 'no', '2020-06-19 21:47:06', 1, 1),
(12, 1, 10, '😌😌😌', 'no', '2020-06-19 22:09:00', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message_record`
--
ALTER TABLE `message_record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message_record`
--
ALTER TABLE `message_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
