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
                'title' => 'identitum_create',
            ],
            [
                'id'    => 18,
                'title' => 'identitum_edit',
            ],
            [
                'id'    => 19,
                'title' => 'identitum_show',
            ],
            [
                'id'    => 20,
                'title' => 'identitum_delete',
            ],
            [
                'id'    => 21,
                'title' => 'identitum_access',
            ],
            [
                'id'    => 22,
                'title' => 'pengukuran_create',
            ],
            [
                'id'    => 23,
                'title' => 'pengukuran_edit',
            ],
            [
                'id'    => 24,
                'title' => 'pengukuran_show',
            ],
            [
                'id'    => 25,
                'title' => 'pengukuran_delete',
            ],
            [
                'id'    => 26,
                'title' => 'pengukuran_access',
            ],
            [
                'id'    => 27,
                'title' => 'trik_create',
            ],
            [
                'id'    => 28,
                'title' => 'trik_edit',
            ],
            [
                'id'    => 29,
                'title' => 'trik_show',
            ],
            [
                'id'    => 30,
                'title' => 'trik_delete',
            ],
            [
                'id'    => 31,
                'title' => 'trik_access',
            ],
            [
                'id'    => 32,
                'title' => 'catatan_create',
            ],
            [
                'id'    => 33,
                'title' => 'catatan_edit',
            ],
            [
                'id'    => 34,
                'title' => 'catatan_show',
            ],
            [
                'id'    => 35,
                'title' => 'catatan_delete',
            ],
            [
                'id'    => 36,
                'title' => 'catatan_access',
            ],
            [
                'id'    => 37,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
