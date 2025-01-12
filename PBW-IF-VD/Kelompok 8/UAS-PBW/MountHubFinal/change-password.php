<!-- change-password.php -->
<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

$user = $_SESSION['user'];

if (isset($_POST['update_password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    // Periksa password lama
    $query = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $query->execute([$user['id']]);
    $user_data = $query->fetch(PDO::FETCH_ASSOC);

    if (password_verify($old_password, $user_data['password'])) {
        // Update password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $updateQuery = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $updateQuery->execute([$hashed_password, $user['id']]);

        if ($updateQuery) {
            $message = "Password updated successfully!";
        } else {
            $error = "Failed to update password!";
        }
    } else {
        $error = "Old password is incorrect!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Change Password</h2>

        <!-- Pesan jika ada error atau sukses -->
        <?php if (isset($message)) echo "<p class='success'>$message</p>"; ?>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

        <form method="POST" action="">
            <input type="password" name="old_password" placeholder="Old Password" required>
            <input type="password" name="new_password" placeholder="New Password" required>
            <button type="submit" name="update_password">Change Password</button>
        </form>
    </div>
</body>
</html>
