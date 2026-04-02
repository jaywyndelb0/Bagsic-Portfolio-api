<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Education;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Education::create([
            'school_name' => 'North Davao College',
            'degree' => 'Bachelor of Science in Information Technology',
            'field_of_study' => 'Information Technology',
            'year_section' => 'BSIT-3',
            'start_date' => '2023-08-01',
            'is_current' => true,
            'description' => 'Currently in my third year, focusing on software development and database management.',
        ]);
    }
}
