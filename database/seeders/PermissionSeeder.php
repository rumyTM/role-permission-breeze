<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id' => 1,
                'module_id' => 1,
                'name' => 'Access Dashboard',
                'identifier' => 'dashboard_access',
            ],
            [
                'id' => 2,
                'module_id' => 2,
                'name' => 'Access User',
                'identifier' => 'user_access',
            ],
            [
                'id' => 3,
                'module_id' => 2,
                'name' => 'Create User',
                'identifier' => 'user_create',
            ],
            [
                'id' => 4,
                'module_id' => 2,
                'name' => 'Edit User',
                'identifier' => 'user_edit',
            ],
            [
                'id' => 5,
                'module_id' => 2,
                'name' => 'Delete User',
                'identifier' => 'user_delete',
            ],
            [
                'id' => 6,
                'module_id' => 3,
                'name' => 'Access Module',
                'identifier' => 'module_access',
            ],
            [
                'id' => 7,
                'module_id' => 3,
                'name' => 'Create Module',
                'identifier' => 'module_create',
            ],
            [
                'id' => 8,
                'module_id' => 3,
                'name' => 'Edit Module',
                'identifier' => 'module_edit',
            ],
            [
                'id' => 9,
                'module_id' => 3,
                'name' => 'Delete Module',
                'identifier' => 'module_delete',
            ],
            [
                'id' => 10,
                'module_id' => 4,
                'name' => 'Access Permission',
                'identifier' => 'permission_access',
            ],
            [
                'id' => 11,
                'module_id' => 4,
                'name' => 'Create Permission',
                'identifier' => 'permission_create',
            ],
            [
                'id' => 12,
                'module_id' => 4,
                'name' => 'Edit Permission',
                'identifier' => 'permission_edit',
            ],
            [
                'id' => 13,
                'module_id' => 4,
                'name' => 'Delete Permission',
                'identifier' => 'permission_delete',
            ],
            [
                'id' => 14,
                'module_id' => 5,
                'name' => 'Access Role',
                'identifier' => 'role_access',
            ],
            [
                'id' => 15,
                'module_id' => 5,
                'name' => 'Create Role',
                'identifier' => 'role_create',
            ],
            [
                'id' => 16,
                'module_id' => 5,
                'name' => 'Edit Role',
                'identifier' => 'role_edit',
            ],
            [
                'id' => 17,
                'module_id' => 5,
                'name' => 'Delete Role',
                'identifier' => 'role_delete',
            ],
        ];
        Permission::insert($permissions);
    }
}
