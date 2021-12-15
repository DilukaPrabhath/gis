-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 07:39 AM
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
  `sub_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stu_id` int(11) NOT NULL,
  `ins_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'Cricket 2', '1500.00', 1, '2021-11-23 01:36:09', '2021-11-23 02:20:24'),
(3, 'Net Ball', '1000.00', 1, '2021-11-23 01:42:36', '2021-11-23 01:42:36'),
(6, 'cricket 3', '3333.00', 1, '2021-11-23 05:44:33', '2021-11-23 05:44:33');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'Peoples Bank', 1, '2021-11-26 04:11:28', '2021-11-26 04:34:00');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `discription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `ins_id`, `event`, `venue`, `date`, `time`, `discription`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Event Ali Baba saha Horu 40', 'Main hale', '2021-11-29', '12:30:00', 'Consert Grade 1', 1, '2021-11-24 01:24:13', '2021-11-24 04:26:48'),
(5, 1, 'Event Hunu wate', 'dd', '2021-12-02', '18:40:00', 'dd', 1, '2021-11-25 03:36:57', '2021-11-25 03:36:57');

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
(1, 1, 'Gold', '1000.00', 100, 3, NULL, '2021-11-26 01:53:26'),
(2, 1, 'Silver', '500.00', 22, 1, '2021-11-25 22:47:50', '2021-11-25 22:47:50'),
(3, 1, 'Bronse', '250.00', 1, 1, '2021-11-25 22:49:12', '2021-11-25 22:49:12'),
(4, 5, 'Platnem', '23000.00', 100, 1, '2021-11-25 22:53:20', '2021-11-25 22:53:20'),
(5, 5, 'ccc', '1222.00', 100, 1, NULL, NULL),
(6, 1, 'ccc', '1000.00', 100, 1, '2021-11-26 00:11:42', '2021-11-26 00:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `grade` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Grade 01', 1, NULL, NULL),
(2, 'Grade 02', 1, NULL, NULL),
(4, 'Grade 04', 1, NULL, NULL),
(5, 'Grade 05', 1, NULL, NULL);

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
  `contact_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_2` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_or_sch` smallint(6) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institutes`
--

