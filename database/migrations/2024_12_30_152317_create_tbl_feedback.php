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
        if (!Schema::hasTable('tbl_feedback')) {
        Schema::create('tbl_feedback', function (Blueprint $table) {
            $table->id('fb_id'); // Tạo khóa chính là fb_id
            $table->foreignId('user_id'); // Tham chiếu đến bảng users
            $table->foreignId('product_id'); // Tham chiếu đến bảng products
            $table->text('comment'); // Cột bình luận
            $table->integer('rate');
            $table->string('image')->nullable();
            $table->string('status')->default('pending'); // Cột đánh giá (rating)
            $table->timestamps(); // Tạo các cột created_at và updated_at
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_feedback');
    }
};
