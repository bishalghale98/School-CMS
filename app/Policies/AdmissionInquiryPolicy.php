<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\AdmissionInquiry;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdmissionInquiryPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:AdmissionInquiry');
    }

    public function view(AuthUser $authUser, AdmissionInquiry $admissionInquiry): bool
    {
        return $authUser->can('View:AdmissionInquiry');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:AdmissionInquiry');
    }

    public function update(AuthUser $authUser, AdmissionInquiry $admissionInquiry): bool
    {
        return $authUser->can('Update:AdmissionInquiry');
    }

    public function delete(AuthUser $authUser, AdmissionInquiry $admissionInquiry): bool
    {
        return $authUser->can('Delete:AdmissionInquiry');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:AdmissionInquiry');
    }

    public function restore(AuthUser $authUser, AdmissionInquiry $admissionInquiry): bool
    {
        return $authUser->can('Restore:AdmissionInquiry');
    }

    public function forceDelete(AuthUser $authUser, AdmissionInquiry $admissionInquiry): bool
    {
        return $authUser->can('ForceDelete:AdmissionInquiry');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:AdmissionInquiry');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:AdmissionInquiry');
    }

    public function replicate(AuthUser $authUser, AdmissionInquiry $admissionInquiry): bool
    {
        return $authUser->can('Replicate:AdmissionInquiry');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:AdmissionInquiry');
    }

}