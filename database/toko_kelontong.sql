CREATE DATABASE IF NOT EXISTS `toko_kelontong` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `toko_kelontong`;

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `role` enum('admin','kasir') NOT NULL DEFAULT 'kasir',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `harga_beli` decimal(12,2) NOT NULL DEFAULT 0.00,
  `harga_jual` decimal(12,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id_produk`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `produk_kategori_fk` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `kode_transaksi` varchar(30) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_harga` decimal(12,2) NOT NULL DEFAULT 0.00,
  `bayar` decimal(12,2) NOT NULL DEFAULT 0.00,
  `kembalian` decimal(12,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id_transaksi`),
  UNIQUE KEY `kode_transaksi` (`kode_transaksi`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `transaksi_user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` decimal(12,2) NOT NULL DEFAULT 0.00,
  `subtotal` decimal(12,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id_detail`),
  KEY `id_transaksi` (`id_transaksi`),
  KEY `id_produk` (`id_produk`),
  CONSTRAINT `detail_transaksi_fk` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_produk_fk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `role`) VALUES
('admin', MD5('admin123'), 'Administrator', 'admin'),
('kasir1', MD5('kasir123'), 'Kasir Satu', 'kasir')
ON DUPLICATE KEY UPDATE `username` = VALUES(`username`);

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi`) VALUES
(1, 'Makanan', 'Produk makanan ringan dan kebutuhan harian'),
(2, 'Minuman', 'Minuman kemasan'),
(3, 'Kebutuhan Rumah', 'Barang kebutuhan rumah tangga')
ON DUPLICATE KEY UPDATE `nama_kategori` = VALUES(`nama_kategori`), `deskripsi` = VALUES(`deskripsi`);

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `stok`, `harga_beli`, `harga_jual`) VALUES
(1, 1, 'Beras 5kg', 20, 65000, 72000),
(2, 1, 'Mie Instan', 100, 2800, 3500),
(3, 2, 'Air Mineral 600ml', 80, 2500, 3500),
(4, 3, 'Sabun Mandi', 35, 4500, 6500)
ON DUPLICATE KEY UPDATE
`id_kategori` = VALUES(`id_kategori`),
`nama_produk` = VALUES(`nama_produk`),
`stok` = VALUES(`stok`),
`harga_beli` = VALUES(`harga_beli`),
`harga_jual` = VALUES(`harga_jual`);
