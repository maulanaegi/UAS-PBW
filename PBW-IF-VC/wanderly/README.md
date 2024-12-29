<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Wanderly

# Aplikasi Laravel

Panduan untuk menjalankan aplikasi Laravel ini.

## Prasyarat
Sebelum memulai, pastikan Anda memiliki hal-hal berikut:
- PHP versi 8.0 atau lebih baru
- Composer
- Database (MySQL/PostgreSQL)
- Node.js (untuk mengelola front-end dependencies)
- Web server seperti Apache atau Nginx

## Langkah-langkah Menjalankan Aplikasi

### 1. Clone Repositori
Clone repositori ini ke komputer lokal Anda:
```bash
git clone https://github.com/username/nama-repositori.git
cd nama-repositori
```

### 2. Instal Dependensi
Instal semua dependensi backend menggunakan Composer:
```bash
composer install
```

### 3. Konfigurasi File .env
Salin file .env.example menjadi .env:
```bash
cp .env.example .env
```
Sesuaikan konfigurasi database, seperti nama database, username, dan password, di file .env.

### 4. Generate Application Key
Generate application key untuk aplikasi:
```bash
php artisan key:generate
```

### 5. Migrasi dan Seed Database
Jalankan migrasi untuk membuat tabel di database:
```bash
php artisan migrate:fresh --seed
```
Note : menjalankan perintah '--seed' untuk seed data user
- (user)
- email :user@gmail.com
- password :password
- (admin)
- email :admin@gmail.com
- password :password

### 6. Jalankan Server Laravel
Jalankan server development Laravel:
```bash
php artisan serve
```

### 7. Kelola Frontend Assets
Web belum berjalan dikarenakan harus mengaktifkan dependensinya karena website ini menggunakan tailwind dan alpine.js:
- Instal dependensi frontend:
  ```bash
  npm install
  ```
- Compile assets:
  ```bash
  npm run dev
  ```

## Troubleshooting
Jika Anda mengalami masalah, periksa hal berikut:
1. Pastikan semua prasyarat terinstal dengan benar.
2. Periksa konfigurasi di file .env.
3. Periksa log aplikasi di folder `storage/logs/`.
