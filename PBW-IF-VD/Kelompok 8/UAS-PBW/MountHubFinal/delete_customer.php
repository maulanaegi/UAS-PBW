<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header('Location: index.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM customers WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: manage_customers.php');
        exit();
    } else {
        echo "Failed to delete customer.";
    }
}
