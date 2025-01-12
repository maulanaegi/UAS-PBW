<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>!</h2>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>
</body>
</html>
