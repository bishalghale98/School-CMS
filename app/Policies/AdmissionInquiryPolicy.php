<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\AdmissionInquiry;
use App\Models\User;

class AdmissionInquiryPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'content_editor']);
    }

    public function view(User $user, AdmissionInquiry $inquiry): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'content_editor']);
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, AdmissionInquiry $inquiry): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'content_editor']);
    }

    public function delete(User $user, AdmissionInquiry $inquiry): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin']);
    }
}
