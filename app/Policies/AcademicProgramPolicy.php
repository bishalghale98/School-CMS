<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\AcademicProgram;
use Illuminate\Auth\Access\HandlesAuthorization;

class AcademicProgramPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:AcademicProgram');
    }

    public function view(AuthUser $authUser, AcademicProgram $academicProgram): bool
    {
        return $authUser->can('View:AcademicProgram');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:AcademicProgram');
    }

    public function update(AuthUser $authUser, AcademicProgram $academicProgram): bool
    {
        return $authUser->can('Update:AcademicProgram');
    }

    public function delete(AuthUser $authUser, AcademicProgram $academicProgram): bool
    {
        return $authUser->can('Delete:AcademicProgram');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:AcademicProgram');
    }

    public function restore(AuthUser $authUser, AcademicProgram $academicProgram): bool
    {
        return $authUser->can('Restore:AcademicProgram');
    }

    public function forceDelete(AuthUser $authUser, AcademicProgram $academicProgram): bool
    {
        return $authUser->can('ForceDelete:AcademicProgram');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:AcademicProgram');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:AcademicProgram');
    }

    public function replicate(AuthUser $authUser, AcademicProgram $academicProgram): bool
    {
        return $authUser->can('Replicate:AcademicProgram');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:AcademicProgram');
    }

}