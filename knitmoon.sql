-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2026 at 01:21 PM
-- Server version: 8.0.44
-- PHP Version: 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knitmoon`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1781961323),
('laravel-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1781961323;', 1781961323);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_06_07_184804_create_pages_table', 1),
(5, '2026_06_07_184805_create_sections_table', 1),
(6, '2026_06_07_184806_create_page_section_table', 1),
(7, '2026_06_07_184807_create_posts_table', 1),
(8, '2026_06_08_164846_create_sliders_table', 1),
(9, '2026_06_08_164847_create_slider_items_table', 1),
(10, '2026_06_08_164848_add_slider_id_to_pages_table', 1),
(11, '2026_06_09_000001_add_type_to_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `order` int NOT NULL DEFAULT '0',
  `slider_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `title`, `meta_description`, `meta_keywords`, `og_image`, `status`, `order`, `slider_id`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 'Home — TextileExport Pro', NULL, NULL, NULL, 'active', 1, NULL, '2026-06-16 08:26:21', '2026-06-16 08:26:21'),
(2, 'About', 'about', 'About Us — TextileExport Pro', NULL, NULL, NULL, 'active', 2, NULL, '2026-06-16 08:26:21', '2026-06-16 08:26:21'),
(3, 'Products', 'products', 'Products — TextileExport Pro', NULL, NULL, NULL, 'active', 3, NULL, '2026-06-16 08:26:21', '2026-06-16 08:26:21'),
(4, 'Contact', 'contact', 'Contact — TextileExport Pro', NULL, NULL, NULL, 'active', 4, NULL, '2026-06-16 08:26:21', '2026-06-16 08:26:21'),
(5, 'Gallery', 'gallery', NULL, NULL, NULL, NULL, 'active', 0, NULL, '2026-06-19 10:18:18', '2026-06-19 10:18:18'),
(6, 'Team', 'team', NULL, NULL, NULL, NULL, 'active', 0, NULL, '2026-06-19 14:19:22', '2026-06-19 14:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `page_section`
--

CREATE TABLE `page_section` (
  `id` bigint UNSIGNED NOT NULL,
  `page_id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_section`
--

INSERT INTO `page_section` (`id`, `page_id`, `section_id`, `order`, `created_at`, `updated_at`) VALUES
(3, 1, 8, 3, '2026-06-16 08:26:21', '2026-06-16 08:26:21'),
(8, 4, 6, 1, '2026-06-16 08:26:21', '2026-06-16 08:26:21'),
(9, 4, 7, 2, '2026-06-16 08:26:21', '2026-06-16 08:26:21'),
(10, 1, 9, 1, '2026-06-16 09:37:56', '2026-06-16 09:37:56'),
(11, 2, 9, 1, '2026-06-16 09:44:02', '2026-06-16 09:44:02'),
(12, 2, 10, 2, '2026-06-16 10:08:29', '2026-06-16 10:08:29'),
(13, 2, 11, 3, '2026-06-17 09:28:40', '2026-06-17 09:28:40'),
(14, 2, 12, 4, '2026-06-17 09:50:00', '2026-06-17 09:50:00'),
(15, 2, 6, 5, '2026-06-17 10:18:29', '2026-06-17 10:18:29'),
(16, 5, 13, 0, '2026-06-19 10:18:39', '2026-06-19 10:18:39'),
(17, 3, 14, 0, '2026-06-19 12:43:36', '2026-06-19 12:43:36'),
(18, 6, 15, 0, '2026-06-19 14:19:45', '2026-06-19 14:19:45'),
(19, 1, 16, 0, '2026-06-20 01:03:40', '2026-06-20 01:03:40'),
(20, 1, 14, 2, '2026-06-20 02:06:13', '2026-06-20 05:21:59'),
(21, 1, 17, 4, '2026-06-20 05:43:18', '2026-06-20 05:43:18'),
(22, 1, 18, 5, '2026-06-20 06:44:42', '2026-06-20 06:44:42'),
(23, 1, 13, 6, '2026-06-20 06:50:24', '2026-06-20 06:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `badge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `status` enum('published','draft') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `section_id`, `type`, `title`, `slug`, `excerpt`, `body`, `image`, `icon`, `button_text`, `button_url`, `button_target`, `badge`, `tag`, `order`, `status`, `published_at`, `created_at`, `updated_at`) VALUES
(11, 8, 'general', 'John Mitchell, USA', NULL, '\"Outstanding quality and on-time delivery. Our preferred garment partner.\"', NULL, NULL, NULL, NULL, NULL, '_self', '★★★★★', NULL, 1, 'published', NULL, '2026-06-16 08:26:21', '2026-06-16 08:26:21'),
(12, 8, 'general', 'Amelia Clarke, UK', NULL, '\"Professional team, excellent communication throughout the order process.\"', NULL, NULL, NULL, NULL, NULL, '_self', '★★★★★', NULL, 2, 'published', NULL, '2026-06-16 08:26:21', '2026-06-16 08:26:21'),
(14, 7, 'general', 'What is your minimum order quantity?', NULL, 'Our MOQ is typically 500 pieces per style, though we negotiate for new clients.', NULL, NULL, NULL, NULL, NULL, '_self', NULL, NULL, 1, 'published', NULL, '2026-06-16 08:26:21', '2026-06-16 08:26:21'),
(15, 7, 'general', 'Do you offer sample production?', NULL, 'Yes, samples are available within 7-10 business days.', NULL, NULL, NULL, NULL, NULL, '_self', NULL, NULL, 2, 'published', NULL, '2026-06-16 08:26:21', '2026-06-16 08:26:21'),
(16, 7, 'general', 'Which countries do you export to?', NULL, 'We export to Europe, USA, Canada, Australia and the Middle East.', NULL, NULL, NULL, NULL, NULL, '_self', NULL, NULL, 3, 'published', NULL, '2026-06-16 08:26:21', '2026-06-16 08:26:21'),
(17, 17, 'general', 'About Our Company', 'about-our-company', NULL, '<p>With over 20 years of experience in textile manufacturing, we&#039;ve established ourselves as a trusted partner for global brands.</p><p>Our state-of-the-art facilities and skilled workforce ensure that every product meets the highest international standards.</p>', '01KVJDE7NKWJ0VZDQ36CF30MTE.webp', NULL, NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-16 08:36:29', '2026-06-20 05:47:59'),
(18, 10, 'general', 'Our Journey', 'our-journey', NULL, '<p>TextileExport Pro, founded in 2004, has grown from a small textile operation into a globally recognized manufacturer serving over 500 clients across 50+ countries. Known for its strong focus on quality, innovation, and customer satisfaction, the company has earned multiple international certifications and the trust of leading global brands. With continuous investment in modern technology and a skilled workforce, TextileExport Pro maintains its position as a competitive leader in the global textile industry.</p>', '01KV8KP8B08MWY4HBZZPGTWS28.jpg', NULL, NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-16 10:00:05', '2026-06-16 10:19:33'),
(19, 11, 'general', 'Mission 1 ', 'mission-1', NULL, '<p>Mission 1 To manufacture premium quality garments that meet international standards while maintaining sustainable practices and supporting our workforce with fair wages and safe working conditions.</p>', NULL, NULL, NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-17 09:27:47', '2026-06-17 09:27:47'),
(20, 11, 'general', 'Our Vision', 'our-vision', NULL, '<p>Our VisionTo be the most trusted and innovative textile manufacturer in Asia, recognized for delivering exceptional quality, reliability, and environmental responsibility to our global partners.</p>', NULL, NULL, NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-17 09:30:03', '2026-06-17 09:30:03'),
(21, 12, 'general', 'Quality Excellence', 'quality-excellence', NULL, '<p>We never compromise on quality. Every product undergoes rigorous testing to ensure it meets international standards.</p>', NULL, NULL, NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-17 09:48:11', '2026-06-17 09:48:11'),
(22, 12, 'general', 'Sustainability', 'sustainability', NULL, '<p>Environmental responsibility is at the heart of our operations, from sustainable materials to waste management.</p>', NULL, NULL, NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-17 09:48:45', '2026-06-17 09:48:45'),
(23, 12, 'general', 'Fair Practices', 'fair-practices', NULL, '<p>We believe in fair wages, safe working conditions, and respect for our employees and partners.</p>', NULL, NULL, NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-17 09:49:15', '2026-06-17 09:49:15'),
(25, 6, 'general', 'Address', 'address', NULL, '<p><strong>Address: </strong>PLOT# S-10, BSCIC I/A, KALURGHAT,CHATTOGRAM</p><p><strong>Thana: </strong>Chandgaon</p><p><strong>District: </strong>Chittagong</p>', NULL, 'fas fa-map-marker-alt text-green-700 mt-1', NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-17 10:13:05', '2026-06-17 10:13:43'),
(26, 6, 'general', 'Phone', 'phone', NULL, '<p>01819400500</p>', NULL, 'fas fa-phone text-green-700 mt-1', NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-17 10:14:29', '2026-06-17 10:14:29'),
(27, 6, 'general', 'Email', 'email', NULL, '<p>knitmoon@gmail.com</p>', NULL, 'fas fa-envelope text-green-700 mt-1', NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-17 10:15:17', '2026-06-17 10:15:17'),
(28, 6, 'general', 'WhatsApp', 'whatsapp', NULL, '<p>01819400500</p>', NULL, 'fab fa-whatsapp text-green-700 mt-1', NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-17 10:16:10', '2026-06-17 10:16:10'),
(29, 13, 'general', 'Our factory', 'our-factory', NULL, '<p></p>', '01KVGAD82N7BV1K2SKM9ZS0TP4.jpg', NULL, NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-19 10:11:17', '2026-06-19 10:11:17'),
(30, 13, 'general', 'Factory', 'factory', NULL, '<p></p>', '01KVGC6GYGJ3R37GJZWKZVV5D5.jpg', NULL, NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-19 10:29:30', '2026-06-19 10:42:33'),
(31, 14, 'general', 'Premium Cotton T-Shirt', 'premium-cotton-t-shirt', 'High-quality cotton jersey with comfortable fit', '<p><strong>Fabric:</strong> 100% Cotton</p><p><strong>GSM:</strong> 180 - 200</p><p><strong>MOQ:</strong> 500 units</p><p><strong>Colors:</strong> 15+ options</p>', '01KVJJCJX24TF31V6SREB1HSHC.webp', NULL, NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-19 12:32:43', '2026-06-20 07:09:12'),
(32, 15, 'general', 'Chairman', 'chairman', NULL, '<blockquote><p><br>It is my privilege to lead a company built on a foundation of quality, integrity, and relentless dedication to our craft. For over two decades, we have woven trust into every thread, delivering garments that meet the highest international standards while empowering the people and communities behind them.</p><p>As we look to the future, our commitment remains unchanged — to innovate responsibly, to grow sustainably, and to be a partner you can rely on. Thank you for being part of our journey. Together, we will continue to shape the future of textile excellence.</p></blockquote><p></p><p></p><p></p><p></p><p></p><p></p><h2><strong>Khaled Hoq</strong></h2><p><strong>Chairman &amp; Founder</strong></p>', '01KVGQZQRPQG4EF6E4YZH2MB29.jpg', 'fab fa-linkedin-in', NULL, 'https://www.linkedin.com/in/khaled-hoq-73b93b22/', '_blank', NULL, NULL, 0, 'published', NULL, '2026-06-19 14:08:34', '2026-06-19 14:34:18'),
(33, 16, 'general', 'Logo', 'logo', NULL, '<p>kintmoon</p>', '01KVHXECP8FH6HWZJAK4QX0GNV.png', NULL, NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-20 01:03:11', '2026-06-20 01:21:52'),
(35, 18, 'general', 'Quality Control', 'quality-control', NULL, '<p>Strict testing at every production stage</p><p><strong>✓ International standards compliance</strong></p>', '01KVJGQV8BQKYNHGRVQWSW01JW.jpg', NULL, NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-20 06:40:07', '2026-06-20 06:40:24'),
(36, 18, 'general', 'Production Capacity', 'production-capacity', NULL, '<p>500,000+ units per month with full quality control</p><p><strong>✓ State-of-the-art machinery</strong></p>', '01KVJGS30GSY97KS88S0EFHTF9.webp', NULL, NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-20 06:41:05', '2026-06-20 06:41:05'),
(37, 18, 'general', 'Quality Control', 'quality-control-1', NULL, '<p>Strict testing at every production stage</p><p><strong>✓ International standards compliance</strong></p>', '01KVJGYWQJ81G1F55H64QE319S.webp', NULL, NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-20 06:44:00', '2026-06-20 06:44:15'),
(38, 14, 'general', 'Mens Premium Solid T-Shirt', 'mens-premium-solid-t-shirt', NULL, '<p><strong>Fabric:</strong> 100% Cotton</p><p><strong>GSM:</strong> 130 - 150</p><p><strong>MOQ:</strong> 1000 units</p><p><strong>Colors:</strong> 15+ options</p>', '01KVJJFQ9N6JKV34XA4S01Z9FQ.webp', NULL, NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-20 07:10:55', '2026-06-20 07:10:55'),
(39, 14, 'general', 'Basic T-shirt for Men', 'basic-t-shirt-for-men', NULL, '<p><strong>Fabric:</strong> 100% Cotton</p><p><strong>GSM:</strong> 180 - 200</p><p><strong>MOQ:</strong> 500 units</p><p><strong>Colors:</strong> 15+ options<br><br><br></p>', '01KVJJP4P1NXAP6K4T1WWAQSMV.jpg', NULL, NULL, NULL, '_self', NULL, NULL, 0, 'published', NULL, '2026-06-20 07:13:46', '2026-06-20 07:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `identifier`, `description`, `background_color`, `css_class`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Latest Articles', 'latest-articles', 'Recent blog posts preview', NULL, NULL, 'active', '2026-06-16 08:26:21', '2026-06-16 08:26:21'),
(6, 'Contact Form', 'contact-form', 'Contact form and details', NULL, NULL, 'active', '2026-06-16 08:26:21', '2026-06-16 08:26:21'),
(7, 'FAQ', 'faq', 'Frequently asked questions', NULL, NULL, 'active', '2026-06-16 08:26:21', '2026-06-16 08:26:21'),
(8, 'Testimonials', 'testimonials', 'Client testimonials and reviews', NULL, NULL, 'active', '2026-06-16 08:26:21', '2026-06-16 08:26:21'),
(9, 'about hero', 'about-hero', NULL, NULL, NULL, 'active', '2026-06-16 08:33:52', '2026-06-16 08:33:52'),
(10, 'Our Journey', 'our-journey', NULL, NULL, NULL, 'active', '2026-06-16 09:58:24', '2026-06-16 09:58:24'),
(11, 'Mission', 'mission', NULL, NULL, NULL, 'active', '2026-06-17 09:25:02', '2026-06-17 09:25:02'),
(12, 'Our Core Values', 'our-core-values', NULL, NULL, NULL, 'active', '2026-06-17 09:47:03', '2026-06-17 09:47:03'),
(13, 'Gallery', 'gallery', 'show factory image', NULL, NULL, 'active', '2026-06-19 10:10:11', '2026-06-19 10:10:11'),
(14, 'Product', 'product', NULL, NULL, NULL, 'active', '2026-06-19 12:31:17', '2026-06-19 12:31:48'),
(15, 'Team', 'tea', NULL, NULL, NULL, 'active', '2026-06-19 13:52:53', '2026-06-19 13:52:53'),
(16, 'Logo', 'home', NULL, NULL, NULL, 'active', '2026-06-20 01:00:25', '2026-06-20 01:04:17'),
(17, 'About Company', 'about-company', NULL, NULL, NULL, 'active', '2026-06-20 05:34:37', '2026-06-20 05:34:37'),
(18, 'Factory Highlights', 'factory-highlights', NULL, NULL, NULL, 'active', '2026-06-20 06:38:31', '2026-06-20 06:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Gwsz2Ub7h1NqoYrd5nwu25mOJ1ewqvoQ9h9v1MGo', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJCclVQNnIzMnlwWEpQZ2dFYWJVbDRPclhCZjlFVEU0ZlgzZDh6V2NYIiwidXJsIjpbXSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3Byb2R1Y3RzIiwicm91dGUiOiJwcm9kdWN0cyJ9LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MSwicGFzc3dvcmRfaGFzaF93ZWIiOiJmZjg0Y2YwMGI5MTFlZmQ1NTA3ZTlhZGM3YWMwMzNjNmUxNmQyYjI1NzllODgxODc0NGEzYjQ3NmZiZWNjNTFhIiwidGFibGVzIjp7IjYwYmY2MDMwOTQ3OTIyY2VjMzc0OWExMzAwNGY2MTQ4X2NvbHVtbnMiOlt7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoib3JkZXIiLCJsYWJlbCI6IiMiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoibmFtZSIsImxhYmVsIjoiTmFtZSIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJpZGVudGlmaWVyIiwibGFiZWwiOiJJZGVudGlmaWVyIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InN0YXR1cyIsImxhYmVsIjoiU3RhdHVzIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InBvc3RzX2NvdW50IiwibGFiZWwiOiJQb3N0cyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9XSwiOTc5MmI2ZGU1NzMxNTZlYzA0NWVhODE4ODFiZTNkM2RfY29sdW1ucyI6W3sidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJvcmRlciIsImxhYmVsIjoiIyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJuYW1lIiwibGFiZWwiOiJOYW1lIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InNsdWciLCJsYWJlbCI6IlNsdWciLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoic3RhdHVzIiwibGFiZWwiOiJTdGF0dXMiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoic2xpZGVyLm5hbWUiLCJsYWJlbCI6IlNsaWRlciIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOnRydWUsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6ZmFsc2V9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJzZWN0aW9uc19jb3VudCIsImxhYmVsIjoiU2VjdGlvbnMiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoidXBkYXRlZF9hdCIsImxhYmVsIjoiTGFzdCB1cGRhdGVkIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOmZhbHNlLCJpc1RvZ2dsZWFibGUiOnRydWUsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6dHJ1ZX1dLCI1MmNlZjM4ODBjYzlhNDgyNWM4MTVkMmNlYzEzYThiMF9jb2x1bW5zIjpbeyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im5hbWUiLCJsYWJlbCI6Ik5hbWUiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiaWRlbnRpZmllciIsImxhYmVsIjoiSWRlbnRpZmllciIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJzdGF0dXMiLCJsYWJlbCI6IlN0YXR1cyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJwb3N0c19jb3VudCIsImxhYmVsIjoiUG9zdHMiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoicGFnZXNfY291bnQiLCJsYWJlbCI6IlBhZ2VzIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InVwZGF0ZWRfYXQiLCJsYWJlbCI6Ikxhc3QgdXBkYXRlZCIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjpmYWxzZSwiaXNUb2dnbGVhYmxlIjp0cnVlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOnRydWV9XSwiYTYwN2NkYTczY2JkZTQ0NmY4YmI2NGNjZDc1NjA2ZWVfY29sdW1ucyI6W3sidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJpbWFnZSIsImxhYmVsIjoiSW1hZ2UiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjp0cnVlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOmZhbHNlfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoidGl0bGUiLCJsYWJlbCI6IlRpdGxlIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InR5cGUiLCJsYWJlbCI6IlR5cGUiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoic2VjdGlvbi5uYW1lIiwibGFiZWwiOiJTZWN0aW9uIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InN0YXR1cyIsImxhYmVsIjoiU3RhdHVzIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InRhZyIsImxhYmVsIjoiVGFnIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpmYWxzZX0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im9yZGVyIiwibGFiZWwiOiIjIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InB1Ymxpc2hlZF9hdCIsImxhYmVsIjoiUHVibGlzaGVkIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOmZhbHNlLCJpc1RvZ2dsZWFibGUiOnRydWUsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6dHJ1ZX1dfSwiZmlsYW1lbnQiOltdfQ==', 1781961594);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autoplay` tinyint(1) NOT NULL DEFAULT '1',
  `autoplay_speed` int UNSIGNED NOT NULL DEFAULT '5000' COMMENT 'milliseconds between slides',
  `effect` enum('slide','fade') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'slide',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider_items`
--

CREATE TABLE `slider_items` (
  `id` bigint UNSIGNED NOT NULL,
  `slider_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subheading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `order` int UNSIGNED NOT NULL DEFAULT '0',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Admin', 'admin@textileexport.com', NULL, '$2y$12$pqlVs1oczOhO3YGfCf3Py.Ih9ARwVsta/fUORbM.bg/EfLh9O5vQe', NULL, '2026-06-16 08:26:21', '2026-06-16 08:26:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

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
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD KEY `pages_slider_id_foreign` (`slider_id`);

--
-- Indexes for table `page_section`
--
ALTER TABLE `page_section`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_section_page_id_section_id_unique` (`page_id`,`section_id`),
  ADD KEY `page_section_section_id_foreign` (`section_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_section_id_foreign` (`section_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sections_identifier_unique` (`identifier`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sliders_identifier_unique` (`identifier`);

--
-- Indexes for table `slider_items`
--
ALTER TABLE `slider_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slider_items_slider_id_foreign` (`slider_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `page_section`
--
ALTER TABLE `page_section`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider_items`
--
ALTER TABLE `slider_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `page_section`
--
ALTER TABLE `page_section`
  ADD CONSTRAINT `page_section_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `page_section_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slider_items`
--
ALTER TABLE `slider_items`
  ADD CONSTRAINT `slider_items_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
