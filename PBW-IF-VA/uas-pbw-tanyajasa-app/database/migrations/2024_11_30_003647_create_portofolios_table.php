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
        Schema::create('portofolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provider_id')->constrained('users')->onDelete('cascade'); // ID provider (relasi ke users)
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade'); // Relasi dengan layanan
            $table->string('title'); // Judul portofolio
            $table->text('description'); // Deskripsi portofolio
            $table->string('image_url')->nullable(); // Gambar portofolio
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portofolios');
    }
};
