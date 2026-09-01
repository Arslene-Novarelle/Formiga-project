-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 29, 2026 at 12:46 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouse_logistik`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_log`
--

CREATE TABLE `audit_log` (
  `id_audit` int NOT NULL,
  `id_user` int NOT NULL,
  `tabel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aksi` enum('insert','update','delete') COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_lama` json DEFAULT NULL,
  `data_baru` json DEFAULT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_log`
--

INSERT INTO `audit_log` (`id_audit`, `id_user`, `tabel`, `aksi`, `data_lama`, `data_baru`, `waktu`) VALUES
(1, 1, 'barang', 'insert', NULL, '{\"kd_brg\": \"BRG-0001\", \"nm_brg\": \"Mouse Wireless\"}', '2026-07-28 10:00:00'),
(2, 2, 'barang', 'update', '{\"stok\": 40}', '{\"stok\": 45}', '2026-08-01 09:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_brg` int NOT NULL,
  `kd_brg` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_brg` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` int NOT NULL,
  `id_gudang` int NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `id_satuan` int NOT NULL,
  `id_supplier` int NOT NULL,
  `harga_satuan` decimal(12,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_brg`, `kd_brg`, `nm_brg`, `id_kategori`, `id_gudang`, `stok`, `id_satuan`, `id_supplier`, `harga_satuan`) VALUES
(1, 'BRG-0001', 'Mouse Wireless', 1, 1, 45, 1, 1, 85000.00),
(2, 'BRG-0002', 'Keyboard Mekanik', 1, 1, 20, 1, 1, 350000.00),
(3, 'BRG-0003', 'Kabel HDMI 2m', 1, 1, 60, 1, 1, 45000.00),
(4, 'BRG-0004', 'Flashdisk 32GB', 1, 1, 100, 1, 1, 65000.00),
(5, 'BRG-0005', 'Headset Gaming', 1, 2, 15, 1, 1, 250000.00),
(6, 'BRG-0006', 'Pulpen Standar', 2, 1, 300, 2, 2, 3000.00),
(7, 'BRG-0007', 'Kertas A4 (1 rim)', 2, 1, 80, 1, 2, 48000.00),
(8, 'BRG-0008', 'Map Plastik', 2, 2, 150, 1, 2, 5000.00),
(9, 'BRG-0009', 'Kaos Polos Unisex', 3, 2, 90, 1, 3, 55000.00),
(10, 'BRG-0010', 'Jaket Parasut', 3, 2, 40, 1, 3, 120000.00),
(11, 'BRG-0011', 'Sapu Lantai', 4, 1, 25, 1, 4, 30000.00),
(12, 'BRG-0012', 'Ember Plastik 10L', 4, 1, 35, 1, 4, 25000.00);

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id_gudang` int NOT NULL,
  `kd_gudang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_gudang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_gudang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_item` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id_gudang`, `kd_gudang`, `nama_gudang`, `alamat_gudang`, `total_item`) VALUES
(1, 'GDG-A', 'Gudang Pusat Jakarta', 'Jl. Raya Bekasi KM 18, Jakarta Timur', 690),
(2, 'GDG-B', 'Gudang Cabang Tangerang', 'Jl. Gatot Subroto No. 5, Tangerang', 270);

-- --------------------------------------------------------

--
-- Table structure for table `item_warehouse`
--

CREATE TABLE `item_warehouse` (
  `id_itemWarehouse` int NOT NULL,
  `id_brg` int NOT NULL,
  `id_gudang` int NOT NULL,
  `stok` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_warehouse`
--

INSERT INTO `item_warehouse` (`id_itemWarehouse`, `id_brg`, `id_gudang`, `stok`) VALUES
(1, 1, 1, 45),
(2, 2, 1, 20),
(3, 3, 1, 60),
(4, 4, 1, 100),
(5, 5, 2, 15),
(6, 6, 1, 300),
(7, 7, 1, 80),
(8, 8, 2, 150),
(9, 9, 2, 65),
(10, 10, 2, 40),
(11, 11, 1, 25),
(12, 12, 1, 35),
(13, 9, 1, 25);

--
-- Triggers `item_warehouse`
--
DELIMITER $$
CREATE TRIGGER `trg_item_warehouse_after_delete` AFTER DELETE ON `item_warehouse` FOR EACH ROW BEGIN
  UPDATE gudang
  SET total_item = (
    SELECT COALESCE(SUM(stok), 0) FROM item_warehouse WHERE id_gudang = OLD.id_gudang
  )
  WHERE id_gudang = OLD.id_gudang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_item_warehouse_after_insert` AFTER INSERT ON `item_warehouse` FOR EACH ROW BEGIN
  UPDATE gudang
  SET total_item = (
    SELECT COALESCE(SUM(stok), 0) FROM item_warehouse WHERE id_gudang = NEW.id_gudang
  )
  WHERE id_gudang = NEW.id_gudang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_item_warehouse_after_update` AFTER UPDATE ON `item_warehouse` FOR EACH ROW BEGIN
  -- update gudang tujuan baris ini sekarang
  UPDATE gudang
  SET total_item = (
    SELECT COALESCE(SUM(stok), 0) FROM item_warehouse WHERE id_gudang = NEW.id_gudang
  )
  WHERE id_gudang = NEW.id_gudang;

  -- kalau id_gudang-nya ikut berubah (barang dipindah gudang), gudang LAMA juga perlu di-update
  IF OLD.id_gudang <> NEW.id_gudang THEN
    UPDATE gudang
    SET total_item = (
      SELECT COALESCE(SUM(stok), 0) FROM item_warehouse WHERE id_gudang = OLD.id_gudang
    )
    WHERE id_gudang = OLD.id_gudang;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `kd_kategori` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kd_kategori`, `nm_kategori`) VALUES
(1, 'KTG-ELK', 'Elektronik'),
(2, 'KTG-ATK', 'Alat Tulis'),
(3, 'KTG-PKN', 'Pakaian'),
(4, 'KTG-RTG', 'Peralatan Rumah Tangga'),
(5, 'KTG-LNY', 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notif` int NOT NULL,
  `kd_notif` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan_notif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_brg` int DEFAULT NULL,
  `id_movement` int DEFAULT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` enum('stok_menipis','stok_masuk','stok_keluar','lainnya') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'lainnya'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notif`, `kd_notif`, `pesan_notif`, `id_brg`, `id_movement`, `waktu`, `type`) VALUES
(1, 'NTF001', 'Stok Headset Gaming tersisa 15 pcs, segera lakukan restock', 5, 6, '2026-08-08 08:00:00', 'stok_menipis'),
(2, 'NTF002', 'Barang Mouse Wireless masuk sebanyak 50 pcs', 1, 1, '2026-08-01 09:00:00', 'stok_masuk'),
(3, 'NTF003', 'Barang Pulpen Standar keluar sebanyak 200 pcs', 6, 8, '2026-08-06 13:45:00', 'stok_keluar');

-- --------------------------------------------------------

--
-- Table structure for table `satuan_barang`
--

CREATE TABLE `satuan_barang` (
  `ids_barang` int NOT NULL,
  `kds_barang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nms_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satuan_barang`
--

INSERT INTO `satuan_barang` (`ids_barang`, `kds_barang`, `nms_barang`) VALUES
(1, 'PCS', 'Pieces'),
(2, 'BOX', 'Box'),
(3, 'UNT', 'Unit'),
(4, 'LSN', 'Lusin');

-- --------------------------------------------------------

--
-- Table structure for table `stock_movement`
--

CREATE TABLE `stock_movement` (
  `id_movement` int NOT NULL,
  `id_brg` int NOT NULL,
  `id_gudang` int NOT NULL,
  `type` enum('masuk','keluar','pindah') COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_supplier` int DEFAULT NULL,
  `tujuan_kirim` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_gudang_tujuan` int DEFAULT NULL,
  `id_user` int NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_movement`
--

INSERT INTO `stock_movement` (`id_movement`, `id_brg`, `id_gudang`, `type`, `qty`, `tanggal`, `id_supplier`, `tujuan_kirim`, `id_gudang_tujuan`, `id_user`, `keterangan`) VALUES
(1, 1, 1, 'masuk', 50, '2026-08-01 09:00:00', 1, NULL, NULL, 2, 'Kiriman rutin bulanan dari PT Elektronik Nusantara'),
(2, 1, 1, 'keluar', 5, '2026-08-03 14:20:00', NULL, 'Toko Mitra Cempaka', NULL, 3, 'Dikirim ke customer PT Elektronik Nusantara'),
(3, 4, 1, 'masuk', 120, '2026-08-02 10:15:00', 1, NULL, NULL, 2, 'Restock flashdisk'),
(4, 4, 1, 'keluar', 20, '2026-08-05 11:00:00', NULL, 'Toko Mitra Kelapa', NULL, 3, 'Pengiriman ke toko mitra'),
(5, 5, 2, 'masuk', 20, '2026-07-30 09:00:00', 1, NULL, NULL, 2, 'Kiriman awal headset dari PT Elektronik Nusantara'),
(6, 5, 2, 'keluar', 5, '2026-08-08 07:45:00', NULL, 'Toko Mitra Cempaka', NULL, 3, 'Pengiriman headset, stok tersisa jadi menipis'),
(7, 6, 1, 'masuk', 500, '2026-08-01 08:30:00', 2, NULL, NULL, 2, 'Kiriman pulpen dari CV Alat Tulis Sejahtera'),
(8, 6, 1, 'keluar', 200, '2026-08-06 13:45:00', NULL, 'Sekolah Mitra Harapan', NULL, 3, 'Distribusi ke sekolah mitra'),
(9, 9, 2, 'masuk', 100, '2026-08-04 09:00:00', 3, NULL, NULL, 2, 'Kiriman kaos dari PT Fashion Indo Retail'),
(10, 9, 2, 'keluar', 10, '2026-08-07 15:30:00', NULL, 'Sample Internal', NULL, 3, 'Sample untuk client'),
(11, 9, 2, 'pindah', 25, '2026-08-09 10:00:00', NULL, NULL, 1, 2, 'Transfer sebagian stok Kaos Polos ke Gudang Pusat Jakarta untuk penuhi permintaan cabang');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id_supp` int NOT NULL,
  `kd_supp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supp` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `almt_supp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id_supp`, `kd_supp`, `nama_supp`, `almt_supp`, `no_telp`) VALUES
(1, 'SUP001', 'PT Elektronik Nusantara', 'Jl. Industri Raya No. 12, Jakarta', '021-5551234'),
(2, 'SUP002', 'CV Alat Tulis Sejahtera', 'Jl. Kebon Jeruk No. 45, Jakarta', '021-5555678'),
(3, 'SUP003', 'PT Fashion Indo Retail', 'Jl. Casablanca No. 8, Jakarta', '021-5559012'),
(4, 'SUP004', 'UD Rumah Tangga Makmur', 'Jl. Ahmad Yani No. 20, Bekasi', '021-5553456');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `kd_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_users` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_users` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_users` enum('admin','staff') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'staff',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `gmbr_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `kd_user`, `nm_users`, `email_users`, `password_hash`, `role_users`, `is_active`, `gmbr_user`, `created_at`, `updated_at`) VALUES
(1, 'USR001', 'Andi Pratama', 'andi@logistikjaya.com', '$2y$10$examplehash1', 'admin', 1, NULL, '2026-08-17 12:34:31', '2026-08-17 12:34:31'),
(2, 'USR002', 'Siti Rahma', 'siti@logistikjaya.com', '$2y$10$examplehash2', 'staff', 1, NULL, '2026-08-17 12:34:31', '2026-08-17 12:34:31'),
(3, 'USR003', 'Budi Santoso', 'budi@logistikjaya.com', '$2y$10$examplehash3', 'staff', 1, NULL, '2026-08-17 12:34:31', '2026-08-17 12:34:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_log`
--
ALTER TABLE `audit_log`
  ADD PRIMARY KEY (`id_audit`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_brg`),
  ADD UNIQUE KEY `kd_brg` (`kd_brg`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_gudang` (`id_gudang`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id_gudang`),
  ADD UNIQUE KEY `kd_gudang` (`kd_gudang`);

--
-- Indexes for table `item_warehouse`
--
ALTER TABLE `item_warehouse`
  ADD PRIMARY KEY (`id_itemWarehouse`),
  ADD UNIQUE KEY `uniq_barang_gudang` (`id_brg`,`id_gudang`),
  ADD KEY `id_gudang` (`id_gudang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `kd_kategori` (`kd_kategori`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notif`),
  ADD UNIQUE KEY `kd_notif` (`kd_notif`),
  ADD KEY `id_brg` (`id_brg`),
  ADD KEY `id_movement` (`id_movement`);

--
-- Indexes for table `satuan_barang`
--
ALTER TABLE `satuan_barang`
  ADD PRIMARY KEY (`ids_barang`),
  ADD UNIQUE KEY `kds_barang` (`kds_barang`);

--
-- Indexes for table `stock_movement`
--
ALTER TABLE `stock_movement`
  ADD PRIMARY KEY (`id_movement`),
  ADD KEY `id_brg` (`id_brg`),
  ADD KEY `id_gudang` (`id_gudang`),
  ADD KEY `id_gudang_tujuan` (`id_gudang_tujuan`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id_supp`),
  ADD UNIQUE KEY `kd_supp` (`kd_supp`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `kd_user` (`kd_user`),
  ADD UNIQUE KEY `email_users` (`email_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `id_audit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_brg` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_gudang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_warehouse`
--
ALTER TABLE `item_warehouse`
  MODIFY `id_itemWarehouse` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notif` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `satuan_barang`
--
ALTER TABLE `satuan_barang`
  MODIFY `ids_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock_movement`
--
ALTER TABLE `stock_movement`
  MODIFY `id_movement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id_supp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_log`
--
ALTER TABLE `audit_log`
  ADD CONSTRAINT `audit_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_gudang`) REFERENCES `gudang` (`id_gudang`),
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`id_satuan`) REFERENCES `satuan_barang` (`ids_barang`),
  ADD CONSTRAINT `barang_ibfk_4` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id_supp`);

--
-- Constraints for table `item_warehouse`
--
ALTER TABLE `item_warehouse`
  ADD CONSTRAINT `item_warehouse_ibfk_1` FOREIGN KEY (`id_brg`) REFERENCES `barang` (`id_brg`),
  ADD CONSTRAINT `item_warehouse_ibfk_2` FOREIGN KEY (`id_gudang`) REFERENCES `gudang` (`id_gudang`);

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`id_brg`) REFERENCES `barang` (`id_brg`),
  ADD CONSTRAINT `notifikasi_ibfk_2` FOREIGN KEY (`id_movement`) REFERENCES `stock_movement` (`id_movement`);

--
-- Constraints for table `stock_movement`
--
ALTER TABLE `stock_movement`
  ADD CONSTRAINT `stock_movement_ibfk_1` FOREIGN KEY (`id_brg`) REFERENCES `barang` (`id_brg`),
  ADD CONSTRAINT `stock_movement_ibfk_2` FOREIGN KEY (`id_gudang`) REFERENCES `gudang` (`id_gudang`),
  ADD CONSTRAINT `stock_movement_ibfk_3` FOREIGN KEY (`id_gudang_tujuan`) REFERENCES `gudang` (`id_gudang`),
  ADD CONSTRAINT `stock_movement_ibfk_4` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id_supp`),
  ADD CONSTRAINT `stock_movement_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
