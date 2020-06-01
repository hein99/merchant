-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
<<<<<<< HEAD
-- Generation Time: Jun 01, 2020 at 01:44 PM
=======
-- Generation Time: Jun 01, 2020 at 01:40 PM
>>>>>>> 89f5ddf569c338ad3e5c2f42903f33d7464c76a2
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
  `is_view` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `customer_id`, `product_link`, `remark`, `quantity`, `price`, `us_tax`, `mm_tax`, `commission`, `weight_cost`, `order_status`, `product_shipping_status`, `is_view`, `created_date`) VALUES
(1, 2, 'https://www.bestchannel.thebestshopmm.com/movies/detail/91', 'some', 1, 1000, 10, 5, 7, 1, 0, 0, 0, '2020-05-28 11:21:34'),
(2, 2, 'https://item.taobao.com/item.htm?spm=a21wu.241046-global.4691948847.3.41cab6cbq8fXLM&scm=1007.15423.84311.100200300000005&id=41068624542&pvid=6e177605-0555-4efd-b8d9-6f5f00a75bf2', 'some', 1, 1000, 10, 3, 5, 6, 2, 0, 0, '2020-05-28 12:39:41'),
(3, 2, 'https://item.taobao.com/item.htm?spm=a21wu.241046-global.4691948847.3.41cab6cbq8fXLM&scm=1007.15423.84311.100200300000005&id=41068624542&pvid=6e177605-0555-4efd-b8d9-6f5f00a75bf2', 'some', 1, 1000, 10, 3, 5, 6, 3, 0, 0, '2020-05-28 12:40:19'),
(4, 5, 'https://item.taobao.com/item.htm?spm=a21wu.241046-global.4691948847.3.41cab6cbq8fXLM&scm=1007.15423.84311.100200300000005&id=41068624542&pvid=6e177605-0555-4efd-b8d9-6f5f00a75bf2', 'sth', 2, 1000, 7, 6, 5, 7, 1, 0, 0, '2020-05-31 11:13:49'),
(5, 5, 'https://item.taobao.com/item.htm?spm=a21bo.7929913.198967.13.75424174Vtm3TB&id=605150240460', 'nth', 2, 2000, 5, 5, 6, 7, 1, 0, 0, '2020-05-31 11:13:58'),
(6, 2, 'https://item.taobao.com/item.htm?spm=a21bo.7929913.198967.13.75424174Vtm3TB&id=605150240460', 'nth', 4, 30000, 2, 3, 4, 6, 3, 0, 0, '2020-05-28 12:47:15');

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
(1, 14, '2000', 1, 'add', '2020-06-01 11:25:53'),
(2, 14, '2000', 0, 'sub', '2020-06-01 11:26:12'),
(3, 14, '2000', 1, 'add', '2020-06-01 11:28:49'),
(4, 14, '2000', 0, 'sub', '2020-06-01 11:30:22'),
(5, 14, '2000', 1, 'add', '2020-06-01 11:31:58'),
(6, 14, '2000', 0, 'sub', '2020-06-01 11:34:30'),
(7, 14, '2000', 1, 'add', '2020-06-01 11:35:08'),
(8, 14, '2000', 1, 'add', '2020-06-01 11:36:04'),
(9, 14, '4000', 0, 'sub', '2020-06-01 11:36:32');

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
(1, 'Silver', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 10, '2020-06-01 11:42:17'),
(2, 'Gold', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 9, '2020-06-01 11:42:17'),
(3, 'Platinum', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 18, '2020-06-01 11:43:33'),
(4, 'Diamond', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 5, '2020-06-01 11:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `message_record`
--

CREATE TABLE `message_record` (
  `id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `messages` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `arrived_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 'David', '*8201E0C1BD05201452E12ECFD5B8AFE4AEFBD053', 1, '0999999', 'mayangone', 1, 0, 0, 1, '2020-05-27 14:22:34', '2020-05-26 09:22:12'),
(2, 'Alice', '*4F5CCA657BD61D1C1127E5C4EA3B0EE4A9841B85', 1, '09798467816', 'ma thi', 1, 0, 0, 3, '2020-05-31 04:53:23', '0000-00-00 00:00:00'),
(5, 'Joe', '*60D178145669A4D1569FE820852BB3425CB2D4A7', 0, '09798467816', 'nth', 1, 0, 0, 1, '2020-05-30 15:37:53', '0000-00-00 00:00:00'),
(6, 'Jack', '*9BCDC990E611B8D852EFAF1E3919AB6AC8C8A9F0', 0, '09965353564', 'nth', 1, 0, 0, 2, '2020-05-31 09:39:29', '2020-05-31 09:39:29'),
(7, 'john', '*DACDE7F5744D3CB439B40D938673B8240B824853', 0, '09260968600', 'sth', 1, 0, 0, 1, '2020-05-31 13:18:33', '2020-05-31 13:18:33'),
(8, 'Kalvin', '*C6B694122375C6DD9B5D69592539D1ED8C73AA4E', 0, '09457503263', 'ma thi', 1, 0, 0, 4, '2020-05-31 13:12:53', '0000-00-00 00:00:00'),
(9, 'Kate', '*E9DEC739A93E9469373D7BD0FB4F9243B0201EDD', 0, '09457506332', 'ma thi pr', 1, 0, 0, 4, '2020-05-31 13:18:31', '2020-05-31 13:18:31'),
(10, 'DoLay', '*88916FD8BDE41181A6EEBE0839DA41AEFF0A5E7C', 0, '09477503263', 'nth', 1, 0, 0, 4, '2020-05-31 13:14:24', '0000-00-00 00:00:00'),
(11, 'Mite', '*07D96E7E024EF70A08BFAD98C515AEB5126FEF77', 0, '09457560332', 'london', 1, 0, 0, 4, '2020-05-31 13:18:31', '2020-05-31 13:18:31'),
(12, 'chocotaco', '*6AA3E3281F392090BCB9E0A1029E31741BA75060', 0, '09977503263', 'nth', 1, 0, 0, 4, '2020-05-31 13:16:06', '0000-00-00 00:00:00'),
(13, 'shawn', '*07624B12A69A692EDC6E5419C3895D44769B34AA', 0, '09975403263', 'nth', 1, 0, 0, 2, '2020-05-31 13:16:06', '0000-00-00 00:00:00'),
(14, 'Anna', '*8342278FD80E338FC16478FB1C13FA4F04C8A16C', 0, '098567360332', 'Washinton', 1, 0, 60000, 3, '2020-06-01 11:36:32', '2020-05-31 13:18:33'),
(15, 'Lavanda', '*737928839815AC74376F2DDD9AC43D6A6DEDFC16', 0, '09697503263', 'nth', 1, 0, 0, 2, '2020-05-31 13:18:18', '0000-00-00 00:00:00'),
(16, 'Harry', '*FC72AB3E457BAC1DB695653A5AD9CF8EA993C752', 0, '0969703233', 'nth', 1, 0, 0, 1, '2020-05-31 13:18:18', '0000-00-00 00:00:00'),
(17, 'McDonal', '*BF9F7F6F50C822351F892F60789BAC577C9429F4', 0, '09972255924', 'yangon', 1, 0, 0, 3, '2020-05-31 13:19:53', '0000-00-00 00:00:00'),
(18, 'McDonal', '*BF9F7F6F50C822351F892F60789BAC577C9429F4', 0, '09972255924', 'yangon', 1, 0, 0, 3, '2020-05-31 13:22:32', '0000-00-00 00:00:00'),
(19, 'Masha', '*7FA8D2E62A13B4798B45E796728821341D613CD7', 0, '09977354663', 'nth', 1, 0, 0, 4, '2020-05-31 13:22:32', '0000-00-00 00:00:00'),
(20, 'GuGu', '*0FA3E3D473E613A9E60C25004155109A49F7A6A4', 0, '9457503263', 'london', 1, 0, 0, 1, '2020-05-31 13:22:32', '0000-00-00 00:00:00'),
(21, 'Pete', '*F2C2536A0DC1CE63A11AF365189127F123053A53', 0, '9457503263', 'liverpool', 1, 0, 0, 1, '2020-05-31 13:22:32', '0000-00-00 00:00:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_statement`
--
ALTER TABLE `customer_statement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login_record`
--
ALTER TABLE `login_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
