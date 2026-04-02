<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'full_name',
        'title',
        'bio',
        'profile_image',
        'location',
        'address',
        'email',
        'phone',
    ];
}
