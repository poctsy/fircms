-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 10 月 10 日 03:34
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
('Admin', '2', NULL, 'N;');

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
('Admin.Config.*', 1, 'Admin.Config.*     (后台功能)', NULL, 'N;'),
('Admin.Config.Admin', 0, 'Admin.Config.Admin     (后台功能)', NULL, 'N;'),
('Admin.Config.Create', 0, 'Admin.Config.Create     (后台功能)', NULL, 'N;'),
('Admin.Config.Update', 0, 'Admin.Config.Update     (后台功能)', NULL, 'N;'),
('Admin.Error.*', 1, 'Admin.Error.*     (后台功能)', NULL, 'N;'),
('Admin.Error.Index', 0, 'Admin.Error.Index     (后台功能)', NULL, 'N;'),
('Admin.Index.*', 1, 'Admin.Index.*     (后台功能)', NULL, 'N;'),
('Admin.Index.Index', 0, 'Admin.Index.Index     (后台功能)', NULL, 'N;'),
('Admin.Plugin.*', 1, 'Admin.Plugin.*     (后台功能)', NULL, 'N;'),
('Admin.Plugin.Admin', 0, 'Admin.Plugin.Admin     (后台功能)', NULL, 'N;'),
('Admin.Plugin.Create', 0, 'Admin.Plugin.Create     (后台功能)', NULL, 'N;'),
('Admin.Plugin.Delete', 0, 'Admin.Plugin.Delete     (后台功能)', NULL, 'N;'),
('Admin.Plugin.Update', 0, 'Admin.Plugin.Update     (后台功能)', NULL, 'N;'),
('Admin.Plugin.View', 0, 'Admin.Plugin.View     (后台功能)', NULL, 'N;'),
('Admin.System.*', 1, 'Admin.System.*     (后台功能)', NULL, 'N;'),
('Admin.System.System', 0, 'Admin.System.System     (后台功能)', NULL, 'N;'),
('Admin.User.*', 1, 'Admin.User.*     (后台功能)', NULL, 'N;'),
('Admin.User.Error', 0, 'Admin.User.Error     (后台功能)', NULL, 'N;'),
('Admin.User.Login', 0, 'Admin.User.Login     (后台功能)', NULL, 'N;'),
('Admin.User.Logout', 0, 'Admin.User.Logout     (后台功能)', NULL, 'N;'),
('Attachment.Manage.*', 1, 'Attachment.Manage.*     (后台功能)', NULL, 'N;'),
('Attachment.Manage.Admin', 0, 'Attachment.Manage.Admin     (后台功能)', NULL, 'N;'),
('Attachment.Manage.Delete', 0, 'Attachment.Manage.Delete     (后台功能)', NULL, 'N;'),
('Attachment.Manage.Update', 0, 'Attachment.Manage.Update     (后台功能)', NULL, 'N;'),
('Authenticated', 2, '注册用户', NULL, 'N;'),
('Comment.Feedback.*', 1, 'Comment.Feedback.*     (后台功能)', NULL, 'N;'),
('Comment.Feedback.Admin', 0, 'Comment.Feedback.Admin     (后台功能)', NULL, 'N;'),
('Comment.Feedback.Delete', 0, 'Comment.Feedback.Delete     (后台功能)', NULL, 'N;'),
('Comment.Feedback.Update', 0, 'Comment.Feedback.Update     (后台功能)', NULL, 'N;'),
('Comment.Message.*', 1, 'Comment.Message.*     (后台功能)', NULL, 'N;'),
('Comment.Message.Admin', 0, 'Comment.Message.Admin     (后台功能)', NULL, 'N;'),
('Comment.Message.Create', 0, 'Comment.Message.Create     (后台功能)', NULL, 'N;'),
('Comment.Message.Delete', 0, 'Comment.Message.Delete     (后台功能)', NULL, 'N;'),
('Comment.Message.Update', 0, 'Comment.Message.Update     (后台功能)', NULL, 'N;'),
('GeneralAdmin', 2, '后台管理员', NULL, 'N;'),
('Guest', 2, '游客', NULL, 'N;'),
('Node.AdminNavigation.*', 1, 'Node.AdminNavigation.*     (后台功能)', NULL, 'N;'),
('Node.AdminNavigation.Admin', 0, 'Node.AdminNavigation.Admin     (后台功能)', NULL, 'N;'),
('Node.AdminNavigation.ChildCreate', 0, 'Node.AdminNavigation.ChildCreate     (后台功能)', NULL, 'N;'),
('Node.AdminNavigation.Create', 0, 'Node.AdminNavigation.Create     (后台功能)', NULL, 'N;'),
('Node.AdminNavigation.Delete', 0, 'Node.AdminNavigation.Delete     (后台功能)', NULL, 'N;'),
('Node.AdminNavigation.NextUp', 0, 'Node.AdminNavigation.NextUp     (后台功能)', NULL, 'N;'),
('Node.AdminNavigation.PrevUp', 0, 'Node.AdminNavigation.PrevUp     (后台功能)', NULL, 'N;'),
('Node.AdminNavigation.Update', 0, 'Node.AdminNavigation.Update     (后台功能)', NULL, 'N;'),
('Node.Catalog.*', 1, 'Node.Catalog.*     (后台功能)', NULL, 'N;'),
('Node.Catalog.Admin', 0, 'Node.Catalog.Admin     (后台功能)', NULL, 'N;'),
('Node.Catalog.Create', 0, 'Node.Catalog.Create     (后台功能)', NULL, 'N;'),
('Node.Catalog.Delete', 0, 'Node.Catalog.Delete     (后台功能)', NULL, 'N;'),
('Node.Catalog.NextUp', 0, 'Node.Catalog.NextUp     (后台功能)', NULL, 'N;'),
('Node.Catalog.PrevUp', 0, 'Node.Catalog.PrevUp     (后台功能)', NULL, 'N;'),
('Node.Catalog.Update', 0, 'Node.Catalog.Update     (后台功能)', NULL, 'N;'),
('Node.Navigation.*', 1, 'Node.Navigation.*     (后台功能)', NULL, 'N;'),
('Node.Navigation.Admin', 0, 'Node.Navigation.Admin     (后台功能)', NULL, 'N;'),
('Node.Navigation.ChildCreate', 0, 'Node.Navigation.ChildCreate     (后台功能)', NULL, 'N;'),
('Node.Navigation.Create', 0, 'Node.Navigation.Create     (后台功能)', NULL, 'N;'),
('Node.Navigation.Delete', 0, 'Node.Navigation.Delete     (后台功能)', NULL, 'N;'),
('Node.Navigation.NextUp', 0, 'Node.Navigation.NextUp     (后台功能)', NULL, 'N;'),
('Node.Navigation.PrevUp', 0, 'Node.Navigation.PrevUp     (后台功能)', NULL, 'N;'),
('Node.Navigation.Update', 0, 'Node.Navigation.Update     (后台功能)', NULL, 'N;'),
('Plugin.Article.*', 1, 'Plugin.Article.*     (后台功能)', NULL, 'N;'),
('Plugin.Article.Admin', 0, 'Plugin.Article.Admin     (后台功能)', NULL, 'N;'),
('Plugin.Article.Create', 0, 'Plugin.Article.Create     (后台功能)', NULL, 'N;'),
('Plugin.Article.Delete', 0, 'Plugin.Article.Delete     (后台功能)', NULL, 'N;'),
('Plugin.Article.Update', 0, 'Plugin.Article.Update     (后台功能)', NULL, 'N;'),
('Plugin.File.*', 1, 'Plugin.File.*     (后台功能)', NULL, 'N;'),
('Plugin.File.Admin', 0, 'Plugin.File.Admin     (后台功能)', NULL, 'N;'),
('Plugin.File.Create', 0, 'Plugin.File.Create     (后台功能)', NULL, 'N;'),
('Plugin.File.Delete', 0, 'Plugin.File.Delete     (后台功能)', NULL, 'N;'),
('Plugin.File.Update', 0, 'Plugin.File.Update     (后台功能)', NULL, 'N;'),
('Plugin.Images.*', 1, 'Plugin.Images.*     (后台功能)', NULL, 'N;'),
('Plugin.Images.Admin', 0, 'Plugin.Images.Admin     (后台功能)', NULL, 'N;'),
('Plugin.Images.Create', 0, 'Plugin.Images.Create     (后台功能)', NULL, 'N;'),
('Plugin.Images.Delete', 0, 'Plugin.Images.Delete     (后台功能)', NULL, 'N;'),
('Plugin.Images.Update', 0, 'Plugin.Images.Update     (后台功能)', NULL, 'N;'),
('Plugin.Page.*', 1, 'Plugin.Page.*     (后台功能)', NULL, 'N;'),
('Plugin.Page.Admin', 0, 'Plugin.Page.Admin     (后台功能)', NULL, 'N;'),
('Plugin.Page.Delete', 0, 'Plugin.Page.Delete     (后台功能)', NULL, 'N;'),
('Plugin.Page.Update', 0, 'Plugin.Page.Update     (后台功能)', NULL, 'N;'),
('Plugin.Picture.*', 1, 'Plugin.Picture.*     (后台功能)', NULL, 'N;'),
('Plugin.Picture.Admin', 0, 'Plugin.Picture.Admin     (后台功能)', NULL, 'N;'),
('Plugin.Picture.Create', 0, 'Plugin.Picture.Create     (后台功能)', NULL, 'N;'),
('Plugin.Picture.Delete', 0, 'Plugin.Picture.Delete     (后台功能)', NULL, 'N;'),
('Plugin.Picture.Update', 0, 'Plugin.Picture.Update     (后台功能)', NULL, 'N;'),
('Quick.ArticleCatalog.*', 1, 'Quick.ArticleCatalog.*     (后台功能)', NULL, 'N;'),
('Quick.ArticleCatalog.Create', 0, 'Quick.ArticleCatalog.Create     (后台功能)', NULL, 'N;'),
('Quick.FileCatalog.*', 1, 'Quick.FileCatalog.*     (后台功能)', NULL, 'N;'),
('Quick.FileCatalog.Create', 0, 'Quick.FileCatalog.Create     (后台功能)', NULL, 'N;'),
('Quick.ImagesCatalog.*', 1, 'Quick.ImagesCatalog.*     (后台功能)', NULL, 'N;'),
('Quick.ImagesCatalog.Create', 0, 'Quick.ImagesCatalog.Create     (后台功能)', NULL, 'N;'),
('Quick.PictureCatalog.*', 1, 'Quick.PictureCatalog.*     (后台功能)', NULL, 'N;'),
('Quick.PictureCatalog.Create', 0, 'Quick.PictureCatalog.Create     (后台功能)', NULL, 'N;'),
('U.Manage.*', 1, 'U.Manage.*     (后台功能)', NULL, 'N;'),
('U.Manage.Admin', 0, 'U.Manage.Admin     (后台功能)', NULL, 'N;'),
('U.Manage.Create', 0, 'U.Manage.Create     (后台功能)', NULL, 'N;'),
('U.Manage.Delete', 0, 'U.Manage.Delete     (后台功能)', NULL, 'N;'),
('U.Manage.Update', 0, 'U.Manage.Update     (后台功能)', NULL, 'N;');

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
('Authenticated', 'Admin.Config.Admin'),
('GeneralAdmin', 'Admin.Config.Admin'),
('Guest', 'Admin.Config.Admin'),
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
  `title` varchar(50) NOT NULL DEFAULT '',
  `keyword` varchar(30) NOT NULL DEFAULT '',
  `description` varchar(30) NOT NULL DEFAULT '',
  `type` int(11) NOT NULL COMMENT '栏目列表类型',
  `plugin_id` int(11) NOT NULL COMMENT '文章类型/ 为view模板自动查找选择做先决条件',
  `url` varchar(30) NOT NULL DEFAULT '',
  `content` text COMMENT '栏目简介',
  `list_view` varchar(50) NOT NULL DEFAULT '' COMMENT '列表页视图',
  `content_view` varchar(50) NOT NULL DEFAULT '' COMMENT '文章详细页视图',
  `page_view` varchar(50) NOT NULL DEFAULT '' COMMENT '单页模板',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=422 ;

