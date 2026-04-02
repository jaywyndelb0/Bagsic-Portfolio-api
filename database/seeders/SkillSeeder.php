<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            ['name' => 'Problem Solving', 'level' => 'Intermediate', 'description' => 'Ability to analyze problems and find effective solutions.'],
            ['name' => 'Programming Fundamentals', 'level' => 'Intermediate', 'description' => 'Strong understanding of core programming concepts.'],
            ['name' => 'Teamwork', 'level' => 'Advanced', 'description' => 'Experienced in working collaboratively in group projects.'],
            ['name' => 'Communication', 'level' => 'Advanced', 'description' => 'Effective verbal and written communication skills.'],
            ['name' => 'Basic UI/UX Design', 'level' => 'Beginner', 'description' => 'Ability to create simple and intuitive user interfaces.'],
            ['name' => 'Debugging', 'level' => 'Intermediate', 'description' => 'Proficient in identifying and fixing bugs in code.'],
            ['name' => 'Critical Thinking', 'level' => 'Intermediate', 'description' => 'Analyzing information objectively to make informed decisions.'],
            ['name' => 'Time Management', 'level' => 'Advanced', 'description' => 'Ability to prioritize tasks and meet deadlines.'],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
