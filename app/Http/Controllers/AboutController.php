<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function __invoke()
    {
        return view('pages.about.index');
    }

    public function history()
    {
        return view('pages.about.history');
    }

    public function visionMission()
    {
        return view('pages.about.vision-mission');
    }

    public function committee()
    {
        return view('pages.about.committee');
    }
}
