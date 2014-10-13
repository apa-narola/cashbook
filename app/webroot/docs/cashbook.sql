-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2014 at 06:00 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cashbook`
--
CREATE DATABASE IF NOT EXISTS `cashbook` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cashbook`;

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE IF NOT EXISTS `login_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` char(32) NOT NULL,
  `duration` varchar(32) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `login_tokens`
--

INSERT INTO `login_tokens` (`id`, `user_id`, `token`, `duration`, `used`, `created`, `expires`) VALUES
(1, 1, '93eacead49f7ea69a8730a81790d9aad', '2 weeks', 0, '2014-09-16 02:49:53', '2014-09-30 02:49:53'),
(2, 1, '9269fa353039ec92462a466a652f8f02', '2 weeks', 0, '2014-09-16 03:29:23', '2014-09-30 03:29:23'),
(3, 1, 'ee092fd0d2e399f35494b6fd66690050', '2 weeks', 1, '2014-09-19 23:34:40', '2014-10-03 23:34:40'),
(4, 1, 'e1a90a3fc44515a30398ee99769aa70c', '2 weeks', 0, '2014-09-20 03:37:56', '2014-10-04 03:37:56'),
(5, 1, '31c670564ec51c0e333dc9b31db481b2', '2 weeks', 1, '2014-09-23 23:32:07', '2014-10-07 23:32:07'),
(6, 1, '62bac4d27994a747b7c9575fc4ba76d3', '2 weeks', 0, '2014-09-26 23:41:55', '2014-10-10 23:41:55'),
(7, 1, '929c97344a4982a1b983dc75b7f2983c', '2 weeks', 0, '2014-09-27 02:05:59', '2014-10-11 02:05:59'),
(8, 1, 'c72206a5291e54e635d85aa9876e2067', '2 weeks', 0, '2014-09-27 02:07:44', '2014-10-11 02:07:44'),
(9, 2, 'bd184886df10d1b336d274e0478ff7d1', '2 weeks', 0, '2014-09-27 02:22:59', '2014-10-11 02:22:59'),
(10, 1, '99f2c0ae822fb3ff4d5b2cef206b11ef', '2 weeks', 1, '2014-09-27 02:26:15', '2014-10-11 02:26:15'),
(11, 2, 'c639420d4f6f972ee213c9b51f23ca32', '2 weeks', 0, '2014-09-27 02:26:34', '2014-10-11 02:26:34'),
(12, 1, '791f40793980efde168ffe1115c6bc60', '2 weeks', 0, '2014-09-27 03:42:33', '2014-10-11 03:42:33'),
(13, 1, '3dcc0d2083dea3e6488d54258a3c1522', '2 weeks', 0, '2014-10-03 23:33:06', '2014-10-17 23:33:06'),
(14, 1, '639f72b1255f07c86f8986049733f537', '2 weeks', 0, '2014-10-10 23:42:04', '2014-10-24 23:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_type_id` int(11) NOT NULL,
  `transaction_sub_type_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `transaction_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `transaction_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Giver or Receiver',
  `created_by` int(11) NOT NULL COMMENT 'User id of logged in user or we can say transaction creator',
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_type_id`, `transaction_sub_type_id`, `title`, `description`, `transaction_amount`, `transaction_date`, `user_id`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, 1, 3, 'Salary - Sept-2014', 'Salary received from Ashish for September 2014', 75.25, '2014-09-20 02:26:00', 1, 1, '2014-09-20 02:26:00', 1, '2014-09-27 03:41:40'),
(5, 2, 13, 'Diwali shopping', 'Purchase new clothes for me', 0.00, '2014-09-27 03:20:00', 3, 2, '2014-09-27 03:21:33', 0, '0000-00-00 00:00:00'),
(6, 2, 8, 'test', '', 0.25, '2014-09-27 03:31:00', 3, 2, '2014-09-27 03:35:11', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_types`
--

CREATE TABLE IF NOT EXISTS `transaction_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `transaction_types`
--

INSERT INTO `transaction_types` (`id`, `parent_id`, `title`, `description`, `status`) VALUES
(1, 0, 'Income', 'Income description', 1),
(2, 0, 'Expense', 'Expense description', 1),
(3, 1, 'Salary', 'Salaried income', 1),
(6, 1, 'Other', 'Other income which are not in selection', 1),
(7, 2, 'Home use', 'The expenses which are related to home. e.g. Grocerry, Needed things for day to day life, Vegetables etc.', 1),
(8, 2, 'Miscellaneous', 'All kind of misc expenses which are not in selection.', 1),
(9, 2, 'Electricity', 'Electricity Bill and Electiry city related expenses', 1),
(10, 2, 'Milk', 'Daily or monthly milk expense.', 1),
(11, 2, 'Gas Bill', 'Gas bill expense', 1),
(12, 2, 'Vehicles & Transportation', 'Vehicles and transportation related expenses. For example, To fill petrol in byke, Auto rickshaw costs etc.', 1),
(13, 2, 'Apparel', 'Apparel/Clothes expenses', 1),
(14, 2, 'Hospitality', 'All kind of Hospitality expenses where our role may be host or guest.', 1),
(15, 2, 'Rent & Maintenance', 'Rent of house and its maintenance', 1),
(16, 2, 'Personal use', 'All kind of expenses for personal use. For example, Snacks at office or lari foods, restaurant or in friends circle, Pan - Masala, Coldrinks etc.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) unsigned DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` text,
  `email` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email_verified` int(1) DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '0',
  `ip_address` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`username`),
  KEY `mail` (`email`),
  KEY `users_FKIndex1` (`user_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_group_id`, `username`, `password`, `salt`, `email`, `first_name`, `last_name`, `email_verified`, `active`, `ip_address`, `created`, `modified`) VALUES
(1, 1, 'admin', '365caef7fccbdb1ee711f084be9317a7', '1e6d99570a4d37cc29b18c4a6b06e6ed', 'admin@admin.com', 'Admin', '', 1, 1, '', '2014-09-16 12:08:16', '2014-09-16 12:08:16'),
(2, 2, 'ashish', '35ecf1e3f1513fd4215cce2149a69d1b', '00e11734f88c58eef80eabd6c12a0621', 'apa.narola@narolainfotech.com', 'Ashish', 'Narola', 1, 1, NULL, '2014-09-27 02:20:16', '2014-09-27 02:20:16'),
(3, 2, 'akshar', '7329095adcb93e30d1791c9740211a57', '79511289bbb8e22ac0d436ebec452ae9', 'aksharbnarola@gmail.com', 'Akshar', 'Narola', 1, 1, NULL, '2014-09-27 02:21:05', '2014-09-27 02:21:05'),
(4, 2, 'vikas', '402f3a0fb6c3c79790d84e4f089ae170', '8f51b41f6f1d65134d17ba2590f7644e', 'vikasbnarola@gmail.com', 'Vikas', 'Narola', 1, 1, NULL, '2014-09-27 02:21:44', '2014-09-27 02:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `alias_name` varchar(100) DEFAULT NULL,
  `allowRegistration` int(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `alias_name`, `allowRegistration`, `created`, `modified`) VALUES
(1, 'Admin', 'Admin', 0, '2014-09-16 12:08:16', '2014-09-16 12:08:16'),
(2, 'User', 'User', 1, '2014-09-16 12:08:16', '2014-09-16 12:08:16'),
(3, 'Guest', 'Guest', 0, '2014-09-16 12:08:16', '2014-09-16 12:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_permissions`
--

CREATE TABLE IF NOT EXISTS `user_group_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_group_id` int(10) unsigned NOT NULL,
  `controller` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `action` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `allowed` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `user_group_permissions`
--

INSERT INTO `user_group_permissions` (`id`, `user_group_id`, `controller`, `action`, `allowed`) VALUES
(1, 1, 'Pages', 'display', 1),
(2, 2, 'Pages', 'display', 1),
(3, 3, 'Pages', 'display', 1),
(4, 1, 'UserGroupPermissions', 'index', 1),
(5, 2, 'UserGroupPermissions', 'index', 0),
(6, 3, 'UserGroupPermissions', 'index', 0),
(7, 1, 'UserGroupPermissions', 'update', 1),
(8, 2, 'UserGroupPermissions', 'update', 0),
(9, 3, 'UserGroupPermissions', 'update', 0),
(10, 1, 'UserGroups', 'index', 1),
(11, 2, 'UserGroups', 'index', 0),
(12, 3, 'UserGroups', 'index', 0),
(13, 1, 'UserGroups', 'addGroup', 1),
(14, 2, 'UserGroups', 'addGroup', 0),
(15, 3, 'UserGroups', 'addGroup', 0),
(16, 1, 'UserGroups', 'editGroup', 1),
(17, 2, 'UserGroups', 'editGroup', 0),
(18, 3, 'UserGroups', 'editGroup', 0),
(19, 1, 'UserGroups', 'deleteGroup', 1),
(20, 2, 'UserGroups', 'deleteGroup', 0),
(21, 3, 'UserGroups', 'deleteGroup', 0),
(22, 1, 'Users', 'index', 1),
(23, 2, 'Users', 'index', 0),
(24, 3, 'Users', 'index', 0),
(25, 1, 'Users', 'viewUser', 1),
(26, 2, 'Users', 'viewUser', 1),
(27, 3, 'Users', 'viewUser', 0),
(28, 1, 'Users', 'myprofile', 1),
(29, 2, 'Users', 'myprofile', 1),
(30, 3, 'Users', 'myprofile', 0),
(31, 1, 'Users', 'login', 1),
(32, 2, 'Users', 'login', 1),
(33, 3, 'Users', 'login', 1),
(34, 1, 'Users', 'logout', 1),
(35, 2, 'Users', 'logout', 1),
(36, 3, 'Users', 'logout', 1),
(37, 1, 'Users', 'register', 1),
(38, 2, 'Users', 'register', 1),
(39, 3, 'Users', 'register', 1),
(40, 1, 'Users', 'changePassword', 1),
(41, 2, 'Users', 'changePassword', 1),
(42, 3, 'Users', 'changePassword', 0),
(43, 1, 'Users', 'changeUserPassword', 1),
(44, 2, 'Users', 'changeUserPassword', 0),
(45, 3, 'Users', 'changeUserPassword', 0),
(46, 1, 'Users', 'addUser', 1),
(47, 2, 'Users', 'addUser', 0),
(48, 3, 'Users', 'addUser', 0),
(49, 1, 'Users', 'editUser', 1),
(50, 2, 'Users', 'editUser', 0),
(51, 3, 'Users', 'editUser', 0),
(52, 1, 'Users', 'dashboard', 1),
(53, 2, 'Users', 'dashboard', 1),
(54, 3, 'Users', 'dashboard', 0),
(55, 1, 'Users', 'deleteUser', 1),
(56, 2, 'Users', 'deleteUser', 0),
(57, 3, 'Users', 'deleteUser', 0),
(58, 1, 'Users', 'makeActive', 1),
(59, 2, 'Users', 'makeActive', 0),
(60, 3, 'Users', 'makeActive', 0),
(61, 1, 'Users', 'accessDenied', 1),
(62, 2, 'Users', 'accessDenied', 1),
(63, 3, 'Users', 'accessDenied', 1),
(64, 1, 'Users', 'userVerification', 1),
(65, 2, 'Users', 'userVerification', 1),
(66, 3, 'Users', 'userVerification', 1),
(67, 1, 'Users', 'forgotPassword', 1),
(68, 2, 'Users', 'forgotPassword', 1),
(69, 3, 'Users', 'forgotPassword', 1),
(70, 1, 'Users', 'makeActiveInactive', 1),
(71, 2, 'Users', 'makeActiveInactive', 0),
(72, 3, 'Users', 'makeActiveInactive', 0),
(73, 1, 'Users', 'verifyEmail', 1),
(74, 2, 'Users', 'verifyEmail', 0),
(75, 3, 'Users', 'verifyEmail', 0),
(76, 1, 'Users', 'activatePassword', 1),
(77, 2, 'Users', 'activatePassword', 1),
(78, 3, 'Users', 'activatePassword', 1),
(79, 1, 'Transactions', 'getTransactionTypeByParentId', 0),
(80, 2, 'Transactions', 'getTransactionTypeByParentId', 1),
(81, 3, 'Transactions', 'getTransactionTypeByParentId', 0),
(82, 1, 'Transactions', 'delete', 0),
(83, 2, 'Transactions', 'delete', 1),
(84, 3, 'Transactions', 'delete', 0),
(85, 1, 'Transactions', 'edit', 0),
(86, 2, 'Transactions', 'edit', 1),
(87, 3, 'Transactions', 'edit', 0),
(88, 1, 'Transactions', 'add', 0),
(89, 2, 'Transactions', 'add', 1),
(90, 3, 'Transactions', 'add', 0),
(91, 1, 'Transactions', 'view', 0),
(92, 2, 'Transactions', 'view', 0),
(93, 3, 'Transactions', 'view', 0),
(94, 1, 'Transactions', 'index', 0),
(95, 2, 'Transactions', 'index', 1),
(96, 3, 'Transactions', 'index', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
