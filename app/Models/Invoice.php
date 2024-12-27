<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'tbl_invoice'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'iv_id'; // Khóa chính
    public $timestamps = true; // Tự động cập nhật thời gian

    protected $fillable = [
        'user_id',
        'voucher_id',
        'orderdate',
        'method',
        'note',
        'total_price',
        'actual_price',
        'iv_receiver',
        'iv_address',
        'iv_phone',
        'iv_status',
    ];

    // Quan hệ với chi tiết hóa đơn
    public function details()
    {
        return $this->hasMany(InvoiceDetails::class, 'invoice_id', 'iv_id');
    }
}
