-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2017 at 03:25 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comfort_packaging_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `acl_phinxlog`
--

DROP TABLE IF EXISTS `acl_phinxlog`;
CREATE TABLE `acl_phinxlog` (
  `version` bigint(20) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acl_phinxlog`
--

INSERT INTO `acl_phinxlog` (`version`, `start_time`, `end_time`) VALUES
(20141229162641, '2016-01-07 18:56:40', '2016-01-07 18:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
CREATE TABLE `acos` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 312),
(2, 1, NULL, NULL, 'Groups', 2, 15),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 2, NULL, NULL, 'isAuthorized', 13, 14),
(9, 1, NULL, NULL, 'Main', 16, 25),
(10, 9, NULL, NULL, 'index', 17, 18),
(11, 9, NULL, NULL, 'filter', 19, 20),
(12, 9, NULL, NULL, 'isAuthorized', 21, 22),
(13, 9, NULL, NULL, 'cell', 23, 24),
(14, 1, NULL, NULL, 'Users', 26, 47),
(15, 14, NULL, NULL, 'index', 27, 28),
(16, 14, NULL, NULL, 'dashboard', 29, 30),
(17, 14, NULL, NULL, 'view', 31, 32),
(18, 14, NULL, NULL, 'add', 33, 34),
(19, 14, NULL, NULL, 'edit', 35, 36),
(20, 14, NULL, NULL, 'delete', 37, 38),
(21, 14, NULL, NULL, 'login', 39, 40),
(22, 14, NULL, NULL, 'logout', 41, 42),
(23, 14, NULL, NULL, 'isAuthorized', 43, 44),
(24, 1, NULL, NULL, 'Acl', 48, 49),
(25, 1, NULL, NULL, 'Bake', 50, 51),
(26, 1, NULL, NULL, 'DebugKit', 52, 67),
(27, 26, NULL, NULL, 'Panels', 53, 58),
(28, 27, NULL, NULL, 'index', 54, 55),
(29, 27, NULL, NULL, 'view', 56, 57),
(30, 26, NULL, NULL, 'Requests', 59, 62),
(31, 30, NULL, NULL, 'view', 60, 61),
(32, 26, NULL, NULL, 'Toolbar', 63, 66),
(33, 32, NULL, NULL, 'clearCache', 64, 65),
(34, 1, NULL, NULL, 'Migrations', 68, 69),
(35, 1, NULL, NULL, 'Pages', 70, 93),
(36, 35, NULL, NULL, 'index', 71, 72),
(37, 35, NULL, NULL, 'view', 73, 74),
(38, 35, NULL, NULL, 'add', 75, 76),
(39, 35, NULL, NULL, 'edit', 77, 78),
(40, 35, NULL, NULL, 'delete', 79, 80),
(41, 35, NULL, NULL, 'isAuthorized', 81, 82),
(42, 1, NULL, NULL, 'Slides', 94, 109),
(43, 42, NULL, NULL, 'index', 95, 96),
(44, 42, NULL, NULL, 'view', 97, 98),
(45, 42, NULL, NULL, 'add', 99, 100),
(46, 42, NULL, NULL, 'edit', 101, 102),
(47, 42, NULL, NULL, 'delete', 103, 104),
(48, 42, NULL, NULL, 'isAuthorized', 105, 106),
(50, 42, NULL, NULL, 'updatePublish', 107, 108),
(51, 1, NULL, NULL, 'UserEntities', 110, 131),
(52, 51, NULL, NULL, 'index', 111, 112),
(53, 51, NULL, NULL, 'view', 113, 114),
(54, 51, NULL, NULL, 'add', 115, 116),
(55, 51, NULL, NULL, 'edit', 117, 118),
(56, 51, NULL, NULL, 'delete', 119, 120),
(57, 51, NULL, NULL, 'isAuthorized', 121, 122),
(79, 1, NULL, NULL, 'Clients', 132, 145),
(80, 79, NULL, NULL, 'index', 133, 134),
(81, 79, NULL, NULL, 'view', 135, 136),
(82, 79, NULL, NULL, 'add', 137, 138),
(83, 79, NULL, NULL, 'edit', 139, 140),
(84, 79, NULL, NULL, 'delete', 141, 142),
(85, 79, NULL, NULL, 'isAuthorized', 143, 144),
(88, 35, NULL, NULL, 'frontview', 83, 84),
(89, 35, NULL, NULL, 'ajax_email_inquiry', 85, 86),
(90, 35, NULL, NULL, 'ajax_email_newsletter', 87, 88),
(91, 35, NULL, NULL, 'contact_us', 89, 90),
(95, 1, NULL, NULL, 'Profile', 146, 155),
(96, 95, NULL, NULL, 'index', 147, 148),
(97, 95, NULL, NULL, 'isAuthorized', 149, 150),
(99, 95, NULL, NULL, 'change_password', 151, 152),
(140, 35, NULL, NULL, 'updatePublish', 91, 92),
(141, 1, NULL, NULL, 'EndUserOrder', 156, 169),
(142, 141, NULL, NULL, 'index', 157, 158),
(143, 141, NULL, NULL, 'view', 159, 160),
(144, 141, NULL, NULL, 'add', 161, 162),
(145, 141, NULL, NULL, 'edit', 163, 164),
(146, 141, NULL, NULL, 'delete', 165, 166),
(147, 141, NULL, NULL, 'isAuthorized', 167, 168),
(148, 1, NULL, NULL, 'Invoice', 170, 189),
(149, 148, NULL, NULL, 'index', 171, 172),
(150, 148, NULL, NULL, 'client', 173, 174),
(151, 148, NULL, NULL, 'view', 175, 176),
(152, 148, NULL, NULL, 'view_client', 177, 178),
(153, 148, NULL, NULL, 'add', 179, 180),
(154, 148, NULL, NULL, 'edit', 181, 182),
(155, 148, NULL, NULL, 'delete', 183, 184),
(156, 148, NULL, NULL, 'payment', 185, 186),
(157, 148, NULL, NULL, 'isAuthorized', 187, 188),
(158, 1, NULL, NULL, 'InvoiceDetails', 190, 203),
(159, 158, NULL, NULL, 'index', 191, 192),
(160, 158, NULL, NULL, 'view', 193, 194),
(161, 158, NULL, NULL, 'add', 195, 196),
(162, 158, NULL, NULL, 'edit', 197, 198),
(163, 158, NULL, NULL, 'delete', 199, 200),
(164, 158, NULL, NULL, 'isAuthorized', 201, 202),
(165, 95, NULL, NULL, 'edit', 153, 154),
(166, 1, NULL, NULL, 'Shipments', 204, 227),
(167, 166, NULL, NULL, 'index', 205, 206),
(168, 166, NULL, NULL, 'client', 207, 208),
(169, 166, NULL, NULL, 'view', 209, 210),
(170, 166, NULL, NULL, 'client_view', 211, 212),
(171, 166, NULL, NULL, 'add', 213, 214),
(172, 166, NULL, NULL, 'client_add', 215, 216),
(173, 166, NULL, NULL, 'edit', 217, 218),
(174, 166, NULL, NULL, 'client_edit', 219, 220),
(175, 166, NULL, NULL, 'delete', 221, 222),
(176, 166, NULL, NULL, 'isAuthorized', 223, 224),
(177, 1, NULL, NULL, 'ShipmentStatus', 228, 241),
(178, 177, NULL, NULL, 'index', 229, 230),
(179, 177, NULL, NULL, 'view', 231, 232),
(180, 177, NULL, NULL, 'add', 233, 234),
(181, 177, NULL, NULL, 'edit', 235, 236),
(182, 177, NULL, NULL, 'delete', 237, 238),
(183, 177, NULL, NULL, 'isAuthorized', 239, 240),
(184, 1, NULL, NULL, 'ShippingCarriers', 242, 255),
(185, 184, NULL, NULL, 'index', 243, 244),
(186, 184, NULL, NULL, 'view', 245, 246),
(187, 184, NULL, NULL, 'add', 247, 248),
(188, 184, NULL, NULL, 'edit', 249, 250),
(189, 184, NULL, NULL, 'delete', 251, 252),
(190, 184, NULL, NULL, 'isAuthorized', 253, 254),
(191, 1, NULL, NULL, 'ShippingPurposes', 256, 269),
(192, 191, NULL, NULL, 'index', 257, 258),
(193, 191, NULL, NULL, 'view', 259, 260),
(194, 191, NULL, NULL, 'add', 261, 262),
(195, 191, NULL, NULL, 'edit', 263, 264),
(196, 191, NULL, NULL, 'delete', 265, 266),
(197, 191, NULL, NULL, 'isAuthorized', 267, 268),
(198, 1, NULL, NULL, 'ShippingServices', 270, 283),
(199, 198, NULL, NULL, 'index', 271, 272),
(200, 198, NULL, NULL, 'view', 273, 274),
(201, 198, NULL, NULL, 'add', 275, 276),
(202, 198, NULL, NULL, 'edit', 277, 278),
(203, 198, NULL, NULL, 'delete', 279, 280),
(204, 198, NULL, NULL, 'isAuthorized', 281, 282),
(205, 51, NULL, NULL, 'employees', 123, 124),
(206, 51, NULL, NULL, 'view_employee', 125, 126),
(207, 51, NULL, NULL, 'add_employee', 127, 128),
(208, 51, NULL, NULL, 'edit_employee', 129, 130),
(209, 14, NULL, NULL, 'user_dashboard', 45, 46),
(210, 1, NULL, NULL, 'Inventory', 284, 297),
(211, 210, NULL, NULL, 'index', 285, 286),
(212, 210, NULL, NULL, 'view', 287, 288),
(213, 210, NULL, NULL, 'add', 289, 290),
(214, 210, NULL, NULL, 'edit', 291, 292),
(215, 210, NULL, NULL, 'delete', 293, 294),
(216, 210, NULL, NULL, 'isAuthorized', 295, 296),
(217, 166, NULL, NULL, 'send_to_inventory', 225, 226),
(232, 1, NULL, NULL, 'InventoryOrder', 298, 311),
(233, 232, NULL, NULL, 'index', 299, 300),
(234, 232, NULL, NULL, 'view', 301, 302),
(235, 232, NULL, NULL, 'add', 303, 304),
(236, 232, NULL, NULL, 'edit', 305, 306),
(237, 232, NULL, NULL, 'delete', 307, 308),
(238, 232, NULL, NULL, 'isAuthorized', 309, 310);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
CREATE TABLE `aros` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Groups', 1, NULL, 1, 6),
(2, NULL, 'Groups', 2, NULL, 7, 8),
(3, 1, 'Users', 1, NULL, 2, 3),
(4, NULL, 'Groups', 3, NULL, 9, 10),
(5, NULL, 'Groups', 4, NULL, 11, 12),
(22, 1, 'Users', 17, NULL, 4, 5),
(25, NULL, 'Groups', 2, NULL, 13, 18),
(26, NULL, 'Groups', 3, NULL, 19, 30),
(27, NULL, 'Groups', 4, NULL, 31, 44),
(28, 25, 'Users', 2, NULL, 14, 15),
(29, 26, 'Users', 3, NULL, 20, 21),
(30, 27, 'Users', 4, NULL, 32, 33),
(31, 27, 'Users', 5, NULL, 34, 35),
(32, 27, 'Users', 6, NULL, 36, 37),
(33, 26, 'Users', 7, NULL, 22, 23),
(34, 26, 'Users', 8, NULL, 24, 25),
(35, 26, 'Users', 9, NULL, 26, 27),
(36, 27, 'Users', 10, NULL, 38, 39),
(37, 27, 'Users', 11, NULL, 40, 41),
(38, 27, 'Users', 12, NULL, 42, 43),
(39, 25, 'Users', 13, NULL, 16, 17),
(40, 26, 'Users', 14, NULL, 28, 29);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE `aros_acos` (
  `id` int(11) NOT NULL,
  `aro_id` int(11) NOT NULL,
  `aco_id` int(11) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `photo` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(2) DEFAULT '0',
  `is_password_changed` tinyint(2) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `firstname`, `middlename`, `lastname`, `email`, `contact_no`, `address`, `photo`, `is_active`, `is_password_changed`, `created`, `modified`) VALUES
(1, 5, 'Sample Client AZ', 'Sample Client A', 'Sample Client A', 'clienta@gmail.com', '12345', 'Sample Address', NULL, 1, 0, '2016-12-29 21:01:26', '2016-12-29 21:13:46'),
(2, 6, 'Sample Client B', 'Sample Client B', 'Sample Client B', 'clientb@gmail.com', '1345', 'Sample Address', NULL, 1, 0, '2016-12-29 21:02:05', '2016-12-29 21:02:05'),
(3, 11, 'Client B', 'Client B', 'Client B', 'clientd@gmail.com', '12345', 'Test Address', NULL, 1, 0, '2017-01-03 06:14:19', '2017-01-03 06:14:19'),
(4, 12, 'client_sample', 'client', 'client', 'client@comfortpackaging.com', '1231231231', 'this is a sample address', NULL, 1, 0, '2017-01-05 14:30:24', '2017-01-05 14:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `end_user_order`
--

DROP TABLE IF EXISTS `end_user_order`;
CREATE TABLE `end_user_order` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `shipping_service_id` int(11) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `end_user_order`
--

INSERT INTO `end_user_order` (`id`, `client_id`, `name`, `address`, `shipping_service_id`, `comments`) VALUES
(2, 1, 'Sample bryan', '254 San Vicente', 1, 'this is a sample comments '),
(3, 4, 'client 1234', 'This is my address', 3, 'this is a sample comment');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(180) CHARACTER SET latin1 NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Master Admin', '2016-01-08 03:01:24', '2016-07-24 19:53:52'),
(2, 'Manager', '2016-12-29 20:30:24', '2016-12-29 20:30:24'),
(3, 'Employee', '2016-12-29 20:30:32', '2016-12-29 20:30:32'),
(4, 'Client', '2016-12-29 20:30:37', '2016-12-29 20:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `sent_quantity` int(11) NOT NULL,
  `remaining_quantity` int(11) NOT NULL,
  `last_sent_order_date` varchar(50) NOT NULL,
  `last_sent_order_quantity` int(11) NOT NULL,
  `last_sent_destination` varchar(190) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `client_id`, `shipment_id`, `sent_quantity`, `remaining_quantity`, `last_sent_order_date`, `last_sent_order_quantity`, `last_sent_destination`, `created`, `modified`) VALUES
(4, 4, 13, 10, 0, '2017-01-11 18:56:55', 5, '11', '2017-01-11 14:38:58', '2017-01-11 18:56:55'),
(5, 4, 14, 50, 0, '2017-01-11 19:18:56', 16, 'test12', '2017-01-11 18:59:05', '2017-01-11 19:18:56'),
(6, 4, 15, 5, 0, '2017-01-11 19:18:48', 5, 'aaa', '2017-01-11 19:14:10', '2017-01-11 19:18:48'),
(7, 27, 18, 123, 123, '', 0, '', '2017-01-12 16:24:19', '2017-01-12 16:24:19'),
(8, 4, 19, 321, 0, '2017-01-12 16:36:09', 321, 'test34', '2017-01-12 16:29:59', '2017-01-12 16:36:09'),
(9, 4, 20, 50, 50, '', 0, '', '2017-01-13 09:44:04', '2017-01-13 09:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_order`
--

DROP TABLE IF EXISTS `inventory_order`;
CREATE TABLE `inventory_order` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `order_number` varchar(100) NOT NULL,
  `order_destination` text NOT NULL,
  `order_quantity` float NOT NULL,
  `date_created` date NOT NULL,
  `shipping_carrier_id` int(11) NOT NULL,
  `shipping_service_id` int(11) NOT NULL,
  `combine_inventory_order_id` int(11) DEFAULT NULL,
  `combine_comment` text,
  `order_status` varchar(50) NOT NULL,
  `date_sent` date NOT NULL,
  `total_remaining` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_order`
--

INSERT INTO `inventory_order` (`id`, `client_id`, `shipment_id`, `order_number`, `order_destination`, `order_quantity`, `date_created`, `shipping_carrier_id`, `shipping_service_id`, `combine_inventory_order_id`, `combine_comment`, `order_status`, `date_sent`, `total_remaining`) VALUES
(1, 4, 13, '1212', '121', 5, '2017-01-11', 1, 1, NULL, 'aa', 'Completed', '2017-01-11', 111),
(3, 4, 13, '11', '11', 5, '2017-01-11', 1, 1, 1, '11', 'Completed', '2017-01-11', 11),
(4, 4, 14, '1234', 'Manila', 24, '2017-01-11', 1, 1, 1, '', 'Completed', '2017-01-11', 25),
(5, 4, 14, '111', 'Makati', 10, '2017-01-11', 1, 1, 1, '', 'Completed', '2017-01-11', 0),
(6, 4, 14, '1234', 'test12', 16, '2017-01-11', 1, 1, 1, '', 'Completed', '2017-01-11', 0),
(7, 4, 15, '222', 'aaa', 5, '2017-01-11', 1, 1, 1, 'aa', 'Completed', '2017-01-11', 0),
(8, 4, 19, '1231', 'test34', 321, '2017-01-12', 1, 1, 1, '', 'Completed', '2017-01-12', 0),
(9, 4, 20, '1234', 'test 123', 25, '2017-01-13', 1, 1, 1, '', 'Pending', '2017-01-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `shipments_id` int(11) NOT NULL,
  `clients_id` int(11) NOT NULL,
  `billing_address` text NOT NULL,
  `terms` varchar(255) NOT NULL,
  `invoice_date` date NOT NULL,
  `due_date` date NOT NULL,
  `product_services` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `rate` double NOT NULL,
  `balance_due` float(11,2) NOT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1=pending, 2=paid',
  `date_created` datetime NOT NULL,
  `date_completed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `shipments_id`, `clients_id`, `billing_address`, `terms`, `invoice_date`, `due_date`, `product_services`, `description`, `quantity`, `rate`, `balance_due`, `status`, `date_created`, `date_completed`) VALUES
