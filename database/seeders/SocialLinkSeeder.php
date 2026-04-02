<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\SocialLink;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialLinks = [
            [
                'platform' => 'GitHub',
                'url' => 'https://github.com/jaywyndel',
                'username' => 'jaywyndel'
            ],
            [
                'platform' => 'LinkedIn',
                'url' => 'https://linkedin.com/in/jay-wyndel-bagsic',
                'username' => 'jay-wyndel-bagsic'
            ],
            [
                'platform' => 'Facebook',
                'url' => 'https://facebook.com/jaywyndel',
                'username' => 'jaywyndel'
            ],
        ];

        foreach ($socialLinks as $link) {
            SocialLink::create($link);
        }
    }
}
