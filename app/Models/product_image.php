<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
    use HasFactory;
    protected $table = 'product_image';
    protected $primaryKey = 'image_id';
    public $timestamps = true;

    // Define fillable columns
    protected $fillable = [
        'filename',
        'product_id',
    ];

    // Relationships
    public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'product_id');
    }
}
