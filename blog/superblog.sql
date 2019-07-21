-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2019 at 07:54 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Bailee Ledner', '2019-05-27 11:15:12', '2019-05-27 11:15:12'),
(2, 'Prof. Clint Deckow IV', '2019-05-27 11:15:12', '2019-05-27 11:15:12'),
(3, 'Rafaela Larkin', '2019-05-27 11:15:12', '2019-05-27 11:15:12'),
(4, 'Kianna Christiansen PhD', '2019-05-27 11:15:12', '2019-05-27 11:15:12'),
(5, 'Everett Von', '2019-05-27 11:15:12', '2019-05-27 11:15:12'),
(6, 'Manley Kerluke', '2019-05-27 11:15:12', '2019-05-27 11:15:12'),
(7, 'Dr. Cara Erdman', '2019-05-27 11:15:12', '2019-05-27 11:15:12'),
(8, 'Clara Aufderhar', '2019-05-27 11:15:12', '2019-05-27 11:15:12'),
(9, 'Prof. Jordan Christiansen II', '2019-05-27 11:15:12', '2019-05-27 11:15:12'),
(10, 'Brandyn Kilback IV', '2019-05-27 11:15:12', '2019-05-27 11:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(37, '2014_10_12_000000_create_users_table', 1),
(38, '2014_10_12_100000_create_password_resets_table', 1),
(39, '2019_05_20_171708_create_categories_table', 1),
(40, '2019_05_20_171828_create_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `comment_id`, `post_title`, `post_description`, `post_image`, `created_at`, `updated_at`) VALUES
(1, 3, 10, 2, 'Consectetur necessitatibus non voluptatem consectetur laudantium.', 'Vel quos provident nisi odio totam animi tempore. Pariatur omnis cum non minima. Aut rerum commodi maxime ullam minus alias est voluptatum. Nostrum necessitatibus dolores neque molestiae.', 'https://lorempixel.com/640/480/?89843', '2019-05-27 11:15:12', '2019-05-27 11:15:12'),
(2, 8, 8, 6, 'Nihil itaque et enim non.', 'Corporis ab sed omnis. Sunt quos aut ab odit harum rerum. Laudantium doloremque qui ab libero aliquid. Voluptatem qui aut sed sit.', 'https://lorempixel.com/640/480/?23570', '2019-05-27 11:15:12', '2019-05-27 11:15:12'),
(3, 3, 5, 1, 'Possimus aperiam illo ea porro explicabo non minus minus.', 'Ipsam labore exercitationem sit ut numquam repellendus magni. Mollitia voluptatibus repellendus et inventore eius voluptatem. Illum in libero laborum voluptate alias eum.', 'https://lorempixel.com/640/480/?85984', '2019-05-27 11:15:12', '2019-05-27 11:15:12'),
(4, 1, 6, 7, 'Sed sed voluptas occaecati odio pariatur.', 'Omnis eius architecto illum minima qui voluptas. Est atque voluptas voluptatum qui consequuntur odio. Beatae aspernatur delectus eius tempora molestiae incidunt dolorum.', 'https://lorempixel.com/640/480/?89110', '2019-05-27 11:15:12', '2019-05-27 11:15:12'),
(5, 7, 7, 2, 'Quo culpa maiores eum sapiente qui recusandae ea.', 'Incidunt est quidem vitae dicta eligendi quis laborum nam. Velit nisi quam suscipit aliquid. Fuga nulla vero veniam debitis rem ab et.', 'https://lorempixel.com/640/480/?70299', '2019-05-27 11:15:13', '2019-05-27 11:15:13'),
(6, 9, 2, 9, 'Nostrum eius laudantium est a non.', 'Aut provident eos maiores reprehenderit quas deserunt nostrum. Et dolorem rerum est aperiam ut nesciunt. Sunt est deserunt ut fugiat ex officiis. Iusto non et et velit voluptas deleniti mollitia. Nihil non quia a omnis et autem.', 'https://lorempixel.com/640/480/?73670', '2019-05-27 11:15:13', '2019-05-27 11:15:13'),
(7, 4, 6, 3, 'Et ut maiores ut est omnis aut.', 'Voluptas magnam eos odit qui molestiae. Et fugiat qui doloremque nisi totam delectus. Iusto nihil eius molestiae accusantium doloribus laudantium magnam tempora. Consequatur ut consequatur ut recusandae occaecati autem ut. Soluta sed unde laboriosam atque.', 'https://lorempixel.com/640/480/?82325', '2019-05-27 11:15:13', '2019-05-27 11:15:13'),
(8, 1, 9, 3, 'Tenetur corrupti laudantium eligendi fugiat asperiores eum similique.', 'Quia aut facere ut. Voluptatibus aut recusandae voluptatibus voluptates error voluptas assumenda. Occaecati quae a vel vel suscipit.', 'https://lorempixel.com/640/480/?43908', '2019-05-27 11:15:13', '2019-05-27 11:15:13'),
(9, 3, 9, 7, 'Aut eos numquam minima et sit magni fugit.', 'Incidunt praesentium fuga architecto ea nostrum a aut. Qui occaecati aut occaecati libero. Occaecati consequatur minima nostrum laboriosam facere suscipit aperiam. Dignissimos impedit perferendis excepturi consectetur quae laudantium. Praesentium in in earum.', 'https://lorempixel.com/640/480/?19056', '2019-05-27 11:15:13', '2019-05-27 11:15:13'),
(10, 4, 2, 5, 'Et ut vitae sit doloribus quasi quod.', 'Temporibus vero vel sint rerum deserunt necessitatibus. Sequi quis placeat vel sint est corporis itaque ad. Beatae iusto et placeat asperiores unde repellat.', 'https://lorempixel.com/640/480/?71622', '2019-05-27 11:15:13', '2019-05-27 11:15:13'),
(11, 1, 11, 11, 'Hello Hello Hello', '<p>Hello Hello Hello&nbsp;Hello Hello Hello&nbsp;Hello Hello Hello&nbsp;</p>', 'images/1558978361.jpeg', '2019-05-27 11:32:44', '2019-05-27 11:32:44'),
(12, 1, 11, 11, 'Jewel and Meherab Reading Microprocessor', '<p>Jewel and Meherab Reading Microprocessor. Jewel and Meherab Reading Microprocessor Jewel and Meherab Reading Microprocessor Jewel and Meherab Reading Microprocessor.</p>', 'images/1558978829.jpeg', '2019-05-27 11:38:54', '2019-05-28 14:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ova Mayer PhD', 'carolyne29@example.org', '2019-05-27 11:15:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pRq8SRK0RB', '2019-05-27 11:15:11', '2019-05-27 11:15:11'),
(2, 'Ms. Burnice Murazik', 'lukas74@example.com', '2019-05-27 11:15:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TH07w5u7DY', '2019-05-27 11:15:11', '2019-05-27 11:15:11'),
(3, 'Dena Greenfelder I', 'christiansen.zoey@example.com', '2019-05-27 11:15:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'q49DezXjzd', '2019-05-27 11:15:11', '2019-05-27 11:15:11'),
(4, 'Freda Bahringer', 'shanahan.barney@example.net', '2019-05-27 11:15:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'at4ZRhTlwM', '2019-05-27 11:15:11', '2019-05-27 11:15:11'),
(5, 'Prof. Isobel Schaefer', 'nico44@example.net', '2019-05-27 11:15:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3Jm4OZ9nHA', '2019-05-27 11:15:11', '2019-05-27 11:15:11'),
(6, 'Mr. Hayley Buckridge', 'bethel.dooley@example.com', '2019-05-27 11:15:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WkBYiZXTDT', '2019-05-27 11:15:11', '2019-05-27 11:15:11'),
(7, 'Antwan Ankunding Jr.', 'bmacejkovic@example.net', '2019-05-27 11:15:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 's8Wc85SjSM', '2019-05-27 11:15:11', '2019-05-27 11:15:11'),
(8, 'Hailey Larson', 'wendell54@example.org', '2019-05-27 11:15:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Pl5jz25tUn', '2019-05-27 11:15:11', '2019-05-27 11:15:11'),
(9, 'Kane Goldner', 'kole.willms@example.org', '2019-05-27 11:15:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2a2gGvCIbV', '2019-05-27 11:15:12', '2019-05-27 11:15:12'),
(10, 'Leonie Hirthe', 'qsipes@example.org', '2019-05-27 11:15:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MQFwwqYYlx', '2019-05-27 11:15:12', '2019-05-27 11:15:12'),
(11, 'Sarjis', 'psarjis@gmail.com', NULL, '$2y$10$UsPGKlUiuQzy6R0JGzAOb.faSlqOjyRz6yGe95oqr2tHj6BbTUBHu', NULL, '2019-05-27 11:29:58', '2019-05-27 11:29:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
