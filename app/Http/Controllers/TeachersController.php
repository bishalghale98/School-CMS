<?php

namespace App\Http\Controllers;

class TeachersController extends Controller
{
    public function __invoke()
    {
        return view('pages.teachers.index');
    }
}
