-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Чрв 10 2021 р., 02:42
-- Версія сервера: 8.0.19
-- Версія PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `ials`
--

-- --------------------------------------------------------

--
-- Структура таблиці `contact_forms`
--

CREATE TABLE `contact_forms` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `contact_forms`
--

INSERT INTO `contact_forms` (`id`, `status`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 0, 'admin', 'admin', 'asdasd', '2021-06-08 22:32:50', '2021-06-08 22:32:50');

-- --------------------------------------------------------

--
-- Структура таблиці `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `image_carousels`
--

CREATE TABLE `image_carousels` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` tinyint NOT NULL DEFAULT '0',
  `items` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `image_carousels`
--

INSERT INTO `image_carousels` (`id`, `key`, `title`, `description`, `status`, `items`, `created_at`, `updated_at`) VALUES
(1, 'gallery1', 'gallery1', 'gallery1', 1, '[{\"url\": null, \"image\": \"http://ial/storage/photos/1/carousel1.jpg\", \"alt_de\": null, \"alt_en\": null}, {\"url\": null, \"image\": \"http://ial/storage/photos/1/carousel2.jpg\", \"alt_de\": null, \"alt_en\": null}, {\"url\": null, \"image\": \"http://ial/storage/photos/1/carousel3.jpg\", \"alt_de\": null, \"alt_en\": null}, {\"url\": null, \"image\": \"http://ial/storage/photos/1/carousel4.jpg\", \"alt_de\": null, \"alt_en\": null}, {\"url\": null, \"image\": \"http://ial/storage/photos/1/carousel5.jpg\", \"alt_de\": null, \"alt_en\": null}]', '2021-06-08 22:29:19', '2021-06-08 22:29:19');

-- --------------------------------------------------------

--
-- Структура таблиці `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_03_18_121446_create_suppliers_table', 2),
(6, '2021_03_18_235213_create_payments_table', 2),
(7, '2021_03_19_002408_create_orders_table', 2),
(8, '2021_03_19_213700_create_product_categories_table', 2),
(9, '2021_03_19_213833_create_products_table', 2),
(10, '2021_03_29_122939_create_order_products_table', 2),
(11, '2021_03_29_225704_create_contact_forms_table', 2),
(12, '2021_04_04_203604_create_translations_table', 2),
(13, '2021_04_05_193751_create_image_carousels_table', 2),
(14, '2021_06_08_173900_create_permission_tables', 3);

-- --------------------------------------------------------

--
-- Структура таблиці `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Структура таблиці `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `payment_id` bigint UNSIGNED NOT NULL,
  `user_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `user_comment`, `manager_comment`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, NULL, '2021-06-09 12:23:07', '2021-06-09 12:23:07'),
(2, 1, 4, 'e2e', NULL, '2021-06-09 12:42:59', '2021-06-09 12:42:59'),
(3, 1, 4, 'e2e', NULL, '2021-06-09 12:45:38', '2021-06-09 12:45:38'),
(4, 1, 4, NULL, NULL, '2021-06-09 12:47:42', '2021-06-09 12:47:42'),
(5, 1, 4, NULL, NULL, '2021-06-09 13:15:22', '2021-06-09 13:15:22'),
(6, 1, 4, NULL, NULL, '2021-06-09 13:19:36', '2021-06-09 13:19:36'),
(7, 1, 4, NULL, NULL, '2021-06-09 13:22:52', '2021-06-09 13:22:52'),
(8, 1, 4, NULL, NULL, '2021-06-09 13:23:23', '2021-06-09 13:23:23'),
(9, 1, 4, NULL, NULL, '2021-06-09 13:24:12', '2021-06-09 13:24:12'),
(10, 1, 4, NULL, NULL, '2021-06-09 13:24:33', '2021-06-09 13:24:33'),
(11, 1, 4, NULL, NULL, '2021-06-09 13:24:58', '2021-06-09 13:24:58'),
(12, 1, 4, NULL, NULL, '2021-06-09 13:25:17', '2021-06-09 13:25:17'),
(13, 1, 4, NULL, NULL, '2021-06-09 13:25:21', '2021-06-09 13:25:21'),
(14, 1, 4, NULL, NULL, '2021-06-09 13:25:48', '2021-06-09 13:25:48'),
(15, 1, 4, NULL, NULL, '2021-06-09 13:26:19', '2021-06-09 13:26:19'),
(16, 1, 4, NULL, NULL, '2021-06-09 13:26:24', '2021-06-09 13:26:24'),
(17, 1, 4, NULL, NULL, '2021-06-09 13:26:40', '2021-06-09 13:26:40'),
(18, 1, 4, NULL, NULL, '2021-06-09 13:26:58', '2021-06-09 13:26:58'),
(19, 1, 4, NULL, NULL, '2021-06-09 13:27:03', '2021-06-09 13:27:03'),
(20, 1, 4, NULL, NULL, '2021-06-09 13:27:26', '2021-06-09 13:27:26'),
(21, 1, 4, NULL, NULL, '2021-06-09 13:27:36', '2021-06-09 13:27:36'),
(22, 1, 4, NULL, NULL, '2021-06-09 13:33:36', '2021-06-09 13:33:36'),
(23, 1, 4, NULL, NULL, '2021-06-09 21:40:23', '2021-06-09 21:40:23');

-- --------------------------------------------------------

--
-- Структура таблиці `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `title`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 113, 'Dr. Daisy Wunsch V', '1.99', 3, '2021-06-09 12:23:07', '2021-06-09 12:23:07'),
(2, 1, 205, 'Evert Flatley', '1.99', 8, '2021-06-09 12:23:07', '2021-06-09 12:23:07'),
(3, 2, 90, 'Sydnie Erdman', '1.99', 11, '2021-06-09 12:42:59', '2021-06-09 12:42:59'),
(4, 3, 90, 'Sydnie Erdman', '1.99', 11, '2021-06-09 12:45:38', '2021-06-09 12:45:38'),
(5, 4, 7, 'Nolan Wehner', '1.99', 1, '2021-06-09 12:47:42', '2021-06-09 12:47:42'),
(6, 5, 113, 'Dr. Daisy Wunsch V', '1.99', 1, '2021-06-09 13:15:22', '2021-06-09 13:15:22'),
(7, 6, 113, 'Dr. Daisy Wunsch V', '1.99', 1, '2021-06-09 13:19:36', '2021-06-09 13:19:36'),
(8, 7, 113, 'Dr. Daisy Wunsch V', '1.99', 1, '2021-06-09 13:22:52', '2021-06-09 13:22:52'),
(9, 8, 113, 'Dr. Daisy Wunsch V', '1.99', 1, '2021-06-09 13:23:23', '2021-06-09 13:23:23'),
(10, 9, 113, 'Dr. Daisy Wunsch V', '1.99', 1, '2021-06-09 13:24:12', '2021-06-09 13:24:12'),
(11, 10, 113, 'Dr. Daisy Wunsch V', '1.99', 1, '2021-06-09 13:24:33', '2021-06-09 13:24:33'),
(12, 11, 113, 'Dr. Daisy Wunsch V', '1.99', 1, '2021-06-09 13:24:58', '2021-06-09 13:24:58'),
(13, 12, 113, 'Dr. Daisy Wunsch V', '1.99', 1, '2021-06-09 13:25:17', '2021-06-09 13:25:17'),
(14, 13, 113, 'Dr. Daisy Wunsch V', '1.99', 1, '2021-06-09 13:25:21', '2021-06-09 13:25:21'),
(15, 14, 113, 'Dr. Daisy Wunsch V', '1.99', 1, '2021-06-09 13:25:48', '2021-06-09 13:25:48'),
(16, 15, 113, 'Dr. Daisy Wunsch V', '1.99', 1, '2021-06-09 13:26:19', '2021-06-09 13:26:19'),
(17, 16, 113, 'Dr. Daisy Wunsch V', '1.99', 1, '2021-06-09 13:26:24', '2021-06-09 13:26:24'),
(18, 17, 113, 'Dr. Daisy Wunsch V', '1.99', 1, '2021-06-09 13:26:41', '2021-06-09 13:26:41'),
(19, 18, 113, 'Dr. Daisy Wunsch V', '1.99', 1, '2021-06-09 13:26:58', '2021-06-09 13:26:58'),
(20, 19, 113, 'Dr. Daisy Wunsch V', '1.99', 1, '2021-06-09 13:27:03', '2021-06-09 13:27:03'),
(21, 20, 113, 'Dr. Daisy Wunsch V', '1.99', 1, '2021-06-09 13:27:26', '2021-06-09 13:27:26'),
(22, 21, 113, 'Dr. Daisy Wunsch V', '1.99', 1, '2021-06-09 13:27:36', '2021-06-09 13:27:36'),
(23, 22, 205, 'Evert Flatley', '1.99', 1, '2021-06-09 13:33:36', '2021-06-09 13:33:36'),
(24, 23, 134, 'Reta Schmidt', '1.99', 1, '2021-06-09 21:40:23', '2021-06-09 21:40:23'),
(25, 23, 108, 'Marie Hettinger Jr.', '1.99', 1, '2021-06-09 21:40:23', '2021-06-09 21:40:23'),
(26, 23, 205, 'Evert Flatley', '1.99', 3, '2021-06-09 21:40:23', '2021-06-09 21:40:23');

-- --------------------------------------------------------

--
-- Структура таблиці `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `payments`
--

INSERT INTO `payments` (`id`, `created_at`, `updated_at`) VALUES
(1, '2021-06-08 21:54:58', '2021-06-08 21:54:58'),
(2, '2021-06-08 21:55:12', '2021-06-08 21:55:12'),
(3, '2021-06-08 21:56:13', '2021-06-08 21:56:13'),
(4, '2021-06-08 21:56:33', '2021-06-08 21:56:33');

-- --------------------------------------------------------

--
-- Структура таблиці `payment_translations`
--

CREATE TABLE `payment_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `payment_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `payment_translations`
--

INSERT INTO `payment_translations` (`id`, `payment_id`, `title`, `description`, `locale`) VALUES
(1, 1, 'Paypal', NULL, 'en'),
(2, 2, 'MasterCard', NULL, 'en'),
(3, 3, 'AmericanExpress', NULL, 'en'),
(4, 4, 'VISA', NULL, 'en'),
(5, 1, 'Paypal', NULL, 'de'),
(6, 2, 'MasterCard', NULL, 'de'),
(7, 3, 'AmericanExpress', NULL, 'de'),
(8, 4, 'VISA', NULL, 'de');

-- --------------------------------------------------------

