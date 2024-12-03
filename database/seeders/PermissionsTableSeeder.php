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
                'title' => 'company_create',
            ],
            [
                'id'    => 18,
                'title' => 'company_edit',
            ],
            [
                'id'    => 19,
                'title' => 'company_show',
            ],
            [
                'id'    => 20,
                'title' => 'company_delete',
            ],
            [
                'id'    => 21,
                'title' => 'company_access',
            ],
            [
                'id'    => 22,
                'title' => 'country_create',
            ],
            [
                'id'    => 23,
                'title' => 'country_edit',
            ],
            [
                'id'    => 24,
                'title' => 'country_show',
            ],
            [
                'id'    => 25,
                'title' => 'country_delete',
            ],
            [
                'id'    => 26,
                'title' => 'country_access',
            ],
            [
                'id'    => 27,
                'title' => 'company_type_create',
            ],
            [
                'id'    => 28,
                'title' => 'company_type_edit',
            ],
            [
                'id'    => 29,
                'title' => 'company_type_show',
            ],
            [
                'id'    => 30,
                'title' => 'company_type_delete',
            ],
            [
                'id'    => 31,
                'title' => 'company_type_access',
            ],
            [
                'id'    => 32,
                'title' => 'setting_access',
            ],
            [
                'id'    => 33,
                'title' => 'client_create',
            ],
            [
                'id'    => 34,
                'title' => 'client_edit',
            ],
            [
                'id'    => 35,
                'title' => 'client_show',
            ],
            [
                'id'    => 36,
                'title' => 'client_delete',
            ],
            [
                'id'    => 37,
                'title' => 'client_access',
            ],
            [
                'id'    => 38,
                'title' => 'brand_create',
            ],
            [
                'id'    => 39,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 40,
                'title' => 'brand_show',
            ],
            [
                'id'    => 41,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 42,
                'title' => 'brand_access',
            ],
            [
                'id'    => 43,
                'title' => 'vehicle_create',
            ],
            [
                'id'    => 44,
                'title' => 'vehicle_edit',
            ],
            [
                'id'    => 45,
                'title' => 'vehicle_show',
            ],
            [
                'id'    => 46,
                'title' => 'vehicle_delete',
            ],
            [
                'id'    => 47,
                'title' => 'vehicle_access',
            ],
            [
                'id'    => 48,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
