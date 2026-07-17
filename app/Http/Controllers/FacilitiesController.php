<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Facility;

class FacilitiesController extends Controller
{
    public function __invoke()
    {
        $facilities = Facility::where('is_published', true)->orderBy('sort_order')->get();

        return view('pages.facilities.index', compact('facilities'));
    }
}
