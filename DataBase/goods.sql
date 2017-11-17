/*
Navicat MySQL Data Transfer

Source Server         : hc  hc123456
Source Server Version : 100119
Source Host           : localhost:3306
Source Database       : goods

Target Server Type    : MYSQL
Target Server Version : 100119
File Encoding         : 65001

Date: 2017-10-23 17:26:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `tp_auth_group`;
CREATE TABLE `tp_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_auth_group
-- ----------------------------
INSERT INTO `tp_auth_group` VALUES ('1', '超级管理员', '1', '');
INSERT INTO `tp_auth_group` VALUES ('2', '普通管理员', '1', '4,5,6,7,11,12');
INSERT INTO `tp_auth_group` VALUES ('3', '普通用户', '1', '4,5,6,7,8,9');

-- ----------------------------
-- Table structure for tp_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `tp_auth_group_access`;
CREATE TABLE `tp_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_auth_group_access
-- ----------------------------
INSERT INTO `tp_auth_group_access` VALUES ('1', '1');
INSERT INTO `tp_auth_group_access` VALUES ('2', '2');
INSERT INTO `tp_auth_group_access` VALUES ('3', '2');
INSERT INTO `tp_auth_group_access` VALUES ('4', '3');
INSERT INTO `tp_auth_group_access` VALUES ('5', '2');
INSERT INTO `tp_auth_group_access` VALUES ('6', '1');
INSERT INTO `tp_auth_group_access` VALUES ('10', '3');
INSERT INTO `tp_auth_group_access` VALUES ('11', '3');

-- ----------------------------
-- Table structure for tp_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `tp_auth_rule`;
CREATE TABLE `tp_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(8) DEFAULT '0',
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_auth_rule
-- ----------------------------
INSERT INTO `tp_auth_rule` VALUES ('1', '0', 'Admin/user/role', '角色管理', '1', '1', '');
INSERT INTO `tp_auth_rule` VALUES ('2', '0', 'Admin/User/del', '用户删除', '1', '1', '');
INSERT INTO `tp_auth_rule` VALUES ('3', '0', 'Admin/User/edit', '用户信息修改', '1', '1', '');
INSERT INTO `tp_auth_rule` VALUES ('4', '0', 'Admin/User/user', '用户列表', '1', '1', '');
INSERT INTO `tp_auth_rule` VALUES ('5', '0', 'Admin/User/addyh', '用户添加', '1', '1', '');
INSERT INTO `tp_auth_rule` VALUES ('6', '0', 'Admin/Index/index', '后台首页', '1', '1', '');
INSERT INTO `tp_auth_rule` VALUES ('7', '0', 'Admin/User/umy', '个人中心', '1', '1', '');
INSERT INTO `tp_auth_rule` VALUES ('8', '0', 'Admin/User/yhgl', '用户管理', '1', '1', '');
INSERT INTO `tp_auth_rule` VALUES ('9', '0', 'Admin/User/updata', '执行修改用户', '1', '1', '');
INSERT INTO `tp_auth_rule` VALUES ('10', '0', 'Admin/User/add', '用户添加', '1', '1', '');
INSERT INTO `tp_auth_rule` VALUES ('11', '0', 'Admin/Column/index', '文档内容', '1', '1', '');
INSERT INTO `tp_auth_rule` VALUES ('12', '0', 'Admin/Index/details', '详细信息', '1', '1', '');

-- ----------------------------
-- Table structure for tp_category
-- ----------------------------
DROP TABLE IF EXISTS `tp_category`;
CREATE TABLE `tp_category` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `cat_name` varchar(20) NOT NULL COMMENT '模型id',
  `cat_desc` mediumtext NOT NULL COMMENT '内容，仅用于单页内容',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `sort_order` int(3) unsigned NOT NULL DEFAULT '0' COMMENT '显示顺序',
  `is_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示，1：显示，0：不显示，默认1',
  `unit` int(10) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
-- Records of tp_category
-- ----------------------------
INSERT INTO `tp_category` VALUES ('12', '贵州', '', '0', '50', '1', '2');
INSERT INTO `tp_category` VALUES ('13', '四川', '', '0', '50', '1', '2');
INSERT INTO `tp_category` VALUES ('15', '成都', '', '13', '50', '1', '3');
INSERT INTO `tp_category` VALUES ('16', '铜仁', '', '12', '50', '1', '4');
INSERT INTO `tp_category` VALUES ('17', '湖南', '', '0', '50', '1', '6');
INSERT INTO `tp_category` VALUES ('18', '长沙', '', '17', '50', '1', '3');
INSERT INTO `tp_category` VALUES ('19', '上海', '', '0', '50', '1', '7');
INSERT INTO `tp_category` VALUES ('20', '株洲', '', '17', '50', '1', '8');
INSERT INTO `tp_category` VALUES ('21', '黔东南', '', '12', '50', '1', '4');
INSERT INTO `tp_category` VALUES ('22', '测试', '测试用的看看好用不', '16', '50', '0', '26');

-- ----------------------------
-- Table structure for tp_domain
-- ----------------------------
DROP TABLE IF EXISTS `tp_domain`;
CREATE TABLE `tp_domain` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL,
  `qtai` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL,
  `htai` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL,
  `user` varchar(20) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL,
  `pass` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL,
  `time` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL,
  `u_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tp_domain
-- ----------------------------
INSERT INTO `tp_domain` VALUES ('10', '万和pc网站1', 'http://www.wanho.net/', 'http://www.wanho.net/wanhe_admin/', 'wanhe', 'Wanhe1993qhb', '2017-08-28 09:17:07', 'admin');
INSERT INTO `tp_domain` VALUES ('11', '万和ftp', '139.196.143.137', '139.196.143.137', 'wanhe1993', 'wanhe1993qhb', '2017-08-28 09:17:47', 'admin');
INSERT INTO `tp_domain` VALUES ('12', '万和org网站', 'http://www.wanho.org/', 'http://www.wanho.org/admin', 'admin', 'jswanho123', '2017-09-01 09:17:47', 'admin');
INSERT INTO `tp_domain` VALUES ('13', '万和org的ftp', 'jswanho.gotoftp2.com', 'jswanho.gotoftp2.com', 'jswanho', 'zp4p56rj', '2017-09-04 09:09:22', 'admin');
INSERT INTO `tp_domain` VALUES ('14', 'wanho.net空间\r\n', 'http://www.xinnet.com/', 'http://www.xinnet.com/', 'zhoulm@wanho.net\r\n', '2017-Wanho\r\n', '2017-09-04 09:09:22', 'admin');
INSERT INTO `tp_domain` VALUES ('15', 'wanho.org空间\r\n', 'http://www.west.cn/\r\n', 'http://www.west.cn/\r\n', 'jswanho\r\n', '19540110xhj\r\n', '2017-09-04 09:09:22', 'admin');

-- ----------------------------
-- Table structure for tp_goods
-- ----------------------------
DROP TABLE IF EXISTS `tp_goods`;
CREATE TABLE `tp_goods` (
  `goods_id` int(4) NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `u_id` int(3) NOT NULL COMMENT '用户id',
  `goods_pic` varchar(60) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL DEFAULT '/upload/images/default.jpg' COMMENT '商品缩略图',
  `goods_species` varchar(20) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL COMMENT '商品种类',
  `goods_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL COMMENT '商品名称',
  `goods_price` float NOT NULL COMMENT '商品价格',
  `goods_des` varchar(100) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL COMMENT '商品简介',
  PRIMARY KEY (`goods_id`,`u_id`),
  UNIQUE KEY `id` (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tp_goods
-- ----------------------------
INSERT INTO `tp_goods` VALUES ('1', '1', '/upload/images/default.jpg', '测试种类1', '测试名称1', '288', '用户1的商品简介');
INSERT INTO `tp_goods` VALUES ('2', '2', '/upload/images/default.jpg', '测试种类2', '测试名称2', '388', '用户2的商品简介');
INSERT INTO `tp_goods` VALUES ('3', '2', '/upload/images/default.jpg', '测试种类3', '测试名称3', '588', '用户2的商品简介');

-- ----------------------------
-- Table structure for tp_shopping
-- ----------------------------
DROP TABLE IF EXISTS `tp_shopping`;
CREATE TABLE `tp_shopping` (
  `id` int(3) NOT NULL COMMENT 'id',
  `u_id` int(3) NOT NULL COMMENT '用户id',
  `goods_ordernumber` varchar(30) NOT NULL COMMENT '订单编号',
  `goods_name` varchar(20) NOT NULL COMMENT '商品名',
  `goods_number` int(3) NOT NULL DEFAULT '1' COMMENT '商品数量',
  `goods_price` float NOT NULL COMMENT '商品单价',
  PRIMARY KEY (`id`,`u_id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tp_shopping
-- ----------------------------

-- ----------------------------
-- Table structure for tp_user
-- ----------------------------
DROP TABLE IF EXISTS `tp_user`;
CREATE TABLE `tp_user` (
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tp_user
-- ----------------------------
INSERT INTO `tp_user` VALUES ('2', 'hc', '21232f297a57a5a743894a0e4a801fc3', '男', '21', '1334667383', '北京市朝阳区101号', '/upload/user/headpic.png', null, null);
INSERT INTO `tp_user` VALUES ('11', '小三', 'e10adc3949ba59abbe56e057f20f883e', '女', '21', '2147483647', '浦口区', '/upload/user/headpic.png', null, null);
INSERT INTO `tp_user` VALUES ('1', 'admin', 'beffc46e29d93a4b0ad3765c242d6fc8', '保密', '21', '2147483647', '河南省郑州市朝阳区', '/upload/user/headpic.png', '192.168.88.10', '::1');
