<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'id' => 1,
                'name' => 'Dashboard',
            ],
            [
                'id' => 2,
                'name' => 'User Management',
            ],
            [
                'id' => 3,
                'name' => 'Module Management',
            ],
            [
                'id' => 4,
                'name' => 'Permission Management',
            ],
            [
                'id' => 5,
                'name' => 'Role Management',
            ],
        ];
        Module::insert($modules);
    }
}
