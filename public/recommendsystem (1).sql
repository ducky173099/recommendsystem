-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 12, 2021 lúc 07:23 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `recommendsystem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_products`
--

CREATE TABLE `category_products` (
  `id` int(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_products`
--

INSERT INTO `category_products` (`id`, `category_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Women\'s', 'womens', '2021-05-02 00:38:24', '2021-05-02 00:38:24'),
(2, 'Men\'s', 'mens', '2021-05-02 00:38:32', '2021-05-02 00:38:32'),
(3, 'Kid\'s', 'kids', '2021-05-02 00:38:40', '2021-05-02 00:38:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_email`, `customer_password`, `created_at`, `updated_at`) VALUES
(1, 'thanh thúy', 'cungthanhthuy@gmail.com', '123', '2021-05-02 01:12:16', '2021-05-02 01:12:16'),
(2, 'ky', 'ky@gmail.com', '123', '2021-05-02 01:59:05', '2021-05-02 01:59:05'),
(3, 'Cung Thanh Thúy', 'cungthanhthuy@gmail.com', '123456789', '2021-05-03 01:08:46', '2021-05-03 01:08:46'),
(4, 'nụ', 'nu@gmail.com', '123', '2021-05-03 01:14:36', '2021-05-03 01:14:36'),
(5, 'Nguyễn Văn C', 'nguyenvanc@gmail.com', '123456789c', '2021-05-03 01:26:16', '2021-05-03 01:26:16'),
(6, 'Nguyễn Văn D', 'nguyenvand@gmail.com', '123456789d', '2021-05-03 01:33:30', '2021-05-03 01:33:30'),
(7, 'haha', 'haha@gmail.com', '123', '2021-05-03 01:38:08', '2021-05-03 01:38:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_27_152808_create_user_mains_table', 1),
(5, '2021_03_29_103336_create_products_table', 2),
(6, '2021_03_30_145309_create_category_products_table', 3),
(7, '2021_04_07_141750_create_orders_table', 4),
(8, '2021_04_07_152703_create_order_details_table', 5),
(9, '2021_04_07_155604_create_customers_table', 6),
(10, '2021_04_09_141105_create_ratings_table', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(20) UNSIGNED NOT NULL,
  `customer_id` int(20) UNSIGNED DEFAULT NULL,
  `product_id` int(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(20) UNSIGNED NOT NULL,
  `order_id` int(20) UNSIGNED DEFAULT NULL,
  `customer_id` int(20) UNSIGNED DEFAULT NULL,
  `product_id` int(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(20) UNSIGNED NOT NULL,
  `productname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(50) NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(20) UNSIGNED NOT NULL,
  `product_rating` int(11) DEFAULT NULL,
  `product_view` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `productname`, `product_slug`, `price`, `desc`, `product_image`, `user_id`, `category_id`, `product_rating`, `product_view`, `created_at`, `updated_at`) VALUES
(1, 'Váy hoa nhỏ', 'vay-hoa-nho', 200000, 'váy có hoa cực nhỏ', 'product-373.jpg', NULL, 1, NULL, 21, '2021-05-02 07:39:45', '2021-05-10 06:17:44'),
(2, 'Áo hoa nhỏ', 'ao-hoa-nho', 200000, 'áo hoa cực nhỏ', 'product-637.jpg', NULL, 1, NULL, 17, '2021-05-02 07:40:12', '2021-05-03 01:34:14'),
(3, 'Áo hai dây', 'ao-hai-day', 200000, 'Áo hai dây trắng chỉ cho người gầy mặc', 'product-750.jpg', NULL, 1, NULL, 10, '2021-05-02 07:41:49', '2021-05-03 01:34:28'),
(4, 'Áo sơ mi', 'ao-so-mi', 1000000, 'tím mộng mơ', 'product-256.jpg', NULL, 2, NULL, 15, '2021-05-02 07:43:01', '2021-05-03 02:41:42'),
(5, 'Áo đi biển', 'ao-di-bien', 200000, 'Chỉ khi nào đi biển mới được mặc', 'product-832.jpg', NULL, 2, NULL, 10, '2021-05-02 07:43:34', '2021-05-03 01:35:14'),
(6, 'Váy đuôi cá', 'vay-duoi-ca', 210, 'S-M-L', 'rp-390.jpg', NULL, 1, NULL, 2, '2021-05-03 08:20:30', '2021-05-03 01:31:56'),
(7, 'Áo sơ mi hồng', 'ao-so-mi-hong', 360, 'Đầy đủ size', 'product-898.jpg', NULL, 2, NULL, 2, '2021-05-03 08:21:36', '2021-05-03 01:35:25'),
(8, 'Váy bò chữ A', 'vay-bo-chu-a', 300, 'SML', 'rp-147.jpg', NULL, 1, NULL, 4, '2021-05-03 08:22:28', '2021-05-03 01:35:41'),
(9, 'Áo khoác nâu', 'ao-khoac-nau', 500, 'sml', 'product-196.jpg', NULL, 2, NULL, 4, '2021-05-03 08:23:21', '2021-05-03 01:38:11'),
(10, 'Áo véc nâu', 'ao-vec-nau', 450, 'sml', 'rp-290.jpg', NULL, 1, NULL, 2, '2021-05-03 08:24:22', '2021-05-03 01:32:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(20) UNSIGNED NOT NULL,
  `product_id` int(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `customer_id`, `product_id`, `product_name`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Áo sơ mi', 3, '2021-05-02 01:12:44', '2021-05-02 01:12:44'),
(2, 1, 2, 'Áo hoa nhỏ', 3, '2021-05-02 01:18:09', '2021-05-02 01:18:09'),
(3, 1, 3, 'Áo hai dây', 1, '2021-05-02 01:39:03', '2021-05-02 01:39:03'),
(4, 3, 5, 'Áo đi biển', 4, '2021-05-03 01:13:26', '2021-05-03 01:13:26'),
(5, 3, 1, 'Váy hoa nhỏ', 2, '2021-05-03 01:13:38', '2021-05-03 01:13:38'),
(6, 4, 5, 'Áo đi biển', 2, '2021-05-03 01:14:45', '2021-05-03 01:14:45'),
(7, 4, 4, 'Áo sơ mi', 5, '2021-05-03 01:15:01', '2021-05-03 01:15:01'),
(8, 4, 3, 'Áo hai dây', 3, '2021-05-03 01:15:12', '2021-05-03 01:15:12'),
(9, 4, 2, 'Áo hoa nhỏ', 1, '2021-05-03 01:15:22', '2021-05-03 01:15:22'),
(10, 4, 1, 'Váy hoa nhỏ', 5, '2021-05-03 01:15:33', '2021-05-03 01:15:33'),
(11, 5, 1, 'Váy hoa nhỏ', 3, '2021-05-03 01:26:41', '2021-05-03 01:27:25'),
(12, 5, 2, 'Áo hoa nhỏ', 4, '2021-05-03 01:30:11', '2021-05-03 01:30:11'),
(13, 5, 3, 'Áo hai dây', 5, '2021-05-03 01:30:38', '2021-05-03 01:30:38'),
(14, 5, 4, 'Áo sơ mi', 3, '2021-05-03 01:30:52', '2021-05-03 01:30:58'),
(15, 5, 5, 'Áo đi biển', 4, '2021-05-03 01:31:10', '2021-05-03 01:31:10'),
(16, 5, 6, 'Váy đuôi cá', 4, '2021-05-03 01:31:54', '2021-05-03 01:31:54'),
(17, 5, 8, 'Váy bò chữ A', 4, '2021-05-03 01:32:06', '2021-05-03 01:32:06'),
(18, 5, 9, 'Áo khoác nâu', 5, '2021-05-03 01:32:17', '2021-05-03 01:32:17'),
(19, 5, 10, 'Áo véc nâu', 4, '2021-05-03 01:32:33', '2021-05-03 01:32:33'),
(20, 6, 1, 'Váy hoa nhỏ', 5, '2021-05-03 01:33:43', '2021-05-03 01:33:43'),
(21, 6, 2, 'Áo hoa nhỏ', 5, '2021-05-03 01:34:01', '2021-05-03 01:34:01'),
(22, 6, 3, 'Áo hai dây', 4, '2021-05-03 01:34:25', '2021-05-03 01:34:25'),
(23, 6, 4, 'Áo sơ mi', 4, '2021-05-03 01:34:49', '2021-05-03 01:34:49'),
(24, 6, 5, 'Áo đi biển', 4, '2021-05-03 01:35:11', '2021-05-03 01:35:11'),
(25, 6, 7, 'Áo sơ mi hồng', 3, '2021-05-03 01:35:24', '2021-05-03 01:35:24'),
(26, 6, 8, 'Váy bò chữ A', 3, '2021-05-03 01:35:40', '2021-05-03 01:35:40'),
(27, 7, 1, 'Váy hoa nhỏ', 4, '2021-05-03 02:30:33', '2021-05-03 02:30:33'),
(28, 7, 4, 'Áo sơ mi', 4, '2021-05-03 02:30:48', '2021-05-03 02:30:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_mains`
--

CREATE TABLE `user_mains` (
  `id` int(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_mains`
--

INSERT INTO `user_mains` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Cung Thanh Thúy', 'thuy@gmail.com', '123456789', '2021-05-02 00:37:55', '2021-05-03 01:10:20'),
(2, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '123456789a', '2021-05-03 01:11:04', '2021-05-03 01:11:04'),
(3, 'Nguyễn Văn B', 'nguyenvanb@gmail.com', '123456789b', '2021-05-03 01:11:34', '2021-05-03 01:11:34');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_mains`
--
ALTER TABLE `user_mains`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user_mains`
--
ALTER TABLE `user_mains`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_products` (`id`);

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
