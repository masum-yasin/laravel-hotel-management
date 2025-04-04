-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2025 at 08:19 AM
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
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(1, 'Travel Destination', 'travel-destination', '2025-03-15 08:09:50', '2025-03-15 04:15:38'),
(2, 'Travel Tips And Hacks', 'travel-tips-and-hacks', '2025-03-15 08:11:15', '2025-03-15 08:11:15'),
(3, 'Luxury Hotels', 'luxury-hotels', '2025-03-15 08:13:30', '2025-03-15 08:13:30'),
(4, 'Hotel Reviews', 'hotel-reviews', '2025-03-15 08:13:50', '2025-03-15 08:13:50'),
(5, 'Boutique Hotels', 'boutique-hotels', '2025-03-15 08:15:22', '2025-03-15 08:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blogcat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_slug` varchar(255) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `short_descp` text NOT NULL,
  `long_descp` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `blogcat_id`, `user_id`, `post_slug`, `post_title`, `post_image`, `short_descp`, `long_descp`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Effective hotel management ensures ultimate guest satisfactionHotel Management is the Best Policy', 'Effective hotel management ensures ultimate guest satisfactionHotel Management is the Best Policy', 'upload/post/1827212883201544.jpg', 'A hotel is a commercial establishment that provides lodging, meals, and other services to guests, travelers, and tourists.', '<p>Hotels can range from small family-run businesses to large international chains. Most hotels list a variety of services, such as room service, laundry, and concierge. Some hotels also offer meeting and conference facilities, fitness centers, and spas.</p>', '2025-03-21 14:06:38', '2025-03-21 14:06:38'),
(2, 5, 1, 'Smart hotel management drives success and growth', 'Smart hotel management drives success and growth', 'upload/post/1827652665297436.jpg', 'Hotel management encompasses the comprehensive oversight and operation of a hotel', '<p>11Hotel management encompasses the comprehensive oversight and operation of a hotel, encompassing all aspects from guest services and housekeeping to financial performance and staff management, aiming to ensure a positive guest experience and profitable operation</p>', '2025-03-25 08:43:58', '2025-03-26 04:36:47'),
(4, 2, 1, 'Hotel management is the key to a thriving hospitality business', 'Hotel management is the key to a thriving hospitality business', 'upload/post/1827665034377857.jpg', 'Hotel management encompasses the comprehensive oversight and direction of all aspects of a hotel\'s operation', '<p>Hotel management encompasses the comprehensive oversight and direction of all aspects of a hotel\'s operation, ensuring smooth functioning, profitability, and guest satisfaction. </p>', '2025-03-26 13:53:23', '2025-03-28 07:32:17'),
(5, 5, 1, 'Efficient hotel operations begin with strong management', 'Efficient hotel operations begin with strong management', 'upload/post/1827666071040262.jpg', 'Hotel management encompasses the comprehensive oversight and direction of all aspects of a hotel\'s operation, ensuring smooth functioning, profitability, and guest satisfaction', '<p>A hotel is a commercial establishment that provides lodging, meals, and other services to guests, travelers, and tourists, offering a range of room types and amenities.&nbsp;</p>', '2025-03-26 14:08:06', '2025-03-28 07:32:03'),
(6, 4, 1, 'Mastering hotel management leads to long-term profitability', 'Mastering hotel management leads to long-term profitability', 'upload/post/1827666096216339.jpg', 'A hotel is a commercial establishment that provides lodging, meals, and other services to guests, travelers, and tourists, offering a range of room types and amenities.', '<p>A hotel is a commercial establishment that provides lodging, meals, and other services to guests, travelers, and tourists, offering a range of room types and amenities.&nbsp;</p>', '2025-03-26 14:10:15', '2025-03-26 14:10:15');

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
(3, 6, 2, '2024-09-18', '2024-09-25', '03', '3', 7.00, 452000.00, 3164000.00, 316400, 2847600.00, 'COD', '', '1', 'user', 'user@gmail.com', '01538309325', 'Bangaldesh', 'Bangladesh', 'Gujrat', '565', 1, '72082782771', '2024-09-17 09:54:08', '2025-03-01 23:13:15'),
(4, 6, 2, '2024-09-18', '2024-09-25', '03', '2', 7.00, 452000.00, 3164000.00, 316400, 2847600.00, 'COD', '', '1', 'user', 'user@gmail.com', '01538309325', 'Bangaldesh', 'Bangladesh', 'Gujrat', '565', 1, '65504349765', '2024-09-17 10:03:57', '2025-02-28 22:56:44'),
(5, 6, 2, '2024-09-18', '2024-09-25', '03', '6', 7.00, 452000.00, 3164000.00, 316400, 2847600.00, 'COD', '', '0', 'user', 'user@gmail.com', '01538309325', 'Bangaldesh', 'Bangladesh', 'Gujrat', '565', 0, '39817721739', '2024-09-17 10:04:23', '2024-09-17 10:04:23'),
(6, 6, 2, '2024-09-18', '2024-09-25', '03', '2', 7.00, 452000.00, 3164000.00, 316400, 2847600.00, 'COD', '', '1', 'user', 'user@gmail.com', '01538309325', 'Bangaldesh', 'Bangladesh', 'Gujrat', '565', 1, '38389922870', '2024-09-17 10:10:05', '2024-10-15 00:54:19'),
(7, 6, 2, '2024-09-22', '2024-09-24', '02', '4', 2.00, 452000.00, 904000.00, 90400, 813600.00, 'COD', '', '1', 'user', 'user@gmail.com', '01538309325', 'Bangaldesh', 'Bangladesh', 'Canada', '125479', 1, '90761868141', '2024-09-20 11:07:24', '2025-03-01 01:36:43'),
(8, 6, 2, '2025-02-18', '2025-02-20', '02', '01', 2.00, 452000.00, 904000.00, 90400, 813600.00, 'COD', '', '0', 'user', 'user@gmail.com', '01538309325', 'Bangaldesh', 'Bangladesh', 'New Yourk', '62584', 1, '26308647220', '2025-02-10 23:43:36', '2025-02-11 00:08:54'),
(10, 5, 2, '2025-02-16', '2025-02-19', '02', '01', 3.00, 485000.00, 1455000.00, 0, 1455000.00, 'COD', '', '1', 'alamin', 'alamin@gmail.com', '01538309325', 'Bangaldesh', 'United Kingdom', 'New Yourk', '62584', 1, '8929514772', '2025-02-16 00:59:41', '2025-02-28 22:49:35'),
(11, 6, 2, '2025-02-21', '2025-02-25', '03', '01', 4.00, 452000.00, 1808000.00, 180800, 1627200.00, 'COD', '', '1', 'user', 'user@gmail.com', '01538309325', 'Bangaldesh', 'Bangladesh', 'Dhaka', '62584', 1, '20736203466', '2025-02-21 11:25:06', '2025-03-01 23:18:25'),
(12, 3, 2, '2025-02-22', '2025-02-25', '01', '01', 3.00, 452000.00, 1356000.00, 135600, 1220400.00, 'COD', '', '0', 'user', 'user@gmail.com', '01538309325', 'Bangaldesh', 'Bangladesh', 'Dhaka', '62584', 0, '38762489731', '2025-02-21 11:25:29', '2025-02-21 11:25:29'),
(13, 5, 2, '2025-02-26', '2025-02-27', '02', '01', 1.00, 485000.00, 485000.00, 0, 485000.00, 'COD', '', '1', 'Ifran Khan', 'ifran@gmail.com', '01538309325', 'Bangaldesh', 'Bangladesh', 'Dhaka', '62584', 1, '41211353051', '2025-02-21 11:26:42', '2025-02-28 07:37:04');

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
(10, 6, 6, 17, '2024-11-25 06:03:06', '2024-11-25 06:03:06'),
(12, 8, 6, 14, '2025-02-10 23:53:58', '2025-02-10 23:53:58'),
(13, 1, 6, 17, '2025-02-11 01:59:39', '2025-02-11 01:59:39'),
(14, 1, 6, 15, '2025-02-11 02:05:53', '2025-02-11 02:05:53'),
(15, 3, 6, 15, '2025-02-11 02:32:58', '2025-02-11 02:32:58'),
(16, 3, 6, 15, '2025-02-11 02:44:09', '2025-02-11 02:44:09'),
(17, 9, 3, 19, '2025-02-15 09:49:08', '2025-02-15 09:49:08'),
(18, 9, 3, 18, '2025-02-15 09:49:12', '2025-02-15 09:49:12'),
(19, 9, 3, 23, '2025-02-15 09:49:18', '2025-02-15 09:49:18'),
(20, 11, 6, 14, '2025-02-21 23:46:16', '2025-02-21 23:46:16'),
(21, 13, 5, 21, '2025-02-28 07:36:40', '2025-02-28 07:36:40'),
(22, 10, 5, 21, '2025-02-28 22:49:25', '2025-02-28 22:49:25'),
(23, 4, 6, 15, '2025-02-28 22:56:35', '2025-02-28 22:56:35'),
(24, 7, 6, 15, '2025-02-28 23:18:53', '2025-02-28 23:18:53');

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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `message` longtext NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 6, 'A hotel is a commercial establishment that provides lodging, meals, and other services to guests, travelers, and tourists, offering a range of room types and amenities.', '1', '2025-04-02 16:43:22', '2025-04-04 00:16:32'),
(2, 2, 6, 'Here are some examples of hotel comment texts, focusing on different aspects of a hotel stay, including booking confirmations, welcome messages,', '1', '2025-04-02 16:52:06', '2025-04-04 00:18:43');

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
(205, 6, 'Wake-up service', '2025-03-14 11:20:22', '2025-03-14 11:20:22'),
(206, 6, 'Wake-up service', '2025-03-14 11:20:22', '2025-03-14 11:20:22'),
(207, 6, 'Work Desk', '2025-03-14 11:20:22', '2025-03-14 11:20:22'),
(208, 6, 'Safety box', '2025-03-14 11:20:22', '2025-03-14 11:20:22'),
(209, 6, 'Slippers', '2025-03-14 11:20:22', '2025-03-14 11:20:22'),
(210, 5, 'Smoke alarms', '2025-03-14 11:21:04', '2025-03-14 11:21:04'),
(211, 5, 'Hair dryer', '2025-03-14 11:21:04', '2025-03-14 11:21:04'),
(212, 5, 'Hair dryer', '2025-03-14 11:21:04', '2025-03-14 11:21:04'),
(213, 5, 'Safety box', '2025-03-14 11:21:04', '2025-03-14 11:21:04'),
(214, 4, 'Slippers', '2025-03-14 11:21:32', '2025-03-14 11:21:32'),
(215, 4, 'Work Desk', '2025-03-14 11:21:32', '2025-03-14 11:21:32'),
(216, 4, 'Slippers', '2025-03-14 11:21:32', '2025-03-14 11:21:32'),
(217, 4, 'Rain Shower', '2025-03-14 11:21:32', '2025-03-14 11:21:32'),
(218, 3, NULL, '2025-03-14 11:21:53', '2025-03-14 11:21:53'),
(219, 3, 'Wake-up service', '2025-03-14 11:21:53', '2025-03-14 11:21:53'),
(220, 3, 'Laundry & Dry Cleaning', '2025-03-14 11:21:53', '2025-03-14 11:21:53'),
(221, 3, NULL, '2025-03-14 11:21:53', '2025-03-14 11:21:53');

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
(36, '2024_07_17_091022_create_booking_room_lists_table', 3),
(37, '2025_03_04_111515_create_testimonials_table', 4),
(38, '2025_03_15_062921_create_categories_table', 5),
(39, '2025_03_15_074848_create_blog_categories_table', 6),
(41, '2025_03_16_010352_create_blog_posts_table', 7),
(42, '2025_04_02_064544_create_comments_table', 8);

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

