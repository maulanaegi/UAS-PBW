# UAS-PBW (Aplikasi Forum Online)

## Deskripsi
Aplikasi ini dikembangkan untuk memenuhi tugas UAS pada mata kuliah Pemrograman Web Berbasis Framework (PBW). Aplikasi ini merupakan Forum untuk berdiskusi seputar tugas ataupun tentang hal lainnya.

## Fitur Utama
- **Registrasi dan Login Pengguna**: Pengguna dapat mendaftar dan masuk ke dalam aplikasi dengan membuat Username.
- **Posting**: Pengguna dapat menambah, mengedit, comment dan menghapus postingan.
- **Dashboard Admin**: Admin memiliki akses penuh terhadap data mahasiswa dan dapat mengelola akun pengguna.
- **Role dan Permission**: Menggunakan sistem role dan permission untuk membatasi akses edit dan hapus berdasarkan penggunanya.
- **Notifikasi dan Pembaruan**: Sistem notifikasi untuk pemberitahuan saat ada yang comment pada postingan kita.
- **Pencarian**: Sistem pencarian untuk mencari sebuah postingan yang kita butuhkan.

## Teknologi yang Digunakan
- **Laravel 10.x**: Framework PHP yang digunakan untuk membangun aplikasi ini.
- **MySQL**: Database untuk menyimpan data pengguna dan postingan pengguna.
- **Bootstrap**: Digunakan untuk membangun antarmuka pengguna yang responsif.
- **Composer**: Untuk mengelola dependensi aplikasi.
- **Laravel Fortify**: Untuk autentikasi dan pendaftaran pengguna.
- **PHP 8.x**: Versi PHP yang digunakan dalam pengembangan aplikasi ini.

## Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/RizkiP19/UAS-PBW.git

### Persyaratan

1. PHP versi 8.0 atau lebih tinggi
2. MySQL atau MariaDB
3. Web server seperti Apache atau Nginx
4. Composer (untuk manajemen dependensi)

### Langkah-langkah Instalasi

1. **Clone Repository**

   Clone repository ini ke mesin lokal Anda:

   ```bash
   git clone https://github.com/RizkiP19/UAS-PBW.git
   ```

2. **Masuk ke Direktori Proyek**

   Setelah melakukan clone, masuk ke dalam direktori proyek:

   ```bash
   cd UAS-PBW
   ```

3. **Siapkan Database**

   Buat database baru di MySQL dengan nama `nugas`. Anda bisa menggunakan skrip SQL berikut untuk membuat struktur tabel yang diperlukan:

   ```sql
   CREATE DATABASE starter_kits_lsp;
   ```

4. **Konfigurasi Database**

   Ubah konfigurasi database di file `.env` untuk menyesuaikan dengan pengaturan database lokal Anda:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nugas
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

- **RIZKI PANGESTU (220660121180)** - [RizkiP19](https://github.com/RizkiP19)
- **ALBANI AKBAR (220660121142)** - [Albani-A](https://github.com/Albani-A)
- **DENI ANDAYANI (220660121044)** - [deniandayani](https://github.com/deniandayani)
- **KAKA KALAM (220660121112)** - [KakaKalamDjatiPermana](https://github.com/KakaKalamDjatiPermana)
- **M. IKHSAN MUTAQIEN (220660121088)** - [220660121088](https://github.com/220660121088)

Kami sangat terbuka untuk kontribusi! Jika Anda menemukan bug atau memiliki saran fitur baru, silakan ajukan [issue](https://github.com/RizkiP19/UAS-PBW/issues) atau buat pull request.

## Lisensi

Proyek ini dilisensikan di bawah lisensi MIT - lihat file [LICENSE](LICENSE) untuk detail lebih lanjut.

## Terima Kasih

Terima kasih telah menggunakan aplikasi kami! Semoga aplikasi ini dapat memberikan manfaat dan memudahkan kalian dalam melakukan diskusi.