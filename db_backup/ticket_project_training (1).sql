-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 06:25 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket_project_training`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `answer_content` text CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `ticket_id`, `answer_content`, `created_at`, `user_role`) VALUES
(26, 45, 1, '<p>سلام مشکل چیه؟</p><p>&nbsp;</p>', '2021-12-07 13:53:33', 'support'),
(27, 47, 24, '<p>چه مشکلی؟</p>', '2021-12-07 14:35:54', 'support'),
(28, 47, 24, '<p>چه مشکلی؟</p>', '2021-12-07 14:37:54', 'support'),
(29, 50, 21, '<p>پاسخ به تیکت</p>', '2021-12-08 08:37:35', 'support'),
(30, 54, 21, '<p>پاسخ به تیکت</p><p>&nbsp;</p>', '2021-12-08 08:59:55', 'support'),
(31, 61, 29, '<p>پاسخ از طرف پشتیبان</p>', '2021-12-08 09:33:26', 'support'),
(32, 63, 29, '<p>پاسخ از طرف کاربر</p><p>&nbsp;</p>', '2021-12-08 09:37:50', 'user'),
(33, 61, 20, '<p>پاسخ تیکت مدیر از طرف پشتیبان فنی</p>', '2021-12-08 09:39:18', 'support'),
(34, 61, 29, '<p>شسیبیشسبیسشب</p>', '2021-12-08 13:36:05', 'support'),
(35, 63, 29, '<p>بیسبیسشبیسشبیشسب</p>', '2021-12-08 13:36:40', 'user'),
(36, 61, 29, '<p>dddddddddddd</p>', '2021-12-08 13:39:58', 'support'),
(37, 64, 30, '<p>بیسشبیسشبیشسب</p>', '2021-12-09 11:19:14', 'admin'),
(38, 64, 20, '<p>gdfgfdsgfdgf</p>', '2021-12-13 13:29:48', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `status`, `created_at`) VALUES
(11, 'فنی', 1, '2021-11-15 11:14:54'),
(12, 'پشتیبانی', 1, '2021-11-16 09:59:42'),
(15, 'IT', 1, '2021-12-07 09:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `departments_users`
--

CREATE TABLE `departments_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments_users`
--

INSERT INTO `departments_users` (`id`, `department_id`, `user_id`) VALUES
(16, 11, 61),
(17, 15, 62),
(18, 12, 67);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(256) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `title`, `content`, `department_id`, `user_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'ssssssssssss', 'ssssssssssssssssssssssssssssssssss', 5, 2, '2021-11-16 10:20:03', '2021-11-16 10:20:03', 0),
(2, 'ssssssssssss', '', 5, 3, '2021-11-16 10:20:18', '2021-11-16 10:20:18', 0),
(3, 'ssssssssssss', 'sssssssssssssssssssssssssss', 5, 2, '2021-11-16 10:34:26', '2021-11-16 10:34:26', 1),
(4, 'ddddddddddd', 'ddddddddddddddd', 5, 2, '2021-11-16 10:37:55', '2021-11-16 10:37:55', 0),
(5, 'ssssssssssss', 'سیسیشسیسشیشس', 5, 2, '2021-11-16 12:59:47', '2021-11-16 12:59:47', 0),
(6, 'sdafasdf', 'sdafsdafdsaf', 5, 2, '2021-11-29 14:51:52', '2021-11-29 14:51:52', 0),
(7, 'sdafdasf', 'sdafasdfdsaf', 5, 2, '2021-11-29 14:56:11', '2021-11-29 14:56:11', 0),
(8, 'sdafdsaf', 'fasdfdasfsdaf', 5, 2, '2021-11-29 15:12:14', '2021-11-29 15:12:14', 0),
(9, 'fsdfsdaf', 'fsdafdsafsda', 12, 2, '2021-11-29 15:13:58', '2021-11-29 15:13:58', 0),
(10, 'fsdfsdaf', 'fsdafdsafsda', 12, 2, '2021-11-29 15:14:07', '2021-11-29 15:14:07', 0),
(11, 'sdafasdf', '<p>asdfdsafdsaf</p>', 5, 2, '2021-11-29 15:27:16', '2021-11-29 15:27:16', 0),
(12, 'تست', '<p>تستیییییییییییییییییییییییییییییییییییییییییییییییییبش بشی بشیسب شیسب ش</p>', 5, 2, '2021-11-30 10:38:24', '2021-11-30 10:38:24', 0),
(13, 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ', '<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>', 5, 31, '2021-12-01 10:55:35', '2021-12-01 10:55:35', 0),
(14, 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ', '<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>', 12, 31, '2021-12-01 10:56:21', '2021-12-01 10:56:21', 0),
(15, 'لورم ایپسوم متن ساختگی با ت', '<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با الورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با الورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با الورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با الورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با الورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با الورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با ا</p>', 5, 31, '2021-12-01 11:20:44', '2021-12-01 11:20:44', 0),
(16, 'sdafasdf', '<p>sdfgdgdfg</p>', 5, 42, '2021-12-05 10:15:13', '2021-12-05 10:15:13', 0),
(17, 'pouya2@test.com', '<p>pouya2@test.compouya2@test.compouya2@test.compouya2@test.com</p>', 5, 44, '2021-12-05 10:31:56', '2021-12-05 10:31:56', 0),
(18, 'pouya2@test.com', '<p>pouya2@test.compouya2@test.compouya2@test.compouya2@test.compouya2@test.com</p>', 12, 44, '2021-12-05 10:32:15', '2021-12-05 10:32:15', 0),
(19, 'تست 2', '<p>تست 2تست 2تست 2تست 2تست 2تست 2</p>', 12, 44, '2021-12-05 11:33:18', '2021-12-05 11:33:18', 0),
(20, 'تیکت تست از سمت مدیر', '<p>تیکت تیکتتیکت تیکتتیکت تیکتتیکت تیکتتیکت تیکتتیکت تیکتتیکت تیکت</p>', 11, 48, '2021-12-07 10:30:33', '2021-12-07 10:30:33', 1),
(21, 'تست', '<p>تست تست</p>', 15, 31, '2021-12-07 10:40:46', '2021-12-07 10:40:46', 0),
(22, 'sdafasdf', '<p>fsdfdsafsdafdsf</p>', 11, 31, '2021-12-07 10:49:07', '2021-12-07 10:49:07', 0),
(23, 'مشکل فنی', '<p>مشکل فنی مشکل فنی مشکل فنی مشکل فنی مشکل فنی مشکل فنی&nbsp;</p>', 11, 52, '2021-12-07 10:55:28', '2021-12-07 10:55:28', 0),
(24, 'مشکل', '<p>مشکلمشکلمشکلمشکلمشکلمشکلمشکلمشکلمشکل</p>', 12, 31, '2021-12-07 14:35:32', '2021-12-07 14:35:32', 0),
(25, 'تیکت تست', '<p>تیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تست</p>', 12, 31, '2021-12-08 08:52:15', '2021-12-08 08:52:15', 0),
(26, 'تست2', '<p>تیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تستتیکت تست</p>', 12, 31, '2021-12-08 08:52:23', '2021-12-08 08:52:23', 0),
(27, 'تست ای تی', '<p>تست ای تیتست ای تیتست ای تیتست ای تیتست ای تیتست ای تیتست ای تیتست ای تی</p>', 15, 31, '2021-12-08 08:54:33', '2021-12-08 08:54:33', 0),
(28, 'تست ای تی2', '<p>تست ای تی2تست ای تی2تست ای تی2تست ای تی2تست ای تی2تست ای تی2تست ای تی2تست ای تی2تست ای تی2تست ای تی2تست ای تی2تست ای تی2تست ای تی2</p>', 15, 31, '2021-12-08 08:54:43', '2021-12-08 08:54:43', 0),
(29, 'مشکل در فنی', '<p>مشکل در فنیمشکل در فنیمشکل در فنیمشکل در فنیمشکل در فنیمشکل در فنیمشکل در فنیمشکل در فنیمشکل در فنیمشکل در فنیمشکل در فنیمشکل در فنیمشکل در فنیمشکل در فنیمشکل در فنیمشکل در فنیمشکل در فنیمشکل در فنیمشکل در فنیمشکل در فنیمشکل در فنی</p>', 11, 63, '2021-12-08 09:27:40', '2021-12-08 09:27:40', 1),
(30, 'مشکل در IT', '<p>مشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در ITمشکل در IT</p>', 15, 63, '2021-12-08 09:27:56', '2021-12-08 09:27:56', 1),
(31, 'مشکل', '<p>sumActiveSupportssumActiveSupportssumActiveSupports</p>', 11, 63, '2021-12-09 11:24:04', '2021-12-09 11:24:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` bit(1) NOT NULL DEFAULT b'0',
  `role` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `created_at`, `status`, `role`) VALUES
(48, 'مدیر مدیری', 'admin@test.com', '123456', '2021-12-06 10:35:34', b'1', 'admin'),
(61, 'پشتیبان فنی', 'fani@suport.com', '123456', '2021-12-08 09:25:29', b'1', 'support'),
(62, 'پشتیبان IT', 'it@support.com', '123456', '2021-12-08 09:25:45', b'1', 'support'),
(63, 'کاربر کاربری', 'user@test.com', '123456', '2021-12-08 09:26:47', b'1', 'user'),
(65, 'تست تستی', 'user2@test.com', '123456', '2021-12-09 09:01:54', b'1', 'user'),
(66, 'پویا پارسایی', 'user3@test.com', '123456', '2021-12-09 09:02:55', b'1', 'user'),
(67, 'پشتیبان تستی', 'test@support.com', '123456', '2021-12-09 09:50:26', b'1', 'support');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments_users`
--
ALTER TABLE `departments_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `departments_users`
--
ALTER TABLE `departments_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
