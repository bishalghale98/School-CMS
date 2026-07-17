<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Faq;
use App\Models\News;
use App\Models\Notice;
use App\Models\Page;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->get('q');

        if (!$query || strlen($query) < 2) {
            return view('pages.search.index', ['results' => collect(), 'query' => $query]);
        }

        $notices = Notice::published()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->get()
            ->map(fn ($item) => ['type' => 'Notice', 'title' => $item->title, 'url' => route('notices.show', $item->slug), 'date' => $item->published_at]);

        $news = News::published()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->get()
            ->map(fn ($item) => ['type' => 'News', 'title' => $item->title, 'url' => route('news.show', $item->slug), 'date' => $item->published_at]);

        $events = Event::where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get()
            ->map(fn ($item) => ['type' => 'Event', 'title' => $item->title, 'url' => route('events.show', $item->slug), 'date' => $item->event_date]);

        $pages = Page::where('is_published', true)
            ->where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->get()
            ->map(fn ($item) => ['type' => 'Page', 'title' => $item->title, 'url' => route('about.index'), 'date' => $item->updated_at]);

        $faqs = Faq::where('is_published', true)
            ->where('question', 'like', "%{$query}%")
            ->orWhere('answer', 'like', "%{$query}%")
            ->get()
            ->map(fn ($item) => ['type' => 'FAQ', 'title' => $item->question, 'url' => route('faq'), 'date' => null]);

        $results = collect()
            ->merge($notices)->merge($news)->merge($events)->merge($pages)->merge($faqs)
            ->sortByDesc('date')
            ->values();

        return view('pages.search.index', compact('results', 'query'));
    }
}
