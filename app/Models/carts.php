<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $primaryKey = 'cart_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'is_ordered',
    ];
}
