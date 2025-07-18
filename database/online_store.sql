-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2025 at 04:34 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_descrip` varchar(150) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_linc` varchar(100) DEFAULT NULL,
  `product_imag` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_descrip`, `product_price`, `product_linc`, `product_imag`, `created_at`, `updated_at`) VALUES
(11, 'mohammed', 'رئيس هذا الموقع', 200, 'www', 'img/E.jpg', '2025-01-20 01:12:11', '2025-02-01 22:53:07'),
(12, 'saleh', 'النائب', 0, 'www', 'img/E.jpg', '2025-01-20 01:12:35', '2025-02-01 22:59:40'),
(17, 'xxxxxxxxxx', 'غامر لشراء هاتف جديد', 4, 'www', 'img/D.jpg', '2025-01-27 00:00:42', '2025-01-27 14:53:08'),
(19, 'abdo', 'trtrtrtr', 0, 'www', 'img/1.jpg', '2025-01-27 00:13:33', '2025-01-27 00:59:57'),
(22, 'alii', 'cxxxxx', 0, 'www', 'img/5.png', '2025-01-27 00:29:26', '2025-01-27 15:42:01'),
(23, 'sakkk', 'rrrrrrrrrrrr', 0, 'www', 'img/2.PNG', '2025-01-27 14:43:32', '2025-01-27 14:45:08'),
(25, 'assel', '', NULL, 'www', 'img/F.jpg', '2025-01-27 15:02:25', NULL),
(26, 'ahmed', '', NULL, 'www', 'img/6.jpg', '2025-01-27 15:03:46', NULL),
(30, 'ipon', 'احصل على النسخه الاولى من iphon 16 pro max', NULL, 'www', 'img/6.jpg', '2025-02-01 22:19:13', NULL),
(31, 'ipon', 'احصل على النسخه الاولى من iphon 16 pro max', NULL, 'www', 'img/2.jpg', '2025-02-01 22:19:28', NULL),
(32, 'ipon', 'احصل على النسخه الاولى من iphon 16 pro max', NULL, 'www', 'img/1.jpeg', '2025-02-01 22:19:42', NULL),
(33, 'ipon', 'احصل على النسخه الاولى من iphon 16 pro max', NULL, 'www', 'img/E.jpg', '2025-02-01 22:19:57', NULL),
(34, 'ipon', 'احصل على النسخه الاولى من iphon 16 pro max', NULL, 'www', 'img/Backgraund.jpg', '2025-02-01 22:20:16', NULL),
(35, 'ipon', 'احصل على النسخه الاولى من iphon 16 pro max', NULL, 'www', 'img/thujey-ngetup-uReyg5eZSbQ-unsplash.jpg', '2025-02-01 22:20:30', NULL),
(36, 'ipon', 'احصل على النسخه الاولى من iphon 16 pro max', NULL, 'www', 'img/D.jpg', '2025-02-01 22:20:44', NULL),
(37, 'jamal', 'احصل على النسخه الاولى من iphon 16 pro max', NULL, 'www', 'img/lance-reis-AzlCjsEaMuA-unsplash.jpg', '2025-02-01 22:47:34', NULL),
(38, 'ipon', 'احصل على النسخه الاولى من iphon 16 pro max', NULL, 'www', 'img/copilot_image_1731685078786.jpeg', '2025-02-01 22:52:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `email`, `created_at`) VALUES
(4, 'mohammed', 'll@mm.m', '2025-02-01 20:18:31'),
(6, 'saleh', 'saleh@men.com', '2025-02-01 20:22:42'),
(7, 'ali', 'ali@gmail.com', '2025-02-01 20:32:32'),
(8, 'mohammed', 'MOHAMMED@gimail.com', '2025-02-01 20:46:06'),
(14, 'MMMM', 'MOHAMcMED@gimail.com', '2025-02-02 09:20:09'),
(16, 'ali', 'MOHAMMED@gimail.comrf', '2025-02-05 12:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_number` int(11) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `pre_number` int(11) NOT NULL DEFAULT 0,
  `created_user_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_number`, `user_password`, `pre_number`, `created_user_at`) VALUES
