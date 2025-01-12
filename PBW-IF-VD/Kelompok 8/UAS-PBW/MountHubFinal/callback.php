<?php
session_start();
require 'config.php'; // Koneksi ke database
require 'vendor/autoload.php'; // Google API PHP Client Library

$client = new Google_Client();
$client->setClientId('936469022860-jeq780ku49u204idm4ji1lque3caksvi.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/MountHubFinal/index.php');
$client->addScope('email');
$client->addScope('profile');

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    $google_service = new Google_Service_Oauth2($client);
    $data = $google_service->userinfo->get();

    $email = $data['email'];
    $name = $data['name'];
    $google_id = $data['id'];

    // Periksa apakah pengguna sudah ada di database
    $query = $conn->prepare("SELECT * FROM users WHERE email = ? AND oauth_provider = 'google'");
    $query->execute([$email]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Pengguna sudah ada, simpan ke sesi
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email']
        ];
    } else {
        // Pengguna baru, simpan ke database
        $query = $conn->prepare("INSERT INTO users (name, email, oauth_provider, oauth_uid) VALUES (?, ?, 'google', ?)");
        $query->execute([$name, $email, $google_id]);
        $_SESSION['user'] = [
            'id' => $conn->lastInsertId(),
            'name' => $name,
            'email' => $email
        ];
    }

    // Redirect ke halaman utama
    header('Location: index.php');
    exit();
}
