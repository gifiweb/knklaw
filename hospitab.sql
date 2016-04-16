-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2015 at 07:36 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hospitab`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE IF NOT EXISTS `attempts` (
`id` int(11) NOT NULL,
  `ip` varchar(39) NOT NULL,
  `count` int(11) NOT NULL,
  `expiredate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'medicine'),
(2, 'meal'),
(3, 'sport');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL,
  `setting` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `setting`, `value`) VALUES
(1, 'site_name', 'Hospitab'),
(2, 'site_url', 'http://hospitab.com'),
(3, 'site_email', 'no-reply@lab.cuonic.com'),
(4, 'cookie_name', 'authID'),
(5, 'cookie_path', '/'),
(6, 'cookie_domain', NULL),
(7, 'cookie_secure', '0'),
(8, 'cookie_http', '0'),
(9, 'site_key', 'fghuior.)/%dgdhjUyhdbv7867HVHG7777ghg'),
(10, 'cookie_remember', '+1 month'),
(11, 'cookie_forget', '+30 minutes'),
(12, 'bcrypt_cost', '10'),
(13, 'table_attempts', 'attempts'),
(14, 'table_requests', 'requests'),
(15, 'table_sessions', 'sessions'),
(16, 'table_users', 'users'),
(17, 'site_timezone', 'Europe/Paris');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
`id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `shop_id` int(11) NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
`id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `rkey` varchar(20) NOT NULL,
  `expire` datetime NOT NULL,
  `type` varchar(20) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `uid`, `rkey`, `expire`, `type`, `notes`) VALUES
(6, 26, '3rjt31ws6fi28sWP4q60', '2015-03-16 21:04:22', 'activation', ''),
(7, 27, '3Qmn11H0A156RQ311581', '2015-03-16 21:14:27', 'activation', ''),
(8, 28, '3FN6mg85OzQP1j4l6021', '2015-03-16 21:15:18', 'activation', ''),
(9, 29, '241G3km7CKaVJ7bCY1tY', '2015-03-16 21:16:25', 'activation', ''),
(10, 30, 'FB54l6X01G85J4J4344r', '2015-03-16 23:40:18', 'activation', '');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
`id` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `number`) VALUES
(1, 98),
(2, 99),
(3, 100),
(4, 101),
(5, 102),
(6, 103),
(7, 104),
(8, 105),
(9, 106),
(10, 107);

-- --------------------------------------------------------

--
-- Table structure for table `rooms_nurses`
--

