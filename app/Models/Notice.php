<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\NoticeStatus;
use App\Traits\HasSlug;
use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use HasFactory, SoftDeletes, HasSlug, HasStatus;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'notice_category_id',
        'status',
        'is_pinned',
        'published_at',
        'meta_title',
        'meta_description',
        'attachments',
    ];

    protected $casts = [
        'status' => NoticeStatus::class,
        'is_pinned' => 'boolean',
        'published_at' => 'datetime',
        'attachments' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(NoticeCategory::class, 'notice_category_id');
    }
}
