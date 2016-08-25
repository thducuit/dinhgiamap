/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : data

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-08-22 07:33:22
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `adjust_groups`
-- ----------------------------
DROP TABLE IF EXISTS `adjust_groups`;
CREATE TABLE `adjust_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `_order` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `table_no` int(11) NOT NULL,
  `delimiter` varchar(255) COLLATE utf8_unicode_ci DEFAULT ',',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of adjust_groups
-- ----------------------------
INSERT INTO `adjust_groups` VALUES ('1', '0', 'chieu_ngang', 'Bảng điều chỉnh theo chiều ngang (Chiều rộng thửa đất) (m)', '1', ',');
INSERT INTO `adjust_groups` VALUES ('2', '0', 'chieu_dai', 'Bảng điều chỉnh theo chiều dọc (Chiều dài thửa đất) (m)', '2', ',');
INSERT INTO `adjust_groups` VALUES ('3', '0', 'bang3', 'Bảng điều chỉnh theo diện tích đất ở (m2)', '3', ',');
INSERT INTO `adjust_groups` VALUES ('4', '0', 'hinhdang_thuadat', 'Bảng điều chỉnh theo hình dạng thửa đất', '4', '|');
INSERT INTO `adjust_groups` VALUES ('5', '0', 'bang5', 'Bảng điều chỉnh tham số phụ (BDS mặt tiền)', '5', '|');
INSERT INTO `adjust_groups` VALUES ('6', '0', 'solan_re', 'Bảng điều chỉnh số lần rẽ từ trục đường chính vào đến BDS (m)', '6', ',');
INSERT INTO `adjust_groups` VALUES ('7', '0', 'bang7', 'Mức độ hoàn thiện', '7', ',');
INSERT INTO `adjust_groups` VALUES ('8', '0', 'loai_hem', 'Loại hẻm', '8', ',');
INSERT INTO `adjust_groups` VALUES ('9', '0', 'nam_ctxd', 'Bảng điều chỉnh theo năm xây dựng', '9', ',');
INSERT INTO `adjust_groups` VALUES ('10', '0', 'kc_hem', 'Bảng điều chỉnh theo khoảng cách từ mặt tiền đường chính vào đến BDS (m)', '10', ',');
INSERT INTO `adjust_groups` VALUES ('11', '0', 'bang11', 'Bảng điều chỉnh tham số phụ (Đối với BDS hẻm)', '11', '|');
INSERT INTO `adjust_groups` VALUES ('12', '0', 'bang12', 'Bảng điều chỉnh tham số phụ (Đối với CTXD)', '12', ',');
INSERT INTO `adjust_groups` VALUES ('13', '0', 'bang13', 'Cơ sở hạ tầng kỹ thuật', '13', ',');
INSERT INTO `adjust_groups` VALUES ('14', '0', 'loai_bds', 'Loại bất động sản', '0', ',');

-- ----------------------------
-- Table structure for `adjust_options`
-- ----------------------------
DROP TABLE IF EXISTS `adjust_options`;
CREATE TABLE `adjust_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `_order` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` float DEFAULT NULL,
  `_limit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of adjust_options
