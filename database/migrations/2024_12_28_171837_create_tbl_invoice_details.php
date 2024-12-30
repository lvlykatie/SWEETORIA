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
       if (!Schema::hasTable('tbl_invoice_details')) { // Kiểm tra bảng có tồn tại hay không
            Schema::create('tbl_invoice_details', function (Blueprint $table) {
                $table->increments('ivd_id');
                $table->integer('iv_id');
                $table->integer('product_id');
                $table->integer('quantity');
                $table->float('price');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_invoice_details');
    }
};
