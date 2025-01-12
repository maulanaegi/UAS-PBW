<?php
session_start();
require 'config.php';

// Membuat token CSRF jika belum ada
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['register'])) {
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token mismatch!");
    }

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format!";
    } else {
        $query = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        try {
            $query->execute([$name, $email, $password]);
            header('Location: index.php?registered=success');
            exit();
        } catch (Exception $e) {
            $error = "Email already exists!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <form method="POST" action="">
        <h2>Register</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">Register</button>
        <p>Already have an account? <a href="index.php">Login</a></p>
    </form>
</div>
</body>
</html>
