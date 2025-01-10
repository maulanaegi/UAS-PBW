<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('crud', function (Blueprint $table) {
            $table->integer('jumlah_tiket')->unsigned(); 
            // Menambahkan kolom jumlah_tiket dengan tipe integer dan tidak negatif
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('crud', function (Blueprint $table) {
            $table->dropColumn('jumlah_tiket'); 
            // Menghapus kolom jumlah_tiket jika rollback dilakukan
        });
    }
};
