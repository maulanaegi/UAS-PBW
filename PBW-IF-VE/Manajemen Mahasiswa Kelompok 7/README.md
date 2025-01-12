# Panduan Instalasi dan Konfigurasi Proyek UAS

Dokumen ini memberikan panduan langkah demi langkah untuk menginstal, mengkonfigurasi, dan menjalankan proyek UAS.

## Prasyarat

Sebelum memulai, pastikan perangkat Anda memenuhi prasyarat berikut:

*   **PHP:** Terpasang versi 8.2 atau lebih tinggi. Anda dapat memeriksa versi PHP dengan menjalankan perintah `php -v` di terminal.
*   **Composer:** Pastikan composer telah terisntall untuk menginstall dependecies yang dibutuhkan
*   **MySQL:** Terpasang versi 8 atau lebih tinggi.
*   **Database MySQL:** Sebuah database dengan nama `mahasiswa` telah dibuat di MySQL. Anda dapat membuat database ini menggunakan aplikasi seperti phpMyAdmin atau melalui command line MySQL. Contoh perintah SQL untuk membuat database:

    ```sql
    CREATE DATABASE mahasiswa;
    ```

*   **Visual Studio Code (VS Code):** Terpasang dan siap digunakan.

## Langkah-Langkah Instalasi dan Konfigurasi

Ikuti langkah-langkah berikut untuk menginstal dan mengkonfigurasi proyek:

1.  **Buka Workspace di VS Code:**

    *   Buka aplikasi Visual Studio Code.
    *   Klik "File" pada navbar.
    *   Klik "Open Folder".
    *   Arahkan ke folder proyek UAS dan pilih folder tersebut.

2.  **Konfigurasi Database (.env):**

    *   Buka file `.env` yang berada di root folder proyek.
    *   Sesuaikan konfigurasi database dengan pengaturan database lokal Anda. Berikut contoh konfigurasi `.env`:

        ```
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1 // atau localhost
        DB_PORT=3306 // Port default MySQL
        DB_DATABASE=mahasiswa // Nama database yang telah dibuat
        DB_USERNAME=your_mysql_username // Username MySQL Anda
        DB_PASSWORD=your_mysql_password // Password MySQL Anda
        ```

        Ganti `your_mysql_username` dan `your_mysql_password` dengan kredensial MySQL Anda yang sebenarnya.

3. **Menginstall dependecies:**

    *   Buka terminal di Visual Studio Code (View > Terminal).
    *   Jalankan perintah berikut:

        ```bash
        composer install
        ```

4.  **Generate Application Key:**

    *   Setelah menginstall dependencies
    *   Jalankan perintah berikut:

        ```bash
        php artisan key:generate
        ```

        Perintah ini akan menghasilkan application key yang dibutuhkan oleh framework.

5.  **Migrasi Database:**

    *   Di terminal yang sama, jalankan perintah berikut:

        ```bash
        php artisan migrate
        ```

        Perintah ini akan menjalankan migrasi database untuk membuat tabel-tabel yang dibutuhkan.

6.  **Jalankan Aplikasi:**

    *   Di terminal yang sama, jalankan perintah berikut:

        ```bash
        php artisan serve
        ```

        Perintah ini akan menjalankan server pengembangan. Buka browser Anda dan akses URL yang ditampilkan di terminal (biasanya `http://127.0.0.1:8000`).

## Troubleshooting

Jika Anda mengalami masalah, pastikan:

*   Kredensial database di file `.env` sudah benar.
*   Database `mahasiswa` sudah dibuat.
*   Versi PHP dan MySQL sesuai dengan persyaratan.
*   Semua perintah dijalankan di dalam direktori proyek yang benar.

Jika masalah berlanjut, konsultasikan dokumentasi framework yang digunakan atau hubungi tim pengembang.
