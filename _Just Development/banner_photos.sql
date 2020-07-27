-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 27, 2020 at 06:46 PM
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
-- Table structure for table `banner_photos`
--

CREATE TABLE `banner_photos` (
  `id` int(11) NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `order_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner_photos`
--

INSERT INTO `banner_photos` (`id`, `photo_name`, `link`, `order_no`) VALUES
(1, 'B and S letter remix 2.jpeg', 'https://www.thebestshopmm.com', 0),
(2, 'aeroplane vector 4.png', 'https://www.example.com', 0),
(3, 'airplane vector 1.jpeg', 'https://www.example.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner_photos`
--
ALTER TABLE `banner_photos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner_photos`
--
ALTER TABLE `banner_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
