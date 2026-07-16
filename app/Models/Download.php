<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\DownloadCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Download extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'category',
        'file_path',
        'file_type',
        'file_size',
        'download_count',
        'is_published',
    ];

    protected $casts = [
        'category' => DownloadCategory::class,
        'is_published' => 'boolean',
        'file_size' => 'integer',
        'download_count' => 'integer',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('file')
            ->acceptsMimeTypes([
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ]);
    }
}
