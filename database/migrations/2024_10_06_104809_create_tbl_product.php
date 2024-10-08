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
        // Kiểm tra xem bảng đã tồn tại chưa
        if (!Schema::hasTable('tbl_product')) {
            Schema::create('tbl_product', function (Blueprint $table) {
                $table->increments('product_id');
                $table->string('product_name');
                $table->integer('original_price')->nullable();
                $table->integer('product_price');
                $table->longText('product_desc');
                $table->longText('product_image');
                $table->integer('product_sku');
                $table->string('category_name');
                $table->integer('product_quantity')->default(0);
                $table->string('product_fact')->default('N/A');
                $table->enum('status', ['show', 'hide'])->default('show');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_product');
    }
};
