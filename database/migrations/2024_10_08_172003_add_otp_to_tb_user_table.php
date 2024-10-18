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
        Schema::table('tb_user', function (Blueprint $table) {
            // Kiểm tra nếu cột 'otp' chưa tồn tại thì thêm cột 'otp'
            if (!Schema::hasColumn('tb_user', 'otp')) {
                $table->string('otp')->nullable(); // Thêm cột otp
            }
            // Kiểm tra nếu cột 'otp_expiry' chưa tồn tại thì thêm cột 'otp_expiry'
            if (!Schema::hasColumn('tb_user', 'otp_expiry')) {
                $table->timestamp('otp_expiry')->nullable(); // Thêm cột otp_expiry
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_user', function (Blueprint $table) {
            // Kiểm tra nếu cột 'otp' tồn tại thì xóa cột 'otp'
            if (Schema::hasColumn('tb_user', 'otp')) {
                $table->dropColumn('otp'); // Xóa cột otp
            }
            // Kiểm tra nếu cột 'otp_expiry' tồn tại thì xóa cột 'otp_expiry'
            if (Schema::hasColumn('tb_user', 'otp_expiry')) {
                $table->dropColumn('otp_expiry'); // Xóa cột otp_expiry
            }
        });
    }
};
