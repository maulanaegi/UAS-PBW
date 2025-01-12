<?php
require 'config.php';

try {
    // Query sederhana untuk menguji koneksi
    $stmt = $conn->query("SELECT 'Koneksi Berhasil!' AS result");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $result['result'];
} catch (PDOException $e) {
    echo "Koneksi Gagal: " . $e->getMessage();
}
?>
