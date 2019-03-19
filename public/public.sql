-- 友情 链接表 
-- 友情链接表 表名 links
 
/*  字段名      属性              约束               备注    
  id          int(11)         主键自增 无符号 非空 友情链接id
  lname       varchar(255)    非空                 链接名   
  lurl        varchcar(255)   非空                 链接地址  
  limg        varchar(255)    空                   链接图片  
  created_at  datetime        空                   添加时间
  updated_at  datetime        空                   修改时间
*/


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
  `face` varchar(255) DEFAULT '',
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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;


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