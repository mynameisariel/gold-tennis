<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lessons', [LessonController::class, 'index'])->name('lessons.index');
Route::get('/lessons/{lesson}', [LessonController::class, 'show'])->name('lessons.show');
Route::get('/lessons/{lesson}/time-slots', [LessonController::class, 'getTimeSlots'])->name('lessons.time-slots');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'show'])->name('contact');
Route::post('/contact/subscribe', [App\Http\Controllers\ContactController::class, 'subscribe'])->name('contact.subscribe');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Booking routes
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::patch('/bookings/{booking}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
    
    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/lessons', [AdminController::class, 'lessons'])->name('lessons.index');
        Route::get('/lessons/create', [AdminController::class, 'createLesson'])->name('lessons.create');
        Route::post('/lessons', [AdminController::class, 'storeLesson'])->name('lessons.store');
        Route::get('/lessons/{lesson}/time-slots', [AdminController::class, 'timeSlots'])->name('lessons.time-slots');
        Route::get('/lessons/{lesson}/time-slots/create', [AdminController::class, 'createTimeSlot'])->name('time-slots.create');
        Route::post('/lessons/{lesson}/time-slots', [AdminController::class, 'storeTimeSlot'])->name('time-slots.store');
        Route::patch('/time-slots/{timeSlot}/toggle', [AdminController::class, 'toggleTimeSlot'])->name('time-slots.toggle');
        Route::delete('/time-slots/{timeSlot}', [AdminController::class, 'destroyTimeSlot'])->name('time-slots.destroy');
        Route::get('/bookings', [AdminController::class, 'bookings'])->name('bookings.index');
        Route::patch('/bookings/{booking}/confirm', [AdminController::class, 'confirmBooking'])->name('bookings.confirm');
        Route::patch('/bookings/{booking}/cancel', [AdminController::class, 'cancelBooking'])->name('bookings.cancel');
    });
});

require __DIR__.'/auth.php';
