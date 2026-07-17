<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactSubmission;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact.index');
    }

    public function store(ContactRequest $request)
    {
        ContactSubmission::create($request->validated());

        return back()->with('success', 'Thank you for your message. We will get back to you soon.');
    }
}
