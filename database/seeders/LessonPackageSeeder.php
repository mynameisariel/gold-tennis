<?php

namespace Database\Seeders;

use App\Models\LessonPackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lessonPackages = [
            [
                'title' => 'Beginner Kickstart Package',
                'Description' => 'The ideal 6 week package for complete beginners at tennis. This private training schema features six organized lessons aiming to develop a player from zero to hitting ralleys.',
                'number_of_lessons' => 6,
                'price' => 280,
                'image' => 'https://placehold.co/400x300/4ade80/ffffff?text=Beginner+Kickstart',
                'is_active' => true,
            ],
            [
                'title' => 'Tournament Prep',
                'Description' => 'Get started in competitive tennis with 3 lessons on game play, strategy, and tactics.',
                'number_of_lessons' => 3,
                'price' => 150,
                'image' => 'https://placehold.co/400x300/4ade80/ffffff?text=Tournament+Prep',
                'is_active' => true,
            ],
            [
                'title' => '12-Week Lesson Package',
                'Description' => 'Commit to a 12 week training schedule. Save 20%!',
                'number_of_lessons' => 3,
                'price' => 500,
                'image' => 'https://placehold.co/400x300/4ade80/ffffff?text=12+Week+Package',
                'is_active' => true,
            ]
        ];

        foreach ($lessonPackages as $lessonPackage) {
            LessonPackage::create($lessonPackage);
        }

    }
}
