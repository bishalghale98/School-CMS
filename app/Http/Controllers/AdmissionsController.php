<?php

namespace App\Http\Controllers;

class AdmissionsController extends Controller
{
    public function __invoke()
    {
        return view('pages.admissions.index');
    }
}