--
-- Dumping data for table `multi_images`
--

INSERT INTO `multi_images` (`id`, `rooms_id`, `multi_img`, `created_at`, `updated_at`) VALUES
(4, 3, 'upload/roomimg/multi_img/202503130920_67d2a35c12298.jpg', '2025-03-13 03:20:28', '2025-03-13 03:20:28'),
(5, 3, 'upload/roomimg/multi_img/202503130920_67d2a35c13d48.jpg', '2025-03-13 03:20:28', '2025-03-13 03:20:28'),
(6, 3, 'upload/roomimg/multi_img/202503130920_67d2a35c1522c.jpg', '2025-03-13 03:20:28', '2025-03-13 03:20:28'),
(7, 3, 'upload/roomimg/multi_img/202503130920_67d2a35c16a03.jpg', '2025-03-13 03:20:28', '2025-03-13 03:20:28'),
(8, 3, 'upload/roomimg/multi_img/202503130920_67d2a35c18195.jpg', '2025-03-13 03:20:28', '2025-03-13 03:20:28'),
(13, 5, 'upload/roomimg/multi_img/202503141403_67d4374f01564.jpg', '2025-03-14 08:03:59', '2025-03-14 08:03:59'),
(14, 5, 'upload/roomimg/multi_img/202503141403_67d4374f023fd.jpg', '2025-03-14 08:03:59', '2025-03-14 08:03:59'),
(15, 5, 'upload/roomimg/multi_img/202503141403_67d4374f03207.jpg', '2025-03-14 08:03:59', '2025-03-14 08:03:59'),
(16, 5, 'upload/roomimg/multi_img/202503141403_67d4374f03f22.jpg', '2025-03-14 08:03:59', '2025-03-14 08:03:59'),
(17, 6, 'upload/roomimg/multi_img/202503141405_67d4378fb7bd9.jpg', '2025-03-14 08:05:03', '2025-03-14 08:05:03'),
(18, 6, 'upload/roomimg/multi_img/202503141405_67d4378fb8932.jpg', '2025-03-14 08:05:03', '2025-03-14 08:05:03'),
(19, 6, 'upload/roomimg/multi_img/202503141405_67d4378fb9692.jpg', '2025-03-14 08:05:03', '2025-03-14 08:05:03'),
(20, 6, 'upload/roomimg/multi_img/202503141405_67d4378fba4d1.jpg', '2025-03-14 08:05:03', '2025-03-14 08:05:03'),
(22, 4, 'upload/roomimg/multi_img/202503141625_67d4586cdb469.jpg', '2025-03-14 10:25:16', '2025-03-14 10:25:16'),
(23, 4, 'upload/roomimg/multi_img/202503141625_67d4586cdc47d.jpg', '2025-03-14 10:25:16', '2025-03-14 10:25:16'),
(24, 4, 'upload/roomimg/multi_img/202503141625_67d4586cdd31d.jpg', '2025-03-14 10:25:16', '2025-03-14 10:25:16'),
(25, 4, 'upload/roomimg/multi_img/202503141625_67d4586cde4bc.jpg', '2025-03-14 10:25:16', '2025-03-14 10:25:16');

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
(3, 2, '3', '2', '3', 'upload/roomimg/1826590988571766.jpg', '452000.00', '25', 'Natural View', 'Twin Bed', 10, 'As i explained before maintain the description in vendor material number of the info record.it will be\r\n\r\nprinted in PO also.When u do MIGO ,check in material tab of migo the description will be displayed as', '<p>As i explained before maintain the description in vendor material number of the info record.it will be</p><p>printed in PO also.When u do MIGO ,check in material tab of migo the description will be displayed as</p><p>required by u.Reg J1iex i am not able check because CIN is not activated in my system.</p>', 1, '2024-07-05 09:56:21', '2025-03-14 11:21:53'),
(4, 3, '23', '36', '5', 'upload/roomimg/1826590967367757.jpg', '485000.00', '25', 'Natural View', 'Twin Bed', 0, 'As i explained before maintain the description in vendor material number of the info record.it will be\r\n\r\nprinted in PO also.When u do MIGO ,check in material tab of migo the description will be displayed as', '<p>As i explained before maintain the description in vendor material number of the info record.it will be</p><p>printed in PO also.When u do MIGO ,check in material tab of migo the description will be displayed as</p><p>required by u.Reg J1iex i am not able check because CIN is not activated in my system.</p>', 1, '2024-07-05 09:57:15', '2025-03-14 11:21:32'),
(5, 4, '3', '2', '4', 'upload/roomimg/1826590936336961.jpg', '485000.00', '25', 'Natural View', 'Twin Bed', 0, 'As i explained before maintain the description in vendor material number of the info record.it will be\r\n\r\nprinted in PO also.When u do MIGO ,check in material tab of migo the description will be displayed as', '<p>As i explained before maintain the description in vendor material number of the info record.it will be</p><p>printed in PO also.When u do MIGO ,check in material tab of migo the description will be displayed as</p><p>required by u.Reg J1iex i am not able check because CIN is not activated in my system.</p>', 1, '2024-07-05 09:57:15', '2025-03-14 11:21:04'),
(6, 5, '23', '20', '3', 'upload/roomimg/1826590893448943.jpg', '452000.00', '4', 'Natural View', 'Twin Bed', 10, 'As i explained before maintain the description in vendor material number of the info record.it will be\r\n\r\nprinted in PO also.When u do MIGO ,check in material tab of migo the description will be displayed as', '<p>As i explained before maintain the description in vendor material number of the info record.it will be</p><p>printed in PO also.When u do MIGO ,check in material tab of migo the description will be displayed as</p><p>required by u.Reg J1iex i am not able check because CIN is not activated in my system.</p>', 1, '2024-07-05 09:56:21', '2025-03-14 11:20:22');

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
(13, 1, 1, '2024-09-29', '2024-11-23 12:08:49', '2024-11-23 12:08:49'),
(14, 8, 6, '2025-02-18', '2025-02-10 23:43:36', '2025-02-10 23:43:36'),
(15, 8, 6, '2025-02-19', '2025-02-10 23:43:36', '2025-02-10 23:43:36'),
(16, 10, 5, '2025-02-16', '2025-02-16 00:59:41', '2025-02-16 00:59:41'),
(17, 10, 5, '2025-02-17', '2025-02-16 00:59:41', '2025-02-16 00:59:41'),
(18, 10, 5, '2025-02-18', '2025-02-16 00:59:41', '2025-02-16 00:59:41'),
(19, 11, 6, '2025-02-21', '2025-02-21 11:25:06', '2025-02-21 11:25:06'),
(20, 11, 6, '2025-02-22', '2025-02-21 11:25:06', '2025-02-21 11:25:06'),
(21, 11, 6, '2025-02-23', '2025-02-21 11:25:06', '2025-02-21 11:25:06'),
(22, 11, 6, '2025-02-24', '2025-02-21 11:25:06', '2025-02-21 11:25:06'),
(23, 12, 3, '2025-02-22', '2025-02-21 11:25:29', '2025-02-21 11:25:29'),
(24, 12, 3, '2025-02-23', '2025-02-21 11:25:29', '2025-02-21 11:25:29'),
(25, 12, 3, '2025-02-24', '2025-02-21 11:25:29', '2025-02-21 11:25:29'),
(26, 13, 5, '2025-02-26', '2025-02-21 11:26:42', '2025-02-21 11:26:42');

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
(5, 'upload/team/1803938437304517.jpg', 'nadia sultana', 'Designer', 'https://www.facebook.com', '2024-07-07 16:29:19', '2024-07-07 16:29:19'),
(6, 'upload/team/1803938504306201.jpg', 'kamrul', 'Software Engineer', 'https://www.facebook.com/sthir.esrak.3', '2024-07-07 16:30:23', '2024-07-07 16:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `city`, `image`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Khayrul Alam Rayan Ifti', 'USA, New York', 'upload/testimonial/1826263574005070.jpg', 'Nobody showing up for your sales appointments or webinars? Just send one text message to remind your leads to make an appearanceFinding the answers to these questions isn’t difficult, but getting any kind of new tool set up can be time-consuming. And that can be a barrier to moving forward, even if you know it would be beneficial for your business.', NULL, '2025-03-10 21:22:55'),
(2, 'Ifran Khan', 'Canada', 'upload/testimonial/1826215470936070.young-artist-painting-canvas.jpg', 'Nobody showing up for your sales appointments or webinars? Just send one text message to remind your leads to make an appearanceFinding the answers to these questions isn’t difficult, but getting any kind of new tool set up can be time-consuming. And that can be a barrier to moving forward, even if you know it would be beneficial for your business.', NULL, '2025-03-10 21:23:05'),
(3, 'Md Jakeiya', 'Calilfornia', 'upload/testimonial/1826215521692644.portrait-handsome-man-stylish-hipster-clothes-attractive-guy-posing-street.jpg', 'Nobody showing up for your sales appointments or webinars? Just send one text message to remind your leads to make an appearanceFinding the answers to these questions isn’t difficult, but getting any kind of new tool set up can be time-consuming. And that can be a barrier to moving forward, even if you know it would be beneficial for your business.', NULL, '2025-03-10 21:23:15'),
(5, 'Ifran Khan', 'USA, New York', 'upload/testimonial/1826265885942668.images.jpg', 'Nobody showing up for your sales appointments or webinars? Just send one text message to remind your leads to make an appearance Finding the answers to these questions isn’t difficult, but getting any kind of new tool set up can be time-consuming. And that can be a barrier to moving forward, even if you know it would be beneficial for your business.', NULL, '2025-03-10 21:23:22');

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
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$YVx8ID6Q0bRqkWDUqzjotOOLGa/cmq9tOfDnWePvEjfoYVvRW9z0y', '202503140537WhatsApp Image 2025-01-05 at 01.07.44_92794632.jpg', '01920797783', 'Dhaka', 'admin', 'active', NULL, NULL, '2025-03-13 23:37:20'),
(2, 'masum hossin', 'masum@gmail.com', NULL, '$2y$10$sOhc4PlTrgSuArQH7B1OfOauDahndrVbLdOq7Q.tNWNLWatL0Uq/y', '202503140540images.jpg', '01538309325', 'Bangaldesh', 'user', 'active', NULL, NULL, '2025-03-13 23:40:38'),
(3, 'admin', 'yamin@gmail.com', NULL, '$2y$10$NsZgxWwl7MwSgfdEuomaL.DDu1GcSuWEWn7Krn5Bpm.jVK63w.W9m', NULL, NULL, NULL, 'user', 'active', NULL, '2025-03-14 04:39:10', '2025-03-14 04:39:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `booking_room_lists`
--
ALTER TABLE `booking_room_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `book_areas`
--
ALTER TABLE `book_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `multi_images`
--
ALTER TABLE `multi_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
