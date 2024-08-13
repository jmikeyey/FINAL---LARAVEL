<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery_info extends Model
{
    use HasFactory;

    protected $primaryKey = 'address_id'; // Define the primary key
    public $incrementing = true; // Set to true if the primary key is auto-incrementing
    protected $keyType = 'int'; // Set the data type of the primary key
    public $timestamps = true; // Set to true if the table has created_at and updated_at columns

    // Fillable columns
    protected $fillable = [
        'region',
        'province',
        'city',
        'barangay',
        'phone_number',
        'description',
        'label',
        'is_default',
        'user_id'
    ];

    // Relationship with the user profile
    public function userProfile()
    {
        return $this->belongsTo(usersprofile::class, 'user_id');
    }
}
