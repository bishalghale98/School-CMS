<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\News;
use App\Models\Page;
use App\Models\Teacher;

class AboutController extends Controller
{
    public function __invoke()
    {
        $historyPage = Page::where('slug', 'school-history')->first();
        $principalMessage = Page::where('slug', 'principal-message')->first();
        $chairmanMessage = Page::where('slug', 'chairman-message')->first();
        $teachers = Teacher::where('is_published', true)->where('department', 'Administration')->orderBy('sort_order')->take(6)->get();
        $newsCount = News::where('status', 'published')->count();
        $facilityCount = Facility::where('is_published', true)->count();

        return view('pages.about.index', compact(
            'historyPage', 'principalMessage', 'chairmanMessage',
            'teachers', 'newsCount', 'facilityCount'
        ));
    }

    public function history()
    {
        $page = Page::where('slug', 'school-history')->first();

        return view('pages.about.history', compact('page'));
    }

    public function visionMission()
    {
        return view('pages.about.vision-mission');
    }

    public function committee()
    {
        $teachers = Teacher::where('is_published', true)->orderBy('sort_order')->get();

        return view('pages.about.committee', compact('teachers'));
    }
}
