-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2018 at 04:01 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supershop`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(191) NOT NULL,
  `net_amount` int(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `invoice_no`, `net_amount`, `date`, `time`) VALUES
(22, '20180705035551', 9552, '2018-07-05', '15:55:55'),
(23, '20180705035551', 9552, '2018-07-05', '15:57:33'),
(24, '20180705035744', 9552, '2018-07-05', '15:57:46'),
(25, '20180705035808', 9552, '2018-07-05', '15:58:15'),
(26, '20180705040009', 9552, '2018-07-05', '16:00:10'),
(27, '20180705040105', 9552, '2018-07-05', '16:01:07'),
(28, '20180705040512', 4776, '2018-07-05', '16:05:16'),
(29, '20180705040716', 4776, '2018-07-05', '16:07:21'),
(30, '20180705040828', 4776, '2018-07-05', '16:08:30'),
(31, '20180705041600', 9552, '2018-07-05', '16:16:06'),
(32, '20180705041600', 9552, '2018-07-05', '16:17:20'),
(33, '20180705041730', 9552, '2018-07-05', '16:17:36'),
(34, '20180705042540', 9552, '2018-07-05', '16:25:46'),
(35, '20180705042947', 9552, '2018-07-05', '16:29:52'),
(36, '20180705042947', 9552, '2018-07-05', '16:38:49'),
(37, '20180705043855', 9552, '2018-07-05', '16:39:00'),
(38, '20180714073120', 9552, '2018-07-14', '19:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `password` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `name`, `password`) VALUES
(1, 'superadmin@admin.com', 'sajhid khan', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(121) NOT NULL,
  `brand` varchar(121) NOT NULL,
  `sub_cat_name` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `brand`, `sub_cat_name`) VALUES
(2, 'Biscuit', 'All Time', 'diabetes biscuit'),
(3, 'Biscuit', 'pran', 'diabetes biscuit');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `p_code` varchar(191) NOT NULL,
  `p_name` varchar(121) NOT NULL,
  `p_category` varchar(121) NOT NULL,
  `brand` varchar(121) NOT NULL,
  `quantity` int(121) NOT NULL,
  `stocks` int(11) NOT NULL,
  `buying_price` int(121) NOT NULL,
  `selling_price` int(121) NOT NULL,
  `details` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_code`, `p_name`, `p_category`, `brand`, `quantity`, `stocks`, `buying_price`, `selling_price`, `details`, `date`, `time`) VALUES
(9, '1234', 'nexus', 'Biscuit', 'pran', 12, 0, 345, 398, '', '2018-07-04', '15:14:05'),
(10, '1235', 'nexus', 'Biscuit', 'pran', 12, 0, 345, 398, '', '2018-07-04', '15:14:05'),
(11, '45', 'dano', 'Biscuit', 'pran', 1, 28, 345, 500, '', '2018-07-14', '19:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(121) NOT NULL,
  `p_code` varchar(121) NOT NULL,
  `quantity` int(121) NOT NULL,
  `unit_price` int(121) NOT NULL,
  `total_taka` int(121) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `invoice_no`, `p_code`, `quantity`, `unit_price`, `total_taka`, `date`, `time`) VALUES
(44, '20180705035551', '1234', 12, 398, 4776, '2018-07-05', '15:55:55'),
(45, '20180705035551', '1235', 12, 398, 4776, '2018-07-05', '15:55:55'),
(57, '20180705041600', '1235', 12, 398, 4776, '2018-07-05', '16:16:06'),
(58, '20180705041600', '1234', 12, 398, 4776, '2018-07-05', '16:16:06'),
(59, '20180714073120', '1234', 12, 398, 4776, '2018-07-14', '19:33:48'),
(60, '20180714073120', '1235', 12, 398, 4776, '2018-07-14', '19:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `salesman`
--

CREATE TABLE `salesman` (
  `id` int(11) NOT NULL,
  `salesman_id` varchar(121) NOT NULL,
  `name` varchar(121) NOT NULL,
  `mobile` varchar(121) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `username` varchar(121) NOT NULL,
  `email` varchar(121) NOT NULL,
  `salary` int(11) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(121) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesman`
--

INSERT INTO `salesman` (`id`, `salesman_id`, `name`, `mobile`, `gender`, `username`, `email`, `salary`, `address`, `password`) VALUES
(2, '1234', 'Shajid Hossian', '243526', 'male', 'ismailplus', 'ismail@gmail.com', 452345, 'rewr ewr', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `stocks_quantity` int(11) NOT NULL,
  `sells_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesman`
--
ALTER TABLE `salesman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `salesman`
--
ALTER TABLE `salesman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
