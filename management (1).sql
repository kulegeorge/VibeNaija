-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2025 at 04:26 AM
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
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `event_id` int(11) NOT NULL,
  `document` text DEFAULT NULL,
  `pictures` text DEFAULT NULL,
  `videos` text DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `description`, `event_id`, `document`, `pictures`, `videos`, `author`, `created_at`, `updated_at`) VALUES
(1, 'There are hundreds of different file extensions and file types used with computers, and you can find a complete list on our computer files and file extensions page. However, it would be impossible for most people to memorize all file extensions and their associated programs. Below is a list of the most common file extensions, broken into categories by type of files.', 11, '20231023060048Elizabeth.pdf::20231024020154Document.rtf::', '202310230600485093457516.jpg::20231024014430logo.png::20231024014759logo-removebg-preview.png::202310261149468870729010.jpg', '202310230600482023-08-04 22-36-40.mkv:', 'George Kule', '2023-10-23 17:00:48', '2023-10-26 10:49:46'),
(2, 'We bought rice from the company on this day at the cost of 42k per bag', 19, '', '', '', 'George Kule', '2023-10-25 10:12:28', '2023-10-25 10:12:28'),
(3, 'Welcome to the University of Iceland\r\nThe application period for international students is 12 December – 1 February.\r\n\r\nThe University of Iceland does not charge tuition fees, but the annual registration fee is ISK 75,000.\r\nhttps://english.hi.is/applications_for_study', 20, '::', '::', '::', 'George Kule', '2023-10-25 10:53:17', '2023-10-25 13:40:42'),
(4, 'Wandoo Kule', 4, '', '', '', 'George Kule', '2023-10-25 14:33:09', '2023-10-25 14:33:09'),
(5, 'Event Records/leadway', 21, ':20231031101858Bifour Quotaiton to Darlez Nigeria Ltd_Immunofluorescence POCT_27th, Oct. 2023.xlsx', ':', ':', 'George Kule', '2023-10-31 09:18:14', '2023-10-31 09:18:58'),
(6, 'First installment LOAN of 110, 000 repayment to chidinma Ekeocha Darlez. The amount i paid was 50k', 24, '::', '::', '::', 'George Kule', '2023-11-01 09:05:38', '2023-11-01 09:09:27'),
(7, 'Payment for Rice and Utility Bill', 25, '', '', '', 'George Kule', '2023-11-01 10:29:55', '2023-11-01 10:29:55'),
(8, 'I  bought Yeast for wandoo', 31, '', '', '', 'George Kule', '2023-12-10 11:08:07', '2023-12-10 11:08:07'),
(9, 'https://www.oulu.fi/en/apply/how-apply/applying-masters-programmes\r\nhttps://www.oulu.fi/en/apply/how-apply/university-oulu-tuition-fees-and-scholarships-for-international-applicants', 33, '::::', '::::', '::::', 'George Kule', '2023-12-31 23:13:11', '2023-12-31 23:27:54'),
(10, 'Save the Date: Applications open on January 2nd, 2024 and you can apply online in our platform HERE. Your journey to excellence begins here!\r\n\r\nhttps://studyin.tecnico.ulisboa.pt/tk/ck/e/6582c9c3976a7730140008e6?url64=aHR0cHM6Ly9mZW5peC50ZWNuaWNvLnVsaXNib2EucHQvZmVuaXhlZHUtY29ubmVjdC8=', 34, '', '', '', 'George Kule', '2023-12-31 23:29:21', '2023-12-31 23:29:21'),
(11, 'Save the Date: Applications open on January 2nd, 2024 and you can apply online in our platform HERE. Your journey to excellence begins here!\r\n\r\nhttps://studyin.tecnico.ulisboa.pt/tk/ck/e/6582c9c3976a7730140008e6?url64=aHR0cHM6Ly9mZW5peC50ZWNuaWNvLnVsaXNib2EucHQvZmVuaXhlZHUtY29ubmVjdC8=', 37, '', '', '', 'George Kule', '2024-01-02 09:35:50', '2024-01-02 09:35:50'),
(12, 'https://www.oulu.fi/en/apply/how-apply/applying-masters-programmes\r\nhttps://www.oulu.fi/en/apply/how-apply/university-oulu-tuition-fees-and-scholarships-for-international-applicants', 38, '', '', '', 'George Kule', '2024-01-02 09:37:01', '2024-01-02 09:37:01'),
(13, 'The master\'s program in mathematics deepens and builds upon students’ existing knowledge, offering a broad spectrum of individual specialties.\r\n\r\nApplication Period\r\nWinter semester: 01.01. – 31.05.\r\nSummer semester: 01.10. – 30.11\r\n\r\nProgram profile\r\nThe master\'s program in mathematics builds upon the bachelor\'s degree in mathematics, physics or comparable degree programs. It is tailored to students who are interested in mathematics as an exact science.\r\n\r\nOn offer are numerous opportunities to specialize in areas such as algorithmic algebra, analysis, dynamical systems, geometry and visualization, mathematical modeling or mathematical physics.  Further, students have the opportunity to choose courses from theoretical areas of computer science, physics, chemistry, economics or further disciplines. This high level of flexibility enables students to establish an individual competency profile. \r\n\r\nFor a comprehensive description of the program, please refer to the degree program documentation:', 42, '', '', '', 'George Kule', '2024-01-02 09:40:42', '2024-01-02 09:40:42'),
(14, 'University of Hamburg: ... The University of Hamburg is one of the prestigious universities in Germany known for its Arts and Humanities and Physical Science \r\n\r\nFees- https://www.uni-hamburg.de/campuscenter/bewerbung/master/beitraege-gebuehren.html\r\nhttps://www.uni-hamburg.de/campuscenter/studienangebot/studiengang.html?1242152846', 43, '', '', '', 'George Kule', '2024-01-16 10:18:29', '2024-01-16 10:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `badge_name` varchar(255) NOT NULL,
  `badge_description` text DEFAULT NULL,
  `badge_image` text NOT NULL,
  `points` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `badge_name`, `badge_description`, `badge_image`, `points`, `created_at`, `updated_at`) VALUES
