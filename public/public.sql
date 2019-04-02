

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for links
-- ----------------------------
DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lname` varchar(255) NOT NULL,
  `lurl` varchar(255) NOT NULL,
  `limg` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- 用户
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` char(100) NOT NULL,
  `phone` char(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` int(10) unsigned zerofill DEFAULT NULL,
  `grade` int(10) unsigned DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;


-- 用户详情
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL,
  `sex` int(11) unsigned DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `addr` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;



-- 管理员 详情表
DROP TABLE IF EXISTS `super_info`;
CREATE TABLE `super_info` (
  `sid` int(11) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `face` varchar(255) DEFAULT '/faces/1.jpg',
  `sex` int(11) DEFAULT '0',
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--  管理员 表
DROP TABLE IF EXISTS `supers`;
CREATE TABLE `supers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `password` char(100) NOT NULL,
  `phone` char(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `grade` int(10) unsigned DEFAULT '0',
  `status` int(10) unsigned NOT NULL DEFAULT '0',
  `token` char(60) CHARACTER SET utf8mb4 DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;


--  公告 表

DROP TABLE IF EXISTS `bbs`;
CREATE TABLE `bbs` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;


-- 商品表
DROP TABLE IF EXISTS `goods_go`;
CREATE TABLE `goods_go` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(11) unsigned NOT NULL,
  `pic` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `gname` varchar(255) NOT NULL,
  `goodsinfo` varchar(255) NOT NULL,
  `goodsNum` int(11) unsigned NOT NULL,
  `status` int(10) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;



-- 商品详情

DROP TABLE IF EXISTS `goods_info`;
CREATE TABLE `goods_info` (
  `gid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gmid` int(11) unsigned NOT NULL,
  `ginfo` varchar(255) NOT NULL,
  `display` int(11) unsigned NOT NULL,
  `imgs` varchar(255) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- 商品分类
DROP TABLE IF EXISTS `goods_type`;
CREATE TABLE `goods_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL,
  `cname` varchar(50) NOT NULL,
  `path` varchar(120) NOT NULL,
  `status` int(11) unsigned DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;


-- 地址表
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` char(11) NOT NULL,
  `address` char(255) NOT NULL,
  `status` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;


-- 收藏表
DROP TABLE IF EXISTS `collects`;
CREATE TABLE `collects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL,
  `gid` int(11) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- 订单表
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `oid` char(50) NOT NULL,
  `oprice` decimal(10,0) unsigned NOT NULL,
  `number` int(11) unsigned NOT NULL,
  `uid` int(11) unsigned NOT NULL,
  `aid` int(11) unsigned NOT NULL DEFAULT '0',
  `status` char(50) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;


-- 订单详情
DROP TABLE IF EXISTS `order_info`;
CREATE TABLE `order_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `oid` char(50) NOT NULL,
  `gid` int(11) unsigned NOT NULL,
  `aid` int(11) unsigned NOT NULL DEFAULT '0',
  `otime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8;