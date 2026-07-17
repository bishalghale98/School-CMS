<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\AcademicProgram;
use App\Models\Event;
use App\Models\Facility;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Notice;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Teacher;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('is_active', true)->orderBy('sort_order')->get();
        $notices = Notice::published()->with('category')->orderBy('is_pinned', 'desc')->orderBy('published_at', 'desc')->take(5)->get();
        $news = News::published()->with('category')->orderBy('published_at', 'desc')->take(4)->get();
        $programs = AcademicProgram::where('is_published', true)->orderBy('sort_order')->take(6)->get();
        $facilities = Facility::where('is_published', true)->orderBy('sort_order')->take(6)->get();
        $testimonials = Testimonial::where('is_published', true)->orderBy('sort_order')->take(6)->get();
        $principalMessage = Page::where('slug', 'principal-message')->first();
        $events = Event::whereIn('status', ['upcoming', 'ongoing'])
            ->where('event_date', '>=', now())
            ->orderBy('event_date')
            ->take(3)
            ->get();
        $galleryAlbums = Gallery::where('is_published', true)
            ->withCount('items')
            ->orderBy('sort_order')
            ->take(4)
            ->get();
        $teachers = Teacher::where('is_published', true)
            ->orderBy('sort_order')
            ->take(4)
            ->get();

        return view('pages.home', compact(
            'sliders', 'notices', 'news', 'programs',
            'facilities', 'testimonials', 'principalMessage',
            'events', 'galleryAlbums', 'teachers'
        ));
    }
}