-- ----------------------------
INSERT INTO `adjust_options` VALUES ('1', '0', '﻿≤3', '-5', '', '1');
INSERT INTO `adjust_options` VALUES ('2', '0', '3 - ≤4', '-1', '', '1');
INSERT INTO `adjust_options` VALUES ('3', '0', '4 - ≤5', '0', '', '1');
INSERT INTO `adjust_options` VALUES ('4', '0', '5 - ≤6', '1', '', '1');
INSERT INTO `adjust_options` VALUES ('5', '0', '6 - ≤7', '1.5', '', '1');
INSERT INTO `adjust_options` VALUES ('6', '0', '7 - ≤8', '2', '', '1');
INSERT INTO `adjust_options` VALUES ('7', '0', '8 - ≤9', '2.5', '', '1');
INSERT INTO `adjust_options` VALUES ('8', '0', '9 - ≤10', '3', '', '1');
INSERT INTO `adjust_options` VALUES ('9', '0', '10 - ≤11', '3.5', '', '1');
INSERT INTO `adjust_options` VALUES ('10', '0', '11 - ≤12', '4', '', '1');
INSERT INTO `adjust_options` VALUES ('11', '0', '12 - ≤13', '4.5', '', '1');
INSERT INTO `adjust_options` VALUES ('12', '0', '13 - ≤14', '5', '', '1');
INSERT INTO `adjust_options` VALUES ('13', '0', '14 - ≤15', '5.5', '', '1');
INSERT INTO `adjust_options` VALUES ('14', '0', '15 - ≤16', '6', '', '1');
INSERT INTO `adjust_options` VALUES ('15', '0', '16 - ≤17', '6.5', '', '1');
INSERT INTO `adjust_options` VALUES ('16', '0', '17 - ≤18', '7', '', '1');
INSERT INTO `adjust_options` VALUES ('17', '0', '18 - ≤19', '7.5', '', '1');
INSERT INTO `adjust_options` VALUES ('18', '0', '19 - ≤20', '8', '', '1');
INSERT INTO `adjust_options` VALUES ('19', '0', '20 - ≤21', '8.5', '', '1');
INSERT INTO `adjust_options` VALUES ('20', '0', '21 - ≤22', '9', '', '1');
INSERT INTO `adjust_options` VALUES ('21', '0', '22 - ≤23', '9.5', '', '1');
INSERT INTO `adjust_options` VALUES ('22', '0', '23 - ≤24', '10', '', '1');
INSERT INTO `adjust_options` VALUES ('23', '0', '>24', '10', '', '1');
INSERT INTO `adjust_options` VALUES ('24', '0', '﻿≤8', '-2', '', '2');
INSERT INTO `adjust_options` VALUES ('25', '0', '8 - ≤15', '-1', '', '2');
INSERT INTO `adjust_options` VALUES ('26', '0', '≤25', '0', '', '2');
INSERT INTO `adjust_options` VALUES ('27', '0', '25 - ≤35', '-2', '', '2');
INSERT INTO `adjust_options` VALUES ('28', '0', '>35', '-5', '', '2');
INSERT INTO `adjust_options` VALUES ('29', '0', '﻿≤ 20', '-5', '', '3');
INSERT INTO `adjust_options` VALUES ('30', '0', '20 - ≤40', '3', '', '3');
INSERT INTO `adjust_options` VALUES ('31', '0', '40 - ≤60', '2', '', '3');
INSERT INTO `adjust_options` VALUES ('32', '0', '60 - ≤100', '0', '', '3');
INSERT INTO `adjust_options` VALUES ('33', '0', '100 - ≤150', '-1', '', '3');
INSERT INTO `adjust_options` VALUES ('34', '0', '150 - ≤200', '-5', '', '3');
INSERT INTO `adjust_options` VALUES ('35', '0', '200 - ≤250', '-8', '', '3');
INSERT INTO `adjust_options` VALUES ('36', '0', '250 - ≤300', '-10', '', '3');
INSERT INTO `adjust_options` VALUES ('37', '0', '300 - ≤350', '-12', '', '3');
INSERT INTO `adjust_options` VALUES ('38', '0', '350 - ≤400', '-15', '', '3');
INSERT INTO `adjust_options` VALUES ('39', '0', '400 - ≤500', '-20', '', '3');
INSERT INTO `adjust_options` VALUES ('40', '0', '>500', '-25', '', '3');
INSERT INTO `adjust_options` VALUES ('41', '0', 'Vuông vức', '0', '', '4');
INSERT INTO `adjust_options` VALUES ('42', '0', 'Khá vuông vức', '-1', '', '4');
INSERT INTO `adjust_options` VALUES ('43', '0', 'Nở hậu', '3', '', '4');
INSERT INTO `adjust_options` VALUES ('44', '0', 'Tóp hậu', '-5', '', '4');
INSERT INTO `adjust_options` VALUES ('45', '0', 'Hình chữ L,T', '-10', '', '4');
INSERT INTO `adjust_options` VALUES ('46', '0', 'Hình dạng khác (Hình dạng không xác định)', '-10', '', '4');
INSERT INTO `adjust_options` VALUES ('47', '0', 'BĐS nằm gần trung tâm thương mại, siêu thị, công viên, khu vui chơi, bệnh viện ( trong phạm vi <200m )', '2', '', '5');
INSERT INTO `adjust_options` VALUES ('48', '0', 'Có đường hướng thẳng vào nhà', '-5', '', '5');
INSERT INTO `adjust_options` VALUES ('49', '0', 'Có trụ điện / Cây chắn phía trước', '-5', '', '5');
INSERT INTO `adjust_options` VALUES ('50', '0', 'Nằm dưới bụng cầu', '-30', '', '5');
INSERT INTO `adjust_options` VALUES ('51', '0', 'Nằm sát chân cầu', '-10', '', '5');
INSERT INTO `adjust_options` VALUES ('52', '0', 'Nằm sát đường điện cao thế', '-10', '', '5');
INSERT INTO `adjust_options` VALUES ('53', '0', 'Nằm trong khu quy hoạch không rõ ràng', '-5', '', '5');
INSERT INTO `adjust_options` VALUES ('54', '0', 'Nằm gần nghĩa trang ( trong phạm vi <100m )', '-10', '', '5');
INSERT INTO `adjust_options` VALUES ('55', '0', 'Nằm gần đình, chùa ,miếu ( trong phạm vi <100m )', '-5', '', '5');
INSERT INTO `adjust_options` VALUES ('56', '0', '1 lần rẽ', '0', '', '6');
INSERT INTO `adjust_options` VALUES ('57', '0', '2 lần rẽ', '-2', '', '6');
INSERT INTO `adjust_options` VALUES ('58', '0', '3 lần rẽ', '-2', '', '6');
INSERT INTO `adjust_options` VALUES ('59', '0', '>3 lần rẽ', '-5', '', '6');
INSERT INTO `adjust_options` VALUES ('60', '0', 'Hoàn thiện phần thô', '0', '', '7');
INSERT INTO `adjust_options` VALUES ('61', '0', 'Hoàn thiện cơ bản', '3', '', '7');
INSERT INTO `adjust_options` VALUES ('62', '0', 'Hoàn thiện hoàn toàn', '5', '', '7');
INSERT INTO `adjust_options` VALUES ('63', '0', 'Hẻm nhựa', '0', '', '8');
INSERT INTO `adjust_options` VALUES ('64', '0', 'Hẻm bê tông', '-2', '', '8');
INSERT INTO `adjust_options` VALUES ('65', '0', 'Hẻm trải đá', '-5', '', '8');
INSERT INTO `adjust_options` VALUES ('66', '0', 'Hẻm đất', '-10', '', '8');
INSERT INTO `adjust_options` VALUES ('67', '0', '1974', '53', '', '9');
INSERT INTO `adjust_options` VALUES ('68', '0', '1975', '53', '', '9');
INSERT INTO `adjust_options` VALUES ('69', '0', '1976', '53', '', '9');
INSERT INTO `adjust_options` VALUES ('70', '0', '1977', '53', '', '9');
INSERT INTO `adjust_options` VALUES ('71', '0', '1978', '53', '', '9');
INSERT INTO `adjust_options` VALUES ('72', '0', '1979', '53', '', '9');
INSERT INTO `adjust_options` VALUES ('73', '0', '1980', '53', '', '9');
INSERT INTO `adjust_options` VALUES ('74', '0', '1981', '55', '', '9');
INSERT INTO `adjust_options` VALUES ('75', '0', '1982', '55', '', '9');
INSERT INTO `adjust_options` VALUES ('76', '0', '1983', '55', '', '9');
INSERT INTO `adjust_options` VALUES ('77', '0', '1984', '55', '', '9');
INSERT INTO `adjust_options` VALUES ('78', '0', '1985', '55', '', '9');
INSERT INTO `adjust_options` VALUES ('79', '0', '1986', '57', '', '9');
INSERT INTO `adjust_options` VALUES ('80', '0', '1987', '57', '', '9');
INSERT INTO `adjust_options` VALUES ('81', '0', '1988', '57', '', '9');
INSERT INTO `adjust_options` VALUES ('82', '0', '1989', '57', '', '9');
INSERT INTO `adjust_options` VALUES ('83', '0', '1990', '58', '', '9');
INSERT INTO `adjust_options` VALUES ('84', '0', '1991', '58', '', '9');
INSERT INTO `adjust_options` VALUES ('85', '0', '1992', '58', '', '9');
INSERT INTO `adjust_options` VALUES ('86', '0', '1993', '58', '', '9');
INSERT INTO `adjust_options` VALUES ('87', '0', '1994', '58', '', '9');
INSERT INTO `adjust_options` VALUES ('88', '0', '1995', '58', '', '9');
INSERT INTO `adjust_options` VALUES ('89', '0', '1996', '58', '', '9');
INSERT INTO `adjust_options` VALUES ('90', '0', '1997', '60', '', '9');
INSERT INTO `adjust_options` VALUES ('91', '0', '1998', '62', '', '9');
INSERT INTO `adjust_options` VALUES ('92', '0', '1999', '64', '', '9');
INSERT INTO `adjust_options` VALUES ('93', '0', '2000', '67', '', '9');
INSERT INTO `adjust_options` VALUES ('94', '0', '2001', '69', '', '9');
INSERT INTO `adjust_options` VALUES ('95', '0', '2002', '71', '', '9');
INSERT INTO `adjust_options` VALUES ('96', '0', '2003', '73', '', '9');
INSERT INTO `adjust_options` VALUES ('97', '0', '2004', '76', '', '9');
INSERT INTO `adjust_options` VALUES ('98', '0', '2005', '78', '', '9');
INSERT INTO `adjust_options` VALUES ('99', '0', '2006', '80', '', '9');
INSERT INTO `adjust_options` VALUES ('100', '0', '2007', '82', '', '9');
INSERT INTO `adjust_options` VALUES ('101', '0', '2008', '84', '', '9');
INSERT INTO `adjust_options` VALUES ('102', '0', '2009', '87', '', '9');
INSERT INTO `adjust_options` VALUES ('103', '0', '2010', '89', '', '9');
INSERT INTO `adjust_options` VALUES ('104', '0', '2011', '91', '', '9');
INSERT INTO `adjust_options` VALUES ('105', '0', '2012', '93', '', '9');
INSERT INTO `adjust_options` VALUES ('106', '0', '2013', '96', '', '9');
INSERT INTO `adjust_options` VALUES ('107', '0', '2014', '98', '', '9');
INSERT INTO `adjust_options` VALUES ('108', '0', '2015', '100', '', '9');
INSERT INTO `adjust_options` VALUES ('109', '0', '2016', '100', '', '9');
INSERT INTO `adjust_options` VALUES ('110', '0', '≤50', '0', '', '10');
INSERT INTO `adjust_options` VALUES ('111', '0', '50 - ≤100', '-1', '', '10');
INSERT INTO `adjust_options` VALUES ('112', '0', '100 - ≤200', '-2', '', '10');
INSERT INTO `adjust_options` VALUES ('113', '0', '200 - ≤300', '-3', '', '10');
INSERT INTO `adjust_options` VALUES ('114', '0', '300 - ≤500', '-5', '', '10');
INSERT INTO `adjust_options` VALUES ('115', '0', '>500', '-10', '', '10');
INSERT INTO `adjust_options` VALUES ('116', '0', 'BĐS nằm gần trung tâm', '2', '', '11');
INSERT INTO `adjust_options` VALUES ('117', '0', 'Có hẻm hướng thẳng vào', '-5', '', '11');
INSERT INTO `adjust_options` VALUES ('118', '0', 'Có trụ điện/ Cây chắn phía', '-5', '', '11');
INSERT INTO `adjust_options` VALUES ('119', '0', 'Nằm sát đường điện cao', '-10', '', '11');
INSERT INTO `adjust_options` VALUES ('120', '0', 'Nằm trong khu quy hoạch', '-10', '', '11');
INSERT INTO `adjust_options` VALUES ('121', '0', 'BĐS nằm trong hẻm cụt', '-2', '', '11');
INSERT INTO `adjust_options` VALUES ('122', '0', 'Nằm gần nghĩa trang', '-10', '', '11');
INSERT INTO `adjust_options` VALUES ('123', '0', 'Nằm gần đình. chùa, miếu (Trong phạm vi ≤100m)', '-5', '', '11');
INSERT INTO `adjust_options` VALUES ('124', '0', 'Có Sân tennis', '3', '', '12');
INSERT INTO `adjust_options` VALUES ('125', '0', 'Có hồ bơi', '3', '', '12');
INSERT INTO `adjust_options` VALUES ('126', '0', 'Có thang máy', '3', '', '12');
INSERT INTO `adjust_options` VALUES ('127', '0', 'Có sân thượng', '1', '', '12');
INSERT INTO `adjust_options` VALUES ('128', '0', 'Có sân để xe hơi', '1', '', '12');
INSERT INTO `adjust_options` VALUES ('129', '0', 'Có giếng trời', '1', '', '12');
