# si-toko-kelontong

Aplikasi kasir dan manajemen toko berbasis CodeIgniter 3. Aplikasi ini digunakan untuk mengelola produk, kategori, user, transaksi penjualan, riwayat transaksi, laporan penjualan, dan export laporan ke PDF.

## Fitur

- Login berdasarkan role user.
- Role `admin` untuk mengelola master data dan laporan.
- Role `kasir` untuk memproses transaksi penjualan.
- Manajemen kategori produk.
- Manajemen produk, stok, harga beli, dan harga jual.
- Transaksi kasir dengan perhitungan total belanja dan kembalian.
- Pengurangan stok otomatis setelah transaksi berhasil.
- Riwayat transaksi.
- Dashboard ringkasan transaksi, omzet, produk, kategori, stok menipis, dan produk terlaris.
- Laporan penjualan berdasarkan rentang tanggal.
- Export laporan penjualan ke PDF menggunakan TCPDF.

## Teknologi

- PHP
- CodeIgniter 3
- MySQL atau MariaDB
- Bootstrap 5
- jQuery 3.7.1
- Composer
- TCPDF
- Apache/XAMPP untuk lingkungan lokal

## Struktur Project

```text
application/
  config/
  controllers/
  models/
  views/
assets/
  css/
  js/
database/
system/
vendor/
composer.json
composer.lock
index.php
.htaccess
```