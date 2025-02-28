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
        if (!Schema::hasTable('tbl_voucher')) {
        Schema::create('tbl_voucher', function (Blueprint $table) {
            $table->increments('voucher_id');
            $table->string('voucher_name');
            $table->decimal('discount_value', 10, 2);
            $table->integer('max_usage');
            $table->integer('current_usage')->default('0');
            $table->decimal('minimum_order_value', 10, 2)->nullable();
            $table->date('startdate');
            $table->date('enddate');
            $table->timestamps();
        });
    }
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_voucher');
    }
};
