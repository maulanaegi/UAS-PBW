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
            $table->enum('Status_Pesanan', ['Belum Dikonfirmasi', 'Dikonfirmasi'])->default('Belum Dikonfirmasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('crud', function (Blueprint $table) {
            $table->dropColumn('Status_Pesanan'); // Drop column if rollback
        });
    }
};
