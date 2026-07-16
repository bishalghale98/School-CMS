<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class InquiryController extends Controller
{
    public function store()
    {
        return back()->with('success', 'Your inquiry has been submitted successfully. We will contact you soon.');
    }
}
