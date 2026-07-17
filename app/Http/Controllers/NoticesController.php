<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\NoticeCategory;

class NoticesController extends Controller
{
    public function index()
    {
        $categories = NoticeCategory::withCount('notices')->orderBy('name')->get();

        $notices = Notice::published()
            ->with('category')
            ->when(request('search'), fn ($q, $v) => $q->where('title', 'like', "%{$v}%"))
            ->when(request('category'), fn ($q, $v) => $q->where('notice_category_id', $v))
            ->orderBy('is_pinned', 'desc')
            ->orderBy('published_at', 'desc')
            ->paginate(12);

        return view('pages.notices.index', compact('notices', 'categories'));
    }

    public function show(string $slug)
    {
        $notice = Notice::published()->with('category')->where('slug', $slug)->firstOrFail();

        $related = $notice->category?->notices()
            ->published()
            ->where('id', '!=', $notice->id)
            ->take(3)
            ->get();

        return view('pages.notices.show', compact('notice', 'related'));
    }
}
