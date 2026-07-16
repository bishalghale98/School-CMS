<?php

declare(strict_types=1);

namespace App\Traits;

trait HasStatus
{
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopePublishedOrRecent($query, int $days = 30)
    {
        return $query->where('status', 'published')
            ->orWhere('published_at', '>=', now()->subDays($days));
    }

    public function isPublished(): bool
    {
        return $this->status === 'published';
    }

    public function isDraft(): bool
    {
        return $this->status === 'draft';
    }
}
