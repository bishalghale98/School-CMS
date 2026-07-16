<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\News;
use App\Models\User;

class NewsPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, News $news): bool
    {
        return $news->status === 'published' || $user->hasAnyRole(['super_admin', 'admin', 'content_editor']);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'content_editor']);
    }

    public function update(User $user, News $news): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'content_editor']);
    }

    public function delete(User $user, News $news): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'content_editor']);
    }
}
