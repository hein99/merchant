-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2020 at 04:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_link` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `us_tax` float NOT NULL,
  `mm_tax` float NOT NULL,
  `commission` float NOT NULL,
  `weight_cost` float NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `product_shipping_status` tinyint(1) NOT NULL,
  `has_viewed_admin` tinyint(1) NOT NULL,
  `has_viewed_customer` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `customer_id`, `product_link`, `remark`, `quantity`, `price`, `us_tax`, `mm_tax`, `commission`, `weight_cost`, `order_status`, `product_shipping_status`, `has_viewed_admin`, `has_viewed_customer`, `created_date`) VALUES
(1, 2, 'https://item.taobao.com/item.htm?spm=a21wu.241046-global.4691948847.5.41cab6cb5U5S8P&scm=1007.15423.84311.100200300000005&id=566185672494&pvid=7f287f08-6e79-4bf9-a113-913df6e7b2df', 'black', 1, 2, 5, 5, 9, 7, 0, 0, 1, 0, '2020-06-06 13:18:40'),
(2, 2, 'https://item.taobao.com/item.htm?spm=a21wu.241046-global.4691948847.5.41cab6cb5U5S8P&scm=1007.15423.84311.100200300000005&id=566185672494&pvid=7f287f08-6e79-4bf9-a113-913df6e7b2df', 'black and white', 3, 5.6, 0, 0, 0, 7, 0, 0, 1, 0, '2020-06-04 07:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `customer_statement`
--

CREATE TABLE `customer_statement` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `amount_status` int(1) NOT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_statement`
--

INSERT INTO `customer_statement` (`id`, `customer_id`, `amount`, `amount_status`, `about`, `created_date`) VALUES
(1, 2, '1000', 1, 'Deposit', '2020-06-04 05:45:02'),
(2, 2, '500', 0, 'buyproduct', '2020-06-04 05:45:29'),
(3, 2, '1000', 1, 'bonus', '2020-06-04 05:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `login_record`
--

CREATE TABLE `login_record` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `active_activity` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_type` enum('no','yes') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login_record`
--

INSERT INTO `login_record` (`id`, `user_id`, `active_activity`, `is_type`) VALUES
(1, 3, '2020-06-04 15:06:43', 'no'),
(2, 4, '2020-06-05 04:30:52', 'no'),
(3, 5, '2020-06-05 04:36:07', 'no'),
(4, 6, '2020-06-05 13:40:06', 'yes'),
(5, 7, '2020-06-05 13:57:52', 'no'),
(6, 8, '2020-06-05 13:35:10', 'no'),
(7, 1, '2020-06-07 14:01:56', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `definition` text COLLATE utf8_unicode_ci NOT NULL,
  `percentage` float NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `name`, `definition`, `percentage`, `modified_date`) VALUES
(1, 'Silver', 'GU GU', 99, '2020-06-06 13:17:11'),
(2, 'Gold', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, cons gu gu gu gu gu gu gu gu ectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 9, '2020-06-06 13:17:52'),
(3, 'Platinum', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. gi gi git i gi gi gi Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 8, '2020-06-06 13:18:18'),
(4, 'Diamond', 'wai linn phyoe', 5, '2020-06-01 17:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `message_record`
--

CREATE TABLE `message_record` (
  `id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `messages` text COLLATE utf8_unicode_ci NOT NULL,
  `is_image` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL,
  `arrived_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message_record`
--

INSERT INTO `message_record` (`id`, `to_user_id`, `from_user_id`, `messages`, `is_image`, `arrived_time`, `status`) VALUES
(1, 1, 2, 'No.1) 2 to 1', 'no', '2020-06-06 22:54:00', 1),
(2, 1, 2, 'No2.) 2 to 1', 'no', '2020-06-06 22:54:00', 1),
(3, 1, 2, 'No3.) 2 to 1', 'no', '2020-06-06 22:54:00', 1),
(4, 1, 3, 'Hello Admin!', 'no', '2020-06-07 05:48:50', 1),
(5, 1, 3, 'Hello Admin 1!', 'no', '2020-06-07 05:48:50', 1),
(6, 1, 3, 'Where are you?', 'no', '2020-06-07 05:48:50', 1),
(7, 1, 3, 'Today is Friday!', 'no', '2020-06-07 05:48:50', 1),
(8, 1, 3, 'Tomorrow is Saturday', 'no', '2020-06-07 05:48:50', 1),
(9, 2, 1, 'No1.) 1 to 2', 'no', '2020-06-06 22:54:00', 1),
(10, 1, 2, 'Send form test form', 'no', '2020-06-07 13:16:47', 0),
(11, 2, 1, 'Send form test form 2', 'no', '2020-06-07 13:19:21', 0),
(12, 3, 1, 'testing message send to user 3', 'no', '2020-06-07 13:20:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(41) COLLATE utf8_unicode_ci NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `activate_status` tinyint(1) NOT NULL,
  `point` int(11) NOT NULL,
  `balance` float NOT NULL,
  `membership_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_status`, `phone`, `address`, `activate_status`, `point`, `balance`, `membership_id`, `created_date`, `modified_date`) VALUES
(1, 'Anna', '*8342278FD80E338FC16478FB1C13FA4F04C8A16C', 1, '09788351044', 'nth', 1, 0, 0, 1, '2020-06-07 12:37:11', '0000-00-00 00:00:00'),
(2, 'updatedDavid', '*F67248311B2147A3A8FEEAF515A1EA82882B3A68', 0, '09765920059', '104UpdatedMarlamyine3rdstreetHlaing16QtrYangon', 1, 100, 1501, 2, '2020-06-07 12:37:11', '2020-06-04 07:05:47'),
(3, 'Masha', '*7FA8D2E62A13B4798B45E796728821341D613CD7', 0, '09793530086', 'London', 1, 0, 0, 1, '2020-06-07 12:37:11', '2020-06-04 15:06:54'),
(4, 'Pete', '*F2C2536A0DC1CE63A11AF365189127F123053A53', 0, '09765920059', 'WashitonDC', 1, 0, 0, 1, '2020-06-07 12:37:11', '2020-06-05 04:40:47'),
(5, 'Lavenda', '*00D9BF1AA5A4378C1F3FBCEB95A6CE21B2DF7809', 0, '09965343432', 'NewYork', 1, 0, 0, 1, '2020-06-07 12:37:11', '2020-06-05 04:40:48'),
(6, 'Chocotaco', '*6AA3E3281F392090BCB9E0A1029E31741BA75060', 0, '09457503263', 'Paris', 1, 0, 0, 1, '2020-06-07 12:37:11', '2020-06-05 04:40:48'),
(7, 'Joe', '*60D178145669A4D1569FE820852BB3425CB2D4A7', 0, '09765920059', 'yangon', 1, 0, 0, 1, '2020-06-07 12:37:11', '2020-06-05 09:10:59'),
(8, 'GuGu', '*0FA3E3D473E613A9E60C25004155109A49F7A6A4', 0, '09793530086', 'yangon', 1, 0, 0, 1, '2020-06-07 12:37:11', '2020-06-05 13:35:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_statement`
--
ALTER TABLE `customer_statement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_record`
--
ALTER TABLE `login_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_record`
--
ALTER TABLE `message_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_statement`
--
ALTER TABLE `customer_statement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_record`
--
ALTER TABLE `login_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message_record`
--
ALTER TABLE `message_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
