<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;

class NewsController extends Controller
{
    public function index()
    {
        $categories = NewsCategory::withCount('news')->orderBy('name')->get();

        $query = News::published()->with('category')
            ->when(request('search'), fn ($q, $v) => $q->where('title', 'like', "%{$v}%"))
            ->when(request('category'), fn ($q, $v) => $q->where('news_category_id', $v));

        $featured = (clone $query)->orderBy('published_at', 'desc')->first();

        $news = (clone $query)
            ->when($featured, fn ($q) => $q->where('id', '!=', $featured->id))
            ->orderBy('published_at', 'desc')
            ->paginate(11);

        return view('pages.news.index', compact('news', 'categories', 'featured'));
    }

    public function show(string $slug)
    {
        $news = News::published()->with('category')->where('slug', $slug)->firstOrFail();

        $related = News::published()
            ->where('id', '!=', $news->id)
            ->where('news_category_id', $news->news_category_id)
            ->take(3)
            ->get();

        return view('pages.news.show', compact('news', 'related'));
    }
}
