<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Page;
use App\Models\User;

class PagePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Page $page): bool
    {
        return $page->is_published || $user->hasAnyRole(['super_admin', 'admin', 'content_editor']);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'content_editor']);
    }

    public function update(User $user, Page $page): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'content_editor']);
    }

    public function delete(User $user, Page $page): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin']);
    }
}
