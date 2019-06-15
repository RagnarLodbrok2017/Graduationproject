-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 14, 2019 at 05:33 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recyclerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `description` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Wooden Chairs', NULL, '2019-04-15 16:40:21', '2019-04-15 19:19:44'),
(3, 'Wooden Category', NULL, '2019-04-15 16:41:39', '2019-04-15 16:41:39'),
(5, 'Paper Category', NULL, '2019-04-15 16:41:58', '2019-04-15 16:41:58'),
(6, 'Plastic Category', NULL, '2019-04-15 16:42:58', '2019-04-15 16:42:58'),
(7, 'Low Density Polyethylene', NULL, '2019-04-15 16:43:30', '2019-04-15 16:43:30'),
(9, 'High Density Polyethylene', 'HDPE plastic is the stiff plastic used to make milk jugs, detergent and oil bottles, toys, and some plastic bags.', '2019-04-15 16:44:36', '2019-04-15 16:44:36'),
(10, 'Polypropylene', 'it\'s plastic is tough and lightweight, and has excellent heat-resistance qualities. It serves as a barrier against moisture', '2019-04-15 16:45:22', '2019-04-15 19:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_comment_post1_idx` (`post_id`),
  KEY `fk_comment_users1_idx` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `subject`, `created_at`, `updated_at`, `post_id`, `users_id`) VALUES
(1, 'dwqqqqqq', '2019-06-11 01:43:36', '2019-06-11 01:43:36', 2, 17),
(2, 'wqddwqdwqdw', '2019-06-11 01:44:12', '2019-06-11 01:44:12', 2, 17),
(5, 'dqwwwwwdqw', '2019-06-11 01:50:10', '2019-06-11 01:50:10', 2, 17),
(7, 'Hi', '2019-06-11 01:54:11', '2019-06-11 01:54:11', 2, 17),
(9, '1', '2019-06-11 02:03:51', '2019-06-11 02:03:51', 1, 17),
(10, 'grrrrrrrrrrrrerg', '2019-06-11 02:06:15', '2019-06-11 02:06:15', 3, 17),
(11, 'fewwwwwwwwwww', '2019-06-11 02:06:32', '2019-06-11 02:06:32', 1, 17),
(12, '9hhhhhhhhhhhh9u9u', '2019-06-11 17:19:28', '2019-06-11 17:19:28', 3, 17),
(13, 'test', '2019-06-11 20:19:09', '2019-06-11 20:19:09', 2, 17),
(15, 'Test my comment', '2019-06-13 11:06:09', '2019-06-13 11:06:09', 4, 17),
(16, 'Mahmoud', '2019-06-13 11:27:17', '2019-06-13 11:27:17', 3, 17),
(18, 'nice post <3', '2019-06-14 05:19:52', '2019-06-14 05:19:52', 3, 20),
(20, 'Good post', '2019-06-14 05:31:04', '2019-06-14 05:31:04', 6, 20),
(21, 'Good Chair', '2019-06-14 05:42:21', '2019-06-14 05:42:21', 3, 20),
(22, 'Good Work', '2019-06-14 07:30:48', '2019-06-14 07:30:48', 6, 17);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_sender` varchar(191) NOT NULL,
  `email_sender` varchar(191) NOT NULL,
  `subject` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
CREATE TABLE IF NOT EXISTS `email` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) DEFAULT NULL,
  `message` longtext NOT NULL,
  `from` varchar(191) NOT NULL,
  `to` varchar(191) NOT NULL,
  `danger` tinyint(3) UNSIGNED ZEROFILL DEFAULT '000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`users_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_email_users1_idx` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

DROP TABLE IF EXISTS `favourite`;
CREATE TABLE IF NOT EXISTS `favourite` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`users_id`,`post_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_favourite_users1_idx` (`users_id`),
  KEY `fk_favourite_post1_idx` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`id`, `created_at`, `updated_at`, `users_id`, `post_id`) VALUES
(7, '2019-06-11 09:11:07', '2019-06-11 09:11:07', 17, 1),
(8, '2019-06-11 09:11:11', '2019-06-11 09:11:11', 17, 3);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `action` varchar(191) NOT NULL,
  `about` varchar(191) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `post_title` varchar(191) DEFAULT NULL,
  `user_name` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`,`users_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_history_users1_idx` (`users_id`),
  KEY `fk_history_post1_idx` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `created_at`, `updated_at`, `action`, `about`, `users_id`, `post_id`, `post_title`, `user_name`) VALUES
