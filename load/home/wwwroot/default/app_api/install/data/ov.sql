-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2016-10-26 18:32:22
-- 服务器版本： 5.5.50-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ov`
--

-- --------------------------------------------------------

--
-- 表的结构 `app_admin`
--

CREATE TABLE `app_admin` (
  `id` int(11) NOT NULL,
  `op` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `app_admin`
--

INSERT INTO `app_admin` (`id`, `op`, `username`, `password`) VALUES
(1, '0', 'admin', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `app_config`
--

CREATE TABLE `app_config` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `app_config`
--



-- --------------------------------------------------------

--
-- 表的结构 `app_daili`
--

CREATE TABLE `app_daili` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `app_gg`
--

CREATE TABLE `app_gg` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `time` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `app_gg`
--

INSERT INTO `app_gg` (`id`, `name`, `content`, `time`) VALUES
(10, '【公告】欢迎使用叮咚流量卫士', '欢迎您使用 叮咚流量卫士。首次使用请点击云端线路安装适合自己的线路。\r\n如果遇到任何问题请联系客服qq2207134109', '1474274509'),
(11, '【公告】服务器提速升级通知', '为了更好的用户体验我们对服务器的网络传输进行了升级优化，理论可带来明显的网速提升。尤其是对距离服务器节点较远的地点有些效果显著。实际使用情况测试中，请用户积极反馈。', '1474309888'),
(12, '【公告】系统升级通知', '尊敬的用户您好，为了更加优质的用户体验，我们对流控系统就行了升级。流控已经换成自家编写的系统，更能保护用户隐私并且提供更加完善的服务器。\r\n感谢您的理解和支持。\r\n\r\n筑梦工作室，叮咚云。', '1474402724'),
(13, '【公告】服务器进行夜间维护通知', '尊敬的用户您好，服务器于9月26到9月27晚11-12点期间进行了短暂的停机维护。给您造成的不便尽请谅解。\r\n维护事软件无法连接。并且会持续消耗流量。因此请在夜间关闭网络。\r\n筑梦工作室', '1474915308'),
(14, '请等待十分钟后再次连接', '服务器短暂停机系统维护。期间会出现多次掉线。为保证您不必要的话费。请稍后十分钟再连接服务器。感谢您的理解和支持。', '1475221132'),
(15, '【公告】四川免流可能失效', '四川免流可能已经和谐。如果您是四川用户。请注意您的流量使用情况。并及时向客服反馈。\r\n其他省份也请注意。', '1475341731'),
(16, '关于近期连接不稳定通告', '近期服务器受到攻击。导致连接不稳定。同时也请您注意保护服务器隐私。不私自向任何人传发。', '1475869975'),
(18, '无法登录问题请点击这里', '系统升 级 密码强制修改为用户名。请用用户名作为密码登录。', '1475931591'),
(21, '关于恶意盗取流量通知', '近期发现大量恶意盗取流量绕过登录系统的黑用户。占用正常用户资源，给服务器带来了不必要的开销。为了彻底杜绝此类现象。只要发现黑用户立即封锁IP。当然。其会造成同一ip的用户都无法连接。\r\n但这也是无奈之举。\r\n黑用户也不要尝试了 系统有自动检测功能 一旦发现你猖狂的过分立即自动封禁你的ip。\r\n\r\n奔走相告\r\n【冬瓜发布】', '1476468899'),
(22, '所有客户自觉添加售后群', '欢迎加入大鑫云免用户群，群号码：528975641\r\n欢迎加入叮咚免流用户群，群号码：248661805', '1476890912'),
(24, '售后群，请自行添加', '欢迎加入大鑫云免用户群，群号码：528975641\r\n欢迎加入叮咚免流用户群，群号码：248661805', '1477352893');

-- --------------------------------------------------------

--
-- 表的结构 `app_qq`
--

CREATE TABLE `app_qq` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `time` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `app_qq`
--

INSERT INTO `app_qq` (`id`, `name`, `content`, `time`) VALUES
(10, '【公告】欢迎使用叮咚流量卫士', '欢迎您使用 叮咚流量卫士。首次使用请点击云端线路安装适合自己的线路。\r\n如果遇到任何问题请联系客服qq2207134109', '1474274509'),
(11, '【公告】服务器提速升级通知', '为了更好的用户体验我们对服务器的网络传输进行了升级优化，理论可带来明显的网速提升。尤其是对距离服务器节点较远的地点有些效果显著。实际使用情况测试中，请用户积极反馈。', '1474309888'),
(12, '【公告】系统升级通知', '尊敬的用户您好，为了更加优质的用户体验，我们对流控系统就行了升级。流控已经换成自家编写的系统，更能保护用户隐私并且提供更加完善的服务器。\r\n感谢您的理解和支持。\r\n\r\n筑梦工作室，叮咚云。', '1474402724'),
(13, '【公告】服务器进行夜间维护通知', '尊敬的用户您好，服务器于9月26到9月27晚11-12点期间进行了短暂的停机维护。给您造成的不便尽请谅解。\r\n维护事软件无法连接。并且会持续消耗流量。因此请在夜间关闭网络。\r\n筑梦工作室', '1474915308'),
(14, '请等待十分钟后再次连接', '服务器短暂停机系统维护。期间会出现多次掉线。为保证您不必要的话费。请稍后十分钟再连接服务器。感谢您的理解和支持。', '1475221132'),
(15, '【公告】四川免流可能失效', '四川免流可能已经和谐。如果您是四川用户。请注意您的流量使用情况。并及时向客服反馈。\r\n其他省份也请注意。', '1475341731'),
(16, '关于近期连接不稳定通告', '近期服务器受到攻击。导致连接不稳定。同时也请您注意保护服务器隐私。不私自向任何人传发。', '1475869975'),
(18, '无法登录问题请点击这里', '系统升 级 密码强制修改为用户名。请用用户名作为密码登录。', '1475931591');

-- --------------------------------------------------------

--
-- 表的结构 `app_read`
--

CREATE TABLE `app_read` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `readid` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




-- --------------------------------------------------------

--
-- 表的结构 `line`
--

CREATE TABLE `line` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `type` text NOT NULL,
  `group` text NOT NULL,
  `show` int(11) NOT NULL,
  `label` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `line`
--

-- --------------------------------------------------------

--
-- 表的结构 `line_grop`
--

CREATE TABLE `line_grop` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_bin NOT NULL,
  `show` int(11) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `line_grop`
--

INSERT INTO `line_grop` (`id`, `name`, `show`, `order`) VALUES
(1, '中国移动', 1, 1),
(2, '中国电信', 1, 1),
(3, '中国联通', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `top`
--

CREATE TABLE `top` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `data` bigint(20) NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `top`
--


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
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `line_grop`
--
ALTER TABLE `line_grop`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `top`
--
ALTER TABLE `top`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `app_admin`
--
ALTER TABLE `app_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `app_config`
--
ALTER TABLE `app_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `app_daili`
--
ALTER TABLE `app_daili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `app_gg`
--
ALTER TABLE `app_gg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- 使用表AUTO_INCREMENT `app_qq`
--
ALTER TABLE `app_qq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- 使用表AUTO_INCREMENT `app_read`
--
ALTER TABLE `app_read`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- 使用表AUTO_INCREMENT `line`
--
ALTER TABLE `line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- 使用表AUTO_INCREMENT `line_grop`
--
ALTER TABLE `line_grop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `top`
--
ALTER TABLE `top`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2314;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
