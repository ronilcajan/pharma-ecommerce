-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 06:06 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `details`) VALUES
(6, 'Supplements', ''),
(7, 'Vitamins', ''),
(8, 'Diet & Nutrition', ''),
(9, 'Tea & Coffee', '');

-- --------------------------------------------------------

--
-- Table structure for table `cert_settings`
--

CREATE TABLE `cert_settings` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(5, '::1', 'roncajan324', 1637824598);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `user_order_id` int(11) DEFAULT NULL,
  `prescription_file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `stocks` int(11) DEFAULT NULL,
  `min_stocks` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `price_2` decimal(10,2) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'New',
  `category_id` int(11) DEFAULT NULL,
  `prescription` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `unit`, `stocks`, `min_stocks`, `price`, `price_2`, `status`, `category_id`, `prescription`, `image`) VALUES
(5, 'Bioderma', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.', 'bottle', 193, 20, '55.00', '95.00', 'Sale', 6, 0, 'b25d64cb375239a4da2a4afcf5300312.png'),
(6, 'Chanca Piedra', 'Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat.', 'pcs', 97, 10, '70.00', '0.00', 'New', 9, 1, '1c7df4b688baadd3010cafdc76430785.png'),
(7, 'Umcka Cold Care', 'Donec sollicitudin molestie malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'bottle', 278, 20, '120.00', '0.00', 'New', 6, NULL, '9ecbf99c415332f9b1b89d667eee94d4.png'),
(8, 'Cetyl Pure', 'Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.', 'bottle', 49, 5, '20.00', '50.00', 'Sale', 6, NULL, '48a04a8c58eb82c4491367cb55cf031c.png'),
(9, 'CLA Core', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Proin eget tortor risus.', 'bottle', 400, 20, '38.00', '0.00', 'New', 6, NULL, 'a65b25b8a8d57e0a616a083b5ff086af.png'),
(10, 'Poo Pourri', 'Proin eget tortor risus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Cras ultricies ligula sed magna dictum porta.', 'bottle', 95, 20, '38.00', '0.00', 'New', 6, NULL, 'c4b1667372542ac342ca347d1929099b.png'),
(11, 'Ibuprofen Tablets, 200mg', 'Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'bottle', 200, 20, '60.00', '0.00', 'New', 6, NULL, '96bda1aba448e7da39297f79066307ce.png'),
(12, 'Enervon', 'fdsfsdf', 'bottle', 100, 20, '200.00', '150.00', 'Sale', 6, NULL, '5ca25d7fa7bd134b9633594772f09d00.png');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `systems`
--

CREATE TABLE `systems` (
  `id` int(11) NOT NULL,
  `system_logo` text DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `system_acronym` varchar(50) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `systems`
--

INSERT INTO `systems` (`id`, `system_logo`, `system_name`, `system_acronym`, `number`, `email`, `address`, `about`) VALUES
(1, '0d2e21a10fb3d0452cc6fabfc38e92c8.png', 'Pharma System', 'Pharma', '091234567890', 'pharma@gmail.com', 'Oroquieta City', 'Donec sollicitudin molestie malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `order_id`, `amount`, `date`) VALUES
(5, 4, 5, '38.00', '2021-10-17 12:01:02'),
(6, 4, 2, '2004.00', '2021-10-17 12:01:09'),
(7, 4, 18, '120.00', '2021-11-25 15:50:08'),
(8, 4, 17, '120.00', '2021-11-25 16:19:23'),
(9, 4, 16, '120.00', '2021-11-25 16:20:21'),
(10, 4, 15, '120.00', '2021-11-25 16:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `purok` varchar(50) DEFAULT NULL,
  `barangay` varchar(50) DEFAULT NULL,
  `city` varchar(100) DEFAULT 'Oroquita City',
  `province` varchar(100) DEFAULT 'Misamis Occidental',
  `avatar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `purok`, `barangay`, `city`, `province`, `avatar`) VALUES
(2, '::1', 'admin', '$2y$10$yNOenO2kp5FrRKgM/V78o.JFpfK2kJli9UMmAwI1fMQW8J/lzcE22', 'cajanr02@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1628636671, 1637826590, 1, 'Roni', 'Cajan', NULL, NULL, NULL, NULL, NULL, NULL, 'data:image/jpeg;base64,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');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(10, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `id` int(11) NOT NULL,
  `status` varchar(20) DEFAULT 'New',
  `user_id` int(11) DEFAULT NULL,
  `payment_method` varchar(30) DEFAULT NULL,
  `transaction` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `total_order` decimal(10,2) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cert_settings`
--
ALTER TABLE `cert_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systems`
--
ALTER TABLE `systems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cert_settings`
--
ALTER TABLE `cert_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `systems`
--
ALTER TABLE `systems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
