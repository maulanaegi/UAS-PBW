<?php
session_start();
require 'config.php'; // Koneksi ke database

// Jika token tidak ada, redirect ke halaman login
if (!isset($_GET['token'])) {
    header('Location: index.php');
    exit();
}

$token = $_GET['token'];

// Cek apakah token valid (tanpa memeriksa waktu kadaluarsa)
$query = $conn->prepare("SELECT * FROM password_resets WHERE token = :token");
$query->bindParam(':token', $token);
$query->execute();
$resetRequest = $query->fetch(PDO::FETCH_ASSOC);

if (!$resetRequest) {
    // Token tidak valid
    echo "Token reset password tidak valid.";
    exit();
}

if (isset($_POST['reset_password'])) {
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validasi password
    if ($newPassword !== $confirmPassword) {
        $error = "Password tidak cocok.";
    } else {
        // Hash password baru
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update password pengguna di database
        $updateQuery = $conn->prepare("UPDATE users SET password = :password WHERE email = :email");
        $updateQuery->bindParam(':password', $hashedPassword);
        $updateQuery->bindParam(':email', $resetRequest['email']);
        $updateQuery->execute();

        // Hapus request reset password dari database
        $deleteQuery = $conn->prepare("DELETE FROM password_resets WHERE token = :token");
        $deleteQuery->bindParam(':token', $token);
        $deleteQuery->execute();

        // Arahkan pengguna ke halaman login setelah berhasil reset password
        header('Location: index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST" action="">
            <input type="password" name="new_password" placeholder="New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit" name="reset_password">Reset Password</button>
        </form>
    </div>
</body>
</html>
