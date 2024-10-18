<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'tbl_product';

    protected $primaryKey = 'product_id';


    protected $fillable = [
        'product_name',
        'original_price',
        'product_price',
        'product_desc',
        'product_image',
        'product_sku',
        'category_name',
        'product_quantity',
        'product_fact',
        'status'
    ];

}
