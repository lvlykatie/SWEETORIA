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
        if (!Schema::hasTable('tbl_deal')) {
        Schema::create('tbl_deal', function (Blueprint $table) {
            $table->increments('deal_id');
            $table->string('deal_name');
            $table->float('deal_discount');
            $table->longText('deal_desc');
            $table->longText('deal_image');
            $table->integer('wh_id')->nullable();
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_deal');
    }
};
