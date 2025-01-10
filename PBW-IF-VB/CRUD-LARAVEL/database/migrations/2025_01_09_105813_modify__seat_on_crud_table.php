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
            // Update invalid data before changing the column type
            DB::table('crud')
                ->whereNotIn('Seat', ['VIP A RP 3000000', 'VIP B RP 2500000'])
                ->update(['Seat' => 'VIP A RP 3000000']); // Set default value for invalid data
    
            // Modify column to ENUM
            $table->enum('Seat', ['VIP A RP 3000000', 'VIP B RP 2500000'])->change();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('crud', function (Blueprint $table) {
            $table->string('Seat')->change(); // Balikkan ke tipe data sebelumnya (misalnya, string)
        });
    }
};
