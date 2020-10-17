-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2019 at 11:35 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

DROP TABLE IF EXISTS `admin_table`;
CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_user` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(40) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_user`, `email`, `password`, `status`) VALUES
(1, 'sharif khan', 'admin', 'sharif@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

DROP TABLE IF EXISTS `cart_tbl`;
CREATE TABLE `cart_tbl` (
  `cart_id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`cart_id`, `session_id`, `product_id`, `product_name`, `price`, `quantity`, `image`) VALUES
(1, '3a6a63e90f5d90bb487b3de3742b50b5', 15, 'iphone i6', 3455.00, 1, 'img/a6d022d2a2.png');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_status`) VALUES
(25, 'Desktop', 1),
(26, 'Mobile', 1),
(27, 'software', 1),
(28, 'laptop', 1),
(29, 'frige', 1),
(30, 'elecronics', 1),
(31, ' Jewellery', 1),
(32, 'Camera', 1);

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

DROP TABLE IF EXISTS `compare`;
CREATE TABLE `compare` (
  `cpr_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compare`
--

INSERT INTO `compare` (`cpr_id`, `user_id`, `product_id`, `product_name`, `price`, `image`) VALUES
(1, 15, 15, 'iphone i6', 3455.00, 'img/a6d022d2a2.png'),
(2, 15, 13, 'Samsung col-Frige', 1000.00, 'img/5b1426e535ebf_620L-Electrolux-4-Door-Fridge-EQE6207SD-Hero-Image-high.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `emplyees`
--

DROP TABLE IF EXISTS `emplyees`;
CREATE TABLE `emplyees` (
  `id` int(11) NOT NULL,
  `address` varchar(191) NOT NULL,
  `position` varchar(191) NOT NULL,
  `salary` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emplyees`
--

INSERT INTO `emplyees` (`id`, `address`, `position`, `salary`) VALUES
(1, 'dhaka', 'HR', 5000.00),
(2, 'feni', 'HR', 6000.00),
(3, 'comilla', 'developer', 8000.00),
(4, 'dhaka', 'developer', 10000.00),
(5, 'khulna', 'developer', 12000.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

DROP TABLE IF EXISTS `order_tbl`;
CREATE TABLE `order_tbl` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_id`, `user_id`, `product_id`, `product_name`, `price`, `quantity`, `image`, `date`, `status`) VALUES
(8, 15, 15, 'iphone i6', 3455.00, 1, 'img/a6d022d2a2.png', '2018-08-07 00:25:36', 2),
(9, 15, 14, 'assus i10', 234.00, 1, 'img/b9de8c1e47.png', '2018-08-07 00:25:36', 0),
(10, 15, 15, 'iphone i6', 6910.00, 2, 'img/a6d022d2a2.png', '2018-08-09 10:49:54', 0),
(11, 15, 15, 'iphone i6', 3455.00, 1, 'img/a6d022d2a2.png', '2018-09-13 15:53:31', 0),
(12, 15, 15, 'iphone i6', 10365.00, 3, 'img/a6d022d2a2.png', '2018-10-08 00:05:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,3) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `cat_id`, `brand_id`, `body`, `price`, `image`, `type`) VALUES
(2, 'camera', 25, 2, '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</span></p>', 1000.000, 'img/c187fa82a2.jpg', 0),
(4, 'Camera d4', 32, 6, '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</span></p>', 2000.000, 'img/3a1fda5d0c.jpg', 1),
(8, 'h5', 26, 4, '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</span></p>', 1000.000, 'img/5b12f43d761b9_apple-iphone-6-4.jpg', 0),
(9, 'link music', 30, 2, '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</span></p>', 200.000, 'img/5b13c23e6e2b5_turbo5.png', 0),
(10, 'ipone i8', 26, 4, '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</span></p>', 500.000, 'img/5b13c26a87fa3_apple-iphone-6-4.jpg', 0),
(11, 'uhrf4', 26, 2, '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</span></p>', 499.000, 'img/5b13c286113d6_turbo5.png', 0),
(12, 'sk-50frige', 29, 2, '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</span></p>', 3000.000, 'img/5b1421c3d346c_rt43h5321.png', 0),
(13, 'Samsung col-Frige', 29, 2, '<p><span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</span></p>', 1000.000, 'img/5b1426e535ebf_620L-Electrolux-4-Door-Fridge-EQE6207SD-Hero-Image-high.jpeg', 1),
(14, 'assus i10', 26, 5, '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</span></p>', 234.000, 'img/b9de8c1e47.png', 1),
(15, 'iphone i6', 26, 4, '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</span></p>', 3455.000, 'img/a6d022d2a2.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_brand`
--

DROP TABLE IF EXISTS `shop_brand`;
CREATE TABLE `shop_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_brand`
--

INSERT INTO `shop_brand` (`brand_id`, `brand_name`) VALUES
(1, 'ACER'),
(2, 'SAMSUNG'),
(3, 'hp'),
(4, ' IPHONE'),
(5, 'ASSUS'),
(6, 'CANNON'),
(7, 'shymphony');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `address`, `city`, `country`, `zipcode`, `mobile`, `email`, `password`) VALUES
(2, 'md.sharif khan milon', 'dhanmondi-16', 'dhaka', 'bangladesh', '1207', '0182033487847', 'sharifmilon@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'abir khan', 'adabor,dhaka', 'dhaka ', 'bangladesh', '1545', '0156444521', 'abir@mail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(15, 'md.sharif khan', 'dhanmondi-15', 'dhaka', 'bangladesh', '2222', '015421555', 'sharif@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `wlist_tbl`
--

DROP TABLE IF EXISTS `wlist_tbl`;
CREATE TABLE `wlist_tbl` (
  `w_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wlist_tbl`
--

INSERT INTO `wlist_tbl` (`w_id`, `user_id`, `product_id`, `product_name`, `price`, `image`) VALUES
(9, 3, 14, 'assus i10', 234.00, 'img/b9de8c1e47.png'),
(10, 15, 15, 'iphone i6', 3455.00, 'img/a6d022d2a2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `compare`
--
ALTER TABLE `compare`
  ADD PRIMARY KEY (`cpr_id`);

--
-- Indexes for table `emplyees`
--
ALTER TABLE `emplyees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shop_brand`
--
ALTER TABLE `shop_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wlist_tbl`
--
ALTER TABLE `wlist_tbl`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `compare`
--
ALTER TABLE `compare`
  MODIFY `cpr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emplyees`
--
ALTER TABLE `emplyees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shop_brand`
--
ALTER TABLE `shop_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wlist_tbl`
--
ALTER TABLE `wlist_tbl`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
