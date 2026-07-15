<?php

namespace App\Http\Controllers;

class EventsController extends Controller
{
    public function index()
    {
        return view('pages.events.index');
    }

    public function show(string $slug)
    {
        return view('pages.events.show');
    }
}
