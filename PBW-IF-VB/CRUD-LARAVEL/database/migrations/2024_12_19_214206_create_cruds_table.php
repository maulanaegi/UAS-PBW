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
        Schema::create('crud', function (Blueprint $table) {
       
            $table->string('Foto Identitas')->nullable();
            $table->string('Alamat Email');
            $table->bigInteger('no_HP');  // Pastikan tidak ada titik di nama kolom
            $table->string('Nama Lengkap');
            $table->enum('Seat', ['VIP A', 'VIP B']);
            $table->timestamps();  // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crud');
    }
};
