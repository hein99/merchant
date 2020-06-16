-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 16, 2020 at 11:58 AM
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
  `product_weight` float NOT NULL,
  `weight_cost` float NOT NULL,
  `exchange_rate` float NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `product_shipping_status` tinyint(1) NOT NULL,
  `has_viewed_admin` tinyint(1) NOT NULL,
  `has_viewed_customer` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `customer_id`, `product_link`, `remark`, `quantity`, `price`, `us_tax`, `mm_tax`, `commission`, `product_weight`, `weight_cost`, `exchange_rate`, `order_status`, `product_shipping_status`, `has_viewed_admin`, `has_viewed_customer`, `created_date`) VALUES
(1, 2, 'https://item.taobao.com/item.htm?spm=a21wu.241046-global.4691948847.5.41cab6cb5U5S8P&scm=1007.15423.84311.100200300000005&id=566185672494&pvid=7f287f08-6e79-4bf9-a113-913df6e7b2df', 'black', 1, 2, 5, 5, 8, 5.5, 7, 1500, 0, 0, 1, 0, '2020-06-06 19:48:40'),
(2, 2, 'https://item.taobao.com/item.htm?spm=a21wu.241046-global.4691948847.5.41cab6cb5U5S8P&scm=1007.15423.84311.100200300000005&id=566185672494&pvid=7f287f08-6e79-4bf9-a113-913df6e7b2df', 'black and white', 3, 5.6, 0, 0, 8, 4.5, 7, 1500, 2, 0, 1, 0, '2020-06-04 14:12:23');

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
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_statement`
--

INSERT INTO `customer_statement` (`id`, `customer_id`, `amount`, `amount_status`, `about`, `created_date`) VALUES
(1, 2, '1000', 1, 'Deposit', '2020-06-04 12:15:02'),
(2, 2, '500', 0, 'buyproduct', '2020-06-04 12:15:29'),
(3, 2, '1000', 1, 'bonus', '2020-06-04 12:16:08'),
(4, 2, '10000', 1, 'Deposit', '2020-06-11 15:18:43'),
(5, 2, '99000', 1, 'cashback', '2020-06-11 15:19:02'),
(6, 2, '9000', 0, 'Tax', '2020-06-11 15:19:26'),
(7, 2, '5000', 0, 'BuyProduct', '2020-06-11 15:19:52'),
(8, 2, '20000', 0, 'BuyProduct', '2020-06-11 15:20:27'),
(9, 2, '100000', 1, 'Deposit', '2020-06-11 15:21:04'),
(10, 2, '1000000', 1, 'Deposit', '2020-06-11 15:21:19'),
(11, 5, '10000', 1, 'Initial', '2020-06-13 19:05:39'),
(12, 5, '1000', 1, 'Deposit\n', '2020-06-15 22:03:20'),
(13, 5, '10000', 1, 'test', '2020-06-15 22:04:21'),
(14, 5, '99.99', 1, 'Deposite', '2020-06-15 22:08:48'),
(15, 5, '1.11', 1, 'fraction', '2020-06-15 22:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `exchange_rate`
--

CREATE TABLE `exchange_rate` (
  `id` int(11) NOT NULL,
  `mmk` float NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exchange_rate`
--

INSERT INTO `exchange_rate` (`id`, `mmk`, `created_date`) VALUES
(1, 1500, '2020-06-12 21:09:28'),
(2, 1501, '2020-06-12 21:10:04'),
(3, 1502, '2020-06-12 21:10:20');

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
(7, 1, '2020-06-16 09:58:22', 'yes'),
(8, 9, '2020-06-13 10:40:58', 'no'),
(9, 10, '2020-06-13 10:41:47', 'no'),
(10, 11, '2020-06-13 10:43:10', 'no'),
(11, 12, '2020-06-13 10:43:57', 'no'),
(12, 13, '2020-06-15 12:20:38', 'no'),
(13, 14, '2020-06-15 12:25:45', 'no'),
(14, 15, '2020-06-15 12:28:31', 'no');

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
  `messages` text NOT NULL,
  `is_image` enum('yes','no') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `arrived_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_record`
--

