<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechStack extends Model
{
    protected $fillable = [
        'name',
        'category',
        'proficiency_level',
        'years_of_experience',
        'description',
    ];
}
