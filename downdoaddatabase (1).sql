-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2019 at 09:15 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budget_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `keyword` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ministry_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `agency_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `keyword`, `ministry_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `agency_name`, `agency_name_bn`, `agency_description`, `status`) VALUES
(9, 'a1', 16, '2018-11-21 23:10:55', '2019-03-02 01:52:50', 0, 24, NULL, 'Agrani 1', 'Agrani 1', 'Farmgate, Dhaka-1215, Bangladesh', 1),
(10, 'a2', 17, '2018-11-21 23:11:40', '2019-03-02 01:52:59', 0, 24, NULL, 'Agrani 2', 'Agrani 2', 'Old Dhaka, Dhaka-1100, Bangladesh', 1),
(11, 'a3', 16, '2018-11-21 23:12:01', '2019-03-02 00:55:36', 0, 24, NULL, 'Agrani 3', 'Agrani 3', 'Tejgaon, Dhaka-1208, Bangladesh', 1),
(12, 'a4', NULL, '2018-11-21 23:12:27', '2019-03-02 00:55:50', 0, 24, NULL, 'Agrani 4', 'Agrani 4', 'Tejgaon, Dhaka-1208, Bangladesh', 1),
(17, 'es', NULL, '2019-01-23 01:13:25', '2019-01-23 01:53:01', 24, 24, '2019-01-23 01:53:01', 'ddd', '', NULL, 0),
(18, 'fs', NULL, '2019-01-30 05:04:58', '2019-01-30 05:05:09', 24, 24, '2019-01-30 05:05:09', 'rr', '', NULL, 0),
(19, 'a5', 16, '2019-01-31 01:07:17', '2019-01-31 04:59:39', 24, 24, NULL, 'Magura traders ltd', '', NULL, 0),
(21, 'we', 16, '2019-02-16 03:00:28', '2019-02-16 03:00:28', 24, 24, NULL, 'controller', '', 'dfdfsf', 0),
(22, 'WR', 17, '2019-02-27 03:13:52', '2019-02-27 03:14:02', 24, 24, '2019-02-27 03:14:02', 'a', '', 'sdaf', 1),
(23, 'AD', 17, '2019-02-27 03:16:11', '2019-02-27 03:22:40', 24, 24, '2019-02-27 03:22:40', 'G', 'চট্টগ্রাম চট্টগ্রাম', 'R', 1);

-- --------------------------------------------------------

--
-- Table structure for table `allocations`
--

