<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Kiểm tra xem bảng đã tồn tại chưa, nếu chưa thì tạo bảng
        if (!Schema::hasTable('tb_user')) {
            Schema::create('tb_user', function (Blueprint $table) {
                $table->increments('user_id');
                $table->string('user_email')->unique();
                $table->string('user_password');
                $table->string('user_name');
                $table->string('user_address')->nullable();
                $table->string('user_phone');
                $table->string('role')->default('Client');
                $table->string('otp')->nullable(); // Thêm cột otp
                $table->timestamp('otp_expiry')->nullable(); // Thêm cột otp_expiry
                $table->timestamps();
                $table->string('google_id')->nullable(); // Thêm cột google_id
            });

            // Chèn các dữ liệu mẫu vào bảng
            DB::table('tb_user')->insert([
                ['user_email' => 'admin@gmail.com', 'user_password' => 'admin', 'user_name' => 'Ẹt', 'user_phone' => '1234', 'role' => 'admin'],
                ['user_email' => 'client@gmail.com', 'user_password' => 'client', 'user_name' => 'Du', 'user_phone' => '1111', 'role' => 'customer'],
                ['user_email' => 'thu@gmail.com', 'user_password' => '12345', 'user_name' => 'Thu ne', 'user_phone' => '2222', 'role' => 'customer'],
                ['user_email' => 'thanh@gmail.com', 'user_password' => '12345', 'user_name' => 'Thanh ne', 'user_phone' => '3333', 'role' => 'admin']
            ]);
        }

        // Kiểm tra bảng 'password_reset_tokens' đã tồn tại chưa, nếu chưa thì tạo bảng
        if (!Schema::hasTable('password_reset_tokens')) {
            Schema::create('password_reset_tokens', function (Blueprint $table) {
                $table->string('email')->unique();
                $table->string('token');
                $table->timestamp('created_at')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Xóa bảng 'tb_user' nếu có
        Schema::dropIfExists('tb_user');

        // Xóa bảng 'password_reset_tokens' nếu có
        Schema::dropIfExists('password_reset_tokens');
    }
};
