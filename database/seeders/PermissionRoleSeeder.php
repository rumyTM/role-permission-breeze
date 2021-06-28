<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPermissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($adminPermissions);

        $userPermissions = Permission::where('id', 1)->get();
        Role::findOrFail(2)->permissions()->sync($userPermissions);

        $moderatorPermissions = Permission::whereIn('id', [1,2,3,4,6,7,8,10,11,12,14,15,16])->get();
        Role::findOrFail(3)->permissions()->sync($moderatorPermissions);
    }
}
