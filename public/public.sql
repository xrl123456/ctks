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
