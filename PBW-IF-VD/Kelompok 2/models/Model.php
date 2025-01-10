<?php
include_once 'config/Config.php';

class Aspirasi {
    private $conn;

    public function __construct() {
        global $conn;
        if (!$conn) {
            throw new Exception("Koneksi database tidak tersedia.");
        }
        $this->conn = $conn; // Menyambungkan dengan koneksi database
    }

    // Menambah aspirasi baru
    public function tambahAspirasi($judul, $nama, $jenis_kelamin, $isi_aspirasi) {
        $sql = "INSERT INTO aspirasi (judul, nama, jenis_kelamin, isi_aspirasi) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $judul, $nama, $jenis_kelamin, $isi_aspirasi);

        if (!$stmt->execute()) {
            throw new Exception("Gagal menambah aspirasi: " . $stmt->error);
        }
        return true;
    }

    // Menambah jumlah like pada aspirasi
    public function updateLike($id) {
        $sql = "UPDATE aspirasi SET like_count = like_count + 1 WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            throw new Exception("Gagal mengupdate like: " . $stmt->error);
        }
        return true;
    }

    // Menghapus aspirasi berdasarkan ID
    public function hapusAspirasi($id) {
        $sql = "DELETE FROM aspirasi WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            throw new Exception("Gagal menghapus aspirasi: " . $stmt->error);
        }
        return true;
    }

    // Mengambil aspirasi berdasarkan ID
    public function getAspirasiById($id) {
        $sql = "SELECT * FROM aspirasi WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            throw new Exception("Data tidak ditemukan.");
        }

        return $result->fetch_assoc();
    }

    // Mengupdate data aspirasi
    public function updateAspirasi($id, $judul, $nama, $jenis_kelamin, $isi_aspirasi) {
        $sql = "UPDATE aspirasi SET judul = ?, nama = ?, jenis_kelamin = ?, isi_aspirasi = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssi", $judul, $nama, $jenis_kelamin, $isi_aspirasi, $id);

        if (!$stmt->execute()) {
            throw new Exception("Gagal mengupdate aspirasi: " . $stmt->error);
        }
        return true;
    }

    // Mengambil semua data aspirasi, diurutkan berdasarkan jumlah like
    public function getAspirasi() {
        $sql = "SELECT * FROM aspirasi ORDER BY like_count DESC";
        $result = $this->conn->query($sql);

        if (!$result) {
            throw new Exception("Gagal mengambil data aspirasi.");
        }

        return $result;
    }
}
?>
