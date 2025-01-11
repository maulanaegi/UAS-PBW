<?php
// index.php

/**
 * File ini adalah titik awal dari aplikasi.
 *
 * Ia menggunakan kelas TodoController untuk menangani berbagai aksi
 * dan kemudian merender tampilan dengan daftar tugas.
 */

// Memanggil file TodoController.php untuk menggunakan class TodoController
require_once 'controllers/TodoController.php';

$controller = new TodoController();
$status = !isset($_GET["status"]) ? $_GET["status"] = 'all' : $_GET["status"];
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Menangani parameter aksi
switch ($action) {
    case 'add':
        // Dapatkan tugas dari request
        $task = isset($_POST['task']) ? $_POST["task"] : '';

        // Tambahkan tugas ke daftar
        $controller->add($task);
        break;
    case 'complete':
        // Dapatkan id dari request
        $id = isset($_GET['id']) ? $_GET["id"] : '';

        // Tandai tugas sebagai selesai
        $controller->markAsCompleted($id);
        break;
    case 'delete':
        // Dapatkan id dari request
        $id = isset($_GET['id']) ? $_GET["id"] : '';

        // Hapus tugas dari daftar
        $controller->delete($id);
        break;
}

// Dapatkan daftar tugas
$todos = $controller->index();

// Merender tampilan
require 'views/listTodos.php';
