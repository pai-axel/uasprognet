-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2025 at 07:01 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cvananta`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_title` varchar(50) NOT NULL,
  `about_year` int(11) NOT NULL,
  `about_content` text NOT NULL,
  `about_image` varchar(255) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `about_title`, `about_year`, `about_content`, `about_image`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'UASPROGNET', 2010, '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam\"', 'about.jpeg', 'UASPROGNET', '2024-12-16 11:04:14', '2024-12-16 11:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `artikel_title` varchar(50) NOT NULL,
  `artikel_sampul` varchar(255) NOT NULL,
  `artikel_konten` text NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `id_user`, `artikel_title`, `artikel_sampul`, `artikel_konten`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tutorial cara merawat laptop', 'artikel1.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis. In, veritatis corrupti?', 'tutorial-cara-merawat-laptop', '2024-12-16 11:04:13', '2024-12-16 11:04:13'),
(2, 1, 'Belajar Laravel', '1734944439-WhatsApp Image 2024-12-20 at 22.53.34_92e010d8.jpg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis. In, veritatis corrupti?</p>', 'belajar-laravel', '2024-12-16 11:04:13', '2024-12-23 02:00:39'),
(3, 1, 'Belajar Laravel Autentifikasi', 'artikel3.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis. In, veritatis corrupti?', 'belajar-laravel-autentifikasi', '2024-12-16 11:04:13', '2024-12-16 11:04:13'),
(4, 1, 'Rekomendasi Hp Tahun 2021', 'artikel4.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis. In, veritatis corrupti?', 'rekomendasi-hp-tahun-2021', '2024-12-16 11:04:13', '2024-12-16 11:04:13'),
(5, 1, 'adafadfd', '1734944474-—Pngtree—doctor 3d rendered emoji icon_13755185 1.png', 'adada', 'adafadfd', '2024-12-23 02:01:14', '2024-12-23 02:01:14'),
(6, 1, 'adaffdfd', '1734944551-layar (12).png', 'adafdfsfsfsf', 'adaffdfd', '2024-12-23 02:02:31', '2024-12-23 02:02:31'),
(7, 1, 'aafrgfgsgs', '1734944583-download1.png', 'afafffg', 'aafrgfgsgs', '2024-12-23 02:03:03', '2024-12-23 02:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_title` varchar(30) NOT NULL,
  `banner_sub` varchar(250) NOT NULL,
  `slug` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `banner_title`, `banner_sub`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'We are dynamic team', 'We provide consulting services in the area of IFRS and management reporting, helping companies to reach their highest level. We optimize business processes, making them easier.', 'we-are-dynamic-team', '2024-12-16 11:04:13', '2024-12-16 11:04:13'),
