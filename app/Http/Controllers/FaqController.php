<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Faq;

class FaqController extends Controller
{
    public function __invoke()
    {
        $categories = Faq::where('is_published', true)->select('category')->distinct()->pluck('category');
        $faqs = Faq::where('is_published', true)->orderBy('sort_order')->get();

        return view('pages.faq.index', compact('categories', 'faqs'));
    }
}
