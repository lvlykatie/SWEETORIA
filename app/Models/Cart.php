<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

   // Đặt tên bảng rõ ràng
   protected $table = 'tbl_cart';

   // Khóa chính
   protected $primaryKey = 'cart_id';

   // Các cột có thể điền
   protected $fillable = ['user_id', 'total_amount', 'total_price'];

   public function details()
   {
       return $this->hasMany(CartDetails::class, 'cart_id', 'cart_id');
   }
}