(2, 'ali', 71, '$2y$10$/d7qzIcBxm42GqIdYpc1luE/ky8/N0OMhOXoG0iD/iW.3UBmkpmdq', 0, '2025-01-27 18:30:50'),
(3, 'saleh', 70, '$2y$10$67yid3/e1Hl0HEzRqZsNJuiuMchSxIdUDHycYh9UxJjPrbtPro.be', 0, '2025-01-27 21:11:54'),
(4, 'sami', 78, '$2y$10$UHEdwCgBGPtXz.5zmKBviO0GVGKV3PD1dbz0W6jWajqZxKASac15.', 2, '2025-01-27 21:13:40'),
(5, ' mohammed', 77, '$2y$10$NtiHdIqtXQsvlVRuKVvbIeUkajaGrbrNZ0cIAbBoW4VvceMNdnPH.', 1, '2025-01-27 21:15:21'),
(6, 'sleem', 76, '$2y$10$rs2vbHKvnOaIyz5hUXOVPuP69YoaFdexLDq8srzhl2Pcq07W0RS9e', 0, '2025-02-01 22:03:10'),
(7, 'malak', 75, '$2y$10$Ca3mpF1ehHk57/xcn9AbNuDrXE6oWDGR1YaV/dmA0RzohbCSxjRpG', 0, '2025-02-02 00:03:16'),
(8, 'malak', 771, '$2y$10$ImPFfJlRwQ0XFdX73DhAo.NWcu2s/Qo09MbOPEMlx0beuuqPWj3rW', 0, '2025-02-02 00:04:56'),
(9, 'MMMM', 787, '$2y$10$egtPv8pIeAAXBlyNJAiS4OkUMEXCBbpBxDdJ4/o0.dn7PVwTTR0le', 0, '2025-02-02 00:07:44'),
(10, 'sa', 12, '$2y$10$1PZPb0wO3MuQgITJOtRPZOGkG8cbnP7A3TVFCk9dlVNuPPKUwFRCe', 0, '2025-02-02 00:10:21'),
(11, '44', 0, '$2y$10$NKADbGosovVBC6mD8Yb2sudOFoGzhW49jtMJEbdZXOdB7HNlMWPCe', 0, '2025-02-02 00:11:49'),
(12, '', 0, '$2y$10$ldXzRF7brCZYyQYfgGadguw6NYMzHQGT5Ga.UcL1DJvRVZF31pYTC', 0, '2025-02-02 00:13:09'),
(13, '', 0, '$2y$10$11Ws1eC.xmkhqDtU26Mo0uAqGQkaruxakok0BjXK4RxU1tK/nvYG2', 0, '2025-02-02 00:13:34'),
(14, '', 0, '$2y$10$/WZNmPol42L60tbk06rQSuFDiiQmSPAv4Rami8pY6GnD6KhSb2iG2', 0, '2025-02-02 00:13:53'),
(15, '', 0, '$2y$10$h5UQYclCm9bSf0RJwzY8veq19O8PSYPtCSUYqgH4P5UemIrY9Ehoi', 0, '2025-02-02 00:14:56'),
(16, 'fff', 787, '$2y$10$OW948Za2h7rDR/NgOYcz7.ZNVXfFw9zvNxig6qzO3aIjkVJlSanGW', 0, '2025-02-02 00:15:20'),
(17, '', 0, '$2y$10$DBZAQ00fhn/Uvke51KO0J.d.JTi8mon2EM0X6fiE1aGqc8V5qQreu', 0, '2025-02-02 00:17:27'),
(18, 'samm', 0, '$2y$10$r/nOuIVm/l9Ehpt9oqsbZOBFeoY25/TUxQ9cXM2UoGrLrnnZ63C7S', 0, '2025-02-02 00:32:09'),
(19, 'MMMMl', 771, '$2y$10$O/4eA4iWhESQVUksuvK0VObCjd5XPW/8HkRH0sZQlRrzoNrzLO3zq', 0, '2025-02-02 00:33:28'),
(20, 'alirr', 88, '$2y$10$UIV8GHPh7BDxcygBbUQ.AuuMtyU0rw2JUmqIz8kVEtn/ZwOvuGp9C', 0, '2025-02-02 00:34:39'),
(21, 'MMMMdd', 7874, '$2y$10$HTQnipDEoFtZRYjf7qCp4OAsAG.vHUJyrHJy2n43akkpQC4gsw/Bq', 0, '2025-02-02 00:37:08'),
(22, '', 0, '$2y$10$u4VwhQNFZFzA/AaEnBFy7.HJNgSKtJt/biNC2T/Uc.fhS0xw5whvG', 0, '2025-02-02 00:38:17'),
(23, '', 0, '$2y$10$rmiEmrSpwyuBbwIcK48gBek5YgFLYU4JXctrZfrptEshZY9cHiE.y', 0, '2025-02-02 12:09:37'),
(24, 'aliw', 44, '$2y$10$1T3hXyjuAuPYR3gTV7SbIeu6qg8Ntw4zNNJYqw5LTs91XN5e7bjni', 0, '2025-02-02 12:09:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
