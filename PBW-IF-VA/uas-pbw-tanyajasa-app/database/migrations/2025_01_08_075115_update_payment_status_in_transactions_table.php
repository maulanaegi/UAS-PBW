<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdatePaymentStatusInTransactionsTable extends Migration
{
    public function up()
    {
        // Ubah tipe kolom payment_status untuk menyertakan nilai 'canceled'
        DB::statement("ALTER TABLE transactions MODIFY COLUMN payment_status ENUM('pending', 'paid', 'canceled') DEFAULT 'pending'");
    }

    public function down()
    {
        // Kembalikan kolom payment_status ke nilai awal (tanpa 'canceled')
        DB::statement("ALTER TABLE transactions MODIFY COLUMN payment_status ENUM('pending', 'paid') DEFAULT 'pending'");
    }
}