--
-- 转存表中的数据 `fircms_catalog`
--

INSERT INTO `fircms_catalog` (`id`, `lft`, `rgt`, `level`, `name`, `thumb`, `title`, `keyword`, `description`, `type`, `plugin_id`, `url`, `content`, `list_view`, `content_view`, `page_view`) VALUES
(409, 1, 14, 1, '顶级分类', NULL, '', '', '', 1, 1, '', '', '', '', ''),
(410, 2, 7, 2, '111', '', '', '', '', 1, 2, 'aa', '11', 'list_post', 'content_post', ''),
(411, 8, 13, 2, '2222', '', '', '', '', 1, 2, 'cc', '222', 'list_post', 'content_post', ''),
(415, 3, 4, 3, '22', '', '', '', '', 1, 2, 'bb', '', 'list_post', 'content_post', ''),
(416, 5, 6, 3, '2222', '', '', '', '', 1, 2, '22', '', 'list_post', 'content_post', ''),
(420, 9, 12, 3, '555', '', '', '', '', 1, 2, '55', '', 'list_post', 'content_post', ''),
(421, 10, 11, 4, '333', '', '', '', '', 1, 2, '222', '', 'list_post', 'content_post', '');

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
('title', ''),
('url_format', '');

-- --------------------------------------------------------

