<?php
// Aktifkan error reporting (hanya untuk debugging)
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'config.php'; // File koneksi database

if (isset($_POST['register'])) {
    $user = strip_tags($_POST['user']);
    $password = strip_tags($_POST['password']);

    try {
        // Periksa apakah username sudah ada
        $checkSql = "SELECT COUNT(*) FROM login WHERE user = ?";
        $checkStmt = $config->prepare($checkSql);
        $checkStmt->execute([$user]);
        $exists = $checkStmt->fetchColumn();

        if ($exists > 0) {
            echo '<script>alert("Username sudah digunakan!"); history.go(-1);</script>';
        } else {
            // Masukkan data baru
            $sql = "INSERT INTO login (user, pass) VALUES (?, MD5(?))";
            $stmt = $config->prepare($sql);
            $stmt->execute([$user, $password]);

            if ($stmt->rowCount() > 0) {
                echo '<script>alert("Registrasi berhasil! Silakan login."); window.location="login.php";</script>';
            } else {
                echo '<script>alert("Registrasi gagal! Silakan coba lagi."); history.go(-1);</script>';
            }
        }
    } catch (PDOException $e) {
        echo "Kesalahan: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <style>
        body {
            background-image: url('Baground/Leptop1.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }
        .form-register {
            background:(255, 255, 255, 0.5); /* Transparansi form */
            padding: 20px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .form-register h3 {
            margin-bottom: 20px;
            font-size: 30px;
            color: #000; /* Warna teks hitam */
            font-weight: 900; /* Tulisan tebal */
        }
        .form-control {
            background: rgba(0, 0, 0, 0); /* Transparansi input */
            border: none;
            color: #000;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .form-control::placeholder {
            color: rgba(0, 0, 0, 0); /* Transparansi placeholder */
        }
        .btn {
            background: rgba(0, 0, 0, 0); /* Transparansi maksimal */
            border: 1px solid rgba(0, 0, 0, 0);
            color: #000; /* Warna teks hitam */
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 900; /* Tulisan tebal */
            cursor: pointer;
            transition: 0.3s ease;
        }
        .btn:hover {
            background: rgba(0, 0, 0, 0);
        }
    </style>
</head>
<body>
    <div class="form-register">
        <form method="POST">
            <h3>Register</h3>
            <div class="form-group">
                <input type="text" class="form-control" name="user" placeholder="Masukkan Username" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
            </div>
            <button type="submit" name="register" class="btn btn-block">REGISTER</button>
            <a href="login.php" class="btn btn-block">KEMBALI KE LOGIN</a>
        </form>
    </div>
</body>
</html>
