<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\TimeSlot;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function dashboard()
    {
        $totalLessons = Lesson::count();
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $todayBookings = Booking::whereHas('timeSlot', function($query) {
            $query->where('date', Carbon::today());
        })->count();

        return view('admin.dashboard', compact('totalLessons', 'totalBookings', 'pendingBookings', 'todayBookings'));
    }

    public function lessons()
    {
        $lessons = Lesson::withCount('timeSlots')->get();
        return view('admin.lessons.index', compact('lessons'));
    }

    public function createLesson()
    {
        return view('admin.lessons.create');
    }

    public function storeLesson(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration_minutes' => 'required|integer|min:15|max:480',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string'
        ]);

        Lesson::create($request->all());

        return redirect()->route('admin.lessons.index')
            ->with('success', 'Lesson created successfully!');
    }

    public function timeSlots(Lesson $lesson)
    {
        $timeSlots = $lesson->timeSlots()->orderBy('date')->orderBy('start_time')->get();
        return view('admin.time-slots.index', compact('lesson', 'timeSlots'));
    }

    public function createTimeSlot(Lesson $lesson)
    {
        return view('admin.time-slots.create', compact('lesson'));
    }

    public function storeTimeSlot(Request $request, Lesson $lesson)
    {
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'is_recurring' => 'boolean',
            'recurring_pattern' => 'nullable|string|in:weekly,monthly'
        ]);

        $startTime = Carbon::parse($request->start_time);
        $endTime = Carbon::parse($request->end_time);
        $date = Carbon::parse($request->date);

        if ($request->is_recurring) {
            // Create recurring time slots
            $this->createRecurringTimeSlots($lesson, $date, $startTime, $endTime, $request->recurring_pattern);
        } else {
            // Create single time slot
            TimeSlot::create([
                'lesson_id' => $lesson->id,
                'date' => $date,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'is_available' => true
            ]);
        }

        return redirect()->route('admin.lessons.time-slots', $lesson)
            ->with('success', 'Time slots created successfully!');
    }

    private function createRecurringTimeSlots($lesson, $startDate, $startTime, $endTime, $pattern)
    {
        $currentDate = $startDate->copy();
        $endDate = $startDate->copy()->addMonths(3); // Create 3 months of recurring slots

        while ($currentDate <= $endDate) {
            TimeSlot::create([
                'lesson_id' => $lesson->id,
                'date' => $currentDate,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'is_available' => true,
                'is_recurring' => true,
                'recurring_pattern' => $pattern
            ]);

            if ($pattern === 'weekly') {
                $currentDate->addWeek();
            } elseif ($pattern === 'monthly') {
                $currentDate->addMonth();
            }
        }
    }

    public function toggleTimeSlot(TimeSlot $timeSlot)
    {
        $timeSlot->update(['is_available' => !$timeSlot->is_available]);
        
        return back()->with('success', 'Time slot ' . ($timeSlot->is_available ? 'enabled' : 'disabled') . ' successfully!');
    }

    public function destroyTimeSlot(TimeSlot $timeSlot)
    {
        // Check if the time slot has any bookings
        if ($timeSlot->bookings()->exists()) {
            return back()->withErrors(['error' => 'Cannot delete time slot with existing bookings.']);
        }

        $timeSlot->delete();
        return back()->with('success', 'Time slot deleted successfully!');
    }

    public function bookings()
    {
        $bookings = Booking::with(['user', 'timeSlot.lesson'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function confirmBooking(Booking $booking)
    {
        $booking->update(['status' => 'confirmed']);
        
        // Send confirmation email to the user
        try {
            Mail::to($booking->user->email)->send(new BookingConfirmation($booking));
        } catch (\Exception $e) {
            // Log the error but don't fail the confirmation
            \Log::error('Failed to send booking confirmation email: ' . $e->getMessage());
        }
        
        return back()->with('success', 'Booking confirmed successfully! Confirmation email sent to user.');
    }

    public function cancelBooking(Booking $booking)
    {
        $booking->update(['status' => 'cancelled']);
        return back()->with('success', 'Booking cancelled successfully!');
    }
}
