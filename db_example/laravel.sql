-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 06:04 AM
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_char` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `height` int(11) NOT NULL,
  `mass` int(11) NOT NULL,
  `hair_color` varchar(255) NOT NULL,
  `skin_color` varchar(255) NOT NULL,
  `eye_color` varchar(255) NOT NULL,
  `birth_year` varchar(255) NOT NULL,
  `homeworld` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `id_char`, `name`, `gender`, `height`, `mass`, `hair_color`, `skin_color`, `eye_color`, `birth_year`, `homeworld`, `created_at`, `updated_at`) VALUES
(5, 2, 'C-3PO', 'n/a', 167, 75, 'n/a', 'gold', 'yellow', '112BBY', 'https://swapi.dev/api/planets/1/', '2024-12-07 10:55:16', '2024-12-07 10:55:16'),
(6, 3, 'R2-D2', 'n/a', 96, 32, 'n/a', 'white, blue', 'red', '33BBY', 'https://swapi.dev/api/planets/8/', '2024-12-07 10:55:24', '2024-12-07 10:55:24'),
(8, 2, 'C-3PO', 'n/a', 167, 75, 'n/a', 'gold', 'yellow', '112BBY', 'https://swapi.dev/api/planets/1/', '2024-12-07 11:00:49', '2024-12-07 11:00:49'),
(9, 10, 'Obi-Wan Kenobi', 'male', 182, 77, 'auburn, white', 'fair', 'blue-gray', '57BBY', 'https://swapi.dev/api/planets/20/', '2024-12-07 12:24:35', '2024-12-07 12:24:35'),
(10, 9, 'Biggs Darklighter', 'male', 183, 84, 'black', 'light', 'brown', '24BBY', 'https://swapi.dev/api/planets/1/', '2024-12-07 12:25:14', '2024-12-07 12:25:14'),
(11, 2, 'C-3PO', 'n/a', 167, 75, 'n/a', 'gold', 'yellow', '112BBY', 'https://swapi.dev/api/planets/1/', '2024-12-07 13:30:34', '2024-12-07 13:30:34'),
(12, 4, 'Darth Vader', 'male', 202, 136, 'none', 'white', 'yellow', '41.9BBY', 'https://swapi.dev/api/planets/1/', '2024-12-07 13:30:49', '2024-12-07 13:30:49'),
(13, 10, 'Obi-Wan Kenobi', 'male', 182, 77, 'auburn, white', 'fair', 'blue-gray', '57BBY', 'https://swapi.dev/api/planets/20/', '2024-12-07 13:31:05', '2024-12-07 13:31:05'),
(14, 9, 'Biggs Darklighter', 'male', 183, 84, 'black', 'light', 'brown', '24BBY', 'https://swapi.dev/api/planets/1/', '2024-12-07 13:31:28', '2024-12-07 13:31:28'),
(15, 4, 'Darth Vader', 'male', 202, 136, 'none', 'white', 'yellow', '41.9BBY', 'https://swapi.dev/api/planets/1/', '2024-12-07 13:32:18', '2024-12-07 13:32:18'),
(16, 6, 'Owen Lars', 'male', 178, 120, 'brown, grey', 'light', 'blue', '52BBY', 'https://swapi.dev/api/planets/1/', '2024-12-07 13:33:48', '2024-12-07 13:33:48'),
(18, 3, 'R2-D2', 'n/a', 96, 32, 'n/a', 'white, blue', 'red', '33BBY', 'https://swapi.dev/api/planets/8/', '2024-12-07 13:36:03', '2024-12-07 13:36:03'),
(19, 1, 'Luke Skywalker', 'male', 172, 77, 'blond', 'fair', 'blue', '19BBY', 'https://swapi.dev/api/planets/1/', '2024-12-07 13:38:29', '2024-12-07 13:38:29');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_07_131305_create_characters_table', 2),
(6, '2024_12_07_225615_add_verification_fields_to_users_table', 3),
(7, '2024_12_07_225926_add_verification_fields_to_users_table', 4);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `verification_expires_at` timestamp NULL DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `verification_code`, `verification_expires_at`, `is_verified`) VALUES
(16, 'Ricky Tapang', 'rickytapang8@gmail.com', NULL, '$2y$10$UM8TntfKAmcFP0ZtLk72J.SNGDzLuWIh.xfmGSIookGoe.xnQlQAW', NULL, '2024-12-07 19:37:29', '2024-12-07 19:38:57', '965823', '2024-12-07 19:47:29', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
