UAS Project: Sistem Pengelolaan Data Pengunjung Wisata
Deskripsi Proyek

Proyek ini adalah aplikasi berbasis web untuk mengelola data pengunjung wisata. Aplikasi ini mendukung operasi CRUD (Create, Read, Update, Delete) melalui antarmuka web dan API RESTful. Dibangun menggunakan Laravel, aplikasi ini bertujuan untuk memberikan sistem pengelolaan data yang sederhana dan efektif.
Fitur Utama

    Fungsionalitas CRUD:
        Create: Tambah data pengunjung baru.
        Read: Lihat semua data pengunjung.
        Update: Edit data pengunjung.
        Delete: Hapus data pengunjung.

    Validasi Data:
        Memastikan input pengguna valid (email, tanggal kunjungan, dll.).

    Antarmuka Responsif:
        Menggunakan Blade templating untuk tampilan yang sederhana dan fungsional.

    API RESTful:
        Endpoint CRUD tersedia untuk integrasi dengan alat atau aplikasi lain.

    Teknologi yang Digunakan:
        Backend: Laravel 11 dengan struktur MVC.
        Frontend: Blade templating.

Instalasi Proyek

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal Anda.
1. Clone Repository

Clone repositori ini dari GitHub ke komputer Anda:

git clone https://github.com/220660121075/UAS.git
cd UAS

2. Instal Dependensi

Pastikan Composer telah diinstal. Jalankan:

composer install

3. Konfigurasi Database

    Salin file .env.example menjadi .env:

cp .env.example .env

Atur konfigurasi database di .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=uas_project
DB_USERNAME=root
DB_PASSWORD=

Migrasikan tabel ke database:

    php artisan migrate

4. Jalankan Server Laravel

Mulai server Laravel:

php artisan serve

Akses aplikasi di browser melalui:

http://127.0.0.1:8000/visitors

API Endpoint

Aplikasi menyediakan API RESTful yang dapat diakses melalui URL http://127.0.0.1:8000/api/visitors.
Endpoint CRUD

    GET /api/visitors: Menampilkan semua data pengunjung.
    GET /api/visitors/{id}: Menampilkan detail pengunjung berdasarkan ID.
    POST /api/visitors: Menambahkan data pengunjung baru.
        Body (JSON):

    {
        "name": "Johnny Doe",
        "email": "johny.doe@example.com",
        "destination": "Bali",
        "visit_date": "2025-01-20"
    }

PUT /api/visitors/{id}: Memperbarui data pengunjung berdasarkan ID.

    Body (JSON):

        {
            "name": "Updated Name",
            "email": "updated.email@example.com",
            "destination": "Updated Destination",
            "visit_date": "2025-01-25"
        }

    DELETE /api/visitors/{id}: Menghapus data pengunjung berdasarkan ID.

Pengujian API

Gunakan Postman atau alat serupa untuk menguji endpoint API.
Anggota Tim
Nama	NIM	Kelas
Anggara Gustika	220660121075	IF_VD
Abdah Syakiroh	220660121144	IF_VD
Anjelina Mentari R	220660121024	IF_VD
Rais Mughni Salam	220660121010	IF_VD
Deployment

Lisensi

Proyek ini dibuat untuk memenuhi tugas UAS dan hanya digunakan untuk keperluan akademis.
