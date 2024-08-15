-- Adminer 4.8.1 MySQL 10.4.19-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_reset_tokens_table',	1),
(3,	'2014_10_12_200000_add_two_factor_columns_to_users_table',	1),
(4,	'2019_08_19_000000_create_failed_jobs_table',	1),
(5,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(6,	'2024_08_12_123025_create_sessions_table',	1),
(7,	'2024_08_12_130255_add_column_role_to_users',	1),
(8,	'2024_08_12_133722_create_products_table',	1),
(9,	'2024_08_12_223712_add_column_deleted_at_to_products',	2),
(10,	'2024_08_13_020914_create_transaksi',	3),
(11,	'2024_08_13_020915_create_transaksi_detail',	3),
(15,	'2024_08_13_092929_add_column_image_to_products',	4);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `name`, `price`, `isActive`, `stock`, `created_at`, `updated_at`, `deleted_at`, `image`) VALUES
(1,	'Lampu Pijar 12W',	12000,	0,	0,	NULL,	'2024-08-13 20:34:02',	NULL,	'product_images/sUIBohCFwfCR9nCCaQwGUJg9wrvPVODiRw7mJecb.png'),
(2,	'halo',	12000,	1,	12,	'2024-08-12 15:30:57',	'2024-08-12 15:38:08',	'2024-08-12 15:38:08',	NULL),
(4,	'halo dek',	12000,	0,	0,	'2024-08-12 17:15:41',	'2024-08-14 01:57:55',	NULL,	NULL),
(5,	'Lampu LED Renelux 5w',	20000,	1,	9,	'2024-08-13 02:09:32',	'2024-08-13 20:13:31',	NULL,	NULL),
(6,	'Lampu LED Phillips 5w',	20000,	1,	10,	'2024-08-13 02:09:51',	'2024-08-13 02:09:51',	NULL,	NULL),
(7,	'Lampu LED Welux 12w',	10000,	1,	12,	'2024-08-13 02:10:09',	'2024-08-13 02:10:09',	NULL,	NULL),
(8,	'Sekring',	10000,	1,	10,	'2024-08-13 02:49:34',	'2024-08-13 02:49:34',	NULL,	'product_images/TK9K1wpB22KwLqImBCsK4435tiNT6SB1Qpcu0yy7.png'),
(9,	'Kipas Angin',	50000,	1,	2,	'2024-08-14 00:54:28',	'2024-08-14 00:54:28',	NULL,	'product_images/Ixzy79NYhQ91drm0PsXzZKC8h0VOoiZidgseOLKV.png'),
(10,	'Lampu LED Renelux 10w',	16000,	0,	2,	'2024-08-14 07:57:33',	'2024-08-14 08:03:42',	'2024-08-14 08:03:42',	'product_images/T7cRk9QHNMt5QLOZi3PUk5JUk2DP1QIPQzt2y15q.png'),
(11,	'Lampu LED Welux 20w',	21000,	0,	2,	'2024-08-14 08:02:59',	'2024-08-14 08:03:26',	NULL,	'product_images/7LPF0UIhg2XcHVrd6krrBNgnGNTjgcmhZqyeg2cM.png');

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cUuc0EpMSJUCK34u01mrOHzUptqtYjmAvwIrzc4K',	1,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36',	'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicWZ6Z3VQaE9MZG9QVUd1cmFHSDZLZUxMVENrS2JmcGlpTWVVQ0FQTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zaG9wIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRBZmt0bEdRQmw0NDBvSlA1akF2MzZ1MjZpNGR3cmZFWTVOOU9yRUNMck1Ud3ZXQWVSRzBJcSI7fQ==',	1723647862),
('LI4SXnhOZIofHVcVNWAzD9tedj9rwP2s5Qx46JDu',	NULL,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXQ5dnh1ZW1vejFwa25IT0ZSaW5Oa0duRWNYam1lYzRrbkRrMmZmRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzI6Imh0dHA6Ly85YWNiLTIwMDEtNDQ4YS01MDQwLTQ5NTUtYzExZi0yNzhhLWZkMTUtOGFmMS5uZ3Jvay1mcmVlLmFwcC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1723645781);

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaksi_user_id_foreign` (`user_id`),
  CONSTRAINT `transaksi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `transaksi` (`id`, `user_id`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1,	1,	252000,	'pending',	'2024-08-12 19:48:23',	'2024-08-12 19:48:23'),
(2,	1,	252000,	'pending',	'2024-08-12 19:48:36',	'2024-08-12 19:48:36'),
(3,	1,	252000,	'pending',	'2024-08-12 19:48:53',	'2024-08-12 19:48:53'),
(4,	1,	252000,	'pending',	'2024-08-12 19:49:11',	'2024-08-12 19:49:11'),
(5,	1,	252000,	'pending',	'2024-08-12 19:49:20',	'2024-08-12 19:49:20'),
(6,	1,	252000,	'pending',	'2024-08-12 19:50:07',	'2024-08-12 19:50:07'),
(7,	1,	252000,	'pending',	'2024-08-12 19:56:24',	'2024-08-12 19:56:24'),
(8,	1,	252000,	'pending',	'2024-08-12 20:13:04',	'2024-08-12 20:13:04'),
(9,	1,	24000,	'pending',	'2024-08-12 23:40:25',	'2024-08-12 23:40:25'),
(10,	1,	24000,	'pending',	'2024-08-12 23:44:26',	'2024-08-12 23:44:26'),
(11,	1,	24000,	'pending',	'2024-08-13 18:58:42',	'2024-08-13 18:58:42'),
(12,	1,	120000,	'settlement',	'2024-08-13 19:14:17',	'2024-08-13 19:14:41'),
(13,	1,	152000,	'settlement',	'2024-08-13 20:12:16',	'2024-08-13 20:13:31'),
(14,	1,	12000,	'settlement',	'2024-08-13 20:14:32',	'2024-08-13 20:14:48'),
(15,	1,	96000,	'settlement',	'2024-08-13 20:33:44',	'2024-08-13 20:34:02');

