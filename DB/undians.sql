/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80100 (8.1.0)
 Source Host           : localhost:3306
 Source Schema         : apjiidb

 Target Server Type    : MySQL
 Target Server Version : 80100 (8.1.0)
 File Encoding         : 65001

 Date: 26/10/2023 11:17:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for undians
-- ----------------------------
DROP TABLE IF EXISTS `undians`;
CREATE TABLE `undians`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `winner` tinyint UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of undians
-- ----------------------------
INSERT INTO `undians` VALUES (1, 'Victor Irianto', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (2, 'Ilhami Efendi Z', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (3, 'Eko Budhi Harsono', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (4, 'Roni baskoro', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (5, 'Ilham Akbar (Suke)', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (6, 'Michael Alifen', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (7, 'Sudianto', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (8, 'Agus Arianto', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (9, 'Rudolf Tulus', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (10, 'Dani Samsul', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (11, 'Joni', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (12, 'Pandapotan R.H. Pardede', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (13, 'Firmansyah', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (14, 'Yudi imanuel', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (15, 'Thai Thanh Long', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (16, 'Yudie Haryanto', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (17, 'Rezky Adibrata', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (18, 'Parlin M', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (19, 'Toni Lie', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (20, 'Hans', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (21, 'Parlin P', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (22, 'Kar Ferri', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (23, 'Rizky', 0, '2023-10-26 11:14:21', NULL);
INSERT INTO `undians` VALUES (24, 'Haekal', 0, '2023-10-26 11:14:21', NULL);

SET FOREIGN_KEY_CHECKS = 1;
