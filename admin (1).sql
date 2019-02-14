-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2019 at 09:12 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_link` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `updatedOn` datetime DEFAULT NULL,
  `addedOn` datetime NOT NULL,
  `addedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_link`, `banner_image`, `updatedOn`, `addedOn`, `addedBy`) VALUES
(1, 'http://office.javnic.com/index.php/messages/inbox', 'banner_section/01-2019/another2.jpg', '2019-01-23 11:34:34', '2019-01-23 11:34:34', 1),
(2, 'http://thefoxtrending.wpengine.com/', 'banner_section/01-2019/download.jpg', '2019-01-23 11:55:13', '2019-01-23 11:55:13', 1),
(3, 'https://themeforest.net/item/thefox-responsive-multipurpose-wordpress-theme/11099136?s_rank=2', 'banner_section/01-2019/images4.jpg', '2019-01-23 11:59:51', '2019-01-23 11:59:51', 1),
(4, 'https://sktperfectdemo.com/demos/it-solutions/', 'banner_section/01-2019/images2.jpg', '2019-01-23 12:30:49', '2019-01-23 12:30:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(50) NOT NULL,
  `companion_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `tasks` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `companion_name`, `company_name`, `tasks`, `amount`, `image`, `featured`, `created`) VALUES
(1, 'demo', 'demo', '2', '2', '', 0, '2019-01-19 12:53:03'),
(2, 'demo', 'demo', '2', '2', '', 0, '2019-01-19 12:53:03'),
(3, 'jeet', 'singh', '3', '3', '', 0, '2019-01-19 12:53:03'),
(4, 'sunil', 'singh', '3', '4', '', 0, '2019-01-19 12:53:03'),
(5, '', '', '', '', '', 0, '2019-01-19 12:53:03'),
(6, 'sdfsd', '', '', '', '', 0, '2019-01-19 12:53:03'),
(7, 'dfsd', 'dfsdsd', '3', '4', '', 0, '2019-01-19 12:53:03'),
(8, 'deepak', 'panwar', '7', '3', '', 0, '2019-01-19 12:53:03'),
(9, 'ewr', 'erwr', '2', '2', '', 0, '2019-01-19 12:53:03'),
(10, 'dg', 'dfgdfg', '2', '3', '', 0, '2019-01-19 12:53:03'),
(11, 'dg', 'dfgdfg', '2', '3', '', 0, '2019-01-19 12:53:03'),
(12, 'cvcv', 'cvbc', '4', '3', '', 0, '2019-01-19 12:53:03'),
(13, 'cvcv', 'cvbc', '4', '3', '', 0, '2019-01-19 12:53:03'),
(14, 'cvcbvb', 'cvbcb', '4', '3', '', 0, '2019-01-19 12:53:03'),
(15, 'bc', 'vcbc', '2', '3', '', 0, '2019-01-19 12:53:03'),
(16, 'sdfs', 'sdfds', '2', '2', '', 0, '2019-01-19 12:53:03'),
(17, 'hghfg', 'hfg', '3', '3', '', 0, '2019-01-19 12:53:03'),
(18, 'hghfg', 'hfg', '3', '3', '', 0, '2019-01-19 12:53:22'),
(19, 'hghfg', 'hfg', '3', '3', '', 0, '2019-01-19 12:59:03'),
(20, 'test', 'test1', '3', '5', '', 0, '2019-01-21 05:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `home_section`
--

CREATE TABLE `home_section` (
  `home_section_id` int(11) NOT NULL,
  `compain_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `task` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `updatedOn` datetime DEFAULT NULL,
  `addedOn` datetime NOT NULL,
  `addedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_section`
--

INSERT INTO `home_section` (`home_section_id`, `compain_name`, `company_name`, `task`, `amount`, `logo`, `status`, `updatedOn`, `addedOn`, `addedBy`) VALUES
(1, 'retre', 'erwr', '3', '4', 'home/01-2019/images11.jpg', 1, '2019-01-23 11:38:48', '2019-01-23 11:38:48', 1),
(2, 'test', 'test1', '3', '6', 'home/01-2019/beach-florida-sunrise-715651.jpg', 0, '2019-01-23 11:52:45', '2019-01-23 11:52:45', 1),
(3, 'jeet', 'dfgdfg', '20', '16', 'home/01-2019/download1.jpg', 1, '2019-01-23 11:54:18', '2019-01-23 11:54:18', 1),
(4, 'demo', 'cvbc', '5', '7', 'home/01-2019/one.jpg', 0, '2019-01-23 12:07:55', '2019-01-23 12:07:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `s_preferences`
--

CREATE TABLE `s_preferences` (
  `prefID` int(11) NOT NULL,
  `key` varchar(64) NOT NULL,
  `value` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_preferences`
--

INSERT INTO `s_preferences` (`prefID`, `key`, `value`) VALUES
(1, 'comEmail', 'info@example.com'),
(2, 'comPhone', '(1800) 123 4567'),
(3, 'comAddress', '184 Collins Street West \r\nVictoria, United States, 8007'),
(4, 'comLogo', ''),
(5, 'comFavicon', 'logo.jpg'),
(6, 'dateFormat', 'd-m-Y'),
(7, 'timeFormat', '12Small'),
(8, 'mailProtocol', 'mail'),
(9, 'serverEmail', 'no-reply@example.com'),
(10, 'smtpPassword', ''),
(11, 'smtpHost', ''),
(12, 'smtpPort', ''),
(13, 'siteRedirection', ''),
(14, 'siteRedirectionFor', '302'),
(15, 'isRememberMe', '1'),
(16, 'metaTitle', ''),
(17, 'metaDescription', ''),
(18, 'metaKeywords', ''),
(19, 'socialFacebook', ''),
(20, 'socialFacebookPage', ''),
(21, 'socialTwitter', ''),
(22, 'socialGooglePlus', ''),
(23, 'socialPininterest', ''),
(24, 'socialLinkedIn', ''),
(25, 'socialYoutube', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created`) VALUES
(1, 'admin', 'admin', '2019-01-21 05:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `emailID` varchar(100) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `rememberKey` varchar(128) DEFAULT NULL,
  `rememberKeyExpiredOn` int(11) DEFAULT NULL,
  `forgetKey` char(128) DEFAULT NULL,
  `forgetKeyExpiredOn` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `addedOn` datetime NOT NULL,
  `addedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `groupID`, `fullName`, `emailID`, `mobile`, `password`, `salt`, `rememberKey`, `rememberKeyExpiredOn`, `forgetKey`, `forgetKeyExpiredOn`, `status`, `addedOn`, `addedBy`) VALUES
(1, 1, 'Admin', 'biswadeepoffice@gmail.com', NULL, '02899350403cb0aa98860fc7b476a26f256754409a594db13e60456631a92050b95fa29deeae4efec7b8186022da26dae808ede153fbb1f79359f8073b50cdca', 'c70a50cc00c8c5ae6c5db4dba1ad7afd7c0bc5042f99220dc1dd4358aca95bda46504a71c5f47650c7d69d7ac2f3582b35dc73031e1546d33a82260bafe8da8a', NULL, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `field` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `groupID` int(11) NOT NULL,
  `groupName` varchar(50) NOT NULL,
  `updatedOn` datetime DEFAULT NULL,
  `addedOn` datetime NOT NULL,
  `addedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`groupID`, `groupName`, `updatedOn`, `addedOn`, `addedBy`) VALUES
(1, 'Administrator', '2019-01-21 18:01:32', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_group_access`
--

CREATE TABLE `user_group_access` (
  `groupID` int(11) NOT NULL,
  `class` varchar(64) NOT NULL,
  `access` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group_access`
--

INSERT INTO `user_group_access` (`groupID`, `class`, `access`) VALUES
(1, 'admin/banner_section', '1;2;3;4'),
(1, 'admin/home', '1;2;3;4'),
(1, 'admin/settings/preferences', '1;2;3;4'),
(1, 'admin/settings/settings', '1;2;3;4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_section`
--
ALTER TABLE `home_section`
  ADD PRIMARY KEY (`home_section_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_preferences`
--
ALTER TABLE `s_preferences`
  ADD PRIMARY KEY (`prefID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `emailID` (`emailID`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`groupID`);

--
-- Indexes for table `user_group_access`
--
ALTER TABLE `user_group_access`
  ADD KEY `groupID` (`groupID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `home_section`
--
ALTER TABLE `home_section`
  MODIFY `home_section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_preferences`
--
ALTER TABLE `s_preferences`
  MODIFY `prefID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `groupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
