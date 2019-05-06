-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2019 at 12:18 AM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siscad_aafc`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounting_accounts`
--

CREATE TABLE `accounting_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `code_short` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `account_type_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `account_balance_type_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `account_coverage_type_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `balance_start` double(15,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_balance_types`
--

CREATE TABLE `account_balance_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_coverage_types`
--

CREATE TABLE `account_coverage_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE `account_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `affiliated_societies`
--

CREATE TABLE `affiliated_societies` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnpj` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `comments` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `balance_sheets`
--

CREATE TABLE `balance_sheets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `management_unit_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `accounting_account_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `balance_previous` double(20,5) NOT NULL DEFAULT '0.00000',
  `credit` double(20,5) NOT NULL DEFAULT '0.00000',
  `debit` double(20,5) NOT NULL DEFAULT '0.00000',
  `balance_current` double(20,5) NOT NULL DEFAULT '0.00000',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `balance_sheet_previouses`
--

CREATE TABLE `balance_sheet_previouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `management_unit_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `accounting_account_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `account_balance_type_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `balance_previous` double(15,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `state_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `description` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_positions`
--

CREATE TABLE `company_positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_responsibilities`
--

CREATE TABLE `company_responsibilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_sectors`
--

CREATE TABLE `company_sectors` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_sub_sectors`
--

CREATE TABLE `company_sub_sectors` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` int(11) NOT NULL,
  `cpf` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `management_unit_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `company_sector_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `company_sub_sector_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `company_position_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `company_responsibility_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `employee_status_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `date_status` date DEFAULT NULL,
  `employee_status_reason_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `gender_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `birthday` date DEFAULT NULL,
  `comments` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_movements`
--

CREATE TABLE `employee_movements` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `management_unit_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `company_position_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `company_responsibility_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `company_sector_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `company_sub_sector_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_statuses`
--

CREATE TABLE `employee_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_status_reasons`
--

CREATE TABLE `employee_status_reasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `management_units`
--

CREATE TABLE `management_units` (
  `id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `code` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `comments` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` int(11) NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `material_unit_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `material_units`
--

CREATE TABLE `material_units` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `meeting_type_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `participants_estimated_qty` int(11) NOT NULL,
  `participants_confirmed_qty` int(11) NOT NULL,
  `participants_refunds_amount` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_members`
--

CREATE TABLE `meeting_members` (
  `id` int(10) UNSIGNED NOT NULL,
  `meeting_id` int(10) NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `expected_qty` tinyint(1) NOT NULL DEFAULT '0',
  `expected_qty_companion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `expected_qty_companion_extra` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `confirmed_qty` tinyint(1) NOT NULL DEFAULT '0',
  `confirmed_qty_companion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `confirmed_qty_companion_extra` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `comments` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_types`
--

CREATE TABLE `meeting_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `avatar` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` int(11) NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plan_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `member_status_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `member_status_reason_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `gender_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `date_aafc_ini` date DEFAULT NULL,
  `date_aafc_fim` date DEFAULT NULL,
  `date_inss` date DEFAULT NULL,
  `date_fundacao` date DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `bank_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `bank_agency` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_account` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comments` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members_8digitos`
--

CREATE TABLE `members_8digitos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` int(11) NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plan_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `member_status_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `member_status_reason_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `gender_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `date_aafc_ini` date DEFAULT NULL,
  `date_aafc_fim` date DEFAULT NULL,
  `date_inss` date DEFAULT NULL,
  `date_fundacao` date DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `bank_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `bank_agency` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_account` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comments` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members_PAE_NS`
--

CREATE TABLE `members_PAE_NS` (
  `MATR` int(11) DEFAULT NULL,
  `NFUNC` varchar(41) DEFAULT NULL,
  `DT_ADM` int(11) DEFAULT NULL,
  `DT_NASC` int(11) DEFAULT NULL,
  `ENDERECO` varchar(37) DEFAULT NULL,
  `BAIRRO` varchar(30) DEFAULT NULL,
  `CIDADE` varchar(25) DEFAULT NULL,
  `CIDADE_COD` int(11) DEFAULT NULL,
  `UF` varchar(2) DEFAULT NULL,
  `CEP` int(11) DEFAULT NULL,
  `Complemento` varchar(27) DEFAULT NULL,
  `Comp_Nro` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members_x`
--

CREATE TABLE `members_x` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` int(11) NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plan_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `member_status_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `member_status_reason_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `gender_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `date_aafc_ini` date DEFAULT NULL,
  `date_aafc_fim` date DEFAULT NULL,
  `date_inss` date DEFAULT NULL,
  `date_fundacao` date DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `bank_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `bank_agency` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_account` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comments` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_statuses`
--

CREATE TABLE `member_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_status_reasons`
--

CREATE TABLE `member_status_reasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `partner_sector_id` int(10) NOT NULL DEFAULT '1',
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `partner_type_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partner_sectors`
--

CREATE TABLE `partner_sectors` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partner_types`
--

CREATE TABLE `partner_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrimonials`
--

CREATE TABLE `patrimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `patrimonial_type_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `patrimonial_sub_type_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `patrimonial_brand_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `patrimonial_model_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `patrimonial_status_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `patrimonial_status_date` date DEFAULT NULL,
  `management_unit_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `company_sector_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `company_sub_sector_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `provider_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `employee_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `code` int(11) NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `purchase_process` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_value` double(10,2) NOT NULL DEFAULT '0.00',
  `purchase_value_current` double(15,2) NOT NULL DEFAULT '0.00',
  `residual_value` double(15,2) NOT NULL DEFAULT '0.00',
  `depreciation_date_start` date DEFAULT NULL,
  `comments` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrimonial_brands`
--

CREATE TABLE `patrimonial_brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrimonial_files`
--

CREATE TABLE `patrimonial_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `patrimonial_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `extension` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrimonial_intervention_types`
--

CREATE TABLE `patrimonial_intervention_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrimonial_materials`
--

CREATE TABLE `patrimonial_materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `patrimonial_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `patrimonial_intervention_type_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `material_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `provider_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `intervention_date` date DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `purchase_process` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_value` double(15,2) NOT NULL DEFAULT '0.00',
  `purchase_qty` float(6,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrimonial_models`
--

CREATE TABLE `patrimonial_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrimonial_movements`
--

CREATE TABLE `patrimonial_movements` (
  `id` int(10) UNSIGNED NOT NULL,
  `patrimonial_movement_type_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `patrimonial_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `employee_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `management_unit_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `company_sector_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `company_sub_sector_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `patrimonial_status_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrimonial_movement_types`
--

CREATE TABLE `patrimonial_movement_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrimonial_requests`
--

CREATE TABLE `patrimonial_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_employee_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `to_management_unit_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `to_company_sector_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `to_company_sub_sector_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `to_employee_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `to_patrimonial_status_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `to_patrimonial_status_date` date DEFAULT NULL,
  `patrimonial_request_status_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `comments` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrimonial_request_items`
--

CREATE TABLE `patrimonial_request_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `patrimonial_request_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `patrimonial_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `from_management_unit_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `from_company_sector_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `from_company_sub_sector_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `from_patrimonial_status_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `from_employee_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `from_patrimonial_status_date` date DEFAULT NULL,
  `to_patrimonial_status_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrimonial_request_statuses`
--

CREATE TABLE `patrimonial_request_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrimonial_sectors`
--

CREATE TABLE `patrimonial_sectors` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrimonial_services`
--

CREATE TABLE `patrimonial_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `patrimonial_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `patrimonial_intervention_type_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `service_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `provider_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `intervention_date` date DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `purchase_process` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_value` double(15,2) NOT NULL DEFAULT '0.00',
  `purchase_qty` double(6,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrimonial_statuses`
--

CREATE TABLE `patrimonial_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrimonial_sub_sectors`
--

CREATE TABLE `patrimonial_sub_sectors` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrimonial_sub_types`
--

CREATE TABLE `patrimonial_sub_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrimonial_types`
--

CREATE TABLE `patrimonial_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `asset_accounting_account_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `depreciation_accounting_account_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `useful_life_years` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `payment_date` date DEFAULT NULL,
  `payment_year` float(4,0) NOT NULL DEFAULT '0',
  `payment_month` float(2,0) NOT NULL DEFAULT '0',
  `payment_day` float(2,0) NOT NULL DEFAULT '0',
  `payment_reason_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `payment_method_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `payment_status_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `payment_value` float(6,2) NOT NULL DEFAULT '0.00',
  `payment_value_01` float(6,2) NOT NULL DEFAULT '0.00',
  `payment_value_02` float(6,2) NOT NULL DEFAULT '0.00',
  `payment_value_03` float(6,2) NOT NULL DEFAULT '0.00',
  `payment_value_04` float(6,2) NOT NULL DEFAULT '0.00',
  `payment_value_05` float(6,2) NOT NULL DEFAULT '0.00',
  `payment_value_06` float(6,2) NOT NULL DEFAULT '0.00',
  `payment_value_07` float(6,2) NOT NULL DEFAULT '0.00',
  `payment_value_08` float(6,2) NOT NULL DEFAULT '0.00',
  `payment_value_09` float(6,2) NOT NULL DEFAULT '0.00',
  `payment_value_10` float(6,2) NOT NULL DEFAULT '0.00',
  `payment_value_11` float(6,2) NOT NULL DEFAULT '0.00',
  `payment_value_12` float(6,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_reasons`
--

CREATE TABLE `payment_reasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_statuses`
--

CREATE TABLE `payment_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnpj` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `comments` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revisions`
--

CREATE TABLE `revisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `revisionable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `revisionable_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_value` text COLLATE utf8_unicode_ci,
  `new_value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banks`
--

CREATE TABLE `tbl_banks` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cities`
--

CREATE TABLE `tbl_cities` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `state` varchar(2) CHARACTER SET utf8 NOT NULL,
  `region_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `members_count` int(2) NOT NULL DEFAULT '0',
  `partners_count` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `id` int(11) NOT NULL,
  `member_situation_id` int(11) NOT NULL,
  `member_gender_id` int(11) NOT NULL DEFAULT '1',
  `city_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `code` int(10) NOT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `neighborhood` varchar(30) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `data_aafc_ini` date NOT NULL,
  `date_aafc_fim` date NOT NULL,
  `date_inss` datetime DEFAULT NULL,
  `date_fundacao` date DEFAULT NULL,
  `bank_id` int(11) NOT NULL,
  `bank_agency` varchar(5) DEFAULT NULL,
  `bank_account` varchar(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `region_id` int(11) DEFAULT NULL,
  `date_aafc_ini` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='20130520 importacao fundacao pae nsoc 2337<id<2849';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members_pan_20160403`
--

CREATE TABLE `tbl_members_pan_20160403` (
  `gender_id` double DEFAULT NULL,
  `member_status_id` double DEFAULT NULL,
  `plan_id` double DEFAULT NULL,
  `code` double DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `neighborhood` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `city_id` double DEFAULT NULL,
  `phone` double DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_benefits`
--

CREATE TABLE `tbl_member_benefits` (
  `id` int(11) NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `member_id` int(11) NOT NULL,
  `benefit_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_genders`
--

CREATE TABLE `tbl_member_genders` (
  `id` int(11) NOT NULL,
  `actived` tinyint(1) DEFAULT '1',
  `code` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_ip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  `deleted_by` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_ip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_situations`
--

CREATE TABLE `tbl_member_situations` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `code` varchar(5) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partners`
--

CREATE TABLE `tbl_partners` (
  `id` int(11) NOT NULL,
  `partner_type_id` int(10) NOT NULL,
  `agent` tinyint(1) DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `neighborhood` varchar(30) NOT NULL,
  `zip_code` varchar(9) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partner_types`
--

CREATE TABLE `tbl_partner_types` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `code` varchar(5) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plans`
--

CREATE TABLE `tbl_plans` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `code` varchar(5) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_regions`
--

CREATE TABLE `tbl_regions` (
  `id` int(11) NOT NULL,
  `name` varchar(35) CHARACTER SET utf8 NOT NULL,
  `code` varchar(5) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `members_count` int(2) NOT NULL DEFAULT '0',
  `partners_count` int(2) NOT NULL DEFAULT '0',
  `region_code` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `user_status_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `confirmation_code` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'sjkdfhiuwh lufh',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_statuses`
--

CREATE TABLE `user_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Xmanagement_units`
--

CREATE TABLE `Xmanagement_units` (
  `id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `code` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `comments` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Xproviders`
--

CREATE TABLE `Xproviders` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnpj` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `comments` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounting_accounts`
--
ALTER TABLE `accounting_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounting_accounts_account_type_id_foreign` (`account_type_id`),
  ADD KEY `accounting_accounts_account_balance_type_id_foreign` (`account_balance_type_id`),
  ADD KEY `accounting_accounts_account_coverage_type_id_foreign` (`account_coverage_type_id`);

--
-- Indexes for table `account_balance_types`
--
ALTER TABLE `account_balance_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_coverage_types`
--
ALTER TABLE `account_coverage_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affiliated_societies`
--
ALTER TABLE `affiliated_societies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `affiliated_societies_city_id_foreign` (`city_id`),
  ADD KEY `affiliated_societies_code_index` (`code`),
  ADD KEY `affiliated_societies_description_index` (`description`),
  ADD KEY `affiliated_societies_cnpj_index` (`cnpj`),
  ADD KEY `affiliated_societies_code_cnpj_description_index` (`code`,`cnpj`,`description`);

--
-- Indexes for table `balance_sheets`
--
ALTER TABLE `balance_sheets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balance_sheets_user_id_foreign` (`user_id`),
  ADD KEY `balance_sheets_management_unit_id_foreign` (`management_unit_id`),
  ADD KEY `balance_sheets_accounting_account_id_foreign` (`accounting_account_id`);

--
-- Indexes for table `balance_sheet_previouses`
--
ALTER TABLE `balance_sheet_previouses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balance_sheet_previouses_management_unit_id_foreign` (`management_unit_id`),
  ADD KEY `balance_sheet_previouses_accounting_account_id_foreign` (`accounting_account_id`),
  ADD KEY `balance_sheet_previouses_account_balance_type_id_foreign` (`account_balance_type_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_region_id_foreign` (`region_id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `company_positions`
--
ALTER TABLE `company_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_responsibilities`
--
ALTER TABLE `company_responsibilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_sectors`
--
ALTER TABLE `company_sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_sub_sectors`
--
ALTER TABLE `company_sub_sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_city_id_foreign` (`city_id`),
  ADD KEY `employees_management_unit_id_foreign` (`management_unit_id`),
  ADD KEY `employees_company_sector_id_foreign` (`company_sector_id`),
  ADD KEY `employees_company_sub_sector_id_foreign` (`company_sub_sector_id`),
  ADD KEY `employees_company_position_id_foreign` (`company_position_id`),
  ADD KEY `employees_company_responsibility_id_foreign` (`company_responsibility_id`),
  ADD KEY `employees_employee_status_id_foreign` (`employee_status_id`),
  ADD KEY `employees_employee_status_reason_id_foreign` (`employee_status_reason_id`),
  ADD KEY `employees_gender_id_foreign` (`gender_id`),
  ADD KEY `employees_name_index` (`name`),
  ADD KEY `employees_code_index` (`code`),
  ADD KEY `employees_cpf_index` (`cpf`),
  ADD KEY `employees_name_code_cpf_index` (`name`,`code`,`cpf`);

--
-- Indexes for table `employee_movements`
--
ALTER TABLE `employee_movements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_movements_employee_id_foreign` (`employee_id`),
  ADD KEY `employee_movements_management_unit_id_foreign` (`management_unit_id`),
  ADD KEY `employee_movements_company_position_id_foreign` (`company_position_id`),
  ADD KEY `employee_movements_company_responsibility_id_foreign` (`company_responsibility_id`),
  ADD KEY `employee_movements_company_sector_id_foreign` (`company_sector_id`),
  ADD KEY `employee_movements_company_sub_sector_id_foreign` (`company_sub_sector_id`);

--
-- Indexes for table `employee_statuses`
--
ALTER TABLE `employee_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_status_reasons`
--
ALTER TABLE `employee_status_reasons`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `jobs_queue_reserved_at_index` (`queue`(191),`reserved_at`);

--
-- Indexes for table `management_units`
--
ALTER TABLE `management_units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `management_units_region_id_foreign` (`region_id`),
  ADD KEY `management_units_city_id_foreign` (`city_id`),
  ADD KEY `management_units_code_index` (`code`),
  ADD KEY `management_units_description_index` (`description`),
  ADD KEY `management_units_code_description_index` (`code`,`description`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materials_material_unit_id_foreign` (`material_unit_id`);

--
-- Indexes for table `material_units`
--
ALTER TABLE `material_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meetings_meeting_type_id_foreign` (`meeting_type_id`),
  ADD KEY `meetings_city_id_foreign` (`city_id`);

--
-- Indexes for table `meeting_members`
--
ALTER TABLE `meeting_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meeting_members_member_id_foreign` (`member_id`);

--
-- Indexes for table `meeting_types`
--
ALTER TABLE `meeting_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_plan_id_foreign` (`plan_id`),
  ADD KEY `members_member_status_id_foreign` (`member_status_id`),
  ADD KEY `members_city_id_foreign` (`city_id`),
  ADD KEY `members_member_status_reason_id_foreign` (`member_status_reason_id`),
  ADD KEY `members_gender_id_foreign` (`gender_id`),
  ADD KEY `members_bank_id_foreign` (`bank_id`),
  ADD KEY `members_name_index` (`name`),
  ADD KEY `members_code_index` (`code`),
  ADD KEY `members_cpf_index` (`cpf`),
  ADD KEY `members_name_code_cpf_index` (`name`,`code`,`cpf`);

--
-- Indexes for table `members_8digitos`
--
ALTER TABLE `members_8digitos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_plan_id_foreign` (`plan_id`),
  ADD KEY `members_member_status_id_foreign` (`member_status_id`),
  ADD KEY `members_city_id_foreign` (`city_id`),
  ADD KEY `members_member_status_reason_id_foreign` (`member_status_reason_id`),
  ADD KEY `members_gender_id_foreign` (`gender_id`),
  ADD KEY `members_bank_id_foreign` (`bank_id`),
  ADD KEY `members_name_index` (`name`),
  ADD KEY `members_code_index` (`code`),
  ADD KEY `members_cpf_index` (`cpf`),
  ADD KEY `members_name_code_cpf_index` (`name`,`code`,`cpf`);

--
-- Indexes for table `members_x`
--
ALTER TABLE `members_x`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_plan_id_foreign` (`plan_id`),
  ADD KEY `members_member_status_id_foreign` (`member_status_id`),
  ADD KEY `members_city_id_foreign` (`city_id`),
  ADD KEY `members_member_status_reason_id_foreign` (`member_status_reason_id`),
  ADD KEY `members_gender_id_foreign` (`gender_id`),
  ADD KEY `members_bank_id_foreign` (`bank_id`),
  ADD KEY `members_name_index` (`name`),
  ADD KEY `members_code_index` (`code`),
  ADD KEY `members_cpf_index` (`cpf`),
  ADD KEY `members_name_code_cpf_index` (`name`,`code`,`cpf`);

--
-- Indexes for table `member_statuses`
--
ALTER TABLE `member_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_status_reasons`
--
ALTER TABLE `member_status_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partners_city_id_foreign` (`city_id`),
  ADD KEY `partners_partner_type_id_foreign` (`partner_type_id`);

--
-- Indexes for table `partner_sectors`
--
ALTER TABLE `partner_sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_types`
--
ALTER TABLE `partner_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `patrimonials`
--
ALTER TABLE `patrimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patrimonials_patrimonial_sub_type_id_foreign` (`patrimonial_sub_type_id`),
  ADD KEY `patrimonials_patrimonial_brand_id_foreign` (`patrimonial_brand_id`),
  ADD KEY `patrimonials_patrimonial_model_id_foreign` (`patrimonial_model_id`),
  ADD KEY `patrimonials_patrimonial_status_id_foreign` (`patrimonial_status_id`),
  ADD KEY `patrimonials_management_unit_id_foreign` (`management_unit_id`),
  ADD KEY `patrimonials_company_sector_id_foreign` (`company_sector_id`),
  ADD KEY `patrimonials_company_sub_sector_id_foreign` (`company_sub_sector_id`),
  ADD KEY `patrimonials_provider_id_foreign` (`provider_id`),
  ADD KEY `patrimonials_employee_id_foreign` (`employee_id`),
  ADD KEY `patrimonials_code_index` (`code`),
  ADD KEY `patrimonials_description_index` (`description`(191)),
  ADD KEY `patrimonials_serial_index` (`serial`),
  ADD KEY `patrimonials_patrimonial_type_id_patrimonial_sub_type_id_index` (`patrimonial_type_id`,`patrimonial_sub_type_id`);

--
-- Indexes for table `patrimonial_brands`
--
ALTER TABLE `patrimonial_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patrimonial_files`
--
ALTER TABLE `patrimonial_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patrimonial_files_patrimonial_id_index` (`patrimonial_id`);

--
-- Indexes for table `patrimonial_intervention_types`
--
ALTER TABLE `patrimonial_intervention_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patrimonial_materials`
--
ALTER TABLE `patrimonial_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patrimonial_materials_patrimonial_intervention_type_id_foreign` (`patrimonial_intervention_type_id`),
  ADD KEY `patrimonial_materials_provider_id_foreign` (`provider_id`),
  ADD KEY `patrimonial_materials_patrimonial_id_index` (`patrimonial_id`),
  ADD KEY `patrimonial_materials_material_id_index` (`material_id`);

--
-- Indexes for table `patrimonial_models`
--
ALTER TABLE `patrimonial_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patrimonial_movements`
--
ALTER TABLE `patrimonial_movements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patrimonial_movements_patrimonial_movement_type_id_foreign` (`patrimonial_movement_type_id`),
  ADD KEY `patrimonial_movements_patrimonial_id_foreign` (`patrimonial_id`),
  ADD KEY `patrimonial_movements_employee_id_foreign` (`employee_id`),
  ADD KEY `patrimonial_movements_management_unit_id_foreign` (`management_unit_id`),
  ADD KEY `patrimonial_movements_company_sector_id_foreign` (`company_sector_id`),
  ADD KEY `patrimonial_movements_company_sub_sector_id_foreign` (`company_sub_sector_id`),
  ADD KEY `patrimonial_movements_patrimonial_status_id_foreign` (`patrimonial_status_id`);

--
-- Indexes for table `patrimonial_movement_types`
--
ALTER TABLE `patrimonial_movement_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patrimonial_requests`
--
ALTER TABLE `patrimonial_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patrimonial_requests_from_employee_id_foreign` (`from_employee_id`),
  ADD KEY `patrimonial_requests_to_management_unit_id_foreign` (`to_management_unit_id`),
  ADD KEY `patrimonial_requests_to_company_sector_id_foreign` (`to_company_sector_id`),
  ADD KEY `patrimonial_requests_to_company_sub_sector_id_foreign` (`to_company_sub_sector_id`),
  ADD KEY `patrimonial_requests_to_employee_id_foreign` (`to_employee_id`),
  ADD KEY `patrimonial_requests_to_patrimonial_status_id_foreign` (`to_patrimonial_status_id`),
  ADD KEY `patrimonial_requests_patrimonial_request_status_id_foreign` (`patrimonial_request_status_id`);

--
-- Indexes for table `patrimonial_request_items`
--
ALTER TABLE `patrimonial_request_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patrimonial_request_items_patrimonial_request_id_foreign` (`patrimonial_request_id`),
  ADD KEY `patrimonial_request_items_patrimonial_id_foreign` (`patrimonial_id`),
  ADD KEY `patrimonial_request_items_from_management_unit_id_foreign` (`from_management_unit_id`),
  ADD KEY `patrimonial_request_items_from_company_sector_id_foreign` (`from_company_sector_id`),
  ADD KEY `patrimonial_request_items_from_company_sub_sector_id_foreign` (`from_company_sub_sector_id`),
  ADD KEY `patrimonial_request_items_from_patrimonial_status_id_foreign` (`from_patrimonial_status_id`),
  ADD KEY `patrimonial_request_items_from_employee_id_foreign` (`from_employee_id`);

--
-- Indexes for table `patrimonial_request_statuses`
--
ALTER TABLE `patrimonial_request_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patrimonial_sectors`
--
ALTER TABLE `patrimonial_sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patrimonial_services`
--
ALTER TABLE `patrimonial_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patrimonial_services_patrimonial_intervention_type_id_foreign` (`patrimonial_intervention_type_id`),
  ADD KEY `patrimonial_services_provider_id_foreign` (`provider_id`),
  ADD KEY `patrimonial_services_patrimonial_id_index` (`patrimonial_id`),
  ADD KEY `patrimonial_services_service_id_index` (`service_id`);

--
-- Indexes for table `patrimonial_statuses`
--
ALTER TABLE `patrimonial_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patrimonial_sub_sectors`
--
ALTER TABLE `patrimonial_sub_sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patrimonial_sub_types`
--
ALTER TABLE `patrimonial_sub_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patrimonial_types`
--
ALTER TABLE `patrimonial_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patrimonial_types_asset_accounting_account_id_foreign` (`asset_accounting_account_id`),
  ADD KEY `patrimonial_types_depreciation_accounting_account_id_foreign` (`depreciation_accounting_account_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_member_id_foreign` (`member_id`),
  ADD KEY `payments_payment_reason_id_foreign` (`payment_reason_id`),
  ADD KEY `payments_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `payments_payment_status_id_foreign` (`payment_status_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_reasons`
--
ALTER TABLE `payment_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_statuses`
--
ALTER TABLE `payment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `providers_city_id_foreign` (`city_id`),
  ADD KEY `providers_description_index` (`description`),
  ADD KEY `providers_cnpj_index` (`cnpj`),
  ADD KEY `providers_description_cnpj_index` (`description`,`cnpj`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revisions`
--
ALTER TABLE `revisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `revisions_revisionable_id_revisionable_type_index` (`revisionable_id`,`revisionable_type`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banks`
--
ALTER TABLE `tbl_banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sit_city` (`member_situation_id`,`city_id`),
  ADD KEY `nome` (`name`),
  ADD KEY `B` (`member_situation_id`,`city_id`,`plan_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `plan_id` (`plan_id`),
  ADD KEY `code_name` (`code`,`name`,`visible`),
  ADD KEY `A` (`member_situation_id`,`member_gender_id`,`city_id`,`plan_id`,`code`,`cpf`,`name`,`address`,`zip_code`,`neighborhood`),
  ADD KEY `index_members_on_name` (`name`);

--
-- Indexes for table `tbl_member_benefits`
--
ALTER TABLE `tbl_member_benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_member_genders`
--
ALTER TABLE `tbl_member_genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_member_situations`
--
ALTER TABLE `tbl_member_situations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_partners`
--
ALTER TABLE `tbl_partners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `index_partners_on_name` (`name`),
  ADD KEY `index_partners_on_city_id` (`city_id`);

--
-- Indexes for table `tbl_partner_types`
--
ALTER TABLE `tbl_partner_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_plans`
--
ALTER TABLE `tbl_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_regions`
--
ALTER TABLE `tbl_regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_status_id_foreign` (`user_status_id`);

--
-- Indexes for table `user_statuses`
--
ALTER TABLE `user_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Xmanagement_units`
--
ALTER TABLE `Xmanagement_units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `management_units_region_id_foreign` (`region_id`),
  ADD KEY `management_units_city_id_foreign` (`city_id`),
  ADD KEY `management_units_code_index` (`code`),
  ADD KEY `management_units_description_index` (`description`),
  ADD KEY `management_units_code_description_index` (`code`,`description`);

--
-- Indexes for table `Xproviders`
--
ALTER TABLE `Xproviders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `providers_city_id_foreign` (`city_id`),
  ADD KEY `providers_description_index` (`description`),
  ADD KEY `providers_cnpj_index` (`cnpj`),
  ADD KEY `providers_description_cnpj_index` (`description`,`cnpj`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounting_accounts`
--
ALTER TABLE `accounting_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `account_balance_types`
--
ALTER TABLE `account_balance_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `account_coverage_types`
--
ALTER TABLE `account_coverage_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `affiliated_societies`
--
ALTER TABLE `affiliated_societies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `balance_sheets`
--
ALTER TABLE `balance_sheets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4170;
--
-- AUTO_INCREMENT for table `balance_sheet_previouses`
--
ALTER TABLE `balance_sheet_previouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;
--
-- AUTO_INCREMENT for table `company_positions`
--
ALTER TABLE `company_positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `company_responsibilities`
--
ALTER TABLE `company_responsibilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `company_sectors`
--
ALTER TABLE `company_sectors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `company_sub_sectors`
--
ALTER TABLE `company_sub_sectors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `employee_movements`
--
ALTER TABLE `employee_movements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `employee_statuses`
--
ALTER TABLE `employee_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee_status_reasons`
--
ALTER TABLE `employee_status_reasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `management_units`
--
ALTER TABLE `management_units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `material_units`
--
ALTER TABLE `material_units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `meeting_members`
--
ALTER TABLE `meeting_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `meeting_types`
--
ALTER TABLE `meeting_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2109;
--
-- AUTO_INCREMENT for table `members_8digitos`
--
ALTER TABLE `members_8digitos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=994;
--
-- AUTO_INCREMENT for table `members_x`
--
ALTER TABLE `members_x`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=994;
--
-- AUTO_INCREMENT for table `member_statuses`
--
ALTER TABLE `member_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `member_status_reasons`
--
ALTER TABLE `member_status_reasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;
--
-- AUTO_INCREMENT for table `partner_sectors`
--
ALTER TABLE `partner_sectors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `partner_types`
--
ALTER TABLE `partner_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `patrimonials`
--
ALTER TABLE `patrimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `patrimonial_brands`
--
ALTER TABLE `patrimonial_brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `patrimonial_files`
--
ALTER TABLE `patrimonial_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `patrimonial_intervention_types`
--
ALTER TABLE `patrimonial_intervention_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `patrimonial_materials`
--
ALTER TABLE `patrimonial_materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `patrimonial_models`
--
ALTER TABLE `patrimonial_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `patrimonial_movements`
--
ALTER TABLE `patrimonial_movements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;
--
-- AUTO_INCREMENT for table `patrimonial_movement_types`
--
ALTER TABLE `patrimonial_movement_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `patrimonial_requests`
--
ALTER TABLE `patrimonial_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `patrimonial_request_items`
--
ALTER TABLE `patrimonial_request_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;
--
-- AUTO_INCREMENT for table `patrimonial_request_statuses`
--
ALTER TABLE `patrimonial_request_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patrimonial_sectors`
--
ALTER TABLE `patrimonial_sectors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patrimonial_services`
--
ALTER TABLE `patrimonial_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patrimonial_statuses`
--
ALTER TABLE `patrimonial_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `patrimonial_sub_sectors`
--
ALTER TABLE `patrimonial_sub_sectors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patrimonial_sub_types`
--
ALTER TABLE `patrimonial_sub_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `patrimonial_types`
--
ALTER TABLE `patrimonial_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payment_reasons`
--
ALTER TABLE `payment_reasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment_statuses`
--
ALTER TABLE `payment_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;
--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `revisions`
--
ALTER TABLE `revisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8130;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_banks`
--
ALTER TABLE `tbl_banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;
--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8772;
--
-- AUTO_INCREMENT for table `tbl_member_benefits`
--
ALTER TABLE `tbl_member_benefits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=961;
--
-- AUTO_INCREMENT for table `tbl_member_genders`
--
ALTER TABLE `tbl_member_genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_member_situations`
--
ALTER TABLE `tbl_member_situations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_partners`
--
ALTER TABLE `tbl_partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;
--
-- AUTO_INCREMENT for table `tbl_partner_types`
--
ALTER TABLE `tbl_partner_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_plans`
--
ALTER TABLE `tbl_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_regions`
--
ALTER TABLE `tbl_regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_statuses`
--
ALTER TABLE `user_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Xmanagement_units`
--
ALTER TABLE `Xmanagement_units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Xproviders`
--
ALTER TABLE `Xproviders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounting_accounts`
--
ALTER TABLE `accounting_accounts`
  ADD CONSTRAINT `accounting_accounts_account_balance_type_id_foreign` FOREIGN KEY (`account_balance_type_id`) REFERENCES `account_balance_types` (`id`),
  ADD CONSTRAINT `accounting_accounts_account_coverage_type_id_foreign` FOREIGN KEY (`account_coverage_type_id`) REFERENCES `account_coverage_types` (`id`),
  ADD CONSTRAINT `accounting_accounts_account_type_id_foreign` FOREIGN KEY (`account_type_id`) REFERENCES `account_types` (`id`);

--
-- Constraints for table `affiliated_societies`
--
ALTER TABLE `affiliated_societies`
  ADD CONSTRAINT `affiliated_societies_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `balance_sheets`
--
ALTER TABLE `balance_sheets`
  ADD CONSTRAINT `balance_sheets_accounting_account_id_foreign` FOREIGN KEY (`accounting_account_id`) REFERENCES `accounting_accounts` (`id`),
  ADD CONSTRAINT `balance_sheets_management_unit_id_foreign` FOREIGN KEY (`management_unit_id`) REFERENCES `Xmanagement_units` (`id`),
  ADD CONSTRAINT `balance_sheets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `balance_sheet_previouses`
--
ALTER TABLE `balance_sheet_previouses`
  ADD CONSTRAINT `balance_sheet_previouses_account_balance_type_id_foreign` FOREIGN KEY (`account_balance_type_id`) REFERENCES `account_balance_types` (`id`),
  ADD CONSTRAINT `balance_sheet_previouses_accounting_account_id_foreign` FOREIGN KEY (`accounting_account_id`) REFERENCES `accounting_accounts` (`id`),
  ADD CONSTRAINT `balance_sheet_previouses_management_unit_id_foreign` FOREIGN KEY (`management_unit_id`) REFERENCES `Xmanagement_units` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_material_unit_id_foreign` FOREIGN KEY (`material_unit_id`) REFERENCES `material_units` (`id`);

--
-- Constraints for table `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `meetings_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `meetings_meeting_type_id_foreign` FOREIGN KEY (`meeting_type_id`) REFERENCES `meeting_types` (`id`);

--
-- Constraints for table `meeting_members`
--
ALTER TABLE `meeting_members`
  ADD CONSTRAINT `meeting_members_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `members_x`
--
ALTER TABLE `members_x`
  ADD CONSTRAINT `members_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`),
  ADD CONSTRAINT `members_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `members_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  ADD CONSTRAINT `members_member_status_id_foreign` FOREIGN KEY (`member_status_id`) REFERENCES `member_statuses` (`id`),
  ADD CONSTRAINT `members_member_status_reason_id_foreign` FOREIGN KEY (`member_status_reason_id`) REFERENCES `member_status_reasons` (`id`),
  ADD CONSTRAINT `members_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`);

--
-- Constraints for table `patrimonial_requests`
--
ALTER TABLE `patrimonial_requests`
  ADD CONSTRAINT `patrimonial_requests_from_employee_id_foreign` FOREIGN KEY (`from_employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `patrimonial_requests_patrimonial_request_status_id_foreign` FOREIGN KEY (`patrimonial_request_status_id`) REFERENCES `patrimonial_request_statuses` (`id`),
  ADD CONSTRAINT `patrimonial_requests_to_company_sector_id_foreign` FOREIGN KEY (`to_company_sector_id`) REFERENCES `company_sectors` (`id`),
  ADD CONSTRAINT `patrimonial_requests_to_company_sub_sector_id_foreign` FOREIGN KEY (`to_company_sub_sector_id`) REFERENCES `company_sub_sectors` (`id`),
  ADD CONSTRAINT `patrimonial_requests_to_employee_id_foreign` FOREIGN KEY (`to_employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `patrimonial_requests_to_management_unit_id_foreign` FOREIGN KEY (`to_management_unit_id`) REFERENCES `management_units` (`id`),
  ADD CONSTRAINT `patrimonial_requests_to_patrimonial_status_id_foreign` FOREIGN KEY (`to_patrimonial_status_id`) REFERENCES `patrimonial_statuses` (`id`);

--
-- Constraints for table `patrimonial_request_items`
--
ALTER TABLE `patrimonial_request_items`
  ADD CONSTRAINT `patrimonial_request_items_from_company_sector_id_foreign` FOREIGN KEY (`from_company_sector_id`) REFERENCES `company_sectors` (`id`),
  ADD CONSTRAINT `patrimonial_request_items_from_company_sub_sector_id_foreign` FOREIGN KEY (`from_company_sub_sector_id`) REFERENCES `company_sub_sectors` (`id`),
  ADD CONSTRAINT `patrimonial_request_items_from_employee_id_foreign` FOREIGN KEY (`from_employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `patrimonial_request_items_from_management_unit_id_foreign` FOREIGN KEY (`from_management_unit_id`) REFERENCES `management_units` (`id`),
  ADD CONSTRAINT `patrimonial_request_items_from_patrimonial_status_id_foreign` FOREIGN KEY (`from_patrimonial_status_id`) REFERENCES `patrimonial_statuses` (`id`),
  ADD CONSTRAINT `patrimonial_request_items_patrimonial_id_foreign` FOREIGN KEY (`patrimonial_id`) REFERENCES `patrimonials` (`id`),
  ADD CONSTRAINT `patrimonial_request_items_patrimonial_request_id_foreign` FOREIGN KEY (`patrimonial_request_id`) REFERENCES `patrimonial_requests` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
