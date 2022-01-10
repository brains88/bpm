-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 12:55 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `format` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `format`, `exchange_rate`, `active`, `created_at`, `updated_at`) VALUES
(1, 'US Dollar', 'USD', '$', '$1,0.00', '0', 0, '2022-01-07 15:49:18', '2022-01-07 15:49:18'),
(2, 'Pound Sterling', 'GBP', '£', '£1,0.00', '0', 0, '2022-01-07 15:49:18', '2022-01-07 15:49:18'),
(3, 'Canadian Dollar', 'CAD', '$', '$1,0.00', '0', 0, '2022-01-07 15:49:18', '2022-01-07 15:49:18'),
(4, 'Australian Dollar', 'AUD', '$', '$1,0.00', '0', 0, '2022-01-07 15:49:18', '2022-01-07 15:49:18'),
(8, 'Euro', 'EUR', '€', '1.0,00 €', '0', 0, '2022-01-07 15:49:18', '2022-01-07 15:49:18'),
(10, 'New Zealand Dollar', 'NZD', '$', '$1,0.00', '0', 0, '2022-01-08 10:34:22', '2022-01-08 10:34:22'),
(11, 'Swiss Franc', 'CHF', 'CHF', '1\'0.00 CHF', '0', 0, '2022-01-08 10:36:30', '2022-01-08 10:36:30'),
(12, 'Japan, Yen', 'JPY', '¥', '¥1,0.', '0', 0, '2022-01-08 10:36:48', '2022-01-08 10:36:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currencies_code_index` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
