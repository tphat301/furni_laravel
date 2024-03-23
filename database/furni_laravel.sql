-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 05:00 PM
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
-- Database: `furni_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'dltphat301@gmail.com', '$2y$12$ymf40Y9JLVtYLUdAERMUmeM7Q2Mu8q7ijVMo7mG6aaeVIc/UGCOQS', 'SwkXmELPraXgzHhsf6ebwoCQCZu0a8tfz4pz8aoE2DOGfyVGPxp6GXqklA5E', NULL, '2024-03-13 03:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_reset_tokens`
--

CREATE TABLE `admin_password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_news`
--

CREATE TABLE `category_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `photo1` varchar(255) DEFAULT NULL,
  `photo2` varchar(255) DEFAULT NULL,
  `photo3` varchar(255) DEFAULT NULL,
  `photo4` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `desc` mediumtext DEFAULT NULL,
  `content` mediumtext DEFAULT NULL,
  `options` mediumtext DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_products`
--

CREATE TABLE `category_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `photo1` varchar(255) DEFAULT NULL,
  `photo2` varchar(255) DEFAULT NULL,
  `photo3` varchar(255) DEFAULT NULL,
  `photo4` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `desc` mediumtext DEFAULT NULL,
  `content` mediumtext DEFAULT NULL,
  `options` mediumtext DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `num` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_03_12_181021_create_admins_table', 2),
(8, '2024_03_13_100111_create_admin_password_reset_tokens_table', 3),
(10, '2024_03_14_161649_create_products_table', 4),
(11, '2024_03_16_202637_create_gallery_table', 5),
(12, '2024_03_16_203024_create_seo_table', 6),
(13, '2024_03_18_161129_add_desc_to_products_table', 7),
(14, '2024_03_18_161427_add_content_to_products_table', 8),
(15, '2024_03_20_083349_create_category_products_table', 9),
(16, '2024_03_20_090531_create_news_table', 10),
(17, '2024_03_20_091138_create_category_news_table', 11),
(18, '2024_03_21_192206_add_slogan_to_news_table', 12),
(20, '2024_03_22_100755_create_photo_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_parent1` int(11) DEFAULT NULL,
  `id_parent2` int(11) DEFAULT NULL,
  `id_parent3` int(11) DEFAULT NULL,
  `id_parent4` int(11) DEFAULT NULL,
  `photo1` varchar(255) DEFAULT NULL,
  `photo2` varchar(255) DEFAULT NULL,
  `photo3` varchar(255) DEFAULT NULL,
  `photo4` varchar(255) DEFAULT NULL,
  `file_attach` varchar(255) DEFAULT NULL,
  `file_youtube` varchar(255) DEFAULT NULL,
  `file_mp4` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `num` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `desc` mediumtext DEFAULT NULL,
  `content` mediumtext DEFAULT NULL,
  `options` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `num` varchar(255) DEFAULT NULL,
  `desc` mediumtext DEFAULT NULL,
  `content` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `title`, `photo`, `type`, `action`, `link`, `hash`, `status`, `num`, `desc`, `content`, `created_at`, `updated_at`) VALUES
(16, 'Facebook', '1794240570359187.mxh1-1-1957-80510.png', 'action_social_footer', NULL, 'https://www.google.com/', 'jsa1', 'hienthi', '1', NULL, NULL, '2024-03-22 15:25:49', '2024-03-22 15:25:49'),
(17, 'Google', '1794240570408227.mxh1-2-1178-74341.png', 'action_social_footer', NULL, 'https://www.google.com/', 'jsa2', 'hienthi', '0', NULL, NULL, '2024-03-22 15:25:49', '2024-03-22 15:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_parent1` int(11) DEFAULT NULL,
  `id_parent2` int(11) DEFAULT NULL,
  `id_parent3` int(11) DEFAULT NULL,
  `id_parent4` int(11) DEFAULT NULL,
  `id_brand` int(11) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `photo1` varchar(255) DEFAULT NULL,
  `photo2` varchar(255) DEFAULT NULL,
  `photo3` varchar(255) DEFAULT NULL,
  `photo4` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `file_attach` varchar(255) DEFAULT NULL,
  `file_youtube` varchar(255) DEFAULT NULL,
  `file_mp4` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `desc` mediumtext DEFAULT NULL,
  `content` mediumtext DEFAULT NULL,
  `num` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `sale_price` double NOT NULL DEFAULT 0,
  `regular_price` double NOT NULL DEFAULT 0,
  `discount` double NOT NULL DEFAULT 0,
  `options` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `hash_seo` varchar(255) DEFAULT NULL,
  `title_seo` mediumtext DEFAULT NULL,
  `keywords` mediumtext DEFAULT NULL,
  `description_seo` mediumtext DEFAULT NULL,
  `schema` mediumtext DEFAULT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Đỗ Lâm Thành Phát', 'dolamthanhphat@gmail.com', '2024-03-12 08:19:20', '$2y$12$df//3HDqJrYZvBMttUXTz.a09mqr8095amvC7EGvmRbFNFgKqHrge', 'HiKsAf9ALhYXEEiNos3IbqCQJXMu3N8Qq9RNIpB0JXc4FoIbvbNuzSZs52FH', '2024-03-12 08:16:42', '2024-03-12 11:15:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_password_reset_tokens`
--
ALTER TABLE `admin_password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `category_news`
--
ALTER TABLE `category_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category_news`
--
ALTER TABLE `category_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
