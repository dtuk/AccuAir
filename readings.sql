-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2019 at 07:07 AM
-- Server version: 10.3.12-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accuair`
--

--
-- Dumping data for table `readings`
--

INSERT INTO `readings` (`id`, `device_id`, `lat`, `lng`, `co`, `co2`, `tem`, `humidity`, `created_at`, `updated_at`) VALUES
(1, 1, '6.33860', '79.61530', '43', '1250', '55', '44', '2019-06-12 21:20:18', '2019-06-12 21:20:18'),
(2, 1, '6.31780', '79.97260', '50', '10144', '57', '49', '2019-06-12 21:20:34', '2019-06-12 21:20:34'),
(3, 1, '6.12240', '79.38860', '49', '1250', '44', '54', '2019-06-12 21:21:06', '2019-06-12 21:21:06'),
(4, 1, '6.85130', '79.76130', '42', '2980', '51', '43', '2019-06-12 21:21:36', '2019-06-12 21:21:36'),
(5, 1, '6.13450', '79.34060', '55', '5531', '44', '49', '2019-06-12 21:27:35', '2019-06-12 21:27:35'),
(6, 1, '6.39570', '79.41160', '53', '5623', '49', '43', '2019-06-12 21:30:39', '2019-06-12 21:30:39'),
(7, 1, '6.20450', '79.53260', '47', '1250', '53', '40', '2019-06-12 21:31:02', '2019-06-12 21:31:02'),
(8, 1, '6.54010', '79.62240', '53', '1789', '44', '48', '2019-06-12 21:31:48', '2019-06-12 21:31:48'),
(9, 1, '6.67840', '79.16510', '46', '5562', '53', '48', '2019-06-12 21:32:12', '2019-06-12 21:32:12'),
(10, 1, '6.57940', '79.35130', '53', '1250', '55', '57', '2019-06-12 21:32:35', '2019-06-12 21:32:35'),
(11, 1, '6.73360', '79.95620', '44', '1270', '49', '47', '2019-06-12 22:09:45', '2019-06-12 22:09:45'),
(12, 1, '6.20450', '79.53260', '43', '1270', '53', '40', '2019-06-12 22:09:59', '2019-06-12 22:09:59'),
(13, 1, '6.54650', '79.49610', '43', '5348', '47', '52', '2019-06-12 22:10:14', '2019-06-12 22:10:14'),
(14, 1, '6.68450', '79.71130', '48', '5409', '52', '47', '2019-06-12 22:10:30', '2019-06-12 22:10:30'),
(15, 1, '6.19140', '79.91560', '51', '5424', '57', '54', '2019-06-12 22:10:46', '2019-06-12 22:10:46'),
(16, 1, '6.64150', '79.17910', '43', '5332', '54', '55', '2019-06-12 22:11:23', '2019-06-12 22:11:23'),
(17, 1, '6.68360', '79.42220', '42', '5317', '58', '51', '2019-06-12 22:11:38', '2019-06-12 22:11:38'),
(18, 1, '6.77060', '79.12720', '42', '5317', '57', '56', '2019-06-12 22:11:54', '2019-06-12 22:11:54'),
(19, 1, '6.76590', '79.82840', '43', '5302', '58', '57', '2019-06-12 22:12:10', '2019-06-12 22:12:10'),
(20, 1, '6.47460', '79.82380', '42', '5439', '55', '45', '2019-06-12 22:12:25', '2019-06-12 22:12:25'),
(21, 1, '6.83090', '79.28730', '43', '5332', '57', '40', '2019-06-12 22:12:41', '2019-06-12 22:12:41'),
(22, 1, '6.76090', '79.59690', '51', '5439', '42', '46', '2019-06-12 22:12:56', '2019-06-12 22:12:56'),
(23, 1, '6.77940', '79.66850', '42', '5332', '52', '55', '2019-06-12 22:13:12', '2019-06-12 22:13:12'),
(24, 1, '6.34830', '79.14840', '45', '5317', '50', '56', '2019-06-12 22:13:27', '2019-06-12 22:13:27'),
(25, 1, '6.57700', '79.48790', '48', '5378', '52', '50', '2019-06-12 22:17:35', '2019-06-12 22:17:35'),
(26, 1, '6.87440', '79.49080', '43', '5332', '42', '52', '2019-06-12 22:19:51', '2019-06-12 22:19:51'),
(27, 1, '6.92590', '79.51920', '44', '5348', '49', '43', '2019-06-12 22:22:06', '2019-06-12 22:22:06'),
(28, 1, '6.69580', '79.82130', '69', '5760', '45', '45', '2019-06-12 22:28:51', '2019-06-12 22:28:51'),
(29, 1, '6.77540', '79.71560', '61', '5607', '46', '42', '2019-06-12 22:33:00', '2019-06-12 22:33:00'),
(30, 1, '6.67840', '79.16510', '76', '5730', '53', '48', '2019-06-12 22:35:14', '2019-06-12 22:35:14'),
(31, 1, '6.61490', '79.44670', '61', '5577', '56', '43', '2019-06-12 22:37:30', '2019-06-12 22:37:30'),
(32, 1, '6.57940', '79.35130', '58', '5546', '55', '57', '2019-06-12 22:39:45', '2019-06-12 22:39:45'),
(33, 1, '6.88120', '79.54470', '74', '5699', '42', '45', '2019-06-12 22:42:00', '2019-06-12 22:42:00'),
(34, 1, '6.57700', '79.48790', '32', '5287', '52', '50', '2019-06-13 02:03:22', '2019-06-13 02:03:22'),
(35, 1, '6.87440', '79.49080', '108', '5852', '42', '52', '2019-06-13 02:05:37', '2019-06-13 02:05:37'),
(36, 1, '6.87440', '79.49080', '63', '5760', '42', '52', '2019-06-13 02:10:56', '2019-06-13 02:10:56'),
(37, 1, '6.53870', '79.41080', '56', '5516', '49', '47', '2019-06-13 02:22:43', '2019-06-13 02:22:43'),
(38, 1, '6.73360', '79.95620', '51', '1250', '49', '47', '2019-06-13 02:27:06', '2019-06-13 02:27:06'),
(39, 1, '6.20450', '79.53260', '71', '1250', '53', '40', '2019-06-13 02:29:21', '2019-06-13 02:29:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;