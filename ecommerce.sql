-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2020 at 01:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin', '01961363543', 'sohidulislam@gmail.com', NULL, '$2y$10$9TNisyyMn5zPyjabW4XfMeCGTm/tHinLzcftT6m8r3n5bPaRfMBDy', NULL, NULL, '2020-03-10 01:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_logo`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'public/media/brand/230320_10_25_34.png', '2020-03-11 22:30:05', '2020-03-23 04:34:25'),
(2, 'Apple', 'public/media/brand/230320_12_25_17.png', '2020-03-11 22:33:57', '2020-03-23 06:17:25'),
(9, 'Rado', 'public/media/brand/230320_10_12_51.png', '2020-03-16 04:27:00', '2020-03-23 04:51:12'),
(10, 'Canon', 'public/media/brand/230320_11_14_10.png', '2020-03-17 22:58:17', '2020-03-23 05:10:14'),
(12, 'Sony', 'public/media/brand/230320_10_48_34.jpg', '2020-03-23 04:34:48', '2020-03-23 04:34:48'),
(13, 'Huawei', 'public/media/brand/230320_10_18_35.jpg', '2020-03-23 04:35:18', '2020-03-23 04:35:18'),
(14, 'Lenovo', 'public/media/brand/230320_10_43_51.jpg', '2020-03-23 04:51:43', '2020-03-23 04:51:43'),
(15, 'HP', 'public/media/brand/250320_06_06_27.jpg', '2020-03-23 04:53:32', '2020-03-25 00:27:06'),
(16, 'Cats Eye', 'public/media/brand/230320_11_55_10.png', '2020-03-23 05:10:55', '2020-03-23 05:10:55'),
(17, 'DELL', 'public/media/brand/230320_11_26_11.png', '2020-03-23 05:11:26', '2020-03-23 05:11:26'),
(18, 'Plus Point', 'public/media/brand/230320_11_57_12.jpeg', '2020-03-23 05:12:57', '2020-03-23 05:12:57'),
(19, 'Mens World', 'public/media/brand/230320_11_28_13.png', '2020-03-23 05:13:28', '2020-03-23 05:13:28'),
(20, 'Jamuna', 'public/media/brand/230320_11_49_13.jpg', '2020-03-23 05:13:49', '2020-03-23 05:13:49'),
(21, 'Kelvinator', 'public/media/brand/230320_11_18_14.png', '2020-03-23 05:14:18', '2020-03-23 05:14:18'),
(22, 'Walton', 'public/media/brand/230320_11_45_14.png', '2020-03-23 05:14:45', '2020-03-23 05:14:45'),
(23, 'Xiaomi', 'public/media/brand/230320_11_58_14.png', '2020-03-23 05:14:58', '2020-03-23 05:14:58'),
(24, 'Otobi', 'public/media/brand/230320_11_35_15.png', '2020-03-23 05:15:35', '2020-03-23 05:15:35'),
(25, 'Unknown', 'public/media/brand/230320_11_46_16.png', '2020-03-23 05:16:46', '2020-03-23 05:16:46'),
(26, 'Bloom', 'public/media/brand/230320_11_13_17.png', '2020-03-23 05:17:13', '2020-03-23 05:17:13'),
(27, 'JBL', 'public/media/brand/250320_07_49_20.jpeg', '2020-03-25 01:20:49', '2020-03-25 01:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s Fashion', '2020-03-11 04:53:05', '2020-03-23 05:18:36'),
(2, 'Woman\'s Fashion', '2020-03-11 04:53:49', '2020-03-23 05:18:54'),
(4, 'Children', '2020-03-11 06:25:55', '2020-03-11 06:25:55'),
(7, 'Watch', '2020-03-16 04:23:03', '2020-03-16 04:23:03'),
(8, 'Furniture', '2020-03-17 22:56:15', '2020-03-23 05:19:27'),
(9, 'Electronics', '2020-03-18 04:30:45', '2020-03-23 05:19:59'),
(10, 'Health', '2020-03-23 05:27:41', '2020-03-23 05:27:41'),
(11, 'Beauty', '2020-03-23 05:27:58', '2020-03-23 05:27:58'),
(12, 'Sports & Outdoor', '2020-03-23 05:28:17', '2020-03-23 05:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'Dapple_Park_5', '5', '2020-03-15 01:27:10', '2020-03-23 05:53:48'),
(3, 'Dapple_Park_10', '10', '2020-03-15 01:48:10', '2020-03-23 05:54:10'),
(5, 'Dapple_Park_15', '15', '2020-03-23 05:54:22', '2020-03-23 05:54:22'),
(6, 'Dapple_Park_20', '20', '2020-03-23 05:54:31', '2020-03-23 05:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_05_052517_create_admins_table', 1),
(5, '2020_03_10_080649_create_categories_table', 2),
(6, '2020_03_10_080751_create_subcategories_table', 2),
(7, '2020_03_10_080833_create_brands_table', 2),
(8, '2020_03_15_062052_creat_coupons_table', 3),
(10, '2020_03_15_093230_creat_newsletters_table', 4),
(11, '2020_03_16_035420_creat_products_table', 5),
(17, '2020_03_22_042707_create_posts_table', 6),
(18, '2020_03_22_042511_create_post_category_table', 7),
(19, '2020_04_02_065238_create_wishlists_table', 8),
(20, '2020_04_12_101232_create_settings_table', 9),
(21, '2016_06_01_000001_create_oauth_auth_codes_table', 10),
(22, '2016_06_01_000002_create_oauth_access_tokens_table', 10),
(23, '2016_06_01_000003_create_oauth_refresh_tokens_table', 10),
(24, '2016_06_01_000004_create_oauth_clients_table', 10),
(25, '2016_06_01_000005_create_oauth_personal_access_clients_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'sohidulislam@gmail.com', '2020-03-15 04:00:42', '2020-03-15 04:00:42'),
(2, 'test@test.com', '2020-03-15 04:32:28', '2020-03-15 04:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'DvayCwiYKzS3hTwiA8DzyARo2VjB7MvUCtZhNXNw', 'http://localhost', 1, 0, 0, '2020-04-15 03:39:41', '2020-04-15 03:39:41'),
(2, NULL, 'Laravel Password Grant Client', 'GTtr9CJYZmrbyScLiQs1yCwYzTlBCPmpsJBowNKD', 'http://localhost', 0, 1, 0, '2020-04-15 03:39:41', '2020-04-15 03:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-04-15 03:39:41', '2020-04-15 03:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_bn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `post_title_en`, `post_title_bn`, `post_image`, `details_en`, `details_bn`, `created_at`, `updated_at`) VALUES
(1, 1, 'First Blog', 'ফার্স্ট ব্লগ', 'public/media/post/1661957761848163.jpg', '<div align=\"justify\"><font face=\"Arial\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</font></div>', '<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 24px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(248, 249, 250); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং শিল্পের ডামি পাঠ্য। লোরেম ইপসাম 1500 এর দশক থেকে শিল্পের স্ট্যান্ডার্ড ডামি পাঠ্যরূপে রয়েছেন, যখন কোনও অজানা প্রিন্টার একটি প্রকারের গ্যালি নেন এবং কোনও ধরণের নমুনার বই তৈরি করতে স্ক্র্যাম্বল করে bled এটি কেবল পাঁচটি শতাব্দীই বেঁচে নেই, বৈদ্যুতিন টাইপসেটেটিংয়ে ঝাঁপিয়ে পড়েছে, মূলত অপরিবর্তিত রয়েছে। ১৯60০ এর দশকে এটি লোরেম ইপসাম প্যাসেজ সহ লেটারসেট শিট প্রকাশের সাথে জনপ্রিয় হয়েছিল এবং আরও সম্প্রতি এলডাস পেজমেকারের মতো ডেস্কটপ প্রকাশনা সফটওয়্যার সহ লরেম ইপসামের সংস্করণগুলি সহ এটি জনপ্রিয় হয়েছিল।</span>', '2020-03-22 21:58:26', '2020-03-23 06:27:12'),
(2, 2, 'Second Blog', 'সেকেন্ড ব্লগ', 'public/media/post/1661958303795102.png', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', '<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 24px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: pre-wrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(248, 249, 250); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যে কোনও পাঠকের বিন্যাসটি দেখার সময় কোনও পাঠকের পাঠযোগ্য সামগ্রী দ্বারা বিভ্রান্ত হবে। লরেম ইপসাম ব্যবহারের বিষয়টি হ\'ল এটিতে অক্ষরগুলির কম-বেশি স্বাভাবিক বিতরণ থাকে, যেমন \'এখানে সামগ্রী, এখানে সামগ্রী\' ব্যবহার করার বিপরীতে, এটি পড়ার মতো ইংরাজির মতো দেখায়। অনেক ডেস্কটপ প্রকাশনা প্যাকেজ এবং ওয়েব পৃষ্ঠার সম্পাদক এখন লোরেম ইপসামকে তাদের ডিফল্ট মডেল পাঠ্য হিসাবে ব্যবহার করেন এবং \'লরেম ইপসাম\' অনুসন্ধানের ফলে তাদের শৈশবকালীন অনেকগুলি ওয়েবসাইট উন্মোচিত হবে। বিভিন্ন সংস্করণ কয়েক বছর ধরে বিকশিত হয়েছে, কখনও দুর্ঘটনার দ্বারা, কখনও কখনও উদ্দেশ্য (ইনজেকশনের হাস্যরস এবং এর মতো)।</span>', '2020-03-22 22:01:41', '2020-03-23 06:35:49'),
(7, 3, 'Third Blog', 'থার্ড ব্লগ', 'public/media/post/1661958833780693.png', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span>', '<pre class=\"tw-data-text tw-text-large tw-ta\" data-placeholder=\"Translation\" id=\"tw-target-text\" dir=\"ltr\" style=\"unicode-bidi: isolate; font-size: 24px; line-height: 32px; background-color: rgb(248, 249, 250); border: none; padding: 2px 0.14em 2px 0px; position: relative; margin: -2px 0px; resize: none; font-family: inherit; overflow: hidden; text-align: left; width: 277px; white-space: pre-wrap; overflow-wrap: break-word; color: rgb(34, 34, 34); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><span lang=\"bn\">লরেম ইপসামের প্যাসেজের বিভিন্ন প্রকরণ পাওয়া যায় তবে বেশিরভাগই কিছুটা আকারে পরিবর্তিত হয়েছে, ইনজেকশনের রসবোধ দ্বারা বা এলোমেলো শব্দ রয়েছে যা কিছুটা বিশ্বাসযোগ্যও লাগে না look আপনি যদি লরেম ইপসামের একটি প্যাসেজ ব্যবহার করতে যাচ্ছেন তবে আপনার অবশ্যই নিশ্চিত হওয়া দরকার যে পাঠ্যের মাঝে কোনও বিব্রতকর কিছু লুকানো নেই। ইন্টারনেটে সমস্ত লরেম ইপসাম জেনারেটর প্রয়োজনীয় হিসাবে পূর্বনির্ধারিত খণ্ডগুলি পুনরাবৃত্তি করে, এটি এটি ইন্টারনেটে প্রথম সত্য জেনারেটর। এটি লোরেম ইপসাম তৈরি করতে যুক্তিসঙ্গত বলে মনে করে কয়েকটি মডেল বাক্য কাঠামোর সাথে মিলিত 200 টিরও বেশি লাতিন শব্দের একটি অভিধান ব্যবহার করে। উত্পন্ন লোরেম ইপসাম তাই সর্বদা পুনরাবৃত্তি, ইনজেকশনের রসবোধ বা অ-বৈশিষ্ট্যযুক্ত শব্দ ইত্যাদি থেকে মুক্ত etc.</span></pre>', '2020-03-23 06:44:15', '2020-03-23 06:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `category_name_en`, `category_name_bn`, `created_at`, `updated_at`) VALUES
(1, 'Offer', 'অফার', NULL, NULL),
(2, 'Service', 'সার্ভিস', NULL, NULL),
(3, 'Event', 'ইভেন্ট', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `sub_category_id` bigint(20) DEFAULT NULL,
  `brand_id` bigint(20) DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details_sm` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_slider` int(11) DEFAULT NULL,
  `hot_deal` int(11) DEFAULT NULL,
  `best_rated` int(11) DEFAULT NULL,
  `mid_slider` int(11) DEFAULT NULL,
  `hot_new` int(11) DEFAULT NULL,
  `buy_one_get_one` int(11) DEFAULT NULL,
  `trend` int(11) DEFAULT NULL,
  `image_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_three` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `brand_id`, `product_name`, `product_code`, `product_quantity`, `product_details`, `product_details_sm`, `product_color`, `product_size`, `selling_price`, `discount_price`, `video_link`, `main_slider`, `hot_deal`, `best_rated`, `mid_slider`, `hot_new`, `buy_one_get_one`, `trend`, `image_one`, `image_two`, `image_three`, `status`, `created_at`, `updated_at`) VALUES
(2, 7, 7, 9, 'Mens Wood Watch', 'w-782311', '80', '<ul class=\"a-unordered-list a-vertical a-spacing-none\"><li><span class=\"a-list-item\"> \r\n							Imported\r\n							\r\n						</span></li><li><span class=\"a-list-item\"> \r\n							Fashion Elements--The UWOOD MOST wooden strap Series minimalist \r\nunisex couple watches is an retro classical sophisticated design;Walnut \r\nwood grain round case pairing with a slim sliver hands,sliver Arabic \r\nnumerals scale and Hardlex glass;special designed for allergies and \r\nsensitive skin,hypo-allergenic,giving you a maximum comfortable natural \r\nexperience and real feelings\r\n							\r\n						</span></li><li><span class=\"a-list-item\"> \r\n							Hand-Made Wooden Watches--features 100% natural unique vintage \r\nlightweight eco-friendly walnut wood,hand sanded and polished to a \r\nsmooth,protected with Tung oil (Splash-Proof);premium hardwoods do not \r\ndeteriorate or become brittle due to every day wear,durable finish;wood \r\ncolors are naturally derived and no stains,dyes or harsh chemicals\r\n							\r\n						</span></li><li><span class=\"a-list-item\"> \r\n							Imported Japanese Quartz Movement: Quartz movement operates on a \r\nbattery power source, which offers long-lasting use for up to about 2 \r\nyears. Japanese 2035 Miyota quartz movement, energy saving, ultra-quiet,\r\n which guarantee\'s accurate readings every time.\r\n							\r\n						</span></li><li><span class=\"a-list-item\"> \r\n							Adjustable Band &amp; Folding Clasp--packing with 1 links \r\nremoving tools,can easier to change the watch band size to fit your \r\nwrist anywhere,stainless steel clasp very convenient to take on and \r\noff,with pressing buckle secures the adjustable wood and metal bracelet \r\n(removable metal pins secure links together)\r\n							\r\n						</span></li><li><span class=\"a-list-item\"> \r\n							Perfect Gift Ideas&amp;High Quality Service--our wooden watch are\r\n packed with gift watch boxes,carefully prepared &amp; packaged,it is a \r\nbest gift choice to your loved ones for Xmas,thanksgiving \r\nday,Halloween,birthday,wedding,anniversary,graduation,retirement;100% \r\nMONEY BACK GUARANTEE\r\n							\r\n						</span></li></ul>', NULL, 'white,black,blue,red', NULL, '2000', '900', 'https://www.youtube.com/watch?v=a83hBt2hs1w', 1, NULL, NULL, NULL, 1, NULL, 1, 'public/media/product/1662038598631226.jpg', 'public/media/product/1662038599688728.jpg', 'public/media/product/1662038599740049.jpg', 1, '2020-03-17 23:12:42', '2020-04-02 01:41:32'),
(3, 7, 7, 9, 'Men\'s Brown Watches', 'w-22-rado', '40', 'Swiss watchmaker RADO is recognised the world over for the award winning\r\n materials it has pioneered since its founding in 1917. The HyperChrome \r\nautomatic is crafted from a single sleek piece of injected ceramic, \r\ndoing away with the stainless steel core that was needed for previous \r\nceramic designs. The result? An incredibly smooth and comfortable watch \r\nthat\'s tough too.', NULL, 'Brown,Blue,Gold', 'L,XL', '4500', '4100', 'https://www.youtube.com/watch?v=Cm842nSGxio', 1, 1, NULL, NULL, NULL, NULL, 1, 'public/media/product/1661591001529366.jpg', 'public/media/product/1661943963941071.jpg', 'public/media/product/1661591001612181.jpg', 1, '2020-03-18 00:20:18', '2020-04-05 01:20:35'),
(5, 9, 19, 1, 'Samsung Galaxy S9', 'samsung-101', '40', 'Samsung Galaxy S9 Price in Bangladesh and Full Specifications. Samsung Galaxy S9 is a Smartphone of Samsung. This <strong>Samsung Galaxy S9</strong>\r\n have 4 GB RAM RAM. 64 GB, 128 GB, 256 GB Internal Memory (ROM). \r\nmicroSD, up to 400 GB (uses SIM 2 slot) - dual SIM model only External \r\nMemory Card.\r\n\r\nSamsung Galaxy S9\r\nComes with\r\n\r\n5.8 inches, 84.8 cm2 (~83.6% screen-to-body ratio),\r\n\r\nSuper AMOLED capacitive touchscreen, 16M Colors.\r\n\r\n\r\nDisplay with a Resolution of\r\n1440 x 2960 pixels, 18.5:9 ratio.\r\n\r\nAt a pixel density of \r\n570 ppi density (ppi). \r\n\r\n\r\n<strong>Samsung Galaxy S9</strong> measures\r\n\r\n\r\n147.7 x 68.7 x 8.5 mm (5.81 x 2.70 x 0.33 in) (height x width x thickness)\r\n\r\n\r\nand weighs\r\n163 g (5.75 oz) (grams).\r\n\r\nIt\'s performing \r\nOcta-core (4x2.7 GHz Mongoose M3 &amp; 4x1.8 GHz Cortex-A55).\r\n\r\nOperating System\r\nAndroid 8.0,\r\n\r\nVersion\r\nOreo.\r\n\r\nConnectivity options on the Samsung Galaxy S9 include \r\n\r\nWifi:\r\nWi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, Hotspot,\r\n\r\n\r\nBluetooth:\r\n5.0, A2DP, LE, aptX,\r\n\r\nGPS:\r\nYes, with A-GPS, GLONASS, BDS, GALILEO.\r\n\r\n It\'s Official Price is 90,990.00 Taka (Bangladeshi).', NULL, 'Midnight Black, Coral Blue, Titanium Gray, Lilac Purple, Burgundy Red, Sunrise Gold, Ice Blue', NULL, '80000', '5000', 'https://www.youtube.com/watch?v=Gzy_nCkn88U', NULL, NULL, 1, NULL, NULL, NULL, NULL, 'public/media/product/1662039472368179.jpg', 'public/media/product/1662039472404485.jpg', 'public/media/product/1662039472431180.jpg', 1, '2020-03-18 04:42:44', '2020-03-24 04:05:57'),
(6, 9, 19, 1, 'Samsung Galaxy S10', 'samsung-102', '40', 'Samsung Galaxy S10 Price in Bangladesh and Full Specifications. Samsung Galaxy S10 is a Smartphone of Samsung. This <strong>Samsung Galaxy S10</strong>\r\n have 8 GB RAM. 128 GB, 512 GB Internal Memory (ROM). microSD, up to 512\r\n GB (uses SIM 2 slot) - Dual SIM model only External Memory Card.\r\n\r\nSamsung Galaxy S10\r\nComes with\r\n\r\n6.1 inches, 93.2 cm2 (~88.3% screen-to-body ratio),\r\n\r\nDynamic AMOLED capacitive touchscreen, 16M Colors.\r\n\r\n\r\nDisplay with a Resolution of\r\n1440 x 3040 pixels, 19:9 ratio.\r\n\r\nAt a pixel density of \r\n550 ppi density (ppi). \r\n\r\n\r\n<strong>Samsung Galaxy S10</strong> measures\r\n\r\n\r\n149.9 x 70.4 x 7.8 mm (5.90 x 2.77 x 0.31 in) (height x width x thickness)\r\n\r\n\r\nand weighs\r\n157 g (5.54 oz) (grams).\r\n\r\nIt\'s performing \r\nOcta-core (2x2.7 GHz Mongoose M4 &amp; 2x2.3 GHz Cortex-A75 &amp; 4x1.9 GHz Cortex-A55)<br>Octa-core (1x2.8 GHz Kryo 485 &amp; 3x2.4 GHz Kryo 485 &amp; 4x1.7 GHz Kryo 485).\r\n\r\nOperating System\r\nAndroid,\r\n\r\nVersion\r\n9.0 (Pie).\r\n\r\nConnectivity options on the Samsung Galaxy S10 include \r\n\r\nWifi:\r\nWi-Fi 802.11 a/b/g/n/ac/ax, dual-band, Wi-Fi Direct, Hotspot,\r\n\r\n\r\nBluetooth:\r\n5.0, A2DP, LE, aptX,\r\n\r\nGPS:\r\nYes, with A-GPS, GLONASS, BDS, GALILEO.\r\n\r\n It\'s Official Price is 89,990.00 Taka (Bangladeshi).', NULL, 'Prism White, Prism Black, Prism Green, Prism Blue,Prism Red', NULL, '89900', NULL, 'https://www.youtube.com/watch?v=QjBgQYHW5pE', NULL, NULL, NULL, NULL, 1, NULL, NULL, 'public/media/product/1662041616590145.jpg', 'public/media/product/1662041616660177.jpg', 'public/media/product/1662041616692819.jpg', 1, '2020-03-24 04:40:02', '2020-03-24 04:40:02'),
(7, 7, 7, 9, 'Men\'s Leather Watch', 'w-31234', '100', '<p>                                        \r\n                                    </p><div class=\"attribute\">\r\n                <span class=\"label\">Case Size:</span> <span class=\"value\">46 mm</span>\r\n            </div><p>\r\n        \r\n            </p><div class=\"attribute\">\r\n                <span class=\"label\">Movement:</span> <span class=\"value\">Chronograph</span>\r\n            </div><p>\r\n        \r\n            </p><div class=\"attribute\">\r\n                <span class=\"label\">Platform:</span> <span class=\"value\">FORRESTER CHRONO</span>\r\n            </div><p>\r\n        \r\n            </p><div class=\"attribute\">\r\n                <span class=\"label\">Strap Material:</span> <span class=\"value\">Leather</span>\r\n            </div><p>\r\n        \r\n            </p><div class=\"attribute\">\r\n                <span class=\"label\">Water Resistance:</span> <span class=\"value\">5 ATM</span>\r\n            </div><p>\r\n        \r\n    \r\n\r\n    \r\n\r\n	\r\n\r\n\r\n\r\n\r\n       	\r\n    \r\n\r\n    \r\n        \r\n            </p><div class=\"attribute view-more-attribute show\">\r\n                <span class=\"label\">Case Color:</span> <span class=\"value\">Silver</span>\r\n            </div><p>\r\n        \r\n            </p><div class=\"attribute view-more-attribute show\">\r\n                <span class=\"label\">Dial Colour:</span> <span class=\"value\">Cream</span>\r\n            </div><p>\r\n        \r\n            </p><div class=\"attribute view-more-attribute show\">\r\n                <span class=\"label\">Strap Fashion Colour:</span> <span class=\"value\">Brown</span>\r\n            </div><p>\r\n        \r\n            </p><div class=\"attribute view-more-attribute show\">\r\n                <span class=\"label\">Interchangeable Compatibility:</span> <span class=\"value\">24 mm</span>\r\n            </div><p>\r\n        \r\n            </p><div class=\"attribute view-more-attribute show\">\r\n                <span class=\"label\">Strap Width:</span> <span class=\"value\">24 mm</span>\r\n            </div><p>\r\n        \r\n            </p><div class=\"attribute view-more-attribute show\">\r\n                <span class=\"label\">Closure:</span> <span class=\"value\">Single Prong Strap Buckle</span>\r\n            </div><p>\r\n        \r\n            </p><div class=\"attribute view-more-attribute show\">\r\n                <span class=\"label\">Strap Inner Circumference:</span> <span class=\"value\">200 +/- 5 mm</span>\r\n            </div><p><br></p>', NULL, 'Black,Brown', 'Medium,Big', '3499', NULL, 'https://www.youtube.com/watch?v=pddbaGV0dZI', 1, NULL, NULL, NULL, NULL, 1, NULL, 'public/media/product/1662042017730984.jpg', 'public/media/product/1662121375123980.jpg', 'public/media/product/1662042017790632.jpg', 1, '2020-03-24 04:46:25', '2020-04-05 00:12:40'),
(8, 9, 19, 2, 'iPhone Xr', 'Iphone-111', '38', '<p>Apple iPhone XR smartphone was launched in September 2018. The phone \r\ncomes with a 6.10-inch touchscreen display with a resolution of  \r\n828x1792 pixels at a pixel density of 326 pixels per inch (ppi) and an \r\naspect ratio of 19.5:9.</p><p> Apple iPhone XR is powered by  a hexa-core Apple A12 Bionic processor. It comes with 3GB of RAM.</p><p>The\r\n Apple iPhone XR runs iOS 12 and  is powered by a 2942mAh non-removable \r\nbattery.  The Apple iPhone XR supports wireless charging, as well as \r\nproprietary fast charging.</p><p> As far as the cameras are concerned, \r\nthe Apple iPhone XR on the rear packs a 12-megapixel camera  with an \r\nf/1.8 aperture. The rear camera setup has autofocus. It sports a \r\n7-megapixel camera on the front for selfies, with an f/2.2 aperture.</p><p>Apple\r\n iPhone XR based on iOS 12 and packs 64GB of inbuilt storage. The Apple \r\niPhone XR is a dual-SIM (GSM and GSM) smartphone that accepts Nano-SIM \r\nand eSIM cards.</p><p> Connectivity options on the Apple iPhone XR \r\ninclude Wi-Fi  802.11 a/b/g/n/ac, GPS, Bluetooth v5.00, NFC, Lightning, \r\n3G, and  4G (with support for Band 40 used by some LTE networks in \r\nIndia) with active 4G on both SIM cards. Sensors on the  phone include  \r\naccelerometer,  ambient light sensor,  barometer,  gyroscope,  proximity\r\n sensor, and  compass/ magnetometer. The Apple iPhone XR supports     \r\nface unlock with 3D face recognition.</p><p>The Apple iPhone XR measures\r\n 150.90 x 75.70 x 8.30mm (height x width x thickness)  and weighs 194.00\r\n grams. It was launched in Black, Blue, Coral, Red, White, and  Yellow \r\ncolours. It features an IP67 rating for dust and water protection.</p><p><br></p>', NULL, 'Red,Black,Orange,White', NULL, '85000', '78000', 'https://www.youtube.com/watch?v=xsiV_-o5488', 1, NULL, 1, 1, NULL, NULL, NULL, 'public/media/product/1662042285117392.png', 'public/media/product/1662042285228901.png', 'public/media/product/1662042285285850.png', 1, '2020-03-24 04:50:40', '2020-03-29 04:27:58'),
(9, 9, 19, 2, 'iPhone 11', 'iphone-113', '25', '<span class=\"dtls summary\" style=\"max-height: 334px;\"><span class=\"summary_content\"><p>The\r\n iPhone 11 dimensions are 150.9mm x 75.7mm x 8.3mm (H x W x D). It \r\nweighs about 194 grams (6.84 ounces).It &nbsp;features a 6.1-inch all-screen \r\nLCD display and is powered by Apple’s new A13 bionic chip with \r\nThird-Generation Neural Engine. The display is the company’s proprietary\r\n Liquid Retina HD display having Multi-Touch capability with IPS \r\ntechnology. The resolution is 1792x828 pixel one at 326 ppi with 1400:1 \r\ncontrast ratio (typical). Other special features of the display are True\r\n Tone, Wide colour (P3) and Haptic touch. It comes coated with a \r\nfingerprint resistant oleophobic coating. Coming to the camera segment, \r\nthe iPhone 11 comes equipped with a dual rear camera of a 12 MP \r\nsix-element Wide lens and an Ultra-Wide five element lens. The Ultra \r\nWide lens comes with ƒ/2.4 aperture and 120° field of view while the \r\nWide camera has got a ƒ/1.8 aperture. The iPhone 11, along with the \r\nother two models, has a Night mode for clicking better images in \r\nlow-light conditions. Some of the other rear camera features are 2x \r\noptical zoom out; digital zoom up to 5x, Portrait mode with advanced \r\nbokeh and Depth Control, Portrait Lighting with six effects, Optical \r\nimage stabilisation (Wide).</p>\r\n\r\n\r\n\r\n<p>Apple has upgraded the selfie camera in all three iPhones models from\r\n 7MP True Depth camera to a 12MP TrueDepth sensor with ƒ/2.2 aperture. \r\nSome of the other features of the front camera are Portrait mode with \r\nadvanced bokeh and depth control, Portrait Lighting with six effects, 4K\r\n video recording at 24 fps, 30 fps or 60 fps, 1080p HD video recording \r\nat 30 fps or 60 fps etc.</p></span></span>', NULL, 'Black,White,Blue', NULL, '94000', NULL, 'https://www.youtube.com/watch?v=OoY7zp8GkLI', NULL, 1, NULL, NULL, 1, NULL, NULL, 'public/media/product/1662042626311394.jpg', 'public/media/product/1662042626354893.jpg', 'public/media/product/1662042626403697.jpg', 1, '2020-03-24 04:56:05', '2020-03-25 01:37:22'),
(10, 9, 19, 23, 'Xiaomi Redmi Note 7S', 'xiaomi-111', '35', '<div class=\"_inrcntr\" style=\"\"> <p>The Redmi Note 7S is a budget smartphone from Xiaomi that sits between its <a href=\"https://gadgets.ndtv.com/redmi-note-7-price-in-india-8948\">Redmi Note 7</a>\r\n and Redmi Note 7 Pro. Xiaomi has kept the design identical, hence it is\r\n hard to distinguish between these three smartphones. The Redmi Note 7S \r\nhas a 6.3-inch full-HD+ display with&nbsp;Corning Gorilla Glass 5 for \r\nprotection. We liked that the display had good viewing angles and was \r\nbright enough to be legible when outdoors.</p> <p><a href=\"https://gadgets.ndtv.com/mobiles/xiaomi-phones\">Xiaomi</a>\r\n has opted for a Qualcomm Snapdragon 660 SoC to power the Redmi Note 7S \r\nand it does deliver a lag-free experience. Our unit had 4GB of RAM and \r\n64GB of storage, a lower variant with 3GB of RAM and 32GB of storage is \r\nalso available at a lower price.</p> <p>Just like other Xiaomi \r\nsmartphones, this too runs on MIUI. Our unit was running MIUI 10.3 on \r\ntop of Android 9.0. There are a few customisations that are useful but \r\nwe also encountered spammy notifications. The camera setup is \r\ndifferent&nbsp;compared to the Redmi Note 7 as it gets a 48-megapixel primary\r\n sensor and a 5-megapixel depth sensor.&nbsp; At the front, it has a \r\n13-megapixel selfie shooter. Overall, the Redmi Note 7S offers good \r\ncamera performance.</p> <p>Xiaomi has managed to pack in a 4,000mAh \r\nbattery in the Redmi Note 7S which offers good battery life. The Redmi \r\nNote 7S is a good smartphone but you can consider the Redmi Note 7 and \r\nthe Asus ZenFone Max Pro M2 as direct alternatives. If you don\'t mind \r\nspending a little extra, you can consider the Redmi Note 7 Pro.</p> </div>', NULL, 'Red,Black,White', NULL, '27000', NULL, 'https://www.youtube.com/watch?v=HKuc6z50xL4', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'public/media/product/1662043218072593.jpg', 'public/media/product/1662043218144532.jpg', 'public/media/product/1662043218174556.jpg', 1, '2020-03-24 05:05:30', '2020-03-24 05:05:30'),
(11, 9, 19, 13, 'Huawei Mate 20 pro', 'Huawei-111', '30', 'The Huawei Mate 20 Pro features a aluminium frame with a glass front and\r\n back. It features a 6.39-inch QHD+ display with Gorilla Glass \r\nprotection. Instead of a speaker grille, the sound is delivered through \r\nthe USB Type-C port. The Mate 20 Pro is powered by a new 7nm Kirin 980 \r\nSoC and it comes with 6GB of RAM and 128GB of storage. It runs on EMUI \r\n9.0, which is based on Android 9 Pie. General app and gaming performance\r\n is very good. It has a primary 40-megapixel camera, a 20-megapixel \r\nwide-angle sensor and a 8-megapixel telephoto sensor, which is a \r\nversatile combination. The built-in 4,200mAh delivers excellent battery \r\nlife and also charges very quickly.', NULL, 'Blue,Black', NULL, '35000', NULL, 'https://www.youtube.com/watch?v=t-msyqPvr0A', NULL, NULL, 1, NULL, NULL, NULL, NULL, 'public/media/product/1662043409311376.jpg', 'public/media/product/1662043409346507.jpg', 'public/media/product/1662043409374625.jpg', 1, '2020-03-24 05:08:32', '2020-03-24 05:08:32'),
(12, 1, 1, 19, 'Mens Slive Tshirt', 'M-23923', '150', '100% Cotton; Sport Grey And Antique Heathers: 90% Cotton | 10% Polyester; Safety Colors And Heathers: 50% Cotton | 50% Polyester\r\n            \r\n\r\n        <ul><li>Seamless double needle collar</li><li>Taped neck and shoulders for durability</li><li>Double needle sleeve and bottom hem</li><li>Tubular fit for minimal torque</li></ul>', NULL, 'Blue,green,black,white,purple', 'M,L,XL,XXL', '420', NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, 'public/media/product/1662113991081569.jpg', 'public/media/product/1662113991830957.jpg', 'public/media/product/1662113991945112.jpg', 1, '2020-03-24 23:50:25', '2020-04-05 00:12:55'),
(13, 1, 1, 16, 'Simple T-shirt', 'M-28433', '130', '<p>Our company is among the most trusted companies in the manufacture, \r\nsupply and export of Men’s Long Sleeve T-Shirts of outstanding quality \r\nand perfect fitting. These are developed and designed by the leading \r\nindustry experts who have gained plenty of experience in this domain. In\r\n addition to this, these men’s long sleeves t-shirts have attractive \r\ncolors and are available at leading market prices to cater to the pocket\r\n requirements of different customers.</p><p><b>Features:</b></p><ul><li>Enchanting design</li><li>Available in different colors</li><li>Neatly Packaged</li></ul>', NULL, 'Black,Red,White,Blue,Orange', 'S,M,L,XL', '380', '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'public/media/product/1662114400314159.jpg', 'public/media/product/1662114400379166.jpg', 'public/media/product/1662114400408662.jpg', 1, '2020-03-24 23:56:54', '2020-03-25 01:37:48'),
(14, 9, 12, 14, 'Lenovo Ideapad 700', 'Len-423894', '55', '<table class=\"table table-bordered\"><tbody><tr><td><table class=\"techSpecs-table\"><tbody><tr><td>Processor</td><td><div>Up to 6<sup>th</sup> Generation Intel<sup>®</sup> Core™ i7 Processor</div></td></tr><tr><td>Operating System</td><td><div>UP to Windows 10 Home</div></td></tr><tr><td>Graphics</td><td><div>NVIDIA<sup>®</sup> GeForce<sup>®</sup> GTX 950</div></td></tr><tr><td>Memory</td><td><div>Up to 16 GB DDR4</div></td></tr><tr><td>Webcam</td><td><div>720p</div></td></tr><tr><td>Storage</td><td><ul><li>Up to 1 TB HDD or</li><li>Up to 1 TB SSHD or</li><li>Up to 256 GB PCIe SSD Storage</li></ul></td></tr><tr><td>Audio</td><td><div>JBL<sup>®</sup> Stereo Speakers(Optional) with Dolby<sup>®</sup> Home Theater<sup>®</sup></div></td></tr><tr><td>Battery</td><td><div>Up to 4 Hours</div></td></tr><tr><td>Display</td><td><div>15.6\" FHD (1920 x 1080) IPS</div></td></tr><tr><td>Dimensions (W x D x H)</td><td><ul><li>(mm) : 384 x 265 x 22.7</li><li>(inches) : 15.12\" x 10.43\" x 0.89\"</li></ul></td></tr><tr><td>Weight</td><td><div>Starting at 5.1 lbs (2.3 kg)</div></td></tr><tr><td>WLAN</td><td><div>Intel<sup>®</sup> 1 x 1 WiFi 802.11 a/c + Bluetooth<sup>®</sup> 4.0</div></td></tr><tr><td>Connectors</td><td><ul><li>2 x USB 3.0</li><li>1 x USB 2.0</li><li>VGA</li><li>Audio Combo</li><li>HDMI™-out</li><li>RJ45</li><li>4-in-1 Card Reader (SD, SDHC, SDXC, MMC)</li></ul></td></tr></tbody></table></td><td><br></td></tr></tbody></table><p><br></p>', NULL, 'Black,Blue', NULL, '70000', NULL, 'https://www.youtube.com/watch?v=Q-VIMwQuBqY', NULL, NULL, NULL, 1, NULL, NULL, NULL, 'public/media/product/1662573172464760.png', 'public/media/product/1662573023227984.jpg', 'public/media/product/1662115003457335.png', 1, '2020-03-25 00:06:29', '2020-03-30 01:28:54'),
(15, 9, 12, 15, 'HP Envy 13', 'hp-4013', '40', '<p>                                        \r\n                                    </p><table class=\"table table-bordered\"><tbody><tr><td><table class=\"table table-bordered table-steps\"><tbody valign=\"top\"><tr><td rowspan=\"1\" valign=\"top\" align=\"left\"><div class=\"para\">\r\n<strong class=\"bold\">Product number</strong>\r\n</div>\r\n</td><td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">2GD46PA</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">\r\n<strong class=\"bold\">Product name</strong>\r\n</div>\r\n</td><td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">HP ENVY - 13-ad043tx</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">\r\n<strong class=\"bold\">Microprocessor</strong>\r\n</div>\r\n</td><td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">Intel® Core™ i7-7500U (2.7 GHz base frequency, up to 3.5 GHz with Intel® Turbo Boost Technology, 4 MB cache, 2 cores)</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">\r\n<strong class=\"bold\">Memory, standard</strong>\r\n</div>\r\n</td><td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">8 GB LPDDR3-1866 SDRAM (onboard)</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">\r\n<strong class=\"bold\">Video graphics</strong>\r\n</div>\r\n</td><td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">NVIDIA® GeForce® MX150 (2 GB GDDR5 dedicated)</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">\r\n<strong class=\"bold\">Hard drive</strong>\r\n</div>\r\n</td><td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">256 GB PCIe® NVMe™ M.2 SSD</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">\r\n<strong class=\"bold\">Display</strong>\r\n</div>\r\n</td><td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">13.3\" diagonal FHD IPS BrightView micro-edge WLED-backlit edge-to-edge glass (1920 x 1080)</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">\r\n<strong class=\"bold\">Keyboard</strong>\r\n</div>\r\n</td><td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">Full-size island-style backlit keyboard</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">\r\n<strong class=\"bold\">Pointing device</strong>\r\n</div>\r\n</td><td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">HP Imagepad with multi-touch gesture support</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">\r\n<strong class=\"bold\">Wireless connectivity</strong>\r\n</div>\r\n</td><td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">Intel® 802.11a/b/g/n/ac (2x2) Wi-Fi® and Bluetooth® 4.2 Combo</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">\r\n<strong class=\"bold\">Expansion slots</strong>\r\n</div>\r\n</td><td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">1 microSD media card reader</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">\r\n<strong class=\"bold\">External ports</strong>\r\n</div>\r\n</td><td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">2 USB 3.1 Type-C™ Gen 1 (Data Transfer up to 5 Gb/s, \r\nPower Delivery, DP1.2, HP Sleep and Charge); 2 USB 3.1 Gen 1 (1 HP Sleep\r\n and Charge); 1 headphone/microphone combo</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">\r\n<strong class=\"bold\">Dimensions (W x D x H)</strong>\r\n</div>\r\n</td><td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">30.54 x 21.56 x 1.54 cm</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">\r\n<strong class=\"bold\">Weight</strong>\r\n</div>\r\n</td><td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">1.38 kg</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">\r\n<strong class=\"bold\">Power supply type</strong>\r\n</div>\r\n</td><td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">65 W AC power adapter</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">\r\n<strong class=\"bold\">Battery type</strong>\r\n</div>\r\n</td><td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">3-cell, 51 Wh Li-ion</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">\r\n<strong class=\"bold\">Webcam</strong>\r\n</div>\r\n</td><td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">HP Wide Vision HD Camera with integrated dual array digital microphone</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">\r\n<strong class=\"bold\">Audio features</strong>\r\n</div>\r\n</td><td rowspan=\"1\" valign=\"top\" align=\"left\">\r\n<div class=\"para\">Bang &amp; Olufsen; HP Audio Boost; Quad speakers</div></td></tr></tbody></table></td><td><br></td></tr></tbody></table>', NULL, 'Black,White,Silver,Blue', NULL, '109000', NULL, 'https://www.youtube.com/watch?v=xjg3canngVQ', NULL, NULL, NULL, 1, NULL, NULL, NULL, 'public/media/product/1662572800577980.png', 'public/media/product/1662572801292890.png', 'public/media/product/1662572801392409.png', 1, '2020-03-25 00:29:32', '2020-03-30 01:22:59'),
(16, 9, 12, 17, 'Dell Inspiron 14 5000 2-in-1', 'Del-2014', '35', '<p>                                        \r\n                                    </p><table class=\"table table-bordered\"><tbody><tr><td><table class=\"table table-bordered\"><tbody><tr><td>Processor</td><td>Intel Core i5-8265U Processor (6M Cache, 1.60 GHz up to 3.90 GHz, 4 core, 8 Threads)</td></tr><tr><td>Memory</td><td>8GB DDR4</td></tr><tr><td>Storage</td><td>256 GB SSD</td></tr><tr><td>Graphics</td><td>Intel® UHD Graphics 620 with shared graphics memory</td></tr><tr><td>Display</td><td>14.0\" FHD 1920x1080 LED-Backlit Touch Display IPS Pen Enabled</td></tr><tr><td>Adapter</td><td>45 Watt AC Adaptor</td></tr><tr><td>Battery</td><td>3-Cell 42WHr Battery (Integrated)</td></tr><tr><td>Operating System</td><td>Genuine Win 10</td></tr><tr><td>Networking</td><td>Wi-Fi: 802.11ac 2x2;</td></tr><tr><td>Keyboard</td><td>Backlit Keyboard</td></tr><tr><td>Bluetooth</td><td>4.10</td></tr><tr><td>Audio</td><td>Stereo Speaker with MaxxAudio Pro Headphone/Microphone combo jack</td></tr><tr><td>Optical Drive</td><td>No</td></tr><tr><td>WebCam</td><td>Integrated widescreen HD (720p)</td></tr><tr><td>Fingerprint</td><td>yes</td></tr><tr><td>Display Touch</td><td>Yes</td></tr><tr><td>Ports &amp; Connectors</td><td>1.\r\n SD card | 2. USB 2.0 | 3. Wedge-shaped lock slot | 4. Power | 5. USB \r\n3.1 Gen 1 Type C™ (DP/PowerDelivery) | 6. HDMI 1.4b | 7. USB 3.1 Gen 1 |\r\n 8. USB 3.1 Gen 1 | 9. Universal audio jack</td></tr><tr><td>Color</td><td>URBAN GREY</td></tr><tr><td>Dimensions (W x D x H)</td><td>Height: 0.79\" (19.95mm) x Width: 12.91\" (328mm) x Depth: 09.17\" (232.8mm)</td></tr><tr><td>Weight</td><td>Weight: 3.87lb (1.75Kg)</td></tr><tr><td>Others</td><td>14\" 2-in-1 features plenty of versatility with four flexible modes and Dell Cinema in a sleek, sharp design; DELL ACTIVE PEN;</td></tr><tr><td>Warranty</td><td>2 Year International Warranty (Battery &amp; Adapter 01 Year)</td></tr></tbody></table></td><td><br></td></tr></tbody></table><p><br></p>', NULL, 'Black,Maroon,Blue', NULL, '87000', NULL, 'https://www.youtube.com/watch?v=epkPjzH-xv8', NULL, 1, NULL, 1, NULL, NULL, NULL, 'public/media/product/1662116867433645.png', 'public/media/product/1662116867512709.png', 'public/media/product/1662116867577587.png', 1, '2020-03-25 00:36:07', '2020-03-25 00:36:07'),
(17, 8, 23, 24, 'Computer Desk', 'C-13222', '30', 'We are known as foremost manufacturer and supplier of a supreme quality range of&nbsp;<b>Modern Computer Table.</b>&nbsp;This\r\n Table is available in varied designs and sizes as per the specific \r\nrequirements of clients. The offered chair is widely demanded in the \r\nindustry and is appreciated for its durable finish. This&nbsp;Modern Computer\r\n Table&nbsp;is manufactured by our professionals using high grade raw \r\nmaterial as per the set industry standards.<br><br>We use to deal under following;-<br> <ul><li>Computer Furniture&nbsp;</li><li>Computer Tables</li></ul>', NULL, 'Wood,Black', NULL, '6500', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 'public/media/product/1662117153592807.jpg', 'public/media/product/1662117153648544.png', 'public/media/product/1662117153725885.jpg', 1, '2020-03-25 00:39:41', '2020-03-25 00:40:40'),
(18, 8, 23, 25, 'White Computer Desk', 'C-2377', '30', '<div class=\"html-content pdp-product-highlights\"><ul class=\"\"><li class=\"\">Dimension/size: 3.2*1.3*2.8 ft</li><li class=\"\">No Installation Charge Needed All Over Bangladesh</li><li class=\"\">Generous rectangular work surface</li><li class=\"\">Ideal for both home or office</li><li class=\"\">Designed with storage shelves to save your space</li><li class=\"\">Top - 18 mm thick laminated board with 2 mm ABS edging</li><li class=\"\">Provided with cable Management ports</li><li class=\"\">Major Material: Laminated Board,</li><li class=\"\">Color: Antique</li><li class=\"\" data-spm-anchor-id=\"a2a0e.pdp.product_detail.i0.832b349cPTZfrC\">Product type : Computer Table</li></ul></div>', NULL, 'Black,White', NULL, '5300', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, 1, 'public/media/product/1662117333481979.jpg', 'public/media/product/1662117333517686.jpg', 'public/media/product/1662117333545013.jpg', 1, '2020-03-25 00:43:31', '2020-03-25 00:43:31'),
(19, 2, 25, 26, 'Women Jacket', 'w-2742', '30', '<p class=\"details__description\" itemprop=\"description\">\r\n                    Trend-forward trench coat in a drapey fit with \r\ndouble-breasted collar, side pockets, buttons and adjustable tie at \r\nwaist.<br></p><ul class=\"fabric-care__list bullet-list\"><li>Machine wash cold, with like colors</li><li>Only non-chlorine bleach</li><li>Tumble dry low</li><li>Low iron if needed</li><li>Do not dry clean</li></ul>', NULL, 'yellow,Orange,Red,Blue,Black', 'S,M,L,Xl', '3000', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 'public/media/product/1662118616991137.jpg', 'public/media/product/1662118617033792.jpg', 'public/media/product/1662118617065013.jpg', 1, '2020-03-25 01:03:55', '2020-03-25 01:03:55'),
(20, 2, 18, 26, 'Pakistani Kurtis', 'w-2308948', '50', '<p>Fabric: Lawn</p><p>Details: <br>Embroidered Lawn Front 0.75 Meter<br>Digitally Printed Lawn Back 1.25 Meters<br>Digitally Printed Lawn Sleeves 0.75 Meter<br>Digitally Printed pure<br>crinkle Chiffon Dupatta 2.5 Meters<br>Cotton Trousers 2.5 Meters<br>Embroidered Border -1 0.75 Meter<br>Embroidered border-2 1.25 meters</p><p><br></p>', NULL, 'Pink,Orange,Blue,Black,White', 'S,M,L', '6500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'public/media/product/1662118997546889.jpg', 'public/media/product/1662118997611830.jpg', 'public/media/product/1662118997641022.jpg', 1, '2020-03-25 01:09:58', '2020-03-25 01:09:58'),
(21, 7, 7, 23, 'Men Smart Watch', 'W-238', '70', '<div class=\"product-attributes-item\">\r\n                                <ul><li>\r\n                                            <label>Brand </label>\r\n                                            <span class=\"info-deta\">FITUP</span>\r\n                                        </li><li>\r\n                                            <label>Product origin </label>\r\n                                            <span class=\"info-deta\">Shenzhen</span>\r\n                                        </li><li>\r\n                                            <label>Delivery time </label>\r\n                                            <span class=\"info-deta\">3-10day</span>\r\n                                        </li><li>\r\n                                            <label>Supply capacity </label>\r\n                                            <span class=\"info-deta\">100000 pcs/month</span>\r\n                                        </li></ul>\r\n                            </div>\r\n                            <div class=\"product-overview\"><p>1.   Blood oxygen monitoring.\r\n<br> 2.   24-hour continuous heart rate monitoring.\r\n<br> 3.   Exercise monitoring and fitness Suggestions.\r\n<br> 4.   Intelligent sleep monitoring.\r\n<br> 5.   Sports model</p></div>', NULL, 'Black,Blue,White', NULL, '4500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'public/media/product/1662119190115868.jpg', 'public/media/product/1662119190155829.jpg', 'public/media/product/1662119190190794.jpg', 1, '2020-03-25 01:13:02', '2020-04-05 00:13:26'),
(22, 7, 7, 2, 'Yellow Smart Watch', 'w-1111', '65', '<div class=\"product-attributes-item\">\r\n                                <ul><li>\r\n                                            <label>Brand </label>\r\n                                            <span class=\"info-deta\">FITUP</span>\r\n                                        </li><li>\r\n                                            <label>Product origin </label>\r\n                                            <span class=\"info-deta\">Shenzhen</span>\r\n                                        </li><li>\r\n                                            <label>Delivery time </label>\r\n                                            <span class=\"info-deta\">3-10day</span>\r\n                                        </li><li>\r\n                                            <label>Supply capacity </label>\r\n                                            <span class=\"info-deta\">100000 pcs/month</span>\r\n                                        </li></ul>\r\n                            </div>\r\n                            <div class=\"product-overview\"><p>Product features:\r\n<br> 1.  Osram high-end biosensor.\r\n<br> 2.  Blood pressure monitoring; Intelligent sleep monitoring.\r\n<br> 3.  0.95 inches OLED screen, milanese strap.\r\n<br> 4.  OEM ODM smart bracelet manufacturer.</p></div>', '1.  Osram high-end biosensor.\r\n<br> 2.  Blood pressure monitoring; Intelligent sleep monitoring.\r\n<br> 3.  0.95 inches OLED screen, milanese strap.\r\n<br> 4.  OEM ODM smart bracelet manufacturer.', 'Yellow,Black,Red', NULL, '17500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'public/media/product/1662119322520326.jpg', 'public/media/product/1662119322559973.jpg', 'public/media/product/1662119322591054.jpg', 1, '2020-03-25 01:15:08', '2020-04-06 04:34:11'),
(23, 9, 10, 10, 'Canon 6D', 'C-7813', '25', '<h3>Canon EOS 6D key specifications</h3>\r\n<ul><li>20.2MP full frame CMOS sensor</li><li>DIGIC 5+ image processor</li><li>ISO 100-25600 standard, 50-102800 expanded</li><li>4.5 fps continuous shooting</li><li>\'Silent\' shutter mode</li><li>1080p30 video recording, stereo sound via external mic</li><li>11 point AF system, center point cross-type and sensitive to -3 EV</li><li>63 zone iFCL metering system</li><li>97% viewfinder coverage; interchangeable screens (including Eg-D grid and Eg-S fine-focus)</li><li>1040k dot 3:2 3\" ClearView LCD (fixed)</li><li>Single SD card slot</li><li>Built-in Wi-Fi and GPS</li><li>Single-axis electronic level</li></ul>', NULL, 'Black ,Blue', NULL, '75000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'public/media/product/1662119517694583.jpg', 'public/media/product/1662119517983216.jpg', 'public/media/product/1662119518038723.jpg', 1, '2020-03-25 01:18:15', '2020-03-25 01:18:15'),
(24, 9, 26, 27, 'JBl Speaker', 'Jbl-101', '40', '<p>                                        \r\n                                    </p><table class=\"table table-bordered\"><tbody><tr><td><table cellspacing=\"1\" cellpadding=\"1\" border=\"1\"><tbody><tr><td style=\"width:132px;\">Item Name&nbsp;</td><td style=\"width:569px;\">Waterproof Portable Outdoor Bluetooth Speaker Wireless Loudspeaker For JBL Support TF/USB/AUX/FM Radio</td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">Bluetooth</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">4.2+EDR</span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">MOQ</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">50PCS&nbsp;</span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">Material</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">ABS&nbsp;</span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">Color</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">Black,Blue.Red,Green,Grey,Camouflage</span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">Weight</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">500g</span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">Power</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">5W*2</span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">Frequency</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">100Hz-20KHZ</span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">Battery</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">1200mAh</span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">Playback formats</span></td><td style=\"width:569px;\">MP3,APE,WMA,FLC,WAV</td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">Signal-to-Noise</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">≥75dB</span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">Distortion</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">≤0.5%</span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">Playing Time&nbsp;</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">6-8 hours</span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">TF Card</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">MAX 32GB</span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">Speaker Size&nbsp;</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">25.0 cm * 15.0 cm * 10.0 cm</span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">Function</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">FM Radio,Bluetooth audio input, Bluetooth hands-free calling, TF card etc&nbsp;</span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">Audio interface</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">3.5mm</span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">&nbsp;Voltage&nbsp;</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">3.7V</span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">Application for&nbsp;</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\"><strong>Camping/Climbing/Adventure/Picnic/Riding Outdoor Sports Activities</strong></span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">OEM&nbsp;</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">Supported&nbsp;</span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">LOGO Customized&nbsp;</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">Welcome&nbsp;</span></td></tr><tr><td style=\"width:132px;\"><span style=\"font-size:16px;\">Package Included</span></td><td style=\"width:569px;\"><span style=\"font-size:16px;\">1* E3 Bluetooth Speaker&nbsp;<br>1* USB&nbsp;Charging&nbsp;Cable&nbsp;&nbsp;&nbsp;<br>1* AUX&nbsp;Cable&nbsp;&nbsp;&nbsp;<br>1* User Manual&nbsp;&nbsp;</span></td></tr></tbody></table></td></tr></tbody></table><p><br></p>', NULL, 'Black,White', NULL, '27000', NULL, 'https://www.youtube.com/watch?v=c8K7lDYhyfM', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'public/media/product/1662120069822873.jpg', 'public/media/product/1662120069879343.jpg', 'public/media/product/1662120069926891.jpg', 1, '2020-03-25 01:27:01', '2020-04-05 00:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shapping_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `vat`, `shapping_charge`, `shop_name`, `email`, `phone`, `address`, `logo`, `created_at`, `updated_at`) VALUES
(1, '3', '60', 'Echovel', 'echovel@gmail.com', '0171626886', 'Khilkhat Dhaka', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `subcategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Shirt & T-Shirt', '2020-03-12 01:20:47', '2020-03-23 05:33:33'),
(2, 1, 'Pants', '2020-03-12 01:51:36', '2020-03-23 05:33:42'),
(3, 2, 'Hijab & Scarf', '2020-03-12 01:53:15', '2020-03-15 00:09:11'),
(7, 7, 'Man\'s Watch', '2020-03-16 04:23:25', '2020-03-16 04:23:25'),
(8, 7, 'Woman\'s Watch', '2020-03-16 04:23:46', '2020-03-16 04:23:46'),
(9, 7, 'Child Watch', '2020-03-16 04:24:10', '2020-03-16 04:24:10'),
(10, 9, 'Camera', '2020-03-17 22:57:03', '2020-03-23 05:49:31'),
(11, 2, 'Shoes', '2020-03-17 22:57:12', '2020-03-23 05:46:47'),
(12, 9, 'Laptop', '2020-03-18 04:31:14', '2020-03-23 05:48:24'),
(13, 9, 'Desktop', '2020-03-18 04:31:40', '2020-03-23 05:48:59'),
(14, 1, 'Shoes', '2020-03-23 05:34:41', '2020-03-23 05:34:41'),
(15, 1, 'Jacket', '2020-03-23 05:44:15', '2020-03-23 05:44:15'),
(16, 2, 'Three piece', '2020-03-23 05:45:18', '2020-03-23 05:45:18'),
(17, 1, 'Punjabi & Pajama', '2020-03-23 05:47:26', '2020-03-23 05:47:26'),
(18, 2, 'Kurtis', '2020-03-23 05:47:38', '2020-03-23 05:47:38'),
(19, 9, 'Mobile & Tablet', '2020-03-23 05:48:06', '2020-03-23 05:48:06'),
(20, 9, 'Television', '2020-03-23 05:50:01', '2020-03-23 05:50:01'),
(21, 9, 'Refrigerator', '2020-03-23 05:50:16', '2020-03-23 05:50:16'),
(22, 8, 'Bed Room', '2020-03-23 05:50:44', '2020-03-23 05:50:44'),
(23, 8, 'Official', '2020-03-23 05:51:00', '2020-03-23 05:51:00'),
(24, 8, 'Dining', '2020-03-23 05:51:22', '2020-03-23 05:51:22'),
(25, 2, 'Jacket', '2020-03-23 05:51:32', '2020-03-23 05:51:47'),
(26, 9, 'Speaker', '2020-03-25 01:21:34', '2020-03-25 01:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `avatar`, `provider`, `provider_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sohidul Islam', NULL, 'sohidulislam@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$AXmPJQ.tg/8z5VJr6Z9Ar.XJzte2Ytw058vRAes3CxI7CXwAr/CT6', 'OWy2EdzjN9uPkGwWDHQsQKFvPFLFIidcXBWYQsds7PnDt0vqOdyz1sqEVayg', '2019-10-04 23:27:57', '2019-10-04 23:27:57'),
(2, 'Jahidul Islam', NULL, 'jahidulislam@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$t58WdGEyeKN5e/80mbWoRev4WSW8ANTJugJW.NfosJx31W0qxbjEq', NULL, '2019-10-05 04:47:42', '2019-10-05 04:47:42'),
(10, 'Anim Bhuiya', '01734779901', 'bhuiyaanim@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$j7p4001vsOvpJHBiA.xq4uIrn9.b19d/b0nZp3zQTzKgteYwzYeZ2', NULL, '2020-04-06 00:15:40', '2020-04-06 00:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(8, 10, 24, '2020-04-06 00:36:06', '2020-04-06 00:36:06'),
(9, 10, 22, '2020-04-06 01:35:38', '2020-04-06 01:35:38');

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
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
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
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
