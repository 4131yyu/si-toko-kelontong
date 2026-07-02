# Sistem Informasi Manajemen Toko Kelontong

![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?logo=php&logoColor=white)
![CodeIgniter](https://img.shields.io/badge/CodeIgniter-3-EF4223?logo=codeigniter&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?logo=bootstrap&logoColor=white)
![License](https://img.shields.io/badge/License-Academic-blue)

Aplikasi kasir dan manajemen toko kelontong berbasis web yang dikembangkan menggunakan framework **CodeIgniter 3** dengan arsitektur **MVC**. Sistem ini mengotomatisasi dan menyederhanakan proses operasional toko kelontong, mulai dari manajemen produk dan stok, transaksi penjualan, hingga pembuatan laporan penjualan dalam format PDF.

> Proyek UAS Mata Kuliah Pemrograman Web — Program Studi S1 Ilmu Komputer, Fakultas Teknik, Universitas Bumigora 2026.

---

## Daftar Isi

- [Latar Belakang](#-latar-belakang)
- [Fitur Sistem](#-fitur-sistem)
- [Teknologi](#-teknologi)
- [Struktur Proyek](#-struktur-proyek)
- [Kebutuhan Sistem](#-kebutuhan-sistem)
- [Instalasi](#-instalasi)
- [Akun Uji Coba](#-akun-uji-coba)
- [Alur Penggunaan](#-alur-penggunaan)
- [Skema Database](#-skema-database)
- [Anggota Tim](#-anggota-tim)

---

## Latar Belakang

Toko kelontong merupakan salah satu jenis usaha yang paling umum di Indonesia, namun mayoritas masih dikelola secara manual. Permasalahan yang sering terjadi meliputi stok barang yang tidak terpantau, kesalahan hitung saat transaksi, serta tidak adanya laporan keuangan yang terstruktur.

Sistem ini hadir sebagai solusi digitalisasi yang ringan dan langsung dapat digunakan, dengan dua peran pengguna:

- **Admin / Pemilik Toko** — mengelola seluruh data dan melihat laporan bisnis.
- **Kasir** — memproses transaksi penjualan secara cepat dan akurat.

---

## Fitur Sistem

| ID Fitur | Fitur                                                                                | Role         |
| -------- | ------------------------------------------------------------------------------------ | ------------ |
| TK-01    | Login multi-role (Admin dan Kasir)                                                   | Admin, Kasir |
| TK-02    | Dashboard statistik — total transaksi hari ini, omzet, stok menipis, produk terlaris | Admin, Kasir |
| TK-03    | Manajemen Kategori Produk (CRUD)                                                     | Admin        |
| TK-04    | Manajemen Produk & Stok Barang (CRUD)                                                | Admin        |
| TK-05    | Transaksi Penjualan — pilih produk, hitung total & kembalian otomatis, update stok   | Kasir        |
| TK-06    | Riwayat Transaksi & Detail Struk                                                     | Admin, Kasir |
| TK-07    | Laporan Penjualan — filter tanggal, cetak/unduh PDF                                  | Admin        |
| TK-08    | Manajemen User / Akun (CRUD, atur role)                                              | Admin        |
| TK-09    | Logout dengan konfirmasi sesi                                                        | Admin, Kasir |

---

## Teknologi

| Layer        | Teknologi                                                         |
| ------------ | ----------------------------------------------------------------- |
| Backend      | PHP 8.1+, CodeIgniter 3 (MVC)                                     |
| Frontend     | HTML, CSS, Bootstrap 5, Bootstrap Icons, JavaScript, jQuery 3.7.1 |
| Database     | MySQL / MariaDB                                                   |
| PDF          | TCPDF (via Composer)                                              |
| Server Lokal | Apache + XAMPP                                                    |

---

## Struktur Proyek

```
si-toko-kelontong/
├── application/
│   ├── config/          # Konfigurasi CI3 (database, routes, dll)
│   ├── controllers/     # Auth, Dashboard, Kategori, Produk, Transaksi, Laporan, User
│   ├── models/          # Model untuk setiap tabel database
│   └── views/
│       ├── templates/   # header.php, sidebar.php, footer.php
│       ├── dashboard/
│       ├── kategori/
│       ├── produk/
│       ├── transaksi/
│       ├── laporan/
│       └── user/
├── assets/
│   ├── css/             # Bootstrap 5, Bootstrap Icons, style.css
│   └── js/              # Bootstrap bundle, jQuery, transaksi.js
├── database/
│   └── toko_kelontong.sql
├── system/              # Core CodeIgniter 3
├── vendor/              # TCPDF & dependency Composer
├── composer.json
├── composer.lock
├── index.php
└── .htaccess
```

---

## Kebutuhan Sistem

- PHP 7.4 atau lebih baru (direkomendasikan PHP 8.1+)
- MySQL / MariaDB
- Apache dengan `mod_rewrite` aktif
- Composer
- XAMPP (direkomendasikan untuk penggunaan lokal)

---

## Instalasi

### 1. Clone Repositori

```bash
git clone https://github.com/username/si-toko-kelontong.git
```

Atau salin folder project ke direktori web server:

```
C:\xampp\htdocs\si-toko-kelontong\
```

### 2. Install Dependency Composer

```bash
cd si-toko-kelontong
composer install
```

### 3. Import Database

Buka **phpMyAdmin** atau gunakan MySQL CLI, lalu buat database baru dan import file SQL:

```
Nama database : toko_kelontong
File SQL      : database/toko_kelontong.sql
```

### 4. Konfigurasi Database

Edit file `application/config/database.php`:

```php
'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'toko_kelontong',
'dbdriver' => 'mysqli',
```

### 5. Konfigurasi Base URL

Edit file `application/config/config.php`:

```php
$config['base_url']         = 'http://localhost/si-toko-kelontong/';
$config['index_page']       = '';
$config['composer_autoload'] = FCPATH . 'vendor/autoload.php';
```