CREATE TABLE IF NOT EXISTS `rooms_nurses` (
  `room_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms_nurses`
--

INSERT INTO `rooms_nurses` (`room_id`, `uid`) VALUES
(1, 21),
(2, 21),
(3, 21),
(4, 21),
(5, 21),
(6, 30),
(7, 30),
(8, 30),
(9, 21);

-- --------------------------------------------------------

--
-- Table structure for table `rooms_patients`
--

CREATE TABLE IF NOT EXISTS `rooms_patients` (
  `room_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms_patients`
--

INSERT INTO `rooms_patients` (`room_id`, `uid`) VALUES
(98, 15);

-- --------------------------------------------------------

--
-- Table structure for table `routin`
--

CREATE TABLE IF NOT EXISTS `routin` (
`id` int(10) unsigned NOT NULL,
  `every` enum('day','week','month','min') NOT NULL DEFAULT 'day',
  `at` time NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `routin`
--

INSERT INTO `routin` (`id`, `every`, `at`) VALUES
(1, 'day', '03:07:11'),
(2, 'week', '03:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
`id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` varchar(40) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `uid`, `hash`, `expiredate`, `ip`, `agent`, `cookie_crc`) VALUES
(20, 23, '01f923225639f49b50316c1ee7d592cb9c381d63', '2015-03-21 19:44:14', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 'a9380e3eb3a3c6cbea140458efe537188c6b3ef8'),
(51, 15, 'f0a163b8b87842526e9fc40a23f36b3944803ff5', '2015-05-01 06:27:59', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:36.0) Gecko/20100101 Firefox/36.0', '57d340c50ea01722d344cd6d820d14386523cdd7');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE IF NOT EXISTS `shops` (
`id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `name`, `cat_id`, `image`) VALUES
(1, 'Forest', 1, 'http://placehold.it/160x120'),
(2, 'Piley', 1, 'http://placehold.it/160x120');

-- --------------------------------------------------------

--
-- Table structure for table `shop_category`
--

CREATE TABLE IF NOT EXISTS `shop_category` (
`id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf32_unicode_ci NOT NULL,
  `link` varchar(250) COLLATE utf32_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shop_category`
--

INSERT INTO `shop_category` (`id`, `name`, `link`, `image`) VALUES
(1, 'Women''s Apparel', 'apparel', 'http://placehold.it/160x120'),
(2, 'Shoes & Bags', 'shoes-and-bag', 'http://placehold.it/160x120');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
`id` int(10) unsigned NOT NULL,
  `cat_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `nurse_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `title` varchar(250) NOT NULL,
  `notes` text,
  `prio` tinyint(4) NOT NULL DEFAULT '0',
  `assignee_id` int(11) NOT NULL DEFAULT '0',
  `assignee_room` int(11) NOT NULL,
  `routin_id` int(11) NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `cat_id`, `type_id`, `nurse_id`, `start_date`, `end_date`, `title`, `notes`, `prio`, `assignee_id`, `assignee_room`, `routin_id`, `private`, `created`) VALUES
(1, 1, 4, 21, '2015-02-04 00:00:00', '2015-02-18 05:00:00', 'Take pills', 'It is always good to assign unique version numbers to unique states of a project. These numbers are generally assigned in increasing order and correspond to new developments in the project.', 1, 15, 134, 1, 0, '2015-03-15 22:34:20'),
(2, 1, 5, 21, '2015-02-01 04:13:00', '2015-03-11 00:00:00', 'Check temperature', 'These numbers are generally assigned in increasing order and correspond to new developments in the project.', 0, 15, 134, 1, 0, '2015-03-15 22:34:24'),
(3, 1, 1, 21, '2015-03-17 12:00:00', '2015-03-16 12:00:00', 'Take pills', '', 0, 21, 12, 0, 0, '2015-03-04 01:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `task_tags`
--

CREATE TABLE IF NOT EXISTS `task_tags` (
  `tag_id` int(10) unsigned NOT NULL,
  `task_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
`id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(4, 'pills'),
(5, 'temperature'),
(6, 'check');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `type` enum('H','N','P','D','A') NOT NULL DEFAULT 'P',
  `salt` varchar(22) DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `type`, `salt`, `isactive`, `dt`) VALUES
(15, 'puser', '$2y$10$tVlIFIE9MRjV5ddIctsgSOi1oMtqUNNxEb3uvHeaIKXL9CGO5VtxW', 'gifi@expodium.net', 'P', 'tVlIFIE9MRjV5ddIctsgSV', 1, '2015-02-12 23:45:41'),
(17, 'huser', '$2y$10$lCKCyK84RBml1CjkOoxUHOPW7HbPfXBYCvVPn75qEK32w2dKfDB0a', 'galaxy.gef@gmail.com', 'H', 'lCKCyK84RBml1CjkOoxUHY', 1, '2015-02-15 21:46:36'),
(21, 'nuser', '$2y$10$4w4K2.AnZy.O4ljNJXTbmOd.fFBpMU07Id635xsOO8hHWi0tNqh8i', 'gef@gmail.com', 'N', '4w4K2.AnZy.O4ljNJXTbmP', 1, '2015-02-15 21:50:17'),
(22, 'dadada', '$2y$10$HU8csrP5igy0FY.tOdp9t.i3gZB/9GPV75SldLuvYAPxFs0PuzGz2', 'expodiuminsite@gmail.com', 'P', 'HU8csrP5igy0FY.tOdp9tJ', 1, '2015-02-15 22:25:46'),
(23, 'palina', '$2y$10$THmXWGMyxXyTcnG5uSIeruRoKG1QKofL239gxvnHPt.uTttKCzUau', 'palin@gmail.com', 'P', 'THmXWGMyxXyTcnG5uSIery', 1, '2015-02-21 18:41:34'),
(25, 'auser', '$2y$10$4w4K2.AnZy.O4ljNJXTbmOd.fFBpMU07Id635xsOO8hHWi0tNqh8i', 'asddas@dfdf.com', 'A', '4w4K2.AnZy.O4ljNJXTbmP', 1, '2015-03-10 19:37:56'),
(30, 'anur', '$2y$10$OgHDGnNl0ECoW0AQ7iJesOtmkdqdMW.AALV9Pb66w/LbVmt5nnQbu', 'q@q.com', 'N', 'OgHDGnNl0ECoW0AQ7iJesR', 1, '2015-03-15 22:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `uid` int(11) NOT NULL,
  `title` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `room` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`uid`, `title`, `firstname`, `lastname`, `room`, `parent_id`) VALUES
(15, '', 'Alik', 'Ponarev', 143, 21),
(17, '', 'Alice', 'Cripce', 0, 0),
(21, '', 'Nina', 'Bodul', 0, 0),
(25, '', 'Nina', 'Bodul', 0, 0),
(30, '', 'Alex', 'Penik', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms_nurses`
--
ALTER TABLE `rooms_nurses`
 ADD UNIQUE KEY `room_id` (`room_id`);

--
-- Indexes for table `rooms_patients`
--
ALTER TABLE `rooms_patients`
 ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `routin`
--
ALTER TABLE `routin`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uuid` (`every`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_category`
--
ALTER TABLE `shop_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
 ADD PRIMARY KEY (`id`), ADD KEY `nurse_id` (`nurse_id`);

--
-- Indexes for table `task_tags`
--
ALTER TABLE `task_tags`
 ADD KEY `tag_id` (`tag_id`), ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
 ADD UNIQUE KEY `uid_2` (`uid`), ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `routin`
--
ALTER TABLE `routin`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shop_category`
--
ALTER TABLE `shop_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`nurse_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
