<?php

declare(strict_types=1);

namespace App\Actions\Content;

use App\Enums\NewsStatus;
use App\Models\News;

class PublishNewsAction
{
    public function execute(News $news): News
    {
        $news->update([
            'status' => NewsStatus::Published,
            'published_at' => now(),
        ]);

        return $news->fresh();
    }
}
