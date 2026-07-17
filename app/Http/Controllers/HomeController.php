<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\AcademicProgram;
use App\Models\Facility;
use App\Models\News;
use App\Models\Notice;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('is_active', true)->orderBy('sort_order')->get();
        $notices = Notice::published()->with('category')->orderBy('is_pinned', 'desc')->orderBy('published_at', 'desc')->take(3)->get();
        $news = News::published()->with('category')->orderBy('published_at', 'desc')->take(3)->get();
        $programs = AcademicProgram::where('is_published', true)->orderBy('sort_order')->take(6)->get();
        $facilities = Facility::where('is_published', true)->orderBy('sort_order')->take(6)->get();
        $testimonials = Testimonial::where('is_published', true)->orderBy('sort_order')->take(3)->get();
        $principalMessage = Page::where('slug', 'principal-message')->first();

        return view('pages.home', compact(
            'sliders', 'notices', 'news', 'programs',
            'facilities', 'testimonials', 'principalMessage'
        ));
    }
}
