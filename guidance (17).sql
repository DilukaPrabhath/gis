-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 10:44 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guidance`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` int(10) UNSIGNED NOT NULL,
  `ac_or_ex` smallint(6) NOT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stu_id` int(11) NOT NULL,
  `ins_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `ac_or_ex`, `sub_id`, `title`, `discription`, `stu_id`, `ins_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'trt', 'rgr', 1, 1, '2022-01-09 18:03:36', '2022-01-09 18:03:36'),
(2, 2, NULL, '100 X 4  relay First place', 'Sport meet 2021 Deera house', 1, 1, '2022-01-09 23:43:11', '2022-01-09 23:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `activity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `activity`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cricket', '1200.00', 1, '2021-11-23 01:32:43', '2021-11-23 02:20:40'),
(2, 'Basket Ball', '1500.00', 1, '2021-11-23 01:36:09', '2021-12-08 01:12:19'),
(3, 'Net Ball', '1000.00', 1, '2021-11-23 01:42:36', '2021-11-23 01:42:36'),
(6, 'Swimming', '1000.00', 1, '2021-11-23 05:44:33', '2021-12-08 01:13:42'),
(7, 'Chess', '1500.00', 1, '2021-12-08 01:13:55', '2021-12-08 01:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `activity_fee_payments`
--

CREATE TABLE `activity_fee_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `stu_num` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rec_num` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inst_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_fee_payments`
--

INSERT INTO `activity_fee_payments` (`id`, `price`, `activity_id`, `stu_num`, `rec_num`, `inst_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '1500.00', 2, 'GIS/2021/1/007', 'ACT/202112/0001', 1, NULL, 1, '2021-12-19 12:44:00', '2021-12-19 12:44:00'),
(2, '1200.00', 1, 'GIS/2021/01/006', 'ACT/202112/0002', 1, NULL, 1, '2021-12-23 02:36:01', '2021-12-23 02:36:01'),
(3, '1200.00', 1, 'GIS/2021/1/007', 'ACT/202112/0003', 1, NULL, 1, '2021-12-23 02:37:55', '2021-12-23 02:37:55'),
(4, '1200.00', 1, 'GIS/2021/01/006', 'ACT/202112/0004', 1, NULL, 1, '2021-12-23 03:08:09', '2021-12-23 03:08:09'),
(5, '1200.00', 1, 'GIS/2021/01/006', 'ACT/202112/0005', 1, NULL, 1, '2021-12-23 03:10:55', '2021-12-23 03:10:55'),
(6, '1200.00', 1, 'GIS/2021/01/006', 'ACT/202112/0006', 1, NULL, 1, '2021-12-23 03:11:37', '2021-12-23 03:11:37'),
(7, '1500.00', 2, 'GIS/2021/0/0001', 'ACT/202112/0007', 1, NULL, 1, '2021-12-23 03:13:36', '2021-12-23 03:13:36'),
(8, '1500.00', 2, 'GIS/2021/0/0001', 'ACT/202112/0008', 1, NULL, 1, '2021-12-23 03:17:50', '2021-12-23 03:17:50'),
(9, '1500.00', 2, 'GIS/2021/0/0001', 'ACT/202112/0009', 1, NULL, 1, '2021-12-23 03:24:04', '2021-12-23 03:24:04'),
(10, '1200.00', 1, 'GIS/2021/01/007', 'ACT/202112/0010', 1, NULL, 1, '2021-12-23 03:35:29', '2021-12-23 03:35:29'),
(11, '1200.00', 1, 'GIS/2021/01/007', 'ACT/202112/0011', 1, NULL, 1, '2021-12-23 03:37:49', '2021-12-23 03:37:49'),
(12, '1200.00', 1, 'GIS/2021/0/0001', 'ACT/202112/0012', 1, NULL, 1, '2021-12-23 05:26:18', '2021-12-23 05:26:18'),
(13, '1500.00', 7, 'GIS/2021/0/0001', 'ACT/202112/0013', 1, NULL, 1, '2021-12-23 05:30:11', '2021-12-23 05:30:11'),
(14, '1500.00', 2, 'GIS/2021/0/0001', 'ACT/202112/0014', 1, NULL, 1, '2021-12-23 05:33:03', '2021-12-23 05:33:03'),
(15, '1500.00', 2, 'GIS/2021/0/0001', 'ACT/202112/0015', 1, NULL, 1, '2021-12-23 05:40:05', '2021-12-23 05:40:05'),
(16, '1500.00', 2, 'GIS/2021/01/007', 'ACT/202112/0016', 1, NULL, 1, '2021-12-24 10:40:21', '2021-12-24 10:40:21'),
(17, '1500.00', 2, 'GIS/2021/01/006', 'ACT/202112/0017', 1, NULL, 1, '2021-12-24 10:40:37', '2021-12-24 10:40:37'),
(18, '1500.00', 2, 'GIS/2021/01/006', 'ACT/202112/0018', 1, NULL, 1, '2021-12-24 10:42:49', '2021-12-24 10:42:49'),
(19, '1500.00', 2, 'GIS/2021/01/006', 'ACT/202112/0019', 1, NULL, 1, '2021-12-24 10:43:18', '2021-12-24 10:43:18'),
(20, '1200.00', 1, 'GIS/2021/01/006', 'ACT/202112/0020', 1, NULL, 1, '2021-12-28 02:40:09', '2021-12-28 02:40:09'),
(21, '1200.00', 1, 'GIS/2022/02/001', 'ACT/202201/0001', 7, 1, 1, '2022-01-23 12:58:44', '2022-01-23 12:58:44'),
(22, '1200.00', 1, 'GIS/2022/02/001', 'ACT/202202/0001', 7, 1, 1, '2022-02-20 09:06:14', '2022-02-20 09:06:14'),
(23, '1200.00', 1, 'NCC/2022/0001', 'ACT/202202/0001', 7, 1, 1, '2022-02-21 00:42:37', '2022-02-21 00:42:37'),
(24, '1500.00', 2, 'NCC/2022/0001', 'ACT/202202/0001', 7, 1, 1, '2022-02-21 00:43:17', '2022-02-21 00:43:17'),
(25, '1000.00', 3, 'NCC/2022/0001', 'ACT/202202/0001', 7, 1, 1, '2022-02-21 00:50:43', '2022-02-21 00:50:43'),
(26, '1000.00', 6, 'NCC/2022/0001', 'ACT/202202/0002', 7, 1, 1, '2022-02-21 00:53:41', '2022-02-21 00:53:41'),
(27, '1500.00', 7, 'NCC/2022/0001', 'ACT/202202/0003', 7, 1, 1, '2022-02-21 01:31:24', '2022-02-21 01:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `activity_payments`
--

CREATE TABLE `activity_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `stu_id` int(11) NOT NULL,
  `act_id` int(11) NOT NULL,
  `act_price` decimal(5,2) NOT NULL,
  `recipt_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admitions`
--

CREATE TABLE `admitions` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_sid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipt_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(9,2) DEFAULT NULL,
  `school_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admitions`
--

INSERT INTO `admitions` (`id`, `student_sid`, `recipt_no`, `price`, `school_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 'GIS/2022/02/001', 'AD/202202/0001', '1200.00', 7, 1, 1, '2022-02-20 12:08:18', '2022-02-20 12:08:18'),
(4, 'GIS/2022/02/001', 'AD/202202/0001', '1233.00', 7, 1, 1, '2022-02-20 12:08:42', '2022-02-20 12:08:42'),
(5, 'GIS/2022/01/002', 'ADM/202202/0001', '25000.00', 7, 1, 1, '2022-02-20 12:23:40', '2022-02-20 12:23:40'),
(6, 'GIS/2022/01/003', 'ADM/202202/0001', '30000.00', 7, 1, 1, '2022-02-20 12:24:08', '2022-02-20 12:24:08'),
(7, 'GIS/2022/01/002', 'ADM/202202/0001', '333.00', 7, 1, 1, '2022-02-20 12:24:52', '2022-02-20 12:24:52'),
(8, 'GIS/2022/01/004', 'ADM/202202/0002', '4333.00', 7, 1, 1, '2022-02-20 12:26:54', '2022-02-20 12:26:54'),
(9, 'GIS/2022/02/001', 'ADM/202202/0003', '20000.00', 1, 2, 1, '2022-02-21 03:21:00', '2022-02-21 03:21:00'),
(10, 'GIS/2022/01/003', 'ADM/202202/0004', '30000.00', 1, 2, 1, '2022-02-21 03:21:37', '2022-02-21 03:21:37'),
(11, 'GIS/2022/02/001', 'ADM/202202/0005', '2348.00', 1, 4, 1, '2022-02-21 03:52:24', '2022-02-21 03:52:24'),
(12, 'GIS/2022/02/001', 'ADM/202202/0006', '60255.00', 1, 5, 1, '2022-02-21 04:49:12', '2022-02-21 04:49:12'),
(13, 'GIS/2022/02/001', 'ADM/202202/0007', '25000.00', 7, 6, 1, '2022-02-21 05:36:00', '2022-02-21 05:36:00'),
(14, 'GIS/2022/02/001', 'ADM/202202/0008', '254777.00', 6, 7, 1, '2022-02-22 01:44:23', '2022-02-22 01:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `application_pays`
--

CREATE TABLE `application_pays` (
  `id` int(10) UNSIGNED NOT NULL,
  `inq_id` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `institute_id` int(11) DEFAULT NULL,
  `slip_num` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_pays`
--

INSERT INTO `application_pays` (`id`, `inq_id`, `price`, `institute_id`, `slip_num`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(10, 'IQ/202201/0008', '300.00', 1, 'RE/202201/0004', NULL, 1, '2022-01-05 03:36:42', '2022-01-05 03:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sampath Bank', 1, '2021-11-26 04:10:56', '2021-11-26 04:10:56'),
(2, 'Peoples Bank', 1, '2021-11-26 04:11:28', '2021-11-26 04:34:00'),
(3, 'Nation Trust', 2, '2021-12-08 02:16:40', '2021-12-08 02:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `class_fee_payments`
--

CREATE TABLE `class_fee_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `recipt_id` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stu_num` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(9,2) NOT NULL,
  `intrest` int(11) NOT NULL,
  `sub_total` decimal(8,2) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `institute_id` int(11) DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `ref_num` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slip_img` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_fee_payments`
--

INSERT INTO `class_fee_payments` (`id`, `recipt_id`, `stu_num`, `price`, `intrest`, `sub_total`, `payment_type`, `institute_id`, `pay_date`, `ref_num`, `slip_img`, `user_id`, `created_at`, `updated_at`) VALUES
(22, 'Fee/202202/0001', 'NCC/2022/0001', '1000.00', 0, '1000.00', 1, 7, NULL, NULL, NULL, 1, '2022-02-14 06:26:53', '2022-02-14 06:26:53'),
(23, 'Fee/202202/0002', 'NCC/2022/0001', '1000.00', 0, '1000.00', 1, 7, NULL, NULL, NULL, 1, '2022-02-14 06:27:47', '2022-02-14 06:27:47'),
(24, 'Fee/202202/0003', 'NCC/2022/0001', '1000.00', 0, '1000.00', 1, 7, NULL, NULL, NULL, 1, '2022-02-15 00:11:41', '2022-02-15 00:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stu_id` int(11) NOT NULL,
  `ins_id` int(11) NOT NULL,
  `outcome` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `title`, `discription`, `stu_id`, `ins_id`, `outcome`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Struggle with boys', 'trow a stick at student and wounded', 1, 1, NULL, 1, '2022-01-10 00:54:04', '2022-01-10 00:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `ins_id` int(11) NOT NULL,
  `event` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `discription` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `ins_id`, `event`, `venue`, `date`, `time`, `discription`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Event Ali Baba saha Horu 40', 'Main hale', '2021-11-29', '12:30:00', 'Consert Grade 1', 1, '2021-11-24 01:24:13', '2021-11-24 04:26:48'),
(5, 1, 'Event Hunu wate', 'dd', '2021-12-02', '18:40:00', 'dd', 1, '2021-11-25 03:36:57', '2021-11-25 03:36:57'),
(6, 6, 'Event Nadagam karayo', 'Main hall', '2022-01-07', '09:30:00', 'bla bla ...', 3, '2021-12-08 01:22:51', '2021-12-08 01:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `event_pays`
--

CREATE TABLE `event_pays` (
  `id` int(10) UNSIGNED NOT NULL,
  `pri_1` decimal(5,2) NOT NULL,
  `stu_id` int(10) UNSIGNED NOT NULL,
  `evt_id` int(10) UNSIGNED NOT NULL,
  `tic_typ_id` int(10) UNSIGNED NOT NULL,
  `tic_count` int(11) NOT NULL,
  `ins_id` int(10) UNSIGNED NOT NULL,
  `tot_price` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_tickets`
--

CREATE TABLE `event_tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `evt_id` int(10) UNSIGNED NOT NULL,
  `ticket_category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `max_count` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_tickets`
--

INSERT INTO `event_tickets` (`id`, `evt_id`, `ticket_category`, `price`, `max_count`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gold', '1000.00', 100, 1, NULL, '2021-12-08 01:24:52'),
(2, 1, 'Silver', '500.00', 22, 1, '2021-11-25 22:47:50', '2021-11-25 22:47:50'),
(3, 1, 'Bronse', '250.00', 1, 3, '2021-11-25 22:49:12', '2021-12-08 01:40:56'),
(4, 5, 'Platnem', '23000.00', 100, 1, '2021-11-25 22:53:20', '2021-11-25 22:53:20'),
(5, 5, 'ccc', '1222.00', 100, 1, NULL, NULL),
(6, 6, 'Gold', '1000.00', 100, 1, '2021-11-26 00:11:42', '2021-12-08 01:41:37'),
(7, 6, 'Silver', '750.00', 100, 1, '2021-12-08 01:41:59', '2021-12-08 01:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `grade` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nur_or_sch` int(11) DEFAULT NULL COMMENT '1 - school / 2 - nursary',
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade`, `nur_or_sch`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Grade 01', 1, 1, NULL, NULL),
(2, 'Grade 02', 1, 1, NULL, NULL),
(3, 'Grade 03', 1, 1, NULL, NULL),
(4, 'Grade 04', 1, 1, NULL, NULL),
(5, 'Grade 05', 1, 1, NULL, NULL),
(6, 'Grade 06', 1, 1, NULL, NULL),
(7, 'Grade 07', 1, 1, NULL, NULL),
(8, 'Grade 08', 1, 1, NULL, NULL),
(9, 'Grade 09', 1, 1, NULL, NULL),
(10, 'Grade 10', 1, 1, NULL, NULL),
(11, 'Grade 11', 1, 1, NULL, NULL),
(12, 'Grade 12', 1, 1, '2022-01-07 09:20:51', '2022-01-07 09:20:51'),
(13, 'Grade 13', 1, 1, '2022-01-07 09:21:18', '2022-01-07 09:21:18'),
(14, 'Play Group', 2, 1, NULL, NULL),
(16, 'Lower Group', 2, 1, NULL, NULL),
(17, 'Upper Group', 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grad_subjects`
--

CREATE TABLE `grad_subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `ins_id` int(11) NOT NULL,
  `syl_id` int(11) NOT NULL,
  `grd_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

CREATE TABLE `institutes` (
  `id` int(10) UNSIGNED NOT NULL,
  `institute_name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_2` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_or_sch` smallint(6) NOT NULL COMMENT '1 - pre school / 2 - school',
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institutes`
--

INSERT INTO `institutes` (`id`, `institute_name`, `code`, `contact_number`, `address_line_1`, `address_line_2`, `email`, `city`, `pre_or_sch`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Institute 12', NULL, '0110668361', 'test address line 1', 'test address line 2', 'institute@co.com', 'Palawatta', 2, 1, '2021-11-22 03:36:24', '2022-01-04 23:59:55'),
(2, 'Institute 2', NULL, '0770669785', 'Address Line 1', 'Address Line 2', 'institute2@in.com', 'Battaramulla', 2, 1, '2021-11-22 03:42:55', '2021-12-08 01:17:46'),
(6, 'Institute 3', 'IN3', '0110668362', 'Address Line 1', 'Address Line 2', 'institute3@go.com', 'Kottawa', 1, 1, '2021-12-08 01:19:06', '2022-01-09 16:43:08'),
(7, 'Nalanda Central Collage', 'NCC', '0110668974', 'Veyangoda road,', NULL, 'nalandacentralcollage@gmail.com', 'Minuwangoda', 1, 1, '2022-01-06 01:18:00', '2022-01-06 01:18:00'),
(8, 'Bandaranayake Collage', '', '0113668754', 'Gampaha', NULL, 'bcc@gmail.com', 'Gampaha', 2, 1, '2022-01-06 01:49:41', '2022-01-06 04:56:58'),
(9, 'Rathnawali Balika Vidyalaya', 'RBV', '0112547892', 'sa', 'sa', 'rbv@n.n', 'Gampaha', 1, 1, '2022-01-06 01:50:46', '2022-01-06 01:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `inst_class_fees`
--

CREATE TABLE `inst_class_fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `ins_id` int(11) NOT NULL,
  `grd_id` int(11) NOT NULL,
  `fee` decimal(9,2) NOT NULL,
  `syl_id` int(11) DEFAULT NULL,
  `year` year(4) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inst_class_fees`
--

INSERT INTO `inst_class_fees` (`id`, `ins_id`, `grd_id`, `fee`, `syl_id`, `year`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 1, '25000.00', 1, 2021, 1, '2021-11-29 03:19:04', '2021-12-08 02:04:26'),
(4, 2, 1, '20000.00', 2, 2021, 1, '2021-11-29 03:19:34', '2021-12-08 02:04:44'),
(12, 1, 1, '25000.00', 1, 2022, 1, '2021-11-29 05:52:25', '2021-12-08 02:09:51'),
(14, 2, 2, '2000.00', 1, 2021, 1, '2021-11-30 12:11:00', '2021-11-30 12:11:00'),
(18, 1, 5, '25000.00', 2, 2021, 1, '2021-12-08 01:45:21', '2021-12-08 01:45:21'),
(19, 2, 2, '50000.00', 2, 2021, 1, '2021-12-08 01:46:43', '2021-12-08 01:46:43'),
(20, 2, 3, '50000.00', 1, 2021, 1, '2021-12-08 01:51:56', '2021-12-08 01:51:56'),
(21, 2, 3, '55000.00', 2, 2021, 1, '2021-12-08 01:52:13', '2021-12-08 01:52:13'),
(22, 2, 4, '55000.00', 1, 2021, 1, '2021-12-08 01:52:36', '2021-12-08 01:52:36'),
(23, 2, 4, '57000.00', 2, 2021, 1, '2021-12-08 01:53:31', '2021-12-08 01:53:31'),
(24, 2, 5, '58000.00', 1, 2021, 1, '2021-12-08 01:53:57', '2021-12-08 01:53:57'),
(25, 6, 0, '2000.00', NULL, 2021, 1, '2021-12-08 02:08:40', '2021-12-08 02:08:40'),
(26, 1, 1, '20000.00', 2, 2022, 1, '2022-01-05 03:21:07', '2022-01-05 03:21:07'),
(27, 1, 2, '20000.00', 1, 2022, 1, '2022-01-05 03:21:29', '2022-01-05 03:21:29'),
(28, 1, 2, '20000.00', 2, 2022, 1, '2022-01-05 03:21:51', '2022-01-05 03:21:51'),
(29, 6, 14, '34000.00', 1, 2022, 1, '2022-01-09 11:12:49', '2022-01-09 11:12:49'),
(30, 6, 16, '34000.00', 1, 2022, 1, '2022-01-09 11:13:31', '2022-01-09 11:13:31'),
(31, 6, 14, '380000.00', 2, 2022, 1, '2022-01-09 11:18:29', '2022-01-09 11:18:29'),
(32, 8, 13, '35000.00', 2, 2022, 1, '2022-01-27 01:55:04', '2022-01-27 01:55:04'),
(33, 8, 13, '2000.00', 1, 2022, 1, '2022-02-15 00:14:52', '2022-02-15 00:14:52'),
(34, 8, 12, '2500.00', 1, 2022, 1, '2022-02-15 00:15:20', '2022-02-15 00:15:20'),
(35, 8, 12, '12000.00', 2, 2022, 1, '2022-02-15 00:15:40', '2022-02-15 00:15:40'),
(36, 8, 1, '1111.00', 1, 2022, 1, '2022-02-15 00:21:29', '2022-02-15 00:21:29'),
(37, 7, 14, '2222.00', 1, 2022, 1, '2022-02-15 00:22:22', '2022-02-15 00:22:22'),
(38, 7, 14, '12222.00', 2, 2022, 1, '2022-02-15 00:22:40', '2022-02-15 00:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_06_17_101534_create_institutes_table', 1),
(4, '2021_07_03_061822_create_users_table', 1),
(5, '2021_11_17_101530_create_banks_table', 1),
(6, '2021_11_17_101531_create_subjects_table', 1),
(7, '2021_11_17_101532_create_grades_table', 1),
(8, '2021_11_17_101533_create_syllabi_table', 1),
(9, '2021_11_17_101544_create_inst_class_fees_table', 1),
(10, '2021_11_17_101545_create_events_table', 1),
(11, '2021_11_17_101546_create_event_tickets_table', 1),
(12, '2021_11_17_101547_create_event_pays_table', 1),
(13, '2021_11_17_101548_create_activities_table', 1),
(14, '2021_11_17_101549_create_activity_payments_table', 1),
(15, '2021_11_17_102045_create_achievements_table', 1),
(16, '2021_11_17_102402_create_complaints_table', 1),
(17, '2021_11_18_090933_create_grad_subjects_table', 1),
(18, '2021_11_25_045720_create_tem_tbls_table', 1),
(23, '2021_11_30_103042_create_students_table', 2),
(24, '2021_11_30_103226_create_parentms_table', 2),
(25, '2021_12_14_040946_create_siblins_table', 3),
(26, '2021_12_14_200540_create_primay_students_table', 4),
(28, '2021_12_16_054640_create_application_pays_table', 5),
(29, '2021_12_17_070446_create_activity_fee_payments_table', 6),
(31, '2021_12_25_074804_create_class_fee_payments_table', 7),
(32, '2022_01_01_045648_create_profile_images_table', 8),
(33, '2022_01_01_162610_create_user_roles_table', 9),
(34, '2022_01_03_082530_create_scholarships_table', 10),
(35, '2022_01_23_160117_create_student_event_images_table', 11),
(36, '2022_02_18_062341_create_admitions_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `parentms`
--

CREATE TABLE `parentms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_nic` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_mobile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_work_address` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_ocupation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fa_or_mom` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parentms`
--

INSERT INTO `parentms` (`id`, `parent_nic`, `parent_name`, `parent_mobile`, `parent_email`, `parent_work_address`, `parent_ocupation`, `fa_or_mom`, `created_at`, `updated_at`) VALUES
(20, '932784742v', ' Dewappriya', '0714732574', 'dilukadewappriya@gmail.com', 'govi', 'pention', 1, '2021-12-14 01:56:10', '2021-12-14 01:56:10'),
(21, '957845214v', 'Sriyani Weerasinhe', '0784553245', 'e2042002@bit.mrt.ac.lk', 'kotte', 'nur', 2, '2021-12-14 01:56:10', '2021-12-14 01:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `primay_students`
--

CREATE TABLE `primay_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_full_name` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nwi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inq_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inq_type` int(11) NOT NULL,
  `inq_status` int(11) NOT NULL,
  `stu_status` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `emergency_contact_nic` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact_relationship` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interview_status` int(11) DEFAULT NULL,
  `re_interview_apply` int(11) DEFAULT NULL,
  `application_status` int(11) DEFAULT NULL,
  `resipt_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resipt_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interview_type` int(11) DEFAULT NULL,
  `student_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `pre_sc_att` int(11) DEFAULT NULL,
  `reg_typ` int(11) DEFAULT NULL,
  `schoolership_apply` int(11) DEFAULT NULL,
  `schoolership_resipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_id_fee_paid` int(11) DEFAULT NULL,
  `is_id_issue` int(11) DEFAULT NULL,
  `syllubus_type` int(11) DEFAULT NULL,
  `student_id` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade_now` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_images`
--

CREATE TABLE `profile_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `pro_image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stu_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_images`
--

INSERT INTO `profile_images` (`id`, `pro_image`, `stu_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '1639389327.JPG', 12, 1, '2022-01-01 05:08:39', '2022-01-01 05:08:39'),
(2, '1638953688.jpg', 12, 1, '2022-01-01 06:57:12', '2022-01-01 06:57:12'),
(3, NULL, 18, 1, '2022-01-02 13:17:39', '2022-01-02 13:17:39'),
(4, '1639545950.jpg', 17, 1, '2022-01-02 13:25:42', '2022-01-02 13:25:42'),
(5, '1642956629.jpg', 1, 1, '2022-01-23 11:20:29', '2022-01-23 11:20:29'),
(6, NULL, 10, 1, '2022-02-21 00:38:46', '2022-02-21 00:38:46'),
(7, '1645423830.jpg', 8, 1, '2022-02-21 00:40:30', '2022-02-21 00:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `id` int(10) UNSIGNED NOT NULL,
  `st_num` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disc_prtg` double(5,2) DEFAULT NULL,
  `disc_amount` decimal(6,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `scl_shp_typ` int(11) DEFAULT NULL,
  `years_count` int(11) DEFAULT NULL,
  `grd` int(11) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`id`, `st_num`, `disc_prtg`, `disc_amount`, `user_id`, `scl_shp_typ`, `years_count`, `grd`, `note`, `created_at`, `updated_at`) VALUES
(2, 'GIS/2022/02/001', 22.00, NULL, 1, 1, 2, NULL, '222', '2022-01-05 22:48:45', '2022-01-05 22:48:45'),
(3, 'GIS/2022/02/001', NULL, '750.00', 1, 2, 1, NULL, '111', '2022-01-05 23:32:01', '2022-01-05 23:32:01'),
(4, 'GIS/2022/02/001', NULL, '3000.00', 1, 2, 5, NULL, '555', '2022-01-06 00:18:29', '2022-01-06 00:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `siblins`
--

CREATE TABLE `siblins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_id` int(11) NOT NULL,
  `stu_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siblins`
--

INSERT INTO `siblins` (`id`, `s_id`, `stu_id`, `relationship`, `created_at`, `updated_at`) VALUES
(4, 13, 'GIS/2021/01/007', 'gggg', '2021-12-30 10:45:36', '2021-12-30 10:45:36'),
(9, 11, 'GIS/2021/1/0001', 'gg', '2021-12-30 11:02:19', '2021-12-30 11:02:19'),
(10, 19, 'GIS/2022/02/001', 'tyyyyyyyyy', '2022-01-27 02:04:25', '2022-01-27 02:04:25'),
(11, 19, 'GIS/2022/02/001', 'yyyy', '2022-01-27 02:04:25', '2022-01-27 02:04:25'),
(12, 10, 'IS/2022/02/001G', 'gg', '2022-02-21 00:38:46', '2022-02-21 00:38:46'),
(13, 8, 'GIS/2022/02/001', 'gggg', '2022-02-21 00:40:30', '2022-02-21 00:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_full_name` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nwi` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `inq_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `re_ins_id` int(11) DEFAULT NULL,
  `re_grd_id` int(11) DEFAULT NULL,
  `inq_type` int(11) NOT NULL,
  `inq_status` int(11) NOT NULL,
  `stu_status` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `emergency_contact_nic` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact_mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact_relationship` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interview_status` int(11) DEFAULT NULL,
  `re_interview_apply` int(11) DEFAULT NULL,
  `application_status` int(11) DEFAULT NULL,
  `resipt_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resipt_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interview_type` int(11) DEFAULT NULL,
  `student_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `pre_sc_att` int(11) DEFAULT NULL,
  `pre_school_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recod` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_typ` int(11) DEFAULT NULL,
  `scl_po_no` int(11) DEFAULT NULL,
  `religion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schoolership_apply` int(11) DEFAULT NULL,
  `schoolership_resipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_id_fee_paid` int(11) DEFAULT NULL,
  `is_id_issue` int(11) DEFAULT NULL,
  `syllubus_type` int(11) DEFAULT NULL,
  `student_id` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute` int(11) DEFAULT NULL,
  `grade_now` int(11) DEFAULT NULL,
  `stu_img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pamt_typ` int(11) DEFAULT NULL,
  `mom_id` int(11) DEFAULT NULL,
  `fat_id` int(11) DEFAULT NULL,
  `prmy` int(11) DEFAULT NULL,
  `any_medi_con` int(11) DEFAULT NULL,
  `medi_con_det` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_attention` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `have_siblin` int(11) DEFAULT NULL,
  `siblin_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leisure` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whome_les` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_name` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_mobi` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `helthcard` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grade_fee` decimal(9,2) DEFAULT 0.00,
  `due_fee` decimal(9,2) DEFAULT 0.00,
  `total_need_pay` decimal(9,2) DEFAULT 0.00,
  `paid_amount` decimal(9,2) DEFAULT 0.00,
  `intrest` decimal(9,0) DEFAULT 0,
  `payment_cot` decimal(10,2) DEFAULT 0.00,
  `total_nd_pay_cot` decimal(10,2) DEFAULT 0.00,
  `disct_typ` int(11) DEFAULT NULL COMMENT '1 - precentage / 2 -amont',
  `prtg_amount` decimal(9,2) DEFAULT NULL,
  `dis_amount` decimal(9,2) DEFAULT NULL,
  `last_payment_time` timestamp NULL DEFAULT NULL,
  `is_pending_fee` int(11) DEFAULT NULL COMMENT '1 - have pending / 2 - have not pending fee',
  `admition_fee` int(11) DEFAULT NULL COMMENT '1 - paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_full_name`, `nwi`, `dob`, `inq_number`, `re_ins_id`, `re_grd_id`, `inq_type`, `inq_status`, `stu_status`, `gender`, `emergency_contact_nic`, `emergency_contact_name`, `emergency_contact_mobile`, `emergency_contact_relationship`, `interview_status`, `re_interview_apply`, `application_status`, `resipt_number`, `resipt_image`, `interview_type`, `student_image`, `registration_date`, `pre_sc_att`, `pre_school_id`, `recod`, `reg_typ`, `scl_po_no`, `religion`, `nationality`, `address`, `contact_number`, `schoolership_apply`, `schoolership_resipt`, `is_id_fee_paid`, `is_id_issue`, `syllubus_type`, `student_id`, `institute`, `grade_now`, `stu_img`, `pamt_typ`, `mom_id`, `fat_id`, `prmy`, `any_medi_con`, `medi_con_det`, `special_attention`, `have_siblin`, `siblin_details`, `leisure`, `whome_les`, `doc_name`, `doc_mobi`, `doc_address`, `helthcard`, `created_at`, `updated_at`, `grade_fee`, `due_fee`, `total_need_pay`, `paid_amount`, `intrest`, `payment_cot`, `total_nd_pay_cot`, `disct_typ`, `prtg_amount`, `dis_amount`, `last_payment_time`, `is_pending_fee`, `admition_fee`) VALUES
(1, 'Diluka Prabhath', 'D. Prabhath', '2022-01-05', 'IQ/202201/0001', NULL, NULL, 1, 4, 5, 1, '932784742v', 'Dewappriya', '0714732574', 'kkkkkkkk', 1, 2, 1, 'RE/20221/0001', NULL, 1, NULL, '2022-01-05', 1, NULL, NULL, NULL, 1, 'Buddhism', 'Sinhalese', '360/B,Temple rd,Uggalboda Gampaha.', '0770668361', NULL, NULL, 1, 1, 1, 'GIS/2022/02/001', 1, 2, '1642956629.jpg', 1, 21, 20, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-04 23:20:35', '2022-02-20 12:07:39', '7000.00', '-13000.00', '7000.00', '20000.00', '0', '20000.00', '7000.00', 2, NULL, '3000.00', NULL, NULL, 1),
(5, 'f f ereer', 'F. F Ereer', '2022-01-05', 'IQ/202201/0002', NULL, NULL, 2, 3, 5, 1, '932784742v', 'Dewappriya', '0714732574', '99', 1, 1, 1, 'RE/202201/0001', NULL, 1, NULL, '2022-01-07', NULL, NULL, NULL, NULL, 1, 'fddf', 'sdfd', 'dfd', '3333333333', NULL, NULL, 1, 1, NULL, 'NCC/2022/0001', 7, 16, '1641540572.jpg', 1, 21, 20, 1, 2, 'dqw', 'qwdq', 1, 'qwd', 'qd', 'd', NULL, NULL, NULL, NULL, '2022-01-04 23:54:54', '2022-02-15 00:11:41', '100000.00', '64000.00', '100000.00', '36000.00', '0', '36000.00', '100000.00', NULL, NULL, NULL, '2021-09-14 23:24:26', 1, NULL),
(7, 'fff rrgvg', 'F. Rrgvg', '2022-01-06', 'IQ/202201/0004', NULL, NULL, 1, 4, 5, 1, '932784742v', 'Dewappriya', '0714732574', '44', 1, 2, 1, 'RE/20221/0002', NULL, 1, NULL, '2022-01-07', 1, NULL, NULL, NULL, 2, 'r rrrfrfr', 'rfr', 'rfrf', '4444444444', NULL, NULL, 1, 1, 1, 'GIS/2022/01/002', 1, 1, NULL, 1, 21, 20, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 00:32:26', '2022-02-20 12:23:40', '0.00', '0.00', '0.00', '0.00', '0', '0.00', '0.00', NULL, NULL, NULL, '2021-09-14 23:24:26', NULL, 1),
(8, 'ddd ddd ddd ddd', 'D.D. Ddd Ddd', '2022-01-06', 'IQ/202201/0005', NULL, NULL, 1, 4, 5, 1, '932784742v', 'Dewappriya', '0714732574', '99', 1, 1, 1, 'RE/20221/0001', NULL, 1, NULL, '2022-01-05', 2, NULL, NULL, NULL, 1, 'dd', 'dd', 'dd', '1111111111', NULL, NULL, 1, 2, 1, 'GIS/2022/01/001', 2, 1, '1645423830.jpg', 1, 21, 20, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 01:02:13', '2022-02-21 00:40:30', '0.00', '0.00', '0.00', '0.00', '0', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'tgt ttr rtrt', 'T. Ttr Rtrt', '2022-01-05', 'IQ/202201/0006', NULL, NULL, 1, 4, 5, 1, '932784742v', 'Dewappriya', '0714732574', 'vv', 1, 2, 1, '454', NULL, 1, NULL, '2022-01-05', 1, NULL, NULL, NULL, 3, 'rtr', 'trt', 'rttt', '7777777774', NULL, NULL, 1, 1, 1, 'GIS/2022/01/003', 1, 1, NULL, 1, 21, 20, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 01:12:32', '2022-02-20 12:24:08', '0.00', '0.00', '0.00', '0.00', '0', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 1),
(10, 'Tem Uo', 'T. Uo', '2022-01-12', 'IQ/202201/0007', NULL, NULL, 1, 4, 5, 1, '932784742v', 'Dewappriya', '0714732574', '99', 1, 2, 1, 'RE/202201/0003', NULL, 1, NULL, '2022-01-06', 1, NULL, NULL, NULL, 4, 'wqw', 'qwq', 'ww', '1111111111', NULL, NULL, 1, 1, 1, 'GIS/2022/01/004', 1, 1, NULL, 1, 21, 20, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 03:27:44', '2022-02-20 12:26:54', '0.00', '0.00', '0.00', '0.00', '0', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, 1),
(11, 'fvr rew', 'F. Rew', '2021-12-30', 'IQ/202201/0008', NULL, NULL, 2, 4, 5, 1, '932784742v', 'Dewappriya', '0714732574', '99', 1, 2, 1, 'RE/202201/0004', NULL, 1, NULL, '2022-01-06', 1, NULL, NULL, NULL, 5, 'rwr', 'rwwwww', 'rwr', '3333333333', NULL, NULL, 1, 1, 1, 'GIS/2022/01/005', 1, 1, NULL, 1, 21, 20, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 03:36:22', '2022-01-05 03:41:23', '25000.00', '0.00', '25000.00', '0.00', '0', '0.00', '25000.00', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'inqu lamaya', 'I. Lamaya', '2022-01-08', 'IQ/202201/0009', NULL, NULL, 1, 4, 5, 1, '932784742v', 'Dewappriya', '0714732574', '39', 1, 1, 1, 'wqdwq', '1641544828.jpg', 1, NULL, '2022-01-07', NULL, NULL, NULL, NULL, 2, 'dqwdwq', 'qwdd', 'qd', '1111111111', NULL, NULL, 1, 1, NULL, 'NCC/2022/0002', 7, 0, '1641544876.jpg', 1, 21, 20, 1, 1, 'w', 'w', 2, 'w', 'w', 'w', '9', NULL, '9', '9999999999', '2022-01-07 03:10:05', '2022-01-07 03:11:16', '100000.00', '0.00', '100000.00', '0.00', '0', '0.00', '100000.00', NULL, NULL, NULL, '2021-12-14 23:24:26', NULL, NULL),
(13, 'ner stu', 'N. Stu', '2022-01-11', 'IQ/202201/0010', NULL, NULL, 1, 4, 5, 1, '932784742v', 'Dewappriya', '0714732574', 'er', 1, 2, 1, '23232', '1641747250.jpg', 1, NULL, '2022-01-18', NULL, NULL, NULL, NULL, 1, 'rw', 'wre', 'Test Address', '2323232323', NULL, NULL, 1, 1, 1, 'IN3/2022/0003', 6, 17, '1641766297.jpg', 1, 21, 20, 1, 1, 'wr', 'ref', 1, 'e', 'er', 'efe', NULL, NULL, NULL, NULL, '2022-01-09 11:23:23', '2022-01-10 23:42:37', '34000.00', '34000.00', '34000.00', '0.00', '0', '0.00', '34000.00', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'hana zafa', 'H. Zafa', '2019-01-16', 'IQ/202201/0011', NULL, NULL, 1, 4, 5, 1, '932784742v', 'Dewappriya', '0714732574', 'ty', 1, 2, 1, 'ssssssssssss', '1642742985.jpg', 1, NULL, '2022-01-27', NULL, NULL, NULL, NULL, 2, 'muslim', 'muslim', '360/B,Temple road, Uggalboda west,Gampaha.', '0770668361', NULL, NULL, 1, 1, 1, 'IN3/2022/0003', 6, 14, NULL, 1, 21, 20, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, 'y7ug', NULL, '360/B,Temple road, Uggalboda west,Gampaha.', '1111111111', '2022-01-20 23:59:02', '2022-01-26 23:38:57', '34000.00', '34000.00', '34000.00', '0.00', '0', '0.00', '34000.00', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'fssfsf sf  sffsfsfsf', 'F.S.  Sffsfsfsf', '2022-01-13', 'IQ/202201/0012', NULL, NULL, 1, 4, 5, 1, '932784742v', 'Dewappriya', '0714732574', 'zz', 1, 2, 1, 'wqqwrq', '1643260321.JPG', 1, NULL, '2022-01-27', NULL, NULL, NULL, NULL, 3, 'fsf', 'sfs', '360/B,Temple road, Uggalboda west,Gampaha.', '0770668365', NULL, NULL, 1, 1, 1, 'IN3/2022/0003', 6, 16, NULL, 2, 21, 20, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, 'Z', NULL, '360/B,Temple road, Uggalboda west,Gampaha.', '1234567890', '2022-01-26 23:41:40', '2022-01-26 23:45:01', '34000.00', '34000.00', '34000.00', '0.00', '0', '0.00', '34000.00', NULL, NULL, NULL, '2021-12-14 23:24:26', 1, NULL),
(16, 'scs sds', 'S. Sds', '2022-01-13', 'IQ/202201/0013', NULL, NULL, 2, 4, 5, 1, '932784742v', 'Dewappriya', '0714732574', '9', 1, 1, 1, 'scasc', NULL, 1, NULL, '2022-01-27', NULL, NULL, NULL, NULL, 4, 's', 'd', '360/B,Temple road, Uggalboda west,Gampaha.', '0770668366', NULL, NULL, 1, 1, 2, 'IN3/2022/0003', 6, 14, NULL, 1, 21, 20, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, '9', NULL, '9', '9999999999', '2022-01-26 23:51:19', '2022-01-27 00:00:29', '380000.00', '380000.00', '380000.00', '0.00', '0', '0.00', '380000.00', NULL, NULL, NULL, '2021-12-14 23:24:26', 1, NULL),
(17, 'zzzz  zssa', 'Z.  Zssa', '2022-01-28', 'IQ/202201/0014', NULL, NULL, 2, 2, 4, 1, NULL, NULL, NULL, NULL, 1, 1, 1, 'asca', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sca', 'aca', '360/B,Temple road, Uggalboda west,Gampaha.', '0770668361', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-27 00:01:36', '2022-01-27 00:01:48', '0.00', '0.00', '0.00', '0.00', '0', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'dddddddddd ddddddddddddd', 'D. Ddddddddddddd', '2022-01-27', 'IQ/202201/0015', NULL, NULL, 1, 4, 5, 1, '932784742v', 'Dewappriya', '0714732574', 'jn', 1, 1, 1, '78484', NULL, 1, NULL, '2022-01-27', 1, NULL, NULL, NULL, 6, 'jnjn', 'kmm', '360/B,Temple road, Uggalboda west,Gampaha.', '0770668368', NULL, NULL, 1, 1, 1, 'GIS/2022/01/006', 1, 1, NULL, 1, 21, 20, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-27 00:10:31', '2022-01-27 00:13:26', '25000.00', '25000.00', '25000.00', '0.00', '0', '0.00', '25000.00', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'jrrrrrrry tetr treter', 'J. Tetr Treter', '2022-01-27', 'IQ/202201/0016', NULL, NULL, 1, 4, 5, 1, '932784742v', 'Dewappriya', '0714732574', '9', 1, 2, 1, 'ret', NULL, 1, NULL, '2022-01-27', 1, NULL, NULL, NULL, 1, 'rter', 'et', '360/B,Temple road, Uggalboda west,Gampaha.', '0770668361', NULL, NULL, 1, 1, 1, 'GIS/2022/13/001', 8, 13, NULL, 1, 21, 20, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-27 01:53:26', '2022-01-27 02:04:25', '0.00', '0.00', '0.00', '0.00', '0', '0.00', '0.00', NULL, NULL, NULL, '2020-12-14 23:24:26', 2, NULL),
(20, 'sad sasdas', 'S. Sasdas', '2022-02-04', 'IQ/202202/0001', NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ssas', 'assa', '360/B,Temple road, Uggalboda west,Gampaha.', '0770668361', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-02 20:09:53', '2022-02-02 20:09:53', '0.00', '0.00', '0.00', '0.00', '0', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_event_images`
--

CREATE TABLE `student_event_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `stu_id` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_event_images`
--

INSERT INTO `student_event_images` (`id`, `stu_id`, `image`, `event`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, '1642959820.jpg', NULL, 1, '2022-01-23 12:13:40', '2022-01-23 12:13:40'),
(4, 1, '1642959832.jpg', NULL, 1, '2022-01-23 12:13:52', '2022-01-23 12:13:52'),
(5, 1, '1642959861.jpg', NULL, 1, '2022-01-23 12:14:21', '2022-01-23 12:14:21'),
(6, 1, '1642959873.jpg', NULL, 1, '2022-01-23 12:14:33', '2022-01-23 12:14:33'),
(7, 1, '1642959914.jpg', NULL, 1, '2022-01-23 12:15:14', '2022-01-23 12:15:14'),
(8, 1, '1642960113.jpg', NULL, 1, '2022-01-23 12:18:33', '2022-01-23 12:18:33'),
(9, 1, '1642960173.jpg', NULL, 1, '2022-01-23 12:19:33', '2022-01-23 12:19:33'),
(10, 1, '1642960260.jpg', NULL, 1, '2022-01-23 12:21:00', '2022-01-23 12:21:00'),
(11, 1, '1642960287.jpg', NULL, 1, '2022-01-23 12:21:27', '2022-01-23 12:21:27'),
(12, 1, '1642960302.jpg', NULL, 1, '2022-01-23 12:21:42', '2022-01-23 12:21:42'),
(13, 1, '1642960440.jpg', NULL, 1, '2022-01-23 12:24:00', '2022-01-23 12:24:00'),
(14, 1, '1642960486.jpg', NULL, 1, '2022-01-23 12:24:46', '2022-01-23 12:24:46'),
(15, 1, '1642961305.jpg', NULL, 1, '2022-01-23 12:38:25', '2022-01-23 12:38:25'),
(16, 1, '1642961498.jpg', NULL, 1, '2022-01-23 12:41:38', '2022-01-23 12:41:38'),
(17, 1, '1642961524.jpg', NULL, 1, '2022-01-23 12:42:04', '2022-01-23 12:42:04'),
(18, 1, '1642961592.jpg', NULL, 1, '2022-01-23 12:43:12', '2022-01-23 12:43:12'),
(19, 1, '1642961629.jpg', NULL, 1, '2022-01-23 12:43:49', '2022-01-23 12:43:49'),
(20, 1, '1642961649.jpg', NULL, 1, '2022-01-23 12:44:09', '2022-01-23 12:44:09'),
(21, 1, '1642961758.jpg', NULL, 1, '2022-01-23 12:45:58', '2022-01-23 12:45:58'),
(22, 1, '1642961804.jpg', NULL, 1, '2022-01-23 12:46:44', '2022-01-23 12:46:44'),
(23, 1, '1642961823.jpg', NULL, 1, '2022-01-23 12:47:03', '2022-01-23 12:47:03'),
(24, 5, '1643852206.jpg', NULL, 1, '2022-02-02 20:06:46', '2022-02-02 20:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Maths', 1, '2021-11-24 22:22:24', '2021-11-24 23:09:58'),
(2, 'English', 1, '2021-11-25 04:11:33', '2021-12-08 01:20:12'),
(3, 'Sinhala', 1, '2021-12-08 01:20:04', '2021-12-08 01:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `syllabi`
--

CREATE TABLE `syllabi` (
  `id` int(10) UNSIGNED NOT NULL,
  `syllubus` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `syllabi`
--

INSERT INTO `syllabi` (`id`, `syllubus`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Local Syllabus', 1, NULL, NULL),
(2, 'Edexl Syllabus', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tem_tbls`
--

CREATE TABLE `tem_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `temp_id_1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_id_2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `int_1` int(11) DEFAULT NULL,
  `int_2` int(11) DEFAULT NULL,
  `int_3` int(11) DEFAULT NULL,
  `int_4` int(11) DEFAULT NULL,
  `str_1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `str_2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `str_3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `str_4` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dt_1` date DEFAULT NULL,
  `dt_2` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tem_tbls`
--

INSERT INTO `tem_tbls` (`id`, `temp_id_1`, `temp_id_2`, `int_1`, `int_2`, `int_3`, `int_4`, `str_1`, `str_2`, `str_3`, `str_4`, `dt_1`, `dt_2`, `created_at`, `updated_at`) VALUES
(39, 'rh5N8D', 'tKxH7e', 13, NULL, NULL, NULL, NULL, 'GIS/2021/01/006', 'gggg', NULL, NULL, NULL, '2021-12-30 04:32:03', '2021-12-30 04:32:03'),
(40, 'rh5N8D', 'tKxH7e', 13, NULL, NULL, NULL, NULL, 'GIS/2021/01/007', 'gggg', NULL, NULL, NULL, '2021-12-30 04:32:03', '2021-12-30 04:32:03'),
(41, 'Y41N7Y', 'KVUOjp', 13, NULL, NULL, NULL, NULL, 'GIS/2021/01/006', 'gggg', NULL, NULL, NULL, '2021-12-30 08:29:35', '2021-12-30 08:29:35'),
(42, 'Y41N7Y', 'KVUOjp', 13, NULL, NULL, NULL, NULL, 'GIS/2021/01/007', 'gggg', NULL, NULL, NULL, '2021-12-30 08:29:35', '2021-12-30 08:29:35'),
(44, 'pKbm2Y', 'JbAirM', 13, NULL, NULL, NULL, NULL, 'GIS/2021/01/007', 'gggg', NULL, NULL, NULL, '2021-12-30 08:36:26', '2021-12-30 08:36:26'),
(45, 'pKbm2Y', 'JbAirM', 14, NULL, NULL, NULL, NULL, 'GIS/2021/1/0001', 'jjj', NULL, NULL, NULL, '2021-12-30 08:50:39', '2021-12-30 08:50:39'),
(48, 'YDa4JM', 'uQ4LPH', 13, NULL, NULL, NULL, NULL, 'GIS/2021/01/006', 'gggg', NULL, NULL, NULL, '2021-12-30 08:53:43', '2021-12-30 08:53:43'),
(49, 'YDa4JM', 'uQ4LPH', 13, NULL, NULL, NULL, NULL, 'GIS/2021/01/007', 'gggg', NULL, NULL, NULL, '2021-12-30 08:53:43', '2021-12-30 08:53:43'),
(50, 'YDa4JM', 'uQ4LPH', 13, NULL, NULL, NULL, NULL, 'GIS/2021/01/007', 'gggg', NULL, NULL, NULL, '2021-12-30 08:53:43', '2021-12-30 08:53:43'),
(54, 'pIrGLz', 'F3wfzn', 13, NULL, NULL, NULL, NULL, 'GIS/2021/01/007', 'gggg', NULL, NULL, NULL, '2021-12-30 10:54:56', '2021-12-30 10:54:56'),
(57, 'b5o5qy', 'SmXG56', 11, NULL, NULL, NULL, NULL, 'GIS/2021/01/006', 'ggg', NULL, NULL, NULL, '2021-12-30 10:58:28', '2021-12-30 10:58:28'),
(64, '00NREw', 'a28nbt', 11, NULL, NULL, NULL, NULL, 'GIS/2021/1/0001', 'gg', NULL, NULL, NULL, '2021-12-30 11:02:22', '2021-12-30 11:02:22'),
(65, 'DO71wX', 'hhid5M', 11, NULL, NULL, NULL, NULL, 'GIS/2021/1/0001', 'gg', NULL, NULL, NULL, '2021-12-30 19:48:43', '2021-12-30 19:48:43'),
(66, 'MVWGJQ', 'FIDUJc', 11, NULL, NULL, NULL, NULL, 'GIS/2021/1/0001', 'gg', NULL, NULL, NULL, '2021-12-30 19:52:07', '2021-12-30 19:52:07'),
(67, 'hpIhS9', 'mvOhcl', 11, NULL, NULL, NULL, NULL, 'GIS/2021/1/0001', 'gg', NULL, NULL, NULL, '2021-12-30 19:54:36', '2021-12-30 19:54:36'),
(68, '64Gxj5', 'GsXXpv', 11, NULL, NULL, NULL, NULL, 'GIS/2021/1/0001', 'gg', NULL, NULL, NULL, '2021-12-30 21:30:06', '2021-12-30 21:30:06'),
(74, 'RbKJ0G', 'DpUhyH', 8, NULL, NULL, NULL, NULL, 'GIS/2022/02/001', 'gggg', NULL, NULL, NULL, '2022-02-21 00:40:43', '2022-02-21 00:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_role` int(11) NOT NULL,
  `ins_id` int(11) NOT NULL,
  `user_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `nic`, `mobile`, `address`, `email_verified_at`, `password`, `image`, `user_role`, `ins_id`, `user_number`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Diluka', 'admin@gmail.com', '932784742V', '0770668363', '1', NULL, '$2y$10$/Cs2dizErBzPjaFMgFJqfughfenv6XSC6dKZL79QMns10SXXLGcw.', '1641120125.jpg', 1, 7, '1', 1, '', '2021-11-22 06:47:40', '2022-01-18 23:15:04'),
(2, 'Testing User Registar', 'admin2@gmail.com', '932784743V', '0770668362', '1', NULL, '$2y$10$/Cs2dizErBzPjaFMgFJqfughfenv6XSC6dKZL79QMns10SXXLGcw.', '1641120162.jpg', 6, 1, '1', 1, NULL, '2021-11-22 01:20:44', '2022-01-02 05:12:42'),
(4, 'Test Regi User', 'regi@gmail.com', '932787425V', '0770668361', '1', NULL, '$2y$10$/Cs2dizErBzPjaFMgFJqfughfenv6XSC6dKZL79QMns10SXXLGcw.', '1642745235.jpg', 2, 1, '1', 1, NULL, '2022-01-21 00:37:15', '2022-01-21 00:39:57'),
(5, 'Test Depi Regi User', 'depi@gmail.com', '932874584V', '0770668364', '1', NULL, '$2y$10$/Cs2dizErBzPjaFMgFJqfughfenv6XSC6dKZL79QMns10SXXLGcw.', '1642746967.jpg', 3, 1, '1', 1, NULL, '2022-01-21 01:05:55', '2022-01-21 01:06:07'),
(6, 'Test Accu User', 'acc@gmail.com', '888333333V', '0770668365', '1', NULL, '$2y$10$/Cs2dizErBzPjaFMgFJqfughfenv6XSC6dKZL79QMns10SXXLGcw.', '1642747239.jpg', 4, 7, '1', 1, NULL, '2022-01-21 01:10:25', '2022-01-21 01:10:39'),
(7, 'Test DataEntry User', 'data@gmail.com', '932784732V', '0770668366', '1', NULL, '$2y$10$/Cs2dizErBzPjaFMgFJqfughfenv6XSC6dKZL79QMns10SXXLGcw.', '1642747374.png', 5, 6, '1', 1, NULL, '2022-01-21 01:11:57', '2022-01-21 01:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, NULL, NULL),
(2, 'Registar', 1, NULL, NULL),
(3, 'Deputy Registar', 1, NULL, NULL),
(4, 'Accountant', 1, NULL, NULL),
(5, 'Data Entry', 1, NULL, NULL),
(6, 'Super Admin', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_fee_payments`
--
ALTER TABLE `activity_fee_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_payments`
--
ALTER TABLE `activity_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admitions`
--
ALTER TABLE `admitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_pays`
--
ALTER TABLE `application_pays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_fee_payments`
--
ALTER TABLE `class_fee_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_pays`
--
ALTER TABLE `event_pays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_pays_ins_id_foreign` (`ins_id`),
  ADD KEY `event_pays_stu_id_foreign` (`stu_id`),
  ADD KEY `event_pays_evt_id_foreign` (`evt_id`),
  ADD KEY `event_pays_tic_typ_id_foreign` (`tic_typ_id`);

--
-- Indexes for table `event_tickets`
--
ALTER TABLE `event_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_tickets_evt_id_foreign` (`evt_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grad_subjects`
--
ALTER TABLE `grad_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `institutes_contact_number_unique` (`contact_number`);

--
-- Indexes for table `inst_class_fees`
--
ALTER TABLE `inst_class_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parentms`
--
ALTER TABLE `parentms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `primay_students`
--
ALTER TABLE `primay_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_images`
--
ALTER TABLE `profile_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siblins`
--
ALTER TABLE `siblins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_event_images`
--
ALTER TABLE `student_event_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syllabi`
--
ALTER TABLE `syllabi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tem_tbls`
--
ALTER TABLE `tem_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nic_unique` (`nic`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `activity_fee_payments`
--
ALTER TABLE `activity_fee_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `activity_payments`
--
ALTER TABLE `activity_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admitions`
--
ALTER TABLE `admitions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `application_pays`
--
ALTER TABLE `application_pays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class_fee_payments`
--
ALTER TABLE `class_fee_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_pays`
--
ALTER TABLE `event_pays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_tickets`
--
ALTER TABLE `event_tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `grad_subjects`
--
ALTER TABLE `grad_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inst_class_fees`
--
ALTER TABLE `inst_class_fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `parentms`
--
ALTER TABLE `parentms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `primay_students`
--
ALTER TABLE `primay_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_images`
--
ALTER TABLE `profile_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siblins`
--
ALTER TABLE `siblins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `student_event_images`
--
ALTER TABLE `student_event_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `syllabi`
--
ALTER TABLE `syllabi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tem_tbls`
--
ALTER TABLE `tem_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_pays`
--
ALTER TABLE `event_pays`
  ADD CONSTRAINT `event_pays_evt_id_foreign` FOREIGN KEY (`evt_id`) REFERENCES `syllabi` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `event_pays_ins_id_foreign` FOREIGN KEY (`ins_id`) REFERENCES `institutes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `event_pays_stu_id_foreign` FOREIGN KEY (`stu_id`) REFERENCES `grades` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `event_pays_tic_typ_id_foreign` FOREIGN KEY (`tic_typ_id`) REFERENCES `event_pays` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `event_tickets`
--
ALTER TABLE `event_tickets`
  ADD CONSTRAINT `event_tickets_evt_id_foreign` FOREIGN KEY (`evt_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
