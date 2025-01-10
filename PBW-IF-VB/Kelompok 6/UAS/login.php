<?php
// Memulai sesi
session_start();

// Mengaktifkan error reporting untuk debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Koneksi ke database
include('includes/db_connection.php');

// Pastikan koneksi berhasil
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Proses login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa apakah username valid
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("Query gagal: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Pengguna ditemukan
        $user = $result->fetch_assoc();
        
        // Memeriksa apakah password cocok
        if (password_verify($password, $user['password'])) {
            // Password benar, simpan session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];  // Menyimpan peran pengguna (admin, operator, member)

            // Redirect berdasarkan role
            if ($_SESSION['role'] == 'admin') {
                header("Location: admin/dashboard.php");
                exit();
            } elseif ($_SESSION['role'] == 'operator') {
                header("Location: index.php");
                exit();
            } else {
                header("Location: index.php");
                exit();
            }
        } else {
            // Password salah
            echo "<script>alert('Username atau password salah');</script>";
        }
    } else {
        // Username tidak ditemukan
        echo "<script>alert('Username atau password salah');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Futsal Booking</title>
    
    <!-- Link ke CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh; margin: 0;">
    <div class="login-container shadow p-5 rounded" style="background-color: rgb(68, 68, 68); color: white; width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Login</h2>

        <!-- Menampilkan pesan error jika ada -->
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $error_message ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <div class="mb-3">
                <label for="username" class="form-label" style="color: white;">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" style="color: white;">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <!-- Button Batal untuk kembali ke halaman utama -->
        <a href="index.php" class="btn btn-secondary w-100 mt-3">Batal</a>
    </div>

    <!-- Script untuk Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>


