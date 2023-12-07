-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 05:45 PM
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
-- Database: `tests_program_batch4`
--

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
(5, '2023_12_06_064212_t_b_l__b_a_r_a_n_g', 1),
(6, '2023_12_06_064320_t_b_l__s_u_p_l_i_e_r', 1),
(7, '2023_12_06_064421_t_b_l__h_b_e_l_i', 1),
(8, '2023_12_06_064426_t_b_l__d_b_e_l_i', 1),
(9, '2023_12_06_064508_t_b_l__s_t_o_c_k', 1),
(10, '2023_12_06_064522_t_b_l__h_u_t_a_n_g', 1);

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
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `KODEBRG` char(10) NOT NULL,
  `NAMABRG` char(100) NOT NULL,
  `SATUAN` char(10) NOT NULL,
  `HARGABELI` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `KODEBRG`, `NAMABRG`, `SATUAN`, `HARGABELI`, `created_at`, `updated_at`) VALUES
(1, 'ASD', 'ASDIN', 'asdas', 2332, '2023-12-07 09:27:33', '2023-12-07 09:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dbeli`
--

CREATE TABLE `tbl_dbeli` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NOTRANSAKSI` char(10) NOT NULL,
  `KODEBRG` char(10) NOT NULL,
  `HARGABELI` bigint(20) UNSIGNED NOT NULL,
  `QTY` int(11) NOT NULL,
  `DISKON` int(11) NOT NULL,
  `DISKONRP` double(8,2) NOT NULL,
  `TOTALRP` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hbeli`
--

CREATE TABLE `tbl_hbeli` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NOTRANSAKSI` char(10) NOT NULL,
  `KODESPL` char(10) NOT NULL,
  `TGLBELI` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hutang`
--

CREATE TABLE `tbl_hutang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NOTRANSAKSI` char(10) NOT NULL,
  `KODESPL` char(10) NOT NULL,
  `TGLBELI` date NOT NULL,
  `TOTALHUTANG` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `KODEBRG` char(10) NOT NULL,
  `QTYBELI` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suplier`
--

CREATE TABLE `tbl_suplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `KODESPL` char(10) NOT NULL,
  `NAMASPL` char(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_suplier`
--

INSERT INTO `tbl_suplier` (`id`, `KODESPL`, `NAMASPL`, `created_at`, `updated_at`) VALUES
(1, 'sda', 'ASDIafasdN', '2023-12-07 09:27:33', '2023-12-07 09:27:33');

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
(1, 'Admin', 'test@example.com', '2023-12-07 09:27:32', '$2y$12$TERDsnYSqcO2bBLupkIf/eiuqfp9zNmiNm8zuRaTN5JhXsMFIOCQG', 'LHBFNswa3phQOYTeHuhGEePYGv9nxOhUgg4u7HM7PclYCqDiamhs9eWglUpC', '2023-12-07 09:27:33', '2023-12-07 09:27:33');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_barang_kodebrg_unique` (`KODEBRG`);

--
-- Indexes for table `tbl_dbeli`
--
ALTER TABLE `tbl_dbeli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_dbeli_notransaksi_foreign` (`NOTRANSAKSI`),
  ADD KEY `tbl_dbeli_kodebrg_foreign` (`KODEBRG`);

--
-- Indexes for table `tbl_hbeli`
--
ALTER TABLE `tbl_hbeli`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_hbeli_notransaksi_unique` (`NOTRANSAKSI`),
  ADD KEY `tbl_hbeli_kodespl_foreign` (`KODESPL`);

--
-- Indexes for table `tbl_hutang`
--
ALTER TABLE `tbl_hutang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_hutang_notransaksi_foreign` (`NOTRANSAKSI`),
  ADD KEY `tbl_hutang_kodespl_foreign` (`KODESPL`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD KEY `tbl_stock_kodebrg_foreign` (`KODEBRG`);

--
-- Indexes for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_suplier_kodespl_unique` (`KODESPL`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_dbeli`
--
ALTER TABLE `tbl_dbeli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_hbeli`
--
ALTER TABLE `tbl_hbeli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_hutang`
--
ALTER TABLE `tbl_hutang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_dbeli`
--
ALTER TABLE `tbl_dbeli`
  ADD CONSTRAINT `tbl_dbeli_kodebrg_foreign` FOREIGN KEY (`KODEBRG`) REFERENCES `tbl_barang` (`KODEBRG`),
  ADD CONSTRAINT `tbl_dbeli_notransaksi_foreign` FOREIGN KEY (`NOTRANSAKSI`) REFERENCES `tbl_hbeli` (`NOTRANSAKSI`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_hbeli`
--
ALTER TABLE `tbl_hbeli`
  ADD CONSTRAINT `tbl_hbeli_kodespl_foreign` FOREIGN KEY (`KODESPL`) REFERENCES `tbl_suplier` (`KODESPL`);

--
-- Constraints for table `tbl_hutang`
--
ALTER TABLE `tbl_hutang`
  ADD CONSTRAINT `tbl_hutang_kodespl_foreign` FOREIGN KEY (`KODESPL`) REFERENCES `tbl_suplier` (`KODESPL`),
  ADD CONSTRAINT `tbl_hutang_notransaksi_foreign` FOREIGN KEY (`NOTRANSAKSI`) REFERENCES `tbl_hbeli` (`NOTRANSAKSI`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD CONSTRAINT `tbl_stock_kodebrg_foreign` FOREIGN KEY (`KODEBRG`) REFERENCES `tbl_barang` (`KODEBRG`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
