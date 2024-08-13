<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'SKU',
        'product_id',
        'date_added',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
