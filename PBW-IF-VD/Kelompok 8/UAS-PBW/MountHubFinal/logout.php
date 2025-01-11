<?php
session_start();

session_unset();  
session_destroy(); 

// Hapus data sesi lokal
if (isset($_SESSION['email'])) {
    unset($_SESSION['email']);
    unset($_SESSION['name']);
    session_destroy();
}

// Pastikan tidak ada output sebelum header
ob_start();

// URL Logout Google
$google_logout_url = 'https://accounts.google.com/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost/MountHubFinal/index.php';

// Redirect ke Google Logout
header("Location: $google_logout_url");
ob_end_flush();
exit();
?>
