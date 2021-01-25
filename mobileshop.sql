-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Jan 25. 20:49
-- Kiszolgáló verziója: 10.4.14-MariaDB
-- PHP verzió: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `mobileshop`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `billings`
--

CREATE TABLE `billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` int(11) NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `billings`
--

INSERT INTO `billings` (`id`, `user_id`, `city`, `post_code`, `street`, `house_number`, `mobile_number`, `created_at`, `updated_at`) VALUES
(8, 4, 'Kishegyes', 24321, 'Petofi Sandor', '99', 11111111, '2021-01-11 17:51:32', '2021-01-21 16:45:01'),
(9, 1, 'Kishegyes', 24321, 'AAAAAA', '88', 123456785, '2021-01-12 10:40:50', '2021-01-21 16:45:39'),
(10, 17, 'Feketics', 12345, 'Vasut utca', '15', 222222222, '2021-01-12 11:08:32', '2021-01-12 11:09:14'),
(11, 18, 'Budapest', 36985, 'Kosztolanyi Arpad', '57', 123213123, '2021-01-12 12:30:36', '2021-01-13 17:47:42');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `comments`
--

INSERT INTO `comments` (`id`, `content`, `mobile_id`, `user_id`, `created_at`, `updated_at`) VALUES
(17, 'Hello.', 118, 18, '2021-01-24 13:48:30', '2021-01-24 13:48:30');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `images`
--

INSERT INTO `images` (`id`, `name`, `mobile_id`, `created_at`, `updated_at`) VALUES
(118, '9FUQGmXXsGBJAEjt5ANygkFgpTB5f2FOrYf9Oyjc.jpg', 108, '2021-01-20 11:49:55', '2021-01-20 11:49:55'),
(119, 'iYaDr6UFAqLwMmxAKwpDRPGD6ksQLjmPgPQ0qlmK.jpg', 108, '2021-01-20 11:49:55', '2021-01-20 11:49:55'),
(120, '2LfbCJqHi20MztrDLINdDLhJwm0GkJlxg8i3g9kK.jpg', 109, '2021-01-20 11:50:48', '2021-01-20 11:50:48'),
(121, 'kAnnPg2oLaMy1CQTsyhphX2QAftfVDgKnbF8dulr.jpg', 109, '2021-01-20 11:50:48', '2021-01-20 11:50:48'),
(122, 'BxFG3xFM4ByVE717W7KMIvBsgAPQiXXU9lsWACvJ.jpg', 110, '2021-01-20 11:51:14', '2021-01-20 11:51:14'),
(123, 'zMnTkg9sJSpIrlAGCmetLLsDNafM2Pi4Ys40ow6T.jpg', 110, '2021-01-20 11:51:14', '2021-01-20 11:51:14'),
(124, 'VJIIWbQi3xkp9ZnUg0QAr7WScC41G2ryVwkjIASL.png', 111, '2021-01-20 11:54:36', '2021-01-20 11:54:36'),
(125, '7JUcPZLkqrqxSshYbU0cna61vPAU6xASpwZRf5tf.jpg', 111, '2021-01-20 11:54:36', '2021-01-20 11:54:36'),
(126, '3RKYYoQYlZFQorTc0OMrl01K2PUdNbpuowaVaRYP.jpg', 111, '2021-01-20 11:54:36', '2021-01-20 11:54:36'),
(127, 'iDuHU6qsbPGSlL1D1cMbQHXwpOEr7BI1ZflN00dO.jpg', 112, '2021-01-20 11:55:03', '2021-01-20 11:55:03'),
(128, 'yPvYd66DMHqxC3qQcYgJvMyU9nVwmK96VBygyxXf.jpg', 112, '2021-01-20 11:55:03', '2021-01-20 11:55:03'),
(129, 'B4lNNbLKeioX4Ma8yzZgMJH81fQug5kE7twhcvB2.jpg', 113, '2021-01-20 16:29:49', '2021-01-20 16:29:49'),
(130, 'ymFzmgIHUsx2A8sPnFiEiEXlpI55wtGiY5KxxH8b.jpg', 113, '2021-01-20 16:29:49', '2021-01-20 16:29:49'),
(131, 'D0RJUG9ZSGYR2gBRWoEUw6c1lmS5fFrvzFivD7lk.jpg', 114, '2021-01-20 16:30:17', '2021-01-20 16:30:17'),
(132, 'P6wsIFWlhfStTPkbisfrQC8Yzjg818qfW9EXmTW6.jpg', 114, '2021-01-20 16:30:17', '2021-01-20 16:30:17'),
(133, 'nAd9YkRfCPNFO67m5FaucoAjPqZAGtGX3Odvtin8.jpg', 115, '2021-01-20 16:30:34', '2021-01-20 16:30:34'),
(134, 'OTrG0fUudE5ULl2CI03LRL8KJgh9rh7AaG3cUugQ.jpg', 115, '2021-01-20 16:30:34', '2021-01-20 16:30:34'),
(139, '5qmSclIzbQ1N1BrUkAYndhFGPtZ5UZtLKeWEUQSD.jpg', 118, '2021-01-22 09:33:45', '2021-01-22 09:33:45'),
(140, 'JRHJkI6tyhoR2gQk7EOeNzN9xkCWk3MZx9ybn988.jpg', 118, '2021-01-22 09:33:45', '2021-01-22 09:33:45'),
(142, '1BNUoB0iA465cc9VZikxFRJY7fdl6ghXujdsTSK8.jpg', 120, '2021-01-24 11:55:54', '2021-01-24 11:55:54'),
(143, '86iFDqblfQEOkC1o0ncd1AaRaO3yzpfQRpltKp7v.jpg', 120, '2021-01-24 11:55:54', '2021-01-24 11:55:54');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_000000_create_users_table', 1),
(6, '2020_12_16_132030_create_mobiles_table', 2),
(7, '2020_12_18_184057_add_admin_column_to_users_table', 2),
(12, '2020_12_21_123105_create_comments_table', 3),
(13, '2020_12_24_115217_create_images_table', 3),
(14, '2021_01_11_124950_create_billings_table', 4),
(15, '2014_10_12_100000_create_password_resets_table', 5),
(16, '2021_01_11_170844_create_orders_table', 5),
(20, '2021_01_24_101016_add_more_specification_for_mobile_table', 6),
(21, '2021_01_25_125537_drop_orders_table', 7),
(22, '2021_01_25_131259_create_orders_table', 8);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `mobiles`
--

