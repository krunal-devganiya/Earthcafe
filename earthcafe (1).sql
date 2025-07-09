-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2025 at 10:55 AM
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
-- Database: `earthcafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'earthcafe', 'earthcafe123@gmail.com', 'hello how are you', '2025-03-10 17:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `user_id`, `file_name`, `file_path`) VALUES
(18, 9, 'HMS .pdf', '../uploads/HMS .pdf'),
(19, 9, 'Drawing2.jpg', '../uploads/Drawing2.jpg'),
(20, 9, 'bigdata (1).png', '../uploads/bigdata (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `document_status`
--

CREATE TABLE `document_status` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `request_id` varchar(255) DEFAULT NULL,
  `certificate_type` varchar(50) DEFAULT NULL,
  `document_name` varchar(100) DEFAULT NULL,
  `status` enum('Rejected','Approved') DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT 'default.png',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `contact`, `email`, `password`, `address`, `birthdate`, `gender`, `state`, `photo`, `updated_at`) VALUES
(6, 'employee', '0987654321', 'employee@gmail.com', '$2y$10$1WovtoLMLLkbN6/hu2LfcOlT39YrdqnyqqYYMss6dZOw8CabPLVUK', 'Chikuvadi road', '2025-03-22', 'Male', 'Gujarat', '1742364406_Screenshot (1).png', '2025-03-19 10:45:59'),
(7, 'abc', '2342342345', 'abc@gmail.com', '$2y$10$CbCl22upitUAzss/UhzZReJU0TAm4Y0BMSfA7W1AYZnzBOQs/fxJK', NULL, NULL, NULL, NULL, 'default.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` enum('unread','read') DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `status`, `created_at`) VALUES
(2, 10, 'Your document \'voting card (all member)\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 09:57:58'),
(3, 10, 'Your document \'gas bill\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 09:58:01'),
(4, 10, 'Your document \'voting card (all member)\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:05:20'),
(5, 10, 'Your document \'adhar card (all member)\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:14:48'),
(6, 10, 'Your document \'download (2)_1742292906.jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:18:10'),
(7, 10, 'Your document \'download (1).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:18:11'),
(8, 10, 'Your document \'download (1).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:25:23'),
(9, 10, 'Your document \'download (2).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:25:25'),
(10, 10, 'Your document \'download (2).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:27:27'),
(11, 10, 'Your document \'download (2).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:28:44'),
(12, 10, 'Your document \'download (2).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:29:24'),
(13, 10, 'Your document \'download (2).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:30:58'),
(14, 10, 'Your document \'download (2).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:31:39'),
(15, 10, 'Your document \'download (1).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:40:30'),
(16, 10, 'Your document \'download (1).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:41:00'),
(17, 10, 'Your document \'download (1).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:41:01'),
(18, 10, 'Your document \'gas bill\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:41:11'),
(19, 10, 'Your document \'download (1).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:51:53'),
(20, 10, 'Your document \'light bill\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:51:54'),
(21, 10, 'Your document \'gas bill\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:51:55'),
(22, 10, 'Your document \'passport size photo\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:51:56'),
(23, 10, 'Your document \'download (2).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:53:31'),
(24, 10, 'Your document \'download (1).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:53:31'),
(25, 10, 'Your document \'download (2).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:53:35'),
(26, 10, 'Your document \'download (1).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:53:35'),
(27, 10, 'Your document \'light bill\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:53:36'),
(28, 10, 'Your document \'gas bill\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:53:37'),
(29, 10, 'Your document \'passport size photo\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:53:38'),
(30, 10, 'Your document \'download (2).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:55:20'),
(31, 10, 'Your document \'download (1).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:56:51'),
(32, 10, 'Your document \'download (2).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 10:56:53'),
(33, 10, 'Your document \'download (2).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 11:00:48'),
(34, 10, 'Your document \'download (1).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 11:18:33'),
(35, 10, 'Your document \'download (1).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 11:18:33'),
(36, 10, 'Your document \'light bill\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 11:18:34'),
(37, 10, 'Your document \'download (1).jpg\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 11:18:51'),
(38, 10, 'Your document \'light bill\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 11:18:52'),
(39, 10, 'Your document \'passport size photo\' for \'Ration-card\' was rejected. Please upload a correct document.', 'unread', '2025-03-18 11:18:52'),
(40, 9, 'Your document \'Aadhsr card\' for \'Income-certificate\' was rejected. Please upload a correct document.', 'unread', '2025-03-20 03:13:58'),
(41, 9, 'Your document \'passport size photo\' for \'Driving-Licence\' was rejected. Please upload a correct document.', 'unread', '2025-03-20 03:20:25'),
(42, 9, 'Your document \'bigdata1.png\' for \'Driving-Licence\' was rejected. Please upload a correct document.', 'unread', '2025-03-20 03:21:42'),
(43, 9, 'Your document \'bigdata1.png\' for \'Driving-Licence\' was rejected. Please upload a correct document.', 'unread', '2025-03-20 03:22:26'),
(44, 9, 'Your document \'Ration Card\' for \'Income-certificate\' was rejected. Please upload a correct document.', 'unread', '2025-03-20 03:38:39'),
(45, 9, 'Your document \'Ration Card\' for \'Income-certificate\' was rejected. Please upload a correct document.', 'unread', '2025-03-20 03:38:45'),
(46, 9, 'Your document \'passport size photo\' for \'Pancard\' was rejected. Please upload a correct document.', 'unread', '2025-03-20 05:00:52'),
(47, 9, 'Your document \'adhar card\' for \'Pancard\' was rejected. Please upload a correct document.', 'unread', '2025-03-20 05:05:07'),
(48, 9, 'Your document \'passport size photo\' for \'Pancard\' was rejected. Please upload a correct document.', 'unread', '2025-03-20 05:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_fees` decimal(10,2) NOT NULL DEFAULT 0.00,
  `consultancy_fees` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_fees` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `request_id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `service_name`, `service_fees`, `consultancy_fees`, `total_fees`, `created_at`, `request_id`) VALUES
