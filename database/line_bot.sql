/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : swlhos

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2017-03-23 16:30:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for line_bot
-- ----------------------------
DROP TABLE IF EXISTS `line_bot`;
CREATE TABLE `line_bot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` mediumtext,
  `last_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
