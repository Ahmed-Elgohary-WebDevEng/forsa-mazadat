-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 04:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mazad1`
--

-- --------------------------------------------------------

--
-- Table structure for table `acution_items`
--

CREATE TABLE `acution_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Acution_id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `descripton` varchar(255) DEFAULT NULL,
  `space` varchar(255) DEFAULT NULL,
  `maxPrice` double DEFAULT NULL,
  `lowPrice` double DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `length` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acution_items`
--

INSERT INTO `acution_items` (`id`, `Acution_id`, `location`, `name`, `descripton`, `space`, `maxPrice`, `lowPrice`, `width`, `length`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'maz', NULL, '11', NULL, NULL, NULL, NULL, '', '2023-08-03 08:00:43', '2023-08-03 08:00:43'),
(2, 1, NULL, 'maz444', NULL, '444', NULL, NULL, NULL, NULL, '', '2023-08-03 08:00:59', '2023-08-03 08:00:59'),
(3, 1, NULL, 'maz5566', NULL, '3355', NULL, NULL, NULL, NULL, '', '2023-08-03 08:02:10', '2023-08-03 08:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Region` enum('all','riyadh','makka','almadina','alsharqia','aljuof','tabuk','haael','qassim','najran','jazan','albaha','shmaleah','asser') NOT NULL DEFAULT 'all',
  `type` enum('online','onsite','mixed') NOT NULL DEFAULT 'online',
  `ShowInfath` enum('yes','no') NOT NULL DEFAULT 'no',
  `Title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `onsiteLink` varchar(255) DEFAULT NULL,
  `PlatformName` varchar(255) DEFAULT NULL,
  `PlatformImage` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `dateOfStarting` date NOT NULL,
  `timeOfStarting` time NOT NULL,
  `dateOfEnding` date NOT NULL,
  `nowdate` datetime NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auctions`
--

INSERT INTO `auctions` (`id`, `Region`, `type`, `ShowInfath`, `Title`, `image`, `link`, `onsiteLink`, `PlatformName`, `PlatformImage`, `description`, `dateOfStarting`, `timeOfStarting`, `dateOfEnding`, `nowdate`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'makka', 'onsite', 'yes', 'مزادات محمود ابو اليزيد', '1691059541.png', 'https://panorama-q.com', 'http://google.com', 'السعوديه للمزادات', '1691059541.png', 'ابو اليزيد ياشا', '2023-08-20', '09:00:00', '2023-08-23', '2023-08-03 10:45:41', 'mzadat-mhmod-abo-alyzyd', '2023-08-03 07:45:41', '2023-08-03 07:45:41');

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
(1, '2014_08_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_08_03_061844_create_user_types_table', 1),
(4, '2022_08_03_061918_create_role_type_users_table', 1),
(5, '2022_08_04_053627_create_sequence_tbls_table', 1),
(6, '2022_08_04_053741_create_generate_id_tbls_table', 1),
(7, '2022_08_12_100000_create_password_resets_table', 1),
(8, '2022_08_19_000000_create_failed_jobs_table', 1),
(9, '2023_06_26_102403_create_websute_users_table', 1),
(10, '2023_06_26_104414_create_auctions_table', 1),
(11, '2023_06_26_105150_create_acution_items_table', 1),
(12, '2023_06_26_110247_create_reminders_table', 1),
(13, '2023_07_21_112549_create_user_logs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Acution_id` bigint(20) UNSIGNED NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `timezoneoffset` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_type_users`
--

CREATE TABLE `role_type_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_type_users`
--

INSERT INTO `role_type_users` (`id`, `role_type`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Super Admin', NULL, NULL),
(3, 'Normal User', NULL, NULL),
(4, 'Client', NULL, NULL),
(5, 'Employee', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sequence_tbls`
--

CREATE TABLE `sequence_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sequence_tbls`
--

INSERT INTO `sequence_tbls` (`id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `join_date` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_id`, `email`, `join_date`, `phone_number`, `status`, `role_name`, `avatar`, `position`, `department`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'maz', '00002', 'maz@maz.com', 'Thu, Aug 3, 2023 10:59 AM', NULL, NULL, 'Super Admin', 'photo_defaults.jpg', NULL, NULL, NULL, '$2y$10$JVPRL4RmqMJTL3oSak64RuYWpGz2G3eb08vsP/ZH63ylMNGSyLBDe', NULL, '2023-08-03 07:59:37', '2023-08-03 07:59:37');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `id_store` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
                INSERT INTO sequence_tbls VALUES (NULL);
                SET NEW.user_id = CONCAT("0", LPAD(LAST_INSERT_ID(), 4, "0"));
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `Firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `identity` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `Acution_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `slug`, `Firstname`, `lastname`, `identity`, `phone`, `Acution_id`, `created_at`, `updated_at`) VALUES
(1, '341214253', 'Mohammed', 'Smeer', '341214253', '21412141241421', 1, '2023-08-03 07:47:42', '2023-08-03 07:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'Active', NULL, NULL),
(2, 'Inactive', NULL, NULL),
(3, 'Disable', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `website_users`
--

CREATE TABLE `website_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `identity` varchar(255) NOT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `Region` varchar(255) DEFAULT NULL,
  `join_date` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acution_items`
--
ALTER TABLE `acution_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acution_items_acution_id_foreign` (`Acution_id`);

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reminders_acution_id_foreign` (`Acution_id`);

--
-- Indexes for table `role_type_users`
--
ALTER TABLE `role_type_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sequence_tbls`
--
ALTER TABLE `sequence_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_logs_acution_id_foreign` (`Acution_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_users`
--
ALTER TABLE `website_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acution_items`
--
ALTER TABLE `acution_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auctions`
--
ALTER TABLE `auctions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_type_users`
--
ALTER TABLE `role_type_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sequence_tbls`
--
ALTER TABLE `sequence_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `website_users`
--
ALTER TABLE `website_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acution_items`
--
ALTER TABLE `acution_items`
  ADD CONSTRAINT `acution_items_acution_id_foreign` FOREIGN KEY (`Acution_id`) REFERENCES `auctions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reminders`
--
ALTER TABLE `reminders`
  ADD CONSTRAINT `reminders_acution_id_foreign` FOREIGN KEY (`Acution_id`) REFERENCES `auctions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD CONSTRAINT `user_logs_acution_id_foreign` FOREIGN KEY (`Acution_id`) REFERENCES `auctions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
