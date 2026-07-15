<?php

namespace App\Http\Controllers;

class NewsController extends Controller
{
    public function index()
    {
        return view('pages.news.index');
    }

    public function show(string $slug)
    {
        return view('pages.news.show');
    }
}
