-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2025 at 08:36 AM
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
-- Database: `gestion_stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `description`, `logo_path`, `created_at`, `updated_at`) VALUES
(1, 'Zara', 'zara', 'Modern clothing with minimalist style.', NULL, NULL, NULL),
(2, 'H&M', 'hm', 'Affordable fashion for all genders.', NULL, NULL, NULL),
(3, 'Nike', 'nike', 'Sportswear and performance gear.', NULL, NULL, NULL),
(4, 'Adidas', 'adidas', 'Athletic wear and casual fashion.', NULL, NULL, NULL),
(5, 'Pull&Bear', 'pullbear', 'Youth lifestyle clothing.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tops', NULL, NULL),
(2, 'Bottoms', NULL, NULL),
(3, 'Outerwear', NULL, NULL),
(4, 'Shoes', NULL, NULL),
(5, 'Accessories', NULL, NULL),
(6, 'Dresses', NULL, NULL),
(7, 'Underwear', NULL, NULL),
(8, 'Sportswear', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `hex_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `hex_code`, `created_at`, `updated_at`) VALUES
(1, 'Black', '#000000', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(2, 'White', '#FFFFFF', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(3, 'Gray', '#808080', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(4, 'Light Gray', '#D3D3D3', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(5, 'Dark Gray', '#4A4A4A', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(6, 'Red', '#FF0000', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(7, 'Dark Red', '#8B0000', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(8, 'Pink', '#F8C8DC', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(9, 'Hot Pink', '#FF69B4', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(10, 'Burgundy', '#800020', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(11, 'Orange', '#FFA500', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(12, 'Brown', '#8B4513', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(13, 'Beige', '#F5F5DC', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(14, 'Cream', '#FFFDD0', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(15, 'Yellow', '#FFFF00', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(16, 'Mustard', '#FFDB58', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(17, 'Green', '#008000', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(18, 'Dark Green', '#006400', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(19, 'Light Green', '#90EE90', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(20, 'Olive', '#808000', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(21, 'Mint', '#98FF98', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(22, 'Blue', '#0000FF', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(23, 'Navy', '#000080', '2025-11-25 17:51:04', '2025-11-25 17:51:04'),
(24, 'Sky Blue', '#87CEEB', '2025-11-25 17:51:04', '2025-11-25 17:51:04'),
(25, 'Royal Blue', '#4169E1', '2025-11-25 17:51:04', '2025-11-25 17:51:04'),
(26, 'Turquoise', '#40E0D0', '2025-11-25 17:51:04', '2025-11-25 17:51:04'),
(27, 'Purple', '#800080', '2025-11-25 17:51:04', '2025-11-25 17:51:04'),
(28, 'Lavender', '#E6E6FA', '2025-11-25 17:51:04', '2025-11-25 17:51:04'),
(29, 'Violet', '#8A2BE2', '2025-11-25 17:51:04', '2025-11-25 17:51:04'),
(30, 'light purple', '#D8BFD8', '2025-11-25 21:53:22', '2025-11-25 21:53:22');

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
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Men', NULL, NULL),
(2, 'Women', NULL, NULL),
(3, 'Kids', NULL, NULL),
(4, 'Unisex', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_20_141032_create_brands_table', 1),
(5, '2025_11_20_141057_create_categories_table', 1),
(6, '2025_11_20_141112_create_genders_table', 1),
(7, '2025_11_20_141407_create_product_types_table', 1),
(8, '2025_11_20_141426_create_products_table', 1),
(9, '2025_11_20_141445_create_colors_table', 1),
(10, '2025_11_20_151724_create_product_colors_table', 1),
(11, '2025_11_20_152051_create_product_color_images_table', 1),
(12, '2025_11_20_152309_create_sizes_table', 1),
(13, '2025_11_20_152314_create_product_sizes_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `product_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `brand_id`, `category_id`, `gender_id`, `product_type_id`, `created_at`, `updated_at`) VALUES
(1, 'T-Shirts AswwI', 'Ipsum nam iusto distinctio est necessitatibus molestias magnam. Hic nihil modi voluptatem dolor. Nisi modi nesciunt labore nemo illo blanditiis.', 671.80, 5, 1, 3, 1, '2025-11-25 17:51:04', '2025-11-25 17:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(1, 1, 10, NULL, NULL),
(3, 1, 5, NULL, NULL),
(4, 1, 8, NULL, NULL),
(5, 1, 13, NULL, NULL),
(6, 1, 30, '2025-11-25 21:54:04', '2025-11-25 21:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_color_images`
--

CREATE TABLE `product_color_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_color_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `is_main` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_color_images`
--

INSERT INTO `product_color_images` (`id`, `product_color_id`, `image_path`, `is_main`, `created_at`, `updated_at`) VALUES
(1, 1, 'products/1/colors/10/image1.jpg', 0, NULL, NULL),
(3, 3, 'products/1/colors/8/image1.jpg', 0, NULL, NULL),
(4, 5, 'products/1/colors/13/image1.jpg', 0, NULL, NULL),
(5, 6, 'products/1/colors/30/image1.jpg\r\n', 0, '2025-11-25 21:55:08', '2025-11-25 21:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2025-11-25 17:51:04', '2025-11-25 17:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'T-Shirts', 't-shirts', 1, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(2, 'Polos', 'polos', 1, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(3, 'Shirts', 'shirts', 1, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(4, 'Blouses', 'blouses', 1, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(5, 'Hoodies', 'hoodies', 1, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(6, 'Sweatshirts', 'sweatshirts', 1, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(7, 'Tank Tops', 'tank-tops', 1, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(8, 'Crop Tops', 'crop-tops', 1, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(9, 'Long Sleeve Tops', 'long-sleeve-tops', 1, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(10, 'Knitwear', 'knitwear', 1, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(11, 'Sweaters', 'sweaters', 1, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(12, 'Cardigans', 'cardigans', 1, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(13, 'Sports Tops', 'sports-tops', 1, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(14, 'Jerseys', 'jerseys', 1, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(15, 'Vests', 'vests', 1, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(16, 'Jeans', 'jeans', 2, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(17, 'Pants', 'pants', 2, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(18, 'Sweatpants', 'sweatpants', 2, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(19, 'Shorts', 'shorts', 2, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(20, 'Leggings', 'leggings', 2, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(21, 'Skirts', 'skirts', 2, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(22, 'Cargo Pants', 'cargo-pants', 2, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(23, 'Dress Pants', 'dress-pants', 2, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(24, 'Chinos', 'chinos', 2, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(25, 'Joggers', 'joggers', 2, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(26, 'Culottes', 'culottes', 2, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(27, 'Jackets', 'jackets', 3, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(28, 'Coats', 'coats', 3, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(29, 'Parkas', 'parkas', 3, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(30, 'Blazers', 'blazers', 3, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(31, 'Denim Jackets', 'denim-jackets', 3, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(32, 'Leather Jackets', 'leather-jackets', 3, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(33, 'Windbreakers', 'windbreakers', 3, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(34, 'Tracksuits', 'tracksuits', 3, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(35, 'Puffer Jackets', 'puffer-jackets', 3, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(36, 'Sneakers', 'sneakers', 4, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(37, 'Boots', 'boots', 4, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(38, 'Sandals', 'sandals', 4, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(39, 'Heels', 'heels', 4, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(40, 'Flats', 'flats', 4, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(41, 'Running Shoes', 'running-shoes', 4, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(42, 'Loafers', 'loafers', 4, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(43, 'Slippers', 'slippers', 4, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(44, 'Bags', 'bags', 5, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(45, 'Backpacks', 'backpacks', 5, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(46, 'Belts', 'belts', 5, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(47, 'Caps', 'caps', 5, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(48, 'Hats', 'hats', 5, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(49, 'Scarves', 'scarves', 5, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(50, 'Gloves', 'gloves', 5, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(51, 'Wallets', 'wallets', 5, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(52, 'Socks', 'socks', 5, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(53, 'Sunglasses', 'sunglasses', 5, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(54, 'Jewelry', 'jewelry', 5, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(55, 'Watches', 'watches', 5, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(56, 'Mini Dress', 'mini-dress', 6, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(57, 'Midi Dress', 'midi-dress', 6, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(58, 'Maxi Dress', 'maxi-dress', 6, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(59, 'Evening Dress', 'evening-dress', 6, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(60, 'Casual Dress', 'casual-dress', 6, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(61, 'Bodycon Dress', 'bodycon-dress', 6, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(62, 'Boxers', 'boxers', 7, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(63, 'Briefs', 'briefs', 7, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(64, 'Bras', 'bras', 7, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(65, 'Lingerie', 'lingerie', 7, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(66, 'Undershirts', 'undershirts', 7, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(67, 'Gym Tops', 'gym-tops', 8, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(68, 'Gym Shorts', 'gym-shorts', 8, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(69, 'Compression Wear', 'compression-wear', 8, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(70, 'Swimwear', 'swimwear', 8, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(71, 'Tracksuit Pants', 'tracksuit-pants', 8, '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(72, 'Sports Bras', 'sports-bras', 8, '2025-11-25 17:51:03', '2025-11-25 17:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1DRH9yR6iWjCCZGQNz29CNSul1WTxCUNDJm0mS3v', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNG5hZkZpWjU1anJzb21Za2V4aW5HVHRKQkphNlFtaVhrN2hRZGRrdCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZGF0YSI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1764100646),
('DmfWce26AwdE0nDGYzqrHkRdJ03QMGfJ1V7gpMH2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjRkRkg4SWNjQlR3VktDdWdFRWpmeUVGMmxGeThldDJxUTdESGxMaSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZGF0YSI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1764106787),
('E514FWV1qfEHax7nFNzwnheVOoe79wrl4xCwBBvk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUGFZS1ZvUVFkYnFKdEV5TGRmQTk1RFlLS2hDSm5OWlhWMTlwWmlvRCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZGF0YSI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1764107474),
('EFY3AY6KAR5Ay3FJNQN1nNCf1vE3Axhi8NQZjFnU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMjRpcnA1d2s4c1Y0NTRUc2FBdG1wZzgyRjhDQlJ3OVNaUWxVT2pBUiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZGF0YSI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1764107855),
('MVmnDU7qjJoFeu9hEGmGmvyeCxNo1zUpTHaecbYE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZENvVWVGYWdmRjhEWE04YTZUUlMxQmhhN0JKSk14RWdVTnVHaXdZNSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZGF0YSI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1764107733),
('PrxbT8jX1XP8YC6uD6QqERtjw2grV0at29sQIkGZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRzVWZTZScEllSWtNM0ZmOW5nTWgxR2Q5NnhQSDFySXVwT0RDUDZGdSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZGF0YSI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1764107474),
('Q94qAvwpLoLD5zMTsqHQBMXlqi8qzafsc1cJjZbn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZVVlNE16SzhRaHVFZDdHZEYzZ1JxQnZLOE5yQXNqTWpHUGc5SXBhWCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZGF0YSI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1764106788),
('VzPvUDUOUoMdQLUdhmUcnHWK4iZKfM3QzUdsLrvV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibHVpemxCTkJUOEc0OWpYZTNkNFVBQ3ROSVR1TjhzVUE0TXQ1Z0d1bCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZGF0YSI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1764107856),
('WXWb1bjD4q4OuC4v29pkSbq5KNv538rdayhMU9bT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDFsNFRXMXdCYVZ1ODdiVEF0Rk5BeDBFYUlTTXd1cTF5YWtpd1FiSCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZGF0YSI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1764100646),
('yola4YHQ49SAPj1S9jKbu974VGUOYAV9ODwBLq78', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZnNZUk9XNnNXTjZlS3lDemZGbEw5b2hFdVpob05LUWczcXlKdmZObSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZGF0YSI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1764100631),
('zqTqx6JhxFPKzrtyNOqMuxRuBQo0Q0JAey44tm2Y', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRlhBeVR4c084OFAwd0l4ajRFSnhpalBCaWNyckd4SDJHSGhKcnZnRCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZGF0YSI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1764107733);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('letter','numeric','kids') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'XS', 'letter', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(2, 'S', 'letter', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(3, 'M', 'letter', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(4, 'L', 'letter', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(5, 'XL', 'letter', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(6, 'XXL', 'letter', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(7, '34', 'numeric', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(8, '36', 'numeric', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(9, '38', 'numeric', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(10, '40', 'numeric', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(11, '42', 'numeric', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(12, '2', 'kids', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(13, '4', 'kids', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(14, '6', 'kids', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(15, '8', 'kids', '2025-11-25 17:51:03', '2025-11-25 17:51:03'),
(16, '10', 'kids', '2025-11-25 17:51:03', '2025-11-25 17:51:03');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colors_hex_code_unique` (`hex_code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_gender_id_foreign` (`gender_id`),
  ADD KEY `products_product_type_id_foreign` (`product_type_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_color_images`
--
ALTER TABLE `product_color_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_color_images_product_color_id_foreign` (`product_color_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`),
  ADD KEY `product_sizes_size_id_foreign` (`size_id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_types_slug_unique` (`slug`),
  ADD KEY `product_types_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_color_images`
--
ALTER TABLE `product_color_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_product_type_id_foreign` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_color_images`
--
ALTER TABLE `product_color_images`
  ADD CONSTRAINT `product_color_images_product_color_id_foreign` FOREIGN KEY (`product_color_id`) REFERENCES `product_colors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_sizes_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_types`
--
ALTER TABLE `product_types`
  ADD CONSTRAINT `product_types_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
