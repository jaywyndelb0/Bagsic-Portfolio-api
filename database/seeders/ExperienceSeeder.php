<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experiences = [
            [
                'title' => 'Built simple school programming projects',
                'type' => 'school activity',
                'description' => 'Developed various small-scale applications for school assignments.',
                'achievements' => 'Improved logic and problem-solving skills.'
            ],
            [
                'title' => 'Practiced Figma UI layouts and wireframes',
                'type' => 'personal learning',
                'description' => 'Learned the basics of UI/UX design and created mobile and web layouts.',
                'achievements' => 'Built several wireframes for prototype apps.'
            ],
            [
                'title' => 'Learned Java and Kotlin fundamentals',
                'type' => 'personal learning',
                'description' => 'Studied core concepts of object-oriented programming using Java and Kotlin.',
                'achievements' => 'Able to write basic functional code in both languages.'
            ],
            [
                'title' => 'Used VS Code for coding practice',
                'type' => 'personal learning',
                'description' => 'Explored various extensions and tools in VS Code for efficient development.',
                'achievements' => 'Improved coding speed and productivity.'
            ],
            [
                'title' => 'Worked with MySQL for basic database tasks',
                'type' => 'student project',
                'description' => 'Designed and managed databases for several small projects.',
                'achievements' => 'Understood relational database concepts and SQL queries.'
            ],
            [
                'title' => 'Built beginner APIs using Laravel and PHP',
                'type' => 'personal learning',
                'description' => 'Started learning backend development with Laravel framework.',
                'achievements' => 'Created simple RESTful endpoints.'
            ],
            [
                'title' => 'Participated in group programming activities',
                'type' => 'group project',
                'description' => 'Collaborated with classmates to build more complex school projects.',
                'achievements' => 'Improved teamwork and version control skills with Git.'
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }
    }
}
