<?php

namespace App\Http\Controllers;

class AcademicsController extends Controller
{
    public function __invoke()
    {
        return view('pages.academics.index');
    }
}
