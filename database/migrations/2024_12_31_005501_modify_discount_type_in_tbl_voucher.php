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
            $table->string('discount_type')->change(); // Thay đổi kiểu dữ liệu từ integer sang string
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_voucher', function (Blueprint $table) {
            $table->integer('discount_type')->change(); // Phục hồi kiểu dữ liệu ban đầu (nếu cần)
        });
    }
};
