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
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'data_management_access',
            ],
            [
                'id'    => 20,
                'title' => 'voting_management_access',
            ],
            [
                'id'    => 21,
                'title' => 'candidate_create',
            ],
            [
                'id'    => 22,
                'title' => 'candidate_edit',
            ],
            [
                'id'    => 23,
                'title' => 'candidate_show',
            ],
            [
                'id'    => 24,
                'title' => 'candidate_delete',
            ],
            [
                'id'    => 25,
                'title' => 'candidate_access',
            ],
            [
                'id'    => 26,
                'title' => 'month_create',
            ],
            [
                'id'    => 27,
                'title' => 'month_edit',
            ],
            [
                'id'    => 28,
                'title' => 'month_show',
            ],
            [
                'id'    => 29,
                'title' => 'month_delete',
            ],
            [
                'id'    => 30,
                'title' => 'month_access',
            ],
            [
                'id'    => 31,
                'title' => 'vote_create',
            ],
            [
                'id'    => 32,
                'title' => 'vote_edit',
            ],
            [
                'id'    => 33,
                'title' => 'vote_show',
            ],
            [
                'id'    => 34,
                'title' => 'vote_delete',
            ],
            [
                'id'    => 35,
                'title' => 'vote_access',
            ],
            [
                'id'    => 36,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
