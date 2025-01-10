<?php
include('lib/koneksi.php');

$id = $_GET['id'];

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $hapus = $conn->prepare("DELETE FROM tbl_users WHERE id_user = :id");
    $deleteuser = array(':id' => $id);
    $hapus->execute($deleteuser);

    // Success Message
    echo "
    <div class='message success'>
        <img src='img/icons/ceklist.png' width='60'>
        <p><b>User berhasil dihapus.</b></p>
        <a href='?page=user' class='btn-back'>Kembali ke Daftar User</a>
    </div>";
} catch (PDOexception $e) {
    // Error Message
    echo "
    <div class='message error'>
        <img src='img/icons/error.png' width='60'>
        <p><b>Gagal menghapus user. Coba lagi nanti.</b></p>
        <a href='?page=user' class='btn-back'>Kembali</a>
    </div>";
}
?>

<style>
/* Message Styles */
.message {
    text-align: center;
    padding: 20px;
    border-radius: 8px;
    max-width: 400px;
    margin: 50px auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.message img {
    display: block;
    margin: 0 auto 20px;
}

.message p {
    font-size: 1.2rem;
    margin-bottom: 20px;
}

.message .btn-back {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-size: 1rem;
    transition: background-color 0.3s;
}

.message .btn-back:hover {
    background-color: #0056b3;
}

/* Success Message */
.success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

/* Error Message */
.error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}
</style>