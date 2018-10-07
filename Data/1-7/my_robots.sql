

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


SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for my_robots
-- ----------------------------
DROP TABLE IF EXISTS `my_robots`;
CREATE TABLE `my_robots` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '机器人主键ID',
  `name` varchar(55) DEFAULT NULL COMMENT '机器人名称',
  `price` int(11) DEFAULT NULL COMMENT '机器人加个',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of my_robots
-- ----------------------------

