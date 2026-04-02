<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\AboutMe;

class AboutMeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutMe::create([
            'introduction' => 'A BSIT-3 student passionate about learning software development and improving programming skills through personal and school projects.',
            'career_goal' => 'To become a skilled software developer and build useful applications that solve real-world problems.',
            'summary' => 'Currently exploring various technologies like Laravel, PHP, and MySQL for backend development, while also practicing UI design with Figma.',
        ]);
    }
}
