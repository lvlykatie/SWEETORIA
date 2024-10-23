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
        Schema::create('tbl_cart', function (Blueprint $table) {
            $table->increments('cart_id');
            $table->integer('user_id')->nullable();
            $table->integer('total_amount')->nullable();
            $table->integer('total_price')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_cart');
    }
};
