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
        if (!Schema::hasTable('tbl_warehouse')) { // Kiểm tra bảng có tồn tại hay không
            Schema::create('tbl_warehouse', function (Blueprint $table) {
                $table->increments('wh_id');
                $table->string('wh_name');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_warehouse');
    }
};
