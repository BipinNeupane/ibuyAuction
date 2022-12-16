-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2022 at 07:13 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment1`
--

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `product_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `categoryId` varchar(255) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auctions`
--

INSERT INTO `auctions` (`product_id`, `title`, `endDate`, `description`, `categoryId`, `price`, `user_id`) VALUES
(1, 'Bookshelf', '2022-12-22', 'height 6ft width 2 feet very premium bookshelf. Condition unused.', 'Home & Garden', '200.00', 1),
(2, 'iFone S21', '2022-12-29', 'Brand new, 64GB internal storage', 'Electronics', '199.99', 2),
(3, 'Fanny pack', '2022-12-21', 'High quality fanny pack for men', 'Fashion', '28.89', 4),
(4, 'Lewy Jeans', '2022-12-15', 'For women all sizes available', 'Fashion', '29.00', 4),
(5, 'Play Stayson 5', '2022-12-21', ' Condition : used ', 'Electronics', '399.98', 5),
(6, 'Surgical Mask', '2022-12-21', '50pcs', 'Health', '12.99', 5),
(7, 'Standing desk', '2022-12-23', 'Perfect for your workspace', 'Home & Garden', '169.00', 8),
(8, 'Down Jacket', '2023-01-02', 'South Face', 'Fashion', '21.34', 8),
(9, 'Covid test kit', '2022-12-26', 'test and stay safe', 'Health', '123.00', 9),
(10, 'Monitor LCD 4k', '2022-12-23', '4k display', 'Electronics', '29.00', 9);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Home & Garden'),
(2, 'Electronics'),
(3, 'Fashion'),
(4, 'Sport'),
(5, 'Health'),
(6, 'Toys'),
(8, 'Motors');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(5) NOT NULL,
  `review` varchar(200) NOT NULL,
  `postedBy` int(5) NOT NULL,
  `date` date NOT NULL,
  `forUser` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `review`, `postedBy`, `date`, `forUser`) VALUES
(37, 'very trusted seller', 2, '2022-01-10', 1),
(43, 'late delivery\r\n', 4, '2022-01-10', 2),
(44, 'late delivery\r\n', 4, '2022-01-10', 2),
(45, 'Bad customer service', 8, '2022-01-10', 4),
(46, 'Bad customer service', 8, '2022-01-10', 4),
(47, 'Very good seller, delivered in time', 9, '2022-01-10', 8),
(48, 'Very good seller, delivered in time', 9, '2022-01-10', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Bipin', 'bipin@gmail.com', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 'admin'),
(2, 'Samden', 'samden@mail.com', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 'user'),
(4, 'Phurbu', 'phurbu@mail.com', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 'user'),
(5, 'nima', 'nima@mail.com', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 'user'),
(7, 'hello', 'hello@gmail.com', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 'user'),
(8, 'Abhishek', 'abh@gmail.ccm', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 'admin'),
(9, 'subham', 'subham@gmail.com', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `Foreign` (`user_id`) USING BTREE;

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `postedBy` (`postedBy`),
  ADD KEY `review_ibfk_2` (`forUser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auctions`
--
ALTER TABLE `auctions`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auctions`
--
ALTER TABLE `auctions`
  ADD CONSTRAINT `test` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`postedBy`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`forUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