(3, 11, 'Income-certificate', 650.00, 500.00, 1150.00, '2025-03-25 06:05:33', NULL),
(4, 9, 'Income-certificate', 650.00, 500.00, 1150.00, '2025-03-25 06:41:28', NULL),
(5, 9, 'Pancard', 200.00, 100.00, 300.00, '2025-04-07 08:20:57', NULL),
(6, 9, 'Pancard', 200.00, 100.00, 300.00, '2025-04-07 08:36:17', '67'),
(7, 9, 'Pancard', 200.00, 100.00, 300.00, '2025-04-07 08:38:15', '67f38ef49a04b'),
(8, 9, 'Pancard', 200.00, 100.00, 300.00, '2025-04-07 08:42:15', '67f38fe65633a');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `certificate_type` varchar(50) DEFAULT NULL,
  `document_name` varchar(100) DEFAULT NULL,
  `document_path` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Active','Success','Wrong Document','Service Rejected') DEFAULT 'Pending',
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `request_id` varchar(255) DEFAULT NULL,
  `reupload_request` tinyint(1) DEFAULT 0,
  `is_upload` int(11) NOT NULL DEFAULT 0 COMMENT '0 is pending,1 is complete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `user_id`, `certificate_type`, `document_name`, `document_path`, `status`, `upload_time`, `request_id`, `reupload_request`, `is_upload`) VALUES
