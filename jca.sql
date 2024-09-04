-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2018 at 11:31 AM
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
-- Database: `jca`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `display_order` tinyint(4) NOT NULL,
  `group_id` int(11) UNSIGNED DEFAULT NULL,
  `color` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `name_ar`, `active`, `display_order`, `group_id`, `color`, `created_at`, `updated_at`) VALUES
(1, 'About User', 'حول المستخدم', 1, 1, NULL, 0, '2018-02-22 05:45:43', '2018-03-21 13:07:13'),
(2, 'Product', 'المنتج', 1, 2, NULL, 1, '2018-02-22 10:45:04', '2018-03-21 13:07:29'),
(3, 'Customer Service', 'خدمة الزبائن', 1, 3, NULL, 0, '2018-02-22 10:45:22', '2018-03-21 13:07:48'),
(4, 'Company and Competation', 'الشركة والمنافسة', 1, 4, NULL, 1, '2018-02-22 10:45:41', '2018-03-21 13:08:00'),
(5, 'Your Gift', 'هديتك', 1, 5, NULL, 0, '2018-02-22 10:45:51', '2018-03-21 13:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `percentage` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `start_date`, `end_date`, `percentage`, `created_at`, `updated_at`) VALUES
(10, 'coupon100', '2018-07-08', '2018-07-14', 50, '2018-06-20 14:39:15', '2018-07-07 17:18:16'),
(11, 'TAFLAT', '2018-09-19', '2018-10-31', 100, '2018-09-17 15:04:53', '2018-09-19 07:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) UNSIGNED DEFAULT NULL,
  `is_email` tinyint(1) NOT NULL DEFAULT '0',
  `code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `email`, `mobile`, `group_id`, `is_email`, `code`, `p_status`, `created_at`, `updated_at`) VALUES
(215, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '1530528501uwoJ3', 0, '2018-07-02 19:48:21', '2018-07-02 19:48:21'),
(216, 'Jahanzaib', 'mushtaq', 'moazzam+6598@astutesol.com', '3476793961', 2, 1, '1530528594vlYbJ', 0, '2018-07-02 19:49:54', '2018-09-28 04:29:14'),
(217, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 2, 0, '1530528895N9s59', 0, '2018-07-02 19:54:55', '2018-07-02 19:54:55'),
(218, 'Jahanzaib', 'mushtaq', 'moazzam+6598@astutesol.com', '3476793961', 2, 1, '1530528958MSVaM', 0, '2018-07-02 19:55:58', '2018-10-05 10:17:19'),
(219, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '15305290347DJNg', 0, '2018-07-02 19:57:14', '2018-07-02 19:57:14'),
(220, 'Zaheer', 'Abbas', 'moazzam@astutesol.com', '523276937', 2, 0, '1530534973owOR7', 0, '2018-07-02 21:36:13', '2018-07-02 21:36:13'),
(221, 'jim', 'Glantz', 'jimglantz@yahoo.com', NULL, 2, 1, '15305587063QyaG', 1, '2018-07-03 04:11:46', '2018-07-03 04:11:51'),
(222, 'Wendy', 'Edwards', 'wendy.edwards@atriohp.com', NULL, 2, 1, '1530558784byoSb', 1, '2018-07-03 04:13:04', '2018-07-03 04:13:14'),
(226, 'Michael', 'Margolin', 'michaelm@kravmaga.com', NULL, 3, 1, '1530650623WNSKZ', 1, '2018-07-04 05:43:43', '2018-07-04 05:43:49'),
(227, 'Jami', 'Knight', 'jczop_730@yahoo.com', NULL, 4, 1, '1531253912mNoc4', 1, '2018-07-11 05:18:32', '2018-07-11 05:18:40'),
(228, 'Josh', 'Walter', 'josh@brand-jump.com', NULL, 5, 1, '1531448278rKIO3', 1, '2018-07-13 11:17:58', '2018-07-13 11:18:03'),
(229, 'Melanie', 'Nelson', 'mnelson@brand-jump.com', NULL, 5, 1, '1531471959NhDUl', 1, '2018-07-13 17:52:39', '2018-07-13 17:52:44'),
(230, 'Jeff', 'Skippon', 'management@brand-jump.com', NULL, 5, 1, '15315076615nDTq', 1, '2018-07-14 03:47:41', '2018-07-14 03:47:45'),
(231, 'Joan', 'Custer', 'JOANC@omnicell.com', NULL, 6, 1, '15315206662ADIx', 1, '2018-07-14 07:24:26', '2018-07-14 07:24:31'),
(235, 'Nisha', 'Das', 'nisha.vyas@gmail.com', NULL, 3, 1, '1532894183ZpFkW', 1, '2018-07-30 04:56:23', '2018-07-30 04:56:27'),
(237, 'Steve', 'Hall', 'stevehall187@gmail.com', NULL, 3, 1, '1535875646pBBay', 1, '2018-09-02 17:07:26', '2018-09-02 17:07:30'),
(238, 'Subir K', 'Das', 'subir.das.ca@gmail.com', NULL, 3, 1, '1535918155ddWKY', 1, '2018-09-03 04:55:55', '2018-09-03 04:56:29'),
(239, 'Patricia', 'Meiring', 'padinez@gmail.com', NULL, 3, 1, '1535999674IAjyI', 1, '2018-09-04 03:34:34', '2018-09-04 03:34:53'),
(241, 'Ryan', 'Landry', 'rlandry@nhlearninggroup.com', NULL, 3, 1, '1536034189FFADL', 1, '2018-09-04 13:09:49', '2018-09-04 13:18:44'),
(242, 'Vic', 'Emurian', 'vemurian@nhlearninggroup.com', NULL, 3, 1, '1536034244KjbLp', 1, '2018-09-04 13:10:44', '2018-09-04 13:18:57'),
(243, 'Tony', 'Bhawani', 'abhawani@nhlearninggroup.com', NULL, 3, 1, '1536034289FAPtV', 1, '2018-09-04 13:11:29', '2018-09-04 13:19:11'),
(244, 'Dev', 'Test', 'waqas@astutesol.com', '123', 1, 0, '1536036241cPubI', 0, '2018-09-04 13:44:01', '2018-09-04 13:44:01'),
(245, 'Waqas', 'Zubair', 'waqas@astutesol.com', '123456789', 1, 0, '15371643675eYMk', 0, '2018-09-17 15:06:07', '2018-09-17 15:06:07'),
(246, 'Waqas', 'Testing', 'waqas@astutesol.com', '1234567789', 1, 0, '1537260515FkCkG', 0, '2018-09-18 11:48:35', '2018-09-18 11:48:35'),
(247, 'Astute QA', 'Testing', 'atif@astutesol.com', NULL, 1, 0, '1537261929nb1Z0', 0, '2018-09-18 12:12:09', '2018-09-18 12:12:09'),
(248, 'Jim', 'Glantz', 'thedarklingthrush@hotmail.com', '3109888727', 3, 1, '1537305345X5CdH', 1, '2018-09-19 00:15:45', '2018-09-19 00:15:51'),
(249, 'Kevin', 'Walsh', 'changemeister@earthlink.net', NULL, 3, 1, '15373059557KVBU', 1, '2018-09-19 00:25:55', '2018-09-19 00:26:08'),
(250, 'Paul', 'Powell', 'paul@taflat.com', '3054345861', 1, 0, '1537386984D9RbK', 0, '2018-09-19 22:56:24', '2018-09-19 22:56:24'),
(251, 'Dawna', 'Oksen', 'dawnao@cascadecomp.com', NULL, 7, 1, '1538082838HgPOU', 1, '2018-09-28 00:13:58', '2018-09-28 00:17:07'),
(253, 'Jalees', 'Abid', 'moazzam+111@astutesol.com', '+971523276937', 1, 0, '1538198595PtAxU', 0, '2018-09-29 03:23:15', '2018-09-29 03:23:15'),
(254, 'Moazzam', 'Mushtaq', 'webdevelopers687@gmail.com', '03476793961', 1, 0, '1538199150aiNKk', 0, '2018-09-29 03:32:30', '2018-09-29 03:32:30'),
(255, 'Moazzam', 'Mushtaq', 'webdevelopers687@gmail.com', '03476793961', 1, 0, '15381999790TjNF', 0, '2018-09-29 03:46:19', '2018-09-29 03:46:19'),
(256, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', NULL, 1, 0, '1538237939zH5Sm', 0, '2018-09-29 14:18:59', '2018-09-29 14:18:59'),
(257, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', NULL, 1, 0, '1538237953OVdCg', 0, '2018-09-29 14:19:13', '2018-09-29 14:19:13'),
(258, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', NULL, 1, 0, '15382379834ITPk', 0, '2018-09-29 14:19:43', '2018-09-29 14:19:43'),
(259, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', NULL, 1, 0, '1538238054ayvwQ', 0, '2018-09-29 14:20:54', '2018-09-29 14:20:54'),
(260, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', NULL, 1, 0, '1538238104xkPP7', 0, '2018-09-29 14:21:44', '2018-09-29 14:21:44'),
(261, 'Moazzam', 'Mushtaq', 'webdevelopers687@gmail.com', '3476793961', 1, 0, '1538238401qqbmq', 0, '2018-09-29 14:26:41', '2018-09-29 14:26:41'),
(262, 'Moazzam', 'Mushtaq', 'webdevelopers687@gmail.com', '3476793961', 1, 0, '15382384899L4Ht', 0, '2018-09-29 14:28:09', '2018-09-29 14:28:09'),
(263, 'Moazzam', 'Mushtaq', 'webdevelopers687@gmail.com', '3476793961', 1, 0, '1538238515h8xAj', 0, '2018-09-29 14:28:35', '2018-09-29 14:28:35'),
(264, 'Moazzam', 'Mushtaq', 'webdevelopers687@gmail.com', '03476793961', 1, 0, '1538238694DXySo', 0, '2018-09-29 14:31:34', '2018-09-29 14:31:34'),
(265, 'Moazzam', 'Mushtaq', 'webdevelopers687@gmail.com', '3476793961', 1, 0, '1538239621lrGzh', 0, '2018-09-29 14:47:01', '2018-09-29 14:47:01'),
(266, 'Moazzam', 'Mushtaq', 'webdevelopers687@gmail.com', '3476793961', 1, 0, '1538240719JMCj0', 0, '2018-09-29 15:05:19', '2018-09-29 15:05:19'),
(267, 'Moazzam', 'Mushtaq', 'webdevelopers687@gmail.com', '3476793961', 1, 0, '1538241121TKeFB', 0, '2018-09-29 15:12:01', '2018-09-29 15:12:01'),
(268, 'Moazzam', 'Mushtaq', 'webdevelopers687@gmail.com', '3476793961', 1, 0, '1538241255aiokR', 0, '2018-09-29 15:14:15', '2018-09-29 15:14:15'),
(269, 'Moazzam', 'Mushtaq', 'webdevelopers687@gmail.com', '3476793961', 1, 0, '15382417503lUUk', 0, '2018-09-29 15:22:30', '2018-09-29 15:22:30'),
(270, 'Moazzam', 'Mushtaq', 'webdevelopers687@gmail.com', '3476793961', 1, 0, '1538241821XQKni', 0, '2018-09-29 15:23:41', '2018-09-29 15:23:41'),
(271, 'Moazzam', 'Mushtaq', 'webdevelopers687@gmail.com', '3476793961', 1, 0, '1538241922qgJEf', 0, '2018-09-29 15:25:22', '2018-09-29 15:25:22'),
(272, 'Moazzam', 'Mushtaq', 'webdevelopers687@gmail.com', '3476793961', 1, 0, '1538241952L6N7d', 0, '2018-09-29 15:25:52', '2018-09-29 15:25:52'),
(273, 'Moazzam', 'Mushtaq', 'webdevelopers687@gmail.com', '3476793961', 1, 0, '1538242010VFIYi', 0, '2018-09-29 15:26:50', '2018-09-29 15:26:50'),
(274, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', NULL, 1, 0, '153830386742rsu', 0, '2018-09-30 08:37:47', '2018-09-30 08:37:47'),
(275, 'Zeeshan', 'Khalid', 'moazzam+11111@astutesol.com', '523276937', 1, 0, '1538650748K40H3', 0, '2018-10-04 08:59:08', '2018-10-04 08:59:08'),
(276, 'Dev', 'Test', 'moazzam@astutesol.com', '523276937', 1, 0, '1538652218hQhoi', 0, '2018-10-04 09:23:38', '2018-10-04 09:23:38'),
(277, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '1538655335hY9MI', 0, '2018-10-04 10:15:35', '2018-10-04 10:15:35'),
(278, 'Moazzam', 'Mushtaq', 'usman@astutesol.com', '523276937', 1, 0, '1538655538PWlgf', 0, '2018-10-04 10:18:58', '2018-10-04 10:18:58'),
(279, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '1538655631Vr7ZX', 0, '2018-10-04 10:20:31', '2018-10-04 10:20:31'),
(280, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '15386558136I766', 0, '2018-10-04 10:23:33', '2018-10-04 10:23:33'),
(281, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '1538656181pI3Gs', 0, '2018-10-04 10:29:41', '2018-10-04 10:29:41'),
(282, 'Ramzan', 'Khan', 'moazzam+698@astutesol.com', '523276937', 1, 0, '1538656309XEywL', 0, '2018-10-04 10:31:49', '2018-10-04 10:31:49'),
(283, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '1538656454jVRzW', 0, '2018-10-04 10:34:14', '2018-10-04 10:34:14'),
(284, 'Jahanzaib', 'mushtaq', 'moazzam+6598@astutesol.com', '3476793961', 1, 0, '1538656795zUSjq', 0, '2018-10-04 10:39:55', '2018-10-04 10:39:55'),
(285, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '1538656946RH6yE', 0, '2018-10-04 10:42:26', '2018-10-04 10:42:26'),
(286, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '1538657055bIz60', 0, '2018-10-04 10:44:15', '2018-10-04 10:44:15'),
(287, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '1538657349vJKqQ', 0, '2018-10-04 10:49:09', '2018-10-04 10:49:09'),
(288, 'Zeeshan', 'Khalid', 'moazzam+11111@astutesol.com', '523276937', 1, 0, '1538657482DFOo6', 0, '2018-10-04 10:51:22', '2018-10-04 10:51:22'),
(289, 'Moazzam', 'Mushtaq', 'webdevelopers687@gmail.com', '3476793961', 1, 0, '1538657554mjBZ3', 0, '2018-10-04 10:52:34', '2018-10-04 10:52:34'),
(290, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '1538658267ES5uP', 0, '2018-10-04 11:04:27', '2018-10-04 11:04:27'),
(291, 'Jalees', 'Abid', 'moazzam+111@astutesol.com', '523276937', 1, 0, '1538658448q2D0b', 0, '2018-10-04 11:07:28', '2018-10-04 11:07:28'),
(292, 'Jalees', 'Abid', 'moazzam+111@astutesol.com', '523276937', 1, 0, '1538658546vnO1q', 0, '2018-10-04 11:09:06', '2018-10-04 11:09:06'),
(293, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '1538658693Htpuh', 0, '2018-10-04 11:11:33', '2018-10-04 11:11:33'),
(294, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '1538658802euog3', 0, '2018-10-04 11:13:22', '2018-10-04 11:13:22'),
(295, 'Moazzam', 'Mushtaq', 'webdevelopers687@gmail.com', '3476793961', 1, 0, '1538722022iIpBO', 0, '2018-10-05 04:47:02', '2018-10-05 04:47:02'),
(296, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '1538724979jI1gQ', 0, '2018-10-05 05:36:19', '2018-10-05 05:36:19'),
(297, 'Ali', 'Raza', 'moazzam+6598@astutesol.com', '3476793961', 1, 0, '1538725731fPyAU', 0, '2018-10-05 05:48:51', '2018-10-05 05:48:51'),
(298, 'zaeen', 'Qadri', 'moazzam+999@astutesol.com', '523276937', 1, 0, '1538733997zuszW', 0, '2018-10-05 08:06:37', '2018-10-05 08:06:37'),
(299, 'Ali', 'Raza', 'moazzam+11111@astutesol.com', '523276937', 1, 0, '1538734826jymRw', 0, '2018-10-05 08:20:26', '2018-10-05 08:20:26'),
(300, 'Atif', 'Ali', 'moazzam@astutesol.com', '523276937', 1, 0, '1538736558yivdh', 0, '2018-10-05 08:49:18', '2018-10-05 08:49:18'),
(301, 'Ali', 'Raza', 'moazzam@astutesol.com', '523276937', 1, 0, '1538736717h1tJX', 0, '2018-10-05 08:51:57', '2018-10-05 08:51:57'),
(302, 'Yousaf', 'Ilyas', 'moazzam+6598@astutesol.com', '3476793961', 1, 0, '1538737113wFQg6', 0, '2018-10-05 08:58:33', '2018-10-05 08:58:33'),
(303, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '15387374322UMPB', 0, '2018-10-05 09:03:52', '2018-10-05 09:03:52'),
(304, 'Yousaf', 'Ilyas', 'moazzam@astutesol.com', '523276937', 1, 0, '1538737680zAiHP', 0, '2018-10-05 09:08:00', '2018-10-05 09:08:00'),
(305, 'Moazzam', 'Mushtaq', 'webdevelopers687@gmail.com', '3476793961', 1, 0, '1538738345n3on3', 0, '2018-10-05 09:19:05', '2018-10-05 09:19:05'),
(306, 'Jahanzaib', 'mushtaq', 'moazzam+698@astutesol.com', '3476793961', 1, 0, '1538738483X8D7j', 0, '2018-10-05 09:21:23', '2018-10-05 09:21:23'),
(307, 'Jalees', 'Abid', 'moazzam+111@astutesol.com', '523276937', 1, 0, '1538738589Lf1Dq', 0, '2018-10-05 09:23:09', '2018-10-05 09:23:09'),
(308, 'Moazzam', 'Mushtaq', 'usman@astutesol.com', '523276937', 1, 0, '1538741107ipajf', 0, '2018-10-05 10:05:07', '2018-10-05 10:05:07'),
(309, 'Jahanzaib', 'mushtaq', 'moazzam@astutesol.com', '3476793961', 1, 0, '1538741390JUJcz', 0, '2018-10-05 10:09:50', '2018-10-05 10:09:50'),
(310, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '1538741485x7M6y', 0, '2018-10-05 10:11:25', '2018-10-05 10:11:25'),
(311, 'Moazzam', 'Mushtaq', 'moazzam+99@astutesol.com', '523276937', 2, 1, '1538741936cpO2J', 1, '2018-10-05 10:18:56', '2018-10-05 10:19:00'),
(312, 'Waqas', 'Zubair', 'waqas@astutesol.com', NULL, 1, 0, '1538745138z3IQC', 0, '2018-10-05 11:12:18', '2018-10-05 11:12:18'),
(313, 'Moazzam', 'Mushtaq', 'moazzam+11111@astutesol.com', '3476793961', 1, 0, '1538996123VxMdk', 0, '2018-10-08 08:55:23', '2018-10-08 08:55:23'),
(314, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '1538996537KnEM4', 0, '2018-10-08 09:02:17', '2018-10-08 09:02:17'),
(315, 'Zeeshan', 'Khalid', 'moazzam+11111@astutesol.com', '523276937', 1, 0, '1538996727ss2s5', 0, '2018-10-08 09:05:27', '2018-10-08 09:05:27'),
(316, 'Zeeshan', 'Khalid', 'moazzam+11111@astutesol.com', '523276937', 1, 0, '1538996896ifcNb', 0, '2018-10-08 09:08:16', '2018-10-08 09:08:16'),
(317, 'Zeeshan', 'Mushtaq', 'moazzam+6598@astutesol.com', '523276937', 1, 0, '1538997113OGawR', 0, '2018-10-08 09:11:53', '2018-10-08 09:11:53'),
(318, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '1538999646ZIqlf', 0, '2018-10-08 09:54:06', '2018-10-08 09:54:06'),
(319, 'Moazzam', 'Mushtaq', 'moazzam+698@astutesol.com', '523276937', 1, 0, '1539006765Qjzub', 0, '2018-10-08 11:52:45', '2018-10-08 11:52:45'),
(320, 'Moazzam', 'Mushtaq', 'moazzam+999@astutesol.com', '523276937', 1, 0, '1539063325BIOon', 0, '2018-10-09 03:35:25', '2018-10-09 03:35:25'),
(321, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '153914793353mbG', 0, '2018-10-10 03:05:33', '2018-10-10 03:05:33'),
(322, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '1539148100ayyyq', 0, '2018-10-10 03:08:20', '2018-10-10 03:08:20'),
(323, 'Ali', 'Raza', 'moazzam+99@astutesol.com', '523276937', 1, 0, '1539152840OIUnZ', 0, '2018-10-10 04:27:20', '2018-10-10 04:27:20'),
(324, 'Ali', 'Raza', 'moazzam+99@astutesol.com', '523276937', 1, 0, '1539152881M2GPe', 0, '2018-10-10 04:28:01', '2018-10-10 04:28:01'),
(325, 'Ali', 'Raza', 'moazzam+99@astutesol.com', '523276937', 1, 0, '1539152920YXvoP', 0, '2018-10-10 04:28:40', '2018-10-10 04:28:40'),
(326, 'Ali', 'Raza', 'moazzam+99@astutesol.com', '523276937', 1, 0, '1539153141sKDzz', 0, '2018-10-10 04:32:21', '2018-10-10 04:32:21'),
(327, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '15391538231yPLj', 0, '2018-10-10 04:43:43', '2018-10-10 04:43:43'),
(328, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 1, 0, '1539156144cHqZi', 0, '2018-10-10 05:22:24', '2018-10-10 05:22:24'),
(329, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 2, 0, '1539156332ALHm3', 0, '2018-10-10 05:25:32', '2018-10-10 05:25:32'),
(330, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 2, 0, '15391565420rJg5', 0, '2018-10-10 05:29:02', '2018-10-10 05:29:02'),
(331, 'Jahanzaib', 'mushtaq', 'usman@astutesol.com', '3476793961', 1, 0, '1539156698QEOKS', 0, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(332, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 2, 0, '1539156764fTh0V', 0, '2018-10-10 05:32:44', '2018-10-10 05:32:44'),
(333, 'Moazzam', 'Mushtaq', 'moazzam@astutesol.com', '523276937', 2, 0, '153915863183Q4Q', 0, '2018-10-10 06:03:51', '2018-10-10 06:03:51'),
(335, 'Moazzam', 'Mushtaq', 'test@test.com', NULL, 4, 0, '1539238887dhDmwqK82D', 1, '2018-10-11 04:21:27', '2018-10-11 04:21:27'),
(336, 'Tayo', 'Akins', 'TayoA@cascadecomp.com', NULL, 4, 0, '1539238996c0mZhnwljX', 1, '2018-10-11 04:23:16', '2018-10-11 04:23:16'),
(337, 'Denise', 'Alves', 'DeniseA@cascadecomp.com', NULL, 4, 0, '1539238996ISwbrkwmWY', 1, '2018-10-11 04:23:16', '2018-10-11 04:23:16'),
(338, 'Teri', 'Arguello', 'TeriA@cascadecomp.com', NULL, 4, 0, '1539238996wvprUTDlu5', 1, '2018-10-11 04:23:16', '2018-10-11 04:23:16'),
(339, 'Diana', 'Avila', 'DianaA@cascadecomp.com', NULL, 4, 0, '1539238996eRxyXZplRO', 1, '2018-10-11 04:23:16', '2018-10-11 04:23:16'),
(340, 'Gwen', 'Berven', 'GwenB@cascadecomp.com', NULL, 4, 0, '15392389968qLlq5FY5V', 1, '2018-10-11 04:23:16', '2018-10-11 04:23:16'),
(341, 'Susan', 'Boldt', 'SusanB@cascadecomp.com', NULL, 4, 0, '1539238997QcNNH1HGsX', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(342, 'Brenda', 'Brazille', 'BrendaB@cascadecomp.com', NULL, 4, 0, '15392389970wVdVHko05', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(343, 'Kerri', 'Burke', 'KerriB@cascadecomp.com', NULL, 4, 0, '1539238997iwMCnLssD5', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(344, 'Rosa', 'Burkhart', 'RosaB@cascadecomp.com', NULL, 4, 0, '1539238997HgdZEIdS5s', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(345, 'Kaci', 'Castle', 'KaciC@cascadecomp.com', NULL, 4, 0, '1539238997QvIE8L2cnd', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(346, 'Karen', 'Cole', 'KarenC@cascadecomp.com', NULL, 4, 0, '1539238997nCMJUjcPGN', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(347, 'Rebecca', 'Derra', 'BeckyD@cascadecomp.com', NULL, 4, 0, '1539238997r9sO0sW254', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(348, 'Lila', 'Dickinson', 'LilaD@cascadecomp.com', NULL, 4, 0, '1539238997SjuxbVcvqd', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(349, 'Michael', 'Donarski', 'MichaelD@cascadecomp.com', NULL, 4, 0, '1539238997v9DxiZOjIQ', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(350, 'Donna', 'Emley-Blackmore', 'DonnaB@cascadecomp.com', NULL, 4, 0, '15392389971khZUBdvhH', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(351, 'Elizabeth', 'Evoniuk', 'ElizabethE@cascadecomp.com', NULL, 4, 0, '1539238997sP6ttLxJ6w', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(352, 'Annette', 'Fowler', 'AnnetteF@cascadecomp.com', NULL, 4, 0, '1539238997pKcncfpxn0', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(353, 'Tonya', 'Fuell', 'TonyaF@cascadecomp.com', NULL, 4, 0, '1539238997C7xQoL8lua', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(354, 'April', 'Gwynn', 'AprilG@cascadecomp.com', NULL, 4, 0, '1539238997VLYvD8K3aB', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(355, 'Balinda', 'Hall', 'BalindaH@cascadecomp.com', NULL, 4, 0, '1539238997Vr1W97LShi', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(356, 'Amanda', 'Hascall', 'AmandaH@cascadecomp.com', NULL, 4, 0, '15392389973dDTMoCPIs', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(357, 'Wendy', 'Hoskins', 'WendyH@cascadecomp.com', NULL, 4, 0, '1539238997LUfAvr9ZSY', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(358, 'Paul', 'Hudson', 'PaulH@cascadecomp.com', NULL, 4, 0, '1539238997STG1GCSLlr', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(359, 'Rhonda', 'Janecke', 'RhondaJ@cascadecomp.com', NULL, 4, 0, '15392389979WlP4jQC0z', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(360, 'Betty', 'Key', 'BettyK@cascadecomp.com', NULL, 4, 0, '1539238997GIR8P7xhIg', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(361, 'Trevor', 'Lundsten', 'TrevorL@cascadecomp.com', NULL, 4, 0, '1539238997pBZe0mX0la', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(362, 'Melissa', 'Mata', 'MelissaM@cascadecomp.com', NULL, 4, 0, '1539238997chQGBqeZlT', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(363, 'Shelly', 'Morton', 'ShellyM@cascadecomp.com', NULL, 4, 0, '1539238997G6me7ZF5a9', 1, '2018-10-11 04:23:17', '2018-10-11 04:23:17'),
(364, 'Dawna', 'Oksen', 'DawnaO@cascadecomp.com', NULL, 4, 0, '1539238998U4bbUTHIsm', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(365, 'Patricia', 'Pahl', 'PatriciaP@cascadecomp.com', NULL, 4, 0, '1539238998OOwfdSFtb4', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(366, 'Maggie', 'Polson', 'MaggieP@cascadecomp.com', NULL, 4, 0, '1539238998NksLd6HRvK', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(367, 'Kara', 'Pond', 'KaraP@cascadecomp.com', NULL, 4, 0, '1539238998VqVRFP8peP', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(368, 'Donna', 'Rhoades', 'DonnaR@cascadecomp.com', NULL, 4, 0, '1539238998LWezwaMu7i', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(369, 'Denise', 'Ringe', 'DeniseR@cascadecomp.com', NULL, 4, 0, '15392389989wKoPKQORQ', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(370, 'Denise', 'Rising', 'DeniseJR@cascadecomp.com', NULL, 4, 0, '1539238998h8blBgYBfn', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(371, 'Keoni', 'Roberts', 'KeoniR@cascadecomp.com', NULL, 4, 0, '1539238998SZqokMp6Gu', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(372, 'Leanne', 'Rose', 'LeanneR@cascadecomp.com', NULL, 4, 0, '1539238998CzDNjxeepz', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(373, 'Josette', 'Ryder', 'JosetteR@cascadecomp.com', NULL, 4, 0, '1539238998q7su9CHL8v', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(374, 'Michelle', 'Severns', 'MichelleS@cascadecomp.com', NULL, 4, 0, '1539238998woGOEivbFX', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(375, 'Biagio', 'Sguera', 'BiagioS@cascadecomp.com', NULL, 4, 0, '1539238998fgVD70UdFJ', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(376, 'David', 'Shute', 'DavidS@cascadecomp.com', NULL, 4, 0, '1539238998YeTpGxJBgv', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(377, 'Robyn', 'Silva', 'RobynS@cascadecomp.com', NULL, 4, 0, '1539238998aUuf68bSfm', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(378, 'Tamela', 'Smith', 'TamelaS@cascadecomp.com', NULL, 4, 0, '1539238998naXeQgccsJ', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(379, 'Susie', 'Snider', 'SusieS@cascadecomp.com', NULL, 4, 0, '1539238998rbTyiB9idp', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(380, 'Teri', 'Starbuck', 'TeriS@cascadecomp.com', NULL, 4, 0, '1539238998AN1Enw9D3V', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(381, 'Amin', 'Surani', 'AminS@cascadecomp.com', NULL, 4, 0, '1539238998n2qRt5z2P5', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(382, 'Kelli', 'Tompkins', 'KelliT@cascadecomp.com', NULL, 4, 0, '1539238998Qpt27Kbj2w', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(383, 'Cord', 'VanRiper', 'CordV@cascadecomp.com', NULL, 4, 0, '1539238998AWfs37S8Le', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(384, 'Kimberly', 'Walls', 'KimW@cascadecomp.com', NULL, 4, 0, '1539238998mJnAtOLg4o', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(385, 'Marianne', 'Yong', 'MarianneY@cascadecomp.com', NULL, 4, 0, '1539238998pfwA5JrtyM', 1, '2018-10-11 04:23:18', '2018-10-11 04:23:18'),
(386, 'Jahanzaib', 'mushtaq', 'moazzam+698@astutesol.com', '3476793961', 1, 0, '1539256306QmpEr', 0, '2018-10-11 09:11:46', '2018-10-11 09:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `friend_assessment`
--

CREATE TABLE `friend_assessment` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `is_submit` tinyint(1) DEFAULT '0',
  `survey_submission_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_assessment`
--

INSERT INTO `friend_assessment` (`id`, `name`, `email`, `is_submit`, `survey_submission_id`, `created_at`, `updated_at`) VALUES
(60, 'Moazzam Mushtaq', 'moazzam@astutesol.com', 1, 300, '2018-10-10 04:32:22', '2018-10-10 04:37:38'),
(61, 'waqas', 'waqas@astutesol.com', 1, 300, '2018-10-10 04:32:22', '2018-10-10 04:41:06'),
(62, 'Moazzam Mushtaq', 'moazzam@astutesol.com', 1, 304, '2018-10-10 04:43:44', '2018-10-10 04:46:04'),
(63, 'waqas', 'waqas@astutesol.com', 1, 304, '2018-10-10 04:43:44', '2018-10-10 05:19:26'),
(64, 'Moazzam Mushtaq', 'moazzam@astutesol.com', 0, 318, '2018-10-10 05:22:25', '2018-10-10 05:22:25'),
(65, 'waqas', 'waqas@astutesol.com', 0, 318, '2018-10-10 05:22:25', '2018-10-10 05:22:25'),
(66, 'Moazzam Mushtaq', 'moazzam@astutesol.com', 0, 319, '2018-10-10 05:25:33', '2018-10-10 05:25:33'),
(67, 'waqas', 'waqas@astutesol.com', 0, 319, '2018-10-10 05:25:33', '2018-10-10 05:25:33'),
(68, 'Moazzam Mushtaq', 'moazzam@astutesol.com', 0, 320, '2018-10-10 05:29:03', '2018-10-10 05:29:03'),
(69, 'waqas', 'waqas@astutesol.com', 0, 320, '2018-10-10 05:29:03', '2018-10-10 05:29:03'),
(70, 'Moazzam Mushtaq', 'moazzam@astutesol.com', 1, 322, '2018-10-10 05:32:45', '2018-10-10 05:37:41'),
(71, 'waqas', 'waqas@astutesol.com', 0, 322, '2018-10-10 05:32:45', '2018-10-10 05:32:45'),
(72, 'Moazzam Mushtaq', 'moazzam@astutesol.com', 1, 324, '2018-10-10 06:03:52', '2018-10-10 07:07:57'),
(73, 'waqas', 'waqas@astutesol.com', 1, 324, '2018-10-10 06:03:52', '2018-10-10 07:11:33'),
(74, 'Friend Name', 'moazzam@astutesol.com', 1, 330, '2018-10-11 09:11:48', '2018-10-11 09:13:22'),
(75, 'Waqas Ali', 'waqas@astutesol.com', 0, 330, '2018-10-11 09:11:48', '2018-10-11 09:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `general_setting`
--

CREATE TABLE `general_setting` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `logo` varchar(30) DEFAULT NULL,
  `logo_url` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `favicon` varchar(30) DEFAULT NULL,
  `question_color` varchar(30) DEFAULT NULL,
  `answer_color` varchar(30) DEFAULT NULL,
  `survey_price` decimal(10,2) DEFAULT NULL,
  `friend_assessment_price` decimal(11,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_setting`
--

INSERT INTO `general_setting` (`id`, `title`, `description`, `logo`, `logo_url`, `keywords`, `favicon`, `question_color`, `answer_color`, `survey_price`, `friend_assessment_price`, `created_at`, `updated_at`) VALUES
(1, 'The Academy For Leadership And Training', 'Academy of leadership (Jim - Communication Assessment Project)', 'logo.png', 'http://academyforleadershipandtraining.com/assessment', 'Academy of leadership (Jim - Communication Assessment Project)', 'favicon.png', '#92c980', '#d86565', '15.00', '5.00', '2018-04-04 07:16:42', '2018-10-01 05:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `coupon` varchar(50) DEFAULT NULL,
  `limit` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `coupon`, `limit`, `created_at`, `updated_at`) VALUES
(1, 'Individuals', NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(2, 'Astutesol', '1657899879', 15, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(3, 'Jim\'s Company', NULL, 100, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(4, 'BodyBio', NULL, 100, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(5, 'BrandJump', NULL, 100, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(6, 'Omnicell', NULL, 100, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(7, 'Cascade Comprehensive', NULL, 100, '2018-09-28 00:12:16', '2018-09-28 00:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(1, 1, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ' ',
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ' ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(21, 'ahmad@astutesol.com', '$2y$10$IM4ZQ3l1N7sVyQYrhnw9qOxdEpFf/rIAEjX1JUVNOpemzm6.4mZoK', '2018-01-01 05:33:26', NULL),
(40, 'yousaf@astutesol.com', '$2y$10$1vlB4ImNafHR.FGedaGKU.Gl3rdfmPb815MRWHlJHEyPMD6ksbYau', '2018-01-17 04:50:24', NULL),
(43, 'admin@admin.com', '$2y$10$1.Zs1yA2d/nyVebd8KcxkeuIox6mY/rVBRREPiQAXR6eGzPd7oV6O', '2018-06-12 13:19:26', NULL),
(48, 'jim@taflat.com', '$2y$10$YPm10sLkh1f76vEi8dmEj..Bz0.05NVO.zGxuCCUvNEmPoV1C3.Wu', '2018-08-03 14:39:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(10, 'survey create', 'web', '2018-02-21 10:17:42', '2018-02-21 10:17:42'),
(11, 'survey update', 'web', '2018-02-21 10:18:01', '2018-02-21 10:18:01'),
(12, 'survey delete', 'web', '2018-02-21 10:18:10', '2018-02-21 10:18:10'),
(13, 'survey view', 'web', '2018-02-21 10:18:28', '2018-02-21 10:18:28'),
(14, 'category create', 'web', '2018-02-21 10:18:56', '2018-02-21 10:18:56'),
(15, 'category update', 'web', '2018-02-21 10:19:05', '2018-02-21 10:19:05'),
(16, 'category delete', 'web', '2018-02-21 10:19:12', '2018-02-21 10:19:12'),
(17, 'category view', 'web', '2018-02-21 10:19:19', '2018-02-21 10:19:19'),
(18, 'role create', 'web', '2018-02-21 10:19:37', '2018-02-21 10:19:37'),
(19, 'role update', 'web', '2018-02-21 10:19:52', '2018-02-21 10:19:52'),
(20, 'role delete', 'web', '2018-02-21 10:20:01', '2018-02-21 10:20:01'),
(21, 'role view', 'web', '2018-02-21 10:20:08', '2018-02-21 10:20:08'),
(22, 'user create', 'web', '2018-02-21 10:20:15', '2018-02-21 10:20:15'),
(23, 'user update', 'web', '2018-02-21 10:20:21', '2018-02-21 10:20:21'),
(24, 'user delete', 'web', '2018-02-21 10:20:27', '2018-02-21 10:20:27'),
(25, 'user view', 'web', '2018-02-21 10:20:33', '2018-02-21 10:20:33'),
(26, 'survey submissions', 'web', '2018-03-02 03:55:02', '2018-03-02 03:55:02'),
(27, 'survey excel report', 'web', '2018-03-02 03:58:41', '2018-03-02 03:58:41'),
(28, 'survey copy', 'web', '2018-03-21 12:19:44', '2018-03-21 12:19:44'),
(29, 'survey sorting', 'web', '2018-03-22 10:53:07', '2018-03-22 10:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'web', NULL, '2018-03-27 21:00:00', '2018-03-27 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) UNSIGNED NOT NULL,
  `behavior` varchar(100) DEFAULT NULL,
  `h` varchar(1) DEFAULT NULL,
  `v` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `behavior`, `h`, `v`) VALUES
(1, 'Analytical', '-', '+'),
(2, 'Driver', '+', '+'),
(3, 'Amiable', '-', '-'),
(4, 'Expressive', '+', '-');

-- --------------------------------------------------------

--
-- Table structure for table `smtp_setting`
--

CREATE TABLE `smtp_setting` (
  `id` int(11) NOT NULL,
  `driver` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `host` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `port` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `smtp_setting`
--

INSERT INTO `smtp_setting` (`id`, `driver`, `host`, `type`, `port`, `username`, `password`, `from_address`, `from_name`, `email`) VALUES
(1, 'sendmail', 'smtp.gmail.com', 'ssl', '465', 'moazzam@astutesol.com', 'ahmadsharjeel786_', 'moazzam@astutesol.com', 'Academy of leadership (Jim - Communication Assessment Project)', 'moazzam@astutesol.com');

-- --------------------------------------------------------

--
-- Table structure for table `sub_quadrant`
--

CREATE TABLE `sub_quadrant` (
  `id` int(11) NOT NULL,
  `score_id` int(11) UNSIGNED DEFAULT NULL,
  `behavior` varchar(2) DEFAULT NULL,
  `file` varchar(30) DEFAULT NULL,
  `h` varchar(20) DEFAULT NULL,
  `v` varchar(20) DEFAULT NULL,
  `p_content` text,
  `s_content` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_quadrant`
--

INSERT INTO `sub_quadrant` (`id`, `score_id`, `behavior`, `file`, `h`, `v`, `p_content`, `s_content`) VALUES
(1, 1, 'AN', NULL, '-6,-7,-8,-9', '+6,+7,+8,+9', '<div class=\"sec-m-heading\">Describing Your Style - Analytical </div>\r\n					\r\n					<div class=\"form-des\">\r\n						<h4><small>TURBO</small>-ANALYTICAL</h4>\r\n						<h4>ANALYTICAL</h4>\r\n						<p>\r\n							<span class=\"sub-heading\">DESCRIPTION: </span> Your primary and secondary Communication Styles are Analytical. The Analytical Style can be characterized as having an emphasis on process and accuracy. With “Analyticals”, the key objective at work is to create high quality products and services. The Analytical Style tends to be comfortable working independently, and often prefer a slower, steadier, and somewhat methodical pace, to make sure things are done right the first time. \r\n						</p>						\r\n						<p>\r\n							<span class=\"sub-heading\">COMFORT LEVEL: </span> You may find the most comfort in a work environment that affords the space to think, plan, and create reproducible, accurate processes. Unlike some colleagues, you may prefer to receive all of the facts up-front, and you display a comfort with detailed, supporting documentation for those facts. \r\n						</p>\r\n						<p>\r\n							<span class=\"sub-heading\">STRESS: </span> Analyticals may find stress in unpredictability, and changing conditions. When confronted with such conditions, you may run the risk of appearing shut-down, or withdraw. In fact, during these moments, you may appear resistant to change, or that you are slowing down the team. \r\n						</p>\r\n						<p>\r\n							<span class=\"sub-heading\">COACH’S CORNER: </span> As a turbo-Analytical, during meetings you may find that you’re keenly focused on both the TASKS at hand, and on the process to complete those tasks. It is likely that you would prefer the conversation to remain on facts, supporting documentation, and processes. Further, without highly accurate data, you might have a difficult time making decisions, or even supporting the team’s decisions. In some instances, your instinct to refrain from decision-making actually may be helpful for the team. However, you may wish to remember that your threshold for accuracy before decisions can be made will be much higher than the team’s needs.  \r\n						</p>\r\n						\r\n						<p>\r\n							To provide transparency, and to avoid the perception of being resistant to change, you may want to proactively communicate to your team members that your objective is to clarify all of the necessary facts that are needed to lead the team to the best outcome. Communicating your desire for accuracy and for the creation of an excellent decision-making process to move forward should lead the team to view that input as valuable. However, you may need to exercise flexibility, as the team may prefer to move forward without all of the facts.  \r\n						\r\n						</p>\r\n					</div>', NULL),
(2, 1, 'DR', NULL, '-1,-2,-3,-4', '+6,+7,+8,+9', '<div class=\"sec-m-heading\">Describing Your Style - Analytical</div>\r\n<div class=\"form-des\">\r\n<h4><small>DRIVER</small>-ANALYTICAL</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION: </span> Your primary Communication Style is Analytical. The Analytical Style can be characterized as having an emphasis on process and accuracy. With &ldquo;Analyticals&rdquo;, the key objective at work is to create high quality products and services. The Analytical Style tends to be comfortable working independently, and often prefers a slower, steadier, and somewhat methodical pace, to make sure things are done right the first time.</p>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL: </span> You may find the most comfort in a work environment that affords the space to think, plan, and create reproducible, accurate processes. Unlike some colleagues, you may prefer to receive all of the facts up-front, and you display a comfort and ease with detailed, supporting documentation for those facts.</p>\r\n<p><span class=\"sub-heading\">STRESS: </span> Analyticals may find stress in unpredictable, changing conditions. When confronted with such conditions, you may run the risk of appearing shut-down, or withdrawn. In fact, during these moments, you may appear resistant to change, or that you are slowing down the team.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER: </span> In meetings, you may find that you&rsquo;re focused on the TASK at hand, and that you prefer a discussion on the facts and supporting documentation. When pushed to make a decision with less than 100% of the information, you may want to stay aware of time. That is, you are likely to want more time for analysis than other team members. In some instances, you may be correct in slowing the team down to gather more facts. However, in other instances, the team may require that you move faster than you might prefer.</p>\r\n<p>In order to provide transparency about your Style, you may want to communicate to the team that your objective is simply to clarify the necessary facts, so that they make the best informed decision. Your goal is to assist in guiding the team toward that outcome. In short, your aim is to establish a clear and solid decision-making process for the team&rsquo;s future success.</p>\r\n</div>', '<div class=\"sec-m-heading\">Your Secondary Style</div>\r\n<div class=\"form-des\">\r\n<p>While your primary Communication Style best summarizes your approach to interacting with others, your secondary Style also represents a less prominent, but important, way in which you like to communicate.</p>\r\n<h4>DRIVER</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION:&nbsp;</span>Your secondary Communication Style is Driver. The Driver Style can be characterized as having an emphasis on tasks and results. For &ldquo;Drivers,&rdquo; the key objective at work is to accomplish goals. The Driver Style tends to enjoy working with others, as long as that work is productive, and remains on-task. Drivers prefer an efficient process, which often translates into moving at a quick, targeted pace.</p>\r\n<h4>Drivers</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to shape the environment by overcoming opposition to accomplish results</li>\r\n<li>Speak in a direct manner and are self-contained</li>\r\n<li>Focus on the TASK at hand and on achieving results</li>\r\n<li>May become irritated by what they perceive as &ldquo;touchy-feely&rdquo; behavior, particularly if they sense that behavior is inhibiting immediate action</li>\r\n<li>Prefer to remain in control at all times</li>\r\n<li>Rely on their leadership skills to strive to be a &ldquo;winner&rdquo;</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL:&nbsp;</span>You may find yourself most comfortable in a work environment that maintains a focus on reproducible and accurate processes, along with high-performing teams. You may enjoy a rapid work pace, with an emphasis on goals, and where you feel surrounded by people who share a bias toward action.</p>\r\n<p><span class=\"sub-heading\">STRESS:&nbsp;</span>You may experience stress in emotionally-charged environments, particularly where interactions do not appear to be channeled toward results, you may experience stress. When confronted with such conditions, Drivers may try to create more productive conditions, and, in turn, run the risk of appearing demanding or dictatorial.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER:&nbsp;</span>As a Driver, your first instinct may be to view the workplace mainly in terms of where TASKS are completed. Your passion for results may cause you to miss the bigger picture that work involves people, and people have needs that you may not keep in the forefront of your mind. These needs may include team-bonding, casual and fun interactions, and joy in the work environment. In short, your colleagues may want more social interaction than you, and may want more social interactions from you.</p>\r\n<p>One example of how this may play out&hellip; In the morning, when you walk into the office building, your preference may be to take a straight line to your computer. You may be so focused that indeed you walk past some colleagues without so much as a &ldquo;hello&rdquo; or &ldquo;good morning.&rdquo;</p>\r\n<p>Consider, perhaps, creating a task for yourself, that each morning, you will grab a cup of coffee and greet your colleagues casually, before launching into work. This morning ritual could inspire more goodwill toward you, and may allow you to get to know your colleagues better!</p>\r\n</div>'),
(3, 1, 'AM', NULL, '-6,-7,-8,-9', '+1,+2,+3,+4', '<div class=\"sec-m-heading\">Describing Your Style - Analytical</div>\r\n<div class=\"form-des\">\r\n<h4><small>AMIABLE</small>-ANALYTICAL</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION:&nbsp;</span>Your primary Communication Style is Analytical. The Analytical Style can be characterized as having an emphasis on process and accuracy. With &ldquo;Analyticals&rdquo;, the key objective at work is to create high quality products and services. The Analytical Style tends to be comfortable working independently, and often prefers a slower, steadier, and somewhat methodical pace, to make sure things are done right the first time.</p>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL:&nbsp;</span>You may find the most comfort in a work environment that affords the space to think, plan, and create reproducible, accurate processes. Unlike some colleagues, you may prefer to receive all of the facts up-front, and you display a comfort and ease with detailed, supporting documentation for those facts.</p>\r\n<p><span class=\"sub-heading\">STRESS:&nbsp;</span>Analyticals may find stress in unpredictable, changing conditions. When confronted with such conditions, you may run the risk of appearing shut-down, or withdrawn. In fact, during these moments, you may appear resistant to change, or that you are slowing down the team.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER:&nbsp;</span>In meetings, you may find that you&rsquo;re focused on the TASK at hand, and that you prefer a discussion on the facts and supporting documentation. When pushed to make a decision with less than 100% of the information, you may want to stay aware of time. That is, you are likely to want more time for analysis than other team members. In some instances, you may be correct in slowing the team down to gather more facts. However, in other instances, the team may require that you move faster than you might prefer.</p>\r\n<p>In order to provide transparency about your Style, you may want to communicate to the team that your objective is simply to clarify the necessary facts, so that they make the best informed decision. Your goal is to assist in guiding the team toward that outcome. In short, your aim is to establish a clear and solid decision-making process for the team&rsquo;s future success.</p>\r\n</div>', '<div class=\"sec-m-heading\">Your Secondary Style</div>\r\n<div class=\"form-des\">\r\n<p>While your primary Communication Style best summarizes your approach to interacting with others, your secondary Style also represents a less prominent, but important, way in which you like to communicate.</p>\r\n<h4>AMIABLE</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION: </span> Your secondary Communication Style is Amiable. The Amiable Style can be characterized as having an emphasis on people and teams. For Amiables, the key objective at work is to achieve a sense of harmony at work. The Amiable Style greatly enjoys working with others, as long as the team is working well together to achieve their goals. Amiables prefer collaboration, which often translates into moving at a slightly slower pace, to allow for all opinions to be heard.</p>\r\n<h4>AMIABLES</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to cooperate with others and to carry out the team&rsquo;s goals</li>\r\n<li>Tend to be slower paced, easy-going, and relaxed</li>\r\n<li>Their priority is PEOPLE and relationships</li>\r\n<li>Focus on building trust and getting acquainted with others</li>\r\n<li>Are irritated by pushy and aggressive behavior</li>\r\n<li>Enjoy supportive behavior, and rely on close and secure relationships</li>\r\n<li>Acceptance is based on conformity, loyalty, and helpfulness</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL: </span> You may find yourself most comfortable in a work environment that supports an open culture, participative leadership, and teams. You may enjoy a less rushed work pace, with an emphasis on team accomplishments and recognition.</p>\r\n<p><span class=\"sub-heading\">STRESS: </span> You may experience stress in highly political, face-paced environments. While others may let political games go, you may find that they affect you deeply, and you lose productivity when others are faced with competition for resources. When confronted with such conditions, Amiables may appear &ldquo;checked out&rdquo; and unsure how to move forward.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER: </span> As an Amiable, your first instinct may be to consider work as a place where PEOPLE come together to complete team objectives. Your instinct to hear from everyone during meetings may be exactly what the team needs. However, when the team is confronted with immediate deadlines, your Style may appear to others as hindering their ability to advance. In such situations, you may consider shifting into a &ldquo;Driver&rdquo; mode, to help the team gain quick consensus, make decisions, and then develop clear action plans to achieve their objectives.</p>\r\n</div>'),
(4, 1, 'EX', NULL, '-1,-2,-3,-4', '+1,+2,+3,+4', '<div class=\"sec-m-heading\">Describing Your Style - Analytical</div>\r\n<div class=\"form-des\">\r\n<h4><small>EXPRESSIVE</small>-ANALYTICAL</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION:&nbsp;</span>Your primary Communication Style is Analytical. The Analytical Style can be characterized as having an emphasis on process and accuracy. With &ldquo;Analyticals&rdquo;, the key objective at work is to create high quality products and services. The Analytical Style tends to be comfortable working independently, and often prefers a slower, steadier, and somewhat methodical pace, to make sure things are done right the first time.</p>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL:&nbsp;</span>You may find the most comfort in a work environment that affords the space to think, plan, and create reproducible, accurate processes. Unlike some colleagues, you may prefer to receive all of the facts up-front, and you display a comfort and ease with detailed, supporting documentation for those facts.</p>\r\n<p><span class=\"sub-heading\">STRESS:&nbsp;</span>Analyticals may find stress in unpredictable, changing conditions. When confronted with such conditions, you may run the risk of appearing shut-down, or withdrawn. In fact, during these moments, you may appear resistant to change, or that you are slowing down the team.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER:&nbsp;</span>In meetings, you may find that you&rsquo;re focused on the TASK at hand, and that you prefer a discussion on the facts and supporting documentation. When pushed to make a decision with less than 100% of the information, you may want to stay aware of time. That is, you are likely to want more time for analysis than other team members. In some instances, you may be correct in slowing the team down to gather more facts. However, in other instances, the team may require that you move faster than you might prefer.</p>\r\n<p>In order to provide transparency about your Style, you may want to communicate to the team that your objective is simply to clarify the necessary facts, so that they make the best informed decision. Your goal is to assist in guiding the team toward that outcome. In short, your aim is to establish a clear and solid decision-making process for the team&rsquo;s future success.</p>\r\n</div>', '<div class=\"sec-m-heading\">Your Secondary Style</div>\r\n<div class=\"form-des\">\r\n<p>While your primary Communication Style best summarizes your approach to interacting with others, your secondary Style also represents a less prominent, but important, way in which you like to communicate.</p>\r\n<h4>EXPRESSIVE</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION: </span> Your secondary Communication Style is Expressive. The Expressive Style can be characterized focusing on people and on developing a long-term vision for your team&rsquo;s success. Expressives hold the ability to communicate a vision that paints a picture around which others can rally. The Expressive Style collaborating and brainstorming with others, and appreciates a certain amount of creativity at work. Expressives tend to work at a rapid pace.</p>\r\n<h4>EXPRESSIVES</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to shape the environment by forming alliances with others in order to accomplish results</li>\r\n<li>Are open, stimulating, talkative, flexible, and quick-paced environments</li>\r\n<li>Focus on PEOPLE and the interaction and dynamics of the relationship</li>\r\n<li>Are irritated by routine tasks and being alone</li>\r\n<li>Appreciate having their ideas heard and enjoy selling those ideas</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL: </span> You may find yourself most comfortable in a work environment that supports an open culture, shared goals, and the ability to brainstorm in teams. You may enjoy when you, and your teams, are recognized for accomplishments.</p>\r\n<p><span class=\"sub-heading\">STRESS: </span> Expressives may experience stress when the work environment appears overly reliant on process, and not flexible in how work gets done. Expressives are uncomfortable with a slow pace, and may express that discomfort as restlessness, or dominating a conversation.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER: </span> As an Expressive, you have a talent for imagining what will occur in the future, and verbalizing that future without yet knowing all of the details. However, some other Styles may be confused as to how this future state can be imagined without those details. They may view your comments as impulsive, or even disruptive. We recommend that Expressives manage this perception by keeping a notepad with them during meetings. When Expressives wish to state their opinions, we advise them instead to use the notepad to jot down their opinions. Before the end of the meetings, Expressives can review their notes and determine which of the opinions still should be communicated to the team. Then, Expressives could ask the team for permission to cover a few items that have not yet been accounted for.</p>\r\n</div>'),
(5, 2, 'AN', NULL, '+1,+2,+3,+4', '+6,+7,+8,+9', '<div class=\"sec-m-heading\">Describing Your Style - Driver</div>\r\n<div class=\"form-des\">\r\n<h4><small>ANALYTICAL</small>-DRIVER</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION:&nbsp;</span>Your primary Communication Style is Driver. The Driver Style can be characterized as having an emphasis on tasks and results. For &ldquo;Drivers,&rdquo; the key objective at work is to accomplish goals. The Driver Style tends to enjoy working with others, as long as that work is productive, and remains on-task. Drivers prefer an efficient process, which often translates into moving at a quick, targeted pace.</p>\r\n<h4>Drivers</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to shape the environment by overcoming opposition to accomplish results</li>\r\n<li>Speak in a direct manner and are self-contained</li>\r\n<li>Focus on the TASK at hand and on achieving results</li>\r\n<li>May become irritated by what they perceive as &ldquo;touchy-feely&rdquo; behavior, particularly if they sense that behavior is inhibiting immediate action</li>\r\n<li>Prefer to remain in control at all times</li>\r\n<li>Rely on their leadership skills to strive to be a &ldquo;winner&rdquo;</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL:&nbsp;</span>You may find yourself most comfortable in a work environment that maintains a focus on reproducible and accurate processes, along with high-performing teams. You may enjoy a rapid work pace, with an emphasis on goals, and where you feel surrounded by people who share a bias toward action.</p>\r\n<p><span class=\"sub-heading\">STRESS:&nbsp;</span>You may experience stress in emotionally-charged environments, particularly where interactions do not appear to be channeled toward results, you may experience stress. When confronted with such conditions, Drivers may try to create more productive conditions, and, in turn, run the risk of appearing demanding or dictatorial.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER:&nbsp;</span>As a Driver, your first instinct may be to view the workplace mainly in terms of where TASKS are completed. Your passion for results may cause you to miss the bigger picture that work involves people, and people have needs that you may not keep in the forefront of your mind. These needs may include team-bonding, casual and fun interactions, and joy in the work environment. In short, your colleagues may want more social interaction than you, and may want more social interactions from you.</p>\r\n<p>One example of how this may play out&hellip; In the morning, when you walk into the office building, your preference may be to take a straight line to your computer. You may be so focused that indeed you walk past some colleagues without so much as a &ldquo;hello&rdquo; or &ldquo;good morning.&rdquo;</p>\r\n<p>Consider, perhaps, creating a task for yourself, that each morning, you will grab a cup of coffee and greet your colleagues casually, before launching into work. This morning ritual could inspire more goodwill toward you, and may allow you to get to know your colleagues better!</p>\r\n</div>', '<div class=\"sec-m-heading\">Your Secondary Style</div>\r\n<div class=\"form-des\">\r\n<p>While your primary Communication Style best summarizes your approach to interacting with others, your secondary Style also represents a less prominent, but important, way in which you like to communicate.</p>\r\n<h4>ANALYTICAL</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION</span><span class=\"sub-heading\">:&nbsp;</span>Your secondary Communication Style is Analytical. The Analytical Style can be characterized as having an emphasis on process and accuracy. With &ldquo;Analyticals&rdquo;, the key objective at work is to create high quality products and services. The Analytical Style tends to be comfortable working independently, and often prefers a slower, steadier, and somewhat methodical pace, to make sure things are done right the first time.</p>\r\n</div>\r\n<div class=\"form-des\">\r\n<p><span class=\"sub-heading\">COMFORT LEVEL:&nbsp;</span>You may find the most comfort in a work environment that affords the space to think, plan, and create reproducible, accurate processes. Unlike some colleagues, you may prefer to receive all of the facts up-front, and you display a comfort and ease with detailed, supporting documentation for those facts.</p>\r\n<p><span class=\"sub-heading\">STRESS:&nbsp;</span>Analyticals may find stress in unpredictable, changing conditions. When confronted with such conditions, you may run the risk of appearing shut-down, or withdrawn. In fact, during these moments, you may appear resistant to change, or that you are slowing down the team.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER:&nbsp;</span>In meetings, you may find that you&rsquo;re focused on the TASK at hand, and that you prefer a discussion on the facts and supporting documentation. When pushed to make a decision with less than 100% of the information, you may want to stay aware of time. That is, you are likely to want more time for analysis than other team members. In some instances, you may be correct in slowing the team down to gather more facts. However, in other instances, the team may require that you move faster than you might prefer.</p>\r\n<p>In order to provide transparency about your Style, you may want to communicate to the team that your objective is simply to clarify the necessary facts, so that they make the best informed decision. Your goal is to assist in guiding the team toward that outcome. In short, your aim is to establish a clear and solid decision-making process for the team&rsquo;s future success.</p>\r\n</div>'),
(6, 2, 'DR', NULL, '+6,+7,+8,+9', '+6,+7,+8,+9', '<div class=\"sec-m-heading\">Describing Your Style - DRIVER</div>\r\n<div class=\"form-des\">\r\n<h4><small>TURBO</small>-DRIVER</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION: </span> Your primary and secondary Communication Style is Driver. The Driver Style can be characterized as having an emphasis on tasks and results. For &ldquo;Drivers,&rdquo; the key objective at work is to accomplish goals. The Driver Style tends to enjoy working with others, as long as that work is productive, and remains on-task. Drivers prefer an efficient process, which often translates into moving at a quick, targeted pace.</p>\r\n<h4>Drivers</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to shape the environment by overcoming opposition to accomplish results</li>\r\n<li>Speak in a direct manner and are self-contained</li>\r\n<li>Focus on the TASK at hand and on achieving results</li>\r\n<li>May become irritated by what they perceive as &ldquo;touchy-feely&rdquo; behavior</li>\r\n<li>Prefer to remain in control at all times</li>\r\n<li>Rely on their leadership skills to strive to be a &ldquo;winner&rdquo;</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL: </span> You may find yourself most comfortable in a work environment that maintains a focus on reproducible and accurate processes, along with high-performing teams. You may enjoy a rapid work pace, with an emphasis on goals, and where you feel surrounded by people who share a bias toward action.</p>\r\n<p><span class=\"sub-heading\">STRESS: </span> In emotionally-charged environments, particularly where interactions do not appear to be channeled toward results, you may experience stress. When confronted with such conditions, Drivers may try to create more productive conditions, and, in turn, run the risk of appearing demanding or dictatorial.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER: </span> As a turbo Driver, your first instinct is likely to be that you view the workplace in terms of where TASKS are accomplished. Your passion for results may cause you to miss the bigger picture that work involves people, and people have needs that you may not keep in the forefront of your mind. These needs may include team-bonding, casual and fun interactions, and joy in the work environment. In short, your colleagues may want more social interaction than you, and may want more social interactions from you.</p>\r\n<p>One example of how this may play out&hellip;<br /> In the morning, when you walk into the office building, your preference may be to take a straight line to your computer. You may be so focused that indeed you walk past some colleagues without so much as a &ldquo;hello&rdquo; or &ldquo;good morning.&rdquo;</p>\r\n<p>Consider, perhaps, creating a task for yourself, that each morning, you will grab a cup of coffee and greet your colleagues casually, before launching into work. This morning ritual could inspire more goodwill toward you, and may allow you to get to know your colleagues better!</p>\r\n</div>', NULL),
(7, 2, 'AM', NULL, '+1,+2,+3,+4', '+1,+2,+3,+4', '<div class=\"sec-m-heading\">Describing Your Style - Driver</div>\r\n<div class=\"form-des\">\r\n<h4><small>AMIABLE</small>-DRIVER</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION:&nbsp;</span>Your primary Communication Style is Driver. The Driver Style can be characterized as having an emphasis on tasks and results. For &ldquo;Drivers,&rdquo; the key objective at work is to accomplish goals. The Driver Style tends to enjoy working with others, as long as that work is productive, and remains on-task. Drivers prefer an efficient process, which often translates into moving at a quick, targeted pace.</p>\r\n<h4>Drivers</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to shape the environment by overcoming opposition to accomplish results</li>\r\n<li>Speak in a direct manner and are self-contained</li>\r\n<li>Focus on the TASK at hand and on achieving results</li>\r\n<li>May become irritated by what they perceive as &ldquo;touchy-feely&rdquo; behavior, particularly if they sense that behavior is inhibiting immediate action</li>\r\n<li>Prefer to remain in control at all times</li>\r\n<li>Rely on their leadership skills to strive to be a &ldquo;winner&rdquo;</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL:&nbsp;</span>You may find yourself most comfortable in a work environment that maintains a focus on reproducible and accurate processes, along with high-performing teams. You may enjoy a rapid work pace, with an emphasis on goals, and where you feel surrounded by people who share a bias toward action.</p>\r\n<p><span class=\"sub-heading\">STRESS:&nbsp;</span>You may experience stress in emotionally-charged environments, particularly where interactions do not appear to be channeled toward results, you may experience stress. When confronted with such conditions, Drivers may try to create more productive conditions, and, in turn, run the risk of appearing demanding or dictatorial.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER:&nbsp;</span>As a Driver, your first instinct may be to view the workplace mainly in terms of where TASKS are completed. Your passion for results may cause you to miss the bigger picture that work involves people, and people have needs that you may not keep in the forefront of your mind. These needs may include team-bonding, casual and fun interactions, and joy in the work environment. In short, your colleagues may want more social interaction than you, and may want more social interactions from you.</p>\r\n<p>One example of how this may play out&hellip; In the morning, when you walk into the office building, your preference may be to take a straight line to your computer. You may be so focused that indeed you walk past some colleagues without so much as a &ldquo;hello&rdquo; or &ldquo;good morning.&rdquo;</p>\r\n<p>Consider, perhaps, creating a task for yourself, that each morning, you will grab a cup of coffee and greet your colleagues casually, before launching into work. This morning ritual could inspire more goodwill toward you, and may allow you to get to know your colleagues better!</p>\r\n</div>', '<div class=\"sec-m-heading\">Your Secondary Style</div>\r\n<div class=\"form-des\">\r\n<p>While your primary Communication Style best summarizes your approach to interacting with others, your secondary Style also represents a less prominent, but important, way in which you like to communicate.</p>\r\n<h4>AMIABLE</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION: </span> Your secondary Communication Style is Amiable. The Amiable Style can be characterized as having an emphasis on people and teams. For Amiables, the key objective at work is to achieve a sense of harmony at work. The Amiable Style greatly enjoys working with others, as long as the team is working well together to achieve their goals. Amiables prefer collaboration, which often translates into moving at a slightly slower pace, to allow for all opinions to be heard.</p>\r\n<h4>AMIABLES</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to cooperate with others and to carry out the team&rsquo;s goals</li>\r\n<li>Tend to be slower paced, easy-going, and relaxed</li>\r\n<li>Their priority is PEOPLE and relationships</li>\r\n<li>Focus on building trust and getting acquainted with others</li>\r\n<li>Are irritated by pushy and aggressive behavior</li>\r\n<li>Enjoy supportive behavior, and rely on close and secure relationships</li>\r\n<li>Acceptance is based on conformity, loyalty, and helpfulness</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL: </span> You may find yourself most comfortable in a work environment that supports an open culture, participative leadership, and teams. You may enjoy a less rushed work pace, with an emphasis on team accomplishments and recognition.</p>\r\n<p><span class=\"sub-heading\">STRESS: </span> You may experience stress in highly political, face-paced environments. While others may let political games go, you may find that they affect you deeply, and you lose productivity when others are faced with competition for resources. When confronted with such conditions, Amiables may appear &ldquo;checked out&rdquo; and unsure how to move forward.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER: </span> As an Amiable, your first instinct may be to consider work as a place where PEOPLE come together to complete team objectives. Your instinct to hear from everyone during meetings may be exactly what the team needs. However, when the team is confronted with immediate deadlines, your Style may appear to others as hindering their ability to advance. In such situations, you may consider shifting into a &ldquo;Driver&rdquo; mode, to help the team gain quick consensus, make decisions, and then develop clear action plans to achieve their objectives.</p>\r\n</div>'),
(8, 2, 'EX', NULL, '+6,+7,+8,+9', '+1,+2,+3,+4', '<div class=\"sec-m-heading\">Describing Your Style - Driver</div>\r\n<div class=\"form-des\">\r\n<h4><small>EXPRESSIVE</small>-DRIVER</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION:&nbsp;</span>Your primary Communication Style is Driver. The Driver Style can be characterized as having an emphasis on tasks and results. For &ldquo;Drivers,&rdquo; the key objective at work is to accomplish goals. The Driver Style tends to enjoy working with others, as long as that work is productive, and remains on-task. Drivers prefer an efficient process, which often translates into moving at a quick, targeted pace.</p>\r\n<h4>Drivers</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to shape the environment by overcoming opposition to accomplish results</li>\r\n<li>Speak in a direct manner and are self-contained</li>\r\n<li>Focus on the TASK at hand and on achieving results</li>\r\n<li>May become irritated by what they perceive as &ldquo;touchy-feely&rdquo; behavior, particularly if they sense that behavior is inhibiting immediate action</li>\r\n<li>Prefer to remain in control at all times</li>\r\n<li>Rely on their leadership skills to strive to be a &ldquo;winner&rdquo;</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL:&nbsp;</span>You may find yourself most comfortable in a work environment that maintains a focus on reproducible and accurate processes, along with high-performing teams. You may enjoy a rapid work pace, with an emphasis on goals, and where you feel surrounded by people who share a bias toward action.</p>\r\n<p><span class=\"sub-heading\">STRESS:&nbsp;</span>You may experience stress in emotionally-charged environments, particularly where interactions do not appear to be channeled toward results, you may experience stress. When confronted with such conditions, Drivers may try to create more productive conditions, and, in turn, run the risk of appearing demanding or dictatorial.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER:&nbsp;</span>As a Driver, your first instinct may be to view the workplace mainly in terms of where TASKS are completed. Your passion for results may cause you to miss the bigger picture that work involves people, and people have needs that you may not keep in the forefront of your mind. These needs may include team-bonding, casual and fun interactions, and joy in the work environment. In short, your colleagues may want more social interaction than you, and may want more social interactions from you.</p>\r\n<p>One example of how this may play out&hellip; In the morning, when you walk into the office building, your preference may be to take a straight line to your computer. You may be so focused that indeed you walk past some colleagues without so much as a &ldquo;hello&rdquo; or &ldquo;good morning.&rdquo;</p>\r\n<p>Consider, perhaps, creating a task for yourself, that each morning, you will grab a cup of coffee and greet your colleagues casually, before launching into work. This morning ritual could inspire more goodwill toward you, and may allow you to get to know your colleagues better!</p>\r\n</div>', '<div class=\"sec-m-heading\">Your Secondary Style</div>\r\n<div class=\"form-des\">\r\n<p>While your primary Communication Style best summarizes your approach to interacting with others, your secondary Style also represents a less prominent, but important, way in which you like to communicate.</p>\r\n<h4>EXPRESSIVE</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION:&nbsp;</span>Your secondary Communication Style is Expressive. The Expressive Style can be characterized focusing on people and on developing a long-term vision for your team&rsquo;s success. Expressives hold the ability to communicate a vision that paints a picture around which others can rally. The Expressive Style collaborating and brainstorming with others, and appreciates a certain amount of creativity at work. Expressives tend to work at a rapid pace.</p>\r\n<h4>EXPRESSIVES</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to shape the environment by forming alliances with others in order to accomplish results</li>\r\n<li>Are open, stimulating, talkative, flexible, and quick-paced environments</li>\r\n<li>Focus on PEOPLE and the interaction and dynamics of the relationship</li>\r\n<li>Are irritated by routine tasks and being alone</li>\r\n<li>Appreciate having their ideas heard and enjoy selling those ideas</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL:&nbsp;</span>You may find yourself most comfortable in a work environment that supports an open culture, shared goals, and the ability to brainstorm in teams. You may enjoy when you, and your teams, are recognized for accomplishments.</p>\r\n<p><span class=\"sub-heading\">STRESS:&nbsp;</span>Expressives may experience stress when the work environment appears overly reliant on process, and not flexible in how work gets done. Expressives are uncomfortable with a slow pace, and may express that discomfort as restlessness, or dominating a conversation.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER:&nbsp;</span>As an Expressive, you have a talent for imagining what will occur in the future, and verbalizing that future without yet knowing all of the details. However, some other Styles may be confused as to how this future state can be imagined without those details. They may view your comments as impulsive, or even disruptive. We recommend that Expressives manage this perception by keeping a notepad with them during meetings. When Expressives wish to state their opinions, we advise them instead to use the notepad to jot down their opinions. Before the end of the meetings, Expressives can review their notes and determine which of the opinions still should be communicated to the team. Then, Expressives could ask the team for permission to cover a few items that have not yet been accounted for.</p>\r\n</div>'),
(9, 3, 'AN', NULL, '-6,-7,-8,-9', '-1,-2,-3,-4', '<div class=\"sec-m-heading\">Describing Your Style - Analytical</div>\r\n<div class=\"form-des\">\r\n<h4><small>ANALYTICAL</small>-AMIABLE</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION: </span> Your primary Communication Style is Amiable. The Amiable Style can be characterized as having an emphasis on people and teams. For Amiables, the key objective at work is to achieve a sense of harmony at work. The Amiable Style greatly enjoys working with others, as long as the team is working well together to achieve their goals. Amiables prefer collaboration, which often translates into moving at a slightly slower pace, to allow for all opinions to be heard.</p>\r\n<h4>AMIABLES</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to cooperate with others and to carry out the team&rsquo;s goals</li>\r\n<li>Tend to be slower paced, easy-going, and relaxed</li>\r\n<li>Their priority is PEOPLE and relationships</li>\r\n<li>Focus on building trust and getting acquainted with others</li>\r\n<li>Are irritated by pushy and aggressive behavior</li>\r\n<li>Enjoy supportive behavior, and rely on close and secure relationships</li>\r\n<li>Acceptance is based on conformity, loyalty, and helpfulness</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL: </span> You may find yourself most comfortable in a work environment that supports an open culture, participative leadership, and teams. You may enjoy a less rushed work pace, with an emphasis on team accomplishments and recognition.</p>\r\n<p><span class=\"sub-heading\">STRESS: </span> You may experience stress in highly political, face-paced environments. While others may let political games go, you may find that they affect you deeply, and you lose productivity when others are faced with competition for resources. When confronted with such conditions, Amiables may appear &ldquo;checked out&rdquo; and unsure how to move forward.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER: </span> As an Amiable, your first instinct may be to consider work as a place where PEOPLE come together to complete team objectives. Your instinct to hear from everyone during meetings may be exactly what the team needs. However, when the team is confronted with immediate deadlines, your Style may appear to others as hindering their ability to advance. In such situations, you may consider shifting into a &ldquo;Driver&rdquo; mode, to help the team gain quick consensus, make decisions, and then develop clear action plans to achieve their objectives.</p>\r\n</div>', '<div class=\"sec-m-heading\">Your Secondary Style</div>\r\n<div class=\"form-des\">\r\n<p>While your primary Communication Style best summarizes your approach to interacting with others, your secondary Style also represents a less prominent, but important, way in which you like to communicate.</p>\r\n<h4>ANALYTICAL</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION</span><span class=\"sub-heading\">: </span> Your secondary Communication Style is Analytical. The Analytical Style can be characterized as having an emphasis on process and accuracy. With &ldquo;Analyticals&rdquo;, the key objective at work is to create high quality products and services. The Analytical Style tends to be comfortable working independently, and often prefers a slower, steadier, and somewhat methodical pace, to make sure things are done right the first time.</p>\r\n</div>\r\n<div class=\"form-des\">\r\n<p><span class=\"sub-heading\">COMFORT LEVEL: </span> You may find the most comfort in a work environment that affords the space to think, plan, and create reproducible, accurate processes. Unlike some colleagues, you may prefer to receive all of the facts up-front, and you display a comfort and ease with detailed, supporting documentation for those facts.</p>\r\n<p><span class=\"sub-heading\">STRESS: </span> Analyticals may find stress in unpredictable, changing conditions. When confronted with such conditions, you may run the risk of appearing shut-down, or withdrawn. In fact, during these moments, you may appear resistant to change, or that you are slowing down the team.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER: </span> In meetings, you may find that you&rsquo;re focused on the TASK at hand, and that you prefer a discussion on the facts and supporting documentation. When pushed to make a decision with less than 100% of the information, you may want to stay aware of time. That is, you are likely to want more time for analysis than other team members. In some instances, you may be correct in slowing the team down to gather more facts. However, in other instances, the team may require that you move faster than you might prefer.</p>\r\n<p>In order to provide transparency about your Style, you may want to communicate to the team that your objective is simply to clarify the necessary facts, so that they make the best informed decision. Your goal is to assist in guiding the team toward that outcome. In short, your aim is to establish a clear and solid decision-making process for the team&rsquo;s future success.</p>\r\n</div>'),
(10, 3, 'DR', NULL, '-1,-2,-3,-4', '-1,-2,-3,-4', '<div class=\"sec-m-heading\">Describing Your Style - Amiable</div>\r\n<div class=\"form-des\">\r\n<h4><small>DRIVER</small>-AMIABLE</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION: </span> Your primary&nbsp;Communication Style is Amiable. The Amiable Style can be characterized as having an emphasis on people and teams. For Amiables, the key objective at work is to achieve a sense of harmony at work. The Amiable Style greatly enjoys working with others, as long as the team is working well together to achieve their goals. Amiables prefer collaboration, which often translates into moving at a slightly slower pace, to allow for all opinions to be heard.</p>\r\n<h4>AMIABLES</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to cooperate with others and to carry out the team&rsquo;s goals</li>\r\n<li>Tend to be slower paced, easy-going, and relaxed</li>\r\n<li>Their priority is PEOPLE and relationships</li>\r\n<li>Focus on building trust and getting acquainted with others</li>\r\n<li>Are irritated by pushy and aggressive behavior</li>\r\n<li>Enjoy supportive behavior, and rely on close and secure relationships</li>\r\n<li>Acceptance is based on conformity, loyalty, and helpfulness</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL: </span> You may find yourself most comfortable in a work environment that supports an open culture, participative leadership, and teams. You may enjoy a less rushed work pace, with an emphasis on team accomplishments and recognition.</p>\r\n<p><span class=\"sub-heading\">STRESS: </span> You may experience stress in highly political, face-paced environments. While others may let political games go, you may find that they affect you deeply, and you lose productivity when others are faced with competition for resources. When confronted with such conditions, Amiables may appear &ldquo;checked out&rdquo; and unsure how to move forward.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER: </span> As an Amiable, your first instinct may be to consider work as a place where PEOPLE come together to complete team objectives. Your instinct to hear from everyone during meetings may be exactly what the team needs. However, when the team is confronted with immediate deadlines, your Style may appear to others as hindering their ability to advance. In such situations, you may consider shifting into a &ldquo;Driver&rdquo; mode, to help the team gain quick consensus, make decisions, and then develop clear action plans to achieve their objectives.</p>\r\n</div>', '<div class=\"sec-m-heading\">Your Secondary Style</div>\r\n<div class=\"form-des\">\r\n<p>While your primary Communication Style best summarizes your approach to interacting with others, your secondary Style also represents a less prominent, but important, way in which you like to communicate.</p>\r\n<h4>DRIVER</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION</span><span class=\"sub-heading\">: </span> Your secondary Communication Style is Driver. The Driver Style can be characterized as having an emphasis on tasks and results. For &ldquo;Drivers,&rdquo; the key objective at work is to accomplish goals. The Driver Style tends to enjoy working with others, as long as that work is productive, and remains on-task. Drivers prefer an efficient process, which often translates into moving at a quick, targeted pace.</p>\r\n</div>\r\n<div class=\"form-des\">\r\n<h4>Drivers</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to shape the environment by overcoming opposition to accomplish results</li>\r\n<li>Speak in a direct manner and are self-contained</li>\r\n<li>Focus on the TASK at hand and on achieving results</li>\r\n<li>May become irritated by what they perceive as &ldquo;touchy-feely&rdquo; behavior, particularly if they sense that behavior is inhibiting immediate action</li>\r\n<li>Prefer to remain in control at all times</li>\r\n<li>Rely on their leadership skills to strive to be a &ldquo;winner&rdquo;</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL: </span> You may find yourself most comfortable in a work environment that maintains a focus on reproducible and accurate processes, along with high-performing teams. You may enjoy a rapid work pace, with an emphasis on goals, and where you feel surrounded by people who share a bias toward action.</p>\r\n<p><span class=\"sub-heading\">STRESS: </span>You may experience stress in emotionally-charged environments, particularly where interactions do not appear to be channeled toward results, you may experience stress. When confronted with such conditions, Drivers may try to create more productive conditions, and, in turn, run the risk of appearing demanding or dictatorial.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER: </span> As a Driver-Amiable, you have a powerful balance of attention to other people&rsquo;s concerns, while, at the same time, holding a bias toward action. We recommend you leverage these Styles by facilitating meetings. Structure an agenda that includes time to &ldquo;go around the table&rdquo; and hear everyone&rsquo;s opinions, while maintaining the attention to time, and to meeting objectives. Your Style may be highly suited to coalescing teams around strategies, and action plans.</p>\r\n</div>');
INSERT INTO `sub_quadrant` (`id`, `score_id`, `behavior`, `file`, `h`, `v`, `p_content`, `s_content`) VALUES
(11, 3, 'AM', NULL, '-6,-7,-8,-9', '-6,-7,-8,-9', '<div class=\"sec-m-heading\">Describing Your Style - Amiable</div>\r\n<div class=\"form-des\">\r\n<h4><small>TURBO</small>-AMIABLE</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION: </span> Your primary and secondary Communication Style is Amiable. The Amiable Style can be characterized as having an emphasis on people and teams. For Amiables, the key objective at work is to achieve a sense of harmony at work. The Amiable Style greatly enjoys working with others, as long as the team is working well together to achieve their goals. Amiables prefer collaboration, which often translates into moving at a slightly slower pace, to allow for all opinions to be heard.</p>\r\n<h4>AMIABLES</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to cooperate with others and to carry out the team&rsquo;s goals</li>\r\n<li>Tend to be slower paced, easy-going, and relaxed</li>\r\n<li>Their priority is PEOPLE and relationships</li>\r\n<li>Focus on building trust and getting acquainted with others</li>\r\n<li>Are irritated by pushy and aggressive behavior</li>\r\n<li>Enjoy supportive behavior, and rely on close and secure relationships</li>\r\n<li>Acceptance is based on conformity, loyalty, and helpfulness</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL: </span> You may find yourself most comfortable in a work environment that supports an open culture, participative leadership, and teams. You may enjoy a less rushed work pace, with an emphasis on team accomplishments and recognition.</p>\r\n<p><span class=\"sub-heading\">STRESS: </span> You may experience stress in highly political, face-paced environments. While others may let political games go, you may find that they affect you deeply, and you lose productivity when others are faced with competition for resources. When confronted with such conditions, Amiables may appear &ldquo;checked out&rdquo; and unsure how to move forward.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER: </span> As a Turbo-Amiable, your first instinct may be to consider work as a place where PEOPLE come together to complete team objectives. Your instinct to hear from everyone during meetings may be exactly what the team needs. However, when the team is confronted with immediate deadlines, your Style may appear to others as hindering their ability to advance.</p>\r\n<p>We recommend that you establish timed meeting agendas and groundrules to hear from everyone, but keeping opinions within agreed-upon time limits. To facilitate this way, you will need to push out of your comfort zone, and shift into more of a &ldquo;Driver&rdquo; mode. Picking up the pace will require the early establishment of fair and firm groundrules, at the start of the meeting. This facilitation style will aid the team in its goal of gaining quicker consensus, making faster decisions, and solidifying clear action plans to help them achieve success</p>\r\n</div>', NULL),
(12, 3, 'EX', NULL, '-1,-2,-3,-4', '-6,-7,-8,-9', '<div class=\"sec-m-heading\">Describing Your Style - Amiable</div>\r\n<div class=\"form-des\">\r\n<h4><small>EXPRESSIVE</small>-AMIABLE</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION: </span> Your primary Communication Style is Amiable. The Amiable Style can be characterized as having an emphasis on people and teams. For Amiables, the key objective at work is to achieve a sense of harmony at work. The Amiable Style greatly enjoys working with others, as long as the team is working well together to achieve their goals. Amiables prefer collaboration, which often translates into moving at a slightly slower pace, to allow for all opinions to be heard.</p>\r\n<h4>AMIABLES</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to cooperate with others and to carry out the team&rsquo;s goals</li>\r\n<li>Tend to be slower paced, easy-going, and relaxed</li>\r\n<li>Their priority is PEOPLE and relationships</li>\r\n<li>Focus on building trust and getting acquainted with others</li>\r\n<li>Are irritated by pushy and aggressive behavior</li>\r\n<li>Enjoy supportive behavior, and rely on close and secure relationships</li>\r\n<li>Acceptance is based on conformity, loyalty, and helpfulness</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL: </span> You may find yourself most comfortable in a work environment that supports an open culture, participative leadership, and teams. You may enjoy a less rushed work pace, with an emphasis on team accomplishments and recognition.</p>\r\n<p><span class=\"sub-heading\">STRESS: </span> You may experience stress in highly political, face-paced environments. While others may let political games go, you may find that they affect you deeply, and you lose productivity when others are faced with competition for resources. When confronted with such conditions, Amiables may appear &ldquo;checked out&rdquo; and unsure how to move forward.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER: </span> As an Amiable, your first instinct may be to consider work as a place where PEOPLE come together to complete team objectives. Your instinct to hear from everyone during meetings may be exactly what the team needs. However, when the team is confronted with immediate deadlines, your Style may appear to others as hindering their ability to advance. In such situations, you may consider shifting into a &ldquo;Driver&rdquo; mode, to help the team gain quick consensus, make decisions, and then develop clear action plans to achieve their objectives.</p>\r\n</div>', '<div class=\"sec-m-heading\">Your Secondary Style</div>\r\n<div class=\"form-des\">\r\n<p>While your primary Communication Style best summarizes your approach to interacting with others, your secondary Style also represents a less prominent, but important, way in which you like to communicate.</p>\r\n<h4>EXPRESSIVE</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION:&nbsp;</span>Your secondary Communication Style is Expressive. The Expressive Style can be characterized focusing on people and on developing a long-term vision for your team&rsquo;s success. Expressives hold the ability to communicate a vision that paints a picture around which others can rally. The Expressive Style collaborating and brainstorming with others, and appreciates a certain amount of creativity at work. Expressives tend to work at a rapid pace.</p>\r\n<h4>EXPRESSIVES</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to shape the environment by forming alliances with others in order to accomplish results</li>\r\n<li>Are open, stimulating, talkative, flexible, and quick-paced environments</li>\r\n<li>Focus on PEOPLE and the interaction and dynamics of the relationship</li>\r\n<li>Are irritated by routine tasks and being alone</li>\r\n<li>Appreciate having their ideas heard and enjoy selling those ideas</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL:&nbsp;</span>You may find yourself most comfortable in a work environment that supports an open culture, shared goals, and the ability to brainstorm in teams. You may enjoy when you, and your teams, are recognized for accomplishments.</p>\r\n<p><span class=\"sub-heading\">STRESS:&nbsp;</span>Expressives may experience stress when the work environment appears overly reliant on process, and not flexible in how work gets done. Expressives are uncomfortable with a slow pace, and may express that discomfort as restlessness, or dominating a conversation.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER:&nbsp;</span>As an Expressive, you have a talent for imagining what will occur in the future, and verbalizing that future without yet knowing all of the details. However, some other Styles may be confused as to how this future state can be imagined without those details. They may view your comments as impulsive, or even disruptive. We recommend that Expressives manage this perception by keeping a notepad with them during meetings. When Expressives wish to state their opinions, we advise them instead to use the notepad to jot down their opinions. Before the end of the meetings, Expressives can review their notes and determine which of the opinions still should be communicated to the team. Then, Expressives could ask the team for permission to cover a few items that have not yet been accounted for.</p>\r\n</div>'),
(13, 4, 'AN', NULL, '+1,+2,+3,+4', '-1,-2,-3,-4', '<div class=\"sec-m-heading\">Describing Your Style - Expressive</div>\r\n<div class=\"form-des\">\r\n<h4><small>ANALYTICAL</small>-EXPRESSIVE</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION: </span> Your primary Communication Style is Expressive. The Expressive Style can be characterized focusing on people and on developing a long-term vision for your team&rsquo;s success. Expressives hold the ability to communicate a vision that paints a picture around which others can rally. The Expressive Style collaborating and brainstorming with others, and appreciates a certain amount of creativity at work. Expressives tend to work at a rapid pace.</p>\r\n<h4>EXPRESSIVES</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to shape the environment by forming alliances with others in order to accomplish results</li>\r\n<li>Are open, stimulating, talkative, flexible, and quick-paced environments</li>\r\n<li>Focus on PEOPLE and the interaction and dynamics of the relationship</li>\r\n<li>Are irritated by routine tasks and being alone</li>\r\n<li>Appreciate having their ideas heard and enjoy selling those ideas</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL: </span> You may find yourself most comfortable in a work environment that supports an open culture, shared goals, and the ability to brainstorm in teams. You may enjoy when you, and your teams, are recognized for accomplishments.</p>\r\n<p><span class=\"sub-heading\">STRESS: </span> Expressives may experience stress when the work environment appears overly reliant on process, and not flexible in how work gets done. Expressives are uncomfortable with a slow pace, and may express that discomfort as restlessness, or dominating a conversation.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER: </span> As an Expressive, you have a talent for imagining what will occur in the future, and verbalizing that future without yet knowing all of the details. However, some other Styles may be confused as to how this future state can be imagined without those details. They may view your comments as impulsive, or even disruptive. We recommend that Expressives manage this perception by keeping a notepad with them during meetings. When Expressives wish to state their opinions, we advise them instead to use the notepad to jot down their opinions. Before the end of the meetings, Expressives can review their notes and determine which of the opinions still should be communicated to the team. Then, Expressives could ask the team for permission to cover a few items that have not yet been accounted for.</p>\r\n</div>', '<div class=\"sec-m-heading\">Your Secondary Style</div>\r\n<div class=\"form-des\">\r\n<p>While your primary Communication Style best summarizes your approach to interacting with others, your secondary Style also represents a less prominent, but important, way in which you like to communicate.</p>\r\n<h4>ANALYTICAL</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION</span><span class=\"sub-heading\">:&nbsp;</span>Your secondary Communication Style is Analytical. The Analytical Style can be characterized as having an emphasis on process and accuracy. With &ldquo;Analyticals&rdquo;, the key objective at work is to create high quality products and services. The Analytical Style tends to be comfortable working independently, and often prefers a slower, steadier, and somewhat methodical pace, to make sure things are done right the first time.</p>\r\n</div>\r\n<div class=\"form-des\">\r\n<p><span class=\"sub-heading\">COMFORT LEVEL:&nbsp;</span>You may find the most comfort in a work environment that affords the space to think, plan, and create reproducible, accurate processes. Unlike some colleagues, you may prefer to receive all of the facts up-front, and you display a comfort and ease with detailed, supporting documentation for those facts.</p>\r\n<p><span class=\"sub-heading\">STRESS:&nbsp;</span>Analyticals may find stress in unpredictable, changing conditions. When confronted with such conditions, you may run the risk of appearing shut-down, or withdrawn. In fact, during these moments, you may appear resistant to change, or that you are slowing down the team.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER:&nbsp;</span>In meetings, you may find that you&rsquo;re focused on the TASK at hand, and that you prefer a discussion on the facts and supporting documentation. When pushed to make a decision with less than 100% of the information, you may want to stay aware of time. That is, you are likely to want more time for analysis than other team members. In some instances, you may be correct in slowing the team down to gather more facts. However, in other instances, the team may require that you move faster than you might prefer.</p>\r\n<p>In order to provide transparency about your Style, you may want to communicate to the team that your objective is simply to clarify the necessary facts, so that they make the best informed decision. Your goal is to assist in guiding the team toward that outcome. In short, your aim is to establish a clear and solid decision-making process for the team&rsquo;s future success.</p>\r\n</div>'),
(14, 4, 'DR', NULL, '+6,+7,+8,+9', '-1,-2,-3,-4', '<div class=\"sec-m-heading\">Describing Your Style - Expressive</div>\r\n<div class=\"form-des\">\r\n<h4><small>DRIVER</small>-EXPRESSIVE</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION: </span> Your primary Communication Style is Expressive. The Expressive Style can be characterized focusing on people and on developing a long-term vision for your team&rsquo;s success. Expressives hold the ability to communicate a vision that paints a picture around which others can rally. The Expressive Style collaborating and brainstorming with others, and appreciates a certain amount of creativity at work. Expressives tend to work at a rapid pace.</p>\r\n<h4>EXPRESSIVES</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to shape the environment by forming alliances with others in order to accomplish results</li>\r\n<li>Are open, stimulating, talkative, flexible, and quick-paced environments</li>\r\n<li>Focus on PEOPLE and the interaction and dynamics of the relationship</li>\r\n<li>Are irritated by routine tasks and being alone</li>\r\n<li>Appreciate having their ideas heard and enjoy selling those ideas</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL: </span> You may find yourself most comfortable in a work environment that supports an open culture, shared goals, and the ability to brainstorm in teams. You may enjoy when you, and your teams, are recognized for accomplishments.</p>\r\n<p><span class=\"sub-heading\">STRESS: </span> Expressives may experience stress when the work environment appears overly reliant on process, and not flexible in how work gets done. Expressives are uncomfortable with a slow pace, and may express that discomfort as restlessness, or dominating a conversation.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER: </span> As an Expressive, you have a talent for imagining what will occur in the future, and verbalizing that future without yet knowing all of the details. However, some other Styles may be confused as to how this future state can be imagined without those details. They may view your comments as impulsive, or even disruptive. We recommend that Expressives manage this perception by keeping a notepad with them during meetings. When Expressives wish to state their opinions, we advise them instead to use the notepad to jot down their opinions. Before the end of the meetings, Expressives can review their notes and determine which of the opinions still should be communicated to the team. Then, Expressives could ask the team for permission to cover a few items that have not yet been accounted for.</p>\r\n</div>', '<div class=\"sec-m-heading\">Your Secondary Style</div>\r\n<div class=\"form-des\">\r\n<p>While your primary Communication Style best summarizes your approach to interacting with others, your secondary Style also represents a less prominent, but important, way in which you like to communicate.</p>\r\n<h4>DRIVER</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION:&nbsp;</span>Your secondary Communication Style is Driver. The Driver Style can be characterized as having an emphasis on tasks and results. For &ldquo;Drivers,&rdquo; the key objective at work is to accomplish goals. The Driver Style tends to enjoy working with others, as long as that work is productive, and remains on-task. Drivers prefer an efficient process, which often translates into moving at a quick, targeted pace.</p>\r\n<h4>Drivers</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to shape the environment by overcoming opposition to accomplish results</li>\r\n<li>Speak in a direct manner and are self-contained</li>\r\n<li>Focus on the TASK at hand and on achieving results</li>\r\n<li>May become irritated by what they perceive as &ldquo;touchy-feely&rdquo; behavior, particularly if they sense that behavior is inhibiting immediate action</li>\r\n<li>Prefer to remain in control at all times</li>\r\n<li>Rely on their leadership skills to strive to be a &ldquo;winner&rdquo;</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL:&nbsp;</span>You may find yourself most comfortable in a work environment that maintains a focus on reproducible and accurate processes, along with high-performing teams. You may enjoy a rapid work pace, with an emphasis on goals, and where you feel surrounded by people who share a bias toward action.</p>\r\n<p><span class=\"sub-heading\">STRESS:&nbsp;</span>You may experience stress in emotionally-charged environments, particularly where interactions do not appear to be channeled toward results, you may experience stress. When confronted with such conditions, Drivers may try to create more productive conditions, and, in turn, run the risk of appearing demanding or dictatorial.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER:&nbsp;</span>As a Driver, your first instinct may be to view the workplace mainly in terms of where TASKS are completed. Your passion for results may cause you to miss the bigger picture that work involves people, and people have needs that you may not keep in the forefront of your mind. These needs may include team-bonding, casual and fun interactions, and joy in the work environment. In short, your colleagues may want more social interaction than you, and may want more social interactions from you.</p>\r\n<p>One example of how this may play out&hellip; In the morning, when you walk into the office building, your preference may be to take a straight line to your computer. You may be so focused that indeed you walk past some colleagues without so much as a &ldquo;hello&rdquo; or &ldquo;good morning.&rdquo;</p>\r\n<p>Consider, perhaps, creating a task for yourself, that each morning, you will grab a cup of coffee and greet your colleagues casually, before launching into work. This morning ritual could inspire more goodwill toward you, and may allow you to get to know your colleagues better!</p>\r\n</div>'),
(15, 4, 'AM', NULL, '+1,+2,+3,+4', '-6,-7,-8,-9', '<div class=\"sec-m-heading\">Describing Your Style - Expressive</div>\r\n<div class=\"form-des\">\r\n<h4><small>AMIABLE</small>-EXPRESSIVE</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION: </span> Your primary Communication Style is Expressive. The Expressive Style can be characterized focusing on people and on developing a long-term vision for your team&rsquo;s success. Expressives hold the ability to communicate a vision that paints a picture around which others can rally. The Expressive Style collaborating and brainstorming with others, and appreciates a certain amount of creativity at work. Expressives tend to work at a rapid pace.</p>\r\n<h4>EXPRESSIVES</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to shape the environment by forming alliances with others in order to accomplish results</li>\r\n<li>Are open, stimulating, talkative, flexible, and quick-paced environments</li>\r\n<li>Focus on PEOPLE and the interaction and dynamics of the relationship</li>\r\n<li>Are irritated by routine tasks and being alone</li>\r\n<li>Appreciate having their ideas heard and enjoy selling those ideas</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL: </span> You may find yourself most comfortable in a work environment that supports an open culture, shared goals, and the ability to brainstorm in teams. You may enjoy when you, and your teams, are recognized for accomplishments.</p>\r\n<p><span class=\"sub-heading\">STRESS: </span> Expressives may experience stress when the work environment appears overly reliant on process, and not flexible in how work gets done. Expressives are uncomfortable with a slow pace, and may express that discomfort as restlessness, or dominating a conversation.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER: </span> As an Expressive, you have a talent for imagining what will occur in the future, and verbalizing that future without yet knowing all of the details. However, some other Styles may be confused as to how this future state can be imagined without those details. They may view your comments as impulsive, or even disruptive. We recommend that Expressives manage this perception by keeping a notepad with them during meetings. When Expressives wish to state their opinions, we advise them instead to use the notepad to jot down their opinions. Before the end of the meetings, Expressives can review their notes and determine which of the opinions still should be communicated to the team. Then, Expressives could ask the team for permission to cover a few items that have not yet been accounted for.</p>\r\n</div>', '<div class=\"sec-m-heading\">Your Secondary Style</div>\r\n<div class=\"form-des\">\r\n<p>While your primary Communication Style best summarizes your approach to interacting with others, your secondary Style also represents a less prominent, but important, way in which you like to communicate.</p>\r\n<h4>AMIABLE</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION: </span> Your secondary Communication Style is Amiable. The Amiable Style can be characterized as having an emphasis on people and teams. For Amiables, the key objective at work is to achieve a sense of harmony at work. The Amiable Style greatly enjoys working with others, as long as the team is working well together to achieve their goals. Amiables prefer collaboration, which often translates into moving at a slightly slower pace, to allow for all opinions to be heard.</p>\r\n<h4>AMIABLES</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to cooperate with others and to carry out the team&rsquo;s goals</li>\r\n<li>Tend to be slower paced, easy-going, and relaxed</li>\r\n<li>Their priority is PEOPLE and relationships</li>\r\n<li>Focus on building trust and getting acquainted with others</li>\r\n<li>Are irritated by pushy and aggressive behavior</li>\r\n<li>Enjoy supportive behavior, and rely on close and secure relationships</li>\r\n<li>Acceptance is based on conformity, loyalty, and helpfulness</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL: </span> You may find yourself most comfortable in a work environment that supports an open culture, participative leadership, and teams. You may enjoy a less rushed work pace, with an emphasis on team accomplishments and recognition.</p>\r\n<p><span class=\"sub-heading\">STRESS: </span> You may experience stress in highly political, face-paced environments. While others may let political games go, you may find that they affect you deeply, and you lose productivity when others are faced with competition for resources. When confronted with such conditions, Amiables may appear &ldquo;checked out&rdquo; and unsure how to move forward.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER: </span> As an Amiable, your first instinct may be to consider work as a place where PEOPLE come together to complete team objectives. Your instinct to hear from everyone during meetings may be exactly what the team needs. However, when the team is confronted with immediate deadlines, your Style may appear to others as hindering their ability to advance. In such situations, you may consider shifting into a &ldquo;Driver&rdquo; mode, to help the team gain quick consensus, make decisions, and then develop clear action plans to achieve their objectives.</p>\r\n</div>'),
(16, 4, 'EX', NULL, '+6,+7,+8,+9', '-6,-7,-8,-9', '<div class=\"sec-m-heading\">Describing Your Style - Expressive</div>\r\n<div class=\"form-des\">\r\n<h4><small>TURBO</small>-EXPRESSIVE</h4>\r\n<p><span class=\"sub-heading\">DESCRIPTION: </span> Your primary and secondary Communication Style is Expressive. The Expressive Style can be characterized focusing on people and on developing a long-term vision for your team&rsquo;s success. Expressives hold the ability to communicate a vision that paints a picture around which others can rally. The Expressive Style collaborating and brainstorming with others, and appreciates a certain amount of creativity at work. Expressives tend to work at a rapid pace.</p>\r\n<h4>EXPRESSIVES</h4>\r\n<ul class=\"list-des list-disc\">\r\n<li>Like to shape the environment by forming alliances with others in order to accomplish results</li>\r\n<li>Are open, stimulating, talkative, flexible, and quick-paced environments</li>\r\n<li>Focus on PEOPLE and the interaction and dynamics of the relationship</li>\r\n<li>Are irritated by routine tasks and being alone</li>\r\n<li>Appreciate having their ideas heard and enjoy selling those ideas</li>\r\n</ul>\r\n<p><span class=\"sub-heading\">COMFORT LEVEL: </span> You are likely find yourself most comfortable in a fast-paced work environment that supports an open culture, shared goals, and the ability to brainstorm in teams. You may enjoy when you, and your teams, are publicly recognized for accomplishments.</p>\r\n<p><span class=\"sub-heading\">STRESS: </span> Expressives may experience stress when the work environment appears overly reliant on process, and not flexible in how work gets done. Expressives are uncomfortable with a slow pace, and may express that discomfort as restlessness, or through dominating a conversation.</p>\r\n<p><span class=\"sub-heading\">COACH&rsquo;S CORNER: </span> As a Turbo-Expressive, you have a talent for imagining what will occur in the future, and verbalizing that future without yet knowing all of the details. However, some other Styles may be confused as to how this future state can be imagined without those details. They may view your comments as impulsive, or even disruptive.</p>\r\n<p>We recommend that Expressives manage this perception by keeping a notepad with them during meetings. When Expressives wish to state their opinions, we advise them instead to use the notepad to jot down their opinions. Before the end of the meetings, Expressives can review their notes and determine which of the opinions still should be communicated to the team. Then, Expressives could ask the team for permission to cover a few items that have not yet been accounted for.</p>\r\n</div>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description1` text COLLATE utf8_unicode_ci,
  `description1_ar` text COLLATE utf8_unicode_ci,
  `description2` text COLLATE utf8_unicode_ci,
  `description2_ar` text COLLATE utf8_unicode_ci,
  `active` tinyint(4) DEFAULT '1',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) UNSIGNED DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `title`, `title_ar`, `description1`, `description1_ar`, `description2`, `description2_ar`, `active`, `slug`, `group_id`, `count`, `created_at`, `updated_at`) VALUES
(1, 'Academy for Leadership and Training', NULL, NULL, NULL, NULL, NULL, 1, 'astutesol-academy-for-leadership-and-training-1523879017', NULL, 0, '2018-04-16 09:43:37', '2018-04-16 09:43:37'),
(23, 'Academy for Leadership and Training', NULL, NULL, NULL, NULL, NULL, 1, 'individuals-academy-for-leadership-and-training-1530526992', 1, 127, '2018-07-02 19:23:12', '2018-10-11 09:13:22'),
(24, 'Academy for Leadership and Training', NULL, NULL, NULL, NULL, NULL, 1, 'astutesol-academy-for-leadership-and-training-1530528542', 2, 2, '2018-07-02 19:49:02', '2018-10-05 10:19:51'),
(25, 'Academy for Leadership and Training', NULL, NULL, NULL, NULL, NULL, 1, 'jims-company-academy-for-leadership-and-training-1530650105', 3, 5, '2018-07-04 05:35:05', '2018-09-19 06:44:01'),
(26, 'Academy for Leadership and Training', NULL, NULL, NULL, NULL, NULL, 1, 'bodybio-academy-for-leadership-and-training-1531253851', 4, 1, '2018-07-11 05:17:31', '2018-07-11 09:41:47'),
(27, 'Academy for Leadership and Training', NULL, NULL, NULL, NULL, NULL, 1, 'brandjump-academy-for-leadership-and-training-1531448210', 5, 3, '2018-07-13 11:16:50', '2018-07-15 00:27:31'),
(28, 'Academy for Leadership and Training', NULL, NULL, NULL, NULL, NULL, 1, 'omnicell-academy-for-leadership-and-training-1531520612', 6, 0, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(29, 'Academy for Leadership and Training', NULL, NULL, NULL, NULL, NULL, 1, 'cascade-comprehensive-academy-for-leadership-and-training-1538082736', 7, 1, '2018-09-28 00:12:16', '2018-09-28 00:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `survey_answer`
--

CREATE TABLE `survey_answer` (
  `id` int(11) UNSIGNED NOT NULL,
  `survey_submission_id` int(11) UNSIGNED DEFAULT NULL,
  `survey_field_id` int(11) UNSIGNED DEFAULT NULL,
  `answer` text,
  `survey_field_value_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_answer`
--

INSERT INTO `survey_answer` (`id`, `survey_submission_id`, `survey_field_id`, `answer`, `survey_field_value_id`, `created_at`, `updated_at`) VALUES
(5418, 300, 21, 'B', NULL, '2018-10-10 04:32:21', '2018-10-10 04:32:21'),
(5419, 300, 22, 'L', NULL, '2018-10-10 04:32:21', '2018-10-10 04:32:21'),
(5420, 300, 23, 'B', NULL, '2018-10-10 04:32:21', '2018-10-10 04:32:21'),
(5421, 300, 24, 'L', NULL, '2018-10-10 04:32:21', '2018-10-10 04:32:21'),
(5422, 300, 25, 'B', NULL, '2018-10-10 04:32:21', '2018-10-10 04:32:21'),
(5423, 300, 26, 'L', NULL, '2018-10-10 04:32:21', '2018-10-10 04:32:21'),
(5424, 300, 27, 'B', NULL, '2018-10-10 04:32:21', '2018-10-10 04:32:21'),
(5425, 300, 28, 'L', NULL, '2018-10-10 04:32:22', '2018-10-10 04:32:22'),
(5426, 300, 29, 'A', NULL, '2018-10-10 04:32:22', '2018-10-10 04:32:22'),
(5427, 300, 30, 'R', NULL, '2018-10-10 04:32:22', '2018-10-10 04:32:22'),
(5428, 300, 31, 'A', NULL, '2018-10-10 04:32:22', '2018-10-10 04:32:22'),
(5429, 300, 32, 'L', NULL, '2018-10-10 04:32:22', '2018-10-10 04:32:22'),
(5430, 300, 33, 'B', NULL, '2018-10-10 04:32:22', '2018-10-10 04:32:22'),
(5431, 300, 34, 'R', NULL, '2018-10-10 04:32:22', '2018-10-10 04:32:22'),
(5432, 300, 35, 'A', NULL, '2018-10-10 04:32:22', '2018-10-10 04:32:22'),
(5433, 300, 36, 'R', NULL, '2018-10-10 04:32:22', '2018-10-10 04:32:22'),
(5434, 300, 37, 'A', NULL, '2018-10-10 04:32:22', '2018-10-10 04:32:22'),
(5435, 300, 38, 'R', NULL, '2018-10-10 04:32:22', '2018-10-10 04:32:22'),
(5455, 302, 21, 'B', NULL, '2018-10-10 04:37:37', '2018-10-10 04:37:37'),
(5456, 302, 22, 'L', NULL, '2018-10-10 04:37:37', '2018-10-10 04:37:37'),
(5457, 302, 23, 'B', NULL, '2018-10-10 04:37:37', '2018-10-10 04:37:37'),
(5458, 302, 24, 'R', NULL, '2018-10-10 04:37:37', '2018-10-10 04:37:37'),
(5459, 302, 25, 'A', NULL, '2018-10-10 04:37:37', '2018-10-10 04:37:37'),
(5460, 302, 26, 'R', NULL, '2018-10-10 04:37:38', '2018-10-10 04:37:38'),
(5461, 302, 27, 'A', NULL, '2018-10-10 04:37:38', '2018-10-10 04:37:38'),
(5462, 302, 28, 'R', NULL, '2018-10-10 04:37:38', '2018-10-10 04:37:38'),
(5463, 302, 29, 'A', NULL, '2018-10-10 04:37:38', '2018-10-10 04:37:38'),
(5464, 302, 30, 'R', NULL, '2018-10-10 04:37:38', '2018-10-10 04:37:38'),
(5465, 302, 31, 'A', NULL, '2018-10-10 04:37:38', '2018-10-10 04:37:38'),
(5466, 302, 32, 'R', NULL, '2018-10-10 04:37:38', '2018-10-10 04:37:38'),
(5467, 302, 33, 'A', NULL, '2018-10-10 04:37:38', '2018-10-10 04:37:38'),
(5468, 302, 34, 'R', NULL, '2018-10-10 04:37:38', '2018-10-10 04:37:38'),
(5469, 302, 35, 'A', NULL, '2018-10-10 04:37:38', '2018-10-10 04:37:38'),
(5470, 302, 36, 'R', NULL, '2018-10-10 04:37:38', '2018-10-10 04:37:38'),
(5471, 302, 37, 'A', NULL, '2018-10-10 04:37:38', '2018-10-10 04:37:38'),
(5472, 302, 38, 'R', NULL, '2018-10-10 04:37:38', '2018-10-10 04:37:38'),
(5473, 302, 39, 'A', NULL, '2018-10-10 04:37:38', '2018-10-10 04:37:38'),
(5474, 303, 21, 'A', NULL, '2018-10-10 04:41:05', '2018-10-10 04:41:05'),
(5475, 303, 22, 'L', NULL, '2018-10-10 04:41:05', '2018-10-10 04:41:05'),
(5476, 303, 23, 'B', NULL, '2018-10-10 04:41:05', '2018-10-10 04:41:05'),
(5477, 303, 24, 'L', NULL, '2018-10-10 04:41:06', '2018-10-10 04:41:06'),
(5478, 303, 25, 'A', NULL, '2018-10-10 04:41:06', '2018-10-10 04:41:06'),
(5479, 303, 26, 'R', NULL, '2018-10-10 04:41:06', '2018-10-10 04:41:06'),
(5480, 303, 27, 'A', NULL, '2018-10-10 04:41:06', '2018-10-10 04:41:06'),
(5481, 303, 28, 'L', NULL, '2018-10-10 04:41:06', '2018-10-10 04:41:06'),
(5482, 303, 29, 'B', NULL, '2018-10-10 04:41:06', '2018-10-10 04:41:06'),
(5483, 303, 30, 'R', NULL, '2018-10-10 04:41:06', '2018-10-10 04:41:06'),
(5484, 303, 31, 'A', NULL, '2018-10-10 04:41:06', '2018-10-10 04:41:06'),
(5485, 303, 32, 'R', NULL, '2018-10-10 04:41:06', '2018-10-10 04:41:06'),
(5486, 303, 33, 'A', NULL, '2018-10-10 04:41:06', '2018-10-10 04:41:06'),
(5487, 303, 34, 'R', NULL, '2018-10-10 04:41:06', '2018-10-10 04:41:06'),
(5488, 303, 35, 'A', NULL, '2018-10-10 04:41:06', '2018-10-10 04:41:06'),
(5489, 303, 36, 'L', NULL, '2018-10-10 04:41:06', '2018-10-10 04:41:06'),
(5490, 303, 37, 'B', NULL, '2018-10-10 04:41:06', '2018-10-10 04:41:06'),
(5491, 303, 38, 'R', NULL, '2018-10-10 04:41:06', '2018-10-10 04:41:06'),
(5492, 304, 21, 'B', NULL, '2018-10-10 04:43:43', '2018-10-10 04:43:43'),
(5493, 304, 22, 'R', NULL, '2018-10-10 04:43:43', '2018-10-10 04:43:43'),
(5494, 304, 23, 'A', NULL, '2018-10-10 04:43:43', '2018-10-10 04:43:43'),
(5495, 304, 24, 'R', NULL, '2018-10-10 04:43:43', '2018-10-10 04:43:43'),
(5496, 304, 25, 'A', NULL, '2018-10-10 04:43:43', '2018-10-10 04:43:43'),
(5497, 304, 26, 'R', NULL, '2018-10-10 04:43:43', '2018-10-10 04:43:43'),
(5498, 304, 27, 'A', NULL, '2018-10-10 04:43:43', '2018-10-10 04:43:43'),
(5499, 304, 28, 'R', NULL, '2018-10-10 04:43:43', '2018-10-10 04:43:43'),
(5500, 304, 29, 'A', NULL, '2018-10-10 04:43:43', '2018-10-10 04:43:43'),
(5501, 304, 30, 'L', NULL, '2018-10-10 04:43:43', '2018-10-10 04:43:43'),
(5502, 304, 31, 'B', NULL, '2018-10-10 04:43:43', '2018-10-10 04:43:43'),
(5503, 304, 32, 'R', NULL, '2018-10-10 04:43:43', '2018-10-10 04:43:43'),
(5504, 304, 33, 'A', NULL, '2018-10-10 04:43:43', '2018-10-10 04:43:43'),
(5505, 304, 34, 'R', NULL, '2018-10-10 04:43:43', '2018-10-10 04:43:43'),
(5506, 304, 35, 'A', NULL, '2018-10-10 04:43:44', '2018-10-10 04:43:44'),
(5507, 304, 36, 'R', NULL, '2018-10-10 04:43:44', '2018-10-10 04:43:44'),
(5508, 304, 37, 'A', NULL, '2018-10-10 04:43:44', '2018-10-10 04:43:44'),
(5509, 304, 38, 'R', NULL, '2018-10-10 04:43:44', '2018-10-10 04:43:44'),
(5510, 304, 39, 'A', NULL, '2018-10-10 04:43:44', '2018-10-10 04:43:44'),
(5511, 305, 21, 'A', NULL, '2018-10-10 04:46:03', '2018-10-10 04:46:03'),
(5512, 305, 22, 'L', NULL, '2018-10-10 04:46:03', '2018-10-10 04:46:03'),
(5513, 305, 23, 'B', NULL, '2018-10-10 04:46:03', '2018-10-10 04:46:03'),
(5514, 305, 24, 'R', NULL, '2018-10-10 04:46:04', '2018-10-10 04:46:04'),
(5515, 305, 25, 'A', NULL, '2018-10-10 04:46:04', '2018-10-10 04:46:04'),
(5516, 305, 26, 'L', NULL, '2018-10-10 04:46:04', '2018-10-10 04:46:04'),
(5517, 305, 27, 'B', NULL, '2018-10-10 04:46:04', '2018-10-10 04:46:04'),
(5518, 305, 28, 'R', NULL, '2018-10-10 04:46:04', '2018-10-10 04:46:04'),
(5519, 305, 29, 'A', NULL, '2018-10-10 04:46:04', '2018-10-10 04:46:04'),
(5520, 305, 30, 'R', NULL, '2018-10-10 04:46:04', '2018-10-10 04:46:04'),
(5521, 305, 31, 'B', NULL, '2018-10-10 04:46:04', '2018-10-10 04:46:04'),
(5522, 305, 32, 'R', NULL, '2018-10-10 04:46:04', '2018-10-10 04:46:04'),
(5523, 305, 33, 'B', NULL, '2018-10-10 04:46:04', '2018-10-10 04:46:04'),
(5524, 305, 34, 'R', NULL, '2018-10-10 04:46:04', '2018-10-10 04:46:04'),
(5525, 305, 35, 'A', NULL, '2018-10-10 04:46:04', '2018-10-10 04:46:04'),
(5526, 305, 36, 'R', NULL, '2018-10-10 04:46:04', '2018-10-10 04:46:04'),
(5527, 305, 37, 'A', NULL, '2018-10-10 04:46:04', '2018-10-10 04:46:04'),
(5528, 305, 38, 'R', NULL, '2018-10-10 04:46:04', '2018-10-10 04:46:04'),
(5529, 305, 40, 'L', NULL, '2018-10-10 04:46:04', '2018-10-10 04:46:04'),
(5728, 317, 21, 'A', NULL, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(5729, 317, 22, 'R', NULL, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(5730, 317, 23, 'A', NULL, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(5731, 317, 24, 'R', NULL, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(5732, 317, 25, 'A', NULL, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(5733, 317, 26, 'R', NULL, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(5734, 317, 27, 'A', NULL, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(5735, 317, 28, 'R', NULL, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(5736, 317, 29, 'A', NULL, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(5737, 317, 30, 'R', NULL, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(5738, 317, 31, 'A', NULL, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(5739, 317, 32, 'R', NULL, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(5740, 317, 33, 'A', NULL, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(5741, 317, 34, 'R', NULL, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(5742, 317, 35, 'A', NULL, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(5743, 317, 36, 'R', NULL, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(5744, 317, 37, 'A', NULL, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(5745, 317, 38, 'R', NULL, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(5746, 318, 21, 'B', NULL, '2018-10-10 05:22:24', '2018-10-10 05:22:24'),
(5747, 318, 22, 'L', NULL, '2018-10-10 05:22:24', '2018-10-10 05:22:24'),
(5748, 318, 23, 'B', NULL, '2018-10-10 05:22:24', '2018-10-10 05:22:24'),
(5749, 318, 24, 'L', NULL, '2018-10-10 05:22:25', '2018-10-10 05:22:25'),
(5750, 318, 25, 'B', NULL, '2018-10-10 05:22:25', '2018-10-10 05:22:25'),
(5751, 318, 26, 'L', NULL, '2018-10-10 05:22:25', '2018-10-10 05:22:25'),
(5752, 318, 27, 'B', NULL, '2018-10-10 05:22:25', '2018-10-10 05:22:25'),
(5753, 318, 28, 'L', NULL, '2018-10-10 05:22:25', '2018-10-10 05:22:25'),
(5754, 318, 29, 'B', NULL, '2018-10-10 05:22:25', '2018-10-10 05:22:25'),
(5755, 318, 30, 'L', NULL, '2018-10-10 05:22:25', '2018-10-10 05:22:25'),
(5756, 318, 31, 'B', NULL, '2018-10-10 05:22:25', '2018-10-10 05:22:25'),
(5757, 318, 32, 'L', NULL, '2018-10-10 05:22:25', '2018-10-10 05:22:25'),
(5758, 318, 33, 'B', NULL, '2018-10-10 05:22:25', '2018-10-10 05:22:25'),
(5759, 318, 34, 'L', NULL, '2018-10-10 05:22:25', '2018-10-10 05:22:25'),
(5760, 318, 35, 'B', NULL, '2018-10-10 05:22:25', '2018-10-10 05:22:25'),
(5761, 318, 36, 'L', NULL, '2018-10-10 05:22:25', '2018-10-10 05:22:25'),
(5762, 318, 37, 'B', NULL, '2018-10-10 05:22:25', '2018-10-10 05:22:25'),
(5763, 318, 38, 'L', NULL, '2018-10-10 05:22:25', '2018-10-10 05:22:25'),
(5764, 319, 21, 'B', NULL, '2018-10-10 05:25:32', '2018-10-10 05:25:32'),
(5765, 319, 22, 'L', NULL, '2018-10-10 05:25:32', '2018-10-10 05:25:32'),
(5766, 319, 23, 'B', NULL, '2018-10-10 05:25:33', '2018-10-10 05:25:33'),
(5767, 319, 24, 'L', NULL, '2018-10-10 05:25:33', '2018-10-10 05:25:33'),
(5768, 319, 25, 'B', NULL, '2018-10-10 05:25:33', '2018-10-10 05:25:33'),
(5769, 319, 26, 'L', NULL, '2018-10-10 05:25:33', '2018-10-10 05:25:33'),
(5770, 319, 27, 'B', NULL, '2018-10-10 05:25:33', '2018-10-10 05:25:33'),
(5771, 319, 28, 'L', NULL, '2018-10-10 05:25:33', '2018-10-10 05:25:33'),
(5772, 319, 29, 'B', NULL, '2018-10-10 05:25:33', '2018-10-10 05:25:33'),
(5773, 319, 30, 'L', NULL, '2018-10-10 05:25:33', '2018-10-10 05:25:33'),
(5774, 319, 31, 'B', NULL, '2018-10-10 05:25:33', '2018-10-10 05:25:33'),
(5775, 319, 32, 'L', NULL, '2018-10-10 05:25:33', '2018-10-10 05:25:33'),
(5776, 319, 33, 'B', NULL, '2018-10-10 05:25:33', '2018-10-10 05:25:33'),
(5777, 319, 34, 'L', NULL, '2018-10-10 05:25:33', '2018-10-10 05:25:33'),
(5778, 319, 35, 'B', NULL, '2018-10-10 05:25:33', '2018-10-10 05:25:33'),
(5779, 319, 36, 'L', NULL, '2018-10-10 05:25:33', '2018-10-10 05:25:33'),
(5780, 319, 37, 'B', NULL, '2018-10-10 05:25:33', '2018-10-10 05:25:33'),
(5781, 319, 38, 'L', NULL, '2018-10-10 05:25:33', '2018-10-10 05:25:33'),
(5782, 320, 21, 'B', NULL, '2018-10-10 05:29:02', '2018-10-10 05:29:02'),
(5783, 320, 22, 'L', NULL, '2018-10-10 05:29:02', '2018-10-10 05:29:02'),
(5784, 320, 23, 'B', NULL, '2018-10-10 05:29:02', '2018-10-10 05:29:02'),
(5785, 320, 24, 'L', NULL, '2018-10-10 05:29:03', '2018-10-10 05:29:03'),
(5786, 320, 25, 'B', NULL, '2018-10-10 05:29:03', '2018-10-10 05:29:03'),
(5787, 320, 26, 'L', NULL, '2018-10-10 05:29:03', '2018-10-10 05:29:03'),
(5788, 320, 27, 'B', NULL, '2018-10-10 05:29:03', '2018-10-10 05:29:03'),
(5789, 320, 28, 'L', NULL, '2018-10-10 05:29:03', '2018-10-10 05:29:03'),
(5790, 320, 29, 'B', NULL, '2018-10-10 05:29:03', '2018-10-10 05:29:03'),
(5791, 320, 30, 'L', NULL, '2018-10-10 05:29:03', '2018-10-10 05:29:03'),
(5792, 320, 31, 'B', NULL, '2018-10-10 05:29:03', '2018-10-10 05:29:03'),
(5793, 320, 32, 'L', NULL, '2018-10-10 05:29:03', '2018-10-10 05:29:03'),
(5794, 320, 33, 'B', NULL, '2018-10-10 05:29:03', '2018-10-10 05:29:03'),
(5795, 320, 34, 'L', NULL, '2018-10-10 05:29:03', '2018-10-10 05:29:03'),
(5796, 320, 35, 'B', NULL, '2018-10-10 05:29:03', '2018-10-10 05:29:03'),
(5797, 320, 36, 'L', NULL, '2018-10-10 05:29:03', '2018-10-10 05:29:03'),
(5798, 320, 37, 'B', NULL, '2018-10-10 05:29:03', '2018-10-10 05:29:03'),
(5799, 320, 38, 'L', NULL, '2018-10-10 05:29:03', '2018-10-10 05:29:03'),
(5800, 321, 21, 'B', NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(5801, 321, 22, 'L', NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(5802, 321, 23, 'B', NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(5803, 321, 24, 'L', NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(5804, 321, 25, 'B', NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(5805, 321, 26, 'L', NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(5806, 321, 27, 'B', NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(5807, 321, 28, 'L', NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(5808, 321, 29, 'B', NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(5809, 321, 30, 'L', NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(5810, 321, 31, 'B', NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(5811, 321, 32, 'L', NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(5812, 321, 33, 'B', NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(5813, 321, 34, 'L', NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(5814, 321, 35, 'B', NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(5815, 321, 36, 'L', NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(5816, 321, 37, 'B', NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(5817, 321, 38, 'L', NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(5818, 322, 21, 'B', NULL, '2018-10-10 05:32:44', '2018-10-10 05:32:44'),
(5819, 322, 22, 'L', NULL, '2018-10-10 05:32:44', '2018-10-10 05:32:44'),
(5820, 322, 23, 'B', NULL, '2018-10-10 05:32:44', '2018-10-10 05:32:44'),
(5821, 322, 24, 'L', NULL, '2018-10-10 05:32:44', '2018-10-10 05:32:44'),
(5822, 322, 25, 'B', NULL, '2018-10-10 05:32:45', '2018-10-10 05:32:45'),
(5823, 322, 26, 'L', NULL, '2018-10-10 05:32:45', '2018-10-10 05:32:45'),
(5824, 322, 27, 'B', NULL, '2018-10-10 05:32:45', '2018-10-10 05:32:45'),
(5825, 322, 28, 'L', NULL, '2018-10-10 05:32:45', '2018-10-10 05:32:45'),
(5826, 322, 29, 'B', NULL, '2018-10-10 05:32:45', '2018-10-10 05:32:45'),
(5827, 322, 30, 'L', NULL, '2018-10-10 05:32:45', '2018-10-10 05:32:45'),
(5828, 322, 31, 'B', NULL, '2018-10-10 05:32:45', '2018-10-10 05:32:45'),
(5829, 322, 32, 'L', NULL, '2018-10-10 05:32:45', '2018-10-10 05:32:45'),
(5830, 322, 33, 'B', NULL, '2018-10-10 05:32:45', '2018-10-10 05:32:45'),
(5831, 322, 34, 'L', NULL, '2018-10-10 05:32:45', '2018-10-10 05:32:45'),
(5832, 322, 35, 'B', NULL, '2018-10-10 05:32:45', '2018-10-10 05:32:45'),
(5833, 322, 36, 'L', NULL, '2018-10-10 05:32:45', '2018-10-10 05:32:45'),
(5834, 322, 37, 'B', NULL, '2018-10-10 05:32:45', '2018-10-10 05:32:45'),
(5835, 322, 38, 'L', NULL, '2018-10-10 05:32:45', '2018-10-10 05:32:45'),
(5836, 323, 21, 'B', NULL, '2018-10-10 05:37:40', '2018-10-10 05:37:40'),
(5837, 323, 22, 'R', NULL, '2018-10-10 05:37:40', '2018-10-10 05:37:40'),
(5838, 323, 23, 'A', NULL, '2018-10-10 05:37:40', '2018-10-10 05:37:40'),
(5839, 323, 24, 'R', NULL, '2018-10-10 05:37:40', '2018-10-10 05:37:40'),
(5840, 323, 25, 'B', NULL, '2018-10-10 05:37:41', '2018-10-10 05:37:41'),
(5841, 323, 26, 'L', NULL, '2018-10-10 05:37:41', '2018-10-10 05:37:41'),
(5842, 323, 27, 'A', NULL, '2018-10-10 05:37:41', '2018-10-10 05:37:41'),
(5843, 323, 28, 'R', NULL, '2018-10-10 05:37:41', '2018-10-10 05:37:41'),
(5844, 323, 29, 'B', NULL, '2018-10-10 05:37:41', '2018-10-10 05:37:41'),
(5845, 323, 30, 'L', NULL, '2018-10-10 05:37:41', '2018-10-10 05:37:41'),
(5846, 323, 31, 'A', NULL, '2018-10-10 05:37:41', '2018-10-10 05:37:41'),
(5847, 323, 32, 'R', NULL, '2018-10-10 05:37:41', '2018-10-10 05:37:41'),
(5848, 323, 33, 'B', NULL, '2018-10-10 05:37:41', '2018-10-10 05:37:41'),
(5849, 323, 34, 'L', NULL, '2018-10-10 05:37:41', '2018-10-10 05:37:41'),
(5850, 323, 35, 'A', NULL, '2018-10-10 05:37:41', '2018-10-10 05:37:41'),
(5851, 323, 36, 'R', NULL, '2018-10-10 05:37:41', '2018-10-10 05:37:41'),
(5852, 323, 37, 'B', NULL, '2018-10-10 05:37:41', '2018-10-10 05:37:41'),
(5853, 323, 38, 'L', NULL, '2018-10-10 05:37:41', '2018-10-10 05:37:41'),
(5854, 324, 21, 'B', NULL, '2018-10-10 06:03:51', '2018-10-10 06:03:51'),
(5855, 324, 22, 'L', NULL, '2018-10-10 06:03:51', '2018-10-10 06:03:51'),
(5856, 324, 23, 'B', NULL, '2018-10-10 06:03:51', '2018-10-10 06:03:51'),
(5857, 324, 24, 'R', NULL, '2018-10-10 06:03:51', '2018-10-10 06:03:51'),
(5858, 324, 25, 'A', NULL, '2018-10-10 06:03:51', '2018-10-10 06:03:51'),
(5859, 324, 26, 'R', NULL, '2018-10-10 06:03:51', '2018-10-10 06:03:51'),
(5860, 324, 27, 'A', NULL, '2018-10-10 06:03:51', '2018-10-10 06:03:51'),
(5861, 324, 28, 'R', NULL, '2018-10-10 06:03:51', '2018-10-10 06:03:51'),
(5862, 324, 29, 'A', NULL, '2018-10-10 06:03:52', '2018-10-10 06:03:52'),
(5863, 324, 30, 'R', NULL, '2018-10-10 06:03:52', '2018-10-10 06:03:52'),
(5864, 324, 31, 'A', NULL, '2018-10-10 06:03:52', '2018-10-10 06:03:52'),
(5865, 324, 32, 'R', NULL, '2018-10-10 06:03:52', '2018-10-10 06:03:52'),
(5866, 324, 33, 'B', NULL, '2018-10-10 06:03:52', '2018-10-10 06:03:52'),
(5867, 324, 34, 'L', NULL, '2018-10-10 06:03:52', '2018-10-10 06:03:52'),
(5868, 324, 35, 'B', NULL, '2018-10-10 06:03:52', '2018-10-10 06:03:52'),
(5869, 324, 36, 'L', NULL, '2018-10-10 06:03:52', '2018-10-10 06:03:52'),
(5870, 324, 37, 'A', NULL, '2018-10-10 06:03:52', '2018-10-10 06:03:52'),
(5871, 324, 38, 'R', NULL, '2018-10-10 06:03:52', '2018-10-10 06:03:52'),
(5926, 328, 21, 'A', NULL, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(5927, 328, 22, 'L', NULL, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(5928, 328, 23, 'B', NULL, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(5929, 328, 24, 'L', NULL, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(5930, 328, 25, 'B', NULL, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(5931, 328, 26, 'L', NULL, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(5932, 328, 27, 'B', NULL, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(5933, 328, 28, 'R', NULL, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(5934, 328, 29, 'A', NULL, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(5935, 328, 30, 'L', NULL, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(5936, 328, 31, 'B', NULL, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(5937, 328, 32, 'L', NULL, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(5938, 328, 33, 'B', NULL, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(5939, 328, 34, 'L', NULL, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(5940, 328, 35, 'B', NULL, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(5941, 328, 36, 'R', NULL, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(5942, 328, 37, 'A', NULL, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(5943, 328, 38, 'R', NULL, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(5944, 329, 21, 'A', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5945, 329, 22, 'L', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5946, 329, 23, 'B', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5947, 329, 24, 'L', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5948, 329, 25, 'B', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5949, 329, 26, 'L', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5950, 329, 27, 'A', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5951, 329, 28, 'R', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5952, 329, 29, 'A', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5953, 329, 30, 'R', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5954, 329, 31, 'A', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5955, 329, 32, 'R', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5956, 329, 33, 'A', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5957, 329, 34, 'R', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5958, 329, 35, 'A', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5959, 329, 36, 'R', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5960, 329, 37, 'A', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5961, 329, 38, 'R', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5962, 329, 39, 'A', NULL, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(5963, 330, 21, 'A', NULL, '2018-10-11 09:11:47', '2018-10-11 09:11:47'),
(5964, 330, 22, 'L', NULL, '2018-10-11 09:11:47', '2018-10-11 09:11:47'),
(5965, 330, 23, 'B', NULL, '2018-10-11 09:11:47', '2018-10-11 09:11:47'),
(5966, 330, 24, 'R', NULL, '2018-10-11 09:11:47', '2018-10-11 09:11:47'),
(5967, 330, 25, 'A', NULL, '2018-10-11 09:11:47', '2018-10-11 09:11:47'),
(5968, 330, 26, 'L', NULL, '2018-10-11 09:11:47', '2018-10-11 09:11:47'),
(5969, 330, 27, 'B', NULL, '2018-10-11 09:11:47', '2018-10-11 09:11:47'),
(5970, 330, 28, 'R', NULL, '2018-10-11 09:11:47', '2018-10-11 09:11:47'),
(5971, 330, 29, 'A', NULL, '2018-10-11 09:11:47', '2018-10-11 09:11:47'),
(5972, 330, 30, 'L', NULL, '2018-10-11 09:11:47', '2018-10-11 09:11:47'),
(5973, 330, 31, 'B', NULL, '2018-10-11 09:11:47', '2018-10-11 09:11:47'),
(5974, 330, 32, 'R', NULL, '2018-10-11 09:11:47', '2018-10-11 09:11:47'),
(5975, 330, 33, 'A', NULL, '2018-10-11 09:11:47', '2018-10-11 09:11:47'),
(5976, 330, 34, 'R', NULL, '2018-10-11 09:11:47', '2018-10-11 09:11:47'),
(5977, 330, 35, 'A', NULL, '2018-10-11 09:11:47', '2018-10-11 09:11:47'),
(5978, 330, 36, 'L', NULL, '2018-10-11 09:11:47', '2018-10-11 09:11:47'),
(5979, 330, 37, 'B', NULL, '2018-10-11 09:11:47', '2018-10-11 09:11:47'),
(5980, 330, 38, 'L', NULL, '2018-10-11 09:11:48', '2018-10-11 09:11:48'),
(5981, 331, 21, 'B', NULL, '2018-10-11 09:13:21', '2018-10-11 09:13:21'),
(5982, 331, 22, 'R', NULL, '2018-10-11 09:13:21', '2018-10-11 09:13:21'),
(5983, 331, 23, 'A', NULL, '2018-10-11 09:13:21', '2018-10-11 09:13:21'),
(5984, 331, 24, 'L', NULL, '2018-10-11 09:13:21', '2018-10-11 09:13:21'),
(5985, 331, 25, 'B', NULL, '2018-10-11 09:13:21', '2018-10-11 09:13:21'),
(5986, 331, 26, 'R', NULL, '2018-10-11 09:13:21', '2018-10-11 09:13:21'),
(5987, 331, 27, 'A', NULL, '2018-10-11 09:13:22', '2018-10-11 09:13:22'),
(5988, 331, 28, 'L', NULL, '2018-10-11 09:13:22', '2018-10-11 09:13:22'),
(5989, 331, 29, 'B', NULL, '2018-10-11 09:13:22', '2018-10-11 09:13:22'),
(5990, 331, 30, 'L', NULL, '2018-10-11 09:13:22', '2018-10-11 09:13:22'),
(5991, 331, 31, 'B', NULL, '2018-10-11 09:13:22', '2018-10-11 09:13:22'),
(5992, 331, 32, 'R', NULL, '2018-10-11 09:13:22', '2018-10-11 09:13:22'),
(5993, 331, 33, 'A', NULL, '2018-10-11 09:13:22', '2018-10-11 09:13:22'),
(5994, 331, 34, 'R', NULL, '2018-10-11 09:13:22', '2018-10-11 09:13:22'),
(5995, 331, 35, 'B', NULL, '2018-10-11 09:13:22', '2018-10-11 09:13:22'),
(5996, 331, 36, 'L', NULL, '2018-10-11 09:13:22', '2018-10-11 09:13:22'),
(5997, 331, 37, 'A', NULL, '2018-10-11 09:13:22', '2018-10-11 09:13:22'),
(5998, 331, 38, 'R', NULL, '2018-10-11 09:13:22', '2018-10-11 09:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `survey_field`
--

CREATE TABLE `survey_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `label_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `survey_id` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `require` tinyint(4) DEFAULT '1',
  `is_grid` tinyint(4) DEFAULT '1',
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `is_extra` tinyint(1) DEFAULT '0',
  `extra_class` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `survey_field`
--

INSERT INTO `survey_field` (`id`, `label`, `label_ar`, `type`, `survey_id`, `active`, `require`, `is_grid`, `category_id`, `display_order`, `is_extra`, `extra_class`, `created_at`, `updated_at`) VALUES
(1, 'Less use of hands when talking | More use of hand when talking', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 0, NULL, '2018-04-16 09:44:30', '2018-04-16 09:44:30'),
(2, 'Speaks in a louder tone of voice | Speaks in a softer tone of voice', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 0, NULL, '2018-04-16 09:50:46', '2018-04-16 09:50:46'),
(3, 'Uses few body movements | Uses many body movements', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 0, NULL, '2018-04-16 09:51:22', '2018-04-16 09:51:22'),
(4, 'Speaks at a quicker pace | Speaks at a slower pace', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 0, NULL, '2018-04-16 09:51:55', '2018-04-16 09:51:55'),
(5, 'has few facial expressions | Has animated facial expressions', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 0, NULL, '2018-04-16 09:52:34', '2018-04-16 09:52:34'),
(6, 'Tends to speak rather then listen | Tends to listen rather then speak', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 0, NULL, '2018-04-16 09:53:06', '2018-04-16 09:53:06'),
(7, 'Appears serious and controlled | Appears more warm and personable', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 0, NULL, '2018-04-16 09:53:51', '2018-04-16 09:53:51'),
(8, 'leans forward when talking | Leans back when talking', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 0, NULL, '2018-04-16 09:54:26', '2018-04-16 09:54:26'),
(9, 'Tends to stick to schedule and is structured | Is less structured and more flexible with time', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 0, NULL, '2018-04-16 09:55:10', '2018-04-16 09:55:10'),
(10, 'States fact and opinions more strongly | States fact and opinions more tentatively', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 0, NULL, '2018-04-16 09:55:42', '2018-04-16 09:55:42'),
(11, 'focuses more on tasks and information | Likes to tell stories and use metaphors', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 0, NULL, '2018-04-16 09:56:17', '2018-04-16 09:56:17'),
(12, 'Makes a decision quickly | Takes time in making a decision', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 0, NULL, '2018-04-16 09:56:57', '2018-04-16 09:56:57'),
(13, 'Not as easy to approach and speak with | Easy to approach and speak with', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 0, NULL, '2018-04-16 09:57:24', '2018-04-16 09:57:24'),
(14, 'Is a risk taker and often moves forward without all the answers | Is cautious and likes to take reflective risk', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 0, NULL, '2018-04-16 09:58:12', '2018-04-16 09:58:12'),
(15, 'Decisions based on fact and logic | Decisions based on feelings', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 0, NULL, '2018-04-16 09:58:57', '2018-04-16 09:58:57'),
(16, 'Likes to get answers quickly | Does not pressure others for answers', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 0, NULL, '2018-04-16 09:59:43', '2018-04-16 09:59:43'),
(17, 'Likes to prefer to spend time alone | Tends to be more social and engaging', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 0, NULL, '2018-04-16 10:00:14', '2018-04-16 10:00:14'),
(18, 'More direct eye contact | Less direct eye contact', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 0, NULL, '2018-04-16 10:00:43', '2018-04-16 10:00:43'),
(19, 'Appears more formal when communicating | Appears less formal, and more relaxed when communicating', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 1, 'ab', '2018-04-24 19:00:00', '2018-04-24 19:00:00'),
(20, 'Tends to be more competitive | Tends to be more cooperative with others', NULL, 'radio', 1, 1, 1, 1, NULL, NULL, 1, 'rl', '2018-04-24 19:00:00', '2018-04-24 19:00:00'),
(21, 'Less use of hands when talking | More use of hand when talking', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(22, 'Speaks in a louder tone of voice | Speaks in a softer tone of voice', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(23, 'Uses few body movements | Uses many body movements', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(24, 'Speaks at a quicker pace | Speaks at a slower pace', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(25, 'has few facial expressions | Has animated facial expressions', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(26, 'Tends to speak rather then listen | Tends to listen rather then speak', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(27, 'Appears serious and controlled | Appears more warm and personable', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(28, 'leans forward when talking | Leans back when talking', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(29, 'Tends to stick to schedule and is structured | Is less structured and more flexible with time', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(30, 'States fact and opinions more strongly | States fact and opinions more tentatively', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(31, 'focuses more on tasks and information | Likes to tell stories and use metaphors', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(32, 'Makes a decision quickly | Takes time in making a decision', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(33, 'Not as easy to approach and speak with | Easy to approach and speak with', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(34, 'Is a risk taker and often moves forward without all the answers | Is cautious and likes to take reflective risk', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(35, 'Decisions based on fact and logic | Decisions based on feelings', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(36, 'Likes to get answers quickly | Does not pressure others for answers', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(37, 'Likes to prefer to spend time alone | Tends to be more social and engaging', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(38, 'More direct eye contact | Less direct eye contact', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(39, 'Appears more formal when communicating | Appears less formal, and more relaxed when communicating', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 1, 'ab', '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(40, 'Tends to be more competitive | Tends to be more cooperative with others', NULL, 'radio', 23, 1, 1, 1, NULL, NULL, 1, 'rl', '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(41, 'Less use of hands when talking | More use of hand when talking', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(42, 'Speaks in a louder tone of voice | Speaks in a softer tone of voice', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(43, 'Uses few body movements | Uses many body movements', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(44, 'Speaks at a quicker pace | Speaks at a slower pace', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(45, 'has few facial expressions | Has animated facial expressions', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(46, 'Tends to speak rather then listen | Tends to listen rather then speak', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(47, 'Appears serious and controlled | Appears more warm and personable', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(48, 'leans forward when talking | Leans back when talking', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(49, 'Tends to stick to schedule and is structured | Is less structured and more flexible with time', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(50, 'States fact and opinions more strongly | States fact and opinions more tentatively', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(51, 'focuses more on tasks and information | Likes to tell stories and use metaphors', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(52, 'Makes a decision quickly | Takes time in making a decision', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(53, 'Not as easy to approach and speak with | Easy to approach and speak with', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(54, 'Is a risk taker and often moves forward without all the answers | Is cautious and likes to take reflective risk', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(55, 'Decisions based on fact and logic | Decisions based on feelings', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(56, 'Likes to get answers quickly | Does not pressure others for answers', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(57, 'Likes to prefer to spend time alone | Tends to be more social and engaging', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(58, 'More direct eye contact | Less direct eye contact', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(59, 'Appears more formal when communicating | Appears less formal, and more relaxed when communicating', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 1, 'ab', '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(60, 'Tends to be more competitive | Tends to be more cooperative with others', NULL, 'radio', 24, 1, 1, 1, NULL, NULL, 1, 'rl', '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(61, 'Less use of hands when talking | More use of hand when talking', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(62, 'Speaks in a louder tone of voice | Speaks in a softer tone of voice', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(63, 'Uses few body movements | Uses many body movements', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(64, 'Speaks at a quicker pace | Speaks at a slower pace', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(65, 'has few facial expressions | Has animated facial expressions', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(66, 'Tends to speak rather then listen | Tends to listen rather then speak', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(67, 'Appears serious and controlled | Appears more warm and personable', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(68, 'leans forward when talking | Leans back when talking', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(69, 'Tends to stick to schedule and is structured | Is less structured and more flexible with time', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(70, 'States fact and opinions more strongly | States fact and opinions more tentatively', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(71, 'focuses more on tasks and information | Likes to tell stories and use metaphors', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(72, 'Makes a decision quickly | Takes time in making a decision', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(73, 'Not as easy to approach and speak with | Easy to approach and speak with', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(74, 'Is a risk taker and often moves forward without all the answers | Is cautious and likes to take reflective risk', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(75, 'Decisions based on fact and logic | Decisions based on feelings', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(76, 'Likes to get answers quickly | Does not pressure others for answers', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(77, 'Likes to prefer to spend time alone | Tends to be more social and engaging', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(78, 'More direct eye contact | Less direct eye contact', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(79, 'Appears more formal when communicating | Appears less formal, and more relaxed when communicating', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 1, 'ab', '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(80, 'Tends to be more competitive | Tends to be more cooperative with others', NULL, 'radio', 25, 1, 1, 1, NULL, NULL, 1, 'rl', '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(81, 'Less use of hands when talking | More use of hand when talking', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(82, 'Speaks in a louder tone of voice | Speaks in a softer tone of voice', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(83, 'Uses few body movements | Uses many body movements', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(84, 'Speaks at a quicker pace | Speaks at a slower pace', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(85, 'has few facial expressions | Has animated facial expressions', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(86, 'Tends to speak rather then listen | Tends to listen rather then speak', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(87, 'Appears serious and controlled | Appears more warm and personable', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(88, 'leans forward when talking | Leans back when talking', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(89, 'Tends to stick to schedule and is structured | Is less structured and more flexible with time', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(90, 'States fact and opinions more strongly | States fact and opinions more tentatively', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(91, 'focuses more on tasks and information | Likes to tell stories and use metaphors', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(92, 'Makes a decision quickly | Takes time in making a decision', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(93, 'Not as easy to approach and speak with | Easy to approach and speak with', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(94, 'Is a risk taker and often moves forward without all the answers | Is cautious and likes to take reflective risk', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(95, 'Decisions based on fact and logic | Decisions based on feelings', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(96, 'Likes to get answers quickly | Does not pressure others for answers', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(97, 'Likes to prefer to spend time alone | Tends to be more social and engaging', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(98, 'More direct eye contact | Less direct eye contact', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(99, 'Appears more formal when communicating | Appears less formal, and more relaxed when communicating', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 1, 'ab', '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(100, 'Tends to be more competitive | Tends to be more cooperative with others', NULL, 'radio', 26, 1, 1, 1, NULL, NULL, 1, 'rl', '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(101, 'Less use of hands when talking | More use of hand when talking', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(102, 'Speaks in a louder tone of voice | Speaks in a softer tone of voice', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(103, 'Uses few body movements | Uses many body movements', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(104, 'Speaks at a quicker pace | Speaks at a slower pace', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(105, 'has few facial expressions | Has animated facial expressions', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(106, 'Tends to speak rather then listen | Tends to listen rather then speak', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(107, 'Appears serious and controlled | Appears more warm and personable', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(108, 'leans forward when talking | Leans back when talking', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(109, 'Tends to stick to schedule and is structured | Is less structured and more flexible with time', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(110, 'States fact and opinions more strongly | States fact and opinions more tentatively', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(111, 'focuses more on tasks and information | Likes to tell stories and use metaphors', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(112, 'Makes a decision quickly | Takes time in making a decision', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(113, 'Not as easy to approach and speak with | Easy to approach and speak with', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(114, 'Is a risk taker and often moves forward without all the answers | Is cautious and likes to take reflective risk', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(115, 'Decisions based on fact and logic | Decisions based on feelings', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(116, 'Likes to get answers quickly | Does not pressure others for answers', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(117, 'Likes to prefer to spend time alone | Tends to be more social and engaging', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(118, 'More direct eye contact | Less direct eye contact', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(119, 'Appears more formal when communicating | Appears less formal, and more relaxed when communicating', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 1, 'ab', '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(120, 'Tends to be more competitive | Tends to be more cooperative with others', NULL, 'radio', 27, 1, 1, 1, NULL, NULL, 1, 'rl', '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(121, 'Less use of hands when talking | More use of hand when talking', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(122, 'Speaks in a louder tone of voice | Speaks in a softer tone of voice', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(123, 'Uses few body movements | Uses many body movements', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(124, 'Speaks at a quicker pace | Speaks at a slower pace', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(125, 'has few facial expressions | Has animated facial expressions', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(126, 'Tends to speak rather then listen | Tends to listen rather then speak', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(127, 'Appears serious and controlled | Appears more warm and personable', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(128, 'leans forward when talking | Leans back when talking', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(129, 'Tends to stick to schedule and is structured | Is less structured and more flexible with time', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(130, 'States fact and opinions more strongly | States fact and opinions more tentatively', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(131, 'focuses more on tasks and information | Likes to tell stories and use metaphors', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(132, 'Makes a decision quickly | Takes time in making a decision', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(133, 'Not as easy to approach and speak with | Easy to approach and speak with', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(134, 'Is a risk taker and often moves forward without all the answers | Is cautious and likes to take reflective risk', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(135, 'Decisions based on fact and logic | Decisions based on feelings', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(136, 'Likes to get answers quickly | Does not pressure others for answers', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(137, 'Likes to prefer to spend time alone | Tends to be more social and engaging', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(138, 'More direct eye contact | Less direct eye contact', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 0, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(139, 'Appears more formal when communicating | Appears less formal, and more relaxed when communicating', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 1, 'ab', '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(140, 'Tends to be more competitive | Tends to be more cooperative with others', NULL, 'radio', 28, 1, 1, 1, NULL, NULL, 1, 'rl', '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(141, 'Less use of hands when talking | More use of hand when talking', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 0, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(142, 'Speaks in a louder tone of voice | Speaks in a softer tone of voice', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 0, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(143, 'Uses few body movements | Uses many body movements', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 0, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(144, 'Speaks at a quicker pace | Speaks at a slower pace', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 0, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(145, 'has few facial expressions | Has animated facial expressions', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 0, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(146, 'Tends to speak rather then listen | Tends to listen rather then speak', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 0, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(147, 'Appears serious and controlled | Appears more warm and personable', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 0, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(148, 'leans forward when talking | Leans back when talking', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 0, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(149, 'Tends to stick to schedule and is structured | Is less structured and more flexible with time', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 0, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(150, 'States fact and opinions more strongly | States fact and opinions more tentatively', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 0, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(151, 'focuses more on tasks and information | Likes to tell stories and use metaphors', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 0, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(152, 'Makes a decision quickly | Takes time in making a decision', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 0, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(153, 'Not as easy to approach and speak with | Easy to approach and speak with', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 0, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(154, 'Is a risk taker and often moves forward without all the answers | Is cautious and likes to take reflective risk', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 0, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(155, 'Decisions based on fact and logic | Decisions based on feelings', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 0, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(156, 'Likes to get answers quickly | Does not pressure others for answers', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 0, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(157, 'Likes to prefer to spend time alone | Tends to be more social and engaging', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 0, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(158, 'More direct eye contact | Less direct eye contact', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 0, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(159, 'Appears more formal when communicating | Appears less formal, and more relaxed when communicating', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 1, 'ab', '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(160, 'Tends to be more competitive | Tends to be more cooperative with others', NULL, 'radio', 29, 1, 1, 1, NULL, NULL, 1, 'rl', '2018-09-28 00:12:16', '2018-09-28 00:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `survey_field_value`
--

CREATE TABLE `survey_field_value` (
  `id` int(11) UNSIGNED NOT NULL,
  `survey_id` int(11) UNSIGNED DEFAULT NULL,
  `survey_field_id` int(11) UNSIGNED DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `survey_field_value`
--

INSERT INTO `survey_field_value` (`id`, `survey_id`, `survey_field_id`, `value`, `value_ar`, `icon`, `color`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'A', NULL, NULL, NULL, '2018-04-16 09:49:45', '2018-04-16 09:50:05'),
(2, 1, 1, 'B', NULL, NULL, NULL, '2018-04-16 09:50:10', '2018-04-16 09:50:10'),
(3, 1, 2, 'R', NULL, NULL, NULL, '2018-04-16 09:50:54', '2018-04-16 09:50:54'),
(4, 1, 2, 'L', NULL, NULL, NULL, '2018-04-16 09:50:57', '2018-04-16 09:50:57'),
(5, 1, 3, 'A', NULL, NULL, NULL, '2018-04-16 09:51:31', '2018-04-16 09:51:31'),
(6, 1, 3, 'B', NULL, NULL, NULL, '2018-04-16 09:51:35', '2018-04-16 09:51:35'),
(7, 1, 4, 'R', NULL, NULL, NULL, '2018-04-16 09:52:08', '2018-04-16 09:52:08'),
(8, 1, 4, 'L', NULL, NULL, NULL, '2018-04-16 09:52:11', '2018-04-16 09:52:11'),
(9, 1, 5, 'A', NULL, NULL, NULL, '2018-04-16 09:52:40', '2018-04-16 09:52:40'),
(10, 1, 5, 'B', NULL, NULL, NULL, '2018-04-16 09:52:43', '2018-04-16 09:52:43'),
(11, 1, 6, 'R', NULL, NULL, NULL, '2018-04-16 09:53:11', '2018-04-16 09:53:28'),
(12, 1, 6, 'L', NULL, NULL, NULL, '2018-04-16 09:53:24', '2018-04-16 09:53:24'),
(13, 1, 7, 'A', NULL, NULL, NULL, '2018-04-16 09:53:58', '2018-04-16 09:53:58'),
(14, 1, 7, 'B', NULL, NULL, NULL, '2018-04-16 09:54:02', '2018-04-16 09:54:02'),
(15, 1, 8, 'R', NULL, NULL, NULL, '2018-04-16 09:54:40', '2018-04-16 09:54:40'),
(16, 1, 8, 'L', NULL, NULL, NULL, '2018-04-16 09:54:44', '2018-04-16 09:54:44'),
(17, 1, 9, 'A', NULL, NULL, NULL, '2018-04-16 09:55:18', '2018-04-16 09:55:18'),
(18, 1, 9, 'B', NULL, NULL, NULL, '2018-04-16 09:55:22', '2018-04-16 09:55:22'),
(19, 1, 10, 'R', NULL, NULL, NULL, '2018-04-16 09:55:53', '2018-04-16 09:55:53'),
(20, 1, 10, 'L', NULL, NULL, NULL, '2018-04-16 09:55:57', '2018-04-16 09:55:57'),
(21, 1, 11, 'A', NULL, NULL, NULL, '2018-04-16 09:56:33', '2018-04-16 09:56:33'),
(22, 1, 11, 'B', NULL, NULL, NULL, '2018-04-16 09:56:36', '2018-04-16 09:56:36'),
(23, 1, 12, 'R', NULL, NULL, NULL, '2018-04-16 09:57:02', '2018-04-16 09:57:02'),
(24, 1, 12, 'L', NULL, NULL, NULL, '2018-04-16 09:57:06', '2018-04-16 09:57:06'),
(25, 1, 13, 'A', NULL, NULL, NULL, '2018-04-16 09:57:30', '2018-04-16 09:57:30'),
(26, 1, 13, 'B', NULL, NULL, NULL, '2018-04-16 09:57:35', '2018-04-16 09:57:35'),
(27, 1, 14, 'R', NULL, NULL, NULL, '2018-04-16 09:58:20', '2018-04-16 09:58:20'),
(28, 1, 14, 'L', NULL, NULL, NULL, '2018-04-16 09:58:23', '2018-04-16 09:58:23'),
(29, 1, 15, 'A', NULL, NULL, NULL, '2018-04-16 09:59:15', '2018-04-16 09:59:15'),
(30, 1, 15, 'B', NULL, NULL, NULL, '2018-04-16 09:59:19', '2018-04-16 09:59:19'),
(31, 1, 16, 'R', NULL, NULL, NULL, '2018-04-16 09:59:50', '2018-04-16 09:59:50'),
(32, 1, 16, 'L', NULL, NULL, NULL, '2018-04-16 09:59:54', '2018-04-16 09:59:54'),
(33, 1, 17, 'A', NULL, NULL, NULL, '2018-04-16 10:00:20', '2018-04-16 10:00:20'),
(34, 1, 17, 'B', NULL, NULL, NULL, '2018-04-16 10:00:24', '2018-04-16 10:00:24'),
(35, 1, 18, 'R', NULL, NULL, NULL, '2018-04-16 10:00:50', '2018-04-16 10:00:50'),
(36, 1, 18, 'L', NULL, NULL, NULL, '2018-04-16 10:00:54', '2018-04-16 10:00:54'),
(37, 1, 19, 'A', NULL, NULL, NULL, '2018-04-24 19:00:00', '2018-04-24 19:00:00'),
(38, 1, 19, 'B', NULL, NULL, NULL, '2018-04-24 19:00:00', '2018-04-24 19:00:00'),
(39, 1, 20, 'R', NULL, NULL, NULL, '2018-04-24 19:00:00', '2018-04-24 19:00:00'),
(40, 1, 20, 'L', NULL, NULL, NULL, '2018-04-24 19:00:00', '2018-04-24 19:00:00'),
(41, 23, 21, 'A', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(42, 23, 21, 'B', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(43, 23, 22, 'R', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(44, 23, 22, 'L', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(45, 23, 23, 'A', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(46, 23, 23, 'B', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(47, 23, 24, 'R', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(48, 23, 24, 'L', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(49, 23, 25, 'A', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(50, 23, 25, 'B', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(51, 23, 26, 'R', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(52, 23, 26, 'L', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(53, 23, 27, 'A', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(54, 23, 27, 'B', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(55, 23, 28, 'R', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(56, 23, 28, 'L', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(57, 23, 29, 'A', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(58, 23, 29, 'B', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(59, 23, 30, 'R', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(60, 23, 30, 'L', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(61, 23, 31, 'A', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(62, 23, 31, 'B', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(63, 23, 32, 'R', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(64, 23, 32, 'L', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(65, 23, 33, 'A', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(66, 23, 33, 'B', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(67, 23, 34, 'R', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(68, 23, 34, 'L', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(69, 23, 35, 'A', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(70, 23, 35, 'B', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(71, 23, 36, 'R', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(72, 23, 36, 'L', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(73, 23, 37, 'A', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(74, 23, 37, 'B', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(75, 23, 38, 'R', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(76, 23, 38, 'L', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(77, 23, 39, 'A', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(78, 23, 39, 'B', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(79, 23, 40, 'R', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(80, 23, 40, 'L', NULL, NULL, NULL, '2018-07-02 19:23:12', '2018-07-02 19:23:12'),
(81, 24, 41, 'A', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(82, 24, 41, 'B', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(83, 24, 42, 'R', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(84, 24, 42, 'L', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(85, 24, 43, 'A', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(86, 24, 43, 'B', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(87, 24, 44, 'R', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(88, 24, 44, 'L', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(89, 24, 45, 'A', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(90, 24, 45, 'B', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(91, 24, 46, 'R', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(92, 24, 46, 'L', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(93, 24, 47, 'A', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(94, 24, 47, 'B', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(95, 24, 48, 'R', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(96, 24, 48, 'L', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(97, 24, 49, 'A', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(98, 24, 49, 'B', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(99, 24, 50, 'R', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(100, 24, 50, 'L', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(101, 24, 51, 'A', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(102, 24, 51, 'B', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(103, 24, 52, 'R', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(104, 24, 52, 'L', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(105, 24, 53, 'A', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(106, 24, 53, 'B', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(107, 24, 54, 'R', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(108, 24, 54, 'L', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(109, 24, 55, 'A', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(110, 24, 55, 'B', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(111, 24, 56, 'R', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(112, 24, 56, 'L', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(113, 24, 57, 'A', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(114, 24, 57, 'B', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(115, 24, 58, 'R', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(116, 24, 58, 'L', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(117, 24, 59, 'A', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(118, 24, 59, 'B', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(119, 24, 60, 'R', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(120, 24, 60, 'L', NULL, NULL, NULL, '2018-07-02 19:49:02', '2018-07-02 19:49:02'),
(121, 25, 61, 'A', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(122, 25, 61, 'B', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(123, 25, 62, 'R', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(124, 25, 62, 'L', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(125, 25, 63, 'A', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(126, 25, 63, 'B', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(127, 25, 64, 'R', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(128, 25, 64, 'L', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(129, 25, 65, 'A', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(130, 25, 65, 'B', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(131, 25, 66, 'R', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(132, 25, 66, 'L', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(133, 25, 67, 'A', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(134, 25, 67, 'B', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(135, 25, 68, 'R', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(136, 25, 68, 'L', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(137, 25, 69, 'A', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(138, 25, 69, 'B', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(139, 25, 70, 'R', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(140, 25, 70, 'L', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(141, 25, 71, 'A', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(142, 25, 71, 'B', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(143, 25, 72, 'R', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(144, 25, 72, 'L', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(145, 25, 73, 'A', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(146, 25, 73, 'B', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(147, 25, 74, 'R', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(148, 25, 74, 'L', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(149, 25, 75, 'A', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(150, 25, 75, 'B', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(151, 25, 76, 'R', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(152, 25, 76, 'L', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(153, 25, 77, 'A', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(154, 25, 77, 'B', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(155, 25, 78, 'R', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(156, 25, 78, 'L', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(157, 25, 79, 'A', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(158, 25, 79, 'B', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(159, 25, 80, 'R', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(160, 25, 80, 'L', NULL, NULL, NULL, '2018-07-04 05:35:05', '2018-07-04 05:35:05'),
(161, 26, 81, 'A', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(162, 26, 81, 'B', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(163, 26, 82, 'R', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(164, 26, 82, 'L', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(165, 26, 83, 'A', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(166, 26, 83, 'B', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(167, 26, 84, 'R', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(168, 26, 84, 'L', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(169, 26, 85, 'A', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(170, 26, 85, 'B', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(171, 26, 86, 'R', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(172, 26, 86, 'L', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(173, 26, 87, 'A', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(174, 26, 87, 'B', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(175, 26, 88, 'R', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(176, 26, 88, 'L', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(177, 26, 89, 'A', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(178, 26, 89, 'B', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(179, 26, 90, 'R', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(180, 26, 90, 'L', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(181, 26, 91, 'A', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(182, 26, 91, 'B', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(183, 26, 92, 'R', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(184, 26, 92, 'L', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(185, 26, 93, 'A', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(186, 26, 93, 'B', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(187, 26, 94, 'R', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(188, 26, 94, 'L', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(189, 26, 95, 'A', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(190, 26, 95, 'B', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(191, 26, 96, 'R', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(192, 26, 96, 'L', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(193, 26, 97, 'A', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(194, 26, 97, 'B', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(195, 26, 98, 'R', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(196, 26, 98, 'L', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(197, 26, 99, 'A', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(198, 26, 99, 'B', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(199, 26, 100, 'R', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(200, 26, 100, 'L', NULL, NULL, NULL, '2018-07-11 05:17:31', '2018-07-11 05:17:31'),
(201, 27, 101, 'A', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(202, 27, 101, 'B', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(203, 27, 102, 'R', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(204, 27, 102, 'L', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(205, 27, 103, 'A', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(206, 27, 103, 'B', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(207, 27, 104, 'R', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(208, 27, 104, 'L', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(209, 27, 105, 'A', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(210, 27, 105, 'B', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(211, 27, 106, 'R', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(212, 27, 106, 'L', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(213, 27, 107, 'A', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(214, 27, 107, 'B', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(215, 27, 108, 'R', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(216, 27, 108, 'L', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(217, 27, 109, 'A', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(218, 27, 109, 'B', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(219, 27, 110, 'R', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(220, 27, 110, 'L', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(221, 27, 111, 'A', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(222, 27, 111, 'B', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(223, 27, 112, 'R', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(224, 27, 112, 'L', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(225, 27, 113, 'A', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(226, 27, 113, 'B', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(227, 27, 114, 'R', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(228, 27, 114, 'L', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(229, 27, 115, 'A', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(230, 27, 115, 'B', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(231, 27, 116, 'R', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(232, 27, 116, 'L', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(233, 27, 117, 'A', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(234, 27, 117, 'B', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(235, 27, 118, 'R', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(236, 27, 118, 'L', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(237, 27, 119, 'A', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(238, 27, 119, 'B', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(239, 27, 120, 'R', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(240, 27, 120, 'L', NULL, NULL, NULL, '2018-07-13 11:16:50', '2018-07-13 11:16:50'),
(241, 28, 121, 'A', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(242, 28, 121, 'B', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(243, 28, 122, 'R', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(244, 28, 122, 'L', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(245, 28, 123, 'A', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(246, 28, 123, 'B', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(247, 28, 124, 'R', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(248, 28, 124, 'L', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(249, 28, 125, 'A', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(250, 28, 125, 'B', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(251, 28, 126, 'R', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(252, 28, 126, 'L', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(253, 28, 127, 'A', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(254, 28, 127, 'B', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(255, 28, 128, 'R', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(256, 28, 128, 'L', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(257, 28, 129, 'A', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(258, 28, 129, 'B', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(259, 28, 130, 'R', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(260, 28, 130, 'L', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(261, 28, 131, 'A', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(262, 28, 131, 'B', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(263, 28, 132, 'R', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(264, 28, 132, 'L', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(265, 28, 133, 'A', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(266, 28, 133, 'B', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(267, 28, 134, 'R', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(268, 28, 134, 'L', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(269, 28, 135, 'A', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(270, 28, 135, 'B', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(271, 28, 136, 'R', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(272, 28, 136, 'L', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(273, 28, 137, 'A', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(274, 28, 137, 'B', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(275, 28, 138, 'R', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(276, 28, 138, 'L', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(277, 28, 139, 'A', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(278, 28, 139, 'B', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(279, 28, 140, 'R', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(280, 28, 140, 'L', NULL, NULL, NULL, '2018-07-14 07:23:32', '2018-07-14 07:23:32'),
(281, 29, 141, 'A', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(282, 29, 141, 'B', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(283, 29, 142, 'R', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(284, 29, 142, 'L', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(285, 29, 143, 'A', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(286, 29, 143, 'B', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(287, 29, 144, 'R', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(288, 29, 144, 'L', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(289, 29, 145, 'A', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(290, 29, 145, 'B', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(291, 29, 146, 'R', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(292, 29, 146, 'L', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(293, 29, 147, 'A', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(294, 29, 147, 'B', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(295, 29, 148, 'R', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(296, 29, 148, 'L', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(297, 29, 149, 'A', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(298, 29, 149, 'B', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(299, 29, 150, 'R', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(300, 29, 150, 'L', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(301, 29, 151, 'A', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(302, 29, 151, 'B', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(303, 29, 152, 'R', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(304, 29, 152, 'L', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(305, 29, 153, 'A', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(306, 29, 153, 'B', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(307, 29, 154, 'R', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(308, 29, 154, 'L', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(309, 29, 155, 'A', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(310, 29, 155, 'B', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(311, 29, 156, 'R', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(312, 29, 156, 'L', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(313, 29, 157, 'A', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(314, 29, 157, 'B', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(315, 29, 158, 'R', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(316, 29, 158, 'L', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(317, 29, 159, 'A', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(318, 29, 159, 'B', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(319, 29, 160, 'R', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16'),
(320, 29, 160, 'L', NULL, NULL, NULL, '2018-09-28 00:12:16', '2018-09-28 00:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `survey_submission`
--

CREATE TABLE `survey_submission` (
  `id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED DEFAULT NULL,
  `survey_id` int(11) UNSIGNED DEFAULT NULL,
  `employee_id` int(11) UNSIGNED DEFAULT NULL,
  `b` tinyint(4) DEFAULT NULL,
  `a` tinyint(4) DEFAULT NULL,
  `l` tinyint(4) DEFAULT NULL,
  `r` tinyint(4) DEFAULT NULL,
  `image` varchar(30) DEFAULT NULL,
  `employee_code` varchar(100) DEFAULT NULL,
  `behavior` varchar(100) DEFAULT NULL,
  `sub_behavior` varchar(2) DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT NULL,
  `p_status` tinyint(1) NOT NULL DEFAULT '0',
  `parent_assessment_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_submission`
--

INSERT INTO `survey_submission` (`id`, `group_id`, `survey_id`, `employee_id`, `b`, `a`, `l`, `r`, `image`, `employee_code`, `behavior`, `sub_behavior`, `amount`, `p_status`, `parent_assessment_id`, `created_at`, `updated_at`) VALUES
(300, 1, 23, 326, 5, 4, 5, 4, 'amiable.png', '1539153141sKDzz', 'amiable', 'dr', '10.00', 1, NULL, '2018-10-10 04:32:21', '2018-10-10 04:33:25'),
(302, 1, 23, 326, 2, 8, 1, 8, 'driver.png', '1539153141sKDzz', 'driver', 'dr', NULL, 1, 300, '2018-10-10 04:37:37', '2018-10-10 04:37:38'),
(303, 1, 23, 326, 3, 6, 4, 5, 'driver.png', '1539153141sKDzz', 'driver', 'am', NULL, 1, 300, '2018-10-10 04:41:05', '2018-10-10 04:41:06'),
(304, 1, 23, 327, 2, 8, 1, 8, 'driver.png', '15391538231yPLj', 'driver', 'dr', '10.00', 1, NULL, '2018-10-10 04:43:43', '2018-10-10 04:44:28'),
(305, 1, 23, 327, 4, 5, 3, 7, 'driver.png', '15391538231yPLj', 'driver', 'am', NULL, 1, 304, '2018-10-10 04:46:03', '2018-10-10 04:46:04'),
(317, 1, 23, 327, 0, 9, 0, 9, 'driver.png', '15391538231yPLj', 'driver', 'dr', NULL, 1, 304, '2018-10-10 05:19:26', '2018-10-10 05:19:26'),
(318, 1, 23, 328, 9, 0, 9, 0, 'amiable.png', '1539156144cHqZi', 'amiable', 'am', '10.00', 1, NULL, '2018-10-10 05:22:24', '2018-10-10 05:23:38'),
(319, 2, 23, 329, 9, 0, 9, 0, 'amiable.png', '1539156332ALHm3', 'amiable', 'am', NULL, 1, NULL, '2018-10-10 05:25:32', '2018-10-10 05:25:33'),
(320, 2, 23, 330, 9, 0, 9, 0, 'amiable.png', '15391565420rJg5', 'amiable', 'am', NULL, 1, NULL, '2018-10-10 05:29:02', '2018-10-10 05:29:03'),
(321, 1, 23, 331, 9, 0, 9, 0, 'amiable.png', '1539156698QEOKS', 'amiable', 'am', NULL, 0, NULL, '2018-10-10 05:31:38', '2018-10-10 05:31:38'),
(322, 2, 23, 332, 9, 0, 9, 0, 'amiable.png', '1539156764fTh0V', 'amiable', 'am', '10.00', 1, NULL, '2018-10-10 05:32:44', '2018-10-10 05:34:22'),
(323, 2, 23, 332, 5, 4, 4, 5, 'expressive.png', '1539156764fTh0V', 'expressive', 'an', NULL, 1, 322, '2018-10-10 05:37:40', '2018-10-10 05:37:41'),
(324, 2, 23, 333, 4, 5, 3, 6, 'driver.png', '153915863183Q4Q', 'driver', 'am', '10.00', 1, NULL, '2018-10-10 06:03:51', '2018-10-10 06:04:59'),
(328, 2, 23, 333, 6, 3, 6, 3, 'amiable.png', '153915863183Q4Q', 'amiable', 'dr', NULL, 1, 324, '2018-10-10 07:07:57', '2018-10-10 07:07:57'),
(329, 2, 23, 333, 2, 8, 3, 6, 'driver.png', '153915863183Q4Q', 'driver', 'an', NULL, 1, 324, '2018-10-10 07:11:33', '2018-10-10 07:11:33'),
(330, 1, 23, 386, 4, 5, 5, 4, 'analytical.png', '1539256306QmpEr', 'analytical', 'ex', '10.00', 1, NULL, '2018-10-11 09:11:46', '2018-10-11 09:12:49'),
(331, 1, 23, 386, 5, 4, 4, 5, 'expressive.png', '1539256306QmpEr', 'expressive', 'an', NULL, 1, 330, '2018-10-11 09:13:21', '2018-10-11 09:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(4) DEFAULT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `image`, `confirmed`, `confirmation_code`, `remember_token`, `mobile`, `address`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 'Jim', 'Glantz', 'jim@taflat.com', '$2y$10$mJQv3ThhMCyVSU3b1f5B.eo8SCC/ZJI2OP0aWGp.A58lCvLbDh8D6', '1529415401.jpg', 1, NULL, '7whpHvSuanzYoxe0uadBEProjRw5S23xWHsIb7ln5NETbHKGSt5EgCLHKulX', NULL, '-', NULL, '2017-07-26 07:22:42', '2018-09-18 12:16:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_group_id_foreign` (`group_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_group_id_foreign` (`group_id`);

--
-- Indexes for table `friend_assessment`
--
ALTER TABLE `friend_assessment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friend_assessment_survey_submission_id_foreign` (`survey_submission_id`);

--
-- Indexes for table `general_setting`
--
ALTER TABLE `general_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_group_id_foreign` (`group_id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtp_setting`
--
ALTER TABLE `smtp_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_quadrant`
--
ALTER TABLE `sub_quadrant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_quadrant_score_id_foreign` (`score_id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_group_id_foreign` (`group_id`);

--
-- Indexes for table `survey_answer`
--
ALTER TABLE `survey_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_answer_survey_field_id_foreign` (`survey_field_id`),
  ADD KEY `survey_answer_survey_submission_id_foreign` (`survey_submission_id`),
  ADD KEY `survey_answer_survey_field_value_id_foreign` (`survey_field_value_id`);

--
-- Indexes for table `survey_field`
--
ALTER TABLE `survey_field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_field_survey_id_foreign` (`survey_id`),
  ADD KEY `survey_field_category_id_foreign` (`category_id`);

--
-- Indexes for table `survey_field_value`
--
ALTER TABLE `survey_field_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_field_value_survey_id_foreign` (`survey_id`),
  ADD KEY `survey_field_value_survey_field_id_foreign` (`survey_field_id`);

--
-- Indexes for table `survey_submission`
--
ALTER TABLE `survey_submission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_submission_group_id_foreign` (`group_id`),
  ADD KEY `survey_submission_survey_id_foreign` (`survey_id`),
  ADD KEY `survey_submission_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_group_id_foreign` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=387;

--
-- AUTO_INCREMENT for table `friend_assessment`
--
ALTER TABLE `friend_assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `general_setting`
--
ALTER TABLE `general_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `smtp_setting`
--
ALTER TABLE `smtp_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_quadrant`
--
ALTER TABLE `sub_quadrant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `survey_answer`
--
ALTER TABLE `survey_answer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5999;

--
-- AUTO_INCREMENT for table `survey_field`
--
ALTER TABLE `survey_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `survey_field_value`
--
ALTER TABLE `survey_field_value`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `survey_submission`
--
ALTER TABLE `survey_submission`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friend_assessment`
--
ALTER TABLE `friend_assessment`
  ADD CONSTRAINT `friend_assessment_survey_submission_id_foreign` FOREIGN KEY (`survey_submission_id`) REFERENCES `survey_submission` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_quadrant`
--
ALTER TABLE `sub_quadrant`
  ADD CONSTRAINT `sub_quadrant_score_id_foreign` FOREIGN KEY (`score_id`) REFERENCES `score` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survey`
--
ALTER TABLE `survey`
  ADD CONSTRAINT `survey_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survey_answer`
--
ALTER TABLE `survey_answer`
  ADD CONSTRAINT `survey_answer_survey_field_id_foreign` FOREIGN KEY (`survey_field_id`) REFERENCES `survey_field` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `survey_answer_survey_field_value_id_foreign` FOREIGN KEY (`survey_field_value_id`) REFERENCES `survey_field_value` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `survey_answer_survey_submission_id_foreign` FOREIGN KEY (`survey_submission_id`) REFERENCES `survey_submission` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survey_field`
--
ALTER TABLE `survey_field`
  ADD CONSTRAINT `survey_field_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `survey_field_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survey_field_value`
--
ALTER TABLE `survey_field_value`
  ADD CONSTRAINT `survey_field_value_survey_field_id_foreign` FOREIGN KEY (`survey_field_id`) REFERENCES `survey_field` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `survey_field_value_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survey_submission`
--
ALTER TABLE `survey_submission`
  ADD CONSTRAINT `survey_submission_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `survey_submission_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `survey_submission_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
