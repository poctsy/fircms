-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 11 月 09 日 06:26
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `fircms`
--

-- --------------------------------------------------------

--
-- 表的结构 `fircms_authassignment`
--

CREATE TABLE IF NOT EXISTS `fircms_authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `fircms_authassignment`
--

INSERT INTO `fircms_authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;'),
('GeneralAdmin', '2', NULL, 'N;');

-- --------------------------------------------------------

--
-- 表的结构 `fircms_authitem`
--

CREATE TABLE IF NOT EXISTS `fircms_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `fircms_authitem`
--

INSERT INTO `fircms_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, '超级管理员', NULL, 'N;'),
('Authenticated', 2, '注册用户', NULL, 'N;'),
('GeneralAdmin', 2, '后台管理员', NULL, 'N;'),
('Guest', 2, '游客', NULL, 'N;');

-- --------------------------------------------------------

--
-- 表的结构 `fircms_authitemchild`
--

CREATE TABLE IF NOT EXISTS `fircms_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `fircms_authitemchild`
--

INSERT INTO `fircms_authitemchild` (`parent`, `child`) VALUES
('Authenticated', 'Guest');

-- --------------------------------------------------------

--
-- 表的结构 `fircms_catalog`
--

CREATE TABLE IF NOT EXISTS `fircms_catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lft` int(11) unsigned NOT NULL,
  `rgt` int(10) unsigned NOT NULL,
  `level` smallint(5) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `thumb` varchar(130) DEFAULT NULL,
  `title_s` varchar(50) NOT NULL DEFAULT '',
  `keyword` varchar(30) NOT NULL DEFAULT '',
  `description` varchar(30) NOT NULL DEFAULT '',
  `show_type` varchar(30) NOT NULL,
  `url` varchar(30) NOT NULL DEFAULT '',
  `content` text COMMENT '栏目简介',
  `list_view` varchar(50) NOT NULL DEFAULT '' COMMENT '列表页视图',
  `content_view` varchar(50) NOT NULL DEFAULT '' COMMENT '文章详细页视图',
  `page_view` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=433 ;

--
-- 转存表中的数据 `fircms_catalog`
--

INSERT INTO `fircms_catalog` (`id`, `lft`, `rgt`, `level`, `name`, `thumb`, `title_s`, `keyword`, `description`, `show_type`, `url`, `content`, `list_view`, `content_view`, `page_view`) VALUES
(409, 1, 22, 1, '顶级分类', NULL, '', '', '', '1', '', '', '', '', ''),
(410, 2, 7, 2, '新闻资讯', 'upload/thumb/20131109/20131109135424_14842.png', '', '', '', 'list', 'news', '新闻资讯', '0', '0', ''),
(411, 8, 15, 2, '产品展示', '', '', '', '', 'list', 'product', ' ', '0', '0', ''),
(415, 3, 4, 3, '公司动态', 'upload/thumb/20131109/20131109135438_71339.png', '', '', '', 'list', 'classa', '', '0', '0', ''),
(416, 5, 6, 3, '业界资讯', 'upload/thumb/20131109/20131109135444_30516.png', '', '', '', 'list', 'classb', '', '0', '0', ''),
(420, 9, 14, 3, '饰品珠宝', '', '', '', '', 'list', 'a2', '', '0', '0', ''),
(421, 10, 11, 4, '最新款', '', '', '', '', 'list', 'a3', '', '0', '0', ''),
(427, 16, 21, 2, '下载中心', '', '', '', '', 'list', 'download', '', '0', '0', ''),
(428, 12, 13, 4, '经典款', '', '', '', '', 'list', 'a4', '', '0', '0', ''),
(429, 17, 18, 3, '图册下载', 'upload/thumb/20131109/20131109135637_11955.png', '', '', '', 'list', 'a5', '', '0', '0', ''),
(430, 19, 20, 3, '文档下载', '', '', '', '', 'list', 'a6', '', '0', '0', '');

-- --------------------------------------------------------

--
-- 表的结构 `fircms_config`
--

CREATE TABLE IF NOT EXISTS `fircms_config` (
  `key` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `fircms_config`
--

INSERT INTO `fircms_config` (`key`, `value`) VALUES
('cache_backend', 's:0:"";'),
('cache_duration', ''),
('description', ''),
('email_verify', ''),
('icp_beian', ''),
('index_tag_count', ''),
('index_tags_1', ''),
('index_tags_2', ''),
('index_tags_3', ''),
('index_tags_4', ''),
('index_tags_5', ''),
('keywords', ''),
('mail_from', ''),
('mail_fromname', ''),
('mail_smtp_host', ''),
('mail_smtp_port', ''),
('mail_smtp_pwd', ''),
('mail_smtp_user', ''),
('masonry_framesize', ''),
('masonry_pagesize', ''),
('memcache', ''),
('paipai_uin', ''),
('paipai_userId', ''),
('sitename', 's:3:"111";'),
('thumbHeight', 's:3:"150";'),
('thumbWidth', 's:3:"150";'),
('title', ''),
('url_format', '');

-- --------------------------------------------------------

--
-- 表的结构 `fircms_feedback`
--

CREATE TABLE IF NOT EXISTS `fircms_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `create_time` int(11) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `position` varchar(128) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `category` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `fircms_feedback`
--

