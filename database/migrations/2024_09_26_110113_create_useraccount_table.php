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
        Schema::create('tb_user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_email')->unique();
            $table->string('user_password');
            $table->string('user_name');
            $table->string('user_address')->nullable();
            $table->string('user_phone');
            $table->enum('role', ['customer', 'admin']);
            $table->string('otp')->nullable(); // Thêm cột otp
            $table->timestamp('otp_expiry')->nullable(); // Thêm cột otp_expiry
            $table->timestamps();
        });

        DB::table('tb_user')->insert([
            ['user_email' => 'admin@gmail.com', 'user_password' => 'admin', 'user_name' => 'Ẹt', 'user_phone' => '1234', 'role' => 'admin'],
            ['user_email' => 'client@gmail.com', 'user_password' => 'client', 'user_name' => 'Du', 'user_phone' => '1111', 'role' => 'customer'],
            ['user_email' => 'thu@gmail.com', 'user_password' => '12345', 'user_name' => 'Thu ne', 'user_phone' => '2222', 'role' => 'customer'],
            ['user_email' => 'thanh@gmail.com', 'user_password' => '12345', 'user_name' => 'Thanh ne', 'user_phone' => '3333', 'role' => 'admin']
        ]);

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_user');
    }
};
