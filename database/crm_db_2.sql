-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2015 at 02:11 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_db_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `account_name` varchar(100) DEFAULT NULL COMMENT 'Name',
  `account_type` varchar(11) DEFAULT NULL COMMENT 'Type',
  `account_industry` varchar(100) DEFAULT NULL COMMENT 'Industry',
  `account_revenue` varchar(100) DEFAULT NULL COMMENT 'Revenue',
  `account_telephone` varchar(30) DEFAULT NULL COMMENT 'Telephone',
  `account_fax` varchar(30) DEFAULT NULL COMMENT 'Fax',
  `account_email` varchar(50) DEFAULT NULL COMMENT 'Email',
  `account_address_number` varchar(50) DEFAULT NULL COMMENT 'Address Number',
  `account_address_street` varchar(50) DEFAULT NULL COMMENT 'Address Street',
  `account_address_city` varchar(50) DEFAULT NULL COMMENT 'Address City',
  `account_address_district` varchar(50) DEFAULT NULL COMMENT 'Address District',
  `owner` int(11) NOT NULL COMMENT 'Owner',
  `modified_by` int(11) DEFAULT NULL COMMENT 'Modified By',
  `group_id` int(11) DEFAULT NULL COMMENT 'Group',
  `assignedto` varchar(50) DEFAULT NULL COMMENT 'Assigned To',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account_name`, `account_type`, `account_industry`, `account_revenue`, `account_telephone`, `account_fax`, `account_email`, `account_address_number`, `account_address_street`, `account_address_city`, `account_address_district`, `owner`, `modified_by`, `group_id`, `assignedto`, `deleted`, `updated_at`, `created_at`) VALUES
(21, 'abc', 'qq', '1', '', '123', '', '', '', '', '', '', 18, NULL, 16, NULL, 0, NULL, NULL),
(23, 'eeeee', '', '', '', '', '', '', NULL, NULL, NULL, NULL, 18, NULL, 16, NULL, 1, NULL, NULL),
(24, 'text2', '1', '', '1', '123', '123', 'asa@ssd.com', '', '', '', '', 18, NULL, 16, NULL, 0, NULL, NULL),
(25, '11', '1', '', '1', '1', '1', '', '1', '1', '1', '1', 18, NULL, 16, NULL, 0, NULL, NULL),
(26, '2', '2', '2', '2', '2', '22', '', '2', '2', '2', '2', 18, NULL, 16, NULL, 0, NULL, NULL),
(27, 'd', 'd', 'd', 'd', '2', '2', '', 'd', 'd', 'd', 'd', 18, NULL, 16, NULL, 0, NULL, NULL),
(28, 'xsaz', '', '', '', '2314', '', '', '', '', '', '', 18, NULL, 16, NULL, 1, NULL, NULL),
(29, 'dsd', '', '', '', '3232', '', '', '', '', '', '', 18, NULL, 16, NULL, 1, NULL, NULL),
(30, 'qq', 'qq', 'qqq', 'qq', '111', '', '', '', '', '', '', 18, NULL, 15, NULL, 0, NULL, NULL),
(31, 'cccc', '', '', '', '123453', '', '', '', '', '', '', 18, 18, 16, '15', 0, NULL, NULL),
(32, 'nnn', '', 'n', '', '12543', '', '', '', '', '', '', 17, 17, 15, NULL, 1, NULL, NULL),
(33, '', '', '', '', '', '', '', '', '', '', '', 17, NULL, 0, NULL, 0, NULL, NULL),
(34, 'rrrrrrr', NULL, NULL, NULL, '', '', '', '', '', '', '', 17, NULL, 15, NULL, 1, NULL, NULL),
(35, 'new ', '', '', '', '456', '', '', '', '', '', '', 17, 18, 15, '18', 0, NULL, NULL),
(36, 'test', '', '', '', '552546', '', '', '', '', '', '', 18, NULL, 15, '18', 1, NULL, NULL),
(37, 'test test', '', '', '', '852', '', '', '111111', '', '', '', 18, 18, 15, '18', 1, '2015-12-23 09:13:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `call_log`
--

CREATE TABLE `call_log` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `call_created_time` timestamp NULL DEFAULT NULL COMMENT 'Time',
  `cli` varchar(45) DEFAULT NULL COMMENT 'CLI',
  `contact_id` int(11) DEFAULT NULL COMMENT 'Contact',
  `call_type` varchar(50) DEFAULT NULL COMMENT 'Call Type',
  `call_status` varchar(45) DEFAULT NULL COMMENT 'Status',
  `assignedto` int(11) DEFAULT NULL COMMENT 'Assigned To',
  `call_owner` int(11) DEFAULT NULL COMMENT 'Call Owner',
  `call_modified_by` varchar(50) DEFAULT NULL COMMENT 'Modified By',
  `call_modified_time` datetime DEFAULT NULL COMMENT 'Modified Time',
  `group_id` int(11) DEFAULT NULL COMMENT 'Group',
  `call_description` varchar(500) DEFAULT NULL,
  `product_type` varchar(50) DEFAULT NULL,
  `remark_subject` varchar(50) DEFAULT NULL,
  `remark_body` varchar(100) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `account` int(11) DEFAULT NULL COMMENT 'Account',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `call_log`
--

INSERT INTO `call_log` (`id`, `call_created_time`, `cli`, `contact_id`, `call_type`, `call_status`, `assignedto`, `call_owner`, `call_modified_by`, `call_modified_time`, `group_id`, `call_description`, `product_type`, `remark_subject`, `remark_body`, `deleted`, `account`, `updated_at`, `created_at`) VALUES
(1, '2015-09-10 06:21:40', '7878', 19, 'Inquiry', NULL, 17, 17, NULL, NULL, 14, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(2, '2015-09-10 06:49:21', '7878', 19, 'Inquiry', NULL, 17, 17, NULL, NULL, 14, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(3, '2015-09-10 06:50:22', '7878', 19, 'Inquiry', NULL, 14, 17, '18', '2015-09-16 18:11:36', 17, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(4, '2015-09-10 06:51:27', '7878', 19, 'Inquiry', NULL, 17, 17, NULL, NULL, 14, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(5, '2015-09-10 06:54:45', '654', 90, 'Sales', NULL, 17, 17, NULL, NULL, 14, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(6, '2015-09-10 07:06:56', '7878', 19, 'Sales', NULL, 15, 17, '18', '2015-09-14 17:33:25', 16, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(7, '2015-09-11 05:22:21', '7878', 19, 'Inquiry', NULL, 17, 17, NULL, NULL, 14, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(8, '2015-09-11 05:36:10', '7878', 19, 'Inquiry', NULL, 17, 17, '18', '2015-09-16 12:16:02', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(9, '2015-09-11 05:40:55', '7878', 19, 'Inquiry', NULL, 18, 17, '18', '2015-09-18 12:24:30', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(10, '2015-09-11 05:41:18', '7878', 19, 'Inquiry', NULL, 17, 17, NULL, NULL, 14, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(11, '2015-09-15 08:14:32', '1357', 117, 'Inquiry', NULL, 18, 18, '17', '2015-10-16 11:42:12', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(12, '2015-09-16 06:37:59', '7878', 19, 'Sales', NULL, 18, 18, '18', '2015-09-16 13:27:47', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(13, '2015-09-17 05:07:31', '7878', 19, 'Sales', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(14, '2015-09-17 05:24:51', '1357', 117, 'Sales', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(15, '2015-09-17 05:28:59', '7878', 19, 'Sales', NULL, 15, 18, '18', '2015-09-18 12:27:30', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(16, '2015-09-17 07:33:11', '980756345', 70, 'Inquiry', NULL, 18, 18, '18', '2015-09-18 12:24:24', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(17, '2015-09-17 10:00:34', '654', 90, 'Sales', NULL, 18, 18, '17', '2015-09-30 12:38:29', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(18, '2015-09-22 06:02:13', '7878', 19, 'Inquiry', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(19, '2015-09-22 06:03:10', '4513513', 116, 'Sales', NULL, 18, 18, '18', '2015-09-30 10:34:50', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(20, '2015-09-22 06:04:13', '1357', 117, 'Inquiry', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(21, '2015-09-21 06:05:28', '1212', 119, 'Inquiry', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(22, '2015-08-22 09:56:49', '1212', 119, 'Inquiry', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(23, '2015-09-24 11:59:43', '1212', 119, 'Inquiry', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(24, '2015-10-01 07:36:35', '7878', 19, 'Sales', NULL, 17, 17, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(25, '2015-10-01 09:36:17', '980756345', 70, 'Inquiry', NULL, 17, 17, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(31, '2015-10-02 09:50:46', '980756345', 70, 'Tickets', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(32, '2015-10-05 10:12:22', '1212', 119, 'Sales', NULL, 18, 18, '18', '2015-10-08 16:38:38', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(33, '2015-10-05 11:05:06', '1212', 119, 'Inquiry', NULL, 18, 18, '18', '2015-10-08 16:38:43', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(34, '2015-10-05 11:13:26', '1212', 119, 'Tickets', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(35, '2015-10-06 03:48:04', '1212', 119, 'Tickets', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(36, '2015-10-06 03:49:23', '1212', 119, 'Tickets', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(37, '2015-10-07 07:25:53', '1212', 119, 'Tickets', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(38, '2015-10-07 07:26:50', '1212', 119, 'Tickets', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(39, '2015-10-07 07:27:54', '1212', 119, 'Tickets', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(40, '2015-10-08 10:16:59', '2563589', 51, 'Tickets', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(41, '2015-10-08 10:22:56', '4532', 61, 'Tickets', NULL, 18, 18, '18', '2015-10-08 16:30:59', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(42, '2015-10-08 11:30:00', '1212', 119, 'Inquiry', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(45, '2015-10-08 11:33:33', '1212', 119, 'Sales', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(46, '2015-10-08 11:34:33', '1212', 119, 'Sales', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(47, '2015-10-08 11:35:07', '1357', 117, 'Tickets', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(48, '2015-10-09 04:53:47', '4513513', 116, 'Sales', NULL, 18, 18, '18', '2015-10-09 10:24:23', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(49, '2015-10-09 04:55:08', '02451254', 108, 'Inquiry', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(50, '2015-10-09 04:56:03', '2563589', 51, 'Tickets', NULL, 18, 18, '18', '2015-10-09 11:48:52', 15, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(51, '2015-10-09 07:20:51', '1212', 119, 'Inquiry', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(52, '2015-10-09 09:06:22', '7777', 122, 'Inquiry', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(53, '2015-10-12 06:25:56', '1212', 119, 'Inquiry', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(54, '2015-10-12 06:26:25', '1212', 119, 'Sales', NULL, 17, 18, '17', '2015-10-16 11:42:31', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(55, '2015-10-12 06:27:06', '4513513', 116, 'Tickets', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(56, '2015-10-12 10:02:52', '1212', 119, 'Inquiry', NULL, 15, 18, '18', '2015-10-12 15:33:01', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(57, '2015-10-12 10:03:28', '980756345', 70, 'Sales', NULL, 18, 18, '18', '2015-10-12 15:33:53', 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(58, '2015-10-12 10:04:51', '1212', 119, 'Tickets', NULL, 15, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, '2015-12-17 04:44:47', NULL),
(59, '2015-10-14 09:15:48', '1212', 119, 'Inquiry', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(60, '2015-10-15 06:32:25', '1212', 119, 'Sales', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(61, '2015-10-15 06:41:37', '1212', 119, 'Sales', NULL, 14, 18, '18', '2015-10-23 14:40:01', 18, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(62, '2015-11-02 07:33:52', '980756345', 70, 'Inquiry', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(63, '2015-11-02 09:28:46', '1212', 119, 'Sales', NULL, 18, 18, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(95, NULL, '1212', 119, 'Inquiry', NULL, 18, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2015-12-16 06:11:48', '2015-12-16 06:11:48'),
(96, NULL, '1212', 119, 'Inquiry', NULL, 18, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2015-12-16 06:16:15', '2015-12-16 06:16:15'),
(97, NULL, '1212', 119, 'Inquiry', NULL, 18, 18, '18', NULL, 15, NULL, NULL, NULL, NULL, 1, NULL, '2015-12-23 08:42:20', '2015-12-16 06:16:46'),
(98, NULL, '12121', 127, 'Sales', NULL, 14, 18, '18', NULL, 15, NULL, NULL, NULL, NULL, 1, NULL, '2015-12-23 08:42:14', '2015-12-16 06:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `call_type`
--

CREATE TABLE `call_type` (
  `id` int(11) NOT NULL,
  `call_type` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `deleted` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `call_type`
--

INSERT INTO `call_type` (`id`, `call_type`, `description`, `deleted`) VALUES
(1, 'new', 'new', 1),
(2, 'new 2', 'new 2 1', 1),
(3, 'Inquiery', 'Inquiery', 0),
(4, 'Support', 'Support', 0),
(5, 'Sales', 'Sales', 0),
(6, '11', '11', 11),
(7, '55', '55', 55),
(8, '55', '55', 55),
(9, '11', '11', 11),
(10, '11', '11', 11),
(11, '11', '11', 11);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `product` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart_tax`
--

CREATE TABLE `cart_tax` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `tax_name` varchar(50) DEFAULT NULL,
  `tax_value` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `description` varchar(30) DEFAULT NULL,
  `owner` varchar(30) DEFAULT NULL,
  `created_time` timestamp NULL DEFAULT NULL,
  `modified_by` varchar(30) DEFAULT NULL,
  `modified_time` timestamp NULL DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `main_id` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `owner`, `created_time`, `modified_by`, `modified_time`, `level`, `main_id`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'text', 'text', '17', '2015-08-21 04:11:52', NULL, NULL, 1, 0, 0, NULL, NULL),
