<?php

namespace App\Http\Controllers;

use App\Models\LessonPackage;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PackagePurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $package = UserPackage::create([
            'user_id' => Auth::id(),
            'lesson_package_id' => $request->lesson_package_id,
            'status' => 'pending',
            'notes' => $request->notes
        ]);

        return redirect()->route('packages.show', $package)->with('success', 'Lesson package purchase requested!');
        // return view('packages.show');
    }

    // public function show(UserPackage $userPackage) {
    //     // if ($userPackage->user_id !== Auth::id() && !Auth::user()->is_admin) {
    //     //     abort(403);
    //     // }
    //     dd($userPackage);

    //     return view('packages.show', compact('userPackage'));
    //     // return 'this is the packages.show page';
    // }

    public function index() {
        $packages = Auth::user()->userPackages()->orderBy('created_at', 'desc')->get();
        // return view('packages.index', compact('packages'));
        return 'package purchase index';
    }
}
