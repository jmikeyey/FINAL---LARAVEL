<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
        'discount',
        'shipping',
        'subtotal',
    ];

}
