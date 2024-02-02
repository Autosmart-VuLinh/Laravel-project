-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 02, 2024 lúc 03:21 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hoclaravel_project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Font-End', 'Font-Em', 0, '2024-01-31 07:08:39', '2024-01-31 07:08:39'),
(2, 'Lập trình Back-end', 'Lập trình Back-end', 0, '2024-01-31 07:11:51', '2024-01-31 07:11:51'),
(4, 'Sever-gitsdasd', 'sever-gitsdasd', 1, '2024-01-31 07:12:05', '2024-01-31 09:36:43'),
(5, 'HTML CSS', 'html-css', 1, '2024-01-31 23:29:12', '2024-01-31 23:53:30'),
(6, 'Javascript', 'javascript', 1, '2024-01-31 23:34:04', '2024-01-31 23:34:04'),
(7, 'Javascript cơ bản', 'javascript-co-ban', 6, '2024-01-31 23:35:07', '2024-01-31 23:35:07'),
(8, 'Javascript nâng cao', 'javascript-nang-cao', 6, '2024-01-31 23:35:27', '2024-01-31 23:35:27'),
(9, 'Php', 'php', 2, '2024-02-01 01:29:45', '2024-02-01 01:29:45'),
(10, 'FullStack', 'full-stack', 0, '2024-02-01 01:56:48', '2024-02-01 01:56:48'),
(11, 'Java', 'java', 10, '2024-02-01 02:43:18', '2024-02-01 02:43:18'),
(12, 'Go', 'go', 2, '2024-02-01 02:43:40', '2024-02-01 02:43:40'),
(13, 'Docker', 'docker', 0, '2024-02-01 02:44:36', '2024-02-01 02:44:36'),
(14, 'Docker cơ bản', 'docker-co-ban', 13, '2024-02-01 02:44:47', '2024-02-01 02:44:47'),
(15, 'Docker nâng cao', 'docker-nang-cao', 13, '2024-02-01 02:45:00', '2024-02-01 02:45:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `teacher_id` int(11) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `sale_price` double(8,2) NOT NULL DEFAULT 0.00,
  `code` varchar(100) DEFAULT NULL,
  `durations` double(8,2) NOT NULL DEFAULT 0.00,
  `is_document` tinyint(1) NOT NULL DEFAULT 0,
  `supports` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2024_01_31_112208_create_categories_table', 2),
(8, '2024_02_01_135046_create_courses_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `group_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Nguyễn Văn B', 'nguyenvanb@gmail.com', NULL, '$2y$12$YNyXrkcVpJ8xfMlTMbyP1uQKL53.pGXkE1miVHVYTD3A6YLToei8C', 1, NULL, '2024-01-29 14:52:09', '2024-01-29 14:52:09'),
(3, 'Nguyễn Văn C', 'nguyenvanc@gmail.com', NULL, '$2y$12$wLfvlUS.n3ZXx/dL4fh3A.oT2GoJOqw5xfSaZ/vQFTGDIIHu9BoOy', 1, NULL, '2024-01-29 14:52:09', '2024-01-29 14:52:09'),
(4, 'Nguyễn Văn D', 'nguyenvand@gmail.com', NULL, '$2y$12$W8aTZ4OcvUj5KWak8iR3ieBADpFSJ8k3CCPNL3rX3sHFqU6n0L5C.', 1, NULL, '2024-01-29 14:52:09', '2024-01-29 14:52:09'),
(5, 'Nguyễn Văn E', 'nguyenvane@gmail.com', NULL, '$2y$12$brUlYeF2yQGi6LR3mJIlVuHTe.OVikJfoTzSt27Cnf/CcxSFv89Re', 1, NULL, '2024-01-29 14:52:09', '2024-01-29 14:52:09'),
(6, 'Nguyễn Văn F', 'nguyenvanf@gmail.com', NULL, '$2y$12$WEh3fbjqX9vZt30mQad/O.4lZwZyazN.IevIQ8U6MbWPT/KKJqqbG', 1, NULL, '2024-01-29 14:52:10', '2024-01-29 14:52:10'),
(7, 'Nguyễn Văn G', 'nguyenvang@gmail.com', NULL, '$2y$12$xu/ksi99PhHlD4mM9I2ZVeEKEaupbK84Fd/qPuRXzzDvPUguFvrAi', 1, NULL, '2024-01-29 14:52:10', '2024-01-29 14:52:10'),
(8, 'Nguyễn Văn H', 'nguyenvanh@gmail.com', NULL, '$2y$12$llnPNjqRVTukhzgCAlijAuK/jVtUEVscnYZi82YGyck0nWGOUvDf2', 1, NULL, '2024-01-29 14:52:10', '2024-01-29 14:52:10'),
(9, 'Nguyễn Văn I', 'nguyenvani@gmail.com', NULL, '$2y$12$WGxsxq5eqlXdTstl6aGlkuKgFcbMk.PgqmL7SIaC8buSKD4WJGhOC', 1, NULL, '2024-01-29 14:52:10', '2024-01-29 14:52:10'),
(10, 'Nguyễn Văn J', 'nguyenvanj@gmail.com', NULL, '$2y$12$EBH5OyR3dPiW9LEeuOBKs.1QiT5wGXVQzdcIsDzl4WN5pLs19xpUy', 1, NULL, '2024-01-29 14:52:10', '2024-01-29 14:52:10'),
(11, 'Nguyễn Văn K', 'nguyenvank@gmail.com', NULL, '$2y$12$sysZ5hh3Lhnm2tuYQjlsoOv3Dln86tNECbRV8.LOXR30f3Sbanhry', 1, NULL, '2024-01-29 14:52:11', '2024-01-29 14:52:11'),
(12, 'Nguyễn Văn L', 'nguyenvanl@gmail.com', NULL, '$2y$12$lUmxr566xUHYBfaiWUn01.8vsdZAu18LAPjNd26a0HiRFYD/zvMOm', 1, NULL, '2024-01-29 14:52:11', '2024-01-29 14:52:11'),
(13, 'Nguyễn Văn M', 'nguyenvanm@gmail.com', NULL, '$2y$12$5GJ6K2KGtunHmxDU67XeduNUI9ey87cGkCTVryPWWuxm87soU.XTW', 1, NULL, '2024-01-29 14:52:11', '2024-01-29 14:52:11'),
(14, 'Nguyễn Văn N', 'nguyenvann@gmail.com', NULL, '$2y$12$mrn6CBB1Mqhu8.YqyL0QI.GNdH5.mqVxQoNDfGbhyEgNC0NnRQ356', 1, NULL, '2024-01-29 14:52:11', '2024-01-29 14:52:11'),
(15, 'Nguyễn Văn O', 'nguyenvano@gmail.com', NULL, '$2y$12$zt27fEAqpinO8ugxJNswKeedKezBA1Bq8tDAqKEYfHq8XbaNrFVHy', 1, NULL, '2024-01-29 14:52:11', '2024-01-29 14:52:11'),
(16, 'Nguyễn Văn P', 'nguyenvanp@gmail.com', NULL, '$2y$12$h8Jn7tHxn6Q6f1wJkFgPxOPkOBkEfi.xXkKB2lfJ1Wo7MjaIbexfy', 1, NULL, '2024-01-29 14:52:12', '2024-01-29 14:52:12'),
(17, 'Nguyễn Văn Q', 'nguyenvanq@gmail.com', NULL, '$2y$12$Nwk3HP77XRddnGqMskWJ6Of/ZPoyTGhivJJ4jpX9jEnG/xmD5cQmi', 1, NULL, '2024-01-29 14:52:12', '2024-01-29 14:52:12'),
(18, 'Nguyễn Văn R', 'nguyenvanr@gmail.com', NULL, '$2y$12$ltsyeXNq8JjOzLzx9Y39ruLE7wixwQBMEkH4JJbzk/UHGq5Sdwjre', 1, NULL, '2024-01-29 14:52:12', '2024-01-29 14:52:12'),
(19, 'Nguyễn Văn S', 'nguyenvans@gmail.com', NULL, '$2y$12$2BbmjxKpya.vF0pkGNwY7OJnxpu.zmYizwliTHXsa5uUYVr53Yyxm', 1, NULL, '2024-01-29 14:52:12', '2024-01-29 14:52:12'),
(20, 'Nguyễn Văn T', 'nguyenvant@gmail.com', NULL, '$2y$12$hbAB0EMq/MUjt5g0IApnS.B5ozDnyXiZR.5rQ0PF6Z3xeC5su7Bu6', 1, NULL, '2024-01-29 14:52:12', '2024-01-29 14:52:12'),
(21, 'Nguyễn Văn U', 'nguyenvanu@gmail.com', NULL, '$2y$12$DASjzcCMfsOo2w5QD1QRauyVC9jqFSrtv7OIjY7oDOyVHW7bJfuhC', 1, NULL, '2024-01-29 14:52:13', '2024-01-29 14:52:13'),
(22, 'Nguyễn Văn V', 'nguyenvanv@gmail.com', NULL, '$2y$12$gvHylrH5EDyMVCThboM92O4BPWTnOtrIdBngWV1DSiIOv.3xvFnXS', 1, NULL, '2024-01-29 14:52:13', '2024-01-29 14:52:13'),
(23, 'Nguyễn Văn W', 'nguyenvanw@gmail.com', NULL, '$2y$12$iwr5ncz4Vvx3Km8l7qDy9uBnNYzNDKXNFPzu6YeEwEypzUQD89JZq', 1, NULL, '2024-01-29 14:52:13', '2024-01-29 14:52:13'),
(24, 'Nguyễn Văn X', 'nguyenvanx@gmail.com', NULL, '$2y$12$8dkzwVC./OMDlb0M.sJcbeln1HeZmc3n3E3r/nsmkR/mkfPkIZpWC', 1, NULL, '2024-01-29 14:52:13', '2024-01-29 14:52:13'),
(25, 'Nguyễn Văn Y', 'nguyenvany@gmail.com', NULL, '$2y$12$MVbaID8VYs8mHAgrzr5PWOuek7nmZZrYMU5eGI8H8PVa1Rsv9PE4G', 1, NULL, '2024-01-29 14:52:13', '2024-01-29 14:52:13'),
(26, 'Nguyễn Văn Z', 'nguyenvanz@gmail.com', NULL, '$2y$12$8N0xkUQnjtcBryWqyuJaqObO58j0bVmtgi1bWqLH8FMYOOIIJYMeS', 1, NULL, '2024-01-29 14:52:14', '2024-01-29 14:52:14'),
(31, 'Nguyễn Văn AE', 'nguyenvanae@gmail.com', NULL, '$2y$12$r0xGQnasGLHhUEKFQTbE/uLycRYtrKdfWt096zhSx16teUJ5v7IQW', 1, NULL, '2024-01-29 14:52:15', '2024-01-29 14:52:15'),
(32, 'Nguyễn Văn AF', 'nguyenvanaf@gmail.com', NULL, '$2y$12$fSVcqV.VwonIISkpZBQy9eY0OHIT32vA0oRDa5766iimJpcqwxN9W', 1, NULL, '2024-01-29 14:52:15', '2024-01-29 14:52:15'),
(33, 'Nguyễn Văn AG', 'nguyenvanag@gmail.com', NULL, '$2y$12$VT5RbZmBMnrfpTJ2lt/VKe.JdP7FSf5taFvaG83Wph1gL5fzN3pjW', 1, NULL, '2024-01-29 14:52:15', '2024-01-29 14:52:15'),
(34, 'Nguyễn Văn AH', 'nguyenvanah@gmail.com', NULL, '$2y$12$.KlKr761iUi0ld3AzS8m3.uy98w6eMDeXe9BqovYfcswygD6iVuN2', 1, NULL, '2024-01-29 14:52:15', '2024-01-29 14:52:15'),
(35, 'Nguyễn Văn AI', 'nguyenvanai@gmail.com', NULL, '$2y$12$mDdLPINQsJVeZGz/dLJjxe56o5z.S8tZixmiGW2u3Y6Kq/Q5pN3sa', 1, NULL, '2024-01-29 14:52:15', '2024-01-29 14:52:15'),
(36, 'Nguyễn Văn AJ', 'nguyenvanaj@gmail.com', NULL, '$2y$12$KSi9ZeISUxAFhzN9cxu1veFq48eIQp9CyHYfK6wvIo9s6H4.1ckFG', 1, NULL, '2024-01-29 14:52:16', '2024-01-29 14:52:16'),
(37, 'Nguyễn Văn AK', 'nguyenvanak@gmail.com', NULL, '$2y$12$JCQ7XGpNADPkx1AFre/4HOXcZC0Qc.sv8989YLpY5tuqHQPdU4l3e', 1, NULL, '2024-01-29 14:52:16', '2024-01-29 14:52:16'),
(38, 'Nguyễn Văn AL', 'nguyenvanal@gmail.com', NULL, '$2y$12$H7oPopzajdZ0XNYfMDtko.cIwlTQtqxVFfUSm7Y1F93nE/OHuaBBS', 1, NULL, '2024-01-29 14:52:16', '2024-01-29 14:52:16'),
(39, 'Nguyễn Văn AM', 'nguyenvanam@gmail.com', NULL, '$2y$12$R.xoMwLMORdhuZMjVi1KCOVQE56QoU2pbqss0vhlZn7iP1JHA5ZDO', 1, NULL, '2024-01-29 14:52:16', '2024-01-29 14:52:16'),
(40, 'Nguyễn Văn AN', 'nguyenvanan@gmail.com', NULL, '$2y$12$9OwQ7YAzv.jDpAn9RRB5TeOYp2rmhwkuaq1P5cpgb0MiCh0apTfVS', 1, NULL, '2024-01-29 14:52:16', '2024-01-29 14:52:16'),
(41, 'Nguyễn Văn AO', 'nguyenvanao@gmail.com', NULL, '$2y$12$8IYEcseXjyPHgALgNjmgn.2qSddkL52.jF4mOUr/dI645OKDwbajy', 1, NULL, '2024-01-29 14:52:17', '2024-01-29 14:52:17'),
(42, 'Nguyễn Văn AP', 'nguyenvanap@gmail.com', NULL, '$2y$12$zSxak5ooGPgkdn.GPQPb2uw1f3I/JhAwl5IymWIutA9WQf1/UW.bi', 1, NULL, '2024-01-29 14:52:17', '2024-01-29 14:52:17'),
(43, 'Nguyễn Văn AQ', 'nguyenvanaq@gmail.com', NULL, '$2y$12$uaP1cXRc7PB1kywn1KVaVecg9EXIJjCCCiqdJsD8u2PXAtRUjTEFq', 1, NULL, '2024-01-29 14:52:17', '2024-01-29 14:52:17'),
(44, 'Nguyễn Văn AR', 'nguyenvanar@gmail.com', NULL, '$2y$12$lzYhD8PoupSNNu/Foso9nuvw7h4I2YOLeGI6/jSblzYP3yAyeT6FW', 1, NULL, '2024-01-29 14:52:17', '2024-01-29 14:52:17'),
(45, 'Nguyễn Văn AS', 'nguyenvanas@gmail.com', NULL, '$2y$12$6dl4BKhUqoOBPaDKz5ek7OUBbuPCWF39vRS3bGHWVo8f6H8ri3vEm', 1, NULL, '2024-01-29 14:52:18', '2024-01-29 14:52:18'),
(46, 'Nguyễn Văn AT', 'nguyenvanat@gmail.com', NULL, '$2y$12$tqBf2qfAp/6m1ib68nHCguMVszAd5dPz.Z3NgD45McyNMEC8m0mSy', 1, NULL, '2024-01-29 14:52:18', '2024-01-29 14:52:18'),
(47, 'Nguyễn Văn AU', 'nguyenvanau@gmail.com', NULL, '$2y$12$KGO8OPrpAWAaYVUfCLIx.u/gs.nQY9F34iQDPJI.5WMI7IqneDg9i', 1, NULL, '2024-01-29 14:52:18', '2024-01-29 14:52:18'),
(48, 'Nguyễn Văn AV', 'nguyenvanav@gmail.com', NULL, '$2y$12$eZYS/Q5OduAu0hX/N5O/he/e6YodytSHOXEgxsGYJ9nF9yjdciIs6', 1, NULL, '2024-01-29 14:52:18', '2024-01-29 14:52:18'),
(49, 'Nguyễn Văn AW', 'nguyenvanaw@gmail.com', NULL, '$2y$12$bpYvpbMD521TZP.7lvhsOuOspBHZxqDP7neu11dXAaLFo5vCEN1fG', 1, NULL, '2024-01-29 14:52:18', '2024-01-29 14:52:18'),
(50, 'Nguyễn Văn AX', 'nguyenvanax@gmail.com', NULL, '$2y$12$ZtOVVsSnqV2LLZ2adW6xU.52r.zf14tYtYIwZvmJ/xPGZS63dazIC', 1, NULL, '2024-01-29 14:52:19', '2024-01-29 14:52:19'),
(51, 'Nguyễn Văn AY', 'nguyenvanay@gmail.com', NULL, '$2y$12$3feIuN.JvFKVvoJlc2C5.uzGXCMy8HAAjZaCSv4ig53VblFKTDo56', 1, NULL, '2024-01-29 14:52:19', '2024-01-29 14:52:19'),
(52, 'Vũ Hồng Lĩnh', 'linhvhph31139@fpt.edu.vn', NULL, '$2y$12$lAq4ufKN1OQcEJ8mclEAcOLSnZd1sgiWxj/I.MC8GDra4xMlbESpq', 1, NULL, '2024-01-30 07:06:18', '2024-01-30 07:06:18'),
(53, 'Vũ Việt Hoàng', 'vulinh18072k1@gmail.com', NULL, '$2y$12$xIfihBce3JVdD.t5fAfQyuhFlHpu0vF1A0.pIC2AbP.uV37b52BRq', 1, NULL, '2024-01-30 07:12:18', '2024-01-30 07:12:18');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
