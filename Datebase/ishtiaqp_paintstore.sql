-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2024 at 11:47 AM
-- Server version: 5.7.33
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ishtiaqp_paintstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `labour_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `entry_time` time NOT NULL,
  `exit_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `labour_id`, `date`, `entry_time`, `exit_time`) VALUES
(1, 2, '2024-05-27', '23:59:00', '12:01:00'),
(3, 2, '2024-05-28', '11:14:00', '22:00:00'),
(4, 2, '2024-05-28', '08:30:00', '21:00:00'),
(5, 2, '2024-05-28', '08:30:00', '21:00:00'),
(6, 2, '2024-04-04', '08:04:00', '22:00:00'),
(7, 3, '2024-05-01', '08:30:00', '20:00:00'),
(8, 3, '2024-05-28', '08:17:00', '21:00:00'),
(9, 4, '2024-05-28', '08:21:00', '09:51:00'),
(11, 5, '2024-05-28', '11:00:00', '09:00:00'),
(12, 6, '2024-05-28', '07:25:00', '09:00:00'),
(13, 7, '2024-05-28', '08:01:00', '21:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `cashbalance`
--

CREATE TABLE `cashbalance` (
  `id` int(11) NOT NULL,
  `person` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `pack` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `purchase` varchar(255) NOT NULL,
  `sell` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_name`) VALUES
(1, 'OIL PAINT EXTRA'),
(2, 'SEMI PLASTIC EMULSION EXTRA'),
(3, 'WEATHER SHEATH EXTRA'),
(4, 'WATER BASE MATT EXTRA'),
(5, 'OIL MATT EXTRA'),
(6, 'FILLING PUTTY EXTRA'),
(7, 'WATER PRIMER EXTRA'),
(8, 'OIL PRIMER EXTRA'),
(9, '1-POILGATE'),
(12, 'SEMI PLASTIC EMULSION BOLD'),
(13, 'FILLING PUTTY BOLD'),
(14, 'WATER PRIMER BOLD'),
(15, 'OIL PRIMER BOLD'),
(17, 'White Seamat'),
(18, 'Red Oxid Primer Extra'),
(20, 'Red Oxid Primer Bold'),
(21, '303-Auto Paint '),
(22, 'Tavito Auto Paint'),
(23, 'Rock Car Paint');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Id` int(100) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Id`, `Name`, `Phone`, `Address`) VALUES
(1, 'Dora Baker', '17726872438', 'Labore perferendis i');

-- --------------------------------------------------------

--
-- Table structure for table `companyorder`
--

CREATE TABLE `companyorder` (
  `Id` int(100) NOT NULL,
  `Userid` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Price` int(255) NOT NULL,
  `discount_percentage` decimal(5,2) NOT NULL,
  `profit` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companyproduct`
--

INSERT INTO `companyproduct` (`id`, `cate_id`, `title`, `color`, `pack`, `quantity`, `price`) VALUES
(1, 1, 'Nelson extra', 'BALCK-9002', 'Drum', '12', 5000);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(1, 'Search Engine Index', 'info@domainsubmit.info', '753975333', 'Add ishtiaqpaints.com to Google Search Index!', 'Hello,\r\n\r\nfor your website do be displayed in searches your domain needs to be indexed in the Google Search Index.\r\n\r\nTo add your domain to Google Search Index now, please visit \r\n\r\nhttps://www.domainsubmit.info/'),
(2, 'Daniel Sanderson', 'planksip.dot.org@gmail.com', '916-634-1928', 'Re: Can you help me with something?', 'I am reaching out to explore potential collaborations where I can bring my proven track record in sales and marketing to your team. With a strong commitment to delivering measurable results, I guarantee improvements in your sales metrics.\r\n\r\nMy approach i'),
(3, 'Search Engine Index', 'info@domainsubmit.info', '7273933700', 'Add ishtiaqpaints.com to Google Search Index!', 'Hello,\r\n\r\nfor your website do be displayed in searches your domain needs to be indexed in the Google Search Index.\r\n\r\nTo add your domain to Google Search Index now, please visit \r\n\r\nhttps://www.domainsubmit.info/'),
(4, 'Search Engine Index', 'submissions@searchindex.site', '7424111185', 'Add ishtiaqpaints.com to Google Search Index!', 'Hello,\r\n\r\nfor your website do be displayed in searches your domain needs to be indexed in the Google Search Index.\r\n\r\nTo add your domain to Google Search Index now, please visit \r\n\r\nhttps://www.domainsubmit.pro/'),
(5, 'Search Engine Index', 'submissions@searchindex.site', '5056964933', 'Add ishtiaqpaints.com to Google Search Index!', 'Hello,\r\n\r\nfor your website do be displayed in searches your domain needs to be indexed in the Google Search Index.\r\n\r\nTo add your domain to Google Search Index now, please visit \r\n\r\nhttps://www.domainsubmit.pro/');

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `Id` int(100) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `creditorders`
--

CREATE TABLE `creditorders` (
  `id` int(100) NOT NULL,
  `Userid` int(100) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Dateend` varchar(255) NOT NULL,
  `Price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dailyexpense`
--

CREATE TABLE `dailyexpense` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dailyexpense`
--

INSERT INTO `dailyexpense` (`id`, `name`, `product`, `date`, `price`) VALUES
(5, 'Shop Expenses', 'water', '2024-05-27 16:05:37', 160),
(6, 'Godam Expenses', 'water', '2024-05-27 16:06:53', 50),
(7, 'Godam Expenses', 'Riksha kiraya', '2024-05-27 16:08:55', 3200);

-- --------------------------------------------------------

--
-- Table structure for table `homeexpense`
--

CREATE TABLE `homeexpense` (
  `id` int(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `product` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homeexpense`
--

INSERT INTO `homeexpense` (`id`, `userid`, `product`, `date`, `price`) VALUES
(4, 'home', 'Generator Oil change ', '2024-05-27 20:31:37', 1000),
(5, 'Usman home', 'Kharchi', '2024-05-27 20:32:56', 100);

-- --------------------------------------------------------

--
-- Table structure for table `homem`
--

CREATE TABLE `homem` (
  `Id` int(100) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `homeproduct`
--

CREATE TABLE `homeproduct` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `labour`
--

CREATE TABLE `labour` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Cnic` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `OtherExpense` varchar(255) NOT NULL,
  `Salary` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labour`
--

INSERT INTO `labour` (`id`, `name`, `Phone`, `Cnic`, `Address`, `OtherExpense`, `Salary`) VALUES
(3, 'Arman', '03110102204', '4250180592159', 'Qasim town Landhi Karachi', '7000', 13900),
(4, 'Adil Badshah', '03182210413', '4250145493727', 'Haspatal chorangi    ', '0', 29900),
(5, 'sajid', '03132179075', '42501-1699812-9', 'Haspatal chorangi    ', '0', 29600),
(6, 'Ismail', '03159117097', '37303-7013624-1', 'labour', '0', 30100),
(7, 'bilal ahmed', '03131276478', '3730395148823', 'labour', '0', 30100),
(8, 'khizar', '03125530391', '3730349723795', 'labour', '0', 21000),
(9, 'Soban', '03111836610', '425014983', 'labour', '0', 13000),
(10, 'Anas', '03130237188', '425014983', 'labour', '0', 60000),
(11, 'Arsalan', '03132627845', '4250180592149', 'labour', '1500', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `lowcategory`
--

CREATE TABLE `lowcategory` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lowitemorder`
--

CREATE TABLE `lowitemorder` (
  `id` int(11) NOT NULL,
  `Customer_name` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lowitemproduct`
--

CREATE TABLE `lowitemproduct` (
  `id` int(100) NOT NULL,
  `cate_id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `pack` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lowitempurchase`
--

CREATE TABLE `lowitempurchase` (
  `Id` int(11) NOT NULL,
  `Customer_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `Customer_name` varchar(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `Customer_name`, `product_id`, `cate_id`, `product_color`, `item`, `Quantity`, `Date`, `Price`) VALUES
(3, 'Ismail', 1, 1, '0', 'Gallon', '1', '2024-05-16 14:09:38', 5350),
(4, 'ism', 27, 1, '0', 'Gallon', '1', '2024-05-16 17:38:47', 5350),
(6, 'Ø¹Ø§Ø±Ù Ù„ÛŒØ¨Ø± ', 18, 1, '0', 'Gallon', '7', '2024-05-16 22:37:42', 5350),
(7, 'Ismail ', 66, 1, '0', '', '1', '2024-05-16 23:24:19', 1350),
(13, 'ismail', 43, 1, 'Nelson extra', 'Gallon', '1', '2024-05-18 13:19:13', 5350),
(14, 'ismail', 73, 1, 'Nelson extra', 'Qtr', '1', '2024-05-18 13:19:59', 1350),
(15, 'ismail', 76, 1, 'Nelson extra', 'Qtr', '1', '2024-05-18 13:20:30', 1350),
(16, 'ismail', 70, 1, '', 'Qtr', '1', '2024-05-18 13:21:03', 1350),
(17, 'ismail', 7, 6, 'Nelson extra-47', 'Gallon', '1', '2024-05-18 13:23:41', 5350),
(18, 'PamzON', 7, 6, 'Nelson extra-47', 'Gallon', '1', '2024-05-18 13:24:49', 5350),
(19, 'PamzON', 36, 1, 'Nelson extra', 'Gallon', '2', '2024-05-18 13:25:45', 5350),
(20, 'ismail', 77, 1, 'Nelson extra', 'Qtr', '1', '2024-05-18 13:26:25', 1350),
(21, 'ismail', 6, 6, 'Nelson extra-46', 'Gallon', '1', '2024-05-18 13:30:13', 5350),
(23, 'ismail', 64, 1, 'Nelson extra', 'Qtr', '1', '2024-05-18 15:56:41', 1350),
(24, 'ismail', 32, 1, 'Nelson extra', 'Gallon', '2', '2024-05-18 15:58:39', 5350),
(25, 'ismail', 142, 2, 'Nelson extra', 'Gallon', '1', '2024-05-18 15:59:25', 2650),
(26, 'ismail', 6, 6, 'Nelson extra-46', 'Gallon', '1', '2024-05-18 16:00:04', 5350),
(27, 'ismail', 10, 6, 'Nelson extra-50', 'Gallon', '1', '2024-05-18 16:00:58', 5350),
(28, 'ismail', 1, 1, 'Nelson extra-303', 'Gallon', '1', '2024-05-18 16:01:42', 5350),
(29, 'ismail', 58, 1, 'Nelson extra', 'Qtr', '1', '2024-05-18 16:02:08', 1350),
(30, 'ismail', 61, 1, 'Nelson extra', 'Qtr', '1', '2024-05-18 16:03:02', 1350),
(31, 'ismail', 15, 1, 'Nelson extra', 'Gallon', '2', '2024-05-18 16:04:19', 5350),
(32, 'ismail', 126, 2, 'Nelson extra', 'Gallon', '3', '2024-05-18 16:05:40', 2650),
(33, 'ismail', 100, 2, 'Nelson extra', 'Gallon', '1', '2024-05-18 16:06:18', 2650),
(34, 'ismail', 4, 6, 'Nelson extra-43', 'Gallon', '1', '2024-05-18 16:07:09', 5350),
(35, 'ismail', 90, 1, '', 'Qtr', '1', '2024-05-19 17:36:21', 1350),
(36, 'ismail', 29, 1, 'Nelson extra', 'Gallon', '1', '2024-05-19 17:37:04', 5350),
(37, 'ismail', 43, 1, 'Nelson extra', 'Gallon', '1', '2024-05-19 17:37:32', 5350),
(38, 'ismail', 17, 1, 'Nelson extra', 'Gallon', '1', '2024-05-19 17:37:59', 5350),
(39, 'ismail', 50, 1, 'Nelson extra', 'Qtr', '2', '2024-05-19 17:40:32', 1350),
(47, 'BILAL', 481, 1, 'Nelson extra', 'Gallon', '1', '2024-05-25 12:26:50', 5350),
(48, 'Kaizen Compny', 565, 5, '', '', '3', '2024-05-25 12:27:43', 22400),
(49, 'BILAL', 567, 6, 'Nelson extra', 'Gallon', '1', '2024-05-25 12:39:04', 1900),
(50, 'BILAL', 538, 3, 'Nelson extra', 'Qtr', '1', '2024-05-25 12:43:32', 1500),
(51, 'BILAL', 99, 2, 'Nelson extra', 'Gallon', '2', '2024-05-25 16:43:21', 10400),
(52, 'BILAL', 567, 6, 'Nelson extra', 'Gallon', '1', '2024-05-25 16:46:07', 1900),
(53, 'BILAL', 5, 6, 'Nelson extra-45', 'Gallon', '1', '2024-05-25 16:52:41', 5350),
(54, 'BILAL', 81, 1, 'Nelson extra', 'Qtr', '1', '2024-05-25 16:53:51', 1350),
(55, 'BILAL', 101, 2, 'Nelson extra', 'Qtr', '1', '2024-05-25 17:16:43', 650),
(56, 'BILAL', 1, 1, 'Nelson extra-303', 'Gallon', '1', '2024-05-25 17:19:25', 5350),
(57, 'BILAL', 10, 6, 'Nelson extra', 'Gallon', '1', '2024-05-25 17:20:48', 5350),
(58, 'BILAL', 438, 6, 'Nelson extra-41', 'Gallon', '1', '2024-05-25 17:23:10', 5350),
(59, 'BILAL', 4, 6, 'Nelson extra-43', 'Gallon', '2', '2024-05-25 17:24:40', 5350),
(60, 'BILAL', 28, 1, 'Nelson extra', 'Gallon', '1', '2024-05-25 19:42:55', 5350),
(61, 'BILAL', 64, 1, 'Nelson extra', 'Qtr', '1', '2024-05-25 19:44:49', 1350),
(62, 'BILAL', 480, 1, 'Nelson extra', 'Gallon', '2', '2024-05-25 19:46:04', 5350),
(63, 'BILAL', 18, 1, 'Nelson extra', 'Gallon', '1', '2024-05-25 19:47:22', 5350),
(64, 'BILAL', 100, 2, 'Nelson extra', 'Gallon', '2', '2024-05-25 19:48:38', 2650),
(65, 'BILAL', 78, 1, 'Nelson extra', 'Qtr', '2', '2024-05-25 20:10:58', 1350),
(66, 'BILAL', 12, 1, '1-Nelson extra', 'Gallon', '1', '2024-05-25 20:12:21', 5350),
(68, 'BILAL', 55, 1, 'Nelson extra', 'Qtr', '1', '2024-05-26 19:10:39', 1350),
(69, 'BILAL', 586, 14, 'Nelson Bold', 'Drum', '2', '2024-05-26 19:25:15', 12600),
(70, 'BILAL', 577, 13, 'Nelson Bold', 'Drum', '2', '2024-05-26 19:25:50', 6400),
(71, 'soban', 574, 12, 'Nelson Bold', 'Drum', '1', '2024-05-26 19:27:56', 8800),
(72, 'soban', 586, 14, 'Nelson Bold', 'Drum', '1', '2024-05-26 19:28:55', 12600),
(73, 'soban', 574, 12, 'Nelson Bold', 'Drum', '1', '2024-05-26 19:41:02', 8800),
(74, 'soban', 586, 14, 'Nelson Bold', 'Drum', '2', '2024-05-26 19:42:08', 12600),
(75, 'soban', 89, 1, 'Nelson extra', 'Qtr', '1', '2024-05-26 19:57:10', 1350),
(76, 'ismail', 4, 6, 'Nelson extra', 'Gallon', '2', '2024-05-26 20:20:15', 5350),
(77, 'ismail', 217, 4, 'Nelson extra', 'Gallon', '4', '2024-05-26 20:23:01', 5800),
(78, 'soban', 575, 12, 'Nelson Bold', 'Gallon', '1', '2024-05-27 19:51:15', 2300),
(79, 'soban', 334, 5, 'Nelson extra', 'Qtr', '1', '2024-05-27 19:56:31', 1700),
(80, 'soban', 88, 1, 'Nelson extra', 'Qtr', '1', '2024-05-27 20:02:49', 1350),
(81, 'soban', 34, 1, 'Nelson extra', 'Gallon', '1', '2024-05-27 20:43:17', 5350),
(82, 'soban', 577, 13, 'Nelson Bold', 'Drum', '2', '2024-05-27 21:03:26', 6400),
(83, 'soban', 183, 2, 'Nelson extra', 'Gallon', '1', '2024-05-27 21:04:08', 2650),
(84, 'BILAL', 577, 13, 'Nelson Bold', 'Drum', '2', '2024-05-28 21:18:08', 6400);

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
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cate_id`, `title`, `color`, `pack`, `quantity`, `price`) VALUES
(1, 1, 'Nelson extra', 'white-303', 'Gallon', 1, 5350),
(3, 6, 'Nelson extra', 'Pink-42', 'Gallon', 4, 5350),
(4, 6, 'Nelson extra', 'Sky Blue-43', 'Gallon', 0, 5350),
(5, 6, 'Nelson extra', 'Sinnal RED -45', 'Gallon', 0, 5350),
(6, 6, 'Nelson extra', 'LIGHT BLUE-46', 'Gallon', 0, 5350),
(7, 6, 'Nelson extra', 'GOLDEN YELLOW-47', 'Gallon', 0, 5350),
(8, 6, 'Nelson extra', 'CORIANDER-48', 'Gallon', 0, 5350),
(9, 6, 'Nelson extra', 'Middle Blue -49', 'Gallon', 1, 5350),
(10, 6, 'Nelson extra', 'SOFT TERRACOTTA -50', 'Gallon', 1, 5350),
(11, 1, 'Nelson extra', 'COUMTY CREAM-44', 'Gallon', 4, 5350),
(12, 1, 'Nelson extra', 'GOLDEN BROWN-51', 'Gallon', 5, 5350),
(13, 1, 'Nelson extra', 'SEA GREEN-53', 'Gallon', 3, 5350),
(14, 1, 'Nelson extra', 'SOFT GREY-55', 'Gallon', 4, 5350),
(15, 1, 'Nelson extra', 'COURT GREY-57', 'Gallon', 2, 5350),
(16, 1, 'Nelson extra', 'CREAM/ASH WHITE-58', 'Gallon', 4, 5350),
(17, 1, 'Nelson extra', 'VIVID BLUE-59', 'Gallon', 0, 5350),
(18, 1, 'Nelson extra', 'SMOKE GREY-60', 'Gallon', 0, 5350),
(19, 1, 'Nelson extra', 'LEATHER BROWN-61', 'Gallon', 4, 5350),
(20, 1, 'Nelson extra', 'SIGNAL GREEN-62', 'Gallon', 4, 5350),
(21, 1, 'Nelson extra', 'EARLY DAWN-63', 'Gallon', 4, 5350),
(22, 1, 'Nelson extra', 'MAUVE-64', 'Gallon', 4, 5350),
(23, 1, 'Nelson extra', 'NEW BEIGE-65', 'Gallon', 3, 5350),
(24, 1, 'Nelson extra', 'BLACK-66', 'Gallon', 3, 5350),
(25, 1, 'Nelson extra', 'CAMEO-67', 'Gallon', 2, 5350),
(26, 1, 'Nelson extra', 'WHITE ASH-68', 'Gallon', 3, 5350),
(27, 1, 'Nelson extra', 'DIYAR-69', 'Gallon', 4, 5350),
(28, 1, 'Nelson extra', 'RED OXIDE-70', 'Gallon', 3, 5350),
(29, 1, 'Nelson extra', 'MORNING GREY-301', 'Gallon', 4, 5350),
(30, 1, 'Nelson extra', 'WHITE GREEN-302', 'Gallon', 4, 5350),
(31, 1, 'Nelson extra', 'ORANGE-314', 'Gallon', 4, 5350),
(32, 1, 'Nelson extra', 'SHARP BROWN-316', 'Gallon', 6, 5350),
(33, 1, 'Nelson extra', 'SOFT ASH WHITE-317', 'Gallon', 4, 5350),
(34, 1, 'Nelson extra', 'SUNTRAW-318', 'Gallon', 3, 5350),
(35, 1, 'Nelson extra', 'HOT PINK-319', 'Gallon', 2, 5350),
(36, 1, 'Nelson extra', 'Lemon-320', 'Gallon', 0, 5350),
(37, 1, 'Nelson extra', 'Oxford Blue-322', 'Gallon', 4, 5350),
(38, 1, 'Nelson extra', 'Shocking Pink-323', 'Gallon', 4, 5350),
(39, 1, 'Nelson extra', 'Aluminium Brown-324', 'Gallon', 4, 5350),
(40, 1, 'Nelson extra', 'Opal Lilac-U325', 'Gallon', 4, 5350),
(41, 1, 'Nelson extra', 'Grass Green-326', 'Gallon', 5, 5350),
(42, 1, 'Nelson extra', 'Dark Grey-327', 'Gallon', 0, 5350),
(43, 1, 'Nelson extra', 'Cocao Brown-336', 'Gallon', 2, 5350),
(44, 1, 'Nelson extra', 'New Ash White-337', 'Gallon', 10, 5350),
(45, 1, 'Nelson extra', 'Antelope New-338', 'Gallon', 3, 5350),
(46, 1, 'Nelson extra', 'Spring Green-339', 'Gallon', 4, 5350),
(47, 1, 'Nelson extra', 'Coriander-341', 'Gallon', 7, 5350),
(48, 1, 'Nelson extra', 'Sandal New-342', 'Gallon', 4, 5350),
(49, 1, 'Nelson extra', 'Aluminium White-340', 'Gallon', 0, 5350),
(50, 1, 'Nelson extra', 'white-303', 'Qtr', 1, 1350),
(51, 1, 'Nelson extra', 'off-white-41', 'Qtr', 0, 1350),
(52, 1, 'Nelson extra', 'Pink-42', 'Qtr', 7, 1350),
(53, 1, 'Nelson extra', 'Sky Blue-43', 'Qtr', 0, 1350),
(54, 1, 'Nelson extra', 'County Cream-44', 'Qtr', 5, 1350),
(55, 1, 'Nelson extra', 'Signal RED -45', 'Qtr', 2, 1350),
(56, 1, 'Nelson extra', 'Light Blue-46', 'Qtr', 0, 1350),
(57, 1, 'Nelson extra', 'Golden Yellow-47', 'Qtr', 0, 1350),
(58, 1, 'Nelson extra', 'Middle Blue-49', 'Qtr', 0, 1350),
(59, 1, 'Nelson extra', 'SOFT TERRACOTTA -50', 'Qtr', 4, 1350),
(60, 1, 'Nelson extra', 'GOLDEN BROWN-51', 'Qtr', 0, 1350),
(61, 1, 'Nelson extra', 'SEA GREEN-53', 'Qtr', 5, 1350),
(62, 1, 'Nelson extra', 'SOFT GREY-55', 'Qtr', 6, 1350),
(63, 1, 'Nelson extra', 'COURT GREY-57', 'Qtr', 2, 1350),
(64, 1, 'Nelson extra', 'CREAM/ASH WHITE-58', 'Qtr', 4, 1350),
(65, 1, 'Nelson extra', 'VIVID BLUE-59', 'Qtr', 0, 1350),
(66, 1, 'Nelson extra', 'SMOKE GREY-60', 'Qtr', 0, 1350),
(67, 1, 'Nelson extra', 'LEATHER BROWN-61', 'Qtr', 6, 1350),
(68, 1, 'Nelson extra', 'Signal Green -62', 'Qtr', 6, 1350),
(69, 1, 'Nelson extra', 'EARLY DAWN-63', 'Qtr', 7, 1350),
(70, 1, 'Nelson extra', 'MAUVE-64', 'Qtr', 3, 1350),
(71, 1, 'Nelson extra', 'NEW BEIGE-65', 'Qtr', 6, 1350),
(72, 1, 'Nelson extra', 'BLACK-66', 'Qtr', 1, 1350),
(73, 1, 'Nelson extra', 'CAMEO-67', 'Qtr', 7, 1350),
(74, 1, 'Nelson extra', 'WHITE ASH-68', 'Qtr', 6, 1350),
(75, 1, 'Nelson extra', 'DIYAR-69', 'Qtr', 5, 1350),
(76, 1, 'Nelson extra', 'RED OXIDE-70', 'Qtr', 4, 1350),
(77, 1, 'Nelson extra', 'MORNING GREY-301', 'Qtr', 3, 1350),
(78, 1, 'Nelson extra', 'WHITE GREEN-302', 'Qtr', 3, 1350),
(79, 1, 'Nelson extra', 'ORANGE-314', 'Qtr', 3, 1350),
(80, 1, 'Nelson extra', 'SHARP BROWN-316', 'Qtr', 1, 1350),
(81, 1, 'Nelson extra', 'SOFT ASH WHITE-317', 'Qtr', 8, 1350),
(82, 1, 'Nelson extra', 'SUNTRAW-318', 'Qtr', 5, 1350),
(83, 1, 'Nelson extra', 'HOT PINK-319', 'Qtr', 0, 1350),
(84, 1, 'Nelson extra', 'Lemon-320', 'Qtr', 0, 1350),
(85, 1, 'Nelson extra', 'Oxford Blue-322', 'Qtr', 0, 1350),
(86, 1, 'Nelson extra', 'Shocking Pink-323', 'Qtr', 7, 1350),
(87, 1, 'Nelson extra', 'Aluminium Brown-324', 'Qtr', 7, 1350),
(88, 1, 'Nelson extra', 'Opal Lilac-U325', 'Qtr', 2, 1350),
(89, 1, 'Nelson extra', 'Grass Green-326', 'Qtr', 5, 1350),
(90, 1, 'Nelson extra', 'Dark Grey-327', 'Qtr', 0, 1350),
(91, 1, 'Nelson extra', 'Cocao Brown-336', 'Qtr', 0, 1350),
(92, 1, 'Nelson extra', 'New Ash White-337', 'Qtr', 5, 1350),
(93, 1, 'Nelson extra', 'Antelope New-338', 'Qtr', 6, 1350),
(94, 1, 'Nelson extra', 'Spring Green-339', 'Qtr', 6, 1350),
(95, 1, 'Nelson extra', 'Coriander-341', 'Qtr', 6, 1350),
(96, 1, 'Nelson extra', 'Aluminium White-340', 'Qtr', 7, 1350),
(97, 1, 'Nelson extra', 'Sandal New-342', 'Qtr', 6, 1350),
(99, 2, 'Nelson extra', 'white-3', 'Drum', 4, 10400),
(100, 2, 'Nelson extra', 'white-3', 'Gallon', 2, 2650),
(101, 2, 'Nelson extra', 'white-3', 'Qtr', 1, 650),
(102, 2, 'Nelson extra', 'off-white-1', 'Drum', 3, 10400),
(103, 2, 'Nelson extra', 'off-white-1', 'Gallon', 4, 2650),
(104, 2, 'Nelson extra', 'off-white-1', 'Qtr', 1, 650),
(105, 2, 'Nelson extra', 'Ash white u2', 'Drum', 3, 10400),
(106, 2, 'Nelson extra', 'Ash white u2', 'Gallon', 2, 2650),
(107, 2, 'Nelson extra', 'Lavender white-u5', 'Gallon', 4, 5650),
(108, 2, 'Nelson extra', 'Lavender white-u5', 'Qtr', 2, 650),
(109, 2, 'Nelson extra', 'Rose white-6', 'Gallon', 0, 2650),
(110, 2, 'Nelson extra', 'Rose white-6', 'Qtr', 3, 650),
(111, 2, 'Nelson extra', 'Cockleshell-8', 'Gallon', 2, 2650),
(112, 2, 'Nelson extra', 'Cockleshell-8', 'Qtr', 0, 650),
(113, 2, 'Nelson extra', 'Blossom pink-9', 'Gallon', 0, 2650),
(114, 2, 'Nelson extra', 'Blossom pink-9', 'Qtr', 2, 650),
(115, 2, 'Nelson extra', 'SAND STONE-10', 'Gallon', 4, 2650),
(116, 2, 'Nelson extra', 'SAND STONE-10', 'Qtr', 2, 650),
(117, 2, 'Nelson extra', 'TILE RED-12', 'Gallon', 3, 2650),
(118, 2, 'Nelson extra', 'TILE RED-12', 'Qtr', 2, 650),
(119, 2, 'Nelson extra', 'SPICE-13', 'Gallon', 2, 2650),
(120, 2, 'Nelson extra', 'SPICE-13', 'Qtr', 0, 650),
(121, 2, 'Nelson extra', 'SAHARA SAND-14', 'Gallon', 2, 26580),
(122, 2, 'Nelson extra', 'TERRACOTTA SP-17', 'Gallon', 2, 2650),
(123, 2, 'Nelson extra', 'TERRACOTTA SP-17', 'Qtr', 2, 650),
(124, 2, 'Nelson extra', 'ASH GRAY -18', 'Gallon', 2, 2650),
(125, 2, 'Nelson extra', 'ASH GRAY -18', 'Qtr', 2, 650),
(126, 2, 'Nelson extra', 'CRYSTAL GREEN-19', 'Gallon', 2, 2650),
(127, 2, 'Nelson extra', 'CRYSTAL GREEN-19', 'Qtr', 2, 650),
(128, 2, 'Nelson extra', 'GREY WHITE-20', 'Gallon', 1, 2650),
(129, 2, 'Nelson extra', 'GREY WHITE-20', 'Qtr', 3, 650),
(130, 2, 'Nelson extra', 'Whisper_21', 'Gallon', 4, 2650),
(131, 2, 'Nelson extra', 'Whisper_21', 'Qtr', 2, 650),
(132, 2, 'Nelson extra', 'APPLE Green-22', 'Gallon', 4, 2650),
(133, 2, 'Nelson extra', 'APPLE Green-22', 'Qtr', 2, 650),
(134, 2, 'Nelson extra', 'Lavender-23', 'Gallon', 3, 2650),
(135, 2, 'Nelson extra', 'Lavender-23', 'Qtr', 2, 650),
(136, 2, 'Nelson extra', 'Sea Blue_26', 'Gallon', 3, 2650),
(137, 2, 'Nelson extra', 'Sea Blue_26', 'Qtr', 2, 650),
(138, 2, 'Nelson extra', 'STEEL GREY-27', 'Gallon', 2, 2650),
(139, 2, 'Nelson extra', 'STEEL GREY-27', 'Qtr', 2, 650),
(140, 2, 'Nelson extra', 'Leaf Green-28', 'Gallon', 4, 2650),
(141, 2, 'Nelson extra', 'Leaf Green-28', 'Qtr', 1, 650),
(142, 2, 'Nelson extra', 'Cameo-30', 'Gallon', 3, 2650),
(143, 2, 'Nelson extra', 'Cameo-30', 'Qtr', 2, 650),
(144, 2, 'Nelson extra', 'Lemon-31', 'Gallon', 2, 2650),
(145, 2, 'Nelson extra', 'Lemon-31', 'Qtr', 2, 650),
(146, 2, 'Nelson extra', 'SOFT Bule-32', 'Gallon', 4, 2650),
(147, 2, 'Nelson extra', 'SOFT Bule-32', 'Qtr', 2, 650),
(148, 2, 'Nelson extra', 'SP Orange-33', 'Gallon', 2, 2650),
(149, 2, 'Nelson extra', 'SP Orange-33', 'Qtr', 2, 650),
(150, 2, 'Nelson extra', 'Peach-34', 'Gallon', 4, 2650),
(151, 2, 'Nelson extra', 'Peach-34', 'Qtr', 2, 650),
(152, 2, 'Nelson extra', 'SP Deep Blue-36', 'Gallon', 3, 2650),
(153, 2, 'Nelson extra', 'SP Deep Blue-36', 'Qtr', 2, 650),
(154, 2, 'Nelson extra', 'SP Carnival Pin-38', 'Gallon', 2, 2650),
(155, 2, 'Nelson extra', 'SP Carnival Pin-38', 'Qtr', 1, 650),
(156, 2, 'Nelson extra', 'SP CHLLI RED-G-39', 'Gallon', 3, 2650),
(157, 2, 'Nelson extra', 'SP CHLLI RED-G-39', 'Qtr', 2, 650),
(158, 2, 'Nelson extra', 'SP MANGO-40', 'Gallon', 2, 2650),
(159, 2, 'Nelson extra', 'SP MANGO-40', 'Qtr', 2, 650),
(160, 2, 'Nelson extra', 'Autumn White_402', 'Gallon', 2, 2650),
(161, 2, 'Nelson extra', 'Autumn White_402', 'Qtr', 3, 650),
(162, 2, 'Nelson extra', 'Fresh Green-8742', 'Gallon', 4, 2650),
(163, 2, 'Nelson extra', 'Fresh Green-8742', 'Qtr', 2, 650),
(164, 2, 'Nelson extra', 'ANTIQUE White-8743', 'Gallon', 2, 2650),
(165, 2, 'Nelson extra', 'ANTIQUE White-8743', 'Qtr', 4, 650),
(166, 2, 'Nelson extra', 'ANGAL-8744', 'Gallon', 4, 2650),
(167, 2, 'Nelson extra', 'ANGAL-8744', 'Qtr', 2, 650),
(168, 2, 'Nelson extra', 'SP AMBER-8745', 'Gallon', 4, 2650),
(169, 2, 'Nelson extra', 'SP AMBER-8745', 'Qtr', 2, 650),
(170, 2, 'Nelson extra', 'Abstract White-8746', 'Gallon', 4, 2650),
(171, 2, 'Nelson extra', 'Abstract White-8746', 'Qtr', 2, 650),
(172, 2, 'Nelson extra', 'CASHEW NUT-8747', 'Gallon', 4, 2650),
(173, 2, 'Nelson extra', 'CASHEW NUT-8747', 'Qtr', 4, 650),
(174, 2, 'Nelson extra', 'Peach Shadow-8748', 'Gallon', 3, 2650),
(175, 2, 'Nelson extra', 'Peach Shadow-8748', 'Qtr', 4, 650),
(176, 2, 'Nelson extra', 'PARIS PINK-8749', 'Gallon', 4, 2650),
(177, 2, 'Nelson extra', 'SKYLINK-8750', 'Gallon', 0, 2650),
(178, 2, 'Nelson extra', 'SKYLINK-8750', 'Qtr', 4, 650),
(179, 2, 'Nelson extra', 'APRICOT-8751', 'Gallon', 4, 2650),
(180, 2, 'Nelson extra', 'APRICOT-8751', 'Qtr', 3, 650),
(181, 2, 'Nelson extra', 'Spring White-8752', 'Gallon', 3, 650),
(182, 2, 'Nelson extra', 'Spring White-8752', 'Qtr', 2, 650),
(183, 2, 'Nelson extra', 'SP Rose Velvet-8761', 'Gallon', 1, 2650),
(184, 2, 'Nelson extra', 'SP Rose Velvet-8761', 'Qtr', 2, 650),
(185, 2, 'Nelson extra', 'Silver White-8762', 'Gallon', 5, 2650),
(186, 2, 'Nelson extra', 'Silver White-8762', 'Qtr', 2, 650),
(187, 2, 'Nelson extra', 'English Rose-8763', 'Gallon', 4, 2650),
(188, 2, 'Nelson extra', 'English Rose-8763', 'Qtr', 0, 650),
(189, 2, 'Nelson extra', 'WINTER SKY-8766', 'Gallon', 4, 2650),
(190, 2, 'Nelson extra', 'WINTER SKY-8766', 'Qtr', 0, 650),
(191, 2, 'Nelson extra', 'ICE GREY-8767', 'Gallon', 4, 2650),
(192, 2, 'Nelson extra', 'ICE GREY-8767', 'Qtr', 2, 650),
(193, 2, 'Nelson extra', 'PEWTER-8768', 'Gallon', 4, 2650),
(194, 2, 'Nelson extra', 'PEWTER-8768', 'Qtr', 2, 650),
(195, 2, 'Nelson extra', 'BRAINTREE-8769', 'Gallon', 2, 2650),
(196, 2, 'Nelson extra', 'BRAINTREE-8769', 'Qtr', 2, 650),
(197, 2, 'Nelson extra', 'PASTEL PINK-8770', 'Gallon', 4, 2650),
(198, 2, 'Nelson extra', 'PASTEL PINK-8770', 'Qtr', 0, 650),
(200, 2, 'Nelson extra', 'PHLOX PINK-8771', 'Gallon', 4, 2650),
(201, 2, 'Nelson extra', 'PHLOX PINK-8771', 'Qtr', 0, 0),
(202, 2, 'Nelson extra', 'PURPLE SP-8772', 'Gallon', 2, 2650),
(203, 2, 'Nelson extra', 'PURPLE SP-8772', 'Qtr', 0, 650),
(204, 2, 'Nelson extra', 'FLAME ORANGE-8773', 'Gallon', 3, 2650),
(205, 2, 'Nelson extra', 'FLAME ORANGE-8773', 'Qtr', 0, 650),
(211, 4, 'Nelson extra', 'white-9001', 'Drum', 2, 23000),
(212, 4, 'Nelson extra', 'white-9001', 'Gallon', 6, 5800),
(213, 4, 'Nelson extra', 'BALCK-9002', 'Gallon', 1, 5800),
(214, 4, 'Nelson extra', 'BALCK-9002', 'Qtr', 0, 0),
(215, 4, 'Nelson extra', 'white-9001', 'Qtr', 0, 0),
(216, 4, 'Nelson extra', 'New off White-9058', 'Drum', 0, 0),
(217, 4, 'Nelson extra', 'New Off White-9058', 'Gallon', 3, 5800),
(218, 4, 'Nelson extra', 'New Off White-9058', 'Qtr', 2, 1500),
(220, 4, 'Nelson extra', 'white ICE-9067', 'Gallon', 0, 0),
(221, 4, 'Nelson extra', 'white ICE-9067', 'Qtr', 0, 0),
(222, 4, 'Nelson extra', 'HONEY WHITE-9003', 'Gallon', 0, 0),
(223, 4, 'Nelson extra', 'HONEY WHITE-9003', 'Qtr', 0, 0),
(224, 4, 'Nelson extra', 'MERRY GOLD-9006', 'Gallon', 0, 0),
(225, 4, 'Nelson extra', 'Zephyr-9007', 'Gallon', 1, 5800),
(226, 4, 'Nelson extra', 'Zephyr-9007', 'Qtr', 3, 1650),
(227, 4, 'Nelson extra', 'Kitten White-9010 ', 'Gallon', 0, 0),
(228, 4, 'Nelson extra', 'Kitten White-9010 ', 'Qtr', 1, 1650),
(229, 4, 'Nelson extra', 'Red Brick-9012', 'Gallon', 0, 0),
(230, 4, 'Nelson extra', 'Red Brick-9012', 'Qtr', 0, 0),
(231, 4, 'Nelson extra', 'Soft Mont-9015', 'Gallon', 0, 0),
(232, 4, 'Nelson extra', 'Soft Mont-9015', 'Qtr', 0, 0),
(233, 4, 'Nelson extra', 'Sophistication-9017', 'Gallon', 2, 5800),
(234, 4, 'Nelson extra', 'Sophistication-9017', 'Qtr', 0, 0),
(235, 4, 'Nelson extra', '9018-Pumpkin', 'Gallon', 2, 5800),
(236, 4, 'Nelson extra', '9018-Pumpkin', 'Qtr', 0, 0),
(237, 4, 'Nelson extra', '9019-Snowfield', 'Gallon', 1, 5800),
(238, 4, 'Nelson extra', '9019-Snowfield', 'Qtr', 0, 0),
(239, 4, 'Nelson extra', 'U9021-Ash White', 'Gallon', 0, 0),
(240, 4, 'Nelson extra', 'U9021-Ash White', 'Qtr', 1, 1650),
(241, 4, 'Nelson extra', 'U9021-Ash White', 'Drum', 0, 0),
(242, 4, 'Nelson extra', '9022-Cool Grey', 'Gallon', 0, 0),
(243, 4, 'Nelson extra', '9022-Cool Grey', 'Qtr', 0, 0),
(244, 4, 'Nelson extra', '9023-Apple Green', 'Gallon', 2, 5800),
(245, 4, 'Nelson extra', '9023-Apple Green', 'Qtr', 0, 0),
(246, 4, 'Nelson extra', '9020-Lavender White', 'Gallon', 6, 5800),
(247, 4, 'Nelson extra', '9020-Lavender White', 'Qtr', 2, 1650),
(248, 4, 'Nelson extra', '9025-Leaf Green', 'Gallon', 1, 5800),
(249, 4, 'Nelson extra', '9025-Leaf Green', 'Qtr', 0, 0),
(250, 4, 'Nelson extra', '9027-Orchard Lane', 'Gallon', 2, 5800),
(251, 4, 'Nelson extra', '9027-Orchard Lane', 'Qtr', 0, 0),
(252, 4, 'Nelson extra', '9028-Violet ', 'Gallon', 0, 0),
(253, 4, 'Nelson extra', '9028-Violet ', 'Qtr', 0, 0),
(254, 4, 'Nelson extra', '9029-Soft Blue', 'Gallon', 4, 5800),
(255, 4, 'Nelson extra', '9029-Soft Blue', 'Qtr', 1, 1650),
(256, 4, 'Nelson extra', '9032-Shingle', 'Gallon', 2, 5800),
(257, 4, 'Nelson extra', '9032-Shingle', 'Qtr', 0, 0),
(258, 4, 'Nelson extra', '9034-Tile Red', 'Gallon', 2, 5800),
(259, 4, 'Nelson extra', '9034-Tile Red', 'Qtr', 0, 0),
(260, 4, 'Nelson extra', '9038-Apricot White', 'Gallon', 1, 5800),
(261, 4, 'Nelson extra', '9038-Apricot White', 'Qtr', 1, 1650),
(262, 4, 'Nelson extra', '9040-Inviting Green', 'Gallon', 2, 5800),
(263, 4, 'Nelson extra', '9040-Inviting Green', 'Qtr', 0, 0),
(264, 4, 'Nelson extra', '9042-Sweet Tulip', 'Gallon', 1, 5800),
(265, 4, 'Nelson extra', '9042-Sweet Tulip', 'Qtr', 0, 0),
(266, 4, 'Nelson extra', '9043-Dream Blue', 'Gallon', 1, 5800),
(267, 4, 'Nelson extra', '9043-Dream Blue', 'Qtr', 1, 1650),
(268, 4, 'Nelson extra', '9044-Horizon Blue', 'Gallon', 4, 5800),
(269, 4, 'Nelson extra', '9044-Horizon Blue', 'Qtr', 0, 0),
(270, 4, 'Nelson extra', '9047-Carnival Pink', 'Gallon', 0, 0),
(271, 4, 'Nelson extra', '9047-Carnival Pink', 'Qtr', 0, 0),
(272, 4, 'Nelson extra', '9048-Angel', 'Gallon', 2, 5800),
(273, 4, 'Nelson extra', '9048-Angel', 'Qtr', 0, 0),
(274, 4, 'Nelson extra', '9049-Antique White', 'Gallon', 0, 0),
(275, 4, 'Nelson extra', '9049-Antique White', 'Qtr', 0, 0),
(276, 4, 'Nelson extra', 'U9050-Abstract White', 'Gallon', 0, 0),
(277, 4, 'Nelson extra', 'U9050-Abstract White', 'Qtr', 0, 0),
(278, 4, 'Nelson extra', 'U9053-Rose Lemon', 'Gallon', 1, 5800),
(279, 4, 'Nelson extra', 'U9053-Rose Lemon', 'Qtr', 0, 0),
(280, 4, 'Nelson extra', 'U9054-Ocean Dip', 'Gallon', 2, 5800),
(281, 4, 'Nelson extra', 'U9054-Ocean Dip', 'Qtr', 0, 0),
(282, 4, 'Nelson extra', '9055-Sky Blue', 'Gallon', 2, 5800),
(283, 4, 'Nelson extra', '9055-Sky Blue', 'Qtr', 2, 1650),
(284, 4, 'Nelson extra', '9056-Lime White', 'Gallon', 0, 0),
(285, 3, 'Nelson extra', ' 9056-Lime White', 'Qtr', 0, 0),
(286, 4, 'Nelson extra', '9057-Badami', 'Gallon', 0, 0),
(287, 4, 'Nelson extra', '9057-Badami', 'Qtr', 0, 0),
(288, 4, 'Nelson extra', '9059-Azalea', 'Gallon', 1, 5800),
(289, 4, 'Nelson extra', '9059-Azalea', 'Qtr', 4, 1650),
(290, 4, 'Nelson extra', '9059-Azalea', 'Qtr', 0, 0),
(291, 4, 'Nelson extra', '9060-English Rose', 'Gallon', 1, 5800),
(292, 4, 'Nelson extra', '9060-English Rose', 'Qtr', 2, 1650),
(293, 4, 'Nelson extra', '9061-Silver White', 'Gallon', 2, 5800),
(294, 4, 'Nelson extra', '9061-Silver White', 'Qtr', 0, 0),
(295, 4, 'Nelson extra', '9062-Decent White', 'Gallon', 0, 0),
(296, 4, 'Nelson extra', '9062-Decent White', 'Qtr', 0, 0),
(297, 4, 'Nelson extra', '9063-Sleepy Pink', 'Gallon', 0, 0),
(298, 4, 'Nelson extra', '9063-Sleepy Pink', 'Qtr', 1, 1650),
(299, 4, 'Nelson extra', '9064-Star Light', 'Gallon', 3, 5800),
(300, 4, 'Nelson extra', '9064-Star Light', 'Qtr', 4, 1650),
(301, 4, 'Nelson extra', '9065-Sandalwood', 'Gallon', 0, 0),
(302, 4, 'Nelson extra', '9065-Sandalwood', 'Qtr', 0, 0),
(303, 4, 'Nelson extra', '9066-Ceystal Light', 'Gallon', 3, 5800),
(304, 4, 'Nelson extra', '9066-Ceystal Light', 'Qtr', 4, 1650),
(305, 4, 'Nelson extra', '9067-White Ice', 'Gallon', 0, 0),
(306, 4, 'Nelson extra', '9067-White Ice', 'Qtr', 0, 0),
(307, 4, 'Nelson extra', '9068-Sheesham', 'Gallon', 0, 0),
(308, 4, 'Nelson extra', '9068-Sheesham', 'Gallon', 0, 0),
(309, 4, 'Nelson extra', '9068-Sheesham', 'Qtr', 0, 0),
(310, 4, 'Nelson extra', '9069-ice Grey', 'Gallon', 1, 5800),
(311, 4, 'Nelson extra', '9069-ice Grey', 'Qtr', 0, 0),
(312, 4, 'Nelson extra', '9069-ice Grey', 'Qtr', 0, 0),
(313, 4, 'Nelson extra', '9070-Whisper', 'Gallon', 0, 0),
(314, 4, 'Nelson extra', '9070-Whisper', 'Qtr', 0, 0),
(315, 4, 'Nelson extra', '9071-Brain Tree ', 'Gallon', 1, 5800),
(316, 4, 'Nelson extra', '9071-Brain Tree ', 'Qtr', 0, 0),
(317, 4, 'Nelson extra', '9072-Rose White', 'Gallon', 0, 0),
(318, 4, 'Nelson extra', '9072-Rose White', 'Qtr', 0, 0),
(319, 4, 'Nelson extra', '9073- Pastel Pink', 'Gallon', 1, 5800),
(320, 4, 'Nelson extra', '9073- Pastel Pink', 'Qtr', 0, 0),
(321, 5, 'Nelson extra', '71-Off White', 'Gallon', 3, 5700),
(322, 5, 'Nelson extra', '71-Off White', 'Qtr', 1, 1700),
(323, 5, 'Nelson extra', '72-Reflection', 'Gallon', 1, 5700),
(324, 5, 'Nelson extra', '72-Reflection', 'Qtr', 1, 1700),
(325, 5, 'Nelson extra', '73-Shingle', 'Gallon', 4, 5700),
(326, 5, 'Nelson extra', '73-Shingle', 'Qtr', 3, 1700),
(327, 5, 'Nelson extra', '74-Kitten White', 'Gallon', 0, 0),
(328, 5, 'Nelson extra', '74-Kitten White', 'Qtr', 0, 0),
(329, 5, 'Nelson extra', '75-Onion', 'Gallon', 4, 5700),
(330, 5, 'Nelson extra', '75-Onion', 'Qtr', 3, 1700),
(331, 5, 'Nelson extra', '76-White ICE', 'Gallon', 2, 5700),
(332, 5, 'Nelson extra', '76-White ICE', 'Qtr', 1, 1700),
(333, 5, 'Nelson extra', '78-WHITE', 'Gallon', 5, 5700),
(334, 5, 'Nelson extra', '78-WHITE', 'Qtr', 3, 1700),
(335, 5, 'Nelson extra', '79-ANTIQUE White', 'Gallon', 4, 5700),
(336, 5, 'Nelson extra', '79-ANTIQUE White', 'Qtr', 2, 1700),
(337, 5, 'Nelson extra', '80-Onyx', 'Gallon', 0, 0),
(338, 5, 'Nelson extra', '80-Onyx', 'Qtr', 0, 1700),
(340, 5, 'Nelson extra', '81-Opal Lilac', 'Gallon', 2, 5700),
(341, 5, 'Nelson extra', '81-Opal Lilac', 'Qtr', 4, 1700),
(342, 5, 'Nelson extra', '83-Zephyr', 'Gallon', 0, 5700),
(343, 5, 'Nelson extra', '83-Zephyr', 'Qtr', 4, 1700),
(344, 5, 'Nelson extra', '84-Lavender white', 'Gallon', 1, 5700),
(345, 5, 'Nelson extra', '84-Lavender white', 'Qtr', 2, 1700),
(346, 5, 'Nelson extra', '85-Rose white', 'Gallon', 1, 5700),
(347, 5, 'Nelson extra', '85-Rose white', 'Qtr', 6, 1700),
(348, 5, 'Nelson extra', '86-Beige White', 'Gallon', 0, 0),
(349, 5, 'Nelson extra', '86-Beige White', 'Qtr', 0, 0),
(350, 5, 'Nelson extra', '87-ANGAL', 'Gallon', 7, 5700),
(351, 5, 'Nelson extra', '87-ANGAL', 'Qtr', 0, 0),
(352, 5, 'Nelson extra', '88-Ash white ', 'Gallon', 5, 5700),
(353, 5, 'Nelson extra', '88-Ash white ', 'Qtr', 2, 1700),
(354, 5, 'Nelson extra', '89-PURLE WHITE', 'Gallon', 1, 5700),
(355, 5, 'Nelson extra', '89-PURLE WHITE', 'Qtr', 4, 1700),
(356, 5, 'Nelson extra', '92-GRAPE', 'Gallon', 0, 0),
(357, 5, 'Nelson extra', '92-GRAPE', 'Qtr', 0, 0),
(358, 5, 'Nelson extra', '93-Ocean Blue', 'Gallon', 6, 5700),
(359, 5, 'Nelson extra', '93-Ocean Blue', 'Qtr', 9, 1700),
(360, 5, 'Nelson extra', '94-Cool Blue', 'Gallon', 6, 5700),
(361, 5, 'Nelson extra', '94-Cool Blue', 'Qtr', 2, 1700),
(362, 5, 'Nelson extra', '95-Pumpkin-SP', 'Gallon', 3, 5700),
(363, 5, 'Nelson extra', '95-Pumpkin-SP', 'Qtr', 0, 0),
(364, 5, 'Nelson extra', '96-Rose Lemon', 'Gallon', 5, 5700),
(365, 5, 'Nelson extra', '96-Rose Lemon', 'Qtr', 1, 1700),
(366, 5, 'Nelson extra', '97-Grey Touch', 'Gallon', 1, 5700),
(367, 5, 'Nelson extra', '97-Grey Touch', 'Qtr', 0, 0),
(368, 5, 'Nelson extra', '98-Navy Blue', 'Gallon', 2, 5700),
(369, 5, 'Nelson extra', '98-Navy Blue', 'Qtr', 1, 1700),
(370, 5, 'Nelson extra', '100-BALCK', 'Gallon', 0, 0),
(371, 5, 'Nelson extra', '100-BALCK', 'Qtr', 0, 0),
(372, 5, 'Nelson extra', '201-GOLDEN BROWN SP', 'Gallon', 1, 5700),
(373, 5, 'Nelson extra', '201-GOLDEN BROWN SP', 'Qtr', 3, 1700),
(374, 5, 'Nelson extra', '202-Chilli Red', 'Gallon', 3, 5700),
(375, 5, 'Nelson extra', '202-Chilli Red', 'Qtr', 6, 1700),
(376, 5, 'Nelson extra', '203-Mango Mood SP', 'Gallon', 2, 5700),
(377, 5, 'Nelson extra', '203-Mango Mood SP', 'Qtr', 0, 0),
(378, 5, 'Nelson extra', '204-Firts Dawn', 'Gallon', 0, 0),
(379, 5, 'Nelson extra', '204-Firts Dawn', 'Qtr', 1, 1700),
(380, 5, 'Nelson extra', '205-Cameo', 'Gallon', 2, 5700),
(381, 5, 'Nelson extra', '205-Cameo', 'Qtr', 0, 0),
(382, 5, 'Nelson extra', '207-Feesh Biscuit', 'Gallon', 0, 0),
(383, 5, 'Nelson extra', '207-Feesh Biscuit', 'Qtr', 2, 1700),
(384, 5, 'Nelson extra', '209-Peach', 'Gallon', 3, 5700),
(385, 5, 'Nelson extra', '209-Peach', 'Qtr', 2, 1700),
(386, 5, 'Nelson extra', '210-Fortst Lake', 'Gallon', 0, 0),
(387, 5, 'Nelson extra', '210-Fortst Lake', 'Qtr', 2, 1700),
(388, 5, 'Nelson extra', '211-Fresh Lime SP', 'Gallon', 4, 5700),
(389, 5, 'Nelson extra', '211-Fresh Lime SP', 'Qtr', 0, 0),
(390, 5, 'Nelson extra', '212-Buff', 'Gallon', 1, 5700),
(391, 5, 'Nelson extra', '212-Buff', 'Qtr', 2, 1700),
(392, 5, 'Nelson extra', '213-Carnival Pink SP', 'Gallon', 1, 5700),
(393, 5, 'Nelson extra', '213-Carnival Pink SP', 'Qtr', 1, 1700),
(394, 5, 'Nelson extra', '214-Autumn White', 'Gallon', 0, 0),
(395, 5, 'Nelson extra', '214-Autumn White', 'Qtr', 5, 1700),
(396, 5, 'Nelson extra', '215-Almond White', 'Gallon', 0, 0),
(397, 5, 'Nelson extra', '215-Almond White', 'Qtr', 2, 1700),
(398, 5, 'Nelson extra', '216-Ocean Dip SP', 'Gallon', 3, 5700),
(399, 5, 'Nelson extra', '216-Ocean Dip SP', 'Qtr', 2, 1700),
(400, 5, 'Nelson extra', '217-Purple Party SP', 'Gallon', 2, 5700),
(401, 5, 'Nelson extra', '217-Purple Party SP', 'Qtr', 0, 0),
(402, 5, 'Nelson extra', '218-Classical ', 'Gallon', 1, 5700),
(403, 5, 'Nelson extra', '218-Classical ', 'Qtr', 2, 1700),
(404, 5, 'Nelson extra', '219-Pearl White', 'Gallon', 0, 0),
(405, 5, 'Nelson extra', '219-Pearl White', 'Qtr', 2, 1700),
(406, 5, 'Nelson extra', ' 220-Puff ', 'Gallon', 1, 5700),
(407, 5, 'Nelson extra', '220-Puff', 'Qtr', 3, 1700),
(408, 5, 'Nelson extra', '221-Alpine Red SP', 'Gallon', 3, 5700),
(409, 5, 'Nelson extra', '221-Alpine Red SP', 'Qtr', 4, 1700),
(410, 5, 'Nelson extra', '222-Pretty Pink SP', 'Gallon', 1, 5700),
(411, 5, 'Nelson extra', '222-Pretty Pink SP', 'Qtr', 6, 1700),
(412, 5, 'Nelson extra', '223-Golden Seem ', 'Gallon', 0, 0),
(413, 5, 'Nelson extra', '223-Golden Seem ', 'Qtr', 4, 1700),
(414, 5, 'Nelson extra', '224-Vubble Gum SP', 'Gallon', 0, 0),
(415, 5, 'Nelson extra', '224-Vubble Gum SP', 'Qtr', 3, 1700),
(416, 5, 'Nelson extra', '225-Wood Smoking', 'Gallon', 0, 0),
(417, 5, 'Nelson extra', '225-Wood Smoking', 'Qtr', 0, 0),
(418, 5, 'Nelson extra', 'U227-Abstract White', 'Gallon', 0, 0),
(419, 5, 'Nelson extra', 'U227-Abstract White', 'Qtr', 3, 1700),
(420, 5, 'Nelson extra', '228-Brain Tree Road', 'Gallon', 1, 5700),
(421, 5, 'Nelson extra', '228-Brain Tree Road', 'Qtr', 3, 1700),
(422, 5, 'Nelson extra', 'U229-Silver White', 'Gallon', 4, 5700),
(423, 5, 'Nelson extra', 'U229-Silver White', 'Qtr', 2, 1700),
(424, 5, 'Nelson extra', '230-Lite Ash White', 'Gallon', 5, 5700),
(425, 5, 'Nelson extra', '230-Lite Ash White', 'Qtr', 6, 1700),
(426, 5, 'Nelson extra', '231-Lite Rose New', 'Gallon', 2, 5700),
(427, 5, 'Nelson extra', '231-Lite Rose New', 'Qtr', 2, 1700),
(428, 5, 'Nelson extra', '232-Ice Grey', 'Gallon', 4, 5700),
(429, 5, 'Nelson extra', '232-Ice Grey', 'Qtr', 7, 1700),
(430, 5, 'Nelson extra', '233 Whisper', 'Gallon', 4, 5700),
(431, 5, 'Nelson extra', '233 Whisper', 'Qtr', 0, 0),
(432, 5, 'Nelson extra', '234 Wax Yellow', 'Gallon', 0, 0),
(433, 5, 'Nelson extra', '234 Wax Yellow', 'Qtr', 0, 0),
(434, 5, 'Nelson extra', '235 Sky Line', 'Gallon', 3, 5700),
(435, 5, 'Nelson extra', '235 Sky Line', 'Qtr', 0, 0),
(436, 1, 'Nelson extra-336', 'Cocao Brown-336', 'Gallon', 1, 5350),
(438, 6, 'Nelson extra-41', 'off-white-41', 'Gallon', 1, 5350),
(440, 4, 'Nelson extra', '9058 off White', 'Gallon', 7, 5800),
(441, 4, 'Nelson extra', '9058 off White', 'Gallon', 7, 5800),
(442, 4, 'Nelson extra', '9058 off White', 'Qtr', 2, 1650),
(443, 4, 'Nelson extra', '9051-Shado Rose', 'Gallon', 2, 5800),
(444, 4, 'Nelson extra', '9036-Pearl White', 'Qtr', 4, 1650),
(445, 4, 'Nelson extra', '9033-Blossom Pink', 'Qtr', 1, 1650),
(446, 4, 'Nelson extra', '9045-Sweat Rose', 'Qtr', 1, 1650),
(447, 2, 'Nelson extra', '8760-Dream Red SP', 'Qtr', 2, 650),
(448, 2, 'Nelson extra', '8749-Paris Sand', 'Qtr', 1, 650),
(449, 3, 'Nelson extra', '1917- NEW SPICE', 'Gallon', 3, 5350),
(450, 3, 'Nelson extra', '1917- NEW SPICE', 'Qtr', 2, 1500),
(451, 3, 'Nelson extra', '1919-Ash white', 'Drum', 1, 22000),
(452, 3, 'Nelson extra', '1919-Ash white', 'Gallon', 5, 5350),
(453, 3, 'Nelson extra', '1919-Ash white', 'Qtr', 3, 1500),
(454, 3, 'Nelson extra', '1920-APRICOT', 'Gallon', 1, 5350),
(455, 3, 'Nelson extra', '1920-APRICOT', 'Qtr', 2, 1500),
(456, 3, 'Nelson extra', '1947-MAGNOLIA', 'Gallon', 4, 5350),
(457, 3, 'Nelson extra', '1947-MAGNOLIA', 'Qtr', 2, 1500),
(458, 3, 'Nelson extra', '1948- SUGAR CANE', 'Gallon', 5, 5350),
(459, 3, 'Nelson extra', '1948- SUGAR CANE', 'Qtr', 5, 1500),
(460, 3, 'Nelson extra', '1949-SAND STONE', 'Gallon', 2, 5350),
(461, 3, 'Nelson extra', '1949-SAND STONE', 'Qtr', 3, 1500),
(462, 3, 'Nelson extra', '1951white', 'Drum', 2, 22000),
(463, 3, 'Nelson extra', '1951-white', 'Gallon', 6, 5350),
(464, 3, 'Nelson extra', '1951-white', 'Qtr', 4, 1500),
(465, 3, 'Nelson extra', '1952- off White', 'Drum', 0, 22000),
(466, 3, 'Nelson extra', '1952- off White', 'Gallon', 8, 5350),
(467, 3, 'Nelson extra', '1952- off White', 'Qtr', 0, 1500),
(468, 3, 'Nelson extra', '1953-Rose Lemon', 'Gallon', 1, 5350),
(469, 3, 'Nelson extra', '1953-Rose Lemon', 'Qtr', 0, 1500),
(470, 3, 'Nelson extra', '1954- Ocean Dip', 'Gallon', 1, 5350),
(471, 3, 'Nelson extra', '1954- Ocean Dip', 'Qtr', 4, 1500),
(472, 3, 'Nelson extra', '1955-Sweet Tulip', 'Gallon', 3, 5350),
(473, 3, 'Nelson extra', '1955-Sweet Tulip', 'Qtr', 4, 1500),
(474, 3, 'Nelson extra', '1956- Beaver', 'Gallon', 5, 5350),
(475, 3, 'Nelson extra', '1956- Beaver', 'Qtr', 2, 1500),
(476, 3, 'Nelson extra', '1957- Antelope', 'Gallon', 1, 1500),
(477, 3, 'Nelson extra', '1957- Antelope', 'Qtr', 4, 1500),
(478, 3, 'Nelson extra', '1957- Antelope', 'Qtr', 4, 1500),
(479, 1, 'Nelson extra', '60-Smoke Grey', 'Gallon', 2, 5350),
(480, 1, 'Nelson extra', '46-Light Blue', 'Gallon', 0, 5350),
(481, 1, 'Nelson extra', '327-Dark Grey', 'Gallon', 0, 5350),
(483, 3, 'Nelson extra', '1958-Tea Rose', 'Gallon', 1, 5350),
(484, 3, 'Nelson extra', '1958-Tea Rose', 'Qtr', 1, 1500),
(485, 3, 'Nelson extra', '1959-Goose Wing', 'Qtr', 2, 1500),
(486, 3, 'Nelson extra', '1959-Goose Wing', 'Gallon', 3, 5350),
(487, 3, 'Nelson extra', '1960-Tangerine', 'Gallon', 4, 5350),
(488, 3, 'Nelson extra', '1960-Tangerine', 'Qtr', 0, 1500),
(489, 3, 'Nelson extra', '1962-Moon Shade', 'Gallon', 0, 5350),
(490, 3, 'Nelson extra', '1962-Moon Shade', 'Qtr', 0, 1500),
(491, 3, 'Nelson extra', '1964-Winter Sky', 'Gallon', 0, 5350),
(492, 3, 'Nelson extra', '1964-Winter Sky', 'Qtr', 3, 1500),
(494, 3, 'Nelson extra', '1965-Dawn Sun', 'Qtr', 3, 1500),
(496, 3, 'Nelson extra', '1966-Whisper', 'Qtr', 0, 1500),
(497, 3, 'Nelson extra', '1965-Dawn Sun', 'Gallon', 0, 5350),
(498, 3, 'Nelson extra', '1966-Whisper', 'Qtr', 0, 1500),
(499, 3, 'Nelson extra', '1968-Denim', 'Gallon', 1, 5350),
(500, 3, 'Nelson extra', '1968-Denim', 'Qtr', 0, 1500),
(501, 3, 'Nelson extra', '1967-Peanut Shell', 'Gallon', 2, 5350),
(502, 3, 'Nelson extra', '1967-Peanut Shell', 'Qtr', 0, 1500),
(503, 3, 'Nelson extra', '2067-Chilli Red', 'Gallon', 2, 5350),
(504, 3, 'Nelson extra', '2067-Chilli Red', 'Qtr', 0, 1500),
(505, 3, 'Nelson extra', '2048-Aloevera', 'Gallon', 1, 5350),
(506, 3, 'Nelson extra', '2048-Aloevera', 'Qtr', 2, 1500),
(507, 3, 'Nelson extra', '2087-Beige', 'Gallon', 2, 5350),
(508, 3, 'Nelson extra', '2087-Beige', 'Qtr', 2, 1500),
(509, 3, 'Nelson extra', '2088-Avocado', 'Gallon', 4, 5350),
(510, 3, 'Nelson extra', '2088-Avocado', 'Qtr', 3, 1500),
(511, 3, 'Nelson extra', '2111-Roof Tile', 'Gallon', 2, 5350),
(512, 3, 'Nelson extra', '2111-Roof Tile', 'Qtr', 0, 1500),
(513, 3, 'Nelson extra', '2685-Cameo', 'Gallon', 4, 5350),
(514, 3, 'Nelson extra', '2685-Cameo', 'Qtr', 4, 1500),
(515, 3, 'Nelson extra', '2687-Hopsack', 'Gallon', 3, 5350),
(516, 3, 'Nelson extra', '2687-Hopsack', 'Qtr', 2, 1500),
(517, 3, 'Nelson extra', '2688-Port Land', 'Gallon', 0, 5350),
(518, 3, 'Nelson extra', '2688-Port Land', 'Qtr', 0, 1500),
(519, 3, 'Nelson extra', '2876-Tile Red', 'Gallon', 3, 5350),
(520, 3, 'Nelson extra', '2876-Tile Red', 'Qtr', 0, 1500),
(521, 3, 'Nelson extra', '2885-Autumn Stone', 'Gallon', 4, 5350),
(522, 3, 'Nelson extra', '2885-Autumn Stone', 'Qtr', 0, 1500),
(523, 3, 'Nelson extra', '2886-Admiral', 'Gallon', 3, 5350),
(524, 3, 'Nelson extra', '2886-Admiral', 'Qtr', 1, 1500),
(525, 3, 'Nelson extra', '2910-Red Oxide', 'Gallon', 2, 5350),
(526, 3, 'Nelson extra', '2910-Red Oxide', 'Qtr', 5, 1500),
(527, 3, 'Nelson extra', '2911-Fresh Green', 'Gallon', 1, 5350),
(528, 3, 'Nelson extra', '2911-Fresh Green', 'Qtr', 0, 1500),
(529, 3, 'Nelson extra', '2912-soft Blue', 'Gallon', 5, 5350),
(530, 3, 'Nelson extra', '2912-soft Blue', 'Qtr', 2, 1500),
(531, 3, 'Nelson extra', '2913-Skyline', 'Gallon', 5, 5350),
(532, 3, 'Nelson extra', '2913-Skyline', 'Qtr', 3, 1500),
(533, 3, 'Nelson extra', '2914-Mid Blue', 'Gallon', 5, 5350),
(534, 3, 'Nelson extra', '2914-Mid Blue', 'Qtr', 2, 1500),
(535, 3, 'Nelson extra', '3141-Almond', 'Gallon', 0, 5350),
(536, 3, 'Nelson extra', '3141-Almond', 'Qtr', 0, 1500),
(537, 3, 'Nelson extra', '3147-Charcol', 'Gallon', 1, 5350),
(538, 3, 'Nelson extra', '3147-Charcol', 'Qtr', 0, 1500),
(539, 3, 'Nelson extra', '3148-Terracotta', 'Gallon', 0, 5350),
(540, 3, 'Nelson extra', '3148-Terracotta', 'Qtr', 1, 1500),
(541, 3, 'Nelson extra', '3160-Sky Grey', 'Gallon', 3, 5350),
(542, 3, 'Nelson extra', '3160-Sky Grey', 'Qtr', 3, 1500),
(543, 3, 'Nelson extra', '3161-Silk Stone', 'Gallon', 5, 5350),
(544, 3, 'Nelson extra', '3161-Silk Stone', 'Qtr', 3, 1500),
(545, 3, 'Nelson extra', '3162-Silvery', 'Gallon', 6, 5350),
(546, 3, 'Nelson extra', '3162-Silvery', 'Qtr', 2, 1500),
(547, 3, 'Nelson extra', '4058-Sweet Jewel', 'Gallon', 0, 5350),
(548, 3, 'Nelson extra', '4058-Sweet Jewel', 'Qtr', 4, 1500),
(549, 3, 'Nelson extra', '4130-Jade', 'Gallon', 0, 5350),
(550, 3, 'Nelson extra', '4130-Jade', 'Qtr', 0, 1500),
(551, 3, 'Nelson extra', '5055-Weak Tea', 'Gallon', 2, 5350),
(552, 3, 'Nelson extra', '5055-Weak Tea', 'Qtr', 0, 1500),
(553, 3, 'Nelson extra', '5354-Multani Tile', 'Gallon', 3, 5350),
(554, 3, 'Nelson extra', '5354-Multani Tile', 'Qtr', 1, 1500),
(555, 3, 'Nelson extra', '6172-Pink Pavilion', 'Gallon', 1, 5350),
(556, 3, 'Nelson extra', '6172-Pink Pavilion', 'Qtr', 1, 1500),
(563, 3, 'Nelson extra', '6826-Sharp Cameo', 'Gallon', 3, 5350),
(564, 3, 'Nelson extra', '6826-Sharp Cameo', 'Qtr', 1, 1500),
(565, 5, 'Nelson extra', '230-Lite Ash White', 'Drum', 0, 22400),
(566, 1, 'Nelson extra', '60-Smoke Grey', 'Gallon', 2, 5350),
(567, 6, 'Nelson extra', '315-Ext White Putty', 'Gallon', 2, 1900),
(568, 12, 'Nelson Bold', '9997-Ash White', 'Drum', 3, 8800),
(569, 12, 'Nelson Bold', '9997-Ash White', 'Gallon', 3, 2300),
(570, 12, 'Nelson Bold', '9997-Ash White', 'Qtr', 1, 550),
(571, 12, 'Nelson Bold', '9998-Off White ', 'Drum', 7, 8800),
(572, 12, 'Nelson Bold', '9998-Off White ', 'Gallon', 7, 2300),
(573, 12, 'Nelson Bold', '9998-Off White ', 'Qtr', 3, 550),
(574, 12, 'Nelson Bold', '9999-White', 'Drum', 12, 8800),
(575, 12, 'Nelson Bold', '9999-White', 'Gallon', 1, 2300),
(576, 12, 'Nelson Bold', '9999-White', 'Qtr', 0, 550),
(577, 13, 'Nelson Bold', '7701-Bold Putty', 'Drum', 1, 6400),
(578, 13, 'Nelson Bold', '7701-Bold Putty', 'Gallon', 0, 1650),
(579, 13, 'Nelson Bold', '7701-Bold Putty', 'Qtr', 3, 500),
(581, 14, 'Nelson Bold', '7702-Water Base Primer', 'Gallon', 3, 3200),
(582, 14, 'Nelson Bold', '7702-Water Base Primer', 'Qtr', 2, 750),
(583, 15, 'Nelson Bold', '7703-Oil Primer', 'Drum', 0, 13200),
(584, 15, 'Nelson Bold', '7703-Oil Primer', 'Gallon', 3, 3350),
(585, 15, 'Nelson Bold', '7703-Oil Primer', 'Qtr', 0, 1300),
(586, 14, 'Nelson Bold', '7702-Water Base Primer', 'Drum', 1, 12600),
(587, 2, 'Nelson', '8760-Dream Red SP', 'Gallon', 2, 2650),
(588, 12, 'Nelson', '9999-White', 'Gallon', 1, 2250),
(589, 12, 'Nelson', '9998-Off White ', 'Gallon', 7, 2250),
(590, 12, 'Nelson', '9997-Ash White', 'Gallon', 3, 2250),
(591, 12, 'Nelson', '9999-White', 'Qtr', 0, 650),
(592, 12, 'Nelson', '9998-Off White ', 'Qtr', 3, 650),
(593, 12, 'Nelson', '9997-Ash White', 'Qtr', 1, 650),
(594, 12, 'Nelson', '9999-White', 'Drum', 13, 8800),
(595, 12, 'Nelson', '9998-Off White ', 'Drum', 7, 8800),
(596, 12, 'Nelson', '9997-Ash White', 'Drum', 3, 8800),
(597, 7, 'Nelson', '313-Water Primer', 'Drum', 3, 13400),
(598, 7, 'Nelson', '313-Water Primer', 'Gallon', 0, 3400),
(599, 7, 'Nelson', '313-Water Primer', 'Qtr', 0, 850),
(600, 6, 'Nelson', '315-Ext White Putty', 'Drum', 1, 7200),
(601, 6, 'Nelson', '315-Ext White Putty', 'Qtr', 2, 550),
(602, 18, 'Nelson', '312-Red Oxid Primer', 'Drum', 0, 13450),
(603, 18, 'Nelson', '312-Red Oxid Primer', 'Gallon', 0, 3400),
(604, 18, 'Nelson', '312-Red Oxid Primer', 'Qtr', 3, 900),
(605, 20, 'Nelson', '7704-Red Oxid Primer', 'Drum', 0, 12000),
(606, 20, 'Nelson', '7704-Red Oxid Primer', 'Gallon', 0, 3000),
(607, 20, 'Nelson', '7704-Red Oxid Primer', 'Qtr', 7, 800),
(608, 8, 'Nelson', '311-Oil Primer', 'Drum', 1, 15000),
(609, 8, 'Nelson', '311-Oil Primer', 'Gallon', 1, 3800),
(610, 8, 'Nelson', '311-Oil Primer', 'Qtr', 6, 1050);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(255) NOT NULL,
  `Customer_name` varchar(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `companyname`, `token`, `quantity`, `price`) VALUES
(11, 'Nelson', '400', '70', '28000'),
(12, 'Nelson', '300', '23', '6900'),
(13, 'Nelson', '200', '26', '5200'),
(14, 'Nelson', '100', '27', '2700'),
(15, 'Reliance', '1600', '6', '9600'),
(16, 'Reliance', '1200', '8', '9600'),
(17, 'Reliance', '1000', '1', '1000'),
(18, 'Reliance', '500', '8', '4000'),
(19, 'Reliance', '400', '49', '19600'),
(20, 'Reliance', '300', '201', '60300'),
(21, 'Reliance', '200', '13', '2600'),
(22, 'Reliance', '100', '14', '1400'),
(24, 'Reliance', '50', '113', '5650'),
(25, 'Gobis', '400', '64', '25600'),
(26, 'Gobis', '300', '17', '5100'),
(27, 'Gobis', '200', '2', '400'),
(28, 'Ekotint', '1200', '11', '13200'),
(29, 'Ekotint', '400', '26', '10400'),
(30, 'Ekotint', '300', '55', '16500'),
(31, 'Ekotint', '50', '50', '2500'),
(32, 'Nelson', '400', '9', '3600'),
(33, 'Nelson', '300', '6', '1800'),
(34, 'Nelson', '200', '3', '600'),
(35, 'Nelson', '100', '11', '1100'),
(36, 'Nelson', '50', '1', '50'),
(37, 'Gobis', '400', '12', '4800'),
(38, 'OneTouch', '400', '3', '1200'),
(39, 'Ekotint', '300', '2', '600'),
(40, 'Ekotint', '50', '1', '50'),
(41, 'Reliance', '400', '5', '2000'),
(42, 'Reliance', '300', '22', '6600'),
(43, 'Nelson', '400', '14', '5600'),
(44, 'Nelson', '300', '1', '300'),
(45, 'Nelson', '200', '2', '400'),
(46, 'Nelson', '100', '5', '500'),
(47, 'Nelson', '50', '1', '50'),
(48, 'OneTouch', '400', '5', '2000'),
(49, 'Gobis', '400', '3', '1200'),
(50, 'Gobis', '300', '5', '1500'),
(51, 'Ekotint', '300', '2', '600'),
(52, 'Ekotint', '100', '2', '200'),
(53, 'Ekotint', '50', '6', '300');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`) VALUES
(1, 'Ishtiaqpaints', 'Ishtiaqpaints@gmail.com', 'Ishtiaqpaints@123', '03111836610');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashbalance`
--
ALTER TABLE `cashbalance`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creditproduct`
--
ALTER TABLE `creditproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailyexpense`
--
ALTER TABLE `dailyexpense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeexpense`
--
ALTER TABLE `homeexpense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homem`
--
ALTER TABLE `homem`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `homeproduct`
--
ALTER TABLE `homeproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labour`
--
ALTER TABLE `labour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lowcategory`
--
ALTER TABLE `lowcategory`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `lowitemorder`
--
ALTER TABLE `lowitemorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lowitemproduct`
--
ALTER TABLE `lowitemproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lowitempurchase`
--
ALTER TABLE `lowitempurchase`
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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cashbalance`
--
ALTER TABLE `cashbalance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companyorder`
--
ALTER TABLE `companyorder`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companyproduct`
--
ALTER TABLE `companyproduct`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `creditorders`
--
ALTER TABLE `creditorders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `creditproduct`
--
ALTER TABLE `creditproduct`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dailyexpense`
--
ALTER TABLE `dailyexpense`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `homeexpense`
--
ALTER TABLE `homeexpense`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `homem`
--
ALTER TABLE `homem`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homeproduct`
--
ALTER TABLE `homeproduct`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labour`
--
ALTER TABLE `labour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lowcategory`
--
ALTER TABLE `lowcategory`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lowitemorder`
--
ALTER TABLE `lowitemorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lowitemproduct`
--
ALTER TABLE `lowitemproduct`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lowitempurchase`
--
ALTER TABLE `lowitempurchase`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=611;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
