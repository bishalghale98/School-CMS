<?php

namespace App\Http\Controllers;

class GalleryController extends Controller
{
    public function index()
    {
        return view('pages.gallery.index');
    }

    public function show(string $slug)
    {
        return view('pages.gallery.album');
    }
}
