<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\TimeSlot;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate([
            'time_slot_id' => 'required|exists:time_slots,id',
            'notes' => 'nullable|string|max:500'
        ]);

        $timeSlot = TimeSlot::findOrFail($request->time_slot_id);

        // Check if time slot is still available
        if (!$timeSlot->is_available || $timeSlot->isBooked()) {
            return back()->withErrors(['time_slot' => 'This time slot is no longer available.']);
        }

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'time_slot_id' => $request->time_slot_id,
            'status' => 'pending',
            'notes' => $request->notes
        ]);

        return redirect()->route('bookings.show', $booking)
            ->with('success', 'Booking created successfully!');
    }

    public function show(Booking $booking)
    {
        // Ensure user can only view their own bookings (unless admin)
        if ($booking->user_id !== Auth::id() && !Auth::user()->is_admin) {
            abort(403);
        }

        return view('bookings.show', compact('booking'));
    }

    public function index()
    {
        $bookings = Auth::user()->bookings()->with(['timeSlot.lesson'])->orderBy('created_at', 'desc')->get();
        return view('bookings.index', compact('bookings'));
    }

    public function cancel(Booking $booking)
    {
        if ($booking->user_id !== Auth::id() && !Auth::user()->is_admin) {
            abort(403);
        }

        $booking->update(['status' => 'cancelled']);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking cancelled successfully.');
    }
}
