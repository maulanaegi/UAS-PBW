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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provider_id')->constrained('users')->onDelete('cascade'); // ID provider (relasi ke users)
            $table->string('name'); // Nama layanan
            $table->string('slug')->unique();
            $table->text('description'); // Deskripsi layanan
            $table->enum('service_type', ['direct', 'remote'])->default('remote'); // Tipe jasa
            $table->decimal('price', 10, 2); // Harga layanan
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // ID kategori (relasi ke categories)
            $table->string('image_url')->nullable(); // Gambar layanan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
