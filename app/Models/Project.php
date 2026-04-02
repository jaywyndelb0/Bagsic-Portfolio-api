<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'role',
        'technologies_used',
        'github_url',
        'live_url',
        'image',
        'status',
        'featured',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];
}
