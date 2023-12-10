-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 02:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livestock`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `content`) VALUES
(1, '<p><strong>About US</strong></p>\n<ul>\n<li>We use&nbsp;<code>auth()-&gt;loginUsingId()</code>&nbsp;to log in the user.</li>\n<li>We use Laravel\'s validation rules to ensure the email is in the correct format and that both email and password fields are required.</li>\n<li>We use&nbsp;<code>auth()-&gt;loginUsingId()</code>&nbsp;to log in the user.</li>\n<li>We use Laravel\'s validation rules to ensure the email is in the correct format and that both email and password fields are required.</li>\n<li>We use&nbsp;<code>auth()-&gt;loginUsingId()</code>&nbsp;to log in the user.</li>\n<li>We use Laravel\'s validation rules to ensure the email is in the correct format and that both email and password fields are required.</li>\n<li>We use&nbsp;<code>auth()-&gt;loginUsingId()</code>&nbsp;to log in the user.</li>\n<li>We use Laravel\'s validation rules to ensure the email is in the correct format and that both email and password fields are required.</li>\n<li>We use&nbsp;<code>auth()-&gt;loginUsingId()</code>&nbsp;to log in the user.</li>\n<li>We use Laravel\'s validation rules to ensure the email is in the correct format and that both email and password fields are required.</li>\n<li>We use&nbsp;<code>auth()-&gt;loginUsingId()</code>&nbsp;to log in the user.</li>\n<li>We use Laravel\'s validation rules to ensure the email is in the correct format and that both email and password fields are required.</li>\n<li>We use&nbsp;<code>auth()-&gt;loginUsingId()</code>&nbsp;to log in the user.</li>\n<li>We use Laravel\'s validation rules to ensure the email is in the correct format and that both email and password fields are required.</li>\n<li>We use&nbsp;<code>auth()-&gt;loginUsingId()</code> to log in the user.</li>\n</ul>');

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `id` int(11) NOT NULL,
  `product_id` varchar(350) DEFAULT NULL,
  `user_id` varchar(350) DEFAULT NULL,
  `qty` varchar(350) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`id`, `product_id`, `user_id`, `qty`, `created_at`) VALUES
(53, '7', '8', '3', '2023-09-12 17:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `assign_task`
--

CREATE TABLE `assign_task` (
  `id` int(11) NOT NULL,
  `user_type` varchar(350) DEFAULT NULL,
  `department` varchar(350) DEFAULT NULL,
  `employee` varchar(350) DEFAULT NULL,
  `from` varchar(350) DEFAULT NULL,
  `to` varchar(350) DEFAULT NULL,
  `desc` varchar(750) DEFAULT NULL,
  `file` varchar(350) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(350) DEFAULT NULL,
  `phone` varchar(10000) DEFAULT NULL,
  `email` varchar(350) DEFAULT NULL,
  `msg` varchar(350) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `phone`, `email`, `msg`, `id`) VALUES
('asd', 'asd', 'name@gmail.com', 'asd', 1),
('User name', '0123465789', 'email@gmail.com', 'we are lookibng for 100 horse with low budget', 2),
('qwe', '0123465789', 'qwe@gmail.com', 'msg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `order_id` varchar(350) NOT NULL,
  `deliver_to` varchar(350) NOT NULL,
  `cost` varchar(350) NOT NULL,
  `duration` varchar(350) NOT NULL,
  `truck_user_id` varchar(350) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(350) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `order_id`, `deliver_to`, `cost`, `duration`, `truck_user_id`, `created_at`, `status`) VALUES
(3, '44', '8', '55', '2 days', '10', '2023-09-12 13:33:31', '1'),
(4, '44', '8', '55', '123', '10', '2023-09-12 16:38:34', '1'),
(5, '46', '8', '1000', '123', '10', '2023-09-12 17:26:52', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` varchar(750) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `weight` varchar(250) DEFAULT NULL,
  `height` varchar(250) DEFAULT NULL,
  `color` varchar(250) DEFAULT NULL,
  `qty` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `weight`, `height`, `color`, `qty`, `status`, `created_at`) VALUES
