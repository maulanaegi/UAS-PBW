<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal Booking</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh; margin: 0;">

<?php
// Start session
session_start();
include 'includes/db_connection.php';

// Proses pendaftaran
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];

    // Validasi input
    if (!empty($username) && !empty($email) && !empty($password) && !empty($confirm_password)) {
        if ($password == $confirm_password) {
            // Enkripsi password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Cek apakah username sudah terdaftar
            $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
            $result = $conn->query($sql);

            if ($result->num_rows == 0) {
                // Insert data ke database
                $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$hashed_password', '$role')";
                if ($conn->query($sql) === TRUE) {
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = $role;

                    // Redirect berdasarkan role
                    if ($role == 'member') {
                        header('Location: login.php');
                    } elseif ($role == 'operator') {
                        header('Location: login.php');
                    }
                    exit();
                } else {
                    $error_message = "Gagal mendaftar, coba lagi nanti.";
                }
            } else {
                $error_message = "Username atau email sudah terdaftar!";
            }
        } else {
            $error_message = "Password dan konfirmasi password tidak cocok!";
        }
    } else {
        $error_message = "Semua kolom harus diisi!";
    }
}
?>

<!-- Container with padding to create space from top and bottom -->
<div class="container p-4 shadow rounded bg-white" style="max-width: 500px; width: 100%; padding-top: 50px; padding-bottom: 50px;">
    <h2 class="text-center mb-3">Daftar Akun</h2>

    <!-- Menampilkan pesan error jika ada -->
    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <form action="register.php" method="POST">
        <div class="mb-2">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-2">
            <label for="confirm_password" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <div class="mb-2">
            <label for="role" class="form-label">Pilih Role</label>
            <select class="form-select" id="role" name="role" required>
                <option value="member">Member</option>
                <option value="operator">Operator</option>
            </select>
        </div>
        <button type="submit" name="register" class="btn btn-success w-100">Daftar</button>
    </form>

    <a href="index.php" class="btn btn-secondary btn-sm d-block mx-auto mt-3">Batal</a>

    <p class="mt-3 text-center">Sudah punya akun? <a href="login.php">Login Sekarang</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
