-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 01, 2019 at 02:05 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `yasir_traders`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Schumm, Dickinson and Borer', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(2, 'Smith-Sipes', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(3, 'Koch Group', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(4, 'King-Carroll', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(5, 'Marvin, Bogan and Kshlerin', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(6, 'King, Jast and Torphy', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(7, 'Walter, Gleason and Moore', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(8, 'Rowe, Bechtelar and Denesik', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(9, 'Klocko Ltd', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(10, 'O\'Conner-Hane', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(11, 'Ratke Inc', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(12, 'Upton Inc', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(13, 'Kreiger-Roob', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(14, 'Kozey-Heaney', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(15, 'Mayert-Simonis', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(16, 'Carroll, Schinner and Schumm', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(17, 'Wyman-Balistreri', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(18, 'Crooks-Kub', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(19, 'Schumm, Purdy and Mills', '2019-07-01 08:59:39', '2019-07-01 08:59:39'),
(20, 'Kreiger-Eichmann', '2019-07-01 08:59:39', '2019-07-01 08:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `balance` decimal(15,2) NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_man_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `carton` int(11) DEFAULT NULL,
  `unit_purchase_price` decimal(15,2) DEFAULT NULL,
  `unit_sale_price` decimal(15,2) DEFAULT NULL,
  `expire` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `sale_man_id` bigint(20) UNSIGNED NOT NULL,
  `order_booker_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_25_013942_create_roles_table', 1),
(4, '2019_06_25_014058_create_order_bookers_table', 1),
(5, '2019_06_25_014134_create_sale_men_table', 1),
(6, '2019_06_25_014207_create_customers_table', 1),
(7, '2019_06_25_014230_create_companies_table', 1),
(8, '2019_06_25_014313_create_products_table', 1),
(9, '2019_06_25_014610_create_inventories_table', 1),
(10, '2019_06_25_014722_create_sales_table', 1),
(11, '2019_06_25_014803_create_expenses_table', 1),
(12, '2019_06_25_014827_create_statements_table', 1),
(13, '2019_07_01_015914_create_invoices_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_bookers`
--

CREATE TABLE `order_bookers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `target` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `pcs_per_carton` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `qty`, `pcs_per_carton`, `created_at`, `updated_at`) VALUES
(1, 'Rio', 50, 0, NULL, NULL),
(2, 'Super', 50, 0, NULL, NULL),
(3, 'Lays', 50, 0, NULL, NULL),
(4, 'Coke', 50, 0, NULL, NULL),
(5, 'Sprite', 50, 0, NULL, NULL),
(6, 'Slanty', 50, 0, NULL, NULL),
(7, 'Prince', 50, 0, NULL, NULL),
(8, 'Gala', 50, 0, NULL, NULL),
(9, 'Zera Plus', 50, 0, NULL, NULL),
(10, 'Tuk', 50, 0, NULL, NULL),
(11, 'KurKuray', 50, 0, NULL, NULL),
(12, 'Walls Icecream', 50, 0, NULL, NULL),
(13, 'Lolypop', 50, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `sale_man_id` bigint(20) UNSIGNED NOT NULL,
  `order_booker_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  `unit_price` decimal(15,2) NOT NULL,
  `total_price` decimal(15,2) NOT NULL,
  `discount` decimal(2,2) NOT NULL,
  `discount_total_price` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_men`
--

CREATE TABLE `sale_men` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sale_men`
--

INSERT INTO `sale_men` (`id`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad', '0300-5868589', NULL, NULL),
(2, 'Ali', '0300-5868589', NULL, NULL),
(3, 'Faraz', '0300-5868589', NULL, NULL),
(4, 'Hamid', '0300-5868589', NULL, NULL),
(5, 'Mansoor', '0300-5868589', NULL, NULL),
(6, 'Riaz', '0300-5868589', NULL, NULL),
(7, 'Shahid', '0300-5868589', NULL, NULL),
(8, 'Sadaqat', '0300-5868589', NULL, NULL),
(9, 'Bilal', '0300-5868589', NULL, NULL),
(10, 'Sfeer', '0300-5868589', NULL, NULL),
(11, 'Tasawur', '0300-5868589', NULL, NULL),
(12, 'Asad', '0300-5868589', NULL, NULL),
(13, 'Yasir', '0300-5868589', NULL, NULL),
(14, 'Sibti', '0300-5868589', NULL, NULL),
(15, 'Sajjad', '0300-5868589', NULL, NULL),
(16, 'Khizer', '0300-5868589', NULL, NULL),
(17, 'Raza', '0300-5868589', NULL, NULL),
(18, 'SHAHID MUNAWWAR', '0300-5868589', NULL, NULL),
(19, 'MUHAMMAD ZAWISH', '0300-5868589', NULL, NULL),
(20, 'RABEEL NAZEER', '0300-5868589', NULL, NULL),
(21, 'HASAN', '0300-5868589', NULL, NULL),
(22, 'KHIZAR HUSSAIN', '0300-5868589', NULL, NULL),
(23, 'MUHAMMAD ZAIN UL ABIDIN', '0300-5868589', NULL, NULL),
(24, 'MUHAMMAD DAWOOD TALLAT', '0300-5868589', NULL, NULL),
(25, 'TAYYAB AKASH', '0300-5868589', NULL, NULL),
(26, 'MUHAMMAD ASIM', '0300-5868589', NULL, NULL),
(27, 'HAMZA MEHMOOD', '0300-5868589', NULL, NULL),
(28, 'SYED SAAD ALI SHAH', '0300-5868589', NULL, NULL),
(29, 'SAMEER TARIQ', '0300-5868589', NULL, NULL),
(30, 'ABDULLAH ASLAM', '0300-5868589', NULL, NULL),
(31, 'ZAIN UL ABDIN', '0300-5868589', NULL, NULL),
(32, 'NAZIM SHEHZAD', '0300-5868589', NULL, NULL),
(33, 'JAWAD AHMED MALIK', '0300-5868589', NULL, NULL),
(34, 'FAISAL NOSHAD TAHIR', '0300-5868589', NULL, NULL),
(35, 'HAMZA JAHANGIR', '0300-5868589', NULL, NULL),
(36, 'MAJADIL HUSSAIN', '0300-5868589', NULL, NULL),
(37, 'MUHAMMAD MOHSIN TALLAT', '0300-5868589', NULL, NULL),
(38, 'SOHA KHIZAR', '0300-5868589', NULL, NULL),
(39, 'MUHAMMAD KHIZAR', '0300-5868589', NULL, NULL),
(40, 'MUHAMMAD JABIR', '0300-5868589', NULL, NULL),
(41, 'HAROON MOAZZAM ELAHI', '0300-5868589', NULL, NULL),
(42, 'ABDUL HANAN', '0300-5868589', NULL, NULL),
(43, 'ANISA SALEEM', '0300-5868589', NULL, NULL),
(44, 'HAMZA', '0300-5868589', NULL, NULL),
(45, 'HAMZA TAHIR', '0300-5868589', NULL, NULL),
(46, 'MUHAMMAD AZFAR REHMAN', '0300-5868589', NULL, NULL),
(47, 'M.FURQAN SHABBIR', '0300-5868589', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statements`
--

CREATE TABLE `statements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `debit` decimal(15,2) NOT NULL,
  `credit` decimal(15,2) NOT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_bookers`
--
ALTER TABLE `order_bookers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_men`
--
ALTER TABLE `sale_men`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statements`
--
ALTER TABLE `statements`
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
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_bookers`
--
ALTER TABLE `order_bookers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_men`
--
ALTER TABLE `sale_men`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `statements`
--
ALTER TABLE `statements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
