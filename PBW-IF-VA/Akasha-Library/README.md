# UAS PBW-Akasha Library Management System

## Deskripsi 
Website ini dibuat bertujuan untuk memenuhi UAS Mata Kuliah Pemrogaman Berbasis Web. Akasha Library Management System adalah aplikasi manajemen perpustakaan berbasis web yang memanfaatkan Laravel Blade sebagai engine untuk rendering tampilan. Aplikasi ini dirancang untuk membantu pengelolaan buku, anggota, dan riwayat peminjaman secara efisien dengan antarmuka yang ramah pengguna.
## Anggota Kelompok
- **Rani Siti Nabila (220660121034)**
- **Desi Siti Rahmawati (220660121099)**
- **Melisa Sri Rahayu (220660121146)**
  
## Fitur Utama
1. **Dashboard**
   - Menampilkan ringkasan data seperti jumlah buku, kategori, anggota, dan riwayat peminjaman.

2. **Manajemen Buku**
   - Menambahkan, mengedit, dan menghapus data buku.

3. **Manajemen Kategori**
   - Mengelola kategori buku untuk mempermudah klasifikasi.

4. **Manajemen Anggota**
   - Menambahkan, mengedit, dan menghapus data anggota perpustakaan.

5. **Manajemen Peminjaman**
   - Mencatat transaksi peminjaman dan pengembalian buku.
   - Menampilkan riwayat peminjaman dengan informasi lengkap.

6. **Informasi Aturan Peminjaman**
   - Menampilkan informasi terkait aturan peminjaman seperti batas waktu, jumlah maksimal buku, dan denda.
7. **Fitur Cetak Laporan**
    Laporan riwayat peminjaman dapat diekspor ke format PDF untuk pencetakan atau penyimpanan arsip.

## Teknologi yang Digunakan
- **Frontend**: Blade Template Engine (Laravel)
- **Backend**: Laravel Framework
- **Database**: MySQL
- **Server**: Laragon (Local Development Server)

## Fungsi CRUD
Berikut implementasi CRUD (Create, Read, Update, Delete):

### Buku
- **Create**: Menambahkan buku baru dengan data seperti judul, kode buku, kategori, dan lainnya.
- **Read**: Melihat daftar buku lengkap.
- **Update**: Mengedit data buku yang ada.
- **Delete**: Menghapus data buku.

### Kategori
- **Create**: Menambahkan kategori baru.
- **Read**: Menampilkan daftar kategori yang tersedia.
- **Update**: Mengedit data kategori.
- **Delete**: Menghapus kategori.

### Anggota
- **Create**: Menambahkan anggota baru.
- **Read**: Menampilkan daftar anggota perpustakaan.
- **Update**: Mengedit data anggota.
- **Delete**: Menghapus data anggota.

## Cara Instalasi

1. **Persiapan Lingkungan**
   - Pastikan Laragon terinstal di sistem Anda.
   - Install Composer dan Node.js.

2. **Clone Repository**
   ```bash
   git clone <repository-url>
   cd akasha-library
   ```

3. **Install Dependencies**
   ```bash
   composer install
   npm install
   npm run dev
   ```

