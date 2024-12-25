<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
        // Chỉ định tên bảng
        protected $table = 'tbl_wishlist';

        // Chỉ định khóa chính nếu không phải là `id`
        protected $primaryKey = 'wl_id';
    
        // Cho phép thêm các cột này
        protected $fillable = [
            'user_id',
            'product_id',
        ];

            // Quan hệ với Product
        public function product()
        {
            // Sửa lại cột khóa ngoại
            return $this->belongsTo(Product::class, 'product_id', 'product_id');
        }
}
