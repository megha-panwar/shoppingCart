-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2025 at 07:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `full_name`, `address`, `city`, `postal_code`, `phone`, `is_default`, `created_at`, `updated_at`) VALUES
(2, 1, 'Megha Panwar', 'raipur', 'Dehradun', '249146', '1234567890', 1, '2025-09-02 19:18:10', '2025-09-02 19:18:46'),
(3, 1, 'Megha Panwar', 'raipur', 'Dehradun', '249146', '1234567890', 0, '2025-09-02 20:50:32', '2025-09-02 20:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_09_01_181810_add_google_columns_to_users_table', 1),
(6, '2025_09_01_183930_create_categories_table', 1),
(7, '2025_09_01_183939_create_products_table', 1),
(8, '2025_09_02_042036_add_quantity_to_products_table', 2),
(9, '2025_09_02_141052_create_carts_table', 3),
(10, '2025_09_02_150840_create_addresses_table', 4),
(11, '2025_09_02_152148_create_orders_table', 5),
(12, '2025_09_02_152151_create_order_items_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1398.00, 'pending', '2025-09-02 19:36:01', '2025-09-02 19:36:01'),
(2, 1, 2, 499.00, 'pending', '2025-09-02 19:48:29', '2025-09-02 19:48:29'),
(3, 1, 2, 899.00, 'pending', '2025-09-02 19:49:32', '2025-09-02 19:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 899.00, '2025-09-02 19:36:01', '2025-09-02 19:36:01'),
(2, 1, 1, 1, 499.00, '2025-09-02 19:36:01', '2025-09-02 19:36:01'),
(3, 2, 1, 1, 499.00, '2025-09-02 19:48:29', '2025-09-02 19:48:29'),
(4, 3, 2, 1, 899.00, '2025-09-02 19:49:32', '2025-09-02 19:49:32');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_url`, `created_at`, `updated_at`, `quantity`) VALUES
(1, 'Men\'s Cotton T-Shirt', 'Soft cotton round neck t-shirt, perfect for daily wear.', 499.00, 'https://images.unsplash.com/photo-1523381210434-271e8be1f52b', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(2, 'Women\'s Summer Dress', 'Lightweight floral dress for summer outings.', 899.00, 'https://www.bullionknot.com/cdn/shop/files/26_3a758bc2-1134-47f6-b6d3-a2fe627ab149.jpg?v=1754644303&width=1200', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(3, 'Kids Teddy Bear', 'Cute soft teddy bear for kids and gifts.', 650.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGeD75yLvEl6zIRIgXMlwaEdKKX1t0EBvTmQ&s', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(4, 'Running Shoes', 'Lightweight running shoes for men and women.', 1999.00, 'https://images.unsplash.com/photo-1542291026-7eec264c27ff', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(5, 'Leather Wallet', 'Durable leather wallet with multiple card slots.', 749.00, 'https://images.pexels.com/photos/7742559/pexels-photo-7742559.jpeg', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(6, 'Bluetooth Headphones', 'Wireless over-ear headphones with noise cancellation.', 2999.00, 'https://images.pexels.com/photos/3479178/pexels-photo-3479178.jpeg', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(7, 'Smart Watch', 'Fitness tracking smartwatch with heart-rate monitor.', 3499.00, 'https://images.pexels.com/photos/267394/pexels-photo-267394.jpeg', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(8, 'Women\'s Handbag', 'Elegant leather handbag for casual and office use.', 2299.00, 'https://images.pexels.com/photos/33708891/pexels-photo-33708891.jpeg', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(9, 'Sports Cap', 'Breathable cotton sports cap for men and women.', 399.00, 'https://images.pexels.com/photos/4816771/pexels-photo-4816771.jpeg', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(10, 'Coffee Mug', 'Ceramic coffee mug with stylish design.', 299.00, 'https://images.pexels.com/photos/1207918/pexels-photo-1207918.jpeg', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(11, 'Laptop Backpack', 'Waterproof laptop backpack with extra compartments.', 1799.00, 'https://images.pexels.com/photos/3178818/pexels-photo-3178818.jpeg', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(12, 'Men\'s Formal Shirt', 'Classic slim-fit formal shirt for office wear.', 1199.00, 'https://images.unsplash.com/photo-1520975661595-6453be3f7070', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(13, 'Women\'s Sneakers', 'Comfortable sneakers with trendy design.', 1599.00, 'https://images.pexels.com/photos/29699298/pexels-photo-29699298.jpeg', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(14, 'Kids School Bag', 'Durable school bag with cartoon prints.', 899.00, 'https://images.pexels.com/photos/8926553/pexels-photo-8926553.jpeg', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(15, 'Table Clock', 'Stylish table clock with modern design.', 549.00, 'https://images.unsplash.com/photo-1519681393784-d120267933ba', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(16, 'Water Bottle', 'Stainless steel insulated water bottle.', 599.00, 'https://images.pexels.com/photos/1342529/pexels-photo-1342529.jpeg', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(17, 'Kitchen Mixer', 'Multi-purpose electric kitchen mixer.', 3499.00, 'https://images.pexels.com/photos/7525096/pexels-photo-7525096.jpeg', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(18, 'Desk Chair', 'Ergonomic office chair with adjustable height.', 4599.00, 'https://images.pexels.com/photos/6931974/pexels-photo-6931974.jpeg', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(19, 'Table Lamp', 'Modern table lamp with LED bulb.', 899.00, 'https://images.pexels.com/photos/1252814/pexels-photo-1252814.jpeg', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10),
(20, 'Soft Blanket', 'Warm and cozy blanket for winter.', 1299.00, 'https://images.pexels.com/photos/33719889/pexels-photo-33719889.jpeg', '2025-09-02 07:07:42', '2025-09-02 07:07:42', 10);

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
  `google_id` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `google_token` text DEFAULT NULL,
  `google_refresh_token` text DEFAULT NULL,
  `google_token_expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `google_id`, `avatar`, `google_token`, `google_refresh_token`, `google_token_expires_at`) VALUES
(1, 'Megha Panwar', 'meghapanwar2004@gmail.com', NULL, '$2y$12$B/YP8mmLZHXZBnV/LZk.aemJwrf3ONlBfIKOguXXPXUqKeWiBP95W', 'F5BVWVe7p9jc7hJHMrVOEjWahWQvvqVQkcgFhtb2zDx6ZpuJXAlqUN6fplQe', '2025-09-02 07:10:54', '2025-09-02 20:05:31', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_google_id_unique` (`google_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
