<?php

class Database {
private $host = "localhost";
private $db_name = "todolist_db";
private $username = "admin_toto";
private $password = "SUMEDANG";

public function getConnection() {
try {
    // Membuat koneksi PDO
    $conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
    
    // Mengatur mode error PDO ke exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $conn;
} catch(PDOException $e) {
    echo "Koneksi gagal: " . $e->
    getMessage();
}
}
}
?>