<?php

namespace App\Http\Controllers;

class DownloadsController extends Controller
{
    public function __invoke()
    {
        return view('pages.downloads.index');
    }
}
