<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Student Task Manager App',
                'description' => 'A simple application to help students track their tasks and deadlines.',
                'role' => 'Lead Developer',
                'technologies_used' => 'Kotlin, SQLite',
                'status' => 'Completed',
                'featured' => true
            ],
            [
                'name' => 'Simple Grade Calculator',
                'description' => 'A tool for calculating student grades based on specific criteria.',
                'role' => 'Developer',
                'technologies_used' => 'Java, XML',
                'status' => 'Completed',
                'featured' => false
            ],
            [
                'name' => 'Portfolio API Backend',
                'description' => 'A RESTful API for managing a personal developer portfolio.',
                'role' => 'Backend Developer',
                'technologies_used' => 'Laravel, PHP, MySQL',
                'status' => 'In Progress',
                'featured' => true
            ],
            [
                'name' => 'Basic Attendance Monitoring System',
                'description' => 'A system for tracking student attendance in a classroom setting.',
                'role' => 'Full Stack Developer',
                'technologies_used' => 'PHP, MySQL, CSS',
                'status' => 'Completed',
                'featured' => false
            ],
            [
                'name' => 'Figma Mobile App Prototype',
                'description' => 'A high-fidelity prototype of a mobile application designed in Figma.',
                'role' => 'UI Designer',
                'technologies_used' => 'Figma',
                'status' => 'Design Phase',
                'featured' => false
            ],
        ];

        foreach ($projects as $project) {
            $project['slug'] = Str::slug($project['name']);
            Project::create($project);
        }
    }
}
