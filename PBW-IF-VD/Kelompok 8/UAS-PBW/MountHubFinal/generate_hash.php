<?php
// Gantilah dengan password asli untuk admin
$password = "adminpassword";

// Enkripsi password menggunakan password_hash()
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Menampilkan hasil hash password
echo "Hash Password: " . $hashed_password;
?>
