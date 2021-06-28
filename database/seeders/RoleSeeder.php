<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => 1,
                'name' => 'Admin',
                'identifier' => 'admin',
            ],
            [
                'id' => 2,
                'name' => 'User',
                'identifier' => 'user',
            ],
            [
                'id' => 3,
                'name' => 'Moderator',
                'identifier' => 'moderator',
            ],
        ];
        Role::insert($roles);
    }
}
