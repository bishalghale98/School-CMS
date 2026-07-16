<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Download;
use App\Models\User;

class DownloadPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Download $download): bool
    {
        return $download->is_published || $user->hasAnyRole(['super_admin', 'admin', 'content_editor']);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin']);
    }

    public function update(User $user, Download $download): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin']);
    }

    public function delete(User $user, Download $download): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin']);
    }
}
