-- phpMyAdmin SQL Dump
-- version 4.4.15.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-11-27 11:51:25
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
-- 表的结构 `app_admin`
--

CREATE TABLE IF NOT EXISTS `app_admin` (
  `id` int(11) NOT NULL,
  `op` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `app_admin`
--

INSERT INTO `app_admin` (`id`, `op`, `username`, `password`) VALUES
(1, '0', 'admin', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `app_config`
--

CREATE TABLE IF NOT EXISTS `app_config` (
  `id` int(11) NOT NULL,
  `system` text NOT NULL,
  `qq` text NOT NULL,
  `top_content` text NOT NULL,
  `no_limit` text NOT NULL,
  `reg` int(11) NOT NULL,
  `col1` text NOT NULL,
  `col2` text NOT NULL,
  `col3` text NOT NULL,
  `col4` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `app_daili`
--

CREATE TABLE IF NOT EXISTS `app_daili` (
  `id` int(11) NOT NULL,
  `default` int(11) NOT NULL,
  `qq` text NOT NULL,
  `conetnt` text NOT NULL,
  `chongzhi` text NOT NULL,
  `name` text NOT NULL,
  `pass` text NOT NULL,
  `web` text NOT NULL,
  `show` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `app_gg`
--

CREATE TABLE IF NOT EXISTS `app_gg` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `time` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `app_gg`
--

INSERT INTO `app_gg` (`id`, `name`, `content`, `time`) VALUES
(10, '【公告】欢迎使用叮咚流量卫士', '欢迎您使用 叮咚流量卫士。首次使用请点击云端线路安装适合自己的线路。\r\n如果遇到任何问题请联系客服', '1474274509');

-- --------------------------------------------------------

--
-- 表的结构 `app_qq`
--

CREATE TABLE IF NOT EXISTS `app_qq` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `time` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `app_qq`
--

INSERT INTO `app_qq` (`id`, `name`, `content`, `time`) VALUES
(10, '【公告】欢迎使用叮咚流量卫士', '欢迎您使用 叮咚流量卫士。首次使用请点击云端线路安装适合自己的线路。\r\n如果遇到任何问题请联系客服', '1474274509');

-- --------------------------------------------------------

--
-- 表的结构 `app_read`
--

CREATE TABLE IF NOT EXISTS `app_read` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `readid` text NOT NULL,
  `time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- 表的结构 `line_grop`
--

CREATE TABLE IF NOT EXISTS `line_grop` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_bin NOT NULL,
  `show` int(11) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `line_grop`
--

INSERT INTO `line_grop` (`id`, `name`, `show`, `order`) VALUES
(1, '中国移动', 1, 1),
(2, '中国电信', 1, 1),
(3, '中国联通', 1, 1);

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
  `osent` bigint(128) DEFAULT '0',
  `orecv` bigint(128) DEFAULT '0',
  `mode` varchar(16) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `dlid` int(11) DEFAULT NULL,
  `tian` int(11) NOT NULL COMMENT '??ǰ?ѷ???'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `top`
--

CREATE TABLE IF NOT EXISTS `top` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `data` bigint(20) NOT NULL,
  `data2` bigint(20) NOT NULL,
  `time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_admin`
--
ALTER TABLE `app_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_config`
--
ALTER TABLE `app_config`
  ADD KEY `id` (`id`);

--
-- Indexes for table `app_daili`
--
ALTER TABLE `app_daili`
  ADD KEY `id` (`id`);

--
-- Indexes for table `app_gg`
--
ALTER TABLE `app_gg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_3` (`id`);

--
-- Indexes for table `app_qq`
--
ALTER TABLE `app_qq`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_3` (`id`);

--
-- Indexes for table `app_read`
--
ALTER TABLE `app_read`
  ADD KEY `id` (`id`);

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
-- Indexes for table `line_grop`
--
ALTER TABLE `line_grop`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `openvpn`
--
ALTER TABLE `openvpn`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `iuser` (`iuser`);

--
-- Indexes for table `top`
--
ALTER TABLE `top`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_admin`
--
ALTER TABLE `app_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `app_config`
--
ALTER TABLE `app_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `app_daili`
--
ALTER TABLE `app_daili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `app_gg`
--
ALTER TABLE `app_gg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `app_qq`
--
ALTER TABLE `app_qq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `app_read`
--
ALTER TABLE `app_read`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `line_grop`
--
ALTER TABLE `line_grop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `openvpn`
--
ALTER TABLE `openvpn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `top`
--
ALTER TABLE `top`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
