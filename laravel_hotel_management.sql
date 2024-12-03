-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2024 at 05:59 PM
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
-- Database: `laravel_hotel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rooms_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `check_in` varchar(255) DEFAULT NULL,
  `check_out` varchar(255) DEFAULT NULL,
  `persion` varchar(255) DEFAULT NULL,
  `number_of_rooms` varchar(255) DEFAULT NULL,
  `total_night` double(8,2) NOT NULL DEFAULT 0.00,
  `actual_price` double(8,2) NOT NULL DEFAULT 0.00,
  `subtotal` decimal(15,2) DEFAULT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `total_price` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `transation_id` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `rooms_id`, `user_id`, `check_in`, `check_out`, `persion`, `number_of_rooms`, `total_night`, `actual_price`, `subtotal`, `discount`, `total_price`, `payment_method`, `transation_id`, `payment_status`, `name`, `email`, `phone`, `address`, `country`, `state`, `zip_code`, `status`, `code`, `created_at`, `updated_at`) VALUES
(1, 6, 2, '2024-09-28', '2024-09-30', '03', '05', 7.00, 452000.00, 3164000.00, 316400, 2847600.00, 'COD', '', '0', 'user', 'user@gmail.com', '01538309325', 'Bangaldesh', 'Bangladesh', 'Gujrat', '565645454', 0, '26950641991', '2024-09-17 09:51:51', '2024-11-23 12:08:49'),
(2, 6, 2, '2024-09-18', '2024-09-25', '03', '4', 7.00, 452000.00, 3164000.00, 316400, 2847600.00, 'COD', '', '0', 'user', 'user@gmail.com', '01538309325', 'Bangaldesh', 'Bangladesh', 'Gujrat', '565', 0, '67760666178', '2024-09-17 09:52:09', '2024-09-17 09:52:09'),
(3, 6, 2, '2024-09-18', '2024-09-25', '03', '3', 7.00, 452000.00, 3164000.00, 316400, 2847600.00, 'COD', '', '0', 'user', 'user@gmail.com', '01538309325', 'Bangaldesh', 'Bangladesh', 'Gujrat', '565', 0, '72082782771', '2024-09-17 09:54:08', '2024-09-17 09:54:08'),
(4, 6, 2, '2024-09-18', '2024-09-25', '03', '2', 7.00, 452000.00, 3164000.00, 316400, 2847600.00, 'COD', '', '0', 'user', 'user@gmail.com', '01538309325', 'Bangaldesh', 'Bangladesh', 'Gujrat', '565', 0, '65504349765', '2024-09-17 10:03:57', '2024-09-17 10:03:57'),
(5, 6, 2, '2024-09-18', '2024-09-25', '03', '6', 7.00, 452000.00, 3164000.00, 316400, 2847600.00, 'COD', '', '0', 'user', 'user@gmail.com', '01538309325', 'Bangaldesh', 'Bangladesh', 'Gujrat', '565', 0, '39817721739', '2024-09-17 10:04:23', '2024-09-17 10:04:23'),
(6, 6, 2, '2024-09-18', '2024-09-25', '03', '2', 7.00, 452000.00, 3164000.00, 316400, 2847600.00, 'COD', '', '1', 'user', 'user@gmail.com', '01538309325', 'Bangaldesh', 'Bangladesh', 'Gujrat', '565', 1, '38389922870', '2024-09-17 10:10:05', '2024-10-15 00:54:19'),
(7, 6, 2, '2024-09-22', '2024-09-24', '02', '4', 2.00, 452000.00, 904000.00, 90400, 813600.00, 'COD', '', '0', 'user', 'user@gmail.com', '01538309325', 'Bangaldesh', 'Bangladesh', 'Canada', '125479', 0, '90761868141', '2024-09-20 11:07:24', '2024-09-20 11:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `booking_room_lists`
--

CREATE TABLE `booking_room_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `rooms_id` int(11) DEFAULT NULL,
  `room_number_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_room_lists`
--

