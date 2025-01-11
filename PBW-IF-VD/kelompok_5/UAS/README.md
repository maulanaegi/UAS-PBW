# Web Digimart

## Fungsionalitas CRUD

Proyek ini mencakup implementasi penuh dari semua operasi CRUD (Create, Read, Update, Delete). Setiap operasi telah dirancang dengan baik untuk memastikan keandalan dan efisiensi dalam pengelolaan data.

### Detail Implementasi CRUD

-   **Create**: Menambahkan data baru dengan validasi yang ketat untuk memastikan data yang dimasukkan sesuai dengan format yang diinginkan.
-   **Read**: Menampilkan data secara dinamis dan responsif.
-   **Update**: Memperbarui data yang ada dengan antarmuka yang mudah dipahami.
-   **Delete**: Menghapus data dengan konfirmasi untuk mencegah penghapusan yang tidak disengaja.

## Desain Antarmuka

Antarmuka pengguna dirancang untuk intuitif dan responsif. Kami menggunakan teknologi modern untuk memastikan pengalaman pengguna yang optimal, baik pada perangkat desktop maupun perangkat seluler.

### Fitur Antarmuka

-   **Navigasi Mudah**: Menu yang jelas dan terstruktur.
-   **Respon Cepat**: Komponen UI dirancang agar ringan dan cepat.
-   **Desain Responsif**: Tampilan menyesuaikan dengan berbagai ukuran layar.

## Validasi Data

Proyek ini menekankan pentingnya validasi data untuk mencegah kesalahan dan memastikan integritas data. Validasi dilakukan di sisi klien dan server:

-   **Validasi Klien**: Menggunakan JavaScript untuk validasi awal input pengguna.
-   **Validasi Server**: Melalui logika di backend untuk memastikan keamanan dan akurasi data.

## Penggunaan Teknologi

Proyek ini menggunakan berbagai teknologi modern sesuai dengan kebutuhan. Berikut adalah teknologi yang digunakan:

### Fullstack dengan Laravel

-   Framework Laravel digunakan untuk membangun backend yang kuat dan API RESTful.
-   Mendukung CRUD berbasis RESTful dengan dokumentasi API.

### PHP Native

-   Implementasi PHP native dilakukan dengan pendekatan Model-View-Controller (MVC) untuk struktur kode yang rapi dan terorganisir.
-   Memanfaatkan kemampuan dasar PHP untuk mendukung integrasi dengan database dan logika bisnis.

## Cara Menjalankan Kode

Berikut adalah langkah-langkah untuk menjalankan proyek ini:

1. **Clone Repository**
   Clone repository proyek dari sumber yang telah disediakan:

    ```bash
    git clone <repository-url>
    ```

2. **Konfigurasi Lingkungan**

    - Untuk Laravel, salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database.
    - Jalankan perintah berikut untuk menginstal dependensi:
        ```bash
        composer install
        npm install
        ```
    - Jalankan migrasi database:
        ```bash
        php artisan migrate
        ```

3. **Jalankan Server Lokal**

    - Untuk Laravel:
        ```bash
        php artisan serve
        ```
    - Untuk PHP Native, tempatkan folder proyek di dalam direktori root server lokal Anda (misalnya `htdocs` jika menggunakan XAMPP).

4. **Akses Aplikasi**
   Buka browser Anda dan akses:
    - Laravel: `http://127.0.0.1:8000`
    - PHP Native: `http://localhost/<nama-folder-proyek>`

## Anggota Tim

Proyek ini dikembangkan oleh tim yang terdiri dari lima anggota:

1. **M. Arifin Ilham** (220660121156)
2. **Khairil Sidik** (220660121143)
3. **Fauzi Faturohman** (220660121151)
4. **Hary Zulkifli** (220660121081)
