<?php

namespace App\Http\Controllers;

use App\Models\LessonPackage;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LessonPackageController extends Controller
{
    public function index() {
        $lessonPackages = LessonPackage::where('is_active', true)->get();
        // return view('lesson-packages', compact('lessonPackages'));
        return view('lesson-packages.index', compact('lessonPackages'));
    }

    public function show(LessonPackage $lessonPackage) {
        $selectedDate = request('date', Carbon::today()->format('Y-m-d'));
        // $timeSlots = $lessonPackage->timeSlots()
        //     ->where('date', $selectedDate)
        //     ->where('is_available', true)
        //     ->whereDoesntHave('bookings', function($query) {
        //         $query->where('status', '!=', 'cancelled');
        //     })
        //     ->orderBy('start_time')
        //     ->get();

        // return view('lesson-packages.show', compact('lessonPackages', 'timeSlots', 'selectedDate'));
        return view('lesson-packages.show', compact('lessonPackage'));
        // return view('lesson-packages.show');
    }
}
