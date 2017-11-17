-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 07 月 13 日 08:53
-- 服务器版本: 5.1.28-rc-community
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `goods`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp_auth_group`
--

CREATE TABLE IF NOT EXISTS `tp_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `tp_auth_group`
--

INSERT INTO `tp_auth_group` (`id`, `title`, `status`, `rules`) VALUES
(1, '超级管理员', 1, '1,2,3,4,5,6,7,8,9,10,11,12'),
(2, '普通管理员', 1, '4,5,6,7,11,12'),
(3, '普通用户', 1, '4,5,6,7,8,9');

-- --------------------------------------------------------

--
-- 表的结构 `tp_auth_group_access`
--

CREATE TABLE IF NOT EXISTS `tp_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_auth_group_access`
--

INSERT INTO `tp_auth_group_access` (`uid`, `group_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 3),
(5, 2),
(6, 1),
(10, 3),
(11, 3);

-- --------------------------------------------------------

--
-- 表的结构 `tp_auth_rule`
--

CREATE TABLE IF NOT EXISTS `tp_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `tp_auth_rule`
--

INSERT INTO `tp_auth_rule` (`id`, `name`, `title`, `type`, `status`, `condition`) VALUES
(1, 'Admin/admin/role', '角色管理', 1, 1, ''),
(2, 'Admin/User/del', '用户删除', 1, 1, ''),
(3, 'Admin/User/edit', '用户信息修改', 1, 1, ''),
(4, 'Admin/User/user', '用户列表', 1, 1, ''),
(5, 'Admin/User/addyh', '用户添加', 1, 1, ''),
(6, 'Admin/Index/index', '后台首页', 1, 1, ''),
(7, 'Admin/User/umy', '个人中心', 1, 1, ''),
(8, 'Admin/User/yhgl', '用户管理', 1, 1, ''),
(9, 'Admin/User/updata', '执行修改用户', 1, 1, ''),
(10, 'Admin/User/add', '用户添加', 1, 1, ''),
(11, 'Admin/Column/index', '文档内容', 1, 1, ''),
(12, 'Admin/Index/details', '详细信息', 1, 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `tp_domain`
--

CREATE TABLE IF NOT EXISTS `tp_domain` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL,
  `qtai` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL,
  `htai` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL,
  `user` varchar(20) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL,
  `pass` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL,
  `time` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL,
  `u_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `tp_domain`
--

INSERT INTO `tp_domain` (`id`, `name`, `qtai`, `htai`, `user`, `pass`, `time`, `u_name`) VALUES
(1, '悦美pc网站', 'http://www.njymmr.com/', 'http://www.njymmr.com/ymmrgl/login.php', 'ymmr_js', 'admin', '2017-07-12 08:59:10', 'admin'),
(2, '悦美wap网站', 'http://m.njymmr.com/', 'http://m.njymmr.com/ymmrgl/login.php', 'ymmr_js', 'admin', '2017-07-12 09:00:12', 'admin'),
(4, '悦美服务器', '121.199.76.143:3389', '121.199.76.143:3389', 'Administrator', 'NJymserver!@#', '', '韩昌'),
(5, '悦美阿里云', 'https://account.aliyun.com/login/login.html', '阿里云终端密码:845179', 'hi50155987@aliyun.co', 'tenglong2016@tl1629', '', '韩昌');

-- --------------------------------------------------------

--
-- 表的结构 `tp_goods`
--

CREATE TABLE IF NOT EXISTS `tp_goods` (
  `goods_id` int(4) NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `u_id` int(3) NOT NULL COMMENT '用户id',
  `goods_pic` varchar(60) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL DEFAULT '/upload/images/default.jpg' COMMENT '商品缩略图',
  `goods_species` varchar(20) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL COMMENT '商品种类',
  `goods_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL COMMENT '商品名称',
  `goods_price` float NOT NULL COMMENT '商品价格',
  `goods_des` varchar(100) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL COMMENT '商品简介',
  PRIMARY KEY (`goods_id`,`u_id`),
  UNIQUE KEY `id` (`goods_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `tp_goods`
--

INSERT INTO `tp_goods` (`goods_id`, `u_id`, `goods_pic`, `goods_species`, `goods_name`, `goods_price`, `goods_des`) VALUES
(1, 1, '/upload/images/default.jpg', '测试种类1', '测试名称1', 288, '用户1的商品简介'),
(2, 2, '/upload/images/default.jpg', '测试种类2', '测试名称2', 388, '用户2的商品简介'),
(3, 2, '/upload/images/default.jpg', '测试种类3', '测试名称3', 588, '用户2的商品简介');

-- --------------------------------------------------------

--
-- 表的结构 `tp_shopping`
--

CREATE TABLE IF NOT EXISTS `tp_shopping` (
  `id` int(3) NOT NULL COMMENT 'id',
  `u_id` int(3) NOT NULL COMMENT '用户id',
  `goods_ordernumber` varchar(30) NOT NULL COMMENT '订单编号',
  `goods_name` varchar(20) NOT NULL COMMENT '商品名',
  `goods_number` int(3) NOT NULL DEFAULT '1' COMMENT '商品数量',
  `goods_price` float NOT NULL COMMENT '商品单价',
  PRIMARY KEY (`id`,`u_id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `tp_user`
--

CREATE TABLE IF NOT EXISTS `tp_user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL,
  `sex` varchar(6) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT '男',
  `age` int(3) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT '北京市朝阳区101号',
  `pic` varchar(30) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT '/upload/user/headpic.png',
  `ipbefore` varchar(20) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '上个ip地址',
  `ipnow` varchar(20) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '当前登陆的主机的ip地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `tp_user`
--

INSERT INTO `tp_user` (`id`, `username`, `password`, `sex`, `age`, `phone`, `address`, `pic`, `ipbefore`, `ipnow`) VALUES
(2, 'hc', '21232f297a57a5a743894a0e4a801fc3', '男', 21, 1334667383, '北京市朝阳区101号', '/upload/user/headpic.png', NULL, NULL),
(11, '小三', 'e10adc3949ba59abbe56e057f20f883e', '女', 21, 2147483647, '浦口区', '/upload/user/headpic.png', NULL, NULL),
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '男', 21, 1333333333, '北京市朝阳区101号NN', '/upload/user/headpic.png', '192.168.0.44', '192.168.0.55');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
