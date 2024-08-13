<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_specifications extends Model
{
    use HasFactory;
    protected $table = 'product_specifications';
    protected $primaryKey = 'specs_id';
    public $timestamps = true;

    protected $fillable = [
        'product_id',
        'specs_name',
        'specs_value',
    ];

    // Define the relationship with the Product model assuming a belongsTo relationship exists
    public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'product_id');
    }
}
