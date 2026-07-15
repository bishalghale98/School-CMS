<?php

namespace App\Http\Controllers;

class NoticesController extends Controller
{
    public function index()
    {
        return view('pages.notices.index');
    }

    public function show(string $slug)
    {
        return view('pages.notices.show');
    }
}
