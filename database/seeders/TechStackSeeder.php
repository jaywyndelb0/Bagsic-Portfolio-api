<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\TechStack;

class TechStackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $techStacks = [
            ['name' => 'Kotlin', 'category' => 'programming language', 'proficiency_level' => 'Beginner'],
            ['name' => 'Java', 'category' => 'programming language', 'proficiency_level' => 'Intermediate'],
            ['name' => 'Figma', 'category' => 'design tool', 'proficiency_level' => 'Intermediate'],
            ['name' => 'VS Code', 'category' => 'code editor', 'proficiency_level' => 'Advanced'],
            ['name' => 'MySQL', 'category' => 'database', 'proficiency_level' => 'Intermediate'],
            ['name' => 'Laravel', 'category' => 'framework', 'proficiency_level' => 'Beginner'],
            ['name' => 'PHP', 'category' => 'programming language', 'proficiency_level' => 'Intermediate'],
            ['name' => 'Git', 'category' => 'tool', 'proficiency_level' => 'Intermediate'],
        ];

        foreach ($techStacks as $techStack) {
            TechStack::create($techStack);
        }
    }
}
