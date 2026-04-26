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

        // Send mail after response is returned to the browser
        $contactMessage = $message;
        app()->terminating(function () use ($contactMessage) {
            try {
                Mail::to('sales@nexgenbuildtech.com')->send(new ContactNotificationMail($contactMessage));
            } catch (\Exception $e) {
                //
            }
        });

        return back()->with('contact_success', 'Thank you! Your message has been received. We\'ll get back to you shortly.');
    }
}