--
-- Структура таблиці `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role_edit', 'web', '2021-06-08 21:35:27', '2021-06-08 21:35:27'),
(2, 'role_create', 'web', '2021-06-08 21:35:51', '2021-06-08 21:35:51'),
(3, 'role_show', 'web', '2021-06-08 21:35:59', '2021-06-08 21:35:59'),
(4, 'role_delete', 'web', '2021-06-08 21:36:09', '2021-06-08 21:36:09'),
(5, 'role_access', 'web', '2021-06-08 21:36:20', '2021-06-08 21:36:20'),
(6, 'user_edit', 'web', '2021-06-08 21:36:37', '2021-06-08 21:36:37'),
(7, 'user_create', 'web', '2021-06-08 21:36:49', '2021-06-08 21:36:49'),
(8, 'user_delete', 'web', '2021-06-08 21:36:56', '2021-06-08 21:36:56'),
(9, 'user_show', 'web', '2021-06-08 21:37:01', '2021-06-08 21:37:01'),
(10, 'user_access', 'web', '2021-06-08 21:37:06', '2021-06-08 21:37:06'),
(11, 'product_access', 'web', '2021-06-08 21:37:35', '2021-06-08 21:37:35'),
(12, 'product_create', 'web', '2021-06-08 21:37:50', '2021-06-08 21:37:50'),
(13, 'product_edit', 'web', '2021-06-08 21:38:01', '2021-06-08 21:38:01'),
(14, 'product_show', 'web', '2021-06-08 21:38:12', '2021-06-08 21:38:12'),
(15, 'product_delete', 'web', '2021-06-08 21:38:23', '2021-06-08 21:38:23'),
(16, 'product_category_access', 'web', '2021-06-08 21:38:44', '2021-06-08 21:38:44'),
(17, 'product_category_create', 'web', '2021-06-08 21:38:54', '2021-06-08 21:38:54'),
(18, 'product_category_edit', 'web', '2021-06-08 21:39:03', '2021-06-08 21:39:03'),
(19, 'product_category_show', 'web', '2021-06-08 21:39:13', '2021-06-08 21:39:13'),
(20, 'product_category_delete', 'web', '2021-06-08 21:39:21', '2021-06-08 21:39:21'),
(21, 'supplier_access', 'web', '2021-06-08 21:39:28', '2021-06-08 21:39:28'),
(22, 'supplier_create', 'web', '2021-06-08 21:39:34', '2021-06-08 21:39:34'),
(23, 'supplier_delete', 'web', '2021-06-08 21:39:40', '2021-06-08 21:39:40'),
(24, 'supplier_edit', 'web', '2021-06-08 21:39:45', '2021-06-08 21:39:45'),
(25, 'supplier_show', 'web', '2021-06-08 21:39:52', '2021-06-08 21:39:52'),
(26, 'permission_create', 'web', '2021-06-08 21:40:07', '2021-06-08 21:40:07'),
(27, 'permission_delete', 'web', '2021-06-08 21:40:13', '2021-06-08 21:40:13'),
(28, 'permission_show', 'web', '2021-06-08 21:40:19', '2021-06-08 21:40:19'),
(29, 'permission_access', 'web', '2021-06-08 21:40:26', '2021-06-08 21:40:26'),
(30, 'permission_edit', 'web', '2021-06-08 21:40:32', '2021-06-08 21:40:32'),
(31, 'order_access', 'web', '2021-06-08 21:40:39', '2021-06-08 21:40:39'),
(32, 'order_create', 'web', '2021-06-08 21:40:45', '2021-06-08 21:40:45'),
(33, 'order_delete', 'web', '2021-06-08 21:40:51', '2021-06-08 21:40:51'),
(34, 'order_show', 'web', '2021-06-08 21:40:58', '2021-06-08 21:40:58'),
(35, 'form_access', 'web', '2021-06-08 21:41:31', '2021-06-08 21:41:31'),
(36, 'contact-form_create', 'web', '2021-06-08 21:41:38', '2021-06-08 21:41:38'),
(37, 'contact-form_delete', 'web', '2021-06-08 21:41:43', '2021-06-08 21:41:43'),
(38, 'contact-form_edit', 'web', '2021-06-08 21:41:50', '2021-06-08 21:41:50'),
(39, 'contact-form_show', 'web', '2021-06-08 21:41:55', '2021-06-08 21:41:55'),
(40, 'admin-access', 'web', '2021-06-08 21:42:03', '2021-06-08 21:42:03'),
(41, 'manager_access', 'web', NULL, NULL),
(42, 'translation_create', 'web', '2021-06-09 15:18:48', '2021-06-09 15:18:48'),
(43, 'translation_edit', 'web', '2021-06-09 15:18:56', '2021-06-09 15:18:56');

-- --------------------------------------------------------

--
-- Структура таблиці `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '/storage/photos/1/no_image.png',
  `sort` int NOT NULL DEFAULT '0',
  `product_category_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `products`
--

INSERT INTO `products` (`id`, `image`, `sort`, `product_category_id`, `supplier_id`, `price`, `slug`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, '/storage/photos/1/sushi.png', 226, 4, 1, 1.99, 'ayana-walsh', 'Ayana Walsh', 1, '2021-06-08 22:00:10', '2021-06-08 22:00:10'),
(2, '/storage/photos/1/sushi.png', 327, 2, 20, 1.99, 'mr-mason-parisian', 'Mr. Mason Parisian', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(3, '/storage/photos/1/sushi.png', 118, 4, 10, 1.99, 'german-kshlerin', 'German Kshlerin', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(4, '/storage/photos/1/sushi.png', 216, 4, 11, 1.99, 'scottie-rath', 'Scottie Rath', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(5, '/storage/photos/1/sushi.png', 74, 4, 17, 1.99, 'joesph-schmitt-iv', 'Joesph Schmitt IV', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(6, '/storage/photos/1/sushi.png', 13, 1, 3, 1.99, 'lionel-hill-iv', 'Lionel Hill IV', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(7, '/storage/photos/1/sushi.png', 64, 1, 1, 1.99, 'nolan-wehner', 'Nolan Wehner', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(8, '/storage/photos/1/sushi.png', 297, 1, 12, 1.99, 'beryl-mertz', 'Beryl Mertz', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(9, '/storage/photos/1/sushi.png', 243, 3, 18, 1.99, 'meghan-willms', 'Meghan Willms', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(10, '/storage/photos/1/sushi.png', 77, 3, 7, 1.99, 'gordon-jacobi', 'Gordon Jacobi', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(11, '/storage/photos/1/sushi.png', 110, 5, 23, 1.99, 'dr-caesar-wolf-ii', 'Dr. Caesar Wolf II', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(12, '/storage/photos/1/sushi.png', 27, 1, 4, 1.99, 'naomi-fritsch-jr', 'Naomi Fritsch Jr.', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(13, '/storage/photos/1/sushi.png', 324, 3, 16, 1.99, 'mr-elmo-mcclure', 'Mr. Elmo McClure', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(14, '/storage/photos/1/sushi.png', 280, 5, 9, 1.99, 'daphne-smitham', 'Daphne Smitham', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(15, '/storage/photos/1/sushi.png', 307, 5, 14, 1.99, 'carolina-daugherty', 'Carolina Daugherty', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(16, '/storage/photos/1/sushi.png', 6, 2, 5, 1.99, 'hilbert-cremin-sr', 'Hilbert Cremin Sr.', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(17, '/storage/photos/1/sushi.png', 107, 4, 13, 1.99, 'prof-albertha-reilly', 'Prof. Albertha Reilly', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(18, '/storage/photos/1/sushi.png', 299, 1, 16, 1.99, 'candelario-trantow', 'Candelario Trantow', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(19, '/storage/photos/1/sushi.png', 209, 1, 11, 1.99, 'dr-rebecca-tillman', 'Dr. Rebecca Tillman', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(20, '/storage/photos/1/sushi.png', 43, 3, 21, 1.99, 'brain-blick', 'Brain Blick', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(21, '/storage/photos/1/sushi.png', 201, 4, 16, 1.99, 'dr-tania-bartoletti', 'Dr. Tania Bartoletti', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(22, '/storage/photos/1/sushi.png', 145, 1, 17, 1.99, 'prof-lori-wunsch-phd', 'Prof. Lori Wunsch PhD', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(23, '/storage/photos/1/sushi.png', 251, 4, 9, 1.99, 'lavinia-mayert', 'Lavinia Mayert', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(24, '/storage/photos/1/sushi.png', 259, 2, 18, 1.99, 'jasmin-walker-i', 'Jasmin Walker I', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(25, '/storage/photos/1/sushi.png', 205, 3, 1, 1.99, 'adriel-bernier-sr', 'Adriel Bernier Sr.', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(26, '/storage/photos/1/sushi.png', 29, 1, 13, 1.99, 'vincent-kessler', 'Vincent Kessler', 1, '2021-06-08 22:00:11', '2021-06-08 22:00:11'),
(27, '/storage/photos/1/sushi.png', 349, 2, 4, 1.99, 'dr-cayla-runte', 'Dr. Cayla Runte', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(28, '/storage/photos/1/sushi.png', 38, 3, 6, 1.99, 'gilda-altenwerth-phd', 'Gilda Altenwerth PhD', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(29, '/storage/photos/1/sushi.png', 158, 2, 9, 1.99, 'orion-johnston', 'Orion Johnston', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(30, '/storage/photos/1/sushi.png', 153, 2, 7, 1.99, 'rupert-watsica', 'Rupert Watsica', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(31, '/storage/photos/1/sushi.png', 203, 2, 2, 1.99, 'elnora-lebsack', 'Elnora Lebsack', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(32, '/storage/photos/1/sushi.png', 83, 3, 12, 1.99, 'mr-sedrick-davis', 'Mr. Sedrick Davis', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(33, '/storage/photos/1/sushi.png', 285, 1, 16, 1.99, 'lindsay-dicki', 'Lindsay Dicki', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(34, '/storage/photos/1/sushi.png', 86, 5, 7, 1.99, 'eva-hirthe-dvm', 'Eva Hirthe DVM', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(35, '/storage/photos/1/sushi.png', 321, 2, 20, 1.99, 'dr-ross-hansen-jr', 'Dr. Ross Hansen Jr.', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(36, '/storage/photos/1/sushi.png', 109, 4, 9, 1.99, 'jedidiah-armstrong', 'Jedidiah Armstrong', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(37, '/storage/photos/1/sushi.png', 188, 4, 12, 1.99, 'demarco-carter-iv', 'Demarco Carter IV', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(38, '/storage/photos/1/sushi.png', 52, 2, 11, 1.99, 'roel-sanford', 'Roel Sanford', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(39, '/storage/photos/1/sushi.png', 212, 1, 17, 1.99, 'uriel-runte', 'Uriel Runte', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(40, '/storage/photos/1/sushi.png', 144, 2, 4, 1.99, 'laurianne-huels-ii', 'Laurianne Huels II', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(41, '/storage/photos/1/sushi.png', 312, 1, 16, 1.99, 'bonnie-rodriguez', 'Bonnie Rodriguez', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(42, '/storage/photos/1/sushi.png', 284, 3, 13, 1.99, 'vivienne-kohler', 'Vivienne Kohler', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(43, '/storage/photos/1/sushi.png', 5, 2, 7, 1.99, 'prof-ali-batz-md', 'Prof. Ali Batz MD', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(44, '/storage/photos/1/sushi.png', 304, 5, 7, 1.99, 'mrs-leatha-shanahan-v', 'Mrs. Leatha Shanahan V', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(45, '/storage/photos/1/sushi.png', 12, 2, 21, 1.99, 'uriah-friesen', 'Uriah Friesen', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(46, '/storage/photos/1/sushi.png', 112, 3, 22, 1.99, 'gaylord-hessel', 'Gaylord Hessel', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(47, '/storage/photos/1/sushi.png', 261, 4, 16, 1.99, 'jayme-wisoky', 'Jayme Wisoky', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(48, '/storage/photos/1/sushi.png', 47, 5, 13, 1.99, 'thurman-yundt', 'Thurman Yundt', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(49, '/storage/photos/1/sushi.png', 268, 1, 12, 1.99, 'dana-sipes', 'Dana Sipes', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(50, '/storage/photos/1/sushi.png', 269, 3, 16, 1.99, 'letha-smith', 'Letha Smith', 1, '2021-06-08 22:00:12', '2021-06-08 22:00:12'),
(51, '/storage/photos/1/sushi2.jpg', 167, 4, 23, 1.99, 'otilia-schamberger', 'Otilia Schamberger', 1, '2021-06-08 22:01:14', '2021-06-08 22:01:14'),
(52, '/storage/photos/1/sushi2.jpg', 271, 5, 4, 1.99, 'justina-dubuque', 'Justina DuBuque', 1, '2021-06-08 22:01:14', '2021-06-08 22:01:14'),
(53, '/storage/photos/1/sushi2.jpg', 69, 5, 22, 1.99, 'schuyler-o-hara', 'Schuyler O\'Hara', 1, '2021-06-08 22:01:14', '2021-06-08 22:01:14'),
(54, '/storage/photos/1/sushi2.jpg', 50, 2, 2, 1.99, 'dr-elliott-jacobs', 'Dr. Elliott Jacobs', 1, '2021-06-08 22:01:14', '2021-06-08 22:01:14'),
(55, '/storage/photos/1/sushi2.jpg', 150, 3, 19, 1.99, 'ole-dach', 'Ole Dach', 1, '2021-06-08 22:01:14', '2021-06-08 22:01:14'),
(56, '/storage/photos/1/sushi2.jpg', 112, 5, 11, 1.99, 'cassandra-williamson', 'Cassandra Williamson', 1, '2021-06-08 22:01:14', '2021-06-08 22:01:14'),
(57, '/storage/photos/1/sushi2.jpg', 339, 4, 17, 1.99, 'lessie-hegmann', 'Lessie Hegmann', 1, '2021-06-08 22:01:14', '2021-06-08 22:01:14'),
(58, '/storage/photos/1/sushi2.jpg', 254, 2, 12, 1.99, 'orlando-kling', 'Orlando Kling', 1, '2021-06-08 22:01:14', '2021-06-08 22:01:14'),
(59, '/storage/photos/1/sushi2.jpg', 65, 2, 15, 1.99, 'amaya-lowe', 'Amaya Lowe', 1, '2021-06-08 22:01:14', '2021-06-08 22:01:14'),
(60, '/storage/photos/1/sushi2.jpg', 90, 1, 18, 1.99, 'miss-myrtie-hills-ii', 'Miss Myrtie Hills II', 1, '2021-06-08 22:01:14', '2021-06-08 22:01:14'),
(61, '/storage/photos/1/sushi2.jpg', 76, 1, 6, 1.99, 'jasper-durgan', 'Jasper Durgan', 1, '2021-06-08 22:01:14', '2021-06-08 22:01:14'),
(62, '/storage/photos/1/sushi2.jpg', 270, 4, 2, 1.99, 'ms-phyllis-king-phd', 'Ms. Phyllis King PhD', 1, '2021-06-08 22:01:14', '2021-06-08 22:01:14'),
(63, '/storage/photos/1/sushi2.jpg', 137, 3, 6, 1.99, 'sage-weber', 'Sage Weber', 1, '2021-06-08 22:01:14', '2021-06-08 22:01:14'),
(64, '/storage/photos/1/sushi2.jpg', 219, 2, 19, 1.99, 'dr-jose-thiel', 'Dr. Jose Thiel', 1, '2021-06-08 22:01:14', '2021-06-08 22:01:14'),
(65, '/storage/photos/1/sushi2.jpg', 172, 3, 1, 1.99, 'darlene-bernier', 'Darlene Bernier', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(66, '/storage/photos/1/sushi2.jpg', 89, 3, 8, 1.99, 'prof-bella-larson-v', 'Prof. Bella Larson V', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(67, '/storage/photos/1/sushi2.jpg', 83, 3, 17, 1.99, 'angeline-runolfsson-iv', 'Angeline Runolfsson IV', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(68, '/storage/photos/1/sushi2.jpg', 304, 3, 1, 1.99, 'nelda-stroman', 'Nelda Stroman', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(69, '/storage/photos/1/sushi2.jpg', 95, 5, 18, 1.99, 'dr-alexzander-oberbrunner', 'Dr. Alexzander Oberbrunner', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(70, '/storage/photos/1/sushi2.jpg', 111, 1, 3, 1.99, 'ms-felicita-wilderman-iii', 'Ms. Felicita Wilderman III', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(71, '/storage/photos/1/sushi2.jpg', 344, 3, 9, 1.99, 'eleazar-durgan-jr', 'Eleazar Durgan Jr.', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(72, '/storage/photos/1/sushi2.jpg', 34, 5, 3, 1.99, 'mrs-jadyn-schulist-iii', 'Mrs. Jadyn Schulist III', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(73, '/storage/photos/1/sushi2.jpg', 108, 2, 3, 1.99, 'victor-schuster', 'Victor Schuster', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(74, '/storage/photos/1/sushi2.jpg', 197, 5, 2, 1.99, 'kyleigh-conn', 'Kyleigh Conn', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(75, '/storage/photos/1/sushi2.jpg', 29, 2, 19, 1.99, 'prof-alfred-pacocha', 'Prof. Alfred Pacocha', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(76, '/storage/photos/1/sushi2.jpg', 51, 2, 20, 1.99, 'antonietta-kemmer', 'Antonietta Kemmer', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(77, '/storage/photos/1/sushi2.jpg', 241, 4, 23, 1.99, 'dr-ashton-yundt', 'Dr. Ashton Yundt', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(78, '/storage/photos/1/sushi2.jpg', 193, 5, 13, 1.99, 'mr-cristopher-kris-jr', 'Mr. Cristopher Kris Jr.', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(79, '/storage/photos/1/sushi2.jpg', 44, 5, 11, 1.99, 'mr-jack-tillman', 'Mr. Jack Tillman', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(80, '/storage/photos/1/sushi2.jpg', 182, 1, 21, 1.99, 'kareem-grant', 'Kareem Grant', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(81, '/storage/photos/1/sushi2.jpg', 10, 1, 12, 1.99, 'spencer-reilly', 'Spencer Reilly', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(82, '/storage/photos/1/sushi2.jpg', 338, 3, 3, 1.99, 'lillie-gibson', 'Lillie Gibson', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(83, '/storage/photos/1/sushi2.jpg', 58, 3, 22, 1.99, 'yvette-pagac', 'Yvette Pagac', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(84, '/storage/photos/1/sushi2.jpg', 234, 3, 15, 1.99, 'della-bogan', 'Della Bogan', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(85, '/storage/photos/1/sushi2.jpg', 287, 4, 6, 1.99, 'raina-mohr-dds', 'Raina Mohr DDS', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(86, '/storage/photos/1/sushi2.jpg', 195, 5, 13, 1.99, 'leda-ortiz', 'Leda Ortiz', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(87, '/storage/photos/1/sushi2.jpg', 46, 1, 20, 1.99, 'norval-spencer', 'Norval Spencer', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(88, '/storage/photos/1/sushi2.jpg', 260, 3, 11, 1.99, 'prof-stanford-jenkins-phd', 'Prof. Stanford Jenkins PhD', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(89, '/storage/photos/1/sushi2.jpg', 230, 1, 10, 1.99, 'maybelle-crist', 'Maybelle Crist', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(90, '/storage/photos/1/sushi2.jpg', 346, 4, 1, 1.99, 'sydnie-erdman', 'Sydnie Erdman', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(91, '/storage/photos/1/sushi2.jpg', 216, 4, 2, 1.99, 'bonnie-bruen', 'Bonnie Bruen', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(92, '/storage/photos/1/sushi2.jpg', 82, 4, 23, 1.99, 'marta-collier', 'Marta Collier', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(93, '/storage/photos/1/sushi2.jpg', 2, 5, 20, 1.99, 'winona-mueller', 'Winona Mueller', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(94, '/storage/photos/1/sushi2.jpg', 48, 1, 11, 1.99, 'dr-brook-mohr', 'Dr. Brook Mohr', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(95, '/storage/photos/1/sushi2.jpg', 245, 3, 21, 1.99, 'dr-kiel-breitenberg-md', 'Dr. Kiel Breitenberg MD', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(96, '/storage/photos/1/sushi2.jpg', 327, 1, 8, 1.99, 'mason-becker', 'Mason Becker', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(97, '/storage/photos/1/sushi2.jpg', 158, 3, 14, 1.99, 'jerome-huels', 'Jerome Huels', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(98, '/storage/photos/1/sushi2.jpg', 217, 1, 16, 1.99, 'prof-federico-sawayn', 'Prof. Federico Sawayn', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(99, '/storage/photos/1/sushi2.jpg', 174, 1, 15, 1.99, 'halie-powlowski', 'Halie Powlowski', 1, '2021-06-08 22:01:15', '2021-06-08 22:01:15'),
(100, '/storage/photos/1/sushi2.jpg', 311, 3, 7, 1.99, 'prof-sienna-funk', 'Prof. Sienna Funk', 1, '2021-06-08 22:01:16', '2021-06-08 22:01:16'),
(101, '/storage/photos/1/pizza_assorti.jpg', 1, 3, 2, 1.99, 'dr-jace-gaylord', 'Dr. Jace Gaylord', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(102, '/storage/photos/1/pizza_assorti.jpg', 328, 5, 14, 1.99, 'reagan-sanford', 'Reagan Sanford', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(103, '/storage/photos/1/pizza_assorti.jpg', 156, 5, 13, 1.99, 'jett-dickinson-iii', 'Jett Dickinson III', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(104, '/storage/photos/1/pizza_assorti.jpg', 265, 4, 1, 1.99, 'austen-walker', 'Austen Walker', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(105, '/storage/photos/1/pizza_assorti.jpg', 318, 2, 18, 1.99, 'kayla-fay-iv', 'Kayla Fay IV', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(106, '/storage/photos/1/pizza_assorti.jpg', 339, 4, 21, 1.99, 'prof-garth-botsford-dvm', 'Prof. Garth Botsford DVM', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(107, '/storage/photos/1/pizza_assorti.jpg', 216, 1, 19, 1.99, 'natalia-botsford', 'Natalia Botsford', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(108, '/storage/photos/1/pizza_assorti.jpg', 334, 4, 5, 1.99, 'marie-hettinger-jr', 'Marie Hettinger Jr.', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(109, '/storage/photos/1/pizza_assorti.jpg', 346, 4, 15, 1.99, 'maudie-bradtke', 'Maudie Bradtke', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(110, '/storage/photos/1/pizza_assorti.jpg', 269, 1, 10, 1.99, 'leatha-gulgowski', 'Leatha Gulgowski', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(111, '/storage/photos/1/pizza_assorti.jpg', 210, 3, 22, 1.99, 'deshaun-quitzon', 'Deshaun Quitzon', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(112, '/storage/photos/1/pizza_assorti.jpg', 138, 2, 18, 1.99, 'okey-jacobi', 'Okey Jacobi', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(113, '/storage/photos/1/pizza_assorti.jpg', 274, 1, 1, 1.99, 'dr-daisy-wunsch-v', 'Dr. Daisy Wunsch V', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(114, '/storage/photos/1/pizza_assorti.jpg', 88, 4, 22, 1.99, 'dillan-paucek', 'Dillan Paucek', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(115, '/storage/photos/1/pizza_assorti.jpg', 201, 1, 23, 1.99, 'polly-muller-dvm', 'Polly Muller DVM', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(116, '/storage/photos/1/pizza_assorti.jpg', 317, 4, 8, 1.99, 'mr-buck-fay', 'Mr. Buck Fay', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(117, '/storage/photos/1/pizza_assorti.jpg', 116, 1, 6, 1.99, 'prof-rusty-hyatt-dvm', 'Prof. Rusty Hyatt DVM', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(118, '/storage/photos/1/pizza_assorti.jpg', 62, 5, 2, 1.99, 'margarette-mertz', 'Margarette Mertz', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(119, '/storage/photos/1/pizza_assorti.jpg', 85, 1, 11, 1.99, 'jayne-lehner', 'Jayne Lehner', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(120, '/storage/photos/1/pizza_assorti.jpg', 276, 4, 2, 1.99, 'mrs-alanis-o-kon-phd', 'Mrs. Alanis O\'Kon PhD', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(121, '/storage/photos/1/pizza_assorti.jpg', 20, 5, 17, 1.99, 'concepcion-reichert-ii', 'Concepcion Reichert II', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(122, '/storage/photos/1/pizza_assorti.jpg', 188, 3, 10, 1.99, 'prof-clovis-lueilwitz-md', 'Prof. Clovis Lueilwitz MD', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(123, '/storage/photos/1/pizza_assorti.jpg', 13, 1, 13, 1.99, 'alysha-schowalter-iv', 'Alysha Schowalter IV', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(124, '/storage/photos/1/pizza_assorti.jpg', 28, 3, 7, 1.99, 'shanelle-bartoletti', 'Shanelle Bartoletti', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(125, '/storage/photos/1/pizza_assorti.jpg', 44, 1, 23, 1.99, 'alisha-wiza', 'Alisha Wiza', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(126, '/storage/photos/1/pizza_assorti.jpg', 149, 3, 17, 1.99, 'shanna-treutel', 'Shanna Treutel', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(127, '/storage/photos/1/pizza_assorti.jpg', 309, 5, 5, 1.99, 'kane-stokes', 'Kane Stokes', 1, '2021-06-08 22:02:11', '2021-06-08 22:02:11'),
(128, '/storage/photos/1/pizza_assorti.jpg', 175, 4, 1, 1.99, 'glenda-jacobs', 'Glenda Jacobs', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(129, '/storage/photos/1/pizza_assorti.jpg', 162, 2, 15, 1.99, 'dr-ava-heaney', 'Dr. Ava Heaney', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(130, '/storage/photos/1/pizza_assorti.jpg', 101, 5, 8, 1.99, 'dr-king-bartoletti-i', 'Dr. King Bartoletti I', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(131, '/storage/photos/1/pizza_assorti.jpg', 232, 2, 1, 1.99, 'breanne-schaefer-sr', 'Breanne Schaefer Sr.', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(132, '/storage/photos/1/pizza_assorti.jpg', 271, 1, 19, 1.99, 'mr-johnson-balistreri', 'Mr. Johnson Balistreri', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(133, '/storage/photos/1/pizza_assorti.jpg', 170, 4, 4, 1.99, 'lilla-ziemann', 'Lilla Ziemann', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(134, '/storage/photos/1/pizza_assorti.jpg', 123, 1, 1, 1.99, 'reta-schmidt', 'Reta Schmidt', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(135, '/storage/photos/1/pizza_assorti.jpg', 246, 1, 1, 1.99, 'neil-corkery-jr', 'Neil Corkery Jr.', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(136, '/storage/photos/1/pizza_assorti.jpg', 71, 5, 23, 1.99, 'mikayla-feest', 'Mikayla Feest', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(137, '/storage/photos/1/pizza_assorti.jpg', 307, 5, 15, 1.99, 'tatyana-wintheiser', 'Tatyana Wintheiser', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(138, '/storage/photos/1/pizza_assorti.jpg', 237, 3, 12, 1.99, 'mrs-gia-wehner', 'Mrs. Gia Wehner', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(139, '/storage/photos/1/pizza_assorti.jpg', 18, 4, 2, 1.99, 'timmy-friesen', 'Timmy Friesen', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(140, '/storage/photos/1/pizza_assorti.jpg', 136, 1, 21, 1.99, 'bret-walsh', 'Bret Walsh', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(141, '/storage/photos/1/pizza_assorti.jpg', 308, 1, 21, 1.99, 'trevor-kautzer-phd', 'Trevor Kautzer PhD', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(142, '/storage/photos/1/pizza_assorti.jpg', 146, 1, 22, 1.99, 'mekhi-torphy', 'Mekhi Torphy', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(143, '/storage/photos/1/pizza_assorti.jpg', 65, 2, 10, 1.99, 'scot-kertzmann', 'Scot Kertzmann', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(144, '/storage/photos/1/pizza_assorti.jpg', 41, 4, 10, 1.99, 'otto-tremblay', 'Otto Tremblay', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(145, '/storage/photos/1/pizza_assorti.jpg', 176, 3, 6, 1.99, 'toni-kulas', 'Toni Kulas', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(146, '/storage/photos/1/pizza_assorti.jpg', 23, 4, 21, 1.99, 'dr-tyshawn-jast', 'Dr. Tyshawn Jast', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(147, '/storage/photos/1/pizza_assorti.jpg', 294, 3, 5, 1.99, 'hans-wilderman-ii', 'Hans Wilderman II', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(148, '/storage/photos/1/pizza_assorti.jpg', 103, 3, 6, 1.99, 'eliza-dietrich', 'Eliza Dietrich', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(149, '/storage/photos/1/pizza_assorti.jpg', 268, 5, 15, 1.99, 'bradley-witting', 'Bradley Witting', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(150, '/storage/photos/1/pizza_assorti.jpg', 54, 1, 21, 1.99, 'anahi-hermann-dds', 'Anahi Hermann DDS', 1, '2021-06-08 22:02:12', '2021-06-08 22:02:12'),
(151, '/storage/photos/1/pelmeni.jpg', 107, 5, 9, 1.99, 'dr-hallie-hoeger-sr', 'Dr. Hallie Hoeger Sr.', 1, '2021-06-08 22:02:42', '2021-06-08 22:02:42'),
(152, '/storage/photos/1/pelmeni.jpg', 245, 2, 13, 1.99, 'edythe-mckenzie', 'Edythe McKenzie', 1, '2021-06-08 22:02:42', '2021-06-08 22:02:42'),
(153, '/storage/photos/1/pelmeni.jpg', 203, 5, 9, 1.99, 'prof-casey-wunsch-v', 'Prof. Casey Wunsch V', 1, '2021-06-08 22:02:42', '2021-06-08 22:02:42'),
(154, '/storage/photos/1/pelmeni.jpg', 244, 2, 7, 1.99, 'hunter-gerlach-dvm', 'Hunter Gerlach DVM', 1, '2021-06-08 22:02:42', '2021-06-08 22:02:42'),
(155, '/storage/photos/1/pelmeni.jpg', 57, 1, 19, 1.99, 'gabe-kirlin', 'Gabe Kirlin', 1, '2021-06-08 22:02:42', '2021-06-08 22:02:42'),
(156, '/storage/photos/1/pelmeni.jpg', 22, 4, 22, 1.99, 'providenci-williamson', 'Providenci Williamson', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(157, '/storage/photos/1/pelmeni.jpg', 145, 3, 20, 1.99, 'xavier-blanda', 'Xavier Blanda', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(158, '/storage/photos/1/pelmeni.jpg', 248, 4, 18, 1.99, 'mrs-kailey-bergnaum-iii', 'Mrs. Kailey Bergnaum III', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(159, '/storage/photos/1/pelmeni.jpg', 206, 1, 9, 1.99, 'federico-kutch', 'Federico Kutch', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(160, '/storage/photos/1/pelmeni.jpg', 265, 1, 6, 1.99, 'keshawn-towne', 'Keshawn Towne', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(161, '/storage/photos/1/pelmeni.jpg', 136, 1, 15, 1.99, 'mr-reynold-cremin', 'Mr. Reynold Cremin', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(162, '/storage/photos/1/pelmeni.jpg', 310, 1, 9, 1.99, 'stevie-hermann', 'Stevie Hermann', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(163, '/storage/photos/1/pelmeni.jpg', 240, 5, 7, 1.99, 'prof-frank-dooley', 'Prof. Frank Dooley', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(164, '/storage/photos/1/pelmeni.jpg', 287, 1, 2, 1.99, 'miss-irma-rutherford', 'Miss Irma Rutherford', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(165, '/storage/photos/1/pelmeni.jpg', 343, 2, 22, 1.99, 'jayme-konopelski', 'Jayme Konopelski', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(166, '/storage/photos/1/pelmeni.jpg', 149, 1, 12, 1.99, 'mitchell-farrell', 'Mitchell Farrell', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(167, '/storage/photos/1/pelmeni.jpg', 152, 4, 22, 1.99, 'buster-parisian', 'Buster Parisian', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(168, '/storage/photos/1/pelmeni.jpg', 48, 4, 13, 1.99, 'mr-jarod-buckridge-jr', 'Mr. Jarod Buckridge Jr.', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(169, '/storage/photos/1/pelmeni.jpg', 130, 2, 19, 1.99, 'leon-rath', 'Leon Rath', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(170, '/storage/photos/1/pelmeni.jpg', 76, 5, 6, 1.99, 'herminia-koelpin', 'Herminia Koelpin', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(171, '/storage/photos/1/pelmeni.jpg', 231, 3, 11, 1.99, 'verner-walker', 'Verner Walker', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(172, '/storage/photos/1/pelmeni.jpg', 96, 3, 21, 1.99, 'kiara-kshlerin', 'Kiara Kshlerin', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(173, '/storage/photos/1/pelmeni.jpg', 155, 1, 18, 1.99, 'eveline-pouros', 'Eveline Pouros', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(174, '/storage/photos/1/pelmeni.jpg', 62, 4, 4, 1.99, 'franco-cormier', 'Franco Cormier', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(175, '/storage/photos/1/pelmeni.jpg', 301, 1, 10, 1.99, 'wilber-wintheiser', 'Wilber Wintheiser', 1, '2021-06-08 22:02:43', '2021-06-08 22:02:43'),
(176, '/storage/photos/1/pelmeni.jpg', 341, 1, 21, 1.99, 'stephania-stark', 'Stephania Stark', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(177, '/storage/photos/1/pelmeni.jpg', 141, 2, 2, 1.99, 'amya-dibbert-v', 'Amya Dibbert V', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(178, '/storage/photos/1/pelmeni.jpg', 108, 3, 3, 1.99, 'dr-emilia-bruen', 'Dr. Emilia Bruen', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(179, '/storage/photos/1/pelmeni.jpg', 210, 1, 19, 1.99, 'mr-demario-grimes', 'Mr. Demario Grimes', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(180, '/storage/photos/1/pelmeni.jpg', 284, 5, 13, 1.99, 'sally-stanton', 'Sally Stanton', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(181, '/storage/photos/1/pelmeni.jpg', 183, 3, 4, 1.99, 'xander-swift', 'Xander Swift', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(182, '/storage/photos/1/pelmeni.jpg', 334, 2, 20, 1.99, 'vickie-block', 'Vickie Block', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(183, '/storage/photos/1/pelmeni.jpg', 263, 4, 15, 1.99, 'sean-murray', 'Sean Murray', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(184, '/storage/photos/1/pelmeni.jpg', 147, 3, 18, 1.99, 'selina-kirlin', 'Selina Kirlin', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(185, '/storage/photos/1/pelmeni.jpg', 69, 2, 12, 1.99, 'braulio-marquardt', 'Braulio Marquardt', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(186, '/storage/photos/1/pelmeni.jpg', 285, 5, 11, 1.99, 'gloria-little', 'Gloria Little', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(187, '/storage/photos/1/pelmeni.jpg', 227, 4, 20, 1.99, 'koby-hamill', 'Koby Hamill', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(188, '/storage/photos/1/pelmeni.jpg', 249, 1, 20, 1.99, 'kiley-auer', 'Kiley Auer', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(189, '/storage/photos/1/pelmeni.jpg', 303, 1, 6, 1.99, 'leanne-nikolaus-phd', 'Leanne Nikolaus PhD', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(190, '/storage/photos/1/pelmeni.jpg', 142, 1, 8, 1.99, 'retta-bradtke-jr', 'Retta Bradtke Jr.', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(191, '/storage/photos/1/pelmeni.jpg', 261, 2, 23, 1.99, 'mr-gerardo-bode', 'Mr. Gerardo Bode', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(192, '/storage/photos/1/pelmeni.jpg', 236, 4, 5, 1.99, 'dr-julian-bergstrom-ii', 'Dr. Julian Bergstrom II', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(193, '/storage/photos/1/pelmeni.jpg', 175, 5, 16, 1.99, 'brandy-hartmann-jr', 'Brandy Hartmann Jr.', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(194, '/storage/photos/1/pelmeni.jpg', 235, 3, 9, 1.99, 'miss-susanna-rutherford-sr', 'Miss Susanna Rutherford Sr.', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(195, '/storage/photos/1/pelmeni.jpg', 320, 2, 5, 1.99, 'minerva-johnston', 'Minerva Johnston', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(196, '/storage/photos/1/pelmeni.jpg', 47, 3, 4, 1.99, 'tracy-runolfsdottir-ii', 'Tracy Runolfsdottir II', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(197, '/storage/photos/1/pelmeni.jpg', 283, 2, 15, 1.99, 'prof-tyrell-brakus-phd', 'Prof. Tyrell Brakus PhD', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(198, '/storage/photos/1/pelmeni.jpg', 205, 3, 5, 1.99, 'dr-rose-bogisich', 'Dr. Rose Bogisich', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(199, '/storage/photos/1/pelmeni.jpg', 169, 1, 7, 1.99, 'dr-edwin-hamill', 'Dr. Edwin Hamill', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(200, '/storage/photos/1/pelmeni.jpg', 300, 2, 9, 1.99, 'prof-russel-heaney', 'Prof. Russel Heaney', 1, '2021-06-08 22:02:44', '2021-06-08 22:02:44'),
(201, '/storage/photos/1/haenchen.jpg', 136, 4, 23, 1.99, 'mrs-bonita-roob', 'Mrs. Bonita Roob', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(202, '/storage/photos/1/haenchen.jpg', 253, 4, 15, 1.99, 'delores-cormier-dds', 'Delores Cormier DDS', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(203, '/storage/photos/1/haenchen.jpg', 343, 3, 5, 1.99, 'whitney-ebert', 'Whitney Ebert', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(204, '/storage/photos/1/haenchen.jpg', 56, 5, 23, 1.99, 'jacques-upton-jr', 'Jacques Upton Jr.', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(205, '/storage/photos/1/haenchen.jpg', 333, 2, 1, 1.99, 'evert-flatley', 'Evert Flatley', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(206, '/storage/photos/1/haenchen.jpg', 211, 4, 4, 1.99, 'mr-shane-gislason', 'Mr. Shane Gislason', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(207, '/storage/photos/1/haenchen.jpg', 299, 3, 9, 1.99, 'cecelia-ondricka', 'Cecelia Ondricka', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(208, '/storage/photos/1/haenchen.jpg', 89, 1, 14, 1.99, 'kenny-bechtelar', 'Kenny Bechtelar', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(209, '/storage/photos/1/haenchen.jpg', 273, 2, 15, 1.99, 'ike-metz-phd', 'Ike Metz PhD', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(210, '/storage/photos/1/haenchen.jpg', 339, 2, 19, 1.99, 'corbin-stanton', 'Corbin Stanton', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(211, '/storage/photos/1/haenchen.jpg', 40, 4, 9, 1.99, 'salvador-sipes', 'Salvador Sipes', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(212, '/storage/photos/1/haenchen.jpg', 245, 3, 4, 1.99, 'emmanuel-daugherty', 'Emmanuel Daugherty', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(213, '/storage/photos/1/haenchen.jpg', 212, 3, 1, 1.99, 'imogene-bernhard', 'Imogene Bernhard', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(214, '/storage/photos/1/haenchen.jpg', 311, 5, 22, 1.99, 'raphaelle-bailey', 'Raphaelle Bailey', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(215, '/storage/photos/1/haenchen.jpg', 69, 5, 21, 1.99, 'dr-americo-purdy-dds', 'Dr. Americo Purdy DDS', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(216, '/storage/photos/1/haenchen.jpg', 286, 3, 5, 1.99, 'miss-eve-walker', 'Miss Eve Walker', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(217, '/storage/photos/1/haenchen.jpg', 87, 4, 14, 1.99, 'rowan-west', 'Rowan West', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(218, '/storage/photos/1/haenchen.jpg', 120, 5, 6, 1.99, 'alexander-kub', 'Alexander Kub', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(219, '/storage/photos/1/haenchen.jpg', 345, 1, 5, 1.99, 'everette-sporer', 'Everette Sporer', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(220, '/storage/photos/1/haenchen.jpg', 336, 1, 11, 1.99, 'jamil-ebert', 'Jamil Ebert', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(221, '/storage/photos/1/haenchen.jpg', 308, 1, 20, 1.99, 'prof-allen-stark-ii', 'Prof. Allen Stark II', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(222, '/storage/photos/1/haenchen.jpg', 289, 4, 15, 1.99, 'angelica-dare', 'Angelica Dare', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(223, '/storage/photos/1/haenchen.jpg', 88, 4, 16, 1.99, 'courtney-ratke', 'Courtney Ratke', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(224, '/storage/photos/1/haenchen.jpg', 249, 2, 20, 1.99, 'neva-powlowski', 'Neva Powlowski', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(225, '/storage/photos/1/haenchen.jpg', 79, 1, 6, 1.99, 'kenton-kuhlman', 'Kenton Kuhlman', 1, '2021-06-08 22:03:06', '2021-06-08 22:03:06'),
(226, '/storage/photos/1/haenchen.jpg', 243, 4, 12, 1.99, 'cooper-lowe', 'Cooper Lowe', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(227, '/storage/photos/1/haenchen.jpg', 173, 3, 1, 1.99, 'joannie-gulgowski', 'Joannie Gulgowski', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(228, '/storage/photos/1/haenchen.jpg', 323, 2, 22, 1.99, 'prof-raoul-heathcote-dds', 'Prof. Raoul Heathcote DDS', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(229, '/storage/photos/1/haenchen.jpg', 191, 1, 20, 1.99, 'ayla-tromp', 'Ayla Tromp', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(230, '/storage/photos/1/haenchen.jpg', 195, 3, 13, 1.99, 'jayce-gutkowski', 'Jayce Gutkowski', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(231, '/storage/photos/1/haenchen.jpg', 29, 2, 22, 1.99, 'nichole-cassin', 'Nichole Cassin', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(232, '/storage/photos/1/haenchen.jpg', 214, 4, 23, 1.99, 'miss-julie-boyle-md', 'Miss Julie Boyle MD', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(233, '/storage/photos/1/haenchen.jpg', 114, 4, 5, 1.99, 'tomasa-ziemann', 'Tomasa Ziemann', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(234, '/storage/photos/1/haenchen.jpg', 36, 2, 21, 1.99, 'prof-cheyenne-gaylord', 'Prof. Cheyenne Gaylord', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(235, '/storage/photos/1/haenchen.jpg', 285, 5, 23, 1.99, 'kaya-walker', 'Kaya Walker', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(236, '/storage/photos/1/haenchen.jpg', 298, 4, 4, 1.99, 'bernadette-schaefer', 'Bernadette Schaefer', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(237, '/storage/photos/1/haenchen.jpg', 170, 4, 17, 1.99, 'hermann-dare', 'Hermann Dare', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(238, '/storage/photos/1/haenchen.jpg', 189, 1, 13, 1.99, 'julie-treutel-dds', 'Julie Treutel DDS', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(239, '/storage/photos/1/haenchen.jpg', 160, 3, 16, 1.99, 'bria-mcclure', 'Bria McClure', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(240, '/storage/photos/1/haenchen.jpg', 322, 4, 20, 1.99, 'rosalyn-lockman', 'Rosalyn Lockman', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(241, '/storage/photos/1/haenchen.jpg', 152, 4, 17, 1.99, 'cali-ankunding', 'Cali Ankunding', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(242, '/storage/photos/1/haenchen.jpg', 162, 3, 19, 1.99, 'dr-talia-simonis-md', 'Dr. Talia Simonis MD', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(243, '/storage/photos/1/haenchen.jpg', 22, 4, 21, 1.99, 'eldred-beahan', 'Eldred Beahan', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(244, '/storage/photos/1/haenchen.jpg', 279, 2, 10, 1.99, 'filiberto-erdman', 'Filiberto Erdman', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(245, '/storage/photos/1/haenchen.jpg', 228, 5, 3, 1.99, 'murray-bauch', 'Murray Bauch', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(246, '/storage/photos/1/haenchen.jpg', 293, 4, 20, 1.99, 'alexzander-boyer', 'Alexzander Boyer', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(247, '/storage/photos/1/haenchen.jpg', 187, 3, 5, 1.99, 'mrs-ara-bogisich-iv', 'Mrs. Ara Bogisich IV', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(248, '/storage/photos/1/haenchen.jpg', 154, 3, 2, 1.99, 'trace-wuckert-dvm', 'Trace Wuckert DVM', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(249, '/storage/photos/1/haenchen.jpg', 37, 4, 15, 1.99, 'graham-erdman', 'Graham Erdman', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07'),
(250, '/storage/photos/1/haenchen.jpg', 86, 2, 9, 1.99, 'dr-novella-emard', 'Dr. Novella Emard', 1, '2021-06-08 22:03:07', '2021-06-08 22:03:07');

-- --------------------------------------------------------

--
-- Структура таблиці `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `sort` int NOT NULL DEFAULT '0',
  `parent_id` int NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `product_categories`
