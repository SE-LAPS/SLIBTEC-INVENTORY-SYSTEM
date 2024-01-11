-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 05:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rposystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`name`, `email`, `phone`, `message`) VALUES
('Onaliy', 'onaliy21@gmail.com', '07777777', 'Help'),
('Onaliy', 'onaliylink@gmail.com', '0777777', 'Help'),
('Thevindu Ransara', 'Ranu@gmail.com', '078 567736363', 'Help Me'),
('Ransara', 'Ran@gmail.com', '078 567 3456', 'Help me');

-- --------------------------------------------------------

--
-- Table structure for table `employee_profiles`
--

CREATE TABLE `employee_profiles` (
  `id` int(11) NOT NULL,
  `employeeId` varchar(20) NOT NULL,
  `initials` varchar(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `title` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `designation` varchar(50) NOT NULL,
  `department` varchar(20) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `joinedOn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_profiles`
--

INSERT INTO `employee_profiles` (`id`, `employeeId`, `initials`, `firstName`, `lastName`, `title`, `gender`, `dob`, `designation`, `department`, `nic`, `joinedOn`) VALUES
(1, '1', '2', 'e', 'e', 'mr', 'male', '2024-01-10', 'ww', 'it', '3', '2024-01-11'),
(2, '1', '2', 'e', 'e', 'mr', 'male', '2024-01-10', 'ww', 'it', '3', '2024-01-11'),
(3, '1', '2', 'e', 'e', 'mr', 'male', '2024-01-10', 'ww', 'it', '3', '2024-01-11'),
(4, '1', '2', 'e', 'e', 'mr', 'male', '2024-01-10', 'ww', 'it', '3', '2024-01-11'),
(5, '2', 'd', 'd', 'd', 'mr', 'female', '2024-01-11', 'e', 'engineer', '4', '2024-01-27'),
(6, '1', '2', 'ee', 'yy', 'mr', 'female', '2024-01-18', 'no pay', 'engineer', '200182903370', '2024-01-11'),
(7, '1', '2', 'ee', 'yy', 'mr', 'female', '2024-01-18', 'no pay', 'engineer', '200182903370', '2024-01-11'),
(8, '2', '2', 'ee', 'ee', 'miss', 'male', '2024-01-11', 'no pay', 'engineer', '200182903370', '2024-01-13'),
(9, '1', '2', 'ee', 'hh', 'mr', 'female', '2024-01-12', 'no pay', 'engineer', '34', '2024-01-20'),
(10, '1', '2', 'ee', 'hh', 'mr', 'female', '2024-01-12', 'no pay', 'engineer', '34', '2024-01-20'),
(11, '1', '2', 'ee', 'hh', 'mr', 'female', '2024-01-12', 'no pay', 'engineer', '34', '2024-01-20'),
(12, '1', '2', 'ee', 'hh', 'mr', 'female', '2024-01-12', 'no pay', 'engineer', '34', '2024-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `leave_request`
--

CREATE TABLE `leave_request` (
  `leave_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `employeeNo` varchar(20) DEFAULT NULL,
  `coveringPerson` varchar(255) DEFAULT NULL,
  `leaveType` varchar(20) DEFAULT NULL,
  `dateRequested` date DEFAULT NULL,
  `numberOfDays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_request`
--

INSERT INTO `leave_request` (`leave_id`, `date`, `name`, `mail`, `designation`, `employeeNo`, `coveringPerson`, `leaveType`, `dateRequested`, `numberOfDays`) VALUES
(24, '2024-01-08', 'amali ', '', 'no pay', '3', 'ee', 'duty', '2024-01-24', 4),
(26, '2024-01-02', 'CodeShow LapZ', '', 'rr', '2', 'ww', 'casual', '2024-01-24', 6),
(27, '2024-01-10', 'rrr', '', 'www', '67', 'ooo', 'duty', '2024-01-27', 90),
(28, '2024-01-08', 'gradeone', '', 'ww', '55', 'yy', 'medical', '2024-01-17', 7),
(29, '2024-01-09', 'vv', '', 'vvv', '3', 'vv', 'duty', '2024-01-24', 4),
(30, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(31, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(32, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(33, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(34, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(35, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(36, '0000-00-00', '', '', '', '', '', 'annual', '0000-00-00', 0),
(37, '0000-00-00', '', '', '', '', '', 'annual', '0000-00-00', 0),
(38, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(39, '2024-01-09', 'kk', '', 'kk', '8', 'kk', 'casual', '2024-01-11', 7),
(40, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(41, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(42, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(43, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(44, '2024-01-09', 'ee', '', 'ee', '3', 'e', 'duty', '2024-01-19', 3),
(45, '2024-01-09', 'qq', '', 'qq', '2', 'qq', 'casual', '2024-01-10', 4),
(46, '2024-01-09', 'aa', '', '1', '2', '3', 'casual', '2024-01-18', 6),
(47, '2024-01-09', 'dd', '', 'dd', 'dd', 'dd', 'casual', '2024-01-24', 2),
(48, '2024-01-10', 'aa', '', 'aa', 'aa', 'aa', 'medical', '2024-01-10', 5),
(49, '2024-01-09', 'zz', 'zz@gmail.com', 'zz', '2', 'ss', 'casual', '2024-01-11', 2),
(50, '0000-00-00', '', 'slitems12@gmail.com', '', '', '', 'annual', '0000-00-00', 0),
(51, '2024-01-09', 'aa', 'aa', 'aa', 'aa', 'aa', 'casual', '2024-01-03', 3),
(52, '2024-01-10', 'ss', 'ss', 'ss', 'ss', 'ss', 'casual', '2024-01-10', 2),
(53, '2024-01-09', 'w', 'abc@gmail.com', 'e', 'e', 'e', 'duty', '2024-01-25', 2),
(54, '2024-01-09', 'a', 'abc@gmail.com', 'a', 'a', 'ddd', 'casual', '2024-01-24', 1),
(56, '2024-01-10', 't', 't@gamil.com', 'r', 'r', 'ee', 'medical', '2024-01-10', 4),
(57, '0000-00-00', '', '', '', '', '', 'annual', '0000-00-00', 0),
(58, '2024-01-09', 'r', 'r', 'r', 'r', 'r', 'casual', '2024-01-18', 5),
(59, '2024-01-09', 'r', 'r', 'r', 'r', 'r', 'casual', '2024-01-18', 5),
(60, '2024-01-09', 'r', 'r', 'r', 'r', 'r', 'casual', '2024-01-18', 5),
(61, '2024-01-09', 'r', 'r@gmail.com', 'r', '5', 'r', 'casual', '2024-01-18', 5),
(62, '0000-00-00', '', '', '', '', '', 'annual', '0000-00-00', 0),
(63, '0000-00-00', '', '', '', '', '', 'annual', '0000-00-00', 0),
(64, '0000-00-00', '', '', '', '', '', 'annual', '0000-00-00', 0),
(65, '2024-01-10', 'CodeShow LapZ', 'slitems12@gmail.com', 'ww', '2', 'ww', 'casual', '2024-01-18', 4),
(66, '0000-00-00', '', '', '', '', '', 'annual', '0000-00-00', 0),
(67, '2024-01-10', 'gradeone', 'slitems12@gmail.com', 'ww', '2', 'ww', 'casual', '2024-01-17', 4),
(68, '2024-01-10', 'gradeone', 'slitems12@gmail.com', 'ww', '2', 'ww', 'casual', '2024-01-17', 4),
(69, '0000-00-00', '', '', '', '', '', 'annual', '0000-00-00', 3),
(70, '0000-00-00', '', '', '', '', '', 'annual', '0000-00-00', 0),
(71, '0000-00-00', '', '', '', '', '', 'annual', '0000-00-00', 0),
(72, '0000-00-00', '', '', '', '', '', 'annual', '0000-00-00', 0),
(73, '2024-01-03', 'CodeShow LapZ', 'slitems12@gmail.com', 'ww', '2', 'ww', 'casual', '2024-01-18', 5),
(74, '0000-00-00', '', '', '', '', '', 'annual', '0000-00-00', 0),
(75, '2024-01-10', 'gradeone', 'slitems12@gmail.com', 'ww', '3', 'aa', 'casual', '2024-01-25', 7),
(76, '2024-01-10', 'gradeone', 'slitems12@gmail.com', 'ww', '3', 'lapz', 'annual', '2024-01-18', 7),
(77, '2024-01-03', 'gradeone', 'slitems12@gmail.com', 'Visit to University', '20', 'lapz', 'medical', '2024-01-26', 8),
(78, '0000-00-00', '', '', '', '', '', 'annual', '0000-00-00', 0),
(79, '2024-01-10', 'gradeone', 'slitems12@gmail.com', 'ww', '20', 'lapz', 'medical', '2024-01-19', 8),
(80, '2024-01-10', 'lahiru', 'slitems12@gmail.com', 'no pay', '20', 'lapz', 'medical', '2024-01-20', 10),
(81, '0000-00-00', '', '', '', '', '', 'annual', '0000-00-00', 0),
(82, '2024-01-10', 'lahiru', 'slitems12@gmail.com', 'no pay', '20', 'lapz', 'medical', '2024-01-20', 10),
(83, '0000-00-00', '', '', '', '', '', 'annual', '0000-00-00', 0),
(84, '0000-00-00', '', '', '', '', '', 'annual', '0000-00-00', 0),
(85, '2024-01-11', 'gradeone', 'slitems12@gmail.com', 'ww', 'aa', 'lapz', 'medical', '2024-01-26', 6);

-- --------------------------------------------------------

--
-- Table structure for table `rpos_admin`
--

CREATE TABLE `rpos_admin` (
  `admin_id` varchar(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpos_admin`
--

INSERT INTO `rpos_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
('10e0b6dc958adfb5b094d8935a13aeadbe783c25', 'System Admin', 'admin@mail.com', '903b21879b4a60fc9103c3334e4f6f62cf6c3a2d');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_chemicals`
--

CREATE TABLE `rpos_chemicals` (
  `prod_id` varchar(200) NOT NULL,
  `prod_code` varchar(200) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_img` varchar(200) NOT NULL,
  `prod_desc` longtext NOT NULL,
  `prod_price` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `prod_location` varchar(250) NOT NULL,
  `prod_Exp_Date` date DEFAULT NULL,
  `prod_GINQty` varchar(250) NOT NULL,
  `prod_GRNQty` varchar(250) NOT NULL,
  `prod_REQty` varchar(250) NOT NULL,
  `prod_GINAmount` int(250) NOT NULL,
  `prod_GRNAmount` int(250) NOT NULL,
  `prod_REAmount` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpos_chemicals`
--

INSERT INTO `rpos_chemicals` (`prod_id`, `prod_code`, `prod_name`, `prod_img`, `prod_desc`, `prod_price`, `created_at`, `prod_location`, `prod_Exp_Date`, `prod_GINQty`, `prod_GRNQty`, `prod_REQty`, `prod_GINAmount`, `prod_GRNAmount`, `prod_REAmount`) VALUES
('0ed3dd8464', 'DQTS-4582', 'Potassium Nitrate - 1kg', '2.jpg', 'Potassium Nitrate - 1kg', '800', '2023-12-21 04:18:17.818885', 'CH24', '2023-12-29', '43', '3', '40', 32000, 2400, 32000),
('137e552bb8', 'FMTG-9435', 'Sodium Chloride (g)', '18.jpg', 'Sodium Chloride (g)', '250', '2023-12-21 04:34:17.547679', 'CH56', '2023-12-28', '40', '0', '40', 36000, 0, 36000),
('1f56c20f8c', 'XHMT-8534', 'Hydrochloric acid - AR', '19.jpg', 'Hydrochloric acid - AR', '1500', '2023-12-21 04:37:29.797748', 'CH23', '0000-00-00', '89', '28', '61', 91500, 42000, 91500),
('3adb03ad15', 'WJGA-9635', 'DEPC -25ML', '9.jpg', 'DEPC -25ML', '600', '2023-12-21 05:02:44.038236', 'CH21', '2023-12-30', '56', '0', '56', 47712, 0, 47712);

-- --------------------------------------------------------

--
-- Table structure for table `rpos_customers`
--

CREATE TABLE `rpos_customers` (
  `customer_id` varchar(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_phoneno` varchar(200) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `customer_password` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpos_customers`
--

INSERT INTO `rpos_customers` (`customer_id`, `customer_name`, `customer_phoneno`, `customer_email`, `customer_password`, `created_at`) VALUES
('06549ea58afd', 'Ana J. Browne', '4589698780', 'anaj@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:39:48.523820'),
('1464127e2a69', 'Thevindu Ransara Rathnayaka', '078 234 4567', 'Ranu@gmail.com', 'c28baaf9582438fe62a850d3828ddea6f148006b', '2023-12-18 04:06:13.480575'),
('1fc1f694985d', 'Jane Doe', '2145896547', 'janed@mail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', '2022-09-03 13:39:13.076592'),
('27e4a5bc74c2', 'Tammy R. Polley', '4589654780', 'tammy@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:37:47.049438'),
('29c759d624f9', 'Trina L. Crowder', '5896321002', 'trina@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 13:16:18.927595'),
('35135b319ce3', 'Christine Moore', '7412569698', 'christine@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-04 16:29:45.133297'),
('3859d26cd9a5', 'Louise R. Holloman', '7856321000', 'holloman@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:38:12.149280'),
('57c12769679c', 'Thevindu Rathnayaka', '078 122 4567', 'Ranu@gmail.com', 'c28baaf9582438fe62a850d3828ddea6f148006b', '2023-12-16 14:46:34.565248'),
('57f6eb7caa0d', 'rr', '33', 'rr@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', '2024-01-03 06:57:37.971150'),
('669ba13c75c1', 'abc', '1234', 'abc@gmail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', '2024-01-03 04:00:38.488519'),
('7c8f2100d552', 'Melody E. Hance', '3210145550', 'melody@mail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', '2022-09-03 13:16:23.996068'),
('8bf3f3823caa', 'Onaliy', '07777777', 'onaliy21@gmail.com', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', '2023-12-16 12:08:36.535950'),
('9c7fcc067bda', 'Delbert G. Campbell', '7850001256', 'delbert@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:38:56.944364'),
('9f6378b79283', 'William C. Gallup', '7145665870', 'william@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:39:26.507932'),
('9f73609bbcff', 'onaliy vinu', '07777777', 'onaliylink@gmail.com', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', '2023-12-16 11:16:42.494811'),
('a2555503a3b5', 'lll', '234', 'l@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', '2024-01-10 07:21:43.221785'),
('d0ba61555aee', 'Jamie R. Barnes', '4125556587', 'jamie@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:36:59.643216'),
('d0f8ec430c77', 'tt', '34', 'yi@gmail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', '2024-01-08 11:15:07.062000'),
('d7c2db8f6cbf', 'Victor A. Pierson', '1458887896', 'victor@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:37:21.568155'),
('e711dcc579d9', 'Julie R. Martin', '3245557896', 'julie@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:38:33.397498'),
('f582e2d7108d', 'Ransara', '123456', 'ran@gmail.com', '1f4129b2b73b8ce2b048846c93da6402608f12e6', '2024-01-03 05:16:27.455251'),
('f5cbdb9c3b74', 'Lahiru Senavirathna', '0713343', 'lapz@mail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', '2024-01-02 10:57:21.751448'),
('fe6bb69bdd29', 'Brian S. Boucher', '1020302055', 'brians@mail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', '2022-09-03 13:16:29.591980'),
('ff2b187065aa', 'Thevindu Ransara Rathnayaka', '078 234 4567', 'ranu@gmail.com', 'b90bfbfda6b12ceeb37c68efd504f78fcb424596', '2023-12-18 04:15:37.130115');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_hr`
--

CREATE TABLE `rpos_hr` (
  `hrd_id` int(11) NOT NULL,
  `hr_name` varchar(255) NOT NULL,
  `hr_phoneno` varchar(15) NOT NULL,
  `hr_email` varchar(255) NOT NULL,
  `hr_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rpos_hr`
--

INSERT INTO `rpos_hr` (`hrd_id`, `hr_name`, `hr_phoneno`, `hr_email`, `hr_password`) VALUES
(1, 'uu', '88', 'ui@gmail.com', '3be0ff98032936bc7f9df51c5685ee5f2dd6ccee'),
(2, 'lll', '222', 'l@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_orders`
--

CREATE TABLE `rpos_orders` (
  `order_id` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `prod_id` varchar(200) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_price` varchar(200) NOT NULL,
  `prod_qty` varchar(200) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpos_orders`
--

INSERT INTO `rpos_orders` (`order_id`, `order_code`, `customer_id`, `customer_name`, `prod_id`, `prod_name`, `prod_price`, `prod_qty`, `order_status`, `created_at`) VALUES
('1686d87f80', 'DHCR-4097', '1fc1f694985d', 'Jane Doe', '930d6354a3', 'Test Product', '340', '3', 'Paid', '2023-12-13 04:58:12.020541'),
('1982dc716a', 'HVPJ-1093', '27e4a5bc74c2', 'Tammy R. Polley', '930d6354a3', 'Test Product', '340', '2', 'Paid', '2023-12-13 04:55:56.003793'),
('36c6a695c4', 'YQKU-8743', '1fc1f694985d', 'Jane Doe', 'f156e9d8db', 'Chemical', '500', '5', 'Paid', '2023-12-20 04:08:50.971493'),
('4c21338adf', 'QPLC-4230', '1fc1f694985d', 'Jane Doe', '930d6354a3', 'Test Product', '340', '2', 'Paid', '2023-12-13 04:55:19.817000'),
('6482f5bc99', 'NSQW-9708', '06549ea58afd', 'Ana J. Browne', '2943202c94', 'Seological Pipettes 10ml', '700', '8', '', '2024-01-10 07:23:36.115945'),
('64b2b0fb2d', '112', '57c12769679c', 'Thevindu Rathnayaka', '2943202c94', 'Seological Pipettes 10ml', '700', '8', '', '2024-01-10 07:26:46.167459'),
('6acf22215d', 'AGKX-0134', '27e4a5bc74c2', 'Tammy R. Polley', 'f156e9d8db', 'Chemical', '500', '8', 'Paid', '2023-12-19 08:24:38.149483'),
('713993270a', 'PNOU-9543', '1fc1f694985d', 'Jane Doe', 'f156e9d8db', 'Chemical', '500', '3', 'Paid', '2023-12-13 05:13:41.915151'),
('7291cee0a4', 'LZER-3107', '27e4a5bc74c2', 'Tammy R. Polley', '2943202c94', 'Seological Pipettes 10ml', '700', '7', 'Paid', '2023-12-20 04:07:04.493349'),
('818bf2ed40', 'WKQH-9236', '1fc1f694985d', 'Jane Doe', '2943202c94', 'Seological Pipettes 10ml', '700', '8', 'Paid', '2024-01-01 08:28:43.598170'),
('89091b7e6e', 'VBJN-7486', '35135b319ce3', 'Christine Moore', 'de84e7568c', 'Test product for consumable', '987', '3', 'Paid', '2023-12-18 15:09:31.730630'),
('8afb37d5dc', 'FONE-1472', '06549ea58afd', 'Ana J. Browne', '930d6354a3', 'Test Product', '340', '5', 'Paid', '2023-12-13 04:52:23.962192'),
('96fdda1ec0', 'RVUA-3176', '35135b319ce3', 'Christine Moore', '2943202c94', 'Seological Pipettes 10ml', '700', '8', '', '2024-01-02 11:24:23.949546'),
('a6371486fd', 'DTUG-6701', '06549ea58afd', 'Ana J. Browne', '930d6354a3', 'Test Product', '340', '5', 'Paid', '2023-12-13 04:49:08.770460'),
('cb9b3d2904', 'KVXQ-3285', '06549ea58afd', 'Ana J. Browne', 'f156e9d8db', 'Chemical', '500', '3', 'Paid', '2023-12-13 05:14:08.195068'),
('d3c01c5739', 'FXGI-9208', '3859d26cd9a5', 'Louise R. Holloman', '2943202c94', 'Test Product', '600', '8', 'Paid', '2023-12-13 09:23:45.923404'),
('e53ec21208', 'YKLN-7859', '1fc1f694985d', 'Jane Doe', '930d6354a3', 'Test Product', '340', '5', '', '2023-12-13 05:09:37.661708'),
('f8632fc604', 'NVQO-7069', '27e4a5bc74c2', 'Tammy R. Polley', '930d6354a3', 'Test Product', '340', '4', '', '2023-12-13 05:07:56.248142');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_orders2`
--

CREATE TABLE `rpos_orders2` (
  `order_id` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `prod_id` varchar(200) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_price` varchar(200) NOT NULL,
  `prod_qty` varchar(200) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpos_orders2`
--

INSERT INTO `rpos_orders2` (`order_id`, `order_code`, `customer_id`, `customer_name`, `prod_id`, `prod_name`, `prod_price`, `prod_qty`, `order_status`, `created_at`) VALUES
('02de78a645', 'PKTM-8935', '27e4a5bc74c2', 'Tammy R. Polley', '1f56c20f8c', 'Chemical2', '800', '8', 'Paid', '2023-12-14 05:29:24.902884'),
('07a43e6022', 'AXFZ-0624', '9f6378b79283', 'William C. Gallup', '1f56c20f8c', 'Chemical2', '800', '4', '', '2023-12-13 07:33:59.194251'),
('323bac82b2', 'YALD-7840', '35135b319ce3', 'Christine Moore', '1f56c20f8c', 'Chemical2', '800', '8', 'Paid', '2023-12-14 05:23:45.172249'),
('ad30669747', 'NFEO-8623', 'd0ba61555aee', 'Jamie R. Barnes', '0ed3dd8464', 'Chemical Item', '560', '3', '', '2023-12-13 07:35:32.527277'),
('ec6cd62d41', 'HQLG-0954', '1fc1f694985d', 'Jane Doe', '1f56c20f8c', 'Chemical2', '800', '8', 'Paid', '2023-12-14 05:26:05.691539');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_pass_resets`
--

CREATE TABLE `rpos_pass_resets` (
  `reset_id` int(20) NOT NULL,
  `reset_code` varchar(200) NOT NULL,
  `reset_token` varchar(200) NOT NULL,
  `reset_email` varchar(200) NOT NULL,
  `reset_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpos_pass_resets`
--

INSERT INTO `rpos_pass_resets` (`reset_id`, `reset_code`, `reset_token`, `reset_email`, `reset_status`, `created_at`) VALUES
(1, '63KU9QDGSO', '4ac4cee0a94e82a2aedc311617aa437e218bdf68', 'sysadmin@icofee.org', 'Pending', '2020-08-17 15:20:14.318643');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_payments`
--

CREATE TABLE `rpos_payments` (
  `pay_id` varchar(200) NOT NULL,
  `pay_code` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `pay_amt` varchar(200) NOT NULL,
  `pay_method` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpos_payments`
--

INSERT INTO `rpos_payments` (`pay_id`, `pay_code`, `order_code`, `customer_id`, `pay_amt`, `pay_method`, `created_at`) VALUES
('0177c7', 'EU2IQCY8S4', 'HVPJ-1093', '27e4a5bc74c2', '680', 'Consumable', '2023-12-13 04:55:56.000656'),
('235930', 'KHL6OVNMQ9', 'FONE-1472', '06549ea58afd', '1700', 'Consumable', '2023-12-13 04:52:23.959157'),
('23788c', 'VXC6BR7Z38', 'VBJN-7486', '35135b319ce3', '2961', 'Consumables', '2023-12-18 15:09:31.728470'),
('30d173', '74ECUN2LX1', 'FIUR-5079', '734ac04ef00a', '10000', 'Chemical', '2023-12-13 04:45:46.128827'),
('4a5e89', '6K1H4DNZEB', 'AGKX-0134', '27e4a5bc74c2', '4000', 'Chemicals', '2023-12-19 08:24:38.148024'),
('5c598a', '47YXOG8ISQ', 'BGNV-5914', '734ac04ef00a', '3400', 'Chemical', '2023-12-13 04:43:58.445278'),
('5d9245', 'TS1X93OKQ8', 'DTUG-6701', '06549ea58afd', '1700', 'Chemical', '2023-12-13 04:49:08.766672'),
('5f44da', '8KBJUAY76O', 'QPLC-4230', '1fc1f694985d', '680', 'Chemical', '2023-12-13 04:55:19.805396'),
('85ffe1', 'test', 'FXGI-9208', '3859d26cd9a5', '4800', 'Consumable', '2023-12-13 09:23:55.826192'),
('8b147b', 'test', 'YALD-7840', '35135b319ce3', '6400', 'Chemical', '2023-12-14 05:23:59.498266'),
('8f7603', 'test', 'HQLG-0954', '1fc1f694985d', '6400', 'Consumable', '2023-12-14 05:26:05.687835'),
('9e1862', 'NAOH123DFT', 'YQKU-8743', '1fc1f694985d', '2500', 'Consumable', '2023-12-20 04:08:50.970304'),
('a117f2', 'test', 'PKTM-8935', '27e4a5bc74c2', '6400', 'Chemical', '2023-12-14 05:29:24.898859'),
('c8b0c5', 'test', 'YALD-7840', '35135b319ce3', '6400', 'Chemical', '2023-12-14 05:23:45.167619'),
('d3fb90', 'RTYDG4CVB3', 'LZER-3107', '27e4a5bc74c2', '4900', 'Consumable', '2023-12-20 04:07:04.490695'),
('e60cfc', 'hgfdsatyt', 'WKQH-9236', '1fc1f694985d', '5600', 'Consumable', '2024-01-01 08:28:43.597126'),
('f8895e', '7I53B1WAMX', 'YWGZ-1367', '734ac04ef00a', '2720', 'Consumable', '2023-12-13 04:51:18.511565'),
('fa135e', 'BTXZ89S3A5', 'DHCR-4097', '1fc1f694985d', '1020', 'Consumable', '2023-12-13 04:58:12.015641'),
('fa33d4', 'test', 'FXGI-9208', '3859d26cd9a5', '4800', 'Consumable', '2023-12-13 09:23:45.913422');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_products`
--

CREATE TABLE `rpos_products` (
  `prod_id` varchar(200) NOT NULL,
  `prod_code` varchar(200) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_img` varchar(200) NOT NULL,
  `prod_desc` longtext NOT NULL,
  `prod_price` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `prod_location` varchar(250) NOT NULL,
  `prod_Exp_Date` date DEFAULT NULL,
  `prod_GINQty` varchar(250) NOT NULL,
  `prod_GRNQty` varchar(250) NOT NULL,
  `prod_REQty` varchar(250) NOT NULL,
  `prod_GINAmount` int(250) NOT NULL,
  `prod_GRNAmount` int(250) NOT NULL,
  `prod_REAmount` int(250) NOT NULL,
  `prod_qr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpos_products`
--

INSERT INTO `rpos_products` (`prod_id`, `prod_code`, `prod_name`, `prod_img`, `prod_desc`, `prod_price`, `created_at`, `prod_location`, `prod_Exp_Date`, `prod_GINQty`, `prod_GRNQty`, `prod_REQty`, `prod_GINAmount`, `prod_GRNAmount`, `prod_REAmount`, `prod_qr`) VALUES
('2943202c94', 'YFZS-1524', 'Seological Pipettes 10ml', '1.png', 'Seological Pipettes 10ml', '700', '2024-01-10 07:39:37.296695', 'CH21', '2023-12-29', '43', '47', '-4', -2800, 32900, -2800, '1.png'),
('2a1b87b7d2', 'XBDU-0248', 'Sharp bins', '16.jpg', 'Sharp bins', '2500', '2023-12-22 01:47:07.703537', 'SLIBTEC', '2024-01-24', '10', '0', '10', 25000, 0, 25000, '2.png'),
('3edf10bb4b', 'TQDI-9175', 'Motor & Pestle', '17.jpg', 'Motor & Pestle', '2000', '2023-12-22 01:47:54.759669', 'SLIBTEC', '2024-02-23', '12', '0', '12', 24000, 0, 24000, '3.png'),
('7693630c9c', 'LOBS-0837', 'Lab Coats -Small ', '4.jpeg', 'Lab Coats -Small ', '340', '2023-12-22 01:50:56.137995', 'CH23', '2023-12-30', '89', '2', '87', 0, 0, 0, '4.png'),
('930d6354a3', 'EZWI-9156', 'Glove Box /100pcs', '14.jpg', 'Glove Box /100pcs', '500', '2023-12-21 03:34:37.486867', 'CH21', '2023-12-28', '34', '26', '8', 4000, 13000, 4000, ''),
('b935dade63', 'JGNH-7164', 'Lab Gown (nos)', '15.jpg', 'Lab Gown (nos)', '4000', '2023-12-21 03:36:54.412995', 'SLIBTEC', '2023-12-25', '30', '0', '30', 120000, 0, 120000, ''),
('de84e7568c', 'SWFV-3105', 'Face Mask KN 95', '5.jpg', 'Face Mask KN 95', '200', '2023-12-21 03:35:05.729224', 'CH21', '2023-12-27', '56', '3', '53', 10600, 600, 10600, ''),
('f156e9d8db', 'UZOH-9172', 'Cool Box', '6.jpg', 'Cool Box', '3500', '2023-12-21 03:35:30.172110', 'CH23', '2024-01-12', '45', '19', '26', 91000, 66500, 91000, '');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_staff`
--

CREATE TABLE `rpos_staff` (
  `staff_id` int(20) NOT NULL,
  `staff_name` varchar(200) NOT NULL,
  `staff_number` varchar(200) NOT NULL,
  `staff_email` varchar(200) NOT NULL,
  `staff_password` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpos_staff`
--

INSERT INTO `rpos_staff` (`staff_id`, `staff_name`, `staff_number`, `staff_email`, `staff_password`, `created_at`) VALUES
(2, 'Cashier Trevor', 'QEUY-9042', 'cashier@mail.com', '903b21879b4a60fc9103c3334e4f6f62cf6c3a2d', '2022-09-04 16:11:30.581882');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id` int(11) NOT NULL,
  `other_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `district` varchar(50) NOT NULL,
  `profile_image_path` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `other_name`, `email`, `nationality`, `civil_status`, `religion`, `blood_group`, `district`, `profile_image_path`) VALUES
(1, 'w', 'slitems12@gmail.com', 'india', 'married', 'buddhist', 'o+', 'colombo', ''),
(2, 'w', 'slitems12@gmail.com', 'india', 'married', 'buddhist', 'o+', 'colombo', ''),
(3, 'w', 'slitems12@gmail.com', 'srilanka', 'married', 'buddhist', 'o+', 'colombo', ''),
(4, 'r', 'slitems12@gmail.com', 'srilanka', 'married', 'muslim', 'ab', 'matara', ''),
(5, 'r', 'slitems12@gmail.com', 'srilanka', 'married', 'muslim', 'ab', 'matara', ''),
(6, 'r', 'slitems12@gmail.com', 'srilanka', 'married', 'muslim', 'ab', 'matara', ''),
(7, 'p', 'slitems12@gmail.com', 'srilanka', 'married', 'buddhist', 'ab', 'matara', ''),
(8, 'w', 'slitems12@gmail.com', 'srilanka', 'married', 'buddhist', 'o+', 'colombo', ''),
(9, 'dd', 'ddd@gmal.com', 'srilanka', 'married', 'buddhist', 'o+', 'colombo', 0x746f70706e672e636f6d2d676f6c642d6c696e65732d7365616d6c6573732d7061747465726e2d373639783739342e706e67),
(10, 'l', 'llll@gmail.com', 'india', 'unmarried', 'tamil', 'ab', 'matara', 0x576861747341707020496d61676520323032332d31322d32392061742031322e31362e30355f64383862343263642e6a7067),
(11, 'w', 'slitems12@gmail.com', 'srilanka', 'unmarried', 'tamil', 'o-', 'kalutara', 0x746f70706e672e636f6d2d646f776e6c6f61642d7472616e73706172656e742d676f6c64656e2d747265652d6465636f726174696f6e2d706e672d7472616e73706172656e742d6368726973746d61732d6465636f726174696f6e732d333537783630312e706e67),
(12, 't', 'uuu@gmail.com', 'srilanka', 'unmarried', 'muslim', 'ab', 'matara', 0x446f776e6c6f61642046616365626f6f6b2c20496e7374616772616d2c20547769747465722c20596f75747562652c2057686174734170702c2044726962626c652c2054696b746f6b2c204c696e6b6564696e2c20476f6f676c6520706c75732c20476f6f676c65202d20636f6c6c656374696f6e206f6620706f70756c617220736f6369616c206d656469612069636f6e732e6a706567),
(13, 'w', 'slitems12@gmail.com', 'india', 'married', 'tamil', 'ab', 'colombo', 0x746f70706e672e636f6d2d676f6c642d6c696e65732d7365616d6c6573732d7061747465726e2d373639783739342e706e67),
(14, 'wwww', 'slitems12@gmail.com', 'srilanka', 'unmarried', 'muslim', 'o-', 'matara', 0x576861747341707020496d61676520323032332d31322d32392061742031322e31362e30355f64383862343263642e6a7067),
(15, 'dd', 'slitems12@gmail.com', 'india', 'married', 'buddhist', 'o+', 'matara', 0x576861747341707020496d61676520323032332d31322d32392061742031322e31362e30355f64383862343263642e6a7067);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_profiles`
--
ALTER TABLE `employee_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `rpos_admin`
--
ALTER TABLE `rpos_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `rpos_chemicals`
--
ALTER TABLE `rpos_chemicals`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `rpos_customers`
--
ALTER TABLE `rpos_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `rpos_hr`
--
ALTER TABLE `rpos_hr`
  ADD PRIMARY KEY (`hrd_id`);

--
-- Indexes for table `rpos_orders`
--
ALTER TABLE `rpos_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `CustomerOrder` (`customer_id`),
  ADD KEY `ProductOrder` (`prod_id`);

--
-- Indexes for table `rpos_orders2`
--
ALTER TABLE `rpos_orders2`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `CustomerOrder2` (`customer_id`),
  ADD KEY `ProductOrder2` (`prod_id`);

--
-- Indexes for table `rpos_pass_resets`
--
ALTER TABLE `rpos_pass_resets`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indexes for table `rpos_payments`
--
ALTER TABLE `rpos_payments`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `order` (`order_code`);

--
-- Indexes for table `rpos_products`
--
ALTER TABLE `rpos_products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `rpos_staff`
--
ALTER TABLE `rpos_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_profiles`
--
ALTER TABLE `employee_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `leave_request`
--
ALTER TABLE `leave_request`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `rpos_hr`
--
ALTER TABLE `rpos_hr`
  MODIFY `hrd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rpos_pass_resets`
--
ALTER TABLE `rpos_pass_resets`
  MODIFY `reset_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rpos_staff`
--
ALTER TABLE `rpos_staff`
  MODIFY `staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rpos_orders`
--
ALTER TABLE `rpos_orders`
  ADD CONSTRAINT `CustomerOrder` FOREIGN KEY (`customer_id`) REFERENCES `rpos_customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ProductOrder` FOREIGN KEY (`prod_id`) REFERENCES `rpos_products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rpos_orders2`
--
ALTER TABLE `rpos_orders2`
  ADD CONSTRAINT `CustomerOrder2` FOREIGN KEY (`customer_id`) REFERENCES `rpos_customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ProductOrder2` FOREIGN KEY (`prod_id`) REFERENCES `rpos_chemicals` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
