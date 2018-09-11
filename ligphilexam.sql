-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2018 at 04:39 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ligphilexam`
--

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_10_143111_create_admin_post', 2),
(4, '2014_10_12_000000_create_users_table', 3);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `image`, `title`, `content`, `posted_at`) VALUES
(1, 'hqdefault-p7pmz.jpg', 'First Wings', 'The Mikenni Wings', '2018-09-11 09:48:14'),
(2, 'hqdefault-7hi8W.jpg', 'Second Wings', 'Avoid Duplication of Alma', '2018-09-11 09:48:29'),
(3, 'maxresdefault-aAErS.jpg', 'Maxresdefault', 'The human duplication', '2018-09-11 09:48:46'),
(4, 'download (1)-DhClM.jpg', 'More Wings', 'The quick brown fox jumps', '2018-09-11 09:49:01'),
(5, 'download (1)-RMQ5v.jpg', 'Second quick brown', 'Jumps over the lazy dog', '2018-09-11 09:49:21'),
(6, 'images-2-dlz9k.jpg', 'Barangay Ginebra', 'Basketball Team In Pinas', '2018-09-11 09:50:24'),
(7, 'images-4-pl7NR.jpg', 'Grabe ang Hair', 'Ohsfsfkkklfsklfkjkklklwerwrwrwrwrwklklrwl', '2018-09-11 09:50:39'),
(8, 'bucket-ekcMh.jpg', 'l', 'm', '2018-09-11 09:51:47'),
(9, 'bucket-Fi4nA.jpg', 'kit', 'kat', '2018-09-11 09:52:40'),
(10, 'images-1-BCcqu.jpg', 'Maxresdefault Ketchup', 'The human duplication', '2018-09-11 10:20:16'),
(11, 'finalkitkatcollagehopefully-e1436996109761-7kMg0.jpg', 'Kitkat Soap', 'Cache is deprecated in non-secure contexts, and will be restricted to secure contexts in M69, around September 2018.', '2018-09-11 12:19:19'),
(12, 'images-1-97hkN.jpg', 'Kitkat Soap', 'Cache is deprecated in non-secure contexts, and will be restricted to secure contexts in town, around September first.', '2018-09-11 10:21:49'),
(13, 'download (1)-T2AY6.jpg', 'Sneakers nike three shirt', 'sneakers nike air force three', '2018-09-11 11:16:16'),
(14, 'images (1)-3GhYw.jpg', 'sfsfk', 'sffjsksfk', '2018-09-11 10:35:25'),
(15, 'nike-air-max-97-921826-010-2-sbbr3.jpg', 'niek lafklsl to leggings five', 'the woewlwlewlelw five', '2018-09-11 11:15:49'),
(16, 'images-3-zMjPY.jpg', 'The CIGARETTE', 'Cigarette smoking is dangerous to your health', '2018-09-11 12:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `remember_token`) VALUES
(1, '$2y$10$p.hCulDP6bXd4U3zWE0TMOkvrY9y8YOlcEsiv3uLEjDtj/22vxGHy', '832QXwbd6qe5hJ18mCnhBKLgVK3Zwb3pX2E7OPB1zjGvQ1deKG2HfLGdSPSf');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