(123, 11, 'Income-certificate', 'Pasport size Photo', 'uploads/11/Income-certificate/1742882695_pasportsizephoto.jpg', 'Pending', '2025-03-25 06:04:55', '67e2478781d70', 0, 0),
(124, 11, 'Income-certificate', 'Aadhar card', 'uploads/11/Income-certificate/1742882695_aadharcard.jpg', 'Pending', '2025-03-25 06:04:55', '67e2478781d70', 0, 0),
(125, 11, 'Income-certificate', 'Ration Card', 'uploads/11/Income-certificate/1742882695_rationcard.jpeg', 'Pending', '2025-03-25 06:04:55', '67e2478781d70', 0, 0),
(126, 11, 'Income-certificate', 'Light Bill', 'uploads/11/Income-certificate/1742882695_lightbill.jpeg', 'Pending', '2025-03-25 06:04:55', '67e2478781d70', 0, 0),
(127, 11, 'Income-certificate', 'ITR Return', 'uploads/11/Income-certificate/1742882695_itrreturn.jpg', 'Pending', '2025-03-25 06:04:55', '67e2478781d70', 0, 0),
(128, 11, 'Income-certificate', 'Pasport size Photo', 'uploads/11/Income-certificate/1742883075_pasportsizephoto.jpg', 'Pending', '2025-03-25 06:11:15', '67e249039bfe4', 0, 0),
(129, 11, 'Income-certificate', 'Aadhar card', 'uploads/11/Income-certificate/1742883075_aadharcard.jpg', 'Pending', '2025-03-25 06:11:15', '67e249039bfe4', 0, 0),
(130, 11, 'Income-certificate', 'Ration Card', 'uploads/11/Income-certificate/1742883075_rationcard.jpeg', 'Pending', '2025-03-25 06:11:15', '67e249039bfe4', 0, 0),
(131, 11, 'Income-certificate', 'Light Bill', 'uploads/11/Income-certificate/1742883075_lightbill.jpeg', 'Pending', '2025-03-25 06:11:15', '67e249039bfe4', 0, 0),
(132, 11, 'Income-certificate', 'ITR Return', 'uploads/11/Income-certificate/1742883075_itrreturn.jpg', 'Pending', '2025-03-25 06:11:15', '67e249039bfe4', 0, 0),
(133, 9, 'Income-certificate', 'Pasport size Photo', 'uploads/9/Income-certificate/1742884886_pasportsizephoto.jpg', 'Pending', '2025-03-25 06:41:26', '67e2501689609', 0, 0),
(134, 9, 'Income-certificate', 'Aadhar card', 'uploads/9/Income-certificate/1742884886_aadharcard.jpg', 'Pending', '2025-03-25 06:41:26', '67e2501689609', 0, 0),
(135, 9, 'Income-certificate', 'Ration Card', 'uploads/9/Income-certificate/1742884886_rationcard.jpeg', 'Pending', '2025-03-25 06:41:26', '67e2501689609', 0, 0),
(136, 9, 'Income-certificate', 'Light Bill', 'uploads/9/Income-certificate/1742884886_lightbill.jpeg', 'Pending', '2025-03-25 06:41:26', '67e2501689609', 0, 0),
(137, 9, 'Income-certificate', 'ITR Return', 'uploads/9/Income-certificate/1742884886_itrreturn.jpg', 'Pending', '2025-03-25 06:41:26', '67e2501689609', 0, 0),
(138, 9, 'Pancard', 'adhar card', 'uploads/9/Pancard/1744012805_adharcard.jpeg', 'Pending', '2025-04-07 08:00:05', '67f386058aaa0', 0, 0),
(139, 9, 'Pancard', 'passport size photo', 'uploads/9/Pancard/1744012805_passportsizephoto.png', 'Pending', '2025-04-07 08:00:05', '67f386058aaa0', 0, 0),
(140, 9, 'Pancard', 'adhar card', 'uploads/9/Pancard/1744014050_adharcard.jpeg', 'Pending', '2025-04-07 08:20:50', '67f38ae275e07', 0, 0),
(141, 9, 'Pancard', 'passport size photo', 'uploads/9/Pancard/1744014050_passportsizephoto.png', 'Pending', '2025-04-07 08:20:50', '67f38ae275e07', 0, 0),
(142, 9, 'Pancard', 'adhar card', 'uploads/9/Pancard/1744014711_adharcard.jpeg', 'Pending', '2025-04-07 08:31:51', '67f38d7711862', 0, 0),
(143, 9, 'Pancard', 'passport size photo', 'uploads/9/Pancard/1744014711_passportsizephoto.png', 'Pending', '2025-04-07 08:31:51', '67f38d7711862', 0, 0),
(144, 9, 'Pancard', 'adhar card', 'uploads/9/Pancard/1744014730_adharcard.jpeg', 'Pending', '2025-04-07 08:32:10', '67f38d8adb788', 0, 1),
(145, 9, 'Pancard', 'passport size photo', 'uploads/9/Pancard/1744014730_passportsizephoto.png', 'Pending', '2025-04-07 08:32:10', '67f38d8adb788', 0, 1),
(146, 9, 'Pancard', 'adhar card', 'uploads/9/Pancard/1744015027_adharcard.jpeg', 'Pending', '2025-04-07 08:37:07', '67f38eb3b3a05', 0, 0),
(147, 9, 'Pancard', 'passport size photo', 'uploads/9/Pancard/1744015027_passportsizephoto.png', 'Pending', '2025-04-07 08:37:07', '67f38eb3b3a05', 0, 0),
(148, 9, 'Pancard', 'adhar card', 'uploads/9/Pancard/1744015092_adharcard.jpeg', 'Pending', '2025-04-07 08:38:12', '67f38ef49a04b', 0, 1),
(149, 9, 'Pancard', 'passport size photo', 'uploads/9/Pancard/1744015092_passportsizephoto.png', 'Pending', '2025-04-07 08:38:12', '67f38ef49a04b', 0, 1),
(150, 9, 'Pancard', 'adhar card', 'uploads/9/Pancard/1744015185_adharcard.jpeg', 'Pending', '2025-04-07 08:39:45', '67f38f51bac6a', 0, 0),
(151, 9, 'Pancard', 'passport size photo', 'uploads/9/Pancard/1744015185_passportsizephoto.png', 'Pending', '2025-04-07 08:39:45', '67f38f51bac6a', 0, 0),
(152, 9, 'Pancard', 'adhar card', 'uploads/9/Pancard/1744015234_adharcard.jpeg', 'Pending', '2025-04-07 08:40:34', '67f38f82d9ffc', 0, 0),
(153, 9, 'Pancard', 'passport size photo', 'uploads/9/Pancard/1744015234_passportsizephoto.png', 'Pending', '2025-04-07 08:40:34', '67f38f82d9ffc', 0, 0),
(154, 9, 'Pancard', 'adhar card', 'uploads/9/Pancard/1744015308_adharcard.jpeg', 'Pending', '2025-04-07 08:41:48', '67f38fcc56bd7', 0, 0),
(155, 9, 'Pancard', 'passport size photo', 'uploads/9/Pancard/1744015308_passportsizephoto.png', 'Pending', '2025-04-07 08:41:48', '67f38fcc56bd7', 0, 0),
(156, 9, 'Pancard', 'adhar card', 'uploads/9/Pancard/1744015334_adharcard.jpeg', 'Pending', '2025-04-07 08:42:14', '67f38fe65633a', 0, 1),
(157, 9, 'Pancard', 'passport size photo', 'uploads/9/Pancard/1744015334_passportsizephoto.png', 'Pending', '2025-04-07 08:42:14', '67f38fe65633a', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `phone`, `address`, `photo`, `birthdate`, `gender`, `state`, `updated_at`) VALUES
(1, 'Maulik', 'maulikghoghari20@gmail.com', '$2y$10$2vg5NKWs09yNCWaMcNYeFOfyJjSTu4MpinDhPvltnxhIO2cttRgdW', '2025-03-04 05:50:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Maulik', 'maulikghoghari202@gmail.com', '$2y$10$bAf19DQ3aLy0kvorsCuspOHKrmK/ndGX6r0F1oXPukvuYOqrhY2xy', '2025-03-04 06:03:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'user', 'user@gmail.com', '$2y$10$Kf/mc3p0zDX9i4HcaygqweYRCAf.WnpSlbNSFWikGpWSKFlFqCCmu', '2025-03-18 05:06:04', '1234567890', 'demo adddress123', '', '2018-02-20', 'Male', 'Gujrat', '2025-03-20 04:24:28'),
(10, 'kelvin', 'kelvin@gmail.com', '$2y$10$3Z090nO7kcNx1eYEe7Z.c.6JNyAy5FjhxGNNYoPKMpsELfdO/ViGG', '2025-03-18 09:53:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Maulik', 'maulik@gmail.com', '$2y$10$XsWRPgLxknmTIp0xRy6nceu8lFe9XJfitGzehnH75Rvh3iM2iy47i', '2025-03-25 03:31:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `document_status`
--
ALTER TABLE `document_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `document_status`
--
ALTER TABLE `document_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `document_status`
--
ALTER TABLE `document_status`
  ADD CONSTRAINT `document_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
