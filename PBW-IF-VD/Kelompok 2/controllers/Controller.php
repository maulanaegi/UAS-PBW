<?php
require_once 'models/Model.php'; // Memuat model Aspirasi

class Controller {
    private $aspirasiModel;

    public function __construct() {
        // Menginisialisasi model aspirasi dengan koneksi ke database
        $this->aspirasiModel = new Aspirasi(); 
    }

    // Fungsi untuk menambah aspirasi
    public function tambahAspirasi() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $judul = trim(htmlspecialchars($_POST['judul'], ENT_QUOTES, 'UTF-8'));
            $nama = !empty($_POST['nama']) ? trim(htmlspecialchars($_POST['nama'], ENT_QUOTES, 'UTF-8')) : 'Anonim';
            $jenis_kelamin = !empty($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : 'Tidak dipilih';
            $isi_aspirasi = trim(htmlspecialchars($_POST['isi_aspirasi'], ENT_QUOTES, 'UTF-8'));

            // Validasi input
            if (empty($judul) || empty($isi_aspirasi)) {
                echo "<div class='alert alert-danger'>Judul dan isi aspirasi wajib diisi.</div>";
                return;
            }

            try {
                // Menambah aspirasi melalui model
                $this->aspirasiModel->tambahAspirasi($judul, $nama, $jenis_kelamin, $isi_aspirasi);
                $this->redirect("index.php"); // Redirect setelah berhasil
            } catch (Exception $e) {
                echo "<div class='alert alert-danger'>Terjadi kesalahan: {$e->getMessage()}</div>";
            }
        }
    }

    // Fungsi untuk memberikan like pada aspirasi
    public function likeAspirasi() {
        if (isset($_GET['like']) && !isset($_COOKIE['liked_' . $_GET['like']])) {
            $id = intval($_GET['like']); // Pastikan id adalah integer
            try {
                // Update jumlah like aspirasi
                $this->aspirasiModel->updateLike($id);
                // Set cookie untuk mencegah like ganda dalam waktu 1 hari
                setcookie('liked_' . $id, true, time() + 86400, "/");
                $this->redirect("index.php"); // Redirect setelah like
            } catch (Exception $e) {
                echo "<div class='alert alert-danger'>Terjadi kesalahan: {$e->getMessage()}</div>";
            }
        }
    }

    // Fungsi untuk menghapus aspirasi
    public function hapusAspirasi() {
        if (isset($_GET['delete'])) {
            $id = intval($_GET['delete']); // Pastikan id adalah integer
            try {
                // Menghapus aspirasi melalui model
                $this->aspirasiModel->hapusAspirasi($id);
                $this->redirect("index.php"); // Redirect setelah berhasil menghapus
            } catch (Exception $e) {
                echo "<div class='alert alert-danger'>Terjadi kesalahan: {$e->getMessage()}</div>";
            }
        }
    }

    // Fungsi untuk mengedit aspirasi
    public function editAspirasi() {
        if (isset($_GET['edit'])) {
            $id = intval($_GET['edit']); // Pastikan id adalah integer
            try {
                $row = $this->aspirasiModel->getAspirasiById($id);

                if (!$row) {
                    echo "<div class='alert alert-danger'>Data tidak ditemukan!</div>";
                    exit;
                }

                // Menampilkan halaman edit dengan data yang ada
                include 'views/edit_aspirasi.php'; 
            } catch (Exception $e) {
                echo "<div class='alert alert-danger'>Terjadi kesalahan: {$e->getMessage()}</div>";
            }
        }

        // Menangani form update data aspirasi
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            $id = intval($_POST['id']); // Pastikan id adalah integer
            $judul = trim(htmlspecialchars($_POST['judul'], ENT_QUOTES, 'UTF-8'));
            $nama = !empty($_POST['nama']) ? trim(htmlspecialchars($_POST['nama'], ENT_QUOTES, 'UTF-8')) : 'Anonim';
            $jenis_kelamin = !empty($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : 'Tidak dipilih';
            $isi_aspirasi = trim(htmlspecialchars($_POST['isi_aspirasi'], ENT_QUOTES, 'UTF-8'));

            // Validasi input
            if (empty($judul) || empty($isi_aspirasi)) {
                echo "<div class='alert alert-danger'>Judul dan isi aspirasi wajib diisi.</div>";
                return;
            }

            try {
                // Memperbarui aspirasi di database
                $updateResult = $this->aspirasiModel->updateAspirasi($id, $judul, $nama, $jenis_kelamin, $isi_aspirasi);

                if ($updateResult) {
                    $this->redirect("index.php"); // Redirect setelah berhasil update
                } else {
                    echo "<div class='alert alert-danger'>Gagal mengupdate data.</div>";
                }
            } catch (Exception $e) {
                echo "<div class='alert alert-danger'>Terjadi kesalahan: {$e->getMessage()}</div>";
            }
        }
    }

    // Fungsi untuk mengambil semua aspirasi
    public function getAspirasi() {
        try {
            return $this->aspirasiModel->getAspirasi(); // Mengambil semua data aspirasi
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Terjadi kesalahan: {$e->getMessage()}</div>";
        }
    }

    // Fungsi untuk menangani pengalihan URL
    private function redirect($url) {
        header("Location: $url");
        exit;
    }

    // Menangani request berdasarkan aksi
    public function handleRequest() {
        if (isset($_POST['submit'])) {
            $this->tambahAspirasi();
        } elseif (isset($_GET['like'])) {
            $this->likeAspirasi();
        } elseif (isset($_GET['delete'])) {
            $this->hapusAspirasi();
        } elseif (isset($_GET['edit'])) {
            $this->editAspirasi();
        }
    }
}

// Instansiasi controller
$controller = new Controller();
$controller->handleRequest();
?>
