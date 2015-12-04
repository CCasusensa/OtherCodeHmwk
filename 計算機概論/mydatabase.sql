SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `mytable`
-- ----------------------------
DROP TABLE IF EXISTS `mytable`;
CREATE TABLE `mytable` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `學號` varchar(10) NOT NULL,
  `姓名` varchar(10) NOT NULL,
  `年紀` int(3) NOT NULL,
  `生日` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;