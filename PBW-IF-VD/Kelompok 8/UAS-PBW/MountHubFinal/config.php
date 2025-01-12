<?php
try {
    // Membuat koneksi ke database dengan PDO
    $conn = new PDO("mysql:host=localhost;dbname=mout hub", "root", "");
    
    // Mengatur mode error PDO untuk melemparkan pengecualian jika terjadi kesalahan
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Menangani error jika koneksi gagal dan menampilkan pesan kesalahan
    die("Connection failed: " . $e->getMessage());
}
// Konfigurasi Google API
require_once 'vendor/autoload.php';

$googleClient = new Google_Client();
$googleClient->setClientId('936469022860-jeq780ku49u204idm4ji1lque3caksvi.apps.googleusercontent.com');
$googleClient->setClientSecret('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');
$googleClient->setRedirectUri('http://localhost/MountHubFinal/index.php');
$googleClient->addScope('email');
$googleClient->addScope('profile');
?>
