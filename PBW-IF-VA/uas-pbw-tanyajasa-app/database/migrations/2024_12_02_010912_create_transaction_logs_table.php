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
        Schema::create('transaction_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained('transactions')->onDelete('cascade'); // ID transaksi terkait
            $table->string('action'); // Aksi yang dilakukan (e.g., created, updated, status_changed)
            $table->text('details')->nullable(); // Informasi tambahan
            $table->foreignId('performed_by')->constrained('users')->onDelete('cascade'); // User yang melakukan aksi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_logs');
    }
};
