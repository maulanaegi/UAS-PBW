# UAS-PBW (Aplikasi Pengelolaan Data Mahasiswa)

## Deskripsi
Aplikasi ini dikembangkan untuk memenuhi tugas UAS pada mata kuliah Pemrograman Web Berbasis Framework (PBW). Aplikasi ini merupakan sistem manajemen pengelolaan data mahasiswa yang dibangun dengan menggunakan **Laravel Framework**. Dengan aplikasi ini, pengguna dapat melakukan pengelolaan data mahasiswa dengan mudah melalui dashboard yang ramah pengguna.

## Fitur Utama
- **Registrasi dan Login Pengguna**: Pengguna dapat mendaftar dan masuk ke dalam aplikasi dengan sistem autentikasi.
- **Manajemen Data Mahasiswa**: Admin dapat menambah, mengedit, dan menghapus data mahasiswa.
- **Dashboard Admin**: Admin memiliki akses penuh terhadap data mahasiswa dan dapat mengelola akun pengguna.
- **Role dan Permission**: Menggunakan sistem role dan permission untuk membatasi akses berdasarkan peran pengguna (misalnya, admin dan mahasiswa).
- **Notifikasi dan Pembaruan**: Sistem notifikasi untuk pembaruan data mahasiswa.

## Teknologi yang Digunakan
- **Laravel 10.x**: Framework PHP yang digunakan untuk membangun aplikasi ini.
- **MySQL**: Database untuk menyimpan data pengguna dan mahasiswa.
- **Bootstrap**: Digunakan untuk membangun antarmuka pengguna yang responsif.
- **Composer**: Untuk mengelola dependensi aplikasi.
- **Laravel Fortify**: Untuk autentikasi dan pendaftaran pengguna.
- **PHP 8.x**: Versi PHP yang digunakan dalam pengembangan aplikasi ini.

## Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/usep-it/UAS-PBW.git

### Persyaratan

1. PHP versi 8.0 atau lebih tinggi
2. MySQL atau MariaDB
3. Web server seperti Apache atau Nginx
4. Composer (untuk manajemen dependensi)

### Langkah-langkah Instalasi

1. **Clone Repository**

   Clone repository ini ke mesin lokal Anda:

   ```bash
   git clone https://github.com/usep-it/UAS-PBW.git
   ```

2. **Masuk ke Direktori Proyek**

   Setelah melakukan clone, masuk ke dalam direktori proyek:

   ```bash
   cd UAS-PBW
   ```

3. **Siapkan Database**

   Buat database baru di MySQL dengan nama `starter_kits_lsp`. Anda bisa menggunakan skrip SQL berikut untuk membuat struktur tabel yang diperlukan:

   ```sql
   CREATE DATABASE starter_kits_lsp;
   ```

4. **Konfigurasi Database**

   Ubah konfigurasi database di file `.env` untuk menyesuaikan dengan pengaturan database lokal Anda:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=starter_kits_lsp
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Install Dependensi**

   Jalankan perintah berikut untuk menginstal dependensi yang diperlukan:

   ```bash
   composer install
   ```

6. **Migrate Database**

   Jalankan migrasi untuk membuat tabel-tabel yang diperlukan di database:

   ```bash
   php artisan migrate
   ```

7. **Jalankan Server**

   Setelah semua langkah di atas selesai, jalankan server dengan perintah:

   ```bash
   php artisan serve
   ```

   Aplikasi akan berjalan di `http://127.0.0.1:8000`.

## Kontribusi

Proyek ini dikerjakan oleh tim yang terdiri dari:

- **USEP SUERMAN (220660121200)** - [usep-it](https://github.com/usep-it)
- **MUHAMAD AGUSTIN ADITYA (220660121038)** - [MuhamadAgustin53](https://github.com/MuhamadAgustin53)
- **DAUD RAMDANI (220660121023)** - [DaudRamdani](https://github.com/DaudRamdani)
- **RAFI SUKMA HAUZAN (220660121207)** - [piwpiw205](https://github.com/piwpiw205)
- **LISTIA SILVIANI (220660121108)** - [aesil12](https://github.com/aesil12)

Kami sangat terbuka untuk kontribusi! Jika Anda menemukan bug atau memiliki saran fitur baru, silakan ajukan [issue](https://github.com/usep-it/UAS-PBW/issues) atau buat pull request.

## Lisensi

Proyek ini dilisensikan di bawah lisensi MIT - lihat file [LICENSE](LICENSE) untuk detail lebih lanjut.

## Terima Kasih

Terima kasih telah menggunakan aplikasi kami! Semoga aplikasi ini dapat memberikan manfaat dalam pengelolaan data mahasiswa.
