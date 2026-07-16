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

        $permissions = [
            // Content
            'view_notice', 'create_notice', 'edit_notice', 'delete_notice',
            'view_news', 'create_news', 'edit_news', 'delete_news',
            'view_event', 'create_event', 'edit_event', 'delete_event',
            'view_page', 'create_page', 'edit_page', 'delete_page',
            'view_faq', 'create_faq', 'edit_faq', 'delete_faq',
            'view_testimonial', 'create_testimonial', 'edit_testimonial', 'delete_testimonial',
            // School
            'view_teacher', 'create_teacher', 'edit_teacher', 'delete_teacher',
            'view_staff', 'create_staff', 'edit_staff', 'delete_staff',
            'view_facility', 'create_facility', 'edit_facility', 'delete_facility',
            'view_program', 'create_program', 'edit_program', 'delete_program',
            'view_download', 'create_download', 'edit_download', 'delete_download',
            'view_gallery', 'create_gallery', 'edit_gallery', 'delete_gallery',
            // Admissions
            'view_inquiry', 'create_inquiry', 'edit_inquiry', 'delete_inquiry',
            // System
            'view_setting', 'create_setting', 'edit_setting', 'delete_setting',
            'view_slider', 'create_slider', 'edit_slider', 'delete_slider',
            'view_menu', 'create_menu', 'edit_menu', 'delete_menu',
            'view_user', 'create_user', 'edit_user', 'delete_user',
        ];

        foreach ($permissions as $name) {
            Permission::firstOrCreate(['guard_name' => 'web', 'name' => $name]);
        }

        $superAdmin = Role::firstOrCreate(['name' => 'super_admin']);
        $superAdmin->givePermissionTo(Permission::all());

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->givePermissionTo([
            'view_notice', 'create_notice', 'edit_notice', 'delete_notice',
            'view_news', 'create_news', 'edit_news', 'delete_news',
            'view_event', 'create_event', 'edit_event', 'delete_event',
            'view_page', 'create_page', 'edit_page', 'delete_page',
            'view_faq', 'create_faq', 'edit_faq', 'delete_faq',
            'view_testimonial', 'create_testimonial', 'edit_testimonial', 'delete_testimonial',
            'view_teacher', 'create_teacher', 'edit_teacher', 'delete_teacher',
            'view_staff', 'create_staff', 'edit_staff', 'delete_staff',
            'view_facility', 'create_facility', 'edit_facility', 'delete_facility',
            'view_program', 'create_program', 'edit_program', 'delete_program',
            'view_download', 'create_download', 'edit_download', 'delete_download',
            'view_gallery', 'create_gallery', 'edit_gallery', 'delete_gallery',
            'view_inquiry', 'create_inquiry', 'edit_inquiry', 'delete_inquiry',
            'view_setting', 'edit_setting',
            'view_slider', 'create_slider', 'edit_slider', 'delete_slider',
            'view_menu', 'create_menu', 'edit_menu', 'delete_menu',
        ]);

        $contentEditor = Role::firstOrCreate(['name' => 'content_editor']);
        $contentEditor->givePermissionTo([
            'view_notice', 'create_notice', 'edit_notice', 'delete_notice',
            'view_news', 'create_news', 'edit_news', 'delete_news',
            'view_event', 'create_event', 'edit_event', 'delete_event',
            'view_page', 'create_page', 'edit_page',
            'view_faq', 'create_faq', 'edit_faq',
            'view_testimonial', 'create_testimonial', 'edit_testimonial',
            'view_teacher', 'create_teacher', 'edit_teacher',
            'view_staff', 'create_staff', 'edit_staff',
            'view_facility', 'create_facility', 'edit_facility',
            'view_program', 'create_program', 'edit_program',
            'view_gallery', 'create_gallery', 'edit_gallery',
            'view_inquiry', 'edit_inquiry',
        ]);
    }
}
