<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('Contact.index');
    }

    public function submit(ContactRequest $request): RedirectResponse
    {
        $recipient = config('mail.contact_address', config('mail.from.address'));

        Mail::to($recipient)->send(new ContactMail($request->validated()));

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
