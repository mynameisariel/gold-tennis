<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::where('is_active', true)->get();
        return view('lessons', compact('lessons'));
    }

    public function show(Lesson $lesson)
    {
        $selectedDate = request('date', Carbon::today()->format('Y-m-d'));
        $timeSlots = $lesson->timeSlots()
            ->where('date', $selectedDate)
            ->where('is_available', true)
            ->whereDoesntHave('bookings', function($query) {
                $query->where('status', '!=', 'cancelled');
            })
            ->orderBy('start_time')
            ->get();

        return view('lessons.show', compact('lesson', 'timeSlots', 'selectedDate'));
    }

    public function getTimeSlots(Lesson $lesson, Request $request)
    {
        $date = $request->get('date', Carbon::today()->format('Y-m-d'));
        
        $timeSlots = $lesson->timeSlots()
            ->where('date', $date)
            ->where('is_available', true)
            ->whereDoesntHave('bookings', function($query) {
                $query->where('status', '!=', 'cancelled');
            })
            ->orderBy('start_time')
            ->get()
            ->map(function($slot) {
                return [
                    'id' => $slot->id,
                    'start_time' => $slot->start_time->format('g:i A'),
                    'end_time' => $slot->end_time->format('g:i A'),
                ];
            });

        return response()->json($timeSlots);
    }
}
