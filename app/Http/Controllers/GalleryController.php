<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $photoAlbums = Gallery::where('is_published', true)->where('type', 'photo')
            ->with(['items' => fn ($q) => $q->orderBy('sort_order')])->withCount('items')->orderBy('sort_order')->get();

        $videoAlbums = Gallery::where('is_published', true)->where('type', 'video')
            ->with(['items' => fn ($q) => $q->orderBy('sort_order')])->withCount('items')->orderBy('sort_order')->get();

        return view('pages.gallery.index', compact('photoAlbums', 'videoAlbums'));
    }

    public function show(string $slug)
    {
        $album = Gallery::where('is_published', true)->where('slug', $slug)
            ->with(['items' => fn ($q) => $q->orderBy('sort_order')])
            ->firstOrFail();

        return view('pages.gallery.show', compact('album'));
    }
}
