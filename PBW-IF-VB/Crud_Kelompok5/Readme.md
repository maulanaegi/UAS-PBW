Sistem Penjualan Barang Berbasis Web

Proyek ini adalah sebuah sistem penjualan barang berbasis web yang dirancang untuk membantu toko dalam mengelola data barang, transaksi, laporan, dan pengaturan lainnya. Sistem ini memungkinkan pemantauan stok barang, pencatatan penjualan, serta pembuatan laporan dengan mudah, sehingga mengurangi kesalahan manual, mempercepat proses kerja, dan memberikan wawasan yang lebih baik untuk pengambilan keputusan bisnis.

Cara Instalasi

Persiapan Lingkungan

Pastikan Anda telah menginstal XAMPP atau server lokal lainnya yang mendukung PHP dan MySQL.

Unduh proyek ini dan ekstrak ke folder htdocs (jika menggunakan XAMPP).

Import Database

Buka phpMyAdmin melalui browser (biasanya diakses di http://localhost/phpmyadmin).

Buat database baru dengan nama sistem_penjualan.

Import file database yang disertakan dalam proyek ini (sistem_penjualan.sql).

Konfigurasi File Koneksi

Buka file config/koneksi.php.

Sesuaikan konfigurasi berikut dengan pengaturan server Anda:

$host = "localhost";
$user = "root";
$pass = "";
$db   = "sistem_penjualan";

Menjalankan Proyek

Jalankan XAMPP dan aktifkan layanan Apache serta MySQL.

Buka browser Anda dan akses proyek ini melalui URL: http://localhost/nama_folder_proyek.

Cara Penggunaan

Login

Login ke sistem menggunakan akun yang tersedia di database. Default username dan password dapat ditemukan di file SQL.

Navigasi Menu

Dashboard: Menampilkan statistik dan ringkasan data penting seperti jumlah barang, stok, dan kalender.

Data:

Menu Pembeli:

Fitur CRUD (Create, Read, Update, Delete).

Notifikasi ditampilkan saat data berhasil ditambahkan (“Data Berhasil Ditambahkan”), diperbarui (“Edit Data Berhasil”), atau dihapus secara permanen.

Menu Barang: Mengelola data barang dengan fitur serupa Menu Pembeli.

Menu Kategori: Mengorganisasi barang berdasarkan jenis atau fungsi agar lebih terstruktur.

Transaksi: Untuk mencatat atau melihat transaksi penjualan.

Laporan: Menampilkan laporan penjualan untuk keperluan analisis.

Setting: Untuk pengaturan akun pengguna dan konfigurasi aplikasi lainnya.

Logout: Keluar dari aplikasi.

Langkah-Langkah Awal

Buka Aplikasi XAMPP: Aktifkan layanan Apache dan MySQL.

Akses Proyek: Klik tombol Admin di bagian Apache, lalu ubah URL dari http://localhost/dashboard/ menjadi http://localhost/Crud_Kelompok5.

Login: Masukkan akun admin untuk mulai menggunakan aplikasi.

Struktur Menu

Dashboard

Menampilkan statistik utama seperti jumlah barang, stok, dan kalender.

Data

Pembeli: Mengelola data pembeli dengan fitur CRUD.

Barang: Mengelola data barang dengan fungsi yang sama seperti menu Pembeli.

Kategori: Mengelola kategori barang untuk pengorganisasian yang lebih baik.

Transaksi

Mencatat dan meninjau transaksi penjualan.

Laporan

Menyajikan laporan penjualan atau data lain untuk keperluan analisis.

Setting

Pengaturan aplikasi, termasuk akun pengguna.

Logout

Keluar dari aplikasi.

Anggota Kelompok 5

Ketua: Hikmawati

Muhammad Faris

Devi Cahyati

Obi Bagas

Proyek ini adalah hasil kolaborasi tim untuk menghadirkan solusi digital dalam pengelolaan penjualan barang berbasis web.

