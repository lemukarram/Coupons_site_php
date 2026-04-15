-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2024 a las 22:32:15
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `couponza_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ads`
--

CREATE TABLE `ads` (
  `ad_id` int(11) NOT NULL,
  `ad_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ad_html` text COLLATE utf8_unicode_ci NOT NULL,
  `ad_position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ad_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `ads`
--

INSERT INTO `ads` (`ad_id`, `ad_title`, `ad_html`, `ad_position`, `ad_status`) VALUES
(1, 'Header', '<p><img src=\"https://via.placeholder.com/720x120\" /></p>', 'header', 1),
(3, 'Footer', '<p><img src=\"https://via.placeholder.com/728x90\" /></p>', 'footer', 1),
(4, 'Sidebar', '<p><img src=\"https://via.placeholder.com/350x350\" /></p>', 'sidebar', 1),
(5, 'Modal', '<p><img src=\"https://via.placeholder.com/720x120\" /></p>', 'modal', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_seotitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_description` text COLLATE utf8_unicode_ci NOT NULL,
  `category_seodescription` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'minus',
  `category_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_featured` tinyint(1) NOT NULL DEFAULT 0,
  `category_menu` tinyint(1) NOT NULL DEFAULT 0,
  `category_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`, `category_seotitle`, `category_description`, `category_seodescription`, `category_slug`, `category_icon`, `category_image`, `category_featured`, `category_menu`, `category_status`) VALUES
(1, 'Hotels & Travel', '', 'Hotels & Travel Deals & Coupons', '', 'hotels-travel', 'plane', 'category_1634750293.png', 1, 1, 1),
(2, 'Things To Do', NULL, 'Things To Do Deals & Coupons', '', 'things-to-do', 'bike', 'category_1634750370.png', 1, 1, 1),
(3, 'Beauty & Spas', NULL, 'Beauty & Spas Deals & Coupons', '', 'beauty-spas', 'leaf', 'category_1634750437.png', 1, 1, 1),
(4, 'Health & Fitness', NULL, 'Health & Fitness Deals & Coupons', '', 'health-fitness', 'activity', 'category_1634750602.png', 1, 1, 1),
(5, 'Food & Drink', '', 'Food & Drink & Coupons', '', 'food-drink', 'coffee', 'category_1634944730.png', 1, 1, 1),
(6, 'Retail', '', 'Retail Deals & Coupons', '', 'retail', 'gift', 'category_1634750785.png', 1, 1, 1),
(7, 'Automotive', '', 'Automotive Deals & Coupons', '', 'automotive', 'car', 'category_1634754670.png', 1, 1, 1),
(8, 'Electronics', '', 'Electronics Deals & Coupons', '', 'electronics', 'device-desktop', 'category_1635635570.png', 1, 0, 1),
(9, 'Home Services', '', 'Home Services Deals & Coupons', '', 'home-services', 'home', 'category_1635636018.png', 1, 0, 1),
(10, 'Baby & Kids', '', 'Baby & Kids Deals & Coupons', '', 'baby-kids', '', 'category_1635636139.png', 1, 0, 1),
(11, 'Entertainment', '', 'Entertainment Deals & Coupons', '', 'entertainment', '', 'category_1635636240.png', 1, 0, 1),
(12, 'Online Learning', '', 'Online Learning Deals & Coupons', '', 'online-learning', '', 'category_1635636360.png', 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(11) NOT NULL,
  `coupon_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_seotitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_description` text COLLATE utf8_unicode_ci NOT NULL,
  `coupon_seodescription` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_category` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_subcategory` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_store` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_author` int(11) NOT NULL,
  `coupon_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_tagline` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_start` datetime NOT NULL DEFAULT current_timestamp(),
  `coupon_expire` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_featured` tinyint(1) NOT NULL DEFAULT 0,
  `coupon_verify` tinyint(1) NOT NULL DEFAULT 0,
  `coupon_exclusive` tinyint(1) NOT NULL DEFAULT 0,
  `coupon_sponsored` tinyint(1) DEFAULT 0,
  `coupon_status` tinyint(1) NOT NULL DEFAULT 1,
  `coupon_created` datetime NOT NULL DEFAULT current_timestamp(),
  `coupon_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_title`, `coupon_seotitle`, `coupon_description`, `coupon_seodescription`, `coupon_category`, `coupon_subcategory`, `coupon_store`, `coupon_slug`, `coupon_author`, `coupon_image`, `coupon_code`, `coupon_tagline`, `coupon_link`, `coupon_start`, `coupon_expire`, `coupon_featured`, `coupon_verify`, `coupon_exclusive`, `coupon_sponsored`, `coupon_status`, `coupon_created`, `coupon_updated`) VALUES
