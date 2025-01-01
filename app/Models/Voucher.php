<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $table = 'tbl_voucher';
    protected $primaryKey = 'voucher_id'; // Tên cột khóa chính

    protected $fillable = [
        'voucher_id',
        'voucher_name',
        'discount_type',
        'discount_value',
        'max_usage',
        'current_usage',
        'minimum_order_value',
        'startdate',
        'enddate',
        'created_at',
        'updated_at',
    ];
}
