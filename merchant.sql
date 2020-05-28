-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2020 at 04:54 PM
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
(4, 3, 'https://item.taobao.com/item.htm?spm=a21wu.241046-global.4691948847.3.41cab6cbq8fXLM&scm=1007.15423.84311.100200300000005&id=41068624542&pvid=6e177605-0555-4efd-b8d9-6f5f00a75bf2', 'sth', 2, 1000, 7, 6, 5, 7, 1, 0, 0, '2020-05-28 12:42:01'),
(5, 3, 'https://item.taobao.com/item.htm?spm=a21bo.7929913.198967.13.75424174Vtm3TB&id=605150240460', 'nth', 2, 2000, 5, 5, 6, 7, 1, 0, 0, '2020-05-28 12:47:15'),
(6, 2, 'https://item.taobao.com/item.htm?spm=a21bo.7929913.198967.13.75424174Vtm3TB&id=605150240460', 'nth', 4, 30000, 2, 3, 4, 6, 3, 0, 0, '2020-05-28 12:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `customer_statement`
--

CREATE TABLE `customer_statement` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `membership_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_status`, `phone`, `address`, `activate_status`, `point`, `membership_id`, `created_date`, `modified_date`) VALUES
(1, 'David', '*8201E0C1BD05201452E12ECFD5B8AFE4AEFBD053', 1, '0999999', 'mayangone', 1, 0, 1, '2020-05-27 14:22:34', '2020-05-26 09:22:12'),
(2, 'Alice', '*4F5CCA657BD61D1C1127E5C4EA3B0EE4A9841B85', 1, '09798467816', 'ma thi', 1, 0, 0, '2020-05-27 14:22:34', '0000-00-00 00:00:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_record`
--
ALTER TABLE `login_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
