<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $table = 'payment'; // Specify the table name if it differs from the conventional naming

    protected $primaryKey = 'payment_id'; // Define the primary key if it's different from the 'id'

    // Fillable columns - specify columns that can be mass-assigned
    protected $fillable = [
        'amount',
        'payment_date',
        'method',
        'pay_status',
        'user_id',
        // Add other columns here if necessary
    ];

    // Relationships if there are any
    public function user()
    {
        return $this->belongsTo(usersprofile::class, 'user_id');
    }
}
