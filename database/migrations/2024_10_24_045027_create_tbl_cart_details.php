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
        Schema::create('tbl_cart_details', function (Blueprint $table) {
            $table->increments('cart_details_id'); 
            $table->integer('user_id')->nullable();
            $table->integer('product_id')->nullable(); 
            $table->integer('quantity')->nullable(); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_cart_details');
    }
};
