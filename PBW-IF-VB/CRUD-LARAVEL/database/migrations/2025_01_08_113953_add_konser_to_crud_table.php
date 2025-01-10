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
            $table->enum('konser',['XDINARY HEROES 1ST WORLD TOUR BRAKE THE BRAKE in JAKARTA', 'DAY6 3RD WORLD TOUR FOREVER YOUNG in JAKARTA', 'Sheila On 7 Tunggu Aku Di', 'SEASON OF MEMORIES GFRIEND', 'GREEN DAY LIVE in JAKARTA', 'MY CHEMICAL ROMANCE WITH THURSDAY']);
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('crud', function (Blueprint $table) {
            $table->dropColumn('konser');
            
        });
    }
};
