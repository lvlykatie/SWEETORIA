<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToTblFeedback extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_feedback', function (Blueprint $table) {
            $table->string('image')->nullable(); // Thêm cột 'image' kiểu chuỗi, có thể null
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_feedback', function (Blueprint $table) {
            $table->dropColumn('image'); // Xóa cột 'image' nếu rollback migration
        });
    }
}
