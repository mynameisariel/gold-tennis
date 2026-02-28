<?php

namespace App\Http\Controllers;

use App\Models\LessonPackage;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LessonPackageController extends Controller
{
    public function index() {
        $lessonPackages = LessonPackage::where('is_active', true)->get();
        return view('lesson-packages.index', compact('lessonPackages'));
    }

    public function show(LessonPackage $lessonPackage) {
        return view('lesson-packages.show', compact('lessonPackage'));
    }
}