--

INSERT INTO `product_categories` (`id`, `sort`, `parent_id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'soups', 'Soups', '2021-06-08 21:52:26', '2021-06-08 21:52:26'),
(2, 2, 0, 'salads', 'Salads', '2021-06-08 21:52:56', '2021-06-08 21:52:56'),
(3, 3, 0, 'mains', 'Mains', '2021-06-08 21:53:35', '2021-06-08 21:53:35'),
(4, 4, 0, 'drinks', 'Drinks', '2021-06-08 21:53:57', '2021-06-08 21:53:57'),
(5, 5, 0, 'deserts', 'Deserts', '2021-06-08 21:54:17', '2021-06-08 21:54:17');

-- --------------------------------------------------------

--
-- Структура таблиці `product_category_translations`
--

CREATE TABLE `product_category_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `product_category_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `product_category_translations`
--

INSERT INTO `product_category_translations` (`id`, `product_category_id`, `title`, `description`, `slug`, `locale`) VALUES
(1, 1, 'Soups', NULL, 'soups', 'en'),
(2, 2, 'Salads', NULL, 'salads', 'en'),
(3, 3, 'Mains', NULL, 'mains', 'en'),
(4, 4, 'Drinks', NULL, 'drinks', 'en'),
(5, 5, 'Deserts', NULL, 'deserts', 'en'),
(10, 5, 'Deserts', NULL, 'deserts-2', 'de'),
(11, 4, 'Getränke', NULL, 'getraenke', 'de'),
(12, 3, 'Hauptgerichte', NULL, 'hauptgerichte', 'de'),
(13, 2, 'Salate', NULL, 'salate', 'de'),
(14, 1, 'Suppe', NULL, 'suppe', 'de');

-- --------------------------------------------------------

--
-- Структура таблиці `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `title`, `slug`, `description`, `locale`) VALUES
(1, 1, 'Ayana Walsh', 'ayana-walsh', 'text', 'en'),
(2, 1, 'Ayana Walsh', 'ayana-walsh-2', 'text', 'de'),
(3, 2, 'Mr. Mason Parisian', 'mr-mason-parisian', 'text', 'en'),
(4, 2, 'Mr. Mason Parisian', 'mr-mason-parisian-2', 'text', 'de'),
(5, 3, 'German Kshlerin', 'german-kshlerin', 'text', 'en'),
(6, 3, 'German Kshlerin', 'german-kshlerin-2', 'text', 'de'),
(7, 4, 'Scottie Rath', 'scottie-rath', 'text', 'en'),
(8, 4, 'Scottie Rath', 'scottie-rath-2', 'text', 'de'),
(9, 5, 'Joesph Schmitt IV', 'joesph-schmitt-iv', 'text', 'en'),
(10, 5, 'Joesph Schmitt IV', 'joesph-schmitt-iv-2', 'text', 'de'),
(11, 6, 'Lionel Hill IV', 'lionel-hill-iv', 'text', 'en'),
(12, 6, 'Lionel Hill IV', 'lionel-hill-iv-2', 'text', 'de'),
(13, 7, 'Nolan Wehner', 'nolan-wehner', 'text', 'en'),
(14, 7, 'Nolan Wehner', 'nolan-wehner-2', 'text', 'de'),
(15, 8, 'Beryl Mertz', 'beryl-mertz', 'text', 'en'),
(16, 8, 'Beryl Mertz', 'beryl-mertz-2', 'text', 'de'),
(17, 9, 'Meghan Willms', 'meghan-willms', 'text', 'en'),
(18, 9, 'Meghan Willms', 'meghan-willms-2', 'text', 'de'),
(19, 10, 'Gordon Jacobi', 'gordon-jacobi', 'text', 'en'),
(20, 10, 'Gordon Jacobi', 'gordon-jacobi-2', 'text', 'de'),
(21, 11, 'Dr. Caesar Wolf II', 'dr-caesar-wolf-ii', 'text', 'en'),
(22, 11, 'Dr. Caesar Wolf II', 'dr-caesar-wolf-ii-2', 'text', 'de'),
(23, 12, 'Naomi Fritsch Jr.', 'naomi-fritsch-jr', 'text', 'en'),
(24, 12, 'Naomi Fritsch Jr.', 'naomi-fritsch-jr-2', 'text', 'de'),
(25, 13, 'Mr. Elmo McClure', 'mr-elmo-mcclure', 'text', 'en'),
(26, 13, 'Mr. Elmo McClure', 'mr-elmo-mcclure-2', 'text', 'de'),
(27, 14, 'Daphne Smitham', 'daphne-smitham', 'text', 'en'),
(28, 14, 'Daphne Smitham', 'daphne-smitham-2', 'text', 'de'),
(29, 15, 'Carolina Daugherty', 'carolina-daugherty', 'text', 'en'),
(30, 15, 'Carolina Daugherty', 'carolina-daugherty-2', 'text', 'de'),
(31, 16, 'Hilbert Cremin Sr.', 'hilbert-cremin-sr', 'text', 'en'),
(32, 16, 'Hilbert Cremin Sr.', 'hilbert-cremin-sr-2', 'text', 'de'),
(33, 17, 'Prof. Albertha Reilly', 'prof-albertha-reilly', 'text', 'en'),
(34, 17, 'Prof. Albertha Reilly', 'prof-albertha-reilly-2', 'text', 'de'),
(35, 18, 'Candelario Trantow', 'candelario-trantow', 'text', 'en'),
(36, 18, 'Candelario Trantow', 'candelario-trantow-2', 'text', 'de'),
(37, 19, 'Dr. Rebecca Tillman', 'dr-rebecca-tillman', 'text', 'en'),
(38, 19, 'Dr. Rebecca Tillman', 'dr-rebecca-tillman-2', 'text', 'de'),
(39, 20, 'Brain Blick', 'brain-blick', 'text', 'en'),
(40, 20, 'Brain Blick', 'brain-blick-2', 'text', 'de'),
(41, 21, 'Dr. Tania Bartoletti', 'dr-tania-bartoletti', 'text', 'en'),
(42, 21, 'Dr. Tania Bartoletti', 'dr-tania-bartoletti-2', 'text', 'de'),
(43, 22, 'Prof. Lori Wunsch PhD', 'prof-lori-wunsch-phd', 'text', 'en'),
(44, 22, 'Prof. Lori Wunsch PhD', 'prof-lori-wunsch-phd-2', 'text', 'de'),
(45, 23, 'Lavinia Mayert', 'lavinia-mayert', 'text', 'en'),
(46, 23, 'Lavinia Mayert', 'lavinia-mayert-2', 'text', 'de'),
(47, 24, 'Jasmin Walker I', 'jasmin-walker-i', 'text', 'en'),
(48, 24, 'Jasmin Walker I', 'jasmin-walker-i-2', 'text', 'de'),
(49, 25, 'Adriel Bernier Sr.', 'adriel-bernier-sr', 'text', 'en'),
(50, 25, 'Adriel Bernier Sr.', 'adriel-bernier-sr-2', 'text', 'de'),
(51, 26, 'Vincent Kessler', 'vincent-kessler', 'text', 'en'),
(52, 26, 'Vincent Kessler', 'vincent-kessler-2', 'text', 'de'),
(53, 27, 'Dr. Cayla Runte', 'dr-cayla-runte', 'text', 'en'),
(54, 27, 'Dr. Cayla Runte', 'dr-cayla-runte-2', 'text', 'de'),
(55, 28, 'Gilda Altenwerth PhD', 'gilda-altenwerth-phd', 'text', 'en'),
(56, 28, 'Gilda Altenwerth PhD', 'gilda-altenwerth-phd-2', 'text', 'de'),
(57, 29, 'Orion Johnston', 'orion-johnston', 'text', 'en'),
(58, 29, 'Orion Johnston', 'orion-johnston-2', 'text', 'de'),
(59, 30, 'Rupert Watsica', 'rupert-watsica', 'text', 'en'),
(60, 30, 'Rupert Watsica', 'rupert-watsica-2', 'text', 'de'),
(61, 31, 'Elnora Lebsack', 'elnora-lebsack', 'text', 'en'),
(62, 31, 'Elnora Lebsack', 'elnora-lebsack-2', 'text', 'de'),
(63, 32, 'Mr. Sedrick Davis', 'mr-sedrick-davis', 'text', 'en'),
(64, 32, 'Mr. Sedrick Davis', 'mr-sedrick-davis-2', 'text', 'de'),
(65, 33, 'Lindsay Dicki', 'lindsay-dicki', 'text', 'en'),
(66, 33, 'Lindsay Dicki', 'lindsay-dicki-2', 'text', 'de'),
(67, 34, 'Eva Hirthe DVM', 'eva-hirthe-dvm', 'text', 'en'),
(68, 34, 'Eva Hirthe DVM', 'eva-hirthe-dvm-2', 'text', 'de'),
(69, 35, 'Dr. Ross Hansen Jr.', 'dr-ross-hansen-jr', 'text', 'en'),
(70, 35, 'Dr. Ross Hansen Jr.', 'dr-ross-hansen-jr-2', 'text', 'de'),
(71, 36, 'Jedidiah Armstrong', 'jedidiah-armstrong', 'text', 'en'),
(72, 36, 'Jedidiah Armstrong', 'jedidiah-armstrong-2', 'text', 'de'),
(73, 37, 'Demarco Carter IV', 'demarco-carter-iv', 'text', 'en'),
(74, 37, 'Demarco Carter IV', 'demarco-carter-iv-2', 'text', 'de'),
(75, 38, 'Roel Sanford', 'roel-sanford', 'text', 'en'),
(76, 38, 'Roel Sanford', 'roel-sanford-2', 'text', 'de'),
(77, 39, 'Uriel Runte', 'uriel-runte', 'text', 'en'),
(78, 39, 'Uriel Runte', 'uriel-runte-2', 'text', 'de'),
(79, 40, 'Laurianne Huels II', 'laurianne-huels-ii', 'text', 'en'),
(80, 40, 'Laurianne Huels II', 'laurianne-huels-ii-2', 'text', 'de'),
(81, 41, 'Bonnie Rodriguez', 'bonnie-rodriguez', 'text', 'en'),
(82, 41, 'Bonnie Rodriguez', 'bonnie-rodriguez-2', 'text', 'de'),
(83, 42, 'Vivienne Kohler', 'vivienne-kohler', 'text', 'en'),
(84, 42, 'Vivienne Kohler', 'vivienne-kohler-2', 'text', 'de'),
(85, 43, 'Prof. Ali Batz MD', 'prof-ali-batz-md', 'text', 'en'),
(86, 43, 'Prof. Ali Batz MD', 'prof-ali-batz-md-2', 'text', 'de'),
(87, 44, 'Mrs. Leatha Shanahan V', 'mrs-leatha-shanahan-v', 'text', 'en'),
(88, 44, 'Mrs. Leatha Shanahan V', 'mrs-leatha-shanahan-v-2', 'text', 'de'),
(89, 45, 'Uriah Friesen', 'uriah-friesen', 'text', 'en'),
(90, 45, 'Uriah Friesen', 'uriah-friesen-2', 'text', 'de'),
(91, 46, 'Gaylord Hessel', 'gaylord-hessel', 'text', 'en'),
(92, 46, 'Gaylord Hessel', 'gaylord-hessel-2', 'text', 'de'),
(93, 47, 'Jayme Wisoky', 'jayme-wisoky', 'text', 'en'),
(94, 47, 'Jayme Wisoky', 'jayme-wisoky-2', 'text', 'de'),
(95, 48, 'Thurman Yundt', 'thurman-yundt', 'text', 'en'),
(96, 48, 'Thurman Yundt', 'thurman-yundt-2', 'text', 'de'),
(97, 49, 'Dana Sipes', 'dana-sipes', 'text', 'en'),
(98, 49, 'Dana Sipes', 'dana-sipes-2', 'text', 'de'),
(99, 50, 'Letha Smith', 'letha-smith', 'text', 'en'),
(100, 50, 'Letha Smith', 'letha-smith-2', 'text', 'de'),
(101, 51, 'Otilia Schamberger', 'otilia-schamberger', 'text', 'en'),
(102, 51, 'Otilia Schamberger', 'otilia-schamberger-2', 'text', 'de'),
(103, 52, 'Justina DuBuque', 'justina-dubuque', 'text', 'en'),
(104, 52, 'Justina DuBuque', 'justina-dubuque-2', 'text', 'de'),
(105, 53, 'Schuyler O\'Hara', 'schuyler-o-hara', 'text', 'en'),
(106, 53, 'Schuyler O\'Hara', 'schuyler-o-hara-2', 'text', 'de'),
(107, 54, 'Dr. Elliott Jacobs', 'dr-elliott-jacobs', 'text', 'en'),
(108, 54, 'Dr. Elliott Jacobs', 'dr-elliott-jacobs-2', 'text', 'de'),
(109, 55, 'Ole Dach', 'ole-dach', 'text', 'en'),
(110, 55, 'Ole Dach', 'ole-dach-2', 'text', 'de'),
(111, 56, 'Cassandra Williamson', 'cassandra-williamson', 'text', 'en'),
(112, 56, 'Cassandra Williamson', 'cassandra-williamson-2', 'text', 'de'),
(113, 57, 'Lessie Hegmann', 'lessie-hegmann', 'text', 'en'),
(114, 57, 'Lessie Hegmann', 'lessie-hegmann-2', 'text', 'de'),
(115, 58, 'Orlando Kling', 'orlando-kling', 'text', 'en'),
(116, 58, 'Orlando Kling', 'orlando-kling-2', 'text', 'de'),
(117, 59, 'Amaya Lowe', 'amaya-lowe', 'text', 'en'),
(118, 59, 'Amaya Lowe', 'amaya-lowe-2', 'text', 'de'),
(119, 60, 'Miss Myrtie Hills II', 'miss-myrtie-hills-ii', 'text', 'en'),
(120, 60, 'Miss Myrtie Hills II', 'miss-myrtie-hills-ii-2', 'text', 'de'),
(121, 61, 'Jasper Durgan', 'jasper-durgan', 'text', 'en'),
(122, 61, 'Jasper Durgan', 'jasper-durgan-2', 'text', 'de'),
(123, 62, 'Ms. Phyllis King PhD', 'ms-phyllis-king-phd', 'text', 'en'),
(124, 62, 'Ms. Phyllis King PhD', 'ms-phyllis-king-phd-2', 'text', 'de'),
(125, 63, 'Sage Weber', 'sage-weber', 'text', 'en'),
(126, 63, 'Sage Weber', 'sage-weber-2', 'text', 'de'),
(127, 64, 'Dr. Jose Thiel', 'dr-jose-thiel', 'text', 'en'),
(128, 64, 'Dr. Jose Thiel', 'dr-jose-thiel-2', 'text', 'de'),
(129, 65, 'Darlene Bernier', 'darlene-bernier', 'text', 'en'),
(130, 65, 'Darlene Bernier', 'darlene-bernier-2', 'text', 'de'),
(131, 66, 'Prof. Bella Larson V', 'prof-bella-larson-v', 'text', 'en'),
(132, 66, 'Prof. Bella Larson V', 'prof-bella-larson-v-2', 'text', 'de'),
(133, 67, 'Angeline Runolfsson IV', 'angeline-runolfsson-iv', 'text', 'en'),
(134, 67, 'Angeline Runolfsson IV', 'angeline-runolfsson-iv-2', 'text', 'de'),
(135, 68, 'Nelda Stroman', 'nelda-stroman', 'text', 'en'),
(136, 68, 'Nelda Stroman', 'nelda-stroman-2', 'text', 'de'),
(137, 69, 'Dr. Alexzander Oberbrunner', 'dr-alexzander-oberbrunner', 'text', 'en'),
(138, 69, 'Dr. Alexzander Oberbrunner', 'dr-alexzander-oberbrunner-2', 'text', 'de'),
(139, 70, 'Ms. Felicita Wilderman III', 'ms-felicita-wilderman-iii', 'text', 'en'),
(140, 70, 'Ms. Felicita Wilderman III', 'ms-felicita-wilderman-iii-2', 'text', 'de'),
(141, 71, 'Eleazar Durgan Jr.', 'eleazar-durgan-jr', 'text', 'en'),
(142, 71, 'Eleazar Durgan Jr.', 'eleazar-durgan-jr-2', 'text', 'de'),
(143, 72, 'Mrs. Jadyn Schulist III', 'mrs-jadyn-schulist-iii', 'text', 'en'),
(144, 72, 'Mrs. Jadyn Schulist III', 'mrs-jadyn-schulist-iii-2', 'text', 'de'),
(145, 73, 'Victor Schuster', 'victor-schuster', 'text', 'en'),
(146, 73, 'Victor Schuster', 'victor-schuster-2', 'text', 'de'),
(147, 74, 'Kyleigh Conn', 'kyleigh-conn', 'text', 'en'),
(148, 74, 'Kyleigh Conn', 'kyleigh-conn-2', 'text', 'de'),
(149, 75, 'Prof. Alfred Pacocha', 'prof-alfred-pacocha', 'text', 'en'),
(150, 75, 'Prof. Alfred Pacocha', 'prof-alfred-pacocha-2', 'text', 'de'),
(151, 76, 'Antonietta Kemmer', 'antonietta-kemmer', 'text', 'en'),
(152, 76, 'Antonietta Kemmer', 'antonietta-kemmer-2', 'text', 'de'),
(153, 77, 'Dr. Ashton Yundt', 'dr-ashton-yundt', 'text', 'en'),
(154, 77, 'Dr. Ashton Yundt', 'dr-ashton-yundt-2', 'text', 'de'),
(155, 78, 'Mr. Cristopher Kris Jr.', 'mr-cristopher-kris-jr', 'text', 'en'),
(156, 78, 'Mr. Cristopher Kris Jr.', 'mr-cristopher-kris-jr-2', 'text', 'de'),
(157, 79, 'Mr. Jack Tillman', 'mr-jack-tillman', 'text', 'en'),
(158, 79, 'Mr. Jack Tillman', 'mr-jack-tillman-2', 'text', 'de'),
(159, 80, 'Kareem Grant', 'kareem-grant', 'text', 'en'),
(160, 80, 'Kareem Grant', 'kareem-grant-2', 'text', 'de'),
(161, 81, 'Spencer Reilly', 'spencer-reilly', 'text', 'en'),
(162, 81, 'Spencer Reilly', 'spencer-reilly-2', 'text', 'de'),
(163, 82, 'Lillie Gibson', 'lillie-gibson', 'text', 'en'),
(164, 82, 'Lillie Gibson', 'lillie-gibson-2', 'text', 'de'),
(165, 83, 'Yvette Pagac', 'yvette-pagac', 'text', 'en'),
(166, 83, 'Yvette Pagac', 'yvette-pagac-2', 'text', 'de'),
(167, 84, 'Della Bogan', 'della-bogan', 'text', 'en'),
(168, 84, 'Della Bogan', 'della-bogan-2', 'text', 'de'),
(169, 85, 'Raina Mohr DDS', 'raina-mohr-dds', 'text', 'en'),
(170, 85, 'Raina Mohr DDS', 'raina-mohr-dds-2', 'text', 'de'),
(171, 86, 'Leda Ortiz', 'leda-ortiz', 'text', 'en'),
(172, 86, 'Leda Ortiz', 'leda-ortiz-2', 'text', 'de'),
(173, 87, 'Norval Spencer', 'norval-spencer', 'text', 'en'),
(174, 87, 'Norval Spencer', 'norval-spencer-2', 'text', 'de'),
(175, 88, 'Prof. Stanford Jenkins PhD', 'prof-stanford-jenkins-phd', 'text', 'en'),
(176, 88, 'Prof. Stanford Jenkins PhD', 'prof-stanford-jenkins-phd-2', 'text', 'de'),
(177, 89, 'Maybelle Crist', 'maybelle-crist', 'text', 'en'),
(178, 89, 'Maybelle Crist', 'maybelle-crist-2', 'text', 'de'),
(179, 90, 'Sydnie Erdman', 'sydnie-erdman', 'text', 'en'),
(180, 90, 'Sydnie Erdman', 'sydnie-erdman-2', 'text', 'de'),
(181, 91, 'Bonnie Bruen', 'bonnie-bruen', 'text', 'en'),
(182, 91, 'Bonnie Bruen', 'bonnie-bruen-2', 'text', 'de'),
(183, 92, 'Marta Collier', 'marta-collier', 'text', 'en'),
(184, 92, 'Marta Collier', 'marta-collier-2', 'text', 'de'),
(185, 93, 'Winona Mueller', 'winona-mueller', 'text', 'en'),
(186, 93, 'Winona Mueller', 'winona-mueller-2', 'text', 'de'),
(187, 94, 'Dr. Brook Mohr', 'dr-brook-mohr', 'text', 'en'),
(188, 94, 'Dr. Brook Mohr', 'dr-brook-mohr-2', 'text', 'de'),
(189, 95, 'Dr. Kiel Breitenberg MD', 'dr-kiel-breitenberg-md', 'text', 'en'),
(190, 95, 'Dr. Kiel Breitenberg MD', 'dr-kiel-breitenberg-md-2', 'text', 'de'),
(191, 96, 'Mason Becker', 'mason-becker', 'text', 'en'),
(192, 96, 'Mason Becker', 'mason-becker-2', 'text', 'de'),
(193, 97, 'Jerome Huels', 'jerome-huels', 'text', 'en'),
(194, 97, 'Jerome Huels', 'jerome-huels-2', 'text', 'de'),
(195, 98, 'Prof. Federico Sawayn', 'prof-federico-sawayn', 'text', 'en'),
(196, 98, 'Prof. Federico Sawayn', 'prof-federico-sawayn-2', 'text', 'de'),
(197, 99, 'Halie Powlowski', 'halie-powlowski', 'text', 'en'),
(198, 99, 'Halie Powlowski', 'halie-powlowski-2', 'text', 'de'),
(199, 100, 'Prof. Sienna Funk', 'prof-sienna-funk', 'text', 'en'),
(200, 100, 'Prof. Sienna Funk', 'prof-sienna-funk-2', 'text', 'de'),
(201, 101, 'Dr. Jace Gaylord', 'dr-jace-gaylord', 'text', 'en'),
(202, 101, 'Dr. Jace Gaylord', 'dr-jace-gaylord-2', 'text', 'de'),
(203, 102, 'Reagan Sanford', 'reagan-sanford', 'text', 'en'),
(204, 102, 'Reagan Sanford', 'reagan-sanford-2', 'text', 'de'),
(205, 103, 'Jett Dickinson III', 'jett-dickinson-iii', 'text', 'en'),
(206, 103, 'Jett Dickinson III', 'jett-dickinson-iii-2', 'text', 'de'),
(207, 104, 'Austen Walker', 'austen-walker', 'text', 'en'),
(208, 104, 'Austen Walker', 'austen-walker-2', 'text', 'de'),
(209, 105, 'Kayla Fay IV', 'kayla-fay-iv', 'text', 'en'),
(210, 105, 'Kayla Fay IV', 'kayla-fay-iv-2', 'text', 'de'),
(211, 106, 'Prof. Garth Botsford DVM', 'prof-garth-botsford-dvm', 'text', 'en'),
(212, 106, 'Prof. Garth Botsford DVM', 'prof-garth-botsford-dvm-2', 'text', 'de'),
(213, 107, 'Natalia Botsford', 'natalia-botsford', 'text', 'en'),
(214, 107, 'Natalia Botsford', 'natalia-botsford-2', 'text', 'de'),
(215, 108, 'Marie Hettinger Jr.', 'marie-hettinger-jr', 'text', 'en'),
(216, 108, 'Marie Hettinger Jr.', 'marie-hettinger-jr-2', 'text', 'de'),
(217, 109, 'Maudie Bradtke', 'maudie-bradtke', 'text', 'en'),
(218, 109, 'Maudie Bradtke', 'maudie-bradtke-2', 'text', 'de'),
(219, 110, 'Leatha Gulgowski', 'leatha-gulgowski', 'text', 'en'),
(220, 110, 'Leatha Gulgowski', 'leatha-gulgowski-2', 'text', 'de'),
(221, 111, 'Deshaun Quitzon', 'deshaun-quitzon', 'text', 'en'),
(222, 111, 'Deshaun Quitzon', 'deshaun-quitzon-2', 'text', 'de'),
(223, 112, 'Okey Jacobi', 'okey-jacobi', 'text', 'en'),
(224, 112, 'Okey Jacobi', 'okey-jacobi-2', 'text', 'de'),
(225, 113, 'Dr. Daisy Wunsch V', 'dr-daisy-wunsch-v', 'text', 'en'),
(226, 113, 'Dr. Daisy Wunsch V', 'dr-daisy-wunsch-v-2', 'text', 'de'),
(227, 114, 'Dillan Paucek', 'dillan-paucek', 'text', 'en'),
(228, 114, 'Dillan Paucek', 'dillan-paucek-2', 'text', 'de'),
(229, 115, 'Polly Muller DVM', 'polly-muller-dvm', 'text', 'en'),
(230, 115, 'Polly Muller DVM', 'polly-muller-dvm-2', 'text', 'de'),
(231, 116, 'Mr. Buck Fay', 'mr-buck-fay', 'text', 'en'),
(232, 116, 'Mr. Buck Fay', 'mr-buck-fay-2', 'text', 'de'),
(233, 117, 'Prof. Rusty Hyatt DVM', 'prof-rusty-hyatt-dvm', 'text', 'en'),
(234, 117, 'Prof. Rusty Hyatt DVM', 'prof-rusty-hyatt-dvm-2', 'text', 'de'),
(235, 118, 'Margarette Mertz', 'margarette-mertz', 'text', 'en'),
(236, 118, 'Margarette Mertz', 'margarette-mertz-2', 'text', 'de'),
(237, 119, 'Jayne Lehner', 'jayne-lehner', 'text', 'en'),
(238, 119, 'Jayne Lehner', 'jayne-lehner-2', 'text', 'de'),
(239, 120, 'Mrs. Alanis O\'Kon PhD', 'mrs-alanis-o-kon-phd', 'text', 'en'),
(240, 120, 'Mrs. Alanis O\'Kon PhD', 'mrs-alanis-o-kon-phd-2', 'text', 'de'),
(241, 121, 'Concepcion Reichert II', 'concepcion-reichert-ii', 'text', 'en'),
(242, 121, 'Concepcion Reichert II', 'concepcion-reichert-ii-2', 'text', 'de'),
(243, 122, 'Prof. Clovis Lueilwitz MD', 'prof-clovis-lueilwitz-md', 'text', 'en'),
(244, 122, 'Prof. Clovis Lueilwitz MD', 'prof-clovis-lueilwitz-md-2', 'text', 'de'),
(245, 123, 'Alysha Schowalter IV', 'alysha-schowalter-iv', 'text', 'en'),
(246, 123, 'Alysha Schowalter IV', 'alysha-schowalter-iv-2', 'text', 'de'),
(247, 124, 'Shanelle Bartoletti', 'shanelle-bartoletti', 'text', 'en'),
(248, 124, 'Shanelle Bartoletti', 'shanelle-bartoletti-2', 'text', 'de'),
(249, 125, 'Alisha Wiza', 'alisha-wiza', 'text', 'en'),
(250, 125, 'Alisha Wiza', 'alisha-wiza-2', 'text', 'de'),
(251, 126, 'Shanna Treutel', 'shanna-treutel', 'text', 'en'),
(252, 126, 'Shanna Treutel', 'shanna-treutel-2', 'text', 'de'),
(253, 127, 'Kane Stokes', 'kane-stokes', 'text', 'en'),
(254, 127, 'Kane Stokes', 'kane-stokes-2', 'text', 'de'),
(255, 128, 'Glenda Jacobs', 'glenda-jacobs', 'text', 'en'),
(256, 128, 'Glenda Jacobs', 'glenda-jacobs-2', 'text', 'de'),
(257, 129, 'Dr. Ava Heaney', 'dr-ava-heaney', 'text', 'en'),
(258, 129, 'Dr. Ava Heaney', 'dr-ava-heaney-2', 'text', 'de'),
(259, 130, 'Dr. King Bartoletti I', 'dr-king-bartoletti-i', 'text', 'en'),
(260, 130, 'Dr. King Bartoletti I', 'dr-king-bartoletti-i-2', 'text', 'de'),
(261, 131, 'Breanne Schaefer Sr.', 'breanne-schaefer-sr', 'text', 'en'),
(262, 131, 'Breanne Schaefer Sr.', 'breanne-schaefer-sr-2', 'text', 'de'),
(263, 132, 'Mr. Johnson Balistreri', 'mr-johnson-balistreri', 'text', 'en'),
(264, 132, 'Mr. Johnson Balistreri', 'mr-johnson-balistreri-2', 'text', 'de'),
(265, 133, 'Lilla Ziemann', 'lilla-ziemann', 'text', 'en'),
(266, 133, 'Lilla Ziemann', 'lilla-ziemann-2', 'text', 'de'),
(267, 134, 'Reta Schmidt', 'reta-schmidt', 'text', 'en'),
(268, 134, 'Reta Schmidt', 'reta-schmidt-2', 'text', 'de'),
(269, 135, 'Neil Corkery Jr.', 'neil-corkery-jr', 'text', 'en'),
(270, 135, 'Neil Corkery Jr.', 'neil-corkery-jr-2', 'text', 'de'),
(271, 136, 'Mikayla Feest', 'mikayla-feest', 'text', 'en'),
(272, 136, 'Mikayla Feest', 'mikayla-feest-2', 'text', 'de'),
(273, 137, 'Tatyana Wintheiser', 'tatyana-wintheiser', 'text', 'en'),
(274, 137, 'Tatyana Wintheiser', 'tatyana-wintheiser-2', 'text', 'de'),
(275, 138, 'Mrs. Gia Wehner', 'mrs-gia-wehner', 'text', 'en'),
(276, 138, 'Mrs. Gia Wehner', 'mrs-gia-wehner-2', 'text', 'de'),
(277, 139, 'Timmy Friesen', 'timmy-friesen', 'text', 'en'),
(278, 139, 'Timmy Friesen', 'timmy-friesen-2', 'text', 'de'),
(279, 140, 'Bret Walsh', 'bret-walsh', 'text', 'en'),
(280, 140, 'Bret Walsh', 'bret-walsh-2', 'text', 'de'),
(281, 141, 'Trevor Kautzer PhD', 'trevor-kautzer-phd', 'text', 'en'),
(282, 141, 'Trevor Kautzer PhD', 'trevor-kautzer-phd-2', 'text', 'de'),
(283, 142, 'Mekhi Torphy', 'mekhi-torphy', 'text', 'en'),
(284, 142, 'Mekhi Torphy', 'mekhi-torphy-2', 'text', 'de'),
(285, 143, 'Scot Kertzmann', 'scot-kertzmann', 'text', 'en'),
(286, 143, 'Scot Kertzmann', 'scot-kertzmann-2', 'text', 'de'),
(287, 144, 'Otto Tremblay', 'otto-tremblay', 'text', 'en'),
(288, 144, 'Otto Tremblay', 'otto-tremblay-2', 'text', 'de'),
(289, 145, 'Toni Kulas', 'toni-kulas', 'text', 'en'),
(290, 145, 'Toni Kulas', 'toni-kulas-2', 'text', 'de'),
(291, 146, 'Dr. Tyshawn Jast', 'dr-tyshawn-jast', 'text', 'en'),
(292, 146, 'Dr. Tyshawn Jast', 'dr-tyshawn-jast-2', 'text', 'de'),
(293, 147, 'Hans Wilderman II', 'hans-wilderman-ii', 'text', 'en'),
(294, 147, 'Hans Wilderman II', 'hans-wilderman-ii-2', 'text', 'de'),
(295, 148, 'Eliza Dietrich', 'eliza-dietrich', 'text', 'en'),
(296, 148, 'Eliza Dietrich', 'eliza-dietrich-2', 'text', 'de'),
(297, 149, 'Bradley Witting', 'bradley-witting', 'text', 'en'),
(298, 149, 'Bradley Witting', 'bradley-witting-2', 'text', 'de'),
(299, 150, 'Anahi Hermann DDS', 'anahi-hermann-dds', 'text', 'en'),
(300, 150, 'Anahi Hermann DDS', 'anahi-hermann-dds-2', 'text', 'de'),
(301, 151, 'Dr. Hallie Hoeger Sr.', 'dr-hallie-hoeger-sr', 'text', 'en'),
(302, 151, 'Dr. Hallie Hoeger Sr.', 'dr-hallie-hoeger-sr-2', 'text', 'de'),
(303, 152, 'Edythe McKenzie', 'edythe-mckenzie', 'text', 'en'),
(304, 152, 'Edythe McKenzie', 'edythe-mckenzie-2', 'text', 'de'),
(305, 153, 'Prof. Casey Wunsch V', 'prof-casey-wunsch-v', 'text', 'en'),
(306, 153, 'Prof. Casey Wunsch V', 'prof-casey-wunsch-v-2', 'text', 'de'),
(307, 154, 'Hunter Gerlach DVM', 'hunter-gerlach-dvm', 'text', 'en'),
(308, 154, 'Hunter Gerlach DVM', 'hunter-gerlach-dvm-2', 'text', 'de'),
(309, 155, 'Gabe Kirlin', 'gabe-kirlin', 'text', 'en'),
(310, 155, 'Gabe Kirlin', 'gabe-kirlin-2', 'text', 'de'),
(311, 156, 'Providenci Williamson', 'providenci-williamson', 'text', 'en'),
(312, 156, 'Providenci Williamson', 'providenci-williamson-2', 'text', 'de'),
(313, 157, 'Xavier Blanda', 'xavier-blanda', 'text', 'en'),
(314, 157, 'Xavier Blanda', 'xavier-blanda-2', 'text', 'de'),
(315, 158, 'Mrs. Kailey Bergnaum III', 'mrs-kailey-bergnaum-iii', 'text', 'en'),
(316, 158, 'Mrs. Kailey Bergnaum III', 'mrs-kailey-bergnaum-iii-2', 'text', 'de'),
(317, 159, 'Federico Kutch', 'federico-kutch', 'text', 'en'),
(318, 159, 'Federico Kutch', 'federico-kutch-2', 'text', 'de'),
(319, 160, 'Keshawn Towne', 'keshawn-towne', 'text', 'en'),
(320, 160, 'Keshawn Towne', 'keshawn-towne-2', 'text', 'de'),
(321, 161, 'Mr. Reynold Cremin', 'mr-reynold-cremin', 'text', 'en'),
(322, 161, 'Mr. Reynold Cremin', 'mr-reynold-cremin-2', 'text', 'de'),
(323, 162, 'Stevie Hermann', 'stevie-hermann', 'text', 'en'),
(324, 162, 'Stevie Hermann', 'stevie-hermann-2', 'text', 'de'),
(325, 163, 'Prof. Frank Dooley', 'prof-frank-dooley', 'text', 'en'),
(326, 163, 'Prof. Frank Dooley', 'prof-frank-dooley-2', 'text', 'de'),
(327, 164, 'Miss Irma Rutherford', 'miss-irma-rutherford', 'text', 'en'),
(328, 164, 'Miss Irma Rutherford', 'miss-irma-rutherford-2', 'text', 'de'),
(329, 165, 'Jayme Konopelski', 'jayme-konopelski', 'text', 'en'),
(330, 165, 'Jayme Konopelski', 'jayme-konopelski-2', 'text', 'de'),
(331, 166, 'Mitchell Farrell', 'mitchell-farrell', 'text', 'en'),
(332, 166, 'Mitchell Farrell', 'mitchell-farrell-2', 'text', 'de'),
(333, 167, 'Buster Parisian', 'buster-parisian', 'text', 'en'),
(334, 167, 'Buster Parisian', 'buster-parisian-2', 'text', 'de'),
(335, 168, 'Mr. Jarod Buckridge Jr.', 'mr-jarod-buckridge-jr', 'text', 'en'),
(336, 168, 'Mr. Jarod Buckridge Jr.', 'mr-jarod-buckridge-jr-2', 'text', 'de'),
(337, 169, 'Leon Rath', 'leon-rath', 'text', 'en'),
(338, 169, 'Leon Rath', 'leon-rath-2', 'text', 'de'),
(339, 170, 'Herminia Koelpin', 'herminia-koelpin', 'text', 'en'),
(340, 170, 'Herminia Koelpin', 'herminia-koelpin-2', 'text', 'de'),
(341, 171, 'Verner Walker', 'verner-walker', 'text', 'en'),
(342, 171, 'Verner Walker', 'verner-walker-2', 'text', 'de'),
(343, 172, 'Kiara Kshlerin', 'kiara-kshlerin', 'text', 'en'),
(344, 172, 'Kiara Kshlerin', 'kiara-kshlerin-2', 'text', 'de'),
(345, 173, 'Eveline Pouros', 'eveline-pouros', 'text', 'en'),
(346, 173, 'Eveline Pouros', 'eveline-pouros-2', 'text', 'de'),
(347, 174, 'Franco Cormier', 'franco-cormier', 'text', 'en'),
(348, 174, 'Franco Cormier', 'franco-cormier-2', 'text', 'de'),
(349, 175, 'Wilber Wintheiser', 'wilber-wintheiser', 'text', 'en'),
(350, 175, 'Wilber Wintheiser', 'wilber-wintheiser-2', 'text', 'de'),
(351, 176, 'Stephania Stark', 'stephania-stark', 'text', 'en'),
(352, 176, 'Stephania Stark', 'stephania-stark-2', 'text', 'de'),
(353, 177, 'Amya Dibbert V', 'amya-dibbert-v', 'text', 'en'),
(354, 177, 'Amya Dibbert V', 'amya-dibbert-v-2', 'text', 'de'),
(355, 178, 'Dr. Emilia Bruen', 'dr-emilia-bruen', 'text', 'en'),
(356, 178, 'Dr. Emilia Bruen', 'dr-emilia-bruen-2', 'text', 'de'),
(357, 179, 'Mr. Demario Grimes', 'mr-demario-grimes', 'text', 'en'),
(358, 179, 'Mr. Demario Grimes', 'mr-demario-grimes-2', 'text', 'de'),
(359, 180, 'Sally Stanton', 'sally-stanton', 'text', 'en'),
(360, 180, 'Sally Stanton', 'sally-stanton-2', 'text', 'de'),
(361, 181, 'Xander Swift', 'xander-swift', 'text', 'en'),
(362, 181, 'Xander Swift', 'xander-swift-2', 'text', 'de'),
(363, 182, 'Vickie Block', 'vickie-block', 'text', 'en'),
(364, 182, 'Vickie Block', 'vickie-block-2', 'text', 'de'),
(365, 183, 'Sean Murray', 'sean-murray', 'text', 'en'),
(366, 183, 'Sean Murray', 'sean-murray-2', 'text', 'de'),
(367, 184, 'Selina Kirlin', 'selina-kirlin', 'text', 'en'),
(368, 184, 'Selina Kirlin', 'selina-kirlin-2', 'text', 'de'),
(369, 185, 'Braulio Marquardt', 'braulio-marquardt', 'text', 'en'),
(370, 185, 'Braulio Marquardt', 'braulio-marquardt-2', 'text', 'de'),
(371, 186, 'Gloria Little', 'gloria-little', 'text', 'en'),
(372, 186, 'Gloria Little', 'gloria-little-2', 'text', 'de'),
(373, 187, 'Koby Hamill', 'koby-hamill', 'text', 'en'),
(374, 187, 'Koby Hamill', 'koby-hamill-2', 'text', 'de'),
(375, 188, 'Kiley Auer', 'kiley-auer', 'text', 'en'),
(376, 188, 'Kiley Auer', 'kiley-auer-2', 'text', 'de'),
(377, 189, 'Leanne Nikolaus PhD', 'leanne-nikolaus-phd', 'text', 'en'),
(378, 189, 'Leanne Nikolaus PhD', 'leanne-nikolaus-phd-2', 'text', 'de'),
(379, 190, 'Retta Bradtke Jr.', 'retta-bradtke-jr', 'text', 'en'),
(380, 190, 'Retta Bradtke Jr.', 'retta-bradtke-jr-2', 'text', 'de'),
(381, 191, 'Mr. Gerardo Bode', 'mr-gerardo-bode', 'text', 'en'),
(382, 191, 'Mr. Gerardo Bode', 'mr-gerardo-bode-2', 'text', 'de'),
(383, 192, 'Dr. Julian Bergstrom II', 'dr-julian-bergstrom-ii', 'text', 'en'),
(384, 192, 'Dr. Julian Bergstrom II', 'dr-julian-bergstrom-ii-2', 'text', 'de'),
(385, 193, 'Brandy Hartmann Jr.', 'brandy-hartmann-jr', 'text', 'en'),
(386, 193, 'Brandy Hartmann Jr.', 'brandy-hartmann-jr-2', 'text', 'de'),
(387, 194, 'Miss Susanna Rutherford Sr.', 'miss-susanna-rutherford-sr', 'text', 'en'),
(388, 194, 'Miss Susanna Rutherford Sr.', 'miss-susanna-rutherford-sr-2', 'text', 'de'),
(389, 195, 'Minerva Johnston', 'minerva-johnston', 'text', 'en'),
(390, 195, 'Minerva Johnston', 'minerva-johnston-2', 'text', 'de'),
(391, 196, 'Tracy Runolfsdottir II', 'tracy-runolfsdottir-ii', 'text', 'en'),
(392, 196, 'Tracy Runolfsdottir II', 'tracy-runolfsdottir-ii-2', 'text', 'de'),
(393, 197, 'Prof. Tyrell Brakus PhD', 'prof-tyrell-brakus-phd', 'text', 'en'),
(394, 197, 'Prof. Tyrell Brakus PhD', 'prof-tyrell-brakus-phd-2', 'text', 'de'),
(395, 198, 'Dr. Rose Bogisich', 'dr-rose-bogisich', 'text', 'en'),
(396, 198, 'Dr. Rose Bogisich', 'dr-rose-bogisich-2', 'text', 'de'),
(397, 199, 'Dr. Edwin Hamill', 'dr-edwin-hamill', 'text', 'en'),
(398, 199, 'Dr. Edwin Hamill', 'dr-edwin-hamill-2', 'text', 'de'),
(399, 200, 'Prof. Russel Heaney', 'prof-russel-heaney', 'text', 'en'),
(400, 200, 'Prof. Russel Heaney', 'prof-russel-heaney-2', 'text', 'de'),
(401, 201, 'Mrs. Bonita Roob', 'mrs-bonita-roob', 'text', 'en'),
(402, 201, 'Mrs. Bonita Roob', 'mrs-bonita-roob-2', 'text', 'de'),
(403, 202, 'Delores Cormier DDS', 'delores-cormier-dds', 'text', 'en'),
(404, 202, 'Delores Cormier DDS', 'delores-cormier-dds-2', 'text', 'de'),
(405, 203, 'Whitney Ebert', 'whitney-ebert', 'text', 'en'),
(406, 203, 'Whitney Ebert', 'whitney-ebert-2', 'text', 'de'),
(407, 204, 'Jacques Upton Jr.', 'jacques-upton-jr', 'text', 'en'),
(408, 204, 'Jacques Upton Jr.', 'jacques-upton-jr-2', 'text', 'de'),
(409, 205, 'Evert Flatley', 'evert-flatley', 'text', 'en'),
(410, 205, 'Evert Flatley', 'evert-flatley-2', 'text', 'de'),
(411, 206, 'Mr. Shane Gislason', 'mr-shane-gislason', 'text', 'en'),
(412, 206, 'Mr. Shane Gislason', 'mr-shane-gislason-2', 'text', 'de'),
(413, 207, 'Cecelia Ondricka', 'cecelia-ondricka', 'text', 'en'),
(414, 207, 'Cecelia Ondricka', 'cecelia-ondricka-2', 'text', 'de'),
(415, 208, 'Kenny Bechtelar', 'kenny-bechtelar', 'text', 'en'),
(416, 208, 'Kenny Bechtelar', 'kenny-bechtelar-2', 'text', 'de'),
(417, 209, 'Ike Metz PhD', 'ike-metz-phd', 'text', 'en'),
(418, 209, 'Ike Metz PhD', 'ike-metz-phd-2', 'text', 'de'),
(419, 210, 'Corbin Stanton', 'corbin-stanton', 'text', 'en'),
(420, 210, 'Corbin Stanton', 'corbin-stanton-2', 'text', 'de'),
(421, 211, 'Salvador Sipes', 'salvador-sipes', 'text', 'en'),
(422, 211, 'Salvador Sipes', 'salvador-sipes-2', 'text', 'de'),
(423, 212, 'Emmanuel Daugherty', 'emmanuel-daugherty', 'text', 'en'),
(424, 212, 'Emmanuel Daugherty', 'emmanuel-daugherty-2', 'text', 'de'),
(425, 213, 'Imogene Bernhard', 'imogene-bernhard', 'text', 'en'),
(426, 213, 'Imogene Bernhard', 'imogene-bernhard-2', 'text', 'de'),
(427, 214, 'Raphaelle Bailey', 'raphaelle-bailey', 'text', 'en'),
(428, 214, 'Raphaelle Bailey', 'raphaelle-bailey-2', 'text', 'de'),
(429, 215, 'Dr. Americo Purdy DDS', 'dr-americo-purdy-dds', 'text', 'en'),
(430, 215, 'Dr. Americo Purdy DDS', 'dr-americo-purdy-dds-2', 'text', 'de'),
(431, 216, 'Miss Eve Walker', 'miss-eve-walker', 'text', 'en'),
(432, 216, 'Miss Eve Walker', 'miss-eve-walker-2', 'text', 'de'),
(433, 217, 'Rowan West', 'rowan-west', 'text', 'en'),
(434, 217, 'Rowan West', 'rowan-west-2', 'text', 'de'),
(435, 218, 'Alexander Kub', 'alexander-kub', 'text', 'en'),
(436, 218, 'Alexander Kub', 'alexander-kub-2', 'text', 'de'),
(437, 219, 'Everette Sporer', 'everette-sporer', 'text', 'en'),
(438, 219, 'Everette Sporer', 'everette-sporer-2', 'text', 'de'),
(439, 220, 'Jamil Ebert', 'jamil-ebert', 'text', 'en'),
(440, 220, 'Jamil Ebert', 'jamil-ebert-2', 'text', 'de'),
(441, 221, 'Prof. Allen Stark II', 'prof-allen-stark-ii', 'text', 'en'),
(442, 221, 'Prof. Allen Stark II', 'prof-allen-stark-ii-2', 'text', 'de'),
(443, 222, 'Angelica Dare', 'angelica-dare', 'text', 'en'),
(444, 222, 'Angelica Dare', 'angelica-dare-2', 'text', 'de'),
(445, 223, 'Courtney Ratke', 'courtney-ratke', 'text', 'en'),
(446, 223, 'Courtney Ratke', 'courtney-ratke-2', 'text', 'de'),
(447, 224, 'Neva Powlowski', 'neva-powlowski', 'text', 'en'),
(448, 224, 'Neva Powlowski', 'neva-powlowski-2', 'text', 'de'),
(449, 225, 'Kenton Kuhlman', 'kenton-kuhlman', 'text', 'en'),
(450, 225, 'Kenton Kuhlman', 'kenton-kuhlman-2', 'text', 'de'),
(451, 226, 'Cooper Lowe', 'cooper-lowe', 'text', 'en'),
(452, 226, 'Cooper Lowe', 'cooper-lowe-2', 'text', 'de'),
(453, 227, 'Joannie Gulgowski', 'joannie-gulgowski', 'text', 'en'),
(454, 227, 'Joannie Gulgowski', 'joannie-gulgowski-2', 'text', 'de'),
(455, 228, 'Prof. Raoul Heathcote DDS', 'prof-raoul-heathcote-dds', 'text', 'en'),
(456, 228, 'Prof. Raoul Heathcote DDS', 'prof-raoul-heathcote-dds-2', 'text', 'de'),
(457, 229, 'Ayla Tromp', 'ayla-tromp', 'text', 'en'),
(458, 229, 'Ayla Tromp', 'ayla-tromp-2', 'text', 'de'),
(459, 230, 'Jayce Gutkowski', 'jayce-gutkowski', 'text', 'en'),
(460, 230, 'Jayce Gutkowski', 'jayce-gutkowski-2', 'text', 'de'),
(461, 231, 'Nichole Cassin', 'nichole-cassin', 'text', 'en'),
(462, 231, 'Nichole Cassin', 'nichole-cassin-2', 'text', 'de'),
(463, 232, 'Miss Julie Boyle MD', 'miss-julie-boyle-md', 'text', 'en'),
(464, 232, 'Miss Julie Boyle MD', 'miss-julie-boyle-md-2', 'text', 'de'),
(465, 233, 'Tomasa Ziemann', 'tomasa-ziemann', 'text', 'en'),
(466, 233, 'Tomasa Ziemann', 'tomasa-ziemann-2', 'text', 'de'),
(467, 234, 'Prof. Cheyenne Gaylord', 'prof-cheyenne-gaylord', 'text', 'en'),
(468, 234, 'Prof. Cheyenne Gaylord', 'prof-cheyenne-gaylord-2', 'text', 'de'),
(469, 235, 'Kaya Walker', 'kaya-walker', 'text', 'en'),
(470, 235, 'Kaya Walker', 'kaya-walker-2', 'text', 'de'),
(471, 236, 'Bernadette Schaefer', 'bernadette-schaefer', 'text', 'en'),
(472, 236, 'Bernadette Schaefer', 'bernadette-schaefer-2', 'text', 'de'),
(473, 237, 'Hermann Dare', 'hermann-dare', 'text', 'en'),
(474, 237, 'Hermann Dare', 'hermann-dare-2', 'text', 'de'),
(475, 238, 'Julie Treutel DDS', 'julie-treutel-dds', 'text', 'en'),
(476, 238, 'Julie Treutel DDS', 'julie-treutel-dds-2', 'text', 'de'),
(477, 239, 'Bria McClure', 'bria-mcclure', 'text', 'en'),
(478, 239, 'Bria McClure', 'bria-mcclure-2', 'text', 'de'),
(479, 240, 'Rosalyn Lockman', 'rosalyn-lockman', 'text', 'en'),
(480, 240, 'Rosalyn Lockman', 'rosalyn-lockman-2', 'text', 'de'),
(481, 241, 'Cali Ankunding', 'cali-ankunding', 'text', 'en'),
(482, 241, 'Cali Ankunding', 'cali-ankunding-2', 'text', 'de'),
(483, 242, 'Dr. Talia Simonis MD', 'dr-talia-simonis-md', 'text', 'en'),
(484, 242, 'Dr. Talia Simonis MD', 'dr-talia-simonis-md-2', 'text', 'de'),
(485, 243, 'Eldred Beahan', 'eldred-beahan', 'text', 'en'),
(486, 243, 'Eldred Beahan', 'eldred-beahan-2', 'text', 'de'),
(487, 244, 'Filiberto Erdman', 'filiberto-erdman', 'text', 'en'),
(488, 244, 'Filiberto Erdman', 'filiberto-erdman-2', 'text', 'de'),
(489, 245, 'Murray Bauch', 'murray-bauch', 'text', 'en'),
(490, 245, 'Murray Bauch', 'murray-bauch-2', 'text', 'de'),
(491, 246, 'Alexzander Boyer', 'alexzander-boyer', 'text', 'en'),
(492, 246, 'Alexzander Boyer', 'alexzander-boyer-2', 'text', 'de'),
(493, 247, 'Mrs. Ara Bogisich IV', 'mrs-ara-bogisich-iv', 'text', 'en'),
(494, 247, 'Mrs. Ara Bogisich IV', 'mrs-ara-bogisich-iv-2', 'text', 'de'),
(495, 248, 'Trace Wuckert DVM', 'trace-wuckert-dvm', 'text', 'en'),
(496, 248, 'Trace Wuckert DVM', 'trace-wuckert-dvm-2', 'text', 'de'),
(497, 249, 'Graham Erdman', 'graham-erdman', 'text', 'en'),
(498, 249, 'Graham Erdman', 'graham-erdman-2', 'text', 'de'),
(499, 250, 'Dr. Novella Emard', 'dr-novella-emard', 'text', 'en'),
(500, 250, 'Dr. Novella Emard', 'dr-novella-emard-2', 'text', 'de');

