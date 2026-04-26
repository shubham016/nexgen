<?php

namespace App\Http\Controllers;

use App\Mail\ContactNotificationMail;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:150',
            'message' => 'required|string|max:2000',
        ]);

        $message = ContactMessage::create($validated);

        try {
            Mail::to('sales@nexgenbuildtech.com')->send(new ContactNotificationMail($message));
        } catch (\Exception $e) {
            // Mail failure should not block the user's submission
        }

        return back()->with('contact_success', 'Thank you! Your message has been received. We\'ll get back to you shortly.');
    }
}