CREATE TABLE `allocations` (
  `id` int(11) NOT NULL,
  `allocation_type` int(11) NOT NULL,
  `project_code` varchar(255) CHARACTER SET utf8 NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_status` int(11) NOT NULL,
  `approved_status` int(11) NOT NULL,
  `project_cost_total` double NOT NULL,
  `project_fe` double NOT NULL,
  `project_aid` double NOT NULL,
  `project_rpa` double NOT NULL,
  `project_sf` double NOT NULL,
  `original_fiscal_year` int(11) NOT NULL,
  `original_total` double NOT NULL,
  `original_taka` double NOT NULL,
  `actual_total` double NOT NULL,
  `actual_total_fe` double NOT NULL,
  `actual_taka` double NOT NULL,
  `cumulative_total` double NOT NULL,
  `cumulative_taka` double NOT NULL,
  `allocation_total` double NOT NULL,
  `allocation_taka` double NOT NULL,
  `allocation_revenue` double NOT NULL,
  `capital` double NOT NULL,
  `capital_rpa` double NOT NULL,
  `capital_revenue` double NOT NULL,
  `cdvat` double NOT NULL,
  `cdvat_pa` double NOT NULL,
  `cdvat_rpa` double NOT NULL,
  `cdvat_dpa` double NOT NULL,
  `allocation_others` double NOT NULL,
  `source_of_project_aid` int(11) DEFAULT NULL,
  `source_amount` double DEFAULT NULL,
  `self_finance` double NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `allocation_location_details`
--

CREATE TABLE `allocation_location_details` (
  `id` int(11) NOT NULL,
  `allocation_id` int(11) NOT NULL,
  `project_code` varchar(255) CHARACTER SET utf8 NOT NULL,
  `division` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `upazila_location` int(11) NOT NULL,
  `rmo` int(11) DEFAULT '0',
  `amount` double NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `approval_history`
--

CREATE TABLE `approval_history` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `approve_by` int(5) NOT NULL,
  `approve_date` date DEFAULT NULL,
  `approval_go_no` varchar(100) DEFAULT NULL,
  `approval_level` int(11) DEFAULT NULL,
  `administrative_by` int(11) DEFAULT NULL,
  `administrative_date` date DEFAULT NULL,
  `administrative_go_no` varchar(100) DEFAULT NULL,
  `administrative_level` int(11) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `action_date` date DEFAULT NULL,
  `event_id` tinyint(4) DEFAULT NULL,
  `comments` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approval_history`
--

INSERT INTO `approval_history` (`id`, `project_id`, `approve_by`, `approve_date`, `approval_go_no`, `approval_level`, `administrative_by`, `administrative_date`, `administrative_go_no`, `administrative_level`, `file_name`, `action_date`, `event_id`, `comments`, `created_at`, `updated_at`) VALUES
(2, 28, 24, '2019-02-28', '4545', 2, 24, '2019-02-28', '4545', 2, 'uploaded_files/Unapprove_Project/Unapprove_Project_9972a5bfaab20afbc5345ff856caaca3.pdf', '2019-02-07', NULL, NULL, NULL, NULL),
(3, 28, 24, '2019-02-15', '455', 2, 24, '2019-02-15', '6546546', 2, '', '2019-02-07', NULL, NULL, NULL, NULL),
(4, 1, 24, '2019-02-07', '5445', 2, 24, '2019-02-07', '4545', 2, 'uploaded_files/Unapprove_Project/Unapprove_Project_d4b4dce167d9d67b4ddcc5d8a4d13b49.pdf', '2019-02-07', NULL, NULL, NULL, NULL),
(5, 55, 34, '2019-02-19', '1002', 16, 34, '2019-02-19', '2002', 16, 'uploaded_files/Unapprove_Project/Unapprove_Project_572f5639a1673c33da241a638a65b1dd.xlsx', '2019-02-18', NULL, NULL, NULL, NULL),
(6, 28, 42, '2019-02-21', '12', 10, 42, '2019-02-27', '12', 10, '', '2019-02-26', NULL, NULL, NULL, NULL),
(7, 34, 34, '2019-02-27', '4545', 16, 34, '2019-02-27', '454', 16, 'uploaded_files/Unapprove_Project/Unapprove_Project_db5b4cf25799ecffc98c9a93dd74c893.pdf', '2019-02-27', NULL, NULL, NULL, NULL),
(8, 52, 5, '2019-02-27', '4545', 2, 5, '2019-02-28', '454', 2, '', '2019-02-27', NULL, NULL, NULL, NULL),
(9, 69, 5, '2019-02-28', '45', 12, 5, '2019-02-28', '45', 12, '', '2019-02-27', NULL, NULL, NULL, NULL),
(10, 70, 5, '2019-03-02', '5454', 13, 5, '2019-03-02', '5454', 13, 'uploaded_files/Unapprove_Project/Unapprove_Project_31e3a8ce7de3e6ab17a03773a39fd8f3.pdf', '2019-03-02', NULL, NULL, NULL, NULL),
(11, 71, 5, '2019-03-20', '56', 15, 5, '2019-03-28', '56', 15, '', '2019-03-03', NULL, NULL, NULL, NULL),
(12, 76, 6, '2019-03-07', '1213', 15, 6, '2019-03-06', '2213', 15, 'uploaded_files/Unapprove_Project/Unapprove_Project_3b91e069ef2eada7cf0f8b72cca0dedc.jpg', '2019-03-04', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `approval_setups`
--

CREATE TABLE `approval_setups` (
  `id` int(10) UNSIGNED NOT NULL,
  `approved_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_by_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approval_setups`
--

INSERT INTO `approval_setups` (`id`, `approved_by`, `approved_by_bn`, `description`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'QQQ', '', 'as', 1, 24, 24, '2019-02-27 00:18:17', '2019-02-27 00:14:46', '2019-02-27 00:18:17'),
(2, 'PPPOOO', '', 'PPPOOO As', 1, 24, 24, '2019-02-27 00:28:29', '2019-02-27 00:15:21', '2019-02-27 00:28:29'),
(3, 'QWR', '', 'asdfadsf', 1, 24, 24, '2019-02-27 00:18:21', '2019-02-27 00:15:33', '2019-02-27 00:18:21'),
(4, 'OPOPOP', '', 'OPOPOPOPOOPOPO sPPP', 1, 24, 24, '2019-02-27 00:28:25', '2019-02-27 00:26:11', '2019-02-27 00:28:25'),
(5, 'NEC approve', '', 'NEC approve', 1, 34, 34, NULL, '2019-02-27 00:30:19', '2019-02-27 00:30:19'),
(6, 'ECNEC Approval', '', 'ECNEC Approval', 1, 34, 34, NULL, '2019-02-27 00:30:40', '2019-02-27 00:30:40'),
(7, 'approved_by', 'অনুমোদনকারি', 'asfddddddd', 1, 24, 24, '2019-02-27 02:02:44', '2019-02-27 02:01:33', '2019-02-27 02:02:44'),
(8, 'authenticator', 'অনুমোদনকারি K', 'OIUY', 1, 24, 24, '2019-02-27 02:03:23', '2019-02-27 02:02:54', '2019-02-27 02:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `approved_project_comment_details`
--

CREATE TABLE `approved_project_comment_details` (
  `id` int(11) NOT NULL,
  `unapprove_project_id` int(11) NOT NULL,
  `comment_level` tinyint(4) NOT NULL,
  `comments` text CHARACTER SET utf8,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `approved_project_comment_details`
--

INSERT INTO `approved_project_comment_details` (`id`, `unapprove_project_id`, `comment_level`, `comments`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(3, 2, 2, 'need emergency', 34, 34, '2019-01-17 03:56:13', '2019-01-17 03:56:13', 1),
(4, 11, 13, 'Agency Lavel Comments', 34, 34, '2019-01-22 04:24:26', '2019-01-22 04:24:26', 1),
(5, 1, 2, 'asdd', 24, 24, '2019-01-28 03:18:08', '2019-01-28 03:18:08', NULL),
(6, 28, 15, 'fgfgf', 34, 34, '2019-02-03 02:45:49', '2019-02-03 02:45:49', 1),
(7, 28, 16, 'no comment', 34, 34, '2019-02-03 02:45:49', '2019-02-03 02:45:49', 1),
(8, 1, 2, NULL, 24, 24, '2019-02-03 04:57:11', '2019-02-03 04:57:11', NULL),
(9, 1, 2, NULL, 24, 24, '2019-02-03 22:33:54', '2019-02-03 22:33:54', NULL),
(10, 1, 2, NULL, 24, 24, '2019-02-03 22:34:00', '2019-02-03 22:34:00', NULL),
(11, 1, 2, NULL, 24, 24, '2019-02-05 23:04:31', '2019-02-05 23:04:31', NULL),
(12, 1, 2, '44', 24, 24, '2019-02-11 03:55:56', '2019-02-11 03:55:56', NULL),
(13, 1, 2, 'sdsd', 24, 24, '2019-02-11 03:56:55', '2019-02-11 03:56:55', NULL),
(14, 1, 2, 'abcd', 24, 24, '2019-02-11 03:57:14', '2019-02-11 03:57:14', NULL),
(15, 54, 13, 'dghdf dsf ghfsdg', 34, 34, '2019-02-15 22:32:02', '2019-02-15 22:32:02', 1),
(16, 47, 13, 'agency Comment', 34, 34, '2019-02-16 22:54:36', '2019-02-16 22:54:36', 1),
(17, 47, 12, 'ministry override', 34, 34, '2019-02-16 22:54:36', '2019-02-16 22:54:36', 1),
(18, 47, 11, 'Sub sector override', 34, 34, '2019-02-16 22:54:36', '2019-02-16 22:54:36', 1),
(19, 47, 9, 'drctor override', 34, 34, '2019-02-16 22:54:36', '2019-02-16 22:54:36', 1),
(20, 47, 16, 'hello', 34, 34, '2019-02-16 22:54:36', '2019-02-16 22:54:36', 1),
(21, 55, 13, 'Agency Comments', 34, 34, '2019-02-18 05:38:38', '2019-02-18 05:38:38', 1),
(22, 57, 13, 'this is demo Project comment', 34, 34, '2019-02-19 03:22:26', '2019-02-19 03:22:26', 1),
(23, 45, 13, 'sds', 34, 34, '2019-02-20 00:34:28', '2019-02-20 00:34:28', 1),
(24, 45, 12, 'very good', 34, 34, '2019-02-20 00:34:28', '2019-02-20 00:34:28', 1),
(25, 45, 11, 'wewe', 34, 34, '2019-02-20 00:34:28', '2019-02-20 00:34:28', 1),
(26, 45, 9, 'ok sir', 34, 34, '2019-02-20 00:34:28', '2019-02-20 00:34:28', 1),
(27, 45, 16, 'all done', 34, 34, '2019-02-20 00:34:28', '2019-02-20 00:34:28', 1),
(28, 61, 13, 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', 28, 28, '2019-02-25 23:18:15', '2019-02-25 23:18:15', 1),
(29, 61, 12, 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.  2', 28, 28, '2019-02-25 23:18:15', '2019-02-25 23:18:15', 1),
(30, 61, 11, 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project. 2', 28, 28, '2019-02-25 23:18:15', '2019-02-25 23:18:15', 1),
(31, 70, 13, '45', 34, 34, '2019-03-02 02:05:19', '2019-03-02 02:05:19', 1),
(32, 71, 13, 'check done form agency moderator', 34, 34, '2019-03-02 23:23:46', '2019-03-02 23:23:46', 1),
(33, 71, 12, 'ministry super comment', 34, 34, '2019-03-02 23:23:46', '2019-03-02 23:23:46', 1),
(34, 76, 13, 'Money need ASAP', 34, 34, '2019-03-03 23:56:03', '2019-03-03 23:56:03', 1),
(35, 76, 16, 'ok', 34, 34, '2019-03-03 23:56:03', '2019-03-03 23:56:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `approved_project_component_wise_cost`
--

CREATE TABLE `approved_project_component_wise_cost` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `budget_head` int(11) NOT NULL,
  `economic_code` int(11) NOT NULL,
  `component_description` text CHARACTER SET utf8,
  `economic_subcode` int(11) DEFAULT NULL,
  `unit` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `unit_cost` double DEFAULT NULL,
  `total_cost` double DEFAULT NULL,
  `gob` double DEFAULT NULL,
  `gob_fe` double DEFAULT NULL,
  `rpa_through_gob` double DEFAULT NULL,
  `special_acount` double DEFAULT NULL,
  `dpa_through_pd` double DEFAULT NULL,
  `dpa_through_dp` double DEFAULT NULL,
  `ownfund` double DEFAULT NULL,
  `ownfund_fe` double DEFAULT NULL,
  `others` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `approved_project_component_wise_cost`
--

INSERT INTO `approved_project_component_wise_cost` (`id`, `project_id`, `budget_head`, `economic_code`, `component_description`, `economic_subcode`, `unit`, `quantity`, `unit_cost`, `total_cost`, `gob`, `gob_fe`, `rpa_through_gob`, `special_acount`, `dpa_through_pd`, `dpa_through_dp`, `ownfund`, `ownfund_fe`, `others`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(2, 1, 7, 11221321, 'Bricks Compononent', 11000258, 1, 22, 122, 444332, 1, 233232, 1, 1, 8, 1, 1, 123424324, 125455, 24, 34, '2019-01-28 00:11:03', '2019-01-29 01:02:12', 1),
(3, 76, 7, 121, 'HI', 122, 5, 3, 21, 22, 100000, 0, 1, 2, 5, 3, 6, 6, 4, 40, 40, '2019-03-03 23:59:56', '2019-03-03 23:59:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `approved_project_date_details`
--

CREATE TABLE `approved_project_date_details` (
  `id` int(5) NOT NULL,
  `project_id` int(11) NOT NULL,
  `version` varchar(225) CHARACTER SET utf8 DEFAULT NULL,
  `date_of_commencement` date NOT NULL,
  `date_of_completion` date NOT NULL,
  `revision` int(11) DEFAULT NULL,
  `go_type` int(11) DEFAULT NULL,
  `go_number` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approved_project_date_details`
--

INSERT INTO `approved_project_date_details` (`id`, `project_id`, `version`, `date_of_commencement`, `date_of_completion`, `revision`, `go_type`, `go_number`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(2, 5, '1', '2019-01-20', '2019-01-05', NULL, NULL, NULL, 34, 34, '2019-01-20 00:49:18', '2019-01-20 00:49:18', 1),
(3, 1, '1', '2019-01-15', '2019-01-15', NULL, NULL, NULL, 24, 24, '2019-01-20 00:49:18', '2019-01-20 00:49:18', 1),
(5, 2, '1', '2019-01-31', '2019-01-31', NULL, NULL, NULL, NULL, NULL, '2019-01-20 00:49:18', '2019-01-20 00:49:18', 1),
(8, 11, '1', '2019-01-01', '2019-01-31', NULL, NULL, NULL, 34, 34, '2019-01-22 04:24:26', '2019-01-22 04:24:26', 1),
(9, 10, '1', '2019-01-24', '2019-01-25', NULL, NULL, NULL, NULL, NULL, '2019-01-20 00:49:18', '2019-01-20 00:49:18', 1),
(11, 11, '2', '2019-01-01', '2019-02-07', NULL, NULL, NULL, NULL, NULL, '2019-01-22 04:36:55', '2019-01-22 04:36:55', 1),
(12, 1, '2', '2019-01-15', '2019-01-17', NULL, NULL, NULL, NULL, NULL, '2019-01-22 23:21:58', '2019-01-22 23:21:58', 1),
(13, 1, '3', '2019-01-15', '2019-01-24', NULL, NULL, NULL, NULL, NULL, '2019-01-23 22:58:59', '2019-01-23 22:58:59', 1),
(14, 1, '4', '2019-01-15', '2019-01-31', 1, NULL, '45', NULL, NULL, '2019-01-23 23:01:13', '2019-01-23 23:01:13', 1),
(15, 1, '5', '2019-01-15', '2019-02-07', 1, NULL, NULL, NULL, NULL, '2019-01-23 23:02:45', '2019-01-23 23:02:45', 1),
(16, 1, '6', '2019-01-15', '2019-03-07', 1, 1, NULL, NULL, NULL, '2019-01-23 23:06:34', '2019-01-23 23:06:34', 1),
(17, 1, '7', '2019-01-15', '2019-03-08', 1, 1, '12', NULL, NULL, '2019-01-24 00:38:00', '2019-01-24 00:38:00', 1),
(19, 28, '1', '2019-01-31', '2019-01-31', NULL, NULL, NULL, 34, 34, '2019-02-03 02:45:49', '2019-02-03 02:45:49', 1),
(21, 54, '1', '2019-01-01', '2019-08-31', NULL, NULL, NULL, 34, 34, '2019-02-15 22:32:02', '2019-02-15 22:32:02', 1),
(22, 47, '1', '2019-02-03', '2019-02-03', NULL, NULL, NULL, 34, 34, '2019-02-16 22:54:36', '2019-02-16 22:54:36', 1),
(23, 55, '1', '2019-02-18', '2019-08-31', NULL, NULL, NULL, 34, 34, '2019-02-18 05:38:38', '2019-02-18 05:38:38', 1),
(24, 57, '1', '2019-02-20', '2019-02-22', NULL, NULL, NULL, 34, 34, '2019-02-19 03:22:26', '2019-02-19 03:22:26', 1),
(25, 45, '1', '2019-02-21', '2019-02-28', NULL, NULL, NULL, 34, 34, '2019-02-20 00:34:28', '2019-02-20 00:34:28', 1),
(26, 52, '1', '2019-02-20', '2019-02-20', NULL, NULL, NULL, 34, 34, '2019-02-20 01:59:57', '2019-02-20 01:59:57', 1),
(27, 34, '1', '2019-02-20', '2019-02-20', NULL, NULL, NULL, 34, 34, '2019-02-20 02:17:31', '2019-02-20 02:17:31', 1),
(28, 61, '1', '2019-02-25', '2019-04-30', NULL, NULL, NULL, 28, 28, '2019-02-25 23:18:15', '2019-02-25 23:18:15', 1),
(29, 69, '1', '2019-02-01', '2019-03-21', NULL, NULL, NULL, 30, 30, '2019-02-27 04:20:55', '2019-02-27 04:20:55', 1),
(30, 70, '1', '2019-03-01', '2019-03-31', NULL, NULL, NULL, 34, 34, '2019-03-02 02:05:19', '2019-03-02 02:05:19', 1),
(31, 71, '1', '2019-03-03', '2019-03-03', NULL, NULL, NULL, 34, 34, '2019-03-02 23:23:46', '2019-03-02 23:23:46', 1),
(32, 76, '1', '2019-03-20', '2020-03-20', NULL, NULL, NULL, 34, 34, '2019-03-03 23:56:03', '2019-03-03 23:56:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `approved_project_estimated_cost`
--

CREATE TABLE `approved_project_estimated_cost` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `version` int(11) NOT NULL,
  `total` double NOT NULL,
  `gob` double NOT NULL,
  `fe` double NOT NULL,
  `pa` double NOT NULL,
  `rpa` double NOT NULL,
  `own_fund` double NOT NULL,
  `exchange_rate` double NOT NULL,
  `exchange_date` date NOT NULL,
  `other` double DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `approved_project_estimated_cost`
--

INSERT INTO `approved_project_estimated_cost` (`id`, `project_id`, `version`, `total`, `gob`, `fe`, `pa`, `rpa`, `own_fund`, `exchange_rate`, `exchange_date`, `other`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(2, 11, 1, 200, 200, 200, 200, 200, 200, 5, '2019-01-31', NULL, 34, 34, '2019-01-22 04:24:26', '2019-01-22 04:24:26', 1),
(3, 1, 1, 120000, 11111, 1111, 111, 1111, 1111, 1111, '2019-01-15', NULL, 34, 34, NULL, NULL, 1),
(5, 10, 1, 200, 200, 200, 200, 200, 20, 20, '2019-01-24', NULL, 34, 34, NULL, NULL, 1),
(6, 2, 1, 200, 200, 200, 2, 2, 2, 2, '2019-01-31', NULL, 34, 34, NULL, NULL, 1),
(7, 5, 1, 2211, 2121, 2121, 1414, 1212, 1212, 212, '2019-01-31', NULL, 34, 34, NULL, NULL, 1),
(8, 1, 2, 120000, 11111, 1111, 8585, 1111, 1111, 1111, '2019-01-15', NULL, 24, 24, '2019-01-22 23:55:10', '2019-01-22 23:55:10', 1),
(9, 10, 2, 200, 200, 200, 200, 2002, 20, 20, '2019-01-24', NULL, 34, 34, '2019-01-22 23:58:01', '2019-01-22 23:58:01', 1),
(11, 28, 1, 200, 2, 2, 2, 2, 2, 2, '2019-01-31', NULL, 34, 34, '2019-02-03 02:45:49', '2019-02-03 02:45:49', 1),
(13, 54, 1, 50000, 20000, 5000, 3000, 500, 5000, 5, '2019-02-28', NULL, 34, 34, '2019-02-15 22:32:02', '2019-02-15 22:32:02', 1),
(14, 47, 1, 111111, 21, 2222, 12, 12, 1, 1, '2019-02-03', NULL, 34, 34, '2019-02-16 22:54:36', '2019-02-16 22:54:36', 1),
(15, 55, 1, 500, 300, 100, 200, 100, 100, 80, '2019-02-28', NULL, 34, 34, '2019-02-18 05:38:38', '2019-02-18 05:38:38', 1),
(16, 57, 1, 2000, 100, 100, 50, 50, 100, 70, '2019-02-20', NULL, 34, 34, '2019-02-19 03:22:26', '2019-02-19 03:22:26', 1),
(17, 45, 1, 12222, 12, 12, 1, 1, 1, 12, '2019-02-21', NULL, 34, 34, '2019-02-20 00:34:28', '2019-02-20 00:34:28', 1),
(18, 52, 1, 12313, 123, 123, 123, 213, 123, 123, '2019-02-20', NULL, 34, 34, '2019-02-20 01:59:57', '2019-02-20 01:59:57', 1),
(19, 34, 1, 55, 5, 5, 5, 5, 5, 5, '2019-02-20', NULL, 34, 34, '2019-02-20 02:17:31', '2019-02-20 02:17:31', 1),
(20, 61, 1, 500, 300, 200, 200, 200, 200, 5, '2019-02-26', NULL, 28, 28, '2019-02-25 23:18:15', '2019-02-25 23:18:15', 1),
(21, 69, 1, 200, 22, 22, 22, 22, 22, 22, '2019-02-28', NULL, 30, 30, '2019-02-27 04:20:55', '2019-02-27 04:20:55', 1),
(22, 70, 1, 200, 22, 22, 22, 22, 22, 2, '2019-03-21', NULL, 34, 34, '2019-03-02 02:05:19', '2019-03-02 02:05:19', 1),
(23, 71, 1, 100, 80, 20, 20, 20, 20, 2, '2019-03-03', NULL, 34, 34, '2019-03-02 23:23:46', '2019-03-02 23:23:46', 1),
(24, 76, 1, 500000, 200000, 0, 300000, 0, 0, 0, '2019-03-04', NULL, 34, 34, '2019-03-03 23:56:03', '2019-03-03 23:56:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `approved_project_finance_types`
--

CREATE TABLE `approved_project_finance_types` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `source_mode` int(11) NOT NULL,
  `gob` double NOT NULL,
  `gob_fe` double NOT NULL,
  `pa` double NOT NULL,
  `pa_rpa` double NOT NULL,
  `ownfund` float NOT NULL,
  `ownfund_fe` double NOT NULL,
  `others` double NOT NULL,
  `pa_source` int(11) NOT NULL,
  `others_mention` double NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `approved_project_finance_types`
--

INSERT INTO `approved_project_finance_types` (`id`, `project_id`, `source_mode`, `gob`, `gob_fe`, `pa`, `pa_rpa`, `ownfund`, `ownfund_fe`, `others`, `pa_source`, `others_mention`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 5, 2, 565, 787, 123, 1500, 48, 787, 545, 3, 98, 24, 24, '2019-01-26 21:57:26', '2019-01-26 23:58:20', NULL),
(4, 1, 1, 100, 12, 100, 12, 12, 12, 12, 3, 12, 24, 24, '2019-02-05 22:50:42', '2019-02-05 22:50:42', NULL),
(5, 76, 1, 200000, 0, 0, 0, 0, 0, 0, 3, 0, 40, 40, '2019-03-03 23:57:50', '2019-03-03 23:57:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `approved_project_info`
--

CREATE TABLE `approved_project_info` (
  `id` int(11) NOT NULL,
  `unapprove_project_id` int(10) UNSIGNED NOT NULL,
  `project_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `project_tiltle_bn` varchar(225) CHARACTER SET utf8 NOT NULL,
  `project_code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `project_code_fd` varchar(255) DEFAULT NULL,
  `project_type` int(11) DEFAULT NULL,
  `master_project` tinyint(4) DEFAULT NULL COMMENT '0=no, 1=yes',
  `master_project_id` int(11) DEFAULT NULL,
  `ministry` tinyint(4) DEFAULT NULL,
  `agency` tinyint(4) DEFAULT NULL,
  `sector` tinyint(4) DEFAULT NULL,
  `sub_sector` tinyint(4) DEFAULT NULL,
  `objectives` text CHARACTER SET utf8,
  `objectives_bn` text,
  `date_of_commencement` date DEFAULT NULL,
  `date_of_completion` date DEFAULT NULL,
  `total` double NOT NULL,
  `gob` double NOT NULL,
  `fe` double NOT NULL COMMENT 'foreign exchange',
  `pa` double NOT NULL,
  `rpa` double NOT NULL,
  `own_fund` double NOT NULL,
  `exchange_rate` double DEFAULT NULL,
  `exchange_date` date DEFAULT NULL,
  `others` double DEFAULT NULL,
  `approve_by` int(11) DEFAULT NULL,
  `approve_date` date DEFAULT NULL,
  `approval_go_no` varchar(100) DEFAULT NULL,
  `approval_level` int(11) DEFAULT NULL,
  `administrative_by` int(11) DEFAULT NULL,
  `administrative_date` date DEFAULT NULL,
  `administrative_go_no` varchar(100) DEFAULT NULL,
  `administrative_level` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `agency_final_submit` tinyint(4) DEFAULT NULL,
  `ministry_final_submit` int(11) DEFAULT NULL,
  `pd_approval_status` tinyint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `approved_project_info`
--

INSERT INTO `approved_project_info` (`id`, `unapprove_project_id`, `project_title`, `project_tiltle_bn`, `project_code`, `project_code_fd`, `project_type`, `master_project`, `master_project_id`, `ministry`, `agency`, `sector`, `sub_sector`, `objectives`, `objectives_bn`, `date_of_commencement`, `date_of_completion`, `total`, `gob`, `fe`, `pa`, `rpa`, `own_fund`, `exchange_rate`, `exchange_date`, `others`, `approve_by`, `approve_date`, `approval_go_no`, `approval_level`, `administrative_by`, `administrative_date`, `administrative_go_no`, `administrative_level`, `file_name`, `agency_final_submit`, `ministry_final_submit`, `pd_approval_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'Dhaka metro rail component tender', 'ঢাকা মেট্রো রেল কম্পোনেন্ট দরপত্র', NULL, NULL, 0, NULL, NULL, 16, 12, 2, 10, 'ঢাকা মেট্রো রেল কম্পোনেন্ট দরপত্র', NULL, '2019-01-15', '2019-01-15', 120000, 11111, 1111, 111, 1111, 1111, 1111, '2019-01-15', NULL, 24, '2019-02-07', '5445', 2, 24, '2019-02-07', '4545', 2, 'uploaded_files/Unapprove_Project/Unapprove_Project_d4b4dce167d9d67b4ddcc5d8a4d13b49.pdf', NULL, NULL, NULL, 34, 34, '2019-01-15 22:08:42', '2019-02-07 01:58:28', 1),
(3, 10, 'Test', 'Test', NULL, NULL, 0, NULL, NULL, 16, 9, 1, 10, 'dfgfdg', NULL, '2019-01-17', '2019-01-31', 200, 200, 200, 200, 200, 20, 20, '2019-01-24', NULL, 34, '2019-01-16', '', 5, NULL, NULL, '', NULL, '', NULL, NULL, NULL, 34, 34, '2019-01-16 01:35:43', '2019-01-22 23:58:01', 1),
(6, 2, 'IBCS TEST', 'IBCS TEST', NULL, NULL, 5, NULL, NULL, 16, 9, 1, 10, 'sdfdsf', NULL, '2019-01-31', '2019-01-31', 200, 200, 200, 2, 2, 2, 2, '2019-01-31', NULL, 34, '2019-01-17', '', 16, NULL, NULL, '', NULL, '', 1, 1, 1, 34, 34, '2019-01-17 03:56:13', '2019-03-03 01:09:25', 1),
(8, 5, 'aas', 'sasas', NULL, NULL, 4, NULL, NULL, 16, 9, 2, 10, 'sd', NULL, '2019-01-20', '2019-01-05', 2211, 2121, 2121, 1414, 1212, 1212, 212, '2019-01-20', NULL, 34, '2019-01-20', '', 16, NULL, NULL, '', NULL, '', 1, 1, 1, 34, 34, '2019-01-20 00:49:18', '2019-03-03 02:37:42', 1),
(10, 11, 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', NULL, NULL, 4, NULL, NULL, 16, 9, 2, 10, 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', NULL, '2019-01-01', '2019-01-31', 200, 200, 200, 200, 200, 200, 5, '2019-01-31', NULL, 24, '2019-02-08', '454', 2, 24, '2019-02-08', '4545', 2, 'uploaded_files/Unapprove_Project/Unapprove_Project_7f14909f5f1397301226acb82172b8d0.pdf', 1, 1, 1, 34, 34, '2019-01-22 04:24:26', '2019-03-02 03:43:50', 1),
(12, 28, 'Greater Faridpur Rural', 'Greater Faridpur Rural', NULL, '2020', 4, NULL, NULL, 16, 10, 1, 10, 'Greater Faridpur Rural', NULL, '2019-01-31', '2019-01-31', 200, 2, 2, 2, 2, 2, 2, '2019-01-31', NULL, 42, '2019-02-21', '12', 10, 42, '2019-02-27', '12', 10, '', NULL, NULL, NULL, 34, 34, '2019-02-03 02:45:49', '2019-02-26 02:21:31', 1),
(14, 54, 'Third Urban Governance and Infrastructure Improvement', 'Third Urban Governance and Infrastructure Improvement', NULL, NULL, 4, NULL, NULL, 16, 11, 1, 10, 'Third Urban Governance and Infrastructure Improvement', NULL, '2019-01-01', '2019-08-31', 50000, 20000, 5000, 3000, 500, 5000, 5, '2019-02-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34, 34, '2019-02-15 22:32:02', '2019-02-15 22:32:02', 1),
(15, 47, 'Girder Bridge over Baro Baliatoli Andermanik River at Kalapara Upazila under Patuakhali District.', 'পটুয়াখালী জেলার কালাপাড়া উপজেলায় বারো বালিতলী আন্দারমানিক নদীর উপর গির্ডার সেতু।', NULL, NULL, 5, NULL, NULL, 16, 11, 2, 11, 'পটুয়াখালী জেলার কালাপাড়া উপজেলায় বারো বালিতলী আন্দারমানিক নদীর উপর গির্ডার সেতু।', NULL, '2019-02-03', '2019-02-03', 111111, 21, 2222, 12, 12, 1, 1, '2019-02-03', NULL, 34, '2019-02-14', '34', 16, 34, '2019-02-03', '34', 16, '', NULL, NULL, NULL, 34, 34, '2019-02-16 22:54:36', '2019-02-16 22:54:36', 1),
(16, 55, 'Rural Infrastructure', 'Rural Infrastructure', NULL, NULL, 4, NULL, NULL, 16, 11, 1, 10, 'Rural Infrastructure', NULL, '2019-02-18', '2019-08-31', 500, 300, 100, 200, 100, 100, 80, '2019-02-28', NULL, 34, '2019-02-19', '1002', 16, 34, '2019-02-19', '2002', 16, 'uploaded_files/Unapprove_Project/Unapprove_Project_572f5639a1673c33da241a638a65b1dd.xlsx', NULL, NULL, NULL, 34, 34, '2019-02-18 05:38:38', '2019-02-18 05:40:59', 1),
(17, 57, 'This is project Title', 'This is project title bangla', NULL, NULL, 4, NULL, NULL, 16, 11, 1, 10, 'This is objectives English', NULL, '2019-02-20', '2019-02-22', 2000, 100, 100, 50, 50, 100, 70, '2019-02-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34, 34, '2019-02-19 03:22:26', '2019-02-19 03:22:26', 1),
(18, 45, 'hi', 'hello', NULL, NULL, 5, NULL, NULL, 16, 11, 2, 11, 'we', 'bangla', '2019-02-21', '2019-02-28', 12222, 12, 12, 1, 1, 1, 12, '2019-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34, 34, '2019-02-20 00:34:28', '2019-02-20 00:34:28', 1),
(19, 52, 'Rural Infrastructure Development Project', 'Rural Infrastructure Development Project', NULL, 'testfd1', 5, NULL, NULL, 16, 11, 2, 11, 'Rural Infrastructure Development Project', 'Rural Infrastructure Development Project', '2019-02-20', '2019-02-20', 12313, 123, 123, 123, 213, 123, 123, '2019-02-20', NULL, 5, '2019-02-27', '4545', 2, 5, '2019-02-28', '454', 2, '', NULL, NULL, NULL, 34, 34, '2019-02-20 01:59:57', '2019-02-27 01:52:28', 1),
(20, 34, 'IBCS TEST code', 'IBCS TEST code', '2019171001pt', '101244test', 4, NULL, NULL, 17, 10, 1, 10, 'sdfgsd', 'sdfsdf', '2019-02-20', '2019-02-20', 55, 5, 5, 5, 5, 5, 5, '2019-02-20', NULL, 34, '2019-02-27', '4545', 16, 34, '2019-02-27', '454', 16, 'uploaded_files/Unapprove_Project/Unapprove_Project_db5b4cf25799ecffc98c9a93dd74c893.pdf', 1, NULL, 1, 34, 34, '2019-02-20 02:17:31', '2019-02-27 00:39:35', 1),
(21, 61, 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', '2019_s1_s1_m1_a3_p2_061', '2002', 5, NULL, NULL, 16, 11, 1, 10, 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', '2019-02-25', '2019-04-30', 500, 300, 200, 200, 200, 200, 5, '2019-02-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 28, 28, '2019-02-25 23:18:15', '2019-02-26 22:55:11', 1),
(22, 69, 'dd', 'dd', '2019_s1_s1_m2_a1_p1_069', NULL, 4, NULL, NULL, 17, 9, 1, 10, 'fg', 'gfh', '2019-02-01', '2019-03-21', 200, 22, 22, 22, 22, 22, 22, '2019-02-28', NULL, 5, '2019-02-28', '45', 12, 5, '2019-02-28', '45', 12, '', 1, NULL, 1, 30, 30, '2019-02-27 04:20:55', '2019-02-27 04:22:26', 1),
(23, 70, 'ghg', 'ghg', '2019_s1_s1_m1_a1_p1_070', '2019_s1_s1_m1_a1_p1_070', 4, NULL, NULL, 16, 9, 1, 10, 'gh', 'gh', '2019-03-01', '2019-03-31', 200, 22, 22, 22, 22, 22, 2, '2019-03-21', NULL, 5, '2019-03-02', '5454', 13, 5, '2019-03-02', '5454', 13, 'uploaded_files/Unapprove_Project/Unapprove_Project_31e3a8ce7de3e6ab17a03773a39fd8f3.pdf', NULL, NULL, NULL, 34, 34, '2019-03-02 02:05:19', '2019-03-03 03:08:48', 1),
(24, 71, 'Project for Rural aid', 'গ্রামীণ সাহায্য প্রকল্প', '2019160901pt', '2019160901pt', 4, NULL, NULL, 16, 9, 1, 10, 'Although Bangladesh has achieved significant success in increasing access to water and sanitation in recent years, issues such as poor water quality, lack of functional water sources, unsafe sanitation, and poor hygiene behaviour, including widespread stigma around menstrual hygiene, still persist in many parts of the country', 'সাম্প্রতিক বছরগুলিতে পানি এবং স্যানিটেশন ব্যবহারের ক্ষেত্রে বাংলাদেশ উল্লেখযোগ্য সাফল্য অর্জন করেছে, যদিও মদ্যপের জলবায়ু, কার্যকরী পানি উৎসের অভাব, অনিরাপদ স্যানিটেশন এবং গরীব স্বাস্থ্যবিধি সম্পর্কিত আচরণ, মাসিক স্বাস্থ্যবিধি সম্পর্কে ব্যাপক কলঙ্ক সহ এখনও অনেকগুলি অংশে রয়েছে।', '2019-03-03', '2019-03-03', 100, 80, 20, 20, 20, 20, 2, '2019-03-03', NULL, 5, '2019-03-20', '56', 15, 5, '2019-03-28', '56', 15, '', NULL, NULL, NULL, 34, 34, '2019-03-02 23:23:46', '2019-03-03 03:07:47', 1),
(25, 76, 'Head Quarter Road over the Teesta River at Sundarganj Upazila under Gaibandha district ( 1st Revised) Project.', 'গাইবান্ধা জেলার সুন্দরগঞ্জ উপজেলার তিস্তা নদীর উপর হেড কোয়ার্টার রোড (প্রথম সংশোধিত) প্রকল্প।', '2019_s4_s4_m1_a1_p2_076', NULL, 5, NULL, NULL, 16, 9, 10, 15, 'Head Quarter Road over the Teesta River at Sundarganj Upazila under Gaibandha district ( 1st Revised) Project.', 'গাইবান্ধা জেলার সুন্দরগঞ্জ উপজেলার তিস্তা নদীর উপর হেড কোয়ার্টার রোড (প্রথম সংশোধিত) প্রকল্প।', '2019-03-20', '2020-03-20', 500000, 200000, 0, 300000, 0, 0, 0, '2019-03-04', NULL, 6, '2019-03-07', '1213', 15, 6, '2019-03-06', '2213', 15, 'uploaded_files/Unapprove_Project/Unapprove_Project_3b91e069ef2eada7cf0f8b72cca0dedc.jpg', 1, 1, 1, 34, 34, '2019-03-03 23:56:03', '2019-03-04 01:16:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `approved_project_linkages_and_targets`
--

CREATE TABLE `approved_project_linkages_and_targets` (
  `id` int(11) NOT NULL,
  `unapprove_project_id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `relaion` tinyint(4) DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  `target` int(11) DEFAULT NULL,
  `scale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landsize` text COLLATE utf8mb4_unicode_ci,
  `acquisition` tinyint(4) DEFAULT NULL,
  `fesibility_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approved_project_linkages_and_targets`
--

INSERT INTO `approved_project_linkages_and_targets` (`id`, `unapprove_project_id`, `type`, `relaion`, `goal`, `target`, `scale`, `landsize`, `acquisition`, `fesibility_date`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 47, 1, 1, 2, 2, NULL, NULL, NULL, NULL, 34, 34, 1, '2019-02-16 22:54:36', '2019-02-16 22:54:36'),
(2, 47, 2, 1, 10, 8, NULL, NULL, NULL, NULL, 34, 34, 1, '2019-02-16 22:54:36', '2019-02-16 22:54:36'),
(21, 55, 1, 1, 3, 3, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-19 09:47:08', '2019-02-19 09:47:08'),
(22, 55, 1, 1, 3, 1, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-19 09:47:08', '2019-02-19 09:47:08'),
(23, 55, 2, 1, 9, 8, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-19 09:47:08', '2019-02-19 09:47:08'),
(24, 55, 2, 1, 10, 7, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-19 09:47:08', '2019-02-19 09:47:08'),
(26, 55, 5, 1, 0, 0, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-19 09:47:08', '2019-02-19 09:47:08'),
(51, 45, 1, 1, 3, 1, NULL, NULL, NULL, NULL, 34, 34, 1, '2019-02-20 00:34:28', '2019-02-20 00:34:28'),
(59, 10, 1, 1, 3, 1, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-20 09:10:26', '2019-02-20 09:10:26'),
(101, 28, 5, 1, 0, 0, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-25 06:17:18', '2019-02-25 06:17:18'),
(151, 1, 1, 1, 2, 2, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-03-02 08:26:39', '2019-03-02 08:26:39'),
(152, 1, 2, 1, 10, 8, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-03-02 08:26:39', '2019-03-02 08:26:39'),
(153, 1, 5, 1, 1, 2, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-03-02 08:26:39', '2019-03-02 08:26:39'),
(154, 1, 5, 1, 2, 3, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-03-02 08:26:39', '2019-03-02 08:26:39'),
(155, 1, 6, 1, 4, 1, '0-20', NULL, NULL, NULL, 24, 24, 1, '2019-03-02 08:26:39', '2019-03-02 08:26:39'),
(160, 70, 8, 1, NULL, NULL, NULL, NULL, NULL, '2019-03-03', 24, 24, 1, '2019-03-03 08:31:40', '2019-03-03 08:31:40'),
(162, 76, 3, 1, 1, 4, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-03-04 06:00:02', '2019-03-04 06:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `approved_project_locations`
--

CREATE TABLE `approved_project_locations` (
  `id` int(11) NOT NULL,
  `unapprove_project_id` int(11) NOT NULL,
  `division` tinyint(4) DEFAULT NULL,
  `rmo` tinyint(4) DEFAULT NULL,
  `district` tinyint(4) DEFAULT NULL,
  `upazila` tinyint(4) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `approved_project_locations`
--

INSERT INTO `approved_project_locations` (`id`, `unapprove_project_id`, `division`, `rmo`, `district`, `upazila`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(4, 11, 3, 1, 8, 3, 200, 34, 24, '2019-01-22 04:24:26', '2019-01-28 02:20:53', 1),
(5, 11, 3, NULL, 1, 3, 78, 24, 24, '2019-01-28 00:46:08', '2019-01-28 02:20:32', NULL),
(6, 1, 3, NULL, 7, 2, 789, 24, 24, '2019-01-28 01:01:42', '2019-02-11 03:55:26', NULL),
(7, 28, 3, 1, 1, 2, 2, 34, 34, '2019-02-03 02:45:49', '2019-02-03 02:45:49', 1),
(8, 54, 3, 0, 1, 2, NULL, 34, 34, '2019-02-15 22:32:02', '2019-02-15 22:32:02', 1),
(9, 47, 3, 1, 7, 3, NULL, 34, 34, '2019-02-16 22:54:36', '2019-02-16 22:54:36', 1),
(10, 47, 3, 2, 8, 2, NULL, 34, 34, '2019-02-16 22:54:36', '2019-02-16 22:54:36', 1),
(11, 55, 3, 0, 7, 8, NULL, 34, 34, '2019-02-18 05:38:38', '2019-02-18 05:38:38', 1),
(12, 57, 3, 0, 7, 8, NULL, 34, 34, '2019-02-19 03:22:26', '2019-02-19 03:22:26', 1),
(13, 57, 3, 0, 8, 3, NULL, 34, 34, '2019-02-19 03:22:26', '2019-02-19 03:22:26', 1),
(14, 45, 3, 1, 7, 3, NULL, 34, 34, '2019-02-20 00:34:28', '2019-02-20 00:34:28', 1),
(15, 52, 3, 0, 7, 3, NULL, 34, 34, '2019-02-20 01:59:57', '2019-02-20 01:59:57', 1),
(16, 61, 3, 0, 1, 2, NULL, 28, 28, '2019-02-25 23:18:15', '2019-02-25 23:18:15', 1),
(17, 69, 3, 0, 7, 8, NULL, 30, 30, '2019-02-27 04:20:55', '2019-02-27 04:20:55', 1),
(18, 70, 3, 0, 7, 8, NULL, 34, 34, '2019-03-02 02:05:19', '2019-03-02 02:05:19', 1),
(19, 71, 3, 0, 1, 5, NULL, 34, 34, '2019-03-02 23:23:46', '2019-03-02 23:23:46', 1),
(20, 71, NULL, 0, NULL, NULL, NULL, 34, 34, '2019-03-02 23:23:46', '2019-03-02 23:23:46', 1),
(21, 76, 3, 0, 7, 8, NULL, 34, 34, '2019-03-03 23:56:03', '2019-03-03 23:56:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `approved_project_source_details`
--

CREATE TABLE `approved_project_source_details` (
  `id` int(11) NOT NULL,
  `unapprove_project_id` int(11) NOT NULL,
  `finanacing_source` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `approved_project_source_details`
--

INSERT INTO `approved_project_source_details` (`id`, `unapprove_project_id`, `finanacing_source`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 2, 1, 500, 34, 34, '2019-01-17 03:56:13', '2019-01-17 03:56:13', 1),
(2, 2, 1, 300, 34, 34, '2019-01-17 03:56:13', '2019-01-17 03:56:13', 1),
(10, 5, 2, 126, 24, 24, '2019-01-22 00:12:32', '2019-01-22 00:12:32', NULL),
(11, 5, 2, 1235, 24, 24, '2019-01-22 00:12:32', '2019-01-22 00:12:32', NULL),
(21, 11, 1, 200, 24, 24, '2019-01-22 04:36:55', '2019-01-22 04:36:55', NULL),
(22, 11, 2, 200, 24, 24, '2019-01-22 04:36:55', '2019-01-22 04:36:55', NULL),
(29, 10, 1, 200, 34, 34, '2019-01-22 23:58:01', '2019-01-22 23:58:01', NULL),
(61, 1, 1, 1212, 24, 24, '2019-02-07 01:58:28', '2019-02-07 01:58:28', NULL),
(62, 1, 2, 787, 24, 24, '2019-02-07 01:58:28', '2019-02-07 01:58:28', NULL),
(64, 54, 1, 20, 34, 34, '2019-02-15 22:32:02', '2019-02-15 22:32:02', 1),
(65, 47, 2, 12, 34, 34, '2019-02-16 22:54:36', '2019-02-16 22:54:36', 1),
(66, 55, 1, 100, 34, 34, '2019-02-18 05:38:38', '2019-02-18 05:38:38', 1),
(67, 55, 2, 100, 34, 34, '2019-02-18 05:38:38', '2019-02-18 05:38:38', 1),
(68, 57, 1, 10, 34, 34, '2019-02-19 03:22:26', '2019-02-19 03:22:26', 1),
(69, 45, 2, 10, 34, 34, '2019-02-20 00:34:28', '2019-02-20 00:34:28', 1),
(70, 52, 2, 23, 34, 34, '2019-02-20 01:59:57', '2019-02-20 01:59:57', 1),
(71, 34, 1, 5, 34, 34, '2019-02-20 02:17:31', '2019-02-20 02:17:31', 1),
(72, 34, 2, 5, 34, 34, '2019-02-20 02:17:31', '2019-02-20 02:17:31', 1),
(73, 61, 1, 100, 28, 28, '2019-02-25 23:18:15', '2019-02-25 23:18:15', 1),
(74, 61, 2, 100, 28, 28, '2019-02-25 23:18:15', '2019-02-25 23:18:15', 1),
(89, 28, 1, 2, 42, 42, '2019-02-26 02:21:31', '2019-02-26 02:21:31', NULL),
(90, 28, 1, 2, 42, 42, '2019-02-26 02:21:31', '2019-02-26 02:21:31', NULL),
(91, 69, 1, 22, 30, 30, '2019-02-27 04:20:55', '2019-02-27 04:20:55', 1),
(97, 71, 1, 10, 34, 34, '2019-03-03 03:07:47', '2019-03-03 03:07:47', NULL),
(98, 71, 2, 10, 34, 34, '2019-03-03 03:07:47', '2019-03-03 03:07:47', NULL),
(99, 71, 0, 0, 34, 34, '2019-03-03 03:07:47', '2019-03-03 03:07:47', NULL),
(100, 70, 1, 22, 34, 34, '2019-03-03 03:08:48', '2019-03-03 03:08:48', NULL),
(101, 70, 2, 22, 34, 34, '2019-03-03 03:08:48', '2019-03-03 03:08:48', NULL),
(102, 76, 1, 300000, 34, 34, '2019-03-03 23:56:03', '2019-03-03 23:56:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `approved_project_year_wise_costs`
--

CREATE TABLE `approved_project_year_wise_costs` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `fiscal_year` int(11) DEFAULT NULL,
  `gob` double NOT NULL,
  `gob_fe` double NOT NULL,
  `pa_rpa` double NOT NULL,
  `pa_dpa` double NOT NULL,
  `own_fund` double NOT NULL,
  `others` double NOT NULL,
  `mention` double NOT NULL,
  `ownfund_fe` double NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `approved_project_year_wise_costs`
--

INSERT INTO `approved_project_year_wise_costs` (`id`, `project_id`, `fiscal_year`, `gob`, `gob_fe`, `pa_rpa`, `pa_dpa`, `own_fund`, `others`, `mention`, `ownfund_fe`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(2, 1, 13, 456, 123, 2541, 67, 123, 2, 4, 87, 24, 34, '2019-01-27 02:27:50', '2019-01-29 01:01:21', NULL),
(3, 1, 13, 100, 25, 12, 12, 50, 12, 12, 50, 24, 24, '2019-02-05 22:49:44', '2019-02-05 22:49:44', NULL),
(4, 76, 15, 100000, 0, 0, 0, 0, 0, 0, 0, 40, 40, '2019-03-03 23:58:17', '2019-03-03 23:58:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attachment_details`
--

CREATE TABLE `attachment_details` (
  `id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `attachment_type` tinyint(4) NOT NULL COMMENT '1=>''unapprove_Project'',2=>''approve_Project'',3=>''Adp_Allocation'',4=>''Radp_Allocation'',5=>''guideline''',
  `attachment_details` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `attachment_path` varchar(250) CHARACTER SET latin1 NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attachment_details`
--

INSERT INTO `attachment_details` (`id`, `ref_id`, `project_id`, `attachment_type`, `attachment_details`, `attachment_path`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 5, NULL, 5, NULL, 'uploaded_files/guideline/guideline_6c2450380342d9d9236f2b5b1aa1466a.pdf', 34, 34, '2019-01-24 05:52:12', '2019-01-24 05:52:12'),
(4, 6, NULL, 5, NULL, 'uploaded_files/guideline/guideline_a89909ddc614368eebce50cad94c8022.pdf', 34, 34, '2019-01-24 05:54:54', '2019-01-24 05:54:54'),
(5, 7, NULL, 5, NULL, 'uploaded_files/guideline/guideline_4bf85db3adb0841296ed96fdefe8b7a3.pdf', 34, 34, '2019-01-24 05:56:08', '2019-01-24 05:56:08'),
(6, 8, NULL, 5, NULL, 'uploaded_files/guideline/guideline_bdfaf56d7f170a827b8b7501ed209149.pdf', 34, 34, '2019-01-24 05:59:25', '2019-01-24 05:59:25'),
(10, 10, 10, 1, NULL, 'uploaded_files/Unapprove_Project/Unapprove_Project_bbdbe688072b7904c4ca894966d0cc18.pdf', 34, 34, '2019-01-29 04:40:23', '2019-01-29 04:40:23'),
(11, 1, NULL, 5, NULL, 'uploaded_files/guideline/guideline_bee829271a29a12d6f58330703db632c.pdf', 34, 34, '2019-01-31 04:46:28', '2019-01-31 04:46:28'),
(12, 2, NULL, 5, NULL, 'uploaded_files/guideline/guideline_039df8eda2b02f2d79e6d6dca87feba8.pdf', 24, 24, '2019-01-31 11:26:38', '2019-01-31 11:26:38'),
(13, 3, NULL, 5, NULL, 'uploaded_files/guideline/guideline_4a2ead320fff7a090069b56f26664b65.png', 24, 24, '2019-01-31 11:33:01', '2019-01-31 11:33:01'),
(14, 10, 10, 1, NULL, 'uploaded_files/Unapprove_Project/Unapprove_Project_4655366511e7d47d8d8a76fd7e2dd544.pdf', 24, 24, '2019-02-07 05:58:25', '2019-02-07 05:58:25'),
(15, 10, 10, 1, NULL, 'uploaded_files/Unapprove_Project/Unapprove_Project_7f14909f5f1397301226acb82172b8d0.pdf', 24, 24, '2019-02-07 05:59:11', '2019-02-07 05:59:11'),
(16, 28, 28, 1, NULL, 'uploaded_files/Unapprove_Project/Unapprove_Project_f518a00357a04ce78eda8294fb0fd6d1.pdf', 24, 24, '2019-02-07 06:00:28', '2019-02-07 06:00:28'),
(17, 28, 28, 1, NULL, 'uploaded_files/Unapprove_Project/Unapprove_Project_5ecc428aeb8ca6e5b7a65ea65a757267.pdf', 24, 24, '2019-02-07 06:02:03', '2019-02-07 06:02:03'),
(18, 28, 28, 1, NULL, 'uploaded_files/Unapprove_Project/Unapprove_Project_415e18d9dc4b8251a813e6029a4780f5.pdf', 24, 24, '2019-02-07 06:27:22', '2019-02-07 06:27:22'),
(19, 28, 28, 1, NULL, 'uploaded_files/Unapprove_Project/Unapprove_Project_c8755c0f723a4c69e4129a66af607d75.pdf', 24, 24, '2019-02-07 06:29:06', '2019-02-07 06:29:06'),
(20, 28, 28, 1, NULL, 'uploaded_files/Unapprove_Project/Unapprove_Project_0ab57293002618580b0be08220a8c0fe.pdf', 24, 24, '2019-02-07 06:30:19', '2019-02-07 06:30:19'),
(21, 28, 28, 1, NULL, 'uploaded_files/Unapprove_Project/Unapprove_Project_f70d8f2c9b143dd2e4aa9920c6c9d4ab.pdf', 24, 24, '2019-02-07 06:32:12', '2019-02-07 06:32:12'),
(22, 28, 28, 1, NULL, 'uploaded_files/Unapprove_Project/Unapprove_Project_9972a5bfaab20afbc5345ff856caaca3.pdf', 24, 24, '2019-02-07 06:33:10', '2019-02-07 06:33:10'),
(23, 1, 1, 1, NULL, 'uploaded_files/Unapprove_Project/Unapprove_Project_d4b4dce167d9d67b4ddcc5d8a4d13b49.pdf', 24, 24, '2019-02-07 07:58:02', '2019-02-07 07:58:02'),
(27, 11, NULL, 6, NULL, 'uploaded_files/Fa_budget_and_accounts/Fa_budget_and_accounts_47b2dbe20f8655c82dac4dbba2727f2b.csv', 24, 24, '2019-02-17 09:39:13', '2019-02-17 09:39:13'),
(30, 55, 55, 1, NULL, 'uploaded_files/Unapprove_Project/Unapprove_Project_572f5639a1673c33da241a638a65b1dd.xlsx', 34, 34, '2019-02-18 11:40:59', '2019-02-18 11:40:59'),
(31, 5, NULL, 6, NULL, 'uploaded_files/Fa_budget_and_accounts/Fa_budget_and_accounts_6cb3d1c3cf99739119a83aa1c4c4652a.pdf', 24, 24, '2019-02-20 09:35:34', '2019-02-20 09:35:34'),
(32, 5, NULL, 6, NULL, 'uploaded_files/Fa_budget_and_accounts/Fa_budget_and_accounts_16258fe4b88833d5b5510f9007b67380.xlsx', 24, 24, '2019-02-24 05:19:51', '2019-02-24 05:19:51'),
(33, 34, 34, 1, NULL, 'uploaded_files/Unapprove_Project/Unapprove_Project_db5b4cf25799ecffc98c9a93dd74c893.pdf', 34, 34, '2019-02-27 06:39:12', '2019-02-27 06:39:12'),
(34, 70, 70, 1, NULL, 'uploaded_files/Unapprove_Project/Unapprove_Project_31e3a8ce7de3e6ab17a03773a39fd8f3.pdf', 28, 28, '2019-03-02 08:06:46', '2019-03-02 08:06:46'),
(35, 76, 76, 1, NULL, 'uploaded_files/Unapprove_Project/Unapprove_Project_3b91e069ef2eada7cf0f8b72cca0dedc.jpg', 40, 40, '2019-03-04 06:01:15', '2019-03-04 06:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `budget_heads`
--

CREATE TABLE `budget_heads` (
  `id` int(10) UNSIGNED NOT NULL,
  `budget_head_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget_head_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget_head_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) NOT NULL,
  `updated_by` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `budget_heads`
--

INSERT INTO `budget_heads` (`id`, `budget_head_name`, `budget_head_name_bn`, `budget_head_description`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 'ddd', '', 'dfdf', 0, '2019-01-06 04:30:01', '2019-01-06 04:47:47', '2019-01-06 04:47:47', 24, 24),
(2, 'head 2', '', 'this is desc', 1, '2019-01-06 04:48:33', '2019-01-06 22:22:59', '2019-01-06 22:22:59', 24, 24),
(3, 'uuu', '', '99', 1, '2019-01-06 22:21:49', '2019-01-06 22:22:55', '2019-01-06 22:22:55', 24, 24),
(4, 'fdf', '', 'dfdf', 1, '2019-01-06 22:24:19', '2019-01-08 23:09:46', '2019-01-08 23:09:46', 24, 24),
(5, '', '', 'dfdf', 0, '2019-01-06 23:52:35', '2019-01-06 23:54:56', '2019-01-06 23:54:56', 24, 24),
(6, 'fg', '', 'fd', 1, '2019-01-06 23:55:14', '2019-01-08 23:09:51', '2019-01-08 23:09:51', 24, 24),
(7, 'This is test budget head', '', 'description', 0, '2019-01-08 23:09:24', '2019-01-13 21:48:30', NULL, 24, 24),
(8, 'our name', 'আমাদের নাম আমাদের নাম', 'adfafd', 1, '2019-02-26 03:12:29', '2019-02-26 03:15:57', '2019-02-26 03:15:57', 24, 24);

-- --------------------------------------------------------

--
-- Table structure for table `claimate_change_goals`
--

CREATE TABLE `claimate_change_goals` (
  `id` int(10) UNSIGNED NOT NULL,
  `goal_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `claimate_change_goals`
--

INSERT INTO `claimate_change_goals` (`id`, `goal_no`, `goal_name`, `description`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'asdfafs', 'asdf', '', 0, NULL, 0, '2019-01-16 03:08:11', NULL, '2019-01-16 03:08:11'),
(2, 'Water001 asdf', 'Water Resource afdsf', 'Lmao af', 1, 24, 24, '2019-01-16 03:19:12', '2019-01-16 02:14:52', '2019-01-16 03:19:12'),
(3, 'asdf', 'asdfa', 'asdfasdf', 1, 24, 24, '2019-01-16 22:44:56', '2019-01-16 02:15:05', '2019-01-16 22:44:56'),
(4, 'asdf', 'asdfa', 'asdfasdf', 1, 24, 24, '2019-01-16 22:44:59', '2019-01-16 02:15:48', '2019-01-16 22:44:59'),
(5, 'asdf', 'afdsa', 'afds', 1, 24, 24, '2019-01-16 22:45:02', '2019-01-16 02:15:56', '2019-01-16 22:45:02'),
(6, 'asdf', 'afdsa', 'afds', 1, 24, 24, '2019-01-16 22:45:04', '2019-01-16 02:17:11', '2019-01-16 22:45:04'),
(7, 'AAAAAAAAA', 'NNNNNNNN', 'MMMMMMM', 1, 24, 24, '2019-01-16 03:22:20', '2019-01-16 03:21:42', '2019-01-16 03:22:20'),
(8, 'GN0081', 'Increase Education Goods', 'The main purpose is to increase the educational goods.', 1, 24, 24, '2019-01-17 02:32:59', '2019-01-16 22:46:38', '2019-01-17 02:32:59'),
(9, 'GN010', 'Greater Water Controlling System', 'Upgrade the WASA and their policy to solve problems.', 1, 24, 24, NULL, '2019-01-16 22:48:11', '2019-01-16 22:48:11'),
(10, 'Water001', 'Water Resource', 'a b c', 1, 24, 24, NULL, '2019-01-17 02:33:15', '2019-01-17 02:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `climate_change_targets`
--

CREATE TABLE `climate_change_targets` (
  `id` int(10) UNSIGNED NOT NULL,
  `goal_id` int(11) NOT NULL,
  `targets` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `climate_change_targets`
--

INSERT INTO `climate_change_targets` (`id`, `goal_id`, `targets`, `description`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 8, 'a) Bulid more school,collage,university. b) Give opportunity for elders to gain proper education with practical training.', 'Bulid more school,collage,university, Give opportunity for elders to gain proper education with practical training.', 1, 24, 24, '2019-01-17 02:51:27', '2019-01-17 00:42:48', '2019-01-17 02:51:27'),
(5, 9, 'rty', 'hhhhhhhhhhhhhhh', 1, 24, 24, '2019-01-17 02:51:35', '2019-01-17 02:48:24', '2019-01-17 02:51:35'),
(6, 10, 'yiiiiooooooooo', 'ydhhhhhhh', 1, 24, 24, '2019-01-17 02:51:37', '2019-01-17 02:48:39', '2019-01-17 02:51:37'),
(7, 9, 'Design, build and planning of the process control system', 'Design, build and planning of the process control system', 1, 24, 24, NULL, '2019-01-18 22:35:54', '2019-01-18 22:35:54'),
(8, 10, 'Control Panel design, layout and fabrication', 'Control Panel design, layout and fabrication', 1, 24, 24, NULL, '2019-01-18 22:36:16', '2019-01-18 22:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `demands`
--

CREATE TABLE `demands` (
  `id` int(11) NOT NULL,
  `demand_type` int(11) NOT NULL,
  `project_code` varchar(255) CHARACTER SET utf8 NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_status` int(11) NOT NULL,
  `approved_status` int(11) NOT NULL,
  `project_cost_total` double NOT NULL,
  `project_fe` double NOT NULL,
  `project_aid` double NOT NULL,
  `project_rpa` double NOT NULL,
  `project_sf` double NOT NULL,
  `original_fiscal_year` int(11) DEFAULT NULL,
  `original_total` double DEFAULT NULL,
  `original_taka` double DEFAULT NULL,
  `actual_total` double NOT NULL,
  `actual_total_fe` double NOT NULL,
  `actual_taka` double NOT NULL,
  `actual_capital` double NOT NULL,
  `actual_capital_rpa` double NOT NULL,
  `actual_capital_revenue` double NOT NULL,
  `actual_cdvat` double NOT NULL,
  `actual_cdvat_pa` double NOT NULL,
  `actual_cdvat_rpa` double NOT NULL,
  `cumulative_total` double DEFAULT NULL,
  `cumulative_taka` double DEFAULT NULL,
  `allocation_total` double NOT NULL,
  `allocation_taka` double NOT NULL,
  `allocation_revenue` double NOT NULL,
  `capital` double NOT NULL,
  `capital_rpa` double NOT NULL,
  `capital_revenue` double NOT NULL,
  `cdvat` double NOT NULL,
  `cdvat_pa` double NOT NULL,
  `cdvat_rpa` double NOT NULL,
  `cdvat_dpa` double NOT NULL,
  `allocation_others` double NOT NULL,
  `source_of_project_aid` int(11) DEFAULT NULL,
  `source_amount` double DEFAULT NULL,
  `self_finance` double NOT NULL,
  `demand_status` tinyint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demands`
--

INSERT INTO `demands` (`id`, `demand_type`, `project_code`, `project_id`, `project_status`, `approved_status`, `project_cost_total`, `project_fe`, `project_aid`, `project_rpa`, `project_sf`, `original_fiscal_year`, `original_total`, `original_taka`, `actual_total`, `actual_total_fe`, `actual_taka`, `actual_capital`, `actual_capital_rpa`, `actual_capital_revenue`, `actual_cdvat`, `actual_cdvat_pa`, `actual_cdvat_rpa`, `cumulative_total`, `cumulative_taka`, `allocation_total`, `allocation_taka`, `allocation_revenue`, `capital`, `capital_rpa`, `capital_revenue`, `cdvat`, `cdvat_pa`, `cdvat_rpa`, `cdvat_dpa`, `allocation_others`, `source_of_project_aid`, `source_amount`, `self_finance`, `demand_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 1, '10012', 2, 2, 1, 4545, 45, 45, 45, 45, 13, 45, 45, 45, 45, 45, 0, 0, 0, 0, 0, 0, 45, 45, 45, 45, 5, 10, 10, 10, 45, 5, 5, 5, 45, NULL, NULL, 12, NULL, 24, 24, '2019-01-18 22:34:31', '2019-01-29 01:14:16', NULL, 1),
(3, 1, '1001', 10, 2, 1, 200, 200, 200, 200, 200, 13, 55, 55, 55, 55, 55, 0, 0, 0, 0, 0, 0, 55, 55, 55, 55, 55, 55, 55, 55, 55, 55, 55, 55, 55, NULL, NULL, 55, NULL, 28, 34, '2019-01-19 23:59:36', '2019-01-24 00:28:55', NULL, 1),
(4, 1, '11007', 1, 2, 1, 120000, 120000, 111, 1111, 120000, 13, NULL, NULL, 12000000, 12222, 120000, 100000, 100200, 20000, 12, 12, 12, 120000, NULL, 23000000, 2300000, 2300000, 1000000, 1000, 10000000, 10000000, 10000000, 12000, 10000, 2300000, NULL, NULL, 2300000, NULL, 24, 24, '2019-01-27 03:04:11', '2019-01-29 00:46:23', NULL, 1),
(14, 1, '5005', 28, 2, 1, 200, 2, 2, 2, 200, 13, NULL, NULL, 55, 55, 55, 555, 5, 5, 5, 5, 5, 55, NULL, 55, 55, 5, 5, 5, 5, 5, 5, 5, 5, 5, NULL, NULL, 5, NULL, 40, 24, '2019-02-05 01:08:02', '2019-02-05 23:26:35', NULL, 1),
(16, 1, '100010', 11, 2, 1, 200, 200, 200, 200, 200, 13, NULL, NULL, 45, 54, 45, 54, 45, 54, 45, 45, 54, 45, NULL, 54, 500, 54, 54, 45, 45, 54, 45, 45, 45, 45, NULL, NULL, 45, 1, 40, 24, '2019-02-06 04:28:31', '2019-02-07 03:33:39', NULL, 1),
(17, 1, '50005', 5, 2, 1, 2211, 2121, 1414, 1212, 2211, NULL, NULL, NULL, 454, 45, 45, 45, 45, 45, 45, 45, 45, NULL, NULL, 45454, 45, 45, 45, 45, 45, 45, 5, 54, 54, 45, NULL, NULL, 45, NULL, 40, 40, '2019-02-12 00:47:50', '2019-02-12 00:47:50', NULL, 1),
(18, 1, '5005', 55, 2, 1, 500, 100, 200, 100, 500, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 500, 200, 300, 55, 55, 55, 55, 55, 55, 55, 55, NULL, NULL, 55, NULL, 40, 40, '2019-02-18 05:48:00', '2019-02-18 05:48:00', NULL, 1),
(20, 1, '2019_s1_s1_m2_a1_p1_069', 69, 2, 1, 200, 22, 22, 22, 200, NULL, NULL, NULL, 55, 55, 55, 55, 5, 5, 5, 5, 5, NULL, NULL, 55, 55, 55, 5, 5, 5, 5, 5, 5, 5, 5, NULL, NULL, 5, NULL, 40, 40, '2019-02-27 04:49:01', '2019-02-27 04:49:01', NULL, 1),
(21, 1, '2019_s1_s1_m1_a1_p1_070', 70, 2, 1, 200, 22, 22, 22, 200, NULL, NULL, NULL, 55, 55, 55, 55, 55, 5, 55, 5, 5, NULL, NULL, 78, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, NULL, NULL, 8, NULL, 40, 40, '2019-03-02 02:12:13', '2019-03-02 02:12:13', NULL, 1),
(22, 1, '2019_s4_s4_m1_a1_p2_076', 76, 2, 1, 500000, 0, 300000, 0, 500000, NULL, NULL, NULL, 6, 6, 6, 6, 6, 6, 6, 6, 6, NULL, NULL, 6, 6, 6, 6, 5, 6, 6, 6, 6, 6, 5, NULL, NULL, 5, 1, 40, 40, '2019-03-04 00:10:24', '2019-03-04 00:17:26', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `demands_location_details`
--

CREATE TABLE `demands_location_details` (
  `id` int(11) NOT NULL,
  `demand_id` int(11) NOT NULL,
  `project_code` varchar(255) CHARACTER SET utf8 NOT NULL,
  `division` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `upazila_location` double NOT NULL,
  `amount` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `demands_location_details`
--

INSERT INTO `demands_location_details` (`id`, `demand_id`, `project_code`, `division`, `district`, `upazila_location`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 12, '1234', 3, 0, 3, 789, 24, 24, '2019-02-04 03:05:18', '2019-02-04 03:05:18', 1),
(2, 13, '12', 3, 0, 3, 789, 24, 24, '2019-02-04 04:07:14', '2019-02-04 04:07:14', 1),
(3, 20, '2019_s1_s1_m2_a1_p1_069', 3, 0, 8, NULL, 40, 40, '2019-02-27 04:49:01', '2019-02-27 04:49:01', 1),
(4, 21, '2019_s1_s1_m1_a1_p1_070', 3, 0, 8, 200, 40, 40, '2019-03-02 02:12:13', '2019-03-02 02:12:13', 1),
(5, 22, '2019_s4_s4_m1_a1_p2_076', 3, 0, 8, NULL, 40, 40, '2019-03-04 00:10:24', '2019-03-04 00:10:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `demands_status`
--

CREATE TABLE `demands_status` (
  `id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1=Agency, 2=Ministry, 3=Sub Sector, 4=Sector Division, 5=Programming Division',
  `project_id` int(11) NOT NULL,
  `is_forward` tinyint(4) DEFAULT NULL,
  `is_back` tinyint(4) DEFAULT NULL,
  `forward_date` date DEFAULT NULL,
  `back_date` date DEFAULT NULL,
  `send_maker` tinyint(4) DEFAULT NULL,
  `back_checker` tinyint(4) DEFAULT NULL,
  `send_maker_date` date DEFAULT NULL,
  `back_checker_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `demands_status`
--

INSERT INTO `demands_status` (`id`, `type`, `project_id`, `is_forward`, `is_back`, `forward_date`, `back_date`, `send_maker`, `back_checker`, `send_maker_date`, `back_checker_date`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 1, 28, NULL, NULL, NULL, NULL, 1, NULL, '2019-02-07', '2019-02-06', '2019-02-07 03:00:08', '2019-02-07 03:00:08', 40, 40, 1),
(2, 1, 11, 1, NULL, '2019-02-06', NULL, NULL, NULL, '2019-02-06', NULL, '2019-02-06 04:29:12', '2019-02-06 04:29:12', 28, 28, 1),
(3, 2, 11, 1, NULL, '2019-02-06', NULL, NULL, NULL, '2019-02-06', NULL, '2019-02-06 04:30:22', '2019-02-06 04:30:22', 30, 30, 1),
(4, 3, 11, 1, NULL, '2019-02-06', NULL, NULL, NULL, '2019-02-06', NULL, '2019-02-06 04:31:22', '2019-02-06 04:31:22', 35, 35, 1),
(5, 4, 11, 1, NULL, '2019-02-06', NULL, NULL, NULL, '2019-02-06', NULL, '2019-02-06 04:32:54', '2019-02-06 04:32:54', 33, 33, 1),
(6, 5, 11, 1, NULL, '2019-02-06', NULL, NULL, NULL, NULL, NULL, '2019-02-06 04:33:43', '2019-02-06 04:33:43', 34, 34, 1),
(7, 1, 69, 1, NULL, '2019-02-27', NULL, NULL, NULL, '2019-02-27', NULL, '2019-02-27 04:51:12', '2019-02-27 04:51:12', 28, 28, 1),
(8, 2, 69, 1, NULL, '2019-02-27', '2019-02-27', NULL, NULL, '2019-02-27', NULL, '2019-02-27 05:05:21', '2019-02-27 05:05:21', 30, 30, 1),
(9, 4, 69, 1, NULL, '2019-02-27', NULL, NULL, NULL, '2019-02-27', NULL, '2019-02-27 05:06:23', '2019-02-27 05:06:23', 33, 33, 1),
(10, 5, 69, 1, NULL, '2019-02-27', NULL, NULL, NULL, NULL, NULL, '2019-02-27 05:06:58', '2019-02-27 05:06:58', 34, 34, 1),
(11, 1, 70, 1, NULL, '2019-03-02', NULL, NULL, NULL, '2019-03-02', NULL, '2019-03-02 02:17:16', '2019-03-02 02:17:16', 28, 28, 1),
(12, 2, 70, 1, NULL, '2019-03-02', NULL, NULL, NULL, '2019-03-02', NULL, '2019-03-02 02:19:34', '2019-03-02 02:19:34', 30, 30, 1),
(13, 4, 70, 1, NULL, '2019-03-02', NULL, NULL, NULL, '2019-03-02', NULL, '2019-03-02 02:20:25', '2019-03-02 02:20:25', 33, 33, 1),
(14, 5, 70, 1, NULL, '2019-03-02', NULL, NULL, NULL, NULL, NULL, '2019-03-02 02:21:51', '2019-03-02 02:21:51', 34, 34, 1),
(15, 1, 76, 1, NULL, '2019-03-04', NULL, NULL, NULL, '2019-03-04', NULL, '2019-03-04 00:12:19', '2019-03-04 00:12:19', 28, 28, 1),
(16, 2, 76, 1, NULL, '2019-03-04', NULL, NULL, NULL, '2019-03-04', NULL, '2019-03-04 00:14:10', '2019-03-04 00:14:10', 30, 30, 1),
(17, 4, 76, 1, NULL, '2019-03-04', NULL, NULL, NULL, '2019-03-04', NULL, '2019-03-04 00:15:33', '2019-03-04 00:15:33', 33, 33, 1),
(18, 5, 76, 1, NULL, '2019-03-04', NULL, NULL, NULL, NULL, NULL, '2019-03-04 00:16:56', '2019-03-04 00:16:56', 34, 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `demands_status_history`
--

CREATE TABLE `demands_status_history` (
  `id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1=Agency, 2=Ministry, 3=Sub Sector, 4=Sector Division, 5=Programming Division',
  `user_group` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `is_forward` tinyint(4) DEFAULT NULL,
  `is_back` tinyint(4) DEFAULT NULL,
  `forward_date` date DEFAULT NULL,
  `back_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `demands_status_history`
--

INSERT INTO `demands_status_history` (`id`, `type`, `user_group`, `project_id`, `is_forward`, `is_back`, `forward_date`, `back_date`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 1, 13, 2, 1, NULL, '2019-01-20', NULL, '2019-01-20 00:04:06', '2019-01-20 00:04:06', 28, 28, 1),
(2, 2, 12, 2, NULL, 1, NULL, '2019-01-20', '2019-01-20 00:04:24', '2019-01-20 00:04:24', 30, 30, 1),
(3, 1, 13, 10, 1, NULL, '2019-01-20', NULL, '2019-01-20 04:30:22', '2019-01-20 04:30:22', 28, 28, 1),
(4, 2, 12, 10, 1, NULL, '2019-01-20', NULL, '2019-01-20 04:30:50', '2019-01-20 04:30:50', 30, 30, 1),
(5, 3, 11, 10, 1, NULL, '2019-01-20', NULL, '2019-01-20 04:31:13', '2019-01-20 04:31:13', 35, 35, 1),
(6, 4, 10, 10, 1, NULL, '2019-01-20', NULL, '2019-01-20 04:31:34', '2019-01-20 04:31:34', 33, 33, 1),
(7, 5, 16, 10, NULL, 1, NULL, '2019-01-20', '2019-01-20 04:32:40', '2019-01-20 04:32:40', 34, 34, 1),
(8, 4, 10, 10, 1, NULL, '2019-01-20', NULL, '2019-01-20 04:33:01', '2019-01-20 04:33:01', 33, 33, 1),
(9, 5, 16, 10, 1, NULL, '2019-01-20', NULL, '2019-01-20 04:33:26', '2019-01-20 04:33:26', 34, 34, 1),
(10, 1, 13, 10, 1, NULL, '2019-01-24', NULL, '2019-01-24 00:26:51', '2019-01-24 00:26:51', 28, 28, 1),
(11, 2, 12, 10, 1, NULL, '2019-01-24', NULL, '2019-01-24 00:27:14', '2019-01-24 00:27:14', 30, 30, 1),
(12, 3, 11, 10, 1, NULL, '2019-01-24', NULL, '2019-01-24 00:27:37', '2019-01-24 00:27:37', 35, 35, 1),
(13, 4, 10, 10, 1, NULL, '2019-01-24', NULL, '2019-01-24 00:27:57', '2019-01-24 00:27:57', 33, 33, 1),
(14, 5, 16, 10, 1, NULL, '2019-01-24', NULL, '2019-01-24 00:29:06', '2019-01-24 00:29:06', 34, 34, 1),
(15, 1, 13, 1, 1, NULL, '2019-01-28', NULL, '2019-01-28 04:40:47', '2019-01-28 04:40:47', 28, 28, 1),
(16, 2, 12, 1, NULL, 1, NULL, '2019-01-28', '2019-01-28 04:41:41', '2019-01-28 04:41:41', 30, 30, 1),
(17, 1, 13, 1, 1, NULL, '2019-01-28', NULL, '2019-01-28 04:42:56', '2019-01-28 04:42:56', 28, 28, 1),
(18, 2, 12, 1, NULL, 1, NULL, '2019-01-28', '2019-01-28 04:43:50', '2019-01-28 04:43:50', 30, 30, 1),
(19, 1, 13, 1, 1, NULL, '2019-01-28', NULL, '2019-01-28 04:44:28', '2019-01-28 04:44:28', 28, 28, 1),
(20, 1, 13, 28, 1, NULL, '2019-02-05', NULL, '2019-02-05 02:04:21', '2019-02-05 02:04:21', 28, 28, 1),
(21, 2, 12, 28, 1, NULL, '2019-02-05', NULL, '2019-02-05 03:11:43', '2019-02-05 03:11:43', 30, 30, 1),
(22, 3, 11, 28, 1, NULL, '2019-02-05', NULL, '2019-02-05 03:22:20', '2019-02-05 03:22:20', 35, 35, 1),
(23, 1, 9, 28, 1, NULL, '2019-02-05', NULL, '2019-02-05 03:40:03', '2019-02-05 03:40:03', 33, 33, 1),
(24, 1, 9, 28, 1, NULL, '2019-02-05', NULL, '2019-02-05 03:41:34', '2019-02-05 03:41:34', 33, 33, 1),
(25, 4, 9, 28, 1, NULL, '2019-02-05', NULL, '2019-02-05 03:42:24', '2019-02-05 03:42:24', 33, 33, 1),
(26, 5, 16, 28, 1, NULL, '2019-02-05', NULL, '2019-02-05 03:49:36', '2019-02-05 03:49:36', 34, 34, 1),
(27, 1, 13, 28, 1, NULL, '2019-02-06', NULL, '2019-02-05 22:54:42', '2019-02-05 22:54:42', 28, 28, 1),
(28, 2, 12, 28, NULL, 1, NULL, '2019-02-06', '2019-02-05 22:55:45', '2019-02-05 22:55:45', 30, 30, 1),
(29, 1, 13, 28, 1, NULL, '2019-02-06', NULL, '2019-02-05 23:03:00', '2019-02-05 23:03:00', 28, 28, 1),
(30, 2, 12, 28, NULL, 1, NULL, '2019-02-06', '2019-02-05 23:03:39', '2019-02-05 23:03:39', 30, 30, 1),
(31, 1, 13, 11, 1, NULL, '2019-02-06', NULL, '2019-02-06 04:29:12', '2019-02-06 04:29:12', 28, 28, 1),
(32, 2, 12, 11, 1, NULL, '2019-02-06', NULL, '2019-02-06 04:30:22', '2019-02-06 04:30:22', 30, 30, 1),
(33, 3, 11, 11, 1, NULL, '2019-02-06', NULL, '2019-02-06 04:31:23', '2019-02-06 04:31:23', 35, 35, 1),
(34, 4, 9, 11, 1, NULL, '2019-02-06', NULL, '2019-02-06 04:32:54', '2019-02-06 04:32:54', 33, 33, 1),
(35, 5, 16, 11, 1, NULL, '2019-02-06', NULL, '2019-02-06 04:33:43', '2019-02-06 04:33:43', 34, 34, 1),
(36, 1, 13, 69, 1, NULL, '2019-02-27', NULL, '2019-02-27 04:51:12', '2019-02-27 04:51:12', 28, 28, 1),
(37, 2, 12, 69, 1, NULL, '2019-02-27', NULL, '2019-02-27 04:55:04', '2019-02-27 04:55:04', 30, 30, 1),
(38, 4, 9, 69, NULL, 1, NULL, '2019-02-27', '2019-02-27 05:00:35', '2019-02-27 05:00:35', 33, 33, 1),
(39, 2, 12, 69, 1, NULL, '2019-02-27', NULL, '2019-02-27 05:05:21', '2019-02-27 05:05:21', 30, 30, 1),
(40, 4, 9, 69, 1, NULL, '2019-02-27', NULL, '2019-02-27 05:06:23', '2019-02-27 05:06:23', 33, 33, 1),
(41, 5, 16, 69, 1, NULL, '2019-02-27', NULL, '2019-02-27 05:06:58', '2019-02-27 05:06:58', 34, 34, 1),
(42, 1, 13, 70, 1, NULL, '2019-03-02', NULL, '2019-03-02 02:17:16', '2019-03-02 02:17:16', 28, 28, 1),
(43, 2, 12, 70, 1, NULL, '2019-03-02', NULL, '2019-03-02 02:19:34', '2019-03-02 02:19:34', 30, 30, 1),
(44, 4, 9, 70, 1, NULL, '2019-03-02', NULL, '2019-03-02 02:20:25', '2019-03-02 02:20:25', 33, 33, 1),
(45, 5, 16, 70, 1, NULL, '2019-03-02', NULL, '2019-03-02 02:21:51', '2019-03-02 02:21:51', 34, 34, 1),
(46, 1, 13, 76, 1, NULL, '2019-03-04', NULL, '2019-03-04 00:12:19', '2019-03-04 00:12:19', 28, 28, 1),
(47, 2, 12, 76, 1, NULL, '2019-03-04', NULL, '2019-03-04 00:14:10', '2019-03-04 00:14:10', 30, 30, 1),
(48, 4, 9, 76, 1, NULL, '2019-03-04', NULL, '2019-03-04 00:15:33', '2019-03-04 00:15:33', 33, 33, 1),
(49, 5, 16, 76, 1, NULL, '2019-03-04', NULL, '2019-03-04 00:16:56', '2019-03-04 00:16:56', 34, 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `demand_mypip_details`
--

CREATE TABLE `demand_mypip_details` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `demand_id` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `pa` double NOT NULL,
  `gob` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `demand_mypip_details`
--

INSERT INTO `demand_mypip_details` (`id`, `project_id`, `demand_id`, `year`, `pa`, `gob`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(3, 1, 13, '2019', 12, 12, NULL, NULL, 24, 24),
(4, 1, 13, '2020', 12, 12, NULL, NULL, 24, 24),
(9, 28, 14, '2019', 5, 58, '2019-02-05 23:26:54', '2019-02-05 23:26:54', 24, 24),
(10, 28, 14, '2020', 12, 5, '2019-02-05 23:26:54', '2019-02-05 23:26:54', 24, 24),
(11, 28, 15, '2019', 55, 55, '2019-02-06 04:21:30', '2019-02-06 04:21:30', 40, 40),
(12, 28, 15, '2020', 55, 55, '2019-02-06 04:21:30', '2019-02-06 04:21:30', 40, 40),
(15, 11, 16, '2019', 55, 55, '2019-02-07 03:33:39', '2019-02-07 03:33:39', 24, 24),
(16, 11, 16, '2020', 55, 55, '2019-02-07 03:33:39', '2019-02-07 03:33:39', 24, 24),
(17, 5, 17, '2019', 45, 45, '2019-02-12 00:47:50', '2019-02-12 00:47:50', 40, 40),
(18, 5, 17, '2020', 45, 45, '2019-02-12 00:47:50', '2019-02-12 00:47:50', 40, 40),
(19, 55, 18, '2019', 22, 22, '2019-02-18 05:48:00', '2019-02-18 05:48:00', 40, 40),
(20, 55, 18, '2020', 22, 22, '2019-02-18 05:48:00', '2019-02-18 05:48:00', 40, 40),
(21, 69, 20, '2019', 5, 5, '2019-02-27 04:49:01', '2019-02-27 04:49:01', 40, 40),
(22, 69, 20, '2020', 5, 5, '2019-02-27 04:49:01', '2019-02-27 04:49:01', 40, 40),
(23, 70, 21, '2019', 5, 5, '2019-03-02 02:12:13', '2019-03-02 02:12:13', 40, 40),
(24, 70, 21, '2020', 5, 5, '2019-03-02 02:12:13', '2019-03-02 02:12:13', 40, 40),
(25, 76, 22, '2019', 5, 5, '2019-03-04 00:10:24', '2019-03-04 00:10:24', 40, 40),
(26, 76, 22, '2020', 5, 5, '2019-03-04 00:10:24', '2019-03-04 00:10:24', 40, 40);

-- --------------------------------------------------------

--
-- Table structure for table `demand_project_source_details`
--

CREATE TABLE `demand_project_source_details` (
  `id` int(11) NOT NULL,
  `demand_id` int(11) NOT NULL,
  `project_code` varchar(252) DEFAULT NULL,
  `financing_source` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `demand_project_source_details`
--

INSERT INTO `demand_project_source_details` (`id`, `demand_id`, `project_code`, `financing_source`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(29, 5, '1', 1, 1212, 24, 24, '2019-01-27 03:06:00', '2019-01-27 03:06:00', 1),
(30, 5, '1', 2, 787, 24, 24, '2019-01-27 03:06:00', '2019-01-27 03:06:00', 1),
(47, 4, '11007', 1, 1212, 24, 24, '2019-01-29 00:48:52', '2019-01-29 00:48:52', 1),
(48, 4, '11007', 2, 787, 24, 24, '2019-01-29 00:48:52', '2019-01-29 00:48:52', 1),
(57, 1, '10012', 1, 500, 24, 24, '2019-01-29 03:04:13', '2019-01-29 03:04:13', 1),
(58, 1, '10012', 1, 400, 24, 24, '2019-01-29 03:04:13', '2019-01-29 03:04:13', 1),
(71, 12, '1234', 1, 1212, 24, 24, '2019-02-04 03:05:18', '2019-02-04 03:05:18', 1),
(72, 12, '1234', 2, 787, 24, 24, '2019-02-04 03:05:18', '2019-02-04 03:05:18', 1),
(73, 13, '12', 1, 1212, 24, 24, '2019-02-04 04:07:14', '2019-02-04 04:07:14', 1),
(74, 13, '12', 2, 787, 24, 24, '2019-02-04 04:07:14', '2019-02-04 04:07:14', 1),
(83, 14, '5005', 1, 2, 24, 24, '2019-02-05 23:26:54', '2019-02-05 23:26:54', 1),
(84, 14, '5005', 1, 2, 24, 24, '2019-02-05 23:26:54', '2019-02-05 23:26:54', 1),
(85, 15, '120012', 1, 2, 40, 40, '2019-02-06 04:21:30', '2019-02-06 04:21:30', 1),
(86, 15, '120012', 1, 2, 40, 40, '2019-02-06 04:21:30', '2019-02-06 04:21:30', 1),
(89, 16, '100010', 1, 200, 24, 24, '2019-02-07 03:33:39', '2019-02-07 03:33:39', 1),
(90, 16, '100010', 2, 200, 24, 24, '2019-02-07 03:33:39', '2019-02-07 03:33:39', 1),
(91, 17, '50005', 2, 126, 40, 40, '2019-02-12 00:47:50', '2019-02-12 00:47:50', 1),
(92, 17, '50005', 2, 1235, 40, 40, '2019-02-12 00:47:50', '2019-02-12 00:47:50', 1),
(93, 18, '5005', 1, 100, 40, 40, '2019-02-18 05:48:00', '2019-02-18 05:48:00', 1),
(94, 18, '5005', 2, 100, 40, 40, '2019-02-18 05:48:00', '2019-02-18 05:48:00', 1),
(96, 20, '2019_s1_s1_m2_a1_p1_069', 1, 22, 40, 40, '2019-02-27 04:49:01', '2019-02-27 04:49:01', 1),
(97, 21, '2019_s1_s1_m1_a1_p1_070', 1, 22, 40, 40, '2019-03-02 02:12:13', '2019-03-02 02:12:13', 1),
(98, 21, '2019_s1_s1_m1_a1_p1_070', 2, 22, 40, 40, '2019-03-02 02:12:13', '2019-03-02 02:12:13', 1),
(99, 22, '2019_s4_s4_m1_a1_p2_076', 1, 300000, 40, 40, '2019-03-04 00:10:24', '2019-03-04 00:10:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `designation_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(19) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `created_at`, `updated_at`, `deleted_at`, `designation_name`, `designation_name_bn`, `designation_description`, `status`, `created_by`, `updated_by`) VALUES
(1, '2018-12-10 20:35:27', '2019-01-24 00:53:40', NULL, 'Magura', '', 'মাগুরা-১ সংসদীয় আসন হল বাংলাদেশের জাতীয় সংসদের ৩০০টি নির্বাচনী এলাকার একটি। এটি মাগুরা জেলায় অবস্থিত জাতীয় সংসদের ৯১নং আসন।', 1, NULL, NULL),
(2, '2019-01-23 02:43:00', '2019-01-23 02:57:29', '2019-01-23 02:57:29', 'd', '', NULL, 1, NULL, NULL),
(3, '2019-01-23 02:46:14', '2019-01-23 02:50:42', '2019-01-23 02:50:42', 'dfdfdf', '', 'dfdfdf', 1, NULL, NULL),
(4, '2019-01-23 02:52:39', '2019-01-23 02:54:21', '2019-01-23 02:54:21', 'dfdf', '', NULL, 1, NULL, NULL),
(5, '2019-01-23 02:54:09', '2019-01-23 02:54:17', '2019-01-23 02:54:17', 'ddd', '', NULL, 1, NULL, NULL),
(6, '2019-01-23 02:57:21', '2019-01-23 02:57:25', '2019-01-23 02:57:25', 'ddfdfasdf', '', NULL, 1, NULL, NULL),
(7, '2019-01-24 00:53:30', '2019-01-24 00:53:30', NULL, 'Dhaka', '', 'Dhaka', 1, NULL, NULL),
(8, '2019-01-24 00:53:54', '2019-01-24 00:53:54', NULL, 'Barisal', '', 'Barisal', 1, NULL, NULL),
(9, '2019-02-16 00:35:35', '2019-02-16 00:35:35', NULL, 'Chittagong', '', 'City lies in the heart of sea.', 1, NULL, NULL),
(10, '2019-02-27 02:24:16', '2019-02-27 02:24:34', '2019-02-27 02:24:34', 'Chittagong', 'চট্টগ্রাম চট্টগ্রাম', 'a', 1, NULL, NULL),
(11, NULL, NULL, NULL, 'Agrani 1', '', NULL, 1, NULL, NULL),
(12, NULL, NULL, NULL, 'Agrani 2', '', NULL, 1, NULL, NULL),
(13, NULL, NULL, NULL, 'Agrani 3', '', NULL, 1, NULL, NULL),
(14, NULL, NULL, NULL, 'Agrani 4', '', NULL, 1, NULL, NULL),
(15, NULL, NULL, NULL, 'ddd', '', NULL, 1, NULL, NULL),
(16, NULL, NULL, NULL, 'rr', '', NULL, 1, NULL, NULL),
(17, NULL, NULL, NULL, 'Magura traders ltd', '', NULL, 1, NULL, NULL),
(18, NULL, NULL, NULL, 'controller', '', NULL, 1, NULL, NULL),
(19, NULL, NULL, NULL, 'a', '', NULL, 1, NULL, NULL),
(20, NULL, NULL, NULL, 'G', '', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `district_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(19) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `created_at`, `updated_at`, `deleted_at`, `district_name`, `district_name_bn`, `district_description`, `status`, `created_by`, `updated_by`) VALUES
(1, '2018-12-10 20:35:27', '2019-01-24 00:53:40', NULL, 'Magura', '', 'মাগুরা-১ সংসদীয় আসন হল বাংলাদেশের জাতীয় সংসদের ৩০০টি নির্বাচনী এলাকার একটি। এটি মাগুরা জেলায় অবস্থিত জাতীয় সংসদের ৯১নং আসন।', 1, NULL, NULL),
(2, '2019-01-23 02:43:00', '2019-01-23 02:57:29', '2019-01-23 02:57:29', 'd', '', NULL, 1, NULL, NULL),
(3, '2019-01-23 02:46:14', '2019-01-23 02:50:42', '2019-01-23 02:50:42', 'dfdfdf', '', 'dfdfdf', 1, NULL, NULL),
(4, '2019-01-23 02:52:39', '2019-01-23 02:54:21', '2019-01-23 02:54:21', 'dfdf', '', NULL, 1, NULL, NULL),
(5, '2019-01-23 02:54:09', '2019-01-23 02:54:17', '2019-01-23 02:54:17', 'ddd', '', NULL, 1, NULL, NULL),
(6, '2019-01-23 02:57:21', '2019-01-23 02:57:25', '2019-01-23 02:57:25', 'ddfdfasdf', '', NULL, 1, NULL, NULL),
(7, '2019-01-24 00:53:30', '2019-01-24 00:53:30', NULL, 'Dhaka', '', 'Dhaka', 1, NULL, NULL),
(8, '2019-01-24 00:53:54', '2019-01-24 00:53:54', NULL, 'Barisal', '', 'Barisal', 1, NULL, NULL),
(9, '2019-02-16 00:35:35', '2019-02-16 00:35:35', NULL, 'Chittagong', '', 'City lies in the heart of sea.', 1, NULL, NULL),
(10, '2019-02-27 02:24:16', '2019-02-27 02:24:34', '2019-02-27 02:24:34', 'Chittagong', 'চট্টগ্রাম চট্টগ্রাম', 'a', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `division_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `division_name`, `division_name_bn`, `division_description`, `status`) VALUES
(3, '2019-01-10 04:26:32', '2019-01-23 02:28:37', NULL, NULL, NULL, 'Planning Division', '', 'Planning Division', 1),
(4, '2019-01-23 02:09:23', '2019-01-23 02:17:50', NULL, NULL, '2019-01-23 02:17:50', 'new', '', NULL, 1),
(5, '2019-01-23 02:11:00', '2019-01-23 02:17:42', NULL, NULL, '2019-01-23 02:17:42', 'd', '', NULL, 1),
(6, '2019-01-23 02:25:45', '2019-01-23 02:26:15', NULL, NULL, '2019-01-23 02:26:15', 'new', '', NULL, 1),
(7, '2019-01-23 02:27:20', '2019-01-23 02:27:25', NULL, NULL, '2019-01-23 02:27:25', 'dd', '', NULL, 1),
(8, '2019-02-27 02:40:28', '2019-02-27 02:41:00', NULL, NULL, '2019-02-27 02:41:00', 'Chittagong', 'চট্টগ্রাম চট্টগ্রাম', 'D', 1);

-- --------------------------------------------------------

--
-- Table structure for table `finance_division_distribution`
--

CREATE TABLE `finance_division_distribution` (
  `id` int(10) UNSIGNED NOT NULL,
  `ceiling_for` tinyint(4) NOT NULL COMMENT 'ADP, RADP',
  `financial_year` int(11) NOT NULL,
  `ceiling_amount` double NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `finance_division_distribution`
--

INSERT INTO `finance_division_distribution` (`id`, `ceiling_for`, `financial_year`, `ceiling_amount`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 1, 13, 122222, 24, 24, '2019-02-12 03:02:00', '2019-02-14 02:43:19', NULL, 1),
(2, 1, 13, 7788, 24, 24, '2019-02-12 03:48:10', '2019-02-13 02:17:04', NULL, 1),
(3, 0, 15, 6777777779, 24, 24, '2019-02-13 01:47:02', '2019-02-17 04:41:53', NULL, 1),
(4, 0, 13, 4, 24, 24, '2019-02-14 02:43:46', '2019-02-14 02:43:46', NULL, 1),
(5, 0, 13, 100, 24, 24, '2019-02-16 04:29:26', '2019-02-16 04:29:26', NULL, 1),
(6, 0, 13, 120, 24, 24, '2019-02-16 04:33:03', '2019-02-16 04:33:03', NULL, 1),
(7, 1, 15, -1, 24, 24, '2019-02-25 00:09:42', '2019-02-25 00:09:42', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fiscal_years`
--

CREATE TABLE `fiscal_years` (
  `id` int(10) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `year_status` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) NOT NULL,
  `updated_by` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fiscal_years`
--

INSERT INTO `fiscal_years` (`id`, `start_date`, `end_date`, `year_status`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, '2019-01-10', '2019-01-07', 0, 0, '2019-01-08 22:24:32', '2019-01-08 22:25:05', '2019-01-08 22:25:05', 24, 24),
(2, '2018-02-20', '2019-01-24', 0, 0, '2019-01-08 22:29:45', '2019-01-08 23:10:06', '2019-01-08 23:10:06', 24, 24),
(3, '2018-07-19', '2019-06-12', 0, 0, '2019-01-08 23:10:22', '2019-01-09 22:11:53', '2019-01-09 22:11:53', 24, 24),
(4, '2019-01-10', '2019-01-30', 0, 0, '2019-01-09 00:39:27', '2019-01-09 01:05:40', '2019-01-09 01:05:40', 24, 24),
(5, '2019-01-09', '2019-01-09', 0, 0, '2019-01-09 00:42:43', '2019-01-09 01:05:39', '2019-01-09 01:05:39', 24, 24),
(6, '2019-01-09', '1970-01-01', 0, 0, '2019-01-09 00:44:32', '2019-01-09 01:05:37', '2019-01-09 01:05:37', 24, 24),
(7, '2019-01-09', '2019-01-09', 0, 0, '2019-01-09 01:05:21', '2019-01-09 01:05:33', '2019-01-09 01:05:33', 24, 24),
(8, '2019-01-15', '2019-01-16', 0, 0, '2019-01-09 02:35:11', '2019-01-09 22:11:21', '2019-01-09 22:11:21', 24, 24),
(9, '2019-01-11', '2019-01-16', 0, 0, '2019-01-09 02:51:01', '2019-01-09 02:51:35', '2019-01-09 02:51:35', 24, 24),
(10, '2019-01-09', '2019-01-09', 0, 0, '2019-01-09 02:59:01', '2019-01-09 02:59:09', '2019-01-09 02:59:09', 24, 24),
(11, '2019-01-16', '2019-01-15', 0, 0, '2019-01-09 22:13:18', '2019-01-09 22:13:37', '2019-01-09 22:13:37', 24, 24),
(12, '2019-01-21', '2019-01-14', 0, 0, '2019-01-09 22:22:19', '2019-01-09 22:22:30', '2019-01-09 22:22:30', 24, 24),
(13, '2018-07-01', '2019-06-30', 1, 1, '2019-01-09 22:24:21', '2019-01-14 02:57:55', NULL, 24, 24),
(14, '2019-01-08', '2019-01-24', 0, 0, '2019-01-13 22:33:20', '2019-01-13 22:33:25', '2019-01-13 22:33:25', 24, 24),
(15, '2019-07-01', '2020-06-30', 1, 1, '2019-02-03 22:27:49', '2019-02-03 22:27:49', NULL, 24, 24);

-- --------------------------------------------------------

--
-- Table structure for table `foreign_aid_budget_dtls`
--

CREATE TABLE `foreign_aid_budget_dtls` (
  `id` int(11) NOT NULL,
  `master_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `current_year_adp_pa` double NOT NULL,
  `current_year_adp_rpa` double NOT NULL,
  `current_year_radp_pa` double NOT NULL,
  `current_year_radp_rpa` double NOT NULL,
  `next_year_adp_pa` double NOT NULL,
  `next_year_adp_rpa` double NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foreign_aid_budget_dtls`
--

INSERT INTO `foreign_aid_budget_dtls` (`id`, `master_id`, `project_id`, `total_amount`, `current_year_adp_pa`, `current_year_adp_rpa`, `current_year_radp_pa`, `current_year_radp_rpa`, `next_year_adp_pa`, `next_year_adp_rpa`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(127, 5, 2, 9999, 1313, 1333, 1323234, 1222222, 12222, 12222, 24, 24, '2019-02-23 23:21:12', '2019-02-23 23:21:12', NULL, 1),
(128, 5, 10, 11111, 1111, 1111, 1111, 1111, 1111, 1111, 24, 24, '2019-02-23 23:21:12', '2019-02-23 23:21:12', NULL, 1),
(129, 5, 1, 11, 1, 1, 11, 1, 11, 11, 24, 24, '2019-02-23 23:21:12', '2019-02-23 23:21:12', NULL, 1),
(130, 5, 28, 1, 11, 1, 11, 1, 1, 1, 24, 24, '2019-02-23 23:21:12', '2019-02-23 23:21:12', NULL, 1),
(131, 5, 11, 1, 1, 1, 11, 1, 11, 11, 24, 24, '2019-02-23 23:21:12', '2019-02-23 23:21:12', NULL, 1),
(132, 5, 5, 1, 11, 1, 1, 1, 1, 1, 24, 24, '2019-02-23 23:21:12', '2019-02-23 23:21:12', NULL, 1),
(133, 5, 55, 1, 1, 1, 1, 1, 1, 1, 24, 24, '2019-02-23 23:21:12', '2019-02-23 23:21:12', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `foreign_aid_budget_mst`
--

CREATE TABLE `foreign_aid_budget_mst` (
  `id` int(11) NOT NULL,
  `allocation_for` tinyint(4) NOT NULL,
  `financial_year` int(11) NOT NULL,
  `sector_id` int(11) DEFAULT NULL,
  `ministry_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foreign_aid_budget_mst`
--

INSERT INTO `foreign_aid_budget_mst` (`id`, `allocation_for`, `financial_year`, `sector_id`, `ministry_id`, `file`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(5, 0, 13, 1, 16, 'uploaded_files/Fa_budget_and_accounts/Fa_budget_and_accounts_16258fe4b88833d5b5510f9007b67380.xlsx', 24, 24, '2019-02-20 03:35:34', '2019-02-23 23:19:51', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gender_goals`
--

CREATE TABLE `gender_goals` (
  `id` int(10) UNSIGNED NOT NULL,
  `goal_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gender_goals`
--

INSERT INTO `gender_goals` (`id`, `goal_no`, `goal_name`, `description`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, '1', 'g1', 'g1', 1, 24, 24, NULL, '2019-02-25 03:22:40', '2019-02-25 03:22:40'),
(5, '2', 'g2', 'g2', 1, 24, 24, NULL, '2019-02-25 03:22:50', '2019-02-25 03:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `gender_goal_targets`
--

CREATE TABLE `gender_goal_targets` (
  `id` int(10) UNSIGNED NOT NULL,
  `goal_id` int(11) NOT NULL,
  `targets` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gender_goal_targets`
--

INSERT INTO `gender_goal_targets` (`id`, `goal_id`, `targets`, `description`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, 'g1t', 'g1t', 1, 24, 24, NULL, '2019-02-25 03:23:08', '2019-02-25 03:23:08'),
(2, 5, 'g2t', 'g2t', 1, 24, 24, NULL, '2019-02-25 03:23:21', '2019-02-25 03:23:21'),
(3, 5, 'a', 's', 1, 24, 24, '2019-02-25 22:56:09', '2019-02-25 22:54:35', '2019-02-25 22:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `guidelines`
--

CREATE TABLE `guidelines` (
  `id` int(10) UNSIGNED NOT NULL,
  `guideline_for` int(11) NOT NULL,
  `fiscal_year` int(11) NOT NULL,
  `call_notice_type` tinyint(4) NOT NULL,
  `from_month` tinyint(4) DEFAULT NULL,
  `to_month` tinyint(4) DEFAULT NULL,
  `agency_date` date NOT NULL,
  `ministry_date` date NOT NULL,
  `sector_division_date` date NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guideline_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_by` tinyint(4) NOT NULL,
  `updated_by` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guidelines`
--

INSERT INTO `guidelines` (`id`, `guideline_for`, `fiscal_year`, `call_notice_type`, `from_month`, `to_month`, `agency_date`, `ministry_date`, `sector_division_date`, `comment`, `file_name`, `guideline_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(3, 0, 13, 0, 1, 2, '2019-03-31', '2019-03-31', '2019-03-31', '21323', 'uploaded_files/guideline/guideline_4a2ead320fff7a090069b56f26664b65.png', 1, 24, 34, '2019-01-31 05:33:01', '2019-02-15 22:22:51', NULL, 1),
(4, 0, 13, 1, 2, 5, '2019-03-28', '2019-03-28', '2019-03-28', 'asfasf', '', 1, 24, 24, '2019-02-06 04:56:09', '2019-02-24 00:38:55', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `name_bangla` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `parent_menu` int(11) UNSIGNED DEFAULT NULL,
  `sequence` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `name_bangla`, `link`, `parent_menu`, `sequence`, `status`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 'Root', '', 'Test', 0, 0, 1, NULL, NULL, NULL, NULL),
(2, 'User Management', 'ইউজার ম্যানেজমেন্ট', NULL, 1, 1, 1, 1, 24, '2018-11-17 23:31:59', '2019-02-20 12:07:47'),
(3, 'User Group', 'ব্যবহারকারী দল', 'usergroup.index', 2, 1, 1, 1, 24, '2018-11-17 23:32:35', '2019-02-20 12:08:07'),
(4, 'User Creation', 'ব্যবহারকারী সৃষ্টি', 'usercreation.index', 2, 2, 1, 1, 24, '2018-11-17 23:33:12', '2018-11-21 22:08:16'),
(5, 'User Privileges', 'ব্যবহারকারী বিশেষাধিকার', 'userprivilege.index', 2, 3, 1, 1, 24, '2018-11-17 23:34:04', '2018-11-21 22:08:23'),
(6, 'Menu Management', 'ম্যানেজমেন্ট মেনু', NULL, 1, 2, 1, 1, 24, '2018-11-17 23:34:47', '2018-11-20 00:03:52'),
(7, 'Menu Creation', 'মেনু সৃষ্টি', 'menucreation.index', 6, 0, 1, 1, NULL, '2018-11-17 23:34:47', '2018-11-17 23:34:47'),
(8, 'New Projects', 'নতুন প্রকল্প', NULL, 1, 4, 1, 1, 24, '2018-11-18 03:36:18', '2019-01-28 23:09:03'),
(9, 'New Project', 'নতুন প্রকল্প', 'newproject.index', 8, 0, 1, 1, 24, '2018-11-18 03:36:57', '2018-11-19 22:12:39'),
(10, 'Setup', 'সেটআপ', NULL, 1, 9, 1, 1, 24, '2018-11-18 03:37:15', '2019-01-26 21:52:06'),
(16, 'Ministry', 'মন্ত্রক', 'ministry.index', 10, 2, 1, 24, 24, '2018-11-20 02:55:41', '2019-03-02 00:59:51'),
(17, 'Agency', 'এজেন্সী', 'agency.index', 10, 1, 1, 24, 24, '2018-11-20 02:56:12', '2019-03-02 00:59:34'),
(18, 'Division', 'বিভাগ', 'division.index', 10, 14, 1, 24, 24, '2018-11-20 02:56:50', '2019-03-02 01:04:25'),
(19, 'Sector', 'সেক্টর', 'sector.index', 10, 3, 1, 24, 24, '2019-01-01 04:47:17', '2019-03-02 01:00:02'),
(20, 'Sub Sector', 'সাব সেক্টর', 'sub-sector.index', 10, 4, 1, 24, 24, '2019-01-01 04:48:20', '2019-03-02 01:00:19'),
(21, 'Project Source', 'প্রকল্প উত্স', 'project-source.index', 10, 5, 1, 24, 24, '2019-01-02 02:48:38', '2019-03-02 01:01:55'),
(22, 'Upazila Location', 'উপজেলা অবস্থান', 'upazila-location.index', 10, 12, 1, 24, 24, '2019-01-02 03:05:25', '2019-03-02 01:04:09'),
(24, 'Approaved Project', 'প্রকল্প গৃহীত', 'approaved_project.index', 37, 1, 1, 24, 24, '2019-01-06 04:14:38', '2019-01-10 02:08:08'),
(25, 'ADP Allocation', 'এডিপি বরাদ্দ', NULL, 1, 7, 1, 24, 24, '2019-01-08 02:48:25', '2019-01-26 21:53:41'),
(26, 'ADP Allocations', 'এডিপি বরাদ্দকরণ', 'adp_allocation.index', 25, 0, 1, 24, 24, '2019-01-08 02:50:49', '2019-01-26 21:54:12'),
(27, 'New Project List', 'নতুন প্রকল্প তালিকা', 'newprojectlist.create', 8, 2, 1, 24, NULL, '2019-01-08 03:21:24', '2019-01-08 03:21:24'),
(28, 'Budget Head', 'বাজেট হেড', 'budget-head.index', 10, 11, 1, 24, 24, '2019-01-08 23:06:16', '2019-03-02 01:06:39'),
(29, 'Fiscal Year', 'অর্থবছর', 'fiscal-year.index', 10, 8, 1, 24, 24, '2019-01-08 23:07:07', '2019-03-02 01:03:22'),
(30, 'PA Source', 'পিএ উত্স', 'pa-source.index', 10, 6, 1, 24, 24, '2019-01-08 23:07:48', '2019-03-02 01:02:09'),
(31, 'Guideline', 'নির্দেশিকা', NULL, 1, 3, 1, 24, 24, '2019-01-09 04:35:57', '2019-01-10 02:10:06'),
(32, 'Add Guidleline', 'গাইডলাইন যোগ করুন', 'guideline.index', 31, 0, 1, 24, 24, '2019-01-09 04:37:47', '2019-01-14 01:43:01'),
(33, 'Guideline List', 'নির্দেশিকা তালিকা', 'guideline.showguideline', 31, 1, 1, 24, 24, '2019-01-09 04:38:29', '2019-01-14 01:42:40'),
(34, 'Gole and Targets', 'লক্ষ্য এবং উদ্দেশ্য', NULL, 1, 10, 1, 24, 24, '2019-01-09 22:38:54', '2019-01-26 21:52:21'),
(35, 'SDGS Gole', 'এসডিজিএস লক্ষ্য', 'sdgsgole.index', 34, 1, 1, 24, NULL, '2019-01-09 22:39:13', '2019-01-09 22:39:13'),
(36, 'SDGS Targets', 'এসডিজিএস লক্ষ্যমাত্রা', 'sdgstargets.index', 34, 2, 1, 24, NULL, '2019-01-09 22:39:48', '2019-01-09 22:39:48'),
(37, 'Approve Project', 'প্রকল্প অনুমোদন', NULL, 1, 5, 1, 24, NULL, '2019-01-10 02:07:47', '2019-01-10 02:07:47'),
(38, 'Allocated Project', 'বরাদ্দ প্রকল্প', 'allocated_project.index', 25, 2, 1, 24, 24, '2019-01-14 22:45:00', '2019-01-14 22:51:14'),
(39, 'Pipeline Project', 'পাইপলাইন প্রকল্প', 'ministerialmeeting.create', 8, 3, 1, 24, 24, '2019-01-14 22:56:13', '2019-02-25 05:23:34'),
(40, 'Project Type', 'প্রকল্পের ধরন', 'project-type.index', 10, 7, 1, 24, 24, '2019-01-14 23:16:54', '2019-03-02 01:02:54'),
(41, 'Climate Change Goal', 'জলবায়ু পরিবর্তন লক্ষ্য', 'ClaimateChangeGoal.index', 34, 3, 1, 24, 24, '2019-01-15 03:14:39', '2019-01-17 02:32:30'),
(42, 'Climate Change Targets', 'জলবায়ু পরিবর্তন লক্ষ্যমাত্রা', 'ClaimateChangeTarget.index', 34, 4, 1, 24, 24, '2019-01-15 03:15:02', '2019-01-17 02:33:40'),
(43, 'RMO', 'আরএমও', 'rmo_setup.index', 10, 10, 1, 24, 24, '2019-01-15 05:13:47', '2019-03-02 01:01:00'),
(44, 'Poverty Goal', 'দারিদ্র্য লক্ষ্য', 'poverty-goal.index', 34, 5, 1, 24, 24, '2019-01-15 23:27:30', '2019-01-16 01:59:53'),
(45, 'Poverty Target', 'দারিদ্র্য লক্ষ্যমাত্রা', 'poverty-target.index', 34, 6, 1, 24, 24, '2019-01-15 23:27:56', '2019-01-16 03:14:34'),
(46, 'PPP Goal', 'পিপিপি লক্ষ্য', 'pppgole.index', 34, 7, 1, 24, NULL, '2019-01-16 03:58:41', '2019-01-16 03:58:41'),
(47, 'PPP Target', 'পিপিপি লক্ষ্যমাত্রা', 'ppptargets.index', 34, 8, 1, 24, 24, '2019-01-16 04:00:07', '2019-01-18 23:40:46'),
(48, 'Send ADP Allocation', 'এডিপি বরাদ্দ পাঠান', 'sendadpallocation.create', 25, 3, 1, 24, NULL, '2019-01-17 01:03:04', '2019-01-17 01:03:04'),
(49, 'ADP Ministerial Meeting', 'এডিপি মন্ত্রীসভার বৈঠক', 'adpministerialmeeting.create', 25, 4, 1, 24, NULL, '2019-01-20 02:38:32', '2019-01-20 02:38:32'),
(50, 'District', 'জেলা', 'district.index', 10, 11, 1, 24, 24, '2019-01-22 22:47:57', '2019-03-02 01:03:43'),
(51, 'Wings', 'উইংস', 'wings.index', 10, 14, 1, 24, 24, '2019-01-25 21:25:19', '2019-01-25 21:43:15'),
(52, 'Approved Project List', 'অনুমোদিত প্রকল্প তালিকা', 'approved_project_list.create', 37, 2, 1, 24, NULL, '2019-01-26 00:28:36', '2019-01-26 00:28:36'),
(53, 'RADP Allocation', 'আরএডিপি বণ্টন', NULL, 1, 8, 1, 24, NULL, '2019-01-26 21:49:48', '2019-01-26 21:49:48'),
(54, 'RADP Allocations', 'আরএডিপি বরাদ্দকরণ', NULL, 53, 1, 1, 24, NULL, '2019-01-26 21:50:15', '2019-01-26 21:50:15'),
(55, 'Re-allocation', 'পুনরায় বরাদ্দ', NULL, 1, 8, 1, 24, NULL, '2019-01-31 23:13:53', '2019-01-31 23:13:53'),
(56, 'Re-allocations', 'পুনরায় বরাদ্দ', 're_allcation.index', 55, 1, 1, 24, 24, '2019-01-31 23:14:09', '2019-02-02 04:09:41'),
(57, 'Re-appropriation', 'পুনরায় উপযোজন', 're_appropriation.index', 55, 2, 1, 24, 24, '2019-01-31 23:14:58', '2019-02-01 00:56:05'),
(58, 'New Project Summary', 'নতুন প্রকল্প সারসংক্ষেপ', 'summary.index', 8, 4, 1, 24, 24, '2019-02-06 04:08:22', '2019-02-06 04:09:42'),
(59, 'ADP Summary', 'এডিপি সারাংশ', 'AdpSummery.index', 25, 5, 1, 24, NULL, '2019-02-07 02:22:05', '2019-02-07 02:22:05'),
(60, 'Approved Project Summary', 'অনুমোদিত প্রকল্পের সারসংক্ষেপ', 'approved_summary.index', 37, 3, 1, 24, NULL, '2019-02-10 22:27:51', '2019-02-10 22:27:51'),
(61, 'Ceiling Distributors', 'সিলিং পরিবেশক', NULL, 1, 8, 1, 24, 24, '2019-02-11 21:59:21', '2019-02-11 22:05:00'),
(62, 'Finance Division Distribution', 'অর্থ বিভাগ বিতরণ', 'financial-division-distributon.index', 61, 1, 1, 24, NULL, '2019-02-11 22:00:38', '2019-02-11 22:00:38'),
(63, 'P. D. Distribution', 'পি. ডি. বিতরণ\r\n', 'pd_distribution.index', 61, 2, 1, 24, 24, '2019-02-11 22:01:30', '2019-02-16 00:39:51'),
(64, 'Project Wise Celing', 'প্রকল্প অনুযায়ী সিলিং', 'project_celings.create', 61, 4, 1, 24, 24, '2019-02-11 22:03:01', '2019-02-16 00:40:36'),
(65, 'Foreign Aid Budget', 'বৈদেশিক সাহায্য বাজেট', 'fa-budget-accounts.index', 61, 6, 1, 24, 24, '2019-02-11 22:07:23', '2019-02-16 00:37:54'),
(66, 'Project Wise Celing Explorer', 'প্রকল্প অনুযায়ী সেলিং এক্সপ্লোরার', 'project_celings.show', 61, 5, 1, 24, 24, '2019-02-14 03:07:43', '2019-02-16 00:40:50'),
(67, 'P. D. Ceiling Explorar', 'পি. ডি. সিলিং এক্সপ্লোরার', 'pd_distribution.create', 61, 3, 1, 24, 24, '2019-02-15 22:32:25', '2019-02-16 00:40:13'),
(68, 'Multiyear Goal', 'বহু-বছরের লক্ষ্য', 'multiyear-goal.index', 34, 9, 1, 24, NULL, '2019-02-20 05:06:33', '2019-02-20 05:06:33'),
(69, 'Multi-year Target', 'বহু-বছরের লক্ষ্যমাত্রা', 'multiyear-target.index', 34, 10, 1, 24, NULL, '2019-02-23 22:14:22', '2019-02-23 22:14:22'),
(70, 'Foreign Aid Budget Explorer', 'বৈদেশিক সাহায্য বাজেট এক্সপ্লোরার', 'fa-budget-accounts.create', 61, 7, 1, 24, NULL, '2019-02-23 22:17:21', '2019-02-23 22:17:21'),
(71, 'Gender Goal', 'লিঙ্গ লক্ষ্য', 'genderGoal.index', 34, 13, 1, 24, 24, '2019-02-24 00:37:04', '2019-02-24 00:46:12'),
(72, 'Gender Target', 'লিঙ্গ লক্ষ্যমাত্রা', 'genderGoalTarget.index', 34, 14, 1, 24, 24, '2019-02-24 00:37:36', '2019-02-24 03:22:26'),
(73, 'Approved Project Approval', 'অনুমোদিত প্রকল্প অনুমোদন', 'approaved_project_approval.index', 37, 4, 1, 24, 24, '2019-02-24 22:24:50', '2019-02-24 22:36:28'),
(74, 'New Project Status Summary', 'নতুন প্রকল্প স্থিতি সারসংক্ষেপ', 'new-project-status-summary.index', 8, 5, 1, 24, NULL, '2019-02-24 23:34:11', '2019-02-24 23:34:11'),
(75, 'Approval Setup', 'অনুমোদন সেটআপ', 'approval-setup.index', 10, 9, 1, 24, 24, '2019-02-26 23:30:04', '2019-03-02 01:06:00'),
(77, 'Ministry Mapping', 'Ministry Mapping', 'ministrymapping.index', 10, 2, 1, 24, NULL, '2019-03-02 23:01:05', '2019-03-02 23:01:05'),
(78, 'Demand Summary', 'Demand Summary', 'demandsummary.index', 25, 6, 1, 24, NULL, '2019-03-03 22:34:17', '2019-03-03 22:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_29_064059_create_usergroups_table', 1),
(4, '2018_11_04_075825_add_seven_colum_users_table', 2),
(5, '2018_11_06_090002_create_menus_table', 3),
(7, '2018_11_07_041329_add_subgroup_column_in_usergroups_table', 4),
(8, '2018_11_07_061815_add_subgroup_column_in_usergroups_table', 5),
(11, '2018_11_10_050058_drop_two_column_add_one_column_in_menus_table', 6),
(15, '2018_11_13_095527_create_user_privileges_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ministries`
--

CREATE TABLE `ministries` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `keyword` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `ministry_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ministry_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ministry_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector_id` int(11) DEFAULT NULL,
  `subsector_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ministries`
--

INSERT INTO `ministries` (`id`, `keyword`, `created_at`, `updated_at`, `created_by`, `updated_by`, `ministry_name`, `ministry_name_bn`, `ministry_description`, `sector_id`, `subsector_id`, `deleted_at`, `status`) VALUES
(2, 'ma', '2018-11-20 04:36:54', '2019-01-05 03:12:06', NULL, NULL, 'Planning Ministry', '', 'The Ministry of Planning oversees the financial policies of the Bangladeshi Government, responsible for socioeconomic planning and statistics management It contains three Divisions.', NULL, NULL, '2019-01-05 03:12:06', 0),
(7, 'mb', '2019-01-05 02:13:55', '2019-01-05 02:14:04', NULL, NULL, 'asd', '', 'asd', NULL, NULL, '2019-01-05 02:14:04', 1),
(8, 'mc', '2019-01-05 02:19:55', '2019-01-05 03:32:55', 24, 24, 'asd', '', 'dfdf', NULL, NULL, '2019-01-05 03:32:55', 1),
(9, 'md', '2019-01-05 03:01:07', '2019-01-05 03:13:00', 24, 24, 'sdf', '', 'sdf', NULL, NULL, '2019-01-05 03:13:00', 1),
(10, 'me', '2019-01-05 03:01:51', '2019-01-05 03:05:36', 24, 24, 'asd', '', 'asd', NULL, NULL, '2019-01-05 03:05:36', 1),
(11, 'mf', '2019-01-05 03:04:17', '2019-01-05 03:05:03', 24, 24, 'asd', '', 'fdf', NULL, NULL, '2019-01-05 03:05:03', 1),
(12, 'mg', '2019-01-05 03:10:48', '2019-01-06 00:54:47', 28, 28, 'asd fg', '', 'fgfg', NULL, NULL, '2019-01-06 00:54:47', 1),
(13, 'mh', '2019-01-05 03:29:12', '2019-01-05 03:56:03', 24, 24, 'asd', '', 'asd', NULL, NULL, '2019-01-05 03:56:03', 1),
(14, 'mi', '2019-01-05 04:20:18', '2019-01-06 00:54:49', 24, 24, 'asd', '', 'asdf', NULL, NULL, '2019-01-06 00:54:49', 1),
(15, 'mj', '2019-01-05 04:39:20', '2019-01-06 00:54:51', 24, 24, 'update dd', '', 'this is update', NULL, NULL, '2019-01-06 00:54:51', 1),
(16, 'm1', '2019-01-06 00:55:28', '2019-03-02 00:53:50', 24, 24, 'Ministry 1', 'Ministry 1', 'The Ministry of Planning oversees the financial policies of the Bangladeshi Government.', 1, 10, NULL, 1),
(17, 'm2', '2019-01-06 00:56:30', '2019-03-02 01:10:24', 24, 24, 'Ministry 2', 'Ministry 2', 'he Ministry of Finance is a ministry of Bangladesh. The ministry is responsible for state finance.', 2, 11, NULL, 1),
(18, 'mn', '2019-01-06 04:29:37', '2019-01-06 04:29:48', 24, 24, 'r', '', 'raaaaa', NULL, NULL, '2019-01-06 04:29:48', 1),
(20, 'm3', '2019-01-31 01:51:07', '2019-03-02 00:54:23', 24, 24, 'Ministry 3', 'Ministry 3', 'dfdasfasf', 1, 10, NULL, 1),
(23, 'm4', '2019-01-31 02:18:34', '2019-03-02 00:54:38', 24, 24, 'Ministry 4', 'Ministry 4', 'dfdsaf', 1, 10, NULL, 1),
(24, 'OP', '2019-02-27 03:28:36', '2019-02-27 03:29:06', 24, 24, 'LOL', 'চট্টগ্রাম চট্টগ্রাম', 'dassss', 2, 11, '2019-02-27 03:29:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ministry_mapping`
--

CREATE TABLE `ministry_mapping` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `ministry_id` int(11) DEFAULT NULL,
  `sector_id` int(11) DEFAULT NULL,
  `subsector_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `multiyear_goals`
--

CREATE TABLE `multiyear_goals` (
  `id` int(10) UNSIGNED NOT NULL,
  `gole_no` varchar(100) NOT NULL,
  `gole_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `multiyear_goals`
--

INSERT INTO `multiyear_goals` (`id`, `gole_no`, `gole_name`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `status`) VALUES
(1, '1', 'mgoal1', 'mgoal1', '2019-02-20 05:08:09', '2019-02-24 01:03:01', 24, 24, NULL, 1),
(2, '2', 'mgoal2', 'mgoal1', '2019-02-24 01:03:24', '2019-02-24 01:03:24', 24, 24, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `multiyear_targets`
--

CREATE TABLE `multiyear_targets` (
  `id` int(10) UNSIGNED NOT NULL,
  `gole_id` int(11) NOT NULL,
  `targets` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `multiyear_targets`
--

INSERT INTO `multiyear_targets` (`id`, `gole_id`, `targets`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `status`) VALUES
(2, 1, 'Goal 1 target', 'goal 1 target', '2019-02-24 01:06:04', '2019-02-24 02:20:21', 24, 24, NULL, 1),
(3, 2, 'goal2 target', 'goal2 target', '2019-02-24 01:09:23', '2019-02-24 01:10:48', 24, 24, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pa_sources`
--

CREATE TABLE `pa_sources` (
  `id` int(10) UNSIGNED NOT NULL,
  `pa_source_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pa_source_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pa_source_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) NOT NULL,
  `updated_by` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pa_sources`
--

INSERT INTO `pa_sources` (`id`, `pa_source_name`, `pa_source_name_bn`, `pa_source_description`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 'source 1', '', 'source desc', 1, '2019-01-07 01:10:54', '2019-01-08 23:13:02', '2019-01-08 23:13:02', 24, 24),
(2, 'dsd', '', 'sd', 1, '2019-01-07 02:27:54', '2019-01-08 23:11:36', '2019-01-08 23:11:36', 24, 24),
(3, 'This is test source', '', 'desc', 1, '2019-01-08 23:12:50', '2019-01-10 03:44:48', NULL, 24, 24),
(4, 'erdddd', 'আমাদের নাম', 'asdfasd', 1, '2019-02-26 03:06:52', '2019-02-26 03:07:04', '2019-02-26 03:07:04', 24, 24);

-- --------------------------------------------------------

--
-- Table structure for table `poverty_goals`
--

CREATE TABLE `poverty_goals` (
  `id` int(10) UNSIGNED NOT NULL,
  `goal_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` mediumint(9) NOT NULL,
  `updated_by` mediumint(9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poverty_goals`
--

INSERT INTO `poverty_goals` (`id`, `goal_no`, `goal_name`, `goal_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Create opportunities', 'Create opportunities for good and decent jobs and secure livelihoods', 1, 24, 24, '2019-01-16 01:59:07', '2019-01-19 00:39:01', NULL),
(2, '2', 'Support inclusive', 'Support inclusive', 1, 24, 24, '2019-01-16 02:01:42', '2019-01-19 00:40:19', NULL),
(3, 'dfdf', 'fdf', 'dfdf', 1, 24, 24, '2019-01-16 02:02:28', '2019-01-16 03:04:28', '2019-01-16 03:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `poverty_targets`
--

CREATE TABLE `poverty_targets` (
  `id` int(10) UNSIGNED NOT NULL,
  `goal_name_id` int(11) NOT NULL,
  `target` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` mediumint(9) NOT NULL,
  `updated_by` mediumint(9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poverty_targets`
--

INSERT INTO `poverty_targets` (`id`, `goal_name_id`, `target`, `target_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Create opportunities for good and decent jobs and secure livelihoods', 'Create opportunities for good and decent jobs and secure livelihoods', 1, 24, 24, '2019-01-16 03:53:38', '2019-01-19 00:39:23', NULL),
(3, 2, 'Support inclusive and sustainable business practices', 'Support inclusive and sustainable business practices', 1, 24, 24, '2019-01-16 04:39:47', '2019-01-19 00:40:51', NULL),
(4, 1, 'Create opportunities to all', 'Create opportunities to all', 1, 24, 24, '2019-01-19 01:14:57', '2019-01-19 01:14:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pppgole`
--

CREATE TABLE `pppgole` (
  `id` int(10) UNSIGNED NOT NULL,
  `gole_no` varchar(100) NOT NULL,
  `gole_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pppgole`
--

INSERT INTO `pppgole` (`id`, `gole_no`, `gole_name`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `status`) VALUES
(1, '1', 'PPP Goal 1', 'PPP Goal 1', '2019-01-16 05:18:10', '2019-01-16 05:22:05', 24, 24, '2019-01-16 05:22:05', 1),
(2, '1', 'PPP goal 1', 'PPP GOAL 1', '2019-01-16 05:18:25', '2019-01-19 01:40:30', 24, 24, NULL, 1),
(3, '12', 'PPP goal 2', 'PPP goal 2', '2019-01-19 00:34:02', '2019-01-19 01:40:45', 24, 24, NULL, 1),
(4, 'GOAL 1', 'PPP Goal 2', 'PPP Goal 2', '2019-01-19 00:51:07', '2019-01-19 01:40:03', 24, 24, '2019-01-19 01:40:03', 1),
(5, '3', 'PPP Goal 3', 'PPP Goal 3', '2019-01-19 00:51:46', '2019-01-19 01:40:00', 24, 24, '2019-01-19 01:40:00', 1),
(6, '3', 'PPP Goal 3', 'PPP Goal 3', '2019-01-19 00:52:03', '2019-01-19 01:39:58', 24, 24, '2019-01-19 01:39:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ppptargets`
--

CREATE TABLE `ppptargets` (
  `id` int(10) UNSIGNED NOT NULL,
  `gole_id` int(11) NOT NULL,
  `targets` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ppptargets`
--

INSERT INTO `ppptargets` (`id`, `gole_id`, `targets`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `status`) VALUES
(1, 3, 'PPP Target 1', 'PPP Target 1', '2019-01-19 00:36:33', '2019-01-19 00:49:19', 24, 24, '2019-01-19 00:49:19', 1),
(2, 2, 'PP goal 1 target', 'PP goal 1 target', '2019-01-19 00:56:33', '2019-01-19 01:41:17', 24, 24, NULL, 1),
(3, 4, 'PPP Target 2', 'PPP Target 2', '2019-01-19 00:56:59', '2019-01-19 00:57:38', 24, 24, '2019-01-19 00:57:38', 1),
(4, 3, 'PP goal 2 target', 'PP goal 2 target', '2019-01-19 01:41:28', '2019-01-19 01:41:28', 24, 24, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `programming_division_distribution_dtls`
--

CREATE TABLE `programming_division_distribution_dtls` (
  `id` int(10) UNSIGNED NOT NULL,
  `master_id` int(11) NOT NULL,
  `ministry_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programming_division_distribution_dtls`
--

INSERT INTO `programming_division_distribution_dtls` (`id`, `master_id`, `ministry_id`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(41, 20, 16, 1000, NULL, NULL, NULL, NULL, NULL, 1),
(42, 20, 17, 789, NULL, NULL, NULL, NULL, NULL, 1),
(43, 20, 20, 23, NULL, NULL, NULL, NULL, NULL, 1),
(44, 20, 23, 1231, NULL, NULL, NULL, NULL, NULL, 1),
(45, 21, 16, 1000, NULL, NULL, NULL, NULL, NULL, 1),
(46, 21, 17, 1000, NULL, NULL, NULL, NULL, NULL, 1),
(47, 21, 23, 1000, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `programming_division_distribution_msts`
--

CREATE TABLE `programming_division_distribution_msts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ceiling_for` tinyint(4) NOT NULL,
  `ceiling_amount` double NOT NULL,
  `ceiling_balance` double NOT NULL,
  `is_special_account` tinyint(4) DEFAULT NULL,
  `sector_id` int(11) NOT NULL,
  `subsector_id` int(11) NOT NULL,
  `fiscal_year` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programming_division_distribution_msts`
--

INSERT INTO `programming_division_distribution_msts` (`id`, `ceiling_for`, `ceiling_amount`, `ceiling_balance`, `is_special_account`, `sector_id`, `subsector_id`, `fiscal_year`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(20, 1, 7788, 4745, NULL, 1, 10, 13, NULL, NULL, '2019-02-17 04:10:39', '2019-02-17 04:10:39', NULL, 1),
(21, 0, 23344, 20344, NULL, 1, 10, 1, NULL, NULL, '2019-03-04 00:00:22', '2019-03-04 00:00:22', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_sources`
--

CREATE TABLE `project_sources` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `source_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_sources`
--

INSERT INTO `project_sources` (`id`, `source_name`, `source_name_bn`, `source_description`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'UNDP', '', 'The United Nations Development Programme is the United Nations\' global development network. Headquartered in New York City', 1, '2019-01-02 03:03:58', '2019-01-02 03:03:58', NULL, NULL, NULL),
(2, 'JICA', '', 'DescriptionThe Japan International Cooperation Agency is a governmental agency that coordinates official development assistance for the government of Japan.', 1, '2019-01-02 03:27:31', '2019-01-02 03:27:31', NULL, NULL, NULL),
(3, 'wee', '', 'wee', 1, '2019-01-23 05:06:14', '2019-01-23 05:07:19', NULL, NULL, '2019-01-23 05:07:19'),
(4, 'wewe', '', 'wewe', 1, '2019-01-23 05:06:32', '2019-01-23 05:06:39', NULL, NULL, '2019-01-23 05:06:39'),
(5, 'hhh', '', 'hghfgh', 1, '2019-01-23 05:07:10', '2019-01-23 05:07:16', NULL, NULL, '2019-01-23 05:07:16'),
(6, 'asfdaafsaasdfafsddfdfadfasdf', 'উপজেলা / অবস্থান নাম বাংলা উপজেলা / অবস্থান নাম বাংলা', 'adsafdfdasfdsaadsfasfasdfasdf', 1, '2019-02-26 03:46:17', '2019-02-26 03:50:17', NULL, NULL, '2019-02-26 03:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `project_types`
--

CREATE TABLE `project_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `keyword` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_type_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_type_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` mediumint(9) NOT NULL,
  `updated_by` mediumint(9) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_types`
--

INSERT INTO `project_types` (`id`, `keyword`, `project_type`, `project_type_bn`, `project_type_description`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, '', 'dfdfdf', '', 'dfdf', 1, '2019-01-14 23:17:44', '2019-01-14 23:31:36', 24, 24, '2019-01-14 23:31:36'),
(2, '', 'approved', '', 'approved project', 1, '2019-01-14 23:32:49', '2019-01-14 23:32:53', 24, 24, '2019-01-14 23:32:53'),
(3, '', 'new', '', 'new project', 1, '2019-01-14 23:33:36', '2019-01-14 23:33:40', 24, 24, '2019-01-14 23:33:40'),
(4, 'p1', 'Inv', '', 'Investment', 1, '2019-01-14 23:34:08', '2019-01-31 05:00:46', 24, 24, NULL),
(5, 'p2', 'TA', '', 'Technical Assistance', 1, '2019-01-14 23:50:21', '2019-02-18 23:53:05', 24, 24, NULL),
(6, 'dd', 'project', '', 'project', 1, '2019-01-14 23:50:48', '2019-01-16 03:59:13', 24, 24, '2019-01-16 03:59:13'),
(7, 'p3', 'new', '', 'new', 1, '2019-01-31 02:58:32', '2019-02-18 23:53:16', 24, 24, '2019-02-18 23:53:16'),
(8, 'Q1', 'Good EW', 'ভাল', 'ae', 1, '2019-02-26 02:51:43', '2019-02-26 02:55:17', 24, 24, '2019-02-26 02:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `project_wise_ceiling_distribution_dtls`
--

CREATE TABLE `project_wise_ceiling_distribution_dtls` (
  `id` int(10) UNSIGNED NOT NULL,
  `master_id` int(11) DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_wise_ceiling_distribution_dtls`
--

INSERT INTO `project_wise_ceiling_distribution_dtls` (`id`, `master_id`, `project_id`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(43, 1, 1, 50, 24, 24, '2019-02-19 11:13:21', '2019-02-19 11:13:21', NULL, 1),
(44, 1, 10, 100, 24, 24, '2019-02-19 11:13:21', '2019-02-19 11:13:21', NULL, 1),
(45, 1, 2, 200, 24, 24, '2019-02-19 11:13:21', '2019-02-19 11:13:21', NULL, 1),
(46, 1, 5, 200, 24, 24, '2019-02-19 11:13:21', '2019-02-19 11:13:21', NULL, 1),
(47, 1, 11, 200, 24, 24, '2019-02-19 11:13:21', '2019-02-19 11:13:21', NULL, 1),
(48, 1, 28, 100, 24, 24, '2019-02-19 11:13:21', '2019-02-19 11:13:21', NULL, 1),
(49, 1, 55, 100, 24, 24, '2019-02-19 11:13:21', '2019-02-19 11:13:21', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_wise_ceiling_distribution_msts`
--

CREATE TABLE `project_wise_ceiling_distribution_msts` (
  `id` int(10) UNSIGNED NOT NULL,
  `sector_id` int(11) DEFAULT NULL,
  `subsector_id` int(11) DEFAULT NULL,
  `ministry_id` int(11) DEFAULT NULL,
  `fiscal_year` int(11) DEFAULT NULL,
  `ceiling_for` tinyint(4) DEFAULT NULL,
  `block_allocation` double NOT NULL,
  `balance` double NOT NULL,
  `is_special_account` tinyint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_wise_ceiling_distribution_msts`
--

INSERT INTO `project_wise_ceiling_distribution_msts` (`id`, `sector_id`, `subsector_id`, `ministry_id`, `fiscal_year`, `ceiling_for`, `block_allocation`, `balance`, `is_special_account`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, NULL, NULL, 16, 13, 1, 1000, 50, NULL, 24, 24, '2019-02-19 02:35:00', '2019-02-19 05:02:37', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `re_allocation`
--

CREATE TABLE `re_allocation` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `re_allocation_total` double NOT NULL,
  `re_allocation_taka` double NOT NULL,
  `re_allocation_taka_revenue` double NOT NULL,
  `re_allocation_capital` double NOT NULL,
  `re_allocation_capital_rpa` double NOT NULL,
  `re_allocation_revenue` double NOT NULL,
  `re_allocation_cd_vat` double NOT NULL,
  `re_allocation_pa` double NOT NULL,
  `re_allocation_pa_rpa` double NOT NULL,
  `re_allocation_others` double NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `re_allocation`
--

INSERT INTO `re_allocation` (`id`, `project_id`, `re_allocation_total`, `re_allocation_taka`, `re_allocation_taka_revenue`, `re_allocation_capital`, `re_allocation_capital_rpa`, `re_allocation_revenue`, `re_allocation_cd_vat`, `re_allocation_pa`, `re_allocation_pa_rpa`, `re_allocation_others`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(33, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 24, 24, '2019-02-11 02:51:43', '2019-02-11 02:51:43', 0),
(34, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 24, 24, '2019-02-11 02:51:43', '2019-02-11 02:51:43', 0),
(35, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 24, 24, '2019-02-11 02:51:43', '2019-02-11 02:51:43', 0),
(36, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 24, 24, '2019-02-11 02:51:44', '2019-02-11 02:51:44', 0),
(37, 1, 7, 8, 8, 9, 9, 9, 9, 99, 9, 9, 24, 24, '2019-02-12 02:29:57', '2019-02-12 02:29:57', 0),
(38, 5, 7, 8, 9, 5, 6, 6, 6, 5, 5, 4, 24, 24, '2019-02-12 02:29:58', '2019-02-12 02:29:58', 0),
(39, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 24, 24, '2019-02-12 02:30:36', '2019-02-12 02:30:36', 0),
(40, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 24, 24, '2019-02-12 02:30:36', '2019-02-12 02:30:36', 0),
(41, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 24, 24, '2019-02-13 02:34:08', '2019-02-13 02:34:08', 0),
(42, 2, 1, 2, 2, 0, 0, 0, 0, 0, 0, 0, 24, 24, '2019-02-13 02:37:52', '2019-02-13 02:37:52', 0),
(43, 10, 1, 1, 2, 0, 0, 0, 0, 0, 0, 0, 24, 24, '2019-02-13 02:38:15', '2019-02-13 02:38:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `re_appropriation`
--

CREATE TABLE `re_appropriation` (
  `id` int(11) NOT NULL,
  `target_project_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `re_appro_total` double NOT NULL,
  `re_appro_taka` double NOT NULL,
  `re_appro_revenue` double NOT NULL,
  `re_appropriation_capital` double NOT NULL,
  `re_appropriation_capital_rpa` double NOT NULL,
  `re_appropriation_capital_revenue` double NOT NULL,
  `re_appropriation_cd_vat` double NOT NULL,
  `re_appropriation_pa` double NOT NULL,
  `re_appropriation_pa_rpa` double NOT NULL,
  `re_appropriation_others` double NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `re_appropriation`
--

INSERT INTO `re_appropriation` (`id`, `target_project_id`, `project_id`, `re_appro_total`, `re_appro_taka`, `re_appro_revenue`, `re_appropriation_capital`, `re_appropriation_capital_rpa`, `re_appropriation_capital_revenue`, `re_appropriation_cd_vat`, `re_appropriation_pa`, `re_appropriation_pa_rpa`, `re_appropriation_others`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(20, 2, 10, 7, 8, 9, 45, 45, 45, 45, 45, 45, 45, 24, 24, '2019-02-14 04:20:56', '2019-02-14 04:20:56', 0),
(21, 2, 10, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 24, 24, '2019-02-14 04:40:07', '2019-02-14 04:40:07', 0),
(22, 5, 11, 1, 8, 9, 5, 6, 9, 7, 5, 8, 9, 24, 24, '2019-02-15 22:24:08', '2019-02-15 22:24:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rmos`
--

CREATE TABLE `rmos` (
  `id` int(10) UNSIGNED NOT NULL,
  `rmo_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rmo_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rmo_description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rmos`
--

INSERT INTO `rmos` (`id`, `rmo_name`, `rmo_name_bn`, `rmo_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'firstRmo', '', 'Rmo Name', 1, 24, 24, '2019-01-19 05:08:17', '2019-01-27 03:10:45', NULL),
(2, 'Rmo2', '', 'Rmo2', 1, 24, NULL, '2019-01-19 05:08:39', '2019-01-19 05:08:39', NULL),
(3, 'a', 'চট্টগ্রাম', 'b', 1, 24, NULL, '2019-02-27 03:03:15', '2019-02-27 03:07:27', '2019-02-27 03:07:27'),
(4, 'a', 'চট্টগ্রাম চট্টগ্রাম', 'b', 1, 24, 24, '2019-02-27 03:03:45', '2019-02-27 03:07:39', '2019-02-27 03:07:39'),
(5, 'a', 'চট্টগ্রাম', 'b', 1, 24, NULL, '2019-02-27 03:05:12', '2019-02-27 03:07:42', '2019-02-27 03:07:42'),
(6, 'a', 'চট্টগ্রাম', 'b', 1, 24, NULL, '2019-02-27 03:05:47', '2019-02-27 03:07:44', '2019-02-27 03:07:44'),
(7, 'a', '', 'b', 1, 24, NULL, '2019-02-27 03:06:45', '2019-02-27 03:07:24', '2019-02-27 03:07:24'),
(8, 'a', 'চট্টগ্রাম চট্টগ্রাম', 'a', 1, 24, NULL, '2019-02-27 03:08:02', '2019-02-27 03:08:46', '2019-02-27 03:08:46'),
(9, 'a', 'চট্টগ্রাম চট্টগ্রাম', 'a', 1, 24, NULL, '2019-02-27 03:08:44', '2019-02-27 03:08:49', '2019-02-27 03:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `sdgsgole`
--

CREATE TABLE `sdgsgole` (
  `id` int(10) UNSIGNED NOT NULL,
  `gole_no` varchar(100) NOT NULL,
  `gole_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sdgsgole`
--

INSERT INTO `sdgsgole` (`id`, `gole_no`, `gole_name`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `status`) VALUES
(1, 'GOAL 1', 'GOAL 2', 'GOAL 2', '2019-01-09 23:33:15', '2019-01-16 05:16:03', 24, 24, '2019-01-16 05:16:03', 1),
(2, 'GOAL 2', 'Zero Hunger', 'Zero Hunger', '2019-01-09 23:49:50', '2019-01-09 23:49:50', 24, 24, NULL, 1),
(3, 'GOAL 3', 'Good Health and Well-being', 'Good Health and Well-being', '2019-01-09 23:52:31', '2019-01-09 23:52:31', 24, 24, NULL, 1),
(4, 'GOAL 4', 'Quality Education', 'Quality Education', '2019-01-09 23:52:58', '2019-01-09 23:52:58', 24, 24, NULL, 1),
(5, 'GOAL 5', 'Gender Equality', 'Gender Equality', '2019-01-09 23:53:23', '2019-01-09 23:53:23', 24, 24, NULL, 1),
(6, 'GOAL 6', 'Clean Water and Sanitation', 'Clean Water and Sanitation', '2019-01-10 00:27:39', '2019-01-10 00:27:39', 24, 24, NULL, 1),
(7, 'GOAL 7', 'Affordable and Clean Energy', 'Affordable and Clean Energy', '2019-01-10 00:28:07', '2019-01-10 00:28:07', 24, 24, NULL, 1),
(8, 'GOAL 8', 'Decent Work and Economic Growth', 'Decent Work and Economic Growth', '2019-01-10 00:28:36', '2019-01-10 00:28:36', 24, 24, NULL, 1),
(9, 'GOAL 9', 'Industry, Innovation and Infrastructure', 'Industry, Innovation and Infrastructure', '2019-01-10 00:29:03', '2019-01-10 00:29:03', 24, 24, NULL, 1),
(10, 'GOAL 10', 'Reduced Inequality', 'Reduced Inequality', '2019-01-10 00:29:27', '2019-01-10 00:29:27', 24, 24, NULL, 1),
(11, '1', 'PPP Goal 1', 'PPP Goal 1', '2019-01-16 04:50:20', '2019-01-16 04:56:48', 24, 24, '2019-01-16 04:56:48', 1),
(12, '1', 'PPP Goal 1', 'PPP Goal 1', '2019-01-16 04:55:37', '2019-01-16 04:56:42', 24, 24, '2019-01-16 04:56:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sdgstargets`
--

CREATE TABLE `sdgstargets` (
  `id` int(10) UNSIGNED NOT NULL,
  `gole_id` int(11) NOT NULL,
  `targets` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sdgstargets`
--

INSERT INTO `sdgstargets` (`id`, `gole_id`, `targets`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `status`) VALUES
(1, 3, 'By 2030, eradicate extreme poverty for all people everywhere, currently measured as people living on less than $1.25 a day.', 'By 2030, eradicate extreme poverty for all people everywhere, currently measured as people living on less than $1.25 a day.', '2019-01-10 02:22:18', '2019-01-19 03:46:39', 24, 24, NULL, 1),
(2, 2, 'End hunger, achieve food security and improved nutrition, and promote sustainable agriculture', 'End hunger, achieve food security and improved nutrition, and promote sustainable agriculture', '2019-01-16 02:22:19', '2019-01-16 02:22:19', 24, 24, NULL, 1),
(3, 2, 'A profound change of the global food and agriculture system is needed', 'A profound change of the global food and agriculture system is needed', '2019-01-19 00:17:47', '2019-01-19 00:17:47', 24, 24, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `keyword` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id`, `keyword`, `sector_name`, `sector_name_bn`, `sector_description`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 's1', 'Sector 1', 'Sector 1', 'Finance Sector', 1, '2019-01-02 03:08:09', '2019-03-02 00:56:17', NULL, NULL, NULL),
(2, 's2', 'Sector 2', 'Sector 2', 'Sector 2', 1, '2019-01-10 03:01:16', '2019-03-02 00:56:27', NULL, NULL, NULL),
(3, '', 'dfdf', '', NULL, 1, '2019-01-23 03:22:51', '2019-01-23 03:43:10', NULL, NULL, '2019-01-23 03:43:10'),
(4, '', 'd', '', NULL, 1, '2019-01-23 03:24:23', '2019-01-23 03:26:03', NULL, NULL, '2019-01-23 03:26:03'),
(5, '', 'dfdfdf', '', NULL, 1, '2019-01-23 04:22:03', '2019-01-23 04:25:31', NULL, NULL, '2019-01-23 04:25:31'),
(6, '', 'dfdf', '', NULL, 1, '2019-01-23 04:25:23', '2019-01-23 04:25:27', NULL, NULL, '2019-01-23 04:25:27'),
(7, 'WR', 'a', 'অনুমোদনকারি', 'b', 1, '2019-02-27 02:10:39', '2019-02-27 02:11:18', NULL, NULL, '2019-02-27 02:11:18'),
(8, 'ae', 'av', 'অনুমো', 'bv', 1, '2019-02-27 02:11:29', '2019-02-27 02:11:46', NULL, NULL, '2019-02-27 02:11:46'),
(9, 's3', 'Sector 3', 'Sector 3', 'Sector 3', 1, '2019-03-02 00:56:45', '2019-03-02 00:56:45', NULL, NULL, NULL),
(10, 's4', 'Sector 4', 'Sector 4', 'Sector 4', 1, '2019-03-02 00:57:04', '2019-03-02 00:57:04', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subsectors`
--

CREATE TABLE `subsectors` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `keyword` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector_name` mediumint(11) NOT NULL,
  `sub_sector_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sector_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sector_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subsectors`
--

INSERT INTO `subsectors` (`id`, `keyword`, `sector_name`, `sub_sector_name`, `sub_sector_name_bn`, `sub_sector_description`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(10, 's1', 1, 'Sub sector 1', 'Sub sector 1', 'Sub sector 1', 1, '2019-01-10 04:29:08', '2019-03-02 00:58:10', NULL, NULL, NULL),
(11, 's2', 2, 'Sub sector 2', 'Sub sector 2', 'Sub sector 2', 1, '2019-01-23 04:30:47', '2019-03-02 00:58:30', NULL, NULL, NULL),
(12, 'af', 1, 'SUb', 'সাব', 'JKAIOOEP', 1, '2019-02-27 01:53:35', '2019-02-27 01:54:21', NULL, NULL, '2019-02-27 01:54:21'),
(13, 'ae', 1, 'SUb', 'সাব', 'adsf', 1, '2019-02-27 03:41:42', '2019-02-27 03:41:52', NULL, NULL, '2019-02-27 03:41:52'),
(14, 's3', 9, 'Sub sector 3', 'Sub sector 3', 'Sub sector 3', 1, '2019-03-02 00:58:50', '2019-03-02 00:58:50', NULL, NULL, NULL),
(15, 's4', 10, 'Sub sector 4', 'Sub sector 4', 'Sub sector 4', 1, '2019-03-02 00:59:10', '2019-03-02 00:59:10', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unapproved_project_comment_details`
--

CREATE TABLE `unapproved_project_comment_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `comment_level` tinyint(4) DEFAULT NULL,
  `comments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unapproved_project_comment_details`
--

INSERT INTO `unapproved_project_comment_details` (`id`, `project_id`, `comment_level`, `comments`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 2, 'The project cost is too much it should be reduced,and the component is very high in amount i don\'t think that much component is need.', 24, 24, '2019-01-17 07:56:44', '2019-01-17 03:09:37', 1),
(2, 1, 2, 'The Project is going good make it going that way. Thank you for all your help. Your service was excellent and very FAST.', 24, 24, '2019-01-17 07:57:33', '2019-01-17 01:59:31', 1),
(3, 1, 2, 'The agency need more money to accomplish the project..finance division should notified.', 24, 24, '2019-01-17 07:58:16', '2019-01-17 07:58:16', 1),
(5, 1, 2, 'Many thanks for you kind and efficient service. I have already and will definitely continue to recommend your services to others in the future. Wishing you all a lovely day and weekend.', 24, 24, '2019-01-17 07:59:18', '2019-01-17 07:59:18', 1),
(22, 2, 2, 'hello', 24, 24, '2019-01-17 10:07:26', '2019-01-17 10:07:26', 1),
(27, 4, 2, 'hello', 24, 24, '2019-01-20 03:57:50', '2019-01-20 03:57:50', 1),
(34, 11, 13, 'Agency Lavel Comments', 28, 28, '2019-01-22 10:05:36', '2019-01-22 10:05:36', 1),
(35, 13, 2, 'admin comment', 24, 24, '2019-01-23 11:03:15', '2019-01-23 11:03:15', 1),
(44, 21, 2, 'qww', 24, 24, '2019-01-28 08:16:21', '2019-01-28 08:16:21', 1),
(47, 22, 2, '32323232', 24, 24, '2019-01-28 08:32:08', '2019-01-28 08:32:08', 1),
(50, 24, 2, 'hi', 24, 24, '2019-01-30 03:52:11', '2019-01-29 21:52:16', 1),
(71, 25, 2, '121', 24, 24, '2019-01-30 05:34:45', '2019-02-26 00:31:49', 1),
(73, 26, 13, 'PM Promise', 28, 28, '2019-01-30 07:17:50', '2019-01-30 07:17:50', 1),
(96, 27, 2, '1123ee', 24, 24, '2019-01-30 10:49:05', '2019-01-30 22:42:33', 1),
(113, 28, 15, 'fgfgf', 40, 40, '2019-01-30 11:13:30', '2019-01-30 11:13:30', 1),
(122, 29, 14, 'sdf', 38, 38, '2019-01-31 04:54:49', '2019-01-31 04:54:49', 1),
(183, 30, 12, 'Ministry Comment', 38, 38, '2019-02-02 07:26:44', '2019-02-02 01:27:04', 1),
(184, 41, 13, 'we', 28, 28, '2019-02-02 11:36:20', '2019-02-02 11:36:20', 1),
(186, 11, 2, 'we', 24, 24, '2019-02-03 05:41:05', '2019-02-03 05:41:05', 1),
(188, 46, 2, 'test project comments', 24, 24, '2019-02-03 06:33:40', '2019-02-03 06:33:40', 1),
(189, 45, 13, 'sds', 28, 28, '2019-02-03 06:34:42', '2019-02-03 06:34:42', 1),
(191, 45, 12, 'very good', 30, 30, '2019-02-03 06:38:19', '2019-02-03 06:38:19', 1),
(208, 45, 11, 'wewe', 35, 35, '2019-02-03 07:16:28', '2019-02-03 07:16:28', 1),
(210, 45, 9, 'ok sir', 33, 33, '2019-02-03 07:19:05', '2019-02-03 07:19:05', 1),
(211, 45, 16, 'all done', 34, 34, '2019-02-03 07:19:55', '2019-02-03 07:19:55', 1),
(212, 47, 13, 'agency Comment', 40, 40, '2019-02-03 07:42:29', '2019-02-03 07:42:29', 1),
(214, 47, 12, 'ministry override', 30, 30, '2019-02-03 07:44:22', '2019-02-03 07:44:22', 1),
(217, 47, 11, 'Sub sector override', 41, 41, '2019-02-03 07:46:19', '2019-02-03 07:46:19', 1),
(219, 47, 9, 'drctor override', 33, 33, '2019-02-03 07:47:53', '2019-02-03 07:47:53', 1),
(220, 47, 16, 'hello', 34, 34, '2019-02-03 07:49:09', '2019-02-03 07:49:09', 1),
(221, 10, 2, 'a', 24, 24, '2019-02-03 08:22:30', '2019-02-12 00:32:57', 1),
(222, 28, 16, 'no comment', 34, 34, '2019-02-03 08:41:03', '2019-02-03 08:41:03', 1),
(224, 54, 13, 'dghdf dsf ghfsdg', 40, 40, '2019-02-12 06:42:46', '2019-02-12 00:45:20', 1),
(225, 55, 13, 'Agency Comments', 40, 40, '2019-02-18 11:27:13', '2019-02-18 11:27:13', 1),
(226, 56, 0, 'This is test Project Comment', 24, 24, '2019-02-19 08:29:44', '2019-02-19 08:29:44', 1),
(227, 57, 13, 'this is demo Project comment', 40, 40, '2019-02-19 09:12:03', '2019-02-19 09:12:03', 1),
(228, 24, 0, '3', 24, 24, '2019-02-20 06:21:21', '2019-02-20 06:21:21', 1),
(231, 61, 13, 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', 40, 40, '2019-02-25 10:57:14', '2019-02-25 05:04:03', 1),
(233, 61, 12, 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.  2', 30, 30, '2019-02-25 11:05:42', '2019-02-25 05:21:29', 1),
(234, 61, 11, 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project. 2', 35, 35, '2019-02-25 11:21:32', '2019-02-25 11:21:32', 1),
(251, 63, 0, 'll', 24, 24, '2019-02-26 06:41:33', '2019-02-26 06:41:33', 1),
(262, 32, 0, 'as', 24, 24, '2019-02-26 06:52:30', '2019-02-26 06:52:30', 1),
(263, 10, 0, 'w', 24, 24, '2019-02-26 06:54:22', '2019-02-26 06:54:22', 1),
(266, 25, 0, 'hello', 24, 24, '2019-02-26 06:57:51', '2019-02-26 06:57:51', 1),
(268, NULL, 0, 'adasd', 24, 24, '2019-02-26 07:02:00', '2019-02-26 07:02:00', 1),
(269, 65, 0, '12', 24, 24, '2019-02-26 07:02:50', '2019-02-26 07:02:50', 1),
(270, NULL, 13, 'abc', 40, 40, '2019-02-26 07:03:28', '2019-02-26 07:03:28', 1),
(274, 64, 13, '12', 40, 40, '2019-02-26 08:21:12', '2019-02-26 08:21:12', 1),
(277, 66, 0, '12', 24, 24, '2019-02-26 09:03:30', '2019-02-26 09:03:30', 1),
(278, 3, 0, '1234', 24, 24, '2019-02-26 10:35:59', '2019-02-26 10:35:59', 1),
(279, 70, 13, '45', 40, 40, '2019-03-02 07:57:41', '2019-03-02 07:57:41', 1),
(281, 71, 13, 'check done form agency moderator', 28, 28, '2019-03-03 05:10:07', '2019-03-03 05:10:07', 1),
(283, 71, 12, 'ministry super comment', 30, 30, '2019-03-03 05:16:56', '2019-03-03 05:16:56', 1),
(286, 73, 0, '1233', 24, 24, '2019-03-03 06:37:14', '2019-03-03 06:37:14', 1),
(287, 74, 13, 'uytuy', 40, 40, '2019-03-03 09:17:51', '2019-03-03 09:17:51', 1),
(288, 76, 13, 'Money need ASAP', 40, 40, '2019-03-04 05:38:47', '2019-03-04 05:38:47', 1),
(289, 76, 16, 'ok', 34, 34, '2019-03-04 05:55:39', '2019-03-04 05:55:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unapproved_project_component_details`
--

CREATE TABLE `unapproved_project_component_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `serial_number` int(11) DEFAULT NULL,
  `components_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `unit_cost` double DEFAULT NULL,
  `estimated_cost` double DEFAULT NULL,
  `created_by` tinyint(4) NOT NULL,
  `updated_by` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unapproved_project_component_details`
--

INSERT INTO `unapproved_project_component_details` (`id`, `project_id`, `serial_number`, `components_name`, `quantity`, `unit_cost`, `estimated_cost`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(22, 7, 1, '323', 123213, 213213, 26270613369, 24, 24, '2019-01-20 05:17:59', '2019-01-20 05:17:59', 1),
(26, 9, 1, 'Bricks Component', 1232332, 213, 262486716, 24, 24, NULL, NULL, 1),
(30, 12, 1, 'Bricks Component', 121, 121212, 14666652, 24, 24, '2019-01-23 03:17:48', '2019-01-23 03:17:48', 1),
(40, 13, 1, 'Bricks Component', 132, 232, 30624, 24, 24, NULL, NULL, 1),
(41, 14, 1, 'Bricks Component', 2, 2, 2, 24, 24, '2019-01-23 23:53:38', '2019-01-23 23:53:38', 1),
(42, 16, 1, 'Plastic Component', 11, 123, 1353, 24, 24, '2019-01-24 00:07:54', '2019-01-24 00:07:54', 1),
(43, 16, 1, '222112', 11, 1212, 13332, 24, 24, '2019-01-24 00:07:54', '2019-01-24 00:07:54', 1),
(44, 17, 1, '1212', 1212, 1212, 1468944, 24, 24, '2019-01-24 00:09:03', '2019-01-24 00:09:03', 1),
(45, 18, 1, 'Bricks Component', 11, 123, 1353, 24, 24, '2019-01-24 00:16:49', '2019-01-24 00:16:49', 1),
(46, 18, 1, 'Bricks Component', 11, 111, 1221, 24, 24, '2019-01-24 00:16:49', '2019-01-24 00:16:49', 1),
(47, 19, 1, 'Bricks Component', 11, 123, 1353, 24, 24, '2019-01-24 00:23:35', '2019-01-24 00:23:35', 1),
(52, 20, 1, 'Bricks Component', 11, 111, 1221, 24, 24, '2019-01-24 02:01:44', '2019-01-24 02:01:44', 1),
(63, 21, 1, 'Bricks Component', 1, 111, 111, 24, 24, '2019-01-28 02:11:45', '2019-01-28 02:11:45', 1),
(68, 22, 1, 'Bricks Component', 1231, 232, 285592, 24, 24, '2019-01-28 02:31:06', '2019-01-28 02:31:06', 1),
(87, 23, 1, 'bricks', 231, 2332, 538692, 24, 24, NULL, NULL, 1),
(103, 27, 1, 'Bricks Component', 11, 1, 11, 24, 24, '2019-01-30 04:03:10', '2019-01-30 04:03:10', 1),
(104, 28, 1, 'dfg', 2, 2, 4, 40, 40, '2019-01-30 05:13:12', '2019-01-30 05:13:12', 1),
(105, 29, 1, 'na', 5, 5, 25, 38, 38, '2019-01-30 22:51:28', '2019-01-30 22:51:28', 1),
(107, 31, 1, '55', 5, 5, 25, 40, 40, '2019-01-31 01:03:18', '2019-01-31 01:03:18', 1),
(108, 33, 1, 'Bricks Component', 1, 1, 1, 24, 24, '2019-01-31 03:21:23', '2019-01-31 03:21:23', 1),
(110, 35, 1, 'Bricks Component', 123, 123, 15129, 24, 24, '2019-01-31 04:09:25', '2019-01-31 04:09:25', 1),
(111, 36, 1, 'Bricks Component', 11, 111, 1221, 24, 24, '2019-01-31 04:11:29', '2019-01-31 04:11:29', 1),
(118, 32, 1, 'qw', 2, 23, 46, 24, 24, NULL, NULL, 1),
(120, 40, 1, NULL, NULL, NULL, NULL, 40, 40, NULL, NULL, 1),
(121, 30, 1, '55', 5, 5, 25, 30, 30, NULL, NULL, 1),
(123, 42, 1, NULL, NULL, NULL, NULL, 24, 24, NULL, NULL, 1),
(130, 48, 1, NULL, NULL, NULL, NULL, 40, 40, NULL, NULL, 1),
(132, 51, 1, NULL, NULL, NULL, NULL, 24, 24, NULL, NULL, 1),
(133, 49, 1, NULL, NULL, NULL, NULL, 24, 24, NULL, NULL, 1),
(134, 11, 1, 'dfg', 5, 5, 25, 24, 24, NULL, NULL, 1),
(138, 55, 1, 'na', 5, 2, 10, 40, 40, '2019-02-18 05:25:49', '2019-02-18 05:25:49', 1),
(139, 56, 1, 'asd', 121, 12, 1452, 24, 24, '2019-02-19 02:29:23', '2019-02-19 02:29:23', 1),
(140, 57, 1, 'Component Name', 45, 80, 3600, 40, 40, '2019-02-19 03:11:24', '2019-02-19 03:11:24', 1),
(144, 45, 1, '12', 12, 12, 144, 24, 24, NULL, NULL, 1),
(146, 58, 1, NULL, NULL, NULL, NULL, 24, 24, NULL, NULL, 1),
(147, 52, 1, NULL, NULL, NULL, NULL, 40, 40, NULL, NULL, 1),
(149, 34, 1, '55', 5, 5, 25, 40, 40, NULL, NULL, 1),
(150, 61, 1, 'na', 5, 5, 25, 40, 40, '2019-02-25 04:56:13', '2019-02-25 04:56:13', 1),
(151, 65, 1, 'br', 12, 12, 144, 24, 24, '2019-02-26 00:47:46', '2019-02-26 00:47:46', 1),
(152, 66, 1, 'bricks', 12, 12, 144, 24, 24, '2019-02-26 03:02:19', '2019-02-26 03:02:19', 1),
(153, 68, 1, 'gh', 22, 2, 44, 40, 40, '2019-02-27 03:56:31', '2019-02-27 03:56:31', 1),
(154, 69, 1, 'jh', 2, 2, 4, 40, 40, '2019-02-27 04:04:44', '2019-02-27 04:04:44', 1),
(155, 70, 1, '454', 5, 5, 25, 40, 40, '2019-03-02 01:57:27', '2019-03-02 01:57:27', 1),
(158, 24, 1, 'na', 20, 5, 100, 24, 24, NULL, NULL, 1),
(161, 26, 1, 'Com 1', 100, 44, 4400, 24, 24, NULL, NULL, 1),
(162, 26, 1, 'ew', 44, 44, 1936, 24, 24, NULL, NULL, 1),
(163, 26, 1, 'ew', 44, 44, 19363, 24, 24, NULL, NULL, 1),
(164, 54, 1, 'dfghfh', 20, 20, 400, 24, 24, NULL, NULL, 1),
(165, 54, 1, '22', 22, 22, 484, 24, 24, NULL, NULL, 1),
(172, 71, 1, 'Rural aid', 1, 100, 100, 34, 34, NULL, NULL, 1),
(173, 74, 1, '22', 2, 2, 4, 40, 40, '2019-03-03 03:11:44', '2019-03-03 03:11:44', 1),
(178, 25, 1, 'na', 20, 20, 400, 24, 24, NULL, NULL, 1),
(179, 25, 1, 'f', 3, 3, 3, 24, 24, NULL, NULL, 1),
(180, 10, 1, 'Bricks Component', 11, 1232, 13552, 24, 24, NULL, NULL, 1),
(181, 10, 1, 'Rod Component', 324234, 234234234, 75946702626756, 24, 24, NULL, NULL, 1),
(182, 10, 1, 'Cement Component', 12, 1222222, 122122, 24, 24, NULL, NULL, 1),
(183, 10, 1, 'Concreate', 12, 21, 1212, 24, 24, NULL, NULL, 1),
(184, 10, 1, 'b', 1, 2, 2, 24, 24, NULL, NULL, 1),
(186, 75, 1, NULL, NULL, NULL, NULL, 24, 24, NULL, NULL, 1),
(187, 76, 1, 'Cement', 10000, 40, 400000, 40, 40, '2019-03-03 23:37:36', '2019-03-03 23:37:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unapproved_project_infos`
--

CREATE TABLE `unapproved_project_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_tiltle_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_type` tinyint(4) NOT NULL,
  `project_code` tinyint(4) DEFAULT NULL,
  `project_code_pd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_code_fd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ministry` tinyint(4) DEFAULT NULL,
  `agency` tinyint(4) DEFAULT NULL,
  `sector` tinyint(4) DEFAULT NULL,
  `sub_sector` tinyint(4) DEFAULT NULL,
  `objectives` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `objectives_bn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double NOT NULL,
  `gob` double DEFAULT NULL,
  `fe` double DEFAULT NULL,
  `pa` double DEFAULT NULL,
  `rpa` double DEFAULT NULL,
  `own_fund` double DEFAULT NULL,
  `exchange_currency` int(4) DEFAULT NULL,
  `exchange_rate` double DEFAULT NULL,
  `exchange_date` date DEFAULT NULL,
  `date_of_commencement` date DEFAULT NULL,
  `date_of_completion` date DEFAULT NULL,
  `is_foreign_aid` tinyint(4) DEFAULT NULL COMMENT '0=NO,1=yes',
  `availability_of_foreign_aid` text COLLATE utf8mb4_unicode_ci,
  `approval_status` int(4) DEFAULT NULL,
  `approve_by` int(11) DEFAULT NULL,
  `approve_date` date DEFAULT NULL,
  `approval_go_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_level` int(11) DEFAULT NULL,
  `administrative_by` int(11) DEFAULT NULL,
  `administrative_date` date DEFAULT NULL,
  `administrative_go_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `administrative_level` int(11) DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isdraft` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=draft,0=final',
  `project_status` tinyint(4) DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unapproved_project_infos`
--

INSERT INTO `unapproved_project_infos` (`id`, `project_title`, `project_tiltle_bn`, `project_type`, `project_code`, `project_code_pd`, `project_code_fd`, `ministry`, `agency`, `sector`, `sub_sector`, `objectives`, `objectives_bn`, `total`, `gob`, `fe`, `pa`, `rpa`, `own_fund`, `exchange_currency`, `exchange_rate`, `exchange_date`, `date_of_commencement`, `date_of_completion`, `is_foreign_aid`, `availability_of_foreign_aid`, `approval_status`, `approve_by`, `approve_date`, `approval_go_no`, `approval_level`, `administrative_by`, `administrative_date`, `administrative_go_no`, `administrative_level`, `file_name`, `isdraft`, `project_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(10, 'Union Road & Other Infrastructure Development Project : Dhaka, Narayangonj, Munshigonj, Gazipur, Narshingdi & Manikgonj District.', 'ইউনিয়ন সড়ক ও অন্যান্য অবকাঠামো উন্নয়ন প্রকল্প: ঢাকা, নারায়ণগঞ্জ, মুন্সীগঞ্জ, গাজীপুর, নরসিংদী ও মানিকগঞ্জ জেলা।', 4, NULL, '2019_s1_s1_m1_a4_p1_076', NULL, 16, 12, 1, 10, 'Improved management of the flow of traffic through bottlenecks to minimise track occupancy times. This will be addressed through improved timetabling techniques and real-time traffic management.', 'উদ্দেশ্য 1: ট্র্যাক অধিগ্রহণের সময় কমানোর জন্য ব্যাঘাতের মাধ্যমে ট্র্যাফিক প্রবাহের উন্নত ব্যবস্থাপনা। এটি উন্নত সময়সীমাবদ্ধ কৌশল এবং রিয়েল টাইম ট্র্যাফিক পরিচালনার মাধ্যমে সমাধান করা হবে।', 21323123213, 123213, 123213, 213123123, 213123123, 213123, 1, 213123, '2019-03-11', '2019-03-04', '2019-03-12', NULL, 'wewqe ee ff', 1, 24, '2023-03-01', '1001', 2, 24, '2019-01-23', '1001', 2, '', 0, NULL, 24, 24, '2019-01-20 05:31:55', '2019-03-03 05:18:17', 1, NULL),
(11, 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', 'বৃহত্তর ফরিদপুর গ্রামীণ অবকাঠামো উন্নয়ন (3 য় সংশোধিত) প্রকল্প।', 5, NULL, '2019161202pt', NULL, 16, 12, 2, 10, 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', 'বৃহত্তর ফরিদপুর গ্রামীণ অবকাঠামো উন্নয়ন (3 য় সংশোধিত) প্রকল্প।', 200, 200, 200, 200, 200, 200, 1, 5, '2019-02-05', '2019-02-05', '2019-02-05', NULL, 'er', 3, NULL, '0000-00-00', '', 0, 0, '0000-00-00', '', 0, '', 0, 1, 24, 24, '2019-01-22 04:01:47', '2019-02-15 22:14:27', 1, NULL),
(12, 'Dhaka metro rail component tender', 'w22', 4, NULL, NULL, NULL, 17, 10, 1, 10, '23', '324', 213, 232, 2323, 3223, 3223, 2323, NULL, 332, '2019-01-18', '2019-01-30', '2019-01-11', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', NULL, '', 1, NULL, 24, 24, '2019-01-23 03:17:48', '2019-01-23 03:24:58', 1, '2019-01-23'),
(13, 'Dhaka metro rail component tender wwewe', 'ewrwr', 1, NULL, NULL, NULL, 16, 10, 1, 11, 'qwewqe', 'qeqwe', 2323, 12323, 12313, 312321, 123213, 123123, NULL, 13123, '2019-01-31', '2019-01-14', '2019-01-13', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', NULL, '', 1, NULL, 24, 24, '2019-01-23 04:52:34', '2019-01-24 02:02:47', 1, '2019-01-24'),
(14, 'abbbbb', 'ewrw', 4, NULL, NULL, NULL, 16, 10, 2, 11, 'ew', 'qwewq', 23, 2334, 3232, 2323, 2323, 3223, 2, 2323, '2019-01-21', '2019-01-16', '2019-01-13', NULL, '2323132', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-01-23 23:53:38', '2019-01-24 00:26:00', 1, '2019-01-24'),
(15, 'wqewqe', 'wqewqe', 4, NULL, NULL, NULL, 16, 10, 1, 10, 'eqweqwe', 'ewqewq', 123213, 12321, 12321, 3123, 123123, 123123, 2, 2213, '2019-03-03', '2019-01-13', '2019-01-14', NULL, '23213', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-01-24 00:01:51', '2019-01-24 00:25:57', 1, '2019-01-24'),
(16, 'wewqe', 'wewqe', 4, NULL, NULL, NULL, 17, 12, 2, 10, 'eqwewq', 'wewqe', 121212, 122323, 1212, 2121, 12212, 21212, 2, 21212, '2019-01-29', '2019-01-24', '2019-01-08', NULL, '1222122323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-01-24 00:07:53', '2019-01-24 00:25:53', 1, '2019-01-24'),
(17, 'asasa', 'sdadas', 4, NULL, NULL, NULL, 16, 12, 2, 10, 'asdasd', 'dasdasd', 1212, 1212, 1212, 1212, 1212, 1212, 2, 1212, '2019-01-28', '2019-01-20', '2019-02-07', NULL, '21323133123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-01-24 00:09:03', '2019-01-24 00:25:50', 1, '2019-01-24'),
(18, 'weqwe', '324324', 4, NULL, '2019171001pt', NULL, 17, 10, 1, 11, '2344', '432434', 324324, 324324, 324234, 43234, 324234, 324234, 1, 234234, '2019-01-24', '2019-01-15', '2019-01-15', NULL, '3432442423', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-01-24 00:16:48', '2019-01-24 00:25:47', 1, '2019-01-24'),
(19, '234234', '34234', 4, NULL, '2019171002pt', NULL, 17, 10, 2, 11, '324324', '234234', 23424, 234234, 24234, 3434, 344, 3434, 1, 324324, '2019-01-14', '2019-01-24', '2019-01-24', NULL, '3424', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-01-24 00:23:35', '2019-01-24 00:25:43', 1, '2019-01-24'),
(20, 'erere', 'rerr', 4, NULL, '2019161201pt', NULL, 16, 12, 1, 10, 'werwer', 'werewr', 1212, 2323, 3232, 2323, 323, 323, 1, 323, '2019-01-14', '2019-01-24', '2019-01-24', NULL, '21323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-01-24 02:01:44', '2019-01-24 02:02:43', 1, '2019-01-24'),
(21, 'adas', 'sadsd', 5, NULL, '2019161001pt', NULL, 16, 10, 1, 10, 'dsds', 'asdsad', 32323232323, 123, 123, 232, 21312, 123123, 1, 232, '2019-01-30', '2019-01-28', '2019-01-28', NULL, '2323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-01-28 02:11:45', '2019-01-28 02:16:35', 1, '2019-01-28'),
(22, '12', '12', 4, NULL, '2019161002pt', NULL, 16, 10, 2, 10, '1212', '212', 212121212, 211, 212, 2112, 212, 12, 1, 212, '2019-01-28', '2019-01-28', '2019-01-28', NULL, '213', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-01-28 02:31:06', '2019-01-28 02:32:30', 1, '2019-01-28'),
(23, '23', '324', 5, NULL, '2019161002pt', NULL, 16, 10, 2, 10, '2342', '243', 34444444, 343, 43, 34, 34, 43, 2, 34, '2019-01-29', '2019-01-29', '2019-01-29', NULL, '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-01-29 05:01:49', '2019-01-29 05:02:55', 1, '2019-01-29'),
(24, 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', 'বৃহত্তর ফরিদপুর গ্রামীণ অবকাঠামো', 4, NULL, '2019161001pt', NULL, 16, 10, 1, 10, 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', 10, 10, 10, 10, 10, 10, 2, 2, '2019-03-02', '2019-03-02', '2019-03-02', NULL, 'q3', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 24, '2019-01-29 21:31:15', '2019-03-02 03:28:11', 1, NULL),
(25, 'Greater Faridpur Rural Infrastructure', 'দ্বিতীয় গ্রামীণ পরিবহন উন্নয়ন প্রকল্প গ্রামীণ  হাওর ইনফ্রাস্ট্রাকচার ও জীবিকা উন্নয়ন প্রকল্প (এইচআইএলআইপি) সহ', 4, NULL, '2019_s1_s1_m1_a2_p1_076', NULL, 16, 10, 1, 10, 'Greater Faridpur Rural Infrastructure', 'Greater Faridpur Rural Infrastructure', 100, 20, 20, 20, 20, 10, 1, 2, NULL, NULL, NULL, NULL, '334', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-01-29 22:12:00', '2019-03-03 04:45:14', 1, NULL),
(26, '32432', '32432', 5, NULL, '2019161001pt', NULL, 16, 10, 1, 11, 'werwer', 'werewr', 444, 4, 324, 3, 3, 3, 1, 44, NULL, NULL, NULL, NULL, 'dfd', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-01-30 01:16:32', '2019-03-02 03:31:27', 1, NULL),
(27, 'qw', '23', 4, NULL, '2019161001pt', NULL, 16, 10, 1, 10, '32', '21', 132, 23, 3, 23, 23, 23, 2, 213, '2019-01-21', '2019-01-30', '2019-01-30', NULL, '213', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-01-30 04:03:10', '2019-01-30 04:03:10', 1, NULL),
(28, 'Greater Faridpur Rural', 'Greater Faridpur Rural', 4, NULL, '2019161001pt', NULL, 16, 10, 1, 10, 'Greater Faridpur Rural', 'Greater Faridpur Rural', 200, 2, 2, 2, 2, 2, 1, 2, '2019-01-31', '2019-01-31', '2019-01-31', NULL, 'cvbcv', NULL, 34, '2019-02-13', '21', 16, 34, '2019-02-13', '2', 16, '', 0, 1, 40, 40, '2019-01-30 05:13:12', '2019-02-03 02:45:49', 1, NULL),
(29, 'Greater Faridpur Rural', 'Greater Faridpur Rural', 4, NULL, '2019161001pt', NULL, 16, 10, 1, 10, 'dfgd', 'dfg', 200, 20, 20, 20, 20, 20, 1, 2, '2019-01-31', '2019-01-31', '2019-01-31', NULL, 'fghgfh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 38, 38, '2019-01-30 22:51:28', '2019-01-30 22:54:51', 1, NULL),
(30, 'Greater Faridpur Rural', 'Greater Faridpur Rural', 4, NULL, '2019161001pt', NULL, 16, 10, 1, 10, 'fdgfd', 'gfgfg', 200, 2, 2, 2, 2, 2, 1, 2, NULL, NULL, NULL, NULL, 'fdgsg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 30, 30, '2019-01-31 00:49:32', '2019-02-02 02:12:05', 1, NULL),
(31, 'fgfg', 'fgfg', 4, NULL, '2019161001pt', NULL, 16, 10, 1, 10, 'fgfg', 'fgfg', 55, 5, 5, 5, 5, 5, 1, 5, '2019-01-31', '2019-01-31', '2019-01-31', NULL, 'fvgb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 40, 40, '2019-01-31 01:03:18', '2019-01-31 01:03:25', 1, NULL),
(32, '345', '435', 5, NULL, '2019171001pt', NULL, 17, 10, 1, 10, '355', '345', 4354545, 435, 3455, 45, 45, 45, 2, 545, '2019-02-01', '2019-02-01', '2019-02-01', NULL, '455', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-01-31 03:20:08', '2019-02-01 03:25:28', 1, NULL),
(33, 'dddddddddddd', 'dddddddddddd', 4, NULL, '2019171201pt', NULL, 17, 12, 1, 11, 'ddd', 'dd', 3, 3, 3, 3, 3, 3, 2, 3, '2019-01-31', '2019-01-31', '2019-01-31', NULL, '324', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 24, '2019-01-31 03:21:23', '2019-01-31 03:56:53', 1, NULL),
(34, 'IBCS TEST code', 'IBCS TEST code', 4, NULL, '2019171001pt', '101244test', 17, 10, 1, 10, 'sdfgsd', 'sdfsdf', 55, 5, 5, 5, 5, 5, 1, 5, '2019-02-20', '2019-02-20', '2019-02-20', NULL, 'bvfgf', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 40, 40, '2019-01-31 03:26:17', '2019-02-20 02:17:31', 1, NULL),
(35, '2342', '123213', 5, NULL, '2019231002pt', NULL, 23, 10, 2, 10, '23323', '23123', 11111111, 1, 23, 1, 1, 21313, 2, 123, '2019-01-15', '2019-01-31', '2019-01-31', NULL, 'add', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 24, '2019-01-31 04:09:25', '2019-01-31 04:09:30', 1, NULL),
(36, '23', '234', 5, NULL, '2019171001pt', NULL, 17, 10, 1, 10, '34234', '243432', 2132312313, 123, 12333, 123, 23, 23, 2, 1231, '2019-01-31', '2019-01-31', '2019-01-31', NULL, '13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 24, '2019-01-31 04:11:29', '2019-01-31 04:13:33', 1, NULL),
(37, '34', '34', 4, NULL, '2019201001pt', NULL, 20, 10, 1, 11, '324234', '324', 3433434, 324, 2343333, 234, 34, 232, 1, 234, '2019-01-31', '2019-01-31', '2019-01-31', NULL, '324', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 24, '2019-01-31 04:14:45', '2019-01-31 04:15:03', 1, NULL),
(38, '232', '123', 4, NULL, '2019171201pt', NULL, 17, 12, 1, 10, '21323', '123', 12333333333, 2, 233, 22333, 2, 21, 1, 23, '2019-01-31', '2019-01-31', '2019-01-31', NULL, '23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-01-31 04:29:56', '2019-01-31 04:29:56', 1, NULL),
(39, 'asda', 'sad', 4, NULL, '2019171201pt', NULL, 17, 12, 1, 10, 'asdsa', 'sad', 23222222222, 23, 232222, 323, 23, 222, 1, 23, '2019-02-01', '2019-02-01', '2019-02-01', NULL, '2323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-01-31 23:48:35', '2019-01-31 23:48:35', 1, NULL),
(40, 'wer', 'ewr', 5, NULL, '2019161002pt', NULL, 16, 10, 2, 11, 'erwwer', 'ere', 3233, 222, 222, 12, 22, 2, 2, 22, '2019-02-02', '2019-02-02', '2019-02-02', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 40, 40, '2019-02-01 22:57:19', '2019-02-01 23:03:05', 1, NULL),
(41, 'Construction of Union Parishad Complex Bhaban Project (UCCP-2) (Phase-2)', 'ইউনিয়ন পরিষদ কমপ্লেক্স ভবন প্রকল্প (ইউসিসিপি -2) নির্মাণ (দ্বিতীয় পর্ব)', 5, NULL, '2019161102pt', NULL, 16, 11, 2, 11, 'Construction of Union Parishad Complex Bhaban Project (UCCP-2) (Phase-2)', 'ইউনিয়ন পরিষদ কমপ্লেক্স ভবন প্রকল্প (ইউসিসিপি -2) নির্মাণ (দ্বিতীয় পর্ব)', 100, 50, 50, 12, 12, 11, 1, 12, '2019-02-02', '2019-02-02', '2019-02-02', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 40, 40, '2019-02-02 05:15:55', '2019-02-02 05:34:09', 1, NULL),
(42, 'Dhaka metro rail component tender', 'ঢাকা মেট্রো রেল কম্পোনেন্ট দরপত্র', 5, NULL, '2019171102pt', NULL, 17, 11, 2, 11, 'ewr', 'er', 222, 2, 2, 1, 1, 12, 2, 12, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 24, '2019-02-02 23:34:31', '2019-02-03 00:06:13', 1, NULL),
(43, '23', '232', 5, NULL, '2019_s2_s2_m2_a3_p2_043', NULL, 17, 11, 2, 11, '12', '21', 11111, 1, 1111, 1, 11, 1, 2, 11, '2019-02-03', '2019-02-03', '2019-02-03', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-02-02 23:48:33', '2019-02-02 23:48:33', 1, NULL),
(44, '23', '23', 5, NULL, '2019_s2_s2_m2_a3_p2_044', NULL, 17, 11, 2, 11, '33333323', '2323', 123, 23, 23, 2, 2, 2, 2, 22, '2019-02-03', '2019-02-03', '2019-02-03', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 24, '2019-02-03 00:12:58', '2019-02-03 00:13:39', 1, NULL),
(45, 'hi', 'hello', 5, NULL, '2019161102pt', NULL, 16, 11, 2, 11, 'we', 'bangla', 12222, 12, 12, 1, 1, 1, 2, 12, '2019-02-21', '2019-02-21', '2019-02-28', NULL, '2', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 24, 24, '2019-02-03 00:26:30', '2019-02-20 00:34:28', 1, NULL),
(46, 'test', 'test', 5, NULL, '2019_s2_s2_m2_a3_p2_046', NULL, 17, 11, 2, 11, 'test objective', 'test objective bangla', 12, 0, 12, 1, 1, 1, 2, 12, '2019-02-05', '2019-02-13', '2019-02-28', NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 24, '2019-02-03 00:33:19', '2019-02-03 00:34:23', 1, NULL),
(47, 'Girder Bridge over Baro Baliatoli Andermanik River at Kalapara Upazila under Patuakhali District.', 'পটুয়াখালী জেলার কালাপাড়া উপজেলায় বারো বালিতলী আন্দারমানিক নদীর উপর গির্ডার সেতু।', 5, NULL, '2019_s2_s2_m1_a3_p2_047', NULL, 16, 11, 2, 11, 'পটুয়াখালী জেলার কালাপাড়া উপজেলায় বারো বালিতলী আন্দারমানিক নদীর উপর গির্ডার সেতু।', 'পটুয়াখালী জেলার কালাপাড়া উপজেলায় বারো বালিতলী আন্দারমানিক নদীর উপর গির্ডার সেতু।', 111111, 21, 2222, 12, 12, 1, 2, 1, '2019-02-03', '2019-02-03', '2019-02-03', NULL, '12', NULL, 34, '2019-02-14', '34', 16, 34, '2019-02-03', '34', 16, '', 0, 1, 40, 40, '2019-02-03 01:41:40', '2019-02-16 22:54:36', 1, NULL),
(48, '21', '12', 5, NULL, '2019161101pt', NULL, 16, 11, 1, 10, '2', '2', 122, 12, 21, 5, 5, 5, 2, 12, '2019-02-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 40, 40, '2019-02-03 22:10:37', '2019-02-03 22:19:48', 1, NULL),
(49, 'test 5', 'test 5', 5, NULL, '2019171102pt', NULL, 17, 11, 2, 11, 'test 5', 'test 5', 22222, 20, 20, 10, 4, 20, 1, 10, NULL, NULL, NULL, NULL, '12', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-02-04 22:31:43', '2019-02-05 04:55:18', 1, NULL),
(50, 'test5new', 'test5new', 5, NULL, '2019_s2_s2_m2_a3_p2_050', NULL, 17, 11, 2, 11, 'test5new', 'test5new', 222323, 12, 12, 4, 2, 2, 2, 12, '2019-02-05', '2019-02-05', '2019-02-05', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 24, '2019-02-04 22:56:29', '2019-02-05 00:41:37', 1, NULL),
(51, 'helloapp', 'helloapp', 5, NULL, '2019171101pt', NULL, 17, 11, 1, 10, 'helloapp', 'helloapp', 123, 12, 12, 12, 22, 22, 2, 2, '2019-02-05', '2019-02-05', '2019-02-05', NULL, 'helloapp', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-02-05 04:25:01', '2019-02-05 04:54:12', 1, NULL),
(52, 'Rural Infrastructure Development Project', 'Rural Infrastructure Development Project', 5, NULL, '2019161102pt', 'testfd1', 16, 11, 2, 11, 'Rural Infrastructure Development Project', 'Rural Infrastructure Development Project', 12313, 123, 123, 123, 213, 123, 2, 123, '2019-02-20', '2019-02-20', '2019-02-20', NULL, 'Rural Infrastructure Development Project', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 40, 40, '2019-02-06 00:23:29', '2019-02-20 01:59:57', 1, NULL),
(53, '1234', '1234', 5, NULL, '2019_s2_s2_m2_a3_p2_053', NULL, 17, 11, 2, 11, '1234', '1234', 1234, 12, 1222, 121, 12, 12, 2, 12, '2019-02-07', '2019-02-07', '2019-02-07', NULL, '1234', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-02-07 02:41:18', '2019-02-07 02:41:18', 1, NULL),
(54, 'Third Urban Governance and Infrastructure Improvement', 'এটি প্রকল্প শিরোনাম বাংলা', 4, NULL, '2019161101pt', NULL, 16, 11, 1, 10, 'Third Urban Governance and Infrastructure Improvement', 'Third Urban Governance and Infrastructure Improvement', 50000, 20000, 5000, 3000, 500, 5000, 2, 5, NULL, NULL, NULL, NULL, 'Third Urban Governance and Infrastructure Improvement', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 24, 24, '2019-02-12 00:41:56', '2019-03-02 03:31:45', 1, NULL),
(55, 'Rural Infrastructure', 'Rural Infrastructure', 4, NULL, '2019_s1_s1_m1_a3_p1_055', NULL, 16, 11, 1, 10, 'Rural Infrastructure', 'Rural Infrastructure', 500, 300, 100, 200, 100, 100, 1, 80, '2019-02-28', '2019-02-18', '2019-08-31', NULL, 'Rural Infrastructure', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 40, 40, '2019-02-18 05:25:49', '2019-02-18 05:38:38', 1, NULL),
(56, 'This is test Project', 'This is Projet Title bangla', 4, NULL, '2019_s1_s1_m1_a2_p1_056', NULL, 16, 10, 1, 10, 'This is objectives English', 'This is objectives Bangla', 100, 20, 5, 5, 3, 12, 1, 12, '2019-02-20', '2019-02-19', '2019-02-20', NULL, 'this is foreign aid', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-02-19 02:29:23', '2019-02-19 02:29:23', 1, NULL),
(57, 'This is project Title', 'This is project title bangla', 4, NULL, '2019_s1_s1_m1_a3_p1_057', NULL, 16, 11, 1, 10, 'This is objectives English', 'This is objectives bangla', 2000, 100, 100, 50, 50, 100, 1, 70, '2019-02-20', '2019-02-20', '2019-02-22', NULL, '123', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 40, 40, '2019-02-19 03:11:23', '2019-02-19 03:22:26', 1, NULL),
(58, 'new project test', 'as', 5, NULL, '2019171102pt', '118asadaa', 17, 11, 2, 11, '324', '3242', 12323, 122, 12, 2433, 2, 2, 1, 2, '2019-02-20', '2019-02-20', '2019-02-20', NULL, 'dsfsd', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 24, '2019-02-20 01:18:00', '2019-02-20 01:54:03', 1, NULL),
(59, 'test m', 'test m', 5, NULL, '2019_s1_s1_m2_a1_p2_059', '34q34ds', 17, 9, 1, 10, 'test m', 'test m', 12, 1, 1, 1, 1, 1, 1, 1, '2019-02-24', '2019-02-24', '2019-02-24', NULL, 'test m', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 24, '2019-02-24 03:16:50', '2019-02-24 03:18:19', 1, NULL),
(60, 'test25', 'test25', 5, NULL, '2019_s1_s1_m1_a2_p2_060', 'test25', 16, 10, 1, 10, 'test25', 'test25', 11111, 11, 11, 11, 11, 11, 2, 11, '2019-02-25', '2019-02-25', '2019-02-25', NULL, 'test25', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 24, '2019-02-25 04:38:49', '2019-02-25 05:09:56', 1, NULL),
(61, 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', 5, NULL, '2019_s1_s1_m1_a3_p2_061', '2002', 16, 11, 1, 10, 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', 500, 300, 200, 200, 200, 200, 1, 5, '2019-02-26', '2019-02-25', '2019-04-30', NULL, 'Greater Faridpur Rural Infrastructure Development (3rd Revised) Project.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 40, 40, '2019-02-25 04:56:13', '2019-02-25 23:18:15', 1, NULL),
(62, 'test 26', 'test 26', 5, NULL, '2019_s1_s1_m1_a1_p2_062', NULL, 16, 9, 1, 10, 'test 26', 'test 26', 11112, 12, 12, 12, 12, 12, 1, 12, '2019-02-26', '2019-02-26', '2019-02-26', NULL, 'test 26', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 24, '2019-02-26 00:07:15', '2019-02-26 00:13:12', 1, NULL),
(63, 'aaa', 'aaa', 5, NULL, '2019_s1_s1_m2_a1_p2_063', NULL, 17, 9, 1, 10, '12', '12', 111, 11, 11, 11, 11, 11, 2, 11, '2019-02-26', '2019-02-26', '2019-02-26', NULL, '12', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-02-26 00:34:14', '2019-02-26 00:34:14', 1, NULL),
(64, 'delcomment', 'delcomment', 5, NULL, '2019_s2_s2_m1_a3_p2_064', NULL, 16, 11, 2, 11, 'delcomment', 'delcomment', 100, 12, 12, 12, 12, 12, 2, 12, '2019-02-26', '2019-02-26', '2019-02-26', NULL, '12', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 40, 40, '2019-02-26 00:45:15', '2019-02-26 00:45:15', 1, NULL),
(65, 'new delcomment', 'new delcomment', 5, NULL, '2019_s1_s1_m2_a1_p2_065', NULL, 17, 9, 1, 10, 'delcomment', 'delcomment', 200, 100, 12, 12, 12, 12, 2, 12, '2019-02-26', '2019-02-26', '2019-02-26', NULL, '12', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 24, 24, '2019-02-26 00:47:46', '2019-02-26 00:47:46', 1, NULL),
(66, '1234', '1234', 5, NULL, '2019_s1_s1_m1_a1_p2_066', NULL, 16, 9, 1, 10, '123', '123', 122, 12, 12, 21, 12, 12, 2, 12, '2019-02-26', '2019-02-26', '2019-02-26', NULL, 'qwe', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 24, '2019-02-26 03:02:19', '2019-02-26 03:03:04', 1, NULL),
(67, 'df', 'df', 5, NULL, '2019_s2_s2_m2_a1_p2_067', NULL, 17, 9, 2, 11, 'df', 'df', 1233, 12, 12, 12, 12, 12, 2, 12, '2019-02-26', '2019-02-26', '2019-02-26', NULL, 'df', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 24, '2019-02-26 04:38:42', '2019-02-26 04:38:53', 1, NULL),
(68, 'fgfg', 'fgfg', 4, NULL, '2019_s1_s1_m2_a1_p1_068', NULL, 17, 9, 1, 10, 'fgf', 'fgf', 500, 200, 200, 200, 22, 22, 1, 2, '2019-02-28', '2019-02-01', '2019-02-28', NULL, 'vg', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 40, 40, '2019-02-27 03:56:31', '2019-02-27 03:56:52', 1, NULL),
(69, 'dd', 'dd', 4, NULL, '2019_s1_s1_m2_a1_p1_069', NULL, 17, 9, 1, 10, 'fg', 'gfh', 200, 22, 22, 22, 22, 22, 1, 22, '2019-02-28', '2019-02-01', '2019-03-21', NULL, 'df', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 40, 40, '2019-02-27 04:04:44', '2019-02-27 04:20:55', 1, NULL),
(70, 'ghg', 'ghg', 4, NULL, '2019_s1_s1_m1_a1_p1_070', NULL, 16, 9, 1, 10, 'gh', 'gh', 200, 22, 22, 22, 22, 22, 1, 2, '2019-03-21', '2019-03-01', '2019-03-31', NULL, '45', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 40, 40, '2019-03-02 01:57:27', '2019-03-02 02:05:19', 1, NULL),
(71, 'Project for Rural aid', 'গ্রামীণ সাহায্য প্রকল্প', 4, NULL, '2019160901pt', NULL, 16, 9, 1, 10, 'Although Bangladesh has achieved significant success in increasing access to water and sanitation in recent years, issues such as poor water quality, lack of functional water sources, unsafe sanitation, and poor hygiene behaviour, including widespread stigma around menstrual hygiene, still persist in many parts of the country', 'সাম্প্রতিক বছরগুলিতে পানি এবং স্যানিটেশন ব্যবহারের ক্ষেত্রে বাংলাদেশ উল্লেখযোগ্য সাফল্য অর্জন করেছে, যদিও মদ্যপের জলবায়ু, কার্যকরী পানি উৎসের অভাব, অনিরাপদ স্যানিটেশন এবং গরীব স্বাস্থ্যবিধি সম্পর্কিত আচরণ, মাসিক স্বাস্থ্যবিধি সম্পর্কে ব্যাপক কলঙ্ক সহ এখনও অনেকগুলি অংশে রয়েছে।', 100, 80, 20, 20, 20, 20, 2, 2, '2019-03-03', '2019-03-03', '2019-03-03', NULL, 'Yes', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 34, 34, '2019-03-02 23:03:44', '2019-03-02 23:23:46', 1, NULL),
(72, 'International', 'আন্তর্জাতিক', 5, NULL, '2019_s2_s2_m2_a2_p2_072', NULL, 17, 10, 2, 11, 'আন্তর্জাতিক', 'আন্তর্জাতিক', 12222, 12, 11, 1111, 121, 12, 2, 12, '2019-03-03', '2019-03-03', '2019-03-03', NULL, '1212', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 24, '2019-03-03 00:26:28', '2019-03-03 00:28:39', 1, NULL),
(73, '‘অ্যাসোসিয়েশন অব চার্টার্ড সার্টিফায়েড অ্যাকাউন্ট্যান্টস’', '‘অ্যাসোসিয়েশন অব চার্টার্ড সার্টিফায়েড অ্যাকাউন্ট্যান্টস’', 5, NULL, '2019_s3_s3_m2_a2_p2_073', NULL, 17, 10, 9, 14, '‘অ্যাসোসিয়েশন অব চার্টার্ড সার্টিফায়েড অ্যাকাউন্ট্যান্টস’', '‘অ্যাসোসিয়েশন অব চার্টার্ড সার্টিফায়েড অ্যাকাউন্ট্যান্টস’', 1222, 12, 111, 1111, 12, 11, 2, 12, '2019-03-03', '2019-03-03', '2019-03-03', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 24, '2019-03-03 00:30:22', '2019-03-03 00:37:15', 1, NULL),
(74, 'jhgjhgj', 'jfgjhfg', 5, NULL, '2019_s1_s1_m1_a1_p2_074', NULL, 16, 9, 1, 10, 'gjh', 'hgffg', 5000, 2000, 0, 3000, 0, 0, 1, 5, '2019-03-13', '2019-03-05', '2019-03-29', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 40, 40, '2019-03-03 03:11:44', '2019-03-03 03:17:52', 1, NULL),
(75, 'hello', 'hello', 5, NULL, '2019_s2_s2_m1_a1_p2_076', NULL, 16, 9, 2, 11, 'hello', 'hello', 12222, 122, 0, 222, 0, 2, 2, 12, '2019-03-04', '2019-03-04', '2019-03-04', NULL, '12', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 24, 24, '2019-03-03 04:08:59', '2019-03-03 05:19:22', 1, NULL),
(76, 'Head Quarter Road over the Teesta River at Sundarganj Upazila under Gaibandha district ( 1st Revised) Project.', 'গাইবান্ধা জেলার সুন্দরগঞ্জ উপজেলার তিস্তা নদীর উপর হেড কোয়ার্টার রোড (প্রথম সংশোধিত) প্রকল্প।', 5, NULL, '2019_s4_s4_m1_a1_p2_076', NULL, 16, 9, 10, 15, 'Head Quarter Road over the Teesta River at Sundarganj Upazila under Gaibandha district ( 1st Revised) Project.', 'গাইবান্ধা জেলার সুন্দরগঞ্জ উপজেলার তিস্তা নদীর উপর হেড কোয়ার্টার রোড (প্রথম সংশোধিত) প্রকল্প।', 500000, 200000, 0, 300000, 0, 0, 2, 0, '2019-03-04', '2019-03-20', '2020-03-20', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 40, 40, '2019-03-03 23:37:36', '2019-03-03 23:56:03', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unapproved_project_locations`
--

CREATE TABLE `unapproved_project_locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `division` tinyint(4) DEFAULT NULL,
  `rmo` tinyint(4) DEFAULT NULL,
  `district` tinyint(4) DEFAULT NULL,
  `upazila` tinyint(4) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_by` tinyint(4) NOT NULL,
  `updated_by` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unapproved_project_locations`
--

INSERT INTO `unapproved_project_locations` (`id`, `project_id`, `division`, `rmo`, `district`, `upazila`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(15, 3, 3, 2, 1, 2, 100, 24, 24, '2019-01-20 05:06:56', '2019-01-20 05:06:56', 1),
(16, 3, 3, 2, 1, 2, 200, 24, 24, '2019-01-20 05:06:56', '2019-01-20 05:06:56', 1),
(17, 3, 3, 2, 1, 2, 300, 24, 24, '2019-01-20 05:06:56', '2019-01-20 05:06:56', 1),
(18, 3, 3, 1, 1, 2, 1200, 24, 24, '2019-01-20 05:06:56', '2019-01-20 05:06:56', 1),
(19, 3, 3, 1, 1, 3, 1, 24, 24, '2019-01-20 05:06:56', '2019-01-20 05:06:56', 1),
(20, 3, 3, 1, 1, 3, 1250, 24, 24, '2019-01-20 05:06:56', '2019-01-20 05:06:56', 1),
(21, 3, 3, 1, 1, 2, 1800, 24, 24, '2019-01-20 05:06:56', '2019-01-20 05:06:56', 1),
(24, 5, 3, 1, 1, 3, 1212, 24, 24, '2019-01-20 07:28:00', '2019-01-20 07:28:00', 1),
(25, 5, 3, 2, 1, 2, 1212, 24, 24, '2019-01-20 07:28:00', '2019-01-20 07:28:00', 1),
(38, 2, 3, 1, 1, 2, 12585, 24, 24, '2019-01-20 09:57:07', '2019-01-20 09:57:07', 1),
(39, 1, 3, 1, 1, 2, 121, 24, 24, '2019-01-20 10:39:41', '2019-01-20 10:39:41', 1),
(40, 1, 3, 2, 1, 2, 1212, 24, 24, '2019-01-20 10:39:41', '2019-01-20 10:39:41', 1),
(41, 1, 3, 2, 1, 2, 11212, 24, 24, '2019-01-20 10:39:41', '2019-01-20 10:39:41', 1),
(42, 4, 3, 1, 1, 2, 1, 24, 24, '2019-01-20 10:46:14', '2019-01-20 10:46:14', 1),
(51, 13, 3, 1, 8, 2, 1212, 24, 24, '2019-01-24 07:21:25', '2019-01-24 07:21:25', 1),
(52, 13, 3, 2, 7, 2, 121, 24, 24, '2019-01-24 07:21:25', '2019-01-24 07:21:25', 1),
(58, 21, 3, 1, 1, 2, 2121, 24, 24, '2019-01-28 08:13:04', '2019-01-28 08:13:04', 1),
(59, 21, 3, 2, 7, 2, 212, 24, 24, '2019-01-28 08:13:04', '2019-01-28 08:13:04', 1),
(66, 22, 3, 1, 1, 2, 123, 24, 24, '2019-01-28 08:31:15', '2019-01-28 08:31:15', 1),
(73, 26, 3, 1, 7, 2, 343, 28, 28, '2019-01-30 07:16:55', '2019-01-30 07:16:55', 1),
(74, 28, 3, 1, 1, 2, 2, 40, 40, '2019-01-30 11:13:24', '2019-01-30 11:13:24', 1),
(81, 36, 3, 1, 1, 3, NULL, 24, 24, '2019-01-31 10:13:11', '2019-01-31 10:13:11', 1),
(82, 36, 3, 2, 7, 2, NULL, 24, 24, '2019-01-31 10:13:29', '2019-01-31 10:13:29', 1),
(83, 37, 3, 1, 1, 2, NULL, 24, 24, '2019-01-31 10:14:59', '2019-01-31 10:14:59', 1),
(84, 10, 3, 1, 1, 2, NULL, 24, 24, '2019-01-31 11:07:25', '2019-01-31 11:07:25', 1),
(85, 10, 3, 2, 1, 3, NULL, 24, 24, '2019-01-31 11:07:25', '2019-01-31 11:07:25', 1),
(86, 10, 3, 2, 8, 2, NULL, 24, 24, '2019-01-31 11:07:25', '2019-01-31 11:07:25', 1),
(87, 10, 3, 2, 7, 2, NULL, 24, 24, '2019-01-31 11:07:25', '2019-01-31 11:07:25', 1),
(90, 39, 3, NULL, NULL, NULL, NULL, 24, 24, '2019-02-01 07:33:14', '2019-02-01 07:33:14', 1),
(91, 39, 3, NULL, NULL, 2, NULL, 24, 24, '2019-02-01 07:33:14', '2019-02-01 07:33:14', 1),
(92, 39, NULL, NULL, NULL, NULL, NULL, 24, 24, '2019-02-01 07:46:58', '2019-02-01 07:46:58', 1),
(93, 39, NULL, NULL, NULL, NULL, NULL, 24, 24, '2019-02-01 07:54:18', '2019-02-01 07:54:18', 1),
(94, 39, NULL, NULL, NULL, NULL, NULL, 24, 24, '2019-02-01 07:54:30', '2019-02-01 07:54:30', 1),
(95, 39, NULL, NULL, NULL, NULL, NULL, 24, 24, '2019-02-01 08:03:18', '2019-02-01 08:03:18', 1),
(96, 39, NULL, NULL, NULL, NULL, NULL, 24, 24, '2019-02-01 08:04:40', '2019-02-01 08:04:40', 1),
(97, 39, NULL, NULL, NULL, NULL, NULL, 24, 24, '2019-02-01 08:06:36', '2019-02-01 08:06:36', 1),
(98, 39, NULL, NULL, NULL, NULL, NULL, 24, 24, '2019-02-01 08:09:48', '2019-02-01 08:09:48', 1),
(99, 39, NULL, NULL, NULL, NULL, NULL, 24, 24, '2019-02-01 08:10:26', '2019-02-01 08:10:26', 1),
(100, 39, NULL, NULL, NULL, NULL, NULL, 24, 24, '2019-02-01 08:11:11', '2019-02-01 08:11:11', 1),
(101, 39, NULL, NULL, NULL, NULL, NULL, 24, 24, '2019-02-01 08:12:15', '2019-02-01 08:12:15', 1),
(102, 39, NULL, NULL, NULL, NULL, NULL, 24, 24, '2019-02-01 08:18:23', '2019-02-01 08:18:23', 1),
(103, 39, NULL, NULL, NULL, NULL, NULL, 24, 24, '2019-02-01 08:18:28', '2019-02-01 08:18:28', 1),
(104, 39, NULL, NULL, NULL, NULL, NULL, 24, 24, '2019-02-01 08:19:01', '2019-02-01 08:19:01', 1),
(105, 39, NULL, NULL, NULL, NULL, NULL, 24, 24, '2019-02-01 08:26:04', '2019-02-01 08:26:04', 1),
(112, 32, 3, 2, 7, 3, NULL, 24, 24, '2019-02-01 09:20:56', '2019-02-01 09:20:56', 1),
(113, 32, 3, 2, 7, 3, NULL, 24, 24, '2019-02-01 09:20:56', '2019-02-01 09:20:56', 1),
(114, 39, NULL, NULL, NULL, NULL, NULL, 24, 24, '2019-02-01 09:35:32', '2019-02-01 09:35:32', 1),
(115, 41, NULL, NULL, NULL, NULL, NULL, 40, 40, '2019-02-02 11:16:03', '2019-02-02 11:16:03', 1),
(120, 11, 3, 1, 1, 2, NULL, 24, 24, '2019-02-03 05:42:24', '2019-02-03 05:42:24', 1),
(121, 11, 3, 2, 7, 3, NULL, 24, 24, '2019-02-03 05:42:24', '2019-02-03 05:42:24', 1),
(122, 43, NULL, NULL, NULL, NULL, NULL, 24, 24, '2019-02-03 05:49:10', '2019-02-03 05:49:10', 1),
(123, 42, NULL, NULL, NULL, NULL, NULL, 24, 24, '2019-02-03 06:06:02', '2019-02-03 06:06:02', 1),
(124, 44, 3, 2, 7, 3, NULL, 24, 24, '2019-02-03 06:13:34', '2019-02-03 06:13:34', 1),
(125, 45, 3, 1, 7, 3, NULL, 40, 40, '2019-02-03 06:30:14', '2019-02-03 06:30:14', 1),
(126, 46, 3, 1, 7, 3, NULL, 24, 24, '2019-02-03 06:34:17', '2019-02-03 06:34:17', 1),
(127, 47, 3, 1, 7, 3, NULL, 40, 40, '2019-02-03 07:42:04', '2019-02-03 07:42:04', 1),
(128, 47, 3, 2, 8, 2, NULL, 40, 40, '2019-02-03 07:42:04', '2019-02-03 07:42:04', 1),
(130, 48, 3, 2, 7, 3, NULL, 40, 40, '2019-02-04 04:19:41', '2019-02-04 04:19:41', 1),
(131, 49, 3, 2, 7, 3, NULL, 24, 24, '2019-02-05 04:31:52', '2019-02-05 04:31:52', 1),
(132, 50, 3, 2, 7, 3, NULL, 24, 24, '2019-02-05 04:56:58', '2019-02-05 04:56:58', 1),
(133, 51, 3, 2, 7, 3, NULL, 24, 24, '2019-02-05 10:43:25', '2019-02-05 10:43:25', 1),
(134, 52, 3, 0, 7, 3, NULL, 40, 40, '2019-02-06 06:24:37', '2019-02-06 06:24:37', 1),
(135, 53, 3, 0, 7, 3, NULL, 24, 24, '2019-02-07 08:41:27', '2019-02-07 08:41:27', 1),
(136, 54, 3, 0, 1, 2, NULL, 40, 40, '2019-02-12 06:42:37', '2019-02-12 06:42:37', 1),
(137, 55, 3, 0, 7, 8, NULL, 40, 40, '2019-02-18 11:26:09', '2019-02-18 11:26:09', 1),
(138, 56, 3, 0, 7, 8, NULL, 24, 24, '2019-02-19 08:30:05', '2019-02-19 08:30:05', 1),
(139, 57, 3, 0, 7, 8, NULL, 40, 40, '2019-02-19 09:11:40', '2019-02-19 09:11:40', 1),
(140, 57, 3, 0, 8, 3, NULL, 40, 40, '2019-02-19 09:11:40', '2019-02-19 09:11:40', 1),
(141, 24, NULL, 0, NULL, NULL, NULL, 24, 24, '2019-02-20 06:21:06', '2019-02-20 06:21:06', 1),
(142, 58, 3, 0, 7, 8, NULL, 24, 24, '2019-02-20 07:23:25', '2019-02-20 07:23:25', 1),
(143, 59, 3, 0, 7, 8, NULL, 24, 24, '2019-02-24 09:17:00', '2019-02-24 09:17:00', 1),
(144, 60, 3, 0, 7, 8, NULL, 24, 24, '2019-02-25 10:38:58', '2019-02-25 10:38:58', 1),
(145, 61, 3, 0, 1, 2, NULL, 40, 40, '2019-02-25 10:57:43', '2019-02-25 10:57:43', 1),
(146, 62, 3, 0, 7, 8, NULL, 24, 24, '2019-02-26 06:07:31', '2019-02-26 06:07:31', 1),
(147, 63, 3, 0, 7, 8, NULL, 24, 24, '2019-02-26 06:34:21', '2019-02-26 06:34:21', 1),
(148, 64, 3, 0, 8, 2, NULL, 40, 40, '2019-02-26 06:45:23', '2019-02-26 06:45:23', 1),
(149, 65, 3, 0, 8, 3, NULL, 24, 24, '2019-02-26 06:47:56', '2019-02-26 06:47:56', 1),
(150, 66, 3, 0, 8, 3, NULL, 24, 24, '2019-02-26 09:02:31', '2019-02-26 09:02:31', 1),
(151, 3, 3, 0, 7, 8, NULL, 24, 24, '2019-02-26 10:35:15', '2019-02-26 10:35:15', 1),
(152, 67, 3, 0, 7, 8, NULL, 24, 24, '2019-02-26 10:38:48', '2019-02-26 10:38:48', 1),
(153, 68, 3, 0, 7, 8, NULL, 40, 40, '2019-02-27 09:56:48', '2019-02-27 09:56:48', 1),
(154, 69, 3, 0, 7, 8, NULL, 40, 40, '2019-02-27 10:04:53', '2019-02-27 10:04:53', 1),
(155, 70, 3, 0, 7, 8, NULL, 40, 40, '2019-03-02 07:57:36', '2019-03-02 07:57:36', 1),
(164, 71, 3, 0, 1, 5, NULL, 34, 34, '2019-03-03 05:22:39', '2019-03-03 05:22:39', 1),
(165, 71, NULL, 0, NULL, NULL, NULL, 34, 34, '2019-03-03 05:22:39', '2019-03-03 05:22:39', 1),
(166, 72, 3, 0, 7, 8, NULL, 24, 24, '2019-03-03 06:27:27', '2019-03-03 06:27:27', 1),
(167, 73, 3, 0, 9, 6, NULL, 24, 24, '2019-03-03 06:30:29', '2019-03-03 06:30:29', 1),
(168, 74, 3, 0, 7, 2, NULL, 40, 40, '2019-03-03 09:17:45', '2019-03-03 09:17:45', 1),
(169, 75, 3, 0, 8, 2, NULL, 40, 40, '2019-03-03 10:09:22', '2019-03-03 10:09:22', 1),
(170, 76, 3, 0, 7, 8, NULL, 40, 40, '2019-03-04 05:37:50', '2019-03-04 05:37:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unapproved_project_source_details`
--

CREATE TABLE `unapproved_project_source_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` tinyint(4) DEFAULT NULL,
  `finanacing_source` double DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unapproved_project_source_details`
--

INSERT INTO `unapproved_project_source_details` (`id`, `project_id`, `finanacing_source`, `amount`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(23, 4, 2, 456, 24, 24, 1, '2019-01-20 04:40:22', '2019-01-20 04:40:22'),
(40, 3, 1, 12355, 24, 24, 1, '2019-01-20 10:56:27', '2019-01-20 10:56:27'),
(41, 2, 1, 500, 24, 24, 1, '2019-01-20 11:00:09', '2019-01-20 11:00:09'),
(42, 2, 1, 300, 24, 24, 1, '2019-01-20 11:00:09', '2019-01-20 11:00:09'),
(64, 8, 1, 123123, 24, 24, 1, '2019-01-20 11:22:25', '2019-01-20 11:22:25'),
(65, 8, 2, 213123, 24, 24, 1, '2019-01-20 11:22:25', '2019-01-20 11:22:25'),
(68, 9, 2, 12313, 24, 24, 1, '2019-01-20 11:27:26', '2019-01-20 11:27:26'),
(69, 9, 1, 100, 24, 24, 1, '2019-01-20 11:27:26', '2019-01-20 11:27:26'),
(70, 1, 1, 125879252, 24, 24, 1, '2019-01-20 11:28:30', '2019-01-20 11:28:30'),
(71, 1, 2, 125874, 24, 24, 1, '2019-01-20 11:28:30', '2019-01-20 11:28:30'),
(76, 12, 2, 12, 24, 24, 1, '2019-01-23 09:17:48', '2019-01-23 09:17:48'),
(103, 13, 1, 23123, 24, 24, 1, '2019-01-23 11:02:43', '2019-01-23 11:02:43'),
(104, 13, 1, 12323, 24, 24, 1, '2019-01-23 11:02:43', '2019-01-23 11:02:43'),
(105, 13, 2, 1200, 24, 24, 1, '2019-01-23 11:02:43', '2019-01-23 11:02:43'),
(106, 14, 1, 2323, 24, 24, 1, '2019-01-24 05:53:38', '2019-01-24 05:53:38'),
(107, 16, 1, 1212, 24, 24, 1, '2019-01-24 06:07:54', '2019-01-24 06:07:54'),
(108, 17, 1, 212, 24, 24, 1, '2019-01-24 06:09:03', '2019-01-24 06:09:03'),
(109, 18, 2, 324234, 24, 24, 1, '2019-01-24 06:16:49', '2019-01-24 06:16:49'),
(110, 18, 1, 234234, 24, 24, 1, '2019-01-24 06:16:49', '2019-01-24 06:16:49'),
(111, 19, 1, 324234, 24, 24, 1, '2019-01-24 06:23:35', '2019-01-24 06:23:35'),
(116, 20, 1, 2323, 24, 24, 1, '2019-01-24 08:01:44', '2019-01-24 08:01:44'),
(117, 20, 1, 2323, 24, 24, 1, '2019-01-24 08:01:44', '2019-01-24 08:01:44'),
(134, 21, 1, 2323, 24, 24, 1, '2019-01-28 08:11:45', '2019-01-28 08:11:45'),
(139, 22, 1, 2112, 24, 24, 1, '2019-01-28 08:31:06', '2019-01-28 08:31:06'),
(158, 23, 1, 344, 24, 24, 1, '2019-01-29 11:02:35', '2019-01-29 11:02:35'),
(168, 27, 1, 13, 24, 24, 1, '2019-01-30 10:03:10', '2019-01-30 10:03:10'),
(169, 27, 2, 13, 24, 24, 1, '2019-01-30 10:03:10', '2019-01-30 10:03:10'),
(170, 28, 1, 2, 40, 40, 1, '2019-01-30 11:13:12', '2019-01-30 11:13:12'),
(171, 28, 1, 2, 40, 40, 1, '2019-01-30 11:13:12', '2019-01-30 11:13:12'),
(172, 29, 1, 20, 38, 38, 1, '2019-01-31 04:51:28', '2019-01-31 04:51:28'),
(175, 31, 1, 5, 40, 40, 1, '2019-01-31 07:03:18', '2019-01-31 07:03:18'),
(176, 31, 2, 5, 40, 40, 1, '2019-01-31 07:03:18', '2019-01-31 07:03:18'),
(178, 33, 1, 3, 24, 24, 1, '2019-01-31 09:21:23', '2019-01-31 09:21:23'),
(181, 35, 1, 1, 24, 24, 1, '2019-01-31 10:09:25', '2019-01-31 10:09:25'),
(182, 36, 1, 3332323, 24, 24, 1, '2019-01-31 10:11:29', '2019-01-31 10:11:29'),
(183, 37, 1, 234, 24, 24, 1, '2019-01-31 10:14:45', '2019-01-31 10:14:45'),
(184, 37, 2, 234, 24, 24, 1, '2019-01-31 10:14:45', '2019-01-31 10:14:45'),
(185, 38, 1, 123, 24, 24, 1, '2019-01-31 10:29:56', '2019-01-31 10:29:56'),
(186, 38, 2, 233, 24, 24, 1, '2019-01-31 10:29:56', '2019-01-31 10:29:56'),
(189, 39, 2, 23, 24, 24, 1, '2019-02-01 05:48:35', '2019-02-01 05:48:35'),
(191, 32, 2, 454545, 24, 24, 1, '2019-02-01 09:25:28', '2019-02-01 09:25:28'),
(195, 40, 2, 12, 40, 40, 1, '2019-02-02 04:58:16', '2019-02-02 04:58:16'),
(196, 40, 1, 11, 40, 40, 1, '2019-02-02 04:58:16', '2019-02-02 04:58:16'),
(197, 30, 1, 2, 30, 30, 1, '2019-02-02 08:12:05', '2019-02-02 08:12:05'),
(198, 30, 2, 12, 30, 30, 1, '2019-02-02 08:12:05', '2019-02-02 08:12:05'),
(199, 41, 2, 1, 40, 40, 1, '2019-02-02 11:15:56', '2019-02-02 11:15:56'),
(200, 41, 1, 12, 40, 40, 1, '2019-02-02 11:15:56', '2019-02-02 11:15:56'),
(204, 43, 2, 12, 24, 24, 1, '2019-02-03 05:48:33', '2019-02-03 05:48:33'),
(205, 42, NULL, NULL, 24, 24, 1, '2019-02-03 06:05:58', '2019-02-03 06:05:58'),
(209, 46, 2, 1234, 24, 24, 1, '2019-02-03 06:33:19', '2019-02-03 06:33:19'),
(212, 47, 2, 12, 40, 40, 1, '2019-02-03 07:41:40', '2019-02-03 07:41:40'),
(217, 48, 2, 11, 40, 40, 1, '2019-02-04 04:19:38', '2019-02-04 04:19:38'),
(219, 50, 2, 12, 24, 24, 1, '2019-02-05 04:56:29', '2019-02-05 04:56:29'),
(222, 51, 2, 21, 24, 24, 1, '2019-02-05 10:54:12', '2019-02-05 10:54:12'),
(223, 49, 2, 12, 24, 24, 1, '2019-02-05 10:55:19', '2019-02-05 10:55:19'),
(224, 11, 1, 200, 24, 24, 1, '2019-02-05 10:55:45', '2019-02-05 10:55:45'),
(225, 11, 2, 200, 24, 24, 1, '2019-02-05 10:55:45', '2019-02-05 10:55:45'),
(227, 53, 2, 1, 24, 24, 1, '2019-02-07 08:41:18', '2019-02-07 08:41:18'),
(230, 55, 1, 100, 40, 40, 1, '2019-02-18 11:25:49', '2019-02-18 11:25:49'),
(231, 55, 2, 100, 40, 40, 1, '2019-02-18 11:25:49', '2019-02-18 11:25:49'),
(232, 56, 1, 2, 24, 24, 1, '2019-02-19 08:29:23', '2019-02-19 08:29:23'),
(233, 57, 1, 10, 40, 40, 1, '2019-02-19 09:11:24', '2019-02-19 09:11:24'),
(237, 45, 2, 10, 24, 24, 1, '2019-02-20 06:34:07', '2019-02-20 06:34:07'),
(240, 58, 1, 2, 24, 24, 1, '2019-02-20 07:54:03', '2019-02-20 07:54:03'),
(241, 52, 2, 23, 40, 40, 1, '2019-02-20 07:54:43', '2019-02-20 07:54:43'),
(244, 34, 1, 5, 40, 40, 1, '2019-02-20 08:14:26', '2019-02-20 08:14:26'),
(245, 34, 2, 5, 40, 40, 1, '2019-02-20 08:14:26', '2019-02-20 08:14:26'),
(246, 59, 1, 1, 24, 24, 1, '2019-02-24 09:16:50', '2019-02-24 09:16:50'),
(247, 60, 1, 11, 24, 24, 1, '2019-02-25 10:38:49', '2019-02-25 10:38:49'),
(248, 61, 1, 100, 40, 40, 1, '2019-02-25 10:56:13', '2019-02-25 10:56:13'),
(249, 61, 2, 100, 40, 40, 1, '2019-02-25 10:56:13', '2019-02-25 10:56:13'),
(250, 62, 1, 12, 24, 24, 1, '2019-02-26 06:07:15', '2019-02-26 06:07:15'),
(251, 63, 2, 11, 24, 24, 1, '2019-02-26 06:34:14', '2019-02-26 06:34:14'),
(252, 64, 2, 12, 40, 40, 1, '2019-02-26 06:45:15', '2019-02-26 06:45:15'),
(253, 65, 1, 12, 24, 24, 1, '2019-02-26 06:47:46', '2019-02-26 06:47:46'),
(254, 66, 2, 12, 24, 24, 1, '2019-02-26 09:02:19', '2019-02-26 09:02:19'),
(255, 67, 2, 12, 24, 24, 1, '2019-02-26 10:38:42', '2019-02-26 10:38:42'),
(256, 68, 1, 100, 40, 40, 1, '2019-02-27 09:56:31', '2019-02-27 09:56:31'),
(257, 68, 2, 100, 40, 40, 1, '2019-02-27 09:56:31', '2019-02-27 09:56:31'),
(258, 69, 1, 22, 40, 40, 1, '2019-02-27 10:04:44', '2019-02-27 10:04:44'),
(259, 70, 1, 22, 40, 40, 1, '2019-03-02 07:57:27', '2019-03-02 07:57:27'),
(260, 70, 2, 22, 40, 40, 1, '2019-03-02 07:57:27', '2019-03-02 07:57:27'),
(262, 24, 2, 20, 24, 24, 1, '2019-03-02 09:28:11', '2019-03-02 09:28:11'),
(263, 24, 1, 20, 24, 24, 1, '2019-03-02 09:28:11', '2019-03-02 09:28:11'),
(265, 26, 1, 44, 24, 24, 1, '2019-03-02 09:31:27', '2019-03-02 09:31:27'),
(266, 54, 1, 20, 24, 24, 1, '2019-03-02 09:31:45', '2019-03-02 09:31:45'),
(280, 71, 1, 10, 34, 34, 1, '2019-03-03 05:22:36', '2019-03-03 05:22:36'),
(281, 71, 2, 10, 34, 34, 1, '2019-03-03 05:22:36', '2019-03-03 05:22:36'),
(282, 71, NULL, NULL, 34, 34, 1, '2019-03-03 05:22:36', '2019-03-03 05:22:36'),
(283, 72, 1, 11, 24, 24, 1, '2019-03-03 06:26:28', '2019-03-03 06:26:28'),
(284, 73, 2, 12, 24, 24, 1, '2019-03-03 06:30:22', '2019-03-03 06:30:22'),
(285, 74, 1, 100, 40, 40, 1, '2019-03-03 09:11:44', '2019-03-03 09:11:44'),
(286, 74, 1, 100, 40, 40, 1, '2019-03-03 09:11:44', '2019-03-03 09:11:44'),
(291, 25, 1, 20, 24, 24, 1, '2019-03-03 10:45:14', '2019-03-03 10:45:14'),
(292, 10, 1, 2313123, 24, 24, 1, '2019-03-03 11:18:17', '2019-03-03 11:18:17'),
(293, 10, 2, 23123213, 24, 24, 1, '2019-03-03 11:18:17', '2019-03-03 11:18:17'),
(295, 75, 2, 23, 24, 24, 1, '2019-03-03 11:19:22', '2019-03-03 11:19:22'),
(296, 76, 1, 300000, 40, 40, 1, '2019-03-04 05:37:36', '2019-03-04 05:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `unapproved_project_status`
--

CREATE TABLE `unapproved_project_status` (
  `id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1=agency,2=ministry , 3=sector division, 4=programming division',
  `project_id` int(11) NOT NULL,
  `is_forward` tinyint(4) DEFAULT NULL,
  `is_back` tinyint(4) DEFAULT NULL,
  `forward_date` date DEFAULT NULL,
  `back_date` date DEFAULT NULL,
  `send_maker` tinyint(4) DEFAULT NULL,
  `back_checker` tinyint(4) DEFAULT NULL,
  `send_maker_date` date DEFAULT NULL,
  `back_checker_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unapproved_project_status`
--

INSERT INTO `unapproved_project_status` (`id`, `type`, `project_id`, `is_forward`, `is_back`, `forward_date`, `back_date`, `send_maker`, `back_checker`, `send_maker_date`, `back_checker_date`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 1, 28, 1, NULL, '2019-01-31', NULL, NULL, NULL, '2019-01-31', '2019-01-31', '2019-01-31 05:35:06', '2019-01-31 05:35:06', 28, 28, 1),
(2, 2, 28, 1, NULL, '2019-01-31', NULL, NULL, NULL, '2019-01-31', '2019-01-31', '2019-01-31 05:43:52', '2019-01-31 05:43:52', 30, 30, 1),
(3, 3, 28, 1, NULL, '2019-01-31', NULL, NULL, NULL, '2019-01-31', '2019-01-31', '2019-01-31 05:46:14', '2019-01-31 05:46:14', 35, 35, 1),
(4, 4, 28, 1, NULL, '2019-02-03', '2019-02-03', NULL, NULL, '2019-02-03', '2019-01-31', '2019-02-03 02:40:34', '2019-02-03 02:40:34', 33, 33, 1),
(9, 1, 30, 1, NULL, '2019-02-02', '2019-02-01', NULL, NULL, '2019-02-02', NULL, '2019-02-02 00:01:44', '2019-02-02 00:01:44', 28, 28, 1),
(10, 2, 30, NULL, NULL, NULL, NULL, 1, NULL, '2019-02-02', '2019-02-02', '2019-02-02 01:26:53', '2019-02-02 01:26:53', 38, 38, 1),
(11, 1, 40, 1, NULL, '2019-02-02', NULL, NULL, NULL, '2019-02-02', NULL, '2019-02-01 23:03:32', '2019-02-01 23:03:32', 28, 28, 1),
(12, 2, 40, 1, NULL, '2019-02-02', NULL, NULL, NULL, '2019-02-02', NULL, '2019-02-01 23:05:52', '2019-02-01 23:05:52', 30, 30, 1),
(13, 3, 40, NULL, NULL, NULL, NULL, NULL, 1, '2019-02-02', '2019-02-02', '2019-02-01 23:12:39', '2019-02-01 23:12:39', 35, 35, 1),
(14, 1, 31, 1, NULL, '2019-02-02', NULL, NULL, NULL, '2019-02-02', NULL, '2019-02-02 04:26:54', '2019-02-02 04:26:54', 28, 28, 1),
(15, 1, 41, 1, NULL, '2019-02-02', NULL, NULL, NULL, '2019-02-02', NULL, '2019-02-02 05:36:31', '2019-02-02 05:36:31', 28, 28, 1),
(16, 2, 41, NULL, NULL, NULL, NULL, 1, NULL, '2019-02-02', NULL, '2019-02-02 06:06:18', '2019-02-02 06:06:18', 38, 38, 1),
(17, 1, 45, 1, NULL, '2019-02-03', NULL, NULL, NULL, '2019-02-03', NULL, '2019-02-03 00:34:48', '2019-02-03 00:34:48', 28, 28, 1),
(18, 1, 46, NULL, NULL, NULL, NULL, 1, NULL, '2019-02-03', NULL, '2019-02-03 00:34:33', '2019-02-03 00:34:33', 24, 24, 1),
(19, 2, 45, 1, NULL, '2019-02-03', NULL, NULL, NULL, '2019-02-03', NULL, '2019-02-03 00:38:42', '2019-02-03 00:38:42', 30, 30, 1),
(20, 3, 45, 1, NULL, '2019-02-03', NULL, NULL, NULL, '2019-02-03', '2019-02-03', '2019-02-03 01:16:38', '2019-02-03 01:16:38', 35, 35, 1),
(21, 4, 45, 1, NULL, '2019-02-03', NULL, NULL, NULL, '2019-02-03', NULL, '2019-02-03 01:19:15', '2019-02-03 01:19:15', 33, 33, 1),
(22, 5, 45, 1, NULL, '2019-02-03', NULL, NULL, NULL, NULL, NULL, '2019-02-03 01:20:16', '2019-02-03 01:20:16', 34, 34, 1),
(23, 1, 47, 1, NULL, '2019-02-03', NULL, NULL, NULL, '2019-02-03', NULL, '2019-02-03 01:42:51', '2019-02-03 01:42:51', 28, 28, 1),
(24, 2, 47, 1, NULL, '2019-02-03', NULL, NULL, NULL, '2019-02-03', NULL, '2019-02-03 01:44:31', '2019-02-03 01:44:31', 30, 30, 1),
(25, 3, 47, 1, NULL, '2019-02-03', NULL, NULL, NULL, '2019-02-03', '2019-02-03', '2019-02-03 01:46:36', '2019-02-03 01:46:36', 35, 35, 1),
(26, 4, 47, 1, NULL, '2019-02-03', NULL, NULL, NULL, '2019-02-03', '2019-02-03', '2019-02-03 01:48:33', '2019-02-03 01:48:33', 33, 33, 1),
(27, 5, 47, 1, NULL, '2019-02-03', NULL, NULL, NULL, NULL, NULL, '2019-02-03 02:39:33', '2019-02-03 02:39:33', 34, 34, 1),
(28, 5, 28, 1, NULL, '2019-02-03', NULL, NULL, NULL, NULL, NULL, '2019-02-03 02:41:11', '2019-02-03 02:41:11', 34, 34, 1),
(29, 1, 48, NULL, NULL, NULL, NULL, 1, NULL, '2019-02-06', '2019-02-05', '2019-02-05 23:27:43', '2019-02-05 23:27:43', 40, 40, 1),
(30, 1, 54, 1, NULL, '2019-02-16', NULL, NULL, NULL, '2019-02-16', NULL, '2019-02-15 22:18:36', '2019-02-15 22:18:36', 28, 28, 1),
(31, 2, 54, 1, NULL, '2019-02-16', NULL, NULL, NULL, '2019-02-16', NULL, '2019-02-15 22:23:44', '2019-02-15 22:23:44', 30, 30, 1),
(32, 3, 54, 1, NULL, '2019-02-16', NULL, NULL, NULL, '2019-02-16', NULL, '2019-02-15 22:26:32', '2019-02-15 22:26:32', 35, 35, 1),
(33, 4, 54, 1, NULL, '2019-02-16', NULL, NULL, NULL, '2019-02-16', NULL, '2019-02-15 22:27:43', '2019-02-15 22:27:43', 33, 33, 1),
(34, 5, 54, 1, NULL, '2019-02-16', NULL, NULL, NULL, NULL, NULL, '2019-02-15 22:28:11', '2019-02-15 22:28:11', 34, 34, 1),
(35, 1, 55, 1, NULL, '2019-02-18', NULL, NULL, NULL, '2019-02-18', '2019-02-18', '2019-02-18 05:31:48', '2019-02-18 05:31:48', 28, 28, 1),
(36, 2, 55, 1, NULL, '2019-02-18', NULL, NULL, NULL, '2019-02-18', NULL, '2019-02-18 05:34:23', '2019-02-18 05:34:23', 30, 30, 1),
(37, 3, 55, 1, NULL, '2019-02-18', NULL, NULL, NULL, '2019-02-18', NULL, '2019-02-18 05:36:08', '2019-02-18 05:36:08', 35, 35, 1),
(38, 4, 55, 1, NULL, '2019-02-18', NULL, NULL, NULL, '2019-02-18', NULL, '2019-02-18 05:37:37', '2019-02-18 05:37:37', 33, 33, 1),
(39, 5, 55, 1, NULL, '2019-02-18', NULL, NULL, NULL, NULL, NULL, '2019-02-18 05:38:09', '2019-02-18 05:38:09', 34, 34, 1),
(40, 1, 57, 1, NULL, '2019-02-19', NULL, NULL, NULL, '2019-02-19', NULL, '2019-02-19 03:16:20', '2019-02-19 03:16:20', 28, 28, 1),
(41, 2, 57, 1, NULL, '2019-02-19', NULL, NULL, NULL, '2019-02-19', NULL, '2019-02-19 03:17:28', '2019-02-19 03:17:28', 30, 30, 1),
(42, 3, 57, 1, NULL, '2019-02-19', NULL, NULL, NULL, '2019-02-19', NULL, '2019-02-19 03:19:40', '2019-02-19 03:19:40', 35, 35, 1),
(43, 4, 57, 1, NULL, '2019-02-19', NULL, NULL, NULL, '2019-02-19', NULL, '2019-02-19 03:20:19', '2019-02-19 03:20:19', 33, 33, 1),
(44, 5, 57, 1, NULL, '2019-02-19', NULL, NULL, NULL, NULL, NULL, '2019-02-19 03:22:13', '2019-02-19 03:22:13', 34, 34, 1),
(45, 1, 52, 1, NULL, '2019-02-20', NULL, NULL, NULL, '2019-02-20', NULL, '2019-02-20 01:55:48', '2019-02-20 01:55:48', 28, 28, 1),
(46, 2, 52, 1, NULL, '2019-02-20', NULL, NULL, NULL, '2019-02-20', NULL, '2019-02-20 01:56:31', '2019-02-20 01:56:31', 30, 30, 1),
(47, 3, 52, 1, NULL, '2019-02-20', NULL, NULL, NULL, '2019-02-20', NULL, '2019-02-20 01:57:33', '2019-02-20 01:57:33', 35, 35, 1),
(48, 4, 52, 1, NULL, '2019-02-20', NULL, NULL, NULL, '2019-02-20', NULL, '2019-02-20 01:58:10', '2019-02-20 01:58:10', 33, 33, 1),
(49, 5, 52, 1, NULL, '2019-02-20', NULL, NULL, NULL, NULL, NULL, '2019-02-20 01:59:47', '2019-02-20 01:59:47', 34, 34, 1),
(50, 1, 34, 1, NULL, '2019-02-20', NULL, NULL, NULL, '2019-02-20', NULL, '2019-02-20 02:15:00', '2019-02-20 02:15:00', 28, 28, 1),
(51, 2, 34, 1, NULL, '2019-02-20', NULL, NULL, NULL, '2019-02-20', NULL, '2019-02-20 02:15:54', '2019-02-20 02:15:54', 30, 30, 1),
(52, 3, 34, 1, NULL, '2019-02-20', NULL, NULL, NULL, '2019-02-20', NULL, '2019-02-20 02:16:30', '2019-02-20 02:16:30', 35, 35, 1),
(53, 4, 34, 1, NULL, '2019-02-20', NULL, NULL, NULL, '2019-02-20', NULL, '2019-02-20 02:17:03', '2019-02-20 02:17:03', 33, 33, 1),
(54, 5, 34, 1, NULL, '2019-02-20', NULL, NULL, NULL, NULL, NULL, '2019-02-20 02:17:20', '2019-02-20 02:17:20', 34, 34, 1),
(55, 1, 61, 1, NULL, '2019-02-25', NULL, NULL, NULL, '2019-02-25', NULL, '2019-02-25 05:03:25', '2019-02-25 05:03:25', 28, 28, 1),
(56, 2, 61, 1, NULL, '2019-02-25', NULL, NULL, NULL, '2019-02-25', NULL, '2019-02-25 05:06:10', '2019-02-25 05:06:10', 30, 30, 1),
(57, 3, 61, 1, NULL, '2019-02-25', NULL, NULL, NULL, '2019-02-25', NULL, '2019-02-25 05:21:48', '2019-02-25 05:21:48', 35, 35, 1),
(58, 4, 61, 1, NULL, '2019-02-25', NULL, NULL, NULL, '2019-02-25', NULL, '2019-02-25 05:26:38', '2019-02-25 05:26:38', 33, 33, 1),
(59, 5, 61, 1, NULL, '2019-02-25', NULL, NULL, NULL, NULL, NULL, '2019-02-25 05:27:19', '2019-02-25 05:27:19', 34, 34, 1),
(60, 1, 68, NULL, NULL, NULL, NULL, 1, NULL, '2019-02-27', NULL, '2019-02-27 03:57:37', '2019-02-27 03:57:37', 40, 40, 1),
(61, 1, 69, 1, NULL, '2019-02-27', NULL, NULL, NULL, '2019-02-27', NULL, '2019-02-27 04:08:58', '2019-02-27 04:08:58', 28, 28, 1),
(62, 2, 69, 1, NULL, '2019-02-27', '2019-02-27', NULL, NULL, '2019-02-27', NULL, '2019-02-27 04:17:56', '2019-02-27 04:17:56', 30, 30, 1),
(63, 4, 69, 1, NULL, '2019-02-27', NULL, NULL, NULL, '2019-02-27', '2019-02-27', '2019-02-27 04:19:44', '2019-02-27 04:19:44', 33, 33, 1),
(64, 5, 69, 1, NULL, '2019-02-27', NULL, NULL, NULL, NULL, NULL, '2019-02-27 04:20:15', '2019-02-27 04:20:15', 34, 34, 1),
(65, 1, 70, 1, NULL, '2019-03-02', NULL, NULL, NULL, '2019-03-02', NULL, '2019-03-02 01:58:29', '2019-03-02 01:58:29', 28, 28, 1),
(66, 2, 70, 1, NULL, '2019-03-02', NULL, NULL, NULL, '2019-03-02', NULL, '2019-03-02 01:59:36', '2019-03-02 01:59:36', 30, 30, 1),
(67, 4, 70, 1, NULL, '2019-03-02', NULL, NULL, NULL, '2019-03-02', NULL, '2019-03-02 02:00:35', '2019-03-02 02:00:35', 33, 33, 1),
(68, 5, 70, 1, NULL, '2019-03-02', NULL, NULL, NULL, NULL, NULL, '2019-03-02 02:04:55', '2019-03-02 02:04:55', 34, 34, 1),
(69, 1, 71, 1, NULL, '2019-03-03', NULL, NULL, NULL, '2019-03-03', '2019-03-03', '2019-03-02 23:12:58', '2019-03-02 23:12:58', 28, 28, 1),
(70, 2, 71, 1, NULL, '2019-03-03', NULL, NULL, NULL, '2019-03-03', NULL, '2019-03-02 23:17:27', '2019-03-02 23:17:27', 30, 30, 1),
(71, 2, 31, NULL, NULL, NULL, NULL, 1, NULL, '2019-03-03', NULL, '2019-03-02 23:15:35', '2019-03-02 23:15:35', 30, 30, 1),
(72, 4, 71, 1, NULL, '2019-03-03', NULL, NULL, NULL, '2019-03-03', NULL, '2019-03-02 23:20:30', '2019-03-02 23:20:30', 33, 33, 1),
(73, 5, 71, 1, NULL, '2019-03-03', NULL, NULL, NULL, NULL, NULL, '2019-03-02 23:23:29', '2019-03-02 23:23:29', 34, 34, 1),
(74, 1, 74, NULL, NULL, NULL, NULL, 1, NULL, '2019-03-03', NULL, '2019-03-03 03:18:00', '2019-03-03 03:18:00', 40, 40, 1),
(75, 1, 76, 1, NULL, '2019-03-04', NULL, NULL, NULL, '2019-03-04', NULL, '2019-03-03 23:40:48', '2019-03-03 23:40:48', 28, 28, 1),
(76, 2, 76, 1, NULL, '2019-03-04', NULL, NULL, NULL, '2019-03-04', NULL, '2019-03-03 23:43:42', '2019-03-03 23:43:42', 30, 30, 1),
(77, 4, 76, 1, NULL, '2019-03-04', NULL, NULL, NULL, '2019-03-04', NULL, '2019-03-03 23:53:47', '2019-03-03 23:53:47', 33, 33, 1),
(78, 5, 76, 1, NULL, '2019-03-04', NULL, NULL, NULL, NULL, NULL, '2019-03-03 23:54:21', '2019-03-03 23:54:21', 34, 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unapprove_project_linkages_and_targets`
--

CREATE TABLE `unapprove_project_linkages_and_targets` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `relaion` tinyint(4) NOT NULL,
  `goal` int(11) DEFAULT NULL,
  `target` int(11) DEFAULT NULL,
  `scale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landsize` text COLLATE utf8mb4_unicode_ci,
  `acquisition` tinyint(4) DEFAULT NULL,
  `fesibility_date` date DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unapprove_project_linkages_and_targets`
--

INSERT INTO `unapprove_project_linkages_and_targets` (`id`, `project_id`, `type`, `relaion`, `goal`, `target`, `scale`, `landsize`, `acquisition`, `fesibility_date`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(124, 5, 1, 1, 2, 2, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-20 09:35:00', '2019-01-20 09:35:00'),
(125, 5, 2, 1, 9, 7, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-20 09:35:00', '2019-01-20 09:35:00'),
(165, 4, 1, 1, 3, 1, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-20 10:44:27', '2019-01-20 10:44:27'),
(169, 1, 1, 1, 3, 1, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-20 10:48:41', '2019-01-20 10:48:41'),
(170, 1, 2, 1, 9, 7, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-20 10:48:41', '2019-01-20 10:48:41'),
(171, 1, 2, 1, 9, 7, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-20 10:48:41', '2019-01-20 10:48:41'),
(172, 1, 2, 1, 9, 7, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-20 10:48:41', '2019-01-20 10:48:41'),
(173, 1, 3, 1, 1, 1, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-20 10:48:41', '2019-01-20 10:48:41'),
(174, 1, 4, 1, 2, 2, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-20 10:48:41', '2019-01-20 10:48:41'),
(194, 12, 1, 1, 2, 3, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-23 09:43:50', '2019-01-23 09:43:50'),
(257, 13, 1, 1, 2, 2, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-23 10:54:00', '2019-01-23 10:54:00'),
(258, 13, 1, 1, 3, 1, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-23 10:54:00', '2019-01-23 10:54:00'),
(259, 13, 2, 1, 10, 8, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-23 10:54:00', '2019-01-23 10:54:00'),
(260, 13, 2, 1, 10, 8, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-23 10:54:00', '2019-01-23 10:54:00'),
(261, 13, 3, 1, 2, 3, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-23 10:54:00', '2019-01-23 10:54:00'),
(277, 21, 1, 1, 2, 2, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-28 08:14:24', '2019-01-28 08:14:24'),
(295, 22, 1, 1, 2, 3, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-28 08:31:52', '2019-01-28 08:31:52'),
(296, 22, 1, 1, 3, 1, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-28 08:31:52', '2019-01-28 08:31:52'),
(297, 22, 2, 1, 9, 7, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-01-28 08:31:52', '2019-01-28 08:31:52'),
(336, 26, 1, 1, 2, 2, NULL, NULL, NULL, NULL, 28, 28, 1, '2019-01-30 07:17:37', '2019-01-30 07:17:37'),
(337, 26, 2, 1, 9, NULL, NULL, NULL, NULL, NULL, 28, 28, 1, '2019-01-30 07:17:37', '2019-01-30 07:17:37'),
(338, 39, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-01 08:46:04', '2019-02-01 08:46:04'),
(348, 32, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-01 09:25:47', '2019-02-01 09:25:47'),
(349, 32, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-01 09:25:48', '2019-02-01 09:25:48'),
(350, 32, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-01 09:25:48', '2019-02-01 09:25:48'),
(351, 32, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-01 09:25:48', '2019-02-01 09:25:48'),
(358, 43, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-03 06:05:19', '2019-02-03 06:05:19'),
(359, 43, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-03 06:05:28', '2019-02-03 06:05:28'),
(360, 43, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-03 06:05:34', '2019-02-03 06:05:34'),
(361, 43, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-03 06:05:40', '2019-02-03 06:05:40'),
(362, 42, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-03 06:06:06', '2019-02-03 06:06:06'),
(363, 42, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-03 06:06:06', '2019-02-03 06:06:06'),
(364, 42, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-03 06:06:06', '2019-02-03 06:06:06'),
(365, 42, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-03 06:06:06', '2019-02-03 06:06:06'),
(367, 45, 1, 1, 3, 1, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-02-03 06:33:18', '2019-02-03 06:33:18'),
(368, 45, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-02-03 06:33:18', '2019-02-03 06:33:18'),
(369, 45, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-02-03 06:33:18', '2019-02-03 06:33:18'),
(370, 45, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-02-03 06:33:18', '2019-02-03 06:33:18'),
(371, 47, 1, 1, 2, 2, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-02-03 07:42:17', '2019-02-03 07:42:17'),
(372, 47, 2, 1, 10, 8, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-02-03 07:42:17', '2019-02-03 07:42:17'),
(373, 48, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-02-04 04:19:44', '2019-02-04 04:19:44'),
(374, 48, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-02-04 04:19:44', '2019-02-04 04:19:44'),
(375, 48, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-02-04 04:19:44', '2019-02-04 04:19:44'),
(376, 48, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-02-04 04:19:45', '2019-02-04 04:19:45'),
(377, 11, 1, 1, 2, 2, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-05 04:16:46', '2019-02-05 04:16:46'),
(378, 11, 1, 1, 2, 2, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-05 04:16:46', '2019-02-05 04:16:46'),
(379, 11, 2, 1, 9, 7, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-05 04:16:47', '2019-02-05 04:16:47'),
(380, 11, 3, 1, 2, 3, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-05 04:16:47', '2019-02-05 04:16:47'),
(381, 11, 3, 1, 1, 1, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-05 04:16:47', '2019-02-05 04:16:47'),
(427, 50, 1, 1, 3, 1, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-05 06:38:00', '2019-02-05 06:38:00'),
(428, 50, 2, 1, 10, 8, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-05 06:38:00', '2019-02-05 06:38:00'),
(429, 50, 3, 1, 2, 3, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-05 06:38:00', '2019-02-05 06:38:00'),
(440, 52, 4, 1, 0, 0, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-02-06 07:21:07', '2019-02-06 07:21:07'),
(470, 53, 1, 1, 3, 1, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-07 09:16:01', '2019-02-07 09:16:01'),
(471, 53, 2, 1, 10, 8, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-07 09:16:01', '2019-02-07 09:16:01'),
(472, 53, 3, 1, 1, 1, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-07 09:16:01', '2019-02-07 09:16:01'),
(473, 53, 4, 1, 0, 0, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-07 09:16:01', '2019-02-07 09:16:01'),
(474, 53, 5, 1, 0, 0, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-07 09:16:01', '2019-02-07 09:16:01'),
(475, 55, 1, 1, 3, 1, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-02-18 11:27:01', '2019-02-18 11:27:01'),
(476, 55, 1, 1, 3, 1, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-02-18 11:27:01', '2019-02-18 11:27:01'),
(477, 55, 2, 1, 9, 7, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-02-18 11:27:01', '2019-02-18 11:27:01'),
(478, 55, 2, 1, 10, 8, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-02-18 11:27:01', '2019-02-18 11:27:01'),
(479, 55, 5, 1, 0, 0, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-02-18 11:27:01', '2019-02-18 11:27:01'),
(487, 59, 5, 1, 2, 3, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-24 09:17:20', '2019-02-24 09:17:20'),
(488, 60, 5, 1, 5, 2, '61-80', NULL, NULL, NULL, 24, 24, 1, '2019-02-25 10:41:43', '2019-02-25 10:41:43'),
(489, 60, 6, 1, 5, 2, '0-20', NULL, NULL, NULL, 24, 24, 1, '2019-02-25 11:09:52', '2019-02-25 11:09:52'),
(526, 63, 5, 1, 2, 3, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-26 06:34:31', '2019-02-26 06:34:31'),
(527, 64, 5, 1, 1, 2, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-02-26 06:45:30', '2019-02-26 06:45:30'),
(528, 65, 5, 1, 2, 3, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-26 06:48:05', '2019-02-26 06:48:05'),
(529, 10, 1, 1, 3, 1, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-26 10:32:54', '2019-02-26 10:32:54'),
(530, 10, 2, 1, 10, 8, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-26 10:32:54', '2019-02-26 10:32:54'),
(531, 10, 2, 1, 10, 8, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-26 10:32:54', '2019-02-26 10:32:54'),
(532, 10, 3, 1, 2, 3, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-26 10:32:54', '2019-02-26 10:32:54'),
(533, 10, 4, 1, 0, 0, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-26 10:32:54', '2019-02-26 10:32:54'),
(534, 10, 5, 1, 2, 3, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-26 10:32:54', '2019-02-26 10:32:54'),
(535, 10, 5, 1, 2, 3, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-26 10:32:54', '2019-02-26 10:32:54'),
(536, 10, 6, 1, 4, 1, '21-40', NULL, NULL, NULL, 24, 24, 1, '2019-02-26 10:32:54', '2019-02-26 10:32:54'),
(537, 10, 6, 1, 4, 1, '81-100', NULL, NULL, NULL, 24, 24, 1, '2019-02-26 10:32:54', '2019-02-26 10:32:54'),
(538, 3, 1, 1, 2, 2, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-26 10:35:46', '2019-02-26 10:35:46'),
(539, 3, 2, 1, 9, 7, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-26 10:35:46', '2019-02-26 10:35:46'),
(540, 3, 3, 1, 2, 3, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-26 10:35:46', '2019-02-26 10:35:46'),
(541, 3, 4, 1, 0, 0, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-26 10:35:46', '2019-02-26 10:35:46'),
(542, 3, 5, 1, 1, 2, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-02-26 10:35:46', '2019-02-26 10:35:46'),
(543, 3, 6, 1, 4, 1, '21-40', NULL, NULL, NULL, 24, 24, 1, '2019-02-26 10:35:46', '2019-02-26 10:35:46'),
(544, 72, 1, 1, 2, 2, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-03-03 06:28:03', '2019-03-03 06:28:03'),
(561, 73, 5, 1, 1, 2, NULL, NULL, NULL, NULL, 24, 24, 1, '2019-03-03 07:39:36', '2019-03-03 07:39:36'),
(562, 73, 7, 1, NULL, NULL, NULL, '212', 0, NULL, 24, 24, 1, '2019-03-03 07:39:36', '2019-03-03 07:39:36'),
(563, 76, 3, 1, 1, 4, NULL, NULL, NULL, NULL, 40, 40, 1, '2019-03-04 05:38:25', '2019-03-04 05:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `upazila_locations`
--

CREATE TABLE `upazila_locations` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `upazila_location_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upazila_location_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upazila_location_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazila_locations`
--

INSERT INTO `upazila_locations` (`id`, `upazila_location_name`, `upazila_location_name_bn`, `upazila_location_description`, `district_id`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(2, 'Khoksa Upazilla', '', 'Khoksa Upazilla', 8, 1, '2019-01-02 03:13:30', '2019-02-16 01:19:58', NULL, NULL, NULL),
(3, 'Kumarkhali', '', 'Upazilla', 8, 1, '2019-01-06 01:38:05', '2019-02-16 01:18:29', NULL, NULL, NULL),
(4, 'Chittagong', '', 'Port City', 9, 1, '2019-02-16 00:42:26', '2019-02-16 00:42:26', NULL, NULL, NULL),
(5, 'Agrabed', '', 'Commercial City', 9, 1, '2019-02-16 03:15:49', '2019-02-16 03:15:49', NULL, NULL, NULL),
(6, 'CDA', '', 'Residential City', 9, 1, '2019-02-16 03:16:23', '2019-02-16 03:16:23', NULL, NULL, NULL),
(7, 'Halisahar', '', 'City', 9, 1, '2019-02-16 03:16:49', '2019-02-16 03:16:49', NULL, NULL, NULL),
(8, 'Doyaganj', '', 'City', 7, 1, '2019-02-16 03:40:12', '2019-02-16 03:40:12', NULL, NULL, NULL),
(9, 'uio', '', 'dadsaa', 7, 1, '2019-02-26 03:31:12', '2019-02-26 03:32:14', NULL, NULL, '2019-02-26 03:32:14'),
(10, 'asdsdsd', '', 'sas', 7, 1, '2019-02-26 03:32:36', '2019-02-26 03:33:19', NULL, NULL, '2019-02-26 03:33:19'),
(11, 'adfdfasfasdfasdfadsfsdf', 'উপজেলা / অবস্থান নাম বাংলা উপজেলা / অবস্থান নাম বাংলা', 'saddasdfadsf', 8, 1, '2019-02-26 03:33:37', '2019-02-26 03:34:24', NULL, NULL, '2019-02-26 03:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `usergroups`
--

CREATE TABLE `usergroups` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_group` int(11) DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usergroups`
--

INSERT INTO `usergroups` (`id`, `company_id`, `group_name`, `sub_group`, `description`, `created_by`, `updated_by`, `isactive`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 0, 'Super Admin', 0, 'Super Admin', 1, 24, 1, '2018-11-04 03:14:19', '2019-02-06 02:12:44', NULL),
(3, 0, 'System Admin', NULL, 'System Admin', 1, 0, 1, '2018-11-04 03:14:43', '2018-11-04 03:14:43', NULL),
(4, 0, 'ERD User', NULL, 'ERD User', 1, 0, 1, '2018-11-04 03:15:18', '2018-11-04 03:15:18', NULL),
(5, 0, 'Finance Division User', NULL, 'Finance Division User', 1, 0, 1, '2018-11-04 03:15:39', '2018-11-04 03:15:39', NULL),
(6, 0, 'ADP Super User', NULL, 'ADP Super User', 9, 0, 1, '2018-11-05 02:53:11', '2018-11-05 02:53:11', NULL),
(7, 0, 'ADP User', NULL, 'ADP User', 9, 0, 1, '2018-11-05 02:53:53', '2019-01-22 04:02:49', NULL),
(8, 0, 'RADP Super User', NULL, 'RADP Super User', 9, 0, 1, '2018-11-05 02:54:39', '2018-11-05 02:54:39', NULL),
(9, 0, 'Sector Division - Super User', NULL, 'Sector Division - Super User', 9, 24, 1, '2018-11-05 02:55:06', '2019-01-31 02:10:37', NULL),
(10, 0, 'Sector Division - Maker', 9, 'Sector Division - Maker', 9, 24, 1, '2018-11-05 02:55:50', '2019-01-31 02:11:02', NULL),
(11, 0, 'Sub Sector-super User', NULL, 'Sub Sector-super User', 9, 24, 1, '2018-11-05 02:57:14', '2019-01-31 01:56:56', NULL),
(12, 0, 'Ministry-Super User', NULL, 'Ministry-Super User', 9, 24, 1, '2018-11-05 02:58:09', '2019-01-30 22:02:40', NULL),
(13, 0, 'Agency/Division-super User', NULL, 'Agency/Division-super User', 9, 24, 1, '2018-11-05 02:58:29', '2019-01-30 04:49:15', NULL),
(14, 0, 'Ministry-Maker', 12, 'Ministry-Maker', 1, 24, 1, '2018-11-06 22:30:41', '2019-01-30 22:02:56', NULL),
(15, 0, 'Agency/Division- Maker', 13, 'Agency/Division- Maker', 1, 24, 1, '2018-11-06 22:46:19', '2019-01-30 04:50:00', NULL),
(16, 0, 'Programming Division', NULL, 'Programming Division', 24, 24, 1, '2019-01-16 04:02:40', '2019-01-22 02:21:29', NULL),
(18, 0, 'Programming Division Wings', NULL, 'Programming Division Wings', 24, 24, 1, '2019-01-22 02:23:18', '2019-01-22 02:47:33', NULL),
(19, 0, 'Subsector-Maker', 11, 'Subsector-Maker', 24, 24, 1, '2019-01-22 02:43:20', '2019-01-31 01:57:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  `user_group` int(11) NOT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_user` int(11) NOT NULL,
  `name_bn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration_date` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_image`, `email`, `email_verified_at`, `password`, `admin`, `user_group`, `department_id`, `parent_user`, `name_bn`, `designation`, `mobile_no`, `national_id_no`, `expiration_date`, `remember_token`, `modifiedby`, `createdby`, `created_at`, `updated_at`, `deleted_at`, `isactive`) VALUES
(24, 'Admin', 'user-images/Admin.png', 'admin@adp.com', NULL, '$2y$10$iCy/A4mvaV70FtDmwjco2.0OilyNnRolJjn1InJNtfRkhfd9RE4d.', 0, 2, NULL, 24, '', '', '', '', '2018-11-30', NULL, 24, 1, '2018-11-06 01:44:31', '2018-12-10 03:13:40', NULL, 1),
(28, 'Agency Super User', 'user-images/Kanok.JPG', 'agencysuper@adp.com', NULL, '$2y$10$6TCOMD.wracdF8UrvyXvIuwDbBKcj1bIVrx6/aSU0NBCfiO941T/e', 0, 13, 9, 0, '', '', '', '', '2018-11-30', NULL, 24, 24, '2018-11-19 22:35:31', '2019-01-30 04:57:29', NULL, 1),
(30, 'Ministry Super User', 'user-images/Super.jpg', 'ministrysuper@adp.com', NULL, '$2y$10$ytEBAQTF3LDQprXBBv4hS.dk/cj5E1lcZdvekPgHmdBaxauzwPyRS', 0, 12, 16, 24, '', '', '', '', '2018-12-14', NULL, 24, 24, '2018-12-10 02:37:12', '2019-03-02 01:55:03', NULL, 1),
(33, 'Sector Super User', 'user-images/Sector.jpg', 'sectorsuper@adp.com', NULL, '$2y$10$n/BdYX1nHPpZ7f9Mco6jO.CWFD2gvx1OWnlNZofc7iwtOSrPo3XDm', 0, 9, 10, 24, '', '', '', '', '2019-01-31', NULL, 24, 24, '2019-01-13 23:55:32', '2019-02-10 01:31:03', NULL, 1),
(34, 'Programming Division', 'uploaded_files/user-images/user-images_8f0c57b4dd0aa4245d1b6b09cd4a7c36.jpg', 'programmingdivision@adp.com', NULL, '$2y$10$2nFs8ZJ2U0YrBuxlTRTxgOBVjKDIuDFc/KcoZk3LOWqD1dlxI.LuC', 0, 16, NULL, 24, '', '', '', '', '2019-01-31', NULL, 24, 24, '2019-01-14 00:46:28', '2019-01-22 04:19:11', NULL, 1),
(35, 'Sub Sector Super User', 'user-images/Sub Sector Super User.jpg', 'subsectorsuper@adp.com', NULL, '$2y$10$gbWpEJ3MibnprdzC9vrdh.sN6mhe3zuVkO0NqKslQXKLy1Zxs4yee', 0, 11, 10, 24, '', '', '', '', '2019-01-31', NULL, 24, 24, '2019-01-16 05:16:50', '2019-02-12 00:49:05', NULL, 1),
(38, 'Ministry Maker', 'user-images/Ministry Maker.jpg', 'ministrymaker@adp.com', NULL, '$2y$10$YmlUJr0q7AQzFzniS6UZAOA99qBnAQsXbDAwED9aae6sjFFgpCcMK', 0, 14, 16, 30, '', '', '', '', '2019-01-22', NULL, 24, 24, '2019-01-22 02:40:13', '2019-03-02 01:55:14', NULL, 1),
(39, 'wings', 'user-images/wings.jpg', 'wings@gmail.com', NULL, '$2y$10$uyh0s3dm4Azt/91ls0V6Pe4dqVyJqsN4Q25Kmbk8PgEZkfanjxHCe', 0, 18, 2, 24, '', '', '', '', '2019-01-26', NULL, 24, 24, '2019-01-25 22:43:24', '2019-02-12 00:49:26', NULL, 1),
(40, 'Agency Maker', 'user-images/Agency Maker.jpg', 'agencymaker@adp.com', NULL, '$2y$10$sCX5dOHLVNvHsFbQ8CK9e.UzXEiCSJwWQ9RufqLAbh9YlkI.sZxVC', 0, 15, 9, 28, '', '', '', '', '2019-01-31', NULL, 24, 24, '2019-01-30 04:03:29', '2019-02-26 02:18:59', NULL, 1),
(41, 'Sub Sector Maker', 'user-images/Sub Sector Maker.jpg', 'subsectormaker@adp.com', NULL, '$2y$10$cD1MUsdKY6g/WeE8HPmEUukZVZJVOPBEgRE5cYz8sL1caGepXQcmi', 0, 19, NULL, 35, '', '', '', '', '2019-01-31', NULL, 24, 24, '2019-01-31 02:00:08', '2019-02-12 00:49:43', NULL, 1),
(42, 'Sector Maker', 'user-images/Sector Maker.jpg', 'sectormaker@adp.com', NULL, '$2y$10$rf9Z4001gUpG9O9s4HYel.HNkgIs10qB/bHec0l4YsgkyOu7tWIy.', 0, 10, 10, 33, '', '', '', '', '2019-01-31', NULL, 24, 24, '2019-01-31 02:13:08', '2019-02-12 00:49:52', NULL, 1),
(43, 'SHOHEL', NULL, 'shohelbijoy@gmail.com', NULL, '$2y$10$y4ZPkYJUfoZFtVe71ccC2.Qw/WQa9MLKjw6PX65hkqZWYQktLIQSq', 0, 15, 9, 0, 'সোহেল', 'Laravel Developer', '01999910100', '1111119304930490394', NULL, NULL, 24, 24, '2019-03-03 04:51:28', '2019-03-03 05:01:25', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_backup`
--

CREATE TABLE `user_backup` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  `user_group` int(11) NOT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_user` int(11) NOT NULL,
  `expiration_date` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_backup`
--

INSERT INTO `user_backup` (`id`, `name`, `user_image`, `email`, `email_verified_at`, `password`, `admin`, `user_group`, `department_id`, `parent_user`, `expiration_date`, `remember_token`, `modifiedby`, `createdby`, `created_at`, `updated_at`, `deleted_at`, `isactive`) VALUES
(24, 'Admin', 'user-images/Admin.png', 'admin@adp.com', NULL, '$2y$10$iCy/A4mvaV70FtDmwjco2.0OilyNnRolJjn1InJNtfRkhfd9RE4d.', 0, 2, NULL, 24, '2018-11-30', NULL, 24, 1, '2018-11-06 01:44:31', '2018-12-10 03:13:40', NULL, 1),
(28, 'Agency Super User', 'user-images/Kanok.JPG', 'agencysuper@adp.com', NULL, '$2y$10$6TCOMD.wracdF8UrvyXvIuwDbBKcj1bIVrx6/aSU0NBCfiO941T/e', 0, 13, 9, 0, '2018-11-30', NULL, 24, 24, '2018-11-19 22:35:31', '2019-01-30 04:57:29', NULL, 1),
(30, 'Ministry Super User', 'user-images/Super.jpg', 'ministrysuper@adp.com', NULL, '$2y$10$ytEBAQTF3LDQprXBBv4hS.dk/cj5E1lcZdvekPgHmdBaxauzwPyRS', 0, 12, 16, 24, '2018-12-14', NULL, 24, 24, '2018-12-10 02:37:12', '2019-03-02 01:55:03', NULL, 1),
(33, 'Sector Super User', 'user-images/Sector.jpg', 'sectorsuper@adp.com', NULL, '$2y$10$n/BdYX1nHPpZ7f9Mco6jO.CWFD2gvx1OWnlNZofc7iwtOSrPo3XDm', 0, 9, 1, 24, '2019-01-31', NULL, 24, 24, '2019-01-13 23:55:32', '2019-02-10 01:31:03', NULL, 1),
(34, 'Programming Division', 'uploaded_files/user-images/user-images_8f0c57b4dd0aa4245d1b6b09cd4a7c36.jpg', 'programmingdivision@adp.com', NULL, '$2y$10$2nFs8ZJ2U0YrBuxlTRTxgOBVjKDIuDFc/KcoZk3LOWqD1dlxI.LuC', 0, 16, NULL, 24, '2019-01-31', NULL, 24, 24, '2019-01-14 00:46:28', '2019-01-22 04:19:11', NULL, 1),
(35, 'Sub Sector Super User', 'user-images/Sub Sector Super User.jpg', 'subsectorsuper@adp.com', NULL, '$2y$10$gbWpEJ3MibnprdzC9vrdh.sN6mhe3zuVkO0NqKslQXKLy1Zxs4yee', 0, 11, 10, 24, '2019-01-31', NULL, 24, 24, '2019-01-16 05:16:50', '2019-02-12 00:49:05', NULL, 1),
(38, 'Ministry Maker', 'user-images/Ministry Maker.jpg', 'ministrymaker@adp.com', NULL, '$2y$10$YmlUJr0q7AQzFzniS6UZAOA99qBnAQsXbDAwED9aae6sjFFgpCcMK', 0, 14, 16, 30, '2019-01-22', NULL, 24, 24, '2019-01-22 02:40:13', '2019-03-02 01:55:14', NULL, 1),
(39, 'wings', 'user-images/wings.jpg', 'wings@gmail.com', NULL, '$2y$10$uyh0s3dm4Azt/91ls0V6Pe4dqVyJqsN4Q25Kmbk8PgEZkfanjxHCe', 0, 18, 2, 24, '2019-01-26', NULL, 24, 24, '2019-01-25 22:43:24', '2019-02-12 00:49:26', NULL, 1),
(40, 'Agency Maker', 'user-images/Agency Maker.jpg', 'agencymaker@adp.com', NULL, '$2y$10$sCX5dOHLVNvHsFbQ8CK9e.UzXEiCSJwWQ9RufqLAbh9YlkI.sZxVC', 0, 15, 9, 28, '2019-01-31', NULL, 24, 24, '2019-01-30 04:03:29', '2019-02-26 02:18:59', NULL, 1),
(41, 'Sub Sector Maker', 'user-images/Sub Sector Maker.jpg', 'subsectormaker@adp.com', NULL, '$2y$10$cD1MUsdKY6g/WeE8HPmEUukZVZJVOPBEgRE5cYz8sL1caGepXQcmi', 0, 19, NULL, 35, '2019-01-31', NULL, 24, 24, '2019-01-31 02:00:08', '2019-02-12 00:49:43', NULL, 1),
(42, 'Sector Maker', 'user-images/Sector Maker.jpg', 'sectormaker@adp.com', NULL, '$2y$10$rf9Z4001gUpG9O9s4HYel.HNkgIs10qB/bHec0l4YsgkyOu7tWIy.', 0, 10, 1, 33, '2019-01-31', NULL, 24, 24, '2019-01-31 02:13:08', '2019-02-12 00:49:52', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_privileges`
--

CREATE TABLE `user_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_group` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `actions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_privileges`
--

INSERT INTO `user_privileges` (`id`, `user_group`, `menu_id`, `actions`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(2674, 5, 8, '', 24, NULL, '2019-02-11 22:04:29', '2019-02-11 22:04:29'),
(2675, 5, 9, '0,1,2,3', 24, NULL, '2019-02-11 22:04:29', '2019-02-11 22:04:29'),
(2676, 5, 27, '0,1,2,3', 24, NULL, '2019-02-11 22:04:29', '2019-02-11 22:04:29'),
(2677, 5, 39, '0,1,2,3', 24, NULL, '2019-02-11 22:04:29', '2019-02-11 22:04:29'),
(2678, 5, 25, '', 24, NULL, '2019-02-11 22:04:29', '2019-02-11 22:04:29'),
(2679, 5, 26, '0,1,2,3', 24, NULL, '2019-02-11 22:04:29', '2019-02-11 22:04:29'),
(2680, 5, 31, '', 24, NULL, '2019-02-11 22:04:29', '2019-02-11 22:04:29'),
(2681, 5, 32, '0,1,2,3', 24, NULL, '2019-02-11 22:04:29', '2019-02-11 22:04:29'),
(2682, 5, 33, '0,1,2,3', 24, NULL, '2019-02-11 22:04:29', '2019-02-11 22:04:29'),
(2683, 5, 37, '', 24, NULL, '2019-02-11 22:04:29', '2019-02-11 22:04:29'),
(2684, 5, 24, '0,1,2,3', 24, NULL, '2019-02-11 22:04:29', '2019-02-11 22:04:29'),
(2685, 5, 61, '', 24, NULL, '2019-02-11 22:04:29', '2019-02-11 22:04:29'),
(2686, 5, 62, '0,1,2,3', 24, NULL, '2019-02-11 22:04:30', '2019-02-11 22:04:30'),
(2687, 5, 63, '0,1,2,3', 24, NULL, '2019-02-11 22:04:30', '2019-02-11 22:04:30'),
(2688, 5, 64, '0,1,2,3', 24, NULL, '2019-02-11 22:04:30', '2019-02-11 22:04:30'),
(3078, 19, 8, '', 24, NULL, '2019-02-18 03:49:17', '2019-02-18 03:49:17'),
(3079, 19, 9, '0,1,2,3', 24, NULL, '2019-02-18 03:49:17', '2019-02-18 03:49:17'),
(3080, 19, 58, '0,1,2,3', 24, NULL, '2019-02-18 03:49:17', '2019-02-18 03:49:17'),
(3081, 19, 25, '', 24, NULL, '2019-02-18 03:49:17', '2019-02-18 03:49:17'),
(3082, 19, 26, '0,1,2,3', 24, NULL, '2019-02-18 03:49:17', '2019-02-18 03:49:17'),
(3083, 19, 38, '0,1,2,3', 24, NULL, '2019-02-18 03:49:17', '2019-02-18 03:49:17'),
(3084, 19, 31, '', 24, NULL, '2019-02-18 03:49:17', '2019-02-18 03:49:17'),
(3085, 19, 33, '0,1,2,3', 24, NULL, '2019-02-18 03:49:17', '2019-02-18 03:49:17'),
(3086, 19, 37, '', 24, NULL, '2019-02-18 03:49:17', '2019-02-18 03:49:17'),
(3087, 19, 24, '0,1,2,3', 24, NULL, '2019-02-18 03:49:17', '2019-02-18 03:49:17'),
(3088, 19, 60, '0,1,2,3', 24, NULL, '2019-02-18 03:49:17', '2019-02-18 03:49:17'),
(3089, 15, 8, '', 24, NULL, '2019-02-18 03:49:29', '2019-02-18 03:49:29'),
(3090, 15, 9, '0,1,2,3', 24, NULL, '2019-02-18 03:49:29', '2019-02-18 03:49:29'),
(3091, 15, 58, '0,1,2,3', 24, NULL, '2019-02-18 03:49:29', '2019-02-18 03:49:29'),
(3092, 15, 25, '', 24, NULL, '2019-02-18 03:49:30', '2019-02-18 03:49:30'),
(3093, 15, 26, '0,1,2,3', 24, NULL, '2019-02-18 03:49:30', '2019-02-18 03:49:30'),
(3094, 15, 38, '0,1,2,3', 24, NULL, '2019-02-18 03:49:30', '2019-02-18 03:49:30'),
(3095, 15, 31, '', 24, NULL, '2019-02-18 03:49:30', '2019-02-18 03:49:30'),
(3096, 15, 33, '0,1,2,3', 24, NULL, '2019-02-18 03:49:30', '2019-02-18 03:49:30'),
(3097, 15, 37, '', 24, NULL, '2019-02-18 03:49:30', '2019-02-18 03:49:30'),
(3098, 15, 24, '0,1,2,3', 24, NULL, '2019-02-18 03:49:30', '2019-02-18 03:49:30'),
(3099, 15, 60, '0,1,2,3', 24, NULL, '2019-02-18 03:49:30', '2019-02-18 03:49:30'),
(3100, 14, 8, '', 24, NULL, '2019-02-18 03:49:42', '2019-02-18 03:49:42'),
(3101, 14, 9, '0,1,2,3', 24, NULL, '2019-02-18 03:49:42', '2019-02-18 03:49:42'),
(3102, 14, 58, '0,1,2,3', 24, NULL, '2019-02-18 03:49:42', '2019-02-18 03:49:42'),
(3103, 14, 25, '', 24, NULL, '2019-02-18 03:49:42', '2019-02-18 03:49:42'),
(3104, 14, 26, '0,1,2,3', 24, NULL, '2019-02-18 03:49:42', '2019-02-18 03:49:42'),
(3105, 14, 38, '0,1,2,3', 24, NULL, '2019-02-18 03:49:42', '2019-02-18 03:49:42'),
(3106, 14, 31, '', 24, NULL, '2019-02-18 03:49:42', '2019-02-18 03:49:42'),
(3107, 14, 33, '0,1,2,3', 24, NULL, '2019-02-18 03:49:42', '2019-02-18 03:49:42'),
(3108, 14, 37, '', 24, NULL, '2019-02-18 03:49:42', '2019-02-18 03:49:42'),
(3109, 14, 24, '0,1,2,3', 24, NULL, '2019-02-18 03:49:42', '2019-02-18 03:49:42'),
(3110, 14, 60, '0,1,2,3', 24, NULL, '2019-02-18 03:49:42', '2019-02-18 03:49:42'),
(3131, 11, 8, '', 24, NULL, '2019-02-18 03:50:37', '2019-02-18 03:50:37'),
(3132, 11, 27, '0,1,2,3', 24, NULL, '2019-02-18 03:50:37', '2019-02-18 03:50:37'),
(3133, 11, 58, '0,1,2,3', 24, NULL, '2019-02-18 03:50:37', '2019-02-18 03:50:37'),
(3134, 11, 25, '', 24, NULL, '2019-02-18 03:50:38', '2019-02-18 03:50:38'),
(3135, 11, 48, '0,1,2,3', 24, NULL, '2019-02-18 03:50:38', '2019-02-18 03:50:38'),
(3136, 11, 31, '', 24, NULL, '2019-02-18 03:50:38', '2019-02-18 03:50:38'),
(3137, 11, 33, '0,1,2,3', 24, NULL, '2019-02-18 03:50:38', '2019-02-18 03:50:38'),
(3138, 11, 37, '', 24, NULL, '2019-02-18 03:50:38', '2019-02-18 03:50:38'),
(3139, 11, 24, '0,1,2,3', 24, NULL, '2019-02-18 03:50:38', '2019-02-18 03:50:38'),
(3140, 11, 60, '0,1,2,3', 24, NULL, '2019-02-18 03:50:38', '2019-02-18 03:50:38'),
(3558, 12, 8, '', 24, NULL, '2019-02-25 05:24:31', '2019-02-25 05:24:31'),
(3559, 12, 27, '0,1,2,3', 24, NULL, '2019-02-25 05:24:31', '2019-02-25 05:24:31'),
(3560, 12, 39, '0,1,2,3', 24, NULL, '2019-02-25 05:24:32', '2019-02-25 05:24:32'),
(3561, 12, 58, '0,1,2,3', 24, NULL, '2019-02-25 05:24:32', '2019-02-25 05:24:32'),
(3562, 12, 25, '', 24, NULL, '2019-02-25 05:24:32', '2019-02-25 05:24:32'),
(3563, 12, 48, '0,1,2,3', 24, NULL, '2019-02-25 05:24:32', '2019-02-25 05:24:32'),
(3564, 12, 31, '', 24, NULL, '2019-02-25 05:24:32', '2019-02-25 05:24:32'),
(3565, 12, 33, '0,1,2,3', 24, NULL, '2019-02-25 05:24:32', '2019-02-25 05:24:32'),
(3566, 12, 37, '', 24, NULL, '2019-02-25 05:24:32', '2019-02-25 05:24:32'),
(3567, 12, 24, '0,1,2,3', 24, NULL, '2019-02-25 05:24:32', '2019-02-25 05:24:32'),
(3568, 12, 60, '0,1,2,3', 24, NULL, '2019-02-25 05:24:32', '2019-02-25 05:24:32'),
(3569, 13, 8, '', 24, NULL, '2019-02-25 05:24:51', '2019-02-25 05:24:51'),
(3570, 13, 27, '0,1,2,3', 24, NULL, '2019-02-25 05:24:51', '2019-02-25 05:24:51'),
(3571, 13, 39, '0,1,2,3', 24, NULL, '2019-02-25 05:24:51', '2019-02-25 05:24:51'),
(3572, 13, 58, '0,1,2,3', 24, NULL, '2019-02-25 05:24:51', '2019-02-25 05:24:51'),
(3573, 13, 25, '', 24, NULL, '2019-02-25 05:24:51', '2019-02-25 05:24:51'),
(3574, 13, 48, '0,1,2,3', 24, NULL, '2019-02-25 05:24:51', '2019-02-25 05:24:51'),
(3575, 13, 31, '', 24, NULL, '2019-02-25 05:24:51', '2019-02-25 05:24:51'),
(3576, 13, 33, '0,1,2,3', 24, NULL, '2019-02-25 05:24:51', '2019-02-25 05:24:51'),
(3577, 13, 37, '', 24, NULL, '2019-02-25 05:24:51', '2019-02-25 05:24:51'),
(3578, 13, 24, '0,1,2,3', 24, NULL, '2019-02-25 05:24:52', '2019-02-25 05:24:52'),
(3579, 13, 60, '0,1,2,3', 24, NULL, '2019-02-25 05:24:52', '2019-02-25 05:24:52'),
(3580, 13, 61, '', 24, NULL, '2019-02-25 05:24:52', '2019-02-25 05:24:52'),
(3581, 13, 64, '0,1,2,3', 24, NULL, '2019-02-25 05:24:52', '2019-02-25 05:24:52'),
(3650, 3, 2, '', 24, NULL, '2019-02-26 23:30:30', '2019-02-26 23:30:30'),
(3651, 3, 3, '0,1,2,3', 24, NULL, '2019-02-26 23:30:30', '2019-02-26 23:30:30'),
(3652, 3, 5, '0,1,2,3', 24, NULL, '2019-02-26 23:30:30', '2019-02-26 23:30:30'),
(3653, 3, 6, '', 24, NULL, '2019-02-26 23:30:30', '2019-02-26 23:30:30'),
(3654, 3, 7, '0,1,2,3', 24, NULL, '2019-02-26 23:30:30', '2019-02-26 23:30:30'),
(3655, 3, 8, '', 24, NULL, '2019-02-26 23:30:30', '2019-02-26 23:30:30'),
(3656, 3, 9, '0,1,2,3', 24, NULL, '2019-02-26 23:30:30', '2019-02-26 23:30:30'),
(3657, 3, 27, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3658, 3, 39, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3659, 3, 58, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3660, 3, 10, '', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3661, 3, 16, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3662, 3, 17, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3663, 3, 18, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3664, 3, 19, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3665, 3, 20, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3666, 3, 21, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3667, 3, 22, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3668, 3, 28, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3669, 3, 29, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3670, 3, 30, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3671, 3, 40, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3672, 3, 43, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3673, 3, 50, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3674, 3, 51, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3675, 3, 75, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3676, 3, 25, '', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3677, 3, 26, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3678, 3, 38, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3679, 3, 48, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3680, 3, 49, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3681, 3, 59, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3682, 3, 31, '', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3683, 3, 32, '0,1,2,3', 24, NULL, '2019-02-26 23:30:31', '2019-02-26 23:30:31'),
(3684, 3, 33, '0,1,2,3', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3685, 3, 34, '', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3686, 3, 35, '0,1,2,3', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3687, 3, 36, '0,1,2,3', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3688, 3, 42, '0,1,2,3', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3689, 3, 44, '0,1,2,3', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3690, 3, 45, '0,1,2,3', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3691, 3, 46, '0,1,2,3', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3692, 3, 47, '0,1,2,3', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3693, 3, 37, '', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3694, 3, 24, '0,1,2,3', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3695, 3, 52, '0,1,2,3', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3696, 3, 53, '', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3697, 3, 54, '0,1,2,3', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3698, 3, 61, '', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3699, 3, 62, '0,1,2,3', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3700, 3, 63, '0,1,2,3', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3701, 3, 64, '0,1,2,3', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3702, 3, 65, '0,1,2,3', 24, NULL, '2019-02-26 23:30:32', '2019-02-26 23:30:32'),
(3849, 16, 8, '', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3850, 16, 27, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3851, 16, 39, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3852, 16, 58, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3853, 16, 10, '', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3854, 16, 16, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3855, 16, 17, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3856, 16, 18, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3857, 16, 19, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3858, 16, 20, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3859, 16, 21, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3860, 16, 22, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3861, 16, 28, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3862, 16, 29, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3863, 16, 30, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3864, 16, 40, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3865, 16, 43, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3866, 16, 50, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3867, 16, 51, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3868, 16, 75, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3869, 16, 25, '', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3870, 16, 48, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3871, 16, 49, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3872, 16, 59, '0,1,2,3', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3873, 16, 31, '', 24, NULL, '2019-03-02 03:31:18', '2019-03-02 03:31:18'),
(3874, 16, 32, '0,1,2,3', 24, NULL, '2019-03-02 03:31:19', '2019-03-02 03:31:19'),
(3875, 16, 33, '0,1,2,3', 24, NULL, '2019-03-02 03:31:19', '2019-03-02 03:31:19'),
(3876, 16, 37, '', 24, NULL, '2019-03-02 03:31:19', '2019-03-02 03:31:19'),
(3877, 16, 52, '0,1,2,3', 24, NULL, '2019-03-02 03:31:19', '2019-03-02 03:31:19'),
(3878, 16, 60, '0,1,2,3', 24, NULL, '2019-03-02 03:31:19', '2019-03-02 03:31:19'),
(3879, 16, 53, '', 24, NULL, '2019-03-02 03:31:19', '2019-03-02 03:31:19'),
(3880, 16, 54, '0,1,2,3', 24, NULL, '2019-03-02 03:31:19', '2019-03-02 03:31:19'),
(3881, 16, 61, '', 24, NULL, '2019-03-02 03:31:19', '2019-03-02 03:31:19'),
(3882, 16, 62, '0,1,2,3', 24, NULL, '2019-03-02 03:31:19', '2019-03-02 03:31:19'),
(3883, 16, 63, '0,1,2,3', 24, NULL, '2019-03-02 03:31:19', '2019-03-02 03:31:19'),
(3884, 16, 64, '0,1,2,3', 24, NULL, '2019-03-02 03:31:19', '2019-03-02 03:31:19'),
(3885, 16, 65, '0,1,2,3', 24, NULL, '2019-03-02 03:31:19', '2019-03-02 03:31:19'),
(3886, 16, 67, '0,1,2,3', 24, NULL, '2019-03-02 03:31:19', '2019-03-02 03:31:19'),
(3956, 10, 8, '', 24, NULL, '2019-03-02 23:57:51', '2019-03-02 23:57:51'),
(3957, 10, 9, '0,1,2,3', 24, NULL, '2019-03-02 23:57:51', '2019-03-02 23:57:51'),
(3958, 10, 58, '0,1,2,3', 24, NULL, '2019-03-02 23:57:51', '2019-03-02 23:57:51'),
(3959, 10, 25, '', 24, NULL, '2019-03-02 23:57:51', '2019-03-02 23:57:51'),
(3960, 10, 26, '0,1,2,3', 24, NULL, '2019-03-02 23:57:51', '2019-03-02 23:57:51'),
(3961, 10, 38, '0,1,2,3', 24, NULL, '2019-03-02 23:57:51', '2019-03-02 23:57:51'),
(3962, 10, 31, '', 24, NULL, '2019-03-02 23:57:51', '2019-03-02 23:57:51'),
(3963, 10, 33, '0,1,2,3', 24, NULL, '2019-03-02 23:57:51', '2019-03-02 23:57:51'),
(3964, 10, 37, '', 24, NULL, '2019-03-02 23:57:51', '2019-03-02 23:57:51'),
(3965, 10, 60, '0,1,2,3', 24, NULL, '2019-03-02 23:57:52', '2019-03-02 23:57:52'),
(3966, 9, 8, '', 24, NULL, '2019-03-02 23:58:05', '2019-03-02 23:58:05'),
(3967, 9, 27, '0,1,2,3', 24, NULL, '2019-03-02 23:58:05', '2019-03-02 23:58:05'),
(3968, 9, 58, '0,1,2,3', 24, NULL, '2019-03-02 23:58:05', '2019-03-02 23:58:05'),
(3969, 9, 25, '', 24, NULL, '2019-03-02 23:58:05', '2019-03-02 23:58:05'),
(3970, 9, 48, '0,1,2,3', 24, NULL, '2019-03-02 23:58:06', '2019-03-02 23:58:06'),
(3971, 9, 31, '', 24, NULL, '2019-03-02 23:58:06', '2019-03-02 23:58:06'),
(3972, 9, 33, '0,1,2,3', 24, NULL, '2019-03-02 23:58:06', '2019-03-02 23:58:06'),
(3973, 9, 37, '', 24, NULL, '2019-03-02 23:58:06', '2019-03-02 23:58:06'),
(3974, 9, 60, '0,1,2,3', 24, NULL, '2019-03-02 23:58:06', '2019-03-02 23:58:06'),
(3975, 2, 2, '', 24, NULL, '2019-03-03 22:34:41', '2019-03-03 22:34:41'),
(3976, 2, 3, '0,1,2,3', 24, NULL, '2019-03-03 22:34:41', '2019-03-03 22:34:41'),
(3977, 2, 4, '0,1,2,3', 24, NULL, '2019-03-03 22:34:41', '2019-03-03 22:34:41'),
(3978, 2, 5, '0,1,2,3', 24, NULL, '2019-03-03 22:34:41', '2019-03-03 22:34:41'),
(3979, 2, 6, '', 24, NULL, '2019-03-03 22:34:41', '2019-03-03 22:34:41'),
(3980, 2, 7, '0,1,2,3', 24, NULL, '2019-03-03 22:34:41', '2019-03-03 22:34:41'),
(3981, 2, 8, '', 24, NULL, '2019-03-03 22:34:41', '2019-03-03 22:34:41'),
(3982, 2, 9, '0,1,2,3', 24, NULL, '2019-03-03 22:34:41', '2019-03-03 22:34:41'),
(3983, 2, 27, '0,1,2,3', 24, NULL, '2019-03-03 22:34:41', '2019-03-03 22:34:41'),
(3984, 2, 39, '0,1,2,3', 24, NULL, '2019-03-03 22:34:41', '2019-03-03 22:34:41'),
(3985, 2, 58, '0,1,2,3', 24, NULL, '2019-03-03 22:34:41', '2019-03-03 22:34:41'),
(3986, 2, 74, '0,1,2,3', 24, NULL, '2019-03-03 22:34:41', '2019-03-03 22:34:41'),
(3987, 2, 10, '', 24, NULL, '2019-03-03 22:34:41', '2019-03-03 22:34:41'),
(3988, 2, 16, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(3989, 2, 17, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(3990, 2, 18, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(3991, 2, 19, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(3992, 2, 20, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(3993, 2, 21, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(3994, 2, 22, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(3995, 2, 28, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(3996, 2, 29, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(3997, 2, 30, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(3998, 2, 40, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(3999, 2, 43, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(4000, 2, 50, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(4001, 2, 51, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(4002, 2, 75, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(4003, 2, 77, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(4004, 2, 25, '', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(4005, 2, 26, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(4006, 2, 38, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(4007, 2, 48, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(4008, 2, 49, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(4009, 2, 59, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(4010, 2, 78, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(4011, 2, 31, '', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(4012, 2, 32, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(4013, 2, 33, '0,1,2,3', 24, NULL, '2019-03-03 22:34:42', '2019-03-03 22:34:42'),
(4014, 2, 34, '', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4015, 2, 35, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4016, 2, 36, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4017, 2, 41, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4018, 2, 42, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4019, 2, 44, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4020, 2, 45, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4021, 2, 46, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4022, 2, 47, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4023, 2, 68, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4024, 2, 69, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4025, 2, 71, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4026, 2, 72, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4027, 2, 37, '', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4028, 2, 24, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4029, 2, 52, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4030, 2, 60, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4031, 2, 73, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4032, 2, 53, '', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4033, 2, 54, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4034, 2, 55, '', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4035, 2, 56, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4036, 2, 57, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4037, 2, 61, '', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4038, 2, 62, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4039, 2, 63, '0,1,2,3', 24, NULL, '2019-03-03 22:34:43', '2019-03-03 22:34:43'),
(4040, 2, 64, '0,1,2,3', 24, NULL, '2019-03-03 22:34:44', '2019-03-03 22:34:44'),
(4041, 2, 65, '0,1,2,3', 24, NULL, '2019-03-03 22:34:44', '2019-03-03 22:34:44'),
(4042, 2, 66, '0,1,2,3', 24, NULL, '2019-03-03 22:34:44', '2019-03-03 22:34:44'),
(4043, 2, 67, '0,1,2,3', 24, NULL, '2019-03-03 22:34:44', '2019-03-03 22:34:44'),
(4044, 2, 70, '0,1,2,3', 24, NULL, '2019-03-03 22:34:44', '2019-03-03 22:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `wings`
--

CREATE TABLE `wings` (
  `id` int(10) UNSIGNED NOT NULL,
  `wings_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wings_type_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wings_type_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` mediumint(9) NOT NULL,
  `updated_by` mediumint(9) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wings`
--

INSERT INTO `wings` (`id`, `wings_type`, `wings_type_bn`, `wings_type_description`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'Wings 1', '', 'Wings 1 Description', 1, '2019-01-25 21:55:01', '2019-01-25 22:05:32', 24, 24, NULL),
(2, 'Wings 2', '', 'Wings 2', 1, '2019-01-25 21:55:59', '2019-01-25 21:55:59', 24, 24, NULL),
(3, 'Wings 3', '', 'Wings 3', 1, '2019-01-25 21:57:16', '2019-01-25 22:09:23', 24, 24, '2019-01-25 22:09:23'),
(4, 'North', 'উত্তর', 'side', 1, '2019-02-26 02:39:42', '2019-02-26 02:41:11', 24, 24, '2019-02-26 02:41:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allocations`
--
ALTER TABLE `allocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allocation_location_details`
--
ALTER TABLE `allocation_location_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approval_history`
--
ALTER TABLE `approval_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `approval_setups`
--
ALTER TABLE `approval_setups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approved_project_comment_details`
--
ALTER TABLE `approved_project_comment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`unapprove_project_id`);

--
-- Indexes for table `approved_project_component_wise_cost`
--
ALTER TABLE `approved_project_component_wise_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approved_project_date_details`
--
ALTER TABLE `approved_project_date_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `approved_project_estimated_cost`
--
ALTER TABLE `approved_project_estimated_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approved_project_finance_types`
--
ALTER TABLE `approved_project_finance_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approved_project_info`
--
ALTER TABLE `approved_project_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `project_code` (`project_code`);

--
-- Indexes for table `approved_project_linkages_and_targets`
--
ALTER TABLE `approved_project_linkages_and_targets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approved_project_locations`
--
ALTER TABLE `approved_project_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`unapprove_project_id`);

--
-- Indexes for table `approved_project_source_details`
--
ALTER TABLE `approved_project_source_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`unapprove_project_id`);

--
-- Indexes for table `approved_project_year_wise_costs`
--
ALTER TABLE `approved_project_year_wise_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachment_details`
--
ALTER TABLE `attachment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budget_heads`
--
ALTER TABLE `budget_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claimate_change_goals`
--
ALTER TABLE `claimate_change_goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `climate_change_targets`
--
ALTER TABLE `climate_change_targets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demands`
--
ALTER TABLE `demands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demands_location_details`
--
ALTER TABLE `demands_location_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demands_status`
--
ALTER TABLE `demands_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demands_status_history`
--
ALTER TABLE `demands_status_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demand_mypip_details`
--
ALTER TABLE `demand_mypip_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demand_project_source_details`
--
ALTER TABLE `demand_project_source_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finance_division_distribution`
--
ALTER TABLE `finance_division_distribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fiscal_years`
--
ALTER TABLE `fiscal_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foreign_aid_budget_dtls`
--
ALTER TABLE `foreign_aid_budget_dtls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foreign_aid_budget_mst`
--
ALTER TABLE `foreign_aid_budget_mst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender_goals`
--
ALTER TABLE `gender_goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender_goal_targets`
--
ALTER TABLE `gender_goal_targets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guidelines`
--
ALTER TABLE `guidelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ministries`
--
ALTER TABLE `ministries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ministry_mapping`
--
ALTER TABLE `ministry_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multiyear_goals`
--
ALTER TABLE `multiyear_goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multiyear_targets`
--
ALTER TABLE `multiyear_targets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pa_sources`
--
ALTER TABLE `pa_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poverty_goals`
--
ALTER TABLE `poverty_goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poverty_targets`
--
ALTER TABLE `poverty_targets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pppgole`
--
ALTER TABLE `pppgole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppptargets`
--
ALTER TABLE `ppptargets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programming_division_distribution_dtls`
--
ALTER TABLE `programming_division_distribution_dtls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programming_division_distribution_msts`
--
ALTER TABLE `programming_division_distribution_msts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_sources`
--
ALTER TABLE `project_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_types`
--
ALTER TABLE `project_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_wise_ceiling_distribution_dtls`
--
ALTER TABLE `project_wise_ceiling_distribution_dtls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_wise_ceiling_distribution_msts`
--
ALTER TABLE `project_wise_ceiling_distribution_msts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `re_allocation`
--
ALTER TABLE `re_allocation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `re_appropriation`
--
ALTER TABLE `re_appropriation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `rmos`
--
ALTER TABLE `rmos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sdgsgole`
--
ALTER TABLE `sdgsgole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sdgstargets`
--
ALTER TABLE `sdgstargets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subsectors`
--
ALTER TABLE `subsectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unapproved_project_comment_details`
--
ALTER TABLE `unapproved_project_comment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unapproved_project_component_details`
--
ALTER TABLE `unapproved_project_component_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unapproved_project_infos`
--
ALTER TABLE `unapproved_project_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unapproved_project_locations`
--
ALTER TABLE `unapproved_project_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unapproved_project_source_details`
--
ALTER TABLE `unapproved_project_source_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unapproved_project_status`
--
ALTER TABLE `unapproved_project_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unapprove_project_linkages_and_targets`
--
ALTER TABLE `unapprove_project_linkages_and_targets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazila_locations`
--
ALTER TABLE `upazila_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usergroups`
--
ALTER TABLE `usergroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_backup`
--
ALTER TABLE `user_backup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_privileges`
--
ALTER TABLE `user_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wings`
--
ALTER TABLE `wings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `allocations`
--
ALTER TABLE `allocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `allocation_location_details`
--
ALTER TABLE `allocation_location_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `approval_history`
--
ALTER TABLE `approval_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `approval_setups`
--
ALTER TABLE `approval_setups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `approved_project_comment_details`
--
ALTER TABLE `approved_project_comment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `approved_project_component_wise_cost`
--
ALTER TABLE `approved_project_component_wise_cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `approved_project_date_details`
--
ALTER TABLE `approved_project_date_details`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `approved_project_estimated_cost`
--
ALTER TABLE `approved_project_estimated_cost`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `approved_project_finance_types`
--
ALTER TABLE `approved_project_finance_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `approved_project_info`
--
ALTER TABLE `approved_project_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `approved_project_linkages_and_targets`
--
ALTER TABLE `approved_project_linkages_and_targets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `approved_project_locations`
--
ALTER TABLE `approved_project_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `approved_project_source_details`
--
ALTER TABLE `approved_project_source_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `approved_project_year_wise_costs`
--
ALTER TABLE `approved_project_year_wise_costs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attachment_details`
--
ALTER TABLE `attachment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `budget_heads`
--
ALTER TABLE `budget_heads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `claimate_change_goals`
--
ALTER TABLE `claimate_change_goals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `climate_change_targets`
--
ALTER TABLE `climate_change_targets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `demands`
--
ALTER TABLE `demands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `demands_location_details`
--
ALTER TABLE `demands_location_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `demands_status`
--
ALTER TABLE `demands_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `demands_status_history`
--
ALTER TABLE `demands_status_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `demand_mypip_details`
--
ALTER TABLE `demand_mypip_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `demand_project_source_details`
--
ALTER TABLE `demand_project_source_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `finance_division_distribution`
--
ALTER TABLE `finance_division_distribution`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fiscal_years`
--
ALTER TABLE `fiscal_years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `foreign_aid_budget_dtls`
--
ALTER TABLE `foreign_aid_budget_dtls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `foreign_aid_budget_mst`
--
ALTER TABLE `foreign_aid_budget_mst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gender_goals`
--
ALTER TABLE `gender_goals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gender_goal_targets`
--
ALTER TABLE `gender_goal_targets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guidelines`
--
ALTER TABLE `guidelines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ministries`
--
ALTER TABLE `ministries`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ministry_mapping`
--
ALTER TABLE `ministry_mapping`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `multiyear_goals`
--
ALTER TABLE `multiyear_goals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `multiyear_targets`
--
ALTER TABLE `multiyear_targets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pa_sources`
--
ALTER TABLE `pa_sources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `poverty_goals`
--
ALTER TABLE `poverty_goals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `poverty_targets`
--
ALTER TABLE `poverty_targets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pppgole`
--
ALTER TABLE `pppgole`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ppptargets`
--
ALTER TABLE `ppptargets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `programming_division_distribution_dtls`
--
ALTER TABLE `programming_division_distribution_dtls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `programming_division_distribution_msts`
--
ALTER TABLE `programming_division_distribution_msts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `project_sources`
--
ALTER TABLE `project_sources`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_types`
--
ALTER TABLE `project_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_wise_ceiling_distribution_dtls`
--
ALTER TABLE `project_wise_ceiling_distribution_dtls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `project_wise_ceiling_distribution_msts`
--
ALTER TABLE `project_wise_ceiling_distribution_msts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `re_allocation`
--
ALTER TABLE `re_allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `re_appropriation`
--
ALTER TABLE `re_appropriation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `rmos`
--
ALTER TABLE `rmos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sdgsgole`
--
ALTER TABLE `sdgsgole`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sdgstargets`
--
ALTER TABLE `sdgstargets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subsectors`
--
ALTER TABLE `subsectors`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `unapproved_project_comment_details`
--
ALTER TABLE `unapproved_project_comment_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT for table `unapproved_project_component_details`
--
ALTER TABLE `unapproved_project_component_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `unapproved_project_infos`
--
ALTER TABLE `unapproved_project_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `unapproved_project_locations`
--
ALTER TABLE `unapproved_project_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `unapproved_project_source_details`
--
ALTER TABLE `unapproved_project_source_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `unapproved_project_status`
--
ALTER TABLE `unapproved_project_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `unapprove_project_linkages_and_targets`
--
ALTER TABLE `unapprove_project_linkages_and_targets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=564;

--
-- AUTO_INCREMENT for table `upazila_locations`
--
ALTER TABLE `upazila_locations`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usergroups`
--
ALTER TABLE `usergroups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user_backup`
--
ALTER TABLE `user_backup`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_privileges`
--
ALTER TABLE `user_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4045;

--
-- AUTO_INCREMENT for table `wings`
--
ALTER TABLE `wings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
