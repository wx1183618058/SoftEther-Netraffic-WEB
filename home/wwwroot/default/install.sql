-- phpMyAdmin SQL Dump
-- version 4.4.15.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-11-11 22:42:31
-- 服务器版本： 5.5.48-log
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `123`
--

-- --------------------------------------------------------

--
-- 表的结构 `auth_config`
--

CREATE TABLE IF NOT EXISTS `auth_config` (
  `id` varchar(80) NOT NULL DEFAULT '1',
  `gg` text,
  `ggs` text,
  `dl1` float DEFAULT NULL COMMENT 'vip1',
  `dl2` float DEFAULT NULL COMMENT 'vip2',
  `dl3` float DEFAULT NULL COMMENT 'vip3',
  `dl4` float DEFAULT NULL COMMENT 'vip4',
  `dl5` float DEFAULT NULL COMMENT 'vip5',
  `dl0` float DEFAULT NULL COMMENT 'vip0',
  `dls1` float NOT NULL,
  `dls2` float NOT NULL,
  `dls3` float NOT NULL,
  `dls4` float NOT NULL,
  `dls5` float NOT NULL,
  `dls0` float NOT NULL,
  `regok` int(11) DEFAULT NULL,
  `activeok` int(11) DEFAULT NULL,
  `ok` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_config`
--

INSERT INTO `auth_config` (`id`, `gg`, `ggs`, `dl1`, `dl2`, `dl3`, `dl4`, `dl5`, `dl0`, `dls1`, `dls2`, `dls3`, `dls4`, `dls5`, `dls0`, `regok`, `activeok`, `ok`) VALUES
('1', '231123546', '31222222', 3, 0.01, 2.5, 2, 1.5, 7, 0.1, 0.1, 0.1, 0.1, 0.1, 0.1, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `auth_daili`
--

CREATE TABLE IF NOT EXISTS `auth_daili` (
  `id` int(255) NOT NULL,
  `tj_rmb` decimal(11,2) NOT NULL,
  `tj_user` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `rmb` decimal(11,2) NOT NULL DEFAULT '0.00',
  `vip` int(11) DEFAULT NULL,
  `kmlist` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `auth_kms`
--

CREATE TABLE IF NOT EXISTS `auth_kms` (
  `id` int(11) NOT NULL,
  `kind` tinyint(1) NOT NULL DEFAULT '1',
  `daili` int(11) NOT NULL DEFAULT '0',
  `km` varchar(64) DEFAULT NULL,
  `value` int(11) NOT NULL DEFAULT '0',
  `values` decimal(11,2) DEFAULT NULL,
  `money` decimal(11,2) DEFAULT '0.00',
  `isuse` tinyint(1) DEFAULT '0',
  `user` varchar(50) DEFAULT NULL,
  `usetime` datetime DEFAULT NULL,
  `addtime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `auth_log`
--

CREATE TABLE IF NOT EXISTS `auth_log` (
  `id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `openvpn`
--

CREATE TABLE IF NOT EXISTS `openvpn` (
  `id` int(11) NOT NULL,
  `iuser` varchar(16) NOT NULL,
  `isent` bigint(128) DEFAULT '0',
  `irecv` bigint(128) DEFAULT '0',
  `maxll` bigint(128) NOT NULL,
  `pass` varchar(18) NOT NULL,
  `i` int(1) NOT NULL,
  `starttime` varchar(30) DEFAULT NULL,
  `endtime` int(11) DEFAULT '0',
  `down` int(11) DEFAULT '0',
  `upload` int(11) DEFAULT '0',
  `logins` int(11) DEFAULT '0',
  `online` int(1) NOT NULL,
  `dlid` int(11) DEFAULT NULL,
  `tian` int(11) NOT NULL COMMENT '??ǰ?ѷ???'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_config`
--
ALTER TABLE `auth_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_daili`
--
ALTER TABLE `auth_daili`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_kms`
--
ALTER TABLE `auth_kms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `km` (`km`);

--
-- Indexes for table `auth_log`
--
ALTER TABLE `auth_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `openvpn`
--
ALTER TABLE `openvpn`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `iuser` (`iuser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_daili`
--
ALTER TABLE `auth_daili`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auth_kms`
--
ALTER TABLE `auth_kms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auth_log`
--
ALTER TABLE `auth_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `openvpn`
--
ALTER TABLE `openvpn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
