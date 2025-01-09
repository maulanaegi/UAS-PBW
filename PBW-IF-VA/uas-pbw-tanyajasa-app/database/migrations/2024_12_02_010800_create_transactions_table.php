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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique()->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // User yang memesan
            $table->foreignId('provider_id')->constrained('users')->onDelete('cascade'); // Penyedia jasa
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade'); // Jasa yang dipesan
            $table->text('custom_details')->nullable(); // Kebutuhan kustom
            $table->string('whatsapp_number')->nullable(); // Nomor WhatsApp
            $table->string('email')->nullable(); // Email
            $table->string('location')->nullable(); // Lokasi (untuk jasa langsung)
            $table->decimal('budget', 10, 2)->nullable(); // Budget (untuk jasa langsung)
            $table->date('start_date')->nullable(); // Tanggal mulai (untuk jasa langsung)
            $table->date('deadline')->nullable(); // Tenggat waktu (untuk jasa remote)
            $table->enum('status', ['pending', 'in_progress', 'completed', 'canceled'])->default('pending'); // Status transaksi
            $table->text('resolution_note')->nullable();
            $table->decimal('total_price', 10, 2);
            $table->enum('payment_status', ['pending', 'paid'])->default('pending');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
