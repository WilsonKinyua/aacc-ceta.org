<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'post_create',
            ],
            [
                'id'    => 18,
                'title' => 'post_edit',
            ],
            [
                'id'    => 19,
                'title' => 'post_show',
            ],
            [
                'id'    => 20,
                'title' => 'post_delete',
            ],
            [
                'id'    => 21,
                'title' => 'post_access',
            ],
            [
                'id'    => 22,
                'title' => 'gallery_create',
            ],
            [
                'id'    => 23,
                'title' => 'gallery_edit',
            ],
            [
                'id'    => 24,
                'title' => 'gallery_show',
            ],
            [
                'id'    => 25,
                'title' => 'gallery_delete',
            ],
            [
                'id'    => 26,
                'title' => 'gallery_access',
            ],
            [
                'id'    => 27,
                'title' => 'statement_create',
            ],
            [
                'id'    => 28,
                'title' => 'statement_edit',
            ],
            [
                'id'    => 29,
                'title' => 'statement_show',
            ],
            [
                'id'    => 30,
                'title' => 'statement_delete',
            ],
            [
                'id'    => 31,
                'title' => 'statement_access',
            ],
            [
                'id'    => 32,
                'title' => 'career_create',
            ],
            [
                'id'    => 33,
                'title' => 'career_edit',
            ],
            [
                'id'    => 34,
                'title' => 'career_show',
            ],
            [
                'id'    => 35,
                'title' => 'career_delete',
            ],
            [
                'id'    => 36,
                'title' => 'career_access',
            ],
            [
                'id'    => 37,
                'title' => 'contact_create',
            ],
            [
                'id'    => 38,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 39,
                'title' => 'contact_show',
            ],
            [
                'id'    => 40,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 41,
                'title' => 'contact_access',
            ],
            [
                'id'    => 42,
                'title' => 'member_church_access',
            ],
            [
                'id'    => 43,
                'title' => 'member_church_center_create',
            ],
            [
                'id'    => 44,
                'title' => 'member_church_center_edit',
            ],
            [
                'id'    => 45,
                'title' => 'member_church_center_show',
            ],
            [
                'id'    => 46,
                'title' => 'member_church_center_delete',
            ],
            [
                'id'    => 47,
                'title' => 'member_church_center_access',
            ],
            [
                'id'    => 48,
                'title' => 'country_create',
            ],
            [
                'id'    => 49,
                'title' => 'country_edit',
            ],
            [
                'id'    => 50,
                'title' => 'country_show',
            ],
            [
                'id'    => 51,
                'title' => 'country_delete',
            ],
            [
                'id'    => 52,
                'title' => 'country_access',
            ],
            [
                'id'    => 53,
                'title' => 'member_church_contact_create',
            ],
            [
                'id'    => 54,
                'title' => 'member_church_contact_edit',
            ],
            [
                'id'    => 55,
                'title' => 'member_church_contact_show',
            ],
            [
                'id'    => 56,
                'title' => 'member_church_contact_delete',
            ],
            [
                'id'    => 57,
                'title' => 'member_church_contact_access',
            ],
            [
                'id'    => 58,
                'title' => 'team_create',
            ],
            [
                'id'    => 59,
                'title' => 'team_edit',
            ],
            [
                'id'    => 60,
                'title' => 'team_show',
            ],
            [
                'id'    => 61,
                'title' => 'team_delete',
            ],
            [
                'id'    => 62,
                'title' => 'team_access',
            ],
            [
                'id'    => 63,
                'title' => 'gallery_management_access',
            ],
            [
                'id'    => 64,
                'title' => 'category_create',
            ],
            [
                'id'    => 65,
                'title' => 'category_edit',
            ],
            [
                'id'    => 66,
                'title' => 'category_show',
            ],
            [
                'id'    => 67,
                'title' => 'category_delete',
            ],
            [
                'id'    => 68,
                'title' => 'category_access',
            ],
            [
                'id'    => 69,
                'title' => 'event_create',
            ],
            [
                'id'    => 70,
                'title' => 'event_edit',
            ],
            [
                'id'    => 71,
                'title' => 'event_show',
            ],
            [
                'id'    => 72,
                'title' => 'event_delete',
            ],
            [
                'id'    => 73,
                'title' => 'event_access',
            ],
            [
                'id'    => 74,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