INSERT INTO `message_record` (`id`, `to_user_id`, `from_user_id`, `messages`, `is_image`, `arrived_time`, `status`) VALUES
(1, 1, 2, 'No.1) 2 to 1', 'no', '2020-06-08 16:24:24', 1),
(2, 1, 2, 'No2.) 2 to 1', 'no', '2020-06-08 16:24:24', 1),
(3, 1, 2, 'No3.) 2 to 1', 'no', '2020-06-08 16:24:24', 1),
(4, 1, 3, 'Hello Admin!', 'no', '2020-06-08 16:25:11', 1),
(5, 1, 3, 'Hello Admin 1!', 'no', '2020-06-08 16:25:11', 1),
(6, 1, 3, 'Where are you?', 'no', '2020-06-08 16:25:11', 1),
(7, 1, 3, 'Today is Friday!', 'no', '2020-06-08 16:25:11', 1),
(8, 1, 3, 'Tomorrow is Saturday', 'no', '2020-06-08 16:25:11', 1),
(9, 2, 1, 'No1.) 1 to 2', 'no', '2020-06-08 16:24:24', 1),
(10, 1, 2, 'Send form test form', 'no', '2020-06-08 16:24:24', 1),
(11, 2, 1, 'Send form test form 2', 'no', '2020-06-08 16:24:24', 1),
(12, 3, 1, 'testing message send to user 3', 'no', '2020-06-08 16:25:11', 1),
(15, 2, 1, 'hkk', 'no', '2020-06-08 16:24:24', 1),
(19, 4, 1, 'user_4_img_mss_19.png', 'yes', '2020-06-08 16:25:08', 1),
(20, 4, 1, 'No1.) 1 to 4', 'no', '2020-06-08 16:25:08', 1),
(21, 4, 1, 'No2.) 1 to 4', 'no', '2020-06-08 16:25:08', 1),
(22, 4, 1, 'user_4_img_mss_22.png', 'yes', '2020-06-08 16:25:08', 1),
(23, 4, 1, 'user_4_img_mss_23.png', 'yes', '2020-06-08 16:25:08', 1),
(24, 2, 1, 'user_2_img_mss_24.png', 'yes', '2020-06-08 16:24:24', 1),
(25, 2, 1, 'hjhlhkl', 'no', '2020-06-08 16:24:24', 1),
(26, 3, 1, 'user_3_img_mss_26.png', 'yes', '2020-06-08 16:25:11', 1),
(27, 3, 1, 'button', 'no', '2020-06-08 16:25:11', 1),
(28, 4, 1, 'hein\nkaung\nkhant', 'no', '2020-06-08 16:25:08', 1),
(29, 4, 1, 'swe swe nyein', 'no', '2020-06-08 16:25:08', 1),
(30, 4, 1, 'gu gu', 'no', '2020-06-08 16:25:08', 1),
(31, 4, 1, 'gi gi', 'no', '2020-06-08 16:25:08', 1),
(32, 4, 1, 'good good', 'no', '2020-06-08 16:25:08', 1),
(33, 2, 1, 'jl;', 'no', '2020-06-13 20:53:35', 1),
(34, 3, 1, 'hello', 'no', '2020-06-13 20:59:22', 1),
(35, 3, 1, 'he he', 'no', '2020-06-13 20:59:29', 1),
(36, 2, 1, 'hello from now()', 'no', '2020-06-13 21:07:10', 1),
(37, 2, 1, 'user_2_img_mss_37.png', 'yes', '2020-06-13 21:09:24', 1),
(38, 2, 1, 'user_2_img_mss_38.png', 'yes', '2020-06-13 21:46:26', 1),
(39, 2, 1, '😋😋😋😋😋😋😋😋', 'no', '2020-06-13 21:48:26', 1),
(40, 2, 1, '😎😎😎😎😎😎😎😎😎', 'no', '2020-06-13 21:48:36', 1),
(41, 2, 1, 'aa', 'no', '2020-06-13 21:48:42', 1),
(42, 2, 1, 'aa', 'no', '2020-06-13 21:48:56', 1),
(43, 4, 1, 'aa', 'no', '2020-06-13 21:49:06', 1),
(44, 4, 1, '😛🤑🤑🤑', 'no', '2020-06-13 21:49:12', 1),
(45, 4, 1, '😉😉😉😉😉', 'no', '2020-06-13 21:50:02', 1),
(46, 4, 1, 'bb', 'no', '2020-06-13 21:50:12', 1),
(47, 4, 1, 'aa', 'no', '2020-06-13 21:50:16', 1),
(48, 2, 1, 'ok', 'no', '2020-06-13 21:50:35', 1),
(49, 2, 1, '😀😃😃😀😄😆😁😅😂🤣☺😊😇🙂🙂🙃😉😌🤪🤩😍', 'no', '2020-06-13 21:54:04', 1),
(50, 2, 1, '🤣☺', 'no', '2020-06-13 22:00:10', 1),
(51, 2, 1, '🤣☺', 'no', '2020-06-13 22:00:11', 1),
(52, 2, 1, '🤣☺', 'no', '2020-06-13 22:00:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_request`
--

CREATE TABLE `password_request` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `requested_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_request`
--

INSERT INTO `password_request` (`id`, `phone`, `requested_date`, `status`) VALUES
(1, '090909', '2020-06-11 05:39:54', 0),
(2, '909090', '2020-06-11 05:44:03', 1),
(4, '09765920059', '2020-06-11 05:52:37', 1),
(5, '09457503263', '2020-06-11 06:03:50', 1);

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
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_status`, `phone`, `address`, `activate_status`, `point`, `balance`, `membership_id`, `created_date`, `modified_date`) VALUES
(1, 'Anna', '*7E21CC99D9B70D2E149B59EC60007E3D5DECCC37', 1, '09260968600', 'nth', 1, 0, 0, 1, '2020-06-07 19:07:11', '0000-00-00 00:00:00'),
(2, 'David', '*F67248311B2147A3A8FEEAF515A1EA82882B3A68', 0, '09765920059', '104Marlamyine3rdstreetHlaing16QtrYangon', 1, 1000, 1176500, 3, '2020-06-07 19:07:11', '2020-06-09 13:56:13'),
(3, 'Masha', '*7FA8D2E62A13B4798B45E796728821341D613CD7', 0, '09793530085', 'London', 1, 1000, 0, 2, '2020-06-07 19:07:11', '2020-06-09 13:54:36'),
(4, 'Pete', '*F2C2536A0DC1CE63A11AF365189127F123053A53', 0, '09765920059', 'WashitonDC', 1, 0, 0, 1, '2020-06-07 19:07:11', '2020-06-05 04:40:47'),
(5, 'Lavenda', '*983CE3EAFA3163148A9EB100A2EBA1A5F82CDB78', 0, '09965343432', 'NewYork', 1, 50, 21100.1, 4, '2020-06-07 19:07:11', '2020-06-15 15:17:17'),
(6, 'Chocotaco', '*6AA3E3281F392090BCB9E0A1029E31741BA75060', 0, '09457503263', 'Paris', 1, 0, 0, 3, '2020-06-07 19:07:11', '2020-06-13 12:46:11'),
(7, 'Joe', '*60D178145669A4D1569FE820852BB3425CB2D4A7', 0, '09765920059', 'yangon', 1, 0, 0, 1, '2020-06-07 19:07:11', '2020-06-05 09:10:59'),
(8, 'GuGu', '*0FA3E3D473E613A9E60C25004155109A49F7A6A4', 0, '09793530086', 'yangon', 1, 0, 0, 1, '2020-06-07 19:07:11', '2020-06-05 13:35:56'),
(9, 'Shoud', '*1E077DD3605115DBF7BC089B677038C63BC73E67', 0, '09793530086', 'NewYork', 1, 0, 0, 1, '2020-06-13 17:10:58', '2020-06-13 10:56:43'),
(10, 'Taylor', '*442B6D60D8B1C7FA3A2C2382FFA63ABE2D8C109C', 0, '09457503263', 'mathi', 1, 0, 0, 1, '2020-06-13 17:11:46', '2020-06-13 10:56:45'),
(11, 'Obama', '*08E9AA22214D38A5DDC9F8408DC1E01035E7042D', 0, '09223454322', 'WashitonDC', 1, 0, 0, 1, '2020-06-13 17:13:10', '2020-06-13 10:56:47'),
(12, 'Jack', '*9BCDC990E611B8D852EFAF1E3919AB6AC8C8A9F0', 0, '09765920059', 'Myanmar', 1, 0, 0, 1, '2020-06-13 17:13:57', '2020-06-13 10:56:48'),
(13, 'Ozil', '*E9389A03A50B19E3CBF5FFE0D7FAF100957E9C09', 0, '09260968600', 'Germany', 1, 0, 0, 1, '2020-06-15 18:50:38', '2020-06-15 12:25:55'),
(14, 'Sanchez', '*5347F5756D2DB9EE957461E39C0F22ADA0B574F8', 0, '09260968601', 'Chilli', 1, 0, 0, 1, '2020-06-15 18:55:45', '2020-06-15 12:25:56'),
(15, 'Pepe', '*4E90EF6D5302DD783982F606FC24275D9EEC29EB', 0, '09260968603', 'a, b-c_d', 0, 0, 0, 1, '2020-06-15 18:58:31', '2020-06-15 12:28:31');

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
-- Indexes for table `exchange_rate`
--
ALTER TABLE `exchange_rate`
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
-- Indexes for table `password_request`
--
ALTER TABLE `password_request`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `exchange_rate`
--
ALTER TABLE `exchange_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_record`
--
ALTER TABLE `login_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message_record`
--
ALTER TABLE `message_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `password_request`
--
ALTER TABLE `password_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