INSERT INTO `booking_room_lists` (`id`, `booking_id`, `rooms_id`, `room_number_id`, `created_at`, `updated_at`) VALUES
(1, 5, 6, 15, '2024-11-22 12:47:45', '2024-11-22 12:47:45'),
(4, 1, 6, 16, '2024-11-24 04:52:10', '2024-11-24 04:52:10'),
(5, 1, 6, 17, '2024-11-24 04:53:47', '2024-11-24 04:53:47'),
(6, 3, 6, 14, '2024-11-24 09:37:13', '2024-11-24 09:37:13'),
(9, 6, 6, 14, '2024-11-25 06:02:56', '2024-11-25 06:02:56'),
(10, 6, 6, 17, '2024-11-25 06:03:06', '2024-11-25 06:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `book_areas`
--

CREATE TABLE `book_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `short_title` varchar(255) DEFAULT NULL,
  `main_title` varchar(255) DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_areas`
--

INSERT INTO `book_areas` (`id`, `image`, `short_title`, `main_title`, `short_desc`, `link_url`, `created_at`, `updated_at`) VALUES
(1, 'upload/bookarea/1804033818271580.jpg', 'Hollywood Twin Room', 'Naming your restaurant is one of the most important branding decisions you’ll make as a business owner, but coming up with restaurant names can be tough!', NULL, 'http://facebook.com', '2024-07-08 16:51:46', '2024-07-09 00:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rooms_id` int(11) NOT NULL,
  `facility_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `rooms_id`, `facility_name`, `created_at`, `updated_at`) VALUES
(11, 4, 'Slippers', '2024-07-05 17:20:22', '2024-07-05 17:20:22'),
(12, 4, 'Work Desk', '2024-07-05 17:20:23', '2024-07-05 17:20:23'),
(13, 4, 'Slippers', '2024-07-05 17:20:23', '2024-07-05 17:20:23'),
(14, 4, 'Rain Shower', '2024-07-05 17:20:23', '2024-07-05 17:20:23'),
(31, 3, NULL, '2024-08-30 23:00:54', '2024-08-30 23:00:54'),
(32, 3, 'Wake-up service', '2024-08-30 23:00:54', '2024-08-30 23:00:54'),
(33, 3, 'Laundry & Dry Cleaning', '2024-08-30 23:00:54', '2024-08-30 23:00:54'),
(34, 3, NULL, '2024-08-30 23:00:54', '2024-08-30 23:00:54'),
(39, 5, 'Smoke alarms', '2024-09-08 09:12:00', '2024-09-08 09:12:00'),
(40, 5, 'Hair dryer', '2024-09-08 09:12:00', '2024-09-08 09:12:00'),
(41, 5, 'Hair dryer', '2024-09-08 09:12:00', '2024-09-08 09:12:00'),
(42, 5, 'Safety box', '2024-09-08 09:12:00', '2024-09-08 09:12:00'),
(43, 6, 'Free Wi-Fi', '2024-09-08 09:15:01', '2024-09-08 09:15:01'),
(44, 6, 'Smoke alarms', '2024-09-08 09:15:01', '2024-09-08 09:15:01'),
(45, 6, 'Work Desk', '2024-09-08 09:15:01', '2024-09-08 09:15:01'),
(46, 6, 'Wake-up service', '2024-09-08 09:15:01', '2024-09-08 09:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(23, '2014_10_12_000000_create_users_table', 1),
(24, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(25, '2019_08_19_000000_create_failed_jobs_table', 1),
(26, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(27, '2024_04_22_163427_create_teams_table', 1),
(28, '2024_04_28_020500_create_book_areas_table', 1),
(29, '2024_04_28_044231_create_room_types_table', 1),
(30, '2024_04_28_065344_create_rooms_table', 1),
(31, '2024_04_28_065401_create_facilities_table', 1),
(32, '2024_04_28_065417_create_multi_images_table', 1),
(33, '2024_05_06_071825_create_room_numbers_table', 1),
(34, '2024_07_13_185438_create_bookings_table', 2),
(35, '2024_07_14_171622_create_room_book_dates_table', 2),
(36, '2024_07_17_091022_create_booking_room_lists_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `multi_images`
--

CREATE TABLE `multi_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rooms_id` int(11) NOT NULL,
  `multi_img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roomtype_id` int(11) NOT NULL,
  `total_adult` varchar(255) DEFAULT NULL,
  `total_child` varchar(255) DEFAULT NULL,
  `room_capacity` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `view` varchar(255) DEFAULT NULL,
  `bed_style` varchar(255) DEFAULT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `short_desc` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `roomtype_id`, `total_adult`, `total_child`, `room_capacity`, `image`, `price`, `size`, `view`, `bed_style`, `discount`, `short_desc`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, '3', '2', '3', '1798281847469041.jpg', '452000.00', '25', 'Natural View', 'Twin Bed', 10, 'As i explained before maintain the description in vendor material number of the info record.it will be\r\n\r\nprinted in PO also.When u do MIGO ,check in material tab of migo the description will be displayed as', '<p>As i explained before maintain the description in vendor material number of the info record.it will be</p><p>printed in PO also.When u do MIGO ,check in material tab of migo the description will be displayed as</p><p>required by u.Reg J1iex i am not able check because CIN is not activated in my system.</p>', 1, '2024-07-05 09:56:21', '2024-08-30 23:00:54'),
(4, 3, '23', '36', '5', '1797548210826449.jpg', '485000.00', '25', 'Natural View', 'Twin Bed', 0, 'As i explained before maintain the description in vendor material number of the info record.it will be\r\n\r\nprinted in PO also.When u do MIGO ,check in material tab of migo the description will be displayed as', '<p>As i explained before maintain the description in vendor material number of the info record.it will be</p><p>printed in PO also.When u do MIGO ,check in material tab of migo the description will be displayed as</p><p>required by u.Reg J1iex i am not able check because CIN is not activated in my system.</p>', 1, '2024-07-05 09:57:15', '2024-07-05 17:20:22'),
(5, 4, '3', '2', '4', '1797548210826449.jpg', '485000.00', '25', 'Natural View', 'Twin Bed', 0, 'As i explained before maintain the description in vendor material number of the info record.it will be\r\n\r\nprinted in PO also.When u do MIGO ,check in material tab of migo the description will be displayed as', '<p>As i explained before maintain the description in vendor material number of the info record.it will be</p><p>printed in PO also.When u do MIGO ,check in material tab of migo the description will be displayed as</p><p>required by u.Reg J1iex i am not able check because CIN is not activated in my system.</p>', 1, '2024-07-05 09:57:15', '2024-09-08 09:11:59'),
(6, 5, '23', '36', '3', '1804033818271580.jpg', '452000.00', '25', 'Natural View', 'Twin Bed', 10, 'As i explained before maintain the description in vendor material number of the info record.it will be\r\n\r\nprinted in PO also.When u do MIGO ,check in material tab of migo the description will be displayed as', '<p>As i explained before maintain the description in vendor material number of the info record.it will be</p><p>printed in PO also.When u do MIGO ,check in material tab of migo the description will be displayed as</p><p>required by u.Reg J1iex i am not able check because CIN is not activated in my system.</p>', 1, '2024-07-05 09:56:21', '2024-09-08 09:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `room_book_dates`
--

CREATE TABLE `room_book_dates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `rooms_id` int(11) DEFAULT NULL,
  `book_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_book_dates`
--

INSERT INTO `room_book_dates` (`id`, `booking_id`, `rooms_id`, `book_date`, `created_at`, `updated_at`) VALUES
(1, 6, 6, '2024-09-18', '2024-09-17 10:10:05', '2024-09-17 10:10:05'),
(2, 6, 6, '2024-09-19', '2024-09-17 10:10:05', '2024-09-17 10:10:05'),
(3, 6, 6, '2024-09-20', '2024-09-17 10:10:05', '2024-09-17 10:10:05'),
(4, 6, 6, '2024-09-21', '2024-09-17 10:10:05', '2024-09-17 10:10:05'),
(5, 6, 6, '2024-09-22', '2024-09-17 10:10:05', '2024-09-17 10:10:05'),
(6, 6, 6, '2024-09-23', '2024-09-17 10:10:05', '2024-09-17 10:10:05'),
(7, 6, 6, '2024-09-24', '2024-09-17 10:10:05', '2024-09-17 10:10:05'),
(10, 7, 7, '2024-09-22', '2024-11-23 12:05:42', '2024-11-23 12:05:42'),
(11, 7, 7, '2024-09-23', '2024-11-23 12:05:42', '2024-11-23 12:05:42'),
(12, 1, 1, '2024-09-28', '2024-11-23 12:08:49', '2024-11-23 12:08:49'),
(13, 1, 1, '2024-09-29', '2024-11-23 12:08:49', '2024-11-23 12:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `room_numbers`
--

CREATE TABLE `room_numbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rooms_id` int(11) NOT NULL,
  `room_type_id` varchar(255) NOT NULL,
  `room_no` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_numbers`
--

INSERT INTO `room_numbers` (`id`, `rooms_id`, `room_type_id`, `room_no`, `status`, `created_at`, `updated_at`) VALUES
(4, 4, '4', 302, 'Active', '2024-07-05 17:21:08', '2024-07-05 17:21:08'),
(5, 4, '4', 302, 'Active', '2024-07-05 17:21:40', '2024-07-05 17:21:40'),
(6, 4, '4', 302, 'Active', '2024-07-05 17:21:47', '2024-07-05 17:21:47'),
(7, 4, '4', 241, 'Active', '2024-07-05 17:22:45', '2024-07-05 17:22:45'),
(12, 2, '2', 805, 'Active', '2024-07-07 23:08:56', '2024-07-07 23:08:56'),
(13, 2, '2', 303, 'Active', '2024-07-07 23:09:30', '2024-07-07 23:09:30'),
(14, 6, '5', 241, 'Active', '2024-08-27 10:49:59', '2024-08-27 10:49:59'),
(15, 6, '5', 242, 'Active', '2024-08-27 10:50:15', '2024-08-27 10:50:15'),
(16, 6, '5', 243, 'Active', '2024-08-27 10:50:31', '2024-08-27 10:50:31'),
(17, 6, '5', 244, 'Active', '2024-08-27 10:50:44', '2024-08-27 10:50:44'),
(18, 3, '2', 241, 'Active', '2024-08-27 12:18:53', '2024-08-27 12:18:53'),
(19, 3, '2', 242, 'Active', '2024-08-27 12:19:07', '2024-08-30 23:01:16'),
(20, 5, '4', 401, 'Active', '2024-08-30 22:58:04', '2024-08-30 22:58:04'),
(21, 5, '4', 402, 'Active', '2024-08-30 22:59:50', '2024-08-30 22:59:50'),
(22, 5, '4', 403, 'Active', '2024-08-30 23:00:03', '2024-08-30 23:00:03'),
(23, 3, '2', 243, 'Active', '2024-08-30 23:01:34', '2024-08-30 23:01:34'),
(24, 3, '2', 244, 'Active', '2024-08-30 23:01:43', '2024-08-30 23:01:43'),
(25, 3, '2', 245, 'Active', '2024-08-30 23:01:54', '2024-08-30 23:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Luxury room', '2024-07-05 08:56:48', '2024-07-05 08:56:48'),
(3, 'Bunk Room', '2024-07-05 09:56:19', '2024-07-05 09:56:19'),
(4, 'Deluxe Room & Superior Room', '2024-07-05 09:57:14', '2024-07-05 09:57:14'),
(5, 'Deluxe Room & Superior Room', '2024-07-05 09:57:14', '2024-07-05 09:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `image`, `name`, `position`, `facebook`, `created_at`, `updated_at`) VALUES
(4, 'upload/team/1803938333656932.jpg', 'Kamrul Hasan Ripon', 'Junior Web Developer', 'kawsar@facebook.com', '2024-07-07 16:27:40', '2024-07-07 16:27:40'),
(5, 'upload/team/1803938437304517.jpg', 'nadia sultana', 'Designer', 'https://www.facebook.com', '2024-07-07 16:29:19', '2024-07-07 16:29:19'),
(6, 'upload/team/1803938504306201.jpg', 'kamrul', 'Software Engineer', 'https://www.facebook.com/sthir.esrak.3', '2024-07-07 16:30:23', '2024-07-07 16:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$cGw7xbSN0nGcPFbFx9Tf7.QWZiBePXT2J0GSlY1vq1RyErjwOBIe2', '', '01920797783', NULL, 'admin', 'active', NULL, NULL, NULL),
(2, 'user', 'user@gmail.com', NULL, '$2y$10$lVnd1kc8rI6vRY/qxd7mCe.GAkLRVhOo37yqvcJYA4ww/5HKVjE66', '', '01538309325', 'Bangaldesh', 'user', 'active', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_room_lists`
--
ALTER TABLE `booking_room_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_areas`
--
ALTER TABLE `book_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_images`
--
ALTER TABLE `multi_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_book_dates`
--
ALTER TABLE `room_book_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_numbers`
--
ALTER TABLE `room_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booking_room_lists`
--
ALTER TABLE `booking_room_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book_areas`
--
ALTER TABLE `book_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `multi_images`
--
ALTER TABLE `multi_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room_book_dates`
--
ALTER TABLE `room_book_dates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `room_numbers`
--
ALTER TABLE `room_numbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
