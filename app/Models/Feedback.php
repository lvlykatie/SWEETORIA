<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'tbl_feedback'; // Tên bảng

    protected $primaryKey = 'fb_id'; // Khóa chính là fb_id

    protected $fillable = [
        'user_id',
        'product_id',
        'comment',
        'rate',
        'image'
    ];
}
