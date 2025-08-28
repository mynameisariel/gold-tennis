<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lessons = [
            [
                'title' => 'Private Tennis Lesson',
                'description' => 'Get individualized attention and customized training to elevate your game quickly. Private lessons are ideal for improving technique, fixing habits, or preparing for competition.',
                'duration_minutes' => 60,
                'price' => 75.00,
                'image' => 'https://placehold.co/400x300/4ade80/ffffff?text=Tennis+Private',
                'is_active' => true,
            ],
            [
                'title' => 'Group Tennis Lesson (2-4 players)',
                'description' => 'Learn tennis in a fun, social environment with other players of similar skill level. Group lessons are perfect for beginners and intermediate players looking to improve their game.',
                'duration_minutes' => 90,
                'price' => 45.00,
                'image' => 'https://placehold.co/400x300/4ade80/ffffff?text=Tennis+Group',
                'is_active' => true,
            ],
            [
                'title' => 'Advanced Technique Training',
                'description' => 'Advanced training focused on perfecting technique, strategy, and match play. Designed for experienced players looking to take their game to the next level.',
                'duration_minutes' => 60,
                'price' => 85.00,
                'image' => 'https://placehold.co/400x300/4ade80/ffffff?text=Tennis+Advanced',
                'is_active' => true,
            ],
        ];

        foreach ($lessons as $lesson) {
            Lesson::create($lesson);
        }
    }
}