-- --------------------------------------------------------

--
-- Структура таблиці `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-06-08 15:40:37', '2021-06-08 15:40:37'),
(2, 'user', 'web', '2021-06-08 15:40:44', '2021-06-08 15:40:44');

-- --------------------------------------------------------

--
-- Структура таблиці `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '/storage/photos/1/no_image.png',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opentime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `suppliers`
--

INSERT INTO `suppliers` (`id`, `image`, `name`, `address`, `phone`, `opentime`, `email`, `slug`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '/storage/photos/1/logo_kaufland.png', 'Buddy Weimann', '773 Amaya Bypass\nLake Franciscaview, UT 80943-2412', '+1 (860) 395-4091', '08.00 - 21.00', 'spencer.price@gutmann.com', 'buddy-weimann', 1, NULL, '2021-06-08 20:56:42', '2021-06-08 22:35:06'),
(2, '/storage/photos/1/logo_kaufland.png', 'Cassidy Krajcik', '5948 Schamberger Lane\nPort Carli, KY 54966-0751', '+1.702.723.0460', '08.00 - 21.00', 'vpadberg@collier.com', 'cassidy-krajcik', 0, NULL, '2021-06-08 20:56:42', '2021-06-08 21:20:51'),
(3, '/storage/photos/1/logo_kaufland.png', 'Mr. Timmy Stracke', '9779 Kuphal Neck Apt. 586\nGusikowskiport, NC 13212-2374', '458.752.4792', '08.00 - 21.00', 'seamus.schmidt@gmail.com', 'mr-timmy-stracke', 0, NULL, '2021-06-08 20:56:42', '2021-06-08 21:01:48'),
(4, '/storage/photos/1/logo_kaufland.png', 'Ms. Virgie Ortiz DVM', '484 Markus Trail Apt. 537\nTillmanstad, IA 75423-1696', '458-955-6196', '08.00 - 21.00', 'mara.fritsch@yahoo.com', 'ms-virgie-ortiz-dvm', 0, NULL, '2021-06-08 20:56:42', '2021-06-08 21:01:48'),
(5, '/storage/photos/1/logo_kaufland.png', 'Chyna Spinka Sr.', '72856 Lebsack Isle\nPort Milton, DC 66531-9819', '+1 (920) 750-0353', '08.00 - 21.00', 'woodrow09@zemlak.com', 'chyna-spinka-sr', 0, NULL, '2021-06-08 20:56:42', '2021-06-08 21:01:48'),
(6, '/storage/photos/1/logo_kaufland.png', 'Adah Wintheiser', '8750 Wolff Mews Apt. 462\nRippinmouth, AZ 63034-2860', '817.580.5107', '08.00 - 21.00', 'billy26@hotmail.com', 'adah-wintheiser', 0, NULL, '2021-06-08 20:56:42', '2021-06-08 21:01:48'),
(7, '/storage/photos/1/logo_kaufland.png', 'Tierra Schamberger DDS', '8779 Keon Springs\nWilfredside, HI 60251-7542', '1-934-812-5603', '08.00 - 21.00', 'tess.koss@hotmail.com', 'tierra-schamberger-dds', 0, NULL, '2021-06-08 20:56:42', '2021-06-08 21:01:48'),
(8, '/storage/photos/1/logo_kaufland.png', 'Delaney Haag PhD', '70056 Baumbach Canyon\nLake Mosheside, MA 92860-0074', '386.480.6651', '08.00 - 21.00', 'zrenner@stracke.biz', 'delaney-haag-phd', 0, NULL, '2021-06-08 20:56:43', '2021-06-08 22:35:06'),
(9, '/storage/photos/1/logo_kaufland.png', 'Clyde Jerde', '370 Weimann Ports\nEast Dustyside, CT 26829', '203.842.7998', '08.00 - 21.00', 'monahan.albin@donnelly.com', 'clyde-jerde', 0, NULL, '2021-06-08 20:56:43', '2021-06-08 21:01:48'),
(10, '/storage/photos/1/logo_kaufland.png', 'Bernard Weissnat', '3602 Erdman Avenue\nEast Rolando, IN 04813', '+1-507-609-1486', '08.00 - 21.00', 'oreilly.elmira@kuhic.biz', 'bernard-weissnat', 0, NULL, '2021-06-08 20:56:43', '2021-06-08 21:01:48'),
(11, '/storage/photos/1/logo_kaufland.png', 'Jaron Kuvalis', '843 Renner Mount\nPort Keaganfort, UT 81711-3341', '(803) 698-2451', '08.00 - 21.00', 'johnson.victor@dicki.info', 'jaron-kuvalis', 0, NULL, '2021-06-08 20:56:43', '2021-06-08 21:01:48'),
(12, '/storage/photos/1/logo_edeka.png', 'Elyse Orn', '7366 Dashawn Freeway Suite 747\nRobynfurt, AK 28217', '(563) 992-4836', '08.00 - 21.00', 'lilyan.batz@yahoo.com', 'elyse-orn', 0, NULL, '2021-06-08 20:59:46', '2021-06-08 21:01:48'),
(13, '/storage/photos/1/logo_edeka.png', 'Prof. Ford Crist Jr.', '5552 Tre Viaduct Suite 938\nKubville, OH 25714', '+1.930.200.0082', '08.00 - 21.00', 'germaine.bahringer@gmail.com', 'prof-ford-crist-jr', 0, NULL, '2021-06-08 20:59:46', '2021-06-08 21:01:48'),
(14, '/storage/photos/1/logo_edeka.png', 'Miss Lolita Lowe', '6540 Rosenbaum Pine\nSouth Cleorabury, TX 27858-5364', '775.265.0846', '08.00 - 21.00', 'alyson.okon@gottlieb.com', 'miss-lolita-lowe', 0, NULL, '2021-06-08 20:59:46', '2021-06-08 21:01:48'),
(15, '/storage/photos/1/logo_edeka.png', 'Prof. Ramona Schultz', '66048 Carter Causeway\nKautzermouth, PA 49658-7460', '347-397-7195', '08.00 - 21.00', 'auer.emiliano@adams.info', 'prof-ramona-schultz', 0, NULL, '2021-06-08 20:59:46', '2021-06-08 21:01:48'),
(16, '/storage/photos/1/logo_lidl.jpg', 'Izabella Haley', '354 Botsford Dale\nBernardoburgh, WV 90322-3620', '432-526-7648', '08.00 - 21.00', 'eleanore.luettgen@hotmail.com', 'izabella-haley', 0, NULL, '2021-06-08 21:00:31', '2021-06-08 21:01:48'),
(17, '/storage/photos/1/logo_lidl.jpg', 'Amelie Goyette', '7551 Cade Fork Apt. 158\nHayesview, IN 83099', '712-657-1479', '08.00 - 21.00', 'hill.zora@gmail.com', 'amelie-goyette', 0, NULL, '2021-06-08 21:00:31', '2021-06-08 21:01:48'),
(18, '/storage/photos/1/logo_lidl.jpg', 'Antonina Ortiz', '8004 Bergnaum Highway\nWildermanborough, NH 96045-4539', '+17376920656', '08.00 - 21.00', 'eichmann.donny@gmail.com', 'antonina-ortiz', 0, NULL, '2021-06-08 21:00:31', '2021-06-08 21:01:48'),
(19, '/storage/photos/1/logo_lidl.jpg', 'Wilmer Thiel', '63757 Rempel Avenue\nSouth Crawfordborough, KS 82225-2457', '785.245.4083', '08.00 - 21.00', 'cyril42@metz.com', 'wilmer-thiel', 0, NULL, '2021-06-08 21:00:31', '2021-06-08 21:01:48'),
(20, '/storage/photos/1/Rewe_Logo.png', 'Rod Sanford', '568 Deckow Burgs\nTerrancemouth, IA 98328', '520-807-4095', '08.00 - 21.00', 'emmanuelle.bailey@bednar.com', 'rod-sanford', 0, NULL, '2021-06-08 21:01:12', '2021-06-08 21:01:48'),
(21, '/storage/photos/1/Rewe_Logo.png', 'Magnolia Witting', '4613 Schaefer Cliff Suite 423\nLake Emelia, WY 16244', '339-545-5653', '08.00 - 21.00', 'ladarius.koch@harvey.com', 'magnolia-witting', 0, NULL, '2021-06-08 21:01:12', '2021-06-08 21:01:48'),
(22, '/storage/photos/1/Rewe_Logo.png', 'Ms. Leatha Bartoletti II', '987 Harber Lodge Suite 169\nEileenmouth, VT 94849', '1-501-564-5925', '08.00 - 21.00', 'janelle96@hotmail.com', 'ms-leatha-bartoletti-ii', 0, NULL, '2021-06-08 21:01:12', '2021-06-08 21:01:48'),
(23, '/storage/photos/1/Rewe_Logo.png', 'Prof. Theodore Morar DDS', '63657 Dicki Brooks\nJarrellview, AK 29777', '+15806818956', '08.00 - 21.00', 'bennie15@hills.biz', 'prof-theodore-morar-dds', 0, NULL, '2021-06-08 21:01:12', '2021-06-08 21:01:48');

