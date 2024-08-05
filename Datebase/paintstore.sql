-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 10:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paintstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_name`) VALUES
(1, 'paint'),
(2, 'color');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Id` int(100) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Id`, `Name`, `Phone`, `Address`) VALUES
(1, 'Sohaib', '0300254698', 'fnhghdhtyjbcgj'),
(2, 'Ali', '324', 'dgshy');

-- --------------------------------------------------------

--
-- Table structure for table `companyorder`
--

CREATE TABLE `companyorder` (
  `Id` int(100) NOT NULL,
  `Userid` int(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companyorder`
--

INSERT INTO `companyorder` (`Id`, `Userid`, `product_id`, `cate_id`, `Quantity`, `Date`, `Price`) VALUES
(1, 1, '26', 2, '50', '0000-00-00 00:00:00', '5'),
(2, 1, '26', 2, '50', '0000-00-00 00:00:00', '5'),
(3, 1, '4', 1, '3', '0000-00-00 00:00:00', '50'),
(4, 1, '5', 1, '3', '0000-00-00 00:00:00', '50'),
(5, 1, '5', 1, '2', '0000-00-00 00:00:00', '50'),
(6, 1, '5', 1, '40', '0000-00-00 00:00:00', '50'),
(7, 1, '5', 1, '2', '2024-04-30 22:01:13', '50'),
(8, 0, '[value-3]', 0, '[value-5]', '0000-00-00 00:00:00', '[value-7]'),
(9, 2, '5', 1, '1', '2024-05-02 04:43:46', '50'),
(10, 2, '7', 2, '1', '2024-05-02 04:44:01', '2500'),
(11, 2, '6', 2, '1', '2024-05-02 04:44:29', '30');

-- --------------------------------------------------------

--
-- Table structure for table `companyproduct`
--

CREATE TABLE `companyproduct` (
  `id` int(100) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `pack` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companyproduct`
--

INSERT INTO `companyproduct` (`id`, `cate_id`, `title`, `color`, `pack`, `quantity`, `price`) VALUES
(4, 1, 'Nelson', 's', 'Drum', '47', '50'),
(5, 1, 'qe', 'blue', 'Drum', '0', '50'),
(6, 2, 'Nelson', 'red', 'Drum', '49', '30'),
(7, 2, 'qqq', 'blue', 'Gallon', '48', '2500');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `Id` int(100) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credit`
--

INSERT INTO `credit` (`Id`, `Name`, `Phone`, `Address`) VALUES
(1, 'Ismail', '26456456', 'hfdyrhr');

-- --------------------------------------------------------

--
-- Table structure for table `creditorders`
--

CREATE TABLE `creditorders` (
  `Id` int(100) NOT NULL,
  `Userid` int(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `dateend` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `creditproduct`
--

CREATE TABLE `creditproduct` (
  `id` int(100) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `pack` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `creditproduct`
--

INSERT INTO `creditproduct` (`id`, `cate_id`, `title`, `color`, `pack`, `quantity`, `price`) VALUES
(15, 1, 'Nelson', 'red', 'Gallon', '50', '2500'),
(16, 2, 'qqq', 'red', 'Drum', '50', '30'),
(17, 1, 'qqq', 'red', 'Drum', '48', '100'),
(18, 2, 'qqq', 'red', 'Drum', '50', '30');

-- --------------------------------------------------------

--
-- Table structure for table `dailyexpense`
--

CREATE TABLE `dailyexpense` (
  `Id` int(100) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dailyexpense`
--

INSERT INTO `dailyexpense` (`Id`, `Name`, `Product`, `Date`, `Price`) VALUES
(1, 'sobanAli', 'water', '2024-04-23', '80');

-- --------------------------------------------------------

--
-- Table structure for table `homeexpense`
--

CREATE TABLE `homeexpense` (
  `Id` int(100) NOT NULL,
  `Userid` int(100) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homeexpense`
--

INSERT INTO `homeexpense` (`Id`, `Userid`, `Product`, `Date`, `price`) VALUES
(1, 1, 'atta', '2024-04-23', 1300),
(2, 1, 'atta', '2024-05-02', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `homem`
--

CREATE TABLE `homem` (
  `Id` int(100) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homem`
--

INSERT INTO `homem` (`Id`, `Name`, `Phone`) VALUES
(1, 'soban', '26456456');

-- --------------------------------------------------------

--
-- Table structure for table `homeproduct`
--

CREATE TABLE `homeproduct` (
  `Id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homeproduct`
--

INSERT INTO `homeproduct` (`Id`, `title`, `price`) VALUES
(1, 'atta', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `labour`
--

CREATE TABLE `labour` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Cnic` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `OtherExpense` varchar(255) NOT NULL,
  `Salary` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `Customer_name` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `Customer_name`, `product_id`, `cate_id`, `Quantity`, `Date`, `Price`) VALUES
(17, 'ali2', '23', 2, '2', '2024-04-26 12:53:24', '50'),
(21, 'dasdfsa', '26', 2, '50', '2024-04-30 19:21:19', '5');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `pack` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cate_id`, `title`, `color`, `pack`, `quantity`, `price`) VALUES
(23, 1, 'color', 'red', 'Drum', '500', '50'),
(25, 2, 'color', 'red', 'Drum', '1000', '10'),
(26, 2, 'color7575', 'red7575', 'Drum', '1000', '5');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `Id` int(255) NOT NULL,
  `Customer_name` varchar(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`Id`, `Customer_name`, `product_id`, `cate_id`, `Quantity`, `Date`, `Price`) VALUES
(12, 'Ali', 26, 2, '50', '2024-04-27 04:00:04', '5');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(100) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `dob`, `picture`) VALUES
(1, 'SohaibKhan', 'Sohaib@gmail.com', '123', '11111111', '[value-6]', '[value-7]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `companyorder`
--
ALTER TABLE `companyorder`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `companyproduct`
--
ALTER TABLE `companyproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `creditorders`
--
ALTER TABLE `creditorders`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `creditproduct`
--
ALTER TABLE `creditproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailyexpense`
--
ALTER TABLE `dailyexpense`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `homeexpense`
--
ALTER TABLE `homeexpense`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `homem`
--
ALTER TABLE `homem`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `homeproduct`
--
ALTER TABLE `homeproduct`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `labour`
--
ALTER TABLE `labour`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companyorder`
--
ALTER TABLE `companyorder`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `companyproduct`
--
ALTER TABLE `companyproduct`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `creditorders`
--
ALTER TABLE `creditorders`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `creditproduct`
--
ALTER TABLE `creditproduct`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `dailyexpense`
--
ALTER TABLE `dailyexpense`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homeexpense`
--
ALTER TABLE `homeexpense`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `homem`
--
ALTER TABLE `homem`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homeproduct`
--
ALTER TABLE `homeproduct`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `labour`
--
ALTER TABLE `labour`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
