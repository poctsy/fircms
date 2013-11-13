-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 11 月 13 日 04:35
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
('Admin', 2, '管理员', NULL, 'N;'),
('Authenticated', 2, '注册用户', NULL, 'N;'),
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
  `subtitle` varchar(50) NOT NULL DEFAULT '',
  `aliases` varchar(30) NOT NULL,
  `thumb` varchar(130) NOT NULL DEFAULT '',
  `title_s` varchar(50) NOT NULL DEFAULT '',
  `keyword` varchar(30) NOT NULL DEFAULT '',
  `description` varchar(30) NOT NULL DEFAULT '',
  `show_type` varchar(30) NOT NULL DEFAULT 'list',
  `url` varchar(30) NOT NULL DEFAULT '',
  `content` text COMMENT '栏目简介',
  `list_view` varchar(50) NOT NULL DEFAULT '' COMMENT '列表页视图',
  `content_view` varchar(50) NOT NULL DEFAULT '' COMMENT '文章详细页视图',
  `page_view` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=431 ;

--
-- 转存表中的数据 `fircms_catalog`
--

INSERT INTO `fircms_catalog` (`id`, `lft`, `rgt`, `level`, `name`, `subtitle`, `aliases`, `thumb`, `title_s`, `keyword`, `description`, `show_type`, `url`, `content`, `list_view`, `content_view`, `page_view`) VALUES
(409, 1, 26, 1, '顶级分类', '', '', '', '', '', '', '1', '', '', '', '', ''),
(410, 2, 7, 2, '新闻资讯', '', 'aaa', 'upload/thumb/20131109/20131109135424_14842.png', '', '', '', 'list', 'news', '新闻资讯', '0', '0', ''),
(411, 8, 17, 2, '产品展示', '', '', 'upload/thumb/20131110/20131110000909_61240.png', '', '', '', 'list', 'product', ' ', '0', '0', ''),
(415, 5, 6, 3, '公司动态', '', '', 'upload/thumb/20131109/20131109135438_71339.png', '', '', '', 'list', 'classa', '', '0', '0', ''),
(416, 3, 4, 3, '业界资讯', '', '', 'upload/thumb/20131109/20131109135444_30516.png', '', '', '', 'list', 'classb', '', '0', '0', ''),
(420, 9, 16, 3, '饰品珠宝', '', '', '', '', '', '', 'list', 'a2', '', '0', '0', ''),
(421, 10, 11, 4, '最新款', '', '', '', '', '', '', 'list', 'a3', '', '0', '0', ''),
(427, 18, 23, 2, '下载中心', '', '', '', '', '', '', 'list', 'download', '', '0', '0', ''),
(428, 12, 13, 4, '经典款', '', '', '', '', '', '', 'list', 'a4', '', '0', '0', ''),
(429, 19, 20, 3, '图册下载', '', '', 'upload/thumb/20131109/20131109135637_11955.png', '', '', '', 'list', 'a5', '', '0', '0', ''),
(430, 21, 22, 3, '文档下载', '', '', '', '', '', '', 'list', 'a6', '', '0', '0', '');

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
  `create_time` int(11) NOT NULL DEFAULT '0',
  `name` varchar(128) NOT NULL,
  `position` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL DEFAULT '',
  `category` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='留言反馈表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `fircms_feedback`
--

INSERT INTO `fircms_feedback` (`id`, `content`, `status`, `create_time`, `name`, `position`, `email`, `phone`, `category`) VALUES
(1, '2222', 2, 0, '', '', '222@qq.com', '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `fircms_feedback_reply`
--

CREATE TABLE IF NOT EXISTS `fircms_feedback_reply` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `feedback_id` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='站内信回复表';

-- --------------------------------------------------------

--
-- 表的结构 `fircms_message`
--

CREATE TABLE IF NOT EXISTS `fircms_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) NOT NULL DEFAULT '0',
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='站内信' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `fircms_message`
--

INSERT INTO `fircms_message` (`id`, `content`, `status`, `create_time`, `from_user_id`, `to_user_id`) VALUES
(6, 'demo\r\n', 0, 0, 1, 2),
(7, 'aa', 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `fircms_page`
--

CREATE TABLE IF NOT EXISTS `fircms_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thumb` varchar(130) NOT NULL DEFAULT '',
  `title` varchar(50) NOT NULL,
  `subtitle` varchar(50) NOT NULL DEFAULT '',
  `title_s` varchar(50) NOT NULL DEFAULT '' COMMENT 'seo的title',
  `keyword` varchar(30) NOT NULL DEFAULT '',
  `description` varchar(30) NOT NULL DEFAULT '',
  `aliases` varchar(30) NOT NULL DEFAULT '',
  `content` text COMMENT '栏目简介',
  `view` varchar(50) NOT NULL COMMENT '视图模板',
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='优先选择page表的seo跟标题，没有再选择栏目的' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `fircms_page`
--

INSERT INTO `fircms_page` (`id`, `thumb`, `title`, `subtitle`, `title_s`, `keyword`, `description`, `aliases`, `content`, `view`, `create_time`) VALUES
(1, '', '关于我们', '', '', '', '', 'aaa', '', '0', 0);

-- --------------------------------------------------------

--
-- 表的结构 `fircms_plus`
--

CREATE TABLE IF NOT EXISTS `fircms_plus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(11) NOT NULL,
  `class` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `fircms_plus`
--

INSERT INTO `fircms_plus` (`id`, `name`, `class`) VALUES
(1, '留言模块', 'message');

-- --------------------------------------------------------

--
-- 表的结构 `fircms_post`
--

CREATE TABLE IF NOT EXISTS `fircms_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `subtitle` varchar(50) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fircms_user`
--

CREATE TABLE IF NOT EXISTS `fircms_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `salt` varchar(128) NOT NULL,
  `email` varchar(100) NOT NULL,
  `realname` varchar(30) NOT NULL DEFAULT '',
  `phone` varchar(30) NOT NULL DEFAULT '',
  `created_time` int(11) NOT NULL DEFAULT '0',
  `last_login_time` int(11) NOT NULL DEFAULT '0',
  `last_login_ip` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `fircms_user`
--

INSERT INTO `fircms_user` (`id`, `username`, `password`, `salt`, `email`, `realname`, `phone`, `created_time`, `last_login_time`, `last_login_ip`) VALUES
(1, 'fircms', 'e939401ac7ec79e916a9a0c6a8399adc', 'osvMgS@}ld/;+>ow&.-%8Drt8FCs}Sd&', 'fircms@fircms.com', '', '', 1384315820, 1384317187, '127.0.0.1'),
(2, 'demo', '531e872f2cd024184934d6b9184740d7', '~/|hNte1|NuB@V6@$JQoW4YwO:A4xY|o', 'demo@demo.com', '', '', 1380376428, 1383752685, '127.0.0.1');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