4. **Konfigurasi Environment**
   - Salin file `.env.example` menjadi `.env`:
     ```bash
     cp .env.example .env
     ```
   - Konfigurasikan database di file `.env`:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=akasha_library
     DB_USERNAME=root
     DB_PASSWORD=
     ```

5. **Migrasi Database**
   Jalankan perintah berikut untuk membuat tabel di database:
   ```bash
   php artisan migrate
   ```

6. **Menjalankan Aplikasi**
   ```bash
   php artisan serve
   ```
   Akses aplikasi melalui browser di [http://127.0.0.1:8000](http://127.0.0.1:8000).

7. **Login Awal**
   - Default Admin:
     - Email: `admin@admin.com`
     - Password: `admin123`
   - Default Anggota :
     - Email: `rani@gmail.com`
     - Password: `12345678`

## Tampilan
1. **Dashboard Admin**
   ![Dashboard Admin](https://github.com/MelisaSri/Uas-PBW/blob/main/Screenshot%202025-01-09%20104616.png)
   Pada tampilan Dashboard Admin menampilkan ringkasan statistik seperti jumlah buku, kategori, anggota, dan riwayat peminjaman

2. **Dashboard Anggota**
   ![Dashboard Anggota](https://github.com/MelisaSri/Uas-PBW/blob/main/Screenshot%202025-01-09%20103237.png)
   Pada tampilan Dashboard Anggota menampilkan ringkasan statistik seperti jumlah buku, kategori, anggota, dan riwayat peminjaman, dan menampilkan informasi aturan peminjaman buku
   
3. **login**
   ![Dashboard Anggota](https://github.com/MelisaSri/Uas-PBW/blob/main/Screenshot%202025-01-09%20104527.png)
   Pada tampilan login  dirancang sederhana namun fungsional dengan formulir untuk memasukkan email dan password pengguna/admin.
   
4. **Register**
   ![Dashboard Anggota](https://github.com/MelisaSri/Uas-PBW/blob/main/Screenshot%202025-01-09%20104318.png)
   Pada tampilan Register dirancang untuk pengguna baru yang ingin membuat akun agar dapat mengakses Akasha Library

5. **Tampilan Lihat Semua Buku**
   ![Dashboard Anggota](https://github.com/MelisaSri/Uas-PBW/blob/main/Screenshot%202025-01-09%20103436.png)
   Tampilan ini memungkinkan pengguna untuk melihat daftar lengkap buku yang tersedia di perpustakaan Akasha. Pengguna dapat menelusuri koleksi buku dengan mudah.
   
6. **Tampilan Detail Buku**
    Di tampilan detail buku, pengguna dapat melihat informasi lebih mendalam tentang buku tertentu, seperti deskripsi, pengarang, dan kategori.
   ![Dashboard Anggota](https://github.com/MelisaSri/Uas-PBW/blob/main/Screenshot%202025-01-09%20114923.png)

7. **Tampilan Tambah Buku**
   ![Dashboard Anggota](https://github.com/MelisaSri/Uas-PBW/blob/main/Screenshot%202025-01-09%20142942.png)
   Tampilan untuk menambahkan buku ke sistem memungkinkan admin untuk menginput data buku baru yang akan tersedia di perpustakaan.

8. **Tampilan Delete Buku**
   ![Dashboard Anggota](https://github.com/MelisaSri/Uas-PBW/blob/main/Screenshot%202025-01-09%20103958.png)
   Admin dapat menghapus buku yang tidak lagi tersedia atau relevan melalui tampilan ini, dengan konfirmasi untuk memastikan tindakan yang diinginkan.
   
9. **Tampilan Update Buku**
   ![Dashboard Anggota](https://github.com/MelisaSri/Uas-PBW/blob/main/Screenshot%202025-01-09%20115020.png)
   Tampilan ini memungkinkan admin untuk memperbarui informasi buku yang sudah ada di sistem, seperti mengedit judul, pengarang, atau kategori.

10. **Tampilan Semua Kategori**
   ![Dashboard Anggota](https://github.com/MelisaSri/Uas-PBW/blob/main/Screenshot%202025-01-09%20104139.png)
   Pada tampilan ini, admin dapat melihat semua kategori buku yang ada dalam sistem, memudahkan navigasi dan pengelolaan koleksi buku berdasarkan kategori

11. **Tampilan Tambah Kategori**
   ![Dashboard Anggota](https://github.com/MelisaSri/Uas-PBW/blob/main/Screenshot%202025-01-09%20114837.png)
   Admin dapat menambahkan kategori baru pada sistem perpustakaan, yang berguna untuk mengorganisir buku-buku berdasarkan tema atau jenisnya.
   
12. **Tampilan  Daftar Anggota**
   ![Dashboard Anggota](https://github.com/MelisaSri/Uas-PBW/blob/main/Screenshot%202025-01-09%20104058.png)
    Tampilan ini memberikan daftar lengkap anggota yang terdaftar dalam sistem, memungkinkan admin untuk memantau status keanggotaan dan informasi terkait.                      
13. **Tampilan Peminjaman**
   ![Dashboard Anggota](https://github.com/MelisaSri/Uas-PBW/blob/main/Screenshot%202025-01-09%20123008.png)
 Tampilan ini menunjukkan buku-buku yang tersedia untuk dipinjam dan memungkinkan anggota untuk memilih buku yang ingin mereka pinjam. Admin juga dapat memantau status peminjaman buku oleh anggota.

14. **Tampilan Riwayat Peminjaman**
   ![Dashboard Anggota](https://github.com/MelisaSri/Uas-PBW/blob/main/Screenshot%202025-01-09%20104117.png)
Tampilan ini memberikan informasi tentang riwayat peminjaman buku oleh anggota. Admin dan anggota dapat melihat kapan buku dipinjam, tanggal pengembalian yang diharapkan, serta status buku yang sudah dikembalikan. Dan bisa mencetak laporan riwayat peminbuku berbentuk PDF.

15. **Tampilan Pengembalian Buku**
   ![Dashboard Anggota](https://github.com/MelisaSri/Uas-PBW/blob/main/Screenshot%202025-01-09%20123755.png)
Pada tampilan pengembalian, anggota dapat melihat daftar buku yang sedang mereka pinjam dan memilih untuk mengembalikannya. Admin dapat memonitor pengembalian buku.