DROP TABLE IF EXISTS `transaksi_detail`;
CREATE TABLE `transaksi_detail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `transaksi_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaksi_detail_transaksi_id_foreign` (`transaksi_id`),
  KEY `transaksi_detail_product_id_foreign` (`product_id`),
  CONSTRAINT `transaksi_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `transaksi_detail_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `transaksi_detail` (`id`, `transaksi_id`, `product_id`, `quantity`, `price`, `sub_total`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	20,	12000,	240000,	'2024-08-12 19:48:23',	'2024-08-12 19:48:23'),
(2,	1,	4,	1,	12000,	12000,	'2024-08-12 19:48:23',	'2024-08-12 19:48:23'),
(3,	2,	1,	20,	12000,	240000,	'2024-08-12 19:48:36',	'2024-08-12 19:48:36'),
(4,	2,	4,	1,	12000,	12000,	'2024-08-12 19:48:36',	'2024-08-12 19:48:36'),
(5,	3,	1,	20,	12000,	240000,	'2024-08-12 19:48:53',	'2024-08-12 19:48:53'),
(6,	3,	4,	1,	12000,	12000,	'2024-08-12 19:48:53',	'2024-08-12 19:48:53'),
(7,	4,	1,	20,	12000,	240000,	'2024-08-12 19:49:11',	'2024-08-12 19:49:11'),
(8,	4,	4,	1,	12000,	12000,	'2024-08-12 19:49:11',	'2024-08-12 19:49:11'),
(9,	5,	1,	20,	12000,	240000,	'2024-08-12 19:49:20',	'2024-08-12 19:49:20'),
(10,	5,	4,	1,	12000,	12000,	'2024-08-12 19:49:20',	'2024-08-12 19:49:20'),
(11,	6,	1,	20,	12000,	240000,	'2024-08-12 19:50:07',	'2024-08-12 19:50:07'),
(12,	6,	4,	1,	12000,	12000,	'2024-08-12 19:50:07',	'2024-08-12 19:50:07'),
(13,	7,	1,	20,	12000,	240000,	'2024-08-12 19:56:24',	'2024-08-12 19:56:24'),
(14,	7,	4,	1,	12000,	12000,	'2024-08-12 19:56:24',	'2024-08-12 19:56:24'),
(15,	8,	1,	20,	12000,	240000,	'2024-08-12 20:13:04',	'2024-08-12 20:13:04'),
(16,	8,	4,	1,	12000,	12000,	'2024-08-12 20:13:04',	'2024-08-12 20:13:04'),
(17,	9,	1,	2,	12000,	24000,	'2024-08-12 23:40:25',	'2024-08-12 23:40:25'),
(18,	10,	1,	2,	12000,	24000,	'2024-08-12 23:44:26',	'2024-08-12 23:44:26'),
(19,	11,	4,	1,	12000,	12000,	'2024-08-13 18:58:42',	'2024-08-13 18:58:42'),
(20,	11,	1,	1,	12000,	12000,	'2024-08-13 18:58:42',	'2024-08-13 18:58:42'),
(21,	12,	4,	10,	12000,	120000,	'2024-08-13 19:14:17',	'2024-08-13 19:14:17'),
(22,	13,	1,	10,	12000,	120000,	'2024-08-13 20:12:16',	'2024-08-13 20:12:16'),
(23,	13,	4,	1,	12000,	12000,	'2024-08-13 20:12:16',	'2024-08-13 20:12:16'),
(24,	13,	5,	1,	20000,	20000,	'2024-08-13 20:12:16',	'2024-08-13 20:12:16'),
(25,	14,	1,	1,	12000,	12000,	'2024-08-13 20:14:32',	'2024-08-13 20:14:32'),
(26,	15,	1,	8,	12000,	96000,	'2024-08-13 20:33:44',	'2024-08-13 20:33:44');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1,	'wildan',	'wildan@gmail.com',	NULL,	'$2y$10$AfktlGQBl440oJP5jAv36u26i4dwrfEY5N9OrECLrMTwvWAeRG0Iq',	'admin',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-08-12 06:54:52',	'2024-08-12 06:54:52'),
(2,	'maul',	'maul123@gmail.com',	NULL,	'$2y$10$8YorJougMgJ21zlUmoVWL.G5yVLeAWCiV906Z4ZwUNfKfiguDmQUK',	'user',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-08-13 21:07:11',	'2024-08-13 21:07:11');

-- 2024-08-15 00:11:47
