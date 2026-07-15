<?php

namespace App\Http\Controllers;

class FacilitiesController extends Controller
{
    public function __invoke()
    {
        return view('pages.facilities.index');
    }
}
