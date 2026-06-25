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

## Kebutuhan Sistem

- PHP 7.4 atau lebih baru.
- MySQL/MariaDB.
- Apache dengan `mod_rewrite` aktif.
- Composer.
- XAMPP direkomendasikan untuk penggunaan lokal.

## Instalasi

1. Clone atau salin project ke folder web server.

   Contoh menggunakan XAMPP:

   ```bash
   C:\xampp\htdocs\nama-project
   ```

   2. Masuk ke root project.

   ```bash
   cd C:\xampp\htdocs\nama-project
   ```

   3. Install dependency Composer.

   ```bash
   composer install
   ```

   4. Import database.

   Gunakan phpMyAdmin atau MySQL CLI untuk import:

   ```text
   database/toko_kelontong.sql
   ```

   Nama database yang digunakan:

   ```text
   toko_kelontong
   ```

   5. Sesuaikan konfigurasi database di:

   ```text
   application/config/database.php
   ```

   Contoh konfigurasi lokal XAMPP:

   ```php
   'hostname' => 'localhost',
   'username' => 'root',
   'password' => '',
   'database' => 'toko_kelontong',
   'dbdriver' => 'mysqli',
   ```

   6. Sesuaikan base URL di:

   ```text
   application/config/config.php
   ```

   Contoh:

   ```php
   $config['base_url'] = 'http://localhost/nama-project/';
   $config['index_page'] = '';
   $config['composer_autoload'] = FCPATH . 'vendor/autoload.php';
   ```

   7. Pastikan `.htaccess` sesuai lokasi project.

   Jika project berada di folder `nama-project`:

   ```apache
   RewriteBase /nama-project/
   ```

   Jika project berada langsung di root domain:

   ```apache
   RewriteBase /
   ```

   8. Jalankan Apache dan MySQL, lalu buka aplikasi melalui browser.

   ```text
   http://localhost/nama-project/
   ```