/*
 Navicat Premium Data Transfer

 Source Server         : Xampp
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : elektronik

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 07/11/2022 09:53:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_barang
-- ----------------------------
DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE `tb_barang`  (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_barang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stok` int NOT NULL,
  `harga` decimal(15, 2) NOT NULL,
  `id_suplier` int NOT NULL,
  PRIMARY KEY (`id_barang`) USING BTREE,
  INDEX `FK_barang_suplier`(`id_suplier`) USING BTREE,
  CONSTRAINT `FK_barang_suplier` FOREIGN KEY (`id_suplier`) REFERENCES `tb_suplier` (`id_suplier`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_barang
-- ----------------------------
INSERT INTO `tb_barang` VALUES (7, 'SBP001', 'Speaker Bluetooth Polytron', 10, 265000.00, 1);
INSERT INTO `tb_barang` VALUES (8, 'MLQS001', 'Mini LED Quantum Smart TV 4K UHD 85 Inch', 5, 42000000.00, 1);
INSERT INTO `tb_barang` VALUES (9, 'QQD002', 'QLED Quantum Dot 4K UHD TV', 3, 25000000.00, 1);
INSERT INTO `tb_barang` VALUES (10, 'SWP001', 'Single Woofer 12 Inch', 10, 2334000.00, 1);
INSERT INTO `tb_barang` VALUES (11, 'DWP001', 'Double Woofer 10 Inch', 7, 3045000.00, 1);
INSERT INTO `tb_barang` VALUES (12, 'SSP001', 'Speaker Smart Soundbar', 15, 3449000.00, 1);
INSERT INTO `tb_barang` VALUES (20, 'SMGA50', 'Samsung Galaxy A50s', 3, 4200000.00, 5);
INSERT INTO `tb_barang` VALUES (21, 'SMGM13', 'Samsung Galaxy M13', 4, 2700000.00, 5);

-- ----------------------------
-- Table structure for tb_suplier
-- ----------------------------
DROP TABLE IF EXISTS `tb_suplier`;
CREATE TABLE `tb_suplier`  (
  `id_suplier` int NOT NULL AUTO_INCREMENT,
  `nama_suplier` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_suplier` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_suplier`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_suplier
-- ----------------------------
INSERT INTO `tb_suplier` VALUES (1, 'Polytron', 'Jl. Slamet Riyadi No. 408 Solo', '085321005100', 'cs@polytron.co.id');
INSERT INTO `tb_suplier` VALUES (5, 'Samsung', 'Jl. Slamet Riyadi No. 123', '08000111888', 'cs@samsung.co.id');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `id_user` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','staff','') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (9, 'Taufik Ridho', 'taufik', 'taufik123', 'admin');
INSERT INTO `tb_user` VALUES (11, 'Adam Malik', 'adam', 'adam123', 'staff');

SET FOREIGN_KEY_CHECKS = 1;
