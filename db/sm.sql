/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100126
 Source Host           : localhost:3306
 Source Schema         : sm

 Target Server Type    : MySQL
 Target Server Version : 100126
 File Encoding         : 65001

 Date: 18/01/2019 00:01:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `model` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `brand` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `region` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `vehicle` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `retail` double(10, 0) NULL DEFAULT NULL,
  `wholesale` double(10, 0) NULL DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `quantity` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`p_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (6, 'AirFilter', 'BS-2004', 'Hunda', 'Albania', 'Car', '7845', 350, 340, 'photo/AirFilter.jpg', 20);
INSERT INTO `product` VALUES (7, 'Oil filter', 'M09', 'Toyota', 'Angola', 'Car', '1009', 105, 100, 'photo/Mobile_filer.jpg', 13);
INSERT INTO `product` VALUES (8, 'Clutch', 'B420', 'Yamaha', 'Japan', 'Car', '44587', 584, 575, 'photo/clutch.jpg', 33);
INSERT INTO `product` VALUES (9, 'brake show', 'bT09', 'Toyota', 'Japan', 'Car', 'b01', 0, 0, 'photo/', 100);

-- ----------------------------
-- Table structure for purchase
-- ----------------------------
DROP TABLE IF EXISTS `purchase`;
CREATE TABLE `purchase`  (
  `pu_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NULL DEFAULT NULL,
  `pu_quantity` int(10) NULL DEFAULT NULL,
  `unit_price` decimal(10, 2) NULL DEFAULT NULL,
  `total_price` decimal(10, 2) NULL DEFAULT NULL,
  `date` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `time` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`pu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of purchase
-- ----------------------------
INSERT INTO `purchase` VALUES (5, 7, 4, 300.00, 1200.00, '01/15/2019', '01:14:PM');
INSERT INTO `purchase` VALUES (6, 7, 4, 300.00, 1200.00, '01/15/2019', '01:15:PM');
INSERT INTO `purchase` VALUES (7, 6, 4, 25.00, 100.00, '01/15/2019', '01:21:PM');
INSERT INTO `purchase` VALUES (8, 6, 4, 25.00, 100.00, '01/15/2019', '01:22:PM');
INSERT INTO `purchase` VALUES (9, 6, 4, 25.00, 100.00, '01/15/2019', '01:22:PM');
INSERT INTO `purchase` VALUES (10, 7, 26, 250.00, 6500.00, '01/15/2019', '01:35:PM');
INSERT INTO `purchase` VALUES (11, 6, 10, 300.00, 3000.00, '01/15/2019', '01:56:PM');
INSERT INTO `purchase` VALUES (12, 8, 50, 570.00, 28500.00, '01/16/2019', '11:53:AM');
INSERT INTO `purchase` VALUES (13, 9, 100, 106.00, 0.00, '01/17/2019', '08:26:PM');

-- ----------------------------
-- Table structure for sale
-- ----------------------------
DROP TABLE IF EXISTS `sale`;
CREATE TABLE `sale`  (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NULL DEFAULT NULL,
  `item_id` int(11) NULL DEFAULT NULL,
  `s_quantity` int(5) NULL DEFAULT NULL,
  `total_cost` decimal(10, 2) NULL DEFAULT NULL,
  `less` decimal(10, 2) NULL DEFAULT NULL,
  `payable_amount` decimal(10, 2) NULL DEFAULT NULL,
  `time` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `staff` int(11) NULL DEFAULT NULL,
  `type` int(2) NULL DEFAULT NULL,
  PRIMARY KEY (`s_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sale
-- ----------------------------
INSERT INTO `sale` VALUES (7, 1004, 7, 2, 1962.00, 2.00, 1960.00, '01/17/2019', '09:01:PM', 1, 1);
INSERT INTO `sale` VALUES (8, 1004, 8, 3, 1962.00, 2.00, 1960.00, '01/17/2019', '09:01:PM', 1, 1);
INSERT INTO `sale` VALUES (9, 1006, 6, 3, 1050.00, 0.00, 1050.00, '01/17/2019', '09:02:PM', 1, 1);
INSERT INTO `sale` VALUES (10, 1005, 7, 8, 4928.00, 28.00, 4900.00, '01/17/2019', '09:08:PM', 1, 1);
INSERT INTO `sale` VALUES (11, 1005, 8, 7, 4928.00, 28.00, 4900.00, '01/17/2019', '09:08:PM', 1, 1);
INSERT INTO `sale` VALUES (12, 1007, 7, 2, 1378.00, 8.00, 1370.00, '01/17/2019', '10:47:PM', 1, 1);
INSERT INTO `sale` VALUES (13, 1007, 8, 2, 1378.00, 8.00, 1370.00, '01/17/2019', '10:47:PM', 1, 1);
INSERT INTO `sale` VALUES (14, 1008, 7, 2, 794.00, 4.00, 790.00, '01/17/2019', '10:50:PM', 1, 1);
INSERT INTO `sale` VALUES (15, 1008, 8, 1, 794.00, 4.00, 790.00, '01/17/2019', '10:50:PM', 1, 1);
INSERT INTO `sale` VALUES (16, 1009, 7, 3, 2651.00, 1.00, 2650.00, '01/17/2019', '11:42:PM', 1, 1);
INSERT INTO `sale` VALUES (17, 1009, 8, 4, 2651.00, 1.00, 2650.00, '01/17/2019', '11:42:PM', 1, 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`uid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'foysal', 'foysal@gmail.com', '01852595966', '123456', '1');

SET FOREIGN_KEY_CHECKS = 1;