--
-- 表的结构 `fircms_feedback`
--

CREATE TABLE IF NOT EXISTS `fircms_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `position` varchar(128) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `name` varchar(30) NOT NULL,
  `level` smallint(5) unsigned NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL COMMENT '位置类型，例如top bottom sider',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=403 ;

--
-- 转存表中的数据 `fircms_navigation`
--

INSERT INTO `fircms_navigation` (`id`, `root`, `lft`, `rgt`, `name`, `level`, `catalog_id`, `type`) VALUES
(401, 401, 1, 4, '首页导航条1', 1, 0, 'top_1'),
(402, 401, 2, 3, '', 2, 410, '');

-- --------------------------------------------------------

--
-- 表的结构 `fircms_page`
--

CREATE TABLE IF NOT EXISTS `fircms_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_id` int(11) NOT NULL,
  `content` text NOT NULL COMMENT '单页数据',
  PRIMARY KEY (`id`),
  KEY `FK_page_catalog_id` (`catalog_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `fircms_plugin`
--

CREATE TABLE IF NOT EXISTS `fircms_plugin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `en_name` varchar(30) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '模型0:无分类;1:列表模型;2封面模型;3单页模型;4:多页模型;',
  `listprefix` varchar(30) NOT NULL DEFAULT '',
  `prefix` varchar(30) NOT NULL DEFAULT '',
  `path` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `fircms_plugin`
--

INSERT INTO `fircms_plugin` (`id`, `name`, `en_name`, `type`, `listprefix`, `prefix`, `path`) VALUES
(1, '空模块', 'null', 0, 'null', 'null', 'null'),
(2, '文章模块', 'article', 1, 'list_article_', 'content_article_', 'post'),
(3, '图片模块', 'picture', 1, 'list_picture_', 'content_picture_', 'post'),
(4, '图集模块', 'images', 1, 'list_images_', 'content_images_', 'post'),
(5, '文件模块', 'file', 1, 'list_file_', 'content_file_', 'post'),
(6, '默认单页', 'page', 3, '', 'content_page_', 'post');

-- --------------------------------------------------------

--
-- 表的结构 `fircms_post`
--

CREATE TABLE IF NOT EXISTS `fircms_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `keyword` varchar(30) NOT NULL DEFAULT '',
  `thumb` varchar(100) NOT NULL DEFAULT '' COMMENT '缩略图，可为空',
  `description` varchar(30) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL COMMENT '编辑者',
  `view_count` int(11) NOT NULL DEFAULT '0' COMMENT '观看的次数',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `content` text NOT NULL COMMENT '文字数据',
  `images` text NOT NULL COMMENT '图片数据  一个产品可拥有多个详细图片，在内容页里可以切换',
  `picture` text NOT NULL COMMENT '单图数据',
  `file` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_article_catalog` (`catalog_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `fircms_upload`