CREATE TABLE `mobiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `screen_size` float NOT NULL,
  `screen_resolution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `screen_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_camera` int(11) NOT NULL,
  `selfie_camera` int(11) NOT NULL,
  `OS` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memory` int(11) NOT NULL,
  `gpu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `battery` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `mobiles`
--

INSERT INTO `mobiles` (`id`, `brand`, `type`, `color`, `weight`, `screen_size`, `screen_resolution`, `screen_type`, `main_camera`, `selfie_camera`, `OS`, `memory`, `gpu`, `cpu`, `battery`, `price`, `user_id`, `created_at`, `updated_at`) VALUES
(108, 'Xiaomi', 'Redmi Note 5', 'Black', 220, 6.2, '1080*1920', 'IPS', 12, 5, 'Android 8.0', 4, 'Adreno 506', 'Snapdragon 636', 4000, 165, 1, '2021-01-20 11:49:55', '2021-01-20 11:49:55'),
(109, 'Samsung', 'Galaxy A51', 'blue', 210, 6.5, '1080*2400', 'Super AMOLED', 48, 32, 'Android 10', 6, 'Mali-G72 MP3', 'Octa-core', 4000, 300, 1, '2021-01-20 11:50:48', '2021-01-20 11:50:48'),
(110, 'Iphone', 'X', 'black', 200, 5.7, '1125*2436', 'Super Retina OLED', 12, 7, 'iOS 11.1.1', 3, 'Apple GPU', 'Hexa-core 2.39 GHz', 2716, 600, 1, '2021-01-20 11:51:14', '2021-01-20 11:51:14'),
(111, 'Samsung', 'Galaxy S20', 'Grey', 215, 6.3, '1440*3200', 'Dynamic AMOLED 2X', 12, 10, 'Android 10', 8, 'Mali-G77 MP11', 'Octa-core', 4000, 700, 1, '2021-01-20 11:54:36', '2021-01-20 11:54:36'),
(112, 'Huawei', 'P20', 'Black', 200, 6, '1080*2240', 'OLED', 40, 24, 'Android 8.1', 6, 'Mali-G72 MP12', 'Octa-core', 4000, 400, 1, '2021-01-20 11:55:03', '2021-01-20 11:55:03'),
(113, 'Samsung', 'Galaxy A31', 'Black', 200, 6.2, '1080*2400', 'Super AMOLED', 48, 20, 'Android 10', 6, 'Mali-G52 MC2', 'Octa-core', 5000, 250, 1, '2021-01-20 16:29:49', '2021-01-21 16:02:24'),
(114, 'Iphone', 'SE', 'White', 190, 5.5, '750*1334', 'Retina IPS LCD', 12, 7, 'iOS 13', 3, 'Apple GPU', 'Hexa-core', 1821, 320, 1, '2021-01-20 16:30:17', '2021-01-21 16:02:50'),
(115, 'Huawei', 'P30', 'Blue', 205, 6, '1080*2340', 'OLED', 40, 32, 'Android 9.0', 8, 'Mali-G76 MP10', 'Octa-core', 4200, 680, 1, '2021-01-20 16:30:34', '2021-01-21 16:03:40'),
(118, 'Xiaomi', 'Redmi Note 10', 'Blue', 220, 6.4, '1080*2400', 'IPS LCD', 48, 16, 'Android 10', 6, 'Mali-G57 MC3', 'Octa-core', 4800, 230, 1, '2021-01-22 09:33:45', '2021-01-22 09:33:45'),
(120, 'Iphone', '6', 'Grey', 190, 4.7, '1080*1800', 'IPS LCD', 8, 4, 'IOS 8', 1, 'Dual-core 1.4 GHz Typhoon', 'PowerVR GX6450', 1810, 200, 1, '2021-01-24 11:55:54', '2021-01-24 11:55:54');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(16, 4, 120, 3, '2021-01-25 14:26:36', '2021-01-25 14:26:36'),
(17, 4, 118, 1, '2021-01-25 14:26:36', '2021-01-25 14:26:36'),
(18, 18, 113, 1, '2021-01-25 17:23:08', '2021-01-25 17:23:08'),
(19, 18, 112, 2, '2021-01-25 17:23:08', '2021-01-25 17:23:08'),
(20, 1, 110, 3, '2021-01-25 18:23:46', '2021-01-25 18:23:46'),
(21, 1, 111, 1, '2021-01-25 18:23:46', '2021-01-25 18:23:46'),
(22, 4, 111, 1, '2021-01-25 18:33:10', '2021-01-25 18:33:10');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `uname`, `email`, `password`, `admin`, `created_at`, `updated_at`) VALUES
(1, 'Norbert', 'Eper', 'epernorbert', 'eper.norbert98@gmail.com', '$2y$10$js2aCT2/Oslw5efXMJKFyOUwgNyfRDvFXkOCDPdn1AcEfSSk9y5Vu', 1, '2020-12-15 19:22:16', NULL),
(4, 'David', 'Eper', 'eperdavid', 'eper.david01@gmail.com', '$2y$10$w.s262yLaSXpb0R.5IqI/.NUjQv1NYlCMbiHiZop2LE6NTd4gt.hy', 0, '2020-12-18 12:19:13', '2021-01-02 15:36:50'),
(17, 'Toth', 'Sandor', 'tothsandor', 'assad@asdsad.sad', '$2y$10$AOqoHFDtGXNs84ivqDFI4u5D2umbyupODJ93xCK/L/6svFiJieQKS', 1, '2020-12-29 18:14:09', '2020-12-29 18:14:48'),
(18, 'Reka', 'Levai', 'levaireka', 'levaireka@gmail.com', '$2y$10$AhBnsZqNsL5T0u6CEoQ38OC2oYEeRsDi7L4PY4cUevAGiEjH.9W0.', 0, '2021-01-04 16:34:09', '2021-01-04 16:34:09'),
(19, 'Robert', 'Eper', 'eperrobert', 'eperrobert@gmail.com', '$2y$10$oyDSKRPKtmjLgLaUI2J/iOCQX/kTy9QM8r0N4ryRU37TjUE/KyBrm', 0, '2021-01-11 17:23:40', '2021-01-11 17:23:40');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billings_user_id_foreign` (`user_id`);

--
-- A tábla indexei `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_mobile_id_foreign` (`mobile_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- A tábla indexei `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_mobile_id_foreign` (`mobile_id`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `mobiles`
--
ALTER TABLE `mobiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mobiles_user_id_foreign` (`user_id`);

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- A tábla indexei `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uname_unique` (`uname`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT a táblához `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT a táblához `mobiles`
--
ALTER TABLE `mobiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `billings`
--
ALTER TABLE `billings`
  ADD CONSTRAINT `billings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_mobile_id_foreign` FOREIGN KEY (`mobile_id`) REFERENCES `mobiles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_mobile_id_foreign` FOREIGN KEY (`mobile_id`) REFERENCES `mobiles` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `mobiles`
--
ALTER TABLE `mobiles`
  ADD CONSTRAINT `mobiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `mobiles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