(1, 13, 4, 'this is for transfer to FEDex', 'Due on receipt', '2017-01-05', '2017-01-06', 'Transferring of the shipments', 'this is for sample', 1, 500, 500.00, 1, '2017-01-05 14:51:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

DROP TABLE IF EXISTS `invoice_details`;
CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_service` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `rate` double NOT NULL,
  `amount` float(11,2) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(180) CHARACTER SET latin1 NOT NULL,
  `body` text CHARACTER SET latin1 NOT NULL,
  `meta_title` text CHARACTER SET latin1 NOT NULL,
  `meta_keyword` text CHARACTER SET latin1 NOT NULL,
  `meta_description` text CHARACTER SET latin1 NOT NULL,
  `is_publish` smallint(11) NOT NULL,
  `sorting` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `body`, `meta_title`, `meta_keyword`, `meta_description`, `is_publish`, `sorting`, `created`, `modified`) VALUES
(1, 'ABOUT US', '<div class="row" id="about-container" style="padding-top:30px;padding-bottom:30px;background-color:#50626d;background: #50626d url(img/about-us/backdrop-about-us.png) repeat-y center !important;">\r\n    <div class="container twoside" style="">\r\n        <div class="center"><h2 class="header-title" style="font-size:50px;"><span style="color:#3f3f3f;">ABOUT</span> <span style="color:#72b9d2;">US</span></h2></div>\r\n        <br class="clear" />\r\n        <div class="col-md-6 left" style="">\r\n          <img src="img/about-us/about-img-1.png" alt="Lorem Banner">\r\n        </div>\r\n        <div class="col-md-6 left">\r\n          <p class="standard">Our company stands out in this industry by beating the standard price for all of our services, yet delivering top quality websites and design.</p>\r\n          <p class="standard">Our unique team of designers brainstorm together with our clients to bring about many interesting services on the clients website thus generating a bigger and better customer base for the client. in addition, our general turnaround time for a completed project beats any other in the market!</p>\r\n          <br class="clear"/  >          \r\n          </div>\r\n        </div>\r\n    </div>\r\n  </div>', 'ABOUT US', 'ABOUT US', 'ABOUT US', 1, 0, '2016-10-25 19:17:32', '2016-12-13 04:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `paypal`
--

DROP TABLE IF EXISTS `paypal`;
CREATE TABLE `paypal` (
  `id` int(11) NOT NULL,
  `mc_gross` float(11,2) DEFAULT NULL,
  `tax` float(11,2) DEFAULT '0.00',
  `address_street` text COLLATE utf8_unicode_ci,
  `payment_date` text COLLATE utf8_unicode_ci,
  `payment_status` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mc_fee` float(11,2) DEFAULT NULL,
  `address_country_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_name` text COLLATE utf8_unicode_ci,
  `custom` int(11) DEFAULT NULL,
  `payer_status` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `business` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_country` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_cart_items` int(11) DEFAULT NULL,
  `address_city` text COLLATE utf8_unicode_ci,
  `payer_email` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `txn_id` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_name1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receiver_email` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mc_currency` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` int(10) NOT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `is_featured` int(2) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `client_id`, `name`, `description`, `image`, `status`, `is_featured`, `created`, `modified`) VALUES
(8, 11, 'Trimblaze', '<p>Trimblaze was founded in 1998 as a family owned business. We started out with single family homes and slowly our good reputation spread to big contractors and developers, which gradually led us to apartment buildings and skyscrapers. We pay an extraordinary amount of attention to the smallest detail of every project, no matter if its big or small. In addition, we do all the last minute repairs and touch ups to complete the building project, although some of it may be beyond our scope of work. Our aim is to meet any deadline so you can enjoy your newly renovated home without any stress at all!</p>\r\n', '/webroot/upload/images/projects/project-3.png', 'active', 0, '2016-12-01 15:45:05', '2016-12-01 15:45:05'),
(9, 12, 'Innovative Carriers', '<p>We are a comprehensive freight brokerage firm, in business since 1999, offering a range of experienced carrier services for all your shipping needs. We create customized solutions with Truckload, LTL (Less-Than-Truckload), Intermodal and other freight services - just some of the ways we move your shipments...fast!</p>\r\n', '/webroot/upload/images/projects/innovative.png', 'active', 0, '2016-12-01 15:47:37', '2016-12-01 15:47:37'),
(10, 13, 'Alongsight', '<p>We work alongside you to achieve results that you set as your goals. Perhaps you may be fuzzy right now; you may be stuck for the moment; or you may be doubting yourself. The skills and abilities that made you successful in the past, however, are still in you. As your coach, we will come alongside you for your own, self-discovery; you will gain effectiveness so that you might reach your full potential and achieve success.</p>\r\n', '/webroot/upload/images/projects/alongsight.png', 'active', 0, '2016-12-01 15:49:30', '2016-12-01 15:49:30'),
(11, 14, 'Intemetric Construction Inc.', '<p>Our company was founded in 1990 out of passion and love for the job. Our team consists of the best in each respective line of work, from architects and designers to engineers. We pride ourselves in working quickly and efficiently to complete each job on time.</p>\r\n', '/webroot/upload/images/projects/project-2.png', 'active', 0, '2016-12-01 15:51:31', '2016-12-01 15:51:31'),
(12, 15, 'Presco', '<p>Our company was established in 2003 with a team of hard woking professionals in the area of demolition. Most of our work is done in Brooklyn, Manhattan, and NYC but we travel all over the tai-state area. We specialize in both residential and commercial sites. We pride ourselves in completing the job from the very first step of a price quote all the way until leaving a clean and neat site.</p>\r\n', '/webroot/upload/images/projects/presco.png', 'active', 0, '2016-12-01 15:53:11', '2016-12-01 15:53:11'),
(13, 16, 'VIP to Go', '<p>VIP TO GO&trade; is the most experienced bathroom trailer rental company in the country. With a truly national fleet ready to mobilize wherever you need it, VIP TO GO&trade; offers exceptional service and the most modern trailers around.</p>\r\n', '/webroot/upload/images/projects/viptogo.png', 'active', 0, '2016-12-01 15:55:24', '2016-12-01 15:55:24'),
(14, 17, 'Stylish Stroll', '<p>Stroll with style</p>\r\n', '/webroot/upload/images/projects/stylishstroll.png', 'active', 0, '2016-12-01 15:57:55', '2016-12-01 15:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `project_discussions`
--

DROP TABLE IF EXISTS `project_discussions`;
CREATE TABLE `project_discussions` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_entity_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `attachment` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_discussions`
--

INSERT INTO `project_discussions` (`id`, `project_id`, `user_entity_id`, `message`, `attachment`, `created`, `modified`) VALUES
(1, 4, 9, 'attached', '', '2016-11-15 17:32:59', '2016-11-15 17:32:59'),
(2, 4, 9, 'test', 'a:1:{i:0;s:50:"/broproweb.com/webroot/upload/9/images/avatar5.png";}', '2016-11-15 17:33:29', '2016-11-15 17:33:29'),
(4, 4, 9, 'Thank you!', '', '2016-11-15 17:44:03', '2016-11-15 17:44:03'),
(5, 4, 1, 'test', '', '2016-11-17 15:21:54', '2016-11-17 15:21:54'),
(6, 5, 9, 'ggg', '', '2016-11-22 15:47:01', '2016-11-22 15:47:01'),
(7, 5, 9, 'qwerty', '', '2016-11-22 15:49:25', '2016-11-22 15:49:25'),
(8, 6, 1, 'www', '', '2016-11-22 16:17:21', '2016-11-22 16:17:21'),
(9, 6, 1, 'test', '', '2016-11-22 16:22:47', '2016-11-22 16:22:47'),
(10, 6, 1, 'w', '', '2016-11-22 16:24:44', '2016-11-22 16:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `project_discussion_threads`
--

DROP TABLE IF EXISTS `project_discussion_threads`;
CREATE TABLE `project_discussion_threads` (
  `id` int(11) NOT NULL,
  `project_discussion_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

DROP TABLE IF EXISTS `project_images`;
CREATE TABLE `project_images` (
  `id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_proposals`
--

DROP TABLE IF EXISTS `project_proposals`;
CREATE TABLE `project_proposals` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `user_entity_id` int(11) NOT NULL,
  `proposal_date` date NOT NULL,
  `proposal_project` varchar(90) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_proposals`
--

INSERT INTO `project_proposals` (`id`, `client_id`, `user_entity_id`, `proposal_date`, `proposal_project`, `status`, `created`, `modified`) VALUES
(1, 9, 1, '2016-11-23', 'aaaa', 'Pending', '2016-11-17 18:10:53', '2016-11-17 18:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `project_proposal_discussions`
--

DROP TABLE IF EXISTS `project_proposal_discussions`;
CREATE TABLE `project_proposal_discussions` (
  `id` int(11) NOT NULL,
  `project_proposal_id` int(11) NOT NULL,
  `user_entity_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `attachment` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_proposal_discussions`
--

INSERT INTO `project_proposal_discussions` (`id`, `project_proposal_id`, `user_entity_id`, `message`, `attachment`, `created`, `modified`) VALUES
(1, 1, 1, 'gg', '', '2016-11-21 16:21:48', '2016-11-21 16:21:48'),
(2, 1, 1, 'wp', 'a:1:{i:0;s:47:"/broproweb.com/webroot/upload/images/avatar.png";}', '2016-11-21 16:22:47', '2016-11-21 16:22:47'),
(3, 1, 9, 'test', '', '2016-11-22 16:05:01', '2016-11-22 16:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(10) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `image`, `created`, `modified`) VALUES
(1, 'WEB DESIGN AND DEVELOPMENT', '<p>We develop and design websites, from company logo designs to fully functioning websites with unique features.</p>\r\n', '/beta/webroot/upload/images/services/icon-1.png', '2016-10-27 02:33:28', '2016-11-09 01:42:23'),
(2, 'SOCIAL MEDIA MANAGEMENT', '<p>Our talented marketing team can launch full business campaigns and grand openings, managing everything from countdowns to daily advertisements.</p>\r\n', '/beta/webroot/upload/images/services/icon-2.png', '2016-10-27 02:34:36', '2016-11-09 01:42:41'),
(3, 'SEARCH ENGINE OPTIMIZATION', '<p>Lorem ipsum dolor sit et,onsecteturdipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis.</p>\r\n', '/beta/webroot/upload/images/services/icon-3.png', '2016-10-27 02:34:59', '2016-10-27 02:34:59'),
(4, 'EMAIL MARKETING', '<p>We have the capabilities to send out and manage all your email blasts, even on a daily basis.</p>\r\n', '/beta/webroot/upload/images/services/icon-4.png', '2016-10-27 02:35:17', '2016-11-09 01:42:59'),
(5, 'PAY PER CLICK MANAGEMENT', '<p>Lorem ipsum dolor sit et,onsecteturdipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis.</p>\r\n', '/beta/webroot/upload/images/services/icon-5.png', '2016-10-27 02:35:45', '2016-10-27 02:35:45'),
(6, 'DIGITAL BRAND CONSULTING', '<p>Lorem ipsum dolor sit et,onsecteturdipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis.</p>\r\n', '/beta/webroot/upload/images/services/icon-6.png', '2016-10-27 02:36:21', '2016-10-27 02:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

DROP TABLE IF EXISTS `shipments`;
CREATE TABLE `shipments` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `item_description` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `boxes` int(11) NOT NULL,
  `shipping_carrier_id` int(11) NOT NULL,
  `other_shipping_carrier` text COLLATE utf8_unicode_ci,
  `shipping_service_id` int(11) NOT NULL,
  `shipping_purpose_id` int(11) NOT NULL,
  `send_amazon_qty` float(11,0) DEFAULT '0',
  `combine_with_id` int(11) DEFAULT '0',
  `combine_comment` text COLLATE utf8_unicode_ci,
  `other_shipping_service` text COLLATE utf8_unicode_ci,
  `comments` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL COMMENT '1 = Pending / 2 = Completed',
  `is_sent_to_inventory` smallint(6) NOT NULL DEFAULT '0' COMMENT '1=Yes,0=No',
  `is_correct_quantity` int(11) DEFAULT NULL,
  `aisle_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amazon_shipment_date` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amazon_shipment_note` text COLLATE utf8_unicode_ci,
  `amazon_confirmation_receipt` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `client_id`, `item_description`, `quantity`, `boxes`, `shipping_carrier_id`, `other_shipping_carrier`, `shipping_service_id`, `shipping_purpose_id`, `send_amazon_qty`, `combine_with_id`, `combine_comment`, `other_shipping_service`, `comments`, `status`, `is_sent_to_inventory`, `is_correct_quantity`, `aisle_number`, `amazon_shipment_date`, `amazon_shipment_note`, `amazon_confirmation_receipt`, `created`, `modified`) VALUES
(1, 2, 'Sample Description', 2, 2, 4, 'Other Shipping Carrier', 3, 6, 0, 0, '', '', 'test comment', 1, 0, 0, '', '', '', NULL, '2017-01-03 07:06:12', '2017-01-03 07:06:12'),
(2, 3, 'Test Description', 2, 1, 4, 'Other shipping carrier', 3, 6, 0, 0, '', '', 'test comment', 1, 0, 0, '', '', '', NULL, '2017-01-03 07:08:10', '2017-01-03 07:08:10'),
(3, 3, 'Test Description 02A', 5, 3, 4, 'Other shipping carrier b', 4, 1, 0, 0, '', 'Other Shipping Service', 'Test comment', 1, 0, 0, '', '', '', NULL, '2017-01-03 07:08:44', '2017-01-03 07:21:48'),
(4, 3, 'test', 3, 4, 4, 'Other Shipping Carrier', 1, 1, 0, 0, '', '', 'test', 1, 0, 0, '', '', '', NULL, '2017-01-03 07:15:38', '2017-01-03 07:15:38'),
(5, 3, 'test 2', 6, 7, 2, '', 4, 2, 0, 0, '', 'other service', 'test', 1, 0, 0, '', '', '', NULL, '2017-01-03 07:15:53', '2017-01-03 07:24:07'),
(6, 3, 'test 3', 5, 7, 1, '', 4, 2, 0, 0, '', 'other shipping service', 'test 2', 1, 0, 0, '', '', '', NULL, '2017-01-03 07:17:15', '2017-01-03 07:17:15'),
(7, 3, 'test 6', 1, 2, 4, 'other shipping carrier ', 3, 1, 0, 0, '', '', 'test 7', 1, 0, 0, '', '', '', NULL, '2017-01-03 07:17:38', '2017-01-03 07:17:38'),
(8, 3, 'Test AB', 3, 3, 4, 'Other FEDEXa', 4, 1, 0, 0, '', '5day 1', 'test', 1, 0, 0, '', '', '', NULL, '2017-01-03 07:32:23', '2017-01-03 07:35:05'),
(9, 3, 'test', 3, 4, 1, '', 1, 1, 0, 0, '', '', 'test', 1, 0, 0, '', '', '', NULL, '2017-01-04 07:45:44', '2017-01-04 07:45:44'),
(10, 3, 'Sample A', 2, 3, 1, '', 1, 3, 3, 0, '', '', 'test', 1, 0, 0, '', '', '', NULL, '2017-01-05 19:16:52', '2017-01-05 19:29:54'),
(11, 3, 'Sample B', 5, 3, 1, '', 1, 5, 0, 0, '', '', 'test', 2, 0, 0, '', '', '', NULL, '2017-01-05 19:17:21', '2017-01-05 19:17:21'),
(12, 3, 'Test D', 5, 10, 1, '', 1, 5, 0, 8, 'Sample combine remarks', '', 'Sample Comments', 2, 0, 0, '', '', '', NULL, '2017-01-05 19:18:38', '2017-01-05 19:18:38'),
(13, 4, 'Box for Fedex', 10, 10, 2, '', 2, 1, 0, 0, '', '', 'this is a sample comment', 2, 1, 0, '', '', '', NULL, '2017-01-05 14:50:47', '2017-01-11 18:54:50'),
(14, 4, 'Test', 50, 50, 1, '', 1, 1, 0, 0, '', '', 'Test', 2, 1, 0, '', '', '', NULL, '2017-01-11 18:58:45', '2017-01-11 19:18:56'),
(15, 4, 'aa', 5, 5, 1, '', 1, 1, 0, 0, '', '', '', 2, 1, 0, '', '', '', NULL, '2017-01-11 19:13:58', '2017-01-11 19:18:48'),
(16, 4, 'test14212', 50, 50, 2, '', 1, 1, 0, 13, '', '', 'test', 3, 1, 1, '12345', '2017-01-10', 'asdsa', 1, '2017-01-12 13:31:06', '2017-01-12 16:09:56'),
(17, 4, 'My shipment', 25, 25, 1, '', 1, 1, 0, NULL, '', '', '', 3, 1, 1, 'test 1', '2017-01-16', 'good', 1, '2017-01-12 16:16:17', '2017-01-12 16:17:43'),
(18, 4, 'test11111111', 123, 123, 1, '', 1, 1, 0, NULL, '', '', '', 3, 1, 1, 'test 12', '2017-01-18', 'good', 1, '2017-01-12 16:23:43', '2017-01-12 16:24:18'),
(19, 4, 'test2222', 321, 321, 1, '', 1, 1, 0, NULL, '', '', '', 2, 1, 1, 'test 123', '2017-01-18', 'abc123', 1, '2017-01-12 16:28:47', '2017-01-12 16:36:09'),
(20, 4, 'test1234', 50, 50, 1, '', 1, 1, 0, NULL, '', '', '', 3, 1, 1, 'aisle #1 ', '2016-12-27', 'nice ', 1, '2017-01-13 09:43:10', '2017-01-13 09:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `shipment_status`
--

DROP TABLE IF EXISTS `shipment_status`;
CREATE TABLE `shipment_status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipment_status`
--

INSERT INTO `shipment_status` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Pending', '2017-01-03 15:35:14', '2017-01-03 15:35:14'),
(2, 'Completed', '2017-01-03 15:35:14', '2017-01-03 15:35:14'),
(3, 'Received and Stored', '2017-01-10 13:54:58', '2017-01-10 13:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_carriers`
--

DROP TABLE IF EXISTS `shipping_carriers`;
CREATE TABLE `shipping_carriers` (
  `id` int(11) NOT NULL,
  `name` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipping_carriers`
--

INSERT INTO `shipping_carriers` (`id`, `name`, `created`, `modified`) VALUES
(1, 'UPS', '2016-12-29 20:38:23', '2016-12-29 20:38:23'),
(2, 'Fedex', '2016-12-29 20:38:29', '2016-12-29 20:38:29'),
(3, 'USPS', '2016-12-29 20:38:36', '2016-12-29 20:38:36'),
(4, 'Others', '2016-12-29 20:38:36', '2016-12-29 20:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_purposes`
--

DROP TABLE IF EXISTS `shipping_purposes`;
CREATE TABLE `shipping_purposes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipping_purposes`
--

INSERT INTO `shipping_purposes` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Storage', '2017-01-04 21:18:27', '2017-01-04 21:18:27'),
(2, 'Send to amazon', '2017-01-04 21:18:33', '2017-01-04 21:18:33'),
(3, 'Send part of it to amazon', '2017-01-04 21:18:37', '2017-01-04 21:18:37'),
(4, 'Store until further notice', '2017-01-04 21:18:41', '2017-01-04 21:18:41'),
(5, 'Combine with other shipment etc', '2017-01-04 21:18:45', '2017-01-04 21:18:45'),
(6, 'End user shipment', '2017-01-04 21:18:51', '2017-01-04 21:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_services`
--

DROP TABLE IF EXISTS `shipping_services`;
CREATE TABLE `shipping_services` (
  `id` int(11) NOT NULL,
  `name` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipping_services`
--

INSERT INTO `shipping_services` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Overnight\r', '2017-01-02 22:48:00', '2017-01-02 22:48:00'),
(2, '1 day', '2017-01-02 22:48:00', '2017-01-02 22:48:00'),
(3, '2 day', '2017-01-02 22:48:00', '2017-01-02 22:48:00'),
(4, 'Other', '2017-01-02 22:48:00', '2017-01-02 22:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `title` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `caption` text COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `sorting` int(11) NOT NULL,
  `is_publish` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `title`, `caption`, `link`, `thumbnail`, `sorting`, `is_publish`, `created`, `modified`) VALUES
(1, 'Slide A', '<h2 class="white">Welcome to Broproweb</h2>\r\n                  <br/>\r\n                  <h3 class="slider-text-h3 white">Your one stop studio for Digital Design and Development.</h3>\r\n                  <br/>\r\n                  <div class="button-blue"><a class="white" href="#" style="font-size: 20px;">WORK WITH US</a></div>', '', '/dov/git/broproweb/webroot/upload/images/slide/banner-1.png', 1, 1, '2016-12-13 01:31:44', '2016-12-13 01:31:44'),
(2, 'Slide B', '<h2 class="white">Lorem ipsum dolor sit amet</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3 class="white">Est probo iracundia complectitur ad, te ignota nostrud ullamcorper eum. Mel illum luptatum cu. Cu vidisse efficiendi assueverit vix, pro hinc nonumes id. Te consul tritani deseruisse eam, te legere mucius vis. Omnesque intellegebat ex mel, veniam fuisset incorrupte ea cum, at omittam albucius eum. Quodsi impetus nec ad.</h3>\r\n\r\n<p>&nbsp;</p>\r\n', '', '/dov/git/broproweb/webroot/upload/images/slide/banner-1.png', 2, 1, '2016-12-13 01:42:22', '2016-12-13 01:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `id` int(10) NOT NULL,
  `name` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `testimonial` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `position`, `testimonial`, `created`, `modified`) VALUES
(1, 'BERNARD BUNDAC', 'Graphic Designer', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in.</p>\r\n', '2016-10-27 02:45:49', '2016-10-27 02:45:49'),
(2, 'BERNARD BUNDAC', 'Graphic Designer', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in.</p>\r\n', '2016-10-27 02:46:12', '2016-10-27 02:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `created`, `modified`) VALUES
(1, 'admin', '$2y$10$4/NHgsmPtFWvEDIl8rDAGuqNH/h/zfqgda61ebQjrEBqlOrT2JKbe', 1, '2016-01-08 03:01:56', '2016-11-10 18:11:39'),
(2, 'manager', '$2y$10$vNP8LdENHyi.pibucJYdTuOG7kZVKEFc3TZIAJI29TRTUvEPLMDZa', 2, '2016-12-29 20:34:08', '2016-12-29 20:34:08'),
(3, 'employeea', '$2y$10$BgvfJVQeZmZVPrrqbSNK/OSySLf/1jmKqKADrM6D5/7yMf0O3ghu2', 3, '2016-12-29 20:34:55', '2016-12-29 20:34:55'),
(5, 'clienta@gmail.com', '$2y$10$wWYUfXNxHUnfc/kcng/piOYDs4ZAzDip3Q35rQTXLfUUu/cZzR.Fy', 4, '2016-12-29 21:01:26', '2016-12-29 21:01:26'),
(6, 'clientb@gmail.com', '$2y$10$Zuby15Oyy.8SJRptk2g7xOz3AWGYPU7fYfjs0B9oLIZai7LrHoRtO', 4, '2016-12-29 21:02:05', '2016-12-29 21:02:05'),
(7, 'employeea@gmail.com', '$2y$10$F9gMQKlCYIJbJQv3egsB6e2kbEGZ7Jgm0uoYlxm5V6bfhNvDgWvfS', 3, '2016-12-30 00:44:48', '2016-12-30 00:44:48'),
(8, 'employeeb@gmail.com', '$2y$10$h5QcFzaIHtbwBBA2nWEOQ.j4/haEm/FGO6kagPG5GU286xS82kU4e', 3, '2016-12-30 00:45:05', '2016-12-30 00:45:05'),
(9, 'employeec', '$2y$10$V0LPvaoDcvNcb2FFsLXw8eTQMdP5v6P86GeKm7I.VUwMMdBWM3v4G', 3, '2016-12-30 00:45:46', '2016-12-30 00:45:46'),
(11, 'clientc', '$2y$10$Psop.15BdjCZ82QcDBAaPO0Hq5o1evHLUmf0npdwQSh9J66Tciq8.', 4, '2017-01-03 06:14:19', '2017-01-03 06:14:19'),
(12, 'client_sample', '$2y$10$Gv4fSUM5xkpiNEOtqwggm.gcHZoefFeEN4mVcqsPsO5.MbMZNAmom', 4, '2017-01-05 14:30:23', '2017-01-05 14:30:23'),
(13, 'manager_sample', '$2y$10$s/ysD4uJNcVxMRYTLB2NFelLRJdkjZr31Pts1N0ExQEV0wTyHcRSO', 2, '2017-01-05 14:40:19', '2017-01-05 14:40:19'),
(14, 'employee_sample', '$2y$10$3iGgtjgo2C7wl2nfGQdkK.X98ZwXWWmBbmCOF8Iff8jwe1h3xn6Ne', 3, '2017-01-05 14:41:19', '2017-01-05 14:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_entities`
--

DROP TABLE IF EXISTS `user_entities`;
CREATE TABLE `user_entities` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `photo` text COLLATE utf8_unicode_ci,
  `is_active` tinyint(2) DEFAULT '0',
  `is_password_changed` tinyint(2) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_entities`
--

INSERT INTO `user_entities` (`id`, `user_id`, `firstname`, `middlename`, `lastname`, `email`, `contact_no`, `address`, `photo`, `is_active`, `is_password_changed`, `created`, `modified`) VALUES
(1, 1, 'Company ABC', 'Company ABC', 'Company AB', 'company@gmail.com', '1234-56', NULL, '', 1, 1, '2016-07-25 03:19:37', '2016-12-29 20:36:46'),
(21, 2, 'Sample Manager', 'Sample Manger', 'Sample Manger', 'manager@gmail.com', '12343', 'test', NULL, 1, 0, '2016-12-29 20:34:08', '2016-12-29 20:34:08'),
(22, 3, 'Sample EmployeeBB', 'Sample Employee', 'Sample Employee', 'employeea@gmail.com', '12345', 'Sample Address', NULL, 1, 0, '2016-12-29 20:34:55', '2016-12-30 00:48:10'),
(24, 8, 'Employee A', 'Employee A', 'Employee A', 'employeeb@gmail.com', '12345', 'test address', NULL, 1, 0, '2016-12-30 00:45:05', '2016-12-30 00:45:05'),
(26, 13, 'manager_sample', 'manager', 'manager', 'manager_sample@comfortpackaging.com', '1231231231', 'this is a sample address', NULL, 1, 0, '2017-01-05 14:40:19', '2017-01-05 14:40:19'),
(27, 14, 'employee_sample', 'employee', 'employee', 'employee@comfortpackaging.com', '123123123', 'this is a sample address employee', NULL, 1, 0, '2017-01-05 14:41:20', '2017-01-05 14:41:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl_phinxlog`
--
ALTER TABLE `acl_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lft` (`lft`,`rght`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lft` (`lft`,`rght`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aro_id` (`aro_id`,`aco_id`),
  ADD KEY `aco_id` (`aco_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `end_user_order`
--
ALTER TABLE `end_user_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_order`
--
ALTER TABLE `inventory_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal`
--
ALTER TABLE `paypal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_discussions`
--
ALTER TABLE `project_discussions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_discussion_threads`
--
ALTER TABLE `project_discussion_threads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_proposals`
--
ALTER TABLE `project_proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_proposal_discussions`
--
ALTER TABLE `project_proposal_discussions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipment_status`
--
ALTER TABLE `shipment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_carriers`
--
ALTER TABLE `shipping_carriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_purposes`
--
ALTER TABLE `shipping_purposes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_services`
--
ALTER TABLE `shipping_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_entities`
--
ALTER TABLE `user_entities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;
--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `end_user_order`
--
ALTER TABLE `end_user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `inventory_order`
--
ALTER TABLE `inventory_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `paypal`
--
ALTER TABLE `paypal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `project_discussions`
--
ALTER TABLE `project_discussions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `project_discussion_threads`
--
ALTER TABLE `project_discussion_threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_proposals`
--
ALTER TABLE `project_proposals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `project_proposal_discussions`
--
ALTER TABLE `project_proposal_discussions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `shipment_status`
--
ALTER TABLE `shipment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `shipping_carriers`
--
ALTER TABLE `shipping_carriers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `shipping_purposes`
--
ALTER TABLE `shipping_purposes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `shipping_services`
--
ALTER TABLE `shipping_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_entities`
--
ALTER TABLE `user_entities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