(2, 'Our Mission', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam\"', 'our-mission', '2024-12-16 11:04:13', '2024-12-16 11:04:13'),
(3, 'Vission', 'llum similique ducimus accusamus laudantium praesentium, impedit quaerat, itaque maxime sunt deleniti voluptas distinctio .', 'vission', '2024-12-16 11:04:13', '2024-12-16 11:04:13'),
(4, 'Our Approach', 'llum similique ducimus accusamus laudantium praesentium, impedit quaerat, itaque maxime sunt deleniti voluptas distinctio .', 'our-approach', '2024-12-16 11:04:13', '2024-12-16 11:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategori_berita` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `berita_title` varchar(50) NOT NULL,
  `berita_sampul_1` varchar(255) NOT NULL,
  `berita_sampul_2` varchar(255) NOT NULL,
  `berita_sampul_3` varchar(255) NOT NULL,
  `berita_konten_1` text NOT NULL,
  `berita_konten_2` text NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `id_kategori_berita`, `id_user`, `berita_title`, `berita_sampul_1`, `berita_sampul_2`, `berita_sampul_3`, `berita_konten_1`, `berita_konten_2`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Tutorial cara merawat laptop', 'berita1.jpg', 'berita2.jpeg', 'berita3.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis. In, veritatis corrupti?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt', 'tutorial-cara-merawat-laptop', '2024-12-16 11:04:13', '2024-12-16 11:04:13'),
(2, 2, 1, 'Belajar Laravel', 'berita4.jpg', 'berita5.jpg', 'berita6.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis. In, veritatis corrupti?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis. In, veritatis corrupti?', 'belajar-laravel', '2024-12-16 11:04:13', '2024-12-16 11:04:13'),
(3, 2, 1, 'Belajar Laravel Autentifikasi', 'berita7.jpg', 'berita8.jpg', 'berita9.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis. In, veritatis corrupti?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis', 'belajar-laravel-autentifikasi', '2024-12-16 11:04:13', '2024-12-16 11:04:13'),
(4, 3, 1, 'Rekomendasi Hp Tahun 2021', 'berita10.jpg', 'berita11.jpg', 'berita12.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis. In, veritatis corrupti?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis.', 'rekomendasi-hp-tahun-2021', '2024-12-16 11:04:13', '2024-12-16 11:04:13'),
(5, 2, 1, 'tes', '1734943825-WhatsApp Image 2024-12-20 at 22.53.34_92e010d8.jpg', '1734943825-404-error-with-tired-person-concept-illustration_114360-7899.png', '1734943825-42393387-9c5c-4be4-97b8-49260708719e.jpeg', 'adafafsssdfadsfs', '<p>aaffgfdgdffgddfgdfgdgdgd</p>', 'tes', '2024-12-23 01:50:25', '2024-12-23 01:50:25'),
(6, 1, 1, 'rereresgs', '1734943881-077554500_1541165354-HL__4_.jpg', '1734943881-afc58ea1-6480-465b-8736-c1d3cd4529b3.webp', '1734943881-Cover (5).png', 'aaffsfsfs', '<p>adafadsdfa</p>', 'rereresgs', '2024-12-23 01:51:21', '2024-12-23 01:51:21'),
(7, 3, 1, 'geedfgddgd', '1734943935-jenis-jenis_pupuk-1500x700.webp', '1734943935-WhatsApp-Image-2022-06-17-at-09.14.31.jpeg', '1734943935-pngtree-organic-fertilizer-texture-background-in-agriculture-image_13729783.png', 'advahdavhdaa', '<p>fsbfjsvfsh</p>', 'geedfgddgd', '2024-12-23 01:52:15', '2024-12-23 01:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `career_title` varchar(100) NOT NULL,
  `career_image` varchar(255) NOT NULL,
  `career_content` text NOT NULL,
  `career_available` tinyint(1) NOT NULL DEFAULT 1,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `career_title`, `career_image`, `career_content`, `career_available`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Excellent Service', '1734373572-background-cornfield.jpg', '<p>Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful</p>', 1, 'excellent-service', '2024-12-16 11:04:13', '2024-12-16 11:26:12');

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
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Apa itu petani pupuk', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam\"', 'apa-itu-petani-pupuk', '2024-12-16 11:04:14', '2024-12-16 11:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feature_title` varchar(50) NOT NULL,
  `feature_image` varchar(255) NOT NULL,
  `feature_content` varchar(255) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`id`, `feature_title`, `feature_image`, `feature_content`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Excellent Service', 'feature1.png', 'Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful', 'excellent-service', '2024-12-16 11:04:14', '2024-12-16 11:04:14'),
(2, 'Clean Working', 'feature2.png', 'Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful', 'clean-working', '2024-12-16 11:04:14', '2024-12-16 11:04:14'),
(3, 'Expert Farmer', 'feature3.png', 'Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful', 'expert-farmer', '2024-12-16 11:04:14', '2024-12-16 11:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `konten` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `konten`, `created_at`, `updated_at`) VALUES
(1, 'Laravel 8 Blog Musyahya', '2024-12-16 11:04:14', '2024-12-16 11:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_title` varchar(50) NOT NULL,
  `gallery_image` varchar(255) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `gallery_title`, `gallery_image`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Laravel 8 Blog Musyahya', '1734944737-images (17).jpg', 'laravel-8-blog-musyahya', '2024-12-16 11:04:13', '2024-12-23 02:05:37'),
(2, 'Laravel 8 Blog Musyahya tes3353', '1734944938-Frame 100.png', 'laravel-8-blog-musyahya-tes3353', '2024-12-23 02:08:58', '2024-12-23 02:08:58'),
(3, 'afafdfd', '1734944969-—Pngtree—doctor 3d rendered emoji icon_13755185 1.png', 'afafdfd', '2024-12-23 02:09:29', '2024-12-23 02:09:29'),
(4, 'adadadfdfdfsfdfdfdf', '1734945020-cach-bon-phan-huu-co-cho-cay-qua_1.jpeg', 'adadadfdfdfsfdfdfdf', '2024-12-23 02:10:20', '2024-12-23 02:10:20'),
(5, 'fdsssdfdf', '1734945069-images (15).jpg', 'fdsssdfdf', '2024-12-23 02:11:09', '2024-12-23 02:11:09'),
(6, 'dgdhdgdgd', '1734945094-download2.png', 'dgdhdgdgd', '2024-12-23 02:11:34', '2024-12-23 02:11:34'),
(7, 'Laravel 8 Blog Musyahya tes1', '1734945268-42393387-9c5c-4be4-97b8-49260708719e.jpeg', 'laravel-8-blog-musyahya-tes1', '2024-12-23 02:14:28', '2024-12-23 02:14:28'),
(8, 'fsfsfsfsf', '1734945299-istockphoto-914118332-170667a.jpg', 'fsfsfsfsf', '2024-12-23 02:14:59', '2024-12-23 02:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_berita_name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`id`, `kategori_berita_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'komputer dan laptop', 'komputer-dan-laptop', '2024-12-16 11:04:13', '2024-12-16 11:04:13'),
(2, 'bahasa pemrograman', 'bahasa-pemrograman', '2024-12-16 11:04:13', '2024-12-16 11:04:13'),
(3, 'android', 'android', '2024-12-16 11:04:13', '2024-12-16 11:04:13');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_22_063108_create_kategori_berita_table', 1),
(5, '2021_01_27_094756_create_berita_table', 1),
(6, '2021_01_27_185544_add_id_kategori_to_berita_table', 1),
(7, '2021_01_28_085907_create_tag_berita_table', 1),
(8, '2021_01_28_125128_create_tag_relation_berita_table', 1),
(9, '2021_01_31_163416_create_options_table', 1),
(10, '2021_02_01_171437_create_footer_table', 1),
(11, '2021_02_13_052058_add_id_user_to_berita_table', 1),
(12, '2021_02_28_153130_create_permission_tables', 1),
(13, '2021_05_06_130247_create_rekomendasi_table', 1),
(14, '2024_12_05_171206_create_banners_table', 1),
(15, '2024_12_06_055056_create_seos_table', 1),
(16, '2024_12_06_135929_create_galleries_table', 1),
(17, '2024_12_06_153756_create_faqs_table', 1),
(18, '2024_12_06_162308_create_products_table', 1),
(19, '2024_12_06_174447_create_supports_table', 1),
(20, '2024_12_07_024149_create_abouts_table', 1),
(21, '2024_12_07_074420_create_features_table', 1),
(22, '2024_12_07_152446_create_testimonis_table', 1),
(23, '2024_12_09_124741_create_artikel_table', 1),
(24, '2024_12_09_125924_create_tag_artikel_table', 1),
(25, '2024_12_09_130331_create_tag_relation_artikel_table', 1),
(26, '2024_12_09_130741_add_id_user_to_artikel_table', 1),
(27, '2024_12_13_130956_create_careers_table', 1),
(28, '2024_12_16_164141_create_value_companies_table', 1),
(29, '2024_12_16_175819_create_struktur_organisasis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(20) NOT NULL,
  `theme_color` varchar(10) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `location` varchar(50) NOT NULL,
  `call` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `maps` text NOT NULL,
  `product_footer` varchar(255) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `company_name`, `theme_color`, `banner_image`, `location`, `call`, `email`, `maps`, `product_footer`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'UASPROGNET', 'white', 'banner.webp', 'Jln Jermal Raya Link XII Sei Mati', '081234567890', 'f@gmail.com', 'https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed', 'necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful', 'UASPROGNET', '2024-12-16 11:04:13', '2024-12-16 11:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_content` text NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_title`, `product_image`, `product_content`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Growing Fruits and Vegetables', '1734450633-jual-produksi-pabrik-pupuk-kandang-kohe-kambing-murah.jpg', '<p>TOSS TBC merupakan sebuah gerakan atau kampanye untuk Temukan Tuberkulosis, Obati Sampai Sembuh TBC di Indonesia. Kampanye ini menjadi salah satu pendekatan untuk menemukan, mendiagnosis, mengobati dan menyembuhkan pasien TBC, serta menghentikan penularan TBC di masyarakat. TOSS TBC menargetkan 90 persen penurunan insiden TBC dan 95 persen penurunan kematian TBC pada tahun 2030. Langkah-langkah yang dilakukan TOSS TBC meliputi, mencari dan menemukan gejala di masyarakat, mengobati TBC dengan tepat, hingga memantau pengobatan TBC sampai sembuh.</p>', 'growing-fruits-and-vegetables', '2024-12-16 11:04:13', '2024-12-18 04:54:31'),
(2, 'Lorem ipsum doler et', '1734450662-WhatsApp-Image-2022-06-17-at-09.14.31.jpeg', '<p>TOSS TBC merupakan sebuah gerakan atau kampanye untuk Temukan Tuberkulosis, Obati Sampai Sembuh TBC di Indonesia. Kampanye ini menjadi salah satu pendekatan untuk menemukan, mendiagnosis, mengobati dan menyembuhkan pasien TBC, serta menghentikan penularan TBC di masyarakat. TOSS TBC menargetkan 90 persen penurunan insiden TBC dan 95 persen penurunan kematian TBC pada tahun 2030. Langkah-langkah yang dilakukan TOSS TBC meliputi, mencari dan menemukan gejala di masyarakat, mengobati TBC dengan tepat, hingga memantau pengobatan TBC sampai sembuh.</p>', 'lorem-ipsum-doler-et', '2024-12-17 08:51:02', '2024-12-18 04:54:22'),
(3, 'Lorem ipsum doler et', '1734450716-CYMERA_20230314_152048-236262100.webp', '<p>TOSS TBC merupakan sebuah gerakan atau kampanye untuk Temukan Tuberkulosis, Obati Sampai Sembuh TBC di Indonesia. Kampanye ini menjadi salah satu pendekatan untuk menemukan, mendiagnosis, mengobati dan menyembuhkan pasien TBC, serta menghentikan penularan TBC di masyarakat. TOSS TBC menargetkan 90 persen penurunan insiden TBC dan 95 persen penurunan kematian TBC pada tahun 2030. Langkah-langkah yang dilakukan TOSS TBC meliputi, mencari dan menemukan gejala di masyarakat, mengobati TBC dengan tepat, hingga memantau pengobatan TBC sampai sembuh.</p>', 'lorem-ipsum-doler-et', '2024-12-17 08:51:56', '2024-12-18 04:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_berita` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekomendasi`
--

INSERT INTO `rekomendasi` (`id`, `id_berita`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-12-16 11:04:13', '2024-12-16 11:04:13'),
(2, 2, '2024-12-16 11:04:13', '2024-12-16 11:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-12-16 11:04:13', '2024-12-16 11:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `domain_canonical` varchar(100) NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_language` text NOT NULL,
  `meta_author` text NOT NULL,
  `og_image` varchar(255) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `domain_canonical`, `meta_title`, `meta_description`, `meta_keywords`, `meta_language`, `meta_author`, `og_image`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'tes123', 'white', 'Jln Jermal Raya Link XII Sei Mati', '089521301996', 'ofulaltio@gmail.com', 'https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed', 'blog1.jpg', 'tes123', '2024-12-16 11:04:13', '2024-12-16 11:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `image_anggota` varchar(255) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id`, `nama_anggota`, `posisi`, `image_anggota`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Axel', 'Ketua', 'tio.jpg', 'axel', '2024-12-16 11:04:13', '2024-12-16 11:04:13'),
(2, 'Ama fani', 'CEO1', '1734373027-istockphoto-914118332-170667a.jpg', 'ama-fani', '2024-12-16 11:14:22', '2024-12-16 11:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `client_phone` varchar(15) NOT NULL,
  `client_email` varchar(20) NOT NULL,
  `client_text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `client_name`, `client_phone`, `client_email`, `client_text`, `created_at`, `updated_at`) VALUES
(1, 'Axel', '089521391996', 'axelo@gmail.com', 'Pelayanannya sangat bagus', '2024-12-16 11:04:13', '2024-12-16 11:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `tag_artikel`
--

CREATE TABLE `tag_artikel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_artikel_name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag_artikel`
--

INSERT INTO `tag_artikel` (`id`, `tag_artikel_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'lenovo 1', 'lenovo-1', '2024-12-16 11:04:13', '2024-12-17 08:18:07'),
(2, 'php', 'php', '2024-12-16 11:04:13', '2024-12-16 11:04:13'),
(3, 'samsung', 'samsung', '2024-12-16 11:04:13', '2024-12-16 11:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `tag_berita`
--

CREATE TABLE `tag_berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_berita_name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag_berita`
--

INSERT INTO `tag_berita` (`id`, `tag_berita_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'lenovo', 'lenovo', '2024-12-16 11:04:13', '2024-12-16 11:04:13'),
(2, 'php', 'php', '2024-12-16 11:04:13', '2024-12-16 11:04:13'),
(3, 'samsung', 'samsung', '2024-12-16 11:04:13', '2024-12-16 11:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `tag_relation_artikel`
--

CREATE TABLE `tag_relation_artikel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_artikel` bigint(20) UNSIGNED NOT NULL,
  `id_tag_artikel` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag_relation_artikel`
--

INSERT INTO `tag_relation_artikel` (`id`, `id_artikel`, `id_tag_artikel`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 3, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 3, 2, NULL, NULL),
(5, 4, 3, NULL, NULL),
(6, 4, 1, NULL, NULL),
(7, 5, 2, NULL, NULL),
(8, 5, 3, NULL, NULL),
(9, 6, 2, NULL, NULL),
(10, 6, 3, NULL, NULL),
(11, 7, 1, NULL, NULL),
(12, 7, 2, NULL, NULL),
(13, 7, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tag_relation_berita`
--

CREATE TABLE `tag_relation_berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_berita` bigint(20) UNSIGNED NOT NULL,
  `id_tag_berita` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag_relation_berita`
--

INSERT INTO `tag_relation_berita` (`id`, `id_berita`, `id_tag_berita`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 3, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 3, 2, NULL, NULL),
(5, 4, 3, NULL, NULL),
(6, 4, 1, NULL, NULL),
(7, 5, 1, NULL, NULL),
(8, 5, 2, NULL, NULL),
(9, 5, 3, NULL, NULL),
(10, 6, 1, NULL, NULL),
(11, 6, 2, NULL, NULL),
(12, 6, 3, NULL, NULL),
(13, 7, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `testi_client_name` varchar(50) NOT NULL,
  `testi_client_avatar` varchar(255) NOT NULL,
  `testi_client_content` text NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `testi_client_name`, `testi_client_avatar`, `testi_client_content`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Axel', 'avatar.jpg', '\"alteration in some form, by injected humour, or adagg', 'axel', '2024-12-16 11:04:14', '2024-12-16 11:04:14');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2024-12-16 11:04:13', '$2y$10$1EO5s25tQBBsy.VnhbnZh.tBBzs9.iAGOl.rrJZ/1HFIsBkKPlSme', 'tTGlQDGtly5658BZ5pVkmfWwV4eQYvPo000I4LwLx0noCOmZvwKJOs4lHyFC', '2024-12-16 11:04:13', '2024-12-16 11:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `value_company`
--

CREATE TABLE `value_company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value_title` varchar(100) NOT NULL,
  `value_color` varchar(20) NOT NULL,
  `value_content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `value_company`
--

INSERT INTO `value_company` (`id`, `value_title`, `value_color`, `value_content`, `created_at`, `updated_at`) VALUES
(1, 'Step One', '#ed1c24', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae culpa asperiores soluta officiis iusto quasi. Odio aliquid alias explicabo deleniti?', '2024-12-16 11:04:13', '2024-12-16 11:04:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_artikel`
--
ALTER TABLE `tag_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_berita`
--
ALTER TABLE `tag_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_relation_artikel`
--
ALTER TABLE `tag_relation_artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_relation_artikel_id_artikel_foreign` (`id_artikel`),
  ADD KEY `tag_relation_artikel_id_tag_artikel_foreign` (`id_tag_artikel`);

--
-- Indexes for table `tag_relation_berita`
--
ALTER TABLE `tag_relation_berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_relation_berita_id_berita_foreign` (`id_berita`),
  ADD KEY `tag_relation_berita_id_tag_berita_foreign` (`id_tag_berita`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `value_company`
--
ALTER TABLE `value_company`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tag_artikel`
--
ALTER TABLE `tag_artikel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tag_berita`
--
ALTER TABLE `tag_berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tag_relation_artikel`
--
ALTER TABLE `tag_relation_artikel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tag_relation_berita`
--
ALTER TABLE `tag_relation_berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `value_company`
--
ALTER TABLE `value_company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tag_relation_artikel`
--
ALTER TABLE `tag_relation_artikel`
  ADD CONSTRAINT `tag_relation_artikel_id_artikel_foreign` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_relation_artikel_id_tag_artikel_foreign` FOREIGN KEY (`id_tag_artikel`) REFERENCES `tag_artikel` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tag_relation_berita`
--
ALTER TABLE `tag_relation_berita`
  ADD CONSTRAINT `tag_relation_berita_id_berita_foreign` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_relation_berita_id_tag_berita_foreign` FOREIGN KEY (`id_tag_berita`) REFERENCES `tag_berita` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
