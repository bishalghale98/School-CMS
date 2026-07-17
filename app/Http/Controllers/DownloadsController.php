<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\DownloadCategory;
use App\Models\Download;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DownloadsController extends Controller
{
    public function __invoke()
    {
        $categories = DownloadCategory::cases();

        $downloads = Download::where('is_published', true)
            ->when(request('category'), fn ($q, $v) => $q->where('category', $v))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.downloads.index', compact('categories', 'downloads'));
    }

    public function download(Download $download): BinaryFileResponse
    {
        abort_unless($download->is_published, 404);

        $download->increment('download_count');

        return Storage::disk('public')->download($download->file_path, $download->title . '.' . pathinfo($download->file_path, PATHINFO_EXTENSION));
    }
}
