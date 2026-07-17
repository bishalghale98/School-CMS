<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Teacher;

class TeachersController extends Controller
{
    public function __invoke()
    {
        $teachers = Teacher::where('is_published', true)->orderBy('sort_order')->get();
        $staff = Staff::where('is_published', true)->orderBy('sort_order')->get();

        return view('pages.teachers.index', compact('teachers', 'staff'));
    }
}