-- --------------------------------------------------------

--
-- Структура таблиці `translations`
--

CREATE TABLE `translations` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `translations`
--

INSERT INTO `translations` (`id`, `created_at`, `updated_at`, `key`, `locale`, `value`, `description`) VALUES
(1, '2021-06-08 17:19:55', '2021-06-09 15:20:20', 'user.title_singular', 'de', 'Benutzer', NULL),
(2, '2021-06-08 17:19:55', '2021-06-09 15:20:44', 'list', 'de', 'Liste', NULL),
(3, '2021-06-08 17:19:55', '2021-06-09 15:21:16', 'user.fields.name', 'de', 'Name', NULL),
(4, '2021-06-08 17:19:55', '2021-06-09 15:21:40', 'user.fields.email', 'de', 'Email', NULL),
(5, '2021-06-08 17:19:55', '2021-06-09 15:22:14', 'user.fields.email_verified_at', 'de', 'verified_at', NULL),
(6, '2021-06-08 17:19:55', '2021-06-09 15:22:43', 'user.fields.roles', 'de', 'Rollen', NULL),
(7, '2021-06-08 17:19:55', '2021-06-08 17:19:55', 'datatables.delete', 'de', 'datatables.delete', NULL),
(8, '2021-06-08 17:19:55', '2021-06-08 17:19:55', 'datatables.zero_selected', 'de', 'datatables.zero_selected', NULL),
(9, '2021-06-08 17:19:55', '2021-06-09 15:33:43', 'areYouSure', 'de', 'Sind Sie sicher', NULL),
(10, '2021-06-08 17:20:10', '2021-06-09 15:20:20', 'user.title_singular', 'en', 'User', NULL),
(11, '2021-06-08 17:20:10', '2021-06-09 15:20:44', 'list', 'en', 'List', NULL),
(12, '2021-06-08 17:20:10', '2021-06-09 15:21:16', 'user.fields.name', 'en', 'Name', NULL),
(13, '2021-06-08 17:20:10', '2021-06-09 15:21:40', 'user.fields.email', 'en', 'Email', NULL),
(14, '2021-06-08 17:20:10', '2021-06-09 15:22:05', 'user.fields.email_verified_at', 'en', 'verified_at', NULL),
(15, '2021-06-08 17:20:10', '2021-06-09 15:22:43', 'user.fields.roles', 'en', 'Roles', NULL),
(16, '2021-06-08 17:20:10', '2021-06-08 17:20:10', 'datatables.delete', 'en', 'datatables.delete', NULL),
(17, '2021-06-08 17:20:10', '2021-06-08 17:20:10', 'datatables.zero_selected', 'en', 'datatables.zero_selected', NULL),
(18, '2021-06-08 17:20:10', '2021-06-09 15:24:08', 'areYouSure', 'en', 'A you sure', NULL),
(19, '2021-06-08 17:20:17', '2021-06-08 17:20:17', 'ID', 'en', 'ID', NULL),
(20, '2021-06-08 17:20:17', '2021-06-08 17:20:17', 'Name', 'en', 'Name', NULL),
(21, '2021-06-08 17:20:17', '2021-06-08 17:20:17', 'Email', 'en', 'Email', NULL),
(22, '2021-06-08 17:20:17', '2021-06-09 15:25:11', 'message', 'en', 'Message', NULL),
(23, '2021-06-08 17:20:17', '2021-06-08 17:20:17', 'Status', 'en', 'Status', NULL),
(24, '2021-06-08 17:20:17', '2021-06-08 17:20:17', 'Created', 'en', 'Created', NULL),
(25, '2021-06-08 17:22:30', '2021-06-09 15:26:54', 'role.title_singular', 'en', 'Role', NULL),
(26, '2021-06-08 17:22:30', '2021-06-09 15:27:25', 'role.fields.title', 'en', 'Role', NULL),
(27, '2021-06-08 17:22:30', '2021-06-09 15:27:51', 'role.fields.permissions', 'en', 'Permissions', NULL),
(28, '2021-06-08 18:33:22', '2021-06-08 18:33:22', 'Translations', 'en', 'Translations', NULL),
(29, '2021-06-08 18:33:22', '2021-06-08 18:33:22', 'Key', 'en', 'Key', NULL),
(30, '2021-06-08 18:33:22', '2021-06-08 18:33:22', 'EN', 'en', 'EN', NULL),
(31, '2021-06-08 18:33:22', '2021-06-08 18:33:22', 'DE', 'en', 'DE', NULL),
(32, '2021-06-08 18:33:34', '2021-06-09 15:29:08', 'permission.title_singular', 'en', 'Permission', NULL),
(33, '2021-06-08 18:33:34', '2021-06-09 15:29:32', 'permission.fields.title', 'en', 'Permission', NULL),
(34, '2021-06-08 18:42:24', '2021-06-09 15:33:59', 'Hello, are you hungry?', 'de', 'Hallo, haben Sie Hunger?', NULL),
(35, '2021-06-08 18:42:24', '2021-06-09 15:31:24', 'Choose the dish or drink by 11 a.m. and receive an order by 12 a.m.', 'de', 'Wählen Sie das Gericht oder Getränk bis 11:00 Uhr und erhalten Sie eine Bestellung bis 12:00 Uhr.', NULL),
(36, '2021-06-08 18:42:24', '2021-06-09 15:31:49', 'HOW TO PLACE AN ORDER', 'de', 'WIE EINE BESTELLUNG AUFGEBEN', NULL),
(37, '2021-06-08 18:42:24', '2021-06-08 18:42:24', 'Choose the dish and\r\n                                                drink', 'de', 'Choose the dish and\r\n                                                drink', NULL),
(38, '2021-06-08 18:42:24', '2021-06-09 15:32:59', 'Sign in', 'de', 'Anmelden', NULL),
(39, '2021-06-08 18:42:24', '2021-06-09 15:33:27', 'Write your wish', 'de', 'Schreiben Sie Ihren Wunsch', NULL),
(40, '2021-06-08 18:42:24', '2021-06-09 15:35:00', 'Receive your order', 'de', 'Erhalten Sie Ihre Bestellung', NULL),
(41, '2021-06-08 18:42:24', '2021-06-08 18:42:24', '', 'de', '', NULL),
(42, '2021-06-08 18:42:24', '2021-06-09 15:34:33', 'Close', 'de', 'Schließen', NULL),
(43, '2021-06-08 18:42:24', '2021-06-09 15:35:21', 'Your question sent', 'de', 'Ihre Frage wurde gesendet', NULL),
(44, '2021-06-08 18:42:24', '2021-06-09 15:35:41', 'DO YOU HAVE ANY QUESTIONS', 'de', 'HABEN SIE IRGENDWELCHE FRAGEN', NULL),
(45, '2021-06-08 18:42:24', '2021-06-09 15:37:26', 'Send them to our manager', 'de', 'Senden Sie sie an unseren Manager', NULL),
(46, '2021-06-08 18:42:24', '2021-06-09 15:36:03', 'Ask', 'de', 'Fragen', NULL),
(47, '2021-06-08 18:42:24', '2021-06-09 15:36:27', 'Menu', 'de', 'Menü', NULL),
(48, '2021-06-08 18:42:24', '2021-06-09 15:37:00', 'Choose supplier', 'de', 'Lieferanten wählen', NULL),
(49, '2021-06-08 18:42:24', '2021-06-09 15:37:53', 'Suppliers & Products', 'de', 'Lieferanten & Produkte', NULL),
(50, '2021-06-08 18:42:24', '2021-06-09 15:38:12', 'Categories & Products', 'de', 'Kategorien & Produkte', NULL),
(51, '2021-06-08 18:42:24', '2021-06-08 18:42:24', 'login', 'de', 'login', NULL),
(52, '2021-06-08 18:42:24', '2021-06-08 18:42:24', 'Register', 'de', 'Register', NULL),
(53, '2021-06-08 18:42:24', '2021-06-09 15:38:43', 'About us', 'de', 'Über uns', NULL),
(54, '2021-06-08 18:42:24', '2021-06-09 15:39:13', 'Click to', 'de', 'Klicke um', NULL),
(55, '2021-06-08 18:42:25', '2021-06-09 15:39:35', 'Menu for today', 'de', 'Speisekarte für heute', NULL),
(56, '2021-06-08 19:02:42', '2021-06-09 15:40:03', 'Choose the dish and\n                                                drink', 'de', 'Wählen Sie das Gericht und das Getränk', NULL),
(57, '2021-06-08 19:12:28', '2021-06-09 15:40:26', 'My orders', 'de', 'Meine Bestellungen', NULL),
(58, '2021-06-08 19:12:28', '2021-06-09 15:40:47', 'Logout', 'de', 'Abmelden', NULL),
(59, '2021-06-08 19:12:28', '2021-06-09 15:41:04', 'Hello', 'de', 'Hallo', NULL),
(60, '2021-06-08 19:12:33', '2021-06-08 19:12:33', 'Home', 'de', 'Home', NULL),
(61, '2021-06-08 19:12:33', '2021-06-09 15:41:36', 'Order', 'de', 'Bestellung', NULL),
(62, '2021-06-08 19:12:33', '2021-06-09 15:41:58', 'Product', 'de', 'Produkt', NULL),
(63, '2021-06-08 19:12:33', '2021-06-09 15:42:22', 'Price', 'de', 'Preis', NULL),
(64, '2021-06-08 19:12:33', '2021-06-09 20:56:45', 'Quantity', 'de', 'Menge', NULL),
(65, '2021-06-08 19:12:33', '2021-06-09 20:57:41', 'Total', 'de', 'Gesamt', NULL),
(66, '2021-06-08 19:12:41', '2021-06-09 20:58:06', 'Choose category', 'de', 'Kategorie auswählen', NULL),
(67, '2021-06-08 19:12:41', '2021-06-09 20:58:37', 'All products this category', 'de', 'Alle Produkte dieser Kategorie', NULL),
(68, '2021-06-08 19:12:50', '2021-06-09 20:59:01', 'Products', 'de', 'Produkte', NULL),
(69, '2021-06-08 19:12:57', '2021-06-09 20:59:41', 'Supplier for today', 'de', 'Lieferant für heute', NULL),
(70, '2021-06-08 19:46:35', '2021-06-08 19:46:35', 'Hello, are you hungry?', 'en', 'Hello, are you hungry?', NULL),
(71, '2021-06-08 19:46:36', '2021-06-08 19:46:36', 'Choose the dish or drink by 11 a.m. and receive an order by 12 a.m.', 'en', 'Choose the dish or drink by 11 a.m. and receive an order by 12 a.m.', NULL),
(72, '2021-06-08 19:46:36', '2021-06-08 19:46:36', 'HOW TO PLACE AN ORDER', 'en', 'HOW TO PLACE AN ORDER', NULL),
(73, '2021-06-08 19:46:36', '2021-06-09 15:40:03', 'Choose the dish and\n                                                drink', 'en', 'Choose the dish and\r\n                                                drink', NULL),
(74, '2021-06-08 19:46:36', '2021-06-08 19:46:36', 'Sign in', 'en', 'Sign in', NULL),
(75, '2021-06-08 19:46:36', '2021-06-08 19:46:36', 'Write your wish', 'en', 'Write your wish', NULL),
(76, '2021-06-08 19:46:36', '2021-06-08 19:46:36', 'Receive your order', 'en', 'Receive your order', NULL),
(77, '2021-06-08 19:46:36', '2021-06-08 19:46:36', '', 'en', '', NULL),
(78, '2021-06-08 19:46:36', '2021-06-08 19:46:36', 'Menu', 'en', 'Menu', NULL),
(79, '2021-06-08 19:46:36', '2021-06-08 19:46:36', 'Choose supplier', 'en', 'Choose supplier', NULL),
(80, '2021-06-08 19:46:36', '2021-06-08 19:46:36', 'Suppliers & Products', 'en', 'Suppliers & Products', NULL),
(81, '2021-06-08 19:46:36', '2021-06-08 19:46:36', 'Categories & Products', 'en', 'Categories & Products', NULL),
(82, '2021-06-08 19:46:36', '2021-06-08 19:46:36', 'login', 'en', 'login', NULL),
(83, '2021-06-08 19:46:36', '2021-06-08 19:46:36', 'Register', 'en', 'Register', NULL),
(84, '2021-06-08 19:46:36', '2021-06-08 19:46:36', 'About us', 'en', 'About us', NULL),
(85, '2021-06-08 19:46:36', '2021-06-08 19:46:36', 'Click to', 'en', 'Click to', NULL),
(86, '2021-06-08 19:46:36', '2021-06-08 19:46:36', 'Menu for today', 'en', 'Menu for today', NULL),
(87, '2021-06-08 19:46:49', '2021-06-08 19:46:49', 'My orders', 'en', 'My orders', NULL),
(88, '2021-06-08 19:46:49', '2021-06-08 19:46:49', 'Logout', 'en', 'Logout', NULL),
(89, '2021-06-08 19:46:49', '2021-06-08 19:46:49', 'Hello', 'en', 'Hello', NULL),
(90, '2021-06-08 19:46:52', '2021-06-08 19:46:52', 'Choose category', 'en', 'Choose category', NULL),
(91, '2021-06-08 19:46:52', '2021-06-08 19:46:52', 'All products this category', 'en', 'All products this category', NULL),
(92, '2021-06-08 19:59:08', '2021-06-08 19:59:08', 'image-carousel', 'de', 'image-carousel', NULL),
(93, '2021-06-08 19:59:08', '2021-06-09 21:00:20', 'description', 'de', 'Beschreibung', NULL),
(94, '2021-06-08 19:59:08', '2021-06-09 21:01:10', 'Title', 'de', 'Titel', NULL),
(95, '2021-06-08 19:59:08', '2021-06-09 15:25:25', 'status', 'de', 'Status', NULL),
(96, '2021-06-08 19:59:09', '2021-06-09 15:26:07', 'Created', 'de', 'Erstellt', NULL),
(97, '2021-06-08 20:49:20', '2021-06-08 20:49:20', 'Close', 'en', 'Close', NULL),
(98, '2021-06-08 20:49:20', '2021-06-08 20:49:20', 'Your question sent', 'en', 'Your question sent', NULL),
(99, '2021-06-08 20:49:20', '2021-06-08 20:49:20', 'DO YOU HAVE ANY QUESTIONS', 'en', 'DO YOU HAVE ANY QUESTIONS', NULL),
(100, '2021-06-08 20:49:20', '2021-06-08 20:49:20', 'Send them to our manager', 'en', 'Send them to our manager', NULL),
(101, '2021-06-08 20:49:20', '2021-06-08 20:49:20', 'Ask', 'en', 'Ask', NULL),
(102, '2021-06-08 20:49:33', '2021-06-08 20:49:33', 'Products', 'en', 'Products', NULL),
(103, '2021-06-08 21:01:28', '2021-06-09 21:01:56', 'Phone', 'de', 'Telefon', NULL),
(104, '2021-06-08 21:01:28', '2021-06-09 21:02:35', 'Opentime', 'de', 'Öffnungszeit', NULL),
(105, '2021-06-08 21:01:28', '2021-06-08 21:01:28', 'Email', 'de', 'Email', NULL),
(106, '2021-06-08 21:01:28', '2021-06-09 21:39:47', 'Enable', 'de', 'Aktiv', NULL),
(107, '2021-06-08 21:01:28', '2021-06-09 21:03:15', 'More', 'de', 'Mehr', NULL),
(108, '2021-06-08 21:01:28', '2021-06-09 21:03:57', 'To menu', 'de', 'Zum Menü', NULL),
(109, '2021-06-08 21:01:28', '2021-06-09 21:04:25', 'Activate supplier', 'de', 'Lieferanten aktivieren', NULL),
(110, '2021-06-08 21:01:48', '2021-06-09 21:39:26', 'Disable', 'de', 'Deaktiv', NULL),
(111, '2021-06-08 21:21:03', '2021-06-08 21:21:03', 'von', 'de', 'von', NULL),
(112, '2021-06-08 21:21:03', '2021-06-09 21:05:49', 'Good appetite', 'de', 'Guten Appetit', NULL),
(113, '2021-06-08 21:30:08', '2021-06-08 21:30:08', 'Supplier for today', 'en', 'Supplier for today', NULL),
(114, '2021-06-08 21:30:08', '2021-06-08 21:30:08', 'Phone', 'en', 'Phone', NULL),
(115, '2021-06-08 21:30:08', '2021-06-08 21:30:08', 'Opentime', 'en', 'Opentime', NULL),
(116, '2021-06-08 21:30:08', '2021-06-08 21:30:08', 'Disable', 'en', 'Disable', NULL),
(117, '2021-06-08 21:30:08', '2021-06-08 21:30:08', 'Description', 'en', 'Description', NULL),
(118, '2021-06-08 21:30:08', '2021-06-08 21:30:08', 'More', 'en', 'More', NULL),
(119, '2021-06-08 21:30:08', '2021-06-08 21:30:08', 'To menu', 'en', 'To menu', NULL),
(120, '2021-06-08 21:30:08', '2021-06-08 21:30:08', 'Activate supplier', 'en', 'Activate supplier', NULL),
(121, '2021-06-08 21:30:11', '2021-06-08 21:30:11', 'Home', 'en', 'Home', NULL),
(122, '2021-06-08 21:30:11', '2021-06-08 21:30:11', 'Order', 'en', 'Order', NULL),
(123, '2021-06-08 21:30:11', '2021-06-08 21:30:11', 'Product', 'en', 'Product', NULL),
(124, '2021-06-08 21:30:11', '2021-06-08 21:30:11', 'Price', 'en', 'Price', NULL),
(125, '2021-06-08 21:30:11', '2021-06-08 21:30:11', 'Quantity', 'en', 'Quantity', NULL),
(126, '2021-06-08 21:30:11', '2021-06-08 21:30:11', 'Total', 'en', 'Total', NULL),
(127, '2021-06-08 21:31:56', '2021-06-08 21:31:56', 'add', 'en', 'add', NULL),
(128, '2021-06-08 21:32:01', '2021-06-08 21:32:01', 'create', 'en', 'create', NULL),
(129, '2021-06-08 21:32:01', '2021-06-08 21:32:01', 'Guard Name', 'en', 'Guard Name', NULL),
(130, '2021-06-08 21:32:02', '2021-06-08 21:32:02', 'save', 'en', 'save', NULL),
(131, '2021-06-08 21:45:18', '2021-06-08 21:45:18', 'edit', 'en', 'edit', NULL),
(132, '2021-06-08 21:45:22', '2021-06-09 21:07:54', 'role.fields.permissions_helper', 'en', 'permissions_helper', NULL),
(133, '2021-06-08 21:45:27', '2021-06-08 21:45:27', 'view', 'en', 'view', NULL),
(134, '2021-06-08 21:45:27', '2021-06-08 21:45:27', 'delete', 'en', 'delete', NULL),
(135, '2021-06-08 21:46:17', '2021-06-08 21:46:17', 'user.fields.name_helper', 'en', 'user.fields.name_helper', NULL),
(136, '2021-06-08 21:46:17', '2021-06-08 21:46:17', 'user.fields.email_helper', 'en', 'user.fields.email_helper', NULL),
(137, '2021-06-08 21:46:17', '2021-06-09 21:09:55', 'user.fields.password', 'en', 'Password', NULL),
(138, '2021-06-08 21:46:17', '2021-06-08 21:46:17', 'user.fields.password_helper', 'en', 'user.fields.password_helper', NULL),
(139, '2021-06-08 21:46:17', '2021-06-08 21:46:17', 'user.fields.roles_helper', 'en', 'user.fields.roles_helper', NULL),
(140, '2021-06-08 21:46:57', '2021-06-09 21:10:33', 'product_category.title_singular', 'en', 'Product category', NULL),
(141, '2021-06-08 21:46:57', '2021-06-09 21:11:06', 'product_category.fields.title', 'en', 'Product category', NULL),
(142, '2021-06-08 21:46:57', '2021-06-09 21:11:22', 'product_category.fields.created_at', 'en', 'created_at', NULL),
(143, '2021-06-08 21:47:00', '2021-06-08 21:47:00', 'main', 'en', 'main', NULL),
(144, '2021-06-08 21:47:01', '2021-06-08 21:47:01', 'Sort', 'en', 'Sort', NULL),
(145, '2021-06-08 21:47:01', '2021-06-09 21:01:10', 'title', 'en', 'Title', NULL),
(146, '2021-06-08 21:47:01', '2021-06-08 21:47:01', 'slug', 'en', 'slug', NULL),
(147, '2021-06-08 21:49:53', '2021-06-08 21:49:53', 'Admin', 'de', 'Admin', NULL),
(148, '2021-06-08 21:50:00', '2021-06-08 21:50:00', 'Admin', 'en', 'Admin', NULL),
(149, '2021-06-08 21:54:43', '2021-06-09 21:12:16', 'payment.title_singular', 'en', 'Payment', NULL),
(150, '2021-06-08 21:54:43', '2021-06-09 21:12:42', 'payment.fields.title', 'en', 'Title', NULL),
(151, '2021-06-08 21:54:43', '2021-06-09 21:13:06', 'payment.fields.description', 'en', 'Description', NULL),
(152, '2021-06-08 21:54:43', '2021-06-09 21:13:19', 'payment.fields.created_at', 'en', 'created_at', NULL),
(153, '2021-06-08 22:03:32', '2021-06-08 22:03:32', 'image-carousel', 'en', 'image-carousel', NULL),
(154, '2021-06-08 22:04:38', '2021-06-09 21:32:18', 'image', 'en', 'Image', NULL),
(155, '2021-06-08 22:04:38', '2021-06-09 21:14:26', 'Admin.Image.Choose', 'en', 'Image choose', NULL),
(156, '2021-06-08 22:04:38', '2021-06-08 22:04:38', 'url', 'en', 'url', NULL),
(157, '2021-06-08 22:04:38', '2021-06-08 22:04:38', 'alt_en', 'en', 'alt_en', NULL),
(158, '2021-06-08 22:04:38', '2021-06-08 22:04:38', 'alt_de', 'en', 'alt_de', NULL),
(159, '2021-06-08 22:19:05', '2021-06-09 21:15:04', 'product.title_singular', 'en', 'Product', NULL),
(160, '2021-06-08 22:19:05', '2021-06-09 21:15:27', 'global.list', 'en', 'List', NULL),
(161, '2021-06-08 22:19:39', '2021-06-08 22:19:39', 'order.title_singular', 'en', 'order.title_singular', NULL),
(162, '2021-06-08 22:19:39', '2021-06-08 22:19:39', 'order.fields.created_at', 'en', 'order.fields.created_at', NULL),
(163, '2021-06-08 22:19:55', '2021-06-09 21:16:15', 'Product Category Id', 'en', 'Product category', NULL),
(164, '2021-06-08 22:19:55', '2021-06-09 21:16:47', 'Supplier Id', 'en', 'Supplier', NULL),
(165, '2021-06-08 22:34:56', '2021-06-09 21:05:22', 'von', 'en', 'of', NULL),
(166, '2021-06-08 22:34:56', '2021-06-08 22:34:56', 'Add to cart', 'en', 'Add to cart', NULL),
(167, '2021-06-08 22:34:56', '2021-06-08 22:34:56', 'Good appetite', 'en', 'Good appetite', NULL),
(168, '2021-06-08 22:35:06', '2021-06-08 22:35:06', 'Enable', 'en', 'Enable', NULL),
(169, '2021-06-08 22:35:29', '2021-06-08 22:35:29', 'Add to Card', 'en', 'Add to Card', NULL),
(170, '2021-06-08 22:35:29', '2021-06-08 22:35:29', 'Your product added to the cart', 'en', 'Your product added to the cart', NULL),
(171, '2021-06-08 22:35:29', '2021-06-08 22:35:29', 'to Cart', 'en', 'to Cart', NULL),
(172, '2021-06-08 22:35:29', '2021-06-08 22:35:29', 'Availability', 'en', 'Availability', NULL),
(173, '2021-06-08 22:35:29', '2021-06-08 22:35:29', 'In Stock', 'en', 'In Stock', NULL),
(174, '2021-06-09 12:09:32', '2021-06-09 21:17:15', 'Add to cart', 'de', 'In den Warenkorb legen', NULL),
(175, '2021-06-09 12:09:34', '2021-06-09 21:17:28', 'Add to Card', 'de', 'In den Warenkorb legen', NULL),
(176, '2021-06-09 12:09:34', '2021-06-09 21:17:52', 'Your product added to the cart', 'de', 'Ihr Produkt wurde in den Warenkorb gelegt', NULL),
(177, '2021-06-09 12:09:34', '2021-06-09 21:18:33', 'to Cart', 'de', 'zum Warenkorb', NULL),
(178, '2021-06-09 12:09:34', '2021-06-09 21:18:55', 'Availability', 'de', 'Verfügbarkeit', NULL),
(179, '2021-06-09 12:09:34', '2021-06-09 21:19:13', 'In Stock', 'de', 'Auf Lager', NULL),
(180, '2021-06-09 12:21:38', '2021-06-09 21:19:41', 'Back', 'de', 'Zurück', NULL),
(181, '2021-06-09 12:22:20', '2021-06-09 21:20:03', 'Clear cart', 'de', 'Warenkorb leeren', NULL),
(182, '2021-06-09 12:22:21', '2021-06-09 21:20:37', 'Choose your payment', 'de', 'Wählen Sie Ihre Zahlung', NULL),
(183, '2021-06-09 12:22:21', '2021-06-09 21:21:16', 'Write your wishes for the order', 'de', 'Schreiben Ihre Wünsche für die Bestellung', NULL),
(184, '2021-06-09 12:22:21', '2021-06-09 21:21:36', 'Cart total', 'de', 'Warenkorb gesamt', NULL),
(185, '2021-06-09 12:22:21', '2021-06-09 21:22:17', 'Please sign or register', 'de', 'Bitte anmelden oder registrieren', NULL),
(186, '2021-06-09 12:22:21', '2021-06-09 21:22:40', 'Buy', 'de', 'Kaufen', NULL),
(187, '2021-06-09 12:23:15', '2021-06-09 21:23:15', 'Date', 'de', 'Datum', NULL),
(188, '2021-06-09 12:38:20', '2021-06-09 21:06:20', 'add', 'de', 'hinzufügen', NULL),
(189, '2021-06-09 12:38:20', '2021-06-09 15:29:07', 'permission.title_singular', 'de', 'Berechtigung', NULL),
(190, '2021-06-09 12:38:20', '2021-06-09 15:29:32', 'permission.fields.title', 'de', 'Berechtigung', NULL),
(191, '2021-06-09 12:38:20', '2021-06-09 21:08:38', 'view', 'de', 'ansehen', NULL),
(192, '2021-06-09 12:38:20', '2021-06-09 21:07:28', 'edit', 'de', 'bearbeiten', NULL),
(193, '2021-06-09 12:38:20', '2021-06-09 21:09:06', 'delete', 'de', 'löschen', NULL),
(194, '2021-06-09 12:38:27', '2021-06-09 12:38:27', 'user.fields.name_helper', 'de', 'user.fields.name_helper', NULL),
(195, '2021-06-09 12:38:27', '2021-06-09 12:38:27', 'user.fields.email_helper', 'de', 'user.fields.email_helper', NULL),
(196, '2021-06-09 12:38:27', '2021-06-09 21:09:55', 'user.fields.password', 'de', 'Passwort', NULL),
(197, '2021-06-09 12:38:27', '2021-06-09 12:38:27', 'user.fields.password_helper', 'de', 'user.fields.password_helper', NULL),
(198, '2021-06-09 12:38:27', '2021-06-09 12:38:27', 'user.fields.roles_helper', 'de', 'user.fields.roles_helper', NULL),
(199, '2021-06-09 12:38:27', '2021-06-09 21:07:01', 'save', 'de', 'speichern', NULL),
(200, '2021-06-09 12:38:32', '2021-06-09 15:26:54', 'role.title_singular', 'de', 'Rolle', NULL),
(201, '2021-06-09 12:38:32', '2021-06-09 15:27:25', 'role.fields.title', 'de', 'Rolle', NULL),
(202, '2021-06-09 12:38:32', '2021-06-09 15:27:51', 'role.fields.permissions', 'de', 'Berechtigungen', NULL),
(203, '2021-06-09 12:38:36', '2021-06-09 12:38:36', 'Name', 'de', 'Name', NULL),
(204, '2021-06-09 12:38:36', '2021-06-09 21:07:54', 'role.fields.permissions_helper', 'de', 'permissions_helper', NULL),
(205, '2021-06-09 12:38:46', '2021-06-09 21:23:44', 'Whole order for today', 'de', 'Ganze Bestellung für heute', NULL),
(206, '2021-06-09 12:38:56', '2021-06-09 21:24:11', 'Whole order', 'de', 'Ganze Bestellung', NULL),
(207, '2021-06-09 12:40:25', '2021-06-09 21:24:42', 'Cart is empty', 'de', 'Einkaufswagen ist leer', NULL),
(208, '2021-06-09 13:15:22', '2021-06-09 21:25:20', 'Order closed', 'de', 'Bestellung geschlossen', NULL),
(209, '2021-06-09 13:31:57', '2021-06-09 21:06:41', 'create', 'de', 'erstellen', NULL),
(210, '2021-06-09 13:31:57', '2021-06-09 21:12:16', 'payment.title_singular', 'de', 'Zahlung', NULL),
(211, '2021-06-09 13:31:57', '2021-06-09 21:12:42', 'payment.fields.title', 'de', 'Titel', NULL),
(212, '2021-06-09 13:31:57', '2021-06-09 21:13:06', 'payment.fields.description', 'de', 'Beschreibung', NULL),
(213, '2021-06-09 13:31:57', '2021-06-09 21:13:19', 'payment.fields.created_at', 'de', 'created_at', NULL),
(214, '2021-06-09 13:33:01', '2021-06-09 13:33:01', 'Whole order for today', 'en', 'Whole order for today', NULL),
(215, '2021-06-09 13:33:19', '2021-06-09 13:33:19', 'Clear cart', 'en', 'Clear cart', NULL),
(216, '2021-06-09 13:33:19', '2021-06-09 13:33:19', 'Choose your payment', 'en', 'Choose your payment', NULL),
(217, '2021-06-09 13:33:19', '2021-06-09 13:33:19', 'Write your wishes for the order', 'en', 'Write your wishes for the order', NULL),
(218, '2021-06-09 13:33:19', '2021-06-09 13:33:19', 'Cart total', 'en', 'Cart total', NULL),
(219, '2021-06-09 13:33:19', '2021-06-09 13:33:19', 'Please sign or register', 'en', 'Please sign or register', NULL),
(220, '2021-06-09 13:33:19', '2021-06-09 13:33:19', 'Buy', 'en', 'Buy', NULL),
(221, '2021-06-09 15:16:30', '2021-06-09 15:28:15', 'Translations', 'de', 'Übersetzungen', NULL),
(222, '2021-06-09 15:16:30', '2021-06-09 15:28:36', 'Key', 'de', 'Schlüssel', NULL),
(223, '2021-06-09 15:16:30', '2021-06-09 15:16:30', 'EN', 'de', 'EN', NULL),
(224, '2021-06-09 15:16:30', '2021-06-09 15:16:30', 'DE', 'de', 'DE', NULL),
(225, '2021-06-09 15:18:44', '2021-06-09 15:18:44', 'Guard Name', 'de', 'Guard Name', NULL),
(226, '2021-06-09 15:19:28', '2021-06-09 21:25:53', 'Add new', 'de', 'Neu hinzufügen', NULL),
(227, '2021-06-09 15:19:38', '2021-06-09 21:26:47', 'global.edit', 'de', 'bearbeiten', NULL),
(228, '2021-06-09 15:19:38', '2021-06-09 21:27:46', 'global.translation.title_singular', 'de', 'Übersetzung', NULL),
(229, '2021-06-09 15:19:38', '2021-06-09 15:19:38', 'key_helper', 'de', 'key_helper', NULL),
(230, '2021-06-09 15:19:38', '2021-06-09 15:19:38', 'value_helper', 'de', 'value_helper', NULL),
(231, '2021-06-09 15:24:19', '2021-06-09 15:24:19', 'ID', 'de', 'ID', NULL),
(232, '2021-06-09 15:25:11', '2021-06-09 15:25:11', 'message', 'de', 'Nachricht', NULL),
(233, '2021-06-09 15:32:21', '2021-06-09 15:32:21', 'Choose the dish and                                                drink', 'en', '', NULL),
(234, '2021-06-09 19:02:51', '2021-06-09 21:28:51', 'contact-form', 'de', 'Kontaktformular', NULL),
(235, '2021-06-09 19:02:57', '2021-06-09 21:29:41', 'show', 'de', 'zeigen', NULL),
(236, '2021-06-09 19:02:57', '2021-06-09 21:30:11', 'role.title', 'de', 'Rolle', NULL),
(237, '2021-06-09 19:02:57', '2021-06-09 21:30:47', 'permissions', 'de', 'Berechtigungen', NULL),
(238, '2021-06-09 19:03:14', '2021-06-09 21:31:06', 'permission.title', 'de', 'Berechtigungen', NULL),
(239, '2021-06-09 19:03:14', '2021-06-09 21:31:47', 'permission', 'de', 'Berechtigung', NULL),
(240, '2021-06-09 19:03:48', '2021-06-09 21:10:33', 'product_category.title_singular', 'de', 'Produktkategorie', NULL),
(241, '2021-06-09 19:03:48', '2021-06-09 21:11:06', 'product_category.fields.title', 'de', 'Produktkategorie', NULL),
(242, '2021-06-09 19:03:48', '2021-06-09 21:11:22', 'product_category.fields.created_at', 'de', 'created_at', NULL),
(243, '2021-06-09 19:04:06', '2021-06-09 19:04:06', 'main', 'de', 'main', NULL),
(244, '2021-06-09 19:04:06', '2021-06-09 21:11:36', 'Sort', 'de', 'Sorte', NULL),
(245, '2021-06-09 19:04:06', '2021-06-09 19:04:06', 'slug', 'de', 'slug', NULL),
(246, '2021-06-09 19:08:54', '2021-06-09 21:34:21', 'product_category.fields.sort', 'de', 'Sorte', NULL),
(247, '2021-06-09 19:08:54', '2021-06-09 21:35:39', 'product_category.fields.content', 'de', 'Inhalt', NULL),
(248, '2021-06-09 19:08:54', '2021-06-09 21:34:57', 'product_category.fields.status', 'de', 'Status', NULL),
(249, '2021-06-09 19:08:54', '2021-06-09 21:36:04', 'product_category.fields.parent_id', 'de', 'parent_id', NULL),
(250, '2021-06-09 19:09:07', '2021-06-09 21:32:18', 'Image', 'de', 'Bild', NULL),
(251, '2021-06-09 19:09:07', '2021-06-09 21:14:26', 'Admin.Image.Choose', 'de', 'Bildauswahl', NULL),
(252, '2021-06-09 19:18:37', '2021-06-09 21:15:04', 'product.title_singular', 'de', 'Produkt', NULL),
(253, '2021-06-09 19:18:37', '2021-06-09 21:15:27', 'global.list', 'de', 'Liste', NULL),
(254, '2021-06-09 19:22:03', '2021-06-09 21:16:15', 'Product Category Id', 'de', 'Produktkategorie', NULL),
(255, '2021-06-09 19:22:03', '2021-06-09 21:16:47', 'Supplier Id', 'de', 'Lieferant', NULL),
(256, '2021-06-09 20:13:00', '2021-06-09 21:28:31', 'contact-form', 'en', 'contact form', NULL),
(257, '2021-06-09 20:24:33', '2021-06-09 21:36:50', 'supplier.title_singular', 'en', 'Supplier', NULL),
(258, '2021-06-09 20:24:33', '2021-06-09 21:33:19', 'supplier.fields.name', 'en', 'Name', NULL),
(259, '2021-06-09 20:24:33', '2021-06-09 21:32:35', 'supplier.fields.verified_at', 'en', 'verified_at', NULL),
(260, '2021-06-09 20:56:05', '2021-06-09 20:56:05', 'Add new', 'en', 'Add new', NULL),
(261, '2021-06-09 20:56:25', '2021-06-09 21:26:47', 'global.edit', 'en', 'edit', NULL),
(262, '2021-06-09 20:56:25', '2021-06-09 21:27:46', 'global.translation.title_singular', 'en', 'Translation', NULL),
(263, '2021-06-09 20:56:25', '2021-06-09 20:56:25', 'key_helper', 'en', 'key_helper', NULL),
(264, '2021-06-09 20:56:25', '2021-06-09 20:56:25', 'value_helper', 'en', 'value_helper', NULL),
(265, '2021-06-09 21:19:41', '2021-06-09 21:19:41', 'Back', 'en', 'Back', NULL),
(266, '2021-06-09 21:23:15', '2021-06-09 21:23:15', 'Date', 'en', 'Date', NULL),
(267, '2021-06-09 21:24:11', '2021-06-09 21:24:11', 'Whole order', 'en', 'Whole order', NULL),
(268, '2021-06-09 21:24:42', '2021-06-09 21:24:42', 'Cart is empty', 'en', 'Cart is empty', NULL),
(269, '2021-06-09 21:25:21', '2021-06-09 21:25:21', 'Order closed', 'en', 'Order closed', NULL),
(270, '2021-06-09 21:29:41', '2021-06-09 21:29:41', 'show', 'en', 'show', NULL),
(271, '2021-06-09 21:30:11', '2021-06-09 21:30:11', 'role.title', 'en', 'Role', NULL),
(272, '2021-06-09 21:30:47', '2021-06-09 21:30:47', 'permissions', 'en', 'Permissions', NULL),
(273, '2021-06-09 21:31:06', '2021-06-09 21:31:06', 'permission.title', 'en', 'Permissions', NULL),
(274, '2021-06-09 21:31:47', '2021-06-09 21:31:47', 'permission', 'en', 'Permission', NULL),
(275, '2021-06-09 21:32:35', '2021-06-09 21:32:35', 'supplier.fields.verified_at', 'de', 'verified_at', NULL),
(276, '2021-06-09 21:33:19', '2021-06-09 21:33:19', 'supplier.fields.name', 'de', 'Name', NULL),
(277, '2021-06-09 21:34:21', '2021-06-09 21:34:21', 'product_category.fields.sort', 'en', 'Sort', NULL),
(278, '2021-06-09 21:34:58', '2021-06-09 21:34:58', 'product_category.fields.status', 'en', 'Status', NULL),
(279, '2021-06-09 21:35:39', '2021-06-09 21:35:39', 'product_category.fields.content', 'en', 'Content', NULL),
(280, '2021-06-09 21:36:04', '2021-06-09 21:36:04', 'product_category.fields.parent_id', 'en', 'parent_id', NULL),
(281, '2021-06-09 21:36:50', '2021-06-09 21:36:50', 'supplier.title_singular', 'de', 'Lieferant', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$GJxdiV3f9fwDGeHru7Xkeem2ED4iTzGvsGJD.6qldEpQo7c.UJIgW', NULL, NULL, NULL, '2021-06-08 16:12:40', '2021-06-08 21:46:43'),
(2, 'andrii', 'andrii@gmail.com', NULL, '$2y$10$GJxdiV3f9fwDGeHru7Xkeem2ED4iTzGvsGJD.6qldEpQo7c.UJIgW', NULL, NULL, NULL, '2021-06-08 16:13:18', '2021-06-08 16:13:18');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `contact_forms`
--
ALTER TABLE `contact_forms`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Індекси таблиці `image_carousels`
--
ALTER TABLE `image_carousels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image_carousels_key_unique` (`key`);

--
-- Індекси таблиці `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Індекси таблиці `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Індекси таблиці `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

--
-- Індекси таблиці `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_product_id_foreign` (`product_id`);

--
-- Індекси таблиці `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Індекси таблиці `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `payment_translations`
--
ALTER TABLE `payment_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_translations_payment_id_locale_unique` (`payment_id`,`locale`),
  ADD KEY `payment_translations_locale_index` (`locale`);

--
-- Індекси таблиці `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Індекси таблиці `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_product_category_id_foreign` (`product_category_id`),
  ADD KEY `products_supplier_id_foreign` (`supplier_id`);

--
-- Індекси таблиці `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_slug_unique` (`slug`);

--
-- Індекси таблиці `product_category_translations`
--
ALTER TABLE `product_category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_category_translations_product_category_id_locale_unique` (`product_category_id`,`locale`),
  ADD UNIQUE KEY `product_category_translations_slug_unique` (`slug`),
  ADD KEY `product_category_translations_locale_index` (`locale`);

--
-- Індекси таблиці `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_translations_product_id_locale_unique` (`product_id`,`locale`),
  ADD UNIQUE KEY `product_translations_slug_unique` (`slug`),
  ADD KEY `product_translations_locale_index` (`locale`);

--
-- Індекси таблиці `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Індекси таблиці `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Індекси таблиці `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`),
  ADD UNIQUE KEY `suppliers_slug_unique` (`slug`);

--
-- Індекси таблиці `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_key_locale_unique` (`key`,`locale`),
  ADD KEY `translations_locale_index` (`locale`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `contact_forms`
--
ALTER TABLE `contact_forms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `image_carousels`
--
ALTER TABLE `image_carousels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблиці `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблиці `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблиці `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `payment_translations`
--
ALTER TABLE `payment_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблиці `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблиці `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT для таблиці `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблиці `product_category_translations`
--
ALTER TABLE `product_category_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблиці `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT для таблиці `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблиці `translations`
--
ALTER TABLE `translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `payment_translations`
--
ALTER TABLE `payment_translations`
  ADD CONSTRAINT `payment_translations_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`),
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `product_category_translations`
--
ALTER TABLE `product_category_translations`
  ADD CONSTRAINT `product_category_translations_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
