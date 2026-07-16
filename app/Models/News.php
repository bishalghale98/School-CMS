<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\NewsStatus;
use App\Traits\HasSlug;
use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes, HasSlug, HasStatus;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'news_category_id',
        'status',
        'published_at',
        'meta_title',
        'meta_description',
        'og_image',
    ];

    protected $casts = [
        'status' => NewsStatus::class,
        'published_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }
}