INSERT INTO `fircms_feedback` (`id`, `content`, `status`, `create_time`, `name`, `position`, `email`, `phone`, `user_id`, `category`) VALUES
(1, '2222', 2, NULL, '', '', '222@qq.com', '', NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `fircms_message`
--

CREATE TABLE IF NOT EXISTS `fircms_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `other_contact` varchar(128) DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fircms_message_reply`
--

CREATE TABLE IF NOT EXISTS `fircms_message_reply` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `message_id` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `fircms_navigation`
--

CREATE TABLE IF NOT EXISTS `fircms_navigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `root` int(11) unsigned NOT NULL,
  `lft` int(11) unsigned NOT NULL,
  `rgt` int(10) unsigned NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `level` smallint(5) unsigned NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `module` varchar(20) NOT NULL,
  `position` varchar(20) NOT NULL COMMENT '位置类型，例如top bottom sider',
  `bind_type` int(11) NOT NULL COMMENT '绑定资源的类型',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=407 ;

--
-- 转存表中的数据 `fircms_navigation`
--

INSERT INTO `fircms_navigation` (`id`, `root`, `lft`, `rgt`, `name`, `level`, `catalog_id`, `link`, `module`, `position`, `bind_type`) VALUES
(401, 401, 1, 12, '导航条1', 1, 0, '', '', 'top_1', 0),
(402, 401, 4, 5, '', 2, 420, '', '', '', 0),
(403, 401, 2, 3, NULL, 2, 410, '', '', '', 0),
(404, 401, 6, 7, NULL, 2, 410, '', 'message', '', 0),
(405, 401, 8, 9, NULL, 2, 410, '', 'message', '', 0),
(406, 401, 10, 11, NULL, 2, 421, '', 'message', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `fircms_page`
--

CREATE TABLE IF NOT EXISTS `fircms_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thumb` varchar(130) DEFAULT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `title_s` varchar(50) NOT NULL COMMENT 'seo的title',
  `keyword` varchar(30) NOT NULL DEFAULT '',
  `description` varchar(30) NOT NULL DEFAULT '',
  `url` varchar(30) NOT NULL DEFAULT '',
  `content` text COMMENT '栏目简介',
  `view` varchar(50) NOT NULL DEFAULT '' COMMENT '视图模板',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fircms_post`
--

CREATE TABLE IF NOT EXISTS `fircms_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `title_s` varchar(50) NOT NULL,
  `keyword` varchar(30) NOT NULL DEFAULT '',
  `thumb` varchar(100) NOT NULL DEFAULT '' COMMENT '缩略图，可为空',
  `description` varchar(30) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL COMMENT '编辑者',
  `view_count` int(11) NOT NULL DEFAULT '0' COMMENT '观看的次数',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `content` text NOT NULL COMMENT '文字数据',
  `images` text NOT NULL COMMENT '图片数据  一个产品可拥有多个详细图片，在内容页里可以切换',
  `soft` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_article_catalog` (`catalog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `fircms_post`
--

INSERT INTO `fircms_post` (`id`, `catalog_id`, `title`, `title_s`, `keyword`, `thumb`, `description`, `user_id`, `view_count`, `create_time`, `content`, `images`, `soft`) VALUES
(5, 415, '测试', '', '', 'upload/thumb/20131109/20131109135335_20274.png', '', 0, 0, 0, '<span style="font-family:Verdana;font-size:15px;line-height:24px;background-color:#F3F3F3;">测试</span>', '{img}{src}upload/image/20131109/20131109135328_21656.jpg{/src}{text}undefined{/text}{/img}{img}{src}upload/image/20131109/20131109135328_19071.png{/src}{text}undefined{/text}{/img}', 'upload/file/20131109/20131109135335_54346.zip');

-- --------------------------------------------------------

--
-- 表的结构 `fircms_rights`
--

CREATE TABLE IF NOT EXISTS `fircms_rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `fircms_rights`
--

INSERT INTO `fircms_rights` (`itemname`, `type`, `weight`) VALUES
('Admin', 2, 0),
('Authenticated', 2, 2),
('GeneralAdmin', 2, 1),
('Guest', 2, 3);

-- --------------------------------------------------------

--
-- 表的结构 `fircms_upload`
--

CREATE TABLE IF NOT EXISTS `fircms_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(11) NOT NULL COMMENT '图片 还是文件',
  `name` varchar(100) NOT NULL COMMENT '可定义文件名称',
  `path` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

--
-- 转存表中的数据 `fircms_upload`
--

INSERT INTO `fircms_upload` (`id`, `type`, `name`, `path`) VALUES
(1, 'file', '20131108133156_33337', 'upload/file/20131108/20131108133156_33337.rar'),
(2, 'file', '20131108133203_55060', 'upload/file/20131108/20131108133203_55060.rar'),
(3, 'thumb', '20131108133517_86986', 'upload/thumb/20131108/20131108133517_86986.png'),
(4, 'image', '20131108134934_42055', 'upload/image/20131108/20131108134934_42055.png'),
(5, 'image', '20131108140620_99744', 'upload/image/20131108/20131108140620_99744.jpg'),
(6, 'image', '20131108140730_45768', 'upload/image/20131108/20131108140730_45768.png'),
(7, 'image', '20131108140735_62855', 'upload/image/20131108/20131108140735_62855.jpg'),
(8, 'image', '20131108141001_45595', 'upload/image/20131108/20131108141001_45595.png'),
(9, 'image', '20131108141009_98838', 'upload/image/20131108/20131108141009_98838.jpg'),
(10, 'image', '20131108141009_28363', 'upload/image/20131108/20131108141009_28363.jpg'),
(11, 'file', '20131108141212_92142', 'upload/file/20131108/20131108141212_92142.rar'),
(12, 'file', '20131108141330_44985', 'upload/file/20131108/20131108141330_44985.rar'),
(13, 'file', '20131108141551_28251', 'upload/file/20131108/20131108141551_28251.rar'),
(14, 'file', '20131108142017_49418', 'upload/file/20131108/20131108142017_49418.rar'),
(15, 'thumb', '20131108142208_97063', 'upload/thumb/20131108/20131108142208_97063.jpg'),
(16, 'thumb', '20131108142225_45903', 'upload/thumb/20131108/20131108142225_45903.png'),
(17, 'image', '20131108142320_64868', 'upload/image/20131108/20131108142320_64868.jpg'),
(18, 'file', '20131108142335_38163', 'upload/file/20131108/20131108142335_38163.rar'),
(19, 'file', '20131108142505_90856', 'upload/file/20131108/20131108142505_90856.rar'),
(20, 'thumb', '20131108142636_72435', 'upload/thumb/20131108/20131108142636_72435.jpg'),
(21, 'thumb', '20131108142649_37479', 'upload/thumb/20131108/20131108142649_37479.png'),
(22, 'file', '20131108142703_55074', 'upload/file/20131108/20131108142703_55074.rar'),
(23, 'image', '20131108142713_47770', 'upload/image/20131108/20131108142713_47770.jpg'),
(24, 'thumb', '20131108143218_32195', 'upload/thumb/20131108/20131108143218_32195.jpg'),
(25, 'thumb', '20131108143309_29346', 'upload/thumb/20131108/20131108143309_29346.jpg'),
(26, 'file', '20131108144146_32096', 'upload/file/20131108/20131108144146_32096.rar'),
(27, 'thumb', '20131108144153_60366', 'upload/thumb/20131108/20131108144153_60366.jpg'),
(28, 'file', '20131108144240_65519', 'upload/file/20131108/20131108144240_65519.rar'),
(29, 'thumb', '20131108144330_57084', 'upload/thumb/20131108/20131108144330_57084.jpg'),
(30, 'file', '20131108144335_92540', 'upload/file/20131108/20131108144335_92540.rar'),
(31, 'file', '20131108144356_11535', 'upload/file/20131108/20131108144356_11535.rar'),
(32, 'image', '20131108144426_88914', 'upload/image/20131108/20131108144426_88914.jpg'),
(33, 'thumb', '20131108144533_70540', 'upload/thumb/20131108/20131108144533_70540.png'),
(34, 'file', '20131108144539_58721', 'upload/file/20131108/20131108144539_58721.rar'),
(35, 'image', '20131108144607_17844', 'upload/image/20131108/20131108144607_17844.jpg'),
(36, 'thumb', '20131108144615_32678', 'upload/thumb/20131108/20131108144615_32678.png'),
(37, 'file', '20131108144622_50709', 'upload/file/20131108/20131108144622_50709.rar'),
(38, 'file', '20131108144840_18577', 'upload/file/20131108/20131108144840_18577.rar'),
(39, 'file', '20131108145511_85893', 'upload/file/20131108/20131108145511_85893.rar'),
(40, 'thumb', '20131108145527_56244', 'upload/thumb/20131108/20131108145527_56244.jpg'),
(41, 'image', '20131108145632_79988', 'upload/image/20131108/20131108145632_79988.jpg'),
(42, 'thumb', '20131108163321_47304', 'upload/thumb/20131108/20131108163321_47304.png'),
(43, 'thumb', '20131108225735_28836', 'upload/thumb/20131108/20131108225735_28836.png'),
(44, 'file', '20131108225750_35474', 'upload/file/20131108/20131108225750_35474.rar'),
(45, 'file', '20131108225843_60309', 'upload/file/20131108/20131108225843_60309.rar'),
(46, 'file', '20131108230138_58680', 'upload/file/20131108/20131108230138_58680.rar'),
(47, 'file', '20131108230411_30571', 'upload/file/20131108/20131108230411_30571.rar'),
(48, 'thumb', '20131108230548_26413', 'upload/thumb/20131108/20131108230548_26413.png'),
(49, 'file', '20131108231719_89236', 'upload/file/20131108/20131108231719_89236.rar'),
(50, 'thumb', '20131109005726_28462', 'upload/thumb/20131109/20131109005726_28462.png'),
(51, 'thumb', '20131109010542_72583', 'upload/thumb/20131109/20131109010542_72583.png'),
(52, 'image', '20131109015802_96009', 'upload/image/20131109/20131109015802_96009.jpg'),
(53, 'image', '20131109015803_20942', 'upload/image/20131109/20131109015803_20942.jpg'),
(54, 'image', '20131109015803_44126', 'upload/image/20131109/20131109015803_44126.jpg'),
(55, 'image', '20131109015803_27265', 'upload/image/20131109/20131109015803_27265.png'),
(56, 'image', '20131109015804_83605', 'upload/image/20131109/20131109015804_83605.jpg'),
(57, 'image', '20131109015804_24578', 'upload/image/20131109/20131109015804_24578.jpg'),
(58, 'image', '20131109015804_63627', 'upload/image/20131109/20131109015804_63627.jpg'),
(59, 'image', '20131109015805_43469', 'upload/image/20131109/20131109015805_43469.jpg'),
(60, 'image', '20131109015805_78057', 'upload/image/20131109/20131109015805_78057.jpg'),
(61, 'image', '20131109015805_55461', 'upload/image/20131109/20131109015805_55461.jpg'),
(62, 'image', '20131109015813_25839', 'upload/image/20131109/20131109015813_25839.png'),
(63, 'image', '20131109015814_31137', 'upload/image/20131109/20131109015814_31137.jpg'),
(64, 'image', '20131109015814_75415', 'upload/image/20131109/20131109015814_75415.jpg'),
(65, 'image', '20131109015814_17772', 'upload/image/20131109/20131109015814_17772.jpg'),
(66, 'image', '20131109015814_38957', 'upload/image/20131109/20131109015814_38957.jpg'),
(67, 'image', '20131109015815_17899', 'upload/image/20131109/20131109015815_17899.jpg'),
(68, 'image', '20131109015815_55541', 'upload/image/20131109/20131109015815_55541.jpg'),
(69, 'image', '20131109020019_87288', 'upload/image/20131109/20131109020019_87288.png'),
(70, 'image', '20131109020020_81512', 'upload/image/20131109/20131109020020_81512.jpg'),
(71, 'image', '20131109020020_35515', 'upload/image/20131109/20131109020020_35515.jpg'),
(72, 'image', '20131109020020_43560', 'upload/image/20131109/20131109020020_43560.jpg'),
(73, 'image', '20131109020021_97780', 'upload/image/20131109/20131109020021_97780.jpg'),
(74, 'image', '20131109020021_82951', 'upload/image/20131109/20131109020021_82951.jpg'),
(75, 'image', '20131109020021_40514', 'upload/image/20131109/20131109020021_40514.jpg'),
(76, 'image', '20131109020029_80026', 'upload/image/20131109/20131109020029_80026.png'),
(77, 'image', '20131109020030_83083', 'upload/image/20131109/20131109020030_83083.jpg'),
(78, 'image', '20131109020030_77384', 'upload/image/20131109/20131109020030_77384.jpg'),
(79, 'image', '20131109020030_45395', 'upload/image/20131109/20131109020030_45395.jpg'),
(80, 'image', '20131109020030_33389', 'upload/image/20131109/20131109020030_33389.jpg'),
(81, 'image', '20131109020031_22779', 'upload/image/20131109/20131109020031_22779.jpg'),
(82, 'image', '20131109020031_34878', 'upload/image/20131109/20131109020031_34878.jpg'),
(83, 'image', '20131109020202_54052', 'upload/image/20131109/20131109020202_54052.png'),
(84, 'image', '20131109020203_54527', 'upload/image/20131109/20131109020203_54527.jpg'),
(85, 'image', '20131109020203_54288', 'upload/image/20131109/20131109020203_54288.jpg'),
(86, 'image', '20131109020203_26836', 'upload/image/20131109/20131109020203_26836.jpg'),
(87, 'image', '20131109020203_31277', 'upload/image/20131109/20131109020203_31277.jpg'),
(88, 'image', '20131109020204_97714', 'upload/image/20131109/20131109020204_97714.jpg'),
(89, 'image', '20131109020204_64824', 'upload/image/20131109/20131109020204_64824.jpg'),
(90, 'image', '20131109020204_55873', 'upload/image/20131109/20131109020204_55873.jpg'),
(91, 'image', '20131109020205_74421', 'upload/image/20131109/20131109020205_74421.jpg'),
(92, 'image', '20131109020205_35960', 'upload/image/20131109/20131109020205_35960.png'),
(93, 'image', '20131109020205_66747', 'upload/image/20131109/20131109020205_66747.jpg'),
(94, 'image', '20131109020206_46062', 'upload/image/20131109/20131109020206_46062.jpg'),
(95, 'image', '20131109020206_23169', 'upload/image/20131109/20131109020206_23169.jpg'),
(96, 'image', '20131109020406_35202', 'upload/image/20131109/20131109020406_35202.jpg'),
(97, 'image', '20131109120552_47482', 'upload/image/20131109/20131109120552_47482.png'),
(98, 'image', '20131109120708_50314', 'upload/image/20131109/20131109120708_50314.png'),
(99, 'image', '20131109120816_23842', 'upload/image/20131109/20131109120816_23842.png'),
(100, 'image', '20131109120855_45268', 'upload/image/20131109/20131109120855_45268.jpg'),
(101, 'image', '20131109120919_16806', 'upload/image/20131109/20131109120919_16806.jpg'),
(102, 'image', '20131109121301_92166', 'upload/image/20131109/20131109121301_92166.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `fircms_user`
--

CREATE TABLE IF NOT EXISTS `fircms_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `salt` varchar(128) NOT NULL,
  `email` varchar(250) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_login_time` int(11) NOT NULL DEFAULT '0',
  `this_login_time` int(11) NOT NULL DEFAULT '0',
  `last_login_ip` varchar(30) NOT NULL DEFAULT '',
  `this_login_ip` varchar(30) NOT NULL DEFAULT '',
  `realname` varchar(30) NOT NULL DEFAULT '',
  `province` varchar(30) NOT NULL DEFAULT '',
  `city` varchar(30) NOT NULL DEFAULT '',
  `company` varchar(50) NOT NULL DEFAULT '',
  `weibo` varchar(100) NOT NULL DEFAULT '',
  `phone` int(20) NOT NULL DEFAULT '0',
  `qq` int(15) NOT NULL DEFAULT '0',
  `profile` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `fircms_user`
--

INSERT INTO `fircms_user` (`id`, `username`, `password`, `salt`, `email`, `created_time`, `last_login_time`, `this_login_time`, `last_login_ip`, `this_login_ip`, `realname`, `province`, `city`, `company`, `weibo`, `phone`, `qq`, `profile`) VALUES
(1, 'fircms', '550e35731605e382ece7229bf526e3cc', 'TUhGDB&,7-okBSM0y!ql1j]C+=w)RQqQ', 'webmaster@example.com', 1380376428, 1383912469, 1383913711, '127.0.0.1', '127.0.0.1', '', '', '', '', '', 0, 0, ''),
(2, 'adminadmin', '5d1fdb4cb565375a39561a85b6585b54', ':u!9f}`s1Dk)5-fnG8wP{,dS5N,)5Yb@', 'admin@admin.com', 1380376428, 1383741665, 1383752685, '127.0.0.1', '127.0.0.1', '', '', '', '', '', 0, 0, '');

--
-- 限制导出的表
--

--
-- 限制表 `fircms_authassignment`
--
ALTER TABLE `fircms_authassignment`
  ADD CONSTRAINT `fircms_authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `fircms_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `fircms_authitemchild`
--
ALTER TABLE `fircms_authitemchild`
  ADD CONSTRAINT `fircms_authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `fircms_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fircms_authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `fircms_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `fircms_rights`
--
ALTER TABLE `fircms_rights`
  ADD CONSTRAINT `fircms_rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `fircms_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
