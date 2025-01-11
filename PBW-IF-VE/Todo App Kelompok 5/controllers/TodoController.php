<?php
// controllers/TodoController.php

// Memanggil file TodoModel.php untuk menggunakan class TodoModel
require_once 'models/TodoModel.php';

/**
 * Kelas yang bertanggung jawab untuk menangani permintaan terkait TodoItems
 */
class TodoController
{
    /**
     * Instans dari TodoModel
     * @var TodoModel
     */
    private $model;

    /**
     * Konstruktor untuk kelas
     */
    public function __construct()
    {
        $this->model = new TodoModel();
    }

    /**
     * Mengembalikan semua todo
     * @return array Sebuah array dari semua todo
     */
    public function index()
    {
        return $this->model->getAllTodos();
    }

    /**
     * Membuat todo baru
     * @param string $task Teks dari tugas
     * @return void
     */
    public function add($task)
    {
        var_dump($task);
        // Tambahkan tugas baru menggunakan model
        $this->model->createTodo($task);

        // Redirect dengan parameter 'added=true' setelah menambahkan tugas
        header("Location: index.php?added=true");
        exit();
    }

    /**
     * Menandai todo sebagai selesai
     * @param int $id ID dari todo yang akan ditandai sebagai selesai
     * @return void
     */
    public function markAsCompleted($id)
    {
        $this->model->updateTodoStatus($id, 1);

        // Redirect ke halaman utama tanpa parameter tambahan
        header("Location: index.php?status=completed");
        exit();
    }

    /**
     * Menghapus todo
     * @param int $id ID dari todo yang akan dihapus
     * @return void
     */
    public function delete($id)
    {
        $this->model->deleteTodo($id);

        // Redirect ke halaman utama tanpa parameter tambahan
        header("Location: index.php?status=all");
        exit();
    }
}
