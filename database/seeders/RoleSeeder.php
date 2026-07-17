<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // Resources that have full CRUD + reorder
        $fullCrudResources = [
            'Notice', 'NoticeCategory',
            'News', 'NewsCategory',
            'Event',
            'Page',
            'Faq',
            'Testimonial',
            'Teacher', 'Staff',
            'Facility', 'AcademicProgram',
            'Download', 'Gallery',
        ];

        // System resources (admin-only)
        $systemResources = [
            'Setting', 'Slider', 'Menu',
        ];

        // Resources with limited actions
        $limitedResources = [
            'AdmissionInquiry',
            'ContactSubmission',
        ];

        $allResources = array_merge($fullCrudResources, $systemResources, $limitedResources, ['User', 'Role']);

        $allPermissions = [];

        // Full CRUD + reorder + restore for content/school resources
        $crudActions = ['ViewAny', 'View', 'Create', 'Update', 'Delete', 'DeleteAny', 'Restore', 'Reorder'];
        foreach ($fullCrudResources as $resource) {
            foreach ($crudActions as $action) {
                $allPermissions[] = "{$action}:{$resource}";
            }
        }

        // System resources: full CRUD + reorder (no restore needed)
        $systemActions = ['ViewAny', 'View', 'Create', 'Update', 'Delete', 'DeleteAny', 'Reorder'];
        foreach ($systemResources as $resource) {
            foreach ($systemActions as $action) {
                $allPermissions[] = "{$action}:{$resource}";
            }
        }

        // Limited resources: view + update only
        foreach ($limitedResources as $resource) {
            $allPermissions[] = "ViewAny:{$resource}";
            $allPermissions[] = "View:{$resource}";
            $allPermissions[] = "Update:{$resource}";
        }

        // User management
        $userActions = ['ViewAny', 'View', 'Create', 'Update', 'Delete', 'DeleteAny'];
        foreach ($userActions as $action) {
            $allPermissions[] = "{$action}:User";
        }

        // Role management (view only for admin)
        $allPermissions[] = 'ViewAny:Role';
        $allPermissions[] = 'View:Role';

        // Panel access
        $allPermissions[] = 'panel_user';

        // Create all permissions
        foreach ($allPermissions as $name) {
            Permission::firstOrCreate([
                'name' => $name,
                'guard_name' => 'web',
            ]);
        }

        // ── Super Admin: everything ──
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin']);
        $superAdmin->givePermissionTo(Permission::all());

        // ── Admin: content + school + system + users, no role create/delete ──
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $adminPermissions = [];

        foreach ($fullCrudResources as $resource) {
            foreach ($crudActions as $action) {
                $adminPermissions[] = "{$action}:{$resource}";
            }
        }
        foreach ($systemResources as $resource) {
            foreach ($systemActions as $action) {
                $adminPermissions[] = "{$action}:{$resource}";
            }
        }
        foreach ($limitedResources as $resource) {
            $adminPermissions[] = "ViewAny:{$resource}";
            $adminPermissions[] = "View:{$resource}";
            $adminPermissions[] = "Update:{$resource}";
        }
        foreach ($userActions as $action) {
            $adminPermissions[] = "{$action}:User";
        }
        $adminPermissions[] = 'ViewAny:Role';
        $adminPermissions[] = 'View:Role';
        $adminPermissions[] = 'panel_user';

        $admin->givePermissionTo($adminPermissions);

        // ── Content Editor: content + school only, no delete, no system ──
        $contentEditor = Role::firstOrCreate(['name' => 'content_editor']);
        $editorPermissions = [];

        $editorActions = ['ViewAny', 'View', 'Create', 'Update', 'Reorder'];
        foreach ($fullCrudResources as $resource) {
            foreach ($editorActions as $action) {
                $editorPermissions[] = "{$action}:{$resource}";
            }
        }

        // Content editor can view/download but not delete
        $editorPermissions[] = 'ViewAny:Download';
        $editorPermissions[] = 'View:Download';
        $editorPermissions[] = 'Create:Download';
        $editorPermissions[] = 'Update:Download';

        // Can view and update admissions
        $editorPermissions[] = 'ViewAny:AdmissionInquiry';
        $editorPermissions[] = 'View:AdmissionInquiry';
        $editorPermissions[] = 'Update:AdmissionInquiry';

        // Can view and update contact submissions
        $editorPermissions[] = 'ViewAny:ContactSubmission';
        $editorPermissions[] = 'View:ContactSubmission';
        $editorPermissions[] = 'Update:ContactSubmission';

        $editorPermissions[] = 'panel_user';

        $contentEditor->givePermissionTo($editorPermissions);
    }
}
