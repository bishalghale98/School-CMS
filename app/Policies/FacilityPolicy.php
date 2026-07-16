<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Facility;
use App\Models\User;

class FacilityPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Facility $facility): bool
    {
        return $facility->is_published || $user->hasAnyRole(['super_admin', 'admin', 'content_editor']);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'content_editor']);
    }

    public function update(User $user, Facility $facility): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'content_editor']);
    }

    public function delete(User $user, Facility $facility): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin']);
    }
}
