<?php
session_start();
require 'config.php'; // Koneksi ke database
require 'vendor/autoload.php'; // Google API Client Library

// Konfigurasi Google API
$client = new Google_Client();
$client->setClientId('936469022860-jeq780ku49u204idm4ji1lque3caksvi.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/MountHubFinal/index.php');
$client->addScope('email');
$client->addScope('profile');

// Proses login pengguna lokal
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Periksa pengguna di database
    $query = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Simpan data pengguna ke sesi
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role'] // Menyimpan role pengguna
        ];

        // Regenerate session ID for security
        session_regenerate_id(true);

        // Arahkan pengguna berdasarkan role
        if ($user['role'] == 'admin') {
            header('Location: products.php'); // Redirect ke halaman admin
        } else {
            header('Location: home.php'); // Redirect ke halaman utama untuk user
        }
        exit();
    } else {
        $error = "Invalid email or password! <a href='#forgotPassword' id='forgotPasswordLink'>Forgot Password?</a>";
        $showRegisterLink = false; // Menyembunyikan link register jika ada error
    }
}

// Proses Forgot Password (langsung ke halaman reset password)
if (isset($_POST['forgot_password'])) {
    $email = $_POST['email'];

    // Cek apakah email ada di database
    $query = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Generate token reset password
        $token = bin2hex(random_bytes(50)); // Token unik
        $expiry = date("Y-m-d H:i:s", strtotime('+1 hour')); // Token berlaku selama 1 jam

        // Simpan token dan expiry ke tabel password_resets
        $insertQuery = $conn->prepare("INSERT INTO password_resets (email, token, expiry) VALUES (?, ?, ?)");
        $insertQuery->execute([$email, $token, $expiry]);

        // Redirect langsung ke halaman reset-password.php dengan token
        header('Location: reset-password.php?token=' . $token);
        exit();
    } else {
        $error = "Email tidak ditemukan.";
    }
}

// Proses login Google
if (isset($_GET['code'])) {
    try {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        if (isset($token['error'])) {
            echo "Error: " . $token['error_description'];
            exit();
        }
        $client->setAccessToken($token);

        // Ambil data profil Google
        $google_service = new Google_Service_Oauth2($client);
        $google_user_info = $google_service->userinfo->get();

        // Simpan pengguna Google di database
        $query = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $query->bindParam(':email', $google_user_info['email']);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            // Simpan data pengguna Google ke database
            $insertQuery = $conn->prepare("INSERT INTO users (name, email, oauth_provider) VALUES (?, ?, 'google')");
            $insertQuery->execute([$google_user_info['name'], $google_user_info['email']]);
            $user_id = $conn->lastInsertId(); // Dapatkan ID dari database lokal
        } else {
            $user_id = $user['id']; // Ambil ID dari database lokal jika sudah ada
        }

        // Simpan ID pengguna lokal ke sesi
        $_SESSION['user'] = [
            'id' => $user_id, // Ini adalah ID dari database lokal
            'name' => $google_user_info['name'],
            'email' => $google_user_info['email'],
            'role' => $user['role'] // Menyimpan role pengguna
        ];

        // Regenerate session ID for security
        session_regenerate_id(true);

        // Arahkan ke halaman utama setelah login
        if ($user['role'] == 'admin') {
            header('Location: admin_dashboard.php'); // Redirect ke halaman admin
        } else {
            header('Location: home.php'); // Redirect ke halaman utama untuk user
        }
        exit();
    } catch (Exception $e) {
        echo "Error during Google login: " . $e->getMessage();
    }
}

// Fungsi Logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();

    // Logout dari Google
    header('Location: https://accounts.google.com/Logout');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <!-- Form Login untuk pengguna lokal -->
        <form method="POST" action="">
            <h2>Login</h2>
            <?php if (isset($error) && !isset($_POST['forgot_password'])) echo "<p class='error'>$error</p>"; ?>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
            
            <!-- Menyembunyikan link "Don't have an account?" jika ada error -->
            <?php if (!isset($showRegisterLink) || $showRegisterLink): ?>
                <p>Don't have an account? <a href="register.php">Register</a></p>
            <?php endif; ?>
        </form>

        <!-- Form Forgot Password -->
        <div id="forgotPassword" style="display: none;">
            <form method="POST" action="">
                <h2>Masukan Email</h2>
                <?php if (isset($error) && isset($_POST['forgot_password'])) echo "<p class='error'>$error</p>"; ?>
                <input type="email" name="email" placeholder="Enter Email" required>
                <button type="submit" name="forgot_password">Reset Password</button>
                <p><a href="index.php">Back to Login</a></p>
            </form>
        </div>

        <!-- Google Login Button -->
        <a href="<?php echo $client->createAuthUrl(); ?>" class="google-btn" id="googleLoginBtn">
            <img src="google.png" alt="Google Logo"> Login with Google
        </a>
    </div>

    <script>
        // Script untuk menampilkan form Forgot Password saat link diklik
        document.getElementById('forgotPasswordLink')?.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector('form').style.display = 'none'; // Sembunyikan form login
            document.getElementById('forgotPassword').style.display = 'block'; // Tampilkan form forgot password
            document.getElementById('googleLoginBtn').style.display = 'none'; // Sembunyikan tombol Google Login
        });
    </script>
</body>
</html>
