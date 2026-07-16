<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact.index');
    }

    public function store()
    {
        return back()->with('success', 'Thank you for your message. We will get back to you soon.');
    }
}