INSERT INTO `institutes` (`id`, `institute_name`, `contact_number`, `address_line_1`, `address_line_2`, `email`, `city`, `pre_or_sch`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Institute 1', '0110668361', 'sssssss', 'ssssssss', 's@f.b', 'ssss', 1, 1, '2021-11-22 03:36:24', '2021-11-22 03:36:24'),
(2, 'Institute 2', '0770669785', 'eeee', 'eeeeeee', 'd@d.d', 'eee', 2, 1, '2021-11-22 03:42:55', '2021-11-23 04:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `inst_class_fees`
--

CREATE TABLE `inst_class_fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `ins_id` int(11) NOT NULL,
  `grd_id` int(11) NOT NULL,
  `fee` decimal(7,2) NOT NULL,
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
(1, 2, 1, '2000.00', 1, 2022, 1, '2021-11-29 03:16:09', '2021-11-30 01:01:37'),
(2, 1, 0, '2000.00', NULL, 2021, 1, '2021-11-29 03:17:56', '2021-11-29 03:17:56'),
(3, 2, 1, '2333.00', 2, 2021, 1, '2021-11-29 03:19:04', '2021-11-29 03:19:04'),
(4, 2, 1, '2222.00', 1, 2021, 1, '2021-11-29 03:19:34', '2021-11-29 03:19:34'),
(5, 2, 1, '2000.00', 1, 2021, 1, '2021-11-29 03:20:50', '2021-11-29 03:20:50'),
(6, 2, 1, '2444.00', 1, 2021, 1, '2021-11-29 03:23:13', '2021-11-29 03:23:13'),
(7, 2, 1, '3333.00', 1, 2021, 1, '2021-11-29 04:22:10', '2021-11-29 04:22:10'),
(8, 1, 0, '233.00', NULL, 2022, 1, '2021-11-29 04:24:04', '2021-11-29 04:24:04'),
(9, 1, 0, '2345.00', NULL, 2021, 1, '2021-11-29 04:24:44', '2021-11-29 04:24:44'),
(10, 1, 0, '2345.00', NULL, 2021, 1, '2021-11-29 04:25:15', '2021-11-29 04:25:15'),
(11, 1, 0, '5000.00', NULL, 2021, 1, '2021-11-29 05:50:17', '2021-11-29 05:50:17'),
(12, 1, 0, '2000.00', NULL, 2022, 1, '2021-11-29 05:52:25', '2021-11-29 05:52:25'),
(13, 2, 1, '2000.00', 1, 2022, 1, '2021-11-29 05:52:52', '2021-11-29 05:52:52'),
(14, 2, 2, '2000.00', 1, 2021, 1, '2021-11-30 12:11:00', '2021-11-30 12:11:00'),
(15, 2, 1, '2000.00', 1, 2021, 1, '2021-11-30 12:12:46', '2021-11-30 12:12:46'),
(16, 1, 0, '200.00', NULL, 2021, 1, '2021-11-30 12:13:03', '2021-11-30 12:13:03'),
(17, 1, 0, '200.00', NULL, 2026, 1, '2021-11-30 12:25:28', '2021-11-30 12:25:28');

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
(24, '2021_11_30_103226_create_parents_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `parentms`
--

CREATE TABLE `parentms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `st_id` int(11) NOT NULL,
  `parent_nic` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_mobile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_address` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_relationship` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parentms`
--

INSERT INTO `parentms` (`id`, `st_id`, `parent_nic`, `parent_name`, `parent_mobile`, `parent_email`, `parent_address`, `parent_relationship`, `created_at`, `updated_at`) VALUES
(2, 3, '902784527V', 'ee', '0770668974', 'a@e.c', '360/B,', 'Father', '2021-12-01 01:09:31', '2021-12-05 12:22:40'),
(3, 4, '323232333333', '2222', '021235666', '2@3.c', 'eer', 'ereer', '2021-12-01 01:21:03', '2021-12-01 01:21:03'),
(4, 5, '932784527V', 'ee', '0770668974', 'a@e.c', '360', 'Father', '2021-12-01 06:23:00', '2021-12-01 06:23:00'),
(5, 6, '932784527V', 'ee', '0770668974', 'a@e.c', '360', 'Father', '2021-12-01 06:25:39', '2021-12-01 06:25:39'),
(6, 3, '953657812V', 'p2', '0770668694', 'prnt2@g.com', 'eeeee', 'eeee', '2021-12-05 12:30:08', '2021-12-05 13:15:46'),
(7, 3, 'sss', 'sss', '0770668361', 's@f.n', 'www', 'www', '2021-12-05 13:53:42', '2021-12-05 13:53:42'),
(8, 7, '936254781V', 'Danedra', '0770668954', 'danedra@gmail.com', 'test address', 'Uncle', '2021-12-06 03:21:05', '2021-12-06 03:21:05');

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_full_name` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `inq_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `re_ins_id` int(11) NOT NULL,
  `re_grd_id` int(11) NOT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_full_name`, `dob`, `inq_number`, `re_ins_id`, `re_grd_id`, `inq_type`, `inq_status`, `stu_status`, `gender`, `emergency_contact_nic`, `emergency_contact_name`, `emergency_contact_mobile`, `emergency_contact_relationship`, `interview_status`, `re_interview_apply`, `application_status`, `resipt_number`, `resipt_image`, `interview_type`, `student_image`, `registration_date`, `pre_sc_att`, `pre_school_id`, `recod`, `reg_typ`, `schoolership_apply`, `schoolership_resipt`, `is_id_fee_paid`, `is_id_issue`, `syllubus_type`, `student_id`, `institute`, `grade_now`, `stu_img`, `pamt_typ`, `created_at`, `updated_at`) VALUES
(3, 'Dilshan Amila', '2021-12-15', 'IQ/202112/0001', 1, 2, 1, 2, 4, 1, '9362578742V', 'test 1', '0770668327', 'Mother', 1, 1, 1, '123456789', '1638732071.jpg', 1, NULL, '2021-12-07', 1, '123123', 'test', NULL, NULL, NULL, 2, 2, 2, 'GIS/202112/0007', 1, 7, '1638732222.jpg', 2, '2021-12-01 01:09:31', '2021-12-06 03:25:42'),
(4, 'Bharatha Shashiruwan', '2021-12-16', 'IQ/202112/0002', 1, 4, 2, 1, 2, 1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-01 01:21:02', '2021-12-01 01:21:02'),
(7, 'Shalinda AP', '2021-12-06', 'IQ/202112/0003', 1, 4, 1, 2, 4, 1, NULL, NULL, NULL, NULL, 1, 2, 1, '98652', '1638780733.jpg', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-06 03:21:05', '2021-12-06 03:22:41');

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
(2, 'English', 1, '2021-11-25 04:11:33', '2021-11-25 04:11:33');

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
(1, 'YSCO8oPBfz2tZHP', 'nBBlfB86jViOE19', 1, 1, NULL, NULL, '1', NULL, NULL, NULL, '2021-11-22', NULL, '2021-11-25 02:58:24', '2021-11-25 02:58:24'),
(2, 'YSCO8oPBfz2tZHP', 'nBBlfB86jViOE19', 1, 1, NULL, NULL, '1', NULL, NULL, NULL, '2021-11-22', NULL, '2021-11-25 02:59:16', '2021-11-25 02:59:16'),
(3, 'YSCO8oPBfz2tZHP', 'nBBlfB86jViOE19', 1, 1, NULL, NULL, '1', NULL, NULL, NULL, '2021-11-22', NULL, '2021-11-25 02:59:26', '2021-11-25 02:59:26'),
(4, 'YSCO8oPBfz2tZHP', 'nBBlfB86jViOE19', 1, 2, NULL, NULL, '1', NULL, NULL, NULL, '2021-11-22', NULL, '2021-11-25 03:04:17', '2021-11-25 03:04:17'),
(5, 'TGAcb5p1PcDsAXP', 'a4pMteHCXEKLb2x', 2, 2, NULL, NULL, '2', NULL, NULL, NULL, '2021-12-09', NULL, '2021-11-25 03:04:30', '2021-11-25 03:04:30'),
(6, '02hlP9qVJ0KUtTo', '3cTqn510bb2MQ2w', 1111111, 111111111, NULL, NULL, '11111', NULL, NULL, NULL, '2021-12-02', NULL, '2021-11-25 03:06:04', '2021-11-25 03:06:04'),
(7, '02hlP9qVJ0KUtTo', '3cTqn510bb2MQ2w', 1111111, 111111111, NULL, NULL, '11111', NULL, NULL, NULL, '2021-12-02', NULL, '2021-11-25 03:06:33', '2021-11-25 03:06:33'),
(8, 'nFferr9rbwKMDCo', 'tMiZ5ewRQwyCJue', 2, 2, NULL, NULL, '2', NULL, NULL, NULL, '2021-12-01', NULL, '2021-11-25 03:07:55', '2021-11-25 03:07:55'),
(9, 'x3wUUZjMcARsEoN', 'qEOGY7u3tnrEclK', 1, 1, NULL, NULL, '1', NULL, NULL, NULL, '2021-12-01', NULL, '2021-11-25 03:16:02', '2021-11-25 03:16:02'),
(10, 't4XiTliUSfqkAqs', 'masw7bWmRcXAu7J', 2, 3, NULL, NULL, '1', NULL, NULL, NULL, '2021-12-01', NULL, '2021-11-25 03:17:01', '2021-11-25 03:17:01'),
(11, 'cNp4TkAg9wOIEzO', 'tlfsxYyQj4cuHRf', 22, 22, NULL, NULL, 'ee', NULL, NULL, NULL, '2021-11-24', NULL, '2021-11-25 03:17:48', '2021-11-25 03:17:48'),
(12, 'cNp4TkAg9wOIEzO', 'tlfsxYyQj4cuHRf', 2, 2, NULL, NULL, '2', NULL, NULL, NULL, '2021-11-24', NULL, '2021-11-25 03:17:58', '2021-11-25 03:17:58');

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
(1, 'admin', 'admin@gmail.com', '932784742V', '0770668361', 'wwww', NULL, '$2y$10$.bOzyXtNE1j4j0Ax58v5tOFNDFccpwsoPvkMC0UX95KjUbiuFgdU2', NULL, 1, 1, 'INS/1/0001', 1, '', '2021-11-22 06:47:40', '2021-11-22 06:47:40'),
(2, 'admin2', 'admin2@gmail.com', '932784743V', '0770668362', '1', NULL, '$2y$10$/VcgAv/C23mIWpovuRTIk..kkRBJdBKw7xYkKN4sx2tYUmIJL7.CW', '1637563844.jpg', 1, 1, '1', 1, NULL, '2021-11-22 01:20:44', '2021-11-22 01:20:44');

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
-- Indexes for table `activity_payments`
--
ALTER TABLE `activity_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `students`
--
ALTER TABLE `students`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `activity_payments`
--
ALTER TABLE `activity_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_pays`
--
ALTER TABLE `event_pays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_tickets`
--
ALTER TABLE `event_tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grad_subjects`
--
ALTER TABLE `grad_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inst_class_fees`
--
ALTER TABLE `inst_class_fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `parentms`
--
ALTER TABLE `parentms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `syllabi`
--
ALTER TABLE `syllabi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tem_tbls`
--
ALTER TABLE `tem_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
