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

   ## Akun Default

```text
Admin
Username: admin
Password: admin123

Kasir
Username: kasir1
Password: kasir123
```

## Alur Penggunaan

### Admin

1. Login menggunakan akun admin.
2. Buka dashboard untuk melihat ringkasan toko.
3. Kelola kategori produk di menu `Kategori`.
4. Kelola produk di menu `Produk`.
5. Kelola user admin/kasir di menu `Manajemen User`.
6. Lihat riwayat transaksi di menu `Riwayat Transaksi`.
7. Buka `Laporan` untuk melihat penjualan berdasarkan tanggal.
8. Klik export PDF untuk mencetak laporan penjualan.

### Kasir

1. Login menggunakan akun kasir.
2. Buka menu `Transaksi`.
3. Pilih produk.
4. Masukkan jumlah item.
5. Tambahkan item lain jika diperlukan.
6. Masukkan nominal bayar.
7. Klik `Proses Transaksi`.
8. Sistem akan menyimpan transaksi, menyimpan detail transaksi, menghitung kembalian, dan mengurangi stok produk.
9. Struk transaksi akan ditampilkan setelah transaksi berhasil.

## Alur Data Transaksi

Saat transaksi diproses, sistem melakukan beberapa proses:

- Menyimpan data utama ke tabel `transaksi`.
- Menyimpan item belanja ke tabel `detail_transaksi`.
- Mengurangi stok produk di tabel `produk`.
- Menampilkan struk transaksi.
- Data transaksi muncul di riwayat dan laporan.

Jika transaksi hanya disusun di halaman kasir tetapi belum klik `Proses Transaksi`, data belum tersimpan ke database.

## Tabel Database

Project ini menggunakan tabel utama berikut:

```text
users
kategori
produk
transaksi
detail_transaksi
```

Kolom penting:

```text
users:
id_user, username, password, nama_lengkap, role, created_at

kategori:
id_kategori, nama_kategori, deskripsi

produk:
id_produk, id_kategori, nama_produk, stok, harga_beli, harga_jual

transaksi:
id_transaksi, id_user, kode_transaksi, total_harga, bayar, kembalian, tgl_transaksi

detail_transaksi:
id_detail, id_transaksi, id_produk, jumlah, harga_satuan, subtotal
```

## Catatan Penghapusan Transaksi

Jika data transaksi dihapus langsung dari database:

- Riwayat transaksi akan hilang.
- Laporan penjualan berubah.
- Dashboard omzet dan transaksi ikut berubah.
- Detail transaksi bisa ikut terhapus jika relasi memakai `ON DELETE CASCADE`.
- Stok produk tidak otomatis kembali.

Untuk menjaga akurasi data, lebih aman menggunakan kolom status seperti:

```text
selesai
dibatalkan
```

Dengan pendekatan ini, transaksi tidak langsung dihapus. Jika transaksi dibatalkan, sistem bisa mengembalikan stok produk dan laporan bisa mengabaikan transaksi batal.

## Export PDF

Export laporan penjualan menggunakan TCPDF.

Dependency diinstall menggunakan Composer:

```bash
composer require tecnickcom/tcpdf
```

Konfigurasi CodeIgniter:

```php
$config['composer_autoload'] = FCPATH . 'vendor/autoload.php';
```

Setelah install, TCPDF berada di:

```text
vendor/tecnickcom/tcpdf/
```

## Asset Frontend

Asset lokal yang digunakan:

```text
assets/css/bootstrap.min.css
assets/css/style.css
assets/js/bootstrap.bundle.min.js
assets/js/jquery-3.7.1.min.js
assets/js/transaksi.js
```

Jika menggunakan icon `bi bi-*`, tambahkan Bootstrap Icons. Bisa menggunakan CDN atau file lokal Bootstrap Icons.