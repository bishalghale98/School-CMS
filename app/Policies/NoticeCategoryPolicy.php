<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\NoticeCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class NoticeCategoryPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:NoticeCategory');
    }

    public function view(AuthUser $authUser, NoticeCategory $noticeCategory): bool
    {
        return $authUser->can('View:NoticeCategory');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:NoticeCategory');
    }

    public function update(AuthUser $authUser, NoticeCategory $noticeCategory): bool
    {
        return $authUser->can('Update:NoticeCategory');
    }

    public function delete(AuthUser $authUser, NoticeCategory $noticeCategory): bool
    {
        return $authUser->can('Delete:NoticeCategory');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:NoticeCategory');
    }

    public function restore(AuthUser $authUser, NoticeCategory $noticeCategory): bool
    {
        return $authUser->can('Restore:NoticeCategory');
    }

    public function forceDelete(AuthUser $authUser, NoticeCategory $noticeCategory): bool
    {
        return $authUser->can('ForceDelete:NoticeCategory');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:NoticeCategory');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:NoticeCategory');
    }

    public function replicate(AuthUser $authUser, NoticeCategory $noticeCategory): bool
    {
        return $authUser->can('Replicate:NoticeCategory');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:NoticeCategory');
    }

}