(7, 'Horse', 'A horse is a majestic and intelligent mammal known for its strength, grace, and companionship with humans.', '500 ', '300', '6', 'black', '5', 'in stock', '2023-09-08 13:14:26'),
(8, 'camel', 'A horse is a majestic and intelligent mammal known for its strength, grace, and companionship with humans.', '1000', '500', '8', 'Brown', '5', 'in stock', '2023-09-08 13:21:35'),
(9, 'Hen', 'hen', '100', '100', '100', 'White', '12', 'in stock', '2023-09-12 16:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` varchar(350) DEFAULT NULL,
  `image` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`) VALUES
(1, '8', 'img/77e4f78d309e5b1ffc04e125fb90803e.png'),
(2, '7', 'img/bd09b81cfb31107adb50e58937195ec9.png'),
(3, '7', 'img/bd09b81cfb31107adb50e58937195ec9.png'),
(4, '8', 'img/77e4f78d309e5b1ffc04e125fb90803e.png'),
(5, '9', 'img/15108e9a85a3496601baa78645f87b1b.png'),
(6, '9', 'img/4fb5df1d12dba2ff7a1cc524619aff59.png'),
(7, '9', 'img/fae0ff5adfe9b0cc7d7f5316e4eee679.png'),
(8, '9', 'img/2e582a38fc86ffa96deeb215220c816e.png');

-- --------------------------------------------------------

--
-- Table structure for table `send_an_offer`
--

CREATE TABLE `send_an_offer` (
  `id` int(11) NOT NULL,
  `product_id` varchar(350) DEFAULT NULL,
  `user_id` varchar(350) DEFAULT NULL,
  `truck_id` varchar(350) DEFAULT NULL,
  `qty` varchar(350) DEFAULT NULL,
  `amount` varchar(350) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `send_an_offer`
--

INSERT INTO `send_an_offer` (`id`, `product_id`, `user_id`, `truck_id`, `qty`, `amount`, `created_at`) VALUES
(44, '8', '8', '4', '1.00', '1000.00', '2023-09-12 13:30:44'),
(45, '8', '8', '4', '1.00', '1000.00', '2023-09-12 16:35:13'),
(46, '7', '8', '4', '3.00', '1500.00', '2023-09-12 17:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `id` int(11) NOT NULL,
  `offer_id` varchar(350) DEFAULT NULL,
  `location` varchar(350) DEFAULT NULL,
  `lat` varchar(350) DEFAULT NULL,
  `long` varchar(350) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`id`, `offer_id`, `location`, `lat`, `long`, `created_at`) VALUES
(3, '44', 'Arazi project exist in DHA', '24.8607', '67.0011', '2023-09-12'),
(4, '44', 'Shah faisal , karachi', '24.8607', '67.0011', '2023-09-12'),
(5, '46', 'location for a house each location in DHA', '24.8607', '67.0011', '2023-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `truck`
--

CREATE TABLE `truck` (
  `id` int(11) NOT NULL,
  `truck_name` varchar(350) DEFAULT NULL,
  `manufacture` varchar(350) DEFAULT NULL,
  `capacity` varchar(350) DEFAULT NULL,
  `availability` varchar(350) DEFAULT NULL,
  `comments` varchar(350) DEFAULT NULL,
  `image` varchar(350) DEFAULT NULL,
  `price` varchar(350) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `truck`
--

INSERT INTO `truck` (`id`, `truck_name`, `manufacture`, `capacity`, `availability`, `comments`, `image`, `price`, `created_at`) VALUES
(4, 'Toyota', 'manufacture', '1', 'yes', 'good truck', 'img/8b7ec506435be69a3449e2d787fdc2f8.avif', '2000', '2023-09-06 20:27:51'),
(5, 'Mercedez', '2009', '3', '3', 'Good truck . desc of truck will be here .', 'img/8b7ec506435be69a3449e2d787fdc2f8.avif', '3000', '2023-09-08 19:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(350) DEFAULT NULL,
  `lname` varchar(350) DEFAULT NULL,
  `email` varchar(350) DEFAULT NULL,
  `num` varchar(350) DEFAULT NULL,
  `pass` varchar(350) DEFAULT NULL,
  `img` varchar(350) DEFAULT NULL,
  `type` varchar(350) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `num`, `pass`, `img`, `type`, `created_at`) VALUES
(1, 'asd', 'asd', 'abbas@gmail.com', '923152457703', 'asd', NULL, NULL, '2023-09-06 16:53:36'),
(2, 'user', 'user', 'asd@gmail.com', '923152457703', 'asdasdasd', NULL, NULL, '2023-09-06 16:54:17'),
(3, 'user', 'user', 'user@gmail.com', '0123456789', '$2y$10$8WftLpX3tDw8B22sFaMuEe0wAHeKKxCfrYrRPj8GGhQH6RzImmncq', NULL, 'user', '2023-09-06 17:20:19'),
(4, 'asd', 'asd', 'userasd@gmail.com', '923152457703', '$2y$10$Zsc414PlCdNt2nqIpky.Nug2k/BZep0oWOSLXd4K3d17mljkJDYH6', NULL, 'user', '2023-09-06 18:47:54'),
(5, 'user', 'user', 'admin123@gmail.com', '923152457703', '$2y$10$gLOpW5ie/Rt4k6FS8uPSd.qFmcjlxE/dEFmL1Or6ib8nx6awSQ7DG', 'img/cbf5187f628f0c67e2ad959e9890171c.avif', 'driver', '2023-09-06 18:55:12'),
(6, 'asd', 'asd', 'use23424r@gmail.com', '923152457703', '$2y$10$OV5tKlD7NOi.ACw.nGgbqe2gIQnuvqyJpEk/oCK3YTDIxqaV6Oo0K', 'img/cbf5187f628f0c67e2ad959e9890171c.avif', 'user', '2023-09-06 18:55:36'),
(7, 'user', 'user', 'user123@gmail.com', '923152457703', '$2y$10$oMvbUPmg3A8dp6Wk.yL/auXmnMQQDaQLfggmvGm9eUVy9nQj8LwBu', 'img/cbf5187f628f0c67e2ad959e9890171c.avif', 'user', '2023-09-08 12:37:38'),
(8, 'qwe', 'qwe', 'qwe@gmail.com', '3152457703', '$2y$10$mRzQ4WfeuU7rUjTOI/9SruRcIBGlMhHsVRImZwcxpzPrO.3hcUu3S', 'img/cbf5187f628f0c67e2ad959e9890171c.avif', 'user', '2023-09-08 20:42:44'),
(9, 'Admin', 'admin', 'admin@gmail.com', '923152457703', '$2y$10$Zhz92lgit9ZCdGlR1Izv9.2zsBdsAtGZJdWxMwHRzDP6a3X3VzY92', 'img/cbf5187f628f0c67e2ad959e9890171c.avif', 'admin', '2023-09-11 13:13:19'),
(10, 'Driver name', 'truck', 'truck@gmail.com', '923152457703', '$2y$10$0h/LuqIDsRgQMZO/PJvvu./xiDU3fIyYjwq4AKuynoKUVuX02NMTO', 'img/cbf5187f628f0c67e2ad959e9890171c.avif', 'driver', '2023-09-11 16:08:44'),
(11, '123', '123', '123@gmail.com', '123', '$2y$10$iPxS1izhSoVD8mb4NQOCKOUaiXVgvwZhS3YrCUsC5hPNONXzFPl9O', 'img/cbf5187f628f0c67e2ad959e9890171c.avif', 'driver', '2023-09-19 11:01:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_task`
--
ALTER TABLE `assign_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_an_offer`
--
ALTER TABLE `send_an_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `truck`
--
ALTER TABLE `truck`
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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `assign_task`
--
ALTER TABLE `assign_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `send_an_offer`
--
ALTER TABLE `send_an_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `track`
--
ALTER TABLE `track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `truck`
--
ALTER TABLE `truck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
