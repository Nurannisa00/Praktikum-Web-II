-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for penjualan
CREATE DATABASE IF NOT EXISTS `penjualan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `penjualan`;

-- Dumping structure for table penjualan.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id` int NOT NULL,
  `barcode` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` char(100) COLLATE utf8mb4_general_ci NOT NULL,
  `harga_jual` bigint NOT NULL,
  `harga_beli` bigint NOT NULL,
  `stok` int NOT NULL,
  `kategori_id` int NOT NULL,
  `satuan_id` int NOT NULL,
  `user_id` int NOT NULL,
  `supplier_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kategori_id` (`kategori_id`),
  KEY `satuan_id` (`satuan_id`),
  KEY `user_id` (`user_id`),
  KEY `supplier_id` (`supplier_id`),
  CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`),
  CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id`),
  CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `barang_ibfk_4` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table penjualan.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telp` char(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` char(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table penjualan.detail_beli
CREATE TABLE IF NOT EXISTS `detail_beli` (
  `id` int NOT NULL,
  `harga` int NOT NULL,
  `qty` int NOT NULL,
  `subtotal` bigint NOT NULL,
  `pembelian_id` int NOT NULL,
  `barang_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pembelian_id` (`pembelian_id`),
  KEY `barang_id` (`barang_id`),
  CONSTRAINT `detail_beli_ibfk_1` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian` (`id`),
  CONSTRAINT `detail_beli_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table penjualan.detail_jual
CREATE TABLE IF NOT EXISTS `detail_jual` (
  `id` int NOT NULL AUTO_INCREMENT,
  `harga` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `penjualan_id` int NOT NULL,
  `barang_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `penjualan_id` (`penjualan_id`) USING BTREE,
  KEY `barang_id` (`barang_id`) USING BTREE,
  CONSTRAINT `detail_jual_ibfk_1` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_jual_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table penjualan.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table penjualan.pembelian
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id` int NOT NULL,
  `invoice` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `total` bigint NOT NULL,
  `bayar` bigint NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal` date NOT NULL,
  `supplier_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoice` (`invoice`),
  KEY `supplier_id` (`supplier_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`),
  CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table penjualan.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoice` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `total` bigint NOT NULL,
  `bayar` bigint NOT NULL,
  `kembali` int NOT NULL,
  `tanggal` date NOT NULL,
  `customer_id` int DEFAULT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoice` (`invoice`),
  KEY `customer_id` (`customer_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table penjualan.satuan
CREATE TABLE IF NOT EXISTS `satuan` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table penjualan.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `perusahaan` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_bank` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_akun_bank` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_akun_bank` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table penjualan.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` char(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` char(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` char(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` char(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `is_active` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
