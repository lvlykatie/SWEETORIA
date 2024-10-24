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
        Schema::create('tbl_voucher', function (Blueprint $table) {
            $table->increments('voucher_id');
            $table->string('voucher_name'); 
            $table->integer('discount_type'); 
            $table->decimal('discount_value', 10, 2);
            $table->integer('max_usage');
            $table->integer('current_usage');
            $table->dateTime('startdate'); 
            $table->dateTime('enddate'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_voucher');
    }
};
 