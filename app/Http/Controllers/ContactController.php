<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscription;
use App\Mail\NewsletterWelcome;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
            'name' => 'required|string|max:255',
        ]);

        // Store subscriber in database (you'll need to create this table)
        \DB::table('newsletter_subscribers')->insert([
            'email' => $request->email,
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Send welcome email
        Mail::to($request->email)->send(new NewsletterWelcome($request->name));

        // Send notification to admin
        Mail::to(config('mail.admin_email', 'admin@goldtennis.com'))->send(new NewsletterSubscription($request->email, $request->name));

        return back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
} 