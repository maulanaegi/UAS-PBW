# Proyek Aspirasi  
  
## Anggota Kelompok
- Fadhil Ahmad Fathoni (220660121069) (Ketua)  
- Aura Rahayu Aksa Radiana (220660121094)  
- Asri Ayuni (220660121052)  
  
## Deskripsi

Proyek ini adalah aplikasi untuk mengelola aspirasi yang dikirimkan oleh pengguna. Pengguna dapat mengirimkan aspirasi yang berisi judul, nama, jenis kelamin, isi aspirasi, serta memberikan like pada setiap aspirasi yang diajukan.

## Struktur Database

### 1. Membuat Database dan Tabel

Untuk membuat database dan tabel `aspirasi`, jalankan perintah berikut di MySQL:

```sql
CREATE DATABASE db_aspirasi;
USE db_aspirasi;

CREATE TABLE aspirasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    nama VARCHAR(100) DEFAULT 'Anonim',
    jenis_kelamin ENUM('Laki-laki', 'Perempuan', 'Tidak dipilih') DEFAULT 'Tidak dipilih',
    isi_aspirasi TEXT NOT NULL,
    like_count INT DEFAULT 0,
    tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)```

##Cara Menjalankan Aplikasi  

    Pastikan XAMPP sudah terinstal di komputer Anda dan aktifkan Apache serta MySQL.  
    Masukkan Folder Proyek ini ke dalam folder htdocs pada direktori XAMPP:  
        Folder ini biasanya terletak di C:\xampp\htdocs\ (untuk Windows) atau /Applications/XAMPP/htdocs (untuk macOS).  
    Jalankan XAMPP:  
        Pastikan Apache dan MySQL sudah berjalan.  
    Buka Browser dan masukkan alamat berikut untuk mengakses aplikasi:  
        localhost/Kelompok 2 