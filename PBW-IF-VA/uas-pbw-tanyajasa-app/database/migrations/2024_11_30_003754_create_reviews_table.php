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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // ID user yang memberi review
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade'); // ID layanan yang diulas
            $table->integer('rating')->unsigned()->check('rating >= 1 AND rating <= 5'); // Rating (1-5)
            $table->text('comment')->nullable(); // Komentar ulasan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
