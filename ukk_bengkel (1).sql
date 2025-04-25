-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2025 at 06:31 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint UNSIGNED DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-13 03:21:18', '2025-03-13 03:21:18'),
(2, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:25:27', '2025-03-13 03:25:27'),
(3, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:29:56', '2025-03-13 03:29:56'),
(4, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:07', '2025-03-13 03:30:07'),
(5, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:11', '2025-03-13 03:30:11'),
(6, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:11', '2025-03-13 03:30:11'),
(7, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:12', '2025-03-13 03:30:12'),
(8, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:12', '2025-03-13 03:30:12'),
(9, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:13', '2025-03-13 03:30:13'),
(10, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:13', '2025-03-13 03:30:13'),
(11, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:14', '2025-03-13 03:30:14'),
(12, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:14', '2025-03-13 03:30:14'),
(13, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:18', '2025-03-13 03:30:18'),
(14, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:18', '2025-03-13 03:30:18'),
(15, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:19', '2025-03-13 03:30:19'),
(16, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:20', '2025-03-13 03:30:20'),
(17, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:20', '2025-03-13 03:30:20'),
(18, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:21', '2025-03-13 03:30:21'),
(19, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:21', '2025-03-13 03:30:21'),
(20, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:21', '2025-03-13 03:30:21'),
(21, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:22', '2025-03-13 03:30:22'),
(22, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:22', '2025-03-13 03:30:22'),
(23, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:23', '2025-03-13 03:30:23'),
(24, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:23', '2025-03-13 03:30:23'),
(25, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 03:30:24', '2025-03-13 03:30:24'),
(26, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:02:25', '2025-03-13 04:02:25'),
(27, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:02:45', '2025-03-13 04:02:45'),
(28, 'kendaraan', 'updated', 'App\\Models\\Kendaraan', 'updated', 4, 'App\\Models\\User', 1, '{\"old\": {\"no_plat\": \"AB 532265 CD\"}, \"attributes\": {\"no_plat\": \"AB 532265 CDa\"}}', NULL, '2025-03-13 04:05:01', '2025-03-13 04:05:01'),
(29, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:05:05', '2025-03-13 04:05:05'),
(30, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:09:27', '2025-03-13 04:09:27'),
(31, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:09:41', '2025-03-13 04:09:41'),
(32, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:09:47', '2025-03-13 04:09:47'),
(33, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:09:48', '2025-03-13 04:09:48'),
(34, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:10:22', '2025-03-13 04:10:22'),
(35, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:10:23', '2025-03-13 04:10:23'),
(36, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:10:23', '2025-03-13 04:10:23'),
(37, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:10:24', '2025-03-13 04:10:24'),
(38, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:15:25', '2025-03-13 04:15:25'),
(39, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:15:26', '2025-03-13 04:15:26'),
(40, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:15:32', '2025-03-13 04:15:32'),
(41, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:15:38', '2025-03-13 04:15:38'),
(42, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:15:41', '2025-03-13 04:15:41'),
(43, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:16:12', '2025-03-13 04:16:12'),
(44, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:44:15', '2025-03-13 04:44:15'),
(45, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:45:04', '2025-03-13 04:45:04'),
(46, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:46:36', '2025-03-13 04:46:36'),
(47, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:47:28', '2025-03-13 04:47:28'),
(48, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:52:36', '2025-03-13 04:52:36'),
(49, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:52:39', '2025-03-13 04:52:39'),
(50, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:53:04', '2025-03-13 04:53:04'),
(51, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:53:42', '2025-03-13 04:53:42'),
(52, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:54:07', '2025-03-13 04:54:07'),
(53, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:54:08', '2025-03-13 04:54:08'),
(54, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:54:10', '2025-03-13 04:54:10'),
(55, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:54:11', '2025-03-13 04:54:11'),
(56, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:54:39', '2025-03-13 04:54:39'),
(57, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:54:50', '2025-03-13 04:54:50'),
(58, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:54:58', '2025-03-13 04:54:58'),
(59, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:55:23', '2025-03-13 04:55:23'),
(60, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:55:40', '2025-03-13 04:55:40'),
(61, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:55:42', '2025-03-13 04:55:42'),
(62, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:56:12', '2025-03-13 04:56:12'),
(63, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 04:56:16', '2025-03-13 04:56:16'),
(64, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 05:17:47', '2025-03-13 05:17:47'),
(65, 'default', 'Mengedit kendaraan dengan No Plat: AB 532265 CD', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-13 05:17:57', '2025-03-13 05:17:57'),
(66, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 05:18:02', '2025-03-13 05:18:02'),
(67, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 05:18:24', '2025-03-13 05:18:24'),
(68, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 05:18:30', '2025-03-13 05:18:30'),
(69, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 05:18:37', '2025-03-13 05:18:37'),
(70, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 05:18:40', '2025-03-13 05:18:40'),
(71, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 05:18:45', '2025-03-13 05:18:45'),
(72, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 05:19:09', '2025-03-13 05:19:09'),
(73, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 05:19:12', '2025-03-13 05:19:12'),
(74, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 05:19:21', '2025-03-13 05:19:21'),
(75, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 05:20:41', '2025-03-13 05:20:41'),
(76, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 06:00:48', '2025-03-13 06:00:48'),
(77, 'default', 'Menginput booking dengan No Plat: ud 733622 ud', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-13 06:01:59', '2025-03-13 06:01:59'),
(78, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 06:02:13', '2025-03-13 06:02:13'),
(79, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 13:19:15', '2025-03-13 13:19:15'),
(80, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 14:35:21', '2025-03-13 14:35:21'),
(81, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-13 14:35:42', '2025-03-13 14:35:42'),
(82, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 14:35:49', '2025-03-13 14:35:49'),
(83, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 14:35:49', '2025-03-13 14:35:49'),
(84, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 14:36:06', '2025-03-13 14:36:06'),
(85, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-13 14:37:23', '2025-03-13 14:37:23'),
(86, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 14:39:42', '2025-03-13 14:39:42'),
(87, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 14:39:42', '2025-03-13 14:39:42'),
(88, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 14:40:12', '2025-03-13 14:40:12'),
(89, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 14:40:16', '2025-03-13 14:40:16'),
(90, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-13 14:40:24', '2025-03-13 14:40:24'),
(91, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-14 01:44:00', '2025-03-14 01:44:00'),
(92, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-14 01:44:00', '2025-03-14 01:44:00'),
(93, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-14 01:44:21', '2025-03-14 01:44:21'),
(94, 'default', 'Menginput booking dengan No Plat: AB 532265 CD', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-14 01:45:54', '2025-03-14 01:45:54'),
(95, 'default', 'Menginput booking dengan No Plat: Ab 25243 DG', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-14 01:48:00', '2025-03-14 01:48:00'),
(96, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-14 01:55:04', '2025-03-14 01:55:04'),
(97, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-14 01:55:10', '2025-03-14 01:55:10'),
(98, 'default', 'Menginput booking dengan No Plat: AB 532265 CD', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-14 01:55:35', '2025-03-14 01:55:35'),
(99, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-14 01:55:52', '2025-03-14 01:55:52'),
(100, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-14 01:55:53', '2025-03-14 01:55:53'),
(101, 'default', 'Menghapus booking dengan No Plat: Ab 25243 DG', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-14 01:56:10', '2025-03-14 01:56:10'),
(102, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-14 14:32:14', '2025-03-14 14:32:14'),
(103, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-15 11:50:32', '2025-03-15 11:50:32'),
(104, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-15 11:50:46', '2025-03-15 11:50:46'),
(105, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-15 11:50:57', '2025-03-15 11:50:57'),
(106, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-15 11:52:10', '2025-03-15 11:52:10'),
(107, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-15 11:52:10', '2025-03-15 11:52:10'),
(108, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-15 11:52:19', '2025-03-15 11:52:19'),
(109, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-15 11:52:51', '2025-03-15 11:52:51'),
(110, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 6, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-15 11:53:00', '2025-03-15 11:53:00'),
(111, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 6, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-15 11:53:23', '2025-03-15 11:53:23'),
(112, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-15 11:53:30', '2025-03-15 11:53:30'),
(113, 'default', 'Menambah kendaraan dengan No Plat: AB 1234 BAA', NULL, NULL, NULL, 'App\\Models\\User', 6, '[]', NULL, '2025-03-15 11:54:22', '2025-03-15 11:54:22'),
(114, 'default', 'Menginput booking dengan No Plat: AB 1234 BAA', NULL, NULL, NULL, 'App\\Models\\User', 6, '[]', NULL, '2025-03-15 11:58:46', '2025-03-15 11:58:46'),
(115, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-15 13:23:59', '2025-03-15 13:23:59'),
(116, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-15 13:24:14', '2025-03-15 13:24:14'),
(117, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-15 13:24:56', '2025-03-15 13:24:56'),
(118, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-15 13:25:03', '2025-03-15 13:25:03'),
(119, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-15 13:25:06', '2025-03-15 13:25:06'),
(120, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 6, '[]', NULL, '2025-03-15 13:25:21', '2025-03-15 13:25:21'),
(121, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-15 13:25:30', '2025-03-15 13:25:30'),
(122, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-15 13:25:30', '2025-03-15 13:25:30'),
(123, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-15 13:25:51', '2025-03-15 13:25:51'),
(124, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-15 13:49:29', '2025-03-15 13:49:29'),
(125, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 03:15:12', '2025-03-17 03:15:12'),
(126, 'default', 'Menginput booking dengan No Plat: ud 733622 ud', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-17 03:20:48', '2025-03-17 03:20:48'),
(127, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 03:21:14', '2025-03-17 03:21:14'),
(128, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 03:21:14', '2025-03-17 03:21:14'),
(129, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 03:24:08', '2025-03-17 03:24:08'),
(130, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 08:08:30', '2025-03-17 08:08:30'),
(131, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 08:08:31', '2025-03-17 08:08:31'),
(132, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 08:58:42', '2025-03-17 08:58:42'),
(133, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 13:17:33', '2025-03-17 13:17:33'),
(134, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 13:17:33', '2025-03-17 13:17:33'),
(135, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 13:32:28', '2025-03-17 13:32:28'),
(136, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 13:32:29', '2025-03-17 13:32:29'),
(137, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 13:32:33', '2025-03-17 13:32:33'),
(138, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 13:32:56', '2025-03-17 13:32:56'),
(139, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 13:33:18', '2025-03-17 13:33:18'),
(140, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 13:33:20', '2025-03-17 13:33:20'),
(141, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 18:14:20', '2025-03-17 18:14:20'),
(142, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 18:14:21', '2025-03-17 18:14:21'),
(143, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 23:36:16', '2025-03-17 23:36:16'),
(144, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 23:36:18', '2025-03-17 23:36:18'),
(145, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-17 23:36:47', '2025-03-17 23:36:47'),
(146, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-17 23:37:05', '2025-03-17 23:37:05'),
(147, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-18 01:26:54', '2025-03-18 01:26:54'),
(148, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-18 01:27:01', '2025-03-18 01:27:01'),
(149, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-18 01:27:02', '2025-03-18 01:27:02'),
(150, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-18 01:27:09', '2025-03-18 01:27:09'),
(151, 'default', 'Menginput booking dengan No Plat: Ab 25243 DG', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-18 03:10:48', '2025-03-18 03:10:48'),
(152, 'default', 'Mengedit kendaraan dengan No Plat: ud 733622 udaa', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-18 03:15:21', '2025-03-18 03:15:21'),
(153, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-18 04:49:24', '2025-03-18 04:49:24'),
(154, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-18 06:03:10', '2025-03-18 06:03:10'),
(155, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-18 06:03:10', '2025-03-18 06:03:10'),
(156, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-18 06:03:45', '2025-03-18 06:03:45'),
(157, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-18 15:41:31', '2025-03-18 15:41:31'),
(158, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-18 15:41:38', '2025-03-18 15:41:38'),
(159, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-18 15:41:39', '2025-03-18 15:41:39'),
(160, 'default', 'Menginput booking dengan No Plat: AB 532265 CD', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-18 15:42:07', '2025-03-18 15:42:07'),
(161, 'default', 'Menginput booking dengan No Plat: ud 733622 ud', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-18 15:42:31', '2025-03-18 15:42:31'),
(162, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-18 16:25:28', '2025-03-18 16:25:28'),
(163, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 6, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-18 16:25:37', '2025-03-18 16:25:37'),
(164, 'default', 'Menginput booking dengan No Plat: AB 1234 BAA', NULL, NULL, NULL, 'App\\Models\\User', 6, '[]', NULL, '2025-03-18 16:25:49', '2025-03-18 16:25:49'),
(165, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 00:26:34', '2025-03-19 00:26:34'),
(166, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 00:26:35', '2025-03-19 00:26:35'),
(167, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 00:32:09', '2025-03-19 00:32:09'),
(168, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 01:25:22', '2025-03-19 01:25:22'),
(169, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-19 01:25:40', '2025-03-19 01:25:40'),
(170, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 01:26:04', '2025-03-19 01:26:04'),
(171, 'default', 'Menambah kendaraan dengan No Plat: AB 1234 BAAA', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-19 01:27:24', '2025-03-19 01:27:24'),
(172, 'default', 'Menginput booking dengan No Plat: AB 1234 BAAA', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-19 01:28:36', '2025-03-19 01:28:36'),
(173, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 01:36:28', '2025-03-19 01:36:28'),
(174, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-19 01:36:41', '2025-03-19 01:36:41'),
(175, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 01:36:50', '2025-03-19 01:36:50'),
(176, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 01:36:50', '2025-03-19 01:36:50'),
(177, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 01:36:53', '2025-03-19 01:36:53'),
(178, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 01:37:08', '2025-03-19 01:37:08'),
(179, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-19 01:39:08', '2025-03-19 01:39:08'),
(180, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 01:39:16', '2025-03-19 01:39:16'),
(181, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 01:39:16', '2025-03-19 01:39:16'),
(182, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 01:55:25', '2025-03-19 01:55:25'),
(183, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 2, '[]', NULL, '2025-03-19 02:08:07', '2025-03-19 02:08:07'),
(184, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 02:08:14', '2025-03-19 02:08:14'),
(185, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-19 02:10:37', '2025-03-19 02:10:37'),
(186, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 6, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 02:10:45', '2025-03-19 02:10:45'),
(187, 'default', 'Menambah kendaraan dengan No Plat: ud 733622 udA', NULL, NULL, NULL, 'App\\Models\\User', 6, '[]', NULL, '2025-03-19 02:11:29', '2025-03-19 02:11:29'),
(188, 'default', 'Menginput booking dengan No Plat: AB 532265 CD', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-19 02:12:14', '2025-03-19 02:12:14'),
(189, 'default', 'Menginput booking dengan No Plat: ud 733622 udA', NULL, NULL, NULL, 'App\\Models\\User', 6, '[]', NULL, '2025-03-19 02:12:15', '2025-03-19 02:12:15'),
(190, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 6, '[]', NULL, '2025-03-19 02:12:26', '2025-03-19 02:12:26'),
(191, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 02:12:32', '2025-03-19 02:12:32'),
(192, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 02:12:33', '2025-03-19 02:12:33'),
(193, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 02:19:38', '2025-03-19 02:19:38'),
(194, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 02:22:25', '2025-03-19 02:22:25'),
(195, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-19 02:46:19', '2025-03-19 02:46:19'),
(196, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 02:47:33', '2025-03-19 02:47:33'),
(197, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 02:47:33', '2025-03-19 02:47:33'),
(198, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-19 02:48:00', '2025-03-19 02:48:00'),
(199, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 02:49:35', '2025-03-19 02:49:35'),
(200, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 02:49:35', '2025-03-19 02:49:35'),
(201, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 2, '[]', NULL, '2025-03-19 04:19:47', '2025-03-19 04:19:47'),
(202, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 7, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 04:21:20', '2025-03-19 04:21:20'),
(203, 'default', 'Menambah kendaraan dengan No Plat: ABB 46216 DC', NULL, NULL, NULL, 'App\\Models\\User', 7, '[]', NULL, '2025-03-19 04:22:05', '2025-03-19 04:22:05'),
(204, 'default', 'Menginput booking dengan No Plat: ABB 46216 DC', NULL, NULL, NULL, 'App\\Models\\User', 7, '[]', NULL, '2025-03-19 04:22:37', '2025-03-19 04:22:37'),
(205, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 07:41:59', '2025-03-19 07:41:59'),
(206, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 08:59:51', '2025-03-19 08:59:51'),
(207, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 21:18:29', '2025-03-19 21:18:29'),
(208, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 21:18:31', '2025-03-19 21:18:31'),
(209, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-19 22:57:53', '2025-03-19 22:57:53'),
(210, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 3, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 00:20:23', '2025-03-20 00:20:23'),
(211, 'default', 'Menginput booking dengan No Plat: ud 733622 ud', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-20 00:25:50', '2025-03-20 00:25:50'),
(212, 'default', 'Menghapus booking dengan No Plat: ud 733622 ud', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-20 00:26:10', '2025-03-20 00:26:10'),
(213, 'default', 'Menginput booking dengan No Plat: ud 733622 ud', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-20 00:56:13', '2025-03-20 00:56:13'),
(214, 'default', 'Menghapus booking dengan No Plat: ud 733622 ud', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-20 00:57:07', '2025-03-20 00:57:07'),
(215, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2025-03-20 01:26:55', '2025-03-20 01:26:55'),
(216, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 01:27:02', '2025-03-20 01:27:02'),
(217, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 01:27:03', '2025-03-20 01:27:03'),
(218, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 01:27:07', '2025-03-20 01:27:07'),
(219, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 01:27:11', '2025-03-20 01:27:11'),
(220, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 01:28:08', '2025-03-20 01:28:08'),
(221, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 01:30:25', '2025-03-20 01:30:25'),
(222, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 01:30:46', '2025-03-20 01:30:46'),
(223, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 01:31:17', '2025-03-20 01:31:17'),
(224, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 01:31:22', '2025-03-20 01:31:22'),
(225, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 01:31:30', '2025-03-20 01:31:30'),
(226, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 01:31:32', '2025-03-20 01:31:32'),
(227, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 01:31:34', '2025-03-20 01:31:34'),
(228, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 01:31:37', '2025-03-20 01:31:37'),
(229, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 01:31:41', '2025-03-20 01:31:41'),
(230, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 01:31:52', '2025-03-20 01:31:52'),
(231, 'default', 'Menginput booking dengan No Plat: ud 733622 udaa', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-20 01:32:17', '2025-03-20 01:32:17'),
(232, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 2, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 01:33:15', '2025-03-20 01:33:15'),
(233, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-20 02:25:15', '2025-03-20 02:25:15'),
(234, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 02:25:25', '2025-03-20 02:25:25'),
(235, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 02:25:25', '2025-03-20 02:25:25'),
(236, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 2, '[]', NULL, '2025-03-20 02:33:10', '2025-03-20 02:33:10'),
(237, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 6, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 02:33:34', '2025-03-20 02:33:34'),
(238, 'default', 'User logout', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2025-03-20 05:06:04', '2025-03-20 05:06:04'),
(239, 'default', 'User berhasil login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 05:06:22', '2025-03-20 05:06:22'),
(240, 'default', 'User melakukan login', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"127.0.0.1\"}', NULL, '2025-03-20 05:06:22', '2025-03-20 05:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` bigint UNSIGNED NOT NULL,
  `keluhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cabang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `kendaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_antrian` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'jogja', '2025-02-18 18:21:11', '2025-02-18 18:21:11'),
(2, 'kaliurang', '2025-02-18 18:21:29', '2025-02-18 18:21:29'),
(3, 'sleman', '2025-03-18 03:14:55', '2025-03-18 03:14:55'),
(4, 'afrika', '2025-03-19 01:41:16', '2025-03-19 01:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` int NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `email`, `umur`, `alamat`, `no_telp`, `image`, `gender`, `created_at`, `updated_at`) VALUES
(8, 'rapa supri', 'rapasupri@gmail.com', 35, 'isi', '8279217849127834', 'karyawan/vOLYlUxgVa7Rt92VSmJKyl9c0qnEpXSEBmKE5y1g.jpg', 'male', '2025-02-19 19:07:17', '2025-02-19 19:07:17'),
(9, 'giyohhh', 'giyohh12@gmail.com', 58, 'gunkid', '8279217849127834', 'karyawan/MXF0rsnUAGjkyfED9KuxVffVNvrJp15TRDruzP9D.jpg', 'male', '2025-02-19 19:07:59', '2025-02-20 23:14:28'),
(10, 'Andika Jaya Saputraaa', 'andikajsp19@gmail.com', 23, 'mojolegi', '24242312341324', NULL, 'male', '2025-03-18 03:17:20', '2025-03-18 03:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` bigint UNSIGNED NOT NULL,
  `no_plat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_mesin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transmisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int NOT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cc` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `no_plat`, `merk`, `tipe`, `no_mesin`, `transmisi`, `tahun`, `ktp`, `cc`, `created_at`, `updated_at`) VALUES
(4, 'AB 532265 CD', 'Honda', 'brio', 'NM12612413', 'Automatic', 2022, '81286468', 0, '2025-02-19 21:59:19', '2025-03-13 05:17:57'),
(5, 'ud 733622 ud', 'Honda', 'MOTOR', 'NM33332', 'Manual', 1980, '81286468', 0, '2025-02-19 21:59:46', '2025-02-19 21:59:46'),
(6, 'Ab 25243 DG', 'amir', 'MOTOR', 'RT62523123', 'Automatic', 2022, '2312412', 0, '2025-02-20 01:11:48', '2025-02-20 01:11:48'),
(8, 'ud 733622 udaa', 'Honda', 'brio', 'NM333322', 'Automatic', 2002, '1234567890123456', 100, '2025-03-09 20:20:26', '2025-03-18 03:15:21'),
(9, 'AB 1234 BAA', 'Honda', 'Vario', 'NM3333344', 'Automatic', 2011, '32424234', 200, '2025-03-15 11:54:22', '2025-03-15 11:54:22'),
(10, 'AB 1234 BAAA', 'TOYOTA', 'Vario', 'NM3333322', 'Automatic', 2022, '81286468', 100, '2025-03-19 01:27:24', '2025-03-19 01:27:24'),
(11, 'ud 733622 udA', 'amir', 'brio', 'NM126124111', 'Automatic', 2022, '32424234', 100, '2025-03-19 02:11:29', '2025-03-19 02:11:29'),
(12, 'ABB 46216 DC', 'Avansa', 'bebek', 'PM23456', 'Automatic', 2000, '1234567891', 100, '2025-03-19 04:22:05', '2025-03-19 04:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `libur`
--

CREATE TABLE `libur` (
  `id` bigint UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `libur`
--

INSERT INTO `libur` (`id`, `tanggal`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '2025-03-23', 'libur nih gaisss', '2025-03-19 22:55:10', '2025-03-19 22:56:56'),
(2, '2025-04-09', 'libur nih gaisssaaa', '2025-03-20 00:05:48', '2025-03-20 00:05:48'),
(3, '2025-03-21', NULL, '2025-03-20 00:57:21', '2025-03-20 00:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(158, '2014_10_12_000000_create_users_table', 1),
(159, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(160, '2019_08_19_000000_create_failed_jobs_table', 1),
(161, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(162, '2025_01_25_024332_create_kendaraan_table', 1),
(163, '2025_01_28_034738_create_cabang_table', 1),
(164, '2025_01_28_041944_create_tempat_table', 1),
(165, '2025_02_03_065042_create_booking_table', 1),
(166, '2025_02_05_061028_create_permission_tables', 1),
(167, '2025_02_10_064905_create_karyawan_table', 1),
(168, '2025_02_10_064937_create_sparepart_table', 1),
(169, '2025_02_10_121309_create_riwayat_table', 1),
(170, '2025_02_10_121628_create_riwayat_sparepart_table', 1),
(171, '2025_02_12_011521_add_harga_and_dana_tambahan_to_riwayat_table', 1),
(172, '2025_02_12_113800_add_harga_to_sparepart_table', 1),
(173, '2025_02_17_033153_add_waktu_to_booking_table', 1),
(174, '2025_02_18_150121_create_service_table', 1),
(175, '2025_02_18_163902_add_harga_service_to_riwayat_table', 1),
(176, '2025_02_19_015319_add_no_mesin_to_kendaraan_table', 2),
(177, '2025_03_10_031919_add_cc_to_kendaraan_table', 3),
(178, '2025_03_10_130127_add_kendaraan_to_riwayat_table', 4),
(179, '2025_03_11_230228_create_tambah_stock_table', 5),
(180, '2025_03_13_101058_create_activity_log_table', 6),
(181, '2025_03_13_101059_add_event_column_to_activity_log_table', 6),
(182, '2025_03_13_101100_add_batch_uuid_column_to_activity_log_table', 6),
(183, '2025_03_20_041803_create_libur_table', 7),
(185, '2025_03_20_090059_add_status_to_riwayat_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'frontend.index', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(2, 'frontend.kendaraan', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(3, 'frontend.service', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(4, 'frontend.riwayat', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(5, 'auth.edit', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(6, 'auth.profile.update', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(7, 'kendaraan.index', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(8, 'kendaraan.create', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(9, 'kendaraan.store', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(10, 'kendaraan.edit', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(11, 'kendaraan.update', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(12, 'kendaraan.destroy', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(13, 'booking.index', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(14, 'booking.create', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(15, 'booking.store', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(16, 'booking.edit', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(17, 'booking.update', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(18, 'booking.destroy', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(19, 'booking.updateStatus', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(20, 'booking.updateJenis', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(21, 'booking.updateWaktu', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(22, 'booking.selesaikan', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(23, 'booking.storeSelesai', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(24, 'booking.createFormAdmin', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(25, 'booking.storeFormAdmin', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(26, 'cabang.index', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(27, 'cabang.create', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(28, 'cabang.store', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(29, 'cabang.edit', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(30, 'cabang.update', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(31, 'cabang.destroy', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(32, 'tempat.byCabang', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(33, 'backend.index', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(34, 'adminregister', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(35, 'user.index', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(36, 'user.create', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(37, 'user.store', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(38, 'user.edit', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(39, 'user.update', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(40, 'user.destroy', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(41, 'admin.user.updateRole', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(42, 'roles.index', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(43, 'roles.create', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(44, 'roles.store', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(45, 'roles.show', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(46, 'roles.edit', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(47, 'roles.update', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(48, 'roles.destroy', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(49, 'sparepart.index', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(50, 'sparepart.create', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(51, 'sparepart.store', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(52, 'sparepart.edit', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(53, 'sparepart.update', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(54, 'sparepart.destroy', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(55, 'riwayat.index', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(56, 'riwayat.create', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(57, 'riwayat.store', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(58, 'riwayat.show', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(59, 'riwayat.edit', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(60, 'riwayat.update', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(61, 'riwayat.destroy', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(62, 'riwayat.invoice', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(63, 'laporan.index', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(64, 'laporan.export.csv', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(65, 'karyawan.index', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(66, 'karyawan.create', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(67, 'karyawan.store', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(68, 'karyawan.edit', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(69, 'karyawan.update', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(70, 'karyawan.destroy', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(71, 'service.index', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(72, 'service.create', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(73, 'service.store', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(74, 'service.edit', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(75, 'service.update', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(76, 'service.destroy', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(77, 'stock.index', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(78, 'stock.create', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46'),
(79, 'stock.store', 'web', '2025-03-17 18:55:46', '2025-03-17 18:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluhan` text COLLATE utf8mb4_unicode_ci,
  `cabang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date NOT NULL,
  `no_antrian` int NOT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kendaraan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `karyawan_id` bigint UNSIGNED NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `harga` decimal(12,2) DEFAULT NULL,
  `dana_tambahan` decimal(12,2) DEFAULT NULL,
  `dana_tambahan_deskripsi` json DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum dibayar',
  `harga_service` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id`, `jenis_service`, `keluhan`, `cabang`, `tempat`, `tanggal`, `no_antrian`, `ktp`, `kendaraan`, `karyawan_id`, `catatan`, `harga`, `dana_tambahan`, `dana_tambahan_deskripsi`, `status`, `harga_service`, `created_at`, `updated_at`) VALUES
(10, 'berat', 'bwcuhbwec wec', 'jogja', 'kasihan', '2025-03-10', 1, '1234567890123456', 'AB 7777 CC', 8, 'wefwfwv', '71000.00', '1000.00', '[{\"amount\": 1000, \"description\": \"service\"}]', 'belum dibayar', '50000.00', '2025-03-10 06:13:35', '2025-03-10 06:13:35'),
(11, 'sedang', 'qwcqccq', 'jogja', 'bantulllll', '2025-03-11', 1, '81286468', 'AB 532265 CD', 9, 'tymtynn', '40000.00', '0.00', '[{\"amount\": 0, \"description\": \"\"}]', 'belum dibayar', '20000.00', '2025-03-10 19:43:10', '2025-03-10 19:43:10'),
(12, 'ringan', 'BAN BOCOR', 'jogja', 'kasihan', '2025-03-14', 1, '1234567890123456', 'AB 532265 CD', 9, 'FSSFS', '20000.00', '0.00', '[{\"amount\": 0, \"description\": \"\"}]', 'belum dibayar', '10000.00', '2025-03-14 01:49:42', '2025-03-14 01:49:42'),
(13, 'sedang', 'sddvvrwv', 'jogja', 'kasihan', '2025-03-14', 3, '81286468', 'AB 532265 CD', 8, 'cewcwe', '30000.00', '0.00', '[{\"amount\": 0, \"description\": \"\"}]', 'belum dibayar', '20000.00', '2025-03-14 01:56:37', '2025-03-14 01:56:37'),
(14, 'sedang', 'cqecqec', 'jogja', 'bantulllll', '2025-03-16', 1, '32424234', 'AB 1234 BAA', 8, 'ewcewcew', '41111.00', '1111.00', '[{\"amount\": 1111, \"description\": \"service\"}]', 'belum dibayar', '20000.00', '2025-03-15 12:00:17', '2025-03-15 12:00:17'),
(15, 'ringan', 'gfuewgbfbewc', 'jogja', 'kasihan', '2025-03-17', 1, '81286468', 'ud 733622 ud', 9, 'hevcwygecw', '20000.00', '0.00', '[{\"amount\": 0, \"description\": \"\"}]', 'belum dibayar', '10000.00', '2025-03-17 03:22:30', '2025-03-17 03:22:30'),
(16, 'sedang', 'ban bocor', 'jogja', 'bantulllll', '2025-03-19', 4, '81286468', 'AB 1234 BAAA', 9, 'ban luar tipis harus ganti', '70000.00', '20000.00', '[{\"amount\": 20000, \"description\": \"lubang banyak\"}]', 'belum dibayar', '20000.00', '2025-03-19 01:32:20', '2025-03-19 01:32:20'),
(17, 'ringan', 'ewcwcewcw', 'jogja', 'kasihan', '2025-03-19', 1, '81286468', 'AB 532265 CD', 10, 'wecwecwec', '190000.00', '0.00', '[{\"amount\": 0, \"description\": \"\"}]', 'belum dibayar', '10000.00', '2025-03-19 01:44:24', '2025-03-19 01:44:24'),
(18, 'sedang', 'rverve', 'jogja', 'kasihan', '2025-03-19', 3, '32424234', 'AB 1234 BAA', 8, NULL, '90000.00', '20000.00', '[{\"amount\": 20000, \"description\": \"pelk bencolnya terlalu banyak\"}, {\"amount\": 0, \"description\": \"\"}]', 'belum dibayar', '20000.00', '2025-03-19 02:17:11', '2025-03-19 02:17:11'),
(19, 'ringan', 'ban bocor', 'afrika', 'bantulllll', '2025-03-19', 6, '1234567891', 'ABB 46216 DC', 8, NULL, '160000.00', '0.00', '[{\"amount\": 0, \"description\": \"\"}]', 'belum dibayar', '10000.00', '2025-03-19 04:24:54', '2025-03-20 02:31:41'),
(20, 'sedang', 'qcqcqw', '1', '1', '2025-03-19', 17, '23124122313', 'ADC123SSA', 9, 'ecewcew', '40000.00', '0.00', '[{\"amount\": 0, \"description\": \"\"}]', 'belum dibayar', '20000.00', '2025-03-19 09:51:08', '2025-03-20 02:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_sparepart`
--

CREATE TABLE `riwayat_sparepart` (
  `id` bigint UNSIGNED NOT NULL,
  `riwayat_id` bigint UNSIGNED NOT NULL,
  `sparepart_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_sparepart`
--

INSERT INTO `riwayat_sparepart` (`id`, `riwayat_id`, `sparepart_id`, `quantity`, `created_at`, `updated_at`) VALUES
(10, 10, 5, 1, '2025-03-10 06:13:35', '2025-03-10 06:13:35'),
(11, 11, 5, 1, '2025-03-10 19:43:10', '2025-03-10 19:43:10'),
(12, 12, 4, 1, '2025-03-14 01:49:42', '2025-03-14 01:49:42'),
(13, 13, 4, 1, '2025-03-14 01:56:37', '2025-03-14 01:56:37'),
(14, 14, 5, 1, '2025-03-15 12:00:17', '2025-03-15 12:00:17'),
(15, 15, 4, 1, '2025-03-17 03:22:30', '2025-03-17 03:22:30'),
(16, 16, 4, 1, '2025-03-19 01:32:20', '2025-03-19 01:32:20'),
(17, 16, 5, 1, '2025-03-19 01:32:20', '2025-03-19 01:32:20'),
(18, 17, 5, 9, '2025-03-19 01:44:24', '2025-03-19 01:44:24'),
(19, 18, 4, 3, '2025-03-19 02:17:11', '2025-03-19 02:17:11'),
(20, 18, 5, 1, '2025-03-19 02:17:11', '2025-03-19 02:17:11'),
(21, 19, 4, 7, '2025-03-19 04:24:54', '2025-03-19 04:24:54'),
(22, 19, 5, 4, '2025-03-19 04:24:54', '2025-03-19 04:24:54'),
(23, 20, 5, 1, '2025-03-19 09:51:08', '2025-03-19 09:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'web', '2025-02-18 18:17:57', '2025-02-18 18:17:57'),
(2, 'admin', 'web', '2025-02-18 18:17:57', '2025-02-18 18:17:57'),
(3, 'superadmin', 'web', '2025-02-18 18:17:57', '2025-02-18 18:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(14, 1),
(15, 1),
(1, 2),
(7, 2),
(13, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(32, 2),
(33, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(73, 2),
(74, 2),
(75, 2),
(76, 2),
(77, 2),
(78, 2),
(79, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(42, 3),
(43, 3),
(44, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(50, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(55, 3),
(56, 3),
(57, 3),
(58, 3),
(59, 3),
(60, 3),
(61, 3),
(62, 3),
(63, 3),
(64, 3),
(65, 3),
(66, 3),
(67, 3),
(68, 3),
(69, 3),
(70, 3),
(71, 3),
(72, 3),
(73, 3),
(74, 3),
(75, 3),
(76, 3),
(77, 3),
(78, 3),
(79, 3);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `jenis_service`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'ringan', '10000.00', '2025-02-18 18:30:02', '2025-02-18 18:30:02'),
(2, 'sedang', '20000.00', '2025-02-18 18:30:11', '2025-02-18 18:30:11'),
(3, 'berat', '50000.00', '2025-02-18 18:30:20', '2025-02-18 18:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `harga` decimal(12,2) NOT NULL DEFAULT '0.00',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`id`, `nama`, `stock`, `deskripsi`, `harga`, `image`, `created_at`, `updated_at`) VALUES
(4, 'oli bensol', 25, 'erervwe', '10000.00', 'sparepart/j1InTI3mSB8iQPFbXLMyv6al5iioQFDd605OvFMd.jpg', '2025-02-19 21:55:48', '2025-03-19 04:24:54'),
(5, 'roler recing', 25, 'd31d12s12', '20000.00', 'sparepart/PMsJaPB6f8baCbcND3fM7bTOySjfID083sjtkoLY.jpg', '2025-02-19 21:56:08', '2025-03-19 04:24:54'),
(6, 'steng kawat', 25, 'hehe', '21000.00', NULL, '2025-03-18 03:16:05', '2025-03-18 03:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `tambah_stock_spareparts`
--

CREATE TABLE `tambah_stock_spareparts` (
  `id` bigint UNSIGNED NOT NULL,
  `sparepart_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tambah_stock_spareparts`
--

INSERT INTO `tambah_stock_spareparts` (`id`, `sparepart_id`, `quantity`, `keterangan`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 6, 2, NULL, 1, '2025-03-18 03:16:23', '2025-03-18 03:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE `tempat` (
  `id` bigint UNSIGNED NOT NULL,
  `cabang_id` bigint UNSIGNED NOT NULL,
  `nama_tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`id`, `cabang_id`, `nama_tempat`, `created_at`, `updated_at`) VALUES
(1, 1, 'kasihan', '2025-02-18 18:21:11', '2025-02-18 18:21:11'),
(2, 1, 'bantulllll', '2025-02-18 18:21:11', '2025-02-18 18:21:11'),
(3, 2, 'apem', '2025-02-18 18:21:29', '2025-02-18 18:21:29'),
(4, 2, 'tempe', '2025-02-18 18:21:29', '2025-02-18 18:21:29'),
(6, 3, 'heheee', '2025-03-18 03:15:01', '2025-03-18 03:15:01'),
(7, 4, 'bantulllll', '2025-03-19 01:41:16', '2025-03-19 01:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ktp`, `nama`, `alamat`, `hp`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1234567890123456', 'superadmin', 'Jl. Admin No. 1', '081234567890', 'superadmin@example.com', NULL, '$2y$12$MzFHBVWk9QnHVW71aVmx6Oawv1MBQwIg.6/4fUchPwmClavgki6bi', 'superadmin', NULL, '2025-02-18 18:17:58', '2025-02-18 18:17:58'),
(2, '2234567890123456', 'admin', 'Jl. Admin No. 2', '082345678901', 'admin@example.com', NULL, '$2y$12$4vyPoFXakqLOlTE2y.PpZe.OyD2rOZ1Q5h3q1ZvSQh6E3OfLwe8Ui', 'admin', NULL, '2025-02-18 18:17:58', '2025-02-18 18:17:58'),
(3, '81286468', 'dikaaaaa', 'mojolegi karangtengah', '083108591741', 'andikajsp19@gmail.com', NULL, '$2y$12$ItvfxHGcDi6hfWbDSOrX8O2qOvGDLYZUyG33Mwvii7tFGYxAS6WE2', 'admin', NULL, '2025-02-18 18:20:04', '2025-03-19 01:57:52'),
(4, '44444', 'dinda', 'bantul', '444444444444', '44@g.c', NULL, '$2y$12$c62RbQgrtKPjcEvaI/x0pO0Xbt5GjsJJRe0FSO4H2cRPT7z6dxw/2', 'nonaktif', NULL, '2025-02-18 20:58:13', '2025-02-19 23:05:47'),
(5, '2312412', 'expen', 'mojolegi karangtengahss', '083108591741', '12ww@gmail.com', NULL, '$2y$12$rhfaMR1VLIZhxc6fhQV4veTK85YqblrfYlww4h2UFc9rBgbDxiGmi', 'nonaktif', NULL, '2025-02-20 01:10:52', '2025-02-20 23:25:40'),
(6, '32424234', 'expen', 'mojolegi karangtengah', '08310859174111', 'rapasupri@gmail.com', NULL, '$2y$12$k7z00EpJ4pfOLcZPYOA9kuBmU7Cp.zbjGr9f7./RurWTcXFyn0/PW', 'user', NULL, '2025-03-15 11:52:45', '2025-03-15 11:52:45'),
(7, '1234567891', 'jentol', 'bantul', '1234567890', 'jentol@gmail.com', NULL, '$2y$12$ezLnvREUpmZ0RCbLMOd5peIEAfQSghS0ofKRsOgfECHUJ.Axkqr02', 'user', NULL, '2025-03-19 04:21:04', '2025-03-19 04:21:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `karyawan_email_unique` (`email`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kendaraan_no_plat_unique` (`no_plat`),
  ADD UNIQUE KEY `kendaraan_no_mesin_unique` (`no_mesin`),
  ADD KEY `kendaraan_ktp_foreign` (`ktp`);

--
-- Indexes for table `libur`
--
ALTER TABLE `libur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libur_tanggal_unique` (`tanggal`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_karyawan_id_foreign` (`karyawan_id`);

--
-- Indexes for table `riwayat_sparepart`
--
ALTER TABLE `riwayat_sparepart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_sparepart_riwayat_id_foreign` (`riwayat_id`),
  ADD KEY `riwayat_sparepart_sparepart_id_foreign` (`sparepart_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_jenis_service_unique` (`jenis_service`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tambah_stock_spareparts`
--
ALTER TABLE `tambah_stock_spareparts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tambah_stock_spareparts_sparepart_id_foreign` (`sparepart_id`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tempat_cabang_id_foreign` (`cabang_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_ktp_unique` (`ktp`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `libur`
--
ALTER TABLE `libur`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `riwayat_sparepart`
--
ALTER TABLE `riwayat_sparepart`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tambah_stock_spareparts`
--
ALTER TABLE `tambah_stock_spareparts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `kendaraan_ktp_foreign` FOREIGN KEY (`ktp`) REFERENCES `users` (`ktp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `riwayat_sparepart`
--
ALTER TABLE `riwayat_sparepart`
  ADD CONSTRAINT `riwayat_sparepart_riwayat_id_foreign` FOREIGN KEY (`riwayat_id`) REFERENCES `riwayat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `riwayat_sparepart_sparepart_id_foreign` FOREIGN KEY (`sparepart_id`) REFERENCES `sparepart` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tambah_stock_spareparts`
--
ALTER TABLE `tambah_stock_spareparts`
  ADD CONSTRAINT `tambah_stock_spareparts_sparepart_id_foreign` FOREIGN KEY (`sparepart_id`) REFERENCES `sparepart` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tempat`
--
ALTER TABLE `tempat`
  ADD CONSTRAINT `tempat_cabang_id_foreign` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