--

INSERT INTO `fircms_upload` (`id`, `type`, `name`, `path`) VALUES
(2, 'thumb', '20131007172419_29742', 'attachment/thumb/20131007/20131007172419_29742.jpg'),
(3, 'thumb', '20131007172438_65653', 'attachment/thumb/20131007/20131007172438_65653.jpg'),
(4, 'image', '20131007172617_24798', 'attachment/image/20131007/20131007172617_24798.jpg'),
(5, 'file', '20131007173204_69273', 'attachment/file/20131007/20131007173204_69273.rar'),
(6, 'image', '20131007173706_71589', 'attachment/image/20131007/20131007173706_71589.gif'),
(7, 'image', '20131007173707_63396', 'attachment/image/20131007/20131007173707_63396.gif'),
(8, 'image', '20131007173708_91447', 'attachment/image/20131007/20131007173708_91447.gif');

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
(1, 'fircms', '550e35731605e382ece7229bf526e3cc', 'TUhGDB&,7-okBSM0y!ql1j]C+=w)RQqQ', 'webmaster@example.com', 1380376428, 1381034291, 1381132703, '127.0.0.1', '127.0.0.1', '', '', '', '', '', 0, 0, ''),
(2, 'admin', '5d1fdb4cb565375a39561a85b6585b54', ':u!9f}`s1Dk)5-fnG8wP{,dS5N,)5Yb@', 'admin@admin.com', 1380376428, 1381286508, 1381307799, '127.0.0.1', '127.0.0.1', '', '', '', '', '', 0, 0, '');

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
