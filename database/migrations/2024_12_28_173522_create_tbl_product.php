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
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name');
            $table->integer('original_price')->nullable();
            $table->integer('product_price');
            $table->longText('product_desc');
            $table->longText('product_image');
            $table->integer('product_sku');
            $table->string('category_name');
            $table->string('origin')->nullable();
            $table->string('weight')->nullable();
            $table->string('storage')->nullable();
            $table->string('expiration')->nullable();
            $table->float('product_rate', 2, 1)->default(0);
            $table->integer('deal_id')->nullable();
            $table->integer('wh_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_product');
    }
};
