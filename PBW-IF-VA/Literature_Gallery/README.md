# Literature Gallery

<p align="center">
       <img src="https://i.imgur.com/kSBQo1d.png" width="600">
     </p>

---

## Deskripsi Proyek

**Literature Gallery** adalah aplikasi web yang dirancang untuk mengelola koleksi buku. Aplikasi ini memungkinkan pengguna untuk melakukan operasi *CRUD* (Create, Read, Update, Delete) pada data koleksi buku. Aplikasi ini juga menyediakan fitur paginasi untuk mempermudah navigasi data yang besar.

---

## Anggota Tim

- Agung Febrian [220660121086]
- Kemal Hapidz Prastiawan [220660121115]
- Dede Yayan Suciyana [220660121179]

---

## Fitur Utama

1. **Operasi CRUD**: 
   - Tambah buku baru
   - Lihat daftar buku
   - Edit informasi buku
   - Hapus buku

2. **Validasi Data**: 
   - Nama buku, nama penulis, tahun terbit, sinopsis, dan foto wajib diisi.

3. **Pagination**:
   - Data ditampilkan dengan paginasi untuk kenyamanan pengguna saat jumlah buku dalam koleksi sangat banyak.

4. **Desain Responsif**:
   - Menggunakan Tailwind CSS untuk antarmuka yang responsif dan menarik.

5. **Autentikasi**:
   - Menggunakan Laravel Breeze untuk sistem login dan registrasi pengguna.

---

## Teknologi yang Digunakan

- **Backend**: Laravel 11
- **Frontend**: Blade Templating dengan Alpine.js dan Tailwind CSS
- **Database**: MySQL

---

## Persyaratan Sistem

Untuk menjalankan aplikasi ini, Anda memerlukan:

- PHP versi terbaru (minimum PHP 8.1)
- Composer
- Node.js & NPM
- Server lokal dengan MySQL

---

## Cara Instalasi dan Menjalankan Proyek

1. **Clone Repository**
   ```bash
   git clone https://github.com/agungfbrrn/UAS-PBW.git
   cd UAS-PBW/LiteratureGallery
   ```

2. **Instal Dependensi Backend**
   ```bash
   composer install
   ```

3. **Instal Dependensi Frontend**
   ```bash
   npm install
   ```

4. **Konfigurasi Lingkungan**
   - Duplikat file `.env.example` menjadi `.env`.
   - Atur kredensial database di file `.env`:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=galeriliterasi
     DB_USERNAME=username_mysql_anda
     DB_PASSWORD=password_mysql_anda
     ```

5. **Migrasi Database**
   ```bash
   php artisan migrate
   ```

6. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

7. **Menjalankan Server Lokal**
   ```bash
   php artisan serve
   ```
   Akses aplikasi melalui browser di alamat [http://localhost:8000](http://localhost:8000).

8. **Menjalankan Build Frontend**
   Untuk menjalankan frontend:
   ```bash
   npm run dev
   ```
   
---

## Dokumentasi Halaman

1. **Halaman Daftar Buku**
   - Menampilkan daftar buku yang tersedia dengan informasi berikut:
     - Nama buku
     - Penulis
     - Tahun terbit
     - Sinopsis
     - Foto buku
   - Terdapat tombol untuk menambah dan mengedit buku.

2. **Halaman Tambah Buku**
   - Formulir untuk memasukkan data buku baru.
   - Field yang harus diisi:
     - Nama buku
     - Penulis
     - Tahun terbit
     - Sinopsis
     - Foto buku (upload gambar)
   - Tombol untuk menyimpan buku baru.

3. **Halaman Edit Buku**
   - Formulir untuk mengedit data buku yang sudah ada.
   - Field yang dapat diubah:
     - Nama buku
     - Penulis
     - Tahun terbit
     - Sinopsis
     - Foto buku (upload gambar baru jika perlu)
   - Tombol untuk menyimpan perubahan.
   - Terdapat tombol untuk menghapus buku secara langsung.

   ---

## Demo Aplikasi

   - **Screenshot Web**:

     <p align="center">
       <img src="https://i.imgur.com/ZBdw3ve.png" width="600">
     </p>

   - **Demo GIF**:

     <p align="center">
       <img src="https://i.giphy.com/media/v1.Y2lkPTc5MGI3NjExcGIwZnRuM2gxa28ycm9tZDBnZG1nenpzdm9vbHp3bXZhcWoyZ2V5ayZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/KsEoeO9ZryaMwBE5hn/giphy.gif" width="600">
     </p>
