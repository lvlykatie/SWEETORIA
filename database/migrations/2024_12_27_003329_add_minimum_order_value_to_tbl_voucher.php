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
        Schema::table('tbl_voucher', function (Blueprint $table) {
            $table->decimal('minimum_order_value', 10, 2)->nullable()->after('current_usage'); // Giá trị tối thiểu
        });
    }

    public function down(): void
    {
        Schema::table('tbl_voucher', function (Blueprint $table) {
            $table->dropColumn('minimum_order_value');
        });
    }

};
