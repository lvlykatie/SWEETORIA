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
        if (!Schema::hasTable('tbl_invoice')) { // Kiểm tra bảng có tồn tại hay không
            Schema::create('tbl_invoice', function (Blueprint $table) {
                $table->increments('iv_id');
                $table->string('user_id');
                $table->integer('voucher_id')->nullable();
                $table->dateTime('orderdate');
                $table->string('method');
                $table->text('note')->nullable();
                $table->float('total_price');
                $table->float('actual_price');
                $table->string('iv_receiver');
                $table->string('iv_address');
                $table->string('iv_phone');
                $table->string('iv_status')->default('Pending');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_invoice');
    }
};
