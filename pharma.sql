-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 06, 2022 at 04:04 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `r_id` int NOT NULL AUTO_INCREMENT,
  `r_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `r_password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `r_time` datetime NOT NULL,
  `r_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`r_id`, `r_name`, `r_password`, `r_time`, `r_status`) VALUES
(1, 'admin', 'admin', '2022-11-18 15:40:29', '1');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `s_id` int NOT NULL AUTO_INCREMENT,
  `s_medname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `s_qty` int NOT NULL,
  `s_price` int NOT NULL,
  `s_batch` varchar(50) NOT NULL,
  `s_expiry` date NOT NULL,
  `s_category` varchar(50) NOT NULL,
  `s_time` timestamp NOT NULL,
  `s_status` enum('Available','Expired') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Available',
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`s_id`, `s_medname`, `s_qty`, `s_price`, `s_batch`, `s_expiry`, `s_category`, `s_time`, `s_status`) VALUES
(7, 'Ascoril LS Syrup', 100, 96, 'AB12', '2022-11-23', 'Syrups', '2022-11-20 14:26:07', 'Expired'),
(8, 'Avil 25', 2500, 10, 'E37', '2022-12-10', 'Tablet', '2022-11-20 14:26:29', 'Available'),
(10, 'Asthalin', 250, 16, '123', '2022-11-26', 'Syrups', '2022-11-21 15:36:53', 'Expired'),
(11, 'Ambrodil-S', 8000, 25, '123', '2023-03-04', 'Syrups', '2022-11-21 15:37:43', 'Available'),
(12, 'Aciloc 150', 500, 33, '456', '2023-04-01', 'Tablet', '2022-11-21 15:38:34', 'Available'),
(13, 'Alex ', 800, 95, '456', '2023-05-06', 'Syrups', '2022-11-21 15:39:19', 'Available'),
(14, 'Allegra 180mg', 55, 201, '8963', '2023-02-25', 'Tablet', '2022-11-21 15:40:12', 'Available'),
(15, 'Anovate ', 80, 114, '8952', '2023-03-24', 'Ointments', '2022-11-21 15:40:39', 'Available'),
(16, 'Avomine ', 7820, 100, '456', '2022-11-26', 'Tablet', '2022-11-21 15:41:12', 'Expired'),
(17, 'Asthakind-DX Syrup Sugar Free', 8000, 57, '123', '2023-02-22', 'Syrups', '2022-11-21 15:41:55', 'Available'),
(19, 'Asthalin ', 80, 20, '159', '2022-11-29', 'Syrups', '2022-11-21 15:43:01', 'Expired'),
(20, 'Ativan 2mg', 80, 20, '753', '2022-11-19', 'Tablet', '2022-11-21 15:44:20', 'Expired'),
(22, 'Atarax 10mg', 200, 35, '745', '2022-12-01', 'Tablet', '2022-11-21 15:52:53', 'Expired'),
(23, 'Almox 500', 80, 100, '79562', '2026-12-30', 'Other', '2022-11-21 15:57:01', 'Available'),
(24, 'Avil', 50, 20, '655', '2023-07-08', 'Injections', '2022-11-21 16:00:27', 'Available'),
(29, 'Amorafol 5mg', 50, 50, '45AB', '2022-11-29', 'Ointments', '2022-11-30 14:20:10', 'Expired'),
(35, 'Ab', 50, 100, 'Ab145', '2022-12-01', 'Tablet', '2022-12-02 06:25:15', 'Expired'),
(36, 'Abc', 80, 100, 'Ab1456', '2022-12-17', 'Ointments', '2022-12-02 06:25:47', 'Available'),
(33, 'Abcd', 50, 100, 'Ab163', '2023-01-26', 'Tablet', '2022-12-01 16:55:02', 'Available'),
(37, 'Abcs', 50, 100, 'Abc', '2022-12-23', 'Other', '2022-12-02 06:53:59', 'Expired');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
