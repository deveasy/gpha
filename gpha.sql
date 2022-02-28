-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 28, 2022 at 08:42 AM
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
-- Database: `gpha`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
CREATE TABLE IF NOT EXISTS `assets` (
  `asset_id` int NOT NULL AUTO_INCREMENT,
  `asset_type` int DEFAULT NULL,
  `brand` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `computer_tag_name` varchar(25) DEFAULT NULL,
  `asset_tag_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `serial_number` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `supplier_id` int DEFAULT NULL,
  `assigned_to` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `assigned_by` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `date_assigned` date DEFAULT NULL,
  `warranty_date` datetime DEFAULT NULL,
  `purchase_date` datetime DEFAULT NULL,
  `location` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `model` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `wireless_mac` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `lan_mac` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `os` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `hard_disk` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `processor` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `memory` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `network_hub` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `colour` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `reorder_level` int DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'available',
  PRIMARY KEY (`asset_id`),
  KEY `asset_type` (`asset_type`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`asset_id`, `asset_type`, `brand`, `computer_tag_name`, `asset_tag_name`, `serial_number`, `supplier_id`, `assigned_to`, `assigned_by`, `date_assigned`, `warranty_date`, `purchase_date`, `location`, `model`, `wireless_mac`, `lan_mac`, `os`, `hard_disk`, `processor`, `memory`, `network_hub`, `colour`, `reorder_level`, `status`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, '', NULL, 'available'),
(2, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, '', NULL, 'available'),
(3, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fgf', NULL, 'hg', 'fgf', NULL, 'fgf', NULL, 'available'),
(4, 28, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fgf', NULL, 'hg', 'fgf', NULL, 'fgf', NULL, 'available'),
(5, 28, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hfd', NULL, 'dgsd', 'hh', NULL, 'hh', NULL, 'available'),
(6, 28, NULL, NULL, NULL, 'ggfgf', 0, NULL, NULL, NULL, '2022-02-09 00:00:00', NULL, NULL, NULL, 'ghh', 'dgdh', 'hfd', 'hhh', 'dgsd', 'hh', 'hhh', 'fgf', NULL, 'available'),
(7, 28, NULL, NULL, NULL, 'ggfgf', 0, NULL, NULL, NULL, '2022-01-28 00:00:00', '2023-05-14 00:00:00', NULL, NULL, 'ghh', 'fgg', 'hfd', 'hh', 'hg', 'fgf', 'hhh', 'fgf', NULL, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `asset_categories`
--

DROP TABLE IF EXISTS `asset_categories`;
CREATE TABLE IF NOT EXISTS `asset_categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  `category_description` text,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset_categories`
--

INSERT INTO `asset_categories` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'PCs, Laptops & Tablets', 'Category for computing devices'),
(3, 'Servers', 'Category for all servers'),
(5, 'Printers, Scanners & Photocopiers', 'Category for all imaging devices in GPHA.'),
(6, 'Network & Communication Devices', 'Category for networking and communication equipments.'),
(7, 'Projection & Display Devices', 'Category for all projection and display devices.'),
(8, 'Surveillance Devices', 'Category for all surveillance devices.'),
(9, 'Software', 'All software are captured under this category.'),
(10, 'Handheld Devices', 'All handheld devices are captured under this category.');

-- --------------------------------------------------------

--
-- Table structure for table `asset_status`
--

DROP TABLE IF EXISTS `asset_status`;
CREATE TABLE IF NOT EXISTS `asset_status` (
  `status_id` int NOT NULL AUTO_INCREMENT,
  `asset_id` int DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `created_by` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `initial_status_date` datetime DEFAULT NULL,
  `status_change_date` datetime DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asset_types`
--

DROP TABLE IF EXISTS `asset_types`;
CREATE TABLE IF NOT EXISTS `asset_types` (
  `asset_type_id` int NOT NULL AUTO_INCREMENT,
  `type_name` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `asset_category` int DEFAULT NULL,
  PRIMARY KEY (`asset_type_id`),
  KEY `asset_category` (`asset_category`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset_types`
--

INSERT INTO `asset_types` (`asset_type_id`, `type_name`, `asset_category`) VALUES
(1, 'All In One', 1),
(2, 'Desktop', 1),
(3, 'Laptop', 1),
(4, 'Printer', 5),
(5, 'Photocopier', 5),
(6, 'Server', 3),
(7, 'Router', 6),
(8, 'Switch', 6),
(9, 'Scanner', 5),
(10, 'Patch Panel', 6),
(11, 'Firewall', 6),
(18, 'Projector', 7),
(19, 'Camera', 8),
(20, 'Access Point', 6),
(21, 'Monitor', 7),
(22, 'Convertors', 6),
(23, 'Transponder', 8),
(24, 'Network Video Recorder', 8),
(25, 'Digital Video Recorder', 8),
(26, 'Software', 9),
(27, 'Small Form-Factor Pluggable', 6),
(28, 'Portable Handheld', 10),
(29, 'Camera Tester', 8),
(30, 'Joystick', 8),
(31, 'Access Control', 6),
(32, 'EM Lock', 8);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('ss3f0vorf4po6ujq3c8vbhnr7urgvbu7', '::1', 0, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634343932303232373b6c6f676765645f696e7c613a353a7b733a383a2273746166665f6964223b733a313a2231223b733a393a2266697273746e616d65223b733a383a22456d6d616e75656c223b733a383a226c6173746e616d65223b733a363a22596172746579223b733a343a22726f6c65223b733a313a2231223b733a383a226c6f636174696f6e223b4e3b7d),
('m58jdqs4roik2l17t3kjvsn9n6l0c77k', '::1', 0, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634343932303234313b6c6f676765645f696e7c613a353a7b733a383a2273746166665f6964223b733a313a2231223b733a393a2266697273746e616d65223b733a383a22456d6d616e75656c223b733a383a226c6173746e616d65223b733a363a22596172746579223b733a343a22726f6c65223b733a313a2231223b733a383a226c6f636174696f6e223b4e3b7d),
('cdo9s2efklnt8n8ch9au0gm7f18uupr5', '::1', 0, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634343932353330353b6c6f676765645f696e7c613a353a7b733a383a2273746166665f6964223b733a313a2231223b733a393a2266697273746e616d65223b733a383a22456d6d616e75656c223b733a383a226c6173746e616d65223b733a363a22596172746579223b733a343a22726f6c65223b733a313a2231223b733a383a226c6f636174696f6e223b4e3b7d),
('md3eftdct0iskjjh18j3msl0hj65vliv', '::1', 0, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634343932363830373b6c6f676765645f696e7c613a353a7b733a383a2273746166665f6964223b733a313a2231223b733a393a2266697273746e616d65223b733a383a22456d6d616e75656c223b733a383a226c6173746e616d65223b733a363a22596172746579223b733a343a22726f6c65223b733a313a2231223b733a383a226c6f636174696f6e223b4e3b7d),
('spj65a7ofnacdgiqmqard7hhllganonp', '::1', 1644927764, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634343932373736343b6c6f676765645f696e7c613a353a7b733a383a2273746166665f6964223b733a313a2231223b733a393a2266697273746e616d65223b733a383a22456d6d616e75656c223b733a383a226c6173746e616d65223b733a363a22596172746579223b733a343a22726f6c65223b733a313a2231223b733a383a226c6f636174696f6e223b4e3b7d),
('kba9jevcmjuokbdbrdu18hfr0jonm300', '::1', 1644928658, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634343932383635383b6c6f676765645f696e7c613a353a7b733a383a2273746166665f6964223b733a313a2231223b733a393a2266697273746e616d65223b733a383a22456d6d616e75656c223b733a383a226c6173746e616d65223b733a363a22596172746579223b733a343a22726f6c65223b733a313a2231223b733a383a226c6f636174696f6e223b4e3b7d),
('h89tibb0d13sh5vedqf7sat96t0imkco', '::1', 1644929370, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634343932393337303b6c6f676765645f696e7c613a353a7b733a383a2273746166665f6964223b733a313a2231223b733a393a2266697273746e616d65223b733a383a22456d6d616e75656c223b733a383a226c6173746e616d65223b733a363a22596172746579223b733a343a22726f6c65223b733a313a2231223b733a383a226c6f636174696f6e223b4e3b7d),
('4up8l18eqgco6c54l81rmlk8loq0nq9t', '::1', 1644929370, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634343932393337303b6c6f676765645f696e7c613a353a7b733a383a2273746166665f6964223b733a313a2231223b733a393a2266697273746e616d65223b733a383a22456d6d616e75656c223b733a383a226c6173746e616d65223b733a363a22596172746579223b733a343a22726f6c65223b733a313a2231223b733a383a226c6f636174696f6e223b4e3b7d),
('1vmjj9ibkv8q60epik9feed0mljsa2ep', '::1', 1644997248, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634343939373234383b),
('a8h3hun9p8sivhdmsst81bpk4dq403s9', '::1', 1645014013, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634353031343031333b),
('lki336jho6t6l4mcfgb75cg86225n9pc', '::1', 1645014291, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634353031343031333b6c6f676765645f696e7c613a353a7b733a383a2273746166665f6964223b733a313a2231223b733a393a2266697273746e616d65223b733a383a22456d6d616e75656c223b733a383a226c6173746e616d65223b733a363a22596172746579223b733a343a22726f6c65223b733a313a2231223b733a383a226c6f636174696f6e223b4e3b7d),
('hsp5pv44urtpo01j89picio4i641lgcp', '::1', 1645020343, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634353032303334333b6c6f676765645f696e7c613a353a7b733a383a2273746166665f6964223b733a313a2231223b733a393a2266697273746e616d65223b733a383a22456d6d616e75656c223b733a383a226c6173746e616d65223b733a363a22596172746579223b733a343a22726f6c65223b733a313a2231223b733a383a226c6f636174696f6e223b4e3b7d),
('f1qvutgaf9fan8ur0g1im5easgb8gq9r', '::1', 1645020347, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634353032303334333b6c6f676765645f696e7c613a353a7b733a383a2273746166665f6964223b733a313a2231223b733a393a2266697273746e616d65223b733a383a22456d6d616e75656c223b733a383a226c6173746e616d65223b733a363a22596172746579223b733a343a22726f6c65223b733a313a2231223b733a383a226c6f636174696f6e223b4e3b7d),
('hqv9haef5m691b18qron82bqkn8sfhu8', '::1', 1645080716, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634353038303730363b6c6f676765645f696e7c613a353a7b733a383a2273746166665f6964223b733a313a2231223b733a393a2266697273746e616d65223b733a383a22456d6d616e75656c223b733a383a226c6173746e616d65223b733a363a22596172746579223b733a343a22726f6c65223b733a313a2231223b733a383a226c6f636174696f6e223b4e3b7d),
('qtjeir282jantu9qmrtd8mo2pcesbemj', '::1', 1645094759, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634353039343735363b),
('dfhosia9qvd3qvl000hjekd5og2m61i7', '::1', 1645166100, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634353136363130303b),
('bv0rtv973rfucdm3gdnkaldft84o7h9e', '::1', 1645261913, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634353236313931323b),
('kp2snqqtlecn0fk0bspd8gstlat0v5ra', '::1', 1645552781, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634353535323738313b),
('sdjo365dho08a5vr63u2vg7qnb5r2r2j', '::1', 1645636483, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634353633363438333b),
('n0fo1uofuku1vl6irudm5rpo00e0g5uk', '::1', 1645710617, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634353731303631373b),
('c6elttuem5j50hnvpbahhrc1he4piqpc', '::1', 1645807915, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634353830373931343b6c6f676765645f696e7c613a353a7b733a383a2273746166665f6964223b733a313a2231223b733a393a2266697273746e616d65223b733a383a22456d6d616e75656c223b733a383a226c6173746e616d65223b733a363a22596172746579223b733a343a22726f6c65223b733a313a2231223b733a383a226c6f636174696f6e223b4e3b7d);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `department_id` int NOT NULL AUTO_INCREMENT,
  `department_name` varchar(100) DEFAULT NULL,
  `department_description` text,
  `location` int DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
CREATE TABLE IF NOT EXISTS `devices` (
  `device_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `location` int DEFAULT NULL,
  `configuration` text,
  PRIMARY KEY (`device_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

DROP TABLE IF EXISTS `issues`;
CREATE TABLE IF NOT EXISTS `issues` (
  `purchase_order_id` int NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `creation_date` date NOT NULL,
  `shipping_fee` decimal(10,0) NOT NULL,
  `taxes` decimal(10,0) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_amount` decimal(10,0) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `notes` text NOT NULL,
  `order_subtotal` decimal(10,0) NOT NULL,
  `order_total` decimal(10,0) NOT NULL,
  `submitted_by` varchar(50) NOT NULL,
  `submitted_date` date NOT NULL,
  `closed_by` varchar(50) NOT NULL,
  `closed_date` date NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `expected_date` date NOT NULL,
  `submitted` tinyint(1) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`purchase_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `location_id` int NOT NULL AUTO_INCREMENT,
  `location_name` varchar(100) DEFAULT NULL,
  `physical_address` varchar(50) DEFAULT NULL,
  `location_type` varchar(32) DEFAULT NULL,
  `map_longitude` float DEFAULT NULL,
  `map_latitude` float DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location_inventory`
--

DROP TABLE IF EXISTS `location_inventory`;
CREATE TABLE IF NOT EXISTS `location_inventory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `location_id` varchar(6) NOT NULL,
  `asset_code` varchar(10) DEFAULT NULL,
  `cost_price` decimal(10,2) DEFAULT NULL,
  `selling_price` decimal(10,2) DEFAULT NULL,
  `markup` decimal(4,2) NOT NULL,
  `quantity_in_stock` int NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `purchase_uom` varchar(10) DEFAULT NULL,
  `pos_uom` varchar(10) DEFAULT NULL,
  `pos_uom_qty` int NOT NULL,
  `expiry_date` varchar(15) DEFAULT NULL,
  `last_edited` varchar(15) DEFAULT NULL,
  `date_created` varchar(15) DEFAULT NULL,
  `shelf` varchar(10) DEFAULT NULL,
  `product_category` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_code` (`asset_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location_orders`
--

DROP TABLE IF EXISTS `location_orders`;
CREATE TABLE IF NOT EXISTS `location_orders` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `location_id` varchar(4) DEFAULT NULL,
  `order_id` bigint DEFAULT NULL,
  `staff_id` int DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `status` varchar(15) DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location_order_details`
--

DROP TABLE IF EXISTS `location_order_details`;
CREATE TABLE IF NOT EXISTS `location_order_details` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `order_id` bigint DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `no_stock` tinyint(1) DEFAULT NULL,
  `allocated` tinyint(1) DEFAULT NULL,
  `invoiced` tinyint(1) DEFAULT NULL,
  `shipped` tinyint(1) DEFAULT NULL,
  `back_ordered` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_details`
--

DROP TABLE IF EXISTS `purchase_order_details`;
CREATE TABLE IF NOT EXISTS `purchase_order_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantity` int NOT NULL,
  `unit_cost` decimal(10,0) NOT NULL,
  `extended_price` decimal(10,0) NOT NULL,
  `date_received` date NOT NULL,
  `purchase_order_number` int NOT NULL,
  `posted_to_inventory` tinyint(1) NOT NULL,
  `submitted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) NOT NULL,
  `role_description` varchar(100) NOT NULL,
  `privileges` text,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_description`, `privileges`) VALUES
(1, 'Super User', 'The IT super user admin of the application', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `settings_name` varchar(20) DEFAULT NULL,
  `options` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff_location`
--

DROP TABLE IF EXISTS `staff_location`;
CREATE TABLE IF NOT EXISTS `staff_location` (
  `id` int NOT NULL AUTO_INCREMENT,
  `staff_id` int NOT NULL,
  `location_id` varchar(5) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL COMMENT 'tracks whether in location or not',
  `date_change` date DEFAULT NULL COMMENT 'date status changed in location',
  PRIMARY KEY (`id`),
  UNIQUE KEY `location_id` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `supplier_id` int NOT NULL AUTO_INCREMENT,
  `company` varchar(100) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `contact_person_job_title` varchar(50) DEFAULT NULL,
  `business_phone` varchar(50) DEFAULT NULL,
  `home_phone` varchar(50) DEFAULT NULL,
  `mobile_phone` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state_province` varchar(50) DEFAULT NULL,
  `zip_postal_code` varchar(20) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `notes` text,
  `attachments` varchar(50) DEFAULT NULL,
  `supplier_name` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_products`
--

DROP TABLE IF EXISTS `supplier_products`;
CREATE TABLE IF NOT EXISTS `supplier_products` (
  `id` int NOT NULL,
  `supplier_id` int NOT NULL,
  `product_id` int NOT NULL,
  `order_qty` int NOT NULL,
  `current_qty` int NOT NULL,
  `estimated_order` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions_history`
--

DROP TABLE IF EXISTS `transactions_history`;
CREATE TABLE IF NOT EXISTS `transactions_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `details` text,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

DROP TABLE IF EXISTS `transfers`;
CREATE TABLE IF NOT EXISTS `transfers` (
  `transfer_id` int NOT NULL,
  `source` varchar(4) DEFAULT NULL,
  `destination` varchar(4) DEFAULT NULL,
  `transfer_date` varchar(10) DEFAULT NULL,
  `transfer_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `staff_id` int DEFAULT NULL,
  `seen_status` varchar(15) DEFAULT 'unseen',
  `dispatcher` varchar(30) DEFAULT NULL,
  `vehicle_number` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`transfer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_details`
--

DROP TABLE IF EXISTS `transfer_details`;
CREATE TABLE IF NOT EXISTS `transfer_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `transfer_id` int DEFAULT NULL,
  `product_code` varchar(10) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `status` varchar(15) DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `units_of_measure`
--

DROP TABLE IF EXISTS `units_of_measure`;
CREATE TABLE IF NOT EXISTS `units_of_measure` (
  `id` int NOT NULL AUTO_INCREMENT,
  `short_description` varchar(5) DEFAULT NULL,
  `description` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `staff_id` varchar(20) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `designation` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `department` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `location` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `gender` varchar(8) DEFAULT NULL,
  `nationality` varchar(150) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `mobile_phone` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `first_login` date DEFAULT NULL,
  `last_login` date DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`staff_id`, `firstname`, `lastname`, `dob`, `designation`, `department`, `location`, `role_id`, `address`, `gender`, `nationality`, `city`, `mobile_phone`, `username`, `password`, `first_login`, `last_login`) VALUES
('1', 'Emmanuel', 'Yartey', '2017-07-04', '', '', 'S2', 1, NULL, NULL, NULL, NULL, NULL, 'admin', '0192023a7bbd73250516f069df18b500', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_ibfk_1` FOREIGN KEY (`asset_type`) REFERENCES `asset_types` (`asset_type_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `asset_types`
--
ALTER TABLE `asset_types`
  ADD CONSTRAINT `asset_types_ibfk_1` FOREIGN KEY (`asset_category`) REFERENCES `asset_categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
