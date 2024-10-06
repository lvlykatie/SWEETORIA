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
        Schema::create('tbl_deal', function (Blueprint $table) {
            $table->increments('deal_id');
            $table->string('deal_name');
            $table->string('product_name')->default('gg');
            $table->float('deal_price');
            $table->longText('deal_desc');
            $table->longText('deal_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_deal');
    }
};
