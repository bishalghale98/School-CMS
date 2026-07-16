<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\DownloadCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Download extends Model
{
    use HasFactory, SoftDeletes;

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
}