(1, '20% Off Your Regular-priced Order', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '6', '8', '2', 'coupon-zara-20', 1, 'coupon_1638575623.jpg', 'ZARA25', 'Tag Line', 'https://www.zara.com/', '2021-12-13 03:00:00', '2028-03-02 0:00', 1, 1, 0, 0, 1, '2021-12-02 20:51:18', '2024-02-03 21:30:50'),
(2, '20% Off One Item In-Store', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '6', '9', '3', '20-off-one-item-in-store', 1, 'coupon_1638575024.jpg', 'OFFHM20', 'Tag Line', 'https://www2.hm.com/', '2021-12-04 00:00:00', '2028-01-01 0:00', 1, 0, 0, 0, 1, '2021-12-04 00:39:28', '2024-02-03 21:31:32'),
(3, '2 Cream Coffes For $10', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '5', '11', '5', '2-cream-coffes-for-10', 1, 'coupon_1638740943.jpg', '2CCREAM10', 'Tag Line', 'https://www.starbucks.com/', '2021-12-05 00:00:00', '', 0, 1, 0, 0, 1, '2021-12-05 22:49:02', '2021-12-08 20:11:14'),
(4, 'Free Cheeseburger, Mayo Chicken Or McFlurry', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '5', '10', '6', 'free-cheeseburger-mayo-chicken-or-mcflurry', 1, 'coupon_1638742104.jpg', 'FREEMC', 'Tag Line', 'https://www.mcdonalds.com/', '2021-12-05 00:00:00', '2028-02-01 0:00', 1, 1, 0, 0, 1, '2021-12-13 23:08:23', '2024-02-03 21:30:13'),
(5, 'Up to 20% Off Amazon Warehouse', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '4', '13', '9', 'up-to-20-off-amazon-warehouse', 1, 'coupon_1638743000.jpg', '20OFFAMZN', 'Tag Line', 'https://www.amazon.com/', '2021-12-05 00:00:00', '', 0, 1, 0, 0, 1, '2021-12-05 23:21:31', '2021-12-14 02:22:35'),
(6, '40% Off Full Price Styles + Extra 30% Off Sale & Outlet', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '6', '8', '12', '40-off-full-price-styles-extra-30-off-sale-outlet', 1, 'coupon_1638743620.jpg', '40DISCOUNT', 'Tag Line', 'https://puma.com/', '2021-12-05 00:00:00', '2023-01-05 0:00', 0, 1, 0, 0, 1, '2021-12-05 23:33:39', '2021-12-15 07:34:43'),
(7, '5% Cash Back For New Customers', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '5', '12', '17', '5-cash-back-for-new-customers', 1, 'coupon_1638744089.jpg', '', 'Tag Line', 'https://glovoapp.com/', '2021-12-05 00:00:00', '2028-02-03 0:00', 1, 1, 0, 0, 1, '2021-12-05 23:41:28', '2024-02-03 21:31:11'),
(8, 'Up to 88% Off Udemy Courses', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '12', '0', '15', 'up-to-88-off-udemy-courses', 1, 'coupon_1638824244.jpg', 'UDEMY88', 'Tag Line', 'https://www.udemy.com/', '2021-12-06 00:00:00', '2021-12-08 20:00', 1, 1, 0, 0, 1, '2021-12-06 21:57:23', '2021-12-08 20:11:14'),
(9, 'Let\'s Party! 15% Off NYE', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '6', '7', '2', 'let-s-party-15-off-nye', 1, 'coupon_1706995730.jpg', 'ZARA15', '', 'https://zara.com/', '2021-12-08 00:00:00', '', 0, 1, 0, 0, 1, '2021-12-08 20:36:14', '2024-02-03 21:28:49'),
(10, '30% Off Accessories', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '6', '8', '2', '30-off-accessories', 1, 'coupon_1706995738.jpg', '30ZARA', '', 'https://zara.com/', '2021-12-08 00:00:00', '', 0, 0, 0, 0, 1, '2021-12-08 20:45:41', '2024-02-03 21:28:57'),
(11, '40% Off Select Styles', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '6', '8', '2', '40-off-select-styles', 1, 'coupon_1706995744.jpg', 'ZARA40', 'Online Only! ', 'https://zara.com/', '2021-12-08 00:00:00', '', 0, 1, 0, 0, 1, '2021-12-08 21:36:19', '2024-02-03 21:29:03'),
(12, 'Free Standard Shipping on Orders Over $50', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '6', '8', '3', 'free-standard-shipping-on-orders-over-50', 1, 'coupon_1706995752.jpg', 'HMFREE', 'Free Shipping', 'https://www2.hm.com/', '2021-12-08 00:00:00', '', 0, 1, 0, 0, 1, '2021-12-08 21:40:52', '2024-02-03 21:29:11'),
(13, 'Extra 25% Off Pizza Orders Online', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '5', '10', '11', 'extra-25-off-pizza-orders-online', 1, 'coupon_1638997027.jpg', '', 'Online Only! ', 'https://www.papajohns.com/', '2021-12-08 00:00:00', '2028-02-28 0:00', 1, 1, 1, 0, 1, '2021-12-08 21:57:06', '2024-02-03 21:29:34'),
(14, '50% Off Or More on Electronics', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '8', '0', '9', '50-off-or-more-on-electronics', 1, 'coupon_1639511240.jpg', '50OFFAMZ', '', 'https://amazon.com/', '2021-12-14 00:00:00', '', 0, 1, 1, 0, 1, '2021-12-14 20:47:19', '2021-12-14 20:47:19'),
(15, '15% Off For Students', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '5', '10', '16', '15-off-for-students', 1, 'coupon_1639511640.jpg', '15OFF', '', 'https://ubereats.com/', '2021-12-14 00:00:00', '', 0, 1, 1, 0, 1, '2021-12-14 20:53:59', '2021-12-14 20:54:39'),
(16, '$15 Off + Free Worldwide Shipping on $50+', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '5', '11', '8', '15-off-free-worldwide-shipping-on-50', 1, 'coupon_1639511834.jpg', '15FREESHIP', 'Online Only! ', 'https://www.kentucky.com.do/', '2021-12-14 00:00:00', '', 0, 1, 1, 0, 1, '2021-12-14 20:57:14', '2021-12-14 20:58:27'),
(17, 'MacBook Pro From $11.95/mo', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '8', '0', '18', 'macbook-pro-from-11-95-mo', 1, 'coupon_1639512825.jpg', '', '', 'https://apple.com/', '2021-12-14 00:00:00', '', 0, 1, 0, 0, 1, '2021-12-14 21:08:53', '2021-12-15 07:40:04'),
(18, '$4 Off Sitewide For New Customers', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '6', '0', '19', '4-off-sitewide-for-new-customers', 1, 'coupon_1639512679.jpg', '4OFF', '', 'https://aliexpress.com/', '2021-12-14 00:00:00', '', 0, 1, 1, 0, 1, '2021-12-14 21:11:18', '2021-12-14 21:11:46'),
(19, 'Up to 50% Off Udemy Courses', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '12', '0', '15', 'up-to-50-off-udemy-courses', 1, 'coupon_1639513085.jpg', '50OFFNEW', 'New Users Only! ', 'https://udemy.com/', '2021-12-14 00:00:00', '', 0, 1, 1, 0, 1, '2021-12-14 21:18:05', '2021-12-14 21:18:05'),
(20, 'Up to 50% Off Select Sale Items', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '6', '8', '10', 'up-to-50-off-select-sale-items', 1, 'coupon_1639550044.jpg', '50SELECTED', '', 'https://walmart.com/', '2021-12-15 00:00:00', '', 1, 1, 0, 0, 1, '2021-12-15 07:34:03', '2021-12-15 07:34:03'),
(21, '15% Off Your Order', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '', '5', '10', '20', '15-off-your-order', 1, 'coupon_1639550513.jpg', '15OFFSUB', '', 'https://www.subway.com/en-US/ExploreOurWorld', '2021-12-15 00:00:00', '2023-02-03 0:00', 1, 1, 0, 0, 1, '2021-12-15 07:41:53', '2021-12-15 07:42:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emailtemplates`
--

CREATE TABLE `emailtemplates` (
  `email_id` int(2) NOT NULL,
  `email_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_fromname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_plaintext` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `email_disabled` tinyint(1) NOT NULL DEFAULT 0,
  `email_content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `emailtemplates`
--

INSERT INTO `emailtemplates` (`email_id`, `email_title`, `email_fromname`, `email_plaintext`, `email_disabled`, `email_content`) VALUES
(1, 'New User Registered (Welcome Email)', 'RealFood', 'false', 0, '[{\"message\":\"<!doctype html>\\r\\n<html xmlns=\\\"http:\\/\\/www.w3.org\\/1999\\/xhtml\\\" xmlns:v=\\\"urn:schemas-microsoft-com:vml\\\" xmlns:o=\\\"urn:schemas-microsoft-com:office:office\\\">\\r\\n\\r\\n<head>\\r\\n<title>\\r\\n\\r\\n<\\/title>\\r\\n<!--[if !mso]> -->\\r\\n<meta http-equiv=\\\"X-UA-Compatible\\\" content=\\\"IE=edge\\\">\\r\\n<!--<![endif]-->\\r\\n<meta http-equiv=\\\"Content-Type\\\" content=\\\"text\\/html; charset=UTF-8\\\">\\r\\n<meta name=\\\"viewport\\\" content=\\\"width=device-width, initial-scale=1\\\">\\r\\n<style type=\\\"text\\/css\\\">\\r\\n#outlook a {\\r\\npadding: 0;\\r\\n}\\r\\n\\r\\n.ReadMsgBody {\\r\\nwidth: 100%;\\r\\n}\\r\\n\\r\\n.ExternalClass {\\r\\nwidth: 100%;\\r\\n}\\r\\n\\r\\n.ExternalClass * {\\r\\nline-height: 100%;\\r\\n}\\r\\n\\r\\nbody {\\r\\nmargin: 0;\\r\\npadding: 0;\\r\\n-webkit-text-size-adjust: 100%;\\r\\n-ms-text-size-adjust: 100%;\\r\\n}\\r\\n\\r\\ntable,\\r\\ntd {\\r\\nborder-collapse: collapse;\\r\\nmso-table-lspace: 0pt;\\r\\nmso-table-rspace: 0pt;\\r\\n}\\r\\n\\r\\nimg {\\r\\nborder: 0;\\r\\nheight: auto;\\r\\nline-height: 100%;\\r\\noutline: none;\\r\\ntext-decoration: none;\\r\\n-ms-interpolation-mode: bicubic;\\r\\n}\\r\\n\\r\\np {\\r\\ndisplay: block;\\r\\nmargin: 13px 0;\\r\\n}\\r\\n<\\/style>\\r\\n<!--[if !mso]><!-->\\r\\n<style type=\\\"text\\/css\\\">\\r\\n@media only screen and (max-width:480px) {\\r\\n@-ms-viewport {\\r\\nwidth: 320px;\\r\\n}\\r\\n@viewport {\\r\\nwidth: 320px;\\r\\n}\\r\\n}\\r\\n<\\/style>\\r\\n<!--<![endif]-->\\r\\n<!--[if mso]>\\r\\n<xml>\\r\\n<o:OfficeDocumentSettings>\\r\\n<o:AllowPNG\\/>\\r\\n<o:PixelsPerInch>96<\\/o:PixelsPerInch>\\r\\n<\\/o:OfficeDocumentSettings>\\r\\n<\\/xml>\\r\\n<![endif]-->\\r\\n<!--[if lte mso 11]>\\r\\n<style type=\\\"text\\/css\\\">\\r\\n.outlook-group-fix { width:100% !important; }\\r\\n<\\/style>\\r\\n<![endif]-->\\r\\n\\r\\n\\r\\n<style type=\\\"text\\/css\\\">\\r\\n@media only screen and (min-width:480px) {\\r\\n.mj-column-per-100 {\\r\\nwidth: 100% !important;\\r\\n}\\r\\n}\\r\\n<\\/style>\\r\\n\\r\\n\\r\\n<style type=\\\"text\\/css\\\">\\r\\n<\\/style>\\r\\n\\r\\n<\\/head>\\r\\n\\r\\n<body style=\\\"background-color:#f9f9f9;\\\">\\r\\n<p><!-- [if !mso]> --> <!--<![endif]--> <!-- [if !mso]><!--><!--<![endif]--> <!-- [if mso]>\\r\\n<xml>\\r\\n<o:OfficeDocumentSettings>\\r\\n<o:AllowPNG\\/>\\r\\n<o:PixelsPerInch>96<\\/o:PixelsPerInch>\\r\\n<\\/o:OfficeDocumentSettings>\\r\\n<\\/xml>\\r\\n<![endif]--> <!-- [if lte mso 11]>\\r\\n<style type=\\\"text\\/css\\\">\\r\\n.outlook-group-fix { width:100% !important; }\\r\\n<\\/style>\\r\\n<![endif]--><\\/p>\\r\\n<div style=\\\"background-color: #f9f9f9;\\\"><!-- [if mso | IE]>\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #f9f9f9; background-color: #f9f9f9; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #f9f9f9; background-color: #f9f9f9; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border-bottom: #333957 solid 5px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #fff; background-color: #fff; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #fff; background-color: #fff; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: #dddddd solid 1px; border-top: 0px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table style=\\\"vertical-align: bottom;\\\" role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: collapse; border-spacing: 0px;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"width: 130px;\\\"><img style=\\\"border: 0; display: block; outline: none; text-decoration: none; width: 100%;\\\" src=\\\"{LOGO_URL}\\\" width=\\\"130\\\" height=\\\"auto\\\" \\/><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-bottom: 40px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 1; text-align: center; color: #555;\\\">Welcome!<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\">Hello {USER_NAME}!<\\/div>\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\"><br \\/>Thank you for signing up. We\'re really happy to have you! Click the link below to login to your account:<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-top: 30px; padding-bottom: 50px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: separate; line-height: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: none; border-radius: 3px; color: #ffffff; cursor: auto; padding: 15px 25px;\\\" role=\\\"presentation\\\" align=\\\"center\\\" valign=\\\"middle\\\" bgcolor=\\\"#333333\\\"><a style=\\\"background: #333333; color: #ffffff; font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 15px; font-weight: normal; line-height: 120%; margin: 0; text-decoration: none; text-transform: none;\\\" href=\\\"{SIGNIN_URL}\\\"> Login to Your Account <\\/a><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 14px; line-height: 20px; text-align: left; color: #525252;\\\">Cheers,<br \\/><a style=\\\"color: #2f67f6;\\\" href=\\\"{SITE_DOMAIN}\\\">{SITE_NAME}<\\/a><\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"vertical-align: bottom; padding: 0;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 0; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 12px; font-weight: 300; line-height: 1; text-align: center; color: #575757;\\\">{SITE_NAME}<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n<![endif]--><\\/div>\\r\\n<\\/body>\\r\\n\\r\\n<\\/html>\",\"subject\":\"Welcome to {SITE_NAME}\"}]'),
(2, 'Forgot Password - Reset Link', 'RealFood', 'false', 0, '[{\"message\":\"<!DOCTYPE html>\\r\\n<html>\\r\\n<head>\\r\\n<\\/head>\\r\\n<body>\\r\\n<p><!-- [if !mso]> --> <!--<![endif]--> <!-- [if !mso]><!--><!--<![endif]--> <!-- [if mso]>\\r\\n<xml>\\r\\n<o:OfficeDocumentSettings>\\r\\n<o:AllowPNG\\/>\\r\\n<o:PixelsPerInch>96<\\/o:PixelsPerInch>\\r\\n<\\/o:OfficeDocumentSettings>\\r\\n<\\/xml>\\r\\n<![endif]--> <!-- [if lte mso 11]>\\r\\n<style type=\\\"text\\/css\\\">\\r\\n.outlook-group-fix { width:100% !important; }\\r\\n<\\/style>\\r\\n<![endif]--><\\/p>\\r\\n<div style=\\\"background-color: #f9f9f9;\\\"><!-- [if mso | IE]>\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #f9f9f9; background-color: #f9f9f9; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #f9f9f9; background-color: #f9f9f9; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border-bottom: #333957 solid 5px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #fff; background-color: #fff; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #fff; background-color: #fff; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: #dddddd solid 1px; border-top: 0px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table style=\\\"vertical-align: bottom;\\\" role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: collapse; border-spacing: 0px;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"width: 130px;\\\"><img style=\\\"border: 0; display: block; outline: none; text-decoration: none; width: 100%;\\\" src=\\\"{LOGO_URL}\\\" width=\\\"130\\\" height=\\\"auto\\\" \\/><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-bottom: 40px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 1; text-align: center; color: #555;\\\">Reset Password<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\">Hi {USER_NAME},<br \\/><br \\/>We received a request to reset your password. Use the button below to set up a new password for your account.<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-top: 30px; padding-bottom: 50px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: separate; line-height: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: none; border-radius: 3px; color: #ffffff; cursor: auto; padding: 15px 25px;\\\" role=\\\"presentation\\\" align=\\\"center\\\" valign=\\\"middle\\\" bgcolor=\\\"#333333\\\"><a style=\\\"background: #333333; color: #ffffff; font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 15px; font-weight: normal; line-height: 120%; margin: 0; text-decoration: none; text-transform: none;\\\" href=\\\"{RESET_URL}\\\"> Reset Password<\\/a><\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; text-decoration: underline; font-size: 16px; line-height: 22px; text-align: center; color: #555;\\\">This link will be valid for the next 24 hours.<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\">If you did not make this request, just ignore this email.<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 14px; line-height: 20px; text-align: left; color: #525252;\\\">Cheers,<br \\/><a style=\\\"color: #2f67f6;\\\" href=\\\"{SITE_DOMAIN}\\\">{SITE_NAME}<\\/a><\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"vertical-align: bottom; padding: 0;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 0; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 12px; font-weight: 300; line-height: 1; text-align: center; color: #575757;\\\">{SITE_NAME}<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n<![endif]--><\\/div>\\r\\n<\\/body>\\r\\n<\\/html>\",\"subject\":\"Notification\"},{\"lang\":\"ar\",\"message\":\"<!DOCTYPE html>\\r\\n<html>\\r\\n<head>\\r\\n<\\/head>\\r\\n<body>\\r\\n<p><!-- [if !mso]> --> <!--<![endif]--> <!-- [if !mso]><!--><!--<![endif]--> <!-- [if mso]>\\r\\n<xml>\\r\\n<o:OfficeDocumentSettings>\\r\\n<o:AllowPNG\\/>\\r\\n<o:PixelsPerInch>96<\\/o:PixelsPerInch>\\r\\n<\\/o:OfficeDocumentSettings>\\r\\n<\\/xml>\\r\\n<![endif]--> <!-- [if lte mso 11]>\\r\\n<style type=\\\"text\\/css\\\">\\r\\n.outlook-group-fix { width:100% !important; }\\r\\n<\\/style>\\r\\n<![endif]--><\\/p>\\r\\n<div style=\\\"background-color: #f9f9f9;\\\"><!-- [if mso | IE]>\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #f9f9f9; background-color: #f9f9f9; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #f9f9f9; background-color: #f9f9f9; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border-bottom: #F44336 solid 5px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #fff; background-color: #fff; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #fff; background-color: #fff; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: #dddddd solid 1px; border-top: 0px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table style=\\\"vertical-align: bottom;\\\" role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: collapse; border-spacing: 0px;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"width: 160px;\\\"><img style=\\\"border: 0; display: block; outline: none; text-decoration: none; width: 100%;\\\" src=\\\"{LOGO_URL}\\\" width=\\\"160\\\" height=\\\"auto\\\" \\/><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-bottom: 40px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 1; text-align: center; color: #555;\\\">\\u062a\\u0639\\u064a\\u064a\\u0646 \\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0645\\u0631\\u0648\\u0631<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\">\\u0645\\u0631\\u062d\\u0628\\u0627 {USER_NAME},<br \\/><br \\/>\\u0644\\u0642\\u062f \\u062a\\u0644\\u0642\\u064a\\u0646\\u0627 \\u0637\\u0644\\u0628\\u064b\\u0627 \\u0644\\u0625\\u0639\\u0627\\u062f\\u0629 \\u062a\\u0639\\u064a\\u064a\\u0646 \\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0645\\u0631\\u0648\\u0631 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0643. \\u0627\\u0633\\u062a\\u062e\\u062f\\u0645 \\u0627\\u0644\\u0632\\u0631 \\u0623\\u062f\\u0646\\u0627\\u0647 \\u0644\\u0625\\u0639\\u062f\\u0627\\u062f \\u0643\\u0644\\u0645\\u0629 \\u0645\\u0631\\u0648\\u0631 \\u062c\\u062f\\u064a\\u062f\\u0629 \\u0644\\u062d\\u0633\\u0627\\u0628\\u0643.<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-top: 30px; padding-bottom: 50px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: separate; line-height: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: none; border-radius: 3px; color: #ffffff; cursor: auto; padding: 15px 25px;\\\" role=\\\"presentation\\\" align=\\\"center\\\" valign=\\\"middle\\\" bgcolor=\\\"#F44336\\\"><a style=\\\"background: #F44336; color: #ffffff; font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 15px; font-weight: normal; line-height: 120%; margin: 0; text-decoration: none; text-transform: none;\\\" href=\\\"{RESET_URL}\\\"> \\u0625\\u0639\\u0627\\u062f\\u0629 \\u062a\\u0639\\u064a\\u064a\\u0646 \\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0645\\u0631\\u0648\\u0631 \\u0627\\u0644\\u0622\\u0646<\\/a><\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; text-decoration: underline; font-size: 16px; line-height: 22px; text-align: center; color: #555;\\\">\\u0633\\u064a\\u0643\\u0648\\u0646 \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0631\\u0627\\u0628\\u0637 \\u0635\\u0627\\u0644\\u062d\\u064b\\u0627 \\u0644\\u0645\\u062f\\u0629 24 \\u0633\\u0627\\u0639\\u0629 \\u0627\\u0644\\u0642\\u0627\\u062f\\u0645\\u0629.<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\">\\u0625\\u0630\\u0627 \\u0644\\u0645 \\u062a\\u0643\\u0646 \\u0642\\u062f \\u0642\\u062f\\u0645\\u062a \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u060c \\u0641\\u062a\\u062c\\u0627\\u0647\\u0644 \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0641\\u0642\\u0637.<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 14px; line-height: 20px; text-align: left; color: #525252;\\\">\\u0645\\u0639 \\u062a\\u062d\\u064a\\u0627\\u062a\\u064a,<br \\/><a style=\\\"color: #525252;\\\" href=\\\"{SITE_DOMAIN}\\\">{SITE_NAME}<\\/a><\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"vertical-align: bottom; padding: 0;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 0; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 12px; font-weight: 300; line-height: 1; text-align: center; color: #575757;\\\">{SITE_NAME}<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n<![endif]--><\\/div>\\r\\n<\\/body>\\r\\n<\\/html>\",\"subject\":\"\\u0625\\u0634\\u0639\\u0627\\u0631\"},{\"lang\":\"es\",\"message\":\"<!DOCTYPE html>\\r\\n<html>\\r\\n<head>\\r\\n<\\/head>\\r\\n<body>\\r\\n<p><!-- [if !mso]> --> <!--<![endif]--> <!-- [if !mso]><!--><!--<![endif]--> <!-- [if mso]>\\r\\n<xml>\\r\\n<o:OfficeDocumentSettings>\\r\\n<o:AllowPNG\\/>\\r\\n<o:PixelsPerInch>96<\\/o:PixelsPerInch>\\r\\n<\\/o:OfficeDocumentSettings>\\r\\n<\\/xml>\\r\\n<![endif]--> <!-- [if lte mso 11]>\\r\\n<style type=\\\"text\\/css\\\">\\r\\n.outlook-group-fix { width:100% !important; }\\r\\n<\\/style>\\r\\n<![endif]--><\\/p>\\r\\n<div style=\\\"background-color: #f9f9f9;\\\"><!-- [if mso | IE]>\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #f9f9f9; background-color: #f9f9f9; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #f9f9f9; background-color: #f9f9f9; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border-bottom: #F44336 solid 5px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #fff; background-color: #fff; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #fff; background-color: #fff; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: #dddddd solid 1px; border-top: 0px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table style=\\\"vertical-align: bottom;\\\" role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: collapse; border-spacing: 0px;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"width: 160px;\\\"><img style=\\\"border: 0; display: block; outline: none; text-decoration: none; width: 100%;\\\" src=\\\"{LOGO_URL}\\\" width=\\\"160\\\" height=\\\"auto\\\" \\/><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-bottom: 40px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 1; text-align: center; color: #555;\\\">Restablecer Contrase&ntilde;a<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\">Hola {USER_NAME},<br \\/><br \\/>Recibimos una solicitud para restablecer su contrase&ntilde;a. Utilice el bot&oacute;n de abajo para configurar una nueva contrase&ntilde;a para su cuenta.<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-top: 30px; padding-bottom: 50px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: separate; line-height: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: none; border-radius: 3px; color: #ffffff; cursor: auto; padding: 15px 25px;\\\" role=\\\"presentation\\\" align=\\\"center\\\" valign=\\\"middle\\\" bgcolor=\\\"#F44336\\\"><a style=\\\"background: #F44336; color: #ffffff; font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 15px; font-weight: normal; line-height: 120%; margin: 0; text-decoration: none; text-transform: none;\\\" href=\\\"{RESET_URL}\\\"> Restablecer Ahora<\\/a><\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; text-decoration: underline; font-size: 16px; line-height: 22px; text-align: center; color: #555;\\\">Este enlace ser&aacute; v&aacute;lido durante las pr&oacute;ximas 24 horas.<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\">Si no realiz&oacute; esta solicitud, simplemente ignore este correo electr&oacute;nico.<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 14px; line-height: 20px; text-align: left; color: #525252;\\\">Saludos,<br \\/><a style=\\\"color: #525252;\\\" href=\\\"{SITE_DOMAIN}\\\">{SITE_NAME}<\\/a><\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"vertical-align: bottom; padding: 0;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 0; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 12px; font-weight: 300; line-height: 1; text-align: center; color: #575757;\\\">{SITE_NAME}<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n<![endif]--><\\/div>\\r\\n<\\/body>\\r\\n<\\/html>\",\"subject\":\"Notificaci\\u00f3n\"}]');
INSERT INTO `emailtemplates` (`email_id`, `email_title`, `email_fromname`, `email_plaintext`, `email_disabled`, `email_content`) VALUES
(3, 'Password Reset - Confirmation', 'RealFood', 'false', 0, '[{\"message\":\"<!DOCTYPE html>\\r\\n<html>\\r\\n<head>\\r\\n<\\/head>\\r\\n<body>\\r\\n<p><!-- [if !mso]> --> <!--<![endif]--> <!-- [if !mso]><!--><!--<![endif]--> <!-- [if mso]>\\r\\n<xml>\\r\\n<o:OfficeDocumentSettings>\\r\\n<o:AllowPNG\\/>\\r\\n<o:PixelsPerInch>96<\\/o:PixelsPerInch>\\r\\n<\\/o:OfficeDocumentSettings>\\r\\n<\\/xml>\\r\\n<![endif]--> <!-- [if lte mso 11]>\\r\\n<style type=\\\"text\\/css\\\">\\r\\n.outlook-group-fix { width:100% !important; }\\r\\n<\\/style>\\r\\n<![endif]--><\\/p>\\r\\n<div style=\\\"background-color: #f9f9f9;\\\"><!-- [if mso | IE]>\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #f9f9f9; background-color: #f9f9f9; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #f9f9f9; background-color: #f9f9f9; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border-bottom: #F44336 solid 5px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #fff; background-color: #fff; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #fff; background-color: #fff; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: #dddddd solid 1px; border-top: 0px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table style=\\\"vertical-align: bottom;\\\" role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: collapse; border-spacing: 0px;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"width: 160px;\\\"><img style=\\\"border: 0; display: block; outline: none; text-decoration: none; width: 100%;\\\" src=\\\"{LOGO_URL}\\\" width=\\\"160\\\" height=\\\"auto\\\" \\/><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-bottom: 40px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 1; text-align: center; color: #555;\\\">Password Changed!<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\">Hi {USER_NAME},<br \\/><br \\/>Your password has been changed. <br \\/><br \\/>Didn&rsquo;t change your password? <a style=\\\"color: #2f67f6;\\\" href=\\\"{SITE_DOMAIN}\\\">Contact Support<\\/a> so we can make sure no one else is trying to access your account.<br \\/><br \\/>Use the button below to return to the login page:<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-top: 30px; padding-bottom: 50px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: separate; line-height: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: none; border-radius: 3px; color: #ffffff; cursor: auto; padding: 15px 25px;\\\" role=\\\"presentation\\\" align=\\\"center\\\" valign=\\\"middle\\\" bgcolor=\\\"#F44336\\\"><a style=\\\"background: #F44336; color: #ffffff; font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 15px; font-weight: normal; line-height: 120%; margin: 0; text-decoration: none; text-transform: none;\\\" href=\\\"{SIGNIN_URL}\\\"> Login to Your Account<\\/a><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 14px; line-height: 20px; text-align: left; color: #525252;\\\">Cheers,<br \\/><a style=\\\"color: #525252;\\\" href=\\\"{SITE_DOMAIN}\\\">{SITE_NAME}<\\/a><\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"vertical-align: bottom; padding: 0;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 0; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 12px; font-weight: 300; line-height: 1; text-align: center; color: #575757;\\\">{SITE_NAME}<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n<![endif]--><\\/div>\\r\\n<\\/body>\\r\\n<\\/html>\",\"subject\":\"Notification\"},{\"lang\":\"ar\",\"message\":\"<!DOCTYPE html>\\r\\n<html>\\r\\n<head>\\r\\n<\\/head>\\r\\n<body>\\r\\n<p><!-- [if !mso]> --> <!--<![endif]--> <!-- [if !mso]><!--><!--<![endif]--> <!-- [if mso]>\\r\\n<xml>\\r\\n<o:OfficeDocumentSettings>\\r\\n<o:AllowPNG\\/>\\r\\n<o:PixelsPerInch>96<\\/o:PixelsPerInch>\\r\\n<\\/o:OfficeDocumentSettings>\\r\\n<\\/xml>\\r\\n<![endif]--> <!-- [if lte mso 11]>\\r\\n<style type=\\\"text\\/css\\\">\\r\\n.outlook-group-fix { width:100% !important; }\\r\\n<\\/style>\\r\\n<![endif]--><\\/p>\\r\\n<div style=\\\"background-color: #f9f9f9;\\\"><!-- [if mso | IE]>\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #f9f9f9; background-color: #f9f9f9; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #f9f9f9; background-color: #f9f9f9; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border-bottom: #F44336 solid 5px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #fff; background-color: #fff; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #fff; background-color: #fff; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: #dddddd solid 1px; border-top: 0px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table style=\\\"vertical-align: bottom;\\\" role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: collapse; border-spacing: 0px;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"width: 160px;\\\"><img style=\\\"border: 0; display: block; outline: none; text-decoration: none; width: 100%;\\\" src=\\\"{LOGO_URL}\\\" width=\\\"160\\\" height=\\\"auto\\\" \\/><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-bottom: 40px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 1; text-align: center; color: #555;\\\">\\u062a\\u0645 \\u062a\\u063a\\u064a\\u064a\\u0631 \\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0633\\u0631!<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\"><span style=\\\"color: #555555; font-family: Helvetica Neue, Arial, sans-serif;\\\"><span style=\\\"font-size: 16px;\\\">\\u0645\\u0631\\u062d\\u0628\\u0627 {USER_NAME},<\\/span><\\/span><br \\/><br \\/><span style=\\\"color: #555555; font-family: Helvetica Neue, Arial, sans-serif;\\\"><span style=\\\"font-size: 16px;\\\">\\u062a\\u0645 \\u062a\\u063a\\u064a\\u064a\\u0631 \\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0633\\u0631 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0643.<\\/span><\\/span><\\/div>\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\"><br \\/><span style=\\\"color: #555555; font-family: Helvetica Neue, Arial, sans-serif;\\\"><span style=\\\"font-size: 16px;\\\">\\u0644\\u0645 \\u062a\\u063a\\u064a\\u0631 \\u0643\\u0644\\u0645\\u0629 \\u0645\\u0631\\u0648\\u0631\\u0643\\u061f <a href=\\\"{SITE_DOMAIN}\\\" target=\\\"_blank\\\" rel=\\\"noopener\\\">\\u0627\\u062a\\u0635\\u0644 \\u0628\\u0627\\u0644\\u062f\\u0639\\u0645<\\/a> \\u062d\\u062a\\u0649 \\u0646\\u062a\\u0645\\u0643\\u0646 \\u0645\\u0646 \\u0627\\u0644\\u062a\\u0623\\u0643\\u062f \\u0645\\u0646 \\u0639\\u062f\\u0645 \\u0645\\u062d\\u0627\\u0648\\u0644\\u0629 \\u0623\\u064a \\u0634\\u062e\\u0635 \\u0622\\u062e\\u0631 \\u0627\\u0644\\u0648\\u0635\\u0648\\u0644 \\u0625\\u0644\\u0649 \\u062d\\u0633\\u0627\\u0628\\u0643.<\\/span><\\/span><br \\/><br \\/><span style=\\\"color: #555555; font-family: Helvetica Neue, Arial, sans-serif;\\\"><span style=\\\"font-size: 16px;\\\">\\u0627\\u0633\\u062a\\u062e\\u062f\\u0645 \\u0627\\u0644\\u0632\\u0631 \\u0623\\u062f\\u0646\\u0627\\u0647 \\u0644\\u0644\\u0639\\u0648\\u062f\\u0629 \\u0625\\u0644\\u0649 \\u0635\\u0641\\u062d\\u0629 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u062f\\u062e\\u0648\\u0644:<\\/span><\\/span><\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-top: 30px; padding-bottom: 50px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: separate; line-height: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: none; border-radius: 3px; color: #ffffff; cursor: auto; padding: 15px 25px;\\\" role=\\\"presentation\\\" align=\\\"center\\\" valign=\\\"middle\\\" bgcolor=\\\"#F44336\\\"><a style=\\\"background: #F44336; color: #ffffff; font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 15px; font-weight: normal; line-height: 120%; margin: 0; text-decoration: none; text-transform: none;\\\" href=\\\"{SIGNIN_URL}\\\"> \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u062f\\u062e\\u0648\\u0644<\\/a><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 14px; line-height: 20px; text-align: left; color: #525252;\\\">\\u0645\\u0639 \\u062a\\u062d\\u064a\\u0627\\u062a\\u064a,<br \\/><a style=\\\"color: #525252;\\\" href=\\\"{SITE_DOMAIN}\\\">{SITE_NAME}<\\/a><\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"vertical-align: bottom; padding: 0;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 0; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 12px; font-weight: 300; line-height: 1; text-align: center; color: #575757;\\\">{SITE_NAME}<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n<![endif]--><\\/div>\\r\\n<\\/body>\\r\\n<\\/html>\",\"subject\":\"\\u0625\\u0634\\u0639\\u0627\\u0631\"},{\"lang\":\"es\",\"message\":\"<!DOCTYPE html>\\r\\n<html>\\r\\n<head>\\r\\n<\\/head>\\r\\n<body>\\r\\n<p><!-- [if !mso]> --> <!--<![endif]--> <!-- [if !mso]><!--><!--<![endif]--> <!-- [if mso]>\\r\\n<xml>\\r\\n<o:OfficeDocumentSettings>\\r\\n<o:AllowPNG\\/>\\r\\n<o:PixelsPerInch>96<\\/o:PixelsPerInch>\\r\\n<\\/o:OfficeDocumentSettings>\\r\\n<\\/xml>\\r\\n<![endif]--> <!-- [if lte mso 11]>\\r\\n<style type=\\\"text\\/css\\\">\\r\\n.outlook-group-fix { width:100% !important; }\\r\\n<\\/style>\\r\\n<![endif]--><\\/p>\\r\\n<div style=\\\"background-color: #f9f9f9;\\\"><!-- [if mso | IE]>\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #f9f9f9; background-color: #f9f9f9; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #f9f9f9; background-color: #f9f9f9; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border-bottom: #F44336 solid 5px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"background: #fff; background-color: #fff; margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"background: #fff; background-color: #fff; width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: #dddddd solid 1px; border-top: 0px; direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table style=\\\"vertical-align: bottom;\\\" role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: collapse; border-spacing: 0px;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"width: 160px;\\\"><img style=\\\"border: 0; display: block; outline: none; text-decoration: none; width: 100%;\\\" src=\\\"{LOGO_URL}\\\" width=\\\"160\\\" height=\\\"auto\\\" \\/><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-bottom: 40px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 1; text-align: center; color: #555;\\\">&iexcl;Contrase&ntilde;a Cambiada!<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 16px; line-height: 22px; text-align: left; color: #555;\\\"><span style=\\\"color: #555555; font-family: Helvetica Neue, Arial, sans-serif;\\\"><span style=\\\"font-size: 16px;\\\">Hola {USER_NAME},<\\/span><\\/span><br \\/><br \\/><span style=\\\"color: #555555; font-family: Helvetica Neue, Arial, sans-serif;\\\"><span style=\\\"font-size: 16px;\\\">Tu contrase&ntilde;a ha sido cambiada. <\\/span><\\/span><br \\/><br \\/><span style=\\\"color: #555555; font-family: Helvetica Neue, Arial, sans-serif;\\\"><span style=\\\"font-size: 16px;\\\">&iquest;No cambiaste tu contrase&ntilde;a? <a href=\\\"{SITE_DOMAIN}\\\" target=\\\"_blank\\\" rel=\\\"noopener\\\">Comun&iacute;quese con Soporte<\\/a> para que podamos asegurarnos de que nadie m&aacute;s intente acceder a su cuenta.<\\/span><\\/span><br \\/><br \\/><span style=\\\"color: #555555; font-family: Helvetica Neue, Arial, sans-serif;\\\"><span style=\\\"font-size: 16px;\\\">Utilice el bot&oacute;n de abajo para volver a la p&aacute;gina de inicio de sesi&oacute;n:<\\/span><\\/span><\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; padding-top: 30px; padding-bottom: 50px; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<table style=\\\"border-collapse: separate; line-height: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"border: none; border-radius: 3px; color: #ffffff; cursor: auto; padding: 15px 25px;\\\" role=\\\"presentation\\\" align=\\\"center\\\" valign=\\\"middle\\\" bgcolor=\\\"#F44336\\\"><a style=\\\"background: #F44336; color: #ffffff; font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 15px; font-weight: normal; line-height: 120%; margin: 0; text-decoration: none; text-transform: none;\\\" href=\\\"{SIGNIN_URL}\\\"> Ingrese a su cuenta<\\/a><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 10px 25px; word-break: break-word;\\\" align=\\\"left\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 14px; line-height: 20px; text-align: left; color: #525252;\\\">Saludos,<br \\/><a style=\\\"color: #525252;\\\" href=\\\"{SITE_DOMAIN}\\\">{SITE_NAME}<\\/a><\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n\\r\\n<table\\r\\nalign=\\\"center\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:600px;\\\" width=\\\"600\\\"\\r\\n>\\r\\n<tr>\\r\\n<td style=\\\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\\\">\\r\\n<![endif]-->\\r\\n<div style=\\\"margin: 0px auto; max-width: 600px;\\\">\\r\\n<table style=\\\"width: 100%;\\\" role=\\\"presentation\\\" border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" align=\\\"center\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"direction: ltr; font-size: 0px; padding: 20px 0; text-align: center; vertical-align: top;\\\"><!-- [if mso | IE]>\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\">\\r\\n\\r\\n<tr>\\r\\n\\r\\n<td\\r\\nstyle=\\\"vertical-align:bottom;width:600px;\\\"\\r\\n>\\r\\n<![endif]-->\\r\\n<div class=\\\"mj-column-per-100 outlook-group-fix\\\" style=\\\"font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: bottom; width: 100%;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"vertical-align: bottom; padding: 0;\\\">\\r\\n<table role=\\\"presentation\\\" border=\\\"0\\\" width=\\\"100%\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"font-size: 0px; padding: 0; word-break: break-word;\\\" align=\\\"center\\\">\\r\\n<div style=\\\"font-family: \'Helvetica Neue\',Arial,sans-serif; font-size: 12px; font-weight: 300; line-height: 1; text-align: center; color: #575757;\\\">{SITE_NAME}<\\/div>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n\\r\\n<\\/tr>\\r\\n\\r\\n<\\/table>\\r\\n<![endif]--><\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n<!-- [if mso | IE]>\\r\\n<\\/td>\\r\\n<\\/tr>\\r\\n<\\/table>\\r\\n<![endif]--><\\/div>\\r\\n<\\/body>\\r\\n<\\/html>\",\"subject\":\"Notificaci\\u00f3n\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `user` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rating` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `menu_header` tinyint(1) DEFAULT 0,
  `menu_footer` tinyint(1) DEFAULT 0,
  `menu_sidebar` tinyint(1) DEFAULT 0,
  `menu_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_name`, `menu_header`, `menu_footer`, `menu_sidebar`, `menu_status`) VALUES
(1, 'Header', 1, NULL, NULL, 1),
(2, 'Footer', NULL, 1, NULL, 1),
(3, 'Sidebar', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `navigations`
--

CREATE TABLE `navigations` (
  `navigation_id` int(11) NOT NULL,
  `navigation_order` int(11) NOT NULL,
  `navigation_url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navigation_label` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navigation_target` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `navigation_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `navigation_page` int(11) DEFAULT NULL,
  `navigation_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `navigations`
--

INSERT INTO `navigations` (`navigation_id`, `navigation_order`, `navigation_url`, `navigation_label`, `navigation_target`, `navigation_type`, `navigation_page`, `navigation_menu`) VALUES
(1, 1, '/', 'Home', '_self', 'custom', NULL, 1),
(2, 2, NULL, NULL, '_self', 'page', 2, 1),
(3, 3, NULL, NULL, '_self', 'page', 6, 1),
(4, 4, NULL, NULL, '_self', 'page', 7, 1),
(5, 5, NULL, NULL, '_self', 'page', 2, 3),
(6, 6, NULL, NULL, '_self', 'page', 6, 3),
(7, 7, NULL, NULL, '_self', 'page', 7, 3),
(8, 8, '/', 'Home', '_self', 'custom', NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `page_content` text COLLATE utf8_unicode_ci NOT NULL,
  `page_status` tinyint(1) NOT NULL DEFAULT 1,
  `page_private` tinyint(1) NOT NULL DEFAULT 0,
  `page_footer` tinyint(1) NOT NULL DEFAULT 1,
  `page_ad_header` tinyint(1) NOT NULL DEFAULT 0,
  `page_ad_footer` tinyint(1) NOT NULL DEFAULT 0,
  `page_ad_sidebar` tinyint(1) NOT NULL DEFAULT 0,
  `page_template` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'blank',
  `page_slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `page_seotitle` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `page_seodescription` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `pages`
--

INSERT INTO `pages` (`page_id`, `page_title`, `page_content`, `page_status`, `page_private`, `page_footer`, `page_ad_header`, `page_ad_footer`, `page_ad_sidebar`, `page_template`, `page_slug`, `page_seotitle`, `page_seodescription`) VALUES
(1, 'Terms and Conditions', '<h4>What is Lorem Ipsum?</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<h4>Why do we use it?</h4>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.</p>\r\n<p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, 0, 1, 0, 0, 0, 'terms', 'terms-and-conditions', '', ''),
(2, 'Search', '', 1, 0, 1, 0, 0, 0, 'search', 'search', '', ''),
(5, 'Privacy Policy', '<h4>What is Lorem Ipsum?</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<h4>Why do we use it?</h4>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.</p>\r\n<p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, 0, 1, 0, 0, 0, 'privacy', 'privacy-policy', '', ''),
(6, 'Categories', '<p>Test</p>', 1, 0, 1, 0, 0, 0, 'categories', 'categories', '', ''),
(7, 'Stores', '', 1, 0, 1, 0, 0, 0, 'stores', 'stores', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `item` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rating` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '5',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Editor'),
(3, 'Subscriber');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `st_dateformat` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'd/m/Y',
  `st_timezone` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'UTC',
  `st_currency` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '$',
  `st_langdir` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ltr',
  `st_currencyposition` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'left',
  `st_decimalseparator` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '.',
  `st_decimalnumber` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '2',
  `st_facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_instagram` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_linkedin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_whatsapp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_defaultsearchpage` int(11) DEFAULT NULL,
  `st_defaultprivacypage` int(11) DEFAULT NULL,
  `st_defaulttermspage` int(11) DEFAULT NULL,
  `st_defaultcategoriespage` int(11) DEFAULT NULL,
  `st_defaultstorespage` int(11) DEFAULT NULL,
  `st_defaultlocationspage` int(11) DEFAULT NULL,
  `st_maintenance` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `st_analytics` text COLLATE utf8_unicode_ci NOT NULL,
  `st_recipientemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `st_smtphost` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `st_smtpemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `st_smtppassword` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `st_smtpencrypt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `st_smtpport` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `st_recaptchakey` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `st_recaptchasecretkey` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `st_dateformat`, `st_timezone`, `st_currency`, `st_langdir`, `st_currencyposition`, `st_decimalseparator`, `st_decimalnumber`, `st_facebook`, `st_twitter`, `st_youtube`, `st_instagram`, `st_linkedin`, `st_whatsapp`, `st_defaultsearchpage`, `st_defaultprivacypage`, `st_defaulttermspage`, `st_defaultcategoriespage`, `st_defaultstorespage`, `st_defaultlocationspage`, `st_maintenance`, `st_analytics`, `st_recipientemail`, `st_smtphost`, `st_smtpemail`, `st_smtppassword`, `st_smtpencrypt`, `st_smtpport`, `st_recaptchakey`, `st_recaptchasecretkey`) VALUES
(1, 'd-m-Y', 'Europe/Madrid', '€', 'ltr', 'left', '.', '2', 'https://www.facebook.com/', 'https://twitter.com/home', 'https://www.youtube.com/', '', 'https://www.linkedin.com/', '', 2, 5, 1, 6, 7, 0, 0, '', '-', '-', '-', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(11) NOT NULL,
  `slider_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_link`, `slider_image`, `slider_status`) VALUES
(1, '#', 'slider_1635351790.jpg', 1),
(2, '#', 'slider_1635352051.jpg', 1),
(3, '#', 'slider_1635353238.jpg', 1),
(4, '#', 'slider_1635355362.jpg', 1),
(5, '#', 'slider_1635355430.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stores`
--

CREATE TABLE `stores` (
  `store_id` int(11) NOT NULL,
  `store_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `store_seotitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `store_description` text COLLATE utf8_unicode_ci NOT NULL,
  `store_seodescription` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `store_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `store_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `store_featured` tinyint(1) NOT NULL DEFAULT 0,
  `store_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `stores`
--

INSERT INTO `stores` (`store_id`, `store_title`, `store_seotitle`, `store_description`, `store_seodescription`, `store_slug`, `store_image`, `store_featured`, `store_status`) VALUES
(2, 'Zara', 'ZARA Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'zara', 'store_1634758549.jpg', 1, 1),
(3, 'H&M', 'H&M Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'h-m', 'store_1634758611.jpg', 1, 1),
(4, 'Zalando', 'ZALANDO Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'zalando', 'store_1634759402.jpg', 1, 1),
(5, 'Starbucks', 'STARBUCKS Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'starbucks', 'store_1635440790.png', 1, 1),
(6, 'McDONALD\'s', 'MC DONALDS Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'mcdonald-s', 'store_1635440840.png', 1, 1),
(7, 'Burger King', 'BURGER KING Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'burger-king', 'store_1635440859.png', 1, 1),
(8, 'KFC', 'KFC Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'kfc', 'store_1635440879.png', 1, 1),
(9, 'Amazon', 'AMAZON Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'amazon', 'store_1635440915.jpg', 1, 1),
(10, 'Walmart', 'WALMART Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'walmart', 'store_1635548475.jpg', 1, 1),
(11, 'Papa John\'s', 'PAPA JOHNS Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'papa-john-s', 'store_1635548584.jpg', 1, 1),
(12, 'Puma', 'PUMA Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'puma', 'store_1636038441.jpg', 1, 1),
(13, 'Ebay', 'EBAY Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'ebay', 'store_1636038813.jpg', 1, 1),
(14, 'Nike', 'NIKE Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'nike', 'store_1636012738.jpg', 1, 1),
(15, 'Udemy', 'UDEMY Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'udemy', 'store_1636012768.jpg', 1, 1),
(16, 'Uber Eats', 'UBER EATS Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'uber-eats', 'store_1636012794.jpg', 1, 1),
(17, 'Glovo', 'GLOVO Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'glovo', 'store_1636012819.jpg', 1, 1),
(18, 'Apple', 'APPLE Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'apple', 'store_1636038549.jpg', 1, 1),
(19, 'AliExpress', 'ALIEXPRESS Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'aliexpress', 'store_1636038721.jpg', 1, 1),
(20, 'SubWay', 'SUBWAY Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'subway', 'store_1636038946.jpg', 1, 1),
(21, 'Pizza Hut', 'PIZZA HUT Coupon Codes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', 'pizza-hut', 'store_1636038971.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategories`
--

CREATE TABLE `subcategories` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subcategory_parent` int(11) NOT NULL,
  `subcategory_seotitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subcategory_description` text COLLATE utf8_unicode_ci NOT NULL,
  `subcategory_seodescription` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `subcategory_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subcategory_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `subcategories`
--

INSERT INTO `subcategories` (`subcategory_id`, `subcategory_title`, `subcategory_parent`, `subcategory_seotitle`, `subcategory_description`, `subcategory_seodescription`, `subcategory_slug`, `subcategory_status`) VALUES
(1, 'Face & Skin', 3, NULL, 'Face & Skin Deals & Coupons', '', 'face-skin', 1),
(2, 'Massages', 3, NULL, 'Massages Deals & Coupons', '', 'massages', 1),
(3, 'Hair Removal', 3, NULL, 'Hair Removal Deals & Coupons', '', 'hair-removal', 1),
(4, 'Cosmetic Procedures', 3, NULL, 'Cosmetic Procedures Deals & Coupons', '', 'cosmetic-procedures', 1),
(5, 'Auto Repair & Maintenance', 7, NULL, 'Auto Repair & Maintenance Deals & Coupons', '', 'auto-repair-maintenance', 1),
(6, 'Auto Cleaning', 7, NULL, 'Auto Cleaning Deals & Coupons', '', 'auto-cleaning', 1),
(7, 'Personalized Gifts', 6, NULL, 'Personalized Gifts Deals & Coupons', '', 'personalized-gifts', 1),
(8, 'Clothing & Accessories', 6, NULL, 'Clothing & Accessories Deals & Coupons', '', 'clothing-accessories', 1),
(9, 'Flowers, Sweets & Baskets', 6, NULL, 'Flowers, Sweets & Baskets Deals & Coupons', '', 'flowers-sweets-baskets', 1),
(10, 'Restaurants', 5, NULL, 'Restaurants Deals & Coupons', '', 'restaurants', 1),
(11, 'Cafes & Treats', 5, NULL, 'Cafes & Treats Deals & Coupons', '', 'cafes-treats', 1),
(12, 'Groceries & Markets', 5, NULL, 'Groceries & Markets Deals & Coupons', '', 'groceries-markets', 1),
(13, 'Gyms', 4, NULL, 'Gyms Deals & Coupons', '', 'gyms', 1),
(14, 'Medical', 4, NULL, 'Medical Deals & Coupons', '', 'medical', 1),
(15, 'Dental', 4, NULL, 'Dental Deals & Coupons', '', 'dental', 1),
(16, 'Kids Activities', 2, NULL, 'Kids Activities Deals & Coupons', '', 'kids-activities', 1),
(17, 'Tickets & Events', 2, NULL, 'Tickets & Events Deals & Coupons', '', 'tickets-events', 1),
(18, 'Sports & Outdoors', 2, NULL, 'Sports & Outdoors Deals & Coupons', '', 'sports-outdoors', 1),
(19, 'Nightlife', 2, NULL, 'Nightlife Deals & Coupons', '', 'nightlife', 1),
(20, 'International & Tours', 1, NULL, 'International & Tours Deals & Coupons', '', 'international-tours', 1),
(21, 'Romantic Getaways', 1, NULL, 'Romantic Getaways Deals & Coupons', '', 'romantic-getaways', 1),
(22, 'Rental Car', 1, NULL, 'Rental Car Deals & Coupons', '', 'rental-car', 1),
(23, 'Beach', 1, NULL, 'Beach Deals & Coupons', '', 'beach', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscribers`
--

CREATE TABLE `subscribers` (
  `subscriber_id` int(11) NOT NULL,
  `subscriber_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subscriber_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `subscribers`
--

INSERT INTO `subscribers` (`subscriber_id`, `subscriber_email`, `subscriber_date`) VALUES
(1, 'support@wicombit.com', '2021-11-02 20:34:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `th_mobilestyle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `th_headerstyle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `th_homestyle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `th_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `th_whitelogo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `th_favicon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `th_homebg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `th_testimonial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `th_primarycolor` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#f26522',
  `th_secondarycolor` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#0d215a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `theme`
--

INSERT INTO `theme` (`id`, `th_mobilestyle`, `th_headerstyle`, `th_homestyle`, `th_logo`, `th_whitelogo`, `th_favicon`, `th_homebg`, `th_testimonial`, `th_primarycolor`, `th_secondarycolor`) VALUES
(1, 'style1', 'header3', 'home1', '1634864155.png', '1634864096.png', '1634866642.png', '1634924462.jpg', '', '#5f27cd', '#484848');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tokens`
--

CREATE TABLE `tokens` (
  `token_email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `token_key` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `token_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `translations`
--

CREATE TABLE `translations` (
  `id` int(11) NOT NULL,
  `tr_maintenancepage` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_maintenancetitle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_maintenancesub` text COLLATE utf8_unicode_ci NOT NULL,
  `tr_profilepage` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tr_signinpage` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tr_signuppage` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tr_resetpage` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tr_forgotpage` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tr_termsandconds` text COLLATE utf8_unicode_ci NOT NULL,
  `tr_aboutus` text COLLATE utf8_unicode_ci NOT NULL,
  `tr_eptitle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_epsubtitle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_eptagline` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `tr_epbutton` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tr_1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_6` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_7` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_8` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_9` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_10` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_11` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_12` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_13` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_14` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_15` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_16` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_17` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_18` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_19` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_20` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_21` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_22` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_23` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_24` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_25` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_26` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_27` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_28` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_29` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_30` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_31` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tr_32` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tr_33` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_34` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_35` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_36` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_37` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_38` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_39` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tr_40` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_41` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_42` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_43` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_44` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_45` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_46` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_47` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_48` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_49` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_50` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_51` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_52` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_79` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_80` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_81` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_82` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_83` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_84` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_85` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_86` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_87` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_88` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_89` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_90` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_91` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_92` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_93` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_94` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_95` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_96` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_97` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_98` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_99` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_100` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_101` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_102` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_103` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_104` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_105` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_106` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_107` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_108` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_109` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_110` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_111` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_112` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_113` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_114` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_115` text COLLATE utf8_unicode_ci NOT NULL,
  `tr_116` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_117` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_118` text COLLATE utf8_unicode_ci NOT NULL,
  `tr_119` text COLLATE utf8_unicode_ci NOT NULL,
  `tr_120` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_121` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_122` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_123` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_124` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_125` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_126` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_127` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_128` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_129` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_130` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_131` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_132` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_133` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_134` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_135` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_136` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_137` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_138` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_139` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_140` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_141` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_142` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_143` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_144` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_145` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_146` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_147` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_148` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_149` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_150` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_151` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_152` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_153` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_154` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_155` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_156` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_157` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_158` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_159` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_160` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_161` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_162` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_163` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_164` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_165` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_166` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_167` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_168` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_169` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_170` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_171` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_172` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_173` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_174` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_175` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_176` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_177` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_178` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_179` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_180` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_181` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_182` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_183` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_184` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_185` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_186` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_187` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_188` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_189` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_190` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_191` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_192` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_193` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_194` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_195` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_196` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_197` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_198` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_199` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_200` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_201` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_202` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_203` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_204` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_205` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_206` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_207` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_208` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_209` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_210` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_211` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_212` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_213` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_214` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_215` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_216` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_217` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_218` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_219` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `tr_220` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `translations`
--

INSERT INTO `translations` (`id`, `tr_maintenancepage`, `tr_maintenancetitle`, `tr_maintenancesub`, `tr_profilepage`, `tr_signinpage`, `tr_signuppage`, `tr_resetpage`, `tr_forgotpage`, `tr_termsandconds`, `tr_aboutus`, `tr_eptitle`, `tr_epsubtitle`, `tr_eptagline`, `tr_epbutton`, `tr_1`, `tr_2`, `tr_3`, `tr_4`, `tr_5`, `tr_6`, `tr_7`, `tr_8`, `tr_9`, `tr_10`, `tr_11`, `tr_12`, `tr_13`, `tr_14`, `tr_15`, `tr_16`, `tr_17`, `tr_18`, `tr_19`, `tr_20`, `tr_21`, `tr_22`, `tr_23`, `tr_24`, `tr_25`, `tr_26`, `tr_27`, `tr_28`, `tr_29`, `tr_30`, `tr_31`, `tr_32`, `tr_33`, `tr_34`, `tr_35`, `tr_36`, `tr_37`, `tr_38`, `tr_39`, `tr_40`, `tr_41`, `tr_42`, `tr_43`, `tr_44`, `tr_45`, `tr_46`, `tr_47`, `tr_48`, `tr_49`, `tr_50`, `tr_51`, `tr_52`, `tr_79`, `tr_80`, `tr_81`, `tr_82`, `tr_83`, `tr_84`, `tr_85`, `tr_86`, `tr_87`, `tr_88`, `tr_89`, `tr_90`, `tr_91`, `tr_92`, `tr_93`, `tr_94`, `tr_95`, `tr_96`, `tr_97`, `tr_98`, `tr_99`, `tr_100`, `tr_101`, `tr_102`, `tr_103`, `tr_104`, `tr_105`, `tr_106`, `tr_107`, `tr_108`, `tr_109`, `tr_110`, `tr_111`, `tr_112`, `tr_113`, `tr_114`, `tr_115`, `tr_116`, `tr_117`, `tr_118`, `tr_119`, `tr_120`, `tr_121`, `tr_122`, `tr_123`, `tr_124`, `tr_125`, `tr_126`, `tr_127`, `tr_128`, `tr_129`, `tr_130`, `tr_131`, `tr_132`, `tr_133`, `tr_134`, `tr_135`, `tr_136`, `tr_137`, `tr_138`, `tr_139`, `tr_140`, `tr_141`, `tr_142`, `tr_143`, `tr_144`, `tr_145`, `tr_146`, `tr_147`, `tr_148`, `tr_149`, `tr_150`, `tr_151`, `tr_152`, `tr_153`, `tr_154`, `tr_155`, `tr_156`, `tr_157`, `tr_158`, `tr_159`, `tr_160`, `tr_161`, `tr_162`, `tr_163`, `tr_164`, `tr_165`, `tr_166`, `tr_167`, `tr_168`, `tr_169`, `tr_170`, `tr_171`, `tr_172`, `tr_173`, `tr_174`, `tr_175`, `tr_176`, `tr_177`, `tr_178`, `tr_179`, `tr_180`, `tr_181`, `tr_182`, `tr_183`, `tr_184`, `tr_185`, `tr_186`, `tr_187`, `tr_188`, `tr_189`, `tr_190`, `tr_191`, `tr_192`, `tr_193`, `tr_194`, `tr_195`, `tr_196`, `tr_197`, `tr_198`, `tr_199`, `tr_200`, `tr_201`, `tr_202`, `tr_203`, `tr_204`, `tr_205`, `tr_206`, `tr_207`, `tr_208`, `tr_209`, `tr_210`, `tr_211`, `tr_212`, `tr_213`, `tr_214`, `tr_215`, `tr_216`, `tr_217`, `tr_218`, `tr_219`, `tr_220`) VALUES
(1, 'Under Maintenance', 'Website Under Maintenance', 'Sorry for the inconvenience but we’re performing some maintenance at the moment.', 'Profile', 'Sign In', 'Sign Up', 'Reset Password', 'Forgot Password', '<p><strong>Terms &amp; Conditions</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Why do we use it?</strong></p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p><strong>About Us</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Why do we use it?</strong></p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '404', 'Page Not Found', 'The page you are looking for might have been removed had it\'s name changed or is temporarily unavailable.', 'Home Page', 'Couponza | Coupons & Discounts Php Script', 'deals,coupons,discounts,offers', 'Shop Today\'s Trending Deals and Save Big', 'Search Offers...', 'Sign In', 'Featured Coupons', 'Shop Today\'s Trending Coupon and Save Big', 'Over 20 000+ Coupons. Grab one now!', '% Off', 'View Profile', 'Featured Categories', 'Exclusive Coupons', 'Latest Coupons', 'Featured', 'Verified Account', 'Exclusive', 'Hours Left', 'Minutes Left', 'Featured Locations', 'New', 'View All', 'Get Code', 'Copy and paste this code at', 'Expire:', 'Status:', 'Verified', 'Not Verified', 'Facebook', 'Twitter', 'Tumblr', 'Pinterest', 'WhatsApp', 'Telegram', 'Featured Stores', 'Total Coupons', 'Sale Ends', 'Sorry, the offer you\'re looking for is no longer available. Try other great offers below!', 'Hurry Up, End Soon!', 'Buy Now', 'About Us', 'An About Us page helps your company make a good first impression, and is critical for building custo', 'Quick Links', 'Get In Touch', 'Newsletter', 'Suscribe Now', 'Email Address', '© 2022 Couponza | Coupons & Discounts', 'Sign In', 'Review(s)', 'Share This Coupon', 'Customer Reviews', 'Page', 'Write Review', 'No Reviews Found', 'Verified', 'See All Reviews', 'Load More...', 'Brand', 'Store', 'Search', 'Copy', 'Top Rated', 'Tip: No code needed!', 'Filter', 'Coupon Codes', 'About Me', 'Sort By', 'Home', 'No Items Found', 'Results', 'Relevance', 'Continue to Store', 'Details', 'Rating', 'Pending', 'Default', 'Date', 'View', 'Image', 'Title', 'Status', 'Actions', 'Nothing found!', 'Modify your search criteria and try again.', 'Page', 'Remove', 'Choose Image', 'Submit a Deal', 'Rate', 'See All', 'Ratings with an average of', 'out of 5 stars', 'Copied!', 'Days', 'Hours', 'Minutes', 'Seconds', 'You must be logged in to post a rating', 'Your Review', 'Post Review', 'Submit', 'Your review has been submitted and awaiting moderation.', 'You have already submitted a rating.', 'Categories', 'Locations', 'Rating', 'Avatar', 'Choose Image', 'All', 'Price', 'Search...', 'Stores', 'Name', 'Phone', 'Message', 'I Agree to the', 'Send Message', 'Sign In', 'Email', 'Password', 'Don\'t you have an account?', 'Forgot Password?', 'Sign Up', 'Enter', 'Sign Up', 'Name', 'Already have an account?', 'Sign In', 'I Agree to the', 'Reset Password', 'Back to Sign In', 'Email is Empty', 'Name is Empty', 'Password is Empty', 'Captcha Check Failed', 'Minimum Name Length 3', 'Email is Invalid', 'Password Length 8-32', 'Account Already Registered', 'No User Found', 'Password Reset Email Sent', 'Something Wrong', 'Message is empty', 'Message Has Been Sent', 'Name is Invalid', 'Account Disabled or Not Found', 'You must accept the Legal Notice', 'Incorrect Email or Password', 'Your password has been reset', 'Password does not match', 'You have requested too many password resets.', 'Member Since', 'Admin Area', 'Edit Profile', 'Sign Out', 'My Favorites', 'No Favorites Found', 'New Password', 'Confirm Password', 'Save Changes', 'Cancel', 'Please wait...', 'You have successfully subscribed', 'Your profile was successfully updated', 'Please fill all required fields', 'Only JPG, JPEG, & PNG files are allowed to upload.', 'Image size exceeds 2MB', 'Global Rating', 'All Categories', 'All Stores', 'All Locations', 'Explore', 'Exclusive Coupons', 'Verified Coupons', 'This website uses cookies to ensure you get the best experience on our website.', 'Learn more', 'Got it!', 'Did it work?', 'Yes', 'No', 'Thanks for your feedback', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(1, 'Under Maintenance', 'Website Under Maintenance', 'Sorry for the inconvenience but we’re performing some maintenance at the moment.', 'Profile', 'Sign In', 'Sign Up', 'Reset Password', 'Forgot Password', '<p><strong>Terms &amp; Conditions</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Why do we use it?</strong></p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p><strong>About Us</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Why do we use it?</strong></p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '404', 'Page Not Found', 'The page you are looking for might have been removed had it\'s name changed or is temporarily unavailable.', 'Home Page', 'Couponza | Coupons & Discounts Php Script', 'deals,coupons,discounts,offers', 'Shop Today\'s Trending Deals and Save Big', 'Search Offers...', 'Sign In', 'Featured Coupons', 'Shop Today\'s Trending Coupon and Save Big', 'Over 20 000+ Coupons. Grab one now!', '% Off', 'View Profile', 'Featured Categories', 'Exclusive Coupons', 'Latest Coupons', 'Featured', 'Verified Account', 'Exclusive', 'Hours Left', 'Minutes Left', 'Featured Locations', 'New', 'View All', 'Get Code', 'Copy and paste this code at', 'Expire:', 'Status:', 'Verified', 'Not Verified', 'Facebook', 'Twitter', 'Tumblr', 'Pinterest', 'WhatsApp', 'Telegram', 'Featured Stores', 'Total Coupons', 'Sale Ends', 'Sorry, the offer you\'re looking for is no longer available. Try other great offers below!', 'Hurry Up, End Soon!', 'Buy Now', 'About Us', 'An About Us page helps your company make a good first impression, and is critical for building custo', 'Quick Links', 'Get In Touch', 'Newsletter', 'Suscribe Now', 'Email Address', '© 2022 Couponza | Coupons & Discounts', 'Sign In', 'Review(s)', 'Share This Coupon', 'Customer Reviews', 'Page', 'Write Review', 'No Reviews Found', 'Verified', 'See All Reviews', 'Load More...', 'Brand', 'Store', 'Search', 'Copy', 'Top Rated', 'Tip: No code needed!', 'Filter', 'Coupon Codes', 'About Me', 'Sort By', 'Home', 'No Items Found', 'Results', 'Relevance', 'Continue to Store', 'Details', 'Rating', 'Pending', 'Default', 'Date', 'View', 'Image', 'Title', 'Status', 'Actions', 'Nothing found!', 'Modify your search criteria and try again.', 'Page', 'Remove', 'Choose Image', 'Submit a Deal', 'Rate', 'See All', 'Ratings with an average of', 'out of 5 stars', 'Copied!', 'Days', 'Hours', 'Minutes', 'Seconds', 'You must be logged in to post a rating', 'Your Review', 'Post Review', 'Submit', 'Your review has been submitted and awaiting moderation.', 'You have already submitted a rating.', 'Categories', 'Locations', 'Rating', 'Avatar', 'Choose Image', 'All', 'Price', 'Search...', 'Stores', 'Name', 'Phone', 'Message', 'I Agree to the', 'Send Message', 'Sign In', 'Email', 'Password', 'Don\'t you have an account?', 'Forgot Password?', 'Sign Up', 'Enter', 'Sign Up', 'Name', 'Already have an account?', 'Sign In', 'I Agree to the', 'Reset Password', 'Back to Sign In', 'Email is Empty', 'Name is Empty', 'Password is Empty', 'Captcha Check Failed', 'Minimum Name Length 3', 'Email is Invalid', 'Password Length 8-32', 'Account Already Registered', 'No User Found', 'Password Reset Email Sent', 'Something Wrong', 'Message is empty', 'Message Has Been Sent', 'Name is Invalid', 'Account Disabled or Not Found', 'You must accept the Legal Notice', 'Incorrect Email or Password', 'Your password has been reset', 'Password does not match', 'You have requested too many password resets.', 'Member Since', 'Admin Area', 'Edit Profile', 'Sign Out', 'My Favorites', 'No Favorites Found', 'New Password', 'Confirm Password', 'Save Changes', 'Cancel', 'Please wait...', 'You have successfully subscribed', 'Your profile was successfully updated', 'Please fill all required fields', 'Only JPG, JPEG, & PNG files are allowed to upload.', 'Image size exceeds 2MB', 'Global Rating', 'All Categories', 'All Stores', 'All Locations', 'Explore', 'Exclusive Coupons', 'Verified Coupons', 'This website uses cookies to ensure you get the best experience on our website.', 'Learn more', 'Got it!', 'Did it work?', 'Yes', 'No', 'Thanks for your feedback', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'avatar.png',
  `user_status` tinyint(1) NOT NULL DEFAULT 1,
  `user_verified` tinyint(1) NOT NULL DEFAULT 0,
  `user_pro` tinyint(1) NOT NULL DEFAULT 0,
  `user_role` int(11) NOT NULL DEFAULT 3,
  `user_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_description`, `user_avatar`, `user_status`, `user_verified`, `user_pro`, `user_role`, `user_updated`, `user_created`) VALUES
(1, 'Wicombit', 'admin@admin.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'avatar.png', 1, 1, 0, 1, '2021-11-06 15:22:39', '2021-04-06 04:16:58'),
(2, 'User', 'user@user.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', NULL, 'avatar.png', 1, 0, 0, 2, '2021-12-16 09:41:04', '2021-12-16 09:41:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indices de la tabla `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`) USING BTREE,
  ADD UNIQUE KEY `recipe_slug` (`coupon_slug`) USING BTREE;

--
-- Indices de la tabla `emailtemplates`
--
ALTER TABLE `emailtemplates`
  ADD PRIMARY KEY (`email_id`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indices de la tabla `navigations`
--
ALTER TABLE `navigations`
  ADD PRIMARY KEY (`navigation_id`);

--
-- Indices de la tabla `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`),
  ADD UNIQUE KEY `page_slug` (`page_slug`);

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`) USING BTREE;

--
-- Indices de la tabla `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`store_id`) USING BTREE;

--
-- Indices de la tabla `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indices de la tabla `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`subscriber_id`),
  ADD UNIQUE KEY `subscriber_email` (`subscriber_email`);

--
-- Indices de la tabla `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ads`
--
ALTER TABLE `ads`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `emailtemplates`
--
ALTER TABLE `emailtemplates`
  MODIFY `email_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `navigations`
--
ALTER TABLE `navigations`
  MODIFY `navigation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `stores`
--
ALTER TABLE `stores`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `subscriber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
