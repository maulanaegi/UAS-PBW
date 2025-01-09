# CookLab

**CookLab** adalah platform manajemen resep masakan berbasis web yang mendukung operasi **CRUD** (Create, Read, Update, Delete). Proyek ini dirancang untuk memudahkan pengguna dalam menyimpan, mengelola, dan memperbarui resep masakan secara efisien.

---

## Tim Pengembang
- **Siti Rachmania Putri** (220660121066)  
- **Farida Zahra Arindra** (220660121085)

---

## Demo

Berikut adalah cuplikan proyek ini dalam bentuk GIF:

![Demo](https://i.imgur.com/VwjNBi3.gif)

---

## Fungsionalitas
### 1. Create (Menambahkan Data)
- **Proses:**
  - Form input validasi data pengguna (contoh: nama, durasi, deskripsi, foto).
  - Data disimpan ke database dengan model `Product`.
  - Foto diunggah ke direktori `public` dengan nama unik menggunakan `hashName()`.
  - Redirect ke halaman produk dengan pesan sukses.

### 2. Read (Menampilkan Data)
- **Proses:**
  - Mengambil data produk dari database menggunakan metode `paginate()`.
  - Menampilkan data di halaman produk (`products.index`).

### 3. Update (Memperbarui Data)
- **Proses:**
  - Validasi data pengguna.
  - Jika ada file baru, foto lama dihapus dan diganti dengan yang baru.
  - Data diperbarui di database.

### 4. Delete (Menghapus Data)
- **Proses:**
  - Jika foto tersimpan selain `noimage.png`, file dihapus dari direktori `public`.
  - Data produk dihapus dari database.

---

## Validasi Data
- **Nama:** Wajib diisi, maksimal 255 karakter.
- **Durasi:** Wajib diisi, harus berupa angka.
- **Deskripsi:** Wajib diisi.
- **Foto:** Wajib diunggah (format: jpeg, png, jpg).

---

## Teknologi yang Digunakan
- **Backend:** Laravel Framework.  
- **Frontend:** Blade templating dan Tailwind CSS.  
- **Autentikasi:** Laravel Breeze.  
- **Database:** MySQL melalui XAMPP.  
- **File Storage:** Laravel Storage (`storage/public`).  
- **Pagination:** Menampilkan 15 resep per halaman.  

---

## Persyaratan Sistem
- **PHP:** Versi 8.1 atau lebih baru.  
- **Composer:** Terinstal di sistem.  
- **Node.js dan NPM:** Untuk membangun aset frontend.  
- **XAMPP/MAMP/WAMP:** Server lokal dengan MySQL.  

---

## Instalasi dan Setup Proyek

1. **Clone Repositori Ini**  
2. **Install Dependensi** 
   ```bash
   composer install
   npm install
3. **Konfigurasi Lingkungan** 
Salin .env.example menjadi .env, kemudian atur database di file .env.
   ```bash
   cp .env.example .env
4. **Generate Key**
   ```bash
   php artisan key:generate
5. **Migrasi Database**
   ```bash
   php artisan migrate
6. **Kompilasi Asset**
   ```bash
   npm run dev
7. **Jalankan Server**
Akses di http://localhost:8000 atau sesuai konfigurasi server Anda
   ```bash
   php artisan serve.
   
---

## Cara Menggunakan CookLab
1. **Membuka Halaman Utama:**
   - Pengguna diarahkan ke daftar resep yang ditampilkan secara paginated.

2. **Menambahkan Resep Baru:**
   - Klik tombol **Tambah Resep**, isi formulir, lalu simpan.

3. **Melihat Detail Resep:**
   - Klik salah satu resep untuk melihat detailnya.

4. **Mengedit Resep:**
   - Klik tombol **Edit**, lakukan perubahan, lalu simpan.

5. **Menghapus Resep:**
   - Klik tombol **Hapus**, konfirmasi penghapusan jika diminta.

6. **Navigasi Antar Halaman:**
   - Gunakan pagination di bagian bawah halaman utama.
