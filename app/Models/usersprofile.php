<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usersprofile extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'firstname',
        'lastname',
        'mi',
        'gender',
        'birthdate',
        'phonenumber',
        'profile_img',
        'email',
        'date_registered',
        'username',
        'password',
        'usertype',
        'active_status',
        'token',
        'token_use',
    ];
}
