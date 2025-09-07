<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\TimeSlot;
use Carbon\Carbon;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lessons = Lesson::all();

        foreach ($lessons as $lesson) {
            // Create time slots for the next 2 weeks
            $startDate = Carbon::today();
            
            for ($i = 0; $i < 14; $i++) {
                $date = $startDate->copy()->addDays($i);
                
                // no weekend timslots for lessons
                if ($lesson->id == 1 && $date->isWeekend()) {
                    continue;
                }
                
                // Create multiple time slots per day
                $times = [
                    ['09:00', '10:00'],
                    ['10:00', '11:00'],
                    ['14:00', '15:00'],
                    ['15:00', '16:00'],
                    ['16:00', '17:00'],
                ];
                
                foreach ($times as $time) {
                    TimeSlot::create([
                        'lesson_id' => $lesson->id,
                        'date' => $date,
                        'start_time' => $time[0],
                        'end_time' => $time[1],
                        'is_available' => true,
                        'is_recurring' => false,
                    ]);
                }
            }
        }
    }
}
