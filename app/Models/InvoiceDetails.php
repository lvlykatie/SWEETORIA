<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;
    protected $table = 'tbl_invoice_details'; // Tên bảng
    protected $primaryKey = 'invoice_details_id'; // Khóa chính
    public $timestamps = true;

    protected $fillable = [
        'invoice_id',
        'product_id',
        'quantity',
        'price',
    ];

    // Quan hệ với hóa đơn
    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'iv_id');
    }

    // Quan hệ với sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
