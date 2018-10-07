/*
Navicat MySQL Data Transfer

Source Server         : 139.196.164.174
Source Server Version : 50546
Source Host           : 139.196.164.174:3306
Source Database       : phalcon

Target Server Type    : MYSQL
Target Server Version : 50546
File Encoding         : 65001

Date: 2016-02-27 09:14:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `passwd` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