(1, 'Champion Badge', 'Champion Badge', '/uploads/1764110568_download (1).jpg', 10, '2025-11-25 22:42:48', '2025-11-25 22:42:48'),
(2, 'Legend Badge', 'Legend Badge', '/uploads/1764110589_download (2).jpg', 20, '2025-11-25 22:43:09', '2025-11-25 22:43:09'),
(3, 'Mastery Badge', 'Mastery Badge', '/uploads/1764110606_download (2).png', 30, '2025-11-25 22:43:26', '2025-11-25 22:43:26'),
(4, 'Elite Performer', 'Elite Performer', '/uploads/1764110622_download.jpg', 40, '2025-11-25 22:43:42', '2025-11-25 22:43:42'),
(5, 'Top Achiever', 'Top Achiever', '/uploads/1764110640_images (1).jpg', 50, '2025-11-25 22:44:00', '2025-11-25 22:44:00'),
(6, 'Excellence Award', 'Excellence Award', '/uploads/1764110659_images (2).jpg', 60, '2025-11-25 22:44:19', '2025-11-25 22:44:19'),
(7, 'Prime Badge', 'Prime Badge', '/uploads/1764110696_images.jpg', 70, '2025-11-25 22:44:56', '2025-11-25 22:44:56'),
(8, 'Grandmaster Badge', 'Grandmaster Badge', '/uploads/1764110729_mastery-badges-boost1707514942_picture_item_small.png', 80, '2025-11-25 22:45:29', '2025-11-25 22:45:29'),
(9, 'Titan Badge', 'Titan Badge', '/uploads/1764110779_pngtree-blue-gold-best-award-badge-medal-with-stars-and-paddy-for-vector-png-image_14658125.png', 90, '2025-11-25 22:46:19', '2025-11-25 22:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, 'Social Media Trainig', '2023-10-19', '2023-10-20', '2023-10-18 23:56:06', '2023-10-18 23:56:06'),
(4, 'wandoo', '2023-10-14', '2023-10-15', '2023-10-21 16:10:17', '2023-10-21 23:58:24'),
(5, 'Hot Choco', '2023-10-21', '2023-10-22', '2023-10-21 17:10:43', '2023-10-21 17:10:43'),
(7, 'George Kulle', '2023-10-18', '2023-10-19', '2023-10-21 22:57:18', '2023-10-22 19:13:54'),
(8, 'Cosropin UNIDOP', '2023-10-06', '2023-10-07', '2023-10-22 00:44:29', '2023-10-22 06:33:41'),
(9, 'Wandoo Kule Taav Tick\'s Birthday', '2023-10-14', '2023-10-15', '2023-10-22 06:44:01', '2023-10-22 06:44:13'),
(11, 'Beautiful Soul', '2023-10-03', '2023-10-04', '2023-10-23 09:37:45', '2023-10-24 11:11:51'),
(19, 'Darlez Nigeria Limited Rice sales', '2023-10-25', '2023-10-26', '2023-10-25 10:10:27', '2023-10-25 10:10:27'),
(20, 'University of Iceland', '2023-12-12', '2023-12-13', '2023-10-25 10:52:10', '2023-10-25 10:52:10'),
(21, 'leadway', '2023-10-09', '2023-10-10', '2023-10-25 14:02:36', '2023-10-27 15:26:09'),
(24, 'Chidinma Loan Repayment', '2023-11-01', '2023-11-02', '2023-11-01 09:04:15', '2023-11-01 09:04:15'),
(25, 'payments to Winifred', '2023-11-01', '2023-11-02', '2023-11-01 10:28:43', '2023-11-01 10:28:43'),
(26, 'Gas Refill', '2023-11-02', '2023-11-03', '2023-11-02 12:18:04', '2023-11-02 12:18:04'),
(27, 'Food stuff', '2023-11-02', '2023-11-03', '2023-11-04 17:39:58', '2023-11-04 17:39:58'),
(28, 'Transpiration from work to the house', '2023-11-03', '2023-11-04', '2023-11-04 17:42:10', '2023-11-04 17:42:10'),
(29, 'Transport to give Camera Charger to Engr. Joseph', '2023-11-04', '2023-11-05', '2023-11-04 17:44:15', '2023-11-04 17:44:15'),
(30, 'Visit to Cold stone', '2024-05-07', '2024-05-08', '2023-12-10 11:04:43', '2023-12-10 11:04:43'),
(31, 'Visit Kado Market', '2023-12-10', '2023-12-11', '2023-12-10 11:06:04', '2023-12-10 11:06:04'),
(33, 'University of Oulu.', '2023-12-03', '2023-12-04', '2023-12-31 23:12:08', '2023-12-31 23:12:08'),
(34, 'Técnico Lisboa', '2023-12-02', '2023-12-03', '2023-12-31 23:28:07', '2023-12-31 23:28:07'),
(35, 'IELTS Exams', '2023-12-11', '2023-12-12', '2023-12-31 23:31:54', '2023-12-31 23:31:54'),
(36, 'Open doors Program', '2023-12-11', '2023-12-12', '2023-12-31 23:32:38', '2023-12-31 23:32:38'),
(37, 'TÉCNICO LISBOA', '2024-01-02', '2024-01-03', '2024-01-02 09:35:25', '2024-01-02 09:35:25'),
(38, 'UNIVERSITY OF OULU', '2024-01-03', '2024-01-04', '2024-01-02 09:36:39', '2024-01-02 09:36:39'),
(39, 'IELTS Exams', '2024-01-11', '2024-01-12', '2024-01-02 09:37:41', '2024-01-02 09:37:41'),
(40, 'Open doors program', '2024-01-11', '2024-01-12', '2024-01-02 09:38:03', '2024-01-02 09:38:03'),
(42, 'Technical University of Munich', '2024-01-01', '2024-01-02', '2024-01-02 09:39:05', '2024-01-02 09:39:05'),
(43, 'University of Hamburg', '2024-06-01', '2024-06-02', '2024-01-16 10:16:41', '2024-01-16 10:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `title`, `start`, `end`, `month`, `event_id`, `amount`, `author`, `created_at`, `updated_at`) VALUES
(3, 'Habib You', '2023-10-03 00:00:00', '2023-10-04 00:00:00', '10', 11, 2399, 'George Kule', '2023-10-26 21:22:59', '2023-10-26 21:22:59'),
(5, 'Chidinma Loan repayment', '2023-11-01 00:00:00', '2023-11-02 00:00:00', '11', 24, 50000, 'George Kule', '2023-11-01 09:06:45', '2023-11-01 09:06:45'),
(6, 'Payments for rice', '2023-11-01 00:00:00', '2023-11-02 00:00:00', '11', 25, 5850, 'George Kule', '2023-11-01 10:30:35', '2023-11-01 10:30:35'),
(7, 'Utility Bill', '2023-11-01 00:00:00', '2023-11-02 00:00:00', '11', 25, 3500, 'George Kule', '2023-11-01 10:30:52', '2023-11-01 10:30:52'),
(8, 'Rice payment to Winifred', '2023-11-01 00:00:00', '2023-11-02 00:00:00', '11', 25, 2200, 'George Kule', '2023-11-01 12:14:33', '2023-11-01 12:14:33'),
(9, 'Gas refilling', '2023-11-02 00:00:00', '2023-11-03 00:00:00', '11', 26, 12125, 'George Kule', '2023-11-02 12:19:24', '2023-11-02 12:19:24'),
(10, 'Data Purchase', '2023-11-02 00:00:00', '2023-11-03 00:00:00', '11', 26, 1000, 'George Kule', '2023-11-02 12:20:11', '2023-11-02 12:20:11'),
(11, 'Wandoo withdrew money for household purchase', '2023-11-02 00:00:00', '2023-11-03 00:00:00', '11', 27, 10000, 'George Kule', '2023-11-04 17:41:23', '2023-11-04 17:41:23'),
(12, 'Along Transport', '2023-11-03 00:00:00', '2023-11-04 00:00:00', '11', 28, 600, 'George Kule', '2023-11-04 17:43:11', '2023-11-04 17:43:11'),
(13, 'Keke Transport to give camera charger', '2023-11-04 00:00:00', '2023-11-05 00:00:00', '11', 29, 400, 'George Kule', '2023-11-04 17:45:07', '2023-11-04 17:45:07'),
(14, 'Transport to Kado Market', '2023-12-10 00:00:00', '2023-12-11 00:00:00', '12', 31, 200, 'George Kule', '2023-12-10 11:09:38', '2023-12-10 11:09:38'),
(15, 'Yeast Price', '2023-12-10 00:00:00', '2023-12-11 00:00:00', '12', 31, 200, 'George Kule', '2023-12-10 11:09:56', '2023-12-10 11:09:56'),
(16, 'Purchase of Slice bread', '2023-12-10 00:00:00', '2023-12-11 00:00:00', '12', 31, 1000, 'George Kule', '2023-12-10 11:11:19', '2023-12-10 11:11:19');

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
-- Table structure for table `forum_categories`
--

CREATE TABLE `forum_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_categories`
--

INSERT INTO `forum_categories` (`id`, `name`, `slug`, `description`, `position`, `created_at`, `updated_at`) VALUES
(1, 'General', 'general', 'General discussion', 0, '2025-11-25 00:18:13', '2025-11-25 00:18:13'),
(2, 'Announcements', 'announcements', 'Official updates', 0, '2025-11-25 00:18:13', '2025-11-25 00:18:13'),
(3, 'Challenges', 'challenges', 'Share challenge entries', 0, '2025-11-25 00:18:13', '2025-11-25 00:18:13'),
(4, 'Help & Support', 'help', 'Platform help', 0, '2025-11-25 00:18:13', '2025-11-25 00:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `forum_likes`
--

CREATE TABLE `forum_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_likes`
--

INSERT INTO `forum_likes` (`id`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 4, 1, '2025-11-26 21:41:52', '2025-11-26 21:41:52'),
(4, 4, 9, '2025-11-26 21:42:02', '2025-11-26 21:42:02'),
(5, 1, 9, '2025-11-26 21:42:17', '2025-11-26 21:42:17'),
(6, 1, 1, '2025-11-26 21:42:33', '2025-11-26 21:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

CREATE TABLE `forum_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thread_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `is_edited` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_posts`
--

INSERT INTO `forum_posts` (`id`, `thread_id`, `user_id`, `body`, `is_edited`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Please be more specific with what you need assistance with', 0, NULL, '2025-11-26 21:31:20', '2025-11-26 21:31:20'),
(2, 3, 9, 'I have been meaning to ask the same question', 0, '2025-11-26 21:38:32', '2025-11-26 21:32:06', '2025-11-26 21:38:32'),
(3, 3, 9, 'I have been meaning to ask the same question', 0, '2025-11-26 21:40:24', '2025-11-26 21:38:41', '2025-11-26 21:40:24'),
(4, 3, 9, 'I have been meaning to ask the same question', 0, NULL, '2025-11-26 21:40:29', '2025-11-26 21:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `forum_threads`
--

CREATE TABLE `forum_threads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `is_locked` tinyint(1) NOT NULL DEFAULT 0,
  `is_pinned` tinyint(1) NOT NULL DEFAULT 0,
  `views` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_threads`
--

INSERT INTO `forum_threads` (`id`, `category_id`, `user_id`, `title`, `slug`, `body`, `is_locked`, `is_pinned`, `views`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Welcome to the VibeNaija Forum', 'welcome-to-the-vibenaija-forum-svZKx0', 'Share your experiences, ask questions, and post challenge results here. Be kind and have fun!', 0, 0, 2, NULL, '2025-11-25 00:18:13', '2025-11-28 12:32:07'),
(2, 1, 9, 'Vibe Nigeria Platform', 'vibe-nigeria-platform-1mmWKy', 'VibeNaija is an online cultural immersion platform designed to help Nigerian teenagers and young adults in the diaspora and at home, reconnect with their roots through interactive social and cultural challenges.\r\nThe platform will combine learning, fun, and community through weekly or monthly cultural tasks that promote Nigerian traditions, language, history, music, and lifestyle — all presented in a gamified way (points, badges, and levels).\r\nThe long-term vision is to create a global online community of young Nigerians who celebrate and share their heritage proudly.', 0, 0, 10, NULL, '2025-11-26 21:09:15', '2025-12-01 23:06:52'),
(3, 4, 1, 'I need Assistance with Task', 'i-need-assistance-with-task-zgURlS', 'How do I submit a task', 0, 0, 41, NULL, '2025-11-26 21:16:43', '2025-12-01 23:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `join_tasks`
--

CREATE TABLE `join_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `taskID` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `join_tasks`
--

INSERT INTO `join_tasks` (`id`, `userID`, `taskID`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 3, 1, '2025-11-25 23:56:15', '2025-11-25 23:56:15'),
(2, 9, 2, 1, '2025-11-26 17:54:50', '2025-11-26 17:54:50'),
(3, 9, 10, 1, '2025-11-26 18:41:52', '2025-11-26 18:41:52'),
(4, 9, 1, 1, '2025-12-03 02:52:39', '2025-12-03 02:52:39'),
(5, 9, 9, 1, '2025-12-03 03:00:23', '2025-12-03 03:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_name` varchar(255) DEFAULT NULL,
  `level_description` text NOT NULL,
  `level_image` text DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level_name`, `level_description`, `level_image`, `points`, `created_at`, `updated_at`) VALUES
(1, 'Beginner', 'Beginner', NULL, NULL, '2025-11-25 22:47:17', '2025-11-25 22:47:17'),
(2, 'Explorer', 'Explorer', NULL, NULL, '2025-11-25 22:47:37', '2025-11-25 22:47:37'),
(3, 'Challenger', 'Challenger', NULL, NULL, '2025-11-25 22:47:45', '2025-11-25 22:47:45'),
(4, 'Achiever', 'Achiever', NULL, NULL, '2025-11-25 22:47:54', '2025-11-25 22:47:54'),
(5, 'Advanced', 'Advanced', NULL, NULL, '2025-11-25 22:48:11', '2025-11-25 22:48:11'),
(6, 'Expert', 'Expert', NULL, NULL, '2025-11-25 22:48:20', '2025-11-25 22:48:20'),
(7, 'Master', 'Master', NULL, NULL, '2025-11-25 22:48:29', '2025-11-25 22:48:29'),
(8, 'Grandmaster', 'Grandmaster', NULL, NULL, '2025-11-25 22:48:38', '2025-11-25 22:48:38'),
(9, 'Legend', 'Legend', NULL, NULL, '2025-11-25 22:48:48', '2025-11-25 22:48:48');

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2023_09_26_170253_create_permission_tables', 2),
(14, '2023_10_19_004317_create_events_table', 3),
(17, '2023_10_23_160742_create_activities_table', 4),
(19, '2023_10_25_155917_create_expenses_table', 5),
(20, '2025_11_18_130909_create_tasks_table', 6),
(21, '2025_11_18_135518_create_badges_table', 6),
(22, '2025_11_18_135549_create_levels_table', 6),
(23, '2025_11_21_064557_create_join_tasks_table', 6),
(24, '2025_11_21_103526_create_user_task_submissions_table', 6),
(25, '2025_11_23_010234_create_topics_table', 6),
(26, '2025_11_23_010426_create_questions_table', 6),
(27, '2025_11_23_010504_create_user_answers_table', 6),
(28, '2025_11_24_004917_create_results_table', 6),
(29, '2025_11_24_184315_create_forum_categories_table', 6),
(30, '2025_11_24_184441_create_forum_threads_table', 6),
(31, '2025_11_24_184453_create_forum_posts_table', 6),
(32, '2025_11_24_184500_create_forum_likes_table', 6),
(33, '2025_11_24_184511_add_points_to_users_table', 6),
(34, '2025_11_26_223613_create_notifications_table', 7),
(35, '2025_12_02_141537_add_task_timer_fields_to_tasks_table', 8),
(36, '2025_12_03_003025_create_notification_preferences_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 22);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('1c823778-4312-4fa8-b301-32c240bde576', 'App\\Notifications\\ThreadReplied', 'App\\Models\\User', 1, '{\"thread_id\":3,\"thread_title\":\"I need Assistance with Task\",\"post_id\":3,\"replier_id\":9,\"message\":\"I have been meaning to ask the same question\"}', '2025-12-03 00:42:07', '2025-11-26 21:38:41', '2025-12-03 00:42:07'),
('21705c67-603e-4f1e-ac17-4716db5a8246', 'App\\Notifications\\PlatformNotification', 'App\\Models\\User', 9, '{\"title\":\"Quiz Already Attempted\",\"message\":\" You have already taken this Quiz\",\"url\":null,\"type\":\"Quiz\",\"meta\":[]}', NULL, '2025-12-03 02:54:15', '2025-12-03 02:54:15'),
('2e1b75a8-48bf-4198-9d53-bfa37ec0cc1c', 'App\\Notifications\\PlatformNotification', 'App\\Models\\User', 9, '{\"title\":\"Quiz Already Attempted\",\"message\":\" You have already taken this Quiz\",\"url\":null,\"type\":\"Quiz\",\"meta\":[]}', NULL, '2025-12-03 02:58:12', '2025-12-03 02:58:12'),
('3acd504e-2521-4409-bc1c-9e1d2e5780f4', 'App\\Notifications\\PlatformNotification', 'App\\Models\\User', 14, '{\"title\":\"Task Updated\",\"message\":\"Changes have been make to a task titled \\\"Task: Learn 5 Common Nigerian Greetings\\\" . Start now!\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/task\\/show\\/eyJpdiI6InM4b2hpZ282ODNzV2FwVWFlbEFjcUE9PSIsInZhbHVlIjoiT3FaUHNGc1I4dUl5d2hBRDc4bGRmdz09IiwibWFjIjoiYzA3ZWUyNjZhMDkyNDVhYjM4MzlmN2VhODliOGQ4NzMzM2U3ZmMxMWQxMDcxMmFiZjRhZjZiMjk4YzM0NmYzOCIsInRhZyI6IiJ9\",\"type\":\"task_update\",\"meta\":{\"task_id\":1}}', NULL, '2025-12-03 02:51:54', '2025-12-03 02:51:54'),
('5a32cff4-5c5c-4678-b976-db34572592f5', 'App\\Notifications\\PlatformNotification', 'App\\Models\\User', 9, '{\"title\":\"Quiz Already Attempted\",\"message\":\" You have already taken this Quiz\",\"url\":null,\"type\":\"Quiz\",\"meta\":[]}', NULL, '2025-12-03 03:00:36', '2025-12-03 03:00:36'),
('5ef08e78-b699-45fd-83b5-11c6e88e9751', 'App\\Notifications\\PlatformNotification', 'App\\Models\\User', 14, '{\"title\":\"Task Updated\",\"message\":\"Changes have been make to a task titled \\\"Task: Explain a Nigerian Historical Event in Your Own Words\\\" . Start now!\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/task\\/show\\/eyJpdiI6IjE0WkVPc0hKNUM2TlZaa3kvZlM4aUE9PSIsInZhbHVlIjoiWEprZlp1eExHS1dlWkpZV1JlbTdadz09IiwibWFjIjoiY2Q2MDIzZDY5ZDdkNTE4NDA3N2YzZTM2ZDY0NmZmYzdlOTkwZjY1N2MxN2IzNzI0YzFkNWI5OTdjYTA0Yzg1NCIsInRhZyI6IiJ9\",\"type\":\"task_update\",\"meta\":{\"task_id\":9}}', NULL, '2025-12-03 02:58:50', '2025-12-03 02:58:50'),
('7be2a32f-cd1b-47f9-804a-5a0b83c95409', 'App\\Notifications\\PlatformNotification', 'App\\Models\\User', 13, '{\"title\":\"Task Updated\",\"message\":\"Changes have been make to a task titled \\\"Task: Learn 5 Common Nigerian Greetings\\\" . Start now!\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/task\\/show\\/eyJpdiI6ImRVUGdCOG9OUTY1NUxLaGRQcHExclE9PSIsInZhbHVlIjoiZjdnVEdUYXhqOGFXcmtyMVNIZVYrZz09IiwibWFjIjoiMGEzNzk0M2MxODZiMDIyNjVjNzc5NjkxMjM0ZTgyYjUzMGFhNjIzNzU4NTE4YTk5NTQwODlkOTlhYjkyNDNmZiIsInRhZyI6IiJ9\",\"type\":\"task_update\",\"meta\":{\"task_id\":1}}', NULL, '2025-12-03 02:51:54', '2025-12-03 02:51:54'),
('902b8ac1-72ba-4844-b99a-e050bf5f7994', 'App\\Notifications\\PlatformNotification', 'App\\Models\\User', 9, '{\"title\":\"Task Updated\",\"message\":\"Changes have been make to a task titled \\\"Task: Learn 5 Common Nigerian Greetings\\\" . Start now!\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/task\\/show\\/eyJpdiI6IjQ5TlNsQlRJcW9MSTN2OEJEZ0xvc2c9PSIsInZhbHVlIjoiSy90MkNZWjJGaUpZeU5jUzVycW1LQT09IiwibWFjIjoiODIyNDFmMTNlNTJjMzczYWIxYWEyZTE0Y2I3YjBkMDYxNzg1Y2Y0ODJmMzNlZDgzN2I2MmZjYjU5OGUwMWU5ZCIsInRhZyI6IiJ9\",\"type\":\"task_update\",\"meta\":{\"task_id\":1}}', '2025-12-03 02:52:18', '2025-12-03 02:51:54', '2025-12-03 02:52:18'),
('a049394f-554c-4e28-ad6c-09e64d82a4cb', 'App\\Notifications\\PlatformNotification', 'App\\Models\\User', 8, '{\"title\":\"Task Updated\",\"message\":\"Changes have been make to a task titled \\\"Task: Explain a Nigerian Historical Event in Your Own Words\\\" . Start now!\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/task\\/show\\/eyJpdiI6ImMwZGdVSkx1UTBwRnZYWUd4OHZrMGc9PSIsInZhbHVlIjoiUVoxeDU0dFNRQ096ektKZzlxbElZUT09IiwibWFjIjoiNjhkODFjZWJmMmE4NTI5N2JmMTJlOTM1YjAwMmU2MmUzNGY3NjAyM2E2ZjVjMWRhZTExMGZmN2I1OGQ1NzMzNyIsInRhZyI6IiJ9\",\"type\":\"task_update\",\"meta\":{\"task_id\":9}}', NULL, '2025-12-03 02:58:50', '2025-12-03 02:58:50'),
('a1cb13eb-d9f9-4bc6-8719-65572b80bc5e', 'App\\Notifications\\PlatformNotification', 'App\\Models\\User', 9, '{\"title\":\"Task Enrolled\",\"message\":\"You have enrolled to a task titled \\\"Task: Learn 5 Common Nigerian Greetings\\\" . Start now!\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/task\\/show\\/eyJpdiI6ImUrSGpVWGVPOUhneXViL3VaRzl2ZUE9PSIsInZhbHVlIjoibVowZVhaR24zU0Q0Q1Rjc2YreG1FQT09IiwibWFjIjoiNjVlMjg0NWRhMzY1OGY0YmYwMGI0YWJlMDg0NjgyZTYxYWQ0NTc3YmY5NGExYmYzMjgyNTYwNTIzZWM5NjI5ZSIsInRhZyI6IiJ9\",\"type\":\"task_update\",\"meta\":{\"task_id\":1}}', NULL, '2025-12-03 02:52:39', '2025-12-03 02:52:39'),
('a21606f3-44d8-4087-998f-28352840c255', 'App\\Notifications\\ThreadReplied', 'App\\Models\\User', 1, '{\"thread_id\":3,\"thread_title\":\"I need Assistance with Task\",\"post_id\":4,\"replier_id\":9,\"message\":\"I have been meaning to ask the same question\"}', '2025-12-03 00:41:56', '2025-11-26 21:40:29', '2025-12-03 00:41:56'),
('b16c0fd5-f2cd-4dba-be85-d52c31222567', 'App\\Notifications\\PlatformNotification', 'App\\Models\\User', 13, '{\"title\":\"Task Updated\",\"message\":\"Changes have been make to a task titled \\\"Task: Explain a Nigerian Historical Event in Your Own Words\\\" . Start now!\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/task\\/show\\/eyJpdiI6ImU1cmVkZ1FIZ0JlWmtXNHJ4d1ZVb3c9PSIsInZhbHVlIjoiTXBKRll0VHJTS2ZweVVnZ2tIaEZHdz09IiwibWFjIjoiNjI5NDMxODI1ZjEyM2RmNGY2NjcwOWM5MzY3NGZjYTNhZGUwNDI3ZTU0Zjg4MmJmNTAwM2Y3Y2RhOGJkZTJiYyIsInRhZyI6IiJ9\",\"type\":\"task_update\",\"meta\":{\"task_id\":9}}', NULL, '2025-12-03 02:58:50', '2025-12-03 02:58:50'),
('d01780c8-51e6-4d65-ae74-0772fc81a1bc', 'App\\Notifications\\PlatformNotification', 'App\\Models\\User', 9, '{\"title\":\"Task Updated\",\"message\":\"Changes have been make to a task titled \\\"Task: Explain a Nigerian Historical Event in Your Own Words\\\" . Start now!\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/task\\/show\\/eyJpdiI6IkhsTU9hK2pHaHQ4bUNwTGtBZXZKdGc9PSIsInZhbHVlIjoiejU5cHU3dytCOTJZZHNIVTJMM0FXdz09IiwibWFjIjoiY2MyZmNjNjUyYzM4YTI1ZmRkYjMzMTUxYWNkNmVlYTEzYjVhOWU2OTVjYzUzZDIwMDU3ZGM1ZTA4MDMzYjUyMCIsInRhZyI6IiJ9\",\"type\":\"task_update\",\"meta\":{\"task_id\":9}}', NULL, '2025-12-03 02:58:50', '2025-12-03 02:58:50'),
('d5c4a6c4-f479-492b-8d92-c9e24c4eb682', 'App\\Notifications\\PlatformNotification', 'App\\Models\\User', 9, '{\"title\":\"Task Enrolled\",\"message\":\"You have enrolled to a task titled \\\"Task: Explain a Nigerian Historical Event in Your Own Words\\\" . Start now!\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/task\\/show\\/eyJpdiI6IldVZ0RTNE1TWHIrRkx0WUQ0cXRvQ0E9PSIsInZhbHVlIjoiZTVEVUxWRE53dnhrOFlTVExTNWVuZz09IiwibWFjIjoiMmUxNzk4MTY1MDNjYjg0NzZhYWI4OWU2MDJjZjM0NDQ0NjJjOWJlOTExYzFmYjlhZWUyMGQxMzhiN2QwYTQwZCIsInRhZyI6IiJ9\",\"type\":\"task_update\",\"meta\":{\"task_id\":9}}', NULL, '2025-12-03 03:00:23', '2025-12-03 03:00:23'),
('ec43ccad-b63e-4c4a-ae78-8e549aeabd17', 'App\\Notifications\\PlatformNotification', 'App\\Models\\User', 8, '{\"title\":\"Task Updated\",\"message\":\"Changes have been make to a task titled \\\"Task: Learn 5 Common Nigerian Greetings\\\" . Start now!\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/task\\/show\\/eyJpdiI6Ikt3M3FSL2JXd05UMVFnQ3hvUlVpa3c9PSIsInZhbHVlIjoiMGJZQ2ZFQ25BMWFaZXZrTW1PdUllUT09IiwibWFjIjoiZWM4NzJiNWRiY2JiOGU3ZDA1NzcyYTBhMTk1MGJiYTk2ZjgzZjA3OGUxZWFjNTZlMTRmOTYyNTk4MjkzZjhiNSIsInRhZyI6IiJ9\",\"type\":\"task_update\",\"meta\":{\"task_id\":1}}', NULL, '2025-12-03 02:51:54', '2025-12-03 02:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `notification_preferences`
--

CREATE TABLE `notification_preferences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `email_task_updates` tinyint(1) NOT NULL DEFAULT 1,
  `email_cbt_results` tinyint(1) NOT NULL DEFAULT 1,
  `email_badges` tinyint(1) NOT NULL DEFAULT 1,
  `in_app_task_updates` tinyint(1) NOT NULL DEFAULT 1,
  `in_app_cbt_results` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(256) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'profile.menu', 'web', 'poh profile', '2023-09-27 11:26:18', '2023-09-27 12:19:48'),
(2, 'Add.profile', 'web', 'poh profile', '2023-09-27 11:30:38', '2023-09-27 11:30:38'),
(3, 'edit.profile', 'web', 'poh profile', '2023-09-27 11:34:00', '2023-09-27 12:17:19'),
(4, 'delete.profile', 'web', 'site settings', '2023-09-27 11:43:41', '2023-09-27 13:13:08'),
(8, 'all.roles', 'web', 'role_management', '2023-09-30 23:59:14', '2023-10-01 00:18:19'),
(9, 'role_management.menu', 'web', 'role_management', '2023-10-01 00:00:24', '2023-10-01 00:00:24'),
(10, 'all.permissions', 'web', 'role_management', '2023-10-01 00:00:57', '2023-10-01 00:19:34'),
(11, 'roles_in_permission', 'web', 'role_management', '2023-10-01 00:01:16', '2023-10-01 00:01:16'),
(12, 'all_role_and_permission', 'web', 'role_management', '2023-10-01 00:01:38', '2023-10-01 00:01:38'),
(13, 'add.roles', 'web', 'role_management', '2023-10-01 00:02:54', '2023-10-01 00:17:28'),
(14, 'add_permissions', 'web', 'role_management', '2023-10-01 00:03:10', '2023-10-01 00:03:10'),
(15, 'all.administrators', 'web', 'admin_management', '2023-10-01 00:03:37', '2023-10-01 00:03:37'),
(16, 'add.adminstrators', 'web', 'admin_management', '2023-10-01 00:04:06', '2023-10-01 00:04:06'),
(17, 'edit.adminstrators', 'web', 'admin_management', '2023-10-01 00:04:33', '2023-10-01 00:04:33'),
(18, 'delete.adminstrators', 'web', 'admin_management', '2023-10-01 00:04:53', '2023-10-01 00:04:53'),
(19, 'menu.adminstrators', 'web', 'admin_management', '2023-10-01 00:05:12', '2023-10-01 00:05:12'),
(20, 'edit.permissions', 'web', 'role_management', '2023-10-01 00:05:35', '2023-10-01 00:05:35'),
(21, 'delete.permissions', 'web', 'role_management', '2023-10-01 00:05:55', '2023-10-01 00:05:55'),
(22, 'edit.roles', 'web', 'role_management', '2023-10-01 00:06:25', '2023-10-01 00:06:25'),
(23, 'delete.roles', 'web', 'role_management', '2023-10-01 00:06:38', '2023-10-01 00:06:38'),
(24, 'edit.role_and_permission', 'web', 'role_management', '2023-10-01 00:56:07', '2023-10-01 00:56:07'),
(25, 'delete.role_and_permission', 'web', 'role_management', '2023-10-01 00:57:10', '2023-10-01 00:57:10');

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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) DEFAULT NULL,
  `option_d` varchar(255) DEFAULT NULL,
  `correct_option` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `topic_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `created_at`, `updated_at`) VALUES
(2, 3, 'What are the three major ethnic groups in Nigeria?', 'Fulani, Gwari, Ibibio', 'Hausa, Igbo, Yoruba', 'Tiv, Nupe, Ijaw', 'Idoma, Kalabari, Kanuri', 'b', '2025-11-26 20:07:42', '2025-11-26 20:07:42'),
(3, 3, 'Which of the following is a popular Yoruba festival?', 'Argungu Festival', 'Ofala Festival', 'Osun-Osogbo Festival', 'New Yam Festival', 'c', '2025-11-26 20:09:02', '2025-11-26 20:09:02'),
(4, 3, 'The New Yam Festival is mainly celebrated by which group?', 'Igbo', 'Hausa', 'Yoruba', 'Fulani', 'a', '2025-11-26 20:10:03', '2025-11-26 20:10:03'),
(5, 3, 'What does the Hausa greeting “Sannu” mean?', 'Welcome', 'Thank you', 'Well done / Hello', 'Peace be with you', 'b', '2025-11-26 20:10:56', '2025-11-26 20:10:56'),
(6, 3, 'Which tribe is known for the Eyo masquerade?', 'Tiv', 'Yoruba', 'Yoruba', 'Efik', 'b', '2025-11-26 20:13:07', '2025-11-26 20:13:07'),
(7, 3, 'What does the Hausa greeting “Sannu” mean?', 'Welcome', 'Thank you', 'Well done / Hello', 'Peace be with you', 'c', '2025-11-26 20:14:19', '2025-11-26 20:14:19'),
(8, 4, 'Which of the following is an example of computer hardware?', 'MS Word', 'Google Chrome', 'Keyboard', 'Antivirus software', 'c', '2025-11-26 20:16:31', '2025-11-26 20:16:31'),
(9, 4, 'What does “cloud storage” mean?', 'Saving files on a USB device', 'Saving files on the internet', 'Saving files on a CD', 'Saving files on your desktop', 'b', '2025-11-26 20:17:59', '2025-11-26 20:17:59'),
(10, 4, 'Which of the following is a web browser?', 'Facebook', 'Safari', 'WhatsApp', 'Telegram', 'b', '2025-11-26 20:18:47', '2025-11-26 20:18:47'),
(11, 4, 'A strong password should contain:', 'Only numbers', 'Only letters', 'A mix of letters, numbers & symbols', 'Only uppercase letters', 'c', '2025-11-26 20:19:46', '2025-11-26 20:19:46'),
(12, 5, 'What is the capital of Lagos State?', 'Lagos Island', 'Lekki', 'Ikeja', 'Epe', 'b', '2025-11-26 20:21:20', '2025-11-26 20:21:20'),
(13, 5, 'How many continents exist in the world?', '5', '6', '7', '8', 'c', '2025-11-26 20:22:28', '2025-11-26 20:22:28'),
(14, 5, 'The boiling point of water is:', '50°C', '100°C', '150°C', '200°C', 'b', '2025-11-26 20:23:40', '2025-11-26 20:23:40'),
(15, 5, 'Which of these is an environmental conservation practice?', 'Burning waste', 'Planting trees', 'Dumping refuse in rivers', 'Illegal mining', 'b', '2025-11-26 20:27:11', '2025-11-26 20:27:11'),
(16, 5, 'Who is the current President of Nigeria?', 'Goodluck Jonathan', 'Muhammadu Buhari', 'Bola Ahmed Tinubu', 'Yemi Osinbajo', 'c', '2025-11-26 20:29:27', '2025-11-26 20:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `taskId` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `percentage` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `topic_id`, `taskId`, `score`, `total`, `percentage`, `created_at`, `updated_at`) VALUES
(1, 9, 4, 2, 4, 4, 100.00, '2025-11-28 13:12:15', '2025-11-28 13:12:15'),
(2, 9, 5, 3, 2, 5, 40.00, '2025-11-28 13:54:16', '2025-11-28 13:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2023-09-27 13:46:21', '2023-09-27 13:59:57'),
(2, 'Admin', 'web', '2023-09-27 13:47:45', '2023-09-27 13:47:45'),
(3, 'Manager', 'web', '2023-09-27 13:47:52', '2023-09-27 13:47:52'),
(4, 'Technical Manager', 'web', '2023-09-27 13:48:07', '2023-09-27 13:48:07'),
(5, 'Sales Manager', 'web', '2023-09-27 13:48:16', '2023-09-27 13:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(8, 1),
(8, 2),
(8, 3),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(14, 1),
(15, 1),
(15, 2),
(15, 3),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taskname` varchar(255) DEFAULT NULL,
  `task_description` longtext NOT NULL,
  `images` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `duration` int(255) DEFAULT NULL,
  `task_points` int(11) DEFAULT NULL,
  `task_level` varchar(255) DEFAULT NULL,
  `level_image` text DEFAULT NULL,
  `submission_instruction` longtext NOT NULL,
  `badge_point` int(11) DEFAULT NULL,
  `badge_name` varchar(255) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `badge_icon` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `taskname`, `task_description`, `images`, `url`, `category`, `duration`, `task_points`, `task_level`, `level_image`, `submission_instruction`, `badge_point`, `badge_name`, `topic_id`, `badge_icon`, `status`, `created_at`, `updated_at`, `start_time`, `end_time`) VALUES
(1, 'Task: Learn 5 Common Nigerian Greetings', 'Discover how Nigerians across different ethnic groups greet one another. Learn the meaning and pronunciation of five greetings from Hausa, Igbo, Yoruba, or your own ethnic language. Greetings are the first step to connecting with your roots.', '[\"1764111123_69263313f29d9.jpg\",\"1764111123_69263313f2fbf.jpg\",\"1764111123_69263313f34b9.jpg\",\"1764111123_69263313f3845.jpg\"]', 'https://youtube.com/watch?v=YRBGreet529', 'Language', 7, 40, 'Beginner', NULL, 'Upload one short video (20–40 seconds) where you:\r\n\r\nIntroduce yourself by first name.\r\n\r\nSay the 5 greetings clearly.\r\n\r\nMention the language each greeting comes from.\r\n\r\nSay one sentence about why learning greetings is important.\r\n\r\nYou may also upload:\r\n\r\nOptional: Images of handwritten notes\r\n\r\nOptional: Document summarizing your greetings', NULL, 'Champion Badge', 5, '/uploads/1764110568_download (1).jpg', 1, '2025-11-25 22:52:03', '2025-12-03 02:51:54', '2025-12-03 03:51:54', '2025-12-10 03:51:54'),
(2, '🎵 Task: Create a Nigerian Playlist of 5 Classic Songs', 'Nigeria’s music has shaped Africa and the world. Curate five iconic Nigerian songs from any era or genre (Highlife, Afrobeat, Fuji, Juju, Afrobeats).', '[\"1764111467_6926346b430b5.jpg\",\"1764111467_6926346b43689.jpg\",\"1764111467_6926346b43a9f.webp\",\"1764111467_6926346b43e1c.jpg\"]', 'https://youtube.com/watch?v=IGBOCount120', 'Music', 28, 50, 'Explorer', NULL, 'Submit the following:\r\n\r\nA text list of the 5 songs + artists.\r\n\r\nUpload a screenshot of your playlist (Spotify, Apple Music, Boomplay or handwritten list).\r\n\r\nWrite a short note (3–5 sentences) about why you chose these songs.', NULL, 'Legend Badge', 4, '/uploads/1764110589_download (2).jpg', 1, '2025-11-25 22:57:47', '2025-12-02 15:28:37', '2025-12-02 16:28:37', '2025-12-30 16:28:37'),
(3, 'Task: Pronounce 10 Nigerian Slangs Correctly', 'Nigerian slangs reflect fun, humor, and cultural identity. Learn 10 popular slangs (e.g., \"How far?\", \"E choke\", \"Abi?\", \"You dey whine me?\").', '[\"1764111602_692634f2d4f94.jpg\",\"1764111602_692634f2d56e7.jpg\",\"1764111602_692634f2d5b2d.jpg\"]', 'https://youtube.com/watch?v=HSAPrvb003', 'Lifestyle / Language', 14, 55, 'Challenger', NULL, 'Submission Instruction:\r\n\r\nUpload a video (30–60 seconds) where you:\r\n\r\nSay each slang clearly.\r\n\r\nGive the meaning of each slang in one sentence.\r\n\r\nDemonstrate at least one slang in a short funny dialogue.', NULL, 'Mastery Badge', 5, '/uploads/1764110606_download (2).png', 1, '2025-11-25 23:00:02', '2025-12-02 15:28:55', '2025-12-02 16:28:55', '2025-12-16 16:28:55'),
(4, 'Task: Document a Nigerian Dish You Prepared or Ate', 'Food is culture! Pick a Nigerian dish (Jollof, Egusi, Ogbono, Banga, Moin-Moin, Suya, Tuwo, etc.) and document your experience preparing or tasting it.', '[\"1764112221_6926375dcc627_images (16).jpg\",\"1764112221_6926375dcd66a_nigerian-food-akara-640x427.webp\",\"1764112221_6926375dcda7e_jollof-rice.webp\",\"1764112221_6926375dcddf4_Plate-of-edikang-ikong.-Photo-Twitter-e1527115824269-860x483-1.jpg\",\"1764112221_6926375dce1d3_Amala-and-Ewedu-1024x680.jpeg\"]', 'https://youtube.com/watch?v=NGNFoodGame44', 'Food', 42, 70, 'Achiever', NULL, 'Submit:\r\n\r\n3–5 images or 1 video of the food.\r\n\r\nA short write-up (5–7 sentences) saying:\r\n\r\nThe name of the dish\r\n\r\nThe ethnic group it originates from\r\n\r\nKey ingredients\r\n\r\nYour experience and rating\r\n\r\nOptional: Upload recipe notes or screenshots of preparation steps.', NULL, 'Elite Performer', NULL, '/uploads/1764110622_download.jpg', 1, '2025-11-25 23:06:39', '2025-12-02 15:29:14', '2025-12-02 16:29:14', '2026-01-13 16:29:14'),
(5, 'Task: Interview an Older Family Member', 'Preserve Nigerian wisdom. Interview a parent, grandparent, uncle, or aunt about their childhood, culture, or traditions.', '[\"1764112417_69263821d5bfe.jpg\",\"1764112417_69263821d63a7.JPG\",\"1764112417_69263821d684d.webp\",\"1764112417_69263821d6d4d.jpg\"]', 'https://youtube.com/watch?v=NGNHistory600', 'Family & Oral History', 7, 90, 'Advanced', NULL, 'Submit any of the following:\r\n\r\nA video/audio recording (1–3 minutes) of the interview\r\n\r\nOR a write-up (8–12 sentences) summarizing the conversation\r\n\r\nMake sure to include:\r\n\r\nTheir name & age (optional)\r\n\r\nThe ethnic group they belong to\r\n\r\n3 cultural practices they remember growing up\r\n\r\nOne meaningful advice they shared with you', NULL, 'Top Achiever', NULL, '/uploads/1764110640_images (1).jpg', 1, '2025-11-25 23:13:37', '2025-12-02 15:33:39', '2025-12-02 16:33:39', '2025-12-09 16:33:39'),
(6, 'Task: Recreate a Nigerian Folktale Scene', 'Choose a Nigerian folktale (Tortoise stories, Queen Amina, Moremi, etc.) and recreate one scene visually or through narration.', '[\"1764112571_692638bb0cfbf.jpg\",\"1764112571_692638bb0d565.jpg\"]', 'https://youtube.com/watch?v=PIDGINExpr555', 'Folklore / Storytelling', 28, 80, 'Advanced', NULL, 'Upload:\r\n\r\nA video, picture collage, sketch, or narration retelling a scene.\r\n\r\nA short description (4–6 sentences) explaining the moral of the story.', NULL, 'Top Achiever', NULL, '/uploads/1764110640_images (1).jpg', 1, '2025-11-25 23:16:11', '2025-12-02 15:30:43', '2025-12-02 16:30:43', '2025-12-30 16:30:43'),
(7, 'Task: Share 5 Things About Your Ethnic Group', 'Identity begins at home. Research your ethnic group and share 5 cultural facts (greetings, food, dressing, values, festivals, names, etc.).', '[\"1764112705_692639413cc25.jpg\",\"1764112705_692639413d2cf.jpg\",\"1764112705_692639413d6cc.jpg\"]', 'https://youtube.com/watch?v=YRBGreet529', 'Identity', 14, 60, 'Expert', NULL, 'Submit any format:\r\n\r\nA short video (30–50 seconds)\r\n\r\nOR a document\r\n\r\nOR a text entry\r\n\r\nInclude:\r\n\r\nEthnic group name\r\n\r\nState of origin\r\n\r\n5 unique cultural facts\r\n\r\nOne thing you love about your roots', NULL, 'Excellence Award', NULL, '/uploads/1764110659_images (2).jpg', 1, '2025-11-25 23:18:25', '2025-12-02 15:30:56', '2025-12-02 16:30:56', '2025-12-16 16:30:56'),
(8, 'Task: Learn a Short Nigerian Dance Move', 'From Zanku to Shaku Shaku, Makossa, Atilogwu, and Bata — pick a Nigerian dance and learn a 10–15 second move.', '[\"1764112887_692639f71a298.jpg\",\"1764112887_692639f71a872.jpg\",\"1764112887_692639f71ac45.jpg\",\"1764112887_692639f71b052.webp\",\"1764112887_692639f71b487.jpg\"]', 'https://www.youtube.com/embed/BrPPyxkkzcE?si=UT6QXj1yQACpCgPT', 'Music & Dance', 21, 85, 'Master', NULL, 'Upload a 10–20 second dance video.\r\nMake sure we can see your feet and hands clearly.\r\nOptional: Add background music or dance with a friend.', NULL, 'Prime Badge', NULL, '/uploads/1764110696_images.jpg', 1, '2025-11-25 23:21:27', '2025-12-02 15:32:24', '2025-12-02 16:32:24', '2025-12-23 16:32:24'),
(9, 'Task: Explain a Nigerian Historical Event in Your Own Words', 'Pick any Nigerian historical event (Independence, Civil War, Benin Empire, Nok Culture, June 12, etc.) and explain it in your own words.', '[\"1764113028_69263a84bbb4a.jpg\",\"1764113028_69263a84bc128.jpg\",\"1764113028_69263a84bc50e.jpg\"]', 'https://www.youtube.com/embed/BrPPyxkkzcE?si=UT6QXj1yQACpCgPT', 'History', 14, 100, 'Master', NULL, 'Submission Instruction:\r\n\r\nUpload a 1-page PDF OR a video (45–90 seconds) explaining:\r\n\r\nWhat happened\r\n\r\nWhen it happened\r\n\r\nWhy it mattered\r\n\r\nOne lesson today’s youth can learn from it', NULL, 'Grandmaster Badge', 5, '/uploads/1764110729_mastery-badges-boost1707514942_picture_item_small.png', 1, '2025-11-25 23:23:48', '2025-12-03 02:58:50', '2025-12-03 03:58:50', '2025-12-17 03:58:50'),
(10, 'Task: Showcase Your Traditional Clothing or Accessory', 'Rock your roots! Wear or display any traditional clothing item (Ankara, Agbada, Buba, Isi Agu, George Wrapper, Adire, etc.)', '[\"1764113160_69263b08c61c5.jpg\",\"1764113160_69263b08c675d.jpg\",\"1764113160_69263b08c6b53.jpg\",\"1764113160_69263b08c6ef2.jpg\",\"1764113160_69263b08c7d2a.jpg\",\"1764113160_69263b08c8452.jpg\"]', 'https://youtube.com/watch?v=NGNFoodGame44', 'Fashion & Culture', 70, 75, 'Grandmaster', NULL, 'Upload:\r\n\r\n1–3 images of you wearing or holding the clothing\r\n\r\nA caption explaining:\r\n\r\nThe name of the attire\r\n\r\nThe ethnic group it represents\r\n\r\nWhen it is commonly worn (festival, wedding, naming, coronation, etc.)\r\n\r\nYou may also add a short 10–20 sec video showing the outfit.', NULL, 'Titan Badge', NULL, '/uploads/1764110779_pngtree-blue-gold-best-award-badge-medal-with-stars-and-paddy-for-vector-png-image_14658125.png', 1, '2025-11-25 23:26:00', '2025-12-02 15:31:52', '2025-12-02 16:31:52', '2026-02-10 16:31:52');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Nigerian Culture & Traditions', 'Dive into the rich and diverse cultural heritage of Nigeria with this exciting quiz designed to test your knowledge of the country’s traditions, festivals, languages, history, and social values', '2025-11-26 20:05:08', '2025-11-26 20:05:08'),
(4, 'Digital Literacy', 'The Digital Literacy Quiz is designed to assess a participant’s ability to use digital tools effectively, understand online safety, and navigate basic computer and internet functions', '2025-11-26 20:15:35', '2025-11-26 20:15:35'),
(5, 'General Knowledge', 'The General Knowledge Quiz is a broad, fun, and educational challenge designed to test how much you know about the world around you.', '2025-11-26 20:20:10', '2025-11-26 20:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `role` enum('Admin','Agent','User') NOT NULL DEFAULT 'User',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `name`, `address`, `phone`, `location`, `photo`, `role`, `status`, `email`, `email_verified_at`, `password`, `remember_token`, `points`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'MR', 'George Kule', '10 Lingu Crescent, Wuse 2', '07067564166', 'Abuja, FCT', '20251126090206kule_george_passport.jpeg', 'Admin', 'active', 'admin@gmail.com', '2025-11-25 22:31:28', '$2y$10$OrYv0oyRuugPcSHOFShrYeYjMu4PL2q3JiKFoWhiIklapGuC7b1.e', 'OslhdkRY8cZAN5HzNqRjOeOgXZlMwD8RihwCk0E1Q8EaUWWv5aAuIhPRThlL', 13, 0, '2023-09-21 14:16:26', '2025-11-26 21:31:20'),
(4, 'Dr.', 'Mrs. Kali Runolfsson', '553 Wiza Landing\nFeestchester, TN 63476-2318', '+1-984-388-6184', NULL, 'https://via.placeholder.com/60x60.png/003377?text=quos', 'Agent', 'inactive', 'delmer.johnston@example.com', '2023-09-21 14:16:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vMG8FXRjE4', 0, 0, '2023-09-21 14:16:26', '2023-09-21 14:16:26'),
(5, 'Dr.', 'Mrs. Kailee Treutel Jr.', '767 Hoeger Course Suite 206\nNorth Brycenhaven, VA 15498', '(458) 449-9080', NULL, 'https://via.placeholder.com/60x60.png/0077dd?text=doloribus', 'Agent', 'inactive', 'gerson.schuster@example.net', '2023-09-21 14:16:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8jwGY2Pb4z', 0, 0, '2023-09-21 14:16:26', '2023-09-21 14:16:26'),
(6, 'Ms.', 'Marquise Reinger', '53277 Danika Mountains\nLake Heberstad, AL 14397', '1-681-737-8431', NULL, 'https://via.placeholder.com/60x60.png/00ccbb?text=veritatis', 'Agent', 'inactive', 'mthompson@example.org', '2023-09-21 14:16:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5CtXGAMBLB', 0, 0, '2023-09-21 14:16:26', '2023-09-21 14:16:26'),
(8, 'Miss', 'Maynard Zulauf', '2336 Lubowitz Meadows Apt. 535\nLake Maxiefurt, MS 71651', '+1.283.254.3349', NULL, 'https://via.placeholder.com/60x60.png/00ddbb?text=explicabo', 'User', 'inactive', 'preston.harris@example.com', '2023-09-21 14:16:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yifyrqdIrC', 0, 0, '2023-09-21 14:16:26', '2023-09-21 14:16:26'),
(9, 'MR', 'Prof. Francesco Monahan', 'No 32, old Otukpo Road, Makurdi, Benue state', '07067904165', NULL, '20251201105144IMG-20250804-WA0021.jpg', 'User', 'active', 'tracey.satterfield@example.org', '2023-09-21 14:16:25', '$2y$10$DGxY9BPwMUCBsrRlr46dGOx9LvUA9IFFQvz3pioY42vlv9K0Th/fm', 'OjpDaFxjnYEhwNmiP2B8EFVY3SzFP2XQZQsQDs27SqrHgGbYgaszdPaihIJD', 914, 0, '2023-09-21 14:16:26', '2025-12-03 01:58:08'),
(10, 'Prof.', 'Taya Schimmel IV', '827 Althea Centers\nLake Myrtle, NC 92763', '+12398489932', NULL, 'https://via.placeholder.com/60x60.png/0066aa?text=libero', 'Agent', 'inactive', 'fward@example.com', '2023-09-21 14:16:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hqejI9bRI2', 0, 0, '2023-09-21 14:16:26', '2023-09-21 14:16:26'),
(11, 'Ms.', 'Susanna Johnson Jr.', '234 Spencer Circles Suite 719\nNorth Lura, MN 04634-9828', '516-318-0101', NULL, 'https://via.placeholder.com/60x60.png/000022?text=occaecati', 'Agent', 'inactive', 'jromaguera@example.net', '2023-09-21 14:16:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HBpTZotxva', 0, 0, '2023-09-21 14:16:26', '2023-09-21 14:16:26'),
(12, 'Dr.', 'Rogelio Rutherford', '10482 Kelsi Gateway\nLake Nelliefurt, CT 14831-2165', '859.646.2612', NULL, 'https://via.placeholder.com/60x60.png/00bb99?text=adipisci', 'Agent', 'inactive', 'lacey.kertzmann@example.org', '2023-09-21 14:16:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vCy32eqlIx', 0, 0, '2023-09-21 14:16:26', '2023-09-21 14:16:26'),
(13, 'Dr.', 'Brionna Conroy', '19080 Sim Islands\nRathfort, NY 29280', '+1-331-671-4628', NULL, 'https://via.placeholder.com/60x60.png/00aabb?text=quasi', 'User', 'active', 'reilly.bryce@example.com', '2023-09-21 14:16:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hDiDodUCjD', 0, 0, '2023-09-21 14:16:26', '2023-09-21 14:16:26'),
(14, NULL, 'Henry Mbene', NULL, NULL, NULL, NULL, 'User', 'active', 'henrymbene@gmail.com', NULL, '$2y$10$qVGN0zW70LbDeh16TQmULOz/5o9i6Nu6hALcCuiZj9V9GWASZQO5.', NULL, 0, 0, '2023-09-21 15:10:42', '2023-09-21 15:11:00'),
(22, 'Barr', 'George Kule Sam', '10, Lingu Crescent, Wuse II', '07067564166', 'Delta', NULL, 'Admin', 'active', 'georgekule@gmail.com', NULL, '$2y$10$5b/5Yr270K/1QUpT57e.1uhX9YzKCuYjhHOGUpWkcDWpXIBj6M4DK', NULL, 0, 0, '2023-09-30 20:36:03', '2023-09-30 23:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `selected_option` varchar(255) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `taskId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`id`, `user_id`, `question_id`, `selected_option`, `is_correct`, `taskId`, `created_at`, `updated_at`) VALUES
(1, 9, 8, 'c', 1, 0, '2025-11-28 13:12:15', '2025-11-28 13:12:15'),
(2, 9, 9, 'b', 1, 0, '2025-11-28 13:12:15', '2025-11-28 13:12:15'),
(3, 9, 10, 'b', 1, 0, '2025-11-28 13:12:15', '2025-11-28 13:12:15'),
(4, 9, 11, 'c', 1, 0, '2025-11-28 13:12:15', '2025-11-28 13:12:15'),
(10, 9, 12, 'a', 0, 3, '2025-11-28 13:53:48', '2025-11-28 13:53:48'),
(11, 9, 13, 'a', 0, 3, '2025-11-28 13:53:48', '2025-11-28 13:53:48'),
(12, 9, 14, 'b', 1, 3, '2025-11-28 13:53:48', '2025-11-28 13:53:48'),
(13, 9, 15, 'c', 0, 3, '2025-11-28 13:53:48', '2025-11-28 13:53:48'),
(14, 9, 16, 'c', 1, 3, '2025-11-28 13:53:48', '2025-11-28 13:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_task_submissions`
--

CREATE TABLE `user_task_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `user_text` longtext DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`documents`)),
  `points` int(11) DEFAULT NULL,
  `decision_message` longtext DEFAULT NULL,
  `badges_name` varchar(255) DEFAULT NULL,
  `badge_icon` longtext DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_task_submissions`
--

INSERT INTO `user_task_submissions` (`id`, `user_id`, `task_id`, `user_text`, `video_url`, `images`, `documents`, `points`, `decision_message`, `badges_name`, `badge_icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 3, 'VibeNaija is an online cultural immersion platform designed to help Nigerian teenagers and young adults in the diaspora and at home, reconnect with their roots through interactive social and cultural challenges.\r\nThe platform will combine learning, fun, and community through weekly or monthly cultural tasks that promote Nigerian traditions, language, history, music, and lifestyle — all presented in a gamified way (points, badges, and levels).', 'https://www.tiktok.com/en/jhguyjgugug7gu7iuykjwwwwff', '\"[\\\"uploads\\\\\\/task_submissions\\\\\\/images\\\\\\/6926497127a56_1764116849.jpg\\\",\\\"uploads\\\\\\/task_submissions\\\\\\/images\\\\\\/6926497127fc2_1764116849.jpg\\\",\\\"uploads\\\\\\/task_submissions\\\\\\/images\\\\\\/69264971283e1_1764116849.jpg\\\"]\"', '\"[\\\"uploads\\\\\\/task_submissions\\\\\\/documents\\\\\\/69264971287b8_1764116849.docx\\\",\\\"uploads\\\\\\/task_submissions\\\\\\/documents\\\\\\/6926497128c08_1764116849.docx\\\",\\\"uploads\\\\\\/task_submissions\\\\\\/documents\\\\\\/6926497128fbb_1764116849.docx\\\"]\"', 55, NULL, 'Mastery Badge', '/uploads/1764110606_download (2).png', 'approved', '2025-11-26 00:27:29', '2025-12-03 01:58:08'),
(2, 9, 2, 'The platform will combine learning, fun, and community through weekly or monthly cultural tasks that promote Nigerian traditions, language, history, music, and lifestyle — all presented in a gamified way (points, badges, and levels).', 'https://www.tiktok.com/en/check', '\"[\\\"uploads\\\\\\/task_submissions\\\\\\/images\\\\\\/69273fc86065d_1764179912.jpg\\\",\\\"uploads\\\\\\/task_submissions\\\\\\/images\\\\\\/69273fc860c2e_1764179912.jpg\\\",\\\"uploads\\\\\\/task_submissions\\\\\\/images\\\\\\/69273fc861104_1764179912.jpg\\\"]\"', '\"[\\\"uploads\\\\\\/task_submissions\\\\\\/documents\\\\\\/69273fc86153f_1764179912.docx\\\",\\\"uploads\\\\\\/task_submissions\\\\\\/documents\\\\\\/69273fc861a42_1764179912.docx\\\"]\"', 50, 'After careful consideration, we regret to inform you that we are unable to approve your Task. Thank you for your submission', 'Legend Badge', NULL, 'rejected', '2025-11-26 17:58:32', '2025-11-26 18:49:47'),
(3, 9, 10, 'The platform will combine learning, fun, and community through weekly or monthly cultural tasks that promote Nigerian traditions, language, history, music, and lifestyle — all presented in a gamified way (points, badges, and levels).', 'https://www.tiktok.com/en/jhguyjgugug7gu7iuykjwwwwffkk', '[\"uploads\\/task_submissions\\/images\\/69274af037b6e_1764182768.jpg\",\"uploads\\/task_submissions\\/images\\/69274af0381c3_1764182768.jpg\"]', '[\"uploads\\/task_submissions\\/documents\\/69274af0385e0_1764182768.docx\",\"uploads\\/task_submissions\\/documents\\/69274af038a94_1764182768.docx\"]', 75, 'Your submission has been reviewed and approved.\r\nWell done, and thank you for completing this task successfully.\r\nKeep up the great work!', 'Titan Badge', '/uploads/1764110779_pngtree-blue-gold-best-award-badge-medal-with-stars-and-paddy-for-vector-png-image_14658125.png', 'approved', '2025-11-26 18:44:00', '2025-11-26 18:47:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forum_categories`
--
ALTER TABLE `forum_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `forum_categories_name_unique` (`name`),
  ADD UNIQUE KEY `forum_categories_slug_unique` (`slug`);

--
-- Indexes for table `forum_likes`
--
ALTER TABLE `forum_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `forum_likes_post_id_user_id_unique` (`post_id`,`user_id`),
  ADD KEY `forum_likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_posts_thread_id_foreign` (`thread_id`),
  ADD KEY `forum_posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `forum_threads`
--
ALTER TABLE `forum_threads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_threads_category_id_foreign` (`category_id`),
  ADD KEY `forum_threads_user_id_foreign` (`user_id`),
  ADD KEY `forum_threads_slug_index` (`slug`);

--
-- Indexes for table `join_tasks`
--
ALTER TABLE `join_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `notification_preferences`
--
ALTER TABLE `notification_preferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_preferences_user_id_foreign` (`user_id`);

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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_topic_id_foreign` (`topic_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `results_user_id_topic_id_unique` (`user_id`,`topic_id`),
  ADD KEY `results_topic_id_foreign` (`topic_id`);

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
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_answers_user_id_foreign` (`user_id`),
  ADD KEY `user_answers_question_id_foreign` (`question_id`);

--
-- Indexes for table `user_task_submissions`
--
ALTER TABLE `user_task_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_task_submissions_user_id_foreign` (`user_id`),
  ADD KEY `user_task_submissions_task_id_foreign` (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_categories`
--
ALTER TABLE `forum_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `forum_likes`
--
ALTER TABLE `forum_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `forum_threads`
--
ALTER TABLE `forum_threads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `join_tasks`
--
ALTER TABLE `join_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `notification_preferences`
--
ALTER TABLE `notification_preferences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_task_submissions`
--
ALTER TABLE `user_task_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forum_likes`
--
ALTER TABLE `forum_likes`
  ADD CONSTRAINT `forum_likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `forum_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forum_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD CONSTRAINT `forum_posts_thread_id_foreign` FOREIGN KEY (`thread_id`) REFERENCES `forum_threads` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forum_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forum_threads`
--
ALTER TABLE `forum_threads`
  ADD CONSTRAINT `forum_threads_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `forum_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forum_threads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `notification_preferences`
--
ALTER TABLE `notification_preferences`
  ADD CONSTRAINT `notification_preferences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD CONSTRAINT `user_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_task_submissions`
--
ALTER TABLE `user_task_submissions`
  ADD CONSTRAINT `user_task_submissions_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_task_submissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
