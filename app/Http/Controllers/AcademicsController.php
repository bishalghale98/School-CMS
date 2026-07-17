<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\AcademicProgram;

class AcademicsController extends Controller
{
    public function __invoke()
    {
        $programs = AcademicProgram::where('is_published', true)->orderBy('sort_order')->get();

        return view('pages.academics.index', compact('programs'));
    }
}
