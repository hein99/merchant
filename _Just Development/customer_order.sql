-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 19, 2020 at 05:38 PM
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
  `product_link` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `cupon_code` varchar(20) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` float NOT NULL,
  `us_tax` float NOT NULL,
  `shipping_cost` float NOT NULL,
  `first_exchange_rate` float NOT NULL,
  `commission` float NOT NULL,
  `product_weight` float NOT NULL,
  `weight_cost` float NOT NULL,
  `mm_tax` float NOT NULL,
  `second_exchange_rate` float NOT NULL,
  `is_deliver` tinyint(1) NOT NULL,
  `delivery_fee` float NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `has_viewed_admin` tinyint(1) NOT NULL,
  `has_viewed_customer` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `customer_id`, `product_link`, `remark`, `cupon_code`, `quantity`, `price`, `us_tax`, `shipping_cost`, `first_exchange_rate`, `commission`, `product_weight`, `weight_cost`, `mm_tax`, `second_exchange_rate`, `is_deliver`, `delivery_fee`, `order_status`, `has_viewed_admin`, `has_viewed_customer`, `created_date`) VALUES
(1, 2, 'https://item.taobao.com/item.htm?spm=a21bo.7929913.198967.13.3eb34174G8Pc45&id=605150240460', 'some remark, many remark, pretty much remark', '98IHIEKHIEN', 2, 500, 100, 100, 1500, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, '2020-06-18 16:32:52'),
(2, 3, 'https://item.taobao.com/item.htm?spm=a21bo.7929913.198967.13.3eb34174G8Pc45&id=605150240460', 'some remark, many remark, pretty much remark, more remark', 'SS98IHIEKHIEN', 3, 400, 100, 100, 1500, 9, 2, 5, 0, 0, 0, 1000, 2, 1, 0, '2020-06-18 16:32:52'),
(3, 4, 'https://item.taobao.com/item.htm?spm=a21bo.7929913.198967.13.3eb34174G8Pc45&id=605150240460', 'some remark, many remark, pretty much remark, more remark', 'TWEEWHIEN', 2, 300, 100, 100, 1500, 9, 5, 2, 5, 0, 0, 0, 3, 1, 0, '2020-06-18 16:32:52'),
(4, 5, 'https://item.taobao.com/item.htm?spm=a21bo.7929913.198967.13.3eb34174G8Pc45&id=605150240460', 'some remark, many remark, pretty much remark, more remark', 'TWERRTRHIEN', 3, 300, 100, 100, 1500, 5, 0, 0, 10, 0, 0, 9000, 7, 1, 0, '2020-06-18 16:32:52'),
(5, 6, 'https://item.taobao.com/item.htm?spm=a21bo.7929913.198967.13.3eb34174G8Pc45&id=605150240460', 'some remark, many remark, pretty much remark, more remark', 'TWERRTRHIEN', 3, 300, 100, 100, 1500, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0, '2020-06-18 16:32:52'),
(6, 7, 'https://item.taobao.com/item.htm?spm=a21bo.7929913.198967.13.3eb34174G8Pc45&id=605150240460', 'some remark, many remark, pretty much remark, more remark', 'TWERRTRHIEN', 3, 300, 100, 100, 1500, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0, '2020-06-18 16:32:52'),
(7, 8, 'https://item.taobao.com/item.htm?spm=a21bo.7929913.198967.13.3eb34174G8Pc45&id=605150240460', 'some remark, many remark, pretty much remark, more remark', 'TWERRTRHIEN', 3, 50, 100, 100, 1500, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0, '2020-06-18 16:32:52'),
(8, 9, 'https://item.taobao.com/item.htm?spm=a21bo.7929913.198967.13.3eb34174G8Pc45&id=605150240460', 'some remark, many remark, pretty much remark, more remark', 'TWERRTRHIEN', 2, 500, 100, 100, 1500, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0, '2020-06-18 16:32:52'),
(9, 10, 'https://item.taobao.com/item.htm?spm=a21bo.7929913.198967.13.3eb34174G8Pc45&id=605150240460', 'some remark, many remark, pretty much remark, more remark', 'TWERRTRHIEN', 3, 350, 100, 100, 1500, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0, '2020-06-18 16:32:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
