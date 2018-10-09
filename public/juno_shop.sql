-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 14, 2018 lúc 05:42 AM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `juno_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pass` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_avatar`, `user_phone`, `user_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cao Anh Nhất', 'anhnhata8cool@gmail.com', '$2y$10$JuEPWL7pXObcaw88/18dGuWoshFXth/8PoJqGk3tLsA/8XbWntYv.', '', '01674754648', 1, 'yEmuB2uOJ3DmfZT2OlMSSHI09xX94v87Oys35ksdus4k5tLhh3SH7eBdfFoY', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute`
--

CREATE TABLE `attribute` (
  `att_id` int(10) UNSIGNED NOT NULL,
  `att_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `att_slug` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attribute`
--

INSERT INTO `attribute` (`att_id`, `att_name`, `att_slug`, `created_at`, `updated_at`) VALUES
(1, 'Màu Sắc', 'mau-sac', '2018-03-24 08:52:43', '2018-03-24 08:52:43'),
(2, 'Kích thước', 'kich-thuoc', '2018-03-24 08:53:32', '2018-03-24 08:53:32'),
(3, 'Chất liệu', 'chat-lieu', '2018-03-24 16:18:23', '2018-03-24 16:18:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute_value`
--

CREATE TABLE `attribute_value` (
  `att_value_id` int(10) UNSIGNED NOT NULL,
  `att_id` int(10) UNSIGNED NOT NULL,
  `att_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attribute_value`
--

INSERT INTO `attribute_value` (`att_value_id`, `att_id`, `att_value`, `created_at`, `updated_at`) VALUES
(1, 1, 'Xanh', '2018-03-24 08:52:43', '2018-03-24 15:00:37'),
(2, 1, 'Đỏ', '2018-03-24 08:52:43', '2018-03-24 15:00:37'),
(3, 1, 'Tím', '2018-03-24 08:52:43', '2018-03-24 15:00:37'),
(4, 1, 'Vàng', '2018-03-24 08:52:43', '2018-03-24 15:00:38'),
(5, 2, '35', '2018-03-24 08:53:32', '2018-03-24 08:53:32'),
(6, 2, '36', '2018-03-24 08:53:32', '2018-03-24 08:53:32'),
(7, 2, '37', '2018-03-24 08:53:32', '2018-03-24 08:53:32'),
(8, 2, '38', '2018-03-24 08:53:32', '2018-03-24 08:53:32'),
(9, 2, '39', '2018-03-24 08:53:32', '2018-03-24 08:53:32'),
(10, 1, 'Đen', '2018-03-24 15:00:38', '2018-03-24 15:00:38'),
(11, 1, 'Xám', '2018-03-24 15:00:38', '2018-03-24 15:00:38'),
(12, 3, 'Nhung mềm mịn', '2018-03-24 16:18:23', '2018-03-24 16:18:23'),
(13, 3, 'Da bò', '2018-03-24 16:18:23', '2018-03-24 16:18:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `cate_id` int(10) UNSIGNED NOT NULL,
  `cate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_thumbnail` int(11) DEFAULT NULL,
  `cate_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_parent` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`cate_id`, `cate_name`, `cate_thumbnail`, `cate_slug`, `cate_parent`, `created_at`, `updated_at`) VALUES
(4, 'Giày Cao Gót', 3, 'giay-cao-got', 0, '2018-03-24 08:53:54', '2018-03-24 08:53:54'),
(5, 'Giày Cao Gót 5cm', NULL, 'giay-cao-got-5cm', 4, '2018-03-24 08:54:07', '2018-03-24 08:54:07'),
(6, 'Giày Cao Gót 7cm', NULL, 'giay-cao-got-7cm', 4, '2018-03-24 10:16:07', '2018-03-24 10:16:07'),
(7, 'Giày Xăng Đan', 4, 'giay-xang-dan', 0, '2018-03-24 11:53:05', '2018-03-24 12:25:34'),
(8, 'Cao 5cm', NULL, 'cao-5cm', 7, '2018-03-24 11:53:24', '2018-03-24 11:53:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) UNSIGNED NOT NULL,
  `comment_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_name`, `comment_content`, `comment_status`, `created_at`, `updated_at`) VALUES
(1, 'Cao Anh Nhất', 'Tôi muốn bình luận nội dung như sau', 1, '2018-03-25 04:42:32', '2018-03-25 05:40:32'),
(3, 'Cao Anh Nhất', 'Tôi sẽ bình luận', 0, '2018-03-25 05:41:06', '2018-03-25 05:41:06'),
(4, 'Cao Anh Nhất', 'sdasdasd', 0, '2018-04-05 03:55:10', '2018-04-05 03:55:10'),
(5, 'sádasd', 'sdasdasd', 0, '2018-04-05 03:56:40', '2018-04-05 03:56:40'),
(6, 'Cao Anh Nhất', 'ádasd', 0, '2018-04-05 04:02:58', '2018-04-05 04:02:58'),
(7, 'Cao Anh Nhất', 'sadasdas', 0, '2018-04-05 04:03:16', '2018-04-05 04:03:16'),
(8, 'Cao Anh Nhất', 'sadasdasádasdasd', 0, '2018-04-05 04:04:50', '2018-04-05 04:04:50'),
(9, 'Cao Anh Nhất', 'sadasdasádasdasd', 0, '2018-04-05 04:09:54', '2018-04-05 04:09:54'),
(10, 'Cao Anh Nhất  ádasda', 'ádasda', 0, '2018-04-05 04:09:59', '2018-04-05 04:09:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `img_id` int(10) UNSIGNED NOT NULL,
  `img_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`img_id`, `img_name`, `img_type`, `created_at`, `updated_at`) VALUES
(1, 'banner-top.png', 'png', '2018-03-24 08:49:31', '2018-03-24 08:49:31'),
(2, 'ic1.png', 'png', '2018-03-24 08:49:31', '2018-03-24 08:49:31'),
(3, 'ic2.png', 'png', '2018-03-24 08:49:32', '2018-03-24 08:49:32'),
(4, 'ic3.png', 'png', '2018-03-24 08:49:32', '2018-03-24 08:49:32'),
(5, 'ic4.png', 'png', '2018-03-24 08:49:32', '2018-03-24 08:49:32'),
(6, 'ic5.png', 'png', '2018-03-24 08:49:32', '2018-03-24 08:49:32'),
(7, 'ic6.png', 'png', '2018-03-24 08:49:32', '2018-03-24 08:49:32'),
(8, 'ic7.png', 'png', '2018-03-24 08:49:32', '2018-03-24 08:49:32'),
(9, 'ic8.png', 'png', '2018-03-24 08:49:32', '2018-03-24 08:49:32'),
(10, 'ic9.png', 'png', '2018-03-24 08:49:32', '2018-03-24 08:49:32'),
(11, 'ic10.png', 'png', '2018-03-24 08:49:33', '2018-03-24 08:49:33'),
(12, 'logo.png', 'png', '2018-03-24 08:49:33', '2018-03-24 08:49:33'),
(13, 'maps.jpg', 'jpg', '2018-03-24 08:49:33', '2018-03-24 08:49:33'),
(14, 'no.png', 'png', '2018-03-24 08:49:33', '2018-03-24 08:49:33'),
(15, 'phone.jpg', 'jpg', '2018-03-24 08:49:33', '2018-03-24 08:49:33'),
(16, 'sp1.jpg', 'jpg', '2018-03-24 08:49:33', '2018-03-24 08:49:33'),
(17, 'sp1-1.jpg', 'jpg', '2018-03-24 08:49:33', '2018-03-24 08:49:33'),
(18, 'sp2.jpg', 'jpg', '2018-03-24 08:49:34', '2018-03-24 08:49:34'),
(19, 'sp2-1.jpg', 'jpg', '2018-03-24 08:49:34', '2018-03-24 08:49:34'),
(20, 'sp3.jpg', 'jpg', '2018-03-24 08:49:34', '2018-03-24 08:49:34'),
(21, 'sp3-1.jpg', 'jpg', '2018-03-24 08:49:34', '2018-03-24 08:49:34'),
(22, 'sp4.jpg', 'jpg', '2018-03-24 08:49:34', '2018-03-24 08:49:34'),
(23, 'sp4-1.jpg', 'jpg', '2018-03-24 08:49:34', '2018-03-24 08:49:34'),
(24, 'sp5.jpg', 'jpg', '2018-03-24 08:49:34', '2018-03-24 08:49:34'),
(25, 'sp5-1.jpg', 'jpg', '2018-03-24 08:49:34', '2018-03-24 08:49:34'),
(26, 'sp6.jpg', 'jpg', '2018-03-24 08:49:35', '2018-03-24 08:49:35'),
(27, 'sp6-1.jpg', 'jpg', '2018-03-24 08:49:35', '2018-03-24 08:49:35'),
(28, 'sp7.jpg', 'jpg', '2018-03-24 08:49:35', '2018-03-24 08:49:35'),
(29, 'sp7-1.jpg', 'jpg', '2018-03-24 08:49:35', '2018-03-24 08:49:35'),
(30, 'sp8.jpg', 'jpg', '2018-03-24 08:49:35', '2018-03-24 08:49:35'),
(31, 'sp8-1.jpg', 'jpg', '2018-03-24 08:49:36', '2018-03-24 08:49:36'),
(32, 'sp9.jpg', 'jpg', '2018-03-24 08:49:36', '2018-03-24 08:49:36'),
(33, 'sp9-1.jpg', 'jpg', '2018-03-24 08:49:36', '2018-03-24 08:49:36'),
(34, 'sp10.jpg', 'jpg', '2018-03-24 08:49:36', '2018-03-24 08:49:36'),
(35, 'sp10-1.jpg', 'jpg', '2018-03-24 08:49:36', '2018-03-24 08:49:36'),
(36, 'do_cg05048_1_grande.jpg', 'jpg', '2018-03-24 08:59:00', '2018-03-24 08:59:00'),
(37, 'do_cg05048_2_grande.jpg', 'jpg', '2018-03-24 08:59:00', '2018-03-24 08:59:00'),
(38, 'do_cg05048_4_grande.jpg', 'jpg', '2018-03-24 08:59:00', '2018-03-24 08:59:00'),
(39, 'do_cg05048_5_grande (1).jpg', 'jpg', '2018-03-24 08:59:00', '2018-03-24 08:59:00'),
(40, 'do_cg05048_5_grande.jpg', 'jpg', '2018-03-24 08:59:00', '2018-03-24 08:59:00'),
(41, 'do_cg05048_6_grande.jpg', 'jpg', '2018-03-24 08:59:00', '2018-03-24 08:59:00'),
(42, 'den_sd07022_1_d0127e911f9945a888286eddca9e9d20_grande.jpg', 'jpg', '2018-03-24 15:03:36', '2018-03-24 15:03:36'),
(43, 'den_sd07022_2_7ab41f07c8b0448c89c1c61a4e69f27d_grande (1).jpg', 'jpg', '2018-03-24 15:03:36', '2018-03-24 15:03:36'),
(44, 'den_sd07022_2_7ab41f07c8b0448c89c1c61a4e69f27d_grande.jpg', 'jpg', '2018-03-24 15:03:36', '2018-03-24 15:03:36'),
(45, 'den_sd07022_3_ee9b09ab9b694ed7b949cc79cd53a9c6_grande.jpg', 'jpg', '2018-03-24 15:03:36', '2018-03-24 15:03:36'),
(46, 'den_sd07022_4_c3571f3bfc9945f4b0949dc21f0c91da_grande.jpg', 'jpg', '2018-03-24 15:03:36', '2018-03-24 15:03:36'),
(47, 'den_sd07022_5_e9af685c8f9e4c3ab87b7d6ac391270a_grande.jpg', 'jpg', '2018-03-24 15:03:37', '2018-03-24 15:03:37'),
(48, 'do-do_sd07022_1_2efe8e7240fd4c5ca798fe9e2417578e_grande (1).jpg', 'jpg', '2018-03-24 15:03:50', '2018-03-24 15:03:50'),
(49, 'do-do_sd07022_1_2efe8e7240fd4c5ca798fe9e2417578e_grande.jpg', 'jpg', '2018-03-24 15:03:50', '2018-03-24 15:03:50'),
(50, 'do-do_sd07022_2_e689398c63304a09aec82f6d31670269_grande.jpg', 'jpg', '2018-03-24 15:03:50', '2018-03-24 15:03:50'),
(51, 'do-do_sd07022_3_0b484eebca104de6a8f8a4e5332052d7_grande.jpg', 'jpg', '2018-03-24 15:03:50', '2018-03-24 15:03:50'),
(52, 'do-do_sd07022_4_1a1af6cb52624b4b98eca3de1754b767_grande.jpg', 'jpg', '2018-03-24 15:03:50', '2018-03-24 15:03:50'),
(53, 'do-do_sd07022_5_c9fe9ea82cbc4a809f48235fe40cf403_grande.jpg', 'jpg', '2018-03-24 15:03:50', '2018-03-24 15:03:50'),
(54, 'xam-dam_sd07022_1_grande.jpg', 'jpg', '2018-03-24 15:03:50', '2018-03-24 15:03:50'),
(55, 'xam-dam_sd07022_2_ee6a92d8408a4d8da122855e6087546f_grande.jpg', 'jpg', '2018-03-24 15:03:51', '2018-03-24 15:03:51'),
(56, 'xam-dam_sd07022_3_grande.jpg', 'jpg', '2018-03-24 15:03:51', '2018-03-24 15:03:51'),
(57, 'xam-dam_sd07022_4_grande.jpg', 'jpg', '2018-03-24 15:03:51', '2018-03-24 15:03:51'),
(58, 'xam-dam_sd07022_5_grande.jpg', 'jpg', '2018-03-24 15:03:51', '2018-03-24 15:03:51'),
(59, 'xam-dam_sd07022_6_grande.jpg', 'jpg', '2018-03-24 15:03:51', '2018-03-24 15:03:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_03_14_081718_create_table_product', 1),
(2, '2018_03_14_081719_create_table_attribute', 1),
(3, '2018_03_14_081720_create_table_attribute_value', 1),
(4, '2018_03_14_082046_create_table_product_attribute', 1),
(5, '2018_03_14_094454_create_table_account', 1),
(6, '2018_03_14_094639_create_table_categorys', 1),
(7, '2018_03_14_095209_create_table_images', 1),
(8, '2018_03_14_095318_create_table_orders', 1),
(9, '2018_03_14_095319_create_table_product_order', 1),
(10, '2018_03_14_102123_create_table_product_images', 1),
(11, '2018_03_17_023838_vp_users_table', 1),
(12, '2018_03_24_151706_create_table_comments', 1),
(13, '2018_03_24_152055_create_table_votes', 1),
(14, '2018_03_24_152106_create_table_product_vote', 1),
(15, '2018_03_24_152452_create_table_product_comment', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_name`, `order_phone`, `order_email`, `order_address`, `order_status`, `order_note`, `created_at`, `updated_at`) VALUES
(1, 'Cao Anh Nhất', '01674754648', 'anhnhata8cool@gmail.com', 'Ngõ  278 Kim Giang - Kim Giang - Thanh Xuân - Hà Nội', '2', NULL, '2018-03-24 09:03:46', '2018-03-24 09:04:01'),
(2, 'Nguyễn Văn A', '01674754648', 'anhnhata8cool@gmail.com', 'Ngõ  278 Kim Giang - Kim Giang - Thanh Xuân - Hà Nội', '2', 'Tôi muốn hàng được chuyển về nhanh nhất', '2018-03-24 15:10:03', '2018-04-05 03:58:15'),
(3, 'Cao Anh Nhất', '01674754648', 'anhnhata8cool@gmail.com', 'Ngõ  278 Kim Giang - Kim Giang - Thanh Xuân - Hà Nội', '1', NULL, '2018-03-25 03:25:37', '2018-03-25 03:26:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `prod_id` int(10) UNSIGNED NOT NULL,
  `prod_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prod_des` longtext COLLATE utf8mb4_unicode_ci,
  `prod_price` int(11) DEFAULT NULL,
  `prod_regular_price` int(11) DEFAULT NULL,
  `prod_sale_price` int(11) DEFAULT NULL,
  `prod_cate` int(11) DEFAULT NULL,
  `prod_thumbnail` int(11) DEFAULT NULL,
  `prod_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_parent` int(11) DEFAULT NULL,
  `prod_value_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_code`, `prod_des`, `prod_price`, `prod_regular_price`, `prod_sale_price`, `prod_cate`, `prod_thumbnail`, `prod_type`, `prod_status`, `prod_parent`, `prod_value_id`, `created_at`, `updated_at`) VALUES
(1, 'Giày cao gót 5cm mũi tròn đính hạt trang trí', 'CG05048', '<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Mũi tr&ograve;n, quai chữ T c&aacute;ch điệu đ&iacute;nh hạt mới lạ, nổi bật</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Bề mặt gi&agrave;y được l&agrave;m bằng chất liệu da lộn bền đẹp, dễ d&agrave;ng vệ sinh khi bị d&iacute;nh bẩn</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Lớp l&oacute;t b&ecirc;n trong phần mũi gi&agrave;y v&agrave; g&oacute;t hậu được l&agrave;m bằng m&uacute;t d&agrave;y v&ocirc; c&ugrave;ng &ecirc;m &aacute;i</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- G&oacute;t vu&ocirc;ng cao 5cm, quai g&agrave;i c&oacute; n&uacute;t điều chỉnh k&iacute;ch thước tiện dụng</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Đế đ&uacute;c cao su nguy&ecirc;n khối, c&oacute; r&atilde;nh chống trơn trượt, an to&agrave;n khi di chuyển</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Th&iacute;ch hợp mang gi&agrave;y đi tiệc, đi l&agrave;m...</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\"><img src=\"https://file.hstatic.net/1000003969/file/juno__60_of_6__grande.jpg\" /></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\"><img src=\"https://file.hstatic.net/1000003969/file/juno__58_of_6__grande.jpg\" /></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\"><img src=\"https://file.hstatic.net/1000003969/file/juno__59_of_6__grande.jpg\" /></span></span></p>', 430000, NULL, 0, 5, 36, 'group', 'public', 0, 0, '2018-03-24 08:58:40', '2018-03-24 08:59:23'),
(2, 'Giày cao gót 5cm mũi tròn đính hạt trang trí - Xanh', 'CG05048', '<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Mũi tr&ograve;n, quai chữ T c&aacute;ch điệu đ&iacute;nh hạt mới lạ, nổi bật</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Bề mặt gi&agrave;y được l&agrave;m bằng chất liệu da lộn bền đẹp, dễ d&agrave;ng vệ sinh khi bị d&iacute;nh bẩn</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Lớp l&oacute;t b&ecirc;n trong phần mũi gi&agrave;y v&agrave; g&oacute;t hậu được l&agrave;m bằng m&uacute;t d&agrave;y v&ocirc; c&ugrave;ng &ecirc;m &aacute;i</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- G&oacute;t vu&ocirc;ng cao 5cm, quai g&agrave;i c&oacute; n&uacute;t điều chỉnh k&iacute;ch thước tiện dụng</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Đế đ&uacute;c cao su nguy&ecirc;n khối, c&oacute; r&atilde;nh chống trơn trượt, an to&agrave;n khi di chuyển</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Th&iacute;ch hợp mang gi&agrave;y đi tiệc, đi l&agrave;m...</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\"><img src=\"https://file.hstatic.net/1000003969/file/juno__60_of_6__grande.jpg\" /></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\"><img src=\"https://file.hstatic.net/1000003969/file/juno__58_of_6__grande.jpg\" /></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\"><img src=\"https://file.hstatic.net/1000003969/file/juno__59_of_6__grande.jpg\" /></span></span></p>', 430000, NULL, 0, 5, 35, 'item-group', 'public', 1, 1, '2018-03-24 08:58:41', '2018-03-24 08:58:41'),
(3, 'Giày cao gót 5cm mũi tròn đính hạt trang trí - Đỏ', 'CG05048', NULL, 480000, NULL, 0, NULL, 36, 'item-group', 'public', 1, 2, '2018-03-24 08:58:41', '2018-03-24 09:02:49'),
(4, 'Giày cao gót 5cm mũi tròn đính hạt trang trí - Tím', 'CG05048', '<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Mũi tr&ograve;n, quai chữ T c&aacute;ch điệu đ&iacute;nh hạt mới lạ, nổi bật</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Bề mặt gi&agrave;y được l&agrave;m bằng chất liệu da lộn bền đẹp, dễ d&agrave;ng vệ sinh khi bị d&iacute;nh bẩn</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Lớp l&oacute;t b&ecirc;n trong phần mũi gi&agrave;y v&agrave; g&oacute;t hậu được l&agrave;m bằng m&uacute;t d&agrave;y v&ocirc; c&ugrave;ng &ecirc;m &aacute;i</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- G&oacute;t vu&ocirc;ng cao 5cm, quai g&agrave;i c&oacute; n&uacute;t điều chỉnh k&iacute;ch thước tiện dụng</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Đế đ&uacute;c cao su nguy&ecirc;n khối, c&oacute; r&atilde;nh chống trơn trượt, an to&agrave;n khi di chuyển</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Th&iacute;ch hợp mang gi&agrave;y đi tiệc, đi l&agrave;m...</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\"><img src=\"https://file.hstatic.net/1000003969/file/juno__60_of_6__grande.jpg\" /></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\"><img src=\"https://file.hstatic.net/1000003969/file/juno__58_of_6__grande.jpg\" /></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\"><img src=\"https://file.hstatic.net/1000003969/file/juno__59_of_6__grande.jpg\" /></span></span></p>', 430000, NULL, 0, 5, 35, 'item-group', 'public', 1, 3, '2018-03-24 08:58:41', '2018-03-24 08:58:41'),
(5, 'Giày cao gót 5cm mũi tròn đính hạt trang trí - Vàng', 'CG05048', '<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Mũi tr&ograve;n, quai chữ T c&aacute;ch điệu đ&iacute;nh hạt mới lạ, nổi bật</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Bề mặt gi&agrave;y được l&agrave;m bằng chất liệu da lộn bền đẹp, dễ d&agrave;ng vệ sinh khi bị d&iacute;nh bẩn</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Lớp l&oacute;t b&ecirc;n trong phần mũi gi&agrave;y v&agrave; g&oacute;t hậu được l&agrave;m bằng m&uacute;t d&agrave;y v&ocirc; c&ugrave;ng &ecirc;m &aacute;i</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- G&oacute;t vu&ocirc;ng cao 5cm, quai g&agrave;i c&oacute; n&uacute;t điều chỉnh k&iacute;ch thước tiện dụng</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Đế đ&uacute;c cao su nguy&ecirc;n khối, c&oacute; r&atilde;nh chống trơn trượt, an to&agrave;n khi di chuyển</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">- Th&iacute;ch hợp mang gi&agrave;y đi tiệc, đi l&agrave;m...</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\"><img src=\"https://file.hstatic.net/1000003969/file/juno__60_of_6__grande.jpg\" /></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\"><img src=\"https://file.hstatic.net/1000003969/file/juno__58_of_6__grande.jpg\" /></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\"><img src=\"https://file.hstatic.net/1000003969/file/juno__59_of_6__grande.jpg\" /></span></span></p>', 430000, NULL, 0, 5, 35, 'item-group', 'public', 1, 4, '2018-03-24 08:58:41', '2018-03-24 08:58:41'),
(6, 'Giày sandal quai chữ T trang trí khóa cài', 'SD07022', '<p><span style=\"font-size:18px\">- Gi&agrave;y mũi tr&ograve;n, quai chữ T trang tr&iacute; kh&oacute;a c&agrave;i kim loại mang lại n&eacute;t mới lạ v&agrave; nổi bật</span></p>\r\n\r\n<p><span style=\"font-size:18px\">- Quai hậu &ocirc;m cổ ch&acirc;n, c&oacute; thể dễ d&agrave;ng điều chỉnh k&iacute;ch thước cho n&agrave;ng diện thoải m&aacute;i suốt cả ng&agrave;y&nbsp;</span></p>\r\n\r\n<p><span style=\"font-size:18px\">- G&oacute;t vu&ocirc;ng cao 7cm,&nbsp;tạo cho v&oacute;c d&aacute;ng th&ecirc;m phần uyển chuyển, quyến rũ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">- Đế đ&uacute;c cao su, c&oacute; r&atilde;nh chống trơn trượt an to&agrave;n khi di chuyển</span></p>\r\n\r\n<p><span style=\"font-size:18px\">- Chất liệu nhung mới lạ, &ecirc;m ch&acirc;n mang lại n&eacute;t sang trọng cho n&agrave;ng khi diện</span></p>\r\n\r\n<p><span style=\"font-size:18px\">- Kết hợp bắt mắt với c&aacute;c trang phục nhẹ nh&agrave;ng với chất liệu nổi bật như nhung, voan, lụa, đầm su&ocirc;ng, hay quần short kaki....</span></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6838_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6835_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6839_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6836_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6093_grande.jpg\" /></p>', 390000, NULL, 0, 8, 54, 'group', 'public', 0, 0, '2018-03-24 15:03:02', '2018-03-24 16:17:14'),
(7, 'Giày sandal quai chữ T trang trí khóa cài - Đỏ', 'SD07022', '<p>- Gi&agrave;y mũi tr&ograve;n, quai chữ T trang tr&iacute; kh&oacute;a c&agrave;i kim loại mang lại n&eacute;t mới lạ v&agrave; nổi bật</p>\r\n\r\n<p>- Quai hậu &ocirc;m cổ ch&acirc;n, c&oacute; thể dễ d&agrave;ng điều chỉnh k&iacute;ch thước cho n&agrave;ng diện thoải m&aacute;i suốt cả ng&agrave;y&nbsp;</p>\r\n\r\n<p>- G&oacute;t vu&ocirc;ng cao 7cm,&nbsp;tạo cho v&oacute;c d&aacute;ng th&ecirc;m phần uyển chuyển, quyến rũ</p>\r\n\r\n<p>- Đế đ&uacute;c cao su, c&oacute; r&atilde;nh chống trơn trượt an to&agrave;n khi di chuyển</p>\r\n\r\n<p>- Chất liệu nhung mới lạ, &ecirc;m ch&acirc;n mang lại n&eacute;t sang trọng cho n&agrave;ng khi diện</p>\r\n\r\n<p>- Kết hợp bắt mắt với c&aacute;c trang phục nhẹ nh&agrave;ng với chất liệu nổi bật như nhung, voan, lụa, đầm su&ocirc;ng, hay quần short kaki....</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6838_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6835_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6839_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6836_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6093_grande.jpg\" /></p>', 390000, NULL, 0, 8, 49, 'item-group', 'public', 6, 2, '2018-03-24 15:03:04', '2018-03-24 15:05:29'),
(8, 'Giày sandal quai chữ T trang trí khóa cài - Đen', 'SD07022', '<p>- Gi&agrave;y mũi tr&ograve;n, quai chữ T trang tr&iacute; kh&oacute;a c&agrave;i kim loại mang lại n&eacute;t mới lạ v&agrave; nổi bật</p>\r\n\r\n<p>- Quai hậu &ocirc;m cổ ch&acirc;n, c&oacute; thể dễ d&agrave;ng điều chỉnh k&iacute;ch thước cho n&agrave;ng diện thoải m&aacute;i suốt cả ng&agrave;y&nbsp;</p>\r\n\r\n<p>- G&oacute;t vu&ocirc;ng cao 7cm,&nbsp;tạo cho v&oacute;c d&aacute;ng th&ecirc;m phần uyển chuyển, quyến rũ</p>\r\n\r\n<p>- Đế đ&uacute;c cao su, c&oacute; r&atilde;nh chống trơn trượt an to&agrave;n khi di chuyển</p>\r\n\r\n<p>- Chất liệu nhung mới lạ, &ecirc;m ch&acirc;n mang lại n&eacute;t sang trọng cho n&agrave;ng khi diện</p>\r\n\r\n<p>- Kết hợp bắt mắt với c&aacute;c trang phục nhẹ nh&agrave;ng với chất liệu nổi bật như nhung, voan, lụa, đầm su&ocirc;ng, hay quần short kaki....</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6838_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6835_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6839_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6836_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6093_grande.jpg\" /></p>', 390000, NULL, 0, 8, 42, 'item-group', 'public', 6, 10, '2018-03-24 15:03:04', '2018-03-24 15:06:01'),
(9, 'Giày sandal quai chữ T trang trí khóa cài - Xám', 'SD07022', '<p>- Gi&agrave;y mũi tr&ograve;n, quai chữ T trang tr&iacute; kh&oacute;a c&agrave;i kim loại mang lại n&eacute;t mới lạ v&agrave; nổi bật</p>\r\n\r\n<p>- Quai hậu &ocirc;m cổ ch&acirc;n, c&oacute; thể dễ d&agrave;ng điều chỉnh k&iacute;ch thước cho n&agrave;ng diện thoải m&aacute;i suốt cả ng&agrave;y&nbsp;</p>\r\n\r\n<p>- G&oacute;t vu&ocirc;ng cao 7cm,&nbsp;tạo cho v&oacute;c d&aacute;ng th&ecirc;m phần uyển chuyển, quyến rũ</p>\r\n\r\n<p>- Đế đ&uacute;c cao su, c&oacute; r&atilde;nh chống trơn trượt an to&agrave;n khi di chuyển</p>\r\n\r\n<p>- Chất liệu nhung mới lạ, &ecirc;m ch&acirc;n mang lại n&eacute;t sang trọng cho n&agrave;ng khi diện</p>\r\n\r\n<p>- Kết hợp bắt mắt với c&aacute;c trang phục nhẹ nh&agrave;ng với chất liệu nổi bật như nhung, voan, lụa, đầm su&ocirc;ng, hay quần short kaki....</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6838_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6835_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6839_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6836_grande.jpg\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://file.hstatic.net/1000003969/file/_mg_6093_grande.jpg\" /></p>', 390000, NULL, 0, 8, 54, 'item-group', 'public', 6, 11, '2018-03-24 15:03:04', '2018-03-24 15:06:23'),
(10, 'ádasd', 'đấ', '<p>dấdasdasdasdasdasdsadas</p>', 34454, NULL, 5464646, 5, 1, 'group', 'draff', 0, 0, '2018-04-05 03:53:38', '2018-04-05 03:53:38'),
(11, 'ádasd - Xanh', 'đấ', '<p>dấdasdasdasdasdasdsadas</p>', 34454, NULL, 5464646, 5, 1, 'item-group', 'draff', 10, 1, '2018-04-05 03:53:38', '2018-04-05 03:53:38'),
(12, 'ádasd - Đỏ', 'đấ', '<p>dấdasdasdasdasdasdsadas</p>', 34454, NULL, 5464646, 5, 1, 'item-group', 'draff', 10, 2, '2018-04-05 03:53:38', '2018-04-05 03:53:38'),
(13, 'ádasd - Tím', 'đấ', '<p>dấdasdasdasdasdasdsadas</p>', 34454, NULL, 5464646, 5, 1, 'item-group', 'draff', 10, 3, '2018-04-05 03:53:38', '2018-04-05 03:53:38'),
(14, 'ádasd - Vàng', 'đấ', '<p>dấdasdasdasdasdasdsadas</p>', 34454, NULL, 5464646, 5, 1, 'item-group', 'draff', 10, 4, '2018-04-05 03:53:38', '2018-04-05 03:53:38'),
(15, 'ádasd - Đen', 'đấ', '<p>dấdasdasdasdasdasdsadas</p>', 34454, NULL, 5464646, 5, 1, 'item-group', 'draff', 10, 10, '2018-04-05 03:53:38', '2018-04-05 03:53:38'),
(16, 'ádasd - Xám', 'đấ', '<p>dấdasdasdasdasdasdsadas</p>', 34454, NULL, 5464646, 5, 1, 'item-group', 'draff', 10, 11, '2018-04-05 03:53:39', '2018-04-05 03:53:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attribute`
--

CREATE TABLE `product_attribute` (
  `prod_id` int(10) UNSIGNED DEFAULT NULL,
  `att_value_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_attribute`
--

INSERT INTO `product_attribute` (`prod_id`, `att_value_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-03-24 08:58:40', '2018-03-24 08:58:40'),
(1, 2, '2018-03-24 08:58:40', '2018-03-24 08:58:40'),
(1, 3, '2018-03-24 08:58:41', '2018-03-24 08:58:41'),
(1, 4, '2018-03-24 08:58:41', '2018-03-24 08:58:41'),
(1, 5, '2018-03-24 08:58:41', '2018-03-24 08:58:41'),
(1, 6, '2018-03-24 08:58:41', '2018-03-24 08:58:41'),
(1, 7, '2018-03-24 08:58:41', '2018-03-24 08:58:41'),
(1, 8, '2018-03-24 08:58:41', '2018-03-24 08:58:41'),
(1, 9, '2018-03-24 08:58:41', '2018-03-24 08:58:41'),
(6, 2, '2018-03-24 15:03:03', '2018-03-24 15:03:03'),
(6, 10, '2018-03-24 15:03:03', '2018-03-24 15:03:03'),
(6, 11, '2018-03-24 15:03:03', '2018-03-24 15:03:03'),
(6, 5, '2018-03-24 15:03:03', '2018-03-24 15:03:03'),
(6, 6, '2018-03-24 15:03:03', '2018-03-24 15:03:03'),
(6, 7, '2018-03-24 15:03:03', '2018-03-24 15:03:03'),
(6, 8, '2018-03-24 15:03:03', '2018-03-24 15:03:03'),
(6, 9, '2018-03-24 15:03:03', '2018-03-24 15:03:03'),
(6, 12, '2018-03-24 16:18:34', '2018-03-24 16:18:34'),
(1, 12, '2018-03-24 16:18:59', '2018-03-24 16:18:59'),
(10, 1, '2018-04-05 03:53:38', '2018-04-05 03:53:38'),
(10, 2, '2018-04-05 03:53:38', '2018-04-05 03:53:38'),
(10, 3, '2018-04-05 03:53:38', '2018-04-05 03:53:38'),
(10, 4, '2018-04-05 03:53:38', '2018-04-05 03:53:38'),
(10, 10, '2018-04-05 03:53:38', '2018-04-05 03:53:38'),
(10, 11, '2018-04-05 03:53:38', '2018-04-05 03:53:38'),
(10, 5, '2018-04-05 03:53:38', '2018-04-05 03:53:38'),
(10, 6, '2018-04-05 03:53:38', '2018-04-05 03:53:38'),
(10, 7, '2018-04-05 03:53:38', '2018-04-05 03:53:38'),
(10, 12, '2018-04-05 03:53:38', '2018-04-05 03:53:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comment`
--

CREATE TABLE `product_comment` (
  `prod_id` int(10) UNSIGNED DEFAULT NULL,
  `comment_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_comment`
--

INSERT INTO `product_comment` (`prod_id`, `comment_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-03-25 04:42:32', '2018-03-25 04:42:32'),
(2, 1, '2018-03-25 04:56:25', '2018-03-25 04:56:25'),
(3, 1, '2018-03-25 05:41:06', '2018-03-25 05:41:06'),
(6, 1, '2018-04-05 04:02:58', '2018-04-05 04:02:58'),
(10, 9, '2018-04-05 04:09:54', '2018-04-05 04:09:54'),
(10, 10, '2018-04-05 04:09:59', '2018-04-05 04:09:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `prod_id` int(10) UNSIGNED DEFAULT NULL,
  `img_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`prod_id`, `img_id`, `created_at`, `updated_at`) VALUES
(3, 36, '2018-03-24 09:00:03', '2018-03-24 09:00:03'),
(3, 37, '2018-03-24 09:00:04', '2018-03-24 09:00:04'),
(3, 38, '2018-03-24 09:00:04', '2018-03-24 09:00:04'),
(3, 40, '2018-03-24 09:00:04', '2018-03-24 09:00:04'),
(3, 41, '2018-03-24 09:00:04', '2018-03-24 09:00:04'),
(1, 36, '2018-03-24 09:04:51', '2018-03-24 09:04:51'),
(1, 38, '2018-03-24 09:04:51', '2018-03-24 09:04:51'),
(6, 49, '2018-03-24 15:04:39', '2018-03-24 15:04:39'),
(6, 54, '2018-03-24 15:04:39', '2018-03-24 15:04:39'),
(7, 49, '2018-03-24 15:05:30', '2018-03-24 15:05:30'),
(7, 50, '2018-03-24 15:05:30', '2018-03-24 15:05:30'),
(7, 51, '2018-03-24 15:05:30', '2018-03-24 15:05:30'),
(7, 52, '2018-03-24 15:05:30', '2018-03-24 15:05:30'),
(7, 53, '2018-03-24 15:05:30', '2018-03-24 15:05:30'),
(8, 42, '2018-03-24 15:06:01', '2018-03-24 15:06:01'),
(8, 43, '2018-03-24 15:06:01', '2018-03-24 15:06:01'),
(8, 44, '2018-03-24 15:06:01', '2018-03-24 15:06:01'),
(8, 45, '2018-03-24 15:06:01', '2018-03-24 15:06:01'),
(8, 46, '2018-03-24 15:06:02', '2018-03-24 15:06:02'),
(8, 47, '2018-03-24 15:06:02', '2018-03-24 15:06:02'),
(9, 54, '2018-03-24 15:06:23', '2018-03-24 15:06:23'),
(9, 55, '2018-03-24 15:06:23', '2018-03-24 15:06:23'),
(9, 56, '2018-03-24 15:06:23', '2018-03-24 15:06:23'),
(9, 57, '2018-03-24 15:06:23', '2018-03-24 15:06:23'),
(9, 58, '2018-03-24 15:06:23', '2018-03-24 15:06:23'),
(9, 59, '2018-03-24 15:06:24', '2018-03-24 15:06:24'),
(10, 57, '2018-04-05 03:53:38', '2018-04-05 03:53:38'),
(10, 58, '2018-04-05 03:53:38', '2018-04-05 03:53:38'),
(10, 59, '2018-04-05 03:53:38', '2018-04-05 03:53:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_order`
--

CREATE TABLE `product_order` (
  `prod_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_order`
--

INSERT INTO `product_order` (`prod_id`, `order_id`, `qty`, `price`, `options`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 480000, 'a:3:{s:4:\"size\";s:2:\"39\";s:5:\"color\";s:5:\"Đỏ\";s:8:\"thumnail\";s:23:\"do_cg05048_1_grande.jpg\";}', '2018-03-24 09:03:46', '2018-03-24 09:03:46'),
(3, 2, 1, 480000, 'a:3:{s:4:\"size\";s:2:\"39\";s:5:\"color\";s:5:\"Đỏ\";s:8:\"thumnail\";s:23:\"do_cg05048_1_grande.jpg\";}', '2018-03-24 15:10:03', '2018-03-24 15:10:03'),
(9, 2, 1, 390000, 'a:3:{s:4:\"size\";s:2:\"38\";s:5:\"color\";s:4:\"Xám\";s:8:\"thumnail\";s:28:\"xam-dam_sd07022_1_grande.jpg\";}', '2018-03-24 15:10:03', '2018-03-24 15:10:03'),
(3, 3, 4, 480000, 'a:3:{s:4:\"size\";s:2:\"35\";s:5:\"color\";s:5:\"Đỏ\";s:8:\"thumnail\";s:23:\"do_cg05048_1_grande.jpg\";}', '2018-03-25 03:25:37', '2018-03-25 03:25:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_vote`
--

CREATE TABLE `product_vote` (
  `prod_id` int(10) UNSIGNED DEFAULT NULL,
  `vote_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `votes`
--

CREATE TABLE `votes` (
  `vote_id` int(10) UNSIGNED NOT NULL,
  `vote_rate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`att_id`);

--
-- Chỉ mục cho bảng `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`att_value_id`),
  ADD KEY `attribute_value_att_id_foreign` (`att_id`);

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Chỉ mục cho bảng `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD KEY `product_attribute_prod_id_foreign` (`prod_id`),
  ADD KEY `product_attribute_att_value_id_foreign` (`att_value_id`);

--
-- Chỉ mục cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  ADD KEY `product_comment_prod_id_foreign` (`prod_id`),
  ADD KEY `product_comment_comment_id_foreign` (`comment_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD KEY `product_images_prod_id_foreign` (`prod_id`),
  ADD KEY `product_images_img_id_foreign` (`img_id`);

--
-- Chỉ mục cho bảng `product_order`
--
ALTER TABLE `product_order`
  ADD KEY `product_order_prod_id_foreign` (`prod_id`),
  ADD KEY `product_order_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `product_vote`
--
ALTER TABLE `product_vote`
  ADD KEY `product_vote_prod_id_foreign` (`prod_id`),
  ADD KEY `product_vote_vote_id_foreign` (`vote_id`);

--
-- Chỉ mục cho bảng `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `attribute`
--
ALTER TABLE `attribute`
  MODIFY `att_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `att_value_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `categorys`
--
ALTER TABLE `categorys`
  MODIFY `cate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `votes`
--
ALTER TABLE `votes`
  MODIFY `vote_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD CONSTRAINT `attribute_value_att_id_foreign` FOREIGN KEY (`att_id`) REFERENCES `attribute` (`att_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD CONSTRAINT `product_attribute_att_value_id_foreign` FOREIGN KEY (`att_value_id`) REFERENCES `attribute_value` (`att_value_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_attribute_prod_id_foreign` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  ADD CONSTRAINT `product_comment_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_comment_prod_id_foreign` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_img_id_foreign` FOREIGN KEY (`img_id`) REFERENCES `images` (`img_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_images_prod_id_foreign` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_order_prod_id_foreign` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_vote`
--
ALTER TABLE `product_vote`
  ADD CONSTRAINT `product_vote_prod_id_foreign` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_vote_vote_id_foreign` FOREIGN KEY (`vote_id`) REFERENCES `votes` (`vote_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
