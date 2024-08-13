<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_code',
        'name',
        'description',
        'price',
        'old_price',
        'brand',
        'quantity',
        'is_sold',
        'popularity_status',
        'category_id',
        'is_deleted'
        // Add other columns here if necessary
    ];

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }
}
