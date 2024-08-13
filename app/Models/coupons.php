<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupons extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'use_limit',
        'item_used',
        'type',
        'item_value',
        'date_start',
        'date_end',
        'status',
    ];
}
