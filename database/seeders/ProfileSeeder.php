<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'full_name' => 'Jay Wyndel Bagsic',
            'title' => 'BSIT-3 Student Developer',
            'bio' => 'A BSIT-3 student passionate about learning software development and improving programming skills through personal and school projects.',
            'location' => 'Philippines',
            'address' => 'Purok 10, Pag-Asa, Kapalong, Davao del Norte',
            'email' => 'jaywyndelb0@gmail.com',
            'phone' => '09518135923',
        ]);
    }
}