(5, 'new', 'new', '17', '2015-08-21 09:09:05', '18', '2015-09-14 09:32:56', 0, 0, 1, NULL, NULL),
(7, 'tesst', 'test 2', '18', '2015-09-23 03:59:22', NULL, NULL, 2, 0, 0, NULL, NULL),
(8, 'test sub', 'sub', '18', '2015-09-23 04:34:03', NULL, NULL, 2, 1, 0, NULL, NULL),
(9, 'test main', 'main', '18', '2015-09-23 04:34:33', NULL, NULL, 1, 0, 0, NULL, NULL),
(10, 'test sub 2', 'sub 2', '18', '2015-09-23 04:34:49', '18', '2015-09-23 04:36:32', 2, 9, 0, NULL, NULL),
(11, '', 'test', '18', '2015-10-08 05:39:17', '18', NULL, 0, 0, 1, NULL, '2015-12-23 08:33:12'),
(12, 'laravel test 1', 'laravel', '18', NULL, '18', NULL, 1, 0, 0, '2015-12-18 07:49:41', '2015-12-18 08:27:57'),
(13, 'laravel test', 'sub', '18', NULL, NULL, NULL, 2, 12, 0, '2015-12-18 07:49:58', '2015-12-18 07:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `contact_firstname` varchar(45) DEFAULT NULL COMMENT 'Contact',
  `contact_lastname` varchar(45) DEFAULT NULL COMMENT 'Last Name',
  `contact_title` varchar(10) DEFAULT NULL COMMENT 'Title',
  `contact_gender` varchar(6) DEFAULT NULL COMMENT 'Gender',
  `contact_email1` varchar(100) DEFAULT NULL COMMENT 'Email',
  `contact_no` varchar(30) DEFAULT NULL COMMENT 'Contact Number',
  `contact_mobile2` varchar(30) DEFAULT NULL COMMENT 'Contact Number 2',
  `contact_work_phone` varchar(15) DEFAULT NULL COMMENT 'Work Phone',
  `contact_work_fax` varchar(15) DEFAULT NULL COMMENT 'Work Fax',
  `account_id` int(11) DEFAULT NULL COMMENT 'Account',
  `contact_address_number` varchar(10) DEFAULT NULL COMMENT 'Address Number',
  `contact_address_street` varchar(45) DEFAULT NULL COMMENT 'Address Street',
  `contact_address_city` varchar(45) DEFAULT NULL COMMENT 'Address City',
  `contact_address_district` varchar(45) DEFAULT NULL COMMENT 'Address District',
  `contact_shipping_address_number` varchar(45) DEFAULT NULL COMMENT 'Shipping Address Number',
  `contact_shipping_address_street` varchar(45) DEFAULT NULL COMMENT 'Shipping Address Street',
  `contact_shipping_address_city` varchar(45) DEFAULT NULL COMMENT 'Shipping Address City',
  `contact_shipping_address_district` varchar(45) DEFAULT NULL COMMENT 'Shipping Address District',
  `contact_category` varchar(30) DEFAULT NULL COMMENT 'Contact Category',
  `assignedto` varchar(30) DEFAULT NULL COMMENT 'Contact Assign',
  `contact_work_companyname` varchar(45) DEFAULT NULL COMMENT 'Work Company Name',
  `contact_work_address_number` text COMMENT 'Work Address Number',
  `contact_work_address_street` text COMMENT 'Work Address Street',
  `contact_work_address_city` text COMMENT 'Work Address City',
  `contact_work_address_district` text COMMENT 'Work Address District',
  `contact_work_email` varchar(45) DEFAULT NULL COMMENT 'Work Email',
  `contact_work_department` varchar(45) DEFAULT NULL COMMENT 'Work Department',
  `designation` varchar(50) DEFAULT NULL COMMENT 'Designation ',
  `contact_owner` int(11) DEFAULT NULL COMMENT 'Owner',
  `contact_modified_by` varchar(11) DEFAULT NULL COMMENT 'Modified By',
  `contact_birthday` varchar(45) DEFAULT NULL COMMENT 'Birthday',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `contact_report_to` varchar(30) DEFAULT NULL COMMENT 'Report To',
  `group_id` int(11) DEFAULT NULL COMMENT 'Group',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact_firstname`, `contact_lastname`, `contact_title`, `contact_gender`, `contact_email1`, `contact_no`, `contact_mobile2`, `contact_work_phone`, `contact_work_fax`, `account_id`, `contact_address_number`, `contact_address_street`, `contact_address_city`, `contact_address_district`, `contact_shipping_address_number`, `contact_shipping_address_street`, `contact_shipping_address_city`, `contact_shipping_address_district`, `contact_category`, `assignedto`, `contact_work_companyname`, `contact_work_address_number`, `contact_work_address_street`, `contact_work_address_city`, `contact_work_address_district`, `contact_work_email`, `contact_work_department`, `designation`, `contact_owner`, `contact_modified_by`, `contact_birthday`, `deleted`, `contact_report_to`, `group_id`, `updated_at`, `created_at`) VALUES
(16, 'erferfre', 'rferfer', 'Mr', 'male', '', '996865544', '', '123', '123', NULL, '1', '1', '', '', '', '', '', '', '', '', 'text2', '', '', '', '', 'asa@ssd.com', '', NULL, 18, 'admin', '', 1, '', 16, NULL, NULL),
(19, 'test a', 'b', 'Mr', 'male', '', '7878', '1', '123', '123', 21, '11', 'q', 'w', 'e', '', '', '', '', '', '15', 'text2', '', '', '', '', 'asa@ssd.com', '', NULL, 18, 'admin', '', 0, '19', 16, NULL, NULL),
(43, 'tttt', 'ttt', 'Mr', NULL, NULL, '6852587011', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 'admin', NULL, 1, '', 16, NULL, NULL),
(44, 'tttt', 'ttt', 'Mr', NULL, NULL, '6852587012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, '', 16, NULL, NULL),
(45, 'tttt', 'ttt', 'Mr', NULL, NULL, '6852587013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, '', 16, NULL, NULL),
(46, 'tttt', 'ttt', 'Mr', NULL, NULL, '6852587014', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, '', 16, NULL, NULL),
(47, 'tttt', 'ttt', 'Mr', NULL, NULL, '6852587018', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, '', 16, NULL, NULL),
(48, 'tttt', 'ttt', 'Mr', NULL, NULL, '6852587019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, '', 16, NULL, NULL),
(49, '', '', 'Mr', NULL, NULL, '525485', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 1, '', 16, NULL, NULL),
(50, 'new', '', '', 'male', '', '556451545665484', '', '', '', 21, '', '', '', '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', '', NULL, 18, 'admin', '', 1, '', 16, NULL, NULL),
(51, 'wewswe', '', '', 'male', '', '2563589', '', '', '', 21, '', '', '', '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', '', NULL, 18, 'admin', '', 0, '', 16, NULL, NULL),
(52, '', '', 'Mr', NULL, NULL, '52364', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 1, '', 16, NULL, NULL),
(53, 'tttttt', '', '', 'male', '', '255658545456', '', '', '', 21, '', '', '', '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', '', NULL, 18, 'admin', '', 1, '', 16, NULL, NULL),
(54, '', '', 'Mr', NULL, NULL, '54565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 1, '', 16, NULL, NULL),
(55, 'w', '', 'Mr', NULL, NULL, '65564165', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, '', 16, NULL, NULL),
(57, 'rt', '', 'Mr', NULL, NULL, '78', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, '', 16, NULL, NULL),
(58, 'er', '', 'Mr', NULL, NULL, '545', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, '', 16, NULL, NULL),
(59, 'rty', '', 'Mr', NULL, NULL, '567', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, '', 16, NULL, NULL),
(60, 'rew', '', 'Mr', NULL, NULL, '456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, '', 16, NULL, NULL),
(61, 'qsdwed', '', 'Mr', NULL, NULL, '4532', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, '', 16, NULL, NULL),
(62, 'rg', '', 'Mr', NULL, NULL, '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, '', 16, NULL, NULL),
(63, '', '', 'Mr', NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 1, '', 16, NULL, NULL),
(65, 'za', '', 'Mr', NULL, NULL, '13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, '', 16, NULL, NULL),
(66, '', '', 'Mr', NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 1, '', 16, NULL, NULL),
(67, 't', 't', 'Mr', 'male', '', '2', '3', '', '', NULL, '', '', '', '', '', '', '', '', '', '', 'eeeee', '', '', '', '', '', '', NULL, 18, 'admin', '', 0, '43', 16, NULL, NULL),
(70, 'yyyyy', '', 'Mr', 'male', '', '980756345', '1', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 18, 'admin', '', 0, '', 16, NULL, NULL),
(71, 'yts', '', 'Mr', 'male', '', '2569853265', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 18, 'admin', '', 1, '', 16, NULL, NULL),
(72, 'ttaa', '', 'Mr', 'male', '', '342', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 18, 'admin', '', 1, '', 16, NULL, NULL),
(73, 'ttaa', '', 'Mr', 'male', '', '3422', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 18, 'admin', '', 1, '', 16, NULL, NULL),
(74, 'uu', '', 'Mr', 'male', '', '8585', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 18, 'admin', '', 1, '', 16, NULL, NULL),
(75, 'tyrt', '', 'Mr', 'male', '', '5265465', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 18, NULL, '', 0, '', 16, NULL, NULL),
(76, 'rrrrrr', '', 'Mr', 'male', '', '5265466', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 18, 'admin', '', 1, '', 16, NULL, NULL),
(77, 'hhhhh', '', 'Mr', 'male', '', '4636', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 18, NULL, '', 0, '', 16, NULL, NULL),
(78, 'vvvv', '', 'Mr', 'male', '', '4326789023', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 18, 'admin', '', 1, '', 16, NULL, NULL),
(79, 'fffff', '', 'Mr', 'male', '', '23412', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 18, NULL, '', 0, '', 16, NULL, NULL),
(81, 'hhhh', '', 'Mr', 'male', '', '074125', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 18, NULL, '', 0, '', 16, NULL, NULL),
(82, 'paw', 'w', 'Mr', 'male', '', '4532', '2', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 18, NULL, '', 0, '', 16, NULL, NULL),
(83, 'tre', '', 'Mr', 'male', '', '4532', '2', '', '', NULL, '', '', '', '', '', '', '', '', '', '', 'eeeee', '', '', '', '', '', '', NULL, 18, 'admin', '', 0, '65', 16, NULL, NULL),
(84, 'fdew', '', 'Mr', 'male', '', '4533', '3', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 18, 'admin', '', 1, '', 16, NULL, NULL),
(89, 'hf', 'hf', 'Mr', 'male', '', '987', '', '', '', NULL, '', 'Havelock', 'colombo', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 18, 'admin', '', 0, '', 16, NULL, NULL),
(90, 'New', '', 'Mr', 'male', '', '654', '1', '123', '123', NULL, '', '', 'Colombo', '', '', '', '', '', '', '', 'text2', '', '', '', '', 'asa@ssd.com', '', NULL, 18, 'admin', '', 0, '71', 16, NULL, NULL),
(91, 'tr', 'tr', 'Mr', NULL, NULL, '6524', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, NULL, 16, NULL, NULL),
(92, 'mh', 'mh', 'Mr', NULL, NULL, '951', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, NULL, 16, NULL, NULL),
(93, 'e1', 'e1', 'Mr', 'male', '', '45545656', '', '123', '123', NULL, '', '', '', '', '', '', '', '', '', '', 'text2', '', '', '', '', 'asa@ssd.com', '', NULL, 18, NULL, '', 0, '', 16, NULL, NULL),
(94, 'h', 'hh', 'Mr', NULL, NULL, '54236', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, NULL, 16, NULL, NULL),
(95, 'm', 'mm', 'Mr', NULL, NULL, '5628', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, NULL, 16, NULL, NULL),
(96, 'tre', 'wq', 'Mr', 'male', '', '56823', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '15', '', '', '', '', '', '', '', NULL, 18, 'admin', '', 0, '', 16, NULL, NULL),
(97, 'bg', 'ed', 'Mr', NULL, NULL, '525478', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, NULL, 16, NULL, NULL),
(98, 'new', 'p', 'Mr', 'male', '', '963', '4', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 18, 'admin', '', 0, '', 16, NULL, NULL),
(99, 'w', 'ww', 'Mr', 'male', '', '687', '4', '', '', NULL, '', '', 'colombo 11', '', '', '', '', '', '', '17', '', '', '', '', '', '', '', NULL, 18, 'ee', '', 0, '', 16, NULL, NULL),
(100, 'rdw', 'qas', 'Mr', 'male', '', '984', '', '', '', NULL, '', '', 'colombo 6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 18, 'admin', '', 0, '', 16, NULL, NULL),
(101, 't 2', 'w', 'Mr', 'male', '', '9854', '2', '', '', NULL, '', '', 'colombo 5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 18, 'admin', '', 0, '', 16, NULL, NULL),
(102, 'qwsa', 'aswq', 'Mr', 'male', '', '3254', '', '', '', NULL, '', '', 'colombo 6', '', '', '', '', '', '', '17', '', '', '', '', '', '', '', NULL, 18, 'ee', '', 0, '', 15, NULL, NULL),
(103, 'test', '', 'Mr', 'male', '', '4316', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 18, 'admin', '', 1, '', 16, NULL, NULL),
(104, 'vvvvvvv', 'vvvv', 'Mr', 'male', '', '4356', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '14', '', '', '', '', '', '', '', NULL, 18, 'ee', '', 1, '', 15, NULL, NULL),
(105, 'ccvcvd', '', 'Mr', 'male', '', '3446323', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '21', '', '', '', '', '', '', '', NULL, 18, 'admin', '', 1, '', 15, NULL, NULL),
(106, '', '', 'Mr', NULL, NULL, '99999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(107, 'sdsds', '', 'Mr', 'male', '', '546', '', '3232', '3232', NULL, '', '', '', '', '', '', '', '', '', '17', 'dsd', '', '', '', '', '', '', NULL, 0, NULL, '', 0, '57', 15, NULL, NULL),
(108, 'new', 'new', 'Mr', NULL, NULL, '02451254', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, NULL, NULL, 0, NULL, 14, NULL, NULL),
(109, 'test 3', 'test 3', 'Mr', 'male', '', '65987', '', '', '', NULL, '', '', '', '', '', '', '', 'colombo', '', '17', '', '', '', '', '', '', '', NULL, 0, NULL, '', 0, '', 15, NULL, NULL),
(110, 'test 4', 'test 4', 'Mr', NULL, NULL, '32168', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, NULL, NULL, 0, NULL, 14, NULL, NULL),
(111, 'ew', 'ew', 'Miss', 'male', '', '5268', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '17', '', '', '', '', '', '', '', NULL, 17, 'ee', '', 0, '', 14, NULL, NULL),
(112, 'fdfefge', '', 'Mr', 'male', '', '2312', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '17', '', '', '', '', '', '', '', NULL, 0, NULL, '', 0, '', 15, NULL, NULL),
(113, 'dwsds', '', 'Mr', 'male', '', '12323', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '17', '', '', '', '', '', '', '', NULL, 0, NULL, '', 0, '', 15, NULL, NULL),
(114, 'rrr', '', 'Mrs', 'male', '', '1213', '', '123', '123', NULL, '', '', '', '', '', '', '', '', '', '17', 'text2', '', '', '', '', 'asa@ssd.com', '', NULL, 17, 'ee', '', 1, '', 15, NULL, NULL),
(115, 'ttt', '', 'Mr', 'male', '', '4561655', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '29', '', '', '', '', '', '', '', NULL, 18, 'admin', '', 0, '', 15, NULL, NULL),
(116, 'nre', '', 'Mr', 'male', '', '4513513', '', '1', '1', 25, '', '', '', '', '', '', '', '', '', '29', '11', '1', '1', '1', '1', '', '', NULL, 18, 'admin', '', 0, '', 15, NULL, NULL),
(117, 'bbbbbb', '', 'Mr', 'male', '', '1357', '', '1', '1', 25, '', '', '', '', '', '', '', '', '8', '29', '11', '1', '1', '1', '1', '', '', NULL, 18, 'admin', '', 0, '', 15, NULL, NULL),
(118, 'bad', '', 'Mr', 'male', '', '14678', '', '', '', 0, '', '', '', '', '', '', '', '', '1', '15', '', '', '', '', '', '', '', NULL, 18, 'admin', '', 0, '', 15, NULL, NULL),
(119, 'test ', 'new', 'Mr', 'male', '', '1212', '', '123', '123', 24, '', '', '', '', '', '', '', '', '8', ' 18', 'text2', '', '', '', '', '', '', '', 18, 'admin', '', 0, '', 15, '2015-12-08 04:24:02', NULL),
(127, 'ttttttttttt', 'ttttttt', 'Mr', NULL, NULL, '12121', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, '18', NULL, 1, NULL, 15, '2015-12-23 08:45:53', '2015-12-16 06:30:22'),
(128, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, NULL, NULL, '2015-12-28 08:43:49', '2015-12-28 08:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `contact_category`
--

CREATE TABLE `contact_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  `created_time` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_time` timestamp NULL DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_category`
--

INSERT INTO `contact_category` (`id`, `name`, `description`, `owner`, `created_time`, `modified_by`, `modified_time`, `deleted`, `created_at`, `updated_at`) VALUES
(8, 'text 2', 'test', 18, '2015-09-22 05:21:39', 18, '2015-09-22 05:51:05', 0, NULL, NULL),
(9, 'test 4', '', 18, '2015-09-22 06:44:02', 18, '2015-09-22 07:38:18', 0, NULL, NULL),
(14, 'laravel 1', 'laravel 1', 18, NULL, 18, NULL, 1, '2015-12-22 11:59:05', '2015-12-23 08:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `crm_log`
--

CREATE TABLE `crm_log` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `table` varchar(50) NOT NULL,
  `field_id` varchar(50) NOT NULL,
  `action` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crm_log`
--

INSERT INTO `crm_log` (`id`, `user`, `table`, `field_id`, `action`, `time`) VALUES
(34, 0, 'logging attempt', '::1', 'ee', '2015-10-09 09:48:17'),
(35, 17, 'logging attempt', '::1', 'admin', '2015-10-09 10:09:08'),
(36, 18, 'users', '18', 'password changed', '2015-10-09 10:09:31'),
(37, 18, 'ticket', '18', 'update', '2015-10-09 10:58:27'),
(38, 18, 'ticket', '18', 'update', '2015-10-09 10:58:39'),
(39, 18, 'ticket', '18', 'update', '2015-10-09 10:58:44'),
(40, 18, 'ticket_category', '5', 'insert', '2015-10-09 11:57:05'),
(41, 0, 'logging attempt', '::1', 'admin', '2015-10-12 03:56:33'),
(42, 18, 'call_log', '53', 'insert', '2015-10-12 06:25:56'),
(43, 18, 'inquiry', '124', 'insert', '2015-10-12 06:25:56'),
(44, 18, 'call_log', '54', 'insert', '2015-10-12 06:26:25'),
(45, 18, 'sales', '40', 'insert', '2015-10-12 06:26:25'),
(46, 18, 'call_log', '55', 'insert', '2015-10-12 06:27:06'),
(47, 18, 'ticket', '20', 'insert', '2015-10-12 06:27:06'),
(48, 18, 'ticket', '20', 'update', '2015-10-12 07:47:45'),
(49, 18, 'users', '17', 'update', '2015-10-12 07:54:57'),
(50, 18, 'call_log', '56', 'insert', '2015-10-12 10:02:52'),
(51, 18, 'inquiry', '125', 'insert', '2015-10-12 10:02:52'),
(52, 18, 'call_log', '56', 'update', '2015-10-12 10:03:01'),
(53, 18, 'inquiry', '125', 'update', '2015-10-12 10:03:01'),
(54, 18, 'call_log', '57', 'insert', '2015-10-12 10:03:28'),
(55, 18, 'sales', '41', 'insert', '2015-10-12 10:03:28'),
(56, 18, 'call_log', '57', 'update', '2015-10-12 10:03:53'),
(57, 18, 'sales', '57', 'update', '2015-10-12 10:03:53'),
(58, 18, 'call_log', '58', 'insert', '2015-10-12 10:04:51'),
(59, 18, 'ticket', '21', 'insert', '2015-10-12 10:04:51'),
(60, 18, 'sales', '42', 'insert', '2015-10-13 11:32:35'),
(61, 18, 'sales', '43', 'insert', '2015-10-13 11:33:43'),
(62, 18, 'sales', '44', 'insert', '2015-10-13 11:34:54'),
(63, 18, 'sales', '45', 'insert', '2015-10-13 11:36:33'),
(64, 18, 'sales', '46', 'insert', '2015-10-13 11:43:32'),
(65, 18, 'sales', '47', 'insert', '2015-10-13 11:48:35'),
(66, 18, 'sales', '47', 'update', '2015-10-14 08:37:26'),
(67, 18, 'sales', '47', 'update', '2015-10-14 08:37:41'),
(68, 18, 'tax', '6', 'insert', '2015-10-14 09:00:04'),
(69, 18, 'sales', '48', 'insert', '2015-10-14 09:02:08'),
(70, 18, 'sales', '49', 'insert', '2015-10-14 09:09:58'),
(71, 18, 'call_log', '59', 'insert', '2015-10-14 09:15:48'),
(72, 18, 'inquiry', '126', 'insert', '2015-10-14 09:15:48'),
(73, 18, 'call_log', '60', 'insert', '2015-10-15 06:32:25'),
(74, 18, 'sales', '48', 'insert', '2015-10-15 06:32:25'),
(75, 18, 'sales', '49', 'insert', '2015-10-15 06:36:41'),
(76, 18, 'call_log', '61', 'insert', '2015-10-15 06:41:37'),
(77, 18, 'sales', '50', 'insert', '2015-10-15 06:41:37'),
(78, 18, 'sales', '50', 'update', '2015-10-16 05:06:41'),
(79, 18, 'ticket', '21', 'update', '2015-10-16 05:07:09'),
(80, 18, 'users', '17', 'update', '2015-10-16 05:43:27'),
(81, 17, 'call_log', '11', 'update', '2015-10-16 06:12:12'),
(82, 17, 'inquiry', '111', 'update', '2015-10-16 06:12:12'),
(83, 17, 'call_log', '54', 'update', '2015-10-16 06:12:31'),
(84, 17, 'sales', '54', 'update', '2015-10-16 06:12:31'),
(85, 18, 'ticket', '21', 'update', '2015-10-19 07:39:51'),
(86, 18, 'contacts', '63', 'delete', '2015-10-19 08:33:54'),
(87, 18, 'contacts', '49', 'delete', '2015-10-19 08:33:59'),
(88, 18, 'contacts', '52', 'delete', '2015-10-19 08:34:03'),
(89, 18, 'contacts', '54', 'delete', '2015-10-19 08:34:06'),
(90, 18, 'contacts', '66', 'delete', '2015-10-19 08:34:19'),
(91, 0, 'logging attempt', '::1', 'eeee', '2015-10-21 08:14:44'),
(92, 0, 'logging attempt', '::1', 'rrr', '2015-10-21 08:19:05'),
(93, 0, 'logging attempt', '::1', 'hdfhdf', '2015-10-21 08:21:15'),
(94, 17, 'call_log', '61', 'update', '2015-10-21 08:23:02'),
(95, 17, 'sales', '61', 'update', '2015-10-21 08:23:02'),
(96, 17, ' ', ' ', 'User Logout', '2015-10-21 08:28:51'),
(97, 17, ' ', ' ', 'User Logout', '2015-10-21 08:29:17'),
(98, 17, ' ', ' ', 'User Login', '2015-10-21 08:30:14'),
(99, 17, ' ', ' ', 'User Login', '2015-10-21 09:36:44'),
(100, 17, ' ', ' ', 'User Logout', '2015-10-21 09:38:37'),
(101, 17, ' ', ' ', 'User Login', '2015-10-21 09:42:13'),
(102, 17, ' ', ' ', 'User Logout', '2015-10-21 09:46:08'),
(103, 18, ' ', ' ', 'User Login', '2015-10-22 03:31:19'),
(104, 18, ' ', ' ', 'User Logout', '2015-10-22 04:48:38'),
(105, 17, ' ', ' ', 'User Login', '2015-10-22 04:48:40'),
(106, 18, ' ', ' ', 'User Login', '2015-10-22 04:49:05'),
(107, 17, ' ', ' ', 'User Logout', '2015-10-22 04:50:23'),
(108, 17, ' ', ' ', 'User Login', '2015-10-22 04:50:25'),
(109, 17, ' ', ' ', 'User Login', '2015-10-22 04:50:57'),
(110, 17, ' ', ' ', 'User Logout', '2015-10-22 04:51:00'),
(111, 17, ' ', ' ', 'User Login', '2015-10-22 04:57:26'),
(112, 17, ' ', ' ', 'User Logout', '2015-10-22 04:57:29'),
(113, 17, 'logging attempt', '::1', '', '2015-10-22 05:06:34'),
(114, 18, ' ', ' ', 'User Logout', '2015-10-22 05:06:37'),
(115, 18, ' ', ' ', 'User Login', '2015-10-22 05:06:45'),
(116, 17, ' ', ' ', 'User Login', '2015-10-22 05:06:58'),
(117, 17, ' ', ' ', 'User Logout', '2015-10-22 05:31:02'),
(118, 0, 'logging attempt', '::1', 'ee', '2015-10-22 05:31:10'),
(119, 17, ' ', ' ', 'User Login', '2015-10-22 05:31:30'),
(120, 17, ' ', ' ', 'User Logout', '2015-10-22 05:32:21'),
(121, 17, ' ', ' ', 'User Login', '2015-10-22 05:32:23'),
(122, 17, ' ', ' ', 'User Login', '2015-10-22 05:49:27'),
(123, 18, ' ', ' ', 'User Login', '2015-10-22 06:40:46'),
(124, 18, ' ', ' ', 'User Logout', '2015-10-22 06:40:47'),
(125, 18, ' ', ' ', 'User Login', '2015-10-22 06:41:32'),
(126, 18, ' ', ' ', 'User Logout', '2015-10-22 06:41:36'),
(127, 18, ' ', ' ', 'User Logout', '2015-10-22 06:41:39'),
(128, 17, ' ', ' ', 'User Login', '2015-10-22 06:41:41'),
(129, 17, 'logging attempt 1', '::1', 'ee', '2015-10-22 06:42:05'),
(130, 17, 'logging attempt 1', '::1', 'ee', '2015-10-22 07:23:25'),
(131, 18, ' ', ' ', 'User Login', '2015-10-22 07:23:42'),
(132, 17, ' ', ' ', 'User Login', '2015-10-22 07:23:58'),
(133, 18, ' ', ' ', 'User Logout', '2015-10-22 07:33:40'),
(134, 17, ' ', ' ', 'User Login', '2015-10-22 07:33:41'),
(135, 17, ' ', ' ', 'User Logout', '2015-10-22 07:33:50'),
(136, 18, ' ', ' ', 'User Login', '2015-10-22 07:33:54'),
(137, 17, ' ', ' ', 'User Logout', '2015-10-22 07:34:23'),
(138, 17, ' ', ' ', 'User Login', '2015-10-22 07:34:24'),
(139, 18, 'sales', '50', 'update', '2015-10-22 07:35:22'),
(140, 17, ' ', ' ', 'User Logout', '2015-10-22 07:39:36'),
(141, 17, ' ', ' ', 'User Login', '2015-10-22 07:39:37'),
(142, 17, ' ', ' ', 'User Logout', '2015-10-22 07:50:56'),
(143, 17, ' ', ' ', 'User Login', '2015-10-22 07:50:59'),
(144, 17, ' ', ' ', 'User Logout', '2015-10-22 08:07:08'),
(145, 17, ' ', ' ', 'User Login', '2015-10-22 08:07:10'),
(146, 18, ' ', ' ', 'User Login', '2015-10-23 03:01:41'),
(147, 18, 'sales', '50', 'update', '2015-10-23 05:43:04'),
(148, 18, 'call_log', '61', 'update', '2015-10-23 09:01:51'),
(149, 18, 'sales', '61', 'update', '2015-10-23 09:01:51'),
(150, 18, 'call_log', '61', 'update', '2015-10-23 09:10:01'),
(151, 18, 'sales', '61', 'update', '2015-10-23 09:10:01'),
(152, 18, ' ', ' ', 'User Login', '2015-10-28 03:35:58'),
(153, 18, ' ', ' ', 'User Logout', '2015-10-28 03:53:56'),
(154, 18, ' ', ' ', 'User Login', '2015-10-28 03:56:51'),
(155, 18, ' ', ' ', 'User Logout', '2015-10-28 03:56:56'),
(156, 0, 'logging attempt', '::1', 'sadmin', '2015-10-28 03:56:59'),
(157, 0, 'logging attempt', '::1', 'sadmin', '2015-10-28 04:04:30'),
(158, 18, ' ', ' ', 'User Login', '2015-10-28 04:04:32'),
(159, 18, ' ', ' ', 'User Logout', '2015-10-28 04:07:54'),
(160, 18, ' ', ' ', 'User Login', '2015-10-28 04:53:47'),
(161, 18, ' ', ' ', 'User Login', '2015-10-28 07:40:48'),
(162, 18, ' ', ' ', 'User Logout', '2015-10-28 07:40:58'),
(163, 18, ' ', ' ', 'User Login', '2015-10-28 07:41:00'),
(164, 18, ' ', ' ', 'User Logout', '2015-10-28 07:41:11'),
(165, 18, ' ', ' ', 'User Login', '2015-10-28 07:41:12'),
(166, 18, ' ', ' ', 'User Logout', '2015-10-28 07:53:02'),
(167, 18, ' ', ' ', 'User Login', '2015-10-28 07:53:03'),
(168, 18, ' ', ' ', 'User Logout', '2015-10-28 07:55:39'),
(169, 18, ' ', ' ', 'User Login', '2015-10-28 07:55:40'),
(170, 18, ' ', ' ', 'User Login', '2015-10-28 08:02:06'),
(171, 18, ' ', ' ', 'User Logout', '2015-10-28 08:02:16'),
(172, 18, ' ', ' ', 'User Login', '2015-10-28 08:02:18'),
(173, 0, ' ', ' ', 'User Logout', '2015-10-28 10:22:24'),
(174, 18, ' ', ' ', 'User Login', '2015-10-28 10:34:54'),
(175, 18, ' ', ' ', 'User Login', '2015-10-28 11:31:55'),
(176, 18, ' ', ' ', 'User Logout', '2015-10-28 11:36:46'),
(177, 0, 'logging attempt', '::1', 's_admin', '2015-10-28 11:36:52'),
(178, 18, ' ', ' ', 'User Login', '2015-10-28 11:37:19'),
(179, 18, ' ', ' ', 'User Logout', '2015-10-28 11:37:41'),
(180, 18, ' ', ' ', 'User Login', '2015-10-28 11:37:45'),
(181, 18, 'logging attempt', '::1', 'admin', '2015-10-28 11:41:00'),
(182, 18, ' ', ' ', 'User Login', '2015-10-28 11:41:04'),
(183, 18, ' ', ' ', 'User Login', '2015-10-29 06:08:32'),
(184, 18, ' ', ' ', 'User Logout', '2015-10-29 08:28:17'),
(185, 18, ' ', ' ', 'User Login', '2015-10-29 08:57:05'),
(186, 18, ' ', ' ', 'User Login', '2015-10-29 09:55:38'),
(187, 18, ' ', ' ', 'User Logout', '2015-10-29 09:59:00'),
(188, 18, ' ', ' ', 'User Login', '2015-10-29 09:59:11'),
(189, 18, ' ', ' ', 'User Logout', '2015-10-29 10:06:45'),
(190, 18, ' ', ' ', 'User Login', '2015-10-29 10:18:15'),
(191, 18, ' ', ' ', 'User Logout', '2015-10-29 10:30:12'),
(192, 18, ' ', ' ', 'User Login', '2015-10-29 11:00:16'),
(193, 18, ' ', ' ', 'User Logout', '2015-10-29 11:13:09'),
(194, 18, ' ', ' ', 'User Login', '2015-10-30 03:09:25'),
(195, 18, ' ', ' ', 'User Logout', '2015-10-30 03:17:31'),
(196, 18, ' ', ' ', 'User Login', '2015-10-30 05:59:49'),
(197, 18, ' ', ' ', 'User Login', '2015-10-30 10:11:54'),
(198, 18, 'item', '1', 'update', '2015-10-30 10:12:12'),
(199, 18, 'item', '2', 'update', '2015-10-30 10:12:22'),
(200, 18, ' ', ' ', 'User Login', '2015-10-30 11:15:58'),
(201, 18, ' ', ' ', 'User Login', '2015-11-02 03:15:06'),
(202, 18, 'sales', '51', 'insert', '2015-11-02 04:17:45'),
(203, 18, 'sales', '52', 'insert', '2015-11-02 04:18:51'),
(204, 18, 'sales', '53', 'insert', '2015-11-02 04:20:10'),
(205, 18, 'sales', '54', 'insert', '2015-11-02 04:22:15'),
(206, 18, 'call_log', '62', 'insert', '2015-11-02 07:33:52'),
(207, 18, 'inquiry', '127', 'insert', '2015-11-02 07:33:52'),
(208, 18, 'call_log', '63', 'insert', '2015-11-02 09:28:46'),
(209, 18, 'sales', '55', 'insert', '2015-11-02 09:28:46'),
(210, 18, ' ', ' ', 'User Login', '2015-11-03 03:02:10'),
(211, 18, ' ', ' ', 'User Login', '2015-11-04 03:18:13'),
(212, 18, ' ', ' ', 'User Login', '2015-11-18 09:52:00'),
(213, 17, 'logging attempt 1', '::1', 'admin', '2015-11-20 10:15:49'),
(214, 17, 'logging attempt 1', '::1', 'ee', '2015-11-20 10:16:26'),
(215, 18, 'logging attempt ', '::1', 'admin', '2015-11-23 03:42:17'),
(216, 18, 'logging attempt ', '::1', 'admin', '2015-11-23 03:51:42'),
(217, 18, 'logging attempt ', '::1', 'admin', '2015-11-23 03:52:14'),
(218, 18, ' ', ' ', 'User Login', '2015-11-23 05:12:32'),
(219, 18, ' ', ' ', 'User Login', '2015-11-23 05:20:38'),
(220, 18, ' ', ' ', 'User Login', '2015-11-23 05:25:49'),
(221, 18, ' ', ' ', 'User Login', '2015-11-23 06:17:41'),
(222, 18, ' ', ' ', 'User Login', '2015-11-23 07:47:14'),
(223, 18, ' ', ' ', 'User Login', '2015-11-23 08:00:41'),
(224, 18, ' ', ' ', 'User Login', '2015-11-23 08:01:07'),
(225, 18, ' ', ' ', 'User Login', '2015-11-23 08:22:44'),
(226, 18, ' ', ' ', 'User Login', '2015-11-24 03:17:29'),
(227, 18, ' ', ' ', 'User Login', '2015-11-24 03:21:03'),
(228, 18, ' ', ' ', 'User Login', '2015-11-26 07:22:50'),
(229, 0, ' ', ' ', 'rrrrrrrrrrrrrrrrrrrrrrrrrr', '2015-11-26 07:56:55'),
(230, 0, ' ', ' ', 'week', '2015-11-26 07:58:32'),
(231, 0, ' ', ' ', 'week', '2015-11-26 07:59:34'),
(232, 0, ' ', ' ', 'year', '2015-11-26 07:59:35'),
(233, 18, ' ', ' ', 'User Login', '2015-11-26 11:14:37'),
(234, 18, ' ', ' ', 'User Login', '2015-11-27 03:36:27'),
(235, 18, ' ', ' ', 'User Login', '2015-11-27 03:38:12'),
(236, 18, ' ', ' ', 'User Login', '2015-11-27 04:04:25'),
(237, 18, ' ', ' ', 'User Login', '2015-11-27 10:33:34'),
(238, 18, ' ', ' ', 'User Login', '2015-11-30 03:00:19'),
(239, 18, ' ', ' ', 'User Login', '2015-12-01 03:07:26'),
(240, 18, ' ', ' ', 'User Login', '2015-12-01 03:07:30'),
(241, 18, ' ', ' ', 'User Login', '2015-12-02 07:13:14'),
(242, 18, ' ', ' ', 'User Login', '2015-12-02 08:15:18'),
(243, 18, ' ', ' ', 'User Login', '2015-12-03 03:17:21'),
(244, 18, ' ', ' ', 'User Login', '2015-12-03 03:30:20'),
(245, 18, ' ', ' ', 'User Logout', '2015-12-03 03:50:07'),
(246, 18, ' ', ' ', 'User Login', '2015-12-03 03:50:12'),
(247, 18, ' ', ' ', 'User Login', '2015-12-03 10:13:25'),
(248, 18, ' ', ' ', 'User Login', '2015-12-04 03:26:22'),
(249, 18, ' ', ' ', 'User Login', '2015-12-07 03:41:16'),
(250, 18, ' ', ' ', 'User Login', '2015-12-08 04:16:47'),
(251, 18, ' ', ' ', 'User Login', '2015-12-09 03:29:00'),
(252, 18, ' ', ' ', 'User Login', '2015-12-10 03:19:20'),
(253, 18, ' ', ' ', 'User Login', '2015-12-11 03:17:35'),
(254, 18, ' ', ' ', 'User Login', '2015-12-14 03:15:11'),
(255, 18, ' ', ' ', 'User Login', '2015-12-15 03:02:25'),
(256, 18, ' ', ' ', 'User Login', '2015-12-16 03:04:39'),
(257, 18, ' ', ' ', 'User Login', '2015-12-17 03:40:09'),
(258, 18, 'call_log', '97', 'update', '2015-12-17 04:19:52'),
(259, 18, 'inquiry', '133', 'update', '2015-12-17 04:19:52'),
(260, 18, 'call_log', '97', 'update', '2015-12-17 04:20:49'),
(261, 18, 'inquiry', '133', 'update', '2015-12-17 04:20:50'),
(262, 18, 'call_log', '58', 'update', '2015-12-17 04:44:09'),
(263, 18, 'ticket', '21', 'update', '2015-12-17 04:44:09'),
(264, 18, 'call_log', '58', 'update', '2015-12-17 04:44:47'),
(265, 18, 'ticket', '21', 'update', '2015-12-17 04:44:47'),
(266, 18, ' ', ' ', 'User Login', '2015-12-18 03:02:45'),
(267, 18, 'item', '11', 'insert', '2015-12-18 04:53:28'),
(268, 18, 'item', '1', 'update', '2015-12-18 05:44:46'),
(269, 18, 'item', '1', 'update', '2015-12-18 05:44:55'),
(270, 18, 'category', '12', 'insert', '2015-12-18 07:49:41'),
(271, 18, 'category', '13', 'insert', '2015-12-18 07:49:58'),
(272, 18, 'category', '12', 'update', '2015-12-18 08:27:57'),
(273, 18, 'tax', '7', 'insert', '2015-12-18 09:02:31'),
(274, 18, 'tax', '1', 'update', '2015-12-18 09:52:16'),
(275, 18, ' ', ' ', 'User Login', '2015-12-21 03:05:52'),
(276, 18, ' ', ' ', 'User Login', '2015-12-21 03:11:23'),
(277, 18, 'users', '34', 'insert', '2015-12-21 08:17:26'),
(278, 18, 'users', '35', 'insert', '2015-12-21 08:19:45'),
(279, 18, 'users', '36', 'insert', '2015-12-21 09:18:20'),
(280, 18, 'users', '37', 'insert', '2015-12-21 09:20:26'),
(281, 18, 'users', '38', 'insert', '2015-12-21 09:21:07'),
(282, 18, ' ', ' ', 'User Login', '2015-12-22 03:03:47'),
(283, 18, ' ', ' ', 'User Login', '2015-12-22 06:59:56'),
(284, 18, ' ', ' ', 'User Login', '2015-12-22 07:20:27'),
(285, 18, ' ', ' ', 'User Login', '2015-12-22 07:23:00'),
(286, 18, ' ', ' ', 'User Login', '2015-12-22 07:23:11'),
(287, 18, ' ', ' ', 'User Login', '2015-12-22 07:24:02'),
(288, 18, ' ', ' ', 'User Login', '2015-12-22 07:25:13'),
(289, 17, ' ', ' ', 'User Login', '2015-12-22 07:26:17'),
(290, 18, ' ', ' ', 'User Login', '2015-12-22 07:28:41'),
(291, 18, ' ', ' ', 'User Login', '2015-12-22 07:45:27'),
(292, 18, ' ', ' ', 'User Login', '2015-12-22 07:48:26'),
(293, 18, 'groups', '{"group_name":"eee","group_owner":"18","updated_at', 'insert', '2015-12-22 08:55:24'),
(294, 18, 'groups', '{"group_name":"www","group_owner":"18","updated_at', 'insert', '2015-12-22 08:57:17'),
(295, 18, 'groups', '{"group_name":"www","group_owner":"18","updated_at', 'insert', '2015-12-22 08:59:00'),
(296, 18, 'groups', '{"group_name":"www","group_owner":"18","updated_at', 'insert', '2015-12-22 09:02:06'),
(297, 18, 'groups', '32', 'insert', '2015-12-22 09:10:47'),
(298, 18, 'groups', '33', 'insert', '2015-12-22 09:47:32'),
(299, 18, 'groups', '34', 'insert', '2015-12-22 09:54:16'),
(300, 18, 'groups', '34', 'update', '2015-12-22 10:19:06'),
(301, 18, 'groups', '34', 'update', '2015-12-22 10:19:25'),
(302, 18, 'groups', '34', 'update', '2015-12-22 10:19:33'),
(303, 18, 'groups', '34', 'update', '2015-12-22 10:20:51'),
(304, 18, ' ', ' ', 'User Login', '2015-12-23 03:14:46'),
(305, 0, 'ticket_category', '{"category":"fdf","description":"fdf","updated_at"', 'insert', '2015-12-23 04:23:48'),
(306, 18, 'ticket_category', '{"category":"laravel","description":"test","owner"', 'insert', '2015-12-23 04:25:19'),
(307, 18, 'ticket_category', '7', 'update', '2015-12-23 04:45:14'),
(308, 18, 'ticket_category', '{"category":"dsvsdvf","description":"vsvsdv","owne', 'insert', '2015-12-23 06:03:44'),
(309, 18, 'ticket_category', '{"category":"sdsad","description":"dsdsd","owner":', 'insert', '2015-12-23 06:06:49'),
(310, 18, 'users', '34', 'insert', '2015-12-23 06:47:22'),
(311, 18, 'users', '35', 'insert', '2015-12-23 08:06:30'),
(312, 18, 'item', '11', 'update', '2015-12-23 08:23:21'),
(313, 18, ' ', ' ', 'User Login', '2015-12-28 03:19:58'),
(314, 18, ' ', ' ', 'User Login', '2015-12-29 03:22:04'),
(315, 17, ' ', ' ', 'User Login', '2015-12-29 05:32:12'),
(316, 18, ' ', ' ', 'User Login', '2015-12-29 07:08:44'),
(317, 17, ' ', ' ', 'User Login', '2015-12-29 07:09:08'),
(318, 18, ' ', ' ', 'User Login', '2015-12-29 07:30:10'),
(319, 18, ' ', ' ', 'User Logout', '2015-12-29 10:04:30'),
(320, 18, ' ', ' ', 'User Login', '2015-12-29 10:04:37'),
(321, 18, ' ', ' ', 'User Logout', '2015-12-29 10:04:40'),
(322, 18, ' ', ' ', 'User Login', '2015-12-29 10:06:49'),
(323, 18, ' ', ' ', 'User Logout', '2015-12-29 11:07:48'),
(324, 17, ' ', ' ', 'User Login', '2015-12-29 11:07:52'),
(325, 17, ' ', ' ', 'User Logout', '2015-12-29 11:08:10'),
(326, 18, ' ', ' ', 'User Login', '2015-12-29 11:08:13'),
(327, 18, ' ', ' ', 'User Login', '2015-12-30 03:44:55'),
(328, 18, ' ', ' ', 'User Login', '2015-12-31 04:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `currency` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency`, `description`, `status`, `updated_at`, `created_at`) VALUES
(1, 'LKR', NULL, 1, '2015-12-21 09:18:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `group_owner` int(11) NOT NULL,
  `group_created_time` timestamp NULL DEFAULT NULL,
  `group_modified_by` int(11) DEFAULT NULL,
  `group_modified_time` timestamp NULL DEFAULT NULL,
  `group_description` varchar(50) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `group_owner`, `group_created_time`, `group_modified_by`, `group_modified_time`, `group_description`, `deleted`, `created_at`, `updated_at`) VALUES
(15, 'new', 18, '2015-10-07 04:59:15', 18, '2015-10-07 04:59:15', 'all', 0, NULL, NULL),
(16, 'Mobile', 18, '2015-08-06 11:32:24', 18, '2015-10-09 08:04:05', '', 0, NULL, NULL),
(17, 'all', 18, '2015-10-07 04:38:51', 18, '2015-10-09 08:02:51', 'aa', 0, NULL, NULL),
(18, 'abc', 18, '2015-09-16 09:56:08', 18, '2015-10-09 08:00:21', '', 0, NULL, NULL),
(20, 'test ', 18, '2015-10-09 07:56:25', 18, '2015-10-09 07:59:44', 'log', 1, NULL, NULL),
(34, 'ttt 12121', 18, NULL, 18, NULL, 'ttt cc', 1, '2015-12-22 09:54:16', '2015-12-23 08:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `home_page`
--

CREATE TABLE `home_page` (
  `id` int(11) NOT NULL,
  `graph_1` varchar(30) NOT NULL,
  `graph_2` varchar(30) NOT NULL,
  `graph_3` varchar(30) NOT NULL,
  `graph_4` varchar(30) NOT NULL,
  `graph_5` varchar(30) NOT NULL,
  `graph_6` varchar(30) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_page`
--

INSERT INTO `home_page` (`id`, `graph_1`, `graph_2`, `graph_3`, `graph_4`, `graph_5`, `graph_6`, `updated_at`, `created_at`) VALUES
(1, 'pie_rev', 'line_tot_call', 'bar_tot_call', 'bar_rev', 'last_10_act', 'last_10_pen', '2015-12-17 10:28:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `call_log_id` int(11) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `body` varchar(100) DEFAULT NULL,
  `inquiry_end_time` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `call_log_id`, `subject`, `body`, `inquiry_end_time`, `status`, `updated_at`, `created_at`) VALUES
(38, 234, 'g', ' g ', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(39, 235, 'h', '     h     ', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(40, 236, 'e1', ' e1 ', '2015-07-23 07:56:20', 'complete', NULL, NULL),
(44, 240, 'oi', 'mj  ', '2015-07-23 08:10:10', 'complete', NULL, NULL),
(45, 241, 'text', 'text', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(46, 242, 'text', 'text', '2015-07-23 13:10:08', 'complete', NULL, NULL),
(47, 243, 'text', 'text', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(48, 244, 'text', 'text', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(49, 245, 'text', 'text', '2015-07-23 13:12:23', 'complete', NULL, NULL),
(50, 246, 'hi', 'qa', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(51, 247, 'br', 'uy', '2015-07-24 08:28:12', 'complete', NULL, NULL),
(52, 248, 'new', 'new', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(53, 249, 'hh', 'he', '2015-07-27 11:23:33', 'complete', NULL, NULL),
(54, 250, 'poi', ' lkj ', '2015-07-27 11:24:52', 'complete', NULL, NULL),
(55, 251, 't1', 't1', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(56, 252, 'n', '    n    ', '2015-07-27 12:51:30', 'complete', NULL, NULL),
(57, 253, 'zzz', 'zzz', '2015-07-27 13:03:58', 'complete', NULL, NULL),
(58, 254, 'b', 'b', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(59, 255, 'vvv', 'v', '2015-07-28 06:43:47', 'complete', NULL, NULL),
(60, 256, 'swqa', 'aswq', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(61, 257, 'gdfsg', 'grgf', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(62, 258, 'ws', 'sd', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(63, 259, 'vb', '   vc   ', '2015-08-04 05:59:47', 'complete', NULL, NULL),
(64, 263, 'd', 'fe', '2015-08-04 06:06:59', 'complete', NULL, NULL),
(65, 264, 'dwd', 'dwdw', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(66, 265, 'd', 'qa', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(67, 266, '1111111', ' 111111111 ', '2015-08-10 09:01:46', 'complete', NULL, NULL),
(68, 267, 'fffffffffff', '  ffffffffff  ', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(69, 268, 'dd', 'ddd', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(70, 269, 'dd', 'gg', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(71, 270, 'xx', 'xxxxx', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(72, 271, 'gsfgf', 'gdsgdf', '2015-08-12 05:17:04', 'complete', NULL, NULL),
(73, 272, 'fdef', ' fefe ', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(74, 273, 'sds', 'dwdwsd', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(75, 274, 'ggg', 'gtgt', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(76, 275, 'fdsdsd', '   dfedxe   ', '2015-08-19 06:04:17', 'complete', NULL, NULL),
(77, 276, 'nn', ' nnnnn ', '2015-08-14 09:46:13', 'complete', NULL, NULL),
(78, 277, 'u', 'u', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(79, 279, '', '', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(80, 288, 'fef', 'fddf', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(81, 290, 'ff', 'fdfdf', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(82, 291, 'cvc', 'crfcg', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(83, 292, 'drc', 'eedds', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(84, 293, 'dfds', 'fsdf', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(85, 294, 'fdewf', 'fewf', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(86, 295, '', '', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(87, 296, 'gvsf', 'fgrfsdf', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(88, 298, 'gerg', 'gtrgtr', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(89, 299, 'th', 'htht', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(90, 302, 'fwef', 'fwfwe', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(91, 302, 'efd', 'ded', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(92, 304, '5tgf', 'f5tf', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(93, 305, 'w', 'w', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(94, 307, 're', 'fefe', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(95, 308, 're', 'fefe', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(96, 309, 'ds', 'fref', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(97, 310, 'fff', 'eee', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(98, 311, 'ewqe', 'qewee', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(99, 312, 'bbth', 'ththy', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(100, 313, 'fref', 'frfgr', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(101, 314, 'knk', 'jjkkj', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(102, 315, 'dwd', 'ewewewe', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(103, 1, 'ee', 'ee', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(104, 2, 'dwd', 'dwdw', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(105, 3, 'text', '  ', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(106, 4, 'dwd', 'dwd', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(107, 7, 'efe', 'fefe', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(108, 8, 'dwd', ' dwdw ', '2015-09-16 08:46:02', 'complete', NULL, NULL),
(109, 9, 'dd', '  dd  ', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(110, 10, 'dfeqdf', 'fefe', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(111, 11, 'ee', ' ee ', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(112, 16, 'test', ' test ', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(113, 18, 'tst', 'test', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(114, 20, 'test', 'test', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(115, 21, 'test', 'test', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(116, 22, 'test', 'graph test', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(117, 23, 'test', 'test', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(118, 25, 'test', '', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(119, 33, 'test', '  ', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(120, 42, 'text', '1', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(121, 49, 'test', '', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(122, 51, 'test', 'test log', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(123, 52, 'test', 'log', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(124, 53, 'test', 'test', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(125, 56, 'test ', ' group ', '2015-10-12 12:03:01', 'complete', NULL, NULL),
(126, 59, '', '', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(127, 62, 'test', 'test', '0000-00-00 00:00:00', 'pending', NULL, NULL),
(128, 87, 'rr', 'rr', NULL, 'pending', '2015-12-16 05:19:36', '2015-12-16 05:19:36'),
(129, 93, 'dsd', 'dwqdqwd', NULL, 'pending', '2015-12-16 06:06:08', '2015-12-16 06:06:08'),
(130, 94, 'fgsfsd', 'sdff', NULL, 'pending', '2015-12-16 06:10:08', '2015-12-16 06:10:08'),
(131, 95, 'fsffdsf', 'dfsfsdfs', NULL, 'pending', '2015-12-16 06:11:48', '2015-12-16 06:11:48'),
(132, 96, 'fwf', 'fdasfsf', NULL, 'pending', '2015-12-16 06:16:15', '2015-12-16 06:16:15'),
(133, 97, 'fwf ', 'test ', NULL, 'pending', '2015-12-17 04:20:49', '2015-12-16 06:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `description` varchar(60) DEFAULT NULL,
  `owner` varchar(30) DEFAULT NULL,
  `created_time` timestamp NULL DEFAULT NULL,
  `modified_by` varchar(30) DEFAULT NULL,
  `modified_time` timestamp NULL DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `uof` int(11) DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `tax_code` int(11) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `code`, `description`, `owner`, `created_time`, `modified_by`, `modified_time`, `category`, `uof`, `unit_price`, `tax_code`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'gool 1', 4, '1', '17', '2015-08-21 06:13:16', '18', '2015-10-30 10:12:12', '1', 1, 1001, 3, 0, NULL, '2015-12-18 05:44:55'),
(2, 'vaiv', 2, '2', '17', '2015-08-21 06:28:44', '18', '2015-10-30 10:12:22', '1', 2, 200, 1, 0, NULL, NULL),
(3, '1', 1, '1', '17', '2015-08-21 06:50:52', '17', '2015-08-21 06:54:22', '1', 1, 1, 1, 1, NULL, NULL),
(4, 'item', 1, '1', '17', '2015-08-21 11:27:37', '18', '2015-09-14 09:13:21', '1', 1, 150, 1, 1, NULL, NULL),
(5, 'ffff', 2212, '', '18', '2015-09-14 09:17:21', '18', '2015-09-23 06:21:48', '9', 0, 2147483647, 1, 0, NULL, NULL),
(6, 'rwer', 0, '', '18', '2015-09-14 09:17:54', NULL, NULL, '1', 0, 375000, 1, 0, NULL, NULL),
(7, 'test', 0, '', '18', '2015-09-23 08:11:54', '18', '2015-09-23 08:12:11', '1', 0, 13678, 3, 0, NULL, NULL),
(8, 'test', 1, 'log', '18', '2015-10-09 08:46:32', NULL, NULL, '9', 21, 2000, 1, 0, NULL, NULL),
(9, 'laravel test', 0, '', '18', NULL, NULL, NULL, '1', 0, 0, 1, 0, '2015-12-18 04:48:17', '2015-12-18 04:48:17'),
(10, 'laravel test 2', 0, '', '18', NULL, NULL, NULL, '1', 0, 0, 1, 0, '2015-12-18 04:48:54', '2015-12-18 04:48:54'),
(11, 'laravel test 3', 0, '', '18', NULL, '18', NULL, '1', 0, 100, 1, 1, '2015-12-18 04:53:28', '2015-12-23 08:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `page_settings`
--

CREATE TABLE `page_settings` (
  `id` int(11) NOT NULL,
  `column_name` varchar(50) DEFAULT NULL,
  `tablename` varchar(30) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_settings`
--

INSERT INTO `page_settings` (`id`, `column_name`, `tablename`, `status`, `updated_at`, `created_at`) VALUES
(258, 'id', 'call_log', 1, '2015-12-31 07:31:58', '2015-12-31 07:31:58'),
(259, 'call_created_time', 'call_log', 1, '2015-12-31 07:31:58', '2015-12-31 07:31:58'),
(260, 'cli', 'call_log', 1, '2015-12-31 07:31:58', '2015-12-31 07:31:58'),
(261, 'contact_id', 'call_log', 1, '2015-12-31 07:31:58', '2015-12-31 07:31:58'),
(262, 'call_type', 'call_log', 1, '2015-12-31 07:31:58', '2015-12-31 07:31:58'),
(263, 'call_status', 'call_log', 1, '2015-12-31 07:31:58', '2015-12-31 07:31:58'),
(264, 'assignedto', 'call_log', 1, '2015-12-31 07:31:58', '2015-12-31 07:31:58'),
(265, 'call_owner', 'call_log', 1, '2015-12-31 07:31:58', '2015-12-31 07:31:58'),
(266, 'call_modified_by', 'call_log', 1, '2015-12-31 07:31:58', '2015-12-31 07:31:58'),
(267, 'call_modified_time', 'call_log', 1, '2015-12-31 07:31:58', '2015-12-31 07:31:58'),
(268, 'group', 'call_log', 1, '2015-12-31 07:31:58', '2015-12-31 07:31:58'),
(269, 'account', 'call_log', 1, '2015-12-31 07:31:58', '2015-12-31 07:31:58'),
(270, '10', 'call_log', 0, '2015-12-31 07:31:58', '2015-12-31 07:31:58'),
(290, 'contact_firstname', 'contacts', 1, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(291, 'contact_lastname', 'contacts', 1, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(292, 'contact_title', 'contacts', 1, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(293, 'contact_gender', 'contacts', 1, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(294, 'contact_email1', 'contacts', 1, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(295, 'contact_no', 'contacts', 1, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(296, 'contact_work_phone', 'contacts', 1, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(297, 'contact_work_fax', 'contacts', 1, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(298, 'contact_address_number', 'contacts', 1, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(299, 'contact_address_street', 'contacts', 1, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(300, 'contact_address_city', 'contacts', 1, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(301, 'contact_address_district', 'contacts', 1, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(302, 'contact_category', 'contacts', 1, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(303, 'assignedto', 'contacts', 1, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(304, 'contact_owner', 'contacts', 1, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(305, 'contact_modified_by', 'contacts', 1, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(306, 'contact_birthday', 'contacts', 1, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(307, 'contact_report_to', 'contacts', 1, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(308, '10', 'contacts', 0, '2015-12-31 07:33:37', '2015-12-31 07:33:37'),
(324, 'account_name', 'accounts', 1, '2015-12-31 07:34:41', '2015-12-31 07:34:41'),
(325, 'account_type', 'accounts', 1, '2015-12-31 07:34:41', '2015-12-31 07:34:41'),
(326, 'account_industry', 'accounts', 1, '2015-12-31 07:34:41', '2015-12-31 07:34:41'),
(327, 'account_revenue', 'accounts', 1, '2015-12-31 07:34:41', '2015-12-31 07:34:41'),
(328, 'account_telephone', 'accounts', 1, '2015-12-31 07:34:41', '2015-12-31 07:34:41'),
(329, 'account_fax', 'accounts', 1, '2015-12-31 07:34:41', '2015-12-31 07:34:41'),
(330, 'account_email', 'accounts', 1, '2015-12-31 07:34:41', '2015-12-31 07:34:41'),
(331, 'account_address_number', 'accounts', 1, '2015-12-31 07:34:41', '2015-12-31 07:34:41'),
(332, 'account_address_street', 'accounts', 1, '2015-12-31 07:34:41', '2015-12-31 07:34:41'),
(333, 'account_address_city', 'accounts', 1, '2015-12-31 07:34:41', '2015-12-31 07:34:41'),
(334, 'account_address_district', 'accounts', 1, '2015-12-31 07:34:41', '2015-12-31 07:34:41'),
(335, 'owner', 'accounts', 1, '2015-12-31 07:34:41', '2015-12-31 07:34:41'),
(336, 'modified_by', 'accounts', 1, '2015-12-31 07:34:41', '2015-12-31 07:34:41'),
(337, 'assignedto', 'accounts', 1, '2015-12-31 07:34:41', '2015-12-31 07:34:41'),
(338, '10', 'accounts', 0, '2015-12-31 07:34:41', '2015-12-31 07:34:41'),
(345, 'customer_id', 'sales', 1, '2015-12-31 07:35:32', '2015-12-31 07:35:32'),
(346, 'assignedto', 'sales', 1, '2015-12-31 07:35:32', '2015-12-31 07:35:32'),
(347, 'total', 'sales', 1, '2015-12-31 07:35:32', '2015-12-31 07:35:32'),
(348, 'status', 'sales', 1, '2015-12-31 07:35:32', '2015-12-31 07:35:32'),
(349, 'remark', 'sales', 1, '2015-12-31 07:35:32', '2015-12-31 07:35:32'),
(350, '15', 'sales', 0, '2015-12-31 07:35:32', '2015-12-31 07:35:32'),
(351, 'category', 'ticket', 1, '2015-12-31 07:35:36', '2015-12-31 07:35:36'),
(352, 'priority', 'ticket', 1, '2015-12-31 07:35:36', '2015-12-31 07:35:36'),
(353, 'owner', 'ticket', 1, '2015-12-31 07:35:36', '2015-12-31 07:35:36'),
(354, 'modified_by', 'ticket', 1, '2015-12-31 07:35:37', '2015-12-31 07:35:37'),
(355, 'subject', 'ticket', 1, '2015-12-31 07:35:37', '2015-12-31 07:35:37'),
(356, 'problem', 'ticket', 1, '2015-12-31 07:35:37', '2015-12-31 07:35:37'),
(357, 'status', 'ticket', 1, '2015-12-31 07:35:37', '2015-12-31 07:35:37'),
(358, 'assignedto', 'ticket', 1, '2015-12-31 07:35:37', '2015-12-31 07:35:37'),
(359, '10', 'ticket', 0, '2015-12-31 07:35:37', '2015-12-31 07:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `call_log` int(11) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `sales` int(11) DEFAULT NULL,
  `ticket` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `group_id`, `call_log`, `contact`, `account`, `user`, `group`, `sales`, `ticket`, `updated_at`, `created_at`) VALUES
(3, 14, 6, 2, 2, 0, 0, 8, NULL, NULL, NULL),
(4, 15, 7, 7, 7, 0, 0, 8, 4, NULL, NULL),
(5, 16, 8, 8, 8, 0, 0, 0, 0, NULL, NULL),
(6, 17, 6, 8, 8, 0, 0, 8, 0, NULL, NULL),
(7, 18, 8, 8, 8, 0, 0, 4, 0, NULL, NULL),
(8, 19, 8, 8, 8, 8, 0, NULL, NULL, NULL, NULL),
(15, 34, 8, 4, 2, NULL, NULL, 4, 4, '2015-12-22 10:20:51', '2015-12-22 09:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `product_type` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `deleted` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `product_type`, `description`, `deleted`) VALUES
(1, 'new', 'new1', 1),
(2, 'new 2', 'new 2 1', 1),
(3, 'Call Center', 'Call Center', 0),
(4, 'IP PABX', 'IP PABX', 0),
(5, 'e-FAX', 'e-FAX', 0),
(6, 'Chameleon', 'Chameleon', 0),
(7, 'IP Phone', 'IP Phone', 0),
(8, 'Gateway', 'Gateway', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `call_log_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL COMMENT 'Customer',
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL COMMENT 'Owner',
  `modified_by` int(11) DEFAULT NULL COMMENT 'Modified By',
  `assignedto` int(11) DEFAULT NULL COMMENT 'Assigned To',
  `tax` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL COMMENT 'Value',
  `status` varchar(30) DEFAULT NULL COMMENT 'Status',
  `contact_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `remark` varchar(30) DEFAULT NULL COMMENT 'Remark',
  `group_id` int(11) DEFAULT NULL COMMENT 'Group',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Date',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Modified Time'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `call_log_id`, `customer_id`, `category_id`, `product_id`, `qty`, `owner_id`, `modified_by`, `assignedto`, `tax`, `discount`, `total`, `status`, `contact_id`, `account_id`, `date`, `remark`, `group_id`, `deleted`, `created_at`, `updated_at`) VALUES
(17, 5, NULL, NULL, NULL, NULL, 17, NULL, 18, NULL, NULL, 150, 'authorized', NULL, NULL, '0000-00-00', 'test 1', 15, 0, NULL, NULL),
(18, 6, NULL, NULL, NULL, NULL, 17, 18, 18, NULL, NULL, 150, 'authorized', NULL, NULL, '0000-00-00', 'test 1', 15, 0, NULL, NULL),
(22, 12, NULL, NULL, NULL, NULL, 18, 18, 18, NULL, NULL, 2147483647, 'aa', NULL, NULL, '0000-00-00', 'test 1', 15, 0, NULL, NULL),
(23, 0, 46, NULL, NULL, NULL, 18, NULL, 15, NULL, NULL, 1100, 'authorized', NULL, NULL, '0000-00-00', 'new', 16, 0, NULL, NULL),
(24, 13, 19, NULL, NULL, NULL, 18, NULL, 18, NULL, NULL, 2147483647, 'pending', NULL, NULL, '0000-00-00', 'text', 15, 0, NULL, NULL),
(25, 14, 117, NULL, NULL, NULL, 18, NULL, 18, NULL, NULL, 2147483647, 'pending', NULL, NULL, '0000-00-00', 'test 3', 15, 0, NULL, NULL),
(26, 15, 19, NULL, NULL, NULL, 18, 18, 18, NULL, NULL, 2147483647, 'authorized', NULL, NULL, '0000-00-00', 'test 4', 15, 0, NULL, NULL),
(27, 17, 90, NULL, NULL, NULL, 18, 17, 18, NULL, NULL, 2147483647, 'authorized', NULL, NULL, '0000-00-00', 'test', 15, 0, NULL, NULL),
(28, 0, 19, NULL, NULL, NULL, 18, NULL, 18, NULL, NULL, 375000, 'pending', NULL, NULL, '0000-00-00', 'new', 15, 0, NULL, NULL),
(29, 19, 116, NULL, NULL, NULL, 18, 18, 18, NULL, NULL, 2147483647, 'delivered', NULL, NULL, '0000-00-00', '', 15, 0, NULL, NULL),
(30, 0, 51, NULL, NULL, NULL, 18, NULL, 18, NULL, NULL, 2147483647, 'pending', NULL, NULL, '0000-00-00', '', 15, 0, NULL, NULL),
(31, 0, 19, NULL, NULL, NULL, 18, NULL, 18, NULL, NULL, 200, 'authorized', NULL, NULL, '0000-00-00', '', 15, 0, NULL, NULL),
(32, 0, 19, NULL, NULL, NULL, 18, NULL, 18, NULL, NULL, 100, 'authorized', NULL, NULL, '0000-00-00', '', 15, 0, NULL, NULL),
(33, 24, 19, NULL, NULL, NULL, 17, NULL, 15, NULL, NULL, 100, 'authorized', NULL, NULL, '0000-00-00', '', 16, 0, NULL, NULL),
(34, 0, 44, NULL, NULL, NULL, 18, 18, 18, NULL, NULL, 100, 'pending', NULL, NULL, '0000-00-00', 'test', 15, 0, NULL, NULL),
(35, 32, 119, NULL, NULL, NULL, 18, 18, 15, NULL, NULL, 240, 'pending', NULL, NULL, '0000-00-00', 'test 3', 16, 0, NULL, NULL),
(37, 45, 119, NULL, NULL, NULL, 18, NULL, 18, NULL, NULL, 200, 'pending', NULL, NULL, '0000-00-00', 'test', 15, 0, NULL, NULL),
(38, 46, 119, NULL, NULL, NULL, 18, NULL, 18, NULL, NULL, 375000, 'pending', NULL, NULL, '0000-00-00', 'test', 15, 0, NULL, NULL),
(39, 48, 116, NULL, NULL, NULL, 18, 18, 18, NULL, NULL, 375000, 'ready', NULL, NULL, '0000-00-00', 'test', 15, 0, NULL, NULL),
(40, 54, 119, NULL, NULL, NULL, 18, 17, 18, NULL, NULL, 100, 'pending', NULL, NULL, '0000-00-00', 'test', 15, 0, NULL, NULL),
(41, 57, 70, NULL, NULL, NULL, 18, 18, 18, NULL, NULL, 375000, 'pending', NULL, NULL, '0000-00-00', 'test', 15, 0, NULL, NULL),
(42, 0, 19, NULL, NULL, NULL, 18, NULL, 18, NULL, NULL, 562500, 'pending', NULL, NULL, '0000-00-00', 'tax', 15, 0, NULL, NULL),
(43, 0, 19, NULL, NULL, NULL, 18, NULL, 18, NULL, NULL, 562500, 'pending', NULL, NULL, '0000-00-00', '', 15, 0, NULL, NULL),
(44, 0, 0, NULL, NULL, NULL, 18, NULL, 18, NULL, NULL, 16651, 'pending', NULL, NULL, '0000-00-00', 'test tax', 15, 0, NULL, NULL),
(45, 0, 19, NULL, NULL, NULL, 18, NULL, 18, NULL, NULL, 453851, 'pending', NULL, NULL, '0000-00-00', '', 15, 0, NULL, NULL),
(46, 0, 51, NULL, NULL, NULL, 18, NULL, 18, NULL, NULL, 20755, 'pending', NULL, NULL, '0000-00-00', 'test tax', 15, 0, NULL, NULL),
(47, 0, 109, NULL, NULL, NULL, 18, 18, 18, NULL, NULL, 562602, 'pending', NULL, NULL, '0000-00-00', 'test tax', 15, 0, NULL, NULL),
(48, 60, 119, NULL, NULL, NULL, 18, NULL, 18, NULL, NULL, 450000, 'pending', NULL, NULL, '0000-00-00', 'tax test', 15, 0, NULL, NULL),
(49, 0, 122, NULL, NULL, NULL, 18, NULL, 18, NULL, NULL, 300, 'pending', NULL, NULL, '0000-00-00', '', 15, 0, NULL, NULL),
(50, 61, 119, NULL, NULL, NULL, 18, 18, 14, NULL, NULL, 1028, 'authorized', NULL, NULL, '0000-00-00', 'test taxt', 18, 0, NULL, NULL),
(51, 0, 70, NULL, NULL, NULL, 18, NULL, 18, NULL, NULL, 121, 'pending', NULL, NULL, '0000-00-00', 'test graph', 15, 0, NULL, NULL),
(52, 0, 93, NULL, NULL, NULL, 18, NULL, 18, NULL, NULL, 2340, 'pending', NULL, NULL, '0000-00-00', 'test', 15, 0, NULL, NULL),
(53, 0, 45, NULL, NULL, NULL, 18, NULL, 18, NULL, NULL, 791434, 'pending', NULL, NULL, '0000-00-00', '', 15, 0, NULL, NULL),
(54, 0, 98, NULL, NULL, NULL, 18, 18, 18, NULL, NULL, 500000, 'pending', NULL, NULL, '0000-00-00', 'test fgfgfg', 15, 0, NULL, NULL),
(59, 79, 70, NULL, NULL, NULL, 18, NULL, 18, NULL, 0, 122, 'pending', NULL, NULL, '0000-00-00', '16', 15, 0, '2015-12-16 05:00:32', '2015-12-16 05:00:32'),
(60, 81, 70, NULL, NULL, NULL, 18, NULL, 18, NULL, 0, 100, 'pending', NULL, NULL, '0000-00-00', '16', 15, 0, '2015-12-16 05:04:10', '2015-12-16 05:04:10'),
(61, 86, 19, NULL, NULL, NULL, 18, NULL, 18, NULL, 0, 311, 'pending', NULL, NULL, '0000-00-00', '16', 15, 0, '2015-12-16 05:10:06', '2015-12-16 05:10:06'),
(62, 89, 121, NULL, NULL, NULL, 18, NULL, 18, NULL, 0, 200, 'pending', NULL, NULL, '0000-00-00', 'test 16', 15, 0, '2015-12-16 05:50:38', '2015-12-16 05:50:38'),
(63, 91, 123, NULL, NULL, NULL, 18, NULL, 18, NULL, 0, 121, 'pending', NULL, NULL, '0000-00-00', 'test 16', 15, 0, '2015-12-16 05:53:08', '2015-12-16 05:53:08'),
(64, 92, 124, NULL, NULL, NULL, 18, NULL, 18, NULL, 0, 251, 'pending', NULL, NULL, '0000-00-00', 'test 166', 15, 0, '2015-12-16 05:58:48', '2015-12-16 05:58:48'),
(65, 98, 127, NULL, NULL, NULL, 18, 18, 14, NULL, 0, 100, 'posted', NULL, NULL, '2015-12-09', 'tttt 22', 15, 1, '2015-12-16 06:30:22', '2015-12-23 09:19:20');

-- --------------------------------------------------------

--
-- Table structure for table `sales_product`
--

CREATE TABLE `sales_product` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `product` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_product`
--

INSERT INTO `sales_product` (`id`, `category`, `product`, `price`, `sale_id`, `qty`, `tax`, `discount`) VALUES
(1, 5, 2, 200, 6, 1, 10, 20),
(2, 1, 4, 150, 6, 1, 0, 0),
(3, 1, 4, 150, 6, 2, 0, 0),
(4, 5, 2, 200, 6, 2, 0, 0),
(5, 1, 4, 150, 7, 1, 0, 5),
(6, 1, 4, 150, 7, 2, 0, 0),
(7, 1, 4, 150, 8, 2, 0, 0),
(8, 5, 1, 100, 8, 2, 0, 0),
(9, 1, 4, 150, 9, 1, 0, 0),
(10, 5, 1, 100, 10, 1, 0, 0),
(11, 1, 4, 150, 11, 1, 0, 0),
(12, 1, 4, 150, 12, 1, 0, 0),
(13, 1, 4, 150, 13, 2, 0, 0),
(14, 1, 4, 150, 14, 2, 0, 0),
(15, 1, 4, 150, 15, 2, 0, 0),
(16, 1, 4, 150, 16, 2, 0, 0),
(17, 1, 4, 150, 17, 1, 0, 0),
(18, 1, 4, 150, 18, 1, 0, 0),
(21, 1, 5, 2147483647, 22, 1, 0, 0),
(25, 1, 5, 2147483647, 26, 1, 0, 0),
(26, 1, 5, 2147483647, 27, 1, 0, 0),
(27, 1, 6, 375000, 28, 1, 0, 0),
(28, 1, 5, 2147483647, 29, 1, 0, 0),
(29, 1, 5, 2147483647, 30, 1, 0, 0),
(54, 1, 5, 200, 23, 1, 0, 0),
(55, 1, 1, 900, 23, 1, 0, 0),
(56, 1, 1, 100, 32, 1, 0, 0),
(58, 1, 1, 100, 33, 1, 0, 0),
(59, 1, 1, 100, 31, 2, 0, 0),
(60, 1, 5, 2147483647, 25, 1, 0, 0),
(61, 1, 5, 2147483647, 24, 1, 0, 0),
(70, 1, 1, 100, 35, 2, 20, 0),
(71, 1, 1, 100, 34, 1, 0, 0),
(72, 1, 2, 200, 37, 1, 0, 0),
(73, 1, 6, 375000, 38, 1, 0, 0),
(74, 1, 6, 375000, 39, 1, 0, 0),
(75, 1, 1, 100, 40, 1, 0, 0),
(76, 1, 6, 375000, 41, 1, 0, 0),
(77, 1, 6, 375000, 42, 1, 50, 0),
(78, 1, 6, 375000, 43, 1, 50, 0),
(79, 1, 1, 100, 44, 1, 1, 0),
(80, 1, 7, 13678, 44, 1, 21, 0),
(81, 1, 1, 100, 45, 1, 1, 0),
(82, 1, 6, 375000, 45, 1, 21, 0),
(83, 1, 1, 100, 46, 1, 1, 0),
(84, 1, 7, 13678, 46, 1, 51, 0),
(89, 1, 1, 100, 47, 1, 2, 0),
(90, 1, 6, 375000, 47, 1, 50, 0),
(91, 1, 6, 375000, 48, 1, 20, 0),
(92, 1, 2, 200, 49, 1, 50, 0),
(96, 1, 2, 200, 50, 1, 39, 0),
(97, 1, 1, 500, 50, 1, 50, 0),
(98, 1, 1, 100, 51, 1, 21, 0),
(99, 1, 2, 200, 52, 1, 50, 0),
(100, 9, 8, 2000, 52, 1, 2, 0),
(101, 1, 2, 200, 53, 2, 0, 0),
(102, 1, 6, 375000, 53, 2, 0, 0),
(103, 1, 7, 13678, 53, 3, 0, 0),
(105, 1, 1, 100, 55, 1, 0, 0),
(106, 1, 1, 100, 61, 1, NULL, 0),
(107, 1, 6, 375000, 61, 1, NULL, 0),
(108, 1, 1, 100, 62, 1, NULL, 0),
(109, 1, 1, 100, 63, 1, NULL, 0),
(110, 1, 6, 375000, 63, 1, NULL, 0),
(111, 1, 1, 100, 64, 1, NULL, 0),
(112, 1, 6, 375000, 64, 1, NULL, 0),
(113, 1, 7, 13678, 64, 1, 51, 0),
(114, 1, 1, 100, 65, 1, NULL, 0),
(115, 1, 6, 375000, 65, 1, NULL, 0),
(116, 1, 7, 13678, 65, 1, 51, 0),
(117, 1, 1, 100, 66, 1, NULL, 0),
(118, 1, 6, 375000, 66, 1, NULL, 0),
(119, 1, 7, 13678, 66, 1, 51, 0),
(120, 1, 1, 100, 67, 1, NULL, 0),
(121, 1, 6, 375000, 67, 1, NULL, 0),
(122, 1, 7, 13678, 67, 1, 51, 0),
(123, 1, 1, 100, 68, 1, NULL, 0),
(124, 1, 6, 375000, 68, 1, NULL, 0),
(125, 1, 7, 13678, 68, 1, 51, 0),
(126, 1, 1, 100, 71, 1, 50, 0),
(127, 1, 1, 100, 75, 1, 50, 0),
(128, 1, 6, 375000, 75, 1, NULL, 0),
(129, 1, 2, 200, 75, 1, 60, 0),
(130, 1, 2, 200, 76, 1, 51, 0),
(131, 1, 7, 13678, 77, 1, 61, 0),
(137, 9, 5, 500000, 54, 1, 0, 0),
(138, 1, 2, 200, 55, 1, 2, 0),
(139, 1, 1, 100, 56, 1, 0, 0),
(140, 1, 1, 100, 57, 1, 22, 0),
(141, 1, 1, 100, 58, 1, 22, 0),
(142, 1, 1, 100, 59, 1, 22, 0),
(143, 1, 1, 100, 60, 1, 0, 0),
(144, 1, 1, 100, 61, 1, 60, 0),
(145, 1, 1, 100, 61, 1, 51, 0),
(146, 1, 2, 200, 62, 1, 0, 0),
(147, 1, 1, 100, 63, 1, 21, 0),
(148, 1, 1, 100, 64, 1, 0, 0),
(149, 1, 1, 100, 64, 1, 51, 0),
(150, 1, 1, 100, 65, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status_history`
--

CREATE TABLE `status_history` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) DEFAULT NULL,
  `new_status` varchar(50) DEFAULT NULL,
  `old_status` varchar(50) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `changed_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_history`
--

INSERT INTO `status_history` (`id`, `sales_id`, `new_status`, `old_status`, `time`, `changed_by`, `updated_at`, `created_at`) VALUES
(7, 29, 'posted', 'pending', '2015-09-30 05:03:46', '18', NULL, NULL),
(8, 29, 'delivered', 'posted', '2015-09-30 05:04:49', '18', NULL, NULL),
(9, 20, 'pending', 'delivered', '2015-09-30 05:47:34', '18', NULL, NULL),
(10, 20, 'authorized', 'pending', '2015-09-30 06:02:11', '18', NULL, NULL),
(11, 23, 'authorized', 'pending', '2015-09-30 06:07:30', '18', NULL, NULL),
(12, 27, 'posted', 'pending', '2015-09-30 07:07:43', '18', NULL, NULL),
(13, 27, 'authorized', 'posted', '2015-09-30 07:08:29', '17', NULL, NULL),
(14, 32, 'authorized', 'pending', '2015-09-30 10:20:24', '18', NULL, NULL),
(15, 33, 'authorized', 'pending', '2015-10-01 08:20:08', '18', NULL, NULL),
(16, 31, 'authorized', 'pending', '2015-10-05 09:03:11', '18', NULL, NULL),
(17, 39, 'ready', 'pending', '2015-10-09 04:54:22', '18', NULL, NULL),
(18, 50, 'posted', 'pending', '2015-10-16 05:06:41', '18', NULL, NULL),
(19, 50, 'authorized', 'posted', '2015-10-21 08:23:01', '17', NULL, NULL),
(21, 65, 'posted', 'pending', '2015-12-16 10:01:40', '18', '2015-12-16 10:01:40', '2015-12-16 10:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `s_admin`
--

CREATE TABLE `s_admin` (
  `id` int(11) NOT NULL,
  `Inquiry` int(11) DEFAULT NULL,
  `Sales` int(11) DEFAULT NULL,
  `Tickets` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_admin`
--

INSERT INTO `s_admin` (`id`, `Inquiry`, `Sales`, `Tickets`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `s_p_tax`
--

CREATE TABLE `s_p_tax` (
  `id` int(11) NOT NULL,
  `s_p_id` int(11) DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `tax_name` varchar(50) DEFAULT NULL,
  `tax_value` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_p_tax`
--

INSERT INTO `s_p_tax` (`id`, `s_p_id`, `tax_id`, `tax_name`, `tax_value`, `user`) VALUES
(9, 85, 1, '1', 1, 18),
(10, 85, 3, 'e', 1, 18),
(11, 86, 1, '1', 1, 18),
(12, 86, 3, 'e', 1, 18),
(13, 86, 4, '20%', 20, 18),
(14, 86, 5, '30%', 30, 18),
(15, 92, 4, '20%', 20, 18),
(16, 92, 5, '30%', 30, 18),
(17, 93, 5, '30%', 30, 18),
(18, 93, 6, 'test', 9, 18),
(19, 98, 3, 'e', 1, 18),
(20, 98, 4, '20%', 20, 18),
(21, 99, 4, '20%', 20, 18),
(22, 99, 5, '30%', 30, 18),
(23, 100, 1, '1', 1, 18),
(24, 100, 3, 'e', 1, 18),
(25, 119, 3, 'e', 1, 18),
(26, 119, 4, '20%', 20, 18),
(27, 119, 5, '30%', 30, 18),
(28, 122, 3, 'e', 1, 18),
(29, 122, 4, '20%', 20, 18),
(30, 122, 5, '30%', 30, 18),
(31, 125, 3, 'e', 1, 18),
(32, 125, 4, '20%', 20, 18),
(33, 125, 5, '30%', 30, 18),
(34, 126, 4, '20%', 20, 18),
(35, 126, 5, '30%', 30, 18),
(36, 127, 4, '20%', 20, 18),
(37, 127, 5, '30%', 30, 18),
(38, 129, 3, 'e', 1, 18),
(39, 129, 4, '20%', 20, 18),
(40, 129, 5, '30%', 30, 18),
(41, 129, 6, 'test', 9, 18),
(42, 130, 3, 'e', 1, 18),
(43, 130, 4, '20%', 20, 18),
(44, 130, 5, '30%', 30, 18),
(45, 131, 1, '1', 1, 18),
(46, 131, 3, 'e', 1, 18),
(47, 131, 4, '20%', 20, 18),
(48, 131, 5, '30%', 30, 18),
(49, 131, 6, 'test', 9, 18),
(50, 138, 1, '1', 1, 18),
(51, 138, 3, 'e', 1, 18),
(52, 140, 1, '1', 1, 18),
(53, 140, 3, 'e', 1, 18),
(54, 140, 4, '20%', 20, 18),
(55, 141, 1, '1', 1, 18),
(56, 141, 3, 'e', 1, 18),
(57, 141, 4, '20%', 20, 18),
(58, 142, 1, '1', 1, 18),
(59, 142, 3, 'e', 1, 18),
(60, 142, 4, '20%', 20, 18),
(61, 144, 3, 'e', 1, 18),
(62, 144, 4, '20%', 20, 18),
(63, 144, 5, '30%', 30, 18),
(64, 144, 6, 'test', 9, 18),
(65, 145, 3, 'e', 1, 18),
(66, 145, 4, '20%', 20, 18),
(67, 145, 5, '30%', 30, 18),
(68, 147, 3, 'e', 1, 18),
(69, 147, 4, '20%', 20, 18),
(70, 149, 3, 'e', 1, 18),
(71, 149, 4, '20%', 20, 18),
(72, 149, 5, '30%', 30, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `owner` varchar(30) DEFAULT NULL,
  `created_time` timestamp NULL DEFAULT NULL,
  `modified_by` varchar(30) DEFAULT NULL,
  `modified_time` timestamp NULL DEFAULT NULL,
  `tax_code` int(11) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `code`, `name`, `description`, `owner`, `created_time`, `modified_by`, `modified_time`, `tax_code`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 2, '1', '1', '17', '2015-08-21 07:26:22', '18', '2015-10-05 10:55:26', 10, 0, NULL, '2015-12-18 09:52:16'),
(2, 2, '2', '2', '17', '2015-08-21 08:36:44', '17', '2015-08-21 08:36:47', 2, 1, NULL, NULL),
(3, 1, 'e', '1', '17', '2015-08-21 09:18:26', '18', '2015-09-14 09:38:35', 1, 0, NULL, NULL),
(4, 20, '20%', '', '18', '2015-09-28 06:26:25', NULL, NULL, 20, 0, NULL, NULL),
(5, 30, '30%', '30', '18', '2015-10-09 08:39:35', NULL, NULL, 30, 0, NULL, NULL),
(6, 0, 'test', 'test tax', '18', '2015-10-14 09:00:04', NULL, NULL, 9, 0, NULL, NULL),
(7, 0, 'laravel test', '', '18', NULL, '18', NULL, 450, 1, '2015-12-18 09:02:31', '2015-12-23 08:36:19');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `contact_id` int(11) DEFAULT NULL COMMENT 'Contact',
  `id` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL COMMENT 'Category',
  `priority` varchar(50) DEFAULT NULL COMMENT 'Priority',
  `account` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `owner` int(11) NOT NULL COMMENT 'Owner',
  `modified_by` int(11) DEFAULT NULL COMMENT 'Modified By',
  `subject` varchar(100) DEFAULT NULL COMMENT 'Subject',
  `problem` varchar(100) DEFAULT NULL COMMENT 'Problem',
  `status` varchar(30) DEFAULT NULL COMMENT 'Status',
  `group_id` varchar(50) DEFAULT NULL COMMENT 'Group',
  `assignedto` varchar(50) DEFAULT NULL COMMENT 'Assigned To',
  `call_log_id` int(11) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`contact_id`, `id`, `category`, `priority`, `account`, `email`, `owner`, `modified_by`, `subject`, `problem`, `status`, `group_id`, `assignedto`, `call_log_id`, `deleted`, `updated_at`, `created_at`) VALUES
(45, 9, 'test', 'normal', NULL, NULL, 18, 18, '123', '', 'complete', '15', '18', 0, 0, NULL, NULL),
(51, 10, 'normal', 'high', NULL, NULL, 17, 17, '345', '', NULL, '18', '17', 0, 0, NULL, NULL),
(46, 11, 'normal', 'normal', NULL, NULL, 18, 18, 'test 123', '', NULL, '16', '15', 0, 0, NULL, NULL),
(100, 12, 'test', 'normal', NULL, NULL, 18, 18, 'test 333', '', NULL, '16', '17', 0, 0, NULL, NULL),
(119, 13, 'normal', 'normal', NULL, NULL, 18, 17, 'test', '', NULL, '15', '17', 39, 1, NULL, NULL),
(97, 14, 'test', 'normal', NULL, NULL, 18, 18, 'test', 'test category edit', NULL, '15', '18', 0, 0, NULL, NULL),
(77, 15, 'test', 'normal', NULL, NULL, 18, 18, 'test', '', 'pending', '15', '17', 0, 0, NULL, NULL),
(51, 16, 'test', 'normal', NULL, NULL, 18, 18, 'test', 'test status', 'complete', '15', '18', 40, 1, NULL, NULL),
(61, 17, 'test', 'normal', NULL, NULL, 18, 18, 'test', '', 'pending', '15', '18', 41, 0, NULL, NULL),
(117, 18, 'test', 'normal', NULL, NULL, 18, 18, 'test', 'test a', 'pending', '15', '18', 47, 0, NULL, NULL),
(51, 19, 'test', 'normal', NULL, NULL, 18, 18, 'test', '', 'pending', '15', '18', 50, 0, NULL, NULL),
(116, 20, 'test', 'critical', NULL, NULL, 18, 18, 'test', 'test', 'complete', '15', '18', 55, 0, NULL, NULL),
(119, 21, 'test', 'normal', NULL, NULL, 18, 18, 'test 1', 'b', 'pending', '15', ' 15', 58, 0, '2015-12-17 04:44:47', NULL),
(19, 22, 'test', 'normal', NULL, NULL, 18, NULL, NULL, '', 'pending', '15', '18', 0, 0, '2015-12-11 07:40:36', '2015-12-11 07:40:36'),
(19, 23, 'test', 'normal', NULL, NULL, 18, NULL, 'eeeeee', 'eeeeeeeeeeeee', 'pending', '15', '18', 0, 0, '2015-12-11 07:40:58', '2015-12-11 07:40:58'),
(19, 24, 'test', 'normal', NULL, NULL, 18, NULL, 'eeeeee', 'eeeeeeeeeeeee', 'pending', '15', '18', 0, 0, '2015-12-11 07:41:31', '2015-12-11 07:41:31'),
(44, 25, 'test', 'normal', NULL, NULL, 18, NULL, 'aaaaaaaaaa1', 'jjj', 'pending', '15', '18', 0, 0, '2015-12-11 08:43:36', '2015-12-11 07:41:49'),
(NULL, 26, 'test', 'normal', NULL, NULL, 18, NULL, 'fafd', 'fdfdf', 'pending', '15', '18', 73, 0, '2015-12-15 04:55:54', '2015-12-15 04:55:54'),
(70, 27, 'test', 'normal', NULL, NULL, 18, 18, 'fafd', 'fdfdf', 'pending', '15', '18', 74, 1, '2015-12-23 09:31:15', '2015-12-15 04:58:33'),
(NULL, 28, 'test', 'normal', NULL, NULL, 18, NULL, 'rr', 'rrr', 'pending', '15', '18', 88, 0, '2015-12-16 05:21:15', '2015-12-16 05:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_category`
--

CREATE TABLE `ticket_category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_category`
--

INSERT INTO `ticket_category` (`id`, `category`, `description`, `owner`, `created_time`, `modified_by`, `modified_time`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test 2 3', 18, '2015-10-08 05:40:08', 18, '2015-10-08 08:52:11', NULL, NULL),
(2, 'test 1', 'test test', 18, '2015-10-08 05:40:40', NULL, NULL, NULL, NULL),
(4, 'test', 'test date and time(test edit)', 18, '2015-10-08 08:52:29', 18, '2015-10-08 08:52:49', NULL, NULL),
(5, 'test ', 'log test', 18, '2015-10-09 11:57:05', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_problem`
--

CREATE TABLE `ticket_problem` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `problem` varchar(100) DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `owner` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_problem`
--

INSERT INTO `ticket_problem` (`id`, `ticket_id`, `problem`, `created_time`, `owner`, `updated_at`, `created_at`) VALUES
(1, 5, 'test problem', '2015-10-06 04:05:19', NULL, NULL, NULL),
(10, 5, '', '2015-10-06 04:30:38', 18, NULL, NULL),
(11, 5, 'fafesdfsdf', '2015-10-06 04:31:22', 18, NULL, NULL),
(12, 4, 'test', '2015-10-06 04:32:05', 18, NULL, NULL),
(13, 4, 'test 2', '2015-10-06 04:32:26', 18, NULL, NULL),
(14, 0, '1', '2015-10-06 06:32:56', 0, NULL, NULL),
(15, 2, '1', '2015-10-06 06:35:16', 18, NULL, NULL),
(16, 2, '2', '2015-10-06 06:35:22', 18, NULL, NULL),
(17, 3, '12', '2015-10-06 07:25:17', 18, NULL, NULL),
(18, 3, '13', '2015-10-06 07:25:34', 18, NULL, NULL),
(19, 6, 'www', '2015-10-06 08:32:43', 18, NULL, NULL),
(20, 7, 'tttt', '2015-10-06 08:41:01', 18, NULL, NULL),
(21, 5, 'fsgsdg', '2015-10-06 09:22:19', 18, NULL, NULL),
(22, 8, 'test', '2015-10-07 04:16:18', 18, NULL, NULL),
(23, 9, '1234', '2015-10-07 04:19:38', 18, NULL, NULL),
(24, 10, '678', '2015-10-07 06:13:23', 17, NULL, NULL),
(25, 11, 'test', '2015-10-07 07:11:07', 18, NULL, NULL),
(26, 13, '', '2015-10-07 07:27:54', 18, NULL, NULL),
(27, 12, '1', '2015-10-07 07:40:13', 17, NULL, NULL),
(28, 14, 'test category', '2015-10-08 06:22:35', 18, NULL, NULL),
(29, 14, 'test category edit', '2015-10-08 06:27:20', 18, NULL, NULL),
(30, 15, 'test status', '2015-10-08 09:53:57', 18, NULL, NULL),
(31, 9, 'new', '2015-10-08 10:02:05', 18, NULL, NULL),
(32, 16, 'test status', '2015-10-08 10:16:59', 18, NULL, NULL),
(33, 17, 'test status', '2015-10-08 10:22:57', 18, NULL, NULL),
(34, 18, '', '2015-10-08 11:35:07', 18, NULL, NULL),
(35, 19, '', '2015-10-09 04:56:03', 18, NULL, NULL),
(36, 18, 'test', '2015-10-09 06:18:03', 18, NULL, NULL),
(37, 18, 'test a', '2015-10-09 10:58:39', 18, NULL, NULL),
(38, 20, 'test', '2015-10-12 06:27:06', 18, NULL, NULL),
(39, 21, 'test', '2015-10-12 10:04:51', 18, NULL, NULL),
(40, 21, 'text', '2015-10-16 05:07:09', 18, NULL, NULL),
(41, 21, 'test problem ', '2015-10-19 07:39:51', 18, NULL, NULL),
(42, 24, 'eeeeeeeeeeeee', '2015-12-11 07:41:31', 18, '2015-12-11 07:41:31', '2015-12-11 07:41:31'),
(43, 25, 'aaaaaaaaaa', '2015-12-11 07:41:49', 18, '2015-12-11 07:41:49', '2015-12-11 07:41:49'),
(44, 25, 'fffff', '2015-12-11 08:42:59', 18, '2015-12-11 08:42:59', '2015-12-11 08:42:59'),
(45, 25, 'jjj', '2015-12-11 08:43:37', 18, '2015-12-11 08:43:37', '2015-12-11 08:43:37'),
(46, NULL, 'rrr', '2015-12-16 05:21:15', 18, '2015-12-16 05:21:15', '2015-12-16 05:21:15'),
(47, 21, 'b', '2015-12-17 04:44:47', 18, '2015-12-17 04:44:47', '2015-12-17 04:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Id of the user',
  `user_name` varchar(50) NOT NULL COMMENT 'User name of the user',
  `user_password` varchar(50) NOT NULL COMMENT 'Password of the user',
  `user_firstname` varchar(100) DEFAULT NULL,
  `user_lastname` varchar(100) NOT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_mobile` varchar(30) DEFAULT NULL,
  `user_owner` varchar(100) NOT NULL,
  `user_created_time` timestamp NULL DEFAULT NULL,
  `user_modified_by` varchar(30) DEFAULT NULL,
  `user_modified_time` timestamp NULL DEFAULT NULL,
  `user_is_admin` tinyint(4) DEFAULT '0',
  `user_status` tinyint(4) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `user_group` int(11) DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `sipid` varchar(45) DEFAULT NULL,
  `sipserver` varchar(45) DEFAULT NULL,
  `agenttype` varchar(45) DEFAULT NULL,
  `sippass` varchar(45) DEFAULT NULL,
  `siplogin` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_mobile`, `user_owner`, `user_created_time`, `user_modified_by`, `user_modified_time`, `user_is_admin`, `user_status`, `deleted`, `user_group`, `group`, `sipid`, `sipserver`, `agenttype`, `sippass`, `siplogin`, `created_at`, `updated_at`) VALUES
(14, 'text', '202cb962ac59075b964b07152d234b70', '111', '1', '123@dcx.com', '', '18', '2015-09-14 09:48:27', 'admin', '2015-09-14 09:48:27', 0, 1, 1, 14, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'qqq', 'b2ca678b4c936f905fb82f2733f5297f', 'qqq', 'qqq', 'qqq@ww.com', '1', '18', '2015-09-14 08:46:29', 'admin', '2015-09-14 08:46:29', 0, 0, 1, 14, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'ee', '202cb962ac59075b964b07152d234b70', 'ee', 'ee', '123@dcx.com', '1', '18', '2015-10-01 03:56:26', '18', '2015-10-16 05:43:27', 2, 1, 0, 14, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'admin', '202cb962ac59075b964b07152d234b70', 'admin', 'admin', 'admin@gmail.com', '123', '18', '2015-09-16 10:03:26', '18', '2015-09-16 10:03:26', 1, 1, 0, 15, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'qq', '099b3b060154898840f0ebdfb46ec78f', 'qq', 'qq', 'qqq@ww.com', '122', '18', '2015-09-14 08:53:52', 'admin', '2015-09-14 08:53:52', 0, 1, 1, 14, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'qwe', '202cb962ac59075b964b07152d234b70', 'qwe', 'rty', 'qwe@gmail.com', '1234', '18', '2015-08-12 08:39:13', '18', '2015-08-12 08:39:13', 0, 1, 0, 14, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'dd', '202cb962ac59075b964b07152d234b70', 'dd', 'ddd', 'admin@gmail.com', '', '18', '2015-08-12 08:39:19', '18', '2015-08-12 08:39:19', 0, 1, 0, 14, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'ww', '202cb962ac59075b964b07152d234b70', 'www', 'www', 'w@ggh.com', '', '17', '2015-08-12 08:39:25', '18', '2015-08-12 08:39:25', 2, 1, 0, 15, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'eeee', '202cb962ac59075b964b07152d234b70', 'eee', 'ee', 'qwe@gmail.com', '', '18', '2015-09-16 10:25:05', 'admin', '2015-09-14 08:45:25', 0, 1, 0, NULL, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'vv', '202cb962ac59075b964b07152d234b70', 'vvvvvvvvv', 'v', '123@dcx.com', '', '17', '2015-09-16 10:08:15', '18', '2015-09-16 10:08:15', 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'rr', '202cb962ac59075b964b07152d234b70', 'rrrr', 'rr', 'rrr@gmail.com', '', '18', '2015-09-16 10:09:06', NULL, NULL, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'text1', '202cb962ac59075b964b07152d234b70', 'text', 'text', 'text@gmail.com', '', '18', '2015-09-16 13:35:11', NULL, NULL, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'dede', '202cb962ac59075b964b07152d234b70', 'dfdf', 'fdfs', 'dad@gsfgd', '4234234234', '18', NULL, NULL, NULL, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-12-23 06:47:22', '2015-12-23 08:05:25'),
(35, 'redf', '202cb962ac59075b964b07152d234b70', 'cdc', 'dsd', 'dad@gsfgd', '', '18', NULL, NULL, NULL, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-12-23 08:06:30', '2015-12-23 08:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `call_log` int(11) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `sales` int(11) NOT NULL DEFAULT '0',
  `ticket` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`, `call_log`, `contact`, `account`, `user`, `group`, `sales`, `ticket`, `created_at`, `updated_at`) VALUES
(87, 29, 15, 7, 7, 7, 0, 0, 4, 0, NULL, NULL),
(97, 15, 16, 8, 8, 8, 0, 0, 0, 0, NULL, NULL),
(98, 18, 14, 6, 2, 2, 0, 0, 0, 0, NULL, NULL),
(99, 19, 14, 6, 2, 2, 0, 0, 0, 0, NULL, NULL),
(100, 21, 14, 6, 2, 2, 0, 0, 0, 0, NULL, NULL),
(101, 24, 14, 6, 2, 2, 0, 0, 0, 0, NULL, NULL),
(102, 25, 14, 6, 2, 2, 0, 0, 0, 0, NULL, NULL),
(103, 25, 16, 8, 8, 8, 0, 0, 0, 0, NULL, NULL),
(104, 29, 16, 8, 8, 8, 0, 0, 4, 0, NULL, NULL),
(105, 30, 16, 8, 8, 8, 0, 0, 0, 0, NULL, NULL),
(106, 30, 15, 7, 7, 7, 0, 0, 0, 0, NULL, NULL),
(107, 15, 15, 7, 7, 7, 0, 0, 0, 0, NULL, NULL),
(110, 19, 15, 7, 7, 7, 0, 0, 0, 0, NULL, NULL),
(112, 14, 17, 6, 8, 8, 0, 0, 0, 0, NULL, NULL),
(113, 14, 18, 8, 8, 8, 4, 0, 0, 0, NULL, NULL),
(114, 31, 14, 6, 2, 2, 7, 0, 0, 0, NULL, NULL),
(115, 15, 14, 6, 2, 2, 0, 0, 0, 0, NULL, NULL),
(116, 14, 15, 7, 7, 7, 0, 0, 0, 0, NULL, NULL),
(117, 31, 15, 7, 7, 7, 0, 0, 0, 0, NULL, NULL),
(118, 17, 16, 8, NULL, NULL, NULL, NULL, 8, 8, NULL, '2015-12-22 05:17:12'),
(119, 31, 16, 8, 8, 8, 0, 0, 0, 0, NULL, NULL),
(120, 18, 15, 1, 8, 8, NULL, NULL, 8, 8, NULL, '2015-12-22 05:42:48'),
(121, 32, 15, 7, 7, 7, 0, 0, 8, 0, NULL, NULL),
(122, 32, 16, 8, 8, 8, 0, 0, 4, 0, NULL, NULL),
(125, 33, 15, 7, 7, 7, 0, 0, 8, 0, NULL, NULL),
(126, 17, 15, 8, 4, 4, NULL, NULL, 4, NULL, NULL, '2015-12-22 05:43:09'),
(127, 34, 16, 8, 8, 8, 0, 0, 0, 0, '2015-12-23 06:47:22', '2015-12-23 06:47:22'),
(128, 35, 18, 8, 8, 8, 0, 0, 4, 0, '2015-12-23 08:06:30', '2015-12-23 08:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_login_time` timestamp NULL DEFAULT NULL,
  `user_logout_time` timestamp NULL DEFAULT NULL,
  `user_session` varchar(100) NOT NULL,
  `user_login_status` tinyint(4) NOT NULL,
  `ip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_id`, `user_login_time`, `user_logout_time`, `user_session`, `user_login_status`, `ip`) VALUES
(9, 1, '2015-06-24 04:06:07', '2015-06-24 04:06:23', '1', 0, NULL),
(10, 1, '2015-06-24 04:12:40', '2015-06-24 04:17:15', '1', 0, NULL),
(13, 1, '2015-06-24 05:20:06', '2015-06-24 05:21:25', '1', 0, NULL),
(14, 5, '2015-06-24 05:21:33', '2015-06-24 08:29:56', '1', 0, NULL),
(15, 1, '2015-06-24 08:30:11', '2015-06-24 10:00:17', '1', 0, NULL),
(16, 1, '2015-06-24 10:00:22', '2015-06-24 10:01:00', '1', 0, NULL),
(17, 1, '2015-06-24 10:01:05', '2015-06-24 10:38:07', '1', 0, NULL),
(18, 1, '2015-06-24 10:38:11', '2015-06-24 10:55:31', '1', 0, NULL),
(19, 13, '2015-06-24 10:55:43', '2015-06-24 10:56:55', '1', 0, NULL),
(21, 18, '2015-06-25 03:09:49', '2015-12-31 04:01:28', '1', 0, NULL),
(22, 18, '2015-06-25 09:46:16', '2015-12-31 04:01:28', '1', 0, NULL),
(23, 18, '2015-06-26 03:08:12', '2015-12-31 04:01:28', '1', 0, NULL),
(24, 18, '2015-06-26 04:08:55', '2015-12-31 04:01:28', '1', 0, NULL),
(25, 18, '2015-06-26 07:19:50', '2015-12-31 04:01:28', '1', 0, NULL),
(26, 18, '2015-06-26 11:06:52', '2015-12-31 04:01:28', '1', 0, NULL),
(27, 18, '2015-06-26 11:08:27', '2015-12-31 04:01:28', '1', 0, NULL),
(28, 18, '2015-06-29 03:36:38', '2015-12-31 04:01:28', '1', 0, NULL),
(29, 18, '2015-06-29 04:23:49', '2015-12-31 04:01:28', '1', 0, NULL),
(30, 18, '2015-06-30 03:32:17', '2015-12-31 04:01:28', '1', 0, NULL),
(31, 18, '2015-07-06 03:25:57', '2015-12-31 04:01:28', '1', 0, NULL),
(32, 18, '2015-07-07 04:04:09', '2015-12-31 04:01:28', '1', 0, NULL),
(33, 18, '2015-07-07 07:58:03', '2015-12-31 04:01:28', '1', 0, NULL),
(34, 18, '2015-07-07 11:40:14', '2015-12-31 04:01:28', '1', 0, NULL),
(35, 18, '2015-07-08 03:06:27', '2015-12-31 04:01:28', '1', 0, NULL),
(36, 18, '2015-07-08 04:25:16', '2015-12-31 04:01:28', '1', 0, NULL),
(37, 18, '2015-07-08 05:37:45', '2015-12-31 04:01:28', '1', 0, NULL),
(38, 18, '2015-07-08 06:30:20', '2015-12-31 04:01:28', '1', 0, NULL),
(39, 18, '2015-07-09 03:14:46', '2015-12-31 04:01:28', '1', 0, NULL),
(40, 18, '2015-07-09 05:03:34', '2015-12-31 04:01:28', '1', 0, NULL),
(41, 18, '2015-07-09 05:06:58', '2015-12-31 04:01:28', '1', 0, NULL),
(42, 18, '2015-07-09 06:08:37', '2015-12-31 04:01:28', '1', 0, NULL),
(43, 18, '2015-07-09 06:19:32', '2015-12-31 04:01:28', '1', 0, NULL),
(44, 18, '2015-07-10 03:15:10', '2015-12-31 04:01:28', '1', 0, NULL),
(45, 18, '2015-07-10 07:43:35', '2015-12-31 04:01:28', '1', 0, NULL),
(46, 18, '2015-07-13 03:13:58', '2015-12-31 04:01:28', '1', 0, NULL),
(47, 18, '2015-07-13 03:50:18', '2015-12-31 04:01:28', '1', 0, NULL),
(48, 18, '2015-07-14 03:00:46', '2015-12-31 04:01:28', '1', 0, NULL),
(49, 18, '2015-07-15 03:30:59', '2015-12-31 04:01:28', '1', 0, NULL),
(50, 18, '2015-07-15 05:25:53', '2015-12-31 04:01:28', '1', 0, NULL),
(51, 18, '2015-07-15 09:55:32', '2015-12-31 04:01:28', '1', 0, NULL),
(52, 18, '2015-07-16 03:24:18', '2015-12-31 04:01:28', '1', 0, NULL),
(53, 18, '2015-07-17 03:06:03', '2015-12-31 04:01:28', '1', 0, NULL),
(54, 18, '2015-07-17 06:59:43', '2015-12-31 04:01:28', '1', 0, NULL),
(55, 18, '2015-07-17 08:40:19', '2015-12-31 04:01:28', '1', 0, NULL),
(56, 18, '2015-07-17 08:42:26', '2015-12-31 04:01:28', '1', 0, NULL),
(57, 18, '2015-07-17 09:18:36', '2015-12-31 04:01:28', '1', 0, NULL),
(58, 18, '2015-07-17 09:18:46', '2015-12-31 04:01:28', '1', 0, NULL),
(59, 18, '2015-07-17 09:19:35', '2015-12-31 04:01:28', '1', 0, NULL),
(60, 18, '2015-07-17 09:21:20', '2015-12-31 04:01:28', '1', 0, NULL),
(61, 18, '2015-07-17 09:24:40', '2015-12-31 04:01:28', '1', 0, NULL),
(62, 18, '2015-07-17 09:25:19', '2015-12-31 04:01:28', '1', 0, NULL),
(63, 18, '2015-07-17 09:37:39', '2015-12-31 04:01:28', '1', 0, NULL),
(64, 18, '2015-07-17 09:43:13', '2015-12-31 04:01:28', '1', 0, NULL),
(65, 18, '2015-07-17 09:52:36', '2015-12-31 04:01:28', '1', 0, NULL),
(66, 18, '2015-07-20 03:10:42', '2015-12-31 04:01:28', '1', 0, NULL),
(67, 18, '2015-07-20 10:27:04', '2015-12-31 04:01:28', '1', 0, NULL),
(68, 18, '2015-07-20 10:27:11', '2015-12-31 04:01:28', '1', 0, NULL),
(69, 18, '2015-07-20 10:30:24', '2015-12-31 04:01:28', '1', 0, NULL),
(70, 18, '2015-07-21 03:08:08', '2015-12-31 04:01:28', '1', 0, NULL),
(71, 18, '2015-07-21 06:48:32', '2015-12-31 04:01:28', '1', 0, NULL),
(72, 18, '2015-07-21 07:09:20', '2015-12-31 04:01:28', '1', 0, NULL),
(73, 18, '2015-07-21 08:14:13', '2015-12-31 04:01:28', '1', 0, NULL),
(74, 18, '2015-07-21 08:50:34', '2015-12-31 04:01:28', '1', 0, NULL),
(75, 18, '2015-07-21 10:27:57', '2015-12-31 04:01:28', '1', 0, NULL),
(76, 18, '2015-07-21 11:06:32', '2015-12-31 04:01:28', '1', 0, NULL),
(77, 18, '2015-07-21 11:18:30', '2015-12-31 04:01:28', '1', 0, NULL),
(78, 18, '2015-07-22 03:24:53', '2015-12-31 04:01:28', '1', 0, NULL),
(79, 18, '2015-07-22 04:15:11', '2015-12-31 04:01:28', '1', 0, NULL),
(80, 18, '2015-07-22 04:23:05', '2015-12-31 04:01:28', '1', 0, NULL),
(81, 18, '2015-07-22 04:27:03', '2015-12-31 04:01:28', '1', 0, NULL),
(82, 18, '2015-07-22 04:32:08', '2015-12-31 04:01:28', '1', 0, NULL),
(83, 18, '2015-07-22 04:34:04', '2015-12-31 04:01:28', '1', 0, NULL),
(84, 18, '2015-07-22 07:48:43', '2015-12-31 04:01:28', '1', 0, NULL),
(85, 18, '2015-07-22 08:56:31', '2015-12-31 04:01:28', '1', 0, NULL),
(86, 18, '2015-07-23 03:40:20', '2015-12-31 04:01:28', '1', 0, NULL),
(87, 18, '2015-07-23 06:07:57', '2015-12-31 04:01:28', '1', 0, NULL),
(88, 18, '2015-07-23 09:31:06', '2015-12-31 04:01:28', '1', 0, NULL),
(89, 18, '2015-07-23 09:45:23', '2015-12-31 04:01:28', '1', 0, NULL),
(90, 18, '2015-07-24 03:24:46', '2015-12-31 04:01:28', '1', 0, NULL),
(91, 18, '2015-07-24 08:39:43', '2015-12-31 04:01:28', '1', 0, NULL),
(92, 18, '2015-07-27 03:59:13', '2015-12-31 04:01:28', '1', 0, NULL),
(93, 23, '2015-07-27 04:16:35', '2015-07-27 11:38:26', '1', 0, NULL),
(94, 18, '2015-07-28 03:36:34', '2015-12-31 04:01:28', '1', 0, NULL),
(95, 18, '2015-07-28 06:31:58', '2015-12-31 04:01:28', '1', 0, NULL),
(96, 18, '2015-07-29 03:32:35', '2015-12-31 04:01:28', '1', 0, NULL),
(97, 18, '2015-07-29 06:05:22', '2015-12-31 04:01:28', '1', 0, NULL),
(98, 18, '2015-07-29 06:40:26', '2015-12-31 04:01:28', '1', 0, NULL),
(99, 18, '2015-07-29 07:54:14', '2015-12-31 04:01:28', '1', 0, NULL),
(100, 18, '2015-07-30 03:40:19', '2015-12-31 04:01:28', '1', 0, NULL),
(101, 18, '2015-07-30 04:46:14', '2015-12-31 04:01:28', '1', 0, NULL),
(102, 18, '2015-07-30 05:50:29', '2015-12-31 04:01:28', '1', 0, NULL),
(103, 18, '2015-07-30 06:46:47', '2015-12-31 04:01:28', '1', 0, NULL),
(104, 18, '2015-08-03 03:17:30', '2015-12-31 04:01:28', '1', 0, NULL),
(105, 18, '2015-08-03 05:33:43', '2015-12-31 04:01:28', '1', 0, NULL),
(106, 18, '2015-08-03 08:21:28', '2015-12-31 04:01:28', '1', 0, NULL),
(107, 18, '2015-08-04 03:59:39', '2015-12-31 04:01:28', '1', 0, NULL),
(108, 18, '2015-08-04 09:57:34', '2015-12-31 04:01:28', '1', 0, NULL),
(109, 17, '2015-08-04 09:58:12', '2015-12-29 11:07:52', '1', 0, NULL),
(110, 18, '2015-08-04 10:00:15', '2015-12-31 04:01:28', '1', 0, NULL),
(111, 17, '2015-08-04 10:00:23', '2015-12-29 11:07:52', '1', 0, NULL),
(112, 17, '2015-08-04 10:05:04', '2015-12-29 11:07:52', '1', 0, NULL),
(113, 17, '2015-08-04 10:05:31', '2015-12-29 11:07:52', '1', 0, NULL),
(114, 17, '2015-08-04 10:09:51', '2015-12-29 11:07:52', '1', 0, NULL),
(115, 17, '2015-08-04 10:22:13', '2015-12-29 11:07:52', '1', 0, NULL),
(116, 17, '2015-08-04 10:23:49', '2015-12-29 11:07:52', '1', 0, NULL),
(117, 17, '2015-08-04 10:32:40', '2015-12-29 11:07:52', '1', 0, NULL),
(118, 17, '2015-08-05 03:11:28', '2015-12-29 11:07:52', '1', 0, NULL),
(119, 18, '2015-08-05 03:12:03', '2015-12-31 04:01:28', '1', 0, NULL),
(120, 18, '2015-08-05 04:05:34', '2015-12-31 04:01:28', '1', 0, NULL),
(121, 18, '2015-08-05 05:48:33', '2015-12-31 04:01:28', '1', 0, NULL),
(122, 17, '2015-08-05 06:04:31', '2015-12-29 11:07:52', '1', 0, NULL),
(123, 18, '2015-08-05 06:04:51', '2015-12-31 04:01:28', '1', 0, NULL),
(124, 17, '2015-08-05 06:33:44', '2015-12-29 11:07:52', '1', 0, NULL),
(125, 17, '2015-08-05 06:42:18', '2015-12-29 11:07:52', '1', 0, NULL),
(126, 17, '2015-08-05 06:44:02', '2015-12-29 11:07:52', '1', 0, NULL),
(127, 17, '2015-08-05 07:02:30', '2015-12-29 11:07:52', '1', 0, NULL),
(128, 17, '2015-08-05 07:55:56', '2015-12-29 11:07:52', '1', 0, NULL),
(129, 18, '2015-08-05 08:08:55', '2015-12-31 04:01:28', '1', 0, NULL),
(130, 18, '2015-08-05 08:09:15', '2015-12-31 04:01:28', '1', 0, NULL),
(131, 19, '2015-08-05 08:09:56', '2015-08-05 08:10:25', '1', 0, NULL),
(132, 19, '2015-08-05 08:10:28', '2015-08-05 08:13:01', '1', 0, NULL),
(133, 18, '2015-08-05 08:11:02', '2015-12-31 04:01:28', '1', 0, NULL),
(134, 17, '2015-08-05 08:11:20', '2015-12-29 11:07:52', '1', 0, NULL),
(135, 18, '2015-08-05 08:12:41', '2015-12-31 04:01:28', '1', 0, NULL),
(136, 17, '2015-08-05 08:13:02', '2015-12-29 11:07:52', '1', 0, NULL),
(137, 17, '2015-08-05 08:13:26', '2015-12-29 11:07:52', '1', 0, NULL),
(138, 17, '2015-08-05 08:26:11', '2015-12-29 11:07:52', '1', 0, NULL),
(139, 17, '2015-08-05 08:29:38', '2015-12-29 11:07:52', '1', 0, NULL),
(140, 17, '2015-08-05 09:13:14', '2015-12-29 11:07:52', '1', 0, NULL),
(141, 17, '2015-08-05 09:37:32', '2015-12-29 11:07:52', '1', 0, NULL),
(142, 17, '2015-08-05 10:19:43', '2015-12-29 11:07:52', '1', 0, NULL),
(143, 17, '2015-08-05 10:20:18', '2015-12-29 11:07:52', '1', 0, NULL),
(144, 18, '2015-08-05 10:21:12', '2015-12-31 04:01:28', '1', 0, NULL),
(145, 17, '2015-08-05 10:29:53', '2015-12-29 11:07:52', '1', 0, NULL),
(146, 18, '2015-08-05 10:53:07', '2015-12-31 04:01:28', '1', 0, NULL),
(147, 17, '2015-08-05 10:59:25', '2015-12-29 11:07:52', '1', 0, NULL),
(148, 18, '2015-08-05 11:00:19', '2015-12-31 04:01:28', '1', 0, NULL),
(149, 17, '2015-08-05 11:08:01', '2015-12-29 11:07:52', '1', 0, NULL),
(150, 18, '2015-08-05 11:12:26', '2015-12-31 04:01:28', '1', 0, NULL),
(151, 17, '2015-08-05 11:12:47', '2015-12-29 11:07:52', '1', 0, NULL),
(152, 18, '2015-08-05 11:13:02', '2015-12-31 04:01:28', '1', 0, NULL),
(153, 17, '2015-08-05 11:13:15', '2015-12-29 11:07:52', '1', 0, NULL),
(154, 18, '2015-08-05 11:14:21', '2015-12-31 04:01:28', '1', 0, NULL),
(155, 17, '2015-08-06 03:53:38', '2015-12-29 11:07:52', '1', 0, NULL),
(156, 18, '2015-08-06 03:57:37', '2015-12-31 04:01:28', '1', 0, NULL),
(157, 17, '2015-08-06 07:47:44', '2015-12-29 11:07:52', '1', 0, NULL),
(158, 17, '2015-08-06 09:14:09', '2015-12-29 11:07:52', '1', 0, NULL),
(159, 18, '2015-08-06 11:31:31', '2015-12-31 04:01:28', '1', 0, NULL),
(160, 17, '2015-08-07 03:10:31', '2015-12-29 11:07:52', '1', 0, NULL),
(161, 18, '2015-08-07 03:16:21', '2015-12-31 04:01:28', '1', 0, NULL),
(162, 18, '2015-08-07 05:14:55', '2015-12-31 04:01:28', '1', 0, NULL),
(163, 18, '2015-08-07 10:52:10', '2015-12-31 04:01:28', '1', 0, NULL),
(164, 18, '2015-08-10 04:30:36', '2015-12-31 04:01:28', '1', 0, NULL),
(165, 17, '2015-08-10 05:14:55', '2015-12-29 11:07:52', '1', 0, NULL),
(166, 18, '2015-08-10 05:15:34', '2015-12-31 04:01:28', '1', 0, NULL),
(167, 17, '2015-08-10 05:16:01', '2015-12-29 11:07:52', '1', 0, NULL),
(168, 18, '2015-08-10 07:06:14', '2015-12-31 04:01:28', '1', 0, NULL),
(169, 17, '2015-08-10 08:16:52', '2015-12-29 11:07:52', '1', 0, NULL),
(170, 18, '2015-08-10 08:23:40', '2015-12-31 04:01:28', '1', 0, NULL),
(171, 17, '2015-08-10 08:24:10', '2015-12-29 11:07:52', '1', 0, NULL),
(172, 18, '2015-08-10 08:24:24', '2015-12-31 04:01:28', '1', 0, NULL),
(173, 17, '2015-08-10 08:24:45', '2015-12-29 11:07:52', '1', 0, NULL),
(174, 17, '2015-08-10 08:25:25', '2015-12-29 11:07:52', '1', 0, NULL),
(175, 17, '2015-08-10 08:25:56', '2015-12-29 11:07:52', '1', 0, NULL),
(176, 17, '2015-08-10 08:26:47', '2015-12-29 11:07:52', '1', 0, NULL),
(177, 17, '2015-08-10 08:29:37', '2015-12-29 11:07:52', '1', 0, NULL),
(178, 17, '2015-08-10 08:34:18', '2015-12-29 11:07:52', '1', 0, NULL),
(179, 17, '2015-08-10 08:46:17', '2015-12-29 11:07:52', '1', 0, NULL),
(180, 18, '2015-08-10 08:59:48', '2015-12-31 04:01:28', '1', 0, NULL),
(181, 18, '2015-08-10 09:01:10', '2015-12-31 04:01:28', '1', 0, NULL),
(182, 18, '2015-08-10 09:04:06', '2015-12-31 04:01:28', '1', 0, NULL),
(183, 18, '2015-08-10 09:30:53', '2015-12-31 04:01:28', '1', 0, NULL),
(184, 17, '2015-08-10 10:07:23', '2015-12-29 11:07:52', '1', 0, NULL),
(185, 18, '2015-08-10 10:07:48', '2015-12-31 04:01:28', '1', 0, NULL),
(186, 17, '2015-08-10 10:08:13', '2015-12-29 11:07:52', '1', 0, NULL),
(187, 18, '2015-08-10 10:42:25', '2015-12-31 04:01:28', '1', 0, NULL),
(188, 17, '2015-08-10 10:42:48', '2015-12-29 11:07:52', '1', 0, NULL),
(189, 18, '2015-08-10 10:47:44', '2015-12-31 04:01:28', '1', 0, NULL),
(190, 17, '2015-08-10 10:47:57', '2015-12-29 11:07:52', '1', 0, NULL),
(191, 18, '2015-08-10 10:50:03', '2015-12-31 04:01:28', '1', 0, NULL),
(192, 18, '2015-08-10 10:50:14', '2015-12-31 04:01:28', '1', 0, NULL),
(193, 17, '2015-08-10 10:50:34', '2015-12-29 11:07:52', '1', 0, NULL),
(194, 18, '2015-08-10 10:50:51', '2015-12-31 04:01:28', '1', 0, NULL),
(195, 17, '2015-08-10 10:51:07', '2015-12-29 11:07:52', '1', 0, NULL),
(196, 18, '2015-08-10 10:54:01', '2015-12-31 04:01:28', '1', 0, NULL),
(197, 17, '2015-08-10 10:54:25', '2015-12-29 11:07:52', '1', 0, NULL),
(198, 17, '2015-08-10 10:54:41', '2015-12-29 11:07:52', '1', 0, NULL),
(199, 17, '2015-08-10 10:54:53', '2015-12-29 11:07:52', '1', 0, NULL),
(200, 17, '2015-08-10 10:55:59', '2015-12-29 11:07:52', '1', 0, NULL),
(201, 17, '2015-08-10 10:59:36', '2015-12-29 11:07:52', '1', 0, NULL),
(202, 17, '2015-08-10 10:59:47', '2015-12-29 11:07:52', '1', 0, NULL),
(203, 17, '2015-08-10 11:11:28', '2015-12-29 11:07:52', '1', 0, NULL),
(204, 17, '2015-08-10 11:38:50', '2015-12-29 11:07:52', '1', 0, NULL),
(205, 17, '2015-08-10 11:40:01', '2015-12-29 11:07:52', '1', 0, NULL),
(206, 17, '2015-08-10 11:55:46', '2015-12-29 11:07:52', '1', 0, NULL),
(207, 17, '2015-08-10 11:56:14', '2015-12-29 11:07:52', '1', 0, NULL),
(208, 17, '2015-08-10 11:56:43', '2015-12-29 11:07:52', '1', 0, NULL),
(209, 17, '2015-08-10 11:58:38', '2015-12-29 11:07:52', '1', 0, NULL),
(210, 17, '2015-08-10 11:59:44', '2015-12-29 11:07:52', '1', 0, NULL),
(211, 17, '2015-08-10 12:01:22', '2015-12-29 11:07:52', '1', 0, NULL),
(212, 17, '2015-08-10 12:01:57', '2015-12-29 11:07:52', '1', 0, NULL),
(213, 17, '2015-08-10 12:02:40', '2015-12-29 11:07:52', '1', 0, NULL),
(214, 17, '2015-08-11 03:26:38', '2015-12-29 11:07:52', '1', 0, NULL),
(215, 18, '2015-08-11 03:50:37', '2015-12-31 04:01:28', '1', 0, NULL),
(216, 18, '2015-08-11 04:43:33', '2015-12-31 04:01:28', '1', 0, NULL),
(217, 17, '2015-08-11 04:45:14', '2015-12-29 11:07:52', '1', 0, NULL),
(218, 18, '2015-08-11 04:46:05', '2015-12-31 04:01:28', '1', 0, NULL),
(219, 17, '2015-08-11 04:49:52', '2015-12-29 11:07:52', '1', 0, NULL),
(220, 17, '2015-08-11 05:00:20', '2015-12-29 11:07:52', '1', 0, NULL),
(221, 17, '2015-08-11 05:22:22', '2015-12-29 11:07:52', '1', 0, NULL),
(222, 17, '2015-08-11 05:35:16', '2015-12-29 11:07:52', '1', 0, NULL),
(223, 18, '2015-08-11 05:47:16', '2015-12-31 04:01:28', '1', 0, NULL),
(224, 17, '2015-08-11 05:49:38', '2015-12-29 11:07:52', '1', 0, NULL),
(225, 17, '2015-08-11 06:03:48', '2015-12-29 11:07:52', '1', 0, NULL),
(226, 18, '2015-08-11 06:04:56', '2015-12-31 04:01:28', '1', 0, NULL),
(227, 17, '2015-08-11 07:20:19', '2015-12-29 11:07:52', '1', 0, NULL),
(228, 17, '2015-08-11 07:56:30', '2015-12-29 11:07:52', '1', 0, NULL),
(229, 18, '2015-08-11 08:12:49', '2015-12-31 04:01:28', '1', 0, NULL),
(230, 17, '2015-08-11 08:23:12', '2015-12-29 11:07:52', '1', 0, NULL),
(231, 17, '2015-08-11 09:15:51', '2015-12-29 11:07:52', '1', 0, NULL),
(232, 17, '2015-08-11 09:16:33', '2015-12-29 11:07:52', '1', 0, NULL),
(233, 17, '2015-08-11 09:17:27', '2015-12-29 11:07:52', '1', 0, NULL),
(234, 17, '2015-08-11 09:18:27', '2015-12-29 11:07:52', '1', 0, NULL),
(235, 17, '2015-08-11 09:58:20', '2015-12-29 11:07:52', '1', 0, NULL),
(236, 17, '2015-08-11 10:08:17', '2015-12-29 11:07:52', '1', 0, NULL),
(237, 17, '2015-08-11 10:14:18', '2015-12-29 11:07:52', '1', 0, NULL),
(238, 17, '2015-08-11 10:21:54', '2015-12-29 11:07:52', '1', 0, NULL),
(239, 17, '2015-08-11 10:31:58', '2015-12-29 11:07:52', '1', 0, NULL),
(240, 17, '2015-08-11 10:46:34', '2015-12-29 11:07:52', '1', 0, NULL),
(241, 17, '2015-08-11 11:15:31', '2015-12-29 11:07:52', '1', 0, NULL),
(242, 17, '2015-08-12 03:02:39', '2015-12-29 11:07:52', '1', 0, NULL),
(243, 18, '2015-08-12 04:13:33', '2015-12-31 04:01:28', '1', 0, NULL),
(244, 17, '2015-08-12 05:02:51', '2015-12-29 11:07:52', '1', 0, NULL),
(245, 18, '2015-08-12 05:12:33', '2015-12-31 04:01:28', '1', 0, NULL),
(246, 18, '2015-08-12 05:15:42', '2015-12-31 04:01:28', '1', 0, NULL),
(247, 17, '2015-08-12 05:15:49', '2015-12-29 11:07:52', '1', 0, NULL),
(248, 17, '2015-08-12 05:17:19', '2015-12-29 11:07:52', '1', 0, NULL),
(249, 17, '2015-08-12 05:17:47', '2015-12-29 11:07:52', '1', 0, NULL),
(250, 17, '2015-08-12 05:18:11', '2015-12-29 11:07:52', '1', 0, NULL),
(251, 17, '2015-08-12 05:18:34', '2015-12-29 11:07:52', '1', 0, NULL),
(252, 17, '2015-08-12 05:22:59', '2015-12-29 11:07:52', '1', 0, NULL),
(253, 17, '2015-08-12 05:23:46', '2015-12-29 11:07:52', '1', 0, NULL),
(254, 17, '2015-08-12 05:26:46', '2015-12-29 11:07:52', '1', 0, NULL),
(255, 17, '2015-08-12 06:03:22', '2015-12-29 11:07:52', '1', 0, NULL),
(256, 17, '2015-08-12 06:24:00', '2015-12-29 11:07:52', '1', 0, NULL),
(257, 18, '2015-08-12 07:39:44', '2015-12-31 04:01:28', '1', 0, NULL),
(258, 17, '2015-08-12 07:51:09', '2015-12-29 11:07:52', '1', 0, NULL),
(259, 17, '2015-08-12 07:51:16', '2015-12-29 11:07:52', '1', 0, NULL),
(260, 17, '2015-08-12 07:57:26', '2015-12-29 11:07:52', '1', 0, NULL),
(261, 17, '2015-08-12 07:57:37', '2015-12-29 11:07:52', '1', 0, NULL),
(262, 17, '2015-08-12 07:58:40', '2015-12-29 11:07:52', '1', 0, NULL),
(263, 17, '2015-08-12 08:01:20', '2015-12-29 11:07:52', '1', 0, NULL),
(264, 17, '2015-08-12 08:01:34', '2015-12-29 11:07:52', '1', 0, NULL),
(265, 17, '2015-08-12 08:29:21', '2015-12-29 11:07:52', '1', 0, NULL),
(266, 17, '2015-08-12 08:30:25', '2015-12-29 11:07:52', '1', 0, NULL),
(267, 18, '2015-08-12 08:31:48', '2015-12-31 04:01:28', '1', 0, NULL),
(268, 18, '2015-08-12 08:33:03', '2015-12-31 04:01:28', '1', 0, NULL),
(269, 17, '2015-08-12 08:33:53', '2015-12-29 11:07:52', '1', 0, NULL),
(270, 17, '2015-08-12 08:51:42', '2015-12-29 11:07:52', '1', 0, NULL),
(271, 18, '2015-08-12 09:17:43', '2015-12-31 04:01:28', '1', 0, NULL),
(272, 18, '2015-08-12 10:09:56', '2015-12-31 04:01:28', '1', 0, NULL),
(273, 17, '2015-08-12 10:19:54', '2015-12-29 11:07:52', '1', 0, NULL),
(274, 18, '2015-08-12 10:20:14', '2015-12-31 04:01:28', '1', 0, NULL),
(275, 17, '2015-08-12 10:20:51', '2015-12-29 11:07:52', '1', 0, NULL),
(276, 17, '2015-08-12 10:21:15', '2015-12-29 11:07:52', '1', 0, NULL),
(277, 18, '2015-08-12 10:38:49', '2015-12-31 04:01:28', '1', 0, NULL),
(278, 17, '2015-08-12 10:39:34', '2015-12-29 11:07:52', '1', 0, NULL),
(279, 17, '2015-08-12 10:56:02', '2015-12-29 11:07:52', '1', 0, NULL),
(280, 17, '2015-08-12 10:56:30', '2015-12-29 11:07:52', '1', 0, NULL),
(281, 17, '2015-08-12 11:23:01', '2015-12-29 11:07:52', '1', 0, NULL),
(282, 17, '2015-08-12 11:23:12', '2015-12-29 11:07:52', '1', 0, NULL),
(283, 17, '2015-08-12 11:24:33', '2015-12-29 11:07:52', '1', 0, NULL),
(284, 17, '2015-08-13 03:16:13', '2015-12-29 11:07:52', '1', 0, NULL),
(285, 18, '2015-08-13 04:11:18', '2015-12-31 04:01:28', '1', 0, NULL),
(286, 17, '2015-08-13 04:12:02', '2015-12-29 11:07:52', '1', 0, NULL),
(287, 18, '2015-08-13 04:25:00', '2015-12-31 04:01:28', '1', 0, NULL),
(288, 18, '2015-08-13 05:29:36', '2015-12-31 04:01:28', '1', 0, NULL),
(289, 17, '2015-08-13 06:19:07', '2015-12-29 11:07:52', '1', 0, NULL),
(290, 17, '2015-08-13 10:11:14', '2015-12-29 11:07:52', '1', 0, NULL),
(291, 18, '2015-08-13 11:16:58', '2015-12-31 04:01:28', '1', 0, NULL),
(292, 18, '2015-08-13 11:17:39', '2015-12-31 04:01:28', '1', 0, NULL),
(293, 17, '2015-08-14 03:28:17', '2015-12-29 11:07:52', '1', 0, NULL),
(294, 18, '2015-08-14 03:31:15', '2015-12-31 04:01:28', '1', 0, NULL),
(295, 18, '2015-08-14 07:43:52', '2015-12-31 04:01:28', '1', 0, NULL),
(296, 17, '2015-08-14 07:45:11', '2015-12-29 11:07:52', '1', 0, NULL),
(297, 31, '2015-08-14 08:30:52', '2015-08-14 08:31:28', '1', 0, NULL),
(298, 31, '2015-08-14 08:31:33', '2015-08-14 08:32:46', '1', 0, NULL),
(299, 31, '2015-08-14 08:32:50', '2015-08-14 08:33:21', '1', 0, NULL),
(300, 31, '2015-08-14 08:33:27', '2015-08-14 10:58:09', '1', 0, NULL),
(301, 17, '2015-08-14 10:58:10', '2015-12-29 11:07:52', '1', 0, NULL),
(302, 17, '2015-08-14 10:58:31', '2015-12-29 11:07:52', '1', 0, NULL),
(304, 17, '2015-08-19 03:48:57', '2015-12-29 11:07:52', '1', 0, NULL),
(305, 17, '2015-08-19 04:04:48', '2015-12-29 11:07:52', '1', 0, NULL),
(306, 18, '2015-08-19 04:05:09', '2015-12-31 04:01:28', '1', 0, NULL),
(307, 17, '2015-08-19 05:53:17', '2015-12-29 11:07:52', '1', 0, NULL),
(308, 17, '2015-08-19 06:14:39', '2015-12-29 11:07:52', '1', 0, NULL),
(309, 17, '2015-08-19 08:45:40', '2015-12-29 11:07:52', '1', 0, NULL),
(310, 17, '2015-08-19 08:46:08', '2015-12-29 11:07:52', '1', 0, NULL),
(311, 17, '2015-08-19 08:46:12', '2015-12-29 11:07:52', '1', 0, NULL),
(312, 17, '2015-08-19 09:11:21', '2015-12-29 11:07:52', '1', 0, NULL),
(313, 18, '2015-08-19 09:39:10', '2015-12-31 04:01:28', '1', 0, NULL),
(314, 18, '2015-08-19 11:55:37', '2015-12-31 04:01:28', '1', 0, NULL),
(315, 17, '2015-08-19 12:01:26', '2015-12-29 11:07:52', '1', 0, NULL),
(316, 18, '2015-08-19 12:01:36', '2015-12-31 04:01:28', '1', 0, NULL),
(317, 17, '2015-08-20 03:42:24', '2015-12-29 11:07:52', '1', 0, NULL),
(318, 17, '2015-08-20 05:37:19', '2015-12-29 11:07:52', '1', 0, NULL),
(319, 17, '2015-08-20 10:59:58', '2015-12-29 11:07:52', '1', 0, NULL),
(320, 18, '2015-08-20 11:11:17', '2015-12-31 04:01:28', '1', 0, NULL),
(321, 18, '2015-08-20 11:11:58', '2015-12-31 04:01:28', '1', 0, NULL),
(322, 17, '2015-08-21 03:20:18', '2015-12-29 11:07:52', '1', 0, NULL),
(323, 17, '2015-08-21 03:39:12', '2015-12-29 11:07:52', '1', 0, NULL),
(324, 17, '2015-08-24 03:21:31', '2015-12-29 11:07:52', '1', 0, NULL),
(325, 17, '2015-08-24 04:54:03', '2015-12-29 11:07:52', '1', 0, NULL),
(326, 17, '2015-08-24 05:51:00', '2015-12-29 11:07:52', '1', 0, NULL),
(327, 17, '2015-08-24 05:53:11', '2015-12-29 11:07:52', '1', 0, NULL),
(328, 17, '2015-08-24 06:05:02', '2015-12-29 11:07:52', '1', 0, NULL),
(329, 17, '2015-08-24 10:55:33', '2015-12-29 11:07:52', '1', 0, NULL),
(330, 17, '2015-08-24 11:02:24', '2015-12-29 11:07:52', '1', 0, NULL),
(331, 17, '2015-08-25 03:12:27', '2015-12-29 11:07:52', '1', 0, NULL),
(332, 18, '2015-08-25 05:25:24', '2015-12-31 04:01:28', '1', 0, NULL),
(333, 17, '2015-08-25 06:20:40', '2015-12-29 11:07:52', '1', 0, NULL),
(334, 18, '2015-08-25 06:39:16', '2015-12-31 04:01:28', '1', 0, NULL),
(335, 17, '2015-08-25 07:55:12', '2015-12-29 11:07:52', '1', 0, NULL),
(336, 18, '2015-08-25 11:12:55', '2015-12-31 04:01:28', '1', 0, NULL),
(337, 17, '2015-08-26 03:12:35', '2015-12-29 11:07:52', '1', 0, NULL),
(338, 18, '2015-08-26 05:49:13', '2015-12-31 04:01:28', '1', 0, NULL),
(339, 17, '2015-08-26 05:49:36', '2015-12-29 11:07:52', '1', 0, NULL),
(340, 17, '2015-08-26 07:34:42', '2015-12-29 11:07:52', '1', 0, NULL),
(341, 17, '2015-08-26 10:01:27', '2015-12-29 11:07:52', '1', 0, NULL),
(342, 17, '2015-08-27 03:03:48', '2015-12-29 11:07:52', '1', 0, NULL),
(343, 17, '2015-08-27 03:16:57', '2015-12-29 11:07:52', '1', 0, NULL),
(344, 18, '2015-08-27 03:52:07', '2015-12-31 04:01:28', '1', 0, NULL),
(345, 17, '2015-08-27 06:24:08', '2015-12-29 11:07:52', '1', 0, NULL),
(346, 17, '2015-08-27 08:00:46', '2015-12-29 11:07:52', '1', 0, NULL),
(347, 17, '2015-08-28 03:07:52', '2015-12-29 11:07:52', '1', 0, NULL),
(348, 17, '2015-08-31 03:31:53', '2015-12-29 11:07:52', '1', 0, NULL),
(349, 17, '2015-08-31 03:38:39', '2015-12-29 11:07:52', '1', 0, NULL),
(350, 17, '2015-08-31 08:10:42', '2015-12-29 11:07:52', '1', 0, NULL),
(351, 17, '2015-09-01 05:19:36', '2015-12-29 11:07:52', '1', 0, NULL),
(352, 17, '2015-09-01 05:56:17', '2015-12-29 11:07:52', '1', 0, NULL),
(353, 17, '2015-09-01 09:56:49', '2015-12-29 11:07:52', '1', 0, NULL),
(354, 17, '2015-09-02 03:12:38', '2015-12-29 11:07:52', '1', 0, NULL),
(355, 17, '2015-09-02 03:46:48', '2015-12-29 11:07:52', '1', 0, NULL),
(356, 17, '2015-09-02 03:49:36', '2015-12-29 11:07:52', '1', 0, NULL),
(357, 17, '2015-09-02 03:58:43', '2015-12-29 11:07:52', '1', 0, NULL),
(358, 17, '2015-09-02 06:13:41', '2015-12-29 11:07:52', '1', 0, NULL),
(359, 17, '2015-09-02 06:58:44', '2015-12-29 11:07:52', '1', 0, NULL),
(360, 17, '2015-09-02 09:30:09', '2015-12-29 11:07:52', '1', 0, NULL),
(361, 17, '2015-09-02 09:32:37', '2015-12-29 11:07:52', '1', 0, NULL),
(362, 17, '2015-09-02 09:33:04', '2015-12-29 11:07:52', '1', 0, NULL),
(363, 17, '2015-09-03 03:15:36', '2015-12-29 11:07:52', '1', 0, NULL),
(364, 17, '2015-09-03 10:42:11', '2015-12-29 11:07:52', '1', 0, NULL),
(365, 17, '2015-09-08 05:51:03', '2015-12-29 11:07:52', '1', 0, NULL),
(366, 17, '2015-09-09 13:31:43', '2015-12-29 11:07:52', '1', 0, NULL),
(367, 17, '2015-09-10 04:24:00', '2015-12-29 11:07:52', '1', 0, NULL),
(368, 17, '2015-09-10 04:25:57', '2015-12-29 11:07:52', '1', 0, NULL),
(369, 17, '2015-09-10 04:34:52', '2015-12-29 11:07:52', '1', 0, NULL),
(370, 17, '2015-09-10 05:50:17', '2015-12-29 11:07:52', '1', 0, NULL),
(371, 17, '2015-09-10 06:50:04', '2015-12-29 11:07:52', '1', 0, NULL),
(372, 17, '2015-09-10 07:18:02', '2015-12-29 11:07:52', '1', 0, NULL),
(373, 17, '2015-09-10 09:18:20', '2015-12-29 11:07:52', '1', 0, NULL),
(374, 17, '2015-09-11 03:50:33', '2015-12-29 11:07:52', '1', 0, NULL),
(375, 18, '2015-09-11 06:26:45', '2015-12-31 04:01:28', '1', 0, NULL),
(376, 17, '2015-09-14 03:16:59', '2015-12-29 11:07:52', '1', 0, NULL),
(377, 17, '2015-09-14 06:02:25', '2015-12-29 11:07:52', '1', 0, NULL),
(378, 17, '2015-09-14 06:28:22', '2015-12-29 11:07:52', '1', 0, NULL),
(379, 17, '2015-09-14 06:42:05', '2015-12-29 11:07:52', '1', 0, NULL),
(380, 18, '2015-09-14 08:18:05', '2015-12-31 04:01:28', '1', 0, NULL),
(381, 17, '2015-09-14 09:51:16', '2015-12-29 11:07:52', '1', 0, NULL),
(382, 18, '2015-09-14 09:56:51', '2015-12-31 04:01:28', '1', 0, NULL),
(383, 17, '2015-09-15 03:29:24', '2015-12-29 11:07:52', '1', 0, NULL),
(384, 18, '2015-09-15 03:29:47', '2015-12-31 04:01:28', '1', 0, NULL),
(385, 18, '2015-09-15 04:06:38', '2015-12-31 04:01:28', '1', 0, NULL),
(386, 18, '2015-09-15 04:07:57', '2015-12-31 04:01:28', '1', 0, NULL),
(387, 18, '2015-09-15 04:37:18', '2015-12-31 04:01:28', '1', 0, NULL),
(388, 17, '2015-09-15 07:36:53', '2015-12-29 11:07:52', '1', 0, NULL),
(389, 18, '2015-09-15 07:37:51', '2015-12-31 04:01:28', '1', 0, NULL),
(390, 17, '2015-09-16 03:37:33', '2015-12-29 11:07:52', '1', 0, NULL),
(391, 18, '2015-09-16 03:43:30', '2015-12-31 04:01:28', '1', 0, NULL),
(392, 17, '2015-09-16 09:20:08', '2015-12-29 11:07:52', '1', 0, NULL),
(393, 18, '2015-09-16 09:29:06', '2015-12-31 04:01:28', '1', 0, NULL),
(394, 17, '2015-09-16 10:23:33', '2015-12-29 11:07:52', '1', 0, NULL),
(395, 18, '2015-09-16 10:24:24', '2015-12-31 04:01:28', '1', 0, NULL),
(396, 17, '2015-09-16 10:35:01', '2015-12-29 11:07:52', '1', 0, NULL),
(397, 18, '2015-09-16 10:35:12', '2015-12-31 04:01:28', '1', 0, NULL),
(398, 17, '2015-09-16 10:35:29', '2015-12-29 11:07:52', '1', 0, NULL),
(399, 18, '2015-09-16 10:35:54', '2015-12-31 04:01:28', '1', 0, NULL),
(400, 17, '2015-09-16 10:36:20', '2015-12-29 11:07:52', '1', 0, NULL),
(401, 18, '2015-09-16 10:38:03', '2015-12-31 04:01:28', '1', 0, NULL),
(402, 17, '2015-09-16 10:40:29', '2015-12-29 11:07:52', '1', 0, NULL),
(403, 18, '2015-09-16 10:43:55', '2015-12-31 04:01:28', '1', 0, NULL),
(404, 18, '2015-09-16 10:44:15', '2015-12-31 04:01:28', '1', 0, NULL),
(405, 18, '2015-09-16 10:45:18', '2015-12-31 04:01:28', '1', 0, NULL),
(406, 17, '2015-09-16 10:45:58', '2015-12-29 11:07:52', '1', 0, NULL),
(407, 17, '2015-09-16 10:48:42', '2015-12-29 11:07:52', '1', 0, NULL),
(408, 18, '2015-09-16 10:48:51', '2015-12-31 04:01:28', '1', 0, NULL),
(409, 17, '2015-09-16 11:16:53', '2015-12-29 11:07:52', '1', 0, NULL),
(410, 17, '2015-09-16 11:57:47', '2015-12-29 11:07:52', '1', 0, NULL),
(411, 17, '2015-09-16 12:00:37', '2015-12-29 11:07:52', '1', 0, NULL),
(412, 17, '2015-09-16 12:05:40', '2015-12-29 11:07:52', '1', 0, NULL),
(413, 17, '2015-09-16 12:23:49', '2015-12-29 11:07:52', '1', 0, NULL),
(414, 17, '2015-09-16 12:24:45', '2015-12-29 11:07:52', '1', 0, NULL),
(415, 17, '2015-09-16 12:25:30', '2015-12-29 11:07:52', '1', 0, NULL),
(416, 17, '2015-09-16 12:26:16', '2015-12-29 11:07:52', '1', 0, NULL),
(417, 17, '2015-09-16 12:42:51', '2015-12-29 11:07:52', '1', 0, NULL),
(418, 17, '2015-09-17 03:29:30', '2015-12-29 11:07:52', '1', 0, NULL),
(419, 17, '2015-09-17 03:29:35', '2015-12-29 11:07:52', '1', 0, NULL),
(420, 18, '2015-09-17 03:49:18', '2015-12-31 04:01:28', '1', 0, NULL),
(421, 17, '2015-09-17 12:29:51', '2015-12-29 11:07:52', '1', 0, NULL),
(422, 18, '2015-09-17 12:31:17', '2015-12-31 04:01:28', '1', 0, NULL),
(423, 17, '2015-09-18 03:14:28', '2015-12-29 11:07:52', '1', 0, NULL),
(424, 18, '2015-09-18 03:14:55', '2015-12-31 04:01:28', '1', 0, NULL),
(425, 17, '2015-09-18 08:30:11', '2015-12-29 11:07:52', '1', 0, NULL),
(426, 18, '2015-09-18 08:39:01', '2015-12-31 04:01:28', '1', 0, NULL),
(427, 17, '2015-09-21 03:22:50', '2015-12-29 11:07:52', '1', 0, NULL),
(430, 18, '2015-09-21 09:35:54', '2015-12-31 04:01:28', '1', 0, NULL),
(431, 18, '2015-09-21 10:47:46', '2015-12-31 04:01:28', '1', 0, NULL),
(432, 18, '2015-09-21 10:56:41', '2015-12-31 04:01:28', '1', 0, NULL),
(433, 18, '2015-09-22 03:26:18', '2015-12-31 04:01:28', '1', 0, NULL),
(434, 18, '2015-09-23 03:03:24', '2015-12-31 04:01:28', '1', 0, NULL),
(435, 18, '2015-09-23 10:41:22', '2015-12-31 04:01:28', '1', 0, NULL),
(436, 18, '2015-09-24 02:57:58', '2015-12-31 04:01:28', '1', 0, NULL),
(437, 18, '2015-09-24 04:45:30', '2015-12-31 04:01:28', '1', 0, NULL),
(438, 18, '2015-09-24 11:22:58', '2015-12-31 04:01:28', '1', 0, NULL),
(439, 18, '2015-09-28 03:21:42', '2015-12-31 04:01:28', '1', 0, NULL),
(440, 17, '2015-09-28 07:40:45', '2015-12-29 11:07:52', '1', 0, NULL),
(441, 18, '2015-09-28 07:41:04', '2015-12-31 04:01:28', '1', 0, NULL),
(442, 17, '2015-09-28 07:42:28', '2015-12-29 11:07:52', '1', 0, NULL),
(443, 18, '2015-09-28 07:42:45', '2015-12-31 04:01:28', '1', 0, NULL),
(444, 17, '2015-09-28 07:43:00', '2015-12-29 11:07:52', '1', 0, NULL),
(445, 18, '2015-09-28 07:43:19', '2015-12-31 04:01:28', '1', 0, NULL),
(446, 18, '2015-09-30 03:40:04', '2015-12-31 04:01:28', '1', 0, NULL),
(447, 17, '2015-09-30 03:45:42', '2015-12-29 11:07:52', '1', 0, NULL),
(448, 17, '2015-09-30 03:45:52', '2015-12-29 11:07:52', '1', 0, NULL),
(449, 18, '2015-09-30 03:46:05', '2015-12-31 04:01:28', '1', 0, NULL),
(450, 17, '2015-09-30 03:46:37', '2015-12-29 11:07:52', '1', 0, NULL),
(451, 17, '2015-09-30 03:54:44', '2015-12-29 11:07:52', '1', 0, NULL),
(452, 17, '2015-09-30 04:08:35', '2015-12-29 11:07:52', '1', 0, NULL),
(453, 18, '2015-09-30 04:08:53', '2015-12-31 04:01:28', '1', 0, NULL),
(454, 17, '2015-09-30 04:19:55', '2015-12-29 11:07:52', '1', 0, NULL),
(455, 18, '2015-09-30 04:22:28', '2015-12-31 04:01:28', '1', 0, NULL),
(456, 17, '2015-09-30 04:26:36', '2015-12-29 11:07:52', '1', 0, NULL),
(457, 18, '2015-09-30 04:26:59', '2015-12-31 04:01:28', '1', 0, NULL),
(458, 17, '2015-09-30 06:00:32', '2015-12-29 11:07:52', '1', 0, NULL),
(459, 18, '2015-09-30 06:01:31', '2015-12-31 04:01:28', '1', 0, NULL),
(460, 17, '2015-09-30 07:00:53', '2015-12-29 11:07:52', '1', 0, NULL),
(461, 18, '2015-09-30 07:07:29', '2015-12-31 04:01:28', '1', 0, NULL),
(462, 17, '2015-09-30 07:08:19', '2015-12-29 11:07:52', '1', 0, NULL),
(463, 17, '2015-09-30 08:40:10', '2015-12-29 11:07:52', '1', 0, NULL),
(464, 18, '2015-09-30 08:54:02', '2015-12-31 04:01:28', '1', 0, NULL),
(465, 17, '2015-09-30 11:30:26', '2015-12-29 11:07:52', '1', 0, NULL),
(466, 18, '2015-10-01 03:22:32', '2015-12-31 04:01:28', '1', 0, NULL),
(467, 18, '2015-10-01 03:44:17', '2015-12-31 04:01:28', '1', 0, NULL),
(468, 17, '2015-10-01 03:56:32', '2015-12-29 11:07:52', '1', 0, NULL),
(469, 18, '2015-10-01 03:57:08', '2015-12-31 04:01:28', '1', 0, NULL),
(470, 18, '2015-10-01 04:21:52', '2015-12-31 04:01:28', '1', 0, NULL),
(471, 17, '2015-10-01 06:28:29', '2015-12-29 11:07:52', '1', 0, NULL),
(472, 18, '2015-10-01 06:49:15', '2015-12-31 04:01:28', '1', 0, NULL),
(473, 18, '2015-10-01 07:11:36', '2015-12-31 04:01:28', '1', 0, NULL),
(474, 17, '2015-10-01 07:12:13', '2015-12-29 11:07:52', '1', 0, NULL),
(475, 18, '2015-10-01 08:19:33', '2015-12-31 04:01:28', '1', 0, NULL),
(476, 17, '2015-10-01 08:21:24', '2015-12-29 11:07:52', '1', 0, NULL),
(477, 18, '2015-10-01 08:22:03', '2015-12-31 04:01:28', '1', 0, NULL),
(478, 18, '2015-10-01 09:25:15', '2015-12-31 04:01:28', '1', 0, NULL),
(479, 17, '2015-10-01 09:28:05', '2015-12-29 11:07:52', '1', 0, NULL),
(480, 18, '2015-10-01 10:27:05', '2015-12-31 04:01:28', '1', 0, NULL),
(481, 17, '2015-10-01 10:30:51', '2015-12-29 11:07:52', '1', 0, NULL),
(482, 18, '2015-10-01 10:32:37', '2015-12-31 04:01:28', '1', 0, NULL),
(483, 17, '2015-10-01 10:33:09', '2015-12-29 11:07:52', '1', 0, NULL),
(484, 17, '2015-10-01 10:36:18', '2015-12-29 11:07:52', '1', 0, NULL),
(485, 18, '2015-10-01 10:36:33', '2015-12-31 04:01:28', '1', 0, NULL),
(486, 17, '2015-10-01 11:06:58', '2015-12-29 11:07:52', '1', 0, NULL),
(487, 18, '2015-10-02 07:05:47', '2015-12-31 04:01:28', '1', 0, NULL),
(488, 18, '2015-10-05 03:17:52', '2015-12-31 04:01:28', '1', 0, NULL),
(489, 18, '2015-10-05 08:36:36', '2015-12-31 04:01:28', '1', 0, NULL),
(490, 18, '2015-10-05 09:02:28', '2015-12-31 04:01:28', '1', 0, NULL),
(491, 18, '2015-10-06 03:10:53', '2015-12-31 04:01:28', '1', 0, NULL),
(492, 18, '2015-10-06 08:06:11', '2015-12-31 04:01:28', '1', 0, NULL),
(493, 18, '2015-10-07 03:14:34', '2015-12-31 04:01:28', '1', 0, NULL),
(494, 17, '2015-10-07 05:46:14', '2015-12-29 11:07:52', '1', 0, NULL),
(495, 17, '2015-10-07 05:57:28', '2015-12-29 11:07:52', '1', 0, NULL),
(496, 18, '2015-10-07 07:10:10', '2015-12-31 04:01:28', '1', 0, NULL),
(497, 17, '2015-10-07 07:12:06', '2015-12-29 11:07:52', '1', 0, NULL),
(498, 18, '2015-10-07 07:19:26', '2015-12-31 04:01:28', '1', 0, NULL),
(499, 17, '2015-10-07 07:19:56', '2015-12-29 11:07:52', '1', 0, NULL),
(500, 18, '2015-10-07 07:25:27', '2015-12-31 04:01:28', '1', 0, NULL),
(501, 17, '2015-10-07 07:28:26', '2015-12-29 11:07:52', '1', 0, NULL),
(502, 18, '2015-10-07 08:48:42', '2015-12-31 04:01:28', '1', 0, NULL),
(503, 17, '2015-10-07 09:19:03', '2015-12-29 11:07:52', '1', 0, NULL),
(504, 17, '2015-10-07 09:20:07', '2015-12-29 11:07:52', '1', 0, NULL),
(505, 18, '2015-10-07 10:53:06', '2015-12-31 04:01:28', '1', 0, NULL),
(506, 18, '2015-10-08 03:16:39', '2015-12-31 04:01:28', '1', 0, NULL),
(507, 18, '2015-10-09 03:22:38', '2015-12-31 04:01:28', '1', 0, NULL),
(508, 17, '2015-10-09 09:47:29', '2015-12-29 11:07:52', '1', 0, NULL),
(509, 17, '2015-10-09 10:01:45', '2015-12-29 11:07:52', '1', 0, NULL),
(510, 18, '2015-10-09 10:09:20', '2015-12-31 04:01:28', '1', 0, NULL),
(511, 18, '2015-10-12 03:56:36', '2015-12-31 04:01:28', '1', 0, '::1'),
(512, 17, '2015-10-12 07:55:31', '2015-12-29 11:07:52', '1', 0, '::1'),
(513, 17, '2015-10-12 07:56:48', '2015-12-29 11:07:52', '1', 0, '::1'),
(514, 18, '2015-10-12 07:59:03', '2015-12-31 04:01:28', '1', 0, '::1'),
(515, 17, '2015-10-12 07:59:25', '2015-12-29 11:07:52', '1', 0, '::1'),
(516, 18, '2015-10-12 08:18:13', '2015-12-31 04:01:28', '1', 0, '::1'),
(517, 17, '2015-10-12 08:19:58', '2015-12-29 11:07:52', '1', 0, '::1'),
(518, 18, '2015-10-12 08:45:57', '2015-12-31 04:01:28', '1', 0, '::1'),
(519, 17, '2015-10-12 08:46:39', '2015-12-29 11:07:52', '1', 0, '::1'),
(520, 18, '2015-10-12 09:14:40', '2015-12-31 04:01:28', '1', 0, '::1'),
(521, 17, '2015-10-12 10:11:06', '2015-12-29 11:07:52', '1', 0, '::1'),
(522, 18, '2015-10-12 10:11:42', '2015-12-31 04:01:28', '1', 0, '::1'),
(523, 17, '2015-10-12 10:12:36', '2015-12-29 11:07:52', '1', 0, '::1'),
(524, 17, '2015-10-12 10:14:11', '2015-12-29 11:07:52', '1', 0, '::1'),
(525, 17, '2015-10-12 10:15:51', '2015-12-29 11:07:52', '1', 0, '::1'),
(526, 17, '2015-10-12 10:21:00', '2015-12-29 11:07:52', '1', 0, '::1'),
(527, 17, '2015-10-12 10:22:20', '2015-12-29 11:07:52', '1', 0, '::1'),
(528, 17, '2015-10-12 10:24:27', '2015-12-29 11:07:52', '1', 0, '::1'),
(529, 17, '2015-10-12 11:51:54', '2015-12-29 11:07:52', '1', 0, '::1'),
(530, 18, '2015-10-13 03:17:02', '2015-12-31 04:01:28', '1', 0, '::1'),
(531, 18, '2015-10-14 03:12:16', '2015-12-31 04:01:28', '1', 0, '::1'),
(532, 18, '2015-10-14 08:30:23', '2015-12-31 04:01:28', '1', 0, '::1'),
(533, 18, '2015-10-15 03:17:26', '2015-12-31 04:01:28', '1', 0, '::1'),
(534, 18, '2015-10-15 06:25:01', '2015-12-31 04:01:28', '1', 0, '::1'),
(535, 17, '2015-10-15 08:02:40', '2015-12-29 11:07:52', '1', 0, '::1'),
(536, 17, '2015-10-15 10:29:12', '2015-12-29 11:07:52', '1', 0, '::1'),
(537, 18, '2015-10-16 04:07:24', '2015-12-31 04:01:28', '1', 0, '::1'),
(538, 17, '2015-10-16 04:51:52', '2015-12-29 11:07:52', '1', 0, '::1'),
(539, 18, '2015-10-16 04:58:08', '2015-12-31 04:01:28', '1', 0, '::1'),
(540, 18, '2015-10-16 05:06:09', '2015-12-31 04:01:28', '1', 0, '::1'),
(541, 17, '2015-10-16 05:42:16', '2015-12-29 11:07:52', '1', 0, '::1'),
(542, 17, '2015-10-16 05:43:08', '2015-12-29 11:07:52', '1', 0, '::1'),
(543, 17, '2015-10-16 05:43:38', '2015-12-29 11:07:52', '1', 0, '::1'),
(544, 17, '2015-10-16 06:11:18', '2015-12-29 11:07:52', '1', 0, '::1'),
(545, 17, '2015-10-16 08:46:20', '2015-12-29 11:07:52', '1', 0, '::1'),
(546, 17, '2015-10-16 09:32:14', '2015-12-29 11:07:52', '1', 0, '::1'),
(547, 18, '2015-10-16 09:33:04', '2015-12-31 04:01:28', '1', 0, '::1'),
(548, 18, '2015-10-19 03:33:55', '2015-12-31 04:01:28', '1', 0, '::1'),
(549, 18, '2015-10-19 03:39:26', '2015-12-31 04:01:28', '1', 0, '::1'),
(550, 17, '2015-10-19 06:27:13', '2015-12-29 11:07:52', '1', 0, '::1'),
(551, 18, '2015-10-19 06:28:50', '2015-12-31 04:01:28', '1', 0, '::1'),
(552, 18, '2015-10-20 03:43:20', '2015-12-31 04:01:28', '1', 0, '::1'),
(553, 17, '2015-10-20 04:29:47', '2015-12-29 11:07:52', '1', 0, '::1'),
(554, 17, '2015-10-20 04:29:48', '2015-12-29 11:07:52', '1', 0, '::1'),
(555, 17, '2015-10-20 04:30:28', '2015-12-29 11:07:52', '1', 0, '::1'),
(556, 18, '2015-10-20 04:30:35', '2015-12-31 04:01:28', '1', 0, '::1'),
(557, 18, '2015-10-20 05:14:35', '2015-12-31 04:01:28', '1', 0, '::1'),
(558, 17, '2015-10-20 05:44:15', '2015-12-29 11:07:52', '1', 0, '::1'),
(559, 18, '2015-10-20 06:58:00', '2015-12-31 04:01:28', '1', 0, '::1'),
(560, 17, '2015-10-20 07:19:37', '2015-12-29 11:07:52', '1', 0, '::1'),
(561, 17, '2015-10-20 07:19:54', '2015-12-29 11:07:52', '1', 0, '::1'),
(562, 17, '2015-10-20 10:18:27', '2015-12-29 11:07:52', '1', 0, '::1'),
(563, 18, '2015-10-21 03:18:02', '2015-12-31 04:01:28', '1', 0, '::1'),
(564, 17, '2015-10-21 03:18:17', '2015-12-29 11:07:52', '1', 0, '::1'),
(565, 18, '2015-10-21 04:14:20', '2015-12-31 04:01:28', '1', 0, '::1'),
(566, 17, '2015-10-21 04:50:10', '2015-12-29 11:07:52', '1', 0, '::1'),
(567, 18, '2015-10-21 04:50:30', '2015-12-31 04:01:28', '1', 0, '::1'),
(568, 17, '2015-10-21 04:51:07', '2015-12-29 11:07:52', '1', 0, '::1'),
(569, 18, '2015-10-21 04:51:40', '2015-12-31 04:01:28', '1', 0, '::1'),
(570, 18, '2015-10-21 06:22:41', '2015-12-31 04:01:28', '1', 0, '::1'),
(571, 18, '2015-10-21 06:23:16', '2015-12-31 04:01:28', '1', 0, '::1'),
(572, 17, '2015-10-21 07:20:07', '2015-12-29 11:07:52', '1', 0, '::1'),
(573, 17, '2015-10-21 07:24:40', '2015-12-29 11:07:52', '1', 0, '::1'),
(574, 17, '2015-10-21 07:25:52', '2015-12-29 11:07:52', '1', 0, '::1'),
(575, 17, '2015-10-21 07:29:16', '2015-12-29 11:07:52', '1', 0, '::1'),
(576, 17, '2015-10-21 07:29:38', '2015-12-29 11:07:52', '1', 0, '::1'),
(577, 17, '2015-10-21 07:29:53', '2015-12-29 11:07:52', '1', 0, '::1'),
(578, 17, '2015-10-21 07:31:20', '2015-12-29 11:07:52', '1', 0, '::1'),
(579, 17, '2015-10-21 08:22:48', '2015-12-29 11:07:52', '1', 0, '::1'),
(580, 17, '2015-10-21 08:29:00', '2015-12-29 11:07:52', '1', 0, '::1'),
(581, 17, '2015-10-21 08:30:14', '2015-12-29 11:07:52', '1', 0, '::1'),
(582, 17, '2015-10-21 09:36:44', '2015-12-29 11:07:52', '1', 0, '::1'),
(583, 17, '2015-10-21 09:42:12', '2015-12-29 11:07:52', '1', 0, '::1'),
(584, 18, '2015-10-22 03:31:19', '2015-12-31 04:01:28', '1', 0, '::1'),
(585, 17, '2015-10-22 04:48:40', '2015-12-29 11:07:52', '1', 0, '::2'),
(586, 18, '2015-10-22 04:49:05', '2015-12-31 04:01:28', '1', 0, '::1'),
(587, 17, '2015-10-22 04:50:25', '2015-12-29 11:07:52', '1', 0, '::1'),
(588, 17, '2015-10-22 04:50:57', '2015-12-29 11:07:52', '1', 0, '::1'),
(589, 17, '2015-10-22 04:57:26', '2015-12-29 11:07:52', '1', 0, '::2'),
(590, 18, '2015-10-22 05:06:45', '2015-12-31 04:01:28', '1', 0, '::1'),
(591, 17, '2015-10-22 05:06:57', '2015-12-29 11:07:52', '1', 0, '::1'),
(592, 17, '2015-10-22 05:31:30', '2015-12-29 11:07:52', '1', 0, '::2'),
(593, 17, '2015-10-22 05:32:23', '2015-12-29 11:07:52', '1', 0, '::2'),
(594, 17, '2015-10-22 05:49:27', '2015-12-29 11:07:52', '1', 0, '::1'),
(595, 18, '2015-10-22 06:40:46', '2015-12-31 04:01:28', '1', 0, '::2'),
(596, 18, '2015-10-22 06:41:32', '2015-12-31 04:01:28', '1', 0, '::1'),
(597, 17, '2015-10-22 06:41:41', '2015-12-29 11:07:52', '1', 0, '::2'),
(598, 18, '2015-10-22 07:23:42', '2015-12-31 04:01:28', '1', 0, '::1'),
(599, 17, '2015-10-22 07:23:58', '2015-12-29 11:07:52', '1', 0, '::1'),
(600, 17, '2015-10-22 07:33:41', '2015-12-29 11:07:52', '1', 0, '::1'),
(601, 18, '2015-10-22 07:33:54', '2015-12-31 04:01:28', '1', 0, '::1'),
(602, 17, '2015-10-22 07:34:24', '2015-12-29 11:07:52', '1', 0, '::1'),
(603, 17, '2015-10-22 07:39:37', '2015-12-29 11:07:52', '1', 0, '::1'),
(604, 17, '2015-10-22 07:50:59', '2015-12-29 11:07:52', '1', 0, '::1'),
(605, 17, '2015-10-22 08:07:10', '2015-12-29 11:07:52', '1', 0, '::1'),
(606, 18, '2015-10-23 03:01:41', '2015-12-31 04:01:28', '1', 0, '::1'),
(607, 18, '2015-10-28 03:35:58', '2015-12-31 04:01:28', '1', 0, '::1'),
(608, 18, '2015-10-28 03:56:51', '2015-12-31 04:01:28', '1', 0, '::1'),
(609, 18, '2015-10-28 04:04:32', '2015-12-31 04:01:28', '1', 0, '::1'),
(610, 18, '2015-10-28 04:53:47', '2015-12-31 04:01:28', '1', 0, '::1'),
(611, 18, '2015-10-28 07:40:48', '2015-12-31 04:01:28', '1', 0, '::1'),
(612, 18, '2015-10-28 07:41:00', '2015-12-31 04:01:28', '1', 0, '::1'),
(613, 18, '2015-10-28 07:41:12', '2015-12-31 04:01:28', '1', 0, '::1'),
(614, 18, '2015-10-28 07:53:03', '2015-12-31 04:01:28', '1', 0, '::1'),
(615, 18, '2015-10-28 07:55:40', '2015-12-31 04:01:28', '1', 0, '::1'),
(616, 18, '2015-10-28 08:02:06', '2015-12-31 04:01:28', '1', 0, '::1'),
(617, 18, '2015-10-28 08:02:17', '2015-12-31 04:01:28', '1', 0, '::1'),
(618, 18, '2015-10-28 10:34:54', '2015-12-31 04:01:28', '1', 0, '::1'),
(619, 18, '2015-10-28 11:31:55', '2015-12-31 04:01:28', '1', 0, '::1'),
(620, 18, '2015-10-28 11:37:18', '2015-12-31 04:01:28', '1', 0, '::1'),
(621, 18, '2015-10-28 11:37:45', '2015-12-31 04:01:28', '1', 0, '::1'),
(622, 18, '2015-10-28 11:41:04', '2015-12-31 04:01:28', '1', 0, '::1'),
(623, 18, '2015-10-29 06:08:32', '2015-12-31 04:01:28', '1', 0, '::1'),
(624, 18, '2015-10-29 08:57:05', '2015-12-31 04:01:28', '1', 0, '::1'),
(625, 18, '2015-10-29 09:55:38', '2015-12-31 04:01:28', '1', 0, '::1'),
(626, 18, '2015-10-29 09:59:11', '2015-12-31 04:01:28', '1', 0, '::1'),
(627, 18, '2015-10-29 10:18:15', '2015-12-31 04:01:28', '1', 0, '::1'),
(628, 18, '2015-10-29 11:00:16', '2015-12-31 04:01:28', '1', 0, '::1'),
(629, 18, '2015-10-30 03:09:25', '2015-12-31 04:01:28', '1', 0, '::1'),
(630, 18, '2015-10-30 05:59:49', '2015-12-31 04:01:28', '1', 0, '::1'),
(631, 18, '2015-10-30 10:11:54', '2015-12-31 04:01:28', '1', 0, '::1'),
(632, 18, '2015-10-30 11:15:58', '2015-12-31 04:01:28', '1', 0, '::1'),
(633, 18, '2015-11-02 03:15:06', '2015-12-31 04:01:28', '1', 0, '::1'),
(634, 18, '2015-11-03 03:02:10', '2015-12-31 04:01:28', '1', 0, '::1'),
(635, 18, '2015-11-04 03:18:13', '2015-12-31 04:01:28', '1', 0, '::1'),
(636, 17, '2015-11-18 09:52:00', '2015-12-29 11:07:52', '1', 0, '::1'),
(637, 17, '0000-00-00 00:00:00', '2015-12-29 11:07:52', '1', 0, '::1'),
(638, 17, '2015-11-23 04:55:21', '2015-12-29 11:07:52', '1', 0, '::1'),
(639, 18, '2015-11-23 05:12:31', '2015-12-31 04:01:28', '1', 0, '::1'),
(640, 18, '2015-11-23 05:20:38', '2015-12-31 04:01:28', '1', 0, '::1'),
(641, 18, '2015-11-23 05:25:49', '2015-12-31 04:01:28', '1', 0, '::1'),
(642, 18, '2015-11-23 06:17:41', '2015-12-31 04:01:28', '1', 0, '::1'),
(643, 18, '2015-11-23 07:47:14', '2015-12-31 04:01:28', '1', 0, '::1'),
(644, 18, '2015-11-23 08:00:41', '2015-12-31 04:01:28', '1', 0, '::1'),
(645, 18, '2015-11-23 08:01:07', '2015-12-31 04:01:28', '1', 0, '::1'),
(646, 18, '2015-11-23 08:22:44', '2015-12-31 04:01:28', '1', 0, '::1'),
(647, 18, '2015-11-24 03:17:29', '2015-12-31 04:01:28', '1', 0, '::1'),
(648, 18, '2015-11-24 03:21:03', '2015-12-31 04:01:28', '1', 0, '::1'),
(649, 18, '2015-11-26 07:22:49', '2015-12-31 04:01:28', '1', 0, '::1'),
(650, 18, '2015-11-26 11:14:37', '2015-12-31 04:01:28', '1', 0, '::1'),
(651, 18, '2015-11-27 03:36:27', '2015-12-31 04:01:28', '1', 0, '::1'),
(652, 18, '2015-11-27 03:38:12', '2015-12-31 04:01:28', '1', 0, '::1'),
(653, 18, '2015-11-27 04:04:25', '2015-12-31 04:01:28', '1', 0, '::1'),
(654, 18, '2015-11-27 10:33:34', '2015-12-31 04:01:28', '1', 0, '::1'),
(655, 18, '2015-11-30 03:00:19', '2015-12-31 04:01:28', '1', 0, '::1'),
(656, 18, '2015-12-01 03:07:26', '2015-12-31 04:01:28', '1', 0, '::1'),
(657, 18, '2015-12-01 03:07:30', '2015-12-31 04:01:28', '1', 0, '::1'),
(658, 18, '2015-12-02 07:13:14', '2015-12-31 04:01:28', '1', 0, '::1'),
(659, 18, '2015-12-02 08:15:18', '2015-12-31 04:01:28', '1', 0, '::1'),
(660, 18, '2015-12-03 03:17:21', '2015-12-31 04:01:28', '1', 0, '::1'),
(661, 18, '2015-12-03 03:30:20', '2015-12-31 04:01:28', '1', 0, '::1'),
(662, 18, '2015-12-03 03:50:12', '2015-12-31 04:01:28', '1', 0, '::1'),
(663, 18, '2015-12-03 10:13:25', '2015-12-31 04:01:28', '1', 0, '::1'),
(664, 18, '2015-12-04 03:26:21', '2015-12-31 04:01:28', '1', 0, '::1'),
(665, 18, '2015-12-07 03:41:16', '2015-12-31 04:01:28', '1', 0, '::1'),
(666, 18, '2015-12-08 04:16:47', '2015-12-31 04:01:28', '1', 0, '::1'),
(667, 18, '2015-12-09 03:29:00', '2015-12-31 04:01:28', '1', 0, '::1'),
(668, 18, '2015-12-10 03:19:20', '2015-12-31 04:01:28', '1', 0, '::1'),
(669, 18, '2015-12-11 03:17:35', '2015-12-31 04:01:28', '1', 0, '::1'),
(670, 18, '2015-12-14 03:15:11', '2015-12-31 04:01:28', '1', 0, '::1'),
(671, 18, '2015-12-15 03:02:25', '2015-12-31 04:01:28', '1', 0, '::1'),
(672, 18, '2015-12-16 03:04:39', '2015-12-31 04:01:28', '1', 0, '::1'),
(673, 18, '2015-12-17 03:40:09', '2015-12-31 04:01:28', '1', 0, '::1'),
(674, 18, '2015-12-18 03:02:45', '2015-12-31 04:01:28', '1', 0, '::1'),
(675, 18, '2015-12-21 03:05:52', '2015-12-31 04:01:28', '1', 0, '::1'),
(676, 18, '2015-12-21 03:11:22', '2015-12-31 04:01:28', '1', 0, '::1'),
(677, 18, '2015-12-22 03:03:47', '2015-12-31 04:01:28', '1', 0, '::1'),
(678, 18, '2015-12-22 06:59:56', '2015-12-31 04:01:28', '1', 0, '::1'),
(679, 18, '2015-12-22 07:20:27', '2015-12-31 04:01:28', '1', 0, '::1'),
(680, 18, '2015-12-22 07:23:00', '2015-12-31 04:01:28', '1', 0, '::1'),
(681, 18, '2015-12-22 07:23:11', '2015-12-31 04:01:28', '1', 0, '::1'),
(682, 18, '2015-12-22 07:24:02', '2015-12-31 04:01:28', '1', 0, '::1'),
(683, 18, '2015-12-22 07:25:13', '2015-12-31 04:01:28', '1', 0, '::1'),
(684, 17, '2015-12-22 07:26:17', '2015-12-29 11:07:52', '1', 0, '::1'),
(685, 18, '2015-12-22 07:28:40', '2015-12-31 04:01:28', '1', 0, '::1'),
(686, 18, '2015-12-22 07:45:27', '2015-12-31 04:01:28', '1', 0, '::1'),
(687, 18, '2015-12-22 07:48:26', '2015-12-31 04:01:28', '1', 0, '::1'),
(688, 18, '2015-12-23 03:14:46', '2015-12-31 04:01:28', '1', 0, '::1'),
(689, 18, '2015-12-28 03:19:58', '2015-12-31 04:01:28', '1', 0, '::1'),
(690, 18, '2015-12-29 03:22:04', '2015-12-31 04:01:28', '1', 0, '::1'),
(691, 17, '2015-12-29 05:32:12', '2015-12-29 11:07:52', '1', 0, '::1'),
(692, 18, '2015-12-29 07:08:44', '2015-12-31 04:01:28', '1', 0, '::1'),
(693, 17, '2015-12-29 07:09:08', '2015-12-29 11:07:52', '1', 0, '::1'),
(694, 18, '2015-12-29 07:30:10', '2015-12-31 04:01:28', '1', 0, '::1'),
(695, 18, '2015-12-29 10:04:37', '2015-12-31 04:01:28', '1', 0, '::1'),
(696, 18, '2015-12-29 10:06:49', '2015-12-31 04:01:28', '1', 0, '::1'),
(697, 17, '2015-12-29 11:07:52', '2015-12-29 11:08:10', '1', 0, '::1'),
(698, 18, '2015-12-29 11:08:13', '2015-12-31 04:01:28', '1', 0, '::1'),
(699, 18, '2015-12-30 03:44:55', '2015-12-31 04:01:28', '1', 0, '::1'),
(700, 18, '2015-12-31 04:01:28', NULL, '1', 1, '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `call_log`
--
ALTER TABLE `call_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `call_type`
--
ALTER TABLE `call_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_tax`
--
ALTER TABLE `cart_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_category`
--
ALTER TABLE `contact_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_log`
--
ALTER TABLE `crm_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `home_page`
--
ALTER TABLE `home_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_settings`
--
ALTER TABLE `page_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_product`
--
ALTER TABLE `sales_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_history`
--
ALTER TABLE `status_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_admin`
--
ALTER TABLE `s_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_p_tax`
--
ALTER TABLE `s_p_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_category`
--
ALTER TABLE `ticket_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_problem`
--
ALTER TABLE `ticket_problem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `call_log`
--
ALTER TABLE `call_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `call_type`
--
ALTER TABLE `call_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cart_tax`
--
ALTER TABLE `cart_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `contact_category`
--
ALTER TABLE `contact_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `crm_log`
--
ALTER TABLE `crm_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `home_page`
--
ALTER TABLE `home_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `page_settings`
--
ALTER TABLE `page_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;
--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `sales_product`
--
ALTER TABLE `sales_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `status_history`
--
ALTER TABLE `status_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `s_p_tax`
--
ALTER TABLE `s_p_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `ticket_category`
--
ALTER TABLE `ticket_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ticket_problem`
--
ALTER TABLE `ticket_problem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id of the user', AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=701;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
