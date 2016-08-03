/*
Navicat MySQL Data Transfer

Source Server         : phpstudy
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : tpcms

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-08-03 15:27:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for active
-- ----------------------------
DROP TABLE IF EXISTS `active`;
CREATE TABLE `active` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` int(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `sort` int(255) DEFAULT NULL,
  `content` text,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of active
-- ----------------------------
INSERT INTO `active` VALUES ('1', '1', '促销', '1', '/static/active/20160726/ea89af7c175bedc34c0f32a71351c9e3.png', '1', '<p>1. 通过jquery获取对应的input file，然后执行fileinput方法。&nbsp;</p><p>2. showUpload 设置是否有上传按钮。&nbsp;</p><p>3. language指定汉化&nbsp;</p><p>4. allowedFileTypes 、allowedFileExtensions 不知道为什么没有起到效果？&nbsp;</p><p>5. maxFileSize 指定上传文件大小</p><p><br></p>', '2016-07-01 00:00:00', '2016-07-29 00:00:00');
INSERT INTO `active` VALUES ('2', '2', '促销2', '2', '/static/active/20160726/f82206fe2e3b3ec1ff8e5d433d00482f.png', '0', '<p>​<span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">An enhanced HTML 5&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">file input</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">&nbsp;for&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">Bootstrap</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">&nbsp;3.x with&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">file</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">&nbsp;preview for various&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">files</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">, offers multiple selection, and more. The plugin allows you a ...</span></p>', '2016-07-02 00:00:00', '2016-07-31 13:45:00');

-- ----------------------------
-- Table structure for active_cate
-- ----------------------------
DROP TABLE IF EXISTS `active_cate`;
CREATE TABLE `active_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `sort` int(255) DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of active_cate
-- ----------------------------
INSERT INTO `active_cate` VALUES ('1', '0', '活动 1', '1', '0', '0');
INSERT INTO `active_cate` VALUES ('2', '0', '活动2', '2', '0', '0');

-- ----------------------------
-- Table structure for active_compete
-- ----------------------------
DROP TABLE IF EXISTS `active_compete`;
CREATE TABLE `active_compete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  `content` text,
  `ticket` int(255) DEFAULT '0',
  `ispass` int(255) DEFAULT '0',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of active_compete
-- ----------------------------
INSERT INTO `active_compete` VALUES ('5', '2', 'qq', null, '18206766729', '/static/compete/20160725/c37383dacef6a8a4c7cc80e3397097a8.png', '1', '<p><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">An enhanced HTML 5&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">file input</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">&nbsp;for&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">Bootstrap</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">&nbsp;3.x with&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">file</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">&nbsp;preview for various&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">files</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">, offers multiple selection, and more. The plugin allows you a ...</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">An enhanced HTML 5&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">file input</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">&nbsp;for&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">Bootstrap</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">&nbsp;3.x with&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">file</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">&nbsp;preview for various&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">files</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">, offers multiple selection, and more. The plugin allows you a ...</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">An enhanced HTML 5&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">file input</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">&nbsp;for&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">Bootstrap</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">&nbsp;3.x with&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">file</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">&nbsp;preview for various&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">files</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">, offers multiple selection, and more. The plugin allows you a ...</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">An enhanced HTML 5&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">file input</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">&nbsp;for&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">Bootstrap</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">&nbsp;3.x with&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">file</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">&nbsp;preview for various&nbsp;</span><span style=\"color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">files</span><span style=\"color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);\">, offers multiple selection, and more. The plugin allows you a ...</span></p>', '2', '0', '1469437851', '1469437851');
INSERT INTO `active_compete` VALUES ('16', '1', '111', null, '18206766729', '/static/compete/20160726/97e442dd40cc879f1688f16059997a7c.png', null, '18206766729', '0', '0', '1469511091', '1469511091');
INSERT INTO `active_compete` VALUES ('14', '1', '111', null, '18206766729', '/static/compete/20160726/08dec9da72a180978c225416751555ba.png', null, '18206766729', '0', '0', '1469507823', '1469507823');
INSERT INTO `active_compete` VALUES ('15', '1', '182ddd', null, '18206766729', '/static/compete/20160726/bf58cbf7f143f265c1f9187fc8abf2c4.png', null, '18206766729', '0', '1', '1469526807', '1469526807');
INSERT INTO `active_compete` VALUES ('17', '1', '王', '4', '18206766729', '/static/compete/20160726/c574e4f6b58cc0ca05e086a8e06fb170.png', null, '1224', '0', '1', '1469514521', '1469514521');
INSERT INTO `active_compete` VALUES ('18', '2', '我问问', null, '18206766729', '/static/compete/20160726/bb0e611a5c6c4ed8b44488c3d9773557.png', '2', '<p>是是是</p>', '1', '1', '1469526341', '1469526341');

-- ----------------------------
-- Table structure for active_gallery
-- ----------------------------
DROP TABLE IF EXISTS `active_gallery`;
CREATE TABLE `active_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `thumb` longtext NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of active_gallery
-- ----------------------------
INSERT INTO `active_gallery` VALUES ('9', '5', '/static/compete/20160725/a1b3fd15424c8b9709d3f57ab58f65d8.png', '0');
INSERT INTO `active_gallery` VALUES ('8', '5', '/static/compete/20160725/c37383dacef6a8a4c7cc80e3397097a8.png', '0');
INSERT INTO `active_gallery` VALUES ('19', '14', '/static/compete/20160726/9a0e14b3c4c2650c6c45565c38a0a040.png', '0');
INSERT INTO `active_gallery` VALUES ('20', '14', '/static/compete/20160726/6ff6fa41ac3681e4b96e5882b6adb2cb.png', '0');
INSERT INTO `active_gallery` VALUES ('21', '15', '/static/compete/20160726/9cb50f76be3be613b0010899f12222f4.png', '0');
INSERT INTO `active_gallery` VALUES ('22', '15', '/static/compete/20160726/77e2dffa70b11e5b66894a004355a1d1.png', '0');
INSERT INTO `active_gallery` VALUES ('23', '16', '/static/compete/20160726/abaad49fc1a29937e51df1fcf6801e7d.png', '0');
INSERT INTO `active_gallery` VALUES ('24', '17', '/static/compete/20160726/ea5c151ac1067eea9e4780351d23fd22.png', '0');
INSERT INTO `active_gallery` VALUES ('25', '17', '/static/compete/20160726/1b0d68161669d8537044f7034b113723.png', '0');
INSERT INTO `active_gallery` VALUES ('26', '18', '/static/compete/20160726/bb0e611a5c6c4ed8b44488c3d9773557.png', '0');
INSERT INTO `active_gallery` VALUES ('27', '18', '/static/compete/20160726/1938a748b715cf999d6504fcd39dd6dd.png', '0');

-- ----------------------------
-- Table structure for ad
-- ----------------------------
DROP TABLE IF EXISTS `ad`;
CREATE TABLE `ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `positionId` int(11) DEFAULT NULL,
  `type` tinyint(4) DEFAULT '0',
  `file` varchar(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(150) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `adPositionId` (`positionId`,`start_time`,`end_time`),
  KEY `adPositionId_2` (`positionId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ad
-- ----------------------------
INSERT INTO `ad` VALUES ('2', '1', '0', '/static/ad/20160726/e8ab429afb1f331474130f954db293d8.png', '活动', '', '2016-07-27 09:42:00', '2016-08-27 15:24:00', '1');
INSERT INTO `ad` VALUES ('3', '2', '0', '/static/ad/20160726/0349846a324dec262f8b4b33cf3ef1e5.png', '活动', '', '2016-07-28 00:00:00', '2016-08-28 00:00:00', '255');

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL COMMENT '所属分类',
  `title` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `keyword` varchar(100) DEFAULT NULL COMMENT '关键词',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `thumb` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `content` text,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `sort` int(11) NOT NULL DEFAULT '255' COMMENT '排序',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', '1', 'PHP依赖管理工具Composer入门教程', 'PHP', '2016-07-18 00:00:00', '管理工具,require,日志记录,程序,项目', 'Composer 是 PHP 的一个依赖管理工具。它允许你申明项目所依赖的代码库，它会在你的项目中为你安装他们。\n\n依赖管理\n\nComposer 不是一个包管理器。是的，它涉及 \"packag', '/static/article/20160725/7c73fb7ed750475c5885bc4cc988505f.png', '', '1', '14', '1465287817', '1469437255');
INSERT INTO `article` VALUES ('2', '2', '日本2015年向中国人发签证数猛增85% 创历史新高', 'wang', '2016-07-29 00:00:00', '', '	环球网报道记者 王欢】 日本外务省6月6日发布统计结果称，2015年面向中国人的签证发放数量比上年约增加85%，达到378.08万份，刷新此前最高纪录。在旅游签证发放条件放宽和日元贬值的背景下，', '/static/article/20160725/c913a17bc64c27de024c8cc4334fb69e.png', '', '1', '255', '1465288220', '1469437283');

-- ----------------------------
-- Table structure for article_cate
-- ----------------------------
DROP TABLE IF EXISTS `article_cate`;
CREATE TABLE `article_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `description` varchar(255) DEFAULT '' COMMENT '简介',
  `keyword` varchar(100) DEFAULT NULL COMMENT '关键词',
  `sort` int(11) NOT NULL DEFAULT '255' COMMENT '排序',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of article_cate
-- ----------------------------
INSERT INTO `article_cate` VALUES ('1', '0', '体育', '运动', '运动', '1', '0', '0');
INSERT INTO `article_cate` VALUES ('2', '0', '游戏', '娱乐', 'lol', '2', '0', '0');
INSERT INTO `article_cate` VALUES ('5', '1', '篮球', '打篮球', '球', '6', '0', '0');

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` varchar(50) DEFAULT NULL COMMENT '字段名称',
  `code` varchar(20) DEFAULT NULL COMMENT '字段代码',
  `type` char(10) DEFAULT NULL COMMENT '字段类型',
  `content` text,
  `sort` int(11) DEFAULT '0' COMMENT '字段排序',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES ('1', '商城名称', 'mallName', 'text', '最云南', '1', '0', '0');
INSERT INTO `config` VALUES ('2', '商城标题', 'mallTitle', 'text', '最云南', '2', '0', '0');
INSERT INTO `config` VALUES ('3', '商城描述', 'mallDesc', 'text', '最云南,最云南', '3', '0', '0');
INSERT INTO `config` VALUES ('4', '商城关键字', 'mallKeywords', 'text', '最云南', '4', '0', '0');
INSERT INTO `config` VALUES ('5', '商城Logo', 'mallLogo', 'upload', '/static/mallLogo/20160726/9cbd5156cb8ae029b37d1bad6c0b817e.png', '5', '0', '0');
INSERT INTO `config` VALUES ('6', '底部设置', 'mallFooter', 'textarea', '<p>版权所有  最云南社有限公司</p>\n  <p>滇ICP证 16097834</p>\n  <p>2015 All copyrights by Kunming spring tour CO，ITd</p>', '6', '0', '0');
INSERT INTO `config` VALUES ('7', '联系电话', 'phoneNo', 'text', '4008627098', '7', '0', '0');
INSERT INTO `config` VALUES ('8', 'QQ', 'qqNo', 'text', '772947665', '8', '0', '0');

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `auth` longtext,
  `reg_ip` varchar(255) DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('4', '小王', 'f81f521dca6fa5cea16d315c78bd4238', '18206766729', '/static/member/20160726/fb5f4ac22d53a4f22aa1536adb545e72.png', '127.0.0.1', '1469513318', '1469513318');

-- ----------------------------
-- Table structure for member_compete
-- ----------------------------
DROP TABLE IF EXISTS `member_compete`;
CREATE TABLE `member_compete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `ticket` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member_compete
-- ----------------------------
INSERT INTO `member_compete` VALUES ('5', '4', '5', '1');
INSERT INTO `member_compete` VALUES ('6', '4', '18', '1');

-- ----------------------------
-- Table structure for page
-- ----------------------------
DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父级',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `description` varchar(255) DEFAULT '' COMMENT '简介',
  `keyword` varchar(100) DEFAULT '' COMMENT '关键字',
  `content` text COMMENT '内容',
  `status` tinyint(255) NOT NULL DEFAULT '0' COMMENT '状态',
  `sort` int(11) NOT NULL COMMENT '排序',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COMMENT='单页面';

-- ----------------------------
-- Records of page
-- ----------------------------
INSERT INTO `page` VALUES ('1', '0', '公司介绍', '公司', '公司', '<p>吾问无为谓呜</p>', '1', '1', '0', '0');
INSERT INTO `page` VALUES ('2', '1', '关于我们', '关于我们,关于我们', '关于我们', '<p>云南，简称云（<a target=\"_blank\" href=\"http://baike.baidu.com/subview/65720/13649664.htm\" style=\"color: rgb(19, 110, 194); text-decoration: none;\">滇</a>），省会<a target=\"_blank\" href=\"http://baike.baidu.com/view/4551.htm\" style=\"color: rgb(19, 110, 194); text-decoration: none;\">昆明</a>，位于中国<a target=\"_blank\" href=\"http://baike.baidu.com/subview/310055/10377685.htm\" style=\"color: rgb(19, 110, 194); text-decoration: none;\">西南</a>的<a target=\"_blank\" href=\"http://baike.baidu.com/view/658269.htm\" style=\"color: rgb(19, 110, 194); text-decoration: none;\">边陲</a>，是人类文明重要发祥地之一。生活在距今170万年前的云南<a target=\"_blank\" href=\"http://baike.baidu.com/view/2181.htm\" style=\"color: rgb(19, 110, 194); text-decoration: none;\">元谋人</a>，是截至2013年为止发现的中国和亚洲最早人类。</p><p>战国时期，这里是滇族部落的生息之地。云南即“<a target=\"_blank\" href=\"http://baike.baidu.com/subview/270891/5069975.htm\" style=\"color: rgb(19, 110, 194); text-decoration: none;\">彩云之南</a>”“七彩云南”，另一说法是因位于“<a target=\"_blank\" href=\"http://baike.baidu.com/subview/147899/19765471.htm\" style=\"color: rgb(19, 110, 194); text-decoration: none;\">云岭</a>之南”而得名。面积39万平方千米，占全国面积4.11%，在全国各省级行政区中面积排名第8。总人口4596万（2010年），占全国人口3.35%，人口排名为第12名。下辖8个市、8个少数民族自治州。</p><p><br></p>', '1', '2', '0', '0');
INSERT INTO `page` VALUES ('11', '1', '联系我们', '联系我们', '联系我们', '<p>您可以通过写邮件的方式来联系我们<a href=\"mailto:support@chouchongkeji.com\">support@chouchongkeji.com</a><br>座机:<a title=\"\" href=\"tel:087165629528\">0871-65629528</a><br>手机:<a href=\"tel:15687178917\">15687178917</a><br>Q工作时间：周一到周五9:00 AM ~18:00 PM</p><p>地址：昆明市西山区书林街59号3栋3楼</p><p><br></p>', '0', '2', '0', '0');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL COMMENT '角色名称',
  `status` tinyint(5) NOT NULL DEFAULT '0' COMMENT '是否启用',
  `remark` varchar(255) DEFAULT '' COMMENT '简单说明',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COMMENT='角色表';

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('14', '系统管理员', '1', '', '1468311256', '1469419094');

-- ----------------------------
-- Table structure for role_rule
-- ----------------------------
DROP TABLE IF EXISTS `role_rule`;
CREATE TABLE `role_rule` (
  `role_id` int(11) NOT NULL,
  `rule_id` int(11) NOT NULL,
  UNIQUE KEY `fu` (`role_id`,`rule_id`),
  KEY `role_rule_rule_id` (`rule_id`),
  CONSTRAINT `role_rule_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  CONSTRAINT `role_rule_rule_id` FOREIGN KEY (`rule_id`) REFERENCES `rule` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='角色权限关联表';

-- ----------------------------
-- Records of role_rule
-- ----------------------------
INSERT INTO `role_rule` VALUES ('14', '1');
INSERT INTO `role_rule` VALUES ('14', '2');
INSERT INTO `role_rule` VALUES ('14', '3');
INSERT INTO `role_rule` VALUES ('14', '4');
INSERT INTO `role_rule` VALUES ('14', '5');
INSERT INTO `role_rule` VALUES ('14', '6');
INSERT INTO `role_rule` VALUES ('14', '7');
INSERT INTO `role_rule` VALUES ('14', '8');
INSERT INTO `role_rule` VALUES ('14', '9');
INSERT INTO `role_rule` VALUES ('14', '10');
INSERT INTO `role_rule` VALUES ('14', '11');
INSERT INTO `role_rule` VALUES ('14', '12');
INSERT INTO `role_rule` VALUES ('14', '13');
INSERT INTO `role_rule` VALUES ('14', '14');
INSERT INTO `role_rule` VALUES ('14', '15');
INSERT INTO `role_rule` VALUES ('14', '16');
INSERT INTO `role_rule` VALUES ('14', '17');
INSERT INTO `role_rule` VALUES ('14', '18');
INSERT INTO `role_rule` VALUES ('14', '19');
INSERT INTO `role_rule` VALUES ('14', '20');
INSERT INTO `role_rule` VALUES ('14', '21');
INSERT INTO `role_rule` VALUES ('14', '22');
INSERT INTO `role_rule` VALUES ('14', '23');
INSERT INTO `role_rule` VALUES ('14', '25');
INSERT INTO `role_rule` VALUES ('14', '26');
INSERT INTO `role_rule` VALUES ('14', '27');
INSERT INTO `role_rule` VALUES ('14', '28');
INSERT INTO `role_rule` VALUES ('14', '29');
INSERT INTO `role_rule` VALUES ('14', '30');
INSERT INTO `role_rule` VALUES ('14', '31');
INSERT INTO `role_rule` VALUES ('14', '32');
INSERT INTO `role_rule` VALUES ('14', '33');
INSERT INTO `role_rule` VALUES ('14', '34');
INSERT INTO `role_rule` VALUES ('14', '35');
INSERT INTO `role_rule` VALUES ('14', '36');
INSERT INTO `role_rule` VALUES ('14', '37');
INSERT INTO `role_rule` VALUES ('14', '38');
INSERT INTO `role_rule` VALUES ('14', '39');
INSERT INTO `role_rule` VALUES ('14', '40');
INSERT INTO `role_rule` VALUES ('14', '41');
INSERT INTO `role_rule` VALUES ('14', '42');
INSERT INTO `role_rule` VALUES ('14', '43');
INSERT INTO `role_rule` VALUES ('14', '44');
INSERT INTO `role_rule` VALUES ('14', '45');
INSERT INTO `role_rule` VALUES ('14', '46');

-- ----------------------------
-- Table structure for rule
-- ----------------------------
DROP TABLE IF EXISTS `rule`;
CREATE TABLE `rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父菜单',
  `name` varchar(100) DEFAULT NULL COMMENT 'url地址 c+a',
  `title` varchar(100) NOT NULL COMMENT '菜单名称',
  `icon` varchar(100) DEFAULT NULL COMMENT '图标',
  `islink` tinyint(5) NOT NULL DEFAULT '0' COMMENT '是否菜单',
  `sort` int(3) NOT NULL DEFAULT '255' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COMMENT='权限&菜单表';

-- ----------------------------
-- Records of rule
-- ----------------------------
INSERT INTO `rule` VALUES ('1', '0', 'admin/index/index', '控制面板', 'fa fa-home', '1', '1');
INSERT INTO `rule` VALUES ('2', '0', '', '权限管理', 'fa fa-sitemap', '1', '2');
INSERT INTO `rule` VALUES ('3', '2', 'admin/user/index', '管理员列表', 'fa fa-user', '1', '1');
INSERT INTO `rule` VALUES ('4', '2', 'admin/role/index', '角色列表', 'fa fa-users', '1', '2');
INSERT INTO `rule` VALUES ('5', '2', 'admin/rule/index', '权限列表', 'fa fa-sitemap', '1', '3');
INSERT INTO `rule` VALUES ('6', '3', 'admin/user/add', '管理员添加', null, '0', '1');
INSERT INTO `rule` VALUES ('7', '3', 'admin/user/edit', '管理员编辑', null, '0', '2');
INSERT INTO `rule` VALUES ('8', '3', 'admin/user/delete', '管理员删除', null, '0', '3');
INSERT INTO `rule` VALUES ('9', '4', 'admin/role/add', '角色添加', null, '0', '1');
INSERT INTO `rule` VALUES ('10', '4', 'admin/role/edit', '角色编辑', null, '0', '2');
INSERT INTO `rule` VALUES ('11', '4', 'admin/role/delete', '角色删除', null, '0', '3');
INSERT INTO `rule` VALUES ('12', '5', 'admin/rule/add', '权限添加', '', '0', '1');
INSERT INTO `rule` VALUES ('13', '5', 'admin/rule/edit', '权限编辑', '', '0', '2');
INSERT INTO `rule` VALUES ('14', '5', 'admin/rule/delete', '权限删除', null, '0', '3');
INSERT INTO `rule` VALUES ('15', '0', '', '系统管理', 'fa  fa-laptop', '1', '2');
INSERT INTO `rule` VALUES ('16', '15', 'admin/sys/index', '商城信息', 'fa  fa-laptop', '1', '1');
INSERT INTO `rule` VALUES ('17', '0', null, '文章管理', 'fa  fa-file-text', '1', '1');
INSERT INTO `rule` VALUES ('18', '17', 'admin/article_cate/index', '分类列表', 'fa fa-tasks', '1', '2');
INSERT INTO `rule` VALUES ('19', '17', 'admin/article/index', '文章列表', 'fa  fa-file-text-o', '1', '3');
INSERT INTO `rule` VALUES ('20', '18', 'admin/ArticleCate/addSave', '分类添加', '', '0', '1');
INSERT INTO `rule` VALUES ('21', '18', 'admin/ArticleCate/delete', '分类删除', '', '0', '2');
INSERT INTO `rule` VALUES ('22', '18', 'admin/ArticleCate/editSave', '分类编辑', '', '0', '3');
INSERT INTO `rule` VALUES ('23', '17', 'admin/page/index', '单页面文章', 'fa fa-columns', '1', '1');
INSERT INTO `rule` VALUES ('25', '19', 'admin/article/add', '添加文章', '', '0', '5');
INSERT INTO `rule` VALUES ('26', '19', 'admin/article/edit', '编辑文章', null, '0', '6');
INSERT INTO `rule` VALUES ('27', '19', 'admin/article/delete', '删除文章', null, '0', '7');
INSERT INTO `rule` VALUES ('28', '23', 'admin/page/add', '添加单页面文章', null, '0', '27');
INSERT INTO `rule` VALUES ('29', '23', 'admin/page/delete', '删除单页面文章', null, '0', '28');
INSERT INTO `rule` VALUES ('30', '23', 'admin/page/edit', '编辑单页面文章', '', '0', '28');
INSERT INTO `rule` VALUES ('31', '0', '', '活动管理', 'fa  fa-bullhorn', '1', '2');
INSERT INTO `rule` VALUES ('32', '31', 'admin/active_cate/index', '活动分类', 'fa fa-tasks', '1', '1');
INSERT INTO `rule` VALUES ('33', '31', 'admin/active_compete/index', '参赛列表', 'fa fa-users', '1', '3');
INSERT INTO `rule` VALUES ('34', '31', 'admin/active/index', '活动列表', 'fa fa-users', '1', '2');
INSERT INTO `rule` VALUES ('35', '32', 'admin/active_cate/add', '活动分类添加', '', '0', '1');
INSERT INTO `rule` VALUES ('36', '32', 'admin/active_cate/edit', '活动分类编辑', null, '0', '2');
INSERT INTO `rule` VALUES ('37', '32', 'admin/active_cate/delete', '活动分类删除', '', '0', '3');
INSERT INTO `rule` VALUES ('38', '34', 'admin/active/add', '活动添加', '', '0', '1');
INSERT INTO `rule` VALUES ('39', '34', 'admin/active/edit', '活动编辑', '', '0', '2');
INSERT INTO `rule` VALUES ('40', '34', 'admin/active/delete', '活动删除', null, '0', '3');
INSERT INTO `rule` VALUES ('41', '33', 'admin/active_compete/add', '添加', '', '0', '1');
INSERT INTO `rule` VALUES ('42', '33', 'admin/active_compete/delete', '删除', '', '0', '2');
INSERT INTO `rule` VALUES ('43', '15', 'admin/ad/index', '广告列表', 'fa fa-tasks', '1', '2');
INSERT INTO `rule` VALUES ('44', '43', 'admin/ad/add', '广告添加', null, '0', '1');
INSERT INTO `rule` VALUES ('45', '43', 'admin/ad/edit', '广告编辑', '', '0', '2');
INSERT INTO `rule` VALUES ('46', '43', 'admin/ad/delete', '广告删除', null, '0', '3');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `role_id` int(11) DEFAULT '0',
  `username` char(16) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `email` char(32) NOT NULL COMMENT '用户邮箱',
  `mobile` char(15) NOT NULL DEFAULT '' COMMENT '用户手机',
  `reg_ip` varchar(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `last_login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` varchar(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `status` tinyint(4) DEFAULT '0' COMMENT '用户状态',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('5', '14', 'admin', 'd86d1ee5812aed8c79d61288e92b6d8f', '', '', '127.0.0.1', '1469760646', '2130706433', '1', '1468292047', '1469760646');
