<?php

declare(strict_types=1);

namespace App\Policies;

use App\Enums\NoticeStatus;
use App\Models\Notice;
use App\Models\User;

class NoticePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Notice $notice): bool
    {
        if ($notice->status === NoticeStatus::Published) {
            return true;
        }

        return $user->exists && $user->hasAnyRole(['super_admin', 'admin', 'content_editor']);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'content_editor']);
    }

    public function update(User $user, Notice $notice): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'content_editor']);
    }

    public function delete(User $user, Notice $notice): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'content_editor']);
    }
}