(1, '2019-06-03 04:47:48', '2019-06-03 04:47:48', 'Add', 'User added a Post', 15, NULL, NULL, NULL),
(2, '2019-06-03 05:06:21', '2019-06-03 05:06:21', 'Add', 'User added a Post', 15, NULL, 'dwqqqqqqqq wdq', NULL),
(3, '2019-06-03 05:07:47', '2019-06-03 05:07:47', 'Add', 'User added a Post', 1, NULL, 'wqddddddd', NULL),
(5, '2019-06-03 05:12:33', '2019-06-03 05:12:33', 'Add', 'User added a Post', 15, NULL, 'dwqqqqqqq', NULL),
(6, '2019-06-03 05:20:07', '2019-06-03 05:20:07', 'Add', 'User added a Post', 1, NULL, 'dwaaaaaaadw', NULL),
(7, '2019-06-03 05:21:26', '2019-06-03 05:21:26', 'Add', 'User added a Post', 15, NULL, 'dwqqqqqqq', NULL),
(8, '2019-06-03 05:43:49', '2019-06-03 05:43:49', 'Add', 'User added a Post', 1, NULL, 'efwwwwwww', NULL),
(9, '2019-06-03 05:46:34', '2019-06-03 05:46:34', 'Add', 'User added a Post', 15, NULL, 'dwqqqqqqqq', NULL),
(11, '2019-06-03 08:31:34', '2019-06-03 08:31:34', 'Delete', 'User deleted a Post', 15, NULL, 'ewfffffffff', NULL),
(12, '2019-06-10 02:10:31', '2019-06-10 02:10:31', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(13, '2019-06-10 02:11:32', '2019-06-10 02:11:32', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(14, '2019-06-10 02:11:43', '2019-06-10 02:11:43', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(15, '2019-06-10 02:11:50', '2019-06-10 02:11:50', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(16, '2019-06-10 02:29:59', '2019-06-10 02:29:59', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(17, '2019-06-10 02:32:12', '2019-06-10 02:32:12', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(18, '2019-06-10 02:32:14', '2019-06-10 02:32:14', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(19, '2019-06-10 03:32:51', '2019-06-10 03:32:51', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(20, '2019-06-10 03:33:09', '2019-06-10 03:33:09', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(21, '2019-06-10 04:13:35', '2019-06-10 04:13:35', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(22, '2019-06-10 04:23:17', '2019-06-10 04:23:17', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(23, '2019-06-10 04:23:20', '2019-06-10 04:23:20', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(24, '2019-06-10 04:24:04', '2019-06-10 04:24:04', 'Delete', 'You made a disLikes on a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(25, '2019-06-10 04:24:14', '2019-06-10 04:24:14', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(26, '2019-06-10 04:24:15', '2019-06-10 04:24:15', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(27, '2019-06-10 04:24:15', '2019-06-10 04:24:15', 'Delete', 'You Likes a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(28, '2019-06-10 04:24:16', '2019-06-10 04:24:16', 'Delete', 'You made a disLikes on a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(29, '2019-06-10 04:24:17', '2019-06-10 04:24:17', 'Delete', 'You made a disLikes on a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(30, '2019-06-10 04:25:00', '2019-06-10 04:25:00', 'Delete', 'You made a disLikes on a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(31, '2019-06-10 04:25:01', '2019-06-10 04:25:01', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(32, '2019-06-10 04:25:02', '2019-06-10 04:25:02', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(33, '2019-06-10 04:25:03', '2019-06-10 04:25:03', 'Delete', 'You made a disLikes on a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(34, '2019-06-10 04:25:04', '2019-06-10 04:25:04', 'Delete', 'You made a disLikes on a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(35, '2019-06-10 04:25:05', '2019-06-10 04:25:05', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(36, '2019-06-10 04:25:06', '2019-06-10 04:25:06', 'Delete', 'You Likes a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(37, '2019-06-10 04:25:07', '2019-06-10 04:25:07', 'Delete', 'You made a disLikes on a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(38, '2019-06-10 04:25:08', '2019-06-10 04:25:08', 'Delete', 'You made a disLikes on a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(39, '2019-06-10 04:25:09', '2019-06-10 04:25:09', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(40, '2019-06-10 04:25:11', '2019-06-10 04:25:11', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(41, '2019-06-10 04:25:13', '2019-06-10 04:25:13', 'Delete', 'You Likes a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(42, '2019-06-10 04:25:14', '2019-06-10 04:25:14', 'Delete', 'You made a disLikes on a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(43, '2019-06-10 04:25:42', '2019-06-10 04:25:42', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(44, '2019-06-10 04:25:43', '2019-06-10 04:25:43', 'Delete', 'You made a disLikes on a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(45, '2019-06-10 04:25:44', '2019-06-10 04:25:44', 'Delete', 'You made a disLikes on a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(46, '2019-06-10 04:25:45', '2019-06-10 04:25:45', 'Delete', 'You Likes a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(47, '2019-06-11 00:29:00', '2019-06-11 00:29:00', 'Delete', 'You made a disLikes on a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(48, '2019-06-11 00:29:02', '2019-06-11 00:29:02', 'Delete', 'You Likes a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(49, '2019-06-11 01:43:36', '2019-06-11 01:43:36', 'Add', 'You Added a Comment a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(50, '2019-06-11 01:44:12', '2019-06-11 01:44:12', 'Add', 'You Added a Comment a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(51, '2019-06-11 01:44:27', '2019-06-11 01:44:27', 'Add', 'You Added a Comment a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(52, '2019-06-11 01:45:16', '2019-06-11 01:45:16', 'Add', 'You Added a Comment a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(53, '2019-06-11 01:50:10', '2019-06-11 01:50:10', 'Add', 'You Added a Comment a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(54, '2019-06-11 01:50:19', '2019-06-11 01:50:19', 'Add', 'You Added a Comment a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(55, '2019-06-11 01:54:11', '2019-06-11 01:54:11', 'Add', 'You Added a Comment a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(56, '2019-06-11 01:54:24', '2019-06-11 01:54:24', 'Add', 'You Added a Comment a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(57, '2019-06-11 02:03:51', '2019-06-11 02:03:51', 'Add', 'You Added a Comment a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(58, '2019-06-11 02:06:15', '2019-06-11 02:06:15', 'Add', 'You Added a Comment a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(59, '2019-06-11 02:06:19', '2019-06-11 02:06:19', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(60, '2019-06-11 02:06:32', '2019-06-11 02:06:32', 'Add', 'You Added a Comment a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(61, '2019-06-11 02:50:13', '2019-06-11 02:50:13', 'Saved', 'You Saved a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(62, '2019-06-11 02:50:20', '2019-06-11 02:50:20', 'Saved', 'You Saved a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(63, '2019-06-11 03:35:33', '2019-06-11 03:35:33', 'Like', 'You Likes a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(64, '2019-06-11 03:35:34', '2019-06-11 03:35:34', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(65, '2019-06-11 08:30:42', '2019-06-11 08:30:42', 'Saved', 'You Saved a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(66, '2019-06-11 08:57:47', '2019-06-11 08:57:47', 'Like', 'You Likes a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(67, '2019-06-11 08:57:48', '2019-06-11 08:57:48', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(68, '2019-06-11 09:07:38', '2019-06-11 09:07:38', 'Delete', 'You deleted a Saved Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(69, '2019-06-11 09:09:29', '2019-06-11 09:09:29', 'Delete', 'You deleted a Saved Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(70, '2019-06-11 09:11:07', '2019-06-11 09:11:07', 'Saved', 'You Saved a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(71, '2019-06-11 09:11:11', '2019-06-11 09:11:11', 'Saved', 'You Saved a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(72, '2019-06-11 17:19:16', '2019-06-11 17:19:16', 'Like', 'You Likes a Post', 17, NULL, 'dwqqqqqqqqqqqqqq', 'Ahmed User'),
(73, '2019-06-11 17:19:18', '2019-06-11 17:19:18', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'dwqqqqqqqqqqqqqq', 'Ahmed User'),
(74, '2019-06-11 17:19:20', '2019-06-11 17:19:20', 'Like', 'You Likes a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(75, '2019-06-11 17:19:28', '2019-06-11 17:19:28', 'Add', 'You Added a Comment a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(76, '2019-06-11 17:23:04', '2019-06-11 17:23:04', 'Saved', 'You Saved a Post', 17, NULL, 'dwqqqqqqqqqqqqqq', 'Ahmed User'),
(77, '2019-06-11 17:23:14', '2019-06-11 17:23:14', 'Delete', 'You deleted a Saved Post', 17, NULL, 'dwqqqqqqqqqqqqqq', 'Ahmed User'),
(78, '2019-06-11 17:23:18', '2019-06-11 17:23:18', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(79, '2019-06-11 20:19:09', '2019-06-11 20:19:09', 'Add', 'You Added a Comment a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(80, '2019-06-11 20:19:42', '2019-06-11 20:19:42', 'Like', 'You Likes a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(81, '2019-06-11 20:24:45', '2019-06-11 20:24:45', 'Add', 'You Added a Comment a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(82, '2019-06-13 08:47:02', '2019-06-13 08:47:02', 'Like', 'You Likes a Post', 18, NULL, 'recycle the metal', 'Emad Ahmed Ibrahem'),
(83, '2019-06-13 08:47:03', '2019-06-13 08:47:03', 'DisLike', 'You made a disLikes on a Post', 18, NULL, 'recycle the metal', 'Emad Ahmed Ibrahem'),
(84, '2019-06-13 08:47:05', '2019-06-13 08:47:05', 'Like', 'You Likes a Post', 18, NULL, 'dwqqqqqqqqqqqqqq', 'Emad Ahmed Ibrahem'),
(85, '2019-06-13 08:47:06', '2019-06-13 08:47:06', 'DisLike', 'You made a disLikes on a Post', 18, NULL, 'dwqqqqqqqqqqqqqq', 'Emad Ahmed Ibrahem'),
(86, '2019-06-13 08:47:22', '2019-06-13 08:47:22', 'Like', 'You Likes a Post', 18, NULL, 'recycle the metal', 'Emad Ahmed Ibrahem'),
(87, '2019-06-13 08:59:53', '2019-06-13 08:59:53', 'Like', 'You Likes a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(88, '2019-06-13 09:01:12', '2019-06-13 09:01:12', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(89, '2019-06-13 09:07:10', '2019-06-13 09:07:10', 'Like', 'You Likes a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(90, '2019-06-13 09:07:15', '2019-06-13 09:07:15', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(91, '2019-06-13 09:07:16', '2019-06-13 09:07:16', 'Like', 'You Likes a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(92, '2019-06-13 09:07:20', '2019-06-13 09:07:20', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(93, '2019-06-13 09:07:21', '2019-06-13 09:07:21', 'Like', 'You Likes a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(94, '2019-06-13 09:07:23', '2019-06-13 09:07:23', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(95, '2019-06-13 09:08:37', '2019-06-13 09:08:37', 'Like', 'You Likes a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(96, '2019-06-13 09:08:38', '2019-06-13 09:08:38', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(97, '2019-06-13 09:12:32', '2019-06-13 09:12:32', 'Like', 'You Likes a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(98, '2019-06-13 09:12:33', '2019-06-13 09:12:33', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(99, '2019-06-13 09:12:36', '2019-06-13 09:12:36', 'Like', 'You Likes a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(100, '2019-06-13 09:12:55', '2019-06-13 09:12:55', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(101, '2019-06-13 09:13:32', '2019-06-13 09:13:32', 'Like', 'You Likes a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(102, '2019-06-13 09:13:34', '2019-06-13 09:13:34', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(103, '2019-06-13 09:19:19', '2019-06-13 09:19:19', 'Like', 'You Likes a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(104, '2019-06-13 09:21:45', '2019-06-13 09:21:45', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(105, '2019-06-13 09:21:46', '2019-06-13 09:21:46', 'Like', 'You Likes a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(106, '2019-06-13 09:29:37', '2019-06-13 09:29:37', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(107, '2019-06-13 09:33:52', '2019-06-13 09:33:52', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(108, '2019-06-13 09:33:53', '2019-06-13 09:33:53', 'Like', 'You Likes a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(109, '2019-06-13 10:15:49', '2019-06-13 10:15:49', 'Like', 'You Likes a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(110, '2019-06-13 10:15:55', '2019-06-13 10:15:55', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(111, '2019-06-13 10:17:12', '2019-06-13 10:17:12', 'Like', 'You Likes a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(112, '2019-06-13 10:17:14', '2019-06-13 10:17:14', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(113, '2019-06-13 10:17:18', '2019-06-13 10:17:18', 'Like', 'You Likes a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(114, '2019-06-13 10:17:20', '2019-06-13 10:17:20', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(115, '2019-06-13 10:17:55', '2019-06-13 10:17:55', 'Like', 'You Likes a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(116, '2019-06-13 10:17:59', '2019-06-13 10:17:59', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(117, '2019-06-13 10:22:06', '2019-06-13 10:22:06', 'Like', 'You Likes a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(118, '2019-06-13 10:22:08', '2019-06-13 10:22:08', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(119, '2019-06-13 10:22:11', '2019-06-13 10:22:11', 'Like', 'You Likes a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(120, '2019-06-13 10:22:12', '2019-06-13 10:22:12', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(121, '2019-06-13 10:22:13', '2019-06-13 10:22:13', 'Like', 'You Likes a Post', 17, NULL, 'dwqqqqqqqqqqqqqq', 'Ahmed User'),
(122, '2019-06-13 10:22:14', '2019-06-13 10:22:14', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'dwqqqqqqqqqqqqqq', 'Ahmed User'),
(123, '2019-06-13 10:22:16', '2019-06-13 10:22:16', 'Like', 'You Likes a Post', 17, NULL, 'dwqqqqqqqqqqqqqq', 'Ahmed User'),
(124, '2019-06-13 10:22:17', '2019-06-13 10:22:17', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'dwqqqqqqqqqqqqqq', 'Ahmed User'),
(125, '2019-06-13 10:22:21', '2019-06-13 10:22:21', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(126, '2019-06-13 10:22:22', '2019-06-13 10:22:22', 'Like', 'You Likes a Post', 17, NULL, 'Recycling Chair', 'Ahmed User'),
(127, '2019-06-13 11:06:09', '2019-06-13 11:06:09', 'Add', 'You Added a Comment a Post', 17, NULL, 'dwqqqqqqqqqqqqqq', 'Ahmed User'),
(128, '2019-06-13 11:27:17', '2019-06-13 11:27:17', 'Add', 'You Added a Comment a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(129, '2019-06-13 11:30:06', '2019-06-13 11:30:06', 'DisLike', 'You made a disLikes on a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(130, '2019-06-13 11:30:07', '2019-06-13 11:30:07', 'Like', 'You Likes a Post', 17, NULL, 'Retest of Machine', 'Ahmed User'),
(131, '2019-06-13 11:30:48', '2019-06-13 11:30:48', 'Add', 'You Added a Comment a Post', 17, NULL, 'recycle the metal', 'Ahmed User'),
(132, '2019-06-14 05:15:46', '2019-06-14 05:15:46', 'Delete', 'You Deleted a comment on a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(133, '2019-06-14 05:15:56', '2019-06-14 05:15:56', 'Delete', 'You Deleted a comment on a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(134, '2019-06-14 05:16:45', '2019-06-14 05:16:45', 'Delete', 'You Deleted a comment on a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(135, '2019-06-14 05:16:49', '2019-06-14 05:16:49', 'Delete', 'You Deleted a comment on a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(136, '2019-06-14 05:16:52', '2019-06-14 05:16:52', 'Delete', 'You Deleted a comment on a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(137, '2019-06-14 05:16:55', '2019-06-14 05:16:55', 'Delete', 'You Deleted a comment on a Post', 17, NULL, 'Recycling Papers', 'Ahmed User'),
(138, '2019-06-14 05:19:52', '2019-06-14 05:19:52', 'Add', 'You Added a Comment a Post', 20, NULL, 'Retest of Machine', 'Maged Mohamed Ahmed'),
(139, '2019-06-14 05:30:48', '2019-06-14 05:30:48', 'Like', 'You Likes a Post', 20, NULL, 'Recycliing test', 'Maged Mohamed Ahmed'),
(140, '2019-06-14 05:30:56', '2019-06-14 05:30:56', 'Add', 'You Added a Comment a Post', 20, NULL, 'Recycliing test', 'Maged Mohamed Ahmed'),
(141, '2019-06-14 05:30:59', '2019-06-14 05:30:59', 'Delete', 'You Deleted a comment on a Post', 20, NULL, 'Recycliing test', 'Maged Mohamed Ahmed'),
(142, '2019-06-14 05:31:04', '2019-06-14 05:31:04', 'Add', 'You Added a Comment a Post', 20, NULL, 'Recycliing test', 'Maged Mohamed Ahmed'),
(143, '2019-06-14 05:42:03', '2019-06-14 05:42:03', 'Like', 'You Likes a Post', 20, NULL, 'Retest of Machine', 'Maged Mohamed Ahmed'),
(144, '2019-06-14 05:42:05', '2019-06-14 05:42:05', 'Like', 'You Likes a Post', 20, NULL, 'Recycling Cards', 'Maged Mohamed Ahmed'),
(145, '2019-06-14 05:42:21', '2019-06-14 05:42:21', 'Add', 'You Added a Comment a Post', 20, NULL, 'Retest of Machine', 'Maged Mohamed Ahmed'),
(146, '2019-06-14 07:30:48', '2019-06-14 07:30:48', 'Add', 'You Added a Comment a Post', 17, NULL, 'Recycliing test', 'Ahmed User'),
(147, '2019-06-14 07:32:33', '2019-06-14 07:32:33', 'Add', 'You Added a Comment a Post', 20, NULL, 'recycle the metal', 'Maged Mohamed Ahmed'),
(148, '2019-06-14 07:32:42', '2019-06-14 07:32:42', 'Add', 'You Added a Comment a Post', 20, NULL, 'recycle the metal', 'Maged Mohamed Ahmed'),
(149, '2019-06-14 07:32:43', '2019-06-14 07:32:43', 'Like', 'You Likes a Post', 20, NULL, 'recycle the metal', 'Maged Mohamed Ahmed'),
(150, '2019-06-14 07:38:00', '2019-06-14 07:38:00', 'Delete', 'User deleted a Post', 20, NULL, 'recycle the metal', 'Maged Mohamed Ahmed');

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

DROP TABLE IF EXISTS `like`;
CREATE TABLE IF NOT EXISTS `like` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `like` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`users_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_like_post1_idx` (`post_id`),
  KEY `fk_like_users1_idx` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`id`, `like`, `created_at`, `updated_at`, `post_id`, `users_id`) VALUES
(62, 1, '2019-06-13 10:22:22', '2019-06-13 10:22:22', 1, 17),
(63, 1, '2019-06-13 11:30:07', '2019-06-13 11:30:07', 3, 17),
(65, 1, '2019-06-14 05:42:03', '2019-06-14 05:42:03', 3, 20),
(64, 1, '2019-06-14 05:30:48', '2019-06-14 05:30:48', 6, 20),
(66, 1, '2019-06-14 05:42:05', '2019-06-14 05:42:05', 7, 20);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` longtext NOT NULL,
  `video` longtext,
  `has_video` int(2) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `about` varchar(191) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `meta_keyword` varchar(191) DEFAULT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `like_count` int(10) UNSIGNED ZEROFILL DEFAULT '0000000000',
  `comment_count` int(10) UNSIGNED ZEROFILL DEFAULT '0000000000',
  `type` varchar(191) DEFAULT NULL,
  `image_url` varchar(191) DEFAULT NULL,
  `video_url` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`users_id`),
  UNIQUE KEY `title_UNIQUE` (`title`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_post_users1_idx` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `subtitle`, `description`, `image`, `video`, `has_video`, `status`, `about`, `color`, `meta_keyword`, `meta_title`, `like_count`, `comment_count`, `type`, `image_url`, `video_url`, `created_at`, `updated_at`, `banned_at`, `users_id`) VALUES
(1, 'Recycling Chair', 'There are plenty of reasons to get rid of your old office chair. They seem to break easily.', 'There are plenty of reasons to get rid of your old office chair. They seem to break easily, which can cause a safety hazard. Over time the fabric on the back, seat or arms can wear out, leaving you with an unprofessional looking seat. Using an unstable or poorly designed office chair (or one that is not the right height) can lead to a sore.', 'Recycling Chair.jpg', 'Recycling Chair.mp4', 1, 1, 'good chair', 'red', 'chairs', 'Recycling', 0000000000, 0000000000, 'wood', '../../../../../public/uploads/posts/images/images/', NULL, '2019-05-18 17:44:26', '2019-05-18 17:44:26', NULL, 7),
(2, 'Recycling Papers', 'ly designed office chair (or one that is not the right height) can lead to a sore back or aching neck.', 'ly designed office chair (or one that is not the right height) can lead to a sore back or aching neck. Many people have switched to yoga balls or desks that allow them to stand, meaning they do not need their old office chair anymore. And even office furniture goes out of style over time', 'Recycling Papers.jpg', NULL, 0, 1, 'good Papers', 'white', 'papers', 'recycling', 0000000000, 0000000000, 'paper', '../../../../../public/uploads/posts/images/images/', NULL, '2019-05-18 17:46:36', '2019-05-18 17:46:36', NULL, 7),
(3, 'Retest of Machine', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknownchair', 'chair.jpg', NULL, 0, 1, 'efewwv', 'vewwvewev', 'vewvevew', 'evwevevwe', 0000000000, 0000000000, 'evwewve', NULL, NULL, '2019-06-18 07:00:00', NULL, NULL, 9),
(4, 'Recycling Cans', 'Recycling Cans from metal', 'ly designed Cans (or one that is not the right height) can lead to a sore back or aching neck. Many people have switched to yoga balls or desks that allow them to stand, meaning they do not need their old office chair anymore', 'Recycling Cans.jpg', 'Recycling Cans.mp4', 1, NULL, NULL, NULL, 'Cans', 'Cans', 0000000000, 0000000000, 'Metal', '../../../../../public/uploads/posts/images/', '../../../../../public/uploads/posts/videos/', '2019-06-11 05:12:46', '2019-06-11 05:12:46', NULL, 17),
(6, 'Recycliing test', 'reculing test', 'wevvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', 'Recycliing test.jpg', 'Recycliing test.mp4', 1, 1, 'fewwwwwww', 'wwwefwwww', NULL, NULL, 0000000000, 0000000000, 'wfewwwwww', '../../../../../public/uploads/posts/images/', '../../../../../public/uploads/posts/videos/', '2019-06-14 05:30:12', '2019-06-14 05:30:12', NULL, 20),
(7, 'Recycling Cards', 'Models and Cards', 'Models and Cards are the two pay plastic cards and  is a piece of specially prepared heavy paper, thin cardboard', 'Recycling Cards.jpg', 'Recycling Cards.mp4', 1, 1, 'Cards', 'white', 'Recycling Cards', 'Recycling Cards', 0000000000, 0000000000, 'Paper', '../../../../../public/uploads/posts/images/', '../../../../../public/uploads/posts/videos/', '2019-06-14 05:41:05', '2019-06-14 05:41:05', NULL, 20);

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

DROP TABLE IF EXISTS `post_category`;
CREATE TABLE IF NOT EXISTS `post_category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`,`post_id`,`category_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_post_has_category_category1_idx` (`category_id`),
  KEY `fk_post_has_category_post1_idx` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `post_id`, `category_id`) VALUES
(1, 1, 3),
(2, 1, 10),
(3, 2, 5),
(4, 4, 6),
(5, 4, 7),
(9, 6, 1),
(10, 6, 5),
(11, 6, 6),
(12, 7, 5),
(13, 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject` varchar(191) DEFAULT NULL,
  `rate` tinyint(4) DEFAULT '0',
  `deleted` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`post_id`,`users_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_report_post1_idx` (`post_id`),
  KEY `fk_report_users1_idx` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

DROP TABLE IF EXISTS `saved`;
CREATE TABLE IF NOT EXISTS `saved` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`users_id`,`post_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_saved_users1_idx` (`users_id`),
  KEY `fk_saved_post1_idx` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payload` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `payload`, `created_at`, `updated_at`, `user_id`) VALUES
(1, NULL, '2019-06-14 07:32:07', '2019-06-14 07:32:07', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.jpg',
  `reports_num` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `location` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `userscol` varchar(45) DEFAULT NULL,
  `about` longtext,
  `job` varchar(191) DEFAULT NULL,
  `facebook_link` longtext,
  `twitter_link` longtext,
  `youtube_link` longtext,
  `country` varchar(45) DEFAULT NULL,
  `rate` int(10) UNSIGNED ZEROFILL DEFAULT '0000000000',
  `merit` int(11) NOT NULL DEFAULT '100',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  `remove_ban_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `reports_num`, `status`, `type`, `location`, `age`, `username`, `address`, `userscol`, `about`, `job`, `facebook_link`, `twitter_link`, `youtube_link`, `country`, `rate`, `merit`, `remember_token`, `created_at`, `updated_at`, `banned_at`, `remove_ban_at`) VALUES
(1, 'Ahmed R. Mohamed', 'ahmedrmohamed2017@gmail.com', NULL, '$2y$10$qePGC3JcehQj/eg4p3jinuRXM5iv/y2VEwu29T.gwo224Xe3gDTgC', 'avatar.jpg', 0, 1, 'admin', NULL, 24, NULL, 'Egypt Cairo, ST 201\r\n', NULL, 'Egyptian-American actor, comedian, producer, and director Ahmed Ahmed is one of the most diverse, multi-faceted talents in the entertainment industry today. In 2014, he can be seen starring as “Ahmed” on TBS’ hit comedy series Sullivan & Son. Executive Produced by Vince Vaughn, the show follows Steve Sullivan [Steve Byrne], a corporate lawyer who surprises his parents when he leaves his job to take over a bar owned by his father in Pittsburgh. Ahmed made his first appearance as unlucky in love, tow-truck driver [and best friend to Steve] “Ahmed” in season one, and joined the cast as a series regular in season two, quickly becoming a fan favorite. Ahmed is currently the only Arab-American actor playing a non-stereotypical role on a comedy sitcom, today.\r\n\r\n ', 'Full Stack Web Developer', 'https://www.facebook.com/ahmedortega2015', 'https://twitter.com/login?lang=ar', NULL, 'Egypt', 0000000000, 100, NULL, '2019-04-06 21:20:15', '2019-04-13 18:42:23', NULL, NULL),
(3, 'Mostafa Rezk', 'mostafe2018@gmail.com', NULL, '12345678999', '3.png', 0, 1, 'user', NULL, 20, NULL, 'Egypt Cairo, ST 201\r\n', NULL, 'Egyptian-American actor, comedian, producer, and director Ahmed Ahmed is one of the most diverse, multi-faceted talents in the entertainment industry today. In 2014, he can be seen starring as “Ahmed” on TBS’ hit comedy series Sullivan & Son. Executive Produced by Vince Vaughn, the show follows Steve Sullivan [Steve Byrne], a corporate lawyer who surprises his parents when he leaves his job to take over a bar owned by his father in Pittsburgh. Ahmed made his first appearance as unlucky in love, tow-truck driver [and best friend to Steve] “Ahmed” in season one, and joined the cast as a series regular in season two, quickly becoming a fan favorite. Ahmed is currently the only Arab-American actor playing a non-stereotypical role on a comedy sitcom, today.\r\n\r\n ', 'Full Stack Web Developer', 'https://www.facebook.com/ahmedortega2015', 'https://twitter.com/login?lang=ar', NULL, 'Egypt', 0000000000, 100, NULL, '2019-04-11 20:14:57', '2019-04-13 18:42:32', NULL, NULL),
(4, 'Mostafa Emad', 'mostafe2017@gmail.com', NULL, '$2y$10$S0IVC5fOn7CxZSZBDVGfQ.hUS/9UWMb5ZpDQSJ64E0qYZXOhIHbv6', 'avatar.jpg', 0, 1, 'user', NULL, 21, NULL, 'Egypt Cairo, ST 201\r\n', NULL, 'Egyptian-American actor, comedian, producer, and director Ahmed Ahmed is one of the most diverse, multi-faceted talents in the entertainment industry today. In 2014, he can be seen starring as “Ahmed” on TBS’ hit comedy series Sullivan & Son. Executive Produced by Vince Vaughn, the show follows Steve Sullivan [Steve Byrne], a corporate lawyer who surprises his parents when he leaves his job to take over a bar owned by his father in Pittsburgh. Ahmed made his first appearance as unlucky in love, tow-truck driver [and best friend to Steve] “Ahmed” in season one, and joined the cast as a series regular in season two, quickly becoming a fan favorite. Ahmed is currently the only Arab-American actor playing a non-stereotypical role on a comedy sitcom, today.\r\n\r\n ', 'Full Stack Web Developer', 'https://www.facebook.com/ahmedortega2015', 'https://twitter.com/login?lang=ar', NULL, 'Egypt', 0000000000, 100, NULL, '2019-04-11 20:19:28', '2019-04-11 20:19:28', NULL, NULL),
(6, 'Mohamed Magdy', 'momagdy2@gmail.com', NULL, '12345678', 'avatar.jpg', 0, 1, 'user', NULL, 24, NULL, 'Egypt Cairo, ST 201\r\n', NULL, 'Egyptian-American actor, comedian, producer, and director Ahmed Ahmed is one of the most diverse, multi-faceted talents in the entertainment industry today. In 2014, he can be seen starring as “Ahmed” on TBS’ hit comedy series Sullivan & Son. Executive Produced by Vince Vaughn, the show follows Steve Sullivan [Steve Byrne], a corporate lawyer who surprises his parents when he leaves his job to take over a bar owned by his father in Pittsburgh. Ahmed made his first appearance as unlucky in love, tow-truck driver [and best friend to Steve] “Ahmed” in season one, and joined the cast as a series regular in season two, quickly becoming a fan favorite. Ahmed is currently the only Arab-American actor playing a non-stereotypical role on a comedy sitcom, today.\r\n\r\n ', 'Programmer', 'https://www.facebook.com/ahmedortega2015', 'https://twitter.com/login?lang=ar', NULL, 'France', 0000000000, 100, NULL, '2019-04-11 21:59:25', '2019-04-13 16:21:05', NULL, NULL),
(7, 'Ali Essam Mohamed', 'ali@ali.com', NULL, '$2y$10$0w46obeKDgm.sxliVi.jVuwnunbOvBWmpTkCu7RomhHAV84fjHEOe', 'avatar.jpg', 0, 1, 'admin', NULL, 24, NULL, 'Egypt Cairo, ST 201\r\n', NULL, 'Egyptian-American actor, comedian, producer, and director Ahmed Ahmed is one of the most diverse, multi-faceted talents in the entertainment industry today. In 2014, he can be seen starring as “Ahmed” on TBS’ hit comedy series Sullivan & Son. Executive Produced by Vince Vaughn, the show follows Steve Sullivan [Steve Byrne], a corporate lawyer who surprises his parents when he leaves his job to take over a bar owned by his father in Pittsburgh. Ahmed made his first appearance as unlucky in love, tow-truck driver [and best friend to Steve] “Ahmed” in season one, and joined the cast as a series regular in season two, quickly becoming a fan favorite. Ahmed is currently the only Arab-American actor playing a non-stereotypical role on a comedy sitcom, today.\r\n\r\n ', 'Full Stack Web Developer', 'https://www.facebook.com/ahmedortega2015', 'https://twitter.com/login?lang=ar', NULL, 'Egypt', 0000000000, 100, NULL, '2019-04-11 22:12:42', '2019-05-18 17:41:06', NULL, NULL),
(9, 'Mohamed Hossam', 'mohamedhossam@gmail.com', NULL, '$2y$10$vXTCa8N0jaNPW2APVrGAsOdHsnpQAfjAVkRzmNEVLlJz9KVMI2Hcq', 'avatar.jpg', 0, 1, 'user', NULL, NULL, NULL, 'Egypt Cairo, ST 201\r\n', NULL, 'Egyptian-American actor, comedian, producer, and director Ahmed Ahmed is one of the most diverse, multi-faceted talents in the entertainment industry today. In 2014, he can be seen starring as “Ahmed” on TBS’ hit comedy series Sullivan & Son. Executive Produced by Vince Vaughn, the show follows Steve Sullivan [Steve Byrne], a corporate lawyer who surprises his parents when he leaves his job to take over a bar owned by his father in Pittsburgh. Ahmed made his first appearance as unlucky in love, tow-truck driver [and best friend to Steve] “Ahmed” in season one, and joined the cast as a series regular in season two, quickly becoming a fan favorite. Ahmed is currently the only Arab-American actor playing a non-stereotypical role on a comedy sitcom, today.\r\n\r\n ', 'Web Designer', 'https://www.facebook.com/ahmedortega2015', 'https://twitter.com/login?lang=ar', NULL, 'USA', 0000000000, 100, NULL, '2019-04-12 20:21:55', '2019-05-18 17:40:40', NULL, NULL),
(10, 'Abdo Nabil', 'abdonabil@gmail.com', NULL, '$2y$10$25hPlfW6MrPIUJZTjFes3e51IDBqEIWd8qEZfw.5BKKIyCD1VqZmi', 'avatar.jpg', 0, 1, 'admin', NULL, NULL, NULL, 'Egypt Cairo, ST 201\r\n', NULL, 'Egyptian-American actor, comedian, producer, and director Ahmed Ahmed is one of the most diverse, multi-faceted talents in the entertainment industry today. In 2014, he can be seen starring as “Ahmed” on TBS’ hit comedy series Sullivan & Son. Executive Produced by Vince Vaughn, the show follows Steve Sullivan [Steve Byrne], a corporate lawyer who surprises his parents when he leaves his job to take over a bar owned by his father in Pittsburgh. Ahmed made his first appearance as unlucky in love, tow-truck driver [and best friend to Steve] “Ahmed” in season one, and joined the cast as a series regular in season two, quickly becoming a fan favorite. Ahmed is currently the only Arab-American actor playing a non-stereotypical role on a comedy sitcom, today.\r\n\r\n ', NULL, 'https://www.facebook.com/ahmedortega2015', 'https://twitter.com/login?lang=ar', NULL, 'USA', 0000000000, 100, NULL, '2019-04-12 20:31:04', '2019-04-12 20:31:04', NULL, NULL),
(11, 'Mohamed Abduallah', 'moabdallah@gmail.com', NULL, '$2y$10$d7E4kBhPi/BX8BiplUiji.zt6xjWqRyZfbHbJejk1H2grdgRlMrNS', 'avatar.jpg', 0, 1, 'admin', NULL, NULL, NULL, 'Egypt Cairo, ST 201\r\n', NULL, NULL, NULL, 'https://www.facebook.com/ahmedortega2015', 'https://twitter.com/login?lang=ar', NULL, NULL, 0000000000, 100, NULL, '2019-04-12 20:41:27', '2019-04-12 20:41:27', NULL, NULL),
(12, 'Hager Ahmed', 'hager@yahoo.com', NULL, '$2y$10$wrAOsbPp2CuNPl6KP2d7MO6.esM.VWXWOkpdimcxcwVUk5f2.x3lS', '2.png', 0, 1, 'user', NULL, NULL, NULL, 'Egypt Cairo, ST 201\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0000000000, 100, NULL, '2019-04-12 20:44:04', '2019-04-12 20:44:04', NULL, NULL),
(13, 'Maged Salah', 'maged22@gmail.com', NULL, '$2y$10$/8DP5Q94OzTEho.uPgFSCuwNZIbuHbMK.zO1oe7o1/QIDqxk/mSTK', 'avatar.jpg', 0, 1, 'user', NULL, NULL, NULL, 'Egypt Cairo, ST 201\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0000000000, 100, NULL, '2019-04-12 21:11:47', '2019-04-12 21:11:47', NULL, NULL),
(14, 'Mostafa Gamal', 'mosgamal@gmail.com', NULL, '$2y$10$pZZZxCFlhF4sAxQ7rPXjhuZc.UZ.OLnVZqu35eP54kR9yTvY0FluK', 'avatar.jpg', 0, 1, 'user', NULL, NULL, NULL, 'Egypt Cairo, ST 201\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0000000000, 100, NULL, '2019-04-12 21:19:54', '2019-04-12 21:19:54', NULL, NULL),
(15, 'Ahmed Admin', 'admin@admin.admin', NULL, '$2y$10$qePGC3JcehQj/eg4p3jinuRXM5iv/y2VEwu29T.gwo224Xe3gDTgC', 'd4.jpg', 0, 1, 'admin', NULL, NULL, NULL, 'Egypt Cairo, ST 201\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0000000000, 100, NULL, '2019-05-18 13:21:30', '2019-05-18 13:21:30', NULL, NULL),
(17, 'Ahmed User', 'user@user.user', NULL, '$2y$10$79aU0gmHFhDqHg/2SsHTOu1dMCEAJ6q0gV.Xqyc0sranxYNCGgUCm', '1.png', 0, 1, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Egypt', 0000000000, 100, NULL, '2019-06-06 05:53:07', '2019-06-11 11:33:31', NULL, NULL),
(18, 'Emad Ahmed Ibrahem', 'test@test.test', NULL, '$2y$10$QGzR9Q51aovB/shjwQi3teA7z39j6ySTna52YuMQS0HrBzei8Jodm', 'avatar.jpg', 0, 1, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0000000000, 100, NULL, '2019-06-13 08:46:03', '2019-06-13 08:46:03', NULL, NULL),
(19, 'Hanan Mohamed Ahmed', 'hanan@yahoo.com', NULL, '$2y$10$An2hsGRxY0.avZF3BvbBxeT1IGdDOJUWB0xcq96nl06CkWXedm6E.', 'avatar.jpg', 0, 1, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0000000000, 100, NULL, '2019-06-14 05:18:16', '2019-06-14 05:18:16', NULL, NULL),
(20, 'Maged Mohamed Ahmed', 'maged@yahoo.com', NULL, '$2y$10$OMeeGJg3OdP9iB3OgHMpPOHYpmSzd/U3334Tz1d4oWY8qq8dx9JCa', 'avatar.jpg', 0, 1, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0000000000, 100, NULL, '2019-06-14 05:19:17', '2019-06-14 05:19:17', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comment_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `fk_email_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `fk_favourite_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_favourite_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_history_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_history_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `fk_like_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_like_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `fk_post_has_category_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_post_has_category_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `fk_report_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_report_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `saved`
--
ALTER TABLE `saved`
  ADD CONSTRAINT `fk_saved_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_saved_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
