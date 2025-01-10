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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('whatsapp_number')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['user', 'provider', 'admin'])->default('user');
            $table->text('profile_description')->nullable();
            $table->string('profile_picture')->nullable();
            $table->enum('status', ['active', 'suspended', 'deleted'])->default('active');
            $table->json('notifications')->nullable();
            $table->string('location_city')->nullable(); // Kota pengguna
            $table->string('location_state')->nullable(); // Provinsi pengguna
            $table->decimal('location_lat', 10, 8)->nullable(); // Latitude
            $table->decimal('location_lng', 11, 8)->nullable(); // Longitude
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
