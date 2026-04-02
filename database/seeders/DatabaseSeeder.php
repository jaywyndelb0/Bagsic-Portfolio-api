<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Jay Wyndel Bagsic',
            'email' => 'jaywyndelb0@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            ProfileSeeder::class,
            AboutMeSeeder::class,
            SkillSeeder::class,
            TechStackSeeder::class,
            EducationSeeder::class,
            ExperienceSeeder::class,
            ProjectSeeder::class,
            SocialLinkSeeder::class,
        ]);
    }
}
