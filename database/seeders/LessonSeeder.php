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
                'title' => 'Private (1 player)',
                'description' => 'Get individualized attention and customized training to elevate your game quickly. Private lessons are ideal for improving technique, fixing habits, or preparing for competition.',
                'duration_minutes' => 60,
                'price' => 50.00,
                'image' => 'https://placehold.co/400x300/4ade80/ffffff?text=Tennis+Private',
                'is_active' => true,
            ],
            [
                'title' => 'Semi-Private (2 players)',
                'description' => 'Train with a partner and enjoy personalized, engaging coaching with shared focus. Semi-private lessons are great for learning together while still getting targeted feedback and steady rally practice.',
                'duration_minutes' => 60,
                'price' => 35.00,
                'image' => 'https://placehold.co/400x300/4ade80/ffffff?text=Tennis+Group',
                'is_active' => true,
            ],
            [
                'title' => 'Group (4+ players)',
                'description' => 'Build skills in a fun, social setting through drills, games, and rally play. Group lessons boost consistency, confidence, and teamwork while making tennis exciting and engaging.',
                'duration_minutes' => 60,
                'price' => 25.00,
                'image' => 'https://placehold.co/400x300/4ade80/ffffff?text=Tennis+Advanced',
                'is_active' => true,
            ],
        ];

        foreach ($lessons as $lesson) {
            Lesson::create($lesson);
        }
    }